<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PerihalModel;

class Perihal extends BaseController
{

	public function __construct()
	{
		helper(['form', 'url']);
		$this->perihalModel = new PerihalModel();
	}

	public function index()
	{
		return view("Datamaster/v_perihal");
	}

	public function store()
	{
		$data = [
			'nama_perihal' => $this->request->getVar('nama_perihal'),
		];

		$result = $this->perihalModel->save($data);
		if ($result) {
			return $this->response->setJSON(['status' => 'success', 'message' => 'Berhasil menambahkan perihal']);
		}
		return $this->response->setJSON(['status' => 'failed', 'message' => 'Gagal menambahkan perihal']);
	}
}
