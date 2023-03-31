<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Perihal extends BaseController
{
	public function index()
	{
		return view("Datamaster/v_perihal");
	}
}
