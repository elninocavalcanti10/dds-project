@extends('layouts.app')
@section('styles')
<style type="text/css">
.achados-perdidos-title{ margin-left:15px; font-family: arial black; }
.todo-icone, .header { width:100%; height:130px; padding:10px; }
.achados-perdidos-img, #btn-time, #btn-plus{ max-height: 60px; max-width: 180px; margin: 0 10px; }
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
	<form action="{{url('painel/configuracoes/criar_projeto')}}" method="POST">
		{{ csrf_field() }}
	  <div class="row">
		  <div class="col-md-12 d-flex justify-content-center">
	      <div class="header d-flex justify-content-center">
	        <img class="achados-perdidos-img" src="{{url('image/gerencia-dds.png')}}" alt="achados e perdidos admin">
	        <h1 class="achados-perdidos-title">CRIAR PROJETOS</h1>
	      </div>  
    	</div>
    </div>
	  <div class="row">
			<div class="col-md-6">
				<label>Nome do Projeto</label>
				<input type="text" name="nome" id="nome" class="form-control">
			</div>
			<div class="col-md-6">
				<button class="btn btn-info" style="bottom: 0;position: absolute;">Criar</button>
			</div>
		</div>
	</form>
</div>
@endsection

@section('javascript')
<script type="text/javascript">

</script>
@endsection	