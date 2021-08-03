<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AvaliacaoLideranca extends Model
{
    protected $table = 'avaliacao_lideranca';

    protected $fillable = [
        'nome',
        'cpf',
        'cargo',
        'email',
        'funcao',
        'setor',
        'data',
        'justificativa_rh',
        'justificativa_gestor',
        'processo_seletivo_id',
        'id_candidato',
        'created_at',
        'updated_at'
    ];  
}
