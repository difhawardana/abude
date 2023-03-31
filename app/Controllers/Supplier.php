<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Supplier extends BaseController
{
    public function index()
    {
        return view("Datamaster/v_supplier");
    }
}
