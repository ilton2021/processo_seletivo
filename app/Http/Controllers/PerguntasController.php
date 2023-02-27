<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Perguntas;
use App\Model\ProcessoSeletivo;
use App\Model\Unidade;
use Validator;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Model\Loggers;
use Auth;

class PerguntasController extends Controller
{
    //Tela de Listagem de Perguntas
    public function cadastroPerguntas()
    {
        $perguntas = Perguntas::all();
        return view('perguntas/cadastro_perguntas', compact('perguntas'));
    }

    //Tela de Cadastro de Nova Pergunta
    public function perguntasNovo()
    {
        return view('perguntas/cadastro_perguntas_novo');
    }

    //Tela de Cadastro do Questionário
    public function questionario($id_u, $id, $idC)
    {
        $perguntas = Perguntas::all();
        $unidade   = Unidade::where('id',$id_u)->get();
        $processo  = ProcessoSeletivo::where('id',$id)->get();
        $candidato = DB::table('processo_seletivo_'.$processo[0]->nome)->where('id', $idC)->get();
        return view('perguntas/questionario', compact('perguntas','id_u','id','idC','candidato','unidade'));
    }

    //Tela de Visualização do Questionário
    public function questionarioVisualizar($idPS, $idC)
    {
        $perguntas = Perguntas::all();
        $processo  = ProcessoSeletivo::where('id',$idPS)->get();
        $unidade   = Unidade::where('id',$processo[0]->unidade_id)->get();
        $candidato = DB::table('processo_seletivo_'.$processo[0]->nome)->where('id', $idC)->get();
        $respostas = DB::table('questionario_'.$processo[0]->nome)->where('processo_seletivo_id',$idPS)
                                                                  ->where('candidato_id',$idC)->get();
        return view('perguntas/questionario_visualizar', 
            compact('perguntas','processo','unidade','respostas','candidato'));
    }

    //Método para Cadastrar um Novo Questionário
    public function storeQuestionario($id_u, $id, $idC, Request $request)
    {
        $input     = $request->all(); 
        $perguntas = Perguntas::all();
        $unidade   = Unidade::where('id',$id_u)->get();
        $processo  = ProcessoSeletivo::where('id',$id)->get();
		$validator = Validator::make($request->all(), [
			'resposta1' => 'required',
            'resposta2' => 'required',
            'resposta3' => 'required',
            'resposta4' => 'required',
            'resposta5' => 'required',
            'resposta6' => 'required',
            'resposta7' => 'required',
            'resposta8' => 'required',
            'resposta9' => 'required',
            'resposta10' => 'required',
		]);
		if ($validator->fails()) {
            $candidato = DB::table('processo_seletivo_'.$processo[0]->nome)->where('id', $idC)->get();
			return view('perguntas/questionario', compact('perguntas','id_u','id','idC','candidato','unidade'))
		    		->withErrors($validator)
					->withInput(session()->flashInput($request->input()));
		} else { 
            $r1 = $input['resposta1']; $r2 = $input['resposta2']; $r3 = $input['resposta3'];
            $r4 = $input['resposta4']; $r5 = $input['resposta5']; $r6 = $input['resposta6'];
            $r7 = $input['resposta7']; $r8 = $input['resposta8']; $r9 = $input['resposta9'];
            $r10 = $input['resposta10'];

            DB::statement("INSERT INTO questionario_".$processo[0]->nome."
    			(processo_seletivo_id, candidato_id, resposta1, resposta2, resposta3, resposta4, 
                 resposta5, resposta6, resposta7, resposta8, resposta9, resposta10)
                 VALUES ('$id','$idC','$r1','$r2','$r3','$r4','$r5','$r6','$r7','$r8','$r9','$r10');"); 
    		
            $validator = "Questionário respondido com sucesso!";
            return redirect()->route('candidatoIndex')->withErrors($validator)->with('unidades');
        }
    }

    //Método para Cadastrar uma Nova Pergunta
    public function storePerguntas(Request $request)
    {
        $input     = $request->all();
		$validator = Validator::make($request->all(), [
			'descricao' => 'required|max:1000',
		]);
		if ($validator->fails()) {
			return view('perguntas/cadastro_perguntas_novo')
		    		->withErrors($validator)
					->withInput(session()->flashInput($request->input()));
		} else { 										
		        $perguntas = Perguntas::create($input);
                $input['user_id'] = Auth::user()->id;
                $log = Loggers::create($input);
                $perguntas = Perguntas::all();
                $validator = "Pergunta cadastrada com sucesso!!";
                return view('perguntas/cadastro_perguntas', compact('perguntas'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));
        }
    }

    //Tela de Alteração de Pergunta
    public function perguntasAlterar($id)
    {
        $perguntas = Perguntas::where('id',$id)->get();
        return view('perguntas/cadastro_perguntas_alterar', compact('perguntas'));
    }

    //Método de Alteração de Pergunta
    public function updatePerguntas(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
			'descricao' => 'required|max:1000',
		]);
		if ($validator->fails()) {
            $perguntas = Perguntas::where('id',$id)->get();
			return view('perguntas/cadastro_perguntas_alterar', compact('perguntas'))
		    		->withErrors($validator)
					->withInput(session()->flashInput($request->input()));
		} else { 										
            $perguntas = Perguntas::find($id);
            $perguntas->update($input);
            $input['user_id'] = Auth::user()->id;
            $log       = Loggers::create($input);
            $perguntas = Perguntas::all();
            $validator = "Pergunta alterada com sucesso!!";
            return view('perguntas/cadastro_perguntas', compact('perguntas'))
		    			->withErrors($validator)
						->withInput(session()->flashInput($request->input()));
        }
    }
    
    //Tela de Exclusão de Pergunta
    public function perguntasExcluir(Request $request, $id)
    {
        $perguntas = Perguntas::where('id',$id)->get();
        return view('perguntas/cadastro_perguntas_excluir', compact('perguntas'));
    }

    //Método de Exclusão de Pergunta
    public function destroyPerguntas(Request $request, $id)
    {
        perguntas::find($id)->delete();
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $log       = Loggers::create($input);
        $perguntas = Perguntas::all();
        $validator = "Pergunta excluída com sucesso!!";
        return view('perguntas/cadastro_perguntas', compact('perguntas'))
			    ->withErrors($validator)
				->withInput(session()->flashInput($request->input()));
    }
}
