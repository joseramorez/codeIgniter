<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
 <!DOCTYPE html>
 <?php if ($error_documento): ?>
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong>ALERTA!</strong> <?php echo $error_documento ?>.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
 <?php endif; ?>

 <?php if ($success_documento): ?>
   <div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>EXITO!</strong> <?php echo $success_documento ?>.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
 <?php endif; ?>


 <div class="container">
 	<form method="POST" action="{submit}" id="forms_documento">
 		<input type="hidden" name="id_documento" id="id_documento" value="{id_documento}">
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

 <?php if ($error_listado): ?>
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong>ALERTA!</strong> <?php echo $error_listado ?>.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
 <?php endif; ?>

 <?php if ($success_listado): ?>
   <div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>EXITO!</strong> <?php echo $success_listado ?>.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
 <?php endif; ?>

 <div class="col-md-8 offset-md-2">
   <table class="table">
     <thead class="thead-dark">
       <th>ID</th>
       <th>NOMBRE DOCUMENTO</th>
       <th>DESCRIPCION</th>
       <th>ELIMINAR</th>
     </thead>
     <tbody>
       {LISTADO}
       <tr class="{contextual}">
         <td>{id_documento}</td>
         <td>{nombre}</td>
         <td>{descripcion}</td>
         <td>
           <a class="btn btn-default {editar_class}"  role="button" aria-disabled="true" onclick="confirmar('/configuracion/editar_doc/{id_documento}','Desea editar al Usuario {nombre}')" ><span class="fas fa-edit"></button></a>
           <a class="btn btn-default {eliminar_class}"  role="button" aria-disabled="true" onclick="confirmar('/configuracion/eliminar_doc/{id_documento}','Desea eliminar al Usuario {nombre}')" ><span class="fas fa-trash-alt"></span></a>
         </td>
       </tr>
       {/LISTADO}
     </tbody>
   </table>
 </div>
