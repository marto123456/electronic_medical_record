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
		if ($this->session->userdata('admin_login') == 1) redirect (base_url(). 'admin/dashboard');
		if ($this->session->userdata('user_login') == 1) redirect (base_url(). 'user/dashboard');
		$this->load->view('backend/login');
	}

	function validate_login() {
        $email = html_escape($this->input->post('email'));          
        $password = $this->input->post('password');
        $this->login_model->loginFunctionForAllUsers($email, $password);
        
     }

	function logout(){
	  $login_user = $this->session->userdata('login_type');
      if($login_user == 'admin'){
          $this->login_model->logout_model_for_admin();
      }
	  $this->session->sess_destroy();
      redirect('login', 'refresh');
	}

   

	
}
