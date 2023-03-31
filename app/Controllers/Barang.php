<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\SupplierModel;

class Barang extends BaseController
{
	public function index()
	{
		$supplier = new SupplierModel();
		$data = [
			'supplier' => $supplier->select('id_supplier, nama_supplier',)->findAll()
		];
		return view("Datamaster/v_barang", $data);
	}
}
