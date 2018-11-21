<?php
/**
 *
 */
class Usuario_m extends CI_model
{

  function __construct()
  {
    parent::__construct();
    $this->usuario_id=0;
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
    $this->db->set('nombre',$this->nombre);
    $this->db->set('apellido_p',$this->apellido_p);
    $this->db->set('apellido_m',$this->apellido_m);
    $this->db->set('username',$this->username);
    $this->db->set('passwords',$this->passwords);
    $this->db->set('nivel',$this->nivel);
    $r = $this->db->insert('usuario');
    if ($r) {
      return $this->db->insert_id(); #El número de identificación de inserción al realizar inserciones de base de datos.
    }
    else {
      return $this->db->error();
    }
  }

  public function eliminar()
  {
    $this->db->where('id_usuario', $this->usuario_id);
    return $this->db->delete('usuario');
  }

  public function editar()
  {
    $this->db->select('*');
    $this->db->from('usuario');
    $this->db->where('id_usuario',$this->usuario_id);
    $result = $this->db->get();
    if ($result) {
      return $result->row();
    }else {
      return FALSE;
    }
  }
}


 ?>
