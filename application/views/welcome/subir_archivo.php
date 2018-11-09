<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<div class="row">
  <div class="container">
    <div class="col col-md-4 offset-md-2">
      <form class="" action="subir" method="post" enctype="multipart/form-data">
        <?php if ($error): ?>
          <label for="" class="label label-error" ><?php echo $error ?></label>
        <?php endif; ?>
        <div class="form-group">
         <label for="selecciona">Seleccione archivo</label>
         <input type="file" class="form-control-file" name="archivo_subir" id="archivo_subir" >
       </div>
       <input type="submit" name="" value="ACEPTAR" class="btn btn-success">
      </form>
    </div>
  </div>
</div>
