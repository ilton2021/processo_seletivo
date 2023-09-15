<?php

use Illuminate\Support\Facades\Route;
use App\Model\ProcessoSeletivo;
use App\Model\Unidade;
use App\Model\QuadroAvisos;

Auth::routes();

Route::get('/', 'CandidatoController@candidatoIndex')->name('candidatoIndex');
Route::get('areaCandidato', 'CandidatoController@areaCandidato')->name('areaCandidato');
Route::post('areaCandidato', 'CandidatoController@loginCandidato')->name('loginCandidato');

Route::get('politica_privacidade', 'CandidatoController@politicaP')->name('politicaP');
Route::get('termo_uso', 'CandidatoController@termoU')->name('termoU');
Route::get('termo_uso/{id_u}/{id_p}', 'CandidatoController@termoUIns')->name('termoUIns');

Route::get('areaCandidato/{id_u}/{id_p}/{id_c}', 'CandidatoController@areaCandidatoAlterar')->name('areaCandidatoAlterar');
Route::post('areaCandidato/{id_u}/{id_p}/{id_c}', 'CandidatoController@updateAreaCandidatoAlterar')->name('updateAreaCandidatoAlterar');
Route::get('areaCandidato/documentos/escolha/{id_u}/{id_p}/{id_c}', 'CandidatoController@areaCandidatoDocumentosEscolha')->name('areaCandidatoDocumentosEscolha');
Route::get('areaCandidato/documentos/escolha/candidato/{id_u}/{id_p}/{id_c}', 'CandidatoController@areaCandidatoDocumentos')->name('areaCandidatoDocumentos');
Route::get('areaCandidato/documentos/escolha/cadastro/{id_u}/{id_p}/{id_c}/{tela}', 'CandidatoController@cadastrarDocumento')->name('cadastrarDocumento');
Route::get('areaCandidato/documentos/escolha/cadastro/excluir/{id_u}/{id_p}/{id_c}/{tela}', 'CandidatoController@cadastrarDocumentoExcluir')->name('cadastrarDocumentoExcluir');
Route::post('areaCandidato/documentos/escolha/cadastro/excluir/{id_u}/{id_p}/{id_c}/{tela}/{id}', 'CandidatoController@excluirDocumento')->name('excluirDocumento');
Route::post('areaCandidato/documentos/escolha/cadastro/{id_u}/{id_p}/{id_c}/{tela}', 'CandidatoController@cadastrarDocumentoNovo')->name('cadastrarDocumentoNovo');
Route::get('areaCandidato/documentos/escolha/dependentes/{id_u}/{id_p}/{id_c}', 'CandidatoController@areaCandidatoDocumentosDependentes')->name('areaCandidatoDocumentosDependentes');
Route::get('areaCandidato/documentos/escolha/dependentes/{id_u}/{id_p}/{id_c}/{tela}', 'CandidatoController@cadastrarDocumentoDep')->name('cadastrarDocumentoDep');
Route::post('areaCandidato/documentos/escolha/dependentes/{id_u}/{id_p}/{id_c}/{tela}', 'CandidatoController@cadastrarDocumentoDepNovo')->name('cadastrarDocumentoDepNovo');
Route::get('areaCandidato/documentos/escolha/dependentes/excluir/{id_u}/{id_p}/{id_c}/{tela}', 'CandidatoController@documentoDepExcluir')->name('documentoDepExcluir');
Route::post('areaCandidato/documentos/escolha/dependentes/excluir/{id_u}/{id_p}/{id_c}/{tela}/{id}', 'CandidatoController@excluirDocumentoDep')->name('excluirDocumentoDep');
Route::get('painelCandidato/{id}/{id_p}/{id_c}', 'CandidatoController@painelCandidato')->name('painelCandidato'); 
Route::post('painelCandidato/{id}/{id_p}/{id_c}', 'CandidatoController@validarCandidatoConfirmar')->name('validarCandidatoConfirmar'); 
Route::get('painelCandidato/curriculo/{id}/{id_p}/{id_c}', 'CandidatoController@painelCandidatoCurriculo')->name('painelCandidatoCurriculo'); 
Route::post('painelCandidato/curriculo/{id}/{id_p}/{id_c}', 'CandidatoController@validarCandidatoCurriculo')->name('validarCandidatoCurriculo'); 
Route::get('painelCandidato/pcd/{id}/{id_p}/{id_c}/{tela}', 'CandidatoController@painelCandidatoPCD')->name('painelCandidatoPCD'); 
Route::post('painelCandidato/pcd/{id}/{id_p}/{id_c}/{tela}', 'CandidatoController@validarCandidatoPCD')->name('validarCandidatoPCD'); 
Route::get('painelCandidato/experiencias/aviso/{id}/{id_p}/{id_c}/{tela}', 'CandidatoController@painelCandidatoExperienciasAviso')->name('painelCandidatoExperienciasAviso'); 
Route::get('painelCandidato/experiencias/{id}/{id_p}/{id_c}/{tela}', 'CandidatoController@painelCandidatoExperiencias')->name('painelCandidatoExperiencias'); 
Route::post('painelCandidato/experiencias/{id}/{id_p}/{id_c}/{tela}', 'CandidatoController@validarCandidatoExperiencias')->name('validarCandidatoExperiencias'); 
Route::get('painelCandidato/questionario/{id}/{id_p}/{id_c}/{tela}', 'CandidatoController@painelCandidatoQuestionario')->name('painelCandidatoQuestionario'); 
Route::post('painelCandidato/questionario/{id}/{id_p}/{id_c}/{tela}', 'CandidatoController@validarCandidatoQuestionario')->name('validarCandidatoQuestionario'); 
Route::get('informativoPDF/{id}/{id_p}', 'CandidatoController@informativoPDF')->name('informativoPDF'); 
Route::get('informativo/{id}/{id_p}', 'CandidatoController@informativo')->name('informativo'); 
Route::get('informativoLGPD/{id}/{id_p}', 'CandidatoController@informativoLGPD')->name('informativoLGPD');
Route::get('candidato/cadastro', 'CandidatoController@candidatoIndex_')->name('candidatoIndex_');
Route::get('candidato/resultados_processos/{id}', 'CandidatoController@candidatoResultados')->name('candidatoResultados');
Route::get('candidato/resultados_listas/{id}', 'CandidatoController@candidatoListas')->name('candidatoListas');
Route::get('/candidato/resultados_listas/{id}/candidatoEditais', 'CandidatoController@candidatoEditais')->name('candidatoEditais');
Route::get('/candidato/resultados_listas/cadastro/{id}/{id_escolha}/{id_}', 'CandidatoController@candidatoListasOpcao')->name('candidatoListasOpcao');
Route::post('/candidato/resultados_listas/cadastro/{id}/{id_escolha}/{_id}', 'CandidatoController@pesquisarCandidatoResultado')->name('pesquisarCandidatoResultado');

