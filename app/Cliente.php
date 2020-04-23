<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

	public $timestamp = false;
	protected $table = 'clientes';
	protected $fillable = ['nome'];

}