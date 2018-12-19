<?php
/**
 *
 */
class Documento_m extends CI_model
{

  function __construct()
  {
    $this->id_documento = 0;
    $this->nombre = '';
    $this->descripcion = '';
  }

  public function listado($value='')
  {
    $usuario = $this->db->get('documento');
    // return $usuario->result(); #regresa un objeto
    return $usuario->result_array(); #regresas un arreglo
  }

  public function guardar()
  {
    $this->db->set('nombre',$this->nombre);
    $this->db->set('descripcion',$this->descripcion);
    $r = $this->db->insert('documento');
    if ($r) {
      return $this->db->insert_id(); #El número de identificación de inserción al realizar inserciones de base de datos.
    }
    else {
      return $this->db->error();
    }
  }

  public function eliminar()
  {
    $this->db->where('id_documento', $this->id_documento);
    return $this->db->delete('documento');
  }

  public function editar()
  {
    $this->db->select('*');
    $this->db->from('documento');
    $this->db->where('id_documento',$this->id_documento);
    $result = $this->db->get();
    if ($result) {
      return $result->row();
    }else {
      return FALSE;
    }
  }
}

 ?>
