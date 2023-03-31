<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{

    public function index()
    {
        return view('Auth/v_login');
    }

    public function login()
    {
        return view('Auth/v_login');
    }



    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('Auth/login');
    }


}
