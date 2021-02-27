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
        var parametros = '&controlador=Usuarios&metodo=buscar';
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

function editarNuevo(id_Usuario) {
    var parametros = '&controlador=Usuarios&metodo=editarNuevo';
    parametros += '&id_Usuario=' + id_Usuario;
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: parametros,
        success: function(vista) {
            $('#capaEdicionNuevo').html(vista);
        }
    })
}

function borrar(id_Usuario) {
    $dialogoBorrar = $('<div></div>')
        .html('¿Desea borrar al usuario: ' + $('.tdUsuario_' + id_Usuario).html() + ' ?<br>')
        .dialog({
            height: 250,
            width: 500,
            title: 'Confirmar borrado...',
            modal: true,
            buttons: {
                "SI": function() {
                    var parametros = '&controlador=Usuarios&metodo=eliminarUsuario';
                    parametros += '&id_Usuario=' + id_Usuario;
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

function cambiarEstado(id_Usuario) {
    var parametros = '&controlador=Usuarios&metodo=cambiarEstadoUsuario';
    parametros += '&id_Usuario=' + id_Usuario;
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: parametros,
        success: function(nuevoEstado) {
            if (nuevoEstado == 'S') {
                $('#activo_' + id_Usuario).show();
                //$('#activo_'+id_Usuario).css('display','inline');
                $('#inactivo_' + id_Usuario).hide();
                //$('#inactivo_'+id_Usuario).css('display','none');
                $('.tdUsuario_' + id_Usuario).css('color', 'black');
            } else {
                $('#activo_' + id_Usuario).hide();
                $('#inactivo_' + id_Usuario).show();
                $('.tdUsuario_' + id_Usuario).css('color', 'red');
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
        var parametros = '&controlador=Usuarios&metodo=guardar';
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

function loginUsuario(controlador, metodo) {

    var parametros = '&controlador=' + controlador + '&metodo=' + metodo;
    parametros += '&' + $('#formularioLogin').serialize();
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: parametros,
        success: function(vista) {
            $('#capaContenido').html(vista);
            $logeadoBtn = document.querySelector('#login-btn-logeado');
            $logearBtn = document.querySelector('#login-btn-logear');
            $logeadoBtn.style.display = 'inline';
            $logearBtn.style.display = 'none';
        }
    })
}

function logoutUsuario(controlador, metodo) {

    var parametros = '&controlador=' + controlador + '&metodo=' + metodo;
    // parametros += '&' + $('#formularioLogin').serialize();
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: parametros,
        success: function(vista) {
            $('#capaContenido').html(vista);
            $logeadoBtn = document.querySelector('#login-btn-logeado');
            $logearBtn = document.querySelector('#login-btn-logear');
            $logearBtn.style.display = 'inline';
            $logeadoBtn.style.display = 'none';
        }
    })
}