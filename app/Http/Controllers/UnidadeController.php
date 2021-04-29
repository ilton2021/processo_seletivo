<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Unidade;
use App\Model\Endereco;
use App\Model\ProcessoSeletivo;
use Illuminate\Support\Facades\DB;
use App\Model\Loggers;
use Auth;
	
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
		$text = false;
		return view('cadastro_unidade', compact('unidades','text','processos'));
	}
	
	// Página Nova Unidade //
	public function unidadeNovo()
	{
		$text = false;
		$processos = ProcessoSeletivo::all();
		return view('cadastro_unidade_novo', compact('text','processos'));
	}
	
	// Página Alterar Unidade //
	public function unidadeAlterar($id)
	{
		$unidades = Unidade::where('id', $id)->get();
		$idE = $unidades[0]->id;
		$endereco = Endereco::where('id_tabela',1)->where('id_interno',$idE)->get();
		$processos = ProcessoSeletivo::all();
		$text = false;
		return view('cadastro_unidade_alterar', compact('text','unidades','endereco','processos'));
	}
	
	// Página Excluir Unidade //
	public function unidadeExcluir($id)
	{
		$unidades = Unidade::where('id', $id)->get();
		$endereco = Endereco::where('id_tabela',1)->where('id_interno',$unidades[0]->id)->get();
		$processos = ProcessoSeletivo::all();
		$text = false;
		return view('cadastro_unidade_excluir', compact('text','unidades','endereco','processos'));
	}
	
	// Pesquisar Unidade //
	public function pesquisar(Request $request)
	{
		$input = $request->all();
		$nome = $input['pesq'];
		$text = false;
		$unidades = $this->unidade->where('nome', 'LIKE', '%' . $nome . '%')->paginate(10);
		$processos = ProcessoSeletivo::all();
		return view('cadastro_unidade', compact('text','unidades','processos'));
	}
	
	// Salvar Unidade //
	public function storeUnidade(Request $request)
	{
		$input = $request->all();
		$nome = $_FILES['imagem']['name']; 
		$extensao = pathinfo($nome, PATHINFO_EXTENSION);
		if($request->file('imagem') === NULL) {	
			\Session::flash('mensagem', ['msg' => 'Informe a imagem da Unidade!','class'=>'green white-text']);		
			$text = true;
			return view('cadastro_unidade_novo', compact('text'));
		} else {
			if($extensao == 'png' || $extensao == 'jpg') {
				$v = \Validator::make($request->all(), [
					'nome'   => 'required|max:255|unique:unidade,nome',
					'rua' 	 => 'required|max:255',
					'numero' => 'required|max:10',
					'bairro' => 'required|max:255',
					'cidade' => 'required|max:255',
					'estado' => 'required|max:255',
					'pais'	 => 'required|max:255',
					'cep' 	 => 'required|max:15'
				]);
				if ($v->fails()) {
					$failed = $v->failed();
					if ( !empty($failed['nome']['Required']) ) {
						\Session::flash('mensagem', ['msg' => 'O campo nome é obrigatório!','class'=>'green white-text']);
					} else if ( !empty($failed['nome']['Max']) ) { 
						\Session::flash('mensagem', ['msg' => 'O campo nome possui no máximo 255 caracteres!','class'=>'green white-text']);
					} else if ( !empty($failed['nome']['Unique']) ) { 
						\Session::flash('mensagem', ['msg' => 'Esta Unidade já foi cadastrada!','class'=>'green white-text']);
					} else if ( !empty($failed['rua']['Required']) ) { 
						\Session::flash('mensagem', ['msg' => 'O campo rua é obrigatório!','class'=>'green white-text']);
					} else if ( !empty($failed['rua']['Max']) ) { 
						\Session::flash('mensagem', ['msg' => 'O campo rua possui no máximo 255 caracteres!','class'=>'green white-text']);
					} else if ( !empty($failed['numero']['Required']) ) { 
						\Session::flash('mensagem', ['msg' => 'O campo numero é obrigatório!','class'=>'green white-text']);
					} else if ( !empty($failed['numero']['Max']) ) { 
						\Session::flash('mensagem', ['msg' => 'O campo numero possui no máximo 255 caracteres!','class'=>'green white-text']);
					} else if ( !empty($failed['bairro']['Required']) ) { 
						\Session::flash('mensagem', ['msg' => 'O campo bairro é obrigatório!','class'=>'green white-text']);
					} else if ( !empty($failed['bairro']['Max']) ) { 
						\Session::flash('mensagem', ['msg' => 'O campo bairro possui no máximo 255 caracteres!','class'=>'green white-text']);
					} else if ( !empty($failed['cidade']['Required']) ) { 
						\Session::flash('mensagem', ['msg' => 'O campo cidade é obrigatório!','class'=>'green white-text']);
					} else if ( !empty($failed['cidade']['Max']) ) { 
						\Session::flash('mensagem', ['msg' => 'O campo cidade possui no máximo 255 caracteres!','class'=>'green white-text']);
					} else if ( !empty($failed['estado']['Required']) ) { 
						\Session::flash('mensagem', ['msg' => 'O campo estado é obrigatório!','class'=>'green white-text']);
					} else if ( !empty($failed['estado']['Max']) ) { 
						\Session::flash('mensagem', ['msg' => 'O campo estado possui no máximo 255 caracteres!','class'=>'green white-text']);
					} else if ( !empty($failed['pais']['Required']) ) { 
						\Session::flash('mensagem', ['msg' => 'O campo país é obrigatório!','class'=>'green white-text']);
					} else if ( !empty($failed['pais']['Max']) ) { 
						\Session::flash('mensagem', ['msg' => 'O campo país possui no máximo 255 caracteres!','class'=>'green white-text']);
					} else if ( !empty($failed['cep']['Required']) ) { 
						\Session::flash('mensagem', ['msg' => 'O campo cep é obrigatório!','class'=>'green white-text']);
					} else if ( !empty($failed['cep']['Max']) ) { 
						\Session::flash('mensagem', ['msg' => 'O campo cep possui no máximo 255 caracteres!','class'=>'green white-text']);
					}
					$text = true;
					return view('cadastro_unidade_novo', compact('text'));
				} else { 					
					$request->file('imagem')->move('../public/storage/unidade/', $nome);
					$input['imagem'] = $nome;
					$input['caminho'] = 'unidade/'.$nome;
					$unidade = Unidade::create($input);
					$input['id_tabela'] = 1;
					$idUnidade = Unidade::where('nome', $input['nome'])->get();
					$input['id_interno'] = $idUnidade[0]->id;
					$endereco = Endereco::create($input);
					$lastUpdated = $unidade->max('updated_at');
					$unidades = Unidade::all();
					$input['user_id'] = Auth::user()->id;
					$loggers = Loggers::create($input);
					$unidades = $this->unidade->paginate(10);
					\Session::flash('mensagem', ['msg' => 'Unidade cadastrado com Sucesso!!','class'=>'green white-text']);
					$text = true;
					$processos = ProcessoSeletivo::all();
					return view('cadastro_unidade', compact('text','unidades','processos'));
				}
			}else {
				\Session::flash('mensagem', ['msg' => 'Só é suportado arquivos: png ou jpg!','class'=>'green white-text']);		
				$text = true;
				return view('cadastro_unidade_novo', compact('text'));
			}
		}
	}
	
	// Alterar Unidade //
	public function updateUnidade($id, Request $request)
	{
		$input = $request->all();
		$v = \Validator::make($request->all(), [
			'nome'   => 'required|max:255',
			'rua' 	 => 'required|max:255',
			'numero' => 'required|max:10',
			'bairro' => 'required|max:255',
			'cidade' => 'required|max:255',
			'estado' => 'required|max:255',
			'pais'	 => 'required|max:255',
			'cep' 	 => 'required|max:15'
		]);
		if ($v->fails()) {
			$failed = $v->failed();
			if ( !empty($failed['nome']['Required']) ) {
				\Session::flash('mensagem', ['msg' => 'O campo nome é obrigatório!','class'=>'green white-text']);
			} else if ( !empty($failed['nome']['Max']) ) { 
				\Session::flash('mensagem', ['msg' => 'O campo nome possui no máximo 255 caracteres!','class'=>'green white-text']);
		    } else if ( !empty($failed['nome']['Unique']) ) { 
				\Session::flash('mensagem', ['msg' => 'Esta Unidade já foi cadastrada!','class'=>'green white-text']);
			} else if ( !empty($failed['rua']['Required']) ) { 
				\Session::flash('mensagem', ['msg' => 'O campo rua é obrigatório!','class'=>'green white-text']);
			} else if ( !empty($failed['rua']['Max']) ) { 
				\Session::flash('mensagem', ['msg' => 'O campo rua possui no máximo 255 caracteres!','class'=>'green white-text']);
			} else if ( !empty($failed['numero']['Required']) ) { 
				\Session::flash('mensagem', ['msg' => 'O campo numero é obrigatório!','class'=>'green white-text']);
			} else if ( !empty($failed['numero']['Max']) ) { 
				\Session::flash('mensagem', ['msg' => 'O campo numero possui no máximo 255 caracteres!','class'=>'green white-text']);
			} else if ( !empty($failed['bairro']['Required']) ) { 
				\Session::flash('mensagem', ['msg' => 'O campo bairro é obrigatório!','class'=>'green white-text']);
			} else if ( !empty($failed['bairro']['Max']) ) { 
				\Session::flash('mensagem', ['msg' => 'O campo bairro possui no máximo 255 caracteres!','class'=>'green white-text']);
			} else if ( !empty($failed['cidade']['Required']) ) { 
				\Session::flash('mensagem', ['msg' => 'O campo cidade é obrigatório!','class'=>'green white-text']);
			} else if ( !empty($failed['cidade']['Max']) ) { 
				\Session::flash('mensagem', ['msg' => 'O campo cidade possui no máximo 255 caracteres!','class'=>'green white-text']);
			} else if ( !empty($failed['estado']['Required']) ) { 
				\Session::flash('mensagem', ['msg' => 'O campo estado é obrigatório!','class'=>'green white-text']);
			} else if ( !empty($failed['estado']['Max']) ) { 
				\Session::flash('mensagem', ['msg' => 'O campo estado possui no máximo 255 caracteres!','class'=>'green white-text']);
			} else if ( !empty($failed['pais']['Required']) ) { 
				\Session::flash('mensagem', ['msg' => 'O campo país é obrigatório!','class'=>'green white-text']);
			} else if ( !empty($failed['pais']['Max']) ) { 
				\Session::flash('mensagem', ['msg' => 'O campo país possui no máximo 255 caracteres!','class'=>'green white-text']);
			} else if ( !empty($failed['cep']['Required']) ) { 
				\Session::flash('mensagem', ['msg' => 'O campo cep é obrigatório!','class'=>'green white-text']);
			} else if ( !empty($failed['cep']['Max']) ) { 
				\Session::flash('mensagem', ['msg' => 'O campo cep possui no máximo 255 caracteres!','class'=>'green white-text']);
			}
			$text = true;
			return view('cadastro_unidade_alterar', compact('text'));
		} else {
			if($request->file('imagem_') == NULL){
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
				\Session::flash('mensagem', ['msg' => 'Unidade alterada com Sucesso!!','class'=>'green white-text']);
				$text = true;	
				$processos = ProcessoSeletivo::all();
				return view('cadastro_unidade', compact('text','unidades','processos'));
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
					\Session::flash('mensagem', ['msg' => 'Unidade alterada com Sucesso!!','class'=>'green white-text']);
					$text = true;	
					return view('cadastro_unidade', compact('text','unidades','endereco'));	
				} else {
					$unidades = Unidade::where('id', $id)->get();
					$endereco = Endereco::where('id_tabela',1)->where('id_interno',$unidades[0]->id)->get();
					\Session::flash('mensagem', ['msg' => 'Só é suportado arquivos: png ou jpg!','class'=>'green white-text']);		
					$text = true;
					$processos = ProcessoSeletivo::all();
					return view('cadastro_unidade_alterar', compact('text','unidades','endereco','processos'));
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
		$text = true;
		\Session::flash('mensagem', ['msg' => 'Unidade excluído com sucesso!','class'=>'green white-text']);
		$processos = ProcessoSeletivo::all();
		return view('cadastro_unidade', compact('text','unidades','processos'));
	}
}