<?php
/**
 *
 */
class login_m extends CI_model
{

  function __construct()
  {
    parent::__construct();
    $this->id_usuario=0;
    $this->nombre='';
    $this->username='';
    $this->passwords='';
    $this->nivel=0;
  }

  public function check()
  {
    $this->db->select('id_usuario, nombre, username, nivel');
    $this->db->from('usuario');
    $this->db->where('username',$this->username);
    $this->db->where('passwords',$this->passwords);
    $result = $this->db->get();
    $r = $result->row();
    return $r;
  }
}

 ?>
