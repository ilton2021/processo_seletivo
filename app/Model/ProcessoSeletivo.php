<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProcessoSeletivo extends Model
{
    protected $table = 'processo_seletivo';
	
	protected $fillable = [
		'nome',
		'edital',
		'edital_caminho',
		'unidade_id',
		'inscricao_inicio',
		'inscricao_fim',
		'data_prova',
		'data_resultado',
		'origem',
		'created_at',
		'updated_at'
	];
}
