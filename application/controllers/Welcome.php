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
		$this->load->view('welcome_message');
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

}
