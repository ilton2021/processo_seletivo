<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DocumentosCandidatosDependentes extends Model
{
    protected $table = 'documentos_candidatos_dependentes';

    protected $fillable = [
        'id_processo_seletivo',
        'id_candidato',
        'id_documento',
        'caminho',
        'nome_arquivo',
        'status',
        'created_at',
        'updated_at'
    ];
}
