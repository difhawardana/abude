<?php

namespace App\Controllers\API;

use App\Models\SupplierModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Supplier extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $model = new SupplierModel();
        $data = $model->findAll();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Supplier dengan id tersebut tidak ditemukan');
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new SupplierModel();
        $data = $model->getWhere(['id_supplier'  => $id])->getResult();
        return $this->respond($data);
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
        $model = new SupplierModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'nama_supplier' => $json->nama_supplier
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'nama_supplier' => $input['nama_supplier'],
            ];
        }
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Supplier berhasil ditambah.'
            ]
        ];
        return $this->respondCreated($response, 201);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */

    public function update($id = null)
    {
        $model = new SupplierModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'nama_supplier' => $json->nama_supplier
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'nama_supplier' => $input['nama_supplier'],
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

    public function delete($id = null)
    {
        $model = new SupplierModel();
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
            return $this->failNotFound('Supplier dengan id tersebut tidak ditemukan!');
        }
    }
}
