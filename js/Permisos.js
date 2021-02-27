function buscar(pagina) {
    var correcto = true;
    if ($('#filasPagina').length == 1) {
        if (isNaN($('#filasPagina').val())) {
            $('#filasPagina').addClass('inputRed');
            $correcto = false;
        }
        if (isNaN($('#pagina').val())) {
            $('#pagina').addClass('inputRed');
            $correcto = false;
        }
        $('#pagina').val(pagina);
    }

    if (correcto) {
        var parametros = '&controlador=Permisos&metodo=buscar';
        parametros += '&' + $('#formularioBuscar').serialize();
        $.ajax({
            url: 'C_Ajax.php',
            type: 'post',
            data: parametros,
            success: function(vista) {
                $('#capaResultadosBusqueda').html(vista);
            }
        })
    }
}

function editarNuevo(id_permisos) {
    var parametros = '&controlador=Permisos&metodo=editarNuevo';
    parametros += '&id_permisos=' + id_permisos;
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: parametros,
        success: function(vista) {
            $('#capaEdicionNuevo').html(vista);
        }
    })
}

function borrar(id_permisos) {
    $dialogoBorrar = $('<div></div>')
        .html('¿Desea borrar al usuario: ' + $('.tdUsuario_' + id_permisos).html() + ' ?<br>')
        .dialog({
            height: 250,
            width: 500,
            title: 'Confirmar borrado...',
            modal: true,
            buttons: {
                "SI": function() {
                    var parametros = '&controlador=Permisos&metodo=eliminarPermisos';
                    parametros += '&id_permisos=' + id_permisos;
                    $.ajax({
                        url: 'C_Ajax.php',
                        type: 'post',
                        data: parametros,
                        success: function(vista) {
                            $dialogoBorrar.dialog("close");
                            buscar();
                        }
                    })
                },
                "NO": function() {
                    $dialogoBorrar.dialog("close");
                }
            },
            close: function() {
                $dialogoBorrar.remove();
                //$dialogoBorrar.dialog( "destroy" );
            }
        });





}

function cambiarEstado(id_permisos) {
    var parametros = '&controlador=Permisos&metodo=cambiarEstadoPermisos';
    parametros += '&id_permisos=' + id_permisos;
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: parametros,
        success: function(nuevoEstado) {
            if (nuevoEstado == 'S') {
                $('#activo_' + id_permisos).show();
                $('#inactivo_' + id_permisos).hide();
                $('.tdUsuario_' + id_permisos).css('color', 'black');
            } else {
                $('#activo_' + id_permisos).hide();
                $('#inactivo_' + id_permisos).show();
                $('.tdUsuario_' + id_permisos).css('color', 'red');
            }

        }
    })
}

function noGuardar() {
    $('#capaEdicionNuevo').html('');
}


function guardar() {
    var resultadoValidar = varificarFormularioEdicionNuevo();
    if (resultadoValidar != '') { //error
        alert('error');

    } else { //correcto
        //alert('sin error');
        var parametros = '&controlador=Permisos&metodo=guardar';
        parametros += '&' + $('#formularioBuscar').serialize();
        $.ajax({
            url: 'C_Ajax.php',
            type: 'post',
            data: parametros,
            dataType: 'json',
            success: function(respuesta) {
                //alert(respuesta.mensaje);
                if (respuesta.correcto == 'S') {
                    $('#capaEdicionNuevo').html('');
                } else {
                    $.each(respuesta.camposErroneos, function(campo, texto) {
                        $('#' + campo).addClass('inputRed');
                    });
                    $('#mensaje').html(respuesta.mensaje);
                }

            }
        })
    }

}

function varificarFormularioEdicionNuevo() {
    var resultado = '';
    if ($('#nombre').val() == '') {
        $('#nombre').addClass('inputRed');
    };



    if ($('.inputRed').length > 0) {
        resultado = 'Revisar los campos en rojo.';
    }

    return resultado;
}