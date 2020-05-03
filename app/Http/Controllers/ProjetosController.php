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



class ProjetosController extends Controller
{

	public function index(){

		$scheduling = Scheduling::all();
		$scheduling = json_encode($scheduling);

		$project = Project::where('project.excluido','=',0)
											->get();

		$stage = Stage::select('stage.id_categoria', 'stage.nome', 'stage.codigo', 'stage.detalhes_item', 'stage.local_encontrado', 'stage.status', 'stage.documento')
												->where('stage.excluido','=',0)
                        ->where('stage.status','=',0)
												->join('project', 'project.id', '=', 'stage.id_categoria')
												->get();

   	$stage = json_encode($stage);

		return view('projetos',compact('stage', 'project', 'scheduling'));
	}




	public function salvar(Request $request){
    	$dados = $request->all();
      
    	DB::beginTransaction();
        try {
          if(isset($dados['scheduling']) && !empty($dados['scheduling'])){
              $scheduling = json_decode($dados['scheduling'], true);

              $dados1 = Stage::select('id')
                              ->where('excluido','=',0)
                              ->where('stage.codigo','=',$dados['scheduling'])
                              ->first();

              if(count($dados1) === 1) {
                Scheduling::create(['id_objeto' => $dados1->id,'data_hora' => $dados['btn-agendar']]);
              } else{die('Não foi possível agendar, tente novamente!');}                   
                  
          }
        	DB::commit();

        } catch (\Exception $e) {
          DB::rollback();
        	return var_dump($e->getMessage());die();
          return redirect('painel/projetos')->with('error','Não foi possível agendar, tente novamente!');
        }

       return redirect('painel/projetos')->with('success','Agendado com sucesso!');
    }


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