<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PerguntaAvaliacaoLideranca extends Model
{
    protected $table = 'pergunta_avaliacao_lideranca';

    protected $fillable = [
        'processo_seletivo_id',
        'avaliacao_lideranca_id',
        'candidato_id',
        'resposta',
        'pergunta'
    ];
}
