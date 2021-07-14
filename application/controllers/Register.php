<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct() {
        parent::__construct();

		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('register_model');
    }

	
	public function index()
	{
		
		$this->load->view('backend/register');
	}

	

	public function store($param1=null, $param2=null, $param3=null)
	{
		//validation rules
		$rules = array(
            array(
                'field' => 'email',
                'rules' => 'required|is_unique[users.email]',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'is_unique' => '%s already exists',
                ),
            ),
            
            array(
                'field' => 'password',
                'rules'   => 'trim|required|min_length[8]|xss_clean|callback_is_password_strong',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'min_length' => '%s must be 8 characters long',
                    'is_password_strong' => '%s does not meet the complexity required',
                ),
            ),
            array(
                'field' => 'confirm_password',
                'rules'   => 'required|matches[password]',
               
            ),
            array(
                'field' => 'fname',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    
                ),
            ),
             array(
                'field' => 'lname',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                   
                ),
            ),
        );

        $this->form_validation->set_rules($rules);
        //if there are validation errors reload the register form else insert the data to database
         if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/register');
           
        } else {
        	//get the data from the form
            
            $this->register_model->insert_user();
            $this->session->set_flashdata('flash_message', get_phrase('user registered successfully'));
            redirect(base_url(). 'login/index', 'refresh');
        }
	}

   public function is_password_strong($password)
	{
	   if (preg_match('#[0-9]#', $password) && preg_match('#[a-zA-Z]#', $password)) {
	     return TRUE;
	   }
	   return FALSE;
	}

     public function user_verification($verification_code)
    {
         $email_verified = $this->register_model->verify_user($verification_code);
         if($email_verified){
           $this->session->set_flashdata('flash_message', get_phrase('user Account Activated. Please login'));
           redirect(base_url(). 'login/index', 'refresh');
         }else{
             $this->session->set_flashdata('error_message', get_phrase('Unknown Request. Please register'));
             redirect(base_url(). 'register/index', 'refresh');
       
         }
        
    }

	
}
