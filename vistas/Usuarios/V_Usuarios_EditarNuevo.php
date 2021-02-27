<?php
	$id_Usuario='';
	$nombre='';
	$apellido_1='';
	$apellido_2='';
	$sexo='';
	$fechaAlta='';
	$mail='';
	$movil='';
	$login='';
	$activo='';
	extract($datos);
	if($fechaAlta!=''){
		//$fechaAlta=substr($fechaAlta,8,2)
		//list($a,$m,$d)=explode('-',$fechaAlta);
		//$fechaAlta=$d.'-'.$m.'-'.$a;
	}
	$CV=md5(session_id().$id_Usuario);
?>
	<div class="bg-white mt-5 p-3">

		<div class="row">
			<div class="col-lg-12">
				<b><span id="operacion">NUEVO</span> USUARIO</b>
			</div>
		</div>
		<form role="form" id="formularioEdicion" name="formularioEdicion">
			<div class="row">
				<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<input type="hidden" id="CV" name="CV" 
					value="<?php echo $CV; ?>"/>
					<input type="hidden" id="id_Usuario" name="id_Usuario" 
					value="<?php echo $id_Usuario; ?>"/>
					<label for="nombre" >Nombre:</label><br>
					<input type="text" id="nombre" name="nombre" 
					class="form-control" placeholder="Nombre usuario"  
					value="<?php echo $nombre; ?>"/>
				</div>
				<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<label for="apellido_1" >Primer Apellido:</label><br>
					<input type="text" id="apellido_1" name="apellido_1" 
					class="form-control" placeholder="Primer Apellido"  
					value="<?php echo $apellido_1; ?>"/>
				</div>
				<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<label for="apellido_2" >Segundo Apellido:</label><br>
					<input type="text" id="apellido_2" name="apellido_2" 
					class="form-control" placeholder="Segundo Apellido"  
					value="<?php echo $apellido_2; ?>"/>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
					<label for="sexo" >Sexo:</label><br>
					<select id="sexo" name="sexo" class="form-control">
						<option value="H" <?php if($sexo=='H') echo ' selected '; ?>>Hombre</option>
						<option value="M" <?php if($sexo=='M') echo ' selected '; ?>>Mujer</option>
					</select>
				</div>
				<div class="form-group col-lg-8 col-md-8 col-sm-6 col-xs-12">
					<label for="mail" >Correo electrónico:</label><br>
					<input type="text" id="mail" name="mail" 
					class="form-control" placeholder="correo electrónico"  
					value="<?php echo $mail; ?>"/>
				</div>
				<div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
					<label for="movil" >Teléfono móvil:</label><br>
					<input type="text" id="movil" name="movil" 
					class="form-control" placeholder="Teléfono móvil"  
					value="<?php echo $movil; ?>"/>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<label for="nombre" >Login:</label><br>
					<input type="text" id="login" name="login" onblur="resetErrores('login');"
					class="form-control" placeholder="Login usuario"  
					value="<?php echo $login; ?>"/><br>
					<span id="msjlogin" class="msj" style="color:red;"></span>
				</div>
				<div class="form-group col-lg-4 col-md-4 d-none d-sm-block">
					<label for="fechaAlta" >Fecha Alta:</label><br>
					<input type="date" id="fechaAlta" name="fechaAlta" onblur="resetErrores('fechaAlta');"
					class="form-control" placeholder="Fecha Alta"  
					value="<?php echo $fechaAlta; ?>"/><br>
				</div>
				<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<label for="activo" >Activo:</label>
					<select id="activo" name="activo" class="form-control">
						<option value="S" <?php if($activo=='S') echo ' selected '; ?>>Activo</option>
						<option value="N" <?php if($activo=='N') echo ' selected '; ?>>Inactivo</option>
					</select>
				</div>
				
			</div>
			<div class="row">
				<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<label for="pass" >Contrase&ntilde;a:</label><br>
					<input type="password" id="pass" name="pass" 
					class="form-control" placeholder="Contrase&ntilde;a" /><br>
					<span id="msjpass" class="msj" style="color:red;"></span>
				</div>
				<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<label for="repass" >Repetir Contrase&ntilde;a:</label><br>
					<input type="password" id="repass" name="repass"  
					class="form-control" placeholder="Repetir contrase&ntilde;a" />
				</div>
				<div class="form-group col-lg-4 col-md-4 d-none d-sm-block">
					
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
			