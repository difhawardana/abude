<?php

namespace App\Controllers\API;

use App\Models\BarangModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Barang extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $model = new BarangModel();
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
        $model = new BarangModel();
        $data = $model->getWhere(['id_barang'  => $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Barang dengan id tersebut tidak ditemukan');
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
        $model = new BarangModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'nama_barang' => $json->nama_barang,
                'harga_barang' => $json->harga_barang,
                'satuan' => $json->satuan,
                'id_cabang' => $json->id_cabang
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'nama_barang' => $input['nama_barang'],
                'harga_barang' => $input['harga_barang'],
                'satuan' => $input['satuan'],
                'id_cabang' => $input['id_cabang']
            ];
        }
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Barang berhasil ditambah.'
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
        $model = new BarangModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'nama_barang' => $json->nama_barang,
                'harga_barang' => $json->harga_barang,
                'satuan' => $json->satuan,
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'nama_barang' => $input['nama_barang'],
                'harga_barang' => $input['harga_barang'],
                'satuan' => $input['satuan']
            ];
        }
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Berhasil mengupdate barang!'
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
        $model = new BarangModel();
        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Barang berhasil dihapus'
                ]
            ];

            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Barang dengan id tersebut tidak ditemukan!');
        }
    }
}
