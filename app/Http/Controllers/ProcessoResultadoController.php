<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ProcessoResultado;
use App\Model\ProcessoSeletivo;
use App\Model\ProcessoCandidato;
use App\Model\Candidato;
use App\Model\Unidade;
use App\Exports\CandidatoExports;
use App\Model\Vaga;
use Illuminate\Support\Facades\DB;
use App\Model\Loggers;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use Validator;

class ProcessoResultadoController extends Controller
{
	// Página Resultado Processo Seletivo - Avaliação de Conhecimento //
    public function resultadoProcessosA($id, $id_candidato)
	{
		$processos = ProcessoSeletivo::where('id',$id)->get();
		$nome = $processos[0]->nome;
		$processos2 = DB::table('processo_seletivo_'.$nome)->where('id',$id_candidato)->get();
		$idP 	   = $id;
		$candidato = $id_candidato;
		$resultado = ProcessoResultado::where('candidato_id',$candidato)->where('processo_seletivo_id',$idP)->where('resultado',1)->get();
		return view('resultado_processosA', compact('processos','idP','candidato','resultado','processos2'));
	}

	// Página Resultado Processo Seletivo - Entrevista Profissional //
	public function resultadoProcessosE($id, $id_candidato)
	{
		$processos = ProcessoSeletivo::where('id',$id)->get(); 
		$nome = $processos[0]->nome;
		$processos2 = DB::table('processo_seletivo_'.$nome)->where('id',$id_candidato)->orderby('id','ASC')->get(); 
		$idP 	   = $id;
		$candidato = $id_candidato;
		$resultado = ProcessoResultado::where('candidato_id',$candidato)->where('processo_seletivo_id',$idP)->where('resultado',1)->get();
		return view('resultado_processosE', compact('processos','idP','candidato','resultado','processos2'));
	}

	// Página Resultado Processo Seletivo - Resultado //
	public function resultadoProcessosR($id, $id_candidato)
	{
		$processos = ProcessoSeletivo::where('id',$id)->get();
		$nome = $processos[0]->nome;
		$processos2 = DB::table('processo_seletivo_'.$nome)->where('id',$id_candidato)->get();
		$idP 	   = $id;
		$candidato = $id_candidato;
		$resultado = ProcessoResultado::where('candidato_id',$candidato)->where('processo_seletivo_id',$idP)->where('resultado',1)->get();
		return view('resultado_processosR', compact('processos','idP','candidato','resultado','processos2'));
	}

	// Página Resultado Processo Seletivo - Cadastro de Reserva //
	public function resultadoProcessosC($id, $id_candidato)
	{
		$processos = ProcessoSeletivo::where('id',$id)->get();
		$nome = $processos[0]->nome;
		$processos2 = DB::table('processo_seletivo_'.$nome)->where('id',$id_candidato)->get();
		$idP 	   = $id;
		$candidato = $id_candidato;
		$resultado = ProcessoResultado::where('candidato_id',$candidato)->where('processo_seletivo_id',$idP)->where('resultado',1)->get();
		return view('resultado_processosC', compact('processos','idP','candidato','resultado','processos2'));
	}
	
	public function informacoes($id, $id_candidato)
	{
		$processos  = ProcessoSeletivo::where('id', $id)->get();
		$nome 		= $processos[0]->nome;
		$processos2 = DB::table('processo_seletivo_'.$nome)->where('id',$id_candidato)->get();
		$idP  = $id;
		$candidato = $id_candidato;
		return view('informacoes', compact('candidato','processos','processos2','idP'));
	}
	
	// Página Cadastro de Resultados //
	public function cadastrarResultados($id)
	{
		$pseletivo  = ProcessoSeletivo::where('id',$id)->get();
		$candidatos = Candidato::all();
		$p_vagas = ProcessoCandidato::where('processo_seletivo_id',$id)->get();
		$vagas   = Vaga::all();
		$nome    = $pseletivo[0]->nome;
		$processos2 = DB::table('processo_seletivo_'.$nome)->orderby('nome', 'ASC')->paginate(10);
		$processos  = DB::table('processo_seletivo_'.$nome)
		->join('vaga', 'vaga.nome', '=', 'processo_seletivo_'.$nome.'.vaga')
		->select('processo_seletivo_'.$nome.'.*','vaga.id as IDVaga','vaga.nome as NomeVaga','processo_seletivo_'.$nome.'.nome as NomeCandidato','processo_seletivo_'.$nome.'.cpf as CPF','processo_seletivo_'.$nome.'.deficiencia as deficiencia','processo_seletivo_'.$nome.'.nome as nome','processo_seletivo_'.$nome.'.id as ID_CANDIDATO')
		->paginate(40);
		$unidades = Unidade::all();
		return view('cadastro_resultado_processos', compact('pseletivo','processos', 'candidatos','p_vagas','vagas','unidades','processos2'));
	}
	
