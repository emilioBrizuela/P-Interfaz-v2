function cambiarFilasPagina(){
	if( !isNaN(parseInt( $('#filasPagina').val() ) )){
		//console.log( parseInt( $('#filasPagina').val()) );
		buscar( $('#pagina').val());
	}else{
		$('#filasPagina').addClass('inputRed');
	}
}

function cambiarDePagina(){
	if( !isNaN(parseInt( $('#pagina').val() ))){
		buscar( $('#pagina').val());
	}else{
		$('#pagina').addClass('inputRed');
	}
}