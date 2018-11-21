<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
<!DOCTYPE html>
<?php if ($success_usuario): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>EXITO!</strong> <?php echo $success_usuario ?>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div><?php endif; ?>
<?php if ($error_usuario): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>ALERTA!</strong> <?php echo $error_usuario ?>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div><?php endif; ?>
  <script language="javascript" type="text/javascript" src="/static/js/forms_usuarios.js"></script>
<div class="container">
	<form method="POST" action="{submit}" id="forms_usuario_agregar">
    <input type="hidden" name="usuario_id" id="usuario_id" value="{usuario_id}">
		<h3>{titulo_btn} Usuario</h3>
      <div class="form-row">
        <div class="form-group col col-md-4 validate">
          <label for="" class="col-form-label">NOMBRE(s)</label>
          <input type="text" name="nombre" id="nombre" value="{nombre}" class="form-control" placeholder="JUAN" autocomplete="off">
        </div>
        <div class="form-group col col-md-4 validate">
          <label for="" class="col-form-label">APELLIDO PATERNO</label>
          <input type="text" name="apellido_p" id="apellido_p" value="{apellido_p}" class="form-control" placeholder="SANCHEZ" autocomplete="off">
        </div>
        <div class="form-group col col-md-4 validate">
          <label for="" class="col-form-label">APELLIDO MATERNO</label>
          <input type="text" name="apellido_m" id="apellido_m" value="{apellido_m}" class="form-control" placeholder="HERNANDEZ" autocomplete="off">
        </div>
      </div>

		<div class="form-group row">
			<input type="hidden" name="id" value="{user_id}">
			<label for="name" class="col-md-2 col-form-label">Nombre de usuario:</label>
      <div class="col-md-10 validate">
        <input type="text" name="username" id="username" class="form-control" value="{username}" onkeyup="verificar_nombre();" autocomplete="off"/>
          <span class='error' id="usererror">{error}</span>
      </div>
		</div>

		<div class="form-group row">
			<label for="passwd" class="col-md-2 col-form-label">Contraseña:</label>
      <div class="col-md-10 validate">
        <input type="password" name="passwords" id="passwords" class="form-control" value="{passwords}" autocomplete="off"/>
      </div>
      <div class="col-md-10 offset-md-2 validate">
        <input type="button" value="Generar clave segura" class="btn btn-default generator" onclick="generar_pwd('passwords');" />
        <code id="pwd_generada"></code>
          <span class="error" id="errorpwd">{errorp}</span>
      </div>
		</div>


		<div class="form-group row">
			<label for="level" class="col-md-2 col-form-label">Nivel de Acceso:</label>
      <div class="col-md-10 validate">
        <select name="nivel" id="nivel" class="form-control m" onchange="habilitar('otro');">
          <option class="form-control" value=""> SELECCIONE UN NIVEL</option>
          <option class="form-control" value="1"> 1 (primer nivel: administrador)</option>
          <option class="form-control" value="2"> 2 (segundo nivel: Usuario)</option>
        </select>
      </div>
		</div>
		<div class="form-group row">
      <div class="col-md-4 offset-md-4">
        <input type="submit" value="{titulo_btn} usuario" class="btn btn-primary btn-block">
      </div>
		</div>
	</form>
</div>
