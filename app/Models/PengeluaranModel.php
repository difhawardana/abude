<?php

namespace App\Models;

use CodeIgniter\Model;

class PengeluaranModel extends Model
{
    protected $table            = 'pengeluaran';
    protected $primaryKey       = 'id_pengeluaran';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_cabang','kode_pengeluaran','tanggal','waktu','total_harga','total_jumlah','created_at'];
}
