<?php

namespace App\Controllers\API;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class User extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
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
    public function show($id = null)
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
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new UserModel();
        $json = $this->request->getJSON();

        if ($json) {
            $data = [
                'username' => $json->username,
                'password' => md5($json->password),
                'role' => $json->role,
                'id_cabang' => $json->id_cabang,
                'id_perusahaan' => $json->id_perusahaan,
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'username'     => $input['username'],
                'password'     => md5($input['password']),
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

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate([
            'username' => 'permit_empty|is_unique[m_users.username,id,' . $id . ']',
            'password' => 'permit_empty',
            'role' => 'permit_empty',
            // 'id_cabang' => 'permit_empty',
            // 'id_perusahaan' => 'permit_empty',
        ])) {
            return $this->response->setJSON(['success' => false, "message" => \Config\Services::validation()->getErrors()]);
        }

        $model = new UserModel();
        $exist = $model->where('id', $id)->first();

        if (!$exist) {
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
        $save  = $model->update($id, $update);

        return $this->response->setJSON(['success' => true, 'message' => 'OK']);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
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
