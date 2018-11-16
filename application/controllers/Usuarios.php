<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * ingreso de usuarios
 *altas,bajas y permisos
 */
class Usuarios extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Usuario_m');
    $this->load->helper('login');
    $this->lang->load('db');
  }

  // LISTADO DE USUARIOS
  public function listado()
  {
    check_state(1);
    $r = $this->Usuario_m->listado();
    $data['titulo'] = 'LISTA USUARIOS';
    $data['LISTADO'] = $r;
    $this->load->view('Template/Template_H',$data);
    $this->parser->parse('Usuario/listado',$data);
    $this->load->view('Template/Template_F');
  }
  public function agregar()
  {
    $data['titulo'] = 'LISTA USUARIOS';
    $data['nombre']='';
    $data['apellido_p']='';
    $data['apellido_m']='';
    $data['username']='';
    $data['error']='';
    $data['passwords']='';
    $data['errorp']='';
    $data['titulo_btn']='Agregar';
    $this->load->view('Template/Template_H',$data);
    $this->parser->parse('Usuario/agregar',$data);
    $this->load->view('Template/Template_F');
  }
  public function guardar()
  {
    check_state(1);
    $this->Usuario_m->nombre = $this->input->post('nombre');
    $this->Usuario_m->apellido_p = $this->input->post('apellido_p');
    $this->Usuario_m->apellido_m = $this->input->post('apellido_m');
    $this->Usuario_m->username = $this->input->post('username');
    $this->Usuario_m->passwords = get_pwd($this->input->post('passwords'));
    $this->Usuario_m->nivel = $this->input->post('nivel');
    $r = $this->Usuario_m->guardar();
    if (is_array($r)) {
      echo "CODIGO DE ERRO DE LA BASE DE DATOS ".$r['code'];
    }elseif ($r==TRUE) {
      echo "insercion exitosa";
      var_dump($r);
    }
  }

  private function username_exist()
  {

  }
}

?>
