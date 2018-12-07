<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Configuracion extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->helper('login');
  }
  public function index()
  {

  }
  public function alta_doc()
  {
    $data['titulo'] = 'ALTA DOC';
    $data['titulo_btn'] = 'AGREGAR';
    $this->load->view('Template/Template_H',$data);
    $this->parser->parse('Configuracion/alta_doc',$data);
    $this->load->view('Template/Template_F');

  }
}

 ?>
