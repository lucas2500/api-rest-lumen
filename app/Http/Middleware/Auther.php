<?php

namespace App\Http\Middleware;
use Firebase\JWT\JWT;
use App\Usuario;
use Exception;

class Auther {

	public function handle($request, $next) {


		// Verifica se a autorização foi passada no header.
		if (!$request->hasHeader('Authorization')) {
			
			return response()->json(['result' => 'Nao autenticado!!'], 401);

		} else {
			// Captura o token passado no header.
			$AuthorizationHeader = $request->header('Authorization');

				// Trata a string para manter apenas o token.
			$token = str_replace('Bearer ', '', $AuthorizationHeader);
			
			try {

				// Efetua a decodificação do token para obter o email do usuário.
				// O parâmetro 'JWT_KEY' é parta da chave que compõe a string do token.
				$DataAuth = JWT::decode($token, env('JWT_KEY'), ['HS256']);
				$usuario =  Usuario::where('email', $DataAuth->email)->first();

				return $next($request);
				
			} catch (\Exception $e) {

				return response()->json(['result' => 'Token invalido'], 401);

			}

		}

	}

}