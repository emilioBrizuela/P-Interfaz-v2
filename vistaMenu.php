<?php 
    session_start();
    $login='';
    if(isset($_SESSION['usuario'])){
        //esta logeado
        $login='
        <li class="nav-item">
            <a class="nav-link disabled" href="#"><?php echo $user?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="getVista(\'Usuarios\', \'logout\');">Logout</a>
        </li>';
        }else{
        //no esta logeado
        $login='
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="getVista(\'Usuarios\', \'vistaLogin\');">Login</a>
        </li>';
}

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <a class="navbar-brand" href="#">Proyecto Interface</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <div id="login-btn-logear">
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="getVista('Usuarios', 'vistaLogin');">Login</a>
                </li>
            </div>
            <div id="login-btn-logeado">
                <div class="collapse navbar-collapse">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="index.php" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mantenimiento
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" onclick="getVista('Usuarios', 'vistaInicio');">Usuarios</a>
                            <a class="dropdown-item" onclick="getVista('Permisos', 'vistaInicio');">Permisos</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="loginUsuario('Usuarios','logoutUsuario');">Logout</a>
                    </li>
                </div>
            </div>
        </ul>
    </div>

</nav>