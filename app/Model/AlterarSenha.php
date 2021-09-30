<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AlterarSenha extends Model
{
    protected $table = 'alterar_senha';

    protected $fillable = [
        'token',
        'user_id',
        'create_at',
        'updated_at'
    ];
}
