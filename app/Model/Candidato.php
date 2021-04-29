<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $table = 'candidato';
	
    protected $fillable = [
		'nome',
		'cpf',
		'email',
		'fone_fixo',
		'celular',
		'naturalidade',
		'estado_nasc',
		'cidade_nasc',
		'data_nasc',
		'escolaridade',
		'status_escolaridade',
		'formacao',
		'cursos',
		'sexo',
		'estado_civil',
		'deficiencia',
		'arquivo_deficiencia',
		'arquivo_ctps1',
		'habilitacao',
		'periodo',
		'outra_cidade',
		'arquivo',
		'created_at',
		'updated_at'
	];
}
