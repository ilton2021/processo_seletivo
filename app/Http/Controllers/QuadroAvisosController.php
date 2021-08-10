<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\QuadroAvisos;
use App\Model\ProcessoSeletivo;
use Validator;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Model\Loggers;
use Auth;

class QuadroAvisosController extends Controller
{
    //Tela de Listagem de Avisos
    public function cadastroQuadroAvisos()
    {
        $quadros  = DB::table('quadro_avisos')
        ->join('processo_seletivo','processo_seletivo.id','=','quadro_avisos.processo_seletivo_id')
        ->select('quadro_avisos.*','processo_seletivo.nome as processo')->get();
        $processos = ProcessoSeletivo::all();
        return view('cadastro_quadro_avisos', compact('quadros','processos'));
    }

    //Tela de Cadastro de Novo Aviso
    public function quadroAvisosNovo()
    {
        $processos = ProcessoSeletivo::all();
        return view('cadastro_quadro_avisos_novo', compact('processos'));
    }

    //Método para Cadastrar um Novo Aviso
    public function storeQuadroAvisos(Request $request)
    {
        $input = $request->all();
        $nomeA 	  = $_FILES['arquivo']['name']; 
		$extensao = pathinfo($nomeA, PATHINFO_EXTENSION); 
        $processos = ProcessoSeletivo::all();
		if($request->file('arquivo') === NULL) {	
			$validator = 'Informe o arquivo do Quadro de Aviso!';
			return view('cadastro_quadro_avisos_novo', compact('processos'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));
		} else {
			if($extensao == 'pdf') {
				$validator = Validator::make($request->all(), [
					'descricao'            => 'required|max:3000',
					'processo_seletivo_id' => 'required'
				]);
				if ($validator->fails()) {
					return view('cadastro_quadro_avisos_novo', compact('processos'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));
				} else { 										
					$request->file('arquivo')->move('../public/storage/quadroAviso/', $nomeA);
					$input['arquivo'] = $nomeA;
					$input['arquivo_caminho'] = 'quadroAviso/'.$nomeA;
			        $quadro  = QuadroAvisos::create($input);
                    $input['user_id'] = Auth::user()->id;
                    $log = Loggers::create($input);
                    $quadros  = DB::table('quadro_avisos')
                    ->join('processo_seletivo','processo_seletivo.id','=','quadro_avisos.processo_seletivo_id')
                    ->select('quadro_avisos.*','processo_seletivo.nome as processo')->get();
                    $processos = ProcessoSeletivo::all();
                    $validator = "Aviso cadastrado com sucesso!!";
                    return view('cadastro_quadro_avisos', compact('processos','quadros'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));

                }
            } else {
                $validator = 'o Arquivo tem que ser do formato .pdf!';
			    return view('cadastro_quadro_avisos_novo', compact('processos'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));
            }
        }
    }

    //Tela de Alteração de Aviso
    public function quadroAvisosAlterar($id)
    {
        $quadros   = QuadroAvisos::where('id',$id)->get();
        $processos = ProcessoSeletivo::all();
        return view('cadastro_quadro_avisos_alterar', compact('quadros','processos'));
    }

    //Método de Alteração de Aviso
    public function updateQuadroAvisos(Request $request, $id)
    {
        $input = $request->all();
        $processos = ProcessoSeletivo::all(); 
        if($request->file('arquivo_novo') != NULL) {	
			$nomeA 	  = $_FILES['arquivo_novo']['name']; 
		    $extensao = pathinfo($nomeA, PATHINFO_EXTENSION); 
            if($extensao != 'pdf') {
                $validator = "O Novo Arquivo tem que ser do formato .pdf";
                return view('cadastro_quadro_avisos_alterar', compact('processos'))
                ->withErrors($validator)
                ->withInput(session()->flashInput($request->input()));
            } else {
                $request->file('arquivo_novo')->move('../public/storage/quadroAviso/', $nomeA);
                $input['arquivo'] = $nomeA;
                $input['arquivo_caminho'] = 'quadroAviso/'.$nomeA;
                $delArquivo = $input['arquivo']; 
		        Storage::delete('public/storage/quadroAvisos/'.$delArquivo);
            }
		} else {
            $nomeA = $input['arquivo'];
            $input['arquivo_caminho'] = 'quadroAviso/'.$nomeA;
        } 
        $quadros  = DB::table('quadro_avisos')
              ->join('processo_seletivo','processo_seletivo.id','=','quadro_avisos.processo_seletivo_id')
              ->select('quadro_avisos.*','processo_seletivo.nome as processo')
              ->get();

        $validator = Validator::make($request->all(), [
            'descricao' => 'required|max:3000'
        ]);
        if ($validator->fails()) {

            return view('cadastro_quadro_avisos_alterar', compact('processos','quadros'))
                ->withErrors($validator)
                ->withInput(session()->flashInput($request->input()));
        } else {
			$quadro = QuadroAvisos::find($id);
            $quadro->update($input);
            $processos = ProcessoSeletivo::all();
            $input['user_id'] = Auth::user()->id;
            $log = Loggers::create($input);
            $quadros  = DB::table('quadro_avisos')
              ->join('processo_seletivo','processo_seletivo.id','=','quadro_avisos.processo_seletivo_id')
              ->select('quadro_avisos.*','processo_seletivo.nome as processo')
              ->get();
            $validator = "Aviso alterado com sucesso!!";
            return view('cadastro_quadro_avisos', compact('processos','quadros'))
			    ->withErrors($validator)
				->withInput(session()->flashInput($request->input()));
        }
    }
    
    //Tela de Exclusão de Aviso
    public function quadroAvisosExcluir(Request $request, $id)
    {
        $quadros = QuadroAvisos::where('id',$id)->get();
        $processos = ProcessoSeletivo::all();
        return view('cadastro_quadro_avisos_excluir', compact('quadros','processos'));
    }

    //Método de Exclusão de Aviso
    public function deleteQuadroAvisos(Request $request, $id)
    {
        QuadroAvisos::find($id)->delete();
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $log   = Loggers::create($input);
        $nome  = $input['arquivo'];
        Storage::delete("public/storage/quadroAviso/{$nome}");
        $processos = ProcessoSeletivo::all();
        $quadros  = DB::table('quadro_avisos')
              ->join('processo_seletivo','processo_seletivo.id','=','quadro_avisos.processo_seletivo_id')
              ->select('quadro_avisos.*','processo_seletivo.nome as processo')
              ->get();
        $validator = "Aviso excluído com sucesso!!";
        return view('cadastro_quadro_avisos', compact('processos','quadros'))
			    ->withErrors($validator)
				->withInput(session()->flashInput($request->input()));
    }
}