<?php
	$id_permisos='';
	$nombre='';
	$descripcion='';
	$estado='';
    extract($datos);
	$CV=md5(session_id().$id_permisos);
?>
<div class="bg-white mt-5 p-3">
    <div class="row text-center">
        <div class="col-lg-12">
            <b class="h4"><span id="operacion">NUEVO</span> PERMISO</b>
        </div>
    </div>
    <div class="m-5">

        <form role="form" id="formularioEdicionProducto" name="formularioEdicionProducto">
            <div class="row">
                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <input type="hidden" id="CV" name="CV" value="<?php echo $CV; ?>" />
                    <input type="hidden" id="id_permisos" name="id_permisos" value="<?php echo $id_permisos; ?>" />
                    <label for="nombre">Nombre:</label><br>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre Permiso"
                    value="<?php echo $nombre; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <label for="activo">Descripcion:</label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="10" maxlength="100"
                    placeholder="Descripcion del Permiso"><?php echo $descripcion; ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <label for="activo">Estado:</label>
                    <select id="activo" name="activo" class="form-control">
                        <option value="S" <?php if($estado=='S') echo ' selected '; ?>>Activo</option>
                        <option value="N" <?php if($estado=='N') echo ' selected '; ?>>Inactivo</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="button" onclick="guardar();" class="btn btn-info">Guardar</button>
                    <button type="button" onclick="noGuardar();" class="btn btn btn-outline-info">Cancelar</button>
                    <span id="mensaje" name="mensaje" style="color:blue;"></span>
                </div>
            </div>
        </form>
    </div>
    </div>