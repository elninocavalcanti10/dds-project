@extends('layouts.app')

@section('retorna')
<a href="/painel/configuracoes">
    <button type="button" class="btn btn-warning">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
    </button>
</a> 
@endsection

@section('content')
<div class="container todos-site">
  <div class="row justify-content-start" style="margin: 10px 0">
    <button type="button" class="btn btn-success" onclick="criarSite()">
      <i class="fa fa-plus"> Novo Site</i>
    </button>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>Nome:</th>
            <th>Estado:</th>
            <th>Cidade:</th>
          </tr>
        </thead>
        <tbody>
          @foreach($sites as $s)
          <tr>
            <td>{{ $s->nome }}</td>
            <td>{{ $s->estado }}</td>
            <td>{{ $s->cidade }}</td>
          </tr>
          @endforeach
        </tbody>        
      </table>            
    </div>
  </div>
</div>

<div class="container criar-site hide">
  <form id="f-site" class="f-site" action="{{url('painel/configuracoes/sites_salvar')}}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="site" value="{{ '[]' }}" />
    <div class="row justify-content-end" style="margin: 10px 0">
      <button type="button" class="btn btn-danger" onclick="fechaCriarSite()">
        <i class="fa fa-close"></i>
      </button>
    </div>
    <div class="row justify-content-center">
      <div class="form-group col-md-4">
        <label>Nome:</label>
        <input type="text" name="nome-site" class="form-control" placeholder="Nome do site">
      </div>
      <div class="form-group col-md-4">
        <label>Estado:</label>
        <select id="estado" name="estado" class="form-control" onchange="getCidade()" required>
          <option value="">SELECIONAR</option>
          @foreach($estado as $uf)
            <option value="{{$uf->id}}" <?php if(old('estado') == $uf->id){echo 'selected=selected';}?> >
              {{$uf->sigla}}
            </option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-4">
        <label>Cidade:</label>
        <select id="cidade" name="cidade" class="form-control" required>
          

        </select>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-12 d-flex justify-content-start">
        <button class="btn btn-warning">Salvar</button>
      </div>
    </div>
  </form>
</div>
@endsection
