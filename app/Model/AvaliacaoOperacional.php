<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AvaliacaoOperacional extends Model
{
    protected $table = 'avaliacao_operacional';

    protected $fillable = [
        'nome',
        'matricula',
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
