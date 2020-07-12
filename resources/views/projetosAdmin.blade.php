@extends('layouts.app')
@section('styles')
<style type="text/css">
.achados-perdidos-img, #btn-time, #btn-plus{ max-height: 60px; max-width: 180px; margin: 0 10px; }
.achados-perdidos-title{ margin-left:15px; font-family: arial black; }
.icones{  }
.todo-icone, .header { width:100%; height:130px; padding:10px; }
.todo-icone-ativo{ background: #fff; border: 3px solid #44d9e6; border-radius: 20px; }
.todo-item { width:100%; display: inline-block; background-color: #fff; padding: 6px; border-radius: 16px; border: 3px solid #44d9e6; }
.bloco-agendar{ background-color: #fff; padding: 6px; border-radius: 35px; border: 3px solid #44d9e6; }
.todo-pesquisa{ width:100%; display: inline-block; background-color: #fff; padding: 6px; border-radius: 16px; border: 3px solid #44d9e6; }
.icone-img{ width:100%; height:100%;border: 1px solid; border-radius: 10px; }
.icone-celular-img, #contentPage > div > div.row.icones > div:nth-child(3) > div > div:nth-child(1) > div > img{ width:40px; height:67px; margin: 0 auto; display: block; }
.texto-icone { font-size: 11px; margin-top: 10px; }
.row-pesquisa, .row-itens { margin: 30px 0px; }
.row-agendar{ margin: 10px 0px; position: absolute; z-index: 10; top: 580px;width: 85%; }
.bloco-de-texto{ background-image: url("../../../image/lista.jpeg"); min-height: 260px; width: 100%; border-radius: 20px; }
.conteudo-agendamento{ padding: 20px; }
.conteudo-bloco-texto{ padding: 0px 0px 0px 0px; }
.form-bloco-texto{ padding-left: 100px; }
.input-agendar{ width: 100%; border: 3px solid #44d9e6; border-radius: 20px; padding-left: 2px; }
#btn-agendar{ padding: 7px; font-weight: bold; }
.hora-agendar{ padding: 0px; }
#hora, #data{ padding-left: 15px; }
.obj-itens{ margin: 5px 0px; }
#btn-fechar-bloco-texto{ float: right; }

.toda-lista, .todo-cad-obj{ width:100%; display: inline-block; background-color: #fff; padding: 6px; border-radius: 16px; border: 3px solid #44d9e6; }
#form-salvar{  }

.img-button-filtro{ height: 28px; }
.img-lista{ height: 28px; right: 25px; bottom: 5px; position: absolute; }
.img-lista-bloco-agendar{ height: 28px; left: 25px; top: 10px; position: absolute; }
.button-filtro{ width: 28px; height: 28px; padding: 0; border: 0; background-color: #fff; }
.input-filtro{ width: 83%; padding: 2px; border: none; vertical-align: top; outline-color: #44d9e6; color:  #44d9e6; text-align: center; }
.envolucro-filtro{ display: inline-block; background-color: #fff; padding: 6px; border-radius: 16px; border: 3px solid #44d9e6; }

::-webkit-input-placeholder {color: black;} :-moz-placeholder {color: black;} ::-moz-placeholder {color: black;}:-ms-input-placeholder {color: black;}

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
        <button type="button" class="btn btn-danger" id="btn-plus" onclick="finalizarProjeto()">
          <i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>
        </button>
      </div>  
    </div>
    <div class="col-md-10 d-flex justify-content-center">
      <div class="header d-flex justify-content-center">
        <img class="achados-perdidos-img" src="{{url('image/gerencia-dds.png')}}" alt="achados e perdidos admin">
        <h1 class="achados-perdidos-title">GERENCIA DDS - ADMIN</h1>
      </div>  
    </div>
  </div>
  <div class="row icones">
    <!--
      Trecho que insere os ícones com as projetos
    -->
  </div>

  <div class="row row-pesquisa">
    <div class="col-md-4">
      <div class="todo-pesquisa d-flex justify-content-center">
        <input type="text" class="input-filtro" placeholder="Nome" id="nome" name="nome" required>
        <button class="button-filtro" type="submit" id="btn-filter-nome" onclick="getNome()">
          <img class="img-button-filtro" src="{{url('image/question-1.png')}}">
        </button>
      </div>
    </div>
    <div class="col-md-4">
      <div class="todo-pesquisa d-flex justify-content-center">
        <input type="text" class="input-filtro" placeholder="Descrição" id="descricao" name="descricao" required>
        <button class="button-filtro" type="submit" id="btn-filter-descricao" onclick="getDescricao()">
          <img class="img-button-filtro" src="{{url('image/question-1.png')}}">
        </button>
      </div>
    </div>
    <div class="col-md-4">
      <div class="todo-pesquisa d-flex justify-content-center">
        <input type="text" class="input-filtro" placeholder="#Código" id="codigo" name="codigo" required>
        <button class="button-filtro" type="submit" id="btn-filter-cod" onclick="getCodigo()">
          <img class="img-button-filtro" src="{{url('image/question-1.png')}}">
        </button>
      </div>
    </div>
  </div>

  <div class="row row-lista-agenda hide">
    <div class="col-md-12">
      <div class="toda-lista">
        <button type="button" class="btn btn-danger" id="btn-fechar-bloco-texto" onclick="closeBlocoTexto()">
          <i class="fa fa-times" aria-hidden="true">
          </i>
        </button>
        <table class="table table-hover table-striped">
          <thead style="background:#44d9e6; color:#fff">
            <tr>
              <th scope="col">ETAPA</th>
              <th scope="col">DATA</th>
              <th scope="col">HORA</th>
            </tr>
          </thead>
          <tbody>
            @foreach($agenda as $ag)
            <tr>
              <td>{{$ag->nome}}</td>
              <td>{{ date( 'd/m/Y' , strtotime($ag->data_hora)) }}</td>
              <td>{{ date( 'h:i' , strtotime($ag->data_hora)) }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>    
  </div>

  <div class="row row-cadastrar-objeto hide">
    <div class="col-md-12">
      <div class="todo-cad-obj">
        <div class="container">
          <div class="row">
            <div class="col-md-11 d-flex justify-content-left">
              <h3 style="font-family: arial black;">CADASTRAR ETAPA</h3>
            </div>
            <div class="col-md-1">
              <button type="button" class="btn btn-danger" id="btn-fechar-bloco-texto" onclick="closeBlocoTexto()">
                <i class="fa fa-times" aria-hidden="true">
                </i>
              </button>
            </div>
          </div>
          <form id="form-salvar" action="{{url('painel/projetos-admin/salvar_etapa')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="objetoCat" value="{{$etapaProj or '[]'}}">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="Nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
              </div>
              <div class="form-group col-md-6">
                <label for="detalhes">Detalhes:</label>
                <textarea class="form-control" rows="2" id="detalhes" name="detalhes" placeholder="Detalhes do item:"></textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="local">Local:</label>
                <textarea class="form-control" rows="2" id="local" name="local" placeholder="Local:"></textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="projetos">Projeto</label>
                <select id="projetos" name="projetos" class="form-control">
                  <option selected>Escolha...</option>
                  @foreach($projetos as $proj)
                    <option value="{{$proj->id}}" <?php if(old('projetos') == $proj->id){echo 'selected=selected';}?> >
                      {{$proj->nome}}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="ferramentas">Linguagens e Ferramentas:</label>
                <textarea class="form-control" rows="2" id="ferramentas" name="ferramentas" placeholder="Linguagens e Ferramentas:"></textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="gestor">Nome do Gestor:</label>
                <input type="text" class="form-control" id="gestor" name="gestor" placeholder="Nome do Gestor">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-success" style="font-family: arial black;">SALVAR</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>    
  </div>

  <div class="row row-itens hide">
  <!--
    Trecho que será preenchido pela função insere itens 
  -->   
  </div>

  <div class="row row-agendar hide">
        <!--
          Trecho que será preenchido pela função blocoTexto()
        -->
  </div>

  <div class="row row-encerrar-projeto hide" style="background-color: #fff;padding: 6px;border-radius: 16px;border: 3px solid #44d9e6;padding: 50px;">
      <div class="col-md-12">
    <form action="{{url('painel/projetos-admin/finalizar_projeto')}}" method="POST">
        {{ csrf_field() }}
        <button type="button" class="btn btn-danger" id="btn-fechar-bloco-texto" onclick="closeBlocoTexto()" style="margin: 20px 0;">
            <i class="fa fa-times" aria-hidden="true">
            </i>
        </button>
        <label style="color: red;font-weight: bold;">Escolha o Projeto Finalizado:</label>
          <select class="text-select form-control" name="projeto-exclui" id="projeto-exclui">
           <option value="">SELECIONAR</option>
           @foreach($projetos as $proj)
            <option value="{{$proj->id}}" <?php if(old('projeto-exclui') == $proj->id){echo 'selected=selected';}?> >
              {{$proj->nome}}
            </option>
          @endforeach
        </select>
        <button type="submit" class="btn btn-info" style="margin: 20px 0;">Finalizar</button>
    </form>
      </div>
  </div>


</div>
@endsection

@section('javascript')
<script type="text/javascript">

var urlGetCodigo = "{{url('/painel/get_codigo_admin')}}";
var urlGetNome = "{{url('/painel/get_nome_admin?nome')}}";
var urlGetDescricao = "{{url('/painel/get_descricao_admin?descricao')}}";

var caminho_imagem = "{{url('image/checklist.png')}}";

var etapas = {!! $etapaProj !!};
var projeto = {!! $projetos !!};
var agenda =  {!! $agenda !!};
var idUser =  {!! $idUser !!};


function listarAgendamento(){
  $('.row-lista-agenda').removeClass('hide');
  $('.row-cadastrar-objeto').addClass('hide');
  $('.row-encerrar-projeto').addClass('hide');
  $('.icones').addClass('hide');
  $('.row-pesquisa').addClass('hide');
  $('.row-itens').addClass('hide');
  $('.row-agendar').addClass('hide');
  $('.todo-icone').removeClass('todo-icone-ativo');
}

function cadastrarObjeto(){
  $('.row-cadastrar-objeto').removeClass('hide');
  $('.row-lista-agenda').addClass('hide');
  $('.row-encerrar-projeto').addClass('hide');
  $('.icones').addClass('hide');
  $('.row-pesquisa').addClass('hide');
  $('.row-itens').addClass('hide');
  $('.row-agendar').addClass('hide');
  $('.todo-icone').removeClass('todo-icone-ativo');
}

function finalizarProjeto() {
  $('.row-encerrar-projeto').removeClass('hide');
  $('.row-lista-agenda').addClass('hide');
  $('.row-cadastrar-objeto').addClass('hide');
  $('.icones').addClass('hide');
  $('.row-pesquisa').addClass('hide');
  $('.row-itens').addClass('hide');
  $('.row-agendar').addClass('hide');
  $('.todo-icone').removeClass('todo-icone-ativo');
}


function btnProjeto() {
  var txtcat;

  projeto.forEach(function(proj, index){
    if (proj.id_user == idUser) {
      var imgcat1 = '{{url("image/")}}';
      var aux = imgcat1 + '/' + proj.imagem;

      txtcat = '<div class="col-md-2">'+
                  '<div class="container">'+
                    '<div class="row">'+
                      '<div class="col-md-12 todo-icone d-flex justify-content-center" onclick="clickProjeto(this, '+index+')">'+
                        '<img class="icone-img" src="'+aux+'">'+
                      '</div>'+
                    '</div>'+
                    '<div class="row">'+
                      '<div class="col-md-12 div-texto-icone d-flex justify-content-center">'+
                        '<p class="texto-icone">'+
                          proj.nome+
                        '</p>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
               '</div>';

      $('.icones').append(txtcat);
    }
  }); 
}
$(document).ready(btnProjeto());


function clickProjeto(e, index) {

  $('.todo-icone').removeClass('todo-icone-ativo');
  $(e).addClass('todo-icone-ativo');

  $('.row-itens').empty();
  etapas.forEach(function(obj, index2){
    if(projeto[index].id === obj.id_projeto) {
      insereItens(obj, index2);
    }

  });

  $('.row-itens').removeClass('hide');
}


/*================== início - Insere Itens  ==============*/
function insereItens(obj, index) {
    var txt;
  
    txt = '<div class="col-md-4 obj-itens">'+
            '<div class="todo-item d-flex justify-content-center">'+
              '<div class="container" onclick="blocoTexto('+index+')">'+
                '<div class="row">'+
                  '<div class="col-md-12 d-flex justify-content-center">'+
                    '<h4>'+
                      obj.nome+
                    '</h4>'+
                  '</div>'+
                '</div>'+
                '<div class="row">'+
                  '<div class="col-md-12 d-flex justify-content-center">'+
                    '<span>'+
                      obj.codigo+
                    '</span>'+
                  '</div>'+
                '</div>'+
            '</div>'+
            '<img class="img-lista" src="'+caminho_imagem+'">'+
          '</div>'+
        '</div>';
    $(".row-itens").append(txt);

    $('.row-agendar').empty();
    $('.row-agendar').removeClass('hide');

}

$(document).ready(insereItens());


/*================== final - Insere Itens  =================*/


function closeBlocoTexto(){
  $('.row-agendar').addClass('hide');
  $('.row-lista-agenda').addClass('hide');
  $('.row-cadastrar-objeto').addClass('hide');
  $('.icones').removeClass('hide');
  $('.row-pesquisa').removeClass('hide');
  $('.row-encerrar-projeto').addClass('hide');
}


/*================== início - Bloco de texto  ==============*/
function blocoTexto(index) {
  var caminho_salvar = "{{url('painel/projetos-admin/salvar_conclusao')}}"

  blocotxt = 
    '<div class="col-md-12">'+
      '<div class="bloco-agendar d-flex justify-content-center">'+
        '<div class="container">'+
        '<button type="button" class="btn btn-danger" id="btn-fechar-bloco-texto" onclick="closeBlocoTexto()">'+
          '<i class="fa fa-times" aria-hidden="true">'+
          '</i>'+
        '</button>'+
          '<div class="row">'+
            '<div class="col-md-5 conteudo-agendamento hide d-flex justify-content-center">'+
              '<div class="container">'+
                '<div class="row">'+
                  '<div class="col-md-2">'+
                    '<img class="img-lista-bloco-agendar" src="'+caminho_imagem+'">'+
                  '</div>'+
                  '<div class="col-md-10">'+
                    '<div class="row">'+
                      '<div class="col-md-12">'+
                        '<h4>'+
                          etapas[index].nome+
                        '</h4>'+
                      '</div>'+
                    '</div>'+
                    '<div class="row">'+
                      '<div class="col-md-12">'+
                        '<span>'+
                          etapas[index].codigo+
                        '</span>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
                '<div class="row row-detalhes" style="margin-top:10px">'+
                  '<div class="col-md-12">'+
                    '<p style="font-size:13px; font-weight: bold; margin-bottom:0px;">Detalhes:</p>'+
                    etapas[index].detalhes_item+
                  '</div>'+
                '</div>'+
                '<div class="row row-detalhes" style="margin-top:10px">'+
                  '<div class="col-md-12">'+
                    '<p style="font-size:13px; font-weight: bold; margin-bottom:0px;">Linguagens e Ferramentas:</p>'+
                    etapas[index].ling_ferramentas+
                  '</div>'+
                '</div>'+
                '<div class="row row-detalhes" style="margin-top:10px">'+
                  '<div class="col-md-12">'+
                    '<p style="font-size:13px; font-weight: bold; margin-bottom:0px;">Local:</p>'+
                    etapas[index].local+
                  '</div>'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="col-md-7 conteudo-agendamento d-flex justify-content-center">'+
              '<div class="bloco-de-texto">'+
                '<div class="container" style="margin-top:10px; margin-left:20px;">'+
                  '<div class="row">'+
                    '<div class="col-md-12">'+
                      '<div class="conteudo-bloco-texto d-flex justify-content-center">'+
                        '<h6 style="font-family: arial black;">'+
                          'Finalizar Etapa:'+
                        '</h6>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                  '<div class="row">'+
                    '<div class="col-md-12 form-bloco-texto">'+
                      '<form action="'+caminho_salvar+'" method="POST">'+
                      '{{ csrf_field() }}'+
                      '<input type="hidden" name="objetoCat" value="'+etapas[index].codigo+'">'+
                        '<div class="form-row">'+
                          '<div class="form-group col-md-10">'+
                            '<p>'+
                              'Informe a data de término desta etapa:'+
                            '</p>'+
                          '</div>'+
                        '</div>'+
                        '<div class="form-row">'+
                          '<div class="form-group col-md-6">'+
                            '<label for="Data">'+
                              'Data:'+
                            '</label>'+
                            '<input type="date" class="input-agendar" id="data" name="data" required>'+
                          '</div>'+
                          '<div class="form-group col-md-5">'+
                            '<label for="codigo">'+
                              'Hora'+
                            '</label>'+
                            '<input type="time" class="input-agendar" id="hora" name="hora" required>'+
                          '</div>'+
                        '</div> '+
                        '<button type="submit" class="btn btn-success" id="btn-agendar" name="btn-agendar" onclick="dateTime()">'+
                          'SALVAR'+
                        '</button>'+
                      '</form>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
              '</div>'+
            '</div>'+
          '</div>'+
        '</div>'+
      '</div>'+
    '</div>';    

  $('.row-agendar').html(blocotxt);
  $('.row-agendar').removeClass('hide');

}
/*================== final - Bloco de texto  ==============*/


function dateTime() {
  //atribui a variável data o valor do input cujo id = data
  var data = document.getElementById('data').value;
  //atribui a variável hora o valor do input cujo id = hora
  var hora = document.getElementById('hora').value; 
  //concatena as duas variaveis separadas por espaço e joga no value do input cujo id = btn-agendar
  document.getElementById('btn-agendar').value=data+ " " + hora;
}

/* INICIO PESQUISA */
function getCodigo() {
var codig = $('#codigo').val();
  $.ajax({
    url: urlGetCodigo,
    success: function(cod){
      var cod_obj = JSON.parse(cod);
      $('.row-itens').empty();
      cod_obj.forEach(function(obj, index){
        if(codig === obj.codigo) {
          insereItens(obj, index);
        }

      });
      $('.todo-icone').removeClass('todo-icone-ativo');
      document.getElementById('codigo').value='';
      $('.row-itens').removeClass('hide');
    }
  });
}

function getNome() {
var name_input = $('#nome').val();
  $.ajax({
    url: urlGetNome,
    success: function(name){
      var name_obj = JSON.parse(name);
      $('.row-itens').empty();
      name_obj.forEach(function(obj, index){
        var a = obj.nome.toLowerCase();
        var b = name_input.toLowerCase();

        if(a.indexOf(b) !== -1){
          insereItens(obj, index);
        }

      });
      $('.todo-icone').removeClass('todo-icone-ativo');
      document.getElementById('nome').value='';
      $('.row-itens').removeClass('hide');
    }
  });
}


function getDescricao() {
var descricao_input = $('#descricao').val();
  $.ajax({
    url: urlGetDescricao,
    success: function(description){
      var desc_obj = JSON.parse(description);
      $('.row-itens').empty();
      desc_obj.forEach(function(obj, index){
        var a = obj.detalhes_item.toLowerCase();
        var b = descricao_input.toLowerCase();

        if(a.indexOf(b) !== -1){
          insereItens(obj, index);
        }

      });
      $('.todo-icone').removeClass('todo-icone-ativo');
      document.getElementById('descricao').value='';
      $('.row-itens').removeClass('hide');
    }
  });
}
/* FINAL PESQUISA */

</script>
@endsection