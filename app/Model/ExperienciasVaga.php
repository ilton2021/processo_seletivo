<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ExperienciasVaga extends Model
{
    protected $table = 'experiencias_vaga';

    protected $fillable = [
        'descricao',
        'vaga_id',
        'processo_seletivo_id',
        'created_at',
        'updated_at'
    ];
}
