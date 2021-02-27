function getVista(controlador, metodo){
    var parametros='&controlador='+controlador+'&metodo='+metodo;
    $.ajax({
        url:'C_Ajax.php',
        type:'post',
        data: parametros,
        success: function(vista){
            $('#capaContenido').html(vista);
        }
    })

    //alert('paso');
}