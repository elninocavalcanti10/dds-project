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
use App\Http\Models\Estado;
use App\Http\Models\Cidade;
use App\Http\Models\Sites;
use App\Http\Models\Etapas;
use App\Http\Models\Equipes;
use App\Http\Models\Projetos;
use App\Http\Models\LinguagensFerramentas;
use DB;

class ConfiguracoesController extends Controller
{
    public function index()
    {
        return view('configuracoes.index');
    }




    public function usuarios() {
      $usuarios = User::all();
        return view('configuracoes.usuarios', compact('usuarios')); 
    }





/** Site - inicio **/
  public function sites() {
    $estado = Estado::where('excluido','=',0)
                    ->orderby('sigla', 'asc')
                    ->get();
    $sites = Sites::get();
      return view('configuracoes.sites', compact('sites', 'estado')); 
  }

  public function siteSalvar(Request $request){
    $dados = $request->all();
    // dd($dados);
    
    DB::beginTransaction();
      try {
        Sites::create([
                        'nome'  => $dados['nome-site'],
                        'estado'  => $dados['estado'],
                        'cidade'  => $dados['cidade'],
                      ]);

        DB::commit();

      } catch (\Exception $e) {
        DB::rollback();
        return var_dump($e->getMessage());die();
        return redirect('painel/configuracoes/sites')->with('error','Não foi possível salvar, tente novamente!');
      }

     return redirect('painel/configuracoes/sites')->with('success','Candidato salvo com sucesso!');
  }

/** Site - final **/




    public function etapas() {
      $etapas = Etapas::all();
        return view('configuracoes.etapas', compact('etapas')); 
    }






    public function projetos() {
      $projetos = Projetos::all();
        return view('configuracoes.projetos', compact('projetos')); 
    }

    public function ling_ferramentas() {
      $ferramentas = LinguagensFerramentas::all();
        return view('configuracoes.ling_ferramentas', compact('ferramentas'));  
    }



/**** Buscar Cidades ****/
    public function getCidades(Request $request) {
      $codEstado = $request->all();
      
      $cidCandidato = Cidade::select('cidade.nome', 'cidade.ibge')
                                     ->where('cidade.excluido','=', 0)
                                     ->join('estados', 'estados.id', '=', 'cidade.id_estado')
                                     ->where('estados.id','=',$codEstado['cidCandidato'])
                                     ->orderby('cidade.nome', 'asc')
                                     ->get();
      

      $cidCandidato = json_encode($cidCandidato);

      die($cidCandidato);
    }

}