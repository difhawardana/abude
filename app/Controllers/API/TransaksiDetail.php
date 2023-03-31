<?php

namespace App\Controllers\API;

use App\Models\TransaksiDetailModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class TransaksiDetail extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $model = new TransaksiDetailModel();
        $data = $model->findAll();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Transaksi detail dengan id tersebut tidak ditemukan');
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new TransaksiDetailModel();
        $data = $model->getWhere(['id_transaksi_detail'  => $id])->getResult();
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
        $model = new TransaksiDetailModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'id_transaksi' => $json->id_transaksi,
                'id_barang' => $json->id_barang,
                'jumlah' => $json->jumlah,
                'harga' => $json->harga,
                'subtotal' => $json->subtotal,
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'id_transaksi' => $input['id_transaksi'],
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
                'success' => 'Transaksi detail berhasil ditambah.'
            ]
        ];
        return $this->respondCreated($response, 201);
    }

    public function update($id = null)
    {
        $model = new TransaksiDetailModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'id_transaksi' => $json->id_transaksi,
                'id_barang' => $json->id_barang,
                'jumlah' => $json->jumlah,
                'harga' => $json->harga,
                'subtotal' => $json->subtotal,
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'id_transaksi' => $input['id_transaksi'],
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
                'success' => 'Berhasil mengupdate Transaksi detail!'
            ],
        ];
        return $this->respond($response);
    }

    public function delete($id = null)
    {
        $model = new TransaksiDetailModel();
        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Transaksi berhasil dihapus'
                ]
            ];

            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Transaksi dengan id tersebut tidak ditemukan!');
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
}
