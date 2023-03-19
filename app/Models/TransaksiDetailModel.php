<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiDetailModel extends Model
{
    protected $table            = 'transaksi_detail';
    protected $primaryKey       = 'id_transaksi_detail';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_transaksi','id_barang','jumlah','harga','subtotal',];
}
