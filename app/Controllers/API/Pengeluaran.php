<?php

namespace App\Controllers\API;

use App\Models\PengeluaranModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Pengeluaran extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $model = new PengeluaranModel();
        $data = $model->findAll();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Pengeluaran dengan id tersebut tidak ditemukan');
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new PengeluaranModel();
        $data = $model->getWhere(['id_pengeluaran'  => $id])->getResult();
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
        $model = new PengeluaranModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'id_cabang' => $json->id_cabang,
                'kode_pengeluaran' => $json->kode_pengeluaran,
                'tanggal' => $json->tanggal,
                'waktu' => $json->waktu,
                'total_harga' => $json->total_harga,
                'total_jumlah' => $json->total_jumlah
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'id_cabang' => $input['id_cabang'],
                'kode_pengeluaran' => $input['kode_pengeluaran'],
                'tanggal' => $input['tanggal'],
                'waktu' => $input['waktu'],
                'total_harga' => $input['total_harga'],
                'total_jumlah' => $input['total_jumlah'],
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
        $model = new PengeluaranModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'id_cabang' => $json->id_cabang,
                'kode_pengeluaran' => $json->kode_pengeluaran,
                'tanggal' => $json->tanggal,
                'waktu' => $json->waktu,
                'total_harga' => $json->total_harga,
                'total_jumlah' => $json->total_jumlah            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'id_cabang' => $input['id_cabang'],
                'kode_pengeluaran' => $input['kode_pengeluaran'],
                'tanggal' => $input['tanggal'],
                'waktu' => $input['waktu'],
                'total_harga' => $input['total_harga'],
                'total_jumlah' => $input['total_jumlah'],            ];
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
        $model = new PengeluaranModel();
        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Pengeluaran berhasil dihapus'
                ]
            ];

            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Pengeluaran dengan id tersebut tidak ditemukan!');
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
}
