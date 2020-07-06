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



class ProjetosController extends Controller
{
	 public function index(){

    $agenda = Agendamento::all();
    $agenda = json_encode($agenda);

    $projetos = Projeto::select('projeto.id', 'projeto.nome', 'projeto.imagem')
                            ->where('projeto.excluido','=',0)
                            ->get();

    $etapaProj = Etapas::select('etapas.id_projeto', 'etapas.nome', 'etapas.codigo', 'etapas.detalhes_item', 'etapas.local', 'etapas.status', 'etapas.nome_gestor', 'etapas.ling_ferramentas')
                        ->where('etapas.excluido','=',0)
                        ->where('etapas.status','=',0)
                        ->join('projeto', 'projeto.id', '=', 'etapas.id_projeto')
                        ->get();

    $etapaProj = json_encode($etapaProj);

    return view('projetos',compact('etapaProj', 'projetos', 'agenda'));
  }




  public function salvar(Request $request){
      $dados = $request->all();
      // dd($dados);
      
      DB::beginTransaction();
        try {
            $dados1 = Etapas::select('id')
                            ->where('excluido','=',0)
                            ->where('etapas.codigo','=',$dados['objetoCat'])
                            ->first();

                Agendamento::create(['id_etapa' => $dados1['id'], 'data_hora' => $dados['btn-agendar']]);
                  
          DB::commit();

        } catch (\Exception $e) {
          DB::rollback();
          return var_dump($e->getMessage());die();
          return redirect('painel/projetos')->with('error','Não foi possível agendar, tente novamente!');
        }

       return redirect('painel/projetos')->with('success','Data de entrega prevista foi salva com sucesso!');
    }


    public function getCodigo(Request $request) {
      $cod = $request->all();
      $cod = Etapas::where('etapas.codigo', 'like', '#%')
                    ->get();

      if(count($cod) === 0) {
        die('ERRO');
      }

      $cod = $cod->toArray();
      $cod = json_encode($cod);
      die($cod);

    }

    public function getNome(Request $request) {
      $name = $request->all();
      $name = Etapas::where("etapas.nome",'like',"%%".$name['nome']."%%")->get();
      
      if(count($name) === 0) {
        die('ERRO');
      }

      $name = $name->toArray();
      $name = json_encode($name);
      die($name);

    }


    public function getDescricao(Request $request) {
      $description = $request->all();
      $description = Etapas::where("etapas.detalhes_item",'like',"%%".$description['descricao']."%%")->get();
      
      if(count($description) === 0) {
        die('ERRO');
      }

      $description = $description->toArray();
      $description = json_encode($description);
      die($description);

    }

}