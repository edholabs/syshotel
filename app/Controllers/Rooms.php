<?php

namespace App\Controllers;

use App\Models\RoomModel;
use App\Models\RoomTypeModel;

class Rooms extends BaseController
{
    protected $roomModel;
    protected $roomTypeModel;

    public function __construct()
    {
        $this->roomModel = new RoomModel();
        $this->roomTypeModel = new RoomTypeModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Kamar & Tipe',
            'rooms' => $this->roomModel->getRoomsWithTypes(),
            'types' => $this->roomTypeModel->findAll()
        ];
        return view('rooms/index', $data);
    }

    // --- ROOMS CRUD ---
    public function store()
    {
        $this->roomModel->save([
            'room_number'  => $this->request->getPost('room_number'),
            'room_type_id' => $this->request->getPost('room_type_id'),
            'status'       => $this->request->getPost('status')
        ]);
        session()->setFlashdata('msg', 'Data Kamar berhasil ditambahkan.');
        return redirect()->to('/rooms');
    }

    public function update($id)
    {
        $this->roomModel->update($id, [
            'room_number'  => $this->request->getPost('room_number'),
            'room_type_id' => $this->request->getPost('room_type_id'),
            'status'       => $this->request->getPost('status')
        ]);
        session()->setFlashdata('msg', 'Data Kamar berhasil diubah.');
        return redirect()->to('/rooms');
    }

    public function delete($id)
    {
        $this->roomModel->delete($id);
        session()->setFlashdata('msg', 'Data Kamar berhasil dihapus.');
        return redirect()->to('/rooms');
    }

    // --- ROOM TYPES CRUD ---
    public function storeType()
    {
        $this->roomTypeModel->save([
            'name'        => $this->request->getPost('name'),
            'price'       => $this->request->getPost('price'),
            'description' => $this->request->getPost('description')
        ]);
        session()->setFlashdata('msg', 'Tipe Kamar berhasil ditambahkan.');
        return redirect()->to('/rooms');
    }

    public function updateType($id)
    {
        $this->roomTypeModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'price'       => $this->request->getPost('price'),
            'description' => $this->request->getPost('description')
        ]);
        session()->setFlashdata('msg', 'Tipe Kamar berhasil diubah.');
        return redirect()->to('/rooms');
    }

    public function deleteType($id)
    {
        try {
            $this->roomTypeModel->delete($id);
            session()->setFlashdata('msg', 'Tipe Kamar berhasil dihapus.');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Gagal menghapus Tipe Kamar. Pastikan tidak ada kamar yang menggunakan tipe ini.');
        }
        return redirect()->to('/rooms');
    }
}
