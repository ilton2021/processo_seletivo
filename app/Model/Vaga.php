<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $table = 'vaga';
	
	protected $fillable = [
		'codigo_vaga',
		'nome',
		'categoria_profissional',
		'carga_horaria',
		'salario_bruto',
		'requisitos',
		'criterios',
		'insalubridade',
		'status',
		'processo_seletivo_id',
		'created_at',
		'updated_at',
		'taxa',
		'quantidade'
	];
}
