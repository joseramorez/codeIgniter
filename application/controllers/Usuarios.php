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
    $data['error_usuario'] = $this->session->flashdata('error_usuario');
    $data['success_usuario'] = $this->session->flashdata('success_usuario');
    $r = $this->Usuario_m->listado();
    $data['titulo'] = 'LISTA USUARIOS';
    $data['LISTADO'] = $r;
    $this->load->view('Template/Template_H',$data);
    $this->parser->parse('Usuario/listado',$data);
    $this->load->view('Template/Template_F');
  }
  public function agregar()
  {
    check_state(1);
    $data['error_usuario'] = $this->session->flashdata('error_usuario');
    $data['success_usuario'] = $this->session->flashdata('success_usuario');
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
        $this->error_usuario($r);
    }elseif (is_numeric($r)) {
        $this->session->set_flashdata('success_usuario','USUARIO <strong>'.$this->Usuario_m->username.' </strong> AGREGADO CON EXITO');
        redirect('/usuarios/listado');
    }else {
      $this->session->set_flashdata('error_usuario', 'ALGO SALIO MAL, INTENTELO NUEVAMENTE');
      redirect('/usuarios/listado');

    }
  }

  private function error_usuario($error = array())
  {
    switch ($error['code']) {
      case 1062:
        $this->session->set_flashdata('error_usuario', 'EL NOMBRE DE USUARIO <strong>'.$this->Usuario_m->username.'</strong>  YA EXISTE');
        redirect('/usuarios/agregar');
        break;
      default:
        $this->session->set_flashdata('error_usuario', 'MENSAJE: '.$error['message'].' CODIGO: '.$error['code']);
        redirect('/usuarios/agregar');
        break;
    }
  }
}

?>
