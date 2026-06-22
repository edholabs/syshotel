<?php

namespace App\Controllers;

use App\Models\GuestModel;

class Guests extends BaseController
{
    protected $guestModel;

    public function __construct()
    {
        $this->guestModel = new GuestModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Tamu',
            'guests' => $this->guestModel->findAll()
        ];
        return view('guests/index', $data);
    }

    public function store()
    {
        $this->guestModel->save([
            'identity_number' => $this->request->getPost('identity_number'),
            'name'            => $this->request->getPost('name'),
            'phone'           => $this->request->getPost('phone'),
            'address'         => $this->request->getPost('address'),
        ]);
        session()->setFlashdata('msg', 'Data Tamu berhasil ditambahkan.');
        return redirect()->to('/guests');
    }

    public function update($id)
    {
        $this->guestModel->update($id, [
            'identity_number' => $this->request->getPost('identity_number'),
            'name'            => $this->request->getPost('name'),
            'phone'           => $this->request->getPost('phone'),
            'address'         => $this->request->getPost('address'),
        ]);
        session()->setFlashdata('msg', 'Data Tamu berhasil diubah.');
        return redirect()->to('/guests');
    }

    public function delete($id)
    {
        try {
            $this->guestModel->delete($id);
            session()->setFlashdata('msg', 'Data Tamu berhasil dihapus.');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Gagal menghapus data tamu karena terhubung dengan transaksi.');
        }
        return redirect()->to('/guests');
    }
}
