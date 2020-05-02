function criarSite() {
	$('.criar-site').removeClass('hide');
	$('.todos-site').addClass('hide');
}

function fechaCriarSite() {
	$('.todos-site').removeClass('hide');	
	$('.criar-site').addClass('hide');
}

function getCidade(){

  var cidCandidato = $('select[name=estado]').val();
        console.log(cidCandidato);
  $.ajax({
    url: urlGetCidade,//Definindo o arquivo onde serão buscados os dados
    // type:'post',        //Definimos o método HTTP usado
      data: {
        cidCandidato: cidCandidato
      },
      
      success: function(cidCandidato){
        var obj = JSON.parse(cidCandidato);

        //console.log(obj, 'obj');

        $('select[id=cidade]').empty();
        $('select[id=cidade]').append('<option value=""> </option>');
        obj.forEach(function(cat, value){
          $('select[id=cidade]').append('<option value="' + cat.ibge + '">' + cat.nome + '</option>');
        });
       
      }
  });
    
}