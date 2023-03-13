<?php

namespace App\Models;

use CodeIgniter\Model;

class CabangModel extends Model
{
    protected $table            = 'cabang';
    protected $primaryKey       = 'id_cabang';
    protected $allowedFields    = ['id_perusahaan','nama','kode','created_at'];
}
