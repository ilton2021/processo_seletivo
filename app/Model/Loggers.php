<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Loggers extends Model
{
    protected $table = 'loggers';
	
	protected $fillable = [
		'tela',
		'acao',
		'user_id',
		'unidade_id',
		'created_at',
		'updated_at'
	];
}
