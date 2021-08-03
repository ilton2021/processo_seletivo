<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PerguntaAvaliacaoOperacional extends Model
{
    protected $table = 'pergunta_avaliacao_operacional';

    protected $fillable = [
        'processo_seletivo_id',
        'avaliacao_operacional_id',
        'candidato_id',
        'resposta',
        'pergunta'
    ];
}
