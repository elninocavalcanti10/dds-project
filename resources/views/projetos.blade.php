@extends('layouts.app')
@section('styles')
<style type="text/css">
.achados-perdidos-img{ max-height: 60px; max-width: 60px; }
.achados-perdidos-title{ margin-left:15px; font-family: arial black; }
.icones{  }
.todo-icone, .header { width:100%; height:130px; padding:30px; }
.todo-icone-ativo{ background: #fff; border: 3px solid #db9702; border-radius: 20px; }
.todo-item { width:100%; display: inline-block; background-color: #fff; padding: 6px; border-radius: 16px; border: 3px solid #db9702; }
.bloco-agendar{ background-color: #fff; padding: 6px; border-radius: 35px; border: 3px solid #db9702; }
.todo-pesquisa{ width:100%; display: inline-block; background-color: #fff; padding: 6px; border-radius: 16px; border: 3px solid #db9702; }
.icone-img{ width:85px; height:67px; }
.icone-celular-img, #contentPage > div > div.row.icones > div:nth-child(3) > div > div:nth-child(1) > div > img{ width:40px; height:67px; margin: 0 auto; display: block; }
.texto-icone { font-size: 11px; margin-top: 10px; }
.row-pesquisa, .row-itens { margin: 30px 0px; }
.row-agendar{ margin: 10px 0px; position: absolute; z-index: 10; top: 440px; right: 150px; left: 150px; }
.bloco-de-texto{ background-image: url("../../../image/achados_perdidos_bloco_de_texto.png"); min-height: 260px; width: 100%; border-radius: 20px; }
.conteudo-agendamento{ padding: 30px; }
.conteudo-bloco-texto{ padding: 30px 0px 0px 100px; }
.form-bloco-texto{ padding-left: 100px; }
.input-agendar{ width: 100%; border: 3px solid #db9702; border-radius: 20px; padding-left: 2px; }
#btn-agendar{ right: 15px; position: absolute; border-radius: 50%; padding: 4px; font-weight: bold; }
.hora-agendar{ padding: 0px; }
#hora, #data{ padding-left: 15px; }
.etap-itens{ margin: 5px 0px; }
#btn-fechar-bloco-texto{ float: right; }

.img-button-filtro{ height: 28px; }
.img-lista{ height: 28px; right: 25px; bottom: 5px; position: absolute; }
.img-lista-bloco-agendar{ height: 28px; left: 25px; top: 10px; position: absolute; }
.button-filtro{ width: 28px; height: 28px; padding: 0; border: 0; background-color: #fff; }
.input-filtro{ width: 83%; padding: 2px; border: none; vertical-align: top; outline-color: #db9702; color:  #db9702; text-align: center; }
.envolucro-filtro{ display: inline-block; background-color: #fff; padding: 6px; border-radius: 16px; border: 3px solid #db9702; }

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
    <div class="col-md-12 d-flex justify-content-center">
      <div class="header d-flex justify-content-center">
        <img class="achados-perdidos-img" src="{{url('image/gerencia-dds.png')}}" alt="achados e perdidos">
        <h1 class="achados-perdidos-title">DDS PROJECT</h1>
      </div>  
    </div>
  </div>
  <div class="row icones">
    <!--
      Trecho que insere os ícones com as categorias
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

var caminho_imagem = "{{url('image/lista-1.png')}}";


var etapas = {!! $etapaProj !!};
var projeto = {!! $projetos !!};
var agenda =  {!! $agenda !!};

function btnProjeto() {
  var txtcat;

  projeto.forEach(function(proj, index){
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
  }); 

}
$(document).ready(btnProjeto());



/*================== início - Bloco de texto  ==============*/

function blocoTexto(index) {

  var caminho_salvar = "{{url('painel/achadosperdidos/salvar')}}"

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
                    '<p style="font-size:13px; font-weight: bold; margin-bottom:0px;">Detalhes do item:</p>'+
                    etapas[index].detalhes_item+
                  '</div>'+
                '</div>'+
                '<div class="row row-detalhes" style="margin-top:10px">'+
                  '<div class="col-md-12">'+
                    '<p style="font-size:13px; font-weight: bold; margin-bottom:0px;">Local encontrado::</p>'+
                    etapas[index].local+
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
                      '<input type="hidden" name="agenda" value="'+etapas[index].codigo+'">'+
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


function clickProjeto(e, index) {

  $('.todo-icone').removeClass('todo-icone-ativo');
  $(e).addClass('todo-icone-ativo');


  $('.row-itens').empty();
  etapas.forEach(function(etap, index2){
    if(projeto[index].id === etap.id_categoria) {
      insereItens(etap, index2);
    }

  });

  $('.row-itens').removeClass('hide');
}


/*================== início - Insere Itens  ==============*/
function insereItens(etap, index) {
    var txt;
  
    txt = '<div class="col-md-4 etap-itens">'+
            '<div class="todo-item d-flex justify-content-center">'+
              '<div class="container" onclick="blocoTexto('+index+')">'+
                '<div class="row">'+
                  '<div class="col-md-12 d-flex justify-content-center">'+
                    '<h4>'+
                      etap.nome+
                    '</h4>'+
                  '</div>'+
                '</div>'+
                '<div class="row">'+
                  '<div class="col-md-12 d-flex justify-content-center">'+
                    '<span>'+
                      etap.codigo+
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
}

/* INICIO PESQUISA */
function getCodigo() {
var codig = $('#codigo').val();
  $.ajax({
    url: urlGetCodigo,
    success: function(cod){
      var cod_obj = JSON.parse(cod);
      $('.row-itens').empty();
      cod_obj.forEach(function(etap, index){
        if(codig === etap.codigo) {
          insereItens(etap, index);
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
      name_obj.forEach(function(etap, index){
        var a = etap.nome.toLowerCase();
        var b = name_input.toLowerCase();

        if(a.indexOf(b) !== -1){
          insereItens(etap, index);
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
      desc_obj.forEach(function(etap, index){
        var a = etap.detalhes_item.toLowerCase();
        var b = descricao_input.toLowerCase();

        if(a.indexOf(b) !== -1){
          insereItens(etap, index);
        }

      });
      $('.todo-icone').removeClass('todo-icone-ativo');
      document.getElementById('nome').value='';
      $('.row-itens').removeClass('hide');
    }
  });
}
/* FINAL PESQUISA */

</script>
@endsection