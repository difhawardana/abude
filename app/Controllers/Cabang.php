<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CabangModel;

class Cabang extends BaseController
{
    public function __construct()
	{
		helper(['form', 'url']);
		$this->cabangModel = new CabangModel();
	}

    public function index()
    {
        return view("Datamaster/v_cabang");
    }

    public function store()
	{
		$data = [
			'nama' => $this->request->getVar('nama'),
			'kode' => $this->request->getVar('kode'),
		];

		$result = $this->cabangModel->save($data);
		if ($result) {
			return $this->response->setJSON(['status' => 'success', 'message' => 'Berhasil menambahkan barang']);
		}
		return $this->response->setJSON(['status' => 'failed', 'message' => 'Gagal menambahkan barang']);
	}

}
