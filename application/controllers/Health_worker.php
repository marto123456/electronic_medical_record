<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Health_worker extends CI_Controller {

	function __construct() {
        parent::__construct();

		$this->load->database();
		$this->load->library('session');
        $this->load->model('health_worker_model');
        $this->load->library('form_validation');
    }

	


	 function dashboard() {
        if ($this->session->userdata('health_worker_login') != 1) redirect(base_url(). 'login', 'refresh');
        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('Health Worker Dashboard');
        $this->load->view('backend/index', $page_data);
    }

    
   

    function patient_admission($param1=null, $param2=null, $param3=null)
    {
        if ($this->session->userdata('health_worker_login') != 1) redirect(base_url(). 'login', 'refresh');
        if ($param1 == 'add') {
            // validation from config file array with a key of // register
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
                
                $this->health_worker_model->insert_patient();
                $this->session->set_flashdata('flash_message', get_phrase('user created successfully'));
                redirect(base_url(). 'health_worker/list_patients', 'refresh');
            }
        }
        $page_data['page_name'] = 'patient_admission';
        $page_data['page_title'] = get_phrase('Patient_Admission');
        $this->load->view('backend/index', $page_data);
    }


    function list_patients($param1=null, $param2=null, $param3=null) {
        if ($this->session->userdata('health_worker_login') != 1) redirect(base_url(). 'login', 'refresh');

        $page_data['page_name'] = 'list_patients';
        $page_data['patients'] = $this->db->get('users')->result_array();
        $page_data['page_title'] = get_phrase('List User');
        $this->load->view('backend/index', $page_data);
    }

   function encounter($patient_id)
   {
       if ($this->session->userdata('health_worker_login') != 1) redirect(base_url(). 'login', 'refresh');

        $page_data['page_name'] = 'Encounter';
        $page_data['patient'] = $this->db->get_where('users', array('user_id' => $patient_id))->result_array();
        $page_data['page_title'] = get_phrase('Patient Encounter');
        $this->load->view('backend/index', $page_data);
   }

   function add_encounter($user_id, $health_worker_id)
   {
       if ($this->session->userdata('health_worker_login') != 1) redirect(base_url(). 'login', 'refresh');

       $this->health_worker_model->insert_encounter($user_id, $health_worker_id);
                $this->session->set_flashdata('flash_message', get_phrase('Encounter Saved'));
                redirect(base_url(). 'health_worker/list_patients', 'refresh');

        $page_data['page_name'] = 'add_encounter';
        // $page_data['patient'] = $this->db->get_where('users', array('user_id' => $patient_id))->result_array();
        $page_data['page_title'] = get_phrase('Add Encounter');
        $this->load->view('backend/index', $page_data);
   }
   
   function list_encounter()
   {
   	    $page_data['page_name'] = 'list_encounter';
        $page_data['encounter'] = $this->db->get_where('encounter', array('health_worker_id' => $this->session->userdata('health_worker_id')))->result_array();
        $page_data['page_title'] = get_phrase('List Encounter');
        $this->load->view('backend/index', $page_data);
   }


   function get_health_worker($health_worker_id, $user_id){
        
        $data = $this->health_worker_model->updateHealthWorker($health_worker_id, $user_id);
        return json_encode($data);
        $this->session->set_flashdata('flash_message', get_phrase('Patient Assigned to Doctor'));
        redirect(base_url(). 'health_worker/list_encounter', 'refresh');
  
    }

	
}
