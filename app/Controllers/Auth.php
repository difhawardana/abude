<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function index()
    {
        return view('Auth/v_login');
    }

    public function login()
    {
        return view('Auth/v_login');
    }

    public function loginUser()
    {
        $session = session();
        $rules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username tidak boleh kosong!',
                ],
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong!',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $find = $this->model->where('username', $this->request->getPost('username'))->first();

        if (!$find) {
            return redirect()->back()->with('error', 'Username atau Password salah!');
        }

        if (!hash_equals($find->password, md5($this->request->getPost('password')))) {
            return redirect()->back()->with('error', 'Username atau Password salah!');
        }

        $data = [
            'id_user' => $find->id_user,
            'username' => $find->username,
            'role'     => $find->role,
        ];

        $session->set($data);

        if ($find->role == 'SuperAdmin') {
            return redirect()->to('Dashboard');
        }

        // if ($find->role == 'user') {
        //     return redirect()->to('PesanLaundry');
        // }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('Auth/login');
    }

}
