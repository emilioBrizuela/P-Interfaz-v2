<?php 
class Vista{
    static public function render($rutaVista, $datos=array()){
        //include($rutaVista);
        require_once($rutaVista);
    }
}


/*
Crear la vista con el formulario para crar o editar usuarios.
Los campos que debe tener son:

nombre, apellido_1, apellido_2, sexo, fechaAlta, mail, móvil, login, activo

Objetivo: Usando bootstrap conseguir un diseño visualmente correcto y que sea 
responsive, adaptandose al tamaño de la pantalla.

*/
?>
