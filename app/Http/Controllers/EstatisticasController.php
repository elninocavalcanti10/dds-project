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

class EstatisticasController extends Controller
{
    public function index() {
      $projeto = Projeto::with('etapas', 'user')
      									->where('projeto.excluido', '=', 0)
      									->where('projeto.terminou', '=', 1)
      									->get();
      // dd($projeto);
      return view('estatisticas', compact('projeto'));
    }
}
