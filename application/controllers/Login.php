<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
        parent::__construct();

		$this->load->database();
		$this->load->library('session');
    }

	/**
	 * Index Page for this controller.
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/hospital/
	 *
	 */
	public function index()
	{
		
		$this->load->view('backend/login');
	}

   

	
}
