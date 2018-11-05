<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<div class="row">
  <div class="container-fluid">
    <div class="col-md-4 col-md-offset-4">
      <form class="" action="subir" method="post" enctype="multipart/form-data">
        <?php echo $error ?>
        <div class="custom-file mb-3">
         <input type="file" class="custom-file-input" id="customFile" name="archivo_subir" value="archivo">
         <label class="custom-file-label" for="customFile">SUBIR</label>
       </div>
       <input type="submit" name="" value="ACEPTAR" class="btn btn-success">
      </form>
    </div>
  </div>
</div>
