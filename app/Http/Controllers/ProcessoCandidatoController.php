<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ProcessoCandidato;
use App\Model\ProcessoSeletivo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProcessoCandidatoController extends Controller
{
	public function __construct()
	{
		
	}
	
	// Página Número de Inscritos - Processo Seletivo //
    public function numeroInscritos($id)
	{
		$processos = ProcessoCandidato::where('processo_seletivo_id', $id)->get();
		$processo = ProcessoSeletivo::where('id', $id)->get();
		$nome = $processo[0]->nome;
		$processos2 = DB::table('processo_seletivo_'.$nome)->get();
		$vagas = DB::select("SELECT count(vaga) as count, vaga FROM processo_seletivo_".$nome." group by vaga");
		$qtd = sizeof($processos2);
		$text = false;
		return view('numero_inscritos', compact('text', 'processos','qtd','processo','vagas'));
	}
}
