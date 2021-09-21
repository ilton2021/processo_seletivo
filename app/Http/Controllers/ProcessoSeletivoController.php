<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ProcessoSeletivo;
use App\Model\Unidade;
use App\Model\Vaga;
use DB;
use App\Model\Loggers;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Validator;

class ProcessoSeletivoController extends Controller
{
    public function __construct(ProcessoSeletivo $processo_seletivo)
	{
		$this->processo_seletivo = $processo_seletivo;
		return view('cadastro_processo');
	}
	
	// Página Cadastro de Processo Seletivo //
	public function cadastroProcesso(Request $request)
	{
		$processos = DB::table('processo_seletivo')->paginate(10);
		$input = $request->all(); 
		return view('cadastro_processo', compact('processos'));
	}
	
	// Página Alterar Vaga //
	public function vagaAlterar($id, $id_vaga)
	{
		$processos = ProcessoSeletivo::where('id',$id)->get();
		$vaga = Vaga::where('id', $id_vaga)->get();
		return view('cadastro_vaga_alterar', compact('processos','vaga'));
	}
	
	// Página Excluir Vaga //
	public function vagaExcluir($id, $id_vaga)
	{
		$processos = ProcessoSeletivo::where('id',$id)->get();
		$vaga = Vaga::where('id', $id_vaga)->get();
		return view('cadastro_vaga_excluir', compact('processos','vaga'));
	}
	
	// Página Pesquisa Processo Seletivo //
	public function pesquisarProcesso(Request $request)
	{
		$input = $request->all();  
		if($input['pesq'] == NULL) {
			$processos = $this->processo_seletivo->paginate(10);	
			$pesq = '';
		} else {
			$pesq = $input['pesq'];
			$processos = $this->processo_seletivo->where('nome', 'LIKE', '%' . $pesq . '%')->paginate(10);	
		}
		return view('cadastro_processo', compact('processos','pesq'));
	}
	
	// Página Cadastrar Novo Processo Seletivo //
	public function processoNovo()
	{
		$unidades = Unidade::all();
		$processos = ProcessoSeletivo::all(); 
		return view('cadastro_processo_novo', compact('unidades','processos'));
	}
	
