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
use App\Http\Project;
use App\Http\Stage;
use App\Http\Scheduling;
use DB;



class ProjetosController extends Controller
{

	public function index(){

		return view('projetos');
	}




	public function salvar(Request $request){
    	$dados = $request->all();
    	dd($dados);
      
    	DB::beginTransaction();
        try {

        	DB::commit();

        } catch (\Exception $e) {
          DB::rollback();
        	return var_dump($e->getMessage());die();
          return redirect('painel/projetos')->with('error','Não foi possível agendar, tente novamente!');
        }

       return redirect('painel/projetos')->with('success','Agendado com sucesso!');
    }

}