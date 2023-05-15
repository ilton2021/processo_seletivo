<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ProcessoCandidato;
use App\Model\ProcessoSeletivo;
use App\Model\PerguntaAvaliacaoLideranca;
use App\Model\PerguntaAvaliacaoOperacional;
use App\Model\AvaliacaoLideranca;
use App\Model\AvaliacaoOperacional;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Mail;

class ProcessoCandidatoController extends Controller
{
	// Página Número de Inscritos - Processo Seletivo //
    public function numeroInscritos($id)
	{
		$processos = ProcessoCandidato::where('processo_seletivo_id', $id)->get();
		$processo = ProcessoSeletivo::where('id', $id)->get();
		$nome = $processo[0]->nome;
		$processos2 = DB::table('processo_seletivo_'.$nome)->get();
		$vagas = DB::select("SELECT count(vaga) as count, vaga FROM processo_seletivo_".$nome." group by vaga");
		$qtd = sizeof($processos2);
		return view('numero_inscritos', compact('processos','qtd','processo','vagas'));
	}

	//Página de Avaliação
	public function avaliacao($id,$id_c)
	{
		$processos = ProcessoSeletivo::where('id',$id)->get();
		$nomeP     = $processos[0]->nome;
		$candidato = DB::table('processo_seletivo_'.$nomeP)->where('id',$id_c)->get(); 
		return view('avaliacao/avaliacao', compact('processos','candidato'));
	}

	//Página de Avaliação Gestor de Liderança
	public function avaliacaoGestorLideranca($id, $id_c)
	{
		$processos = ProcessoSeletivo::where('id',$id)->get();
		$nomeP     = $processos[0]->nome;
		$candidato = DB::table('processo_seletivo_'.$nomeP)->where('id',$id_c)->get(); 
		$avaliacao = AvaliacaoLideranca::where('processo_seletivo_id',$id)->where('id_candidato',$id_c)->get();
		$pergAvaLid = PerguntaAvaliacaoLideranca::where('processo_seletivo_id',$id)->where('candidato_id',$id_c)->get();
		return view('avaliacao/avaliacaoLiderancaGestor', compact('processos','candidato','avaliacao','pergAvaLid'));
	}

