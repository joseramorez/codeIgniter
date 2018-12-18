<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

<!DOCTYPE html>
<div class="container">
	<form method="POST" action="{submit}" id="forms_usuario_agregar">
		<input type="hidden" name="usuario_id" id="usuario_id" value="{usuario_id}">
		<h3>{titulo_btn} DOCUMENTOS</h3>
		<div class="form-row">
			<div class="form-group col col-md-5 validate">
				<label for="" class="col-form-label">NOMBRE(s)</label>
				<input type="text" name="nombre" id="nombre" value="{nombre}" class="form-control" placeholder="acta" autocomplete="off">
			</div>
			<div class="form-group col col-md-7 validate">
				<label for="" class="col-form-label">DESCRIPCION</label>
				<input type="text" name="descripcion" id="descripcion" value="{descripcion}" class="form-control" placeholder="describe el documento" autocomplete="off">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-4 offset-md-4">
				<input type="submit" value="{titulo_btn} DOCUMENTO" class="btn btn-primary btn-block">
			</div>
		</div>
	</form>
</div>
