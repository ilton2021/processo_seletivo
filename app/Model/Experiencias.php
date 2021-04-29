<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Experiencias extends Model
{
    protected $table = 'experiencias';
	
	protected $fillable = [
		'candidato_id',
		'empresa',
		'cargo',
		'atribuicao',
		'comentario',
		'data_inicio',
		'data_fim',
		'created_at',		
		'updated_at'
	];
}
