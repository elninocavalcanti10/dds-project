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

		return view('projetosAdmin');
	}


/** SALVA UM NOVO OBJETO NA FERRAMENTA ACHADOS E PERDIDOS **/
	public function salvarEtapa(Request $request){
    	$dados = $request->all();
    	dd($dados);

      
      DB::beginTransaction();
        try {

          DB::commit();

        } catch (\Exception $e) {
          DB::rollback();
          return var_dump($e->getMessage());die();
          return redirect('painel/projetos-admin')->with('error','Não foi possível salvar, tente novamente!');
        }

       return redirect('painel/projetos-admin')->with('success','item salvo com sucesso!');
  }


}
