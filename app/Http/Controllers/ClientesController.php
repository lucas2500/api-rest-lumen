<?php

namespace App\Http\Controllers;

use App\Cliente;
use Laravel\Lumen\Routing\Controller as BaseController;

class ClientesController extends BaseController 
{

	public function index () 
	{

		return Cliente::all();

	}
}
