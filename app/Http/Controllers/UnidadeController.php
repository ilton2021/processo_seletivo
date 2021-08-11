<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Unidade;
use App\Model\Endereco;
use App\Model\ProcessoSeletivo;
use Illuminate\Support\Facades\DB;
use App\Model\Loggers;
use Auth;
use Validator;
	
class UnidadeController extends Controller
{
	public function __construct(Unidade $unidade, Loggers $loggers)
	{
		$this->unidade = $unidade; 
		$this->loggers = $loggers;
	}
	
	// Página Cadastro Unidade //
    public function cadastroUnidade()
	{
		$unidades = $this->unidade->paginate(10);
		$processos = ProcessoSeletivo::all();
		return view('cadastro_unidade', compact('unidades','processos'));
	}
	
	// Página Nova Unidade //
	public function unidadeNovo()
	{
		$processos = ProcessoSeletivo::all();
		return view('cadastro_unidade_novo', compact('processos'));
	}
	
	// Página Alterar Unidade //
	public function unidadeAlterar($id)
	{
		$unidades = Unidade::where('id', $id)->get();
		$idE = $unidades[0]->id;
		$endereco = Endereco::where('id_tabela',1)->where('id_interno',$idE)->get();
		$processos = ProcessoSeletivo::all();
		return view('cadastro_unidade_alterar', compact('unidades','endereco','processos'));
	}
	
	// Página Excluir Unidade //
	public function unidadeExcluir($id)
	{
		$unidades = Unidade::where('id', $id)->get();
		$endereco = Endereco::where('id_tabela',1)->where('id_interno',$unidades[0]->id)->get();
		$processos = ProcessoSeletivo::all();
		return view('cadastro_unidade_excluir', compact('unidades','endereco','processos'));
	}
	
	// Pesquisar Unidade //
	public function pesquisar(Request $request)
	{
		$input = $request->all();
		$nome = $input['pesq'];
		$unidades = $this->unidade->where('nome', 'LIKE', '%' . $nome . '%')->paginate(10);
		$processos = ProcessoSeletivo::all();
		return view('cadastro_unidade', compact('unidades','processos'));
	}
	
