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
use App\Model\Estado;
use Throwable;
use DB;
use Redirect;
use Validator;

class CandidatoController extends Controller
{
	// Página Inicial - Candidatos //
    function candidatoIndex()
	{
		$unidades = Unidade::all();
		$hoje = date('Y-m-d', strtotime('now'));
		$processos = DB::table('processo_seletivo')
		->join('unidade', 'processo_seletivo.unidade_id', '=', 'unidade.id')
		->select('processo_seletivo.*', 'unidade.nome as NOME','unidade.caminho as CAMINHO','unidade.id as unidade_id')
		->get()->toArray();
		$processos2 = DB::table('unidade')
		->join('processo_seletivo','unidade.id','=','processo_seletivo.unidade_id')
		->select('unidade.id')
		->where('inscricao_fim','>=',$hoje)
		->where('inscricao_inicio','<=',$hoje)
		->orderby('unidade_id','ASC')
		->get(); 
		$qtdP = sizeof($processos2); 
		$quadros = QuadroAvisos::orderby('id','DESC')->get();
		return view('candidato', compact('unidades','processos','processos2','quadros','qtdP'));
	}
	
	public function areaCandidato()
	{
		$unidades = Unidade::all();
		$hoje = date('Y-m-d', strtotime('now'));
		$processos = DB::table('processo_seletivo')
		->join('unidade', 'processo_seletivo.unidade_id', '=', 'unidade.id')
		->select('processo_seletivo.*', 'unidade.nome as NOME','unidade.caminho as CAMINHO',
				 'unidade.id as unidade_id')
		->where('processo_seletivo.inscricao_fim','>=',$hoje)
		->where('processo_seletivo.inscricao_inicio','<=',$hoje)
		->get();
		$qtd = sizeof($processos);
		if($qtd > 0) {
			return view('areaCandidato', compact('unidades','processos'));
		} else {
			$processos2 = DB::table('unidade')
			->join('processo_seletivo','unidade.id','=','processo_seletivo.unidade_id')
			->select('unidade.id')
			->where('inscricao_fim','>=',$hoje)
			->where('inscricao_inicio','<=',$hoje)->get(); 
			$qtdP = sizeof($processos2); 
			$quadros = QuadroAvisos::all();
			return view('candidato', compact('unidades','processos','processos2','quadros'));
		}
	}

	public function loginCandidato(Request $request)
	{
		$input = $request->all(); 
		$unidades = Unidade::all();
		$hoje = date('Y-m-d', strtotime('now'));
		$processos = DB::table('processo_seletivo')
		->join('unidade', 'processo_seletivo.unidade_id', '=', 'unidade.id')
		->select('processo_seletivo.*', 'unidade.nome as NOME','unidade.caminho as CAMINHO',
				 'unidade.id as unidade_id')
		->where('processo_seletivo.inscricao_fim','>=',$hoje)
		->where('processo_seletivo.inscricao_inicio','<=',$hoje)
		->get();		
		$validator = Validator::make($request->all(), [
			'email'     => 'required|email',
            'inscricao' => 'required',
			'cpf'       => 'required|min:11'
		]);		
		if ($validator->fails()) {
			return view('/areaCandidato', compact('unidades','processos'))
				->withErrors($validator)
				->withInput(session()->flashInput($request->input())); 
		} else {
			$processoSeletivo = $input['processo_seletivo'];
			$numeroInscricao  = $input['inscricao'];		
			$email 			  = $input['email'];
			$cpf              = $input['cpf'];
			$user = DB::table('processo_seletivo_'.$processoSeletivo)
						->where('email', $email)
						->where('numeroInscricao',$numeroInscricao)
						->where('cpf',$cpf)->get();
			$qtd = sizeof($user); 			
			if ($qtd == 0) {
				$validator = 'Candidato Inválido!';
				return view('areaCandidato', compact('unidades','processos'))
					->withErrors($validator)
					->withInput(session()->flashInput($request->input())); 					
			} else {
				$estados  = Estado::all();
				$vagas    = Vaga::where('processo_seletivo_id',$processos[0]->id)->get();
				$processo = ProcessoSeletivo::where('nome',$processoSeletivo)->get();
				$unidade  = Unidade::where('id',$processo[0]->unidade_id)->get();
				$respostas = DB::table('questionario_'.$processo[0]->nome)
								->where('processo_seletivo_id',$processo[0]->id)
								->where('candidato_id',$user[0]->id)->get();
				$qtdR = sizeof($respostas);
				if($qtdR > 0) {
					$valida = false;
				} else {
					$valida = true;
				}
				return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados','unidade','valida','processo'))
					->withErrors($validator)
				  	->withInput(session()->flashInput($request->input())); 						
			}
		}
	}

	public function areaCandidatoAlterar()
	{
		return view('areaCandidatoAlterar');
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

	// Página Informações LGPD Cadastro Candidatos //
	public function informativoLGPD($id_unidade, $id_processo)
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
		return view('informativoLGPD', compact('unidades','processos','processos2'));
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
		$hoje = date('Y-m-d', strtotime('now'));
		$processos = ProcessoSeletivo::where('unidade_id', $id)->where('inscricao_fim','<',$hoje)->get();
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
		$vagas     = Vaga::where('processo_seletivo_id',$id)->where('ativo',0)->get();
		return view('cadastro_candidato2', compact('processos','vagas'));
	}

