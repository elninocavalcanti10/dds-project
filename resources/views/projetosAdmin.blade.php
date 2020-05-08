@extends('layouts.app')
@section('styles')
<style type="text/css">

.hide{ display: none; }
</style>
@endsection

@section('retorna')
<a href="/painel">
    <button type="button" class="btn btn-warning">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
    </button>
</a> 

@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-2 d-flex justify-content-center">
      <div class="header d-flex justify-content-center">
        <button type="button" class="btn btn-success" id="btn-time" onclick="listarAgendamento()">
          <i class="fa fa-clock-o fa-2x" aria-hidden="true"></i>
        </button>
        <button type="button" class="btn btn-success" id="btn-plus" onclick="cadastrarObjeto()">
          <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
        </button>
      </div>  
    </div>
    <div class="col-md-10 d-flex justify-content-center">
      <div class="header d-flex justify-content-center">
        <img class="achados-perdidos-img" src="{{url('image/gerencia-dds.png')}}" alt="Projetos admin">
        <h1 class="achados-perdidos-title">PROJETOS ADMIN</h1>
      </div>  
    </div>
  </div>

@endsection

@section('javascript')
<script type="text/javascript">



</script>
@endsection