<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstatisticasController extends Controller
{
    public function index()
    {
        return view('estatisticas');
    }
}
