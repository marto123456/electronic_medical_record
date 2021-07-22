<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	function __construct() {
        parent::__construct();

		$this->load->database();
		$this->load->library('session');
		$this->load->model('login_model');
    }

	/**
	 * Index Page for this controller.
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/hospital/
	 *
	 */
	public function index()
	{
		  $login_user = $this->session->userdata('login_type');
	      if($login_user == 'admin'){
	          $this->login_model->logout_model_for_admin();
	      }
	      if($login_user == 'patient'){
	          $this->login_model->logout_model_for_admin();
	      }
	     
	      if($login_user == 'health_worker'){
	          $this->login_model->logout_model_for_health_worker();
	      }
		  $this->session->sess_destroy();
	      redirect('login', 'refresh');
	}

   

	
}
