<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class QuadroAvisos extends Model
{
    protected $table = 'quadro_avisos';

    protected $fillable = [
        'descricao',
        'processo_seletivo_id',
        'arquivo',
        'arquivo_caminho',
        'created_at',
        'updated_at'
    ];
}
