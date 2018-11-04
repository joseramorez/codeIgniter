<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  /**
   * CLASE PARA EL LOGEO DE SESSION
   */

  class Login extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      $this->state = false;
      $this->load->model('login_m');
      $this->load->helper('login');
      $this->session->keep_flashdata('error_login');
    }

    public function index()
    {
      $data['error_login'] = $this->session->flashdata('error_login');
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
        // $this->destroy_session();
        $this->session->set_flashdata('error_login', 'El usuario o la contraseña son incorrectos.');
        $this->reset_session_vars();
        redirect('/login');
      }
    }

    public function loguot()
    {
      $this->destroy_session();
      redirect('/login');
    }

    private function start_session($r)
    {
      $data = array('id'=> $r->id, 'nombre' => $r->nombre, 'username'=> $r->username, 'nivel'=> $r->nivel);
      $this->session->set_userdata($data);
      redirect('Welcome');
    }
    private function destroy_session()
    {
      $this->reset_session_vars();
      $this->session->sess_destroy();
    }

    private function reset_session_vars() {
      $this->session->unset_userdata('nombre');
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('nivel');
      $this->session->unset_userdata('id');
    }

  }
?>
