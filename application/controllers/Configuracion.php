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
    $this->load->model('Documento_m');
    $this->load->helper('CodeErrorDB');
  }
  public function index()
  {

  }
  public function alta_doc()
  {
    check_state(1);
    // TEMPLATE DATA
    $data['titulo'] = 'ALTA DOC';
    // VIEW DATA
    $alta_doc['titulo_btn'] = 'AGREGAR';
    $alta_doc['nombre'] = '';
    $alta_doc['descripcion'] = '';
    $alta_doc['submit'] = '/configuracion/guardar';
    $alta_doc['success_documento'] = $this->session->flashdata('success_documento');
    $alta_doc['error_documento'] = $this->session->flashdata('error_documento');
    $alta_doc['error_listado'] = $this->session->flashdata('error_listado');
    $alta_doc['LISTADO'] = $this->__lista_docuemntos();

    $this->load->view('Template/Template_H',$data);
    $this->parser->parse('Configuracion/alta_doc',$alta_doc);
    $this->load->view('Template/Template_F');
  }
  private function __lista_docuemntos($value='')
  {
    $r = array();
    $r = $this->Documento_m->listado();
    if (empty($r)) {
      $this->session->set_flashdata('error_listado', 'NO HAY NINGUN DOCUMENTO PARA MOSTRAR');
      $r[0] = array('id_documento' => '', 'nombre' => '', 'descripcion' => '' );
    }
    return $r;

  }
  public function guardar()
  {
    // $this->id_documento = $this->input->post();
    $this->nombre = $this->input->post('nombre');
    $this->descripcion = $this->input->post('descripcion');
    $r = $this->Documento_m->guardar();
    if (is_array($r)) {
        $this->error_documento($r);
    }elseif (is_numeric($r)) {
        $this->session->set_flashdata('success_documento','USUARIO <strong>'.$this->Documento_m->nombre.' </strong> AGREGADO CON EXITO');
        redirect('/configuracion/alta_doc');
    }else {
      $this->session->set_flashdata('error_documento', 'ALGO SALIO MAL, INTENTELO NUEVAMENTE');
      redirect('/configuracion/alta_doc');
    }
  }

  //VALIDAR LOS CODE DE ERROR QUE RETORNA
    private function error_documento($error = array())
    {
      switch ($error['code']) {
        case 1062:
          $this->session->set_flashdata('error_documento', 'EL NOMBRE DE USUARIO <strong>'.$this->Usuario_m->username.'</strong>  YA EXISTE');
          redirect('/usuarios/agregar');
          break;
        default:
          $this->session->set_flashdata('error_documento', 'MENSAJE: '.$error['message'].' CODIGO: '.$error['code']);
          redirect('/usuarios/agregar');
          break;
      }
    }
}

 ?>
