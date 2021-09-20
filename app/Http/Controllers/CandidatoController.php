<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Model\Candidato;
use App\Model\Unidade;
use App\Model\ProcessoSeletivo;
use App\Model\ProcessoCandidato;
use App\Model\Experiencias;
use App\Model\QuadroAvisos;
use App\Model\Vaga;
use App\Model\Endereco;
use DB;
use Redirect;
use Validator;

class CandidatoController extends Controller
{
	// Página Inicial - Candidatos //
    public function candidatoIndex()
	{
		$unidades = Unidade::all();
		$processos1 = ProcessoSeletivo::all();
		$qtd = sizeof($processos1);
		$processos = DB::table('processo_seletivo')
		->join('unidade', 'processo_seletivo.unidade_id', '=', 'unidade.id')
		->select('processo_seletivo.*', 'unidade.nome as NOME','unidade.caminho as CAMINHO','unidade.id as unidade_id')
		->get()->toArray();
		$processos2 = DB::table('unidade')
		->join('processo_seletivo', 'unidade.id', '=', 'processo_seletivo.unidade_id')
		->select('unidade.id')
		->get()->toArray();
		$quadros = QuadroAvisos::all();
		$hoje = date('Y-m-d', strtotime('now'));
		$ps = DB::table('processo_seletivo')->where('inscricao_fim','>=',$hoje)->where('inscricao_inicio','<=',$hoje)->get();
		$qtd = sizeof($ps);
		$text = false;
		return view('candidato', compact('unidades','processos','processos2','processos1','quadros','qtd','ps'));
	}
	
	// Página Informações Cadastro Candidatos //
	public function informativo($id_unidade, $id_processo)
	{
		$unidades = Unidade::where('id', $id_unidade)->get();
		$processos = DB::table('processo_seletivo')
		->join('unidade', 'processo_seletivo.unidade_id', '=', 'unidade.id')
		->select('processo_seletivo.*', 'unidade.nome as NOME','unidade.caminho as CAMINHO','unidade.id as unidade_id')
		->where('processo_seletivo.id', $id_processo)
		->get()->toArray();
		$processos2 = DB::table('unidade')
		->join('processo_seletivo', 'unidade.id', '=', 'processo_seletivo.unidade_id')
		->select('unidade.id')
		->get()->toArray();
		return view('informativo', compact('unidades','processos','processos2'));
	}
	
	// Página Confirmação Inscrição //
	public function candidatoIndex_()
	{
		$unidades = Unidade::all();
		$processos = ProcessoSeletivo::all();
		return view('candidato_', compact('unidades','processos'));
	}
	
	// Página Resultados Anteriores - Candidatos //
	public function candidatoResultados($id)
	{
		$processos = ProcessoSeletivo::where('unidade_id', $id)->get();
		$unidade   = Unidade::find($id);
		return view('resultados_processos', compact('processos','unidade'));
	}
	
	// Página Editais em Curso - Candidatos //
	public function candidatoEditais($id)
	{
		$processos = ProcessoSeletivo::where('unidade_id', $id)->get();
		$unidade   = Unidade::find($id);
		return view('resultados_editais', compact('processos','unidade'));
	}
	
	// Página Resultados - Candidatos //
    public function candidatoListas($id)
	{
		$processos = ProcessoSeletivo::where('id',$id)->get();
		$idU 	   = $processos[0]->unidade_id;
		$unidade   = Unidade::where('id',$idU)->get();
		$id = $id;
		return view('resultados_listas', compact('processos','unidade','id'));
	}

	public function cadastroCandidato2($id)
	{
		$processos = ProcessoSeletivo::where('id',$id)->get();
		$vagas     = Vaga::where('processo_seletivo_id',$id)->get();
		return view('cadastro_candidato2', compact('processos','vagas'));
	}

