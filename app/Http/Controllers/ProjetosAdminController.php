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


class ProjetosAdminController extends Controller
{

	public function index(){
    $idUser = Auth::user()->id;
    $agenda = Agendamento::select('etapas.nome', 'agendamento.data_hora', 'agendamento.id_etapa')
                        ->where('agendamento.excluido','=',0)
                        ->where('etapas.status','=',0)
                        ->join('etapas', 'etapas.id', '=', 'agendamento.id_etapa')
                        ->orderby('agendamento.data_hora', 'desc')
                        ->limit(20)
                        ->get();

    $projetos = Projeto::select('projeto.id', 'projeto.nome', 'projeto.imagem', 'projeto.id_user')
                        ->where('projeto.excluido','=', 0)
                        ->where('projeto.id_user','=', $idUser)
                        ->whereNull('projeto.terminou')
                        ->get();

    $etapaProj = Etapas::select('etapas.id_projeto', 'etapas.nome', 'etapas.codigo', 'etapas.detalhes_item', 'etapas.local', 'etapas.status', 'etapas.nome_gestor', 'etapas.ling_ferramentas')
                        ->where('etapas.excluido','=',0)
                        ->where('etapas.status','=',0)
                        ->join('projeto', 'projeto.id', '=', 'etapas.id_projeto')
                        ->get();

    $etapaProj = json_encode($etapaProj);

    return view('projetosAdmin',compact('etapaProj', 'projetos', 'agenda', 'idUser'));
	}


/** SALVA UMA NOVA ETAPA NA FERRAMENTA **/
	public function salvarEtapa(Request $request){
    $dados = $request->all();
    $idUser = Auth::user()->id;

      $codigo = DB::table('etapas')
                 ->selectRaw(DB::raw('FLOOR(RANDOM() * 9999999) as random_num'))
                 ->whereNotIn('codigo', ['random_num'])
                 ->first();

      $codigo= json_decode( json_encode($codigo), true);
    // dd($dados, $idUser, $codigo);
      
      DB::beginTransaction();
        try {
          if(isset($dados['objetoCat']) && !empty($dados['objetoCat'])){
              $objetoCat = json_decode($dados['objetoCat'], true);

              Etapas::create(['nome' => $dados['nome'],
                              'codigo' => '#'.$codigo['random_num'],
                              'detalhes_item' => $dados['detalhes'],
                              'local' => $dados['local'],
                              'id_projeto' => $dados['projetos'],
                              'status' => 0,
                              'nome_gestor' => $dados['gestor'] ,
                              'ling_ferramentas' => $dados['ferramentas'],
                              'id_user' => $idUser,
                            ]);
                  
          }
          DB::commit();

        } catch (\Exception $e) {
          DB::rollback();
          return var_dump($e->getMessage());die();
          return redirect('painel/projetos-admin')->with('error','Não foi possível salvar, tente novamente!');
        }

       return redirect('painel/projetos-admin')->with('success','Etapa salva com sucesso!');
  }

  /** SALVA A CONCLUSÃO DA ETAPA **/
  public function salvarConclusao(Request $request){
      $dados = $request->all();
      // dd($dados);
      
      DB::beginTransaction();
        try {
          if(isset($dados['objetoCat']) && !empty($dados['objetoCat'])){
              $objetoCat = json_decode($dados['objetoCat'], true);

                Etapas::where('excluido','=',0)
                      ->where('etapas.codigo','=',$dados['objetoCat'])
                      ->update(['etapas.data_termino' => $dados['btn-agendar'],
                                 'etapas.status' => 1
                               ]);
          }
          DB::commit();

        } catch (\Exception $e) {
          DB::rollback();
          return var_dump($e->getMessage());die();
          return redirect('painel/projetos-admin')->with('error','Não foi possível salvar, tente novamente!');
        }

       return redirect('painel/projetos-admin')->with('success','Etapa finalizada com sucesso!');
  }

  public function finalizarProjeto(Request $request) {
     $dados = $request->all();
      // dd($dados);
      DB::beginTransaction();
        try {
                Projeto::where('id','=',$dados['projeto-exclui'])
                        ->update(['terminou' => 1,
                               ]);
          DB::commit();

        } catch (\Exception $e) {
          DB::rollback();
          return var_dump($e->getMessage());die();
          return redirect('painel/projetos-admin')->with('error','Não foi possível salvar, tente novamente!');
        }

       return redirect('painel/projetos-admin')->with('success','Projeto finalizado com sucesso!'); 
  }

  /** PESQUISA POR CODIGO **/
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

/** PESQUISA POR NOME **/
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


/** PESQUISA POR DESCRIÇÃO **/
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
