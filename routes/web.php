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
	Route::get('/projetos', 'ProjetosController@index')->name('projetos');
	Route::get('/projetos-admin', 'ProjetosAdminController@index')->name('projetosAdmin');
	//Configuração
	Route::group(['prefix' => '/configuracoes'], function() {
		Route::get('/', 'ConfiguracoesController@index')->name('configuracoes');
		Route::get('/usuarios', 'ConfiguracoesController@usuarios')->name('usuarios');

		Route::get('/sites', 'ConfiguracoesController@sites')->name('sites');
		Route::post('/sites_salvar', 'ConfiguracoesController@siteSalvar');
		
		Route::get('/etapas', 'Configuracoes\EtapasController@index');
		Route::post('/etapas_salvar', 'Configuracoes\EtapasController@etapaSalvar');

		Route::get('/equipes', 'Configuracoes\EquipeController@index');
		Route::post('/equipe_salvar', 'Configuracoes\EquipeController@equipeSalvar');

		Route::get('/projetos', 'ConfiguracoesController@projetos')->name('projetos');
		Route::get('/ling_ferramentas', 'ConfiguracoesController@ling_ferramentas')->name('ling_ferramentas');
	});

	Route::get('/estatisticas', 'EstatisticasController@index')->name('estatisticas');

});