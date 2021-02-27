<?php 
require_once('controladores/C_Menu.php');
session_start();
extract($datos);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <a class="navbar-brand" href="#">Proyecto Interface</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php

    ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <?php foreach($datos as $regMenu){
                if($regMenu['opcion']=="Login"){
                   ?>
                <div id="login-btn-logear">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="getVista('Usuarios', 'vistaLogin');">Login</a>
                    </li>
                </div>
                   <?php
                }
            
             } ?>
            
            <div id="login-btn-logeado">
                <div class="collapse navbar-collapse">
                    <?php foreach($datos as $regMenu){
                        if($regMenu['opcion']!="Login"){
                        if($regMenu['submenu'] == 'N' && $regMenu['id_submenu']==0){?>
                            <li class="nav-item active">
                                <a class="nav-link" href="#" onclick="<?php echo $regMenu['funcion']?>">
                                    <?php echo $regMenu['opcion']?>
                                </a>
                            </li>
                            
                        <?php }if($regMenu['submenu'] == 'S' && $regMenu['id_submenu']==0){?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"><?php echo $regMenu['opcion']?></a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                           //}
                            foreach($datos as $regSubMenu){
                                if($regMenu['id_menu'] == $regSubMenu['id_submenu']){
                                    ?>
                                    <a class="dropdown-item"
                                        onclick="<?php echo $regSubMenu['funcion'] ?>"><?php echo $regSubMenu['opcion'] ?></a>
                            <?php
                                    }
                                }
                            }
                        }
                    }?>
                                </div>
                            </li>
                </div>

            </div>
        </ul>
    </div>
</nav>