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
  <div class="row">
    <div class="col-md-12 d-flex justify-content-center">
      <div class="header d-flex justify-content-center">
        <img class="achados-perdidos-img" src="{{url('image/gerencia-dds.png')}}" alt="PROJETOS">
        <h1 class="achados-perdidos-title">PROJETOS</h1>
      </div>  
    </div>
  </div>
  <div class="row icones">
    <!--
      Trecho que insere os ícones com as Projetos
    -->
  </div>

  <div class="row row-pesquisa">
    <div class="col-md-4">
      <div class="todo-pesquisa d-flex justify-content-center">
        <input type="text" class="input-filtro" placeholder="Nome" id="nome" name="nome" required>
        <button class="button-filtro" type="submit" id="btn-filter-nome" onclick="getNome()">
          <img class="img-button-filtro" src="{{url('img/icones/question-1.png')}}">
        </button>
      </div>
    </div>
    <div class="col-md-4">
      <div class="todo-pesquisa d-flex justify-content-center">
        <input type="text" class="input-filtro" placeholder="Descrição" id="descricao" name="descricao" required>
        <button class="button-filtro" type="submit" id="btn-filter-descricao" onclick="getDescricao()">
          <img class="img-button-filtro" src="{{url('img/icones/question-1.png')}}">
        </button>
      </div>
    </div>
    <div class="col-md-4">
      <div class="todo-pesquisa d-flex justify-content-center">
        <input type="text" class="input-filtro" placeholder="#Código" id="codigo" name="codigo" required>
        <button class="button-filtro" type="submit" id="btn-filter-cod" onclick="getCodigo()">
          <img class="img-button-filtro" src="{{url('img/icones/question-1.png')}}">
        </button>
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

</div>
@endsection

@section('javascript')
<script type="text/javascript">

var urlGetCodigo = "{{url('/painel/get_codigo')}}";
var urlGetNome = "{{url('/painel/get_nome?nome')}}";
var urlGetDescricao = "{{url('/painel/get_descricao?descricao')}}";

var caminho_imagem = "{{url('img/icones/lista-1.png')}}";


var stage = {!! $stage !!};//objetos1
var project = {!! $project !!};//categoria1
console.log(project);
var scheduling =  {!! $scheduling !!};//agenda1

function btnCategoria() {
  var txtcat;

  project.forEach(function(cat, index){
    var imgcat1 = '{{url("image/")}}';
    var aux = imgcat1 + '/' + cat.imagem;

    txtcat = '<div class="col-md-2">'+
                '<div class="container">'+
                  '<div class="row">'+
                    '<div class="col-md-12 todo-icone d-flex justify-content-center" onclick="clickCategoria(this, '+index+')">'+
                      '<img class="icone-img" src="'+aux+'">'+
                    '</div>'+
                  '</div>'+
                  '<div class="row">'+
                    '<div class="col-md-12 div-texto-icone d-flex justify-content-center">'+
                      '<p class="texto-icone">'+
                        cat.nome+
                      '</p>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
             '</div>';

    $('.icones').append(txtcat);
  }); 

}
$(document).ready(btnCategoria());



/*================== início - Bloco de texto  ==============*/

function blocoTexto(index) {

  var caminho_salvar = "{{url('painel/projetos/salvar')}}"

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
                          stage[index].nome+
                        '</h4>'+
                      '</div>'+
                    '</div>'+
                    '<div class="row">'+
                      '<div class="col-md-12">'+
                        '<span>'+
                          stage[index].codigo+
                        '</span>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
                '<div class="row row-detalhes" style="margin-top:10px">'+
                  '<div class="col-md-12">'+
                    '<p style="font-size:13px; font-weight: bold; margin-bottom:0px;">Detalhes do item:</p>'+
                    stage[index].detalhes_item+
                  '</div>'+
                '</div>'+
                '<div class="row row-detalhes" style="margin-top:10px">'+
                  '<div class="col-md-12">'+
                    '<p style="font-size:13px; font-weight: bold; margin-bottom:0px;">Local encontrado::</p>'+
                    stage[index].local_encontrado+
                  '</div>'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="col-md-7 conteudo-agendamento d-flex justify-content-center">'+
              '<div class="bloco-de-texto">'+
                '<div class="container">'+
                  '<div class="row">'+
                    '<div class="col-md-12">'+
                      '<div class="conteudo-bloco-texto">'+
                        '<p style="font-size:13px;">'+
                          'Para sua segurança, será necessário o desbloqueio do aparelho no ato da retirada.'+
                          '<br>'+'<br>'+
                          'Também será necessário:'+
                          '<br>'+
                          '<br>'+
                          '- Apresentar documento com foto;'+
                          '<br>'+
                          '- Informar código do item (código de 7 digitos após a #)'+
                          '<br>'+
                          '<span style="font-weight: bold;">'+
                            'Agendar Retirada:'+
                          '</span>'+
                        '</p>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                  '<div class="row">'+
                    '<div class="col-md-12 form-bloco-texto">'+
                      '<form class="form-inline" action="'+caminho_salvar+'" method="POST">'+
                      '{{ csrf_field() }}'+
                      '<input type="hidden" name="scheduling" value="'+stage[index].codigo+'">'+
                        '<div class="col-md-7">'+
                          '<div class="row">'+
                            '<div class="col-md-3">'+
                              '<span>'+
                                'Data:'+
                              '</span>'+
                            '</div>'+
                            '<div class="col-md-9">'+
                              '<input type="date" class="input-agendar" id="data" name="data" required>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                        '<div class="col-md-4 hora-agendar">'+
                          '<div class="row">'+
                            '<div class="col-md-3">'+
                              '<span>'+
                                'Hora:'+
                              '</span>'+
                            '</div>'+
                            '<div class="col-md-9">'+
                              '<input type="time" class="input-agendar" id="hora" name="hora" required>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                        '<button type="submit" class="btn btn-success" id="btn-agendar" name="btn-agendar" onclick="dateTime()">'+
                          'OK'+
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

/** INICIO PESQUISA **/
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
      document.getElementById('nome').value='';
      $('.row-itens').removeClass('hide');
    }
  });
}
/** FINAL PESQUISA **/


function clickCategoria(e, index) {

  $('.todo-icone').removeClass('todo-icone-ativo');
  $(e).addClass('todo-icone-ativo');


  $('.row-itens').empty();
  stage.forEach(function(obj, index2){
    if(project[index].id === obj.id_project) {
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
}


</script>
@endsection