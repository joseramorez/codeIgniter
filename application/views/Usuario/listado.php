<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
 <!DOCTYPE html>

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
         <td>{id}</td>
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
