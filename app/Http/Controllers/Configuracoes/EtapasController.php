<?php

namespace App\Http\Controllers\Configuracoes;

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
use App\Http\Models\Etapas;
use DB;

class EtapasController extends Controller
{
  public function index() {
      $responsavel = User::where('excluido', '=', 0)
                          ->get();
      return view('configuracoes.etapas.index', compact('responsavel')); 
  }


    public function etapaSalvar(Request $request){
      $dados = $request->all();
      // dd($dados);
      DB::beginTransaction();
        try {
               Etapas::create([
                  'nome'  => $dados['nome-etapa'],
                  'user'  => $dados['resp-etapa'],
                ]);
               DB::commit();
        } catch (\Exception $e) {
          DB::rollback();
          return var_dump($e->getMessage());die();
          return redirect('painel/configuracoes/etapas')->with('error','Não foi possível salvar, tente novamente!');
        }

       return redirect('painel/configuracoes/etapas')->with('success','Equipe salva com sucesso!');
    }  
/** Equipes - final **/
}