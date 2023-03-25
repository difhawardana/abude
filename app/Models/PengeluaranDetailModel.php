<?php

namespace App\Models;

use CodeIgniter\Model;

class PengeluaranDetailModel extends Model
{
    protected $table            = 'pengeluaran_detail';
    protected $primaryKey       = 'id_pengeluaran_detail';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_pengeluaran','id_barang','jumlah','harga','subtotal',];
}
