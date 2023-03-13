<?php

namespace App\Controllers\API;

use App\Models\CabangModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Cabang extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $model = new CabangModel();
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
        $model = new CabangModel();
        $data = $model->getWhere(['id_cabang'  => $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Cabang dengan id tersebut tidak ditemukan');
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

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new CabangModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'nama' => $json->nama,
                'kode' => $json->kode,
                'id_perusahaan' => $json->id_perusahaan
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'nama' => $input['nama'],
                'kode' => $input['kode'],
                'id_perusahaan' => $input['id_perusahaan']
            ];
        }
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Cabang berhasil ditambah.'
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
        $model = new CabangModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'nama' => $json->nama,
                'kode' => $json->kode,
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'nama' => $input['nama'],
                'kode' => $input['kode'],
            ];
        }
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Berhasil mengupdate Cabang!'
            ],
        ];
        return $this->respond($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new CabangModel();
        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Cabang berhasil dihapus'
                ]
            ];

            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Cabang dengan id tersebut tidak ditemukan!');
        }
    }
}