	public function pesquisarCandidato($id, Request $request)
	{
		$input      = $request->all();
		$pseletivo  = ProcessoSeletivo::where('id',$id)->get();
		$candidatos = Candidato::all();
		$p_vagas    = ProcessoCandidato::where('processo_seletivo_id',$id)->get();
		$vagas 		= Vaga::all();
		$nome 	 	= $pseletivo[0]->nome;
		$processos  = DB::table('processo_candidato')
			->join('vaga', 'vaga.id', '=', 'processo_candidato.vaga_id')
			->join('processo_seletivo', 'processo_seletivo.id', '=', 'processo_candidato.processo_seletivo_id')
			->join('candidato', 'candidato.id', '=', 'processo_candidato.candidato_id')
			->select('processo_candidato.*','vaga.id as IDVaga','vaga.nome as NomeVaga','candidato.nome as NomeCandidato','candidato.cpf as CPF','candidato.deficiencia as deficiencia','processo_seletivo.nome as nome','candidato.id as ID_CANDIDATO')
			->where('processo_candidato.processo_seletivo_id', $id)
			->get()->toArray();
		if($input['pesq'] == NULL) {
			$processos2 = DB::table('processo_seletivo_'.$nome)->orderby('nome', 'ASC')->paginate(10);
		} else {
			$tipo = $input['tipo'];
			$pesq = $input['pesq'];
			if($tipo == 'nome'){
				$processos2 = DB::table('processo_seletivo_'.$nome)->orderby('nome', 'ASC')
				->where('nome', 'LIKE', '%' .$pesq. '%')->paginate(10);	
			} else {
				$processos2 = DB::table('processo_seletivo_'.$nome)->orderby('nome', 'ASC')
				->where('vaga', 'LIKE', '%' .$pesq. '%')->paginate(20);	
			}			
		}
		$unidades = Unidade::all();
		return view('cadastro_resultado_processos', compact('pseletivo','processos', 'candidatos','p_vagas','vagas','unidades','processos2'));
	}

