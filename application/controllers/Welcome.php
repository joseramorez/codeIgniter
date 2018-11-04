<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('login');
	}

	public function index()
	{
		check_state(3);
		$data['titulo'] = "Bienvenida";
		$this->load->view('Template/Template_H',$data);
		$this->load->view('welcome/welcome_message');
		$this->load->view('Template/Template_F');
	}

	public function segunda_pagina()
	{
		check_state(5);
		$data['titulo'] = "segunda pagina de prueba";
		$this->load->view('Template/Template_H',$data);
		echo "esta es una segunda pagina de prueba";
		$this->load->view('Template/Template_F');
	}

	public function subir_archivo()
	{
		check_state(2);
		$data['titulo'] = "CARGA DE ARCHIVOS";
		$data['error'] = $this->session->flashdata('error_upload');
		$this->load->view('Template/Template_H',$data);
		$this->load->view('welcome/subir_archivo', $data);
		$this->load->view('Template/Template_F');

	}

	public function subir()
	{
		// var_dump($_FILES);
		$this->load->library('parser');
		$config['upload_path'] = './static/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']   = '1000';
		$config['max_width'] = '10240';
		$config['max_height'] = '7680';

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('archivo_subir')) {
			$error  = $this->upload->display_errors();
			// $this->load->view('welcome/subir_archivo',$error);
			$this->session->set_flashdata('error_upload',$error);
			redirect('/Welcome/subir_archivo');
		}else {
			$data['info_upload'] = $this->upload->data();
			$this->load->view('welcome/info_upload',$data);
		}
	}


}
