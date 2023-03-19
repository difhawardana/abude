<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PerusahaanModel;

class Perusahaan extends BaseController
{

	public function __construct()
	{
		helper(['form', 'url']);
		$this->PerusahaanModel = new PerusahaanModel();
	}

	public function index()
	{
		return view("Datamaster/v_perusahaan");
	}

	public function store()
	{
		$data = [
			'nama' => $this->request->getVar('nama'),
			'kode' => $this->request->getVar('kode'),
		];

		$result = $this->barangModel->save($data);
		if ($result) {
			return $this->response->setJSON(['status' => 'success', 'message' => 'Berhasil menambahkan Nama Perusahaan']);
		}
		return $this->response->setJSON(['status' => 'failed', 'message' => 'Gagal menambahkan Nama Perusahaan']);
	}
}