	// Salvar Resultados //
	public function storeAvaliacaoA($id, $id_candidato, Request $request)
	{
		$idP  = $id;
		$candidato = $id_candidato;
		$input 	   = $request->all();
		$processoS = ProcessoSeletivo::where('id',$id)->get();
		$processos = ProcessoCandidato::where('id',$id_candidato)->get();
		$input['unidade_id'] = $processoS[0]->unidade_id;
		$modoA = $input['modoA']; 
		$modoE = $input['modoE']; 
		$modoR = $input['modoR'];
		$modoC = $input['modoC'];
		$validacao = 0;
		$nome = $processoS[0]->nome;
		$processos2 = DB::table('processo_seletivo_'.$nome)->where('id',$id_candidato)->get();	
		if($modoA == "Habilitado" || $modoA == "Desabilitado")
		{
			$validator = Validator::make($request->all(), [
				'modoA'   	      => 'required',
				'data_resultadoA' => 'required|date',
				'mensagemA'    	  => 'required|max:500'
			]);	
			if ($validator->fails()) {
				return view('resultado_processosA', compact('processos','idP','candidato','processos2'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
			} else {
					$input['data_resultadoA'] 	   = date('Y-m-d', strtotime($input['data_resultadoA']));
					$input['processo_seletivo_id'] = $id;
					$data_resultado = $input['data_resultadoA']; 
					$mensagem = $input['mensagemA']; 
					$processo = ProcessoSeletivo::where('id', $input['processo_seletivo_id'])->get();
					$nome = $processo[0]->nome;
					DB::statement("UPDATE processo_seletivo_".$nome." SET status_avaliacao = '$modoA', 
					data_avaliacao = '$data_resultado', 
					msg_avaliacao = '$mensagem' WHERE id = '$id_candidato' ");
					$input['user_id'] = Auth::user()->id;
					$loggers = Loggers::create($input);
					$validacao = 1;
				}
		}
		if ($modoE == "Habilitado" || $modoE == "Desabilitado")
		{
			$validator = Validator::make($request->all(), [
				'modoE'   	 	  => 'required',
				'data_resultadoE' => 'required|date',
				'mensagemE'    	  => 'required|max:500'
			]);	
			if ($validator->fails()) {
				return view('resultado_processosA', compact('processos','idP','candidato','processos2'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
			} else {
				$input['data_resultadoE'] 	   = date('Y-m-d', strtotime($input['data_resultadoE']));
				$input['processo_seletivo_id'] = $id;
				$data_resultado = $input['data_resultadoE'];
				$mensagem = $input['mensagemE'];
				$processo = ProcessoSeletivo::where('id', $input['processo_seletivo_id'])->get();
				$nome = $processo[0]->nome;
				DB::statement("UPDATE processo_seletivo_".$nome." SET status_entrevista = '$modoE', 
				data_entrevista = '$data_resultado', 
				msg_entrevista = '$mensagem' WHERE id = '$id_candidato' ");
				$input['user_id'] = Auth::user()->id;
				$loggers = Loggers::create($input);
				$validacao = 1;
			}
		}
		if ($modoR != 0)
		{
			$validator = Validator::make($request->all(), [
				'modoR'   	 	 => 'required',
				'mensagemR'    	 => 'required|max:500'
			]);
			if ($validator->fails()) {
				return view('resultado_processosA', compact('processos','idP','candidato','processos2'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
			} else {
				$input['processo_seletivo_id'] = $id;
				if($input['modoR'] == 3){
					$modo = "Aprovado (a)";	
				} else if($input['modoR'] == 4) {
					$modo = "Não Aprovado (a)";
				} else if($input['modoR'] == 5) {
					$modo = "Cadastro de Reserva";
				} else if($input['modoR'] == 6) {
					$modo = "Desistente";
				} else if($input['modoR'] == 7) {
					$modo = "Desabilitado";
				}				
				$mensagem = $input['mensagemR'];
				$processo = ProcessoSeletivo::where('id', $input['processo_seletivo_id'])->get();
				$nome = $processo[0]->nome;
				DB::statement("UPDATE processo_seletivo_".$nome." SET status_resultado = '$modo', 
				msg_resultado = '$mensagem' WHERE id = '$id_candidato' ");
				$input['user_id'] = Auth::user()->id;
				$loggers = Loggers::create($input);
				$validacao = 1;
			}
		}
		if ($modoC == "Habilitado" || $modoC == "Desabilitado")
		{
			$validator = Validator::make($request->all(), [
				'modoC'   	 	  => 'required',
				'data_resultadoC' => 'required|date',
				'mensagemC'    	  => 'required|max:500'
			]);
			if ($validator->fails()) {
				return view('resultado_processosA', compact('processos','idP','candidato','processos2'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
			} else {
				$input['data_resultadoC'] 	   = date('Y-m-d', strtotime($input['data_resultadoC']));
				$input['processo_seletivo_id'] = $id;
				$data_resultado = $input['data_resultadoC'];
				$mensagem = $input['mensagemC'];
				$processo = ProcessoSeletivo::where('id', $input['processo_seletivo_id'])->get();
				$nome = $processo[0]->nome;
				DB::statement("UPDATE processo_seletivo_".$nome." SET status_convocacao = '$modoC',
				data_convocacao = '$data_resultado',
				msg_convocacao = '$mensagem' WHERE id = '$id_candidato' ");
				$input['user_id'] = Auth::user()->id;
				$loggers = Loggers::create($input);
				$validacao = 1;
			}					
		}	
		if($validacao == 1)
		{
			$processos = ProcessoSeletivo::all();
			$id_candidato = $id_candidato;
			$validator = 'Resultado cadastrado com sucesso!';
			return redirect()->route('cadastrarResultados', [$id]);
		} 
		else 
		{
			$validator = 'Informe o Resultado do Processo Seletivo!';
			return view('resultado_processosA', compact('processos','idP','candidato','processos2'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
		}	
	}
	
	public function exportCandidatos($id, $nome) 
    {
		$nome = $nome;
		return (new CandidatoExports($id, $nome))->download('candidatos.csv', \Maatwebsite\Excel\Excel::CSV, [
              'Content-Type' => 'text/csv',
        ]);
    }
}