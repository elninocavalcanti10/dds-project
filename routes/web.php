<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return redirect()->route('login');
// });
Route::get('/', function () {
    return redirect()->route('home');
});


Auth::routes();

Route::get('/get-cidades', 'ConfiguracoesController@getCidades');

Route::group(['prefix' => '/painel'], function() {
	Route::get('/', 'HomeController@index')->name('home');
	//Projetos
	Route::get('/get_codigo', 'ProjetosController@getCodigo');
	Route::get('/get_nome', 'ProjetosController@getNome');
	Route::get('/get_descricao', 'ProjetosController@getDescricao');
	Route::get('/projetos', 'ProjetosController@index')->name('projetos');
	Route::post('/projetos/salvar', 'ProjetosController@salvar');

	//Projetos Admin
	Route::get('/get_codigo_admin', 'ProjetosAdminController@getCodigo');
	Route::get('/get_nome_admin', 'ProjetosAdminController@getNome');
	Route::get('/get_descricao_admin', 'ProjetosAdminController@getDescricao');
	Route::get('/projetos-admin', 'ProjetosAdminController@index')->name('projetosAdmin');
	Route::post('/projetos-admin/salvar_etapa', 'ProjetosAdminController@salvarEtapa');
	Route::post('/projetos-admin/salvar_conclusao', 'ProjetosAdminController@salvarConclusao');
	Route::post('/projetos-admin/finalizar_projeto', 'ProjetosAdminController@finalizarProjeto');
	
	//Configurações
	Route::get('/configuracoes', 'ConfiguracoesController@index')->name('configuracoes');
	Route::post('/configuracoes/criar_projeto', 'ConfiguracoesController@criarProjeto');
	Route::post('/configuracoes/atualizar_permissao', 'ConfiguracoesController@AtualizarPermissao');
	

	Route::get('/estatisticas', 'EstatisticasController@index')->name('estatisticas');

});