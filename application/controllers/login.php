<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  /**
   * CLASE PARA EL LOGEO DE SESSION
   */

  class login extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      $this->state = false;
      $this->load->model('login_m');
      $this->load->helper('login');
    }

    public function index()
    {
      $data = array();
      $data['error'] = $this->session->flashdata('error');
      $this->load->view('login',$data);
    }

    public function check()
    {
      $this->login_m->username = $this->input->post('user');
      $this->login_m->passwords = get_pwd($this->input->post('pwd'));
      $r = $this->login_m->check();
      if (count($r)>0) {
        $this->start_session($r);
      }else {
        $this->session->set_flashdata('error', 'El usuario o la contraseña son incorrectos.');
        $this->destroy_session();
      }
    }
    public function start_session($r)
    {
      $data = array('id'=> $r->id, 'nombre' => $r->nombre, 'username'=> $r->username, 'nivel'=> $r->nivel);
      $this->session->set_userdata($data);
      redirect('Welcome');
    }
    private function destroy_session()
    {
      $this->reset_session_vars();
      redirect('login');
    }

    public function reset_session_vars() {
      $data = array('nombre' => null, 'username'=> null, 'nivel'=> null);
      $this->session->unset_userdata($data);
    }

  }
?>
