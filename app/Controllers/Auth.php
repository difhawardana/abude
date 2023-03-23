<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class Auth extends BaseController
{
    // public function __construct()
    // {
    //     $this->model = new UserModel();
    // }

    public function index()
    {
        return view('Auth/v_login');
    }

    public function login()
    {
        return view('Auth/v_login');
    }

    // public function loginUser()
    // {
    //     $session = session();
    //     if( !$this->validate([
    // 		'username' 	=> 'required',
    // 		'password' 	=> 'required',
    // 	]))
    // 	{
    // 		return $this->response->setJSON(['success' => false, 'data' => null, "message" => \Config\Services::validation()->getErrors()]);
    // 	}

    //     $model = new UserModel;
    // 	$user  = $model->where('username', $this->request->getVar('username'))->first();
    // 	if( $user )
    // 	{
    // 		if( password_verify($this->request->getVar('password'), $user['password']) )
    // 		{
    // 			$jwt = new JWTCI4;
    // 			$token = $jwt->token();

    // 			return $this->response->setJSON( ['token'=> $token ] );
    // 		}
    // 	}else{

    // 		return $this->response->setJSON( ['success'=> false, 'message' => 'User tidak ditemukan' ] )->setStatusCode(409);
    // 	}
    // }


    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('Auth/login');
    }


}
