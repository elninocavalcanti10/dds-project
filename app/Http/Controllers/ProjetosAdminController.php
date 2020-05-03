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
use App\Models\Project;
use App\Models\Stage;
use App\Models\Scheduling;
use DB;


class ProjetosAdminController extends Controller
{

/*
DB::raw(‘SELECT FLOOR(RAND() * 99999) AS random_num
FROM numbers_mst 
WHERE "random_num" NOT IN (SELECT my_number FROM numbers_mst)
LIMIT 1’)->get();

*/

	public function index(){

		$scheduling = Scheduling::select('stage.nome', 'scheduling.data_hora', 'scheduling.id_objeto', 'scheduling.excluido')
                        ->where('scheduling.excluido','=',0)
												->where('stage.status','=',0)
												->join('stage', 'stage.id', '=', 'scheduling.id_objeto')
                        ->orderby('scheduling.data_hora', 'desc')
                        ->limit(10)
												->get();

		$project = Project::select('project.id', 'project.nome', 'project.imagem')
														->where('project.excluido','=',0)
														->get();

		$stageProj = Stage::select('stage.id_categoria', 'stage.nome', 'stage.codigo', 'stage.detalhes_item', 'stage.local_encontrado', 'stage.status', 'stage.documento')
												->where('stage.excluido','=',0)
                        ->where('stage.status','=',0)
												->join('project', 'project.id', '=', 'stage.id_categoria')
												->get();

   	$stageProj = json_encode($stageProj);

		return view('projetosAdmin',compact('stageProj', 'project', 'scheduling'));
	}


/** SALVA UM NOVO OBJETO NA FERRAMENTA ACHADOS E PERDIDOS **/
	public function salvarObjeto(Request $request){
    	$dados = $request->all();

      //verifica a categoria
      if(Project::where('id','=',$dados['project'])->where('excluido','=',0)->count() == 0){
          $request->flash();
          return back()->with('error','Categoria não encontrada no sistema.'); 
      }

      
      $codigo = DB::table('stage')
                 ->selectRaw(DB::raw('FLOOR(RAND() * 9999999) as random_num'))
                 ->whereNotIn('codigo', ['random_num'])
                 ->first();

      $codigo= json_decode( json_encode($codigo), true);

      
      DB::beginTransaction();
        try {
          if(isset($dados['stageProj']) && !empty($dados['stageProj'])){
              $stageProj = json_decode($dados['stageProj'], true);

              Stage::create(['nome' => $dados['nome'],
                              'codigo' => '#'.$codigo['random_num'],
                              'detalhes_item' => $dados['detalhes'],
                              'local_encontrado' => $dados['local'],
                              'id_categoria' => $dados['project'],
                              'status' => 0]);
                  
          }
          DB::commit();

        } catch (\Exception $e) {
          DB::rollback();
          return var_dump($e->getMessage());die();
          return redirect('painel/projetos-admin')->with('error','Não foi possível salvar, tente novamente!');
        }

       return redirect('painel/projetos-admin')->with('success','item salvo com sucesso!');
  }

/** SALVA A RETIRADA DO OBJETO **/
  public function salvarRetirada(Request $request){
      $dados = $request->all();
      //dd($dados);
      
      DB::beginTransaction();
        try {
          if(isset($dados['stageProj']) && !empty($dados['stageProj'])){
              $stageProj = json_decode($dados['stageProj'], true);

                Stage::where('excluido','=',0)
                       ->where('stage.codigo','=',$dados['stageProj'])
                       ->update(['data_hora_retirada' => $dados['btn-agendar'],
                                 'nome_retirada' => $dados['nome-retirada'],
                                 'documento' => $dados['documento'],
                                 'stage.status' => 1]);
          }
          DB::commit();

        } catch (\Exception $e) {
          DB::rollback();
          return var_dump($e->getMessage());die();
          return redirect('painel/projetos-admin')->with('error','Não foi possível salvar a retirada, tente novamente!');
        }

       return redirect('painel/projetos-admin')->with('success','Objeto retirado com sucesso!');
  }  

/** PESQUISA POR CODIGO **/
    public function getCodigo(Request $request) {
      $cod = $request->all();
      $cod = Stage::where('stage.codigo', 'like', '#%')
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
      $name = Stage::where("stage.nome",'like',"%%".$name['nome']."%%")->get();
      
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
      $description = Stage::where("stage.detalhes_item",'like',"%%".$description['descricao']."%%")->get();
      
      if(count($description) === 0) {
        die('ERRO');
      }

      $description = $description->toArray();
      $description = json_encode($description);
      die($description);

    }

}
