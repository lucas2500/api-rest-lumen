<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

	public $timestamps = false;
	protected $table = 'clientes';
	protected $fillable = ['nome', 'email', 'endereco'];
	// protected $perPage = 10;
	protected $appends = ['links'];


	public function getLinksAttribute($links): array {

		return [
			'self' => '/api/clientes/' .$this->id
		];
	}

}