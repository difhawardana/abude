<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'id_barang';
    protected $allowedFields    = ['nama_barang','harga_barang','satuan','status','id_cabang','id_supplier','created_at'];

    // // Validation
    // protected $validationRules      = [
    //     'nama_barang' => 'required',
    //     'harga_barang' => 'required',
    //     'satuan' => 'required'
    // ];
    // protected $validationMessages   = [
    //     'nama_barang' => [
    //         'required' => 'Silakan masukkan nama barang'
    //     ],
    //     'harga_barang' => [
    //         'required' => 'Silakan masukkan harga barang'
    //     ],
    //     'satuan' => [
    //         'required' => 'Silakan masukkan satuan barang'
    //     ],
        
    // ];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}