	// Salvar Unidade //
	public function storeUnidade(Request $request)
	{
		$input = $request->all();
		$nome = $_FILES['imagem']['name']; 
		$extensao = pathinfo($nome, PATHINFO_EXTENSION);
		$processos = ProcessoSeletivo::all();
		if($request->file('imagem') === NULL) {	
			$validator = 'Informe a imagem da Unidade!';		
			return view('cadastro_unidade_novo', compact('processos'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
		} else {
			if($extensao == 'png' || $extensao == 'jpg') {
				$validator = Validator::make($request->all(), [
					'nome'   => 'required|max:255|unique:unidade,nome',
					'rua' 	 => 'required|max:255',
					'numero' => 'required|max:10',
					'bairro' => 'required|max:255',
					'cidade' => 'required|max:255',
					'estado' => 'required|max:255',
					'pais'	 => 'required|max:255',
					'cep' 	 => 'required|max:15'
				]);
				if ($validator->fails()) {
					return view('cadastro_unidade_novo', compact('processos'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
				} else { 					
					$request->file('imagem')->move('../public/storage/unidade/', $nome);
					$input['imagem']  = $nome;
					$input['caminho'] = 'unidade/'.$nome;
					$unidade = Unidade::create($input);
					$input['id_tabela'] = 1;
					$idUnidade = Unidade::where('nome', $input['nome'])->get();
					$input['id_interno'] = $idUnidade[0]->id;
					$endereco = Endereco::create($input);
					$lastUpdated = $unidade->max('updated_at');
					$unidades  = Unidade::all();
					$input['user_id'] = Auth::user()->id;
					$loggers   = Loggers::create($input);
					$unidades  = $this->unidade->paginate(10);
					$validator = 'Unidade cadastrado com Sucesso!!';
					$processos = ProcessoSeletivo::all();
					return view('cadastro_unidade', compact('unidades','processos'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
				}
			}else {
				$validator = 'Só é suportado arquivos: png ou jpg!';		
				return view('cadastro_unidade_novo', compact('processos'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
			}
		}
	}
	
	// Alterar Unidade //
	public function updateUnidade($id, Request $request)
	{
		$input = $request->all();
		$unidades = Unidade::where('id',$id)->get();
		$endereco = Endereco::where('id_interno',$id)->get();
		$processos = ProcessoSeletivo::all();
		$validator = Validator::make($request->all(), [
			'nome'   => 'required|max:255',
			'rua' 	 => 'required|max:255',
			'numero' => 'required|max:10',
			'bairro' => 'required|max:255',
			'cidade' => 'required|max:255',
			'estado' => 'required|max:255',
			'pais'	 => 'required|max:255',
			'cep' 	 => 'required|max:15'
		]);
		if ($validator->fails()) {
			return view('cadastro_unidade_alterar', compact('unidades','endereco','processos'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
		} else {
			if($request->file('imagem_') === NULL){
				$nome = $input['imagem'];
				$input['imagem'] = $nome;
				$input['caminho'] = 'unidade/'.$nome;
				$unidade = Unidade::find($id);
				$unidade->update($input);
				$input['id_tabela'] = 1;
				$idUnidade = Unidade::where('nome', $input['nome'])->get();
				$input['id_interno'] = $idUnidade[0]->id;
				$endereco = Endereco::where('id_tabela',1)->where('id_interno',$input['id_interno'])->get();
				$endereco = Endereco::find($endereco[0]->id);
				$endereco->update($input);
				$lastUpdated = $unidade->max('updated_at');
				$input['user_id'] = Auth::user()->id;
				$loggers = Loggers::create($input);
				$unidades = $this->unidade->paginate(10);
				$validator = 'Unidade alterada com Sucesso!!';
				$processos = ProcessoSeletivo::all();
				return view('cadastro_unidade', compact('unidades','processos'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
			} else {
				$nome = $_FILES['imagem_']['name']; 
				$extensao = pathinfo($nome, PATHINFO_EXTENSION);
				if($extensao == 'png' || $extensao == 'jpg'){
					$request->file('imagem_')->move('../public/storage/unidade/', $nome);
					$input['imagem'] = $nome;
					$input['caminho'] = 'unidade/'.$nome;
					$unidade = Unidade::find($id);
					$unidade->update($input);
					$input['id_tabela'] = 1;
					$idUnidade = Unidade::where('nome', $input['nome'])->get();
					$input['id_interno'] = $idUnidade[0]->id;
					$endereco = Endereco::where('id_tabela',1)->where('id_interno',$input['id_interno'])->get();
					$endereco = Endereco::find($endereco[0]->id);
					$endereco->update($input);
					$unidades = Unidade::where('id', $id)->get();
					$endereco = Endereco::where('id_tabela',1)->where('id_interno',$unidades[0]->id)->get();
					$lastUpdated = $unidades->max('updated_at');
					$validator = 'Unidade alterada com Sucesso!!';
					return view('cadastro_unidade', compact('unidades','processos'))	
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
				} else {
					$unidades  = Unidade::where('id', $id)->get();
					$endereco  = Endereco::where('id_tabela',1)->where('id_interno',$unidades[0]->id)->get();
					$validator = 'Só é suportado arquivos: png ou jpg!';		
					$processos = ProcessoSeletivo::all();
					return view('cadastro_unidade_alterar', compact('unidades','endereco','processos'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
				}
			}
		}
	}
	
	// Excluir Unidade //
	public function destroyUnidade($id, Request $request)
	{
		$input = $request->all();
		$endereco = Endereco::where('id_tabela',1)->where('id_interno',$id)->get();
		$id_e = $endereco[0]->id;
		$endereco = Endereco::find($id_e)->delete();
		$unidade = Unidade::find($id)->delete();
		$unidades = $this->unidade->all();
		$input['user_id'] = Auth::user()->id;
		$loggers = Loggers::create($input);
		$unidades = $this->unidade->paginate(10);
		$validator = 'Unidade excluído com sucesso!';
		$processos = ProcessoSeletivo::all();
		return view('cadastro_unidade', compact('unidades','processos'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));
	}
}