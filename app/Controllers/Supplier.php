<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SupplierModel;

class Supplier extends BaseController
{
    public function __construct()
	{
		helper(['form', 'url']);
		$this->supplierModel = new SupplierModel();
	}

    public function index()
    {
        return view("Datamaster/v_supplier");
    }

    public function store()
	{
		$data = [
			'nama_supplier' => $this->request->getVar('nama_supplier')
		];

		$result = $this->SupplierModel->save($data);
		if ($result) {
			return $this->response->setJSON(['status' => 'success', 'message' => 'Supplier berhasil ditambahkan']);
		}
		return $this->response->setJSON(['status' => 'failed', 'message' => 'Gagal menambahkan supplier baru']);
	}
}
