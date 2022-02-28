<?php

use Illuminate\Support\Facades\Route;
use App\Model\ProcessoSeletivo;
use App\Model\Unidade;
use App\Model\QuadroAvisos;

Auth::routes();

Route::get('/', 'CandidatoController@candidatoIndex')->name('candidatoIndex');
Route::get('informativo/{id}/{id_p}', 'CandidatoController@informativo')->name('informativo'); 
Route::get('candidato/cadastro', 'CandidatoController@candidatoIndex_')->name('candidatoIndex_');
Route::get('candidato/resultados_processos/{id}', 'CandidatoController@candidatoResultados')->name('candidatoResultados');
Route::get('candidato/resultados_listas/{id}', 'CandidatoController@candidatoListas')->name('candidatoListas');
Route::get('/candidato/resultados_listas/{id}/candidatoEditais', 'CandidatoController@candidatoEditais')->name('candidatoEditais');
Route::get('/candidato/resultados_listas/{id}/{id_escolha}/{nome}', 'CandidatoController@candidatoListasOpcao')->name('candidatoListasOpcao');
Route::post('/candidato/resultados_listas/{id}/{id_escolha}/{nome}/', 'CandidatoController@pesquisarCandidatoResultado')->name('pesquisarCandidatoResultado');
Route::get('/candidato/cadastroCandidato/{id}/{id_processo}', 'CandidatoController@cadastroCandidato')->name('cadastroCandidato');
Route::post('/candidato/cadastroCandidato/{id}/{id_processo}', 'CandidatoController@validarCandidato')->name('validarCandidato');
Route::post('/candidato/cadastroCandidato/{id}/{id_processo}/validar/{a}', 'CandidatoController@validar')->name('validar');

Route::get('/cadastro/avaliacaoL/{id}/{id_c}','ProcessoCandidatoController@avaliacaoGestorLideranca')->name('avaliacaoGestorLideranca');
Route::post('/cadastro/avaliacaoL/{id}/{id_c}','ProcessoCandidatoController@updateAvaliacaoLideranca')->name('updateAvaliacaoLideranca');
Route::get('/cadastro/avaliacaoO/{id}/{id_c}','ProcessoCandidatoController@avaliacaoGestorOperacional')->name('avaliacaoGestorOperacional');
Route::post('/cadastro/avaliacaoO/{id}/{id_c}','ProcessoCandidatoController@updateAvaliacaoOperacional')->name('updateAvaliacaoOperacional');
Route::get('/cadastro/avaliacaoGestor/','ProcessoCandidatoController@avaliacaoGestor')->name('avaliacaoGestor');

Route::get('/auth/login','UserController@telaLogin')->name('telaLogin');
Route::post('/auth/login/', 'UserController@Login')->name('Login');
Route::get('/auth/register','UserController@telaRegistro')->name('telaRegistro');
Route::post('/auth/register/','UserController@store')->name('store');
Route::get('/auth/passwords/reset','UserController@telaReset')->name('telaReset');	
Route::post('/telaReset','UserController@resetarSenha')->name('resetarSenha');
Route::get('/auth/passwords/email','UserController@telaEmail')->name('telaEmail');
Route::post('/auth/passwords/email','UserController@emailReset')->name('emailReset');

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
		Route::get('/processo_seletivo/cadastroCandidato/{id}','CandidatoController@cadastroCandidato2')->name('cadastroCandidato2');
		Route::post('/processo_seletivo/cadastroCandidato/{id}','CandidatoController@storeCandidato2')->name('storeCandidato2');
		Route::post('/processo_seletivo/encontraAvaliacao/','ProcessoSeletivoController@encontraAvaliacao')->name('encontraAvaliacao');
		Route::get('/processo_seletivo/encontraAvaliacao/','ProcessoSeletivoController@encontraAvaliacao')->name('encontraAvaliacao');
		Route::get('/resultado_processos/pesquisaAvaliacao', 'ProcessoSeletivoController@pesquisaAvaliacao')->name('pesquisaAvaliacao');
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
		Route::get('/resultado_processos/{id}/cadastro/resultadoA/{id_candidato}/', 'ProcessoResultadoController@resultadoProcessosA')->name('resultadoProcessosA');
		Route::post('/resultado_processos/{id}/cadastro/resultadoA/{id_candidato}/storeAvaliacaoA', 'ProcessoResultadoController@storeAvaliacaoA')->name('storeAvaliacaoA');
		Route::post('/resultado_processos/{id}/cadastro/pesquisar', 'ProcessoResultadoController@pesquisarCandidato')->name('pesquisarCandidato');
		Route::get('/resultado_processos/{id}/cadastro/pesquisar', 'ProcessoResultadoController@pesquisarCandidato')->name('pesquisarCandidato');
		Route::get('/resultado_processos/{id}/cadastro/exportCandidatos/{nome}', 'ProcessoResultadoController@exportCandidatos')->name('exportCandidatos');
		Route::get('/resultado_processos/exibirResultados', 'ProcessoResultadoController@exibirResultados')->name('exibirResultados');
		
		Route::get('/resultado_processos/{id}/cadastro/avaliacao/{id_c}','ProcessoCandidatoController@avaliacao')->name('avaliacao');
		Route::get('/resultado_processos/{id}/cadastro/avaliacaoLideranca/{id_c}','ProcessoCandidatoController@avaliacaoLideranca')->name('avaliacaoLideranca');
		Route::get('/resultado_processos/{id}/cadastro/avaliacaoLiderancaVisualizar/{id_c}','ProcessoCandidatoController@avaliacaoLiderancaVisualizar')->name('avaliacaoLiderancaVisualizar');
		Route::post('/resultado_processos/{id}/cadastro/avaliacaoLideranca/{id_c}','ProcessoCandidatoController@storeAvaliacaoLideranca')->name('storeAvaliacaoLideranca');
		Route::get('/resultado_processos/{id}/cadastro/avaliacaoOperacional/{id_c}','ProcessoCandidatoController@avaliacaoOperacional')->name('avaliacaoOperacional');
		Route::get('/resultado_processos/{id}/cadastro/avaliacaoOperacionalVisualizar/{id_c}','ProcessoCandidatoController@avaliacaoOperacionalVisualizar')->name('avaliacaoOperacionalVisualizar');
		Route::post('/resultado_processos/{id}/cadastro/avaliacaoOperacional/{id_c}','ProcessoCandidatoController@storeAvaliacaoOperacional')->name('storeAvaliacaoOperacional');
		////

		//Quadro de Avisos
		Route::get('/quadroAvisos/cadastro','QuadroAvisosController@cadastroQuadroAvisos')->name('cadastroQuadroAvisos');
		Route::get('/quadroAvisos/cadastro/novo','QuadroAvisosController@quadroAvisosNovo')->name('quadroAvisosNovo');
		Route::post('/quadroAvisos/cadastro/novo','QuadroAvisosController@storeQuadroAvisos')->name('storeQuadroAvisos');
		Route::get('/quadroAvisos/cadastro/alterar/{id}','QuadroAvisosController@quadroAvisosAlterar')->name('quadroAvisosAlterar');
		Route::post('/quadroAvisos/cadastro/alterar/{id}','QuadroAvisosController@updateQuadroAvisos')->name('updateQuadroAvisos');
		Route::get('/quadroAvisos/cadastro/excluir/{id}','QuadroAvisosController@quadroAvisosExcluir')->name('quadroAvisosExcluir');
		Route::post('/quadroAvisos/cadastro/excluir/{id}','QuadroAvisosController@deleteQuadroAvisos')->name('deleteQuadroAvisos');
		////
	});
});