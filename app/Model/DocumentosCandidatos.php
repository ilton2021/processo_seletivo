<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DocumentosCandidatos extends Model
{
    protected $table = 'documentos_candidatos';

    protected $fillable = [
        'id_processo_seletivo',
        'id_candidato',
        'id_documento',
        'caminho',
        'nome_arquivo',
        'created_at',
        'updated_at'
    ];
}
