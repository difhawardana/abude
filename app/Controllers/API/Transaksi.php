<?php

namespace App\Controllers\API;

use App\Models\TransaksiModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Transaksi extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $model = new TransaksiModel();
        $data = $model->findAll();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Transaksi dengan id tersebut tidak ditemukan');
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new TransaksiModel();
        $data = $model->getWhere(['id_transaksi'  => $id])->getResult();
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
        $model = new TransaksiModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'kode_transaksi' => $json->kode_transaksi,
                'tanggal' => $json->tanggal,
                'jam' => $json->jam,
                'total_harga' => $json->total_harga,
                'total_jumlah' => $json->total_jumlah,
                'id_cabang' => $json->id_cabang
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'kode_transaksi' => $input['kode_transaksi'],
                'tanggal' => $input['tanggal'],
                'jam' => $input['jam'],
                'total_harga' => $input['total_harga'],
                'total_jumlah' => $input['total_jumlah'],
                'id_cabang' => $input['id_cabang']
            ];
        }
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Transaksi berhasil ditambah.'
            ]
        ];
        return $this->respondCreated($response, 201);
    }

    public function update($id = null)
    {
        $model = new TransaksiModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'kode_transaksi' => $json->kode_transaksi,
                'tanggal' => $json->tanggal,
                'jam' => $json->jam,
                'total_harga' => $json->total_harga,
                'total_jumlah' => $json->total_jumlah,
                'id_cabang' => $json->id_cabang
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'kode_transaksi' => $input['kode_transaksi'],
                'tanggal' => $input['tanggal'],
                'jam' => $input['jam'],
                'total_harga' => $input['total_harga'],
                'total_jumlah' => $input['total_jumlah'],
                'id_cabang' => $input['id_cabang']
            ];
        }
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Berhasil mengupdate Transaksi!'
            ],
        ];
        return $this->respond($response);
    }

    public function delete($id = null)
    {
        $model = new TransaksiModel();
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
