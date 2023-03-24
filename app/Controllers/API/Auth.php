<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Models\UserModel;
use \Firebase\JWT\JWT;
use CodeIgniter\API\ResponseTrait;

class Auth extends BaseController
{

    public function index()
    {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }



    public function login()
    {
        $data = $this->request->getJSON();
        // return $this->response->setJSON($data);
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

        // if (!$this->validate($rules)) {
        //     return $this->response->setJSON(['success' => false, 'message' => \Config\Services::validation()->getErrors()]);
        // }

        $UserModel = new UserModel();
        $user = $UserModel->where('username', $data->username)->first();
        if ($user) {

            if (md5($data->password) == $user->password) {
                $key = getenv('JWT_SECRET');
                $iat = time(); // current timestamp value
                $exp = $iat + 3600;

                $payload = array(
                    "iss" => "Issuer of the JWT",
                    "aud" => "Audience that the JWT",
                    "sub" => "Subject of the JWT",
                    "iat" => $iat, //Time the JWT issued at
                    "exp" => $exp, // Expiration time of token
                    "username" => $user->username,
                );

                $token = JWT::encode($payload, $key, 'HS256');
                $data = [
                    'role' => $user->role,
                    'id_perusahaan' => $user->id_perusahaan,
                    'id_cabang' => $user->id_cabang,
                    'username' => $user->username,
                    'token' => $token
                ];
                session()->set($data);

                return $this->response->setJSON(['success' => true, 'token' => $token]);
            }
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'User not found'])->setStatusCode(409);
        }
    }
}
