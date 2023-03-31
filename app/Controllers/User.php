<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\CabangModel;


class User extends BaseController
{
    public function index()
    {
		$cabang = new CabangModel();
		$data = [
			'cabang' => $cabang->select('id_cabang, nama',)->findAll()
		];
        return view("Datamaster/v_user", $data);
    }
}
