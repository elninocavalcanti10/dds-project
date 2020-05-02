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
            <th>Ativado:</th>
          </tr>
        </thead>
        <tbody>
          @foreach($ferramentas as $f)
          <tr>
            <td>{{ $f->nome }}</td>
            <td>{{ $f->ativado }}</td>
          </tr>
          @endforeach
        </tbody>        
      </table>            
    </div>
  </div>
</div>
@endsection
