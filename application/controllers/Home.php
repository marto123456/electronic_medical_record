<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();

		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('register_model');
    }

	
	public function register()
	{
		
		$this->load->view('backend/register');
	}

	public function register_validation($param1=null, $param2=null, $param3=null)
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
                'rules' => 'required|min(8)',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                    'min' => '%s must be 8 characters long',
                ),
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
        //if therer are validation errors reload the register form, else insert the data to database
         if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/register');
           
        } else {
        	//get the data from the form
            
            $this->register_model->insert_user();
            $this->session->set_flashdata('flash_message', get_phrase('user registered successfully'));
            redirect(base_url(). 'login/index', 'refresh');
        }
	}

   

	
}
