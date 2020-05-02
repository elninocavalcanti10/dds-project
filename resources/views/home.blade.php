@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-2">
      <div class="card">
        <div class="sidenav">
          <a href="{{ url('/') }}" style="border-bottom: solid 1px rgba(0,0,0,.125);">
            <i class="fa fa-tachometer"></i>
            Dashboard
          </a>
          <a href="{{ url('/painel/projetos') }}">
            <i class="fa fa-list-alt"></i>
            Projetos Painel
          </a>
          @if (Auth::user()->permissoes === 7)
          <a href="{{ url('/painel/projetos-admin') }}">
            <i class="fa fa-id-card"></i>
            Projetos Admin
          </a>
          <a href="{{ url('/painel/configuracoes') }}">
            <i class="fa fa-cogs"></i>
            Configurações
          </a>
          @endif
          <a href="{{ url('/painel/estatisticas') }}">
            <i class="fa fa-bar-chart"></i>
            Estatísticas
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <div class=container>
            <div class=row>
              <div class=col-md-3>
                <a href="{{ url('/painel/projetos') }}">
                  <button type="button" id="btn-icon" class="btn btn-warning">
                    <i class="fa fa-list-alt fa-3x" style="color: #fff;"></i> <br> <br>
                    <span id="name-icon">PROJETOS PAINEL</span>
                  </button>
                  </a>          
              </div>
              @if (Auth::user()->permissoes === 7)
              <div class=col-md-3>
                <a href="{{ url('/painel/projetos-admin') }}">
                  <button type="button" id="btn-icon" class="btn btn-success">
                    <i class="fa fa-id-card fa-3x"></i> <br> <br>
                    <span id="name-icon">PROJETOS ADMIN</span>
                  </button>
                </a>    
              </div>
              <div class=col-md-3>
                <a href="{{ url('/painel/configuracoes') }}">
                  <button type="button" id="btn-icon" class="btn btn-primary">
                    <i class="fa fa-cogs fa-3x"></i> <br> <br>
                    <span id="name-icon">CONFIGURAÇÕES</span>
                  </button>                    
                </a>    
              </div>
              @endif
              <div class="col-md-3 estatisticas">
                <a href="{{ url('/painel/estatisticas') }}">
                  <button type="button" id="btn-icon" class="btn btn-danger">
                    <i class="fa fa-bar-chart fa-3x"></i> <br> <br>
                    <span id="name-icon">ESTATÍSTICAS</span>
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
