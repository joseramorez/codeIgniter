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
    }
    public function index()
    {
      $this->load->view('login');
    }
    public function check()
    {
      var_dump($_POST);
      echo "validacion";
    }

  }
?>
