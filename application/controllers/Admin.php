<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();

		$this->load->database();
		$this->load->library('session');
        $this->load->model('admin_model');
        $this->load->library('form_validation');
    }

	
	public function index()
	{
		 if ($this->session->userdata('admin_login') != 1) redirect(base_url(). 'login', 'refresh');
        if ($this->session->userdata('admin_login') == 1) redirect(base_url(). 'admin/dashboard', 'refresh');
	}

	 function dashboard() {
        if ($this->session->userdata('admin_login') != 1) redirect(base_url(). 'login', 'refresh');
        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('Admin Dashboard');
        $this->load->view('backend/index', $page_data);
    }

    function health_worker($param1=null, $param2=null, $param3=null) {
        if ($this->session->userdata('admin_login') != 1) redirect(base_url(). 'login', 'refresh');
        
        if ($param1 == 'add') {

        //validation the data before inserting to database
          
        //if there are validation errors reload the register form else insert the data to database
         if ($this->form_validation->run('health_worker_register') == FALSE) {
            $this->session->set_flashdata('fname_error', form_error('fname'));
            $this->session->set_flashdata('lname_error', form_error('name'));
            $this->session->set_flashdata('email', form_error('email'));
            $this->session->set_flashdata('age', form_error('age'));
            $this->session->set_flashdata('gender', form_error('gender'));
            $this->session->set_flashdata('password', form_error('password'));
            redirect(base_url(). 'admin/health_worker');
           
        } else {
            $this->admin_model->insert_health_worker(); 
            $this->session->set_flashdata('flash_message', get_phrase('Health Worker added successfully'));
            redirect(base_url(). 'admin/list_health_workers', 'refresh');
        }
    }
        $page_data['page_name'] = 'health_worker';
        $page_data['page_title'] = get_phrase('Add Health Worker');
        $this->load->view('backend/index', $page_data);
    }



   function list_health_workers($param1=null, $param2=null, $param3=null) {
        if ($this->session->userdata('admin_login') != 1) redirect(base_url(). 'login', 'refresh');

        $page_data['page_name'] = 'list_health_workers';
        $page_data['health_workers'] = $this->db->get('health_worker')->result_array();
        $page_data['page_title'] = get_phrase('List Health Workers');
        $this->load->view('backend/index', $page_data);
    }

    function patient_admission($param1=null, $param2=null, $param3=null)
    {
        if ($this->session->userdata('admin_login') != 1) redirect(base_url(). 'login', 'refresh');
        if ($param1 == 'add') {
            // validation from config file
            if ($this->form_validation->run('register') == FALSE) {
                 $this->session->set_flashdata('fname_error', form_error('fname'));
                $this->session->set_flashdata('lname_error', form_error('name'));
                $this->session->set_flashdata('email', form_error('email'));
                $this->session->set_flashdata('age', form_error('age'));
                $this->session->set_flashdata('gender', form_error('gender'));
                $this->session->set_flashdata('password', form_error('password'));
                 redirect(base_url(). 'admin/patient_admission', 'refresh');
           
            } else {
                //get the data from the form
                
                $this->admin_model->insert_patient();
                $this->session->set_flashdata('flash_message', get_phrase('user created successfully'));
                redirect(base_url(). 'admin/patient_adminssion', 'refresh');
            }
        }
        $page_data['page_name'] = 'patient_admission';
        $page_data['page_title'] = get_phrase('Patient_Admission');
        $this->load->view('backend/index', $page_data);
    }

     function list_patients($param1=null, $param2=null, $param3=null) {
        if ($this->session->userdata('admin_login') != 1) redirect(base_url(). 'login', 'refresh');

        $page_data['page_name'] = 'list_patients';
        $page_data['patients'] = $this->db->get('users')->result_array();
        $page_data['page_title'] = get_phrase('List Patients');
        $this->load->view('backend/index', $page_data);
    }


    function message($param1 = "message_home", $param2 = null, $param3 = null){

        if($param1 == 'send_new'){
            
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('flash_message', translate('message_sent_successfully'));  
            redirect(base_url(). 'admin/message/message_read/' . $message_thread_code, 'refresh');
        }

        if($param1 == 'send_reply'){
            
            $this->crud_model->send_reply_message($param2); // $param2 = $message_thread_code
            $this->session->set_flashdata('flash_message', translate('message_sent_successfully'));  
            redirect(base_url(). 'admin/message/message_read' . $param2, 'refresh');
        }

        if($param1 == 'message_read'){
            
            $page_data['current_message_thread_code']   = $param2; // $param2 = $message_thread_code
            $this->crud_model->mark_thread_messages_read($param2);
           
        }

        $page_data['message_inner_page_name'] = $param1;
        $page_data['page_name'] = 'message';
        $page_data['page_title'] = ('chat app');
        $this->load->view('backend/index', $page_data); 
    }


   

	
}