Route::get('/candidato/cadastroCandidato/cadastro/{id}/{id_p}', 'CandidatoController@cadastroVagaCandidato')->name('cadastroVagaCandidato');
Route::post('/candidato/cadastroCandidato/cadastro/{id}/{id_p}', 'CandidatoController@storeCadastroVagaCandidato')->name('storeCadastroVagaCandidato');
Route::get('/candidato/cadastroCandidato/cadastro_cand/{id}/{id_p}', 'CandidatoController@cadastroCandidato')->name('cadastroCandidato');
Route::post('/candidato/cadastroCandidato/cadastro_cand/{id}/{id_p}', 'CandidatoController@validarCandidato')->name('validarCandidato');

Route::get('/candidato/cadastroCandidato/{id}/{id_processo}/{id_c}/questionario','PerguntasController@questionario')->name('questionario');
Route::post('/candidato/cadastroCandidato/{id}/{id_processo}/{id_c}/questionario','PerguntasController@storeQuestionario')->name('storeQuestionario');
Route::get('/candidato/cadastroCandidato/{id}/{id_processo}/{id_c}/questionario/mensagem','PerguntasController@questionarioMsg')->name('questionarioMsg');
Route::post('/candidato/cadastroCandidato/{id}/{id_processo}/validar/{a}', 'CandidatoController@validar')->name('validar');

Route::get('/cadastro/avaliacaoL/{id}/{id_c}','ProcessoCandidatoController@avaliacaoGestorLideranca')->name('avaliacaoGestorLideranca');
Route::post('/cadastro/avaliacaoL/{id}/{id_c}','ProcessoCandidatoController@updateAvaliacaoLideranca')->name('updateAvaliacaoLideranca');
Route::get('/cadastro/avaliacaoO/{id}/{id_c}','ProcessoCandidatoController@avaliacaoGestorOperacional')->name('avaliacaoGestorOperacional');
Route::post('/cadastro/avaliacaoO/{id}/{id_c}','ProcessoCandidatoController@updateAvaliacaoOperacional')->name('updateAvaliacaoOperacional');
Route::get('/cadastro/avaliacaoGestor/','ProcessoCandidatoController@avaliacaoGestor')->name('avaliacaoGestor');

