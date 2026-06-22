<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;
use App\Models\GuestModel;
use App\Models\RoomModel;
use App\Models\RoomTypeModel;
use App\Models\ServiceModel;

class Transactions extends BaseController
{
    protected $transactionModel;
    protected $transactionDetailModel;
    protected $guestModel;
    protected $roomModel;
    protected $roomTypeModel;
    protected $serviceModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->transactionDetailModel = new TransactionDetailModel();
        $this->guestModel = new GuestModel();
        $this->roomModel = new RoomModel();
        $this->roomTypeModel = new RoomTypeModel();
        $this->serviceModel = new ServiceModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Transaksi',
            'transactions' => $this->transactionModel->getTransactions()
        ];
        return view('transactions/index', $data);
    }

    public function create()
    {
        $data = [
            'title'  => 'Transaksi Baru (Check-in)',
            'guests' => $this->guestModel->findAll(),
            'rooms'  => $this->roomModel->where('status', 'tersedia')->getRoomsWithTypes()
        ];
        return view('transactions/create', $data);
    }

    public function store()
    {
        $roomId = $this->request->getPost('room_id');
        
        // Generate Invoice
        $invoice = 'INV-' . date('YmdHis');
        
        $this->transactionModel->save([
            'invoice_number' => $invoice,
            'guest_id'       => $this->request->getPost('guest_id'),
            'room_id'        => $roomId,
            'user_id'        => session()->get('id'),
            'check_in_date'  => $this->request->getPost('check_in_date'),
            'status'         => 'check_in'
        ]);
        
        $transId = $this->transactionModel->getInsertID();

        // Update room status
        $this->roomModel->update($roomId, ['status' => 'terisi']);

        session()->setFlashdata('msg', 'Check-in berhasil disimpan.');
        return redirect()->to('/transactions/show/'.$transId);
    }

    public function show($id)
    {
        $transaction = $this->transactionModel->select('transactions.*, guests.name as guest_name, rooms.room_number, room_types.price as price_per_night')
            ->join('guests', 'guests.id = transactions.guest_id', 'left')
            ->join('rooms', 'rooms.id = transactions.room_id')
            ->join('room_types', 'room_types.id = rooms.room_type_id')
            ->where('transactions.id', $id)
            ->first();

        if (!$transaction) {
            return redirect()->to('/transactions');
        }

        $data = [
            'title' => 'Detail Transaksi: ' . $transaction['invoice_number'],
            'transaction' => $transaction,
            'details' => $this->transactionDetailModel->getDetails($id),
            'services' => $this->serviceModel->findAll()
        ];

        return view('transactions/show', $data);
    }

    public function addService($id)
    {
        $serviceId = $this->request->getPost('service_id');
        $qty = $this->request->getPost('qty');
        
        $service = $this->serviceModel->find($serviceId);
        $subtotal = $service['price'] * $qty;

        $this->transactionDetailModel->save([
            'transaction_id' => $id,
            'service_id'     => $serviceId,
            'qty'            => $qty,
            'price'          => $service['price'],
            'subtotal'       => $subtotal
        ]);

        $this->recalculateTotal($id);

        session()->setFlashdata('msg', 'Layanan berhasil ditambahkan.');
        return redirect()->to('/transactions/show/'.$id);
    }

    public function deleteService($transId, $detailId)
    {
        $this->transactionDetailModel->delete($detailId);
        $this->recalculateTotal($transId);
        
        session()->setFlashdata('msg', 'Layanan berhasil dihapus.');
        return redirect()->to('/transactions/show/'.$transId);
    }

    private function recalculateTotal($id)
    {
        $details = $this->transactionDetailModel->where('transaction_id', $id)->findAll();
        $totalService = 0;
        foreach($details as $d) {
            $totalService += $d['subtotal'];
        }
        
        // Update transaction total service
        $this->transactionModel->update($id, [
            'total_service' => $totalService
        ]);
    }

    public function checkout($id)
    {
        $transaction = $this->transactionModel->select('transactions.*, rooms.room_type_id, room_types.price as price_per_night')
            ->join('rooms', 'rooms.id = transactions.room_id')
            ->join('room_types', 'room_types.id = rooms.room_type_id')
            ->where('transactions.id', $id)->first();

        $checkOutDate = $this->request->getPost('check_out_date');
        
        // Calculate days
        $in = new \DateTime($transaction['check_in_date']);
        $out = new \DateTime($checkOutDate);
        $diff = $in->diff($out)->days;
        
        // If same day checkout, count as 1 night
        if ($diff == 0) $diff = 1;

        $totalRoomPrice = $diff * $transaction['price_per_night'];
        $grandTotal = $totalRoomPrice + $transaction['total_service'];

        // Update transaction
        $this->transactionModel->update($id, [
            'check_out_date'   => $checkOutDate,
            'total_room_price' => $totalRoomPrice,
            'grand_total'      => $grandTotal,
            'status'           => 'check_out'
        ]);

        // Release Room (set to kotor)
        $this->roomModel->update($transaction['room_id'], ['status' => 'kotor']);

        session()->setFlashdata('msg', 'Check-out berhasil. Tagihan telah dikalkulasi.');
        return redirect()->to('/transactions/show/'.$id);
    }

    public function printInvoice($id)
    {
        $transaction = $this->transactionModel->select('transactions.*, guests.name as guest_name, guests.phone, guests.address, rooms.room_number, room_types.name as type_name, room_types.price as price_per_night, users.name as receptionist')
            ->join('guests', 'guests.id = transactions.guest_id', 'left')
            ->join('rooms', 'rooms.id = transactions.room_id')
            ->join('room_types', 'room_types.id = rooms.room_type_id')
            ->join('users', 'users.id = transactions.user_id')
            ->where('transactions.id', $id)
            ->first();

        if (!$transaction || $transaction['status'] != 'check_out') {
            return redirect()->to('/transactions');
        }

        $data = [
            'title' => 'Invoice: ' . $transaction['invoice_number'],
            'transaction' => $transaction,
            'details' => $this->transactionDetailModel->getDetails($id)
        ];

        return view('transactions/print', $data);
    }
}
