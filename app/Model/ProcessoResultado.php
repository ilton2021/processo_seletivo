<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProcessoResultado extends Model
{
    protected $table = 'processo_resultado';
	
	protected $fillable = [
		'processo_seletivo_id',
		'candidato_id',
		'resultado',
		'data_resultado',
		'created_at',
		'updated_at',
		'mensagem',
		'modo',
		'vaga_id',
		'unidade_id'
	];
}
