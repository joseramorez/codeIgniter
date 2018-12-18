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
  }
  public function index()
  {

  }
  public function alta_doc()
  {
    check_state(1);
    $data['titulo'] = 'ALTA DOC';
    $alta_doc['titulo_btn'] = 'AGREGAR';
    $alta_doc['nombre'] = '';
    $alta_doc['descripcion'] = '';
    $this->load->view('Template/Template_H',$data);
    $this->parser->parse('Configuracion/alta_doc',$alta_doc);
    $this->load->view('Template/Template_F');
  }
}

 ?>
