<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Perusahaan extends BaseController
{
	public function index()
	{
		return view("Datamaster/v_perusahaan");
	}
}