	public function storeCandidato2(Request $request, $id)
	{
		$input = $request->all();
		$processos = ProcessoSeletivo::where('id',$id)->get();
		$vagas     = Vaga::where('processo_seletivo_id',$id)->get();
		$validator = Validator::make($request->all(), [
			'nome'   => 'required|max:255',
			'vaga'   => 'required|max:255',
			'email'  => 'required|email'	
		]);
		if ($validator->fails()) {
			return view('cadastro_candidato2', compact('processos','vagas'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
		} else {
			$vaga  = $input['vaga'];
			$data  = $input['data_inscricao'];
			$nome  = $input['nome'];
			$cpf   = $input['cpf'];
			$email = $input['email'];
			$telefone = $input['telefone'];
			if($request->file('nome_arquivo2') != NULL) {	
				$nomeA = $_FILES['nome_arquivo2']['name'];
				$extensao = pathinfo($nomeA, PATHINFO_EXTENSION);
				if($extensao === 'pdf' || $extensao === 'doc' || $extensao === 'docx') {
					$arquivo = $nomeA;
				} else {
					$validator = "O Currículo tem que ser .pdf, .doc ou .docx!!";
					return view('cadastro_candidato2', compact('processos','vagas'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
				}
			} else {
				$arquivo = NULL;
			}

			if($processos[0]->origem == 1) {
			$processo = DB::statement("INSERT INTO processo_seletivo_".$processos[0]->nome. "(vaga, 
			data_inscricao, nome, cpf, email, telefone_fixo, telefone, lugar_nascimento, estado_nascimento, 
			cidade_nascimento, data_nascimento, rua, numero, bairro, cidade, estado, cep, complemento, 
			escolaridade, status_escolaridade, formacao, cursos, deficiencia, habilitacao, periodo_integral, 
			periodo_noturno, meio_periodo, outra_cidade, exp_01_empresa, exp_01_cargo, exp_01_atribuicoes, 
			arquivo_ctps1, exp_01_data_ini, exp_01_data_fim, exp_02_empresa, exp_02_cargo, exp_02_atribuicoes, 
			arquivo_ctps2, exp_02_data_ini, exp_02_data_fim, exp_03_empresa, exp_03_cargo, exp_03_atribuicoes, 
			arquivo_ctps3, exp_03_data_ini, exp_03_data_fim, nomearquivo, 
			status, status_avaliacao, data_avaliacao, msg_avaliacao, status_entrevista, data_entrevista, 
			msg_entrevista, status_resultado, msg_resultado, nomearquivo2, numeroInscricao) VALUES ('$vaga',
			'$data','$nome','$cpf','$email','','$telefone','','','','','','','','','','','','','','','','','','',
			'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',
			'$arquivo','')");
			} else {
			$processo = DB::statement("INSERT INTO processo_seletivo_".$processos[0]->nome. "(vaga, 
			data_inscricao, nome, cpf, email, telefone_fixo, telefone, lugar_nascimento, estado_nascimento, 
			cidade_nascimento, data_nascimento, rua, numero, bairro, cidade, estado, cep, complemento, 
			escolaridade, status_escolaridade, formacao, cursos, sexo, estado_civil, deficiencia, habilitacao, 
			periodo_integral, periodo_noturno, meio_periodo, outra_cidade, 
			exp_01_empresa,exp_01_cargo,exp_01_atribuicoes, exp_01_comentarios, exp_01_data_ini, exp_01_data_fim, 
			exp_02_empresa,exp_02_cargo,exp_02_atribuicoes, exp_02_comentarios, exp_02_data_ini, exp_02_data_fim, 
			exp_03_empresa,exp_03_cargo,exp_03_atribuicoes, exp_03_comentarios, exp_03_data_ini, exp_03_data_fim, 
			exp_04_empresa,exp_04_cargo,exp_04_atribuicoes, exp_04_comentarios, exp_04_data_ini, exp_04_data_fim,
			exp_05_empresa,exp_05_cargo,exp_05_atribuicoes, exp_05_comentarios, exp_05_data_ini, exp_05_data_fim,
			nomearquivo, tipo_cad, status, status_avaliacao, data_avaliacao, msg_avaliacao, status_entrevista, 
			data_entrevista, msg_entrevista, status_resultado, msg_resultado, nomearquivo2) 
			VALUES ('$vaga','$data','$nome','$cpf','$email','','$telefone','','','','','','','','','','','','',
			'','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',
			'','','','','','','','','','','','','','','','','','','','$arquivo')");
			}

			$processos = DB::table('processo_seletivo')->paginate(10);
			return view('cadastro_processo', compact('processos'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
		}
	}
	
	// Página Resultados (Avaliação, Entrevista, Aprovados e Cadastro Reserva) - Candidatos //
	public function candidatoListasOpcao($id, $id_escolha, $nome, Request $request)
	{
		if($id_escolha == 1) {
			$processos_result = DB::table('processo_seletivo_' .$nome)
			->where('status_avaliacao','=','Habilitado')
			->orderby('nome')
			->get(); 
		} else if ($id_escolha == 2) {
			$processos_result = DB::table('processo_seletivo_' .$nome)
			->where('status_entrevista','=','Habilitado')
			->orderby('nome')
			->get();	
		} else if ($id_escolha == 3) {
			$processos_result = DB::table('processo_seletivo_' .$nome)
			->where('status_resultado','=','Aprovado (a)')
			->orderby('nome')
			->get();	
		} else if ($id_escolha == 4) {
			$processos_result = DB::table('processo_seletivo_' .$nome)
			->where('status_resultado','=','Cadastro de Reserva')
			->get();
		}
		$processos = ProcessoSeletivo::where('id',$id)->get();
		$idU = $processos[0]->unidade_id;
		$idE = $id_escolha;
		$id = $id;
		$nome = $nome;
		$qtd = sizeof($processos_result); 
		if($qtd == 0) {
			$unidade   = Unidade::where('id',$idU)->get();
			$validator = 'Este Processo Seletivo não tem Resultados!';
			return view('resultados_listas', compact('processos','unidade','id','nome'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
		} else {
			$unidade   = Unidade::where('id',$idU)->get();
			return view('resultados_listas_opcao', compact('processos_result','unidade','idE','id','nome'));
		}
	}

	public function pesquisarCandidatoResultado($id, $idE, $nome, Request $request)
	{
		$input = $request->all(); 
		$processos = ProcessoSeletivo::where('id',$id)->get();
		$idU = $processos[0]->unidade_id;
		$unidade   = Unidade::where('id',$idU)->get();
		if($input['pesq'] == null) {
			$id_escolha = $idE;
			if($id_escolha == 1) {
				$processos_result = DB::table('processo_seletivo_' .$nome)
				->where('status_avaliacao','=','Habilitado')
				->orderby('nome')
				->get(); 
			} else if ($id_escolha == 2) {
				$processos_result = DB::table('processo_seletivo_' .$nome)
				->where('status_entrevista','=','Habilitado')
				->orderby('nome')
				->get();	
			} else if ($id_escolha == 3) {
				$processos_result = DB::table('processo_seletivo_' .$nome)
				->where('status_resultado','=','Aprovado (a)')
				->orderby('nome')
				->get();	
			} else if ($id_escolha == 4) {
				$processos_result = DB::table('processo_seletivo_' .$nome)
				->where('status_resultado','=','Cadastro de Reserva')
				->get();
			}
		} else {
			$pesq = $input['pesq'];
			$id_escolha = $idE;
			if($id_escolha == 1) {
				$processos_result = DB::table('processo_seletivo_' .$nome)
				->where('nome', 'LIKE', '%' .$pesq. '%')
				->where('status_avaliacao','=','Habilitado')
				->orderby('nome')
				->get(); 
			} else if ($id_escolha == 2) {
				$processos_result = DB::table('processo_seletivo_' .$nome)
				->where('nome', 'LIKE', '%' .$pesq. '%')
				->where('status_entrevista','=','Habilitado')
				->orderby('nome')
				->get();	
			} else if ($id_escolha == 3) {
				$processos_result = DB::table('processo_seletivo_' .$nome)
				->where('nome', 'LIKE', '%' .$pesq. '%')
				->where('status_resultado','=','Aprovado (a)')
				->orderby('nome')
				->get();	
			} else if ($id_escolha == 4) {
				$processos_result = DB::table('processo_seletivo_' .$nome)
				->where('nome', 'LIKE', '%' .$pesq. '%')
				->where('status_resultado','=','Cadastro de Reserva')
				->get();
			}
		}
		$pesq = '';
		return view('resultados_listas_opcao', compact('processos_result','unidade','idE','id','nome'));
		
	}
	
	// Página Inscrição de Candidatos - Processo Seletivo //
	public function cadastroCandidato($id, $id_processo)
	{
		$unidade = Unidade::find($id);
		$processos = ProcessoSeletivo::find($id_processo);
		$vagas = Vaga::where('processo_seletivo_id', $id_processo)->get();
		$text = false;
		$a = 1;
		return view('cadastro_candidatos', compact('unidade','processos','vagas','a'));
	}
	
	// Validação da Inscrição de Candidatos //
	public function validar($id, $id_processo, $a, Request $request)
	{
		$unidade = Unidade::find($id);
		$processos = ProcessoSeletivo::find($id_processo);
		$nome = $processos->nome;  
		$vagas = Vaga::where('processo_seletivo_id', $id_processo)->get();
		$input = $request->all();
		$cpf = $input['cpf']; 
		$hoje     = date('Y-m-d', strtotime('now')); 
		$insc_fim = date('Y-m-d', strtotime($processos->inscricao_fim));
		if(strtotime($hoje) > strtotime($insc_fim))
		{
			$processos = ProcessoSeletivo::all();
			$processos1 = ProcessoSeletivo::all();
			$unidades = Unidade::all();
			return redirect()->route('candidato')
                        ->with('processos')
						->with('processos1')
						->with('unidades');
		}
		$validator = Validator::make($request->all(), [
			'cpf' => 'required|digits:11'
		]);
		if ($validator->fails()) {
			$a = 1;
			return view('cadastro_candidatos', compact('unidade','processos','a'))
				->withErrors($validator)
				->withInput(session()->flashInput($request->input()));	
		}
		if (strlen($cpf) != 11 || preg_match('/([0-9])\1{10}/', $cpf)) {
			$validator = 'CPF Inválido!';		
			$a = 1;
			return view('cadastro_candidatos', compact('unidade','processos','a'))
				->withErrors($validator)
				->withInput(session()->flashInput($request->input()));	
		} 
		if( !($input['cpf'] == "") && $a == 1){
			$cpf = $input['cpf'];
			$processos2 = DB::table('processo_seletivo_'.$nome)->where('cpf',$cpf)->get();
			$qtd = sizeof($processos2);
			if($qtd > 0) {
				$validator = 'Você já está participando desta seleção! Desejamos Boa Sorte e Sucesso!';		
				$a = 1;
				return view('cadastro_candidatos', compact('unidade','processos','a'))
					->withErrors($validator)
					->withInput(session()->flashInput($request->input()));	
			} else {
				$cpf = $input['cpf'];
				$validator = 'Vamos em frente, selecione a Vaga!';
				$a = 2;			
				return view('cadastro_candidatos', compact('unidade','processos','a','vagas','cpf'))
					->withErrors($validator)
					->withInput(session()->flashInput($request->input()));	
			}				
		} else if( !($input['cpf'] == "") && $a == 2 ){
			$cpf = $input['cpf'];
			$vaga = $input['vaga'];
			$validator = 'Vamos em frente, agora informe seus dados!';
			$a = 3;			
			return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf'))
				->withErrors($validator)
				->withInput(session()->flashInput($request->input()));	
		} else if( !($input['cpf'] == "") && $a == 3 ){
			$cpf = $input['cpf'];
			$vaga = $input['vaga'];
			$validator = Validator::make($request->all(), [
				'nome' 	  => 'required|max:255',				
				'celular' => 'required|max:14',
				'email'   => 'required|email|max:255',
			]);
			if($validator->fails()){
				return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf'))
					->withErrors($validator)
					->withInput(session()->flashInput($request->input()));	
			}
			$cpf 	   = $input['cpf'];
			$vaga 	   = $input['vaga'];
			$nome 	   = $input['nome'];
			$email 	   = $input['email'];
			$fone_fixo = $input['fone_fixo'];
			$celular   = $input['celular']; 
			if($fone_fixo == "(" || $celular == "("){
				$validator = 'Telefone Inválido!';
				$a = 3;			
				return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular'))
					->withErrors($validator)
					->withInput(session()->flashInput($request->input()));	
			}
			$validator = 'Você é natural de:';
			$a = 4;			
			return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular'))
				->withErrors($validator)
				->withInput(session()->flashInput($request->input()));		
		} else if( !($input['cpf'] == "") && $a == 4 ){
			$cpf 		  = $input['cpf'];
			$vaga 		  = $input['vaga'];
			$nome 		  = $input['nome'];
			$email 		  = $input['email'];
			$fone_fixo 	  = $input['fone_fixo'];
			$celular 	  = $input['celular'];
			$validator = Validator::make($request->all(), [
				'naturalidade' => 'required|max:50',				
				'estado_nasc'  => 'required|max:10',
				'cidade_nasc'  => 'required|max:100'
			]);
			if($validator->fails()){
				return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular'))
					->withErrors($validator)
					->withInput(session()->flashInput($request->input()));	
			}
			$naturalidade = $input['naturalidade'];
			$estado_nasc  = $input['estado_nasc'];
			$cidade_nasc  = $input['cidade_nasc'];
			$data_nasc 	  = $input['data_nasc'];
			$ano = date('Y', strtotime($data_nasc));
			if($estado_nasc == "") {
				$validator = 'Selecione seu estado!';
				$a = 4;			
				return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular'))
					->withErrors($validator)
					->withInput(session()->flashInput($request->input()));	
			} else if($ano > '2010'){
				$validator = 'Você não tem idade suficiente para este Processo Seletivo!';
				$a = 4;			
				return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular'))
					->withErrors($validator)
					->withInput(session()->flashInput($request->input()));	
			} else {
				$validator = 'Vamos em frente! Agora informe os dados da residência onde você mora!';
				$a = 5;			
				return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc'))
					->withErrors($validator)
					->withInput(session()->flashInput($request->input()));	
			}
		} else if( !($input['cpf'] == "") && $a == 5 ){
			$cpf 		  = $input['cpf'];
			$vaga 		  = $input['vaga'];
			$nome 		  = $input['nome'];
			$email 		  = $input['email'];
			$fone_fixo 	  = $input['fone_fixo'];
			$celular 	  = $input['celular'];
			$naturalidade = $input['naturalidade'];
			$estado_nasc  = $input['estado_nasc'];
			$cidade_nasc  = $input['cidade_nasc'];
			$data_nasc 	  = $input['data_nasc'];
			$validator = Validator::make($request->all(), [
				'rua' 		  => 'required|max:100',				
				'numero'  	  => 'required|max:10',
				'bairro'  	  => 'required|max:100',
				'cidade'  	  => 'required|max:100',
				'cep'  		  => 'required|max:9'
			]);
			if($validator->fails()){
				return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc'))
				->withErrors($validator)
				->withInput(session()->flashInput($request->input()));	
			}
			$rua 		  = $input['rua'];
			$numero 	  = $input['numero'];
			$bairro 	  = $input['bairro'];
			$cidade 	  = $input['cidade'];
			$estado 	  = $input['estado'];
			$cep 		  = $input['cep'];
			$complemento  = $input['complemento'];
			$validator = 'Um pouco mais sobre você:';
			$a = 6;			
			return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc','rua','numero','bairro','cidade','estado','cep','complemento'))
				->withErrors($validator)
				->withInput(session()->flashInput($request->input()));
		} else if( !($input['cpf'] == "") && $a == 6 ){
			$cpf 		  = $input['cpf'];
			$vaga 		  = $input['vaga'];
			$nome 		  = $input['nome'];
			$email 		  = $input['email'];
			$fone_fixo 	  = $input['fone_fixo'];
			$celular 	  = $input['celular'];
			$naturalidade = $input['naturalidade'];
			$estado_nasc  = $input['estado_nasc'];
			$cidade_nasc  = $input['cidade_nasc'];
			$data_nasc 	  = $input['data_nasc'];
			$rua 		  = $input['rua'];
			$numero 	  = $input['numero'];
			$bairro 	  = $input['bairro'];
			$cidade 	  = $input['cidade'];
			$estado 	  = $input['estado'];
			$cep 		  = $input['cep'];
			$complemento  = $input['complemento'];
			$validator = Validator::make($request->all(), [
				'escolaridade' 		  => 'required|max:100',				
				'status_escolaridade' => 'required|max:50',
				'formacao'  	  	  => 'required|max:150',
				'cursos'  	  		  => 'required|max:1000',
				'deficiencia'  		  => 'required|max:9'
			]);
			if($validator->fails()){
				return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc','rua','numero','bairro','cidade','estado','cep','complemento'))
					->withErrors($validator)
					->withInput(session()->flashInput($request->input()));	
			}
			$escolaridade = $input['escolaridade'];
			$status_escolaridade = $input['status_escolaridade'];
			$formacao 			 = $input['formacao'];
			$cursos 			 = $input['cursos'];
			$deficiencia 	     = $input['deficiencia'];
			if($deficiencia !== "0") {
				if($request->file('arquivo_deficiencia') === NULL) {	
					$validator = 'Informe o arquivo de PCD!';
					$a = 6;
					return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc','rua','numero','bairro','cidade','estado','cep','complemento'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));		
				} else {
					$nomeA = $_FILES['arquivo_deficiencia']['name'];
					$extensao = pathinfo($nomeA, PATHINFO_EXTENSION);
					if($extensao === 'pdf' || $extensao === 'doc' || $extensao === 'docx') {
						$arquivo_deficiencia = $input['arquivo_deficiencia'];	
						$nprocesso = $input['processo_nome'];
						$request->file('arquivo_deficiencia')->move('../public/storage/candidato/deficiencia/'.$nprocesso.'/',$nomeA);
						$arquivo_deficiencia = 'candidato/deficiencia/'.$nprocesso.'/'.$nomeA; 
						$validator = 'Nos fale sobre suas experiências anteriores...';
						$a = 7;
						return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc','rua','numero','bairro','cidade','estado','cep','complemento','escolaridade','status_escolaridade','formacao','cursos','deficiencia','arquivo_deficiencia'))
							->withErrors($validator)
							->withInput(session()->flashInput($request->input()));	
					} else {
						$validator = 'Os arquivos permitidos são: .doc, .docx e .pdf!';
						$a = 6;
						return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc','rua','numero','bairro','cidade','estado','cep','complemento'))
							->withErrors($validator)
							->withInput(session()->flashInput($request->input()));		
					}
				}
			} else {
				$arquivo_deficiencia = NULL;	
				$validator = 'Nos fale sobre suas experiências anteriores...';
				$a = 7;
				return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc','rua','numero','bairro','cidade','estado','cep','complemento','escolaridade','status_escolaridade','formacao','cursos','deficiencia','arquivo_deficiencia'))
					->withErrors($validator)
					->withInput(session()->flashInput($request->input()));											
			}
		} else if( !($input['cpf'] == "") && $a == 7 ){
			$cpf 		  = $input['cpf'];
			$vaga 		  = $input['vaga'];
			$nome 		  = $input['nome'];
			$email 		  = $input['email'];
			$fone_fixo 	  = $input['fone_fixo'];
			$celular 	  = $input['celular'];
			$naturalidade = $input['naturalidade'];
			$estado_nasc  = $input['estado_nasc'];
			$cidade_nasc  = $input['cidade_nasc'];
			$data_nasc 	  = $input['data_nasc'];
			$rua 		  = $input['rua'];
			$numero 	  = $input['numero'];
			$bairro 	  = $input['bairro'];
			$cidade 	  = $input['cidade'];
			$estado 	  = $input['estado'];
			$cep 		  = $input['cep'];
			$complemento  = $input['complemento'];
			$escolaridade = $input['escolaridade'];
			$status_escolaridade = $input['status_escolaridade'];
			$formacao 			 = $input['formacao'];
			$cursos 			 = $input['cursos'];
			$deficiencia 	     = $input['deficiencia'];
			$arquivo_deficiencia = $input['arquivo_deficiencia'];
			$validator = Validator::make($request->all(), [
				'empresa' 	  => 'max:150',				
				'cargo' 	  => 'max:150',
				'atribuicao'  => 'max:500',
				'empresa2'    => 'max:150',
				'cargo2'  	  => 'max:150',
				'atribuicao2' => 'max:500',
				'empresa3'    => 'max:150',
				'cargo3'  	  => 'max:150',
				'atribuicao3' => 'max:500',
			]);
			if($validator->fails()){
				return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc','rua','numero','bairro','cidade','estado','cep','complemento','escolaridade','status_escolaridade','formacao','cursos','deficiencia','arquivo_deficiencia'))										
					->withErrors($validator)
					->withInput(session()->flashInput($request->input()));	
			}
			$empresa 			 = $input['empresa'];
			$cargo 				 = $input['cargo'];
			$atribuicao 		 = $input['atribuicao'];
			$data_inicio 		 = $input['data_inicio'];
			$data_fim 			 = $input['data_fim']; 
			$empresa2 			 = $input['empresa2'];
			$cargo2 			 = $input['cargo2'];
			$atribuicao2 		 = $input['atribuicao2'];
			$data_inicio2 		 = $input['data_inicio2'];
			$data_fim2 			 = $input['data_fim2'];
			$empresa3 			 = $input['empresa3'];
			$cargo3 		 	 = $input['cargo3'];
			$atribuicao3 		 = $input['atribuicao3'];
			$data_inicio3 		 = $input['data_inicio3'];
			$data_fim3 			 = $input['data_fim3'];
			$a = 0; $b = 0; $c = 0;
			if($data_inicio !== NULL && $data_fim !== NULL) {
				$anoI = date('Y-m-d', strtotime($data_inicio));
				$anoF = date('Y-m-d', strtotime($data_fim));
				if($anoI == $anoF || $anoF < $anoI) {
					$validator = 'Data Final não pode ser maior ou igual a Data Início!';
					$a = 7;			
					return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc','rua','numero','bairro','cidade','estado','cep','complemento','escolaridade','status_escolaridade','formacao','cursos','deficiencia','arquivo_deficiencia'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));											
				}
			} 
			if($request->file('arquivo_ctps1') !== NULL) {
				$a = 1; 	
				$nomeC1   = $_FILES['arquivo_ctps1']['name'];
				$extensao = pathinfo($nomeC1, PATHINFO_EXTENSION);
				if($extensao == 'pdf' || $extensao == 'doc' || $extensao == 'docx') {
					$arquivo_ctps1 = $input['arquivo_ctps1'];	
					$nprocesso = $input['processo_nome'];
					$request->file('arquivo_ctps1')->move('../public/storage/candidato/ctps1/'.$nprocesso.'/', $nomeC1);
					$arquivo_ctps1 = 'candidato/deficiencia/ctps1/'.$nprocesso.'/'.$nomeC1; 
				} else {
					$validator = 'Só é suportado arquivos: .pdf, .doc, .docx!';
					$a = 7;
					$arquivo_ctps1 = NULL;					
					return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc','rua','numero','bairro','cidade','estado','cep','complemento','escolaridade','status_escolaridade','formacao','cursos','deficiencia','arquivo_deficiencia'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));	
				}
			} 
			if($request->file('arquivo_ctps2') !== NULL) {
				$b = 1;
				$nomeC2   = $_FILES['arquivo_ctps2']['name'];
				$extensao = pathinfo($nomeC2, PATHINFO_EXTENSION);
				if($extensao == 'pdf' || $extensao == 'doc' || $extensao == 'docx') {
					$arquivo_ctps2 = $input['arquivo_ctps2'];
					$nprocesso = $input['processo_nome'];
					$request->file('arquivo_ctps2')->move('../public/storage/candidato/ctps2/'.$nprocesso.'/',$nomeC2);
					$arquivo_ctps2 = 'candidato/deficiencia/ctps2/'.$nprocesso.'/'.$nomeC2;
				} else {
					$validator = 'Só é suportado arquivos: .pdf, .doc, .docx!';
					$a = 7;
					$arquivo_ctps2 = NULL;					
					return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc','rua','numero','bairro','cidade','estado','cep','complemento','escolaridade','status_escolaridade','formacao','cursos','deficiencia','arquivo_deficiencia'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));	
				}
			} 
			if($request->file('arquivo_ctps3') !== NULL) {
				$c = 1;
				$nomeC3   = $_FILES['arquivo_ctps3']['name'];
				$extensao = pathinfo($nomeC3, PATHINFO_EXTENSION);
				if($extensao == 'pdf' || $extensao == 'doc' || $extensao == 'docx') {
					$arquivo_ctps3 = $input['arquivo_ctps3'];
					$nprocesso = $input['processo_nome'];
					$request->file('arquivo_ctps3')->move('../public/storage/candidato/ctps3/'.$nprocesso.'/',$nomeC3);
					$arquivo_ctps3 = 'candidato/deficiencia/ctps3/'.$nprocesso.'/'.$nomeC3;
				} else {
					$validator = 'Só é suportado arquivos: .pdf, .doc, .docx!';
					$a = 7;
					$arquivo_ctps3 = NULL;		
					return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc','rua','numero','bairro','cidade','estado','cep','complemento','escolaridade','status_escolaridade','formacao','cursos','deficiencia','arquivo_deficiencia'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));	
				}
			} 
			if($a == 0){
				$arquivo_ctps1 = null;
			}
			if($b == 0){
				$arquivo_ctps2 = null;
			}
			if($c == 0) {
				$arquivo_ctps3 = null;
			}
			$validator = 'Agora, é de extrema importância que você anexe o seu currículo!';
			$a = 8;
			return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc','rua','numero','bairro','cidade','estado','cep','complemento','escolaridade','status_escolaridade','formacao','cursos','deficiencia','arquivo_deficiencia','empresa','cargo','atribuicao','data_inicio','data_fim','arquivo_ctps1','empresa2','cargo2','atribuicao2','data_inicio2','data_fim2','arquivo_ctps2','empresa3','cargo3','atribuicao3','data_inicio3','data_fim3','arquivo_ctps3'))
				->withErrors($validator)
				->withInput(session()->flashInput($request->input()));			
		} else if( !($input['cpf'] == "") && $a == 8 ){
			$cpf 		  = $input['cpf'];
			$vaga 		  = $input['vaga'];
			$nome 		  = $input['nome'];
			$email 		  = $input['email'];
			$fone_fixo 	  = $input['fone_fixo'];
			$celular 	  = $input['celular'];
			$naturalidade = $input['naturalidade'];
			$estado_nasc  = $input['estado_nasc'];
			$cidade_nasc  = $input['cidade_nasc'];
			$data_nasc 	  = $input['data_nasc'];
			$rua 		  = $input['rua'];
			$numero 	  = $input['numero'];
			$bairro 	  = $input['bairro'];
			$cidade 	  = $input['cidade'];
			$estado 	  = $input['estado'];
			$cep 		  = $input['cep'];
			$complemento  = $input['complemento'];
			$escolaridade = $input['escolaridade'];
			$status_escolaridade = $input['status_escolaridade'];
			$formacao 			 = $input['formacao'];
			$cursos 			 = $input['cursos'];
			$deficiencia 	     = $input['deficiencia'];
			$arquivo_deficiencia = $input['arquivo_deficiencia'];
			$empresa 			 = $input['empresa'];
			$cargo 				 = $input['cargo'];
			$atribuicao 		 = $input['atribuicao'];
			$data_inicio 		 = $input['data_inicio'];
			$data_fim 			 = $input['data_fim'];
			$arquivo_ctps1       = $input['arquivo_ctps1'];
			$empresa2 			 = $input['empresa2'];
			$cargo2 			 = $input['cargo2'];
			$atribuicao2 		 = $input['atribuicao2'];
			$data_inicio2 		 = $input['data_inicio2'];
			$data_fim2 			 = $input['data_fim2'];
			$arquivo_ctps2       = $input['arquivo_ctps2'];
			$empresa3 			 = $input['empresa3'];
			$cargo3 		 	 = $input['cargo3'];
			$atribuicao3 		 = $input['atribuicao3'];
			$data_inicio3 		 = $input['data_inicio3'];
			$data_fim3 			 = $input['data_fim3'];
			$arquivo_ctps3       = $input['arquivo_ctps3'];
			$arquivo             = $input['arquivo'];
			if($request->file('arquivo') === NULL) {	
				$validator = 'Anexe seu currículo!';
				$a = 8;
				return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc','rua','numero','bairro','cidade','estado','cep','complemento','escolaridade','status_escolaridade','formacao','cursos','deficiencia','arquivo_deficiencia','empresa','cargo','atribuicao','data_inicio','data_fim','arquivo_ctps1','empresa2','cargo2','atribuicao2','data_inicio2','data_fim2','arquivo_ctps2','empresa3','cargo3','atribuicao3','data_inicio3','data_fim3','arquivo_ctps3'))
					->withErrors($validator)
					->withInput(session()->flashInput($request->input()));			
			} else {
				$nomeB = $_FILES['arquivo']['name'];
				$extensao = pathinfo($nomeB, PATHINFO_EXTENSION);
				if($extensao === 'pdf' || $extensao === 'doc' || $extensao === 'docx') {
					$nprocesso = $input['processo_nome'];
					$arquivo = $input['arquivo'];
					if($extensao === 'pdf'){
						$arquivo = $nome.'.pdf'; 	
					} else if($extensao === 'doc'){
						$arquivo = $nome.'.doc';
					} else {
						$arquivo = $nome.'.docx';
					}
					$request->file('arquivo')->move('../public/storage/candidato/curriculo/'.$nprocesso.'/',$arquivo);
					$validator = 'Precisamos saber um pouco mais sobre sua disponibilidade.';
					$a = 9;
					return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc','rua','numero','bairro','cidade','estado','cep','complemento','escolaridade','status_escolaridade','formacao','cursos','deficiencia','arquivo_deficiencia','empresa','cargo','atribuicao','data_inicio','data_fim','arquivo_ctps1','empresa2','cargo2','atribuicao2','data_inicio2','data_fim2','arquivo_ctps2','empresa3','cargo3','atribuicao3','data_inicio3','data_fim3','arquivo_ctps3','arquivo'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));		
				} else {
					$validator = 'Os arquivos permitidos são: .doc, .docx e .pdf!';
					$a = 8;
					return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc','rua','numero','bairro','cidade','estado','cep','complemento','escolaridade','status_escolaridade','formacao','cursos','deficiencia','arquivo_deficiencia','empresa','cargo','atribuicao','data_inicio','data_fim','arquivo_ctps1','empresa2','cargo2','atribuicao2','data_inicio2','data_fim2','arquivo_ctps2','empresa3','cargo3','atribuicao3','data_inicio3','data_fim3','arquivo_ctps3'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));			
				}
			}
		} else if( !($input['cpf'] == "") && $a == 9 ){
			$cpf 		  = $input['cpf'];
			$vaga 		  = $input['vaga'];
			$nome 		  = $input['nome'];
			$email 		  = $input['email'];
			$fone_fixo 	  = $input['fone_fixo'];
			$celular 	  = $input['celular'];
			$naturalidade = $input['naturalidade'];
			$estado_nasc  = $input['estado_nasc'];
			$cidade_nasc  = $input['cidade_nasc'];
			$data_nasc 	  = $input['data_nasc'];
			$rua 		  = $input['rua'];
			$numero 	  = $input['numero'];
			$bairro 	  = $input['bairro'];
			$cidade 	  = $input['cidade'];
			$estado 	  = $input['estado'];
			$cep 		  = $input['cep'];
			$complemento  = $input['complemento'];
			$escolaridade = $input['escolaridade'];
			$status_escolaridade = $input['status_escolaridade'];
			$formacao 			 = $input['formacao'];
			$cursos 			 = $input['cursos'];
			$deficiencia 	     = $input['deficiencia'];
			$arquivo_deficiencia = $input['arquivo_deficiencia'];
			if($input['empresa'] == "") {
				$empresa 			 = NULL;
				$cargo 				 = NULL;
				$atribuicao 		 = NULL;
				$data_inicio 		 = NULL;
				$data_fim 			 = NULL;	
				$arquivo_ctps1       = NULL;
			} else {
				$empresa 			 = $input['empresa'];
				$cargo 				 = $input['cargo'];
				$atribuicao 		 = $input['atribuicao'];
				$data_inicio 		 = $input['data_inicio'];
				$data_fim 			 = date('Y-m-d',strtotime('now'));
				$arquivo_ctps1		 = $input['arquivo_ctps1'];
			}
			if($input['empresa2'] == "") {
				$empresa2 			 = NULL;
				$cargo2 			 = NULL;
				$atribuicao2 		 = NULL;
				$data_inicio2 		 = NULL;
				$data_fim2 			 = NULL;	
				$arquivo_ctps2       = NULL;
			} else {
				$empresa2 			 = $input['empresa2'];
				$cargo2 			 = $input['cargo2'];
				$atribuicao2 		 = $input['atribuicao2'];
				$data_inicio2 		 = $input['data_inicio2'];
				$data_fim2 			 = date('Y-m-d',strtotime('now'));				
				$arquivo_ctps2		 = $input['arquivo_ctps2'];
			}
			if($input['empresa3'] == "") {
				$empresa3 			 = NULL;
				$cargo3 		 	 = NULL;
				$atribuicao3 		 = NULL;
				$data_inicio3 		 = NULL;
				$data_fim3 			 = NULL;
				$arquivo_ctps3       = NULL;
			} else {
				$empresa3 			 = $input['empresa3'];
				$cargo3 		 	 = $input['cargo3'];
				$atribuicao3 		 = $input['atribuicao3'];
				$data_inicio3 		 = $input['data_inicio3'];
				$data_fim3 			 = date('Y-m-d',strtotime('now'));	
				$arquivo_ctps3       = $input['arquivo_ctps3'];
			}
			$arquivo 	  = $input['arquivo'];
			$habilitacao  = $input['habilitacao'];
			$periodo 	  = $input['periodo'];
			$outra_cidade = $input['outra_cidade'];
			$validator = Validator::make($request->all(), [
				'como_soube2' 	  => 'max:255',				
				'parentesco_nome' => 'max:255'
			]);
			if($validator->fails()){
				return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc','rua','numero','bairro','cidade','estado','cep','complemento','escolaridade','status_escolaridade','formacao','cursos','deficiencia','arquivo_deficiencia','empresa','cargo','atribuicao','data_inicio','data_fim','arquivo_ctps1','empresa2','cargo2','atribuicao2','data_inicio2','data_fim2','arquivo_ctps2','empresa3','cargo3','atribuicao3','data_inicio3','data_fim3','arquivo_ctps3','arquivo','habilitacao','periodo','outra_cidade'))
					->withErrors($validator)
					->withInput(session()->flashInput($request->input()));	
			}
			$como_soube   = $input['como_soube'];
			$parentesco   = $input['parentesco'];
			if($como_soube == "outros"){
				$como_soube = $input['como_soube2'];
			} 
			if($parentesco == "sim"){
				$parentesco_nome = $input['parentesco_nome'];
			}else{
				$parentesco_nome = "";
			}
			$validator = 'Muito Obrigado por inscrever-se!';
			$a = 10;			
			return view('cadastro_candidatos', compact('unidade','processos','a','vagas','vaga','cpf','nome','email','fone_fixo','celular','naturalidade','estado_nasc','cidade_nasc','data_nasc','rua','numero','bairro','cidade','estado','cep','complemento','escolaridade','status_escolaridade','formacao','cursos','deficiencia','arquivo_deficiencia','empresa','cargo','atribuicao','data_inicio','data_fim','arquivo_ctps1','empresa2','cargo2','atribuicao2','data_inicio2','data_fim2','arquivo_ctps2','empresa3','cargo3','atribuicao3','data_inicio3','data_fim3','arquivo_ctps3','arquivo','habilitacao','periodo','outra_cidade','como_soube','parentesco','parentesco_nome'))
				->withErrors($validator)
				->withInput(session()->flashInput($request->input()));	
		} else if( !($input['cpf'] == "") && $a == 10 ){
			$cpf 		  = $input['cpf'];
			$vaga 		  = $input['vaga'];
			$nome 		  = $input['nome'];
			$email 		  = $input['email'];
			$fone_fixo 	  = $input['fone_fixo'];
			$celular 	  = $input['celular'];
			$naturalidade = $input['naturalidade'];
			$estado_nasc  = $input['estado_nasc'];
			$cidade_nasc  = $input['cidade_nasc'];
			$data_nasc 	  = $input['data_nasc'];
			$rua 		  = $input['rua'];
			$numero 	  = $input['numero'];
			$bairro 	  = $input['bairro'];
			$cidade 	  = $input['cidade'];
			$estado 	  = $input['estado'];
			$cep 		  = $input['cep'];
			$complemento  = $input['complemento'];
			$escolaridade = $input['escolaridade'];
			$status_escolaridade = $input['status_escolaridade'];
			$formacao 			 = $input['formacao'];
			$cursos 			 = $input['cursos'];
			$deficiencia 	     = $input['deficiencia'];
			$arquivo_deficiencia = $input['arquivo_deficiencia'];
			$empresa 			 = $input['empresa'];
			$cargo 				 = $input['cargo'];
			$atribuicao 		 = $input['atribuicao'];
			$data_inicio 		 = $input['data_inicio'];
			$data_fim 			 = $input['data_fim'];
			$arquivo_ctps1       = $input['arquivo_ctps1'];
			$empresa2 			 = $input['empresa2'];
			$cargo2 			 = $input['cargo2'];
			$atribuicao2 		 = $input['atribuicao2'];
			$data_inicio2 		 = $input['data_inicio2'];
			$data_fim2 			 = $input['data_fim2'];
			$arquivo_ctps2		 = $input['arquivo_ctps2'];
			$empresa3 			 = $input['empresa3'];
			$cargo3 		 	 = $input['cargo3'];
			$atribuicao3 		 = $input['atribuicao3'];
			$data_inicio3 		 = $input['data_inicio3'];
			$data_fim3 			 = $input['data_fim3'];
			$arquivo_ctps3		 = $input['arquivo_ctps3'];
			$habilitacao 		 = $input['habilitacao'];
			$periodo 			 = $input['periodo'];
			$p1 = ""; $p2 = ""; $p3 = "";
			if($periodo == "periodo_integral"){
				$p1 = $periodo; $p2 = NULL; $p3 = NULL;
			} else if ($periodo == "periodo_noturno"){
				$p1 = NULL; $p2 = $periodo; $p3 = NULL;
			} else if ($periodo == ""){
				$p1 = NULL; $p2 = NULL; $p3 = $periodo;
			}
			$outra_cidade     = $input['outra_cidade'];
			$arquivo 		  = $input['arquivo'];
			$como_soube 	  = $input['como_soube'];
			if($como_soube == "outros"){
				$como_soube = $input['como_soube2'];
			} 
			$parentesco = $input['parentesco'];
			$parentesco_nome = $input['parentesco_nome'];
			$input['vaga_id'] = $vaga;
			$input['processo_seletivo_id'] = $id_processo;
			$input['data_inscricao'] 	   = $hoje = date('Y-m-d',(strtotime('now')));
			$data_inscricao = $input['data_inscricao'];
			$nprocesso 		= $input['processo_nome'];
			$n_vaga    = Vaga::where('id',$vaga)->get();
			$nome_vaga = $n_vaga[0]->nome; 
			$cpf = $input['cpf'];
			$processos2 = DB::table('processo_seletivo_'.$nprocesso)->where('cpf',$cpf)->get();
			$qtd = sizeof($processos2);
			if($qtd > 0) {
				$validator = 'Você já está participando desta seleção! Desejamos Boa Sorte e Sucesso!';		
				$a = 1;
				return view('cadastro_candidatos', compact('unidade','processos','a'))
					->withErrors($validator)
					->withInput(session()->flashInput($request->input()));	
			} 
			$empresa = htmlentities($empresa,ENT_QUOTES); $atribuicao = htmlentities($atribuicao,ENT_QUOTES);
			$empresa2 = htmlentities($empresa2,ENT_QUOTES); $atribuicao2 = htmlentities($atribuicao2,ENT_QUOTES);
			$empresa3 = htmlentities($empresa3,ENT_QUOTES); $atribuicao3 = htmlentities($atribuicao3,ENT_QUOTES);

			DB::statement("INSERT INTO processo_seletivo_".$nprocesso."
			(vaga,data_inscricao,nome, cpf, email, telefone_fixo, telefone, lugar_nascimento, estado_nascimento,
			cidade_nascimento, data_nascimento, rua, numero, bairro, cidade, estado,
			cep, complemento, escolaridade, status_escolaridade, formacao, cursos,
			deficiencia, habilitacao, periodo_integral, periodo_noturno, meio_periodo,
			outra_cidade, exp_01_empresa, exp_01_cargo, exp_01_atribuicoes, arquivo_ctps1,
			exp_01_data_ini, exp_01_data_fim, exp_02_empresa, exp_02_cargo, exp_02_atribuicoes,
			arquivo_ctps2, exp_02_data_ini, exp_02_data_fim, exp_03_empresa, exp_03_cargo,
			exp_03_atribuicoes, arquivo_ctps3, exp_03_data_ini, exp_03_data_fim, como_soube, parentesco, parentesco_nome, 
			nomearquivo, status, status_avaliacao, data_avaliacao, msg_avaliacao, status_entrevista,
			data_entrevista, msg_entrevista, status_resultado, msg_resultado, nomearquivo2, numeroInscricao) 
			VALUES 
			('$nome_vaga','$data_inscricao','$nome','$cpf','$email','$fone_fixo','$celular',
			'$naturalidade','$estado_nasc','$cidade_nasc','$data_nasc','$rua','$numero',
			'$bairro','$cidade','$estado','$cep','$complemento','$escolaridade','$status_escolaridade','$formacao',
			'$cursos','$deficiencia','$habilitacao','$p1','$p2',
			'$p3','$outra_cidade','$empresa','$cargo','$atribuicao',
			'$arquivo_ctps1','$data_inicio','$data_fim','$empresa2','$cargo2',
			'$atribuicao2','$arquivo_ctps2','$data_inicio2','$data_fim2','$empresa3',
			'$cargo3','$atribuicao3','$arquivo_ctps3','$data_inicio3','$data_fim3',
			'$como_soube','$parentesco','$parentesco_nome','$arquivo_deficiencia','','','','','','','','','','$arquivo','') ");
			

			Mail::send('email.resultadoCadastro', [], function($m) use ($email) {
				$m->from('portal@hcpgestao.org.br', 'PROCESSO SELETIVO HCP GESTÃO');
				$m->subject('Cadastro Concluído!!!');
				$m->to($email);
			});

			$validator = 'Você foi cadastrado para esta seleção! Desejamos Boa Sorte!!!';
	
			$a = 10;	
			$unidades = Unidade::all();
			$processos = DB::table('processo_seletivo')
			->join('unidade', 'processo_seletivo.unidade_id', '=', 'unidade.id')
			->select('processo_seletivo.*', 'unidade.nome as NOME')
			->get()->toArray();
			$processos2 = DB::table('unidade')
			->join('processo_seletivo', 'unidade.id', '=', 'processo_seletivo.unidade_id')
			->select('processo_seletivo.*', 'unidade.*')
			->get()->toArray();
			$numero = DB::table('processo_seletivo_'.$nprocesso)->select('id')->where('cpf', $cpf)->get()->toArray();
			$id2 = $numero[0]->id;
			$numeroInscricao = $nprocesso.'-'.$id2;
			DB::statement("UPDATE processo_seletivo_".$nprocesso." SET numeroInscricao = '$numeroInscricao' WHERE id = '$id2' ");
			return view('candidato_', compact('unidade','processos','numero','nprocesso'));	
		}
	}
}