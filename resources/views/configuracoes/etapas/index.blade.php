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
      <h2 style="font-weight: bold;">Cadastre uma nova Etapa</h2>
    </div>
  </div>
  <form class="cadastro-form" id="form" action="{{url('painel/configuracoes/etapas_salvar')}}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="etapa" value="{{ '[]' }}" />
    <div class="form-row justify-content-center">
      <div class="form-group col-md-6">
         <label>Nome da Etapa:</label>
        <input type="text" name="nome-etapa" class="form-control" required>
      </div>
      <div class="form-group col-md-6">
         <label>Definir o responsável:</label>
          <select name="resp-etapa" id="resp-etapa" name="resp-etapa" class="form-control" required>
            <option value="">SELECIONAR</option>
            @foreach($responsavel as $resp)
              <option value="{{$resp->id}}" <?php if(old('resp-etapa') == $resp->id){echo 'selected=selected';}?> >
                {{$resp->name}}
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
