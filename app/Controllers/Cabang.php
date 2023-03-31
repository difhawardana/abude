<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Cabang extends BaseController
{
    public function index()
    {
        return view("Datamaster/v_cabang");
    }
}
