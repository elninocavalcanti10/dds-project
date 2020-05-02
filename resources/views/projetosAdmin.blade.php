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
            <div class="card">
                <div class="card-header d-flex justify-content-center header">
                    <h1 class="title-home">Projetos Painel</h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="/painel/projetos">
                                    <button type="button" id="btn-icon" class="btn btn-warning">
                                    <i id="icon-home" class="fa fa-list-alt" aria-hidden="true"></i> <br> <br>
                                        <span id="name-icon">PROJETOS A</span>
                                    </button>
                                </a>          
                            </div>
                            <div class="col-md-3">
                                <a href="/painel/projetos">
                                    <button type="button" id="btn-icon" class="btn btn-warning">
                                    <i id="icon-home" class="fa fa-list-alt" aria-hidden="true"></i> <br> <br>
                                        <span id="name-icon">PROJETOS B</span>
                                    </button>
                                </a>          
                            </div>
                            <div class="col-md-3">
                                <a href="/painel/projetos">
                                    <button type="button" id="btn-icon" class="btn btn-warning">
                                    <i id="icon-home" class="fa fa-list-alt" aria-hidden="true"></i> <br> <br>
                                        <span id="name-icon">PROJETOS C</span>
                                    </button>
                                </a>          
                            </div>
                            <div class="col-md-3">
                                <a href="/painel/projetos">
                                    <button type="button" id="btn-icon" class="btn btn-warning">
                                    <i id="icon-home" class="fa fa-list-alt" aria-hidden="true"></i> <br> <br>
                                        <span id="name-icon">PROJETOS D</span>
                                    </button>
                                </a>          
                            </div>
                        </div>
                    </div>

                    <!-- Pesquisas -->
                    <div class="container">
                        <div class="row row-title-pesquisa justify-content-center">
                            <h4 class="pesquisa-nome">Procure projetos por:</h4>
                        </div>
                        <div class="row row-pesquisa">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nome do membro">
                                    <div class="input-group-append">
                                        <button class="btn btn-warning" type="button">
                                            <i class="fa fa-search" id="icon-search"></i>
                                        </button>
                                    </div>
                                </div>         
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nome da equipe">
                                    <div class="input-group-append">
                                        <button class="btn btn-warning" type="button">
                                            <i class="fa fa-search" id="icon-search"></i>
                                        </button>
                                    </div>
                                </div>         
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Estado ou Cidade">
                                    <div class="input-group-append">
                                        <button class="btn btn-warning" type="button">
                                            <i class="fa fa-search" id="icon-search"></i>
                                        </button>
                                    </div>
                                </div>         
                            </div>
                        </div>
                    </div>

                    <!-- Etapas -->
                    <div class="container">
                        <div class="row row-etapas">
                            <div class="col-md-4">
                                <button type="button" id="btn-etapas-checklist" class="btn btn-light">
                                    <i class="fa fa-star"></i> <br>
                                    <span>CHECKLIST</span>
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" id="btn-etapas" class="btn btn-light">
                                    <i class="fa fa-star"></i> <br>
                                    <span>LEV. REQUISITOS</span>
                                </button>                                      
                            </div>
                            <div class="col-md-2">
                                <button type="button" id="btn-etapas" class="btn btn-light">
                                    <i class="fa fa-star"></i> <br>
                                    <span>PROJETO</span>
                                </button>        
                            </div>
                            <div class="col-md-2">
                                <button type="button" id="btn-etapas" class="btn btn-light ">
                                    <i class="fa fa-star"></i> <br>
                                    <span>IMPLEMENTAÇÃO</span>
                                </button>         
                            </div>
                            <div class="col-md-2">
                                <button type="button" id="btn-etapas" class="btn btn-light">
                                    <i class="fa fa-star"></i> <br>
                                    <span>TESTE</span>
                                </button>      
                            </div>
                        </div>
                    </div>

                    <!-- Detalhes da etapa e Salvar a data de previsão de término -->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-center">
                                        <h4>Projetos A Visão 3</h4>
                                    </div>

                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                        
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div type="button" style="width:100%;" class="btn btn-warning">
                                                        <i id="icon-home" class="fa fa-list-alt" aria-hidden="true"></i> <br> <br>
                                                        <span id="name-icon">PROJETOS A</span>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>    
                                    </div>    
                                </div>    
                            </div>    
                        </div>    
                    </div>
                    
                    <!-- Detalhes da etapa e Salvar a data de previsão de término -->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-center">
                                        <h4>Projetos A Visão 4</h4>
                                    </div>

                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                        
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div type="button" style="width:100%;" class="btn btn-warning">
                                                        <i id="icon-home" class="fa fa-list-alt" aria-hidden="true"></i> <br> <br>
                                                        <span id="name-icon">PROJETOS A</span>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>    
                                    </div>    
                                </div>    
                            </div>    
                        </div>    
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
