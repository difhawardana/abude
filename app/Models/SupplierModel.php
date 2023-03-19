<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table            = 'supplier';
    protected $primaryKey       = 'id_supplier';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_supplier'];
}
