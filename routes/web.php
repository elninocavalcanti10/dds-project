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

	//Achados e Perdidos
	Route::get('/get_codigo_admin', 'ProjetosAdminController@getCodigo');
	Route::get('/get_nome_admin', 'ProjetosAdminController@getNome');
	Route::get('/get_descricao_admin', 'ProjetosAdminController@getDescricao');
	Route::post('/achadosperdidosadmin/salvarobj', 'ProjetosAdminController@salvarObjeto');
	Route::get('/projetos-admin', 'ProjetosAdminController@index')->name('projetosAdmin');
	Route::post('/achadosperdidosadmin/salvar_retirada', 'ProjetosAdminController@salvarRetirada');
	
	

	Route::get('/estatisticas', 'EstatisticasController@index')->name('estatisticas');

});