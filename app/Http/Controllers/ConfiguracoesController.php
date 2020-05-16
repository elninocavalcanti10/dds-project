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
    $user = User::where('excluido', '=', 0)->get();
    	return view('configuracoes', compact('user'));
	}

	public function criarProjeto(Request $request) {
		$dados = $request->all();
    $idUser = Auth::user()->id;
		// dd($idUser);

       DB::beginTransaction();
        try {
          
          Projeto::create(['nome' => $dados['nome'],
          								 'imagem' => 'assinaturas.png',
                           'id_user' => $idUser,
        									]);        
          
          DB::commit();

        } catch (\Exception $e) {
          DB::rollback();
          return redirect('painel/configuracoes')->with('error','Não foi criado o projeto, tente novamente!');
        }
    return redirect('painel/configuracoes')->with('success','Projeto criado com sucesso!');    
	}

  public function AtualizarPermissao(Request $request) {
    $dados = $request->all();
    $idUser = $dados['id'];
      
      DB::beginTransaction();
      try {

        foreach ($idUser as $key => $value) {
    // dd($idUser[$key]);
          User::where('id','=',$key)->update(['permissoes'=>$idUser[$key]]);
        }
        DB::commit();

      } catch (\Exception $e) {
         
        DB::rollback();
        
        return var_dump($e->getMessage());die();

          return redirect('painel/configuracoes')->with('error','Não foi possível atualizar, tente novamento!');
      }
      return redirect('painel/configuracoes')->with('success','Permissão atualizado com sucesso!');
  }

}