	// Salvar Processo Seletivo //
	public function storeProcesso(Request $request)
	{
		$input = $request->all(); $a = $input['nome1']; $b = $input['nome2']; $c = $input['nome3'];
		$input['nome']  = $a.$b.$c; 
		$nomeA 	  = $_FILES['edital']['name']; 
		$extensao = pathinfo($nomeA, PATHINFO_EXTENSION); 
		$unidades = Unidade::all();
		$processos = ProcessoSeletivo::all();
		if($input['inscricao_inicio'] > $input['inscricao_fim'] || $input['inscricao_inicio'] == $input['inscricao_fim'])
		{
			$validator = 'Data da Inscrição Inicial não pode ser maior ou igual que a Data da Inscrição Final!';		
			return view('cadastro_processo_novo', compact('unidades','processos'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));
		}
		if($request->file('edital') === NULL) {	
			$validator = 'Informe o arquivo do Edital!';
			return view('cadastro_processo_novo', compact('unidades','processos'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));
		} else {
			if($extensao == 'pdf') {
				$validator = Validator::make($request->all(), [
					'inscricao_inicio' => 'required|date',
					'inscricao_fim'    => 'required|date',
					'data_prova'       => 'required|date',
					'data_resultado'   => 'required|date'
				]);
				if ($validator->fails()) {
					return view('cadastro_processo_novo', compact('unidades','processos'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));
				} else { 										
					$request->file('edital')->move('../public/storage/processo/edital/', $nomeA);
					$input['edital'] = $nomeA;
					$input['edital_caminho'] = 'processo/edital/'.$nomeA;
					$nome = $input['nome'];
					$processo 	 = ProcessoSeletivo::where('nome',$nome)->get();
					$qtdProcesso = sizeof($processo); 
					if($qtdProcesso == 0) {
						$p = DB::statement("CREATE TABLE IF NOT EXISTS processo_seletivo_".$nome." 
						(id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						vaga varchar(400) COLLATE utf8_unicode_ci NULL,
						data_inscricao varchar(50) COLLATE utf8_unicode_ci NULL DEFAULT current_timestamp(),
						nome varchar(150) COLLATE utf8_unicode_ci NULL,
						cpf varchar(30) COLLATE utf8_unicode_ci NULL,
						email varchar(255) COLLATE utf8_unicode_ci NULL,
						telefone_fixo varchar(15) COLLATE utf8_unicode_ci NULL,
						telefone varchar(30) COLLATE utf8_unicode_ci NULL,
						lugar_nascimento varchar(50) COLLATE utf8_unicode_ci NULL,
						estado_nascimento varchar(50) COLLATE utf8_unicode_ci NULL,
						cidade_nascimento varchar(100) COLLATE utf8_unicode_ci NULL,
						data_nascimento varchar(50) COLLATE utf8_unicode_ci NULL,
						rua varchar(100) COLLATE utf8_unicode_ci NULL,
						numero varchar(10) COLLATE utf8_unicode_ci NULL,
						bairro varchar(100) COLLATE utf8_unicode_ci NULL,
						cidade varchar(100) COLLATE utf8_unicode_ci NULL,
						estado varchar(100) COLLATE utf8_unicode_ci NULL,
						cep varchar(30) COLLATE utf8_unicode_ci NULL,
						complemento varchar(200) COLLATE utf8_unicode_ci NULL,
						escolaridade varchar(100) COLLATE utf8_unicode_ci NULL,
						status_escolaridade varchar(50) COLLATE utf8_unicode_ci NULL,
						formacao varchar(150) COLLATE utf8_unicode_ci NULL,
						cursos varchar(1000) COLLATE utf8_unicode_ci NULL,
						deficiencia varchar(15) COLLATE utf8_unicode_ci NULL,
						habilitacao varchar(15) COLLATE utf8_unicode_ci NULL,
						periodo_integral varchar(100) COLLATE utf8_unicode_ci NULL,
						periodo_noturno varchar(100) COLLATE utf8_unicode_ci NULL,
						meio_periodo varchar(100) COLLATE utf8_unicode_ci NULL,
						outra_cidade varchar(15) COLLATE utf8_unicode_ci NULL,
						exp_01_empresa varchar(150) COLLATE utf8_unicode_ci NULL,
						exp_01_cargo varchar(150) COLLATE utf8_unicode_ci NULL,
						exp_01_atribuicoes varchar(500) COLLATE utf8_unicode_ci NULL,
						arquivo_ctps1 varchar(500) COLLATE utf8_unicode_ci NULL,
						exp_01_data_ini varchar(15) COLLATE utf8_unicode_ci NULL,
						exp_01_data_fim varchar(15) COLLATE utf8_unicode_ci NULL,
						exp_02_empresa varchar(150) COLLATE utf8_unicode_ci NULL,
						exp_02_cargo varchar(150) COLLATE utf8_unicode_ci NULL,
						exp_02_atribuicoes varchar(500) COLLATE utf8_unicode_ci NULL,
						arquivo_ctps2 varchar(500) COLLATE utf8_unicode_ci NULL,
						exp_02_data_ini varchar(15) COLLATE utf8_unicode_ci NULL,
						exp_02_data_fim varchar(15) COLLATE utf8_unicode_ci NULL,
						exp_03_empresa varchar(150) COLLATE utf8_unicode_ci NULL,
						exp_03_cargo varchar(150) COLLATE utf8_unicode_ci NULL,
						exp_03_atribuicoes varchar(500) COLLATE utf8_unicode_ci NULL,
						arquivo_ctps3 varchar(500) COLLATE utf8_unicode_ci NULL,
						exp_03_data_ini varchar(15) COLLATE utf8_unicode_ci NULL,
						exp_03_data_fim varchar(15) COLLATE utf8_unicode_ci NULL,
						como_soube varchar(255) COLLATE utf8_unicode_ci NULL,
						parentesco varchar(255) COLLATE utf8_unicode_ci NULL,
						parentesco_nome varchar(255) COLLATE utf8_unicode_ci NULL,
						nomearquivo varchar(600) COLLATE utf8_unicode_ci NULL,
						status varchar(15) COLLATE utf8_unicode_ci NULL,
						status_avaliacao varchar(50) COLLATE utf8_unicode_ci NULL,
						data_avaliacao varchar(50) COLLATE utf8_unicode_ci NULL,
						msg_avaliacao varchar(500) COLLATE utf8_unicode_ci NULL,
						status_entrevista varchar(50) COLLATE utf8_unicode_ci NULL,
						data_entrevista varchar(50) COLLATE utf8_unicode_ci NULL,
						msg_entrevista varchar(500) COLLATE utf8_unicode_ci NULL,
						status_resultado varchar(50) COLLATE utf8_unicode_ci NULL,
						msg_resultado varchar(500) COLLATE utf8_unicode_ci NULL,
						nomearquivo2 varchar(1000) COLLATE utf8_unicode_ci NULL,
						numeroInscricao varchar(100) COLLATE utf8_unicode_ci NULL
						) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; ");
						$input['origem'] = 1;
						$processo_seletivo = ProcessoSeletivo::create($input);
						$lastUpdated = $processo_seletivo->max('updated_at');
						$processos = ProcessoSeletivo::paginate(10);
						$input['user_id'] = Auth::user()->id;
						$loggers = Loggers::create($input);
						$validator = 'Processo Seletivo cadastrado com Sucesso!!';
						return view('cadastro_processo', compact('processos'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));
					} else {
						$validator = "Este Processo Seletivo já existe!";
						return view('cadastro_processo_novo', compact('unidades','processos'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));	
					}
				}
			} else {
				$validator = 'Só é suportado arquivos: pdf!';		
				return view('cadastro_processo_novo', compact('unidades','processos'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));
			}
		}
	}
	
	// Página Alterar Processo Seletivo//
	public function processoAlterar($id)
	{
		$processos = ProcessoSeletivo::where('id', $id)->get();
		$id_u 	   = $processos[0]->unidade_id;
		$unidades  = Unidade::where('id',$id_u)->get();
		return view('cadastro_processo_alterar', compact('processos','unidades'));
	}
	
	// Alterar Processo Seletivo //
	public function updateProcesso($id, Request $request)
	{
		$processos = ProcessoSeletivo::where('id', $id)->get();
		$input = $request->all();
		$id_unidade = $input['unidade_id'];
		$unidades = Unidade::where('id', $id_unidade)->get();
		if($input['inscricao_inicio'] > $input['inscricao_fim'] || $input['inscricao_inicio'] == $input['inscricao_fim'])
		{
			$validator = 'Data da Inscrição Inicial não pode ser maior ou igual que a Data da Inscrição Final!';		
			return view('cadastro_processo_alterar', compact('unidades','processos'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
		}
		$validator = Validator::make($request->all(), [
			'nome'   => 'required|max:255',
			'inscricao_inicio' => 'required|date',
			'inscricao_fim'    => 'required|date',
			'data_prova'       => 'required|date',
			'data_resultado'   => 'required|date'
		]);
		if ($validator->fails()) {
			return view('cadastro_processo_alterar', compact('unidades'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
		} else {
			if($request->file('edital_') == NULL){
				$nome = $input['edital'];
				$input['edital_caminho'] = 'processo/edital/'.$nome;
				$processos = ProcessoSeletivo::find($id);
				$processos->update($input);
				$processos = ProcessoSeletivo::paginate(10);
				$input['user_id'] = Auth::user()->id;
				$loggers = Loggers::create($input);
				$lastUpdated = $processos->max('updated_at');
				$validator = 'Processo Seletivo alterado com Sucesso!!';
				return view('cadastro_processo', compact('processos'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
			} else {
				$nome = $_FILES['edital_']['name']; 
				$extensao = pathinfo($nome, PATHINFO_EXTENSION);
				if($extensao == 'pdf'){
					$request->file('edital_')->move('../public/storage/processo/',$nome);
					$input['edital'] = $nome;
					$input['edital_caminho'] = 'processo/edital/'.$nome;
					$processos = ProcessoSeletivo::find($id);
					$processos->update($input);
					$processos = ProcessoSeletivo::paginate(10);
					$input['user_id'] = Auth::user()->id;
					$loggers = Loggers::create($input);
					$lastUpdated = $processos->max('updated_at');
					$validator = 'Processo Seletivo alterado com Sucesso!!';
					return view('cadastro_processo', compact('processos'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
				} else {
					$processos = ProcessoSeletivo::where('id', $id)->get();
					$validator = 'Só é suportado arquivos: pdf!';
					return view('cadastro_processo_alterar', compact('processos'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
				}
			}
		}
	}
	
	// Página Excluir Processo Seletivo //
	public function processoExcluir($id)
	{
		$processos = ProcessoSeletivo::where('id', $id)->get();
		$id_u 	   = $processos[0]->unidade_id;
		$unidades  = Unidade::where('id',$id_u)->get();
		return view('cadastro_processo_excluir', compact('processos','unidades'));
	}
	
	// Excluir Processo Seletivo //
	public function destroyProcesso($id, Request $request)
	{
		$input = $request->all();
		$processos = ProcessoSeletivo::find($id)->delete();
		$processos = ProcessoSeletivo::paginate(10);
		$input['user_id'] = Auth::user()->id;
		$loggers = Loggers::create($input);
		$validator = 'Processo Seletivo excluído com sucesso!';
		return view('cadastro_processo', compact('processos'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
	}
	
	// Página Cadastro de Vaga //
	public function vagaCadastro($id)
	{
		$processos = ProcessoSeletivo::where('id', $id)->get();
		$vagas     = Vaga::where('processo_seletivo_id',$id)->get();
		return view('cadastro_vaga_processo', compact('processos','vagas'));
	}
	
	// Salvar Nova Vaga //
	public function storeVaga(Request $request)
	{
		$input = $request->all();
		$id 	   = $input['processo_seletivo_id'];
		$processos = ProcessoSeletivo::where('id', $id)->get();
		$unidade_id = $processos[0]->unidade_id;
		$input['unidade_id'] = $unidade_id;	
		$validator = Validator::make($request->all(), [
			'nome'   				 => 'required|max:255',
			'codigo_vaga' 			 => 'required|max:255',
			'categoria_profissional' => 'required|max:255',
			'carga_horaria'          => 'required|max:255',
			'salario_bruto'   		 => 'required|max:255',
			'status' 				 => 'required|max:255',
			'taxa'   			     => 'required|max:10|numeric',
			'quantidade' 			 => 'required|max:100'
		]);
		if ($validator->fails()) {
			$vagas     = Vaga::where('processo_seletivo_id',$id)->get();
			return view('cadastro_vaga_processo', compact('processos','vagas'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
		} else {
			$nome  = $input['nome'];
			$nomeC = str_replace('/','-',$nome);
			$input['nome'] = $nomeC;
			$vaga = Vaga::create($input); 
			$lastUpdated = $vaga->max('updated_at');
			$id = $input['processo_seletivo_id'];
			$processos = ProcessoSeletivo::where('id', $id)->get();
			$input['user_id'] = Auth::user()->id;
			$loggers = Loggers::create($input);
			$vagas   = Vaga::where('processo_seletivo_id',$id)->get();
			$validator = 'Vaga cadastrada com sucesso!';
			return view('cadastro_vaga_processo', compact('processos','vagas'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
		}
	}
	
	// Alterar Vaga //
	public function updateVaga($idP, $id, Request $request)
	{
		$input = $request->all();
		$validator = Validator::make($request->all(), [
			'nome'   				 => 'required|max:255',
			'codigo_vaga' 			 => 'required|max:255',
			'categoria_profissional' => 'required|max:255',
			'carga_horaria'          => 'required|max:255',
			'salario_bruto'   		 => 'required|max:255',
			'status' 				 => 'required|max:255',
			'taxa'   			     => 'required|max:10|numeric',
			'quantidade' 			 => 'required|max:100'
		]);
		if ($validator->fails()) {
			$id 	   = $input['processo_seletivo_id'];
			$processos = ProcessoSeletivo::where('id', $id)->get();
			$vagas 	   = Vaga::where('processo_seletivo_id',$id)->get();
			return view('cadastro_vaga_processo', compact('processos','vagas'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
		} else { 
			$vaga = Vaga::find($id);
			$vaga->update($input);
			$lastUpdated = $vaga->max('updated_at');
			$id = $input['processo_seletivo_id'];
			$processos = ProcessoSeletivo::where('id', $idP)->get();
			$input['user_id'] = Auth::user()->id;
			$loggers = Loggers::create($input);
			$vagas = Vaga::where('processo_seletivo_id',$id)->get();
			return redirect()->route('vagaCadastro', [$idP]);
		}
	}
	
	// Excluir Vaga //
	public function destroyVaga($idP, $id, Request $request)
	{
		$input = $request->all();
		$vaga  = Vaga::find($id)->delete();
		$input['user_id'] = Auth::user()->id;
		$loggers   = Loggers::create($input);
		$processos = ProcessoSeletivo::where('id',$idP)->get();
		$vagas 	   = Vaga::where('id',$id)->get();
		return redirect()->route('vagaCadastro', [$idP]);
	}
}