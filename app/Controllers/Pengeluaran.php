<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengeluaranModel;


class Pengeluaran extends BaseController
{

    public function __construct()
	{
		helper(['form', 'url']);
		$this->transaksiModel = new PengeluaranModel();
	}

    public function index()
    {
        return view("Aktivitas/v_pengeluaran");
    }

    public function store()
	{
		$data = [
			'kode_pengeluaran' => $this->request->getVar('kode_pengeluaran'),
			'tanggal' => $this->request->getVar('tanggal'),
			'waktu' => $this->request->getVar('waktu'),
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
