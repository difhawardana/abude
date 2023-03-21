<?php

namespace App\Controllers\API;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class User extends BaseController
{

    use ResponseTrait;

    public function index()
    {
        $model = new UserModel();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id)
    {
        $model = new UserModel();
        $user = $model->where('id', $id)->first();
        if ($user) {
            return $this->respond($user);
        } else {
            return $this->failNotFound('User dengan id tersebut tidak ditemukan');
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
    }

    public function create()
    {

        if( !$this->validate([
			'username' 	    => 'required|is_unique[m_users.username]',
			'password' 	    => 'required',
			'role'	   	    => 'required',
			'id_cabang'	    => 'required',
			'id_perusahaan'	=> 'required'
		]))
		{
			return $this->response->setJSON(['success' => false, 'data' => null, "message" => \Config\Services::validation()->getErrors()]);
		}

        $insert = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
			'role' => $this->request->getVar('role'),
			'id_cabang' => $this->request->getVar('id_cabang'),
			'id_perusahaan' => $this->request->getVar('id_perusahaan'),
        ];

        $model = new UserModel();
		$save  = $model->insert($insert);
		
		return $this->setResponseFormat('json')->respondCreated( ['sucess'=> true, 'mesage' => 'OK'] );

        $model = new UserModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'username' => $json->username,
                'password' => $json->password,
                'role' => $json->role,
                'id_cabang' => $json->id_cabang,
                'id_perusahaan' => $json->id_perusahaan,
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'username'     => $input['username'],
                'password'     => $input['password'],
                'role'         => $input['role'],
                'id_cabang'    => $input['id_cabang'],
                'id_persahaan' => $input['id_perusahaan']
            ];
        }
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'User berhasil ditambah.'
            ]
        ];
        return $this->respondCreated($response, 201);
    }

    public function edit($id = null)
    {
        //
    }

    public function update($id)
	{
		if (! $this->validate([
            'username' => 'permit_empty|is_unique[m_users.username,id,'.$id.']',
            'password' => 'permit_empty',
			'role' => 'permit_empty',
			// 'id_cabang' => 'permit_empty',
			// 'id_perusahaan' => 'permit_empty',
        ])) {
            return $this->response->setJSON(['success' => false, "message" => \Config\Services::validation()->getErrors()]);
        }

        $model = new UserModel();
		$exist = $model->where('id', $id)->first();

		if( !$exist )
		{
			return $this->response->setJSON(['success' => false, "message" => 'User tidak ditemukan']);
		}
		
        $update = [
            'username' => $this->request->getVar('username') ? $this->request->getVar('username') : $exist['username'],
            'password' => $this->request->getVar('password') ? password_hash($this->request->getVar('password'), PASSWORD_DEFAULT) : $exist['password'],
			'role' => $this->request->getVar('role') ? $this->request->getVar('role') : $exist['role'],
			// 'id_cabang' => $this->request->getVar('id_cabang')  ? $this->request->getVar('id_cabang') : $exist['id_cabang'],
			// 'id_perusahaan' => $this->request->getVar('id_perusahaan') ? $this->request->getVar('id_perusahaan') : $exist['id_perusahaan']
        ];

        $model = new UserModel;
        $save  = $model->update( $id, $update);

        return $this->response->setJSON(['success' => true,'message' => 'OK']);
	}

    public function delete($id = null)
    {
        $model = new UserModel();
        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'User berhasil dihapus'
                ]
            ];

            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('User dengan id tersebut tidak ditemukan!');
        }
    }
}