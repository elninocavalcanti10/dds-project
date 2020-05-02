<?php

namespace App\Http\Controllers\Configuracoes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Middleware\Authenticate;
use App\User;
use App\Http\Models\Equipes;
use App\Http\Models\Etapas;
use DB;

class EquipeController extends Controller
{
   public function index() {
    $eq_requisitos = Etapas::where('excluido', '=', 0)
                            ->get();
    $eq_projeto = Etapas::where('excluido', '=', 0)
                         ->get();
    $eq_implementacao = Etapas::where('excluido', '=', 0)
                              ->get();
    $eq_teste = Etapas::where('excluido', '=', 0)
                      ->get();
    $eq_ger_projeto = User::where('excluido', '=', 0)
                          ->where('users.permissoes', '=', 5)
                          ->get();
// dd($eq_requisitos);
    return view('configuracoes.equipes.index', compact('eq_requisitos', 'eq_projeto', 'eq_implementacao', 'eq_teste', 'eq_ger_projeto')); 
  }
  public function equipeSalvar(Request $request){
    $dados = $request->all();
    // dd($dados);
    DB::beginTransaction();
      try {
             Equipes::create([
                'nome'  => $dados['nome-equipe'],
                'resp_lev_requisitos'  => $dados['requisitos'],
                'resp_projeto'  => $dados['projetos'],
                'resp_implemetacao'  => $dados['implementacao'],
                'resp_teste'  => $dados['teste'],
                'resp_gerencia_proj'  => $dados['ger-projetos'],
              ]);
             DB::commit();
      } catch (\Exception $e) {
        DB::rollback();
        return var_dump($e->getMessage());die();
        return redirect('painel/configuracoes/equipes')->with('error','Não foi possível salvar, tente novamente!');
      }

     return redirect('painel/configuracoes/equipes')->with('success','Equipe salva com sucesso!');
  }  
}
