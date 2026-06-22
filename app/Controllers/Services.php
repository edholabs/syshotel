<?php

namespace App\Controllers;

use App\Models\ServiceModel;

class Services extends BaseController
{
    protected $serviceModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Layanan',
            'services' => $this->serviceModel->findAll()
        ];
        return view('services/index', $data);
    }

    public function store()
    {
        $this->serviceModel->save([
            'name'  => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
        ]);
        session()->setFlashdata('msg', 'Data Layanan berhasil ditambahkan.');
        return redirect()->to('/services');
    }

    public function update($id)
    {
        $this->serviceModel->update($id, [
            'name'  => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
        ]);
        session()->setFlashdata('msg', 'Data Layanan berhasil diubah.');
        return redirect()->to('/services');
    }

    public function delete($id)
    {
        try {
            $this->serviceModel->delete($id);
            session()->setFlashdata('msg', 'Data Layanan berhasil dihapus.');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Gagal menghapus layanan karena terhubung dengan transaksi.');
        }
        return redirect()->to('/services');
    }
}
