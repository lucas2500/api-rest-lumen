<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
	return $router->app->version();
});


$router->group(['prefix' => '/api', 'middleware' => 'auther'], function () use ($router) {

//O primeiro parâmetro recebe o nome do método que será acessado na URL
//O segundo parâmetro recebe o nome do arquivo do controller + o nome do método
	// $router->get('/clientes','ClientesController@index');
	// $router->get('/clientes', 'ClientesController@store');
	$router->get('clientes','ClientesController@index');
	$router->get('clientes/{id}','ClientesController@show');
	$router->post('clientes', 'ClientesController@store');
	$router->put('clientes/{id}', 'ClientesController@update');
	$router->delete('clientes/{id}', 'ClientesController@destroy');
});

$router->post('/api/login', 'TokenController@GerarToken');
