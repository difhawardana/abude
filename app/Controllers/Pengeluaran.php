<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pengeluaran extends BaseController
{
    public function index()
    {
        return view("Aktivitas/v_pengeluaran");
    }
}
