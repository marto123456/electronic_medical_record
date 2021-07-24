<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->model('patient_model');
        $this->load->library('form_validation');
    }

    
    public function index()
    {
         if ($this->session->userdata('user_login') != 1) redirect(base_url(). 'login', 'refresh');
        if ($this->session->userdata('user_login') == 1) redirect(base_url(). 'user/dashboard', 'refresh');
    }

     function dashboard() {
        if ($this->session->userdata('user_login') != 1) redirect(base_url(). 'login', 'refresh');
        $page_data['page_name'] = 'dashboard';
        $page_data['user']      = $this->db->get('users', array('user_id' => $this->session->userdata('user_id')))->row_array();
        $page_data['user_encounter']      = $this->db->get('encounter', array('user_id' => $this->session->userdata('user_id')))->row_array();
        $page_data['page_title'] = get_phrase('Users Dashboard');
        $this->load->view('backend/index', $page_data);
    }



    function message($param1 = "message_home", $param2 = null, $param3 = null){

        if($param1 == 'send_new'){
            
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('flash_message', ('message_sent_successfully'));  
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

    function get_all_patients(){
        
          $users = $this->db->get('users')->result_array();
          $count = 1;
          foreach ($users as $user) {
            //get the health worker id that a particular user was assigned to in the encounter form
            $en = $this->db->get_where('encounter', array('user_id' => $user['user_id']))->row_array()['send_to'];
            //using the health worker id from above, get the health worker first and last name
            $hw = $this->db->get_where('health_worker', array('health_worker_id' => $en))->row_array();
              

           echo '<tr><td>'.$count++.'</td><td>'.$user['fname'].'</td><td>'.$user['lname'].'</td><td>'.$user['email'].'</td><td>'.$user['gender'].'</td><td>'.$user['age'].'</td><td>'.$user['bmi'].'</td><td>'.$this->patient_model->patient_created_by()['fname'].' '. $this->patient_model->patient_created_by()['lname'].'</td><td>'.$hw['fname']. ' '.$hw['lname'].'<td><a target="_blank" href="'.base_url().'health_worker/encounter/'. $user['user_id'].'" class="text-primary">Encounter</a><a href="" class="text-success">Edit</a><a href="" class="text-danger">Delete</a></td><tr>'; 
           } 
       
   }

    function get_patients_gender($gender)
    {

        if ($gender == '0') {
          $users = $this->db->get('users')->result_array();
          $count = 1;
          foreach ($users as $user) {
            $en = $this->db->get_where('encounter', array('user_id' => $user['user_id']))->row_array()['send_to'];
            $hw = $this->db->get_where('health_worker', array('health_worker_id' => $en))->row_array();
              

           echo '<tr><td>'.$count++.'</td><td>'.$user['fname'].'</td><td>'.$user['lname'].'</td><td>'.$user['email'].'</td><td>'.$user['gender'].'</td><td>'.$user['age'].'</td><td>'.$user['bmi'].'</td><td>'.$this->patient_model->patient_created_by()['fname'].' '. $this->patient_model->patient_created_by()['lname'].'</td><td>'.$hw['fname']. ' '.$hw['lname'].'<td><a target="_blank" href="'.base_url().'health_worker/encounter/'. $user['user_id'].'" class="text-primary">Encounter</a><a href="" class="text-success">Edit</a><a href="" class="text-danger">Delete</a></td><tr>'; 
           } 
        }else{
          $users = $this->db->get_where('users', array('gender' => $gender))->result_array();
          $count = 1;
          foreach ($users as $user) {
            $en = $this->db->get_where('encounter', array('user_id' => $user['user_id']))->row_array()['send_to'];
            $hw = $this->db->get_where('health_worker', array('health_worker_id' => $en))->row_array();
              

           echo '<tr><td>'.$count++.'</td><td>'.$user['fname'].'</td><td>'.$user['lname'].'</td><td>'.$user['email'].'</td><td>'.$user['gender'].'</td><td>'.$user['age'].'</td><td>'.$user['bmi'].'</td><td>'.$this->patient_model->patient_created_by()['fname'].' '. $this->patient_model->patient_created_by()['lname'].'</td><td>'.$hw['fname']. ' '.$hw['lname'].'<td><a target="_blank" href="'.base_url().'health_worker/encounter/'. $user['user_id'].'" class="text-primary">Encounter</a><a href="" class="text-success">Edit</a><a href="" class="text-danger">Delete</a></td><tr>'; 
           } 
       }
     
        
    }

    


   

    
}
