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
                'jumlah' => $json->jumlah,
                'harga' => $json->harga,
                'subtotal' => $json->subtotal,
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
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

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
}
