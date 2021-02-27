<?php
$getPost=$_POST;

if(isset($getPost['controlador'])){
    $controlador=$getPost['controlador'];
    $metodo=$getPost['metodo'];


    $nombreControlador='C_'.$controlador;
    if($metodo!='' && file_exists('./controladores/'.$nombreControlador.'.php')){
        require_once './controladores/'.$nombreControlador.'.php';
        //$objControlador= new C_Usuarios();  // sabiendo el la clase de objeto a crear
        $objControlador= new $nombreControlador();
        if(method_exists($objControlador, $metodo)){
            //$objControlador->vistaInicio($getPost);  //sabiendo el metodo a ejecutar
            $objControlador->$metodo($getPost);
        }else{
            echo '<br>No se encuentra el proceso a realizar. SIN NETODO';
        }
    }else{
        echo '<br>No es posible encontrar el contenido solicitado. 
                    ERROR Metodo o Controlador no existe.';
    }
}else{
    echo '<br>Error en petición. SIN CONTROLADOR';
}




?>