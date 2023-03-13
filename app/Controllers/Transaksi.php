<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    public function __construct()
	{
		helper(['form', 'url']);
		$this->transaksiModel = new TransaksiModel();
	}

    public function index()
    {
        return view("Aktivitas/v_transaksi");
    }

    public function store()
	{
		$data = [
			'username' => $this->request->getVar('username'),
			'password' => $this->request->getVar('password'),
			'role' => $this->request->getVar('role'),
		];

		$result = $this->UserModel->save($data);
		if ($result) {
			return $this->response->setJSON(['status' => 'success', 'message' => 'Berhasil menambahkan barang']);
		}
		return $this->response->setJSON(['status' => 'failed', 'message' => 'Gagal menambahkan barang']);
	}

}
