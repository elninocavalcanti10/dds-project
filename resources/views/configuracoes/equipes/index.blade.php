@extends('layouts.app')

@section('retorna')
<a href="/painel/configuracoes">
    <button type="button" class="btn btn-warning">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
    </button>
</a> 
@endsection

@section('content')
<div class="container shadow p-3 mb-5 bg-white rounded" style="background-color: #fff; border-radius: 20px;">
        @if(session('error'))
        <div class="row errorBalloon">
          <div class="col-12" style="position: relative; height: 0px;">
            <div class="flash-ballon error-ballon">
              <div class="row">
                <div class="col-12">
                  <button type="button" style="float: right; color: #ac4a45; background-color: transparent; border: none; border-radius: 5px;" onclick="closeError();">
                    <i class="fa fa-times" aria-hidden="true"></i>
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  {!! session('error') !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif
      @if(session('success'))
        <div class="row errorBalloon">
          <div class="col-12" style="position: relative; height: 0px; z-index: 10;">
            <div class="flash-ballon success-ballon">
              <div class="row">
                <div class="col-12">
                  <button type="button" style="float: right; color: #537952; background-color: transparent; border: none; border-radius: 5px;" onclick="closeError();">
                    <i class="fa fa-times" aria-hidden="true"></i>
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  {!! session('success') !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif
  
  <div class="form-row">
    <div class="form-group col-md-12 justify-content-center">
      <h2 style="font-weight: bold;">Cadastre uma nova Equipe</h2>
    </div>
  </div>
  <form class="cadastro-form" id="form" action="{{url('painel/configuracoes/equipe_salvar')}}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="equipe" value="{{ '[]' }}" />
    <div class="form-row justify-content-center">
      <div class="form-group col-md-4">
         <label>Nome da Equipe:</label>
        <input type="text" name="nome-equipe" class="form-control">
      </div>
      <div class="form-group col-md-4">
         <label>Lev. de Requisitos:</label>
          <select name="requisitos" id="requisitos" name="requisitos" class="form-control" required>
            <option value="">SELECIONAR</option>
            @foreach($eq_requisitos as $req)
              <option value="{{$req->id}}" <?php if(old('requisitos') == $req->id){echo 'selected=selected';}?> >
                {{$req->nome}}
              </option>
            @endforeach
          </select>
      </div>
          <div class="form-group col-md-4">
         <label>Projeto:</label>
          <select name="projetos" id="projetos" name="projetos" class="form-control" required>
            <option value="">SELECIONAR</option>
            @foreach($eq_projeto as $proj)
              <option value="{{$proj->id}}" <?php if(old('projetos') == $proj->id){echo 'selected=selected';}?> >
                {{$proj->nome}}
              </option>
            @endforeach
          </select>
      </div>
    </div>

    <div class="form-row justify-content-center">
      <div class="form-group col-md-4">
         <label>Implementação:</label>
          <select name="implementacao" id="implementacao" name="implementacao" class="form-control" required>
            <option value="">SELECIONAR</option>
            @foreach($eq_implementacao as $implem)
              <option value="{{$implem->id}}" <?php if(old('implementacao') == $implem->id){echo 'selected=selected';}?> >
                {{$implem->nome}}
              </option>
            @endforeach
          </select>
      </div>
      <div class="form-group col-md-4">
         <label>Teste:</label>
          <select name="teste" id="teste" name="teste" class="form-control" required>
            <option value="">SELECIONAR</option>
            @foreach($eq_teste as $test)
              <option value="{{$test->id}}" <?php if(old('teste') == $test->id){echo 'selected=selected';}?> >
                {{$test->nome}}
              </option>
            @endforeach
          </select>
      </div>
      <div class="form-group col-md-4">
         <label>Gerente de Projeto:</label>
          <select name="ger-projetos" id="ger-projetos" name="ger-projetos" class="form-control" required>
            <option value="">SELECIONAR</option>
            @foreach($eq_ger_projeto as $ger_proj)
              <option value="{{$ger_proj->id}}" <?php if(old('ger-projetos') == $ger_proj->id){echo 'selected=selected';}?> >
                {{$ger_proj->name}}
              </option>
            @endforeach
          </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12 d-flex justify-content-start">
        <button type="submit" class="btn btn-warning" style="font-weight: bold;">SALVAR</button>  
      </div>
    </div>
  </form>
</div>
@endsection
