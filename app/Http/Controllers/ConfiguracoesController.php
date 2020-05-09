<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Middleware\Authenticate;
use App\User;
use App\Models\Agendamento;
use App\Models\Etapas;
use App\Models\Projeto;
use DB;


class ConfiguracoesController extends Controller
{

	public function index(){
    	return view('configuracoes');
	}

	public function criarProjeto(Request $request) {
		$dados = $request->all();
		// dd($dados);

       DB::beginTransaction();
        try {
          
          Projeto::create(['nome' => $dados['nome'],
          								 'imagem' => 'assinaturas.png',
        									]);        
          
          DB::commit();

        } catch (\Exception $e) {
          DB::rollback();
          return redirect('painel/configuracoes')->with('error','Não foi criar projeto, tente novamente!');
        }
    return redirect('painel/configuracoes')->with('success','Agendado com sucesso!');    
	}

}
