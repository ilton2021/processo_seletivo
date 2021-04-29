<?php

use Illuminate\Support\Facades\Route;
use App\Model\ProcessoSeletivo;
use App\Model\Unidade;

Route::get('/', function () {
    $processos = ProcessoSeletivo::all();
	$processos1 = ProcessoSeletivo::all();
    $unidades = Unidade::all();
    return view('/candidato', compact('processos','unidades','processos1'));
})->name('candidato');

Auth::routes();

Route::get('candidato', 'CandidatoController@candidatoIndex')->name('candidatoIndex');
Route::get('informativo/{id}/{id_p}', 'CandidatoController@informativo')->name('informativo'); 
Route::get('candidato/cadastro', 'CandidatoController@candidatoIndex_')->name('candidatoIndex_');
Route::get('candidato/resultados_processos/{id}', 'CandidatoController@candidatoResultados')->name('candidatoResultados');
Route::get('candidato/resultados_listas/{id}', 'CandidatoController@candidatoListas')->name('candidatoListas');
Route::get('/candidato/resultados_listas/{id}/candidatoEditais', 'CandidatoController@candidatoEditais')->name('candidatoEditais');
Route::get('/candidato/resultados_listas/{id}/{id_escolha}/{nome}', 'CandidatoController@candidatoListasOpcao')->name('candidatoListasOpcao');
Route::post('/candidato/resultados_listas/{id}/{id_escolha}/{nome}/', 'CandidatoController@pesquisarCandidatoResultado')->name('pesquisarCandidatoResultado');
Route::get('/candidato/cadastroCandidato/{id}/{id_processo}', 'CandidatoController@cadastroCandidato')->name('cadastroCandidato');
Route::post('/candidato/cadastroCandidato/{id}/{id_processo}/validar/{a}', 'CandidatoController@validar')->name('validar');

Route::get('/auth/login','UserController@telaLogin')->name('telaLogin');
Route::post('/auth/login/', 'UserController@Login')->name('Login');
Route::get('/auth/register','UserController@telaRegistro')->name('telaRegistro');
Route::post('/auth/register/','UserController@store')->name('store');
Route::get('/telaReset','UserController@telaReset')->name('telaReset');
Route::post('/telaReset/','UserController@resetarSenha')->name('resetarSenha');

Route::middleware(['auth'])->group( function() {
	
	Route::get('/home', 'HomeController@index')->name('home');
	Route::prefix('home')->group( function(){
		
		//ProcessoSeletivo
		Route::get('/processo_seletivo','ProcessoSeletivoController@cadastroProcesso')->name('cadastroProcesso');
		Route::get('/processo_seletivo/processoNovo','ProcessoSeletivoController@processoNovo')->name('processoNovo');
		Route::post('/processo_seletivo/processoNovo','ProcessoSeletivoController@storeProcesso')->name('storeProcesso');
		Route::get('/processo_seletivo/processoAlterar/{id}','ProcessoSeletivoController@processoAlterar')->name('processoAlterar');
		Route::post('/processo_seletivo/processoAlterar/{id}','ProcessoSeletivoController@updateProcesso')->name('updateProcesso');
		Route::get('/processo_seletivo/processoExcluir/{id}','ProcessoSeletivoController@processoExcluir')->name('processoExcluir');
		Route::post('/processo_seletivo/processoExcluir/{id}','ProcessoSeletivoController@destroyProcesso')->name('destroyProcesso');
		Route::post('/processo_seletivo/pesquisar', 'ProcessoSeletivoController@pesquisarProcesso')->name('pesquisarProcesso');
		Route::get('/processo_seletivo/pesquisar/', 'ProcessoSeletivoController@pesquisarProcesso')->name('pesquisarProcesso');
		////

		//Unidade
		Route::get('/cadastroUnidade', 'UnidadeController@cadastroUnidade')->name('cadastroUnidade');
		Route::get('/cadastroUnidade/unidadeNovo', 'UnidadeController@unidadeNovo')->name('unidadeNovo');
		Route::get('/cadastroUnidade/unidadeAlterar/{id}', 'UnidadeController@unidadeAlterar')->name('unidadeAlterar');
		Route::post('/cadastroUnidade/unidadeAlterar/{id}', 'UnidadeController@updateUnidade')->name('updateUnidade');
		Route::get('/cadastroUnidade/unidadeExcluir/{id}', 'UnidadeController@unidadeExcluir')->name('unidadeExcluir');
		Route::post('/cadastroUnidade/unidadeExcluir/{id}', 'UnidadeController@destroyUnidade')->name('destroyUnidade');
		Route::post('/cadastroUnidade/unidadeNovo', 'UnidadeController@storeUnidade')->name('storeUnidade');
		Route::post('/cadastroUnidade/pesquisar', 'UnidadeController@pesquisar')->name('pesquisar');
		////

		//Vaga
		Route::get('/processo_seletivo/vagaCadastro/{id}','ProcessoSeletivoController@vagaCadastro')->name('vagaCadastro');
		Route::post('/processo_seletivo/vagaCadastro/{id}','ProcessoSeletivoController@storeVaga')->name('storeVaga');
		Route::get('/processo_seletivo/vagaAlterar/{id}/{id_vaga}','ProcessoSeletivoController@vagaAlterar')->name('vagaAlterar');
		Route::post('/processo_seletivo/vagaAlterar/{id}/{id_vaga}','ProcessoSeletivoController@updateVaga')->name('updateVaga');
		Route::get('/processo_seletivo/vagaExcluir/{id}/{id_vaga}','ProcessoSeletivoController@vagaExcluir')->name('vagaExcluir');
		Route::post('/processo_seletivo/vagaExcluir/{id}/{id_vaga}','ProcessoSeletivoController@destroyVaga')->name('destroyVaga');
		////
		
		//ProcessoCandidato
		Route::get('/processo_candidato/{id}','ProcessoCandidatoController@numeroInscritos')->name('numeroInscritos');
		////
		
		//ResultadosProcessos
		Route::get('/resultado_processos/{id}/cadastro','ProcessoResultadoController@cadastrarResultados')->name('cadastrarResultados');
		Route::get('/resultado_processos/{id}/informacoes/{id_cand}','ProcessoResultadoController@informacoes')->name('informacoes');
		Route::get('/resultado_processos/{id}/cadastro/resultadoA/{id_candidato}/{id_vaga}', 'ProcessoResultadoController@resultadoProcessosA')->name('resultadoProcessosA');
		Route::post('/resultado_processos/{id}/cadastro/resultadoA/{id_candidato}/{id_vaga}/storeAvaliacaoA', 'ProcessoResultadoController@storeAvaliacaoA')->name('storeAvaliacaoA');
		Route::post('/resultado_processos/{id}/cadastro/pesquisar', 'ProcessoResultadoController@pesquisarCandidato')->name('pesquisarCandidato');
		Route::get('/resultado_processos/{id}/cadastro/pesquisar', 'ProcessoResultadoController@pesquisarCandidato')->name('pesquisarCandidato');
		Route::get('/resultado_processos/{id}/cadastro/exportCandidatos/{nome}', 'ProcessoResultadoController@exportCandidatos')->name('exportCandidatos');
		////
	});
});