<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = "estado";

    protected $fillable = [
        'nome',
        'sigla',
        'updated_at',
        'created_at'
    ];
}
