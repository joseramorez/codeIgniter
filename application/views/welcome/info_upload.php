<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

 <!DOCTYPE html>
 <div class="conteiner">
   <div class="col-md-6">
     <?php foreach ($info_upload as $key => $value):?>
       <label for=""><?php echo $key ."->". $value; ?></label><br>
     <?php endforeach; ?>
   </div>
 </div>
