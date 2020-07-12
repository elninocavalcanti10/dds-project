@extends('layouts.app')
@section('styles')
<style type="text/css">
.message{ border-radius: 10px; border: 4px solid red; padding: 20px; }
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
	  <div class="col-md-12 d-flex justify-content-center">
      <div class="header d-flex justify-content-center">
        <img class="achados-perdidos-img" src="{{url('image/gerencia-dds.png')}}" alt="achados e perdidos admin">
        <h1 class="achados-perdidos-title">RELATÓRIOS DE PROJETOS</h1>
      </div>  
  	</div>
  </div>
	@foreach($projeto as $key => $p)
	<div class="card" style="margin: 50px 0">
		<h5 class="card-header"> {{ $p->nome }} </h5>
	  <div class="card-body">
		  <div class="row">
				<div class="col-md-6" style="padding: 20px;">
		  		<label><strong>Gerente de Projeto:</strong></label>
		  		<span> {{ $p->user->name }} </span><br>
		  		<label><strong>Membros:</strong></label>
          @foreach($usuarios as $usuario)
            @foreach($agendamentos as $agendamento)
              @if($usuario->id == $agendamento->id_usuario)
      		  		<span>{{$usuario->name}} -</span>
              @endif
            @endforeach
          @endforeach
		  	</div>
		  	<div class="col-md-6" style="padding: 20px;">
		  		<label><strong>Linguagens e Ferramentas:</strong></label><br>
		  	@foreach($p->etapas as $etp)	
		  		<span> 
		  			<i class="fa fa-square"></i>
		  			{{ $etp->ling_ferramentas }} 
		  		</span><br>
		  	@endforeach
		  	</div>
		  </div>
		  <div class="row">
				<div class="col-md-6">
			    <table class="table table-striped">
				    <thead>
				      <tr>
				        <th>ETAPAS</th>
				        <th>DATA</th>
				      </tr>
				    </thead>
				    <tbody>
							@foreach($p->etapas as $etp)
					      <tr>
					        <td> {{ $etp->nome }} </td>
					        <td> 02 dias atasado </td>
					      </tr>
				  		@endforeach
				    </tbody>
				  </table>
			  </div>
				<div class="col-md-6 d-flex justify-content-center">
					<div class="message">
						<h4>Projeto entregue com:</h4><br>
						<p style="text-align: center;">06 dias de atraso.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection
