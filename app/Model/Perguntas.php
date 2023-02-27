<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Perguntas extends Model
{
    protected $table = "perguntas";

    protected $fillable = [
        'descricao',
        'created_at',
        'updated_at'
    ];  
}
