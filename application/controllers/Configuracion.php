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
    $data['titulo'] = 'CONFIGURACION';
    $index['TITULO'] = 'CONFIGURACION';

    $this->load->view('Template/Template_H',$data);
    $this->parser->parse('Configuracion/index',$index);
    $this->load->view('Template/Template_F');
  }
  // ===========================================================================
  // ========================== DOCUMENTOS =====================================
  // ===========================================================================

  public function alta_doc()
  {
    check_state(1);
    // TEMPLATE DATA
    $data['titulo'] = 'ALTA DOC';
    // VIEW DATA
    $alta_doc['titulo_btn'] = 'AGREGAR';
    $alta_doc['usuario_id'] = 0;
    $alta_doc['nombre'] = '';
    $alta_doc['descripcion'] = '';
    $alta_doc['submit'] = '/configuracion/guardar';
    $alta_doc['success_documento'] = $this->session->flashdata('success_documento');
    $alta_doc['error_documento'] = $this->session->flashdata('error_documento');
    $alta_doc['error_listado'] = $this->session->flashdata('error_listado');
    $alta_doc['success_listado'] = $this->session->flashdata('success_listado');
    $alta_doc['LISTADO'] = $this->__lista_docuemntos();

    $this->load->view('Template/Template_H',$data);
    $this->parser->parse('Configuracion/alta_doc',$alta_doc);
    $this->load->view('Template/Template_F');
  }
  private function __lista_docuemntos()
  {
    $r = array();
    $r = $this->Documento_m->listado();
    if (empty($r)) {
      $this->session->set_flashdata('error_listado', 'NO HAY NINGUN DOCUMENTO PARA MOSTRAR');
      // $r[0] = array('id_documento' => '', 'nombre' => '', 'descripcion' => '' );
    }
    return $r;

  }
  public function guardar()
  {
    if (empty($_POST['nombre'])) {
      $this->session->set_flashdata('error_documento', 'SE REQUIERE NOMBRE');
      redirect('/configuracion/alta_doc');
    }
    // $this->id_documento = $this->input->post();
    $this->Documento_m->nombre = $this->input->post('nombre');
    $this->Documento_m->descripcion = $this->input->post('descripcion');
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
    // ELIMINACION DE DOCUMENTOS
    public function eliminar_doc($id=0)
    {
      check_state(1);
      $this->Documento_m->id_documento=$id;
      $datos = $this->Documento_m->editar();
      $r = $this->Documento_m->eliminar();
      if (!$r) {
        $this->session->set_flashdata('error_listado','ALGO SALIO MAL, AL EDITAR AL USUARIO');
        redirect('configuracion/alta_doc');
      }else {
        $this->session->set_flashdata('success_listado','EL USUARIO: <b>'. $datos->nombre.'</b> HA SIDO ELIMINADO CON EXITO');
        redirect('configuracion/alta_doc');
      }
    }
    // EDICION DE DOCUMENTOS
    public function editar_doc($id=0)
    {
      check_state(1);
      $this->Documento_m->id_documento = (int)$id;
      $r = $this->Documento_m->editar();
      if (!$r) {
        $this->session->set_flashdata('error_listado','ALGO SALIO MAL, AL EDITAR EL DOCUMENTO');
        redirect('/configuracion/alta_doc');
      }
      $data['titulo'] = 'EDITAR DOC';

      $alta_doc['titulo_btn'] = 'EDITAR';
      $alta_doc['id_documento'] = $r->id_documento;
      $alta_doc['nombre'] = $r->nombre;
      $alta_doc['descripcion'] = $r->descripcion;
      $alta_doc['submit'] = '/configuracion/actualizar_doc';
      $alta_doc['success_documento'] = $this->session->flashdata('success_documento');
      $alta_doc['error_documento'] = $this->session->flashdata('error_documento');
      $alta_doc['error_listado'] = $this->session->flashdata('error_listado');
      $alta_doc['success_listado'] = $this->session->flashdata('success_listado');
      // $alta_doc['LISTADO'] = $this->__lista_docuemntos();
      $alta_doc['LISTADO'] = array(array('id_documento' => $r->id_documento, 'nombre' => $r->nombre,'descripcion'=>$r->descripcion,
                                          'contextual'=>'bg-warning',"editar_class"=>'disabled',"eliminar_class"=>'disabled' ));

      $this->load->view('Template/Template_H',$data);
      $this->parser->parse('Configuracion/alta_doc',$alta_doc);
      $this->load->view('Template/Template_F');
    }

    public function actualizar_doc()
    {
      check_state(1);
      if (empty($_POST['nombre'])) {
        $this->session->set_flashdata('error_documento', 'COMPLETE LOS CAMPOS NECESARIOS');
        redirect('/configuracion/editar_doc/'.$_POST['id_documento']);
      }
      if (empty($_POST['id_documento'])) {
        $this->session->set_flashdata('error_documento', 'ALGO SALIO MAL CON ID A EDITAR');
        redirect('/configuracion/alta_doc');
      }
      $this->Documento_m->id_documento = $this->input->post('id_documento');
      $this->Documento_m->nombre = $this->input->post('nombre');
      $this->Documento_m->descripcion = $this->input->post('descripcion');
      $r = $this->Documento_m->actualizar();
      if ($r) {
        $this->session->set_flashdata('success_documento', 'DOCUMENTO ACTUALIZADO CON ID '.$this->Documento_m->id_documento );
        redirect('/configuracion/alta_doc');
      }else {
        $this->session->set_flashdata('error_documento', 'HAY UN PROBLEMA PARA ACTUALIZAR LA ID '.$this->Documento_m->id_documento );
        redirect('/configuracion/alta_doc');
      }
    }

    // ===========================================================================
    // ========================== GASTOS =========================================
    // ===========================================================================
    public function gasto_lista()
    {
      check_state(1);
      // TEMPLATE DATA
      $data['titulo'] = 'ALTA DOC';
      // VIEW DATA
      $alta_doc['titulo_btn'] = 'AGREGAR';
      $alta_doc['usuario_id'] = 0;
      $alta_doc['nombre'] = '';
      $alta_doc['descripcion'] = '';
      $alta_doc['submit'] = '/configuracion/guardar';
      $alta_doc['success_documento'] = $this->session->flashdata('success_documento');
      $alta_doc['error_documento'] = $this->session->flashdata('error_documento');
      $alta_doc['error_listado'] = $this->session->flashdata('error_listado');
      $alta_doc['success_listado'] = $this->session->flashdata('success_listado');
      $alta_doc['LISTADO'] = $this->__lista_docuemntos();

      $this->load->view('Template/Template_H',$data);
      $this->parser->parse('Configuracion/gastos',$alta_doc);
      $this->load->view('Template/Template_F');
    }

}

 ?>
