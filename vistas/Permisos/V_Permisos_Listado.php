<?php
//Los datos siempre se reciben en la variable $datos (ver declaración render)
$permisos=$datos;

$html='<table class="table table-sm table-striped">
            <thead>
                <tr>
                    <td width="1%"></td>
                    <td width="1%">Nombre</td>
                    <td width="1%"></td>
                    <td width="auto">Descripcion</td>
                    <td width="1%" nowrap>¿Activo?</td>
                </tr>
            </thead>
            <tbody>';
foreach($permisos as $reg){
     //<span style="color:blue;" onclick="editarNuevo(\''.$reg['id_permisos].'\')">Editar</span>
    $color='black';
    $ac ='<span id="activo_'.$reg['id_permisos'].'" style="color:blue;';
    if($reg['activo']=='N'){
        $ac.='display:none;';
    }
    $ac.='" >Activo</span>';
    $ac.='<span id="inactivo_'.$reg['id_permisos'].'" style="color:red;';
    if($reg['activo']=='S'){
        $ac.='display:none;';
    }else{
        $color='red';
    }
    $ac.='" >Inactivo</span>';
    $ac.='&nbsp;<img src="imagenes/cambiar.png" style="height:1.2em;" 
                    onclick="cambiarEstado(\''.$reg['id_permisos'].'\')">';
    
    
    $html.='<tr>
                <td nowrap>
                    <img src="imagenes/edit.png" style="height:1.5em;" 
                            onclick="editarNuevo(\''.$reg['id_permisos'].'\')">
                </td>
                <td nowrap class="tdUsuario_'.$reg['id_permisos'].'" 
                        style="color:'.$color.'">'.$reg['nombre'].'</td>
                <td nowrap>
                    <img src="imagenes/delete.png" style="height:1.2em;" 
                            onclick="borrar(\''.$reg['id_permisos'].'\')">
                </td>
               
                <td style="color:'.$color.'" 
                        class="tdUsuario_'.$reg['id_permisos'].'">'.$reg['descripcion'].'</td>
                <td style="text-align:right;" nowrap>'.$ac.'</td>
            </tr>';
}
$html.='    </tbody>
        </table>';

echo $html;     
?>