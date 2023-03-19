<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiDetailModel;

class Transaksi extends BaseController
{
    public function __construct()
	{
		helper(['form', 'url']);
		$this->transaksiDetailModel = new TransaksiDetailModel();
	}

    public function index()
    {

	}

    public function store()
	{
		$data = [
			'jumlah' => $this->request->getVar('jumlah'),
			'harga' => $this->request->getVar('harga'),
			'subtotal' => $this->request->getVar('subtotal'),
		];

		$result = $this->transaksiDetailModel->save($data);
	}
}