	//Página de Atualizar Avaliação de Liderança
	public function updateAvaliacaoLideranca($id, $id_c, Request $request)
	{
		$input = $request->all();
		$avaliacao = AvaliacaoLideranca::where('processo_seletivo_id',$id)->where('id_candidato',$id_c)->get();
		$id_avaliacao = $avaliacao[0]->id;
		$input['data'] = date('Y-m-d', strtotime($input['data']));
		$avaliacao = AvaliacaoLideranca::find($id_avaliacao);
		$avaliacao->update($input);
		$validator = "Avaliação de Liderança realizada com sucesso!";
		$processos = ProcessoSeletivo::where('id',$id)->get();
		$nomeP     = $processos[0]->nome;
		$candidato = DB::table('processo_seletivo_'.$nomeP)->where('id',$id_c)->get(); 
		$email = 'hanna.lira@hcpgestao.org.br';
		$avaliacao = AvaliacaoLideranca::where('processo_seletivo_id',$id)->where('id_candidato',$id_c)->get();
		$avaliacao = AvaliacaoLideranca::find($avaliacao[0]->id);
		Mail::send('email.avaliacaoLiderancaGestor', ['ava' => $avaliacao], function($m) use ($email) {
				$m->from('portal@hcpgestao.org.br', 'Avaliação de Liderança');
				$m->subject('O Gestor respondeu a Avaliação de Liderança!');
				$m->to($email);
		});
		return view('avaliacao/avaliacaoGestor', compact('candidato'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
	}

	//Página de Avaliação de Gestor Operacional
	public function avaliacaoGestorOperacional($id, $id_c)
	{
		$processos = ProcessoSeletivo::where('id',$id)->get();
		$nomeP     = $processos[0]->nome;
		$candidato = DB::table('processo_seletivo_'.$nomeP)->where('id',$id_c)->get(); 
		$avaliacao = AvaliacaoOperacional::where('processo_seletivo_id',$id)->where('id_candidato',$id_c)->get();
		$pergAvaOp = PerguntaAvaliacaoOperacional::where('processo_seletivo_id',$id)->where('candidato_id',$id_c)->get();
		return view('avaliacao/avaliacaoOperacionalGestor', compact('processos','candidato','avaliacao','pergAvaOp'));
	}

	//Página de Atualizar Avaliação Operacional
	public function updateAvaliacaoOperacional($id, $id_c, Request $request)
	{
		$input = $request->all();
		$avaliacao = AvaliacaoOperacional::where('processo_seletivo_id',$id)->where('id_candidato',$id_c)->get();
		$id_avaliacao = $avaliacao[0]->id;
		$input['data'] = date('Y-m-d', strtotime($input['data']));
		$avaliacao = AvaliacaoOperacional::find($id_avaliacao);
		$avaliacao->update($input);
		$validator = "Avaliação Operacional respondida com sucesso!";
		$processos = ProcessoSeletivo::where('id',$id)->get();
		$nomeP     = $processos[0]->nome;
		$candidato = DB::table('processo_seletivo_'.$nomeP)->where('id',$id_c)->get();
		$email = 'hanna.lira@hcpgestao.org.br';
		$avaliacao = AvaliacaoOperacional::where('processo_seletivo_id',$id)->where('id_candidato',$id_c)->get();
		$avaliacao = avaliacaoOperacional::find($avaliacao[0]->id);
		Mail::send('email.avaliacaoOperacionalGestor', ['ava' => $avaliacao], function($m) use ($email) {
				$m->from('portal@hcpgestao.org.br', 'Avaliação Operacional');
				$m->subject('O Gestor respondeu a Avaliação Operacional!');
				$m->to($email);
		}); 
		return view('avaliacao/avaliacaoGestor', compact('candidato'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
	}

	//Página de Avaliação de Liderança
	public function avaliacaoLideranca($id, $id_c)
	{
		$processos  = ProcessoSeletivo::where('id',$id)->get();
		$nomeP      = $processos[0]->nome;
		$candidato  = DB::table('processo_seletivo_'.$nomeP)->where('id',$id_c)->get();
		$avaliacao  = AvaliacaoLideranca::where('processo_seletivo_id',$id)->where('id_candidato',$id_c)->get();
		$pergAvaLid = PerguntaAvaliacaoLideranca::where('processo_seletivo_id',$id)->where('candidato_id',$id_c)->get();
 		$qtd = sizeof($avaliacao); 
		if($qtd > 0){
			return view('avaliacao/avaliacaoLiderancaVisualizar', compact('processos','candidato','avaliacao','pergAvaLid'));
		} else {
			return view('avaliacao/avaliacaoLideranca', compact('processos','candidato'));
		}
	}

	//Página Salvar Avaliação de Liderança 
	public function storeAvaliacaoLideranca($id, $id_c, Request $request)
	{
		$input = $request->all();  
		$validator = Validator::make($request->all(), [
			'nome'   => 'required|max:255',
			'cpf'    => 'required|max:255',
			'cargo'  => 'required|max:255',	
			'email'  => 'required|email|max:255',
			'funcao' => 'required|max:255',
			'setor'  => 'required|max:255',
			'data'   => 'required|date',
			'justificativa_rh' => 'required|max:3000'
		]);
		if ($validator->fails()) {
			$processos = ProcessoSeletivo::where('id',$id)->get();
			$nomeP     = $processos[0]->nome;
			$candidato = DB::table('processo_seletivo_'.$nomeP)->where('id',$id_c)->get();
			return view('avaliacao/avaliacaoLideranca', compact('processos','candidato'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
		} else {
			
			$input['data'] = date('Y-m-d', strtotime($input['data']));
			$input['justificativa_gestor'] = "";
			$input['processo_seletivo_id'] = $id;
			$input['id_candidato'] = $id_c;
			$avaliacao = AvaliacaoLideranca::create($input);
			$id_max = DB::table('avaliacao_lideranca')->max('id'); 
			$input['avaliacao_lideranca_id'] = $id_max;
			$input['candidato_id'] = $id_c;
			for($a = 0; $a < 5; $a++){
				if(!empty($input['lideranca_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'LIDERANÇA';
					$pergunta = PerguntaAvaliacaoLideranca::create($input);	
				}
				if(!empty($input['flexibilidade_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'FLEXIBILIDADE';
					$pergunta = PerguntaAvaliacaoLideranca::create($input);
				}
				if(!empty($input['resultados_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'RESULTADOS';
					$pergunta = PerguntaAvaliacaoLideranca::create($input);
				}
				if(!empty($input['presteza_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'PRESTEZA';
					$pergunta = PerguntaAvaliacaoLideranca::create($input);
				}
				if(!empty($input['comunicacao_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'COMUNICAÇÃO';
					$pergunta = PerguntaAvaliacaoLideranca::create($input);
				}
				if(!empty($input['organizacao_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'ORGANIZAÇÃO';
					$pergunta = PerguntaAvaliacaoLideranca::create($input);
				}
				if(!empty($input['administracao_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'ADMINISTRAÇÃO';
					$pergunta = PerguntaAvaliacaoLideranca::create($input);
				}
				if(!empty($input['ambiente_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'AMBIENTE';
					$pergunta = PerguntaAvaliacaoLideranca::create($input);
				}
				if(!empty($input['aproveitamento_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'APROVEITAMENTO';
					$pergunta = PerguntaAvaliacaoLideranca::create($input);
				}
				if(!empty($input['equipe_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'EQUIPE';
					$pergunta = PerguntaAvaliacaoLideranca::create($input);
				}
			}
			$processos = ProcessoSeletivo::where('id',$id)->get();
			$nomeP     = $processos[0]->nome;
			$candidato = DB::table('processo_seletivo_'.$nomeP)->where('id',$id_c)->get(); 
			$validator = "Avaliação de Liderança realizada com sucesso!";
			$email = $input['email'];
			$avaliacao = AvaliacaoLideranca::where('processo_seletivo_id',$id)->where('id_candidato',$id_c)->get();
			$avaliacao = AvaliacaoLideranca::find($avaliacao[0]->id);
			Mail::send('email.avaliacaoLideranca', ['ava' => $avaliacao], function($m) use ($email) {
					$m->from('portal@hcpgestao.org.br', 'Avaliação de Liderança');
					$m->subject('O RH realizou uma Avaliação de Liderança!');
					$m->to($email);
			}); 
			return view('avaliacao/avaliacao', compact('processos','candidato'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
		}
	}

	//Página de Avaliação Operacional
	public function avaliacaoOperacional($id, $id_c)
	{
		$processos = ProcessoSeletivo::where('id',$id)->get();
		$nomeP     = $processos[0]->nome;
		$candidato = DB::table('processo_seletivo_'.$nomeP)->where('id',$id_c)->get();
		$avaliacao = AvaliacaoOperacional::where('processo_seletivo_id',$id)->where('id_candidato',$id_c)->get();
		$pergAvaOp = PerguntaAvaliacaoOperacional::where('processo_seletivo_id',$id)->where('candidato_id',$id_c)->get();
 		$qtd = sizeof($avaliacao); 
		if($qtd > 0){
			return view('avaliacao/avaliacaoOperacionalVisualizar', compact('processos','candidato','avaliacao','pergAvaOp'));
		} else {
			return view('avaliacao/avaliacaoOperacional', compact('processos','candidato'));
		}	
	}

	//Página Salvar Avaliação Operacional
	public function storeAvaliacaoOperacional($id, $id_c, Request $request)
	{
		$input = $request->all();
		$validator = Validator::make($request->all(), [
			'nome'   => 'required|max:255',
			'matricula' => 'required|max:255',
			'cargo'  => 'required|max:255',	
			'email'  => 'required|email|max:255',
			'funcao' => 'required|max:255',
			'setor'  => 'required|max:255',
			'data'   => 'required|date',
			'justificativa_rh' => 'required|max:3000'
		]);
		if ($validator->fails()) {
			$processos = ProcessoSeletivo::where('id',$id)->get();
			$nomeP     = $processos[0]->nome;
			$candidato = DB::table('processo_seletivo_'.$nomeP)->where('id',$id_c)->get();
			return view('avaliacao/avaliacaoLideranca', compact('processos','candidato'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
		} else {
			$input['data'] = date('Y-m-d', strtotime($input['data']));
			$input['justificativa_gestor'] = "";
			$input['processo_seletivo_id'] = $id;
			$input['id_candidato'] = $id_c;
			$avaliacao = AvaliacaoOperacional::create($input);
			$id_max = DB::table('avaliacao_operacional')->max('id'); 
			$input['avaliacao_operacional_id'] = $id_max;
			$input['candidato_id'] = $id_c;
			for($a = 0; $a <= 5; $a++){
				if(!empty($input['organizacao_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'ORGANIZAÇÃO';
					$pergunta = PerguntaAvaliacaoOperacional::create($input);	
				}
				if(!empty($input['produtividade_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'PRODUTIVIDADE';
					$pergunta = PerguntaAvaliacaoOperacional::create($input);
				}
				if(!empty($input['iniciativa_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'INICIATIVA';
					$pergunta = PerguntaAvaliacaoOperacional::create($input);
				}
				if(!empty($input['presteza_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'PRESTEZA';
					$pergunta = PerguntaAvaliacaoOperacional::create($input);
				}
				if(!empty($input['assiduidade_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'ASSIDUIDADE';
					$pergunta = PerguntaAvaliacaoOperacional::create($input);
				}
				if(!empty($input['pontualidade_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'PONTUALIDADE';
					$pergunta = PerguntaAvaliacaoOperacional::create($input);
				}
				if(!empty($input['tempo_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'TEMPO';
					$pergunta = PerguntaAvaliacaoOperacional::create($input);
				}
				if(!empty($input['equipamento_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'EQUIPAMENTO';
					$pergunta = PerguntaAvaliacaoOperacional::create($input);
				}
				if(!empty($input['recurso_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'RECURSO';
					$pergunta = PerguntaAvaliacaoOperacional::create($input);
				}
				if(!empty($input['equipe_'.$a])){
					$input['resposta'] = $a;
					$input['pergunta'] = 'EQUIPE';
					$pergunta = PerguntaAvaliacaoOperacional::create($input);
				}
			}
			$processos = ProcessoSeletivo::where('id',$id)->get();
			$nomeP     = $processos[0]->nome;
			$candidato = DB::table('processo_seletivo_'.$nomeP)->where('id',$id_c)->get(); 
			$validator = "Avaliação Operacional realizada com sucesso!";
			$email = $input['email'];
			$avaliacao = AvaliacaoOperacional::where('processo_seletivo_id',$id)->where('id_candidato',$id_c)->get();
			$avaliacao = AvaliacaoOperacional::find($avaliacao[0]->id);
			Mail::send('email.avaliacaoOperacional', ['ava' => $avaliacao], function($m) use ($email) {
					$m->from('portal@hcpgestao.org.br', 'Avaliação Operacional');
					$m->subject('O RH realizou uma Avaliação Operacional!');
					$m->to($email);
			}); 
			return view('avaliacao/avaliacao', compact('processos','candidato'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
		}
	}
}