	public function storeCandidato2(Request $request, $id)
	{
		$input = $request->all();
		$processos = ProcessoSeletivo::where('id',$id)->get();
		$vagas     = Vaga::where('processo_seletivo_id',$id)->where('ativo',0)->get();
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
			escolaridade, status_escolaridade, formacao, cursos, deficiencia, cid, habilitacao, periodo_integral, 
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
		if($input['pesq'] == null) {
			$id_escolha = $idE;
			if($id_escolha == 1) {
				$processos_result = DB::table('processo_seletivo_' .$nome)
				->where('nome','like','%'.$input['pesq'].'%')
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
		$processo = ProcessoSeletivo::where('nome',$nome)->get();
		$unidade = Unidade::where('id',$processo[0]->unidade_id)->get(); 
		return view('resultados_listas_opcao', compact('processos_result','unidade','idE','id','nome'));
		
	}
	
	// Página Inscrição de Candidatos - Processo Seletivo //
	public function cadastroCandidato($id, $id_processo)
	{
		$unidade   = Unidade::find($id);
		$processos = ProcessoSeletivo::where('id',$id_processo)->get();
		$vagas 	   = Vaga::where('processo_seletivo_id', $id_processo)->where('ativo',0)->get();
		$a 		   = 1;
		$estados   = Estado::all();
		$unidades  = Unidade::all();
		return view('cadastro_candidatos', compact('unidade','processos','vagas','a','estados','unidades'));
	}

	public function validarCandidato($id, $id_processo, Request $request)
	{ 
	    try{
    		$input   = $request->all();
    		$unidade = Unidade::find($id);
    		$processos = ProcessoSeletivo::where('id',$id_processo)->get();
    		$input['processo_nome'] = $processos[0]->nome;
			$email    = $input['email'];
    		$nome_processo  = $input['processo_nome']; 
    		$vagas    = Vaga::where('processo_seletivo_id', $id_processo)->where('ativo',0)->get();
    		$estados  = Estado::all();
    		$cpf      = $input['cpf']; 
    		$hoje     = date('Y-m-d', strtotime('now')); 
    		$insc_fim = date('Y-m-d', strtotime($processos[0]->inscricao_fim));
			$unidades = Unidade::all();
    		if(strtotime($hoje) > strtotime($insc_fim))
    		{
    			$processos = ProcessoSeletivo::all();
    			$processos1 = ProcessoSeletivo::all();
    			$unidades = Unidade::all();
    			return redirect()->route('candidatoIndex')
                            ->with('processos')
    						->with('processos1')
    						->with('unidades');
    		}
    		if (strlen($cpf) != 11 || preg_match('/([0-9])\1{10}/', $cpf)) {
    			$validator = 'CPF Inválido! Você terá que anexar novamente os arquivos';		
    			return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    				->withErrors($validator)
    				->withInput(session()->flashInput($request->input()));	
    		} 
    		$processos2 = DB::table('processo_seletivo_'.$nome_processo)->where('cpf',$cpf)->get();
    		$qtd = sizeof($processos2);
    		if($qtd > 0) {
    			$validator = 'Você já está participando desta seleção! Desejamos Boa Sorte e Sucesso!';		
    			return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    				->withErrors($validator)
    				->withInput(session()->flashInput($request->input()));	
    		}
    		$validator = Validator::make($request->all(), [
				'nome_social'         => 'required|max:255',
				'pronome'             => 'required|max:255',
				'genero'              => 'required|max:255',
				'cor'	              => 'required|max:255',
				'aceito'			  => 'required|max:5',
    			'nome'  			  => 'required|max:150',
    			'cpf'   		      => 'required',
    			'email' 		 	  => 'required|max:255|email',
    			'vaga'  			  => 'required|max:400',
    			'telefone'      	  => 'required|max:30',
    			'lugar_nascimento'    => 'required|max:50',
    			'estado_nascimento'   => 'required|max:50',
    			'cidade_nascimento'   => 'required|max:100',
    			'data_nascimento'     => 'required|date',
    			'rua'				  => 'required|max:100',
    			'numero'			  => 'required|max:10',
    			'bairro'			  => 'required|max:100',
    			'cidade'			  => 'required|max:100',
    			'estado'			  => 'required|max:100',
    			'cep'				  => 'required|max:30',
    			'escolaridade'		  => 'required|max:100',
    			'status_escolaridade' => 'required|max:50',
    			'formacao'			  => 'required|max:150',
    			'cursos'			  => 'required|max:1000',
    			'habilitacao' 		  => 'required|max:15',
    			'periodo' 	 		  => 'required|max:100',
    			'outra_cidade'		  => 'required|max:15',	
    			'como_soube'    	  => 'required|max:255',
    			'parentesco'   		  => 'required|max:255'
    		]);
    		if($validator->fails()){
    			return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    			->withErrors($validator)
    			->withInput(session()->flashInput($request->input()));	
    		}
    		if(!empty($input['data_inicio'])){ $data_inicio = $input['data_inicio']; } else { $data_inicio = ""; } 
    		if(!empty($input['data_fim'])){ $data_fim = $input['data_fim']; } else { $data_fim = ""; }
    		if($data_inicio !== "" && $data_fim !== "") {
    			$anoI = date('Y-m-d', strtotime($data_inicio));
    			$anoF = date('Y-m-d', strtotime($data_fim)); 
    			if(strtotime($anoI) == strtotime($anoF) || strtotime($anoF) < strtotime($anoI)) {
    				$validator = 'Na Experiência 1 a Data Final não pode ser maior ou igual a Data Início!';
    				return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    					->withErrors($validator)
    					->withInput(session()->flashInput($request->input()));											
    			}
    		} 
    		if($request->file('arquivo_ctps1') !== NULL) {
    			$nomeC1   = $_FILES['arquivo_ctps1']['name'];
    			$extensao = pathinfo($nomeC1, PATHINFO_EXTENSION);
    			if($extensao == 'pdf' || $extensao == 'doc' || $extensao == 'docx' || $extensao == 'jpg' || $extensao == 'jpeg' || $extensao == 'png' || $extensao == 'PDF' || $extensao == 'DOC' || $extensao == 'DOCX' || $extensao == 'JPG' || $extensao == 'JPEG' || $extensao == 'PNG') {
    				$tamanho = $request->file('arquivo_ctps1')->getSize();
    				if($tamanho > 10000000) {	
    					$validator = 'O tamanho máximo do Arquivo CTPS 1 é 10MB! Você terá que anexar novamente os arquivos';
    					return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    						->withErrors($validator)
    						->withInput(session()->flashInput($request->input()));			
    				}
    				$arquivo_ctps1 = $input['arquivo_ctps1'];	
    				$nprocesso 	   = $nome_processo;
    				$request->file('arquivo_ctps1')->move('../public/storage/candidato/ctps1/'.$nprocesso.'/', $nomeC1);
    				$arquivo_ctps1 = 'candidato/ctps1/'.$nprocesso.'/'.$nomeC1; 
    			} else {
    				$validator 	   = 'No CTPS 1 só é suportado arquivos: .pdf, .doc, .docx! Você terá que anexar novamente os arquivos';
    				$arquivo_ctps1 = NULL;					
    				return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    					->withErrors($validator)
    					->withInput(session()->flashInput($request->input()));	
    			}
    		} else { $arquivo_ctps1 = ""; }
    		if(!empty($input['data_inicio2'])){ $data_inicio2 = $input['data_inicio2']; } else { $data_inicio2 = ""; }
    		if(!empty($input['data_fim2'])){ $data_fim2 = $input['data_fim2']; } else { $data_fim2 = ""; }
    		if($data_inicio2 !== "" && $data_fim2 !== "") {
    			$anoI = date('Y-m-d', strtotime($data_inicio2));
    			$anoF = date('Y-m-d', strtotime($data_fim2));
    			if($anoI == $anoF || $anoF < $anoI) {
    				$validator = 'Na Experiência 2 a Data Final não pode ser maior ou igual a Data Início! Você terá que anexar novamente os arquivos';
    				return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    					->withErrors($validator)
    					->withInput(session()->flashInput($request->input()));											
    			}
    		}
    		if($request->file('arquivo_ctps2') !== NULL) {
    			$nomeC2   = $_FILES['arquivo_ctps2']['name'];
    			$extensao = pathinfo($nomeC2, PATHINFO_EXTENSION);
    			if($extensao == 'pdf' || $extensao == 'doc' || $extensao == 'docx' || $extensao == 'jpg' || $extensao == 'jpeg' || $extensao == 'png' || $extensao == 'PDF' || $extensao == 'DOC' || $extensao == 'DOCX' || $extensao == 'JPG' || $extensao == 'JPEG' || $extensao == 'PNG') {
    				$tamanho = $request->file('arquivo_ctps2')->getSize();
    				if($tamanho > 10000000) {	
    					$validator = 'O tamanho máximo do Arquivo CTPS 2 é 10MB! Você terá que anexar novamente os arquivos';
    					return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    						->withErrors($validator)
    						->withInput(session()->flashInput($request->input()));			
    				}
    				$arquivo_ctps2 = $input['arquivo_ctps2'];
    				$nprocesso 	   = $nome_processo;
    				$request->file('arquivo_ctps2')->move('../public/storage/candidato/ctps2/'.$nprocesso.'/',$nomeC2);
    				$arquivo_ctps2 = 'candidato/ctps2/'.$nprocesso.'/'.$nomeC2;
    			} else {
    				$validator 	   = 'No CTPS 2 só é suportado arquivos: .pdf, .doc, .docx! Você terá que anexar novamente os arquivos';
    				$arquivo_ctps2 = NULL;					
    				return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    					->withErrors($validator)
    					->withInput(session()->flashInput($request->input()));	
    			}
    		} else { $arquivo_ctps2 = ""; }
    		if(!empty($input['data_inicio3'])){ $data_inicio3 = $input['data_inicio3']; } else { $data_inicio3 = ""; }
    		if(!empty($input['data_fim3'])){ $data_fim3 = $input['data_fim3']; } else { $data_fim3 = ""; }
    		if($data_inicio3 !== "" && $data_fim3 !== "") {
    			$anoI = date('Y-m-d', strtotime($data_inicio3));
    			$anoF = date('Y-m-d', strtotime($data_fim3));
    			if($anoI == $anoF || $anoF < $anoI) {
    				$validator = 'Na Experiência 3 a Data Final não pode ser maior ou igual a Data Início! Você terá que anexar novamente os arquivos';
    				return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    					->withErrors($validator)
    					->withInput(session()->flashInput($request->input()));											
    			}
    		} 
    		if($request->file('arquivo_ctps3') !== NULL) {
    			$nomeC3   = $_FILES['arquivo_ctps3']['name'];
    			$extensao = pathinfo($nomeC3, PATHINFO_EXTENSION);
    			if($extensao == 'pdf' || $extensao == 'doc' || $extensao == 'docx' || $extensao == 'jpg' || $extensao == 'jpeg' || $extensao == 'png' || $extensao == 'PDF' || $extensao == 'DOC' || $extensao == 'DOCX' || $extensao == 'JPG' || $extensao == 'JPEG' || $extensao == 'PNG') {
    				$tamanho = $request->file('arquivo_ctps3')->getSize();
    				if($tamanho > 10000000) {	
    					$validator = 'O tamanho máximo do Arquivo CTPS 3 é 10MB! Você terá que anexar novamente os arquivos';
    					return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    						->withErrors($validator)
    						->withInput(session()->flashInput($request->input()));			
    				} 
    				$arquivo_ctps3 = $input['arquivo_ctps3'];
    				$nprocesso 	   = $nome_processo;
    				$request->file('arquivo_ctps3')->move('../public/storage/candidato/ctps3/'.$nprocesso.'/',$nomeC3);
    				$arquivo_ctps3 = 'candidato/ctps3/'.$nprocesso.'/'.$nomeC3;
    			} else {
    				$validator     = 'No CTPS 3 só é suportado arquivos: .pdf, .doc, .docx! Você terá que anexar novamente os arquivos';
    				$arquivo_ctps3 = NULL;		
    				return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    					->withErrors($validator)
    					->withInput(session()->flashInput($request->input()));	
    			}
    		} else { $arquivo_ctps3 = ""; }
    		$deficiencia_status = $input['deficiencia_status'];
    		if($deficiencia_status == "sim") {
    			if($request->file('arquivo_deficiencia') === NULL) {	
    				$arquivo_deficiencia = ""; 
    				$cid 		 = $input['cid'];
    				$deficiencia = $input['deficiencia'];		
    			} else {
    				$nomeA = $_FILES['arquivo_deficiencia']['name'];
    				$extensao = pathinfo($nomeA, PATHINFO_EXTENSION);
    				if($extensao == 'pdf' || $extensao == 'doc' || $extensao == 'docx' || $extensao == 'jpg' || $extensao == 'jpeg' || $extensao == 'png' || $extensao == 'PDF' || $extensao == 'DOC' || $extensao == 'DOCX' || $extensao == 'JPG' || $extensao == 'JPEG' || $extensao == 'PNG') {
    					$tamanho = $request->file('arquivo_deficiencia')->getSize();
    					if($tamanho > 10000000) {	
    						$validator = 'O tamanho máximo do Arquivo PCD é 10MB! Você terá que anexar novamente os arquivos';
    						return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    							->withErrors($validator)
    							->withInput(session()->flashInput($request->input()));			
    					} 
    					$arquivo_deficiencia = $input['arquivo_deficiencia'];	
    					$nprocesso 			 = $nome_processo;
    					$request->file('arquivo_deficiencia')->move('../public/storage/candidato/deficiencia/'.$nprocesso.'/',$nomeA);
    					$arquivo_deficiencia = 'candidato/deficiencia/'.$nprocesso.'/'.$nomeA; 
    					$cid 		 = $input['cid'];
    					$deficiencia = $input['deficiencia'];
    				} else {
    					$validator = 'No anexo deficiência os arquivos permitidos são: .doc, .docx e .pdf! Você terá que anexar novamente os arquivos';
    					return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    							->withErrors($validator)
    							->withInput(session()->flashInput($request->input()));		
    				}
    			}
    		} else { $arquivo_deficiencia = ""; $cid = ""; $deficiencia = "0"; }
    		$arquivo = $input['arquivo'];
    		if($request->file('arquivo') === NULL) {	
    			$validator = 'Anexe seu currículo!';
    			return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    				->withErrors($validator)
    				->withInput(session()->flashInput($request->input()));			
    		} else {
    			$nomeB = $_FILES['arquivo']['name'];
    			$extensao = pathinfo($nomeB, PATHINFO_EXTENSION);
    			if($extensao === 'pdf' || $extensao === 'doc' || $extensao === 'docx' || $extensao === 'PDF' || $extensao === 'DOC' || $extensao === 'DOCX') {
    				$tamanho = $request->file('arquivo')->getSize();
    				if($tamanho > 10000000) {
    					$validator = 'O tamanho máximo do Currículo é 10MB! Você terá que anexar novamente os arquivos';
    					return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    						->withErrors($validator)
    						->withInput(session()->flashInput($request->input()));			
    				} 
    				$nprocesso = $nome_processo;
    				$nome      = addslashes($input['nome']);
    				$arquivo   = $input['arquivo'];
    				if($extensao === 'pdf' || $extensao === 'PDF'){
    					$arquivo = $nome.'.pdf'; 	
    				} else if($extensao === 'doc' || $extensao == "DOC"){
    					$arquivo = $nome.'.doc';
    				} else if($extensao === 'docx' || $extensao == "DOCX"){
    					$arquivo = $nome.'.docx';
    				} else if($extensao === 'jpeg' || $extensao == "JPEG"){
    					$arquivo = $nome.'.jpeg';
    				} else if($extensao === 'jpg' || $extensao == "JPG"){
    					$arquivo = $nome.'.jpg';
    				} else if($extensao === 'png' || $extensao == "PNG"){
    					$arquivo = $nome.'.png';
    				}
    				$request->file('arquivo')->move('../public/storage/candidato/curriculo/'.$nprocesso.'/',$arquivo);
    			} else {
    				$validator = 'Os arquivos permitidos são: .doc, .docx, .pdf, .jpg, .jpeg, .png! Você terá que anexar novamente os arquivos';
    				return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    					->withErrors($validator)
    					->withInput(session()->flashInput($request->input()));			
    			}
    		} 
			$foto = $input['foto'];
    		if($request->file('foto') === NULL) {	
    			$validator = 'Anexe sua foto!';
    			return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    				->withErrors($validator)
    				->withInput(session()->flashInput($request->input()));			
    		} else {
    			$nomeB = $_FILES['foto']['name'];
    			$extensao = pathinfo($nomeB, PATHINFO_EXTENSION);
    			if($extensao === 'pdf' || $extensao === 'doc' || $extensao === 'docx' || $extensao === 'PDF' || $extensao === 'DOC' || $extensao === 'DOCX' || $extensao === 'jpg' || $extensao === 'JPG' || $extensao === 'jpeg' || $extensao === 'JPEG' || $extensao === 'png' || $extensao === 'PNG') {
    				$tamanho = $request->file('foto')->getSize();
    				if($tamanho > 10000000) {
    					$validator = 'O tamanho máximo da foto é 10MB! Você terá que anexar novamente os arquivos';
    					return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    						->withErrors($validator)
    						->withInput(session()->flashInput($request->input()));			
    				} 
    				$nprocesso = $nome_processo;
    				$nome      = addslashes($input['nome']);
    				$arquivo   = $input['foto'];
    				if($extensao === 'pdf' || $extensao === 'PDF'){
    					$arquivo = $nome.'.pdf'; 	
    				} else if($extensao === 'doc' || $extensao == "DOC"){
    					$arquivo = $nome.'.doc';
    				} else if($extensao === 'docx' || $extensao == "DOCX"){
    					$arquivo = $nome.'.docx';
    				} else if($extensao === 'jpeg' || $extensao == "JPEG"){
    					$arquivo = $nome.'.jpeg';
    				} else if($extensao === 'jpg' || $extensao == "JPG"){
    					$arquivo = $nome.'.jpg';
    				} else if($extensao === 'png' || $extensao == "PNG"){
    					$arquivo = $nome.'.png';
    				}
					$foto = $input['foto'];	
					$foto = 'candidato/foto/'.$nprocesso.'/'.$nomeB; 
    				$request->file('foto')->move('../public/storage/candidato/foto/'.$nprocesso.'/',$arquivo);
    			} else {
    				$validator = 'Os arquivos permitidos são: .doc, .docx, .pdf, .jpg, .jpeg, .png! Você terá que anexar novamente os arquivos';
    				return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    					->withErrors($validator)
    					->withInput(session()->flashInput($request->input()));			
    			}
    		}
    		$data_nasc = $input['data_nascimento'];
    		$ano = date('Y', strtotime($data_nasc));
    		if($ano > '2005'){
    			$validator = 'Você não tem idade suficiente para este Processo Seletivo! Você terá que anexar novamente os arquivos';
    			return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    				->withErrors($validator)
    				->withInput(session()->flashInput($request->input()));	
    		}
    		$como_soube = $input['como_soube'];
    		$parentesco = $input['parentesco'];
			$trabalho   = $input['trabalha_oss'];
    		if($como_soube == "outros"){
    			if(!empty($input['como_soube2'])){
    				$como_soube = $input['como_soube2'];
    			} else {
    				$como_soube = "";
    			}
    		} 
    		if($parentesco == "sim"){
    			if(!empty($input['parentesco_nome'])){
    				$parentesco_nome = $input['parentesco_nome'];
    			} else {
    				$parentesco_nome = "";
    			}
    		}else{
    			$parentesco_nome = "";
    		}
			if($trabalho == "sim") {
				if(!empty($input['trabalha_oss2'])) {
					$trabalho2 = $input['trabalha_oss2'];
				} else {
					$trabalho2 = "";
				}
			} else {
				$trabalho2 = "";
			}
    		$processos2 = DB::table('processo_seletivo_'.$nprocesso)->where('cpf',$cpf)->get();
    		$qtd = sizeof($processos2);
    		if($qtd > 0) {
    			$validator = 'Você já está participando desta seleção! Desejamos Boa Sorte e Sucesso!';		
    				return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
    					->withErrors($validator)
    					->withInput(session()->flashInput($request->input()));	
    		} 
    		if($input['fone_fixo'] == "(") { $input['fone_fixo'] = ""; } else { $fone_fixo = $input['fone_fixo']; }
    		$fone_fixo = addslashes($input['fone_fixo']); $celular = addslashes($input['telefone']);
    		$nome_vaga = $input['vaga']; $email = addslashes($input['email']); 
    		$naturalidade = addslashes($input['lugar_nascimento']);	$estado_nasc = $input['estado_nascimento']; 
    		$cidade_nasc  = addslashes($input['cidade_nascimento']); $rua = addslashes($input['rua']);
    		$numero = addslashes($input['numero']); $bairro = addslashes($input['bairro']); 
    		$cidade = addslashes($input['cidade']); $cep = addslashes($input['cep']);   
    		$estado = addslashes($input['estado']); $complemento = addslashes($input['complemento']);
    		$escolaridade = addslashes($input['escolaridade']); $status_escolaridade = addslashes($input['status_escolaridade']); 
    		$formacao = addslashes($input['formacao']);  $cursos = addslashes($input['cursos']);
    		if($input['periodo'] == "periodo_integral"){ $p1 = "periodo_integral"; $p2 = ""; $p3 = ""; } 
    		if($input['periodo'] == "periodo_noturno"){ $p1 = ""; $p2 = "periodo_noturno"; $p3 = ""; }
    		if($input['periodo'] == "meio_periodo"){ $p1 = ""; $p2 = ""; $p3 = "meio_periodo"; }
    		$outra_cidade = $input['outra_cidade']; $habilitacao = $input['habilitacao']; 
			$nome_social = addslashes($input['nome_social']); $pronome = $input['pronome'];
			$genero = $input['genero']; $cor = $input['cor'];  
    		if(!empty($input['empresa'])){ $empresa = addslashes($input['empresa']); }else{ $empresa = ""; }
    		if(!empty($input['cargo'])){ $cargo = addslashes($input['cargo']); }else{ $cargo = ""; }
    		if(!empty($input['atribuicao'])){ $atribuicao = addslashes($input['atribuicao']); }else{ $atribuicao = ""; }
    		if(!empty($input['empresa2'])){ $empresa2 = addslashes($input['empresa2']); }else{ $empresa2 = ""; }
    		if(!empty($input['cargo2'])){ $cargo2 = addslashes($input['cargo2']); }else{ $cargo2 = ""; }
    		if(!empty($input['atribuicao2'])){ $atribuicao2 = addslashes($input['atribuicao2']); }else{ $atribuicao2 = ""; }
    		if(!empty($input['empresa3'])){ $empresa3 = addslashes($input['empresa3']); }else{ $empresa3 = ""; }
    		if(!empty($input['cargo3'])){ $cargo3 = addslashes($input['cargo3']); }else{ $cargo3 = ""; }
    		if(!empty($input['atribuicao3'])){ $atribuicao3 = addslashes($input['atribuicao3']); }else{ $atribuicao3 = ""; }
    		$nome = addslashes($input['nome']); $aceito = addslashes($input['aceito']);  
    		
    		DB::statement("INSERT INTO processo_seletivo_".$nprocesso."
    			(vaga,data_inscricao,nome, cpf, email, telefone_fixo, telefone, lugar_nascimento, estado_nascimento,
    			cidade_nascimento, data_nascimento, rua, numero, bairro, cidade, estado,
    			cep, complemento, escolaridade, status_escolaridade, formacao, cursos, 
    			deficiencia, cid, habilitacao, periodo_integral, periodo_noturno, meio_periodo,
    			outra_cidade, exp_01_empresa, exp_01_cargo, exp_01_atribuicoes, arquivo_ctps1,
    			exp_01_data_ini, exp_01_data_fim, exp_02_empresa, exp_02_cargo, exp_02_atribuicoes,
    			arquivo_ctps2, exp_02_data_ini, exp_02_data_fim, exp_03_empresa, exp_03_cargo,
    			exp_03_atribuicoes, arquivo_ctps3, exp_03_data_ini, exp_03_data_fim, como_soube, parentesco, parentesco_nome, 
				trabalha_oss,trabalha_oss2,nome_social,pronome,genero,cor,foto,aceito,
    			nomearquivo, status, status_avaliacao, data_avaliacao, msg_avaliacao, status_entrevista,
    			data_entrevista, msg_entrevista, status_resultado, msg_resultado, nomearquivo2, numeroInscricao) 
    			VALUES 
    			('$nome_vaga','$hoje','$nome','$cpf','$email','$fone_fixo','$celular',
    			'$naturalidade','$estado_nasc','$cidade_nasc','$data_nasc','$rua','$numero',
    			'$bairro','$cidade','$estado','$cep','$complemento','$escolaridade','$status_escolaridade','$formacao',
    			'$cursos','$deficiencia','$cid','$habilitacao','$p1','$p2',
    			'$p3','$outra_cidade','$empresa','$cargo','$atribuicao',
    			'$arquivo_ctps1','$data_inicio','$data_fim','$empresa2','$cargo2',
    			'$atribuicao2','$arquivo_ctps2','$data_inicio2','$data_fim2','$empresa3',
    			'$cargo3','$atribuicao3','$arquivo_ctps3','$data_inicio3','$data_fim3',
    			'$como_soube','$parentesco','$parentesco_nome',
				'$trabalho','$trabalho2','$nome_social','$pronome','$genero','$cor','$foto','$aceito',
				'$arquivo_deficiencia','','','','','','','','','','$arquivo','') ");
    			
    			$numero = DB::table('processo_seletivo_'.$nprocesso)->select('id')->where('cpf', $cpf)->get()->toArray();
    			$id2 = $numero[0]->id;
    			$numeroInscricao = $nprocesso.'-'.$id2;
    			Mail::send('email.resultadoCadastro', ['numeroInscricao' => $numeroInscricao], function($m) use ($email,$nome_processo) {
    				$m->from('processoseletivo.hcpgestao@gmail.com', 'PROCESSO SELETIVO HCP GESTÃO');
    				$m->subject('Seu cadastro no Processo Seletivo: '.$nome_processo. ' foi realizado');
    				$m->to($email);
    			});
    			
    			$unidades = Unidade::all();
    			$processos = DB::table('processo_seletivo')
    			->join('unidade', 'processo_seletivo.unidade_id', '=', 'unidade.id')
    			->select('processo_seletivo.*', 'unidade.nome as NOME')
    			->get()->toArray();
    			$processos2 = DB::table('unidade')
    			->join('processo_seletivo', 'unidade.id', '=', 'processo_seletivo.unidade_id')
    			->select('processo_seletivo.*', 'unidade.*')
    			->get()->toArray();
				$processo = ProcessoSeletivo::where('id',$id_processo)->get();
    			DB::statement("UPDATE processo_seletivo_".$nprocesso." SET numeroInscricao = '$numeroInscricao' WHERE id = '$id2' ");
    			return view('candidato_', compact('unidade','processos','processo','numero','nprocesso'))
    						->withInput(session()->flashInput($request->input()));	
	    } catch(Throwable $e) {
			$validator = "Algo está errado!! Verifique os campos novamente!";
			DB::table('processo_seletivo_'.$nprocesso)->where('email',$email)->delete();
			return view('cadastro_candidatos', compact('unidade','processos','vagas','estados','unidades'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));	
		}
	}

	// Validação da Alteração da Inscrição do Candidato
	public function updateAreaCandidatoAlterar($id, Request $request)
	{
		try{ 
    		$input     = $request->all();
    		$processos = ProcessoSeletivo::where('id',$id)->get();
			$unidade   = Unidade::find($processos[0]->unidade_id);
			$unidades  = Unidade::all();
    		$nprocesso = $processos[0]->nome;
    		$vagas     = Vaga::where('processo_seletivo_id', $id)->where('ativo',0)->get();
			$estados   = Estado::all();
			$cpf       = $input['cpf'];
			$hoje 	   = date('Y-m-d', strtotime('now'));
			$email 	   = $input['email'];
			$user 	   = DB::table('processo_seletivo_'.$nprocesso)
						    ->where('email', $email)
							->where('cpf',$cpf)->get();
			if($cpf == NULL) {
				$validator = 'Informe o CPF!';
				$user 	   = DB::table('processo_seletivo_'.$nprocesso)
						    ->where('email', $email)->get();
				return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
    			 ->withErrors($validator)
    			 ->withInput(session()->flashInput($request->input()));	
			}
    		$validator = Validator::make($request->all(), [
				'nome_social'         => 'required|max:255',
				'pronome'             => 'required|max:255',
				'genero'              => 'required|max:255',
				'cor'	              => 'required|max:255',
				'aceito'			  => 'required|max:5',
    			'nome'  			  => 'required|max:150',
    			'cpf'  				  => 'required',
    			'email' 			  => 'required|max:255|email',
    			'vaga'  			  => 'required|max:400',
    			'telefone'      	  => 'required|max:30',
    			'lugar_nascimento'    => 'required|max:50',
    			'estado_nascimento'   => 'required|max:50',
    			'cidade_nascimento'   => 'required|max:100',
    			'data_nascimento'     => 'required|date',
    			'rua'				  => 'required|max:100',
    			'numero'			  => 'required|max:10',
    			'bairro'			  => 'required|max:100',
    			'cidade'			  => 'required|max:100',
    			'estado'			  => 'required|max:100',
    			'cep'				  => 'required|max:30',
    			'escolaridade'		  => 'required|max:100',
    			'status_escolaridade' => 'required|max:50',
    			'formacao'			  => 'required|max:150',
    			'cursos'			  => 'required|max:1000',
    			'habilitacao' 		  => 'required|max:15',
    			'periodo' 	 		  => 'required|max:100',
    			'outra_cidade'		  => 'required|max:15',	
    			'como_soube'    	  => 'required|max:255',
    			'parentesco'   		  => 'required|max:255',
				'trabalha_oss'        => 'required|max:255'
    		]);
    		if($validator->fails()){
    			return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
    			->withErrors($validator)
    			->withInput(session()->flashInput($request->input()));	
    		}
			
    		if(!empty($input['data_inicio'])){ $data_inicio = $input['data_inicio']; } else { $data_inicio = ""; } 
    		if(!empty($input['data_fim'])){ $data_fim = $input['data_fim']; } else { $data_fim = ""; }
    		if($data_inicio !== "" && $data_fim !== "") {
    			$anoI = date('Y-m-d', strtotime($data_inicio));
    			$anoF = date('Y-m-d', strtotime($data_fim)); 
    			if(strtotime($anoI) == strtotime($anoF) || strtotime($anoF) < strtotime($anoI)) {
    				$validator = 'Na Experiência 1 a Data Final não pode ser maior ou igual a Data Início!';
    				return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
    					->withErrors($validator)
    					->withInput(session()->flashInput($request->input()));											
    			}
    		}  

			if($request->file('arquivo_ctps1') !== NULL) {
				$nomeC1   = $_FILES['arquivo_ctps1']['name'];
				$extensao = pathinfo($nomeC1, PATHINFO_EXTENSION);
				if($extensao == 'pdf' || $extensao == 'doc' || $extensao == 'docx' || $extensao == 'jpg' || $extensao == 'jpeg' || $extensao == 'png' || $extensao == 'PDF' || $extensao == 'DOC' || $extensao == 'DOCX' || $extensao == 'JPG' || $extensao == 'JPEG' || $extensao == 'PNG') {
					$tamanho = $request->file('arquivo_ctps1')->getSize();
					if($tamanho > 10000000) {	
						$validator = 'O tamanho máximo do Arquivo CTPS 1 é 10MB!';
						return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
							->withErrors($validator)
							->withInput(session()->flashInput($request->input()));			
					}
					$arquivo_ctps1 = $input['arquivo_ctps1'];	
					$request->file('arquivo_ctps1')->move('../public/storage/candidato/ctps1/'.$nprocesso.'/', $nomeC1);
					$arquivo_ctps1 = 'candidato/ctps1/'.$nprocesso.'/'.$nomeC1; 
				} else {
					$validator 	   = 'No CTPS 1 só é suportado arquivos: .pdf, .doc, .docx!';
					$arquivo_ctps1 = NULL;					
					return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));	
				}
			} else if (!empty($input['arquivo_ctps1_'])) {
				$arquivo_ctps1 = $input['arquivo_ctps1_'];
			} else {
				$arquivo_ctps1 = "";
			}

    		if(!empty($input['data_inicio2'])){ $data_inicio2 = $input['data_inicio2']; } else { $data_inicio2 = ""; }
    		if(!empty($input['data_fim2'])){ $data_fim2 = $input['data_fim2']; } else { $data_fim2 = ""; }
    		if($data_inicio2 !== "" && $data_fim2 !== "") {
    			$anoI = date('Y-m-d', strtotime($data_inicio2));
    			$anoF = date('Y-m-d', strtotime($data_fim2));
    			if($anoI == $anoF || $anoF < $anoI) {
    				$validator = 'Na Experiência 2 a Data Final não pode ser maior ou igual a Data Início!';
    				return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
    					->withErrors($validator)
    					->withInput(session()->flashInput($request->input()));											
    			}
    		}

			if($request->file('arquivo_ctps2') !== NULL) {
				$nomeC2   = $_FILES['arquivo_ctps2']['name'];
				$extensao = pathinfo($nomeC2, PATHINFO_EXTENSION);
				if($extensao == 'pdf' || $extensao == 'doc' || $extensao == 'docx' || $extensao == 'jpg' || $extensao == 'jpeg' || $extensao == 'png' || $extensao == 'PDF' || $extensao == 'DOC' || $extensao == 'DOCX' || $extensao == 'JPG' || $extensao == 'JPEG' || $extensao == 'PNG') {
					$tamanho = $request->file('arquivo_ctps2')->getSize();
					if($tamanho > 10000000) {	
						$validator = 'O tamanho máximo do Arquivo CTPS 2 é 10MB!';
						return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
							->withErrors($validator)
							->withInput(session()->flashInput($request->input()));			
					}
					$request->file('arquivo_ctps2')->move('../public/storage/candidato/ctps2/'.$nprocesso.'/', $nomeC2);
					$arquivo_ctps2 = 'candidato/ctps2/'.$nprocesso.'/'.$nomeC2; 
				} else {
					$validator 	   = 'No CTPS 2 só é suportado arquivos: .pdf, .doc, .docx!';
					$arquivo_ctps2 = NULL;					
					return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));	
				}
			} else if(!empty($input['arquivo_ctps2_'])) {
				$arquivo_ctps2 = $input['arquivo_ctps2_'];
			} else { 
				$arquivo_ctps2 = "";
			}

    		if(!empty($input['data_inicio3'])){ $data_inicio3 = $input['data_inicio3']; } else { $data_inicio3 = ""; }
    		if(!empty($input['data_fim3'])){ $data_fim3 = $input['data_fim3']; } else { $data_fim3 = ""; }
    		if($data_inicio3 !== "" && $data_fim3 !== "") {
    			$anoI = date('Y-m-d', strtotime($data_inicio3));
    			$anoF = date('Y-m-d', strtotime($data_fim3));
    			if($anoI == $anoF || $anoF < $anoI) {
    				$validator = 'Na Experiência 3 a Data Final não pode ser maior ou igual a Data Início!';
    				return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
    					->withErrors($validator)
    					->withInput(session()->flashInput($request->input()));											
    			}
    		} 

			if($request->file('arquivo_ctps3') !== NULL) {
				$nomeC3   = $_FILES['arquivo_ctps3']['name'];
				$extensao = pathinfo($nomeC3, PATHINFO_EXTENSION);
				if($extensao == 'pdf' || $extensao == 'doc' || $extensao == 'docx' || $extensao == 'jpg' || $extensao == 'jpeg' || $extensao == 'png' || $extensao == 'PDF' || $extensao == 'DOC' || $extensao == 'DOCX' || $extensao == 'JPG' || $extensao == 'JPEG' || $extensao == 'PNG') {
					$tamanho = $request->file('arquivo_ctps3')->getSize();
					if($tamanho > 10000000) {	
						$validator = 'O tamanho máximo do Arquivo CTPS 3 é 10MB!';
						return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
							->withErrors($validator)
							->withInput(session()->flashInput($request->input()));			
					}
					$request->file('arquivo_ctps3')->move('../public/storage/candidato/ctps3/'.$nprocesso.'/', $nomeC3);
					$arquivo_ctps3 = 'candidato/ctps3/'.$nprocesso.'/'.$nomeC3; 
				} else {
					$validator 	   = 'No CTPS 3 só é suportado arquivos: .pdf, .doc, .docx!';
					$arquivo_ctps3 = NULL;					
					return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));	
				}
			} else if(!empty($input['arquivo_ctps3_'])) {
				$arquivo_ctps3 = $input['arquivo_ctps3_'];
			} else {
				$arquivo_ctps3 = "";
			}

			$deficiencia_status = $input['deficiencia_status'];
    		if($deficiencia_status == "sim") {
				if($request->file('arquivo_deficiencia') != NULL) {
					$nomeA    = $_FILES['arquivo_deficiencia']['name'];
    				$extensao = pathinfo($nomeA, PATHINFO_EXTENSION);
    				if($extensao == 'pdf' || $extensao == 'doc' || $extensao == 'docx' || $extensao == 'jpg' || $extensao == 'jpeg' || $extensao == 'png' || $extensao == 'PDF' || $extensao == 'DOC' || $extensao == 'DOCX' || $extensao == 'JPG' || $extensao == 'JPEG' || $extensao == 'PNG') {
    					$tamanho = $request->file('arquivo_deficiencia')->getSize();
    					if($tamanho > 10000000) {	
    						$validator = 'O tamanho máximo do Arquivo PCD é 10MB!';
    						return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
    							->withErrors($validator)
    							->withInput(session()->flashInput($request->input()));			
    					} 
    					$request->file('arquivo_deficiencia')->move('../public/storage/candidato/deficiencia/'.$nprocesso.'/',$nomeA);
    					$arquivo_deficiencia = 'candidato/deficiencia/'.$nprocesso.'/'.$nomeA; 
    					$cid 		 = $input['cid'];
    					$deficiencia = $input['deficiencia'];
						if($cid == NULL) {
							$validator = 'Informe o CID!';
    						return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
    							->withErrors($validator)
    							->withInput(session()->flashInput($request->input()));	
						} else if($deficiencia == NULL) {
							$validator = 'Informe sua deficiência!';
    						return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
    							->withErrors($validator)
    							->withInput(session()->flashInput($request->input()));	
						}
    				} else {
    					$validator = 'No anexo deficiência os arquivos permitidos são: .doc, .docx e .pdf!';
    					return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
    							->withErrors($validator)
    							->withInput(session()->flashInput($request->input()));		
    				}
				} else {
					$arquivo_deficiencia = $input['arquivo_deficiencia_'];
    				$cid 		 = $input['cid'];
    				$deficiencia = $input['deficiencia'];
					if($cid == NULL) {
						$validator = 'Informe o CID do PCD!';
						return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
							->withErrors($validator)
							->withInput(session()->flashInput($request->input()));	
					} else if($deficiencia == NULL) {
						$validator = 'Informe sua PCD!';
						return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
							->withErrors($validator)
							->withInput(session()->flashInput($request->input()));	
					}
				}
    		} else { $arquivo_deficiencia = ""; $cid = ""; $deficiencia = "0"; }
			
			if($request->file('arquivo') !== NULL) {	
				$nomeB = $_FILES['arquivo']['name'];
				$extensao = pathinfo($nomeB, PATHINFO_EXTENSION);
				if($extensao === 'pdf' || $extensao === 'doc' || $extensao === 'docx' || $extensao === 'PDF' || $extensao === 'DOC' || $extensao === 'DOCX') {
					$tamanho = $request->file('arquivo')->getSize();
					if($tamanho > 10000000) {
						$validator = 'O tamanho máximo do Currículo é 10MB!';
						return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
							->withErrors($validator)
							->withInput(session()->flashInput($request->input()));			
					} 
					$nome    = addslashes($input['nome']);
					$arquivo = $input['arquivo'];
					if($extensao === 'pdf' || $extensao === 'PDF'){ $arquivo = $nome.'.pdf'; } 
					else if($extensao === 'doc'  || $extensao == "DOC"){ $arquivo = $nome.'.doc'; } 
					else if($extensao === 'docx' || $extensao == "DOCX"){ $arquivo = $nome.'.docx'; } 
					else if($extensao === 'jpeg' || $extensao == "JPEG"){ $arquivo = $nome.'.jpeg'; } 
					else if($extensao === 'jpg'  || $extensao == "JPG"){ $arquivo = $nome.'.jpg'; } 
					else if($extensao === 'png'  || $extensao == "PNG"){ $arquivo = $nome.'.png'; }
					$request->file('arquivo')->move('../public/storage/candidato/curriculo/'.$nprocesso.'/',$arquivo);
				} else {
					$validator = 'Os arquivos permitidos são: .doc, .docx, .pdf, .jpg, .jpeg, .png!';
					return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));			
				}
			} else {
				if(!empty($input['arquivo_'])){
					$arquivo = $input['arquivo_'];
				} else {
					$validator = 'Anexe seu currículo!';
					return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));	
				}
			}

			if($request->file('foto') !== NULL) {	
				$nomeB = $_FILES['foto']['name'];
				$extensao = pathinfo($nomeB, PATHINFO_EXTENSION);
				if($extensao === 'pdf' || $extensao === 'PDF' || $extensao === 'jpg' || $extensao === 'jpeg' || $extensao == 'png' || $extensao === 'JPG' || $extensao === 'JPEG' || $extensao == 'PNG') {
					$tamanho = $request->file('foto')->getSize();
					if($tamanho > 10000000) {
						$validator = 'O tamanho máximo da foto é 10MB!';
						return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
							->withErrors($validator)
							->withInput(session()->flashInput($request->input()));			
					} 
					$nome    = addslashes($nomeB);
					$arquivo = $nome;
					$request->file('foto')->move('../public/storage/candidato/foto/'.$nprocesso.'/',$arquivo);
				} else {
					$validator = 'Os arquivos permitidos são: .pdf, .jpg, .jpeg, .png!';
					return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));			
				}
			} else {
				if(!empty($input['foto_'])){
					$arquivo = $input['foto_'];
				} else {
					$validator = 'Anexe sua foto!';
					return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));	
				}
			}

    		$data_nasc = $input['data_nascimento'];
    		$ano = date('Y', strtotime($data_nasc));
    		if($ano > '2005'){
    			$validator = 'Você não tem idade suficiente para este Processo Seletivo!';
    			return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
    				->withErrors($validator)
    				->withInput(session()->flashInput($request->input()));	
    		}
    		$como_soube = $input['como_soube'];
    		$parentesco = $input['parentesco'];
			$trabalho   = $input['trabalha_oss'];
    		if($como_soube == "outros"){
    			if(!empty($input['como_soube2'])){
    				$como_soube = $input['como_soube2'];
    			} else {
    				$como_soube = "";
    			}
    		} 
    		if($parentesco == "sim"){
    			if(!empty($input['parentesco_nome'])){
    				$parentesco_nome = $input['parentesco_nome'];
    			} else {
    				$parentesco_nome = "";
    			}
    		}else{
    			$parentesco_nome = "";
    		}
			if($trabalho == "sim") {
				if(!empty($input['trabalha_oss2'])) {
					$trabalho2 = $input['trabalha_oss2'];
				} else {
					$trabalho2 = "";
				}
			} else {
				$trabalho2 = "";
			}
			$aceito = addslashes($input['aceito']); 
			if($aceito == "0") {
				$validator = 'Informe se você concorda em compartilhar as informações!';
    			return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados'))
    				->withErrors($validator)
    				->withInput(session()->flashInput($request->input()));	
			} 
    		if($input['fone_fixo'] == "(") { $input['fone_fixo'] = ""; } else { $fone_fixo = $input['fone_fixo']; }
    		$fone_fixo = addslashes($input['fone_fixo']); $celular = addslashes($input['telefone']);
    		$nome_vaga = $input['vaga']; $email = addslashes($input['email']); 
    		$naturalidade = addslashes($input['lugar_nascimento']);	$estado_nasc = $input['estado_nascimento']; 
    		$cidade_nasc  = addslashes($input['cidade_nascimento']); $rua = addslashes($input['rua']);
    		$numero = addslashes($input['numero']); $bairro = addslashes($input['bairro']); 
    		$cidade = addslashes($input['cidade']); $cep = addslashes($input['cep']);   
    		$estado = addslashes($input['estado']); $complemento = addslashes($input['complemento']);
    		$escolaridade = addslashes($input['escolaridade']); $status_escolaridade = addslashes($input['status_escolaridade']); 
    		$formacao = addslashes($input['formacao']);  $cursos = addslashes($input['cursos']);
    		if($input['periodo'] == "periodo_integral"){ $p1 = "periodo_integral"; $p2 = ""; $p3 = ""; } 
    		if($input['periodo'] == "periodo_noturno"){ $p1 = ""; $p2 = "periodo_noturno"; $p3 = ""; }
    		if($input['periodo'] == "meio_periodo"){ $p1 = ""; $p2 = ""; $p3 = "meio_periodo"; }
    		$outra_cidade = $input['outra_cidade']; $habilitacao = $input['habilitacao'];   
    		if(!empty($input['empresa'])){ $empresa = addslashes($input['empresa']); }else{ $empresa = ""; }
    		if(!empty($input['cargo'])){ $cargo = addslashes($input['cargo']); }else{ $cargo = ""; }
    		if(!empty($input['atribuicao'])){ $atribuicao = addslashes($input['atribuicao']); }else{ $atribuicao = ""; }
    		if(!empty($input['empresa2'])){ $empresa2 = addslashes($input['empresa2']); }else{ $empresa2 = ""; }
    		if(!empty($input['cargo2'])){ $cargo2 = addslashes($input['cargo2']); }else{ $cargo2 = ""; }
    		if(!empty($input['atribuicao2'])){ $atribuicao2 = addslashes($input['atribuicao2']); }else{ $atribuicao2 = ""; }
    		if(!empty($input['empresa3'])){ $empresa3 = addslashes($input['empresa3']); }else{ $empresa3 = ""; }
    		if(!empty($input['cargo3'])){ $cargo3 = addslashes($input['cargo3']); }else{ $cargo3 = ""; }
    		if(!empty($input['atribuicao3'])){ $atribuicao3 = addslashes($input['atribuicao3']); }else{ $atribuicao3 = ""; }
    		$nome_social = addslashes($input['nome_social']); $pronome = $input['pronome'];
			$genero = $input['genero']; $cor = $input['cor'];
			$nome = addslashes($input['nome']); 
    		
    		DB::statement("UPDATE processo_seletivo_".$nprocesso." SET vaga='$nome_vaga',
			 data_inscricao='$hoje',nome='$nome',cpf='$cpf',email='$email',telefone_fixo='$fone_fixo',
			 telefone='$celular',lugar_nascimento='$naturalidade',estado_nascimento='$estado_nasc',
    		 cidade_nascimento='$cidade_nasc',data_nascimento='$data_nasc',rua='$rua',numero='$numero',
			 bairro='$bairro',cidade='$cidade',estado='$estado',cep='$cep',complemento='$complemento',
    		 escolaridade='$escolaridade',status_escolaridade='$status_escolaridade',formacao='$formacao', 
			 cursos='$cursos',deficiencia='$deficiencia',cid='$cid',habilitacao='$habilitacao', 
			 periodo_integral='$p1',periodo_noturno='$p2',meio_periodo='$p3',outra_cidade='$outra_cidade',
    		 exp_01_empresa='$empresa',exp_01_cargo='$cargo',exp_01_atribuicoes='$atribuicao', 
			 arquivo_ctps1='$arquivo_ctps1',exp_01_data_ini='$data_inicio',exp_01_data_fim='$data_fim', 
			 exp_02_empresa='$empresa2',exp_02_cargo='$cargo2',exp_02_atribuicoes='$atribuicao2',
    		 arquivo_ctps2='$arquivo_ctps2',exp_02_data_ini='$data_inicio2',exp_02_data_fim='$data_fim2', 
			 exp_03_empresa='$empresa3',exp_03_cargo='$cargo3',exp_03_atribuicoes='$atribuicao3', 
			 arquivo_ctps3='$arquivo_ctps3',exp_03_data_ini='$data_inicio3',exp_03_data_fim='$data_fim3', 
			 como_soube='$como_soube',parentesco='$parentesco',parentesco_nome='$parentesco_nome', 
			 nome_social='$nome_social',pronome='$pronome',genero='$genero',cor='$cor',aceito='$aceito',
			 nomearquivo='$arquivo_deficiencia' WHERE cpf = '$cpf'");
    			
    		 $numero = DB::table('processo_seletivo_'.$nprocesso)->select('id')->where('cpf', $cpf)->get()->toArray();
    		 $id2 = $numero[0]->id;
    		 $numeroInscricao = $nprocesso.'-'.$id2;
    		 /*Mail::send('email.resultadoCadastro', ['numeroInscricao' => $numeroInscricao], function($m) use ($email,$nprocesso) {
    			$m->from('processoseletivo.hcpgestao@gmail.com', 'PROCESSO SELETIVO HCP GESTÃO');
    			$m->subject('Sua alteração no Processo Seletivo: '.$nprocesso. ' foi realizada');
    			$m->to($email);
    		 });*/
    		 $processos = DB::table('processo_seletivo')
    			->join('unidade', 'processo_seletivo.unidade_id', '=', 'unidade.id')
    			->select('processo_seletivo.*', 'unidade.nome as NOME')
    			->get()->toArray();
    		 $processos2 = DB::table('unidade')
    			->join('processo_seletivo', 'unidade.id', '=', 'processo_seletivo.unidade_id')
    			->select('processo_seletivo.*', 'unidade.*')
    			->get()->toArray();
    		 DB::statement("UPDATE processo_seletivo_".$nprocesso." SET numeroInscricao = '$numeroInscricao' WHERE id = '$id2' ");
    		 return view('candidato_alterar', compact('unidade','processos','numero','nprocesso'))
    				->withInput(session()->flashInput($request->input()));	
	    } catch(Throwable $e) {
			$validator = "Algo está errado!! Verifique os campos novamente!";
			return view('areaCandidatoAlterar', compact('unidades','user','processos','vagas','estados','estados'))
				->withErrors($validator)
			  	->withInput(session()->flashInput($request->input())); 
		}
	}
}