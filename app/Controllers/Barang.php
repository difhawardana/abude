<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\BarangModel;

class Barang extends BaseController
{

	public function __construct()
	{
		helper(['form', 'url']);
		$this->barangModel = new BarangModel();
	}

	public function index()
	{
		return view("Datamaster/v_barang");
	}

	public function store()
	{
		$data = [
			'nama_barang' => $this->request->getVar('nama_barang'),
			'harga_barang' => $this->request->getVar('harga_barang'),
			'satuan' => $this->request->getVar('satuan'),
			'status' => $this->request->getVar('status'),
			// 'id_cabang' => $this->request->getVar('id_cabang'),
		];

		$result = $this->barangModel->save($data);
		if ($result) {
			return $this->response->setJSON(['status' => 'success', 'message' => 'Berhasil menambahkan barang']);
		}
		return $this->response->setJSON(['status' => 'failed', 'message' => 'Gagal menambahkan barang']);
	}
}
