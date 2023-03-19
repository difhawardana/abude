<?php

namespace App\Models;

use CodeIgniter\Model;

class PerusahaanModel extends Model
{
    protected $table            = 'perusahaan';
    protected $primaryKey       = 'id_perusahaan';
    protected $allowedFields    = ['nama','kode','created_at'];
}
