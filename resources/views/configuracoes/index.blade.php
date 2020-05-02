@extends('layouts.app')

@section('retorna')
<a href="/painel">
    <button type="button" class="btn btn-warning">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
    </button>
</a> 
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">

      <a href="{{url('painel/configuracoes/usuarios')}}" class="content-cards">
        <div class="content-cards-img">
          <img class="content-img" src="{{url('image/vagas-validar.png')}}" alt="atualizar banco">
        </div>
        <div class="content-cards-text" style="padding: 10px 0;">
          USUÁRIOS
        </div>
      </a>

      <a href="{{url('painel/configuracoes/sites')}}" class="content-cards">
        <div class="content-cards-img">
          <img class="content-img" src="{{url('image/treinamento.png')}}" alt="atualizar banco">
        </div>
        <div class="content-cards-text" style="padding: 10px 0;">
          SITES
        </div>
      </a>

      <a href="{{url('painel/configuracoes/etapas')}}" class="content-cards">
        <div class="content-cards-img">
          <img class="content-img" src="{{url('image/acao-admin.png')}}" alt="atualizar banco">
        </div>
        <div class="content-cards-text" style="padding: 10px 0;">
          ETAPAS
        </div>
      </a>

      <a href="{{url('painel/configuracoes/equipes')}}" class="content-cards">
        <div class="content-cards-img">
          <img class="content-img" src="{{url('image/acao-clima.png')}}" alt="atualizar banco">
        </div>
        <div class="content-cards-text" style="padding: 10px 0;">
          EQUIPES
        </div>
      </a>
                  
      <a href="{{url('painel/configuracoes/projetos')}}" class="content-cards">
        <div class="content-cards-img">
          <img class="content-img" src="{{url('image/assinaturas.png')}}" alt="atualizar banco">
        </div>
        <div class="content-cards-text" style="padding: 10px 0;">
          PROJETOS
        </div>
      </a>
      
      <a href="{{url('painel/configuracoes/ling_ferramentas')}}" class="content-cards">
        <div class="content-cards-img">
          <img class="content-img" src="{{url('image/treinamento-relatorio.png')}}" alt="configuracoes">
        </div>
        <div class="content-cards-text" style="padding: 10px 0;">
          LINGUAGENS E FERRAMENTAS
        </div>
      </a>    
    </div>
  </div>
</div>
@endsection