Route::get('/auth/login','UserController@telaLogin')->name('telaLogin');
Route::post('/auth/login/', 'UserController@Login')->name('Login');
Route::get('/auth/register','UserController@telaRegistro')->name('telaRegistro');
Route::post('/auth/register/','UserController@store')->name('store') ;
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
		Route::get('/resultado_processos/pesquisaAvaliacaoGestor', 'ProcessoSeletivoController@pesquisaAvaliacaoGestor')->name('pesquisaAvaliacaoGestor');
		
		Route::get('/processo_seletivo/documentos/{id}','ProcessoSeletivoController@documentos')->name('documentos');
		Route::get('/processo_seletivo/documentos/{id}/pesquisar','ProcessoSeletivoController@pesquisarDocumentos')->name('pesquisarDocumentos');
		Route::post('/processo_seletivo/documentos/{id}/pesquisar','ProcessoSeletivoController@pesquisarDocumentos')->name('pesquisarDocumentos');
		Route::get('/processo_seletivo/documentos/candidato/{id}/{id_c}','ProcessoSeletivoController@documentosCandidato')->name('documentosCandidato');
		Route::get('/processo_seletivo/documentos/dependentes/{id}/{id_c}','ProcessoSeletivoController@documentosDependentes')->name('documentosDependentes');
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
		
		//Vaga Experiências
		Route::get('/processo_seletivo/vagaCadastro/{id}/visualizar_experiencias/{id_vaga}','ProcessoSeletivoController@cadastroVagaExperiencias')->name('cadastroVagaExperiencias');
		Route::get('/processo_seletivo/vagaCadastro/{id}/experiencias/{id_vaga}','ProcessoSeletivoController@vagaExperienciasNovo')->name('vagaExperienciasNovo');
		Route::post('/processo_seletivo/vagaCadastro/{id}/experiencias/{id_vaga}','ProcessoSeletivoController@storeVagaExp')->name('storeVagaExp');
		Route::get('/processo_seletivo/vagaCadastro/{id}/alterar_experiencias/{id_vaga}/{id_vagaE}','ProcessoSeletivoController@vagaExperienciasAlterar')->name('vagaExperienciasAlterar');
		Route::post('/processo_seletivo/vagaCadastro/{id}/alterar_experiencias/{id_vaga}/{id_vagaE}','ProcessoSeletivoController@updateVagaExp')->name('updateVagaExp');
		Route::get('/processo_seletivo/vagaCadastro/{id}/excluir_experiencias/{id_vaga}/{id_vagaE}','ProcessoSeletivoController@vagaExperienciasExcluir')->name('vagaExperienciasExcluir');
		Route::post('/processo_seletivo/vagaCadastro/{id}/excluir_experiencias/{id_vaga}/{id_vagaE}','ProcessoSeletivoController@deletarVagaExp')->name('deletarVagaExp');
	
		//ProcessoCandidato
		Route::get('/processo_candidato/{id}','ProcessoCandidatoController@numeroInscritos')->name('numeroInscritos');
		////
		
		//ResultadosProcessos
		Route::get('/resultado_processos/{id}/cadastro','ProcessoResultadoController@cadastrarResultados')->name('cadastrarResultados');
		Route::get('/resultado_processos/{id}/cadastroGestor','ProcessoResultadoController@cadastrarResultadosGestor')->name('cadastrarResultadosGestor');
		Route::get('/resultado_processos/{id}/informacoes/{id_cand}','ProcessoResultadoController@informacoes')->name('informacoes');
		Route::get('/resultado_processos/{id}/informacoes/{id_cand}/questionarioVisualizar','PerguntasController@questionarioVisualizar')->name('questionarioVisualizar');
		Route::get('/resultado_processos/{id}/cadastro/resultadoA/{id_candidato}/', 'ProcessoResultadoController@resultadoProcessosA')->name('resultadoProcessosA');
		Route::post('/resultado_processos/{id}/cadastro/resultadoA/{id_candidato}/storeAvaliacaoA', 'ProcessoResultadoController@storeAvaliacaoA')->name('storeAvaliacaoA');
		Route::get('/resultado_processos/{id}/cadastro/pesquisar', 'ProcessoResultadoController@pesquisarCandidato')->name('pesquisarCandidato');
		Route::post('/resultado_processos/{id}/cadastro/pesquisar', 'ProcessoResultadoController@pesquisarCandidato')->name('pesquisarCandidato');
		Route::get('/resultado_processos/{id}/cadastroGestor/pesquisar', 'ProcessoResultadoController@pesquisarCandidatoGestor')->name('pesquisarCandidatoGestor');
		Route::post('/resultado_processos/{id}/cadastroGestor/pesquisar', 'ProcessoResultadoController@pesquisarCandidatoGestor')->name('pesquisarCandidatoGestor');

		Route::get('/resultado_processos/{id}/cadastro/ranking', 'ProcessoResultadoController@rankingVagas')->name('rankingVagas');
		Route::post('/resultado_processos/{id}/cadastro/ranking', 'ProcessoResultadoController@ranking')->name('ranking');
		Route::get('/resultado_processos/{id}/cadastro/ranking/exportCandidatos/{nome}/{vaga}', 'ProcessoResultadoController@exportCandidatosRank')->name('exportCandidatosRank');
		Route::get('/resultado_processos/{id}/cadastro/ranking/vagas', 'ProcessoResultadoController@rankingVagas2')->name('rankingVagas2');
		Route::post('/resultado_processos/{id}/cadastro/ranking/vagas', 'ProcessoResultadoController@pesquisarRanking')->name('pesquisarRanking');
		Route::get('/resultado_processos/{id}/cadastro/exportCandidatos/{nome}/', 'ProcessoResultadoController@exportCandidatos')->name('exportCandidatos');
		Route::get('/resultado_processos/{id}/cadastro/exportCandidatos/{nome}/old', 'ProcessoResultadoController@exportCandidatosOld')->name('exportCandidatosOld');
		
		Route::get('/resultado_processos/exibirResultados', 'ProcessoResultadoController@exibirResultados')->name('exibirResultados');
		
		Route::get('/resultado_processos/{id}/cadastro/avaliacao/{id_c}','ProcessoCandidatoController@avaliacao')->name('avaliacao');
		Route::get('/resultado_processos/{id}/cadastro/avaliacaoLideranca/{id_c}','ProcessoCandidatoController@avaliacaoLideranca')->name('avaliacaoLideranca');
		Route::get('/resultado_processos/{id}/cadastro/avaliacaoLiderancaVisualizar/{id_c}','ProcessoCandidatoController@avaliacaoLiderancaVisualizar')->name('avaliacaoLiderancaVisualizar');
		Route::post('/resultado_processos/{id}/cadastro/avaliacaoLideranca/{id_c}','ProcessoCandidatoController@storeAvaliacaoLideranca')->name('storeAvaliacaoLideranca');
		Route::get('/resultado_processos/{id}/cadastro/avaliacaoOperacional/{id_c}','ProcessoCandidatoController@avaliacaoOperacional')->name('avaliacaoOperacional');
		Route::get('/resultado_processos/{id}/cadastro/avaliacaoOperacionalVisualizar/{id_c}','ProcessoCandidatoController@avaliacaoOperacionalVisualizar')->name('avaliacaoOperacionalVisualizar');
		Route::post('/resultado_processos/{id}/cadastro/avaliacaoOperacional/{id_c}','ProcessoCandidatoController@storeAvaliacaoOperacional')->name('storeAvaliacaoOperacional');

		Route::get('/resultado_processos/{id}/cadastro/avaliacaoEntrevista/{id_c}','ProcessoCandidatoController@avaliacaoEntrevista')->name('avaliacaoEntrevista');
		Route::get('/resultado_processos/{id}/cadastro/avaliacaoEntrevistaRH/{id_c}','ProcessoCandidatoController@avaliacaoEntrevistaRH')->name('avaliacaoEntrevistaRH');
		Route::post('/resultado_processos/{id}/cadastro/avaliacaoEntrevistaRH/{id_c}','ProcessoCandidatoController@storeAvaliacaoEntrevistaRH')->name('storeAvaliacaoEntrevistaRH');
		Route::get('/resultado_processos/{id}/cadastro/avaliacaoEntrevistaGestor/{id_c}','ProcessoCandidatoController@avaliacaoEntrevistaGestor')->name('avaliacaoEntrevistaGestor');
		Route::post('/resultado_processos/{id}/cadastro/avaliacaoEntrevistaGestor/{id_c}','ProcessoCandidatoController@storeAvaliacaoEntrevistaGestor')->name('storeAvaliacaoEntrevistaGestor');
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

		//Perguntas
		Route::get('/perguntas/cadastro','PerguntasController@cadastroPerguntas')->name('cadastroPerguntas');
		Route::get('/perguntas/cadastro/novo','PerguntasController@perguntasNovo')->name('perguntasNovo');
		Route::post('/perguntas/cadastro/novo','PerguntasController@storePerguntas')->name('storePerguntas');
		Route::get('/perguntas/cadastro/alterar/{id}','PerguntasController@perguntasAlterar')->name('perguntasAlterar');
		Route::post('/perguntas/cadastro/alterar/{id}','PerguntasController@updatePerguntas')->name('updatePerguntas');
		Route::get('/perguntas/cadastro/excluir/{id}','PerguntasController@perguntasExcluir')->name('perguntasExcluir');
		Route::post('/perguntas/cadastro/excluir/{id}','PerguntasController@destroyPerguntas')->name('destroyPerguntas');
		////
	});
});