<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    protected $table = 'cargos';

    protected $fillable = [
        'codigo_cargo',
        'nome',
        'created_at',
        'updated_at'
    ];
}
