<?php
//Los datos siempre se reciben en la variable $datos (ver declaración render)
$usuarios=$datos;

$html='<table class="table table-sm table-striped">
            <thead>
                <tr>
                    <td width="1%"></td>
                    <td width="1%">Nombre completo</td>
                    <td width="1%"></td>
                    <td width="auto">Login</td>
                    <td width="1%" nowrap>¿Activo?</td>
                </tr>
            </thead>
            <tbody>';
foreach($usuarios as $reg){
    //<span style="color:blue;" onclick="editarNuevo(\''.$reg['id_Usuario'].'\')">Editar</span>
    $color='black';
    $ac ='<span id="activo_'.$reg['id_Usuario'].'" style="color:blue;';
    if($reg['activo']=='N'){
        $ac.='display:none;';
    }
    $ac.='" >Activo</span>';
    $ac.='<span id="inactivo_'.$reg['id_Usuario'].'" style="color:red;';
    if($reg['activo']=='S'){
        $ac.='display:none;';
    }else{
        $color='red';
    }
    $ac.='" >Inactivo</span>';
    $ac.='&nbsp;<img src="imagenes/cambiar.png" style="height:1.2em;" 
                    onclick="cambiarEstado(\''.$reg['id_Usuario'].'\')">';
    
    
    $html.='<tr>
                <td nowrap>
                    <img src="imagenes/edit.png" style="height:1.5em;" 
                            onclick="editarNuevo(\''.$reg['id_Usuario'].'\')">
                </td>
                <td nowrap class="tdUsuario_'.$reg['id_Usuario'].'" 
                        style="color:'.$color.'">'.$reg['nombre'].' '.$reg['apellido_1'].' '.$reg['apellido_2'].'</td>
                <td nowrap>
                    <img src="imagenes/delete.png" style="height:1.2em;" 
                            onclick="borrar(\''.$reg['id_Usuario'].'\')">
                </td>
               
                <td style="color:'.$color.'" 
                        class="tdUsuario_'.$reg['id_Usuario'].'">'.$reg['login'].'</td>
                <td style="text-align:right;" nowrap>'.$ac.'</td>
            </tr>';
}
$html.='    </tbody>
        </table>';

echo $html;     
?>