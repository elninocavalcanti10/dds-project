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
    <div class="col-md-12 d-flex justify-content-center">
      <div class="header d-flex justify-content-center">
        <img class="achados-perdidos-img" src="{{url('image/gerencia-dds.png')}}" alt="PROJETOS">
        <h1 class="achados-perdidos-title">PROJETOS</h1>
      </div>  
    </div>
  </div>

</div>
@endsection

@section('javascript')
<script type="text/javascript">


</script>
@endsection