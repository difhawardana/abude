<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    public function __construct()
	{
		helper(['form', 'url']);
		$this->userModel = new UserModel();
	}

    public function index()
    {
        return view("Datamaster/v_user");
    }

    public function store()
	{
		$data = [
			'username' => $this->request->getVar('username'),
			'password' => $this->request->getVar('password'),
			'role' => $this->request->getVar('role'),
		];

		$result = $this->userModel->save($data);
		if ($result) {
			return $this->response->setJSON(['status' => 'success', 'message' => 'Berhasil menambahkan barang']);
		}
		return $this->response->setJSON(['status' => 'failed', 'message' => 'Gagal menambahkan barang']);
	}

}
