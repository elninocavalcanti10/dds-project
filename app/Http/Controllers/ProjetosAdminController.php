<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjetosAdminController extends Controller
{
    public function index()
    {
        return view('projetosAdmin');
    }
}
