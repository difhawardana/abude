<?php

namespace App\Controllers\API;

use App\Models\PengeluaranDetailModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class PengeluaranDetail extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $model = new PengeluaranDetailModel();
        $data = $model->findAll();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Pengeluaran detail dengan id tersebut tidak ditemukan');
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new PengeluaranDetailModel();
        $data = $model->getWhere(['id_pengeluaran_detail'  => $id])->getResult();
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
        $model = new PengeluaranDetailModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'id_pengeluaran' => $json->id_pengeluaran,
                'id_barang' => $json->id_barang,
                'jumlah' => $json->jumlah,
                'harga' => $json->harga,
                'subtotal' => $json->subtotal,
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'id_pengeluaran' => $input['id_pengeluaran'],
                'id_barang' => $input['id_barang'],
                'jumlah' => $input['jumlah'],
                'harga' => $input['harga'],
                'subtotal' => $input['subtotal'],
            ];
        }
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Pengeluaran berhasil ditambah.'
            ]
        ];
        return $this->respondCreated($response, 201);
    }

    public function update($id = null)
    {
        $model = new PengeluaranDetailModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'id_pengeluaran' => $json->id_pengeluaran,
                'id_barang' => $json->id_barang,
                'jumlah' => $json->jumlah,
                'harga' => $json->harga,
                'subtotal' => $json->subtotal,
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'id_pengeluaran' => $input['id_pengeluaran'],
                'id_barang' => $input['id_barang'],
                'jumlah' => $input['jumlah'],
                'harga' => $input['harga'],
                'subtotal' => $input['subtotal'],  
            ];
        }
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Berhasil mengupdate Pengeluaran Detail!'
            ],
        ];
        return $this->respond($response);
    }

    public function delete($id = null)
    {
        $model = new PengeluaranDetailModel();
        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Pengeluaran detail berhasil dihapus'
                ]
            ];

            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Pengeluaran detail dengan id tersebut tidak ditemukan!');
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
}
