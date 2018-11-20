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
 <div class="col col-md-8 offset-md-2">
   <table class="table">
     <thead>
       <tr>
         <th>ID</th>
         <th>NOMBRE</th>
         <th>USUARIO</th>
         <th>CONTRASEÑA</th>
         <th>NIVEL</th>
       </tr>
     </thead>
     <tbody>
       {LISTADO}
       <tr>
         <td>{id_usuario}</td>
         <td>{nombre}</td>
         <td>{username}</td>
         <td>{passwords}</td>
         <td>{nivel}</td>
       </tr>
       {/LISTADO}
     </tbody>
   </table>
 </div>
<div class="container">
 <div class="row">
   <a href="/usuarios/agregar">AGREGAR USUARIO</a>
 </div>
</div>
