@extends('layouts.app')

@section('retorna')
<a href="/painel/configuracoes">
    <button type="button" class="btn btn-warning">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
    </button>
</a> 
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>Nome:</th>
            <th>Etapas:</th>
            <th>Ferramentas:</th>
            <th>Site:</th>
          </tr>
        </thead>
        <tbody>
          @foreach($projetos as $proj)
          <tr>
            <td>{{ $proj->nome }}</td>
            <td>{{ $proj->id_etapas }}</td>
            <td>{{ $proj->id_equipe }}</td>
            <td>{{ $proj->id_ferramenta }}</td>
            <td>{{ $proj->id_site }}</td>
          </tr>
          @endforeach
        </tbody>        
      </table>            
    </div>
  </div>
</div>
@endsection
