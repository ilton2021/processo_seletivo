<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProcessoCandidato extends Model
{
    protected $table = 'processo_candidato';
	
	protected $fillable = [
		'candidato_id',
		'processo_seletivo_id',
		'data_inscricao',
		'vaga_id',
		'created_at',
		'updated_at',
		'unidade_id'
	];
}
