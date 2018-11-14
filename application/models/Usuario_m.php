<?php
/**
 *
 */
class Usuario_m extends CI_model
{

  function __construct()
  {
    parent::__construct();
    $this->id=0;
    $this->nombre='';
    $this->apellido_p='';
    $this->apellido_m='';
    $this->username='';
    $this->passwords='';
    $this->nivel=0;
  }
  public function listado()
  {
    $usuario = $this->db->get('usuario');
    // return $usuario->result(); #regresa un objeto
    return $usuario->result_array(); #regresas un arreglo
  }

  public function guardar()
  {
    
  }
}


 ?>
