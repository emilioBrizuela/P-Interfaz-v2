<?php 
    session_start();
    if(isset($_SESSION['usuario'])){
        //esta logeado
        $login='<a href="logout.php">
                    <img src="imagenes/logout.png" style="height:3em">
                </a><br>'.$_SESSION['usuario'];
        // echo 'Hola '.$_SESSION['usuario'].', si lo deseas puedes desconectar.<br>';
        // echo '<a href="logout.php">Desconectar</a>';
    }else{
        //no esta logeado
        $login='<a href="login.php">
                    <img src="imagenes/login.png" style="height:3em">
                </a>';
        // echo 'Debes logearte para disponer de todas las opciones.<br>';
        // echo '<a href="login.php">login</a>';
    }

?>
<script src="js/Usuarios.js"></script>
<form id="formularioBuscar" name="formularioBuscar">
    <div class="form-group container p-3">
        <div class="p-3">
            <p class="h3 text-center font-weight-bold">FILTRAR USUARIOS</p>
        </div>
        <div class="row ">
        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <input type="text" id="texto" name="texto" class="form-control" 
                        placeholder="Texto a buscar" value=""/>
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">

                        <select id="fSexo" name="fSexo" class="form-control">
                            <option value="">seleccionar sexo</option>
                            <option value="H">Hombre</option>
                            <option value="M">Mujer</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <select id="estado" name="estado" class="form-control">
                    <option value="">Estado</option>
                    <option value="S">Activos</option>
                    <option value="N">No Activos</option>
                </select>
            </div>
            <div class="form-group col-lg-2 col-md-6 col-sm-6 col-xs-12 mr-auto">
                <button type="button" class="btn btn-info" onclick="buscar(1);">Buscar</button>
                <button type="button" class="btn btn-secondary" onclick="editarNuevo('');">Nuevo</button>
            </div>
        </div>


    <div id="capaResultadosBusqueda" class="container-fluid" ></div>
</form>
<div id="capaEdicionNuevo" class="container-fluid" ></div>