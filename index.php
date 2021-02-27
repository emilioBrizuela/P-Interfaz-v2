<?php require 'header.php'; ?>
<?php //require 'vistas/Menu/V_Menu.php'; ?>
<?php require_once 'controladores/C_Menu.php';
    $m = new C_Menu();
    $m->crearMenu();
?>
<div class="container-fluid" id="capaContenido">

</div>
<!-- 

CORRREGIR

NOMBRES A LA TABLA PERMISOS
ID_PERMISOS
PERMISOS
DESCRIPCION
ACTIVO

- ACTUALIZAR PANTALLA AL GUARDAR O CREAR
- NO PERMITIR REPETIR NOMBRE AL CREAR
- EDITAR LABEL


 -->
</body>
</html>

