<?php

namespace App\Http\Controllers;

use App\Cliente;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class ClientesController extends BaseController {

	public function index() {

		$clientes = Cliente::all();

		return response()->json(['result' => $clientes], 200);
	}

	public function store(Request $request) {

		// $data = [
		// 	'nome' => $request->nome,
		// 	'email' => $request->email,
		// 	'endereco' => $request->endereco
		// ];

		$create = Cliente::create($request->all());

		return response()->json(['result' => $create], 201);
	}

	public function show(int $id) {
		$cliente =  Cliente::find($id);

		if ($cliente != null) {
			return response()->json(['result' => $cliente], 200);

		} else {
			return response()->json('', 204);
		}
	}

	public function update(int $id, Request $request) {

		$cliente = Cliente::find($id);

		if ($cliente != null) {
			$cliente->fill($request->all());
			$cliente->save();
			return response()->json(['result' => $cliente], 200);

		} else {
			return response()->json(['erro' => 'O cliente referente ao ID '.$id. ' nao esta cadastrado!!'], 404);
		}
	}

	public function destroy(int $id){

		$cliente = Cliente::find($id);

		if ($cliente != null){
			Cliente::destroy($id);
			return response()->json(['result' => 'O cliente '.$cliente->nome. ' foi excluido com sucesso!!'], 200);

		} else {
			return response()->json(['erro' => 'O cliente referente ao ID '.$id. ' nao esta cadastrado!!'], 404);
		}

	}
}
