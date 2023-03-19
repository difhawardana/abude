<?php

namespace App\Models;

use CodeIgniter\Model;

class PerihalModel extends Model
{
    protected $table            = 'perihal';
    protected $primaryKey       = 'id_perihal';
    protected $allowedFields    = ['nama_perihal', 'created_at'];
}
