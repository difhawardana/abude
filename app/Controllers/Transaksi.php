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
			'kode_transaksi' => $this->request->getVar('kode_transaksi'),
			'tanggal' => $this->request->getVar('tanggal'),
			'jam' => $this->request->getVar('jam'),
			'total_harga' => $this->request->getVar('total_harga'),
			'total_jumlah' => $this->request->getVar('total_jumlah'),
		];

		$result = $this->transaksiModel->save($data);
		if ($result) {
			return $this->response->setJSON(['status' => 'success', 'message' => 'Transaksi berhasil ditambahkan']);
		}
		return $this->response->setJSON(['status' => 'failed', 'message' => 'Gagal menambahkan transaksi baru']);
	}
}
