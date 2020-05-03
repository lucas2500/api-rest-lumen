<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Usuario;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;

class TokenController extends BaseController {


	public function GerarToken (Request $request) {

		// Valida o email e senha passados na requisição.
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required'
		]);

		$usuario = Usuario::where('email', $request->email)->first();

		// Verifica se o email e senha informados existem no db.
		if ($usuario != null && Hash::check($request->password, $usuario->password)) {

			// Caso o email e senha existam, o token é gerado.
			$token = JWT::encode(['email' => $request->email], env('JWT_KEY'));
			return response()->json(['access_token' => $token], 201);

		} else {

			return response()->json(['result' => 'Usuario ou senha invalidos'], 401);
		}

	}
	
}
