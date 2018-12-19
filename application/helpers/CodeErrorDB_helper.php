<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('code_error_db'))
{
  function code_error_db($data_error = array())
  {
    switch ($error['code']) {
      case 1062:
        return 'EL DATO QUE INTENTA GUARDAR YA EXISTE';
        break;
      default:
        return 'MENSAJE: '.$error['message'].' CODIGO: '.$error['code'];
        break;
    }
  }
}
?>
