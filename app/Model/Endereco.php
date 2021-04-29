<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'endereco';
	
	protected $fillable = [
		'id_tabela',
		'id_interno',
		'rua',
		'numero',
		'bairro',
		'cidade',
		'estado',
		'pais',
		'cep',
		'complemento',
		'created_at',
		'updated_at'
	];
}
