<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login_model extends CI_Model { 
    
    function __construct()
    {
        parent::__construct();
    }

    function loginFunctionForAllUsers ($email, $password){
        $user_row = $this->db->get_where('users', array('email' => $email))->row();
         $health_worker_row = $this->db->get_where('health_worker', array('email' => $email))->row();
        if (!empty($user_row->password)) {
            
            if (password_Verify($password, $user_row->password)) {
                //After checking for successfull email and password, also //check that the user has activated their email
                if ($user_row->email_verified == 0) {
                  $this->session->set_flashdata('error_message', ('Please check your inbox and activate your email'));
                 redirect(site_url('login'), 'refresh');
                }

                //set session variables to be used throughout the website
           
                 $this->session->set_userdata('user_id', $user_row->user_id);
                 $this->session->set_userdata('role_id', $user_row->role_id);
                 $this->session->set_userdata('role', get_user_role('user_role', $user_row->user_id));
                
                 $this->session->set_userdata('login_user_id', $user_row->user_id);
                 $this->session->set_userdata('fname', $user_row->fname);

                 //update the user and set login status to 1
                 $this->db->set('login_status', ('1'))
                         ->where('user_id', $this->session->userdata('user_id'))
                         ->update('users');

                 if ($user_row->role_id == 1) {
                     $this->session->set_userdata('admin_login', true);
                     $this->session->set_flashdata('flash_message', ('Successfully Login'));
                     redirect(site_url('admin/dashboard'), 'refresh');
                 }else if($user_row->role_id == 2){
                     $this->session->set_userdata('user_login', true);
                     $this->session->set_flashdata('flash_message', ('Successfully Login'));
                     redirect(site_url('patient/dashboard'), 'refresh');
                 }        
        }else{
              $this->session->set_flashdata('error_message', ('Invalid Username or Password'));
             redirect(site_url('login'), 'refresh');
        }
        }elseif (!empty($health_worker_row->password)) {
            if (password_Verify($password, $health_worker_row->password)) {

                //set session variables to be used throughout the website
           
                 $this->session->set_userdata('health_worker_id', $health_worker_row->health_worker_id);
                 $this->session->set_userdata('role_id', $health_worker_row->role_id);
                 $this->session->set_userdata('role', get_health_worker_role('health_worker_role', $health_worker_row->health_worker_id));
                 $this->session->set_userdata('login_user_id', $health_worker_row->health_worker_id);
                 $this->session->set_userdata('fname', $health_worker_row->fname);

                if ($health_worker_row->role_id == 3) {
                      $this->session->set_userdata('health_worker_login', true);
                     $this->session->set_flashdata('flash_message', ('Successfully Login'));
                     redirect(site_url('health_worker/dashboard'), 'refresh');  
                 }
                
                 
        }else{
              $this->session->set_flashdata('error_message', ('Invalid Username or Password'));
             redirect(site_url('login'), 'refresh');
        }
        }else{
            $this->session->set_flashdata('error_message', ('Invalid Username or Password'));
             redirect(site_url('login'), 'refresh');
        }

        /////////////////////////////////////////////////////////////////
        //                                                               //     
        //             The health worker login  //                                           //                                              
        //
        /////////////////////////////////////////////////////////////////

       
        

    }

    

    function logout_model_for_user(){
        return  $this->db->set('login_status', ('0'))
                    ->where('user_id', $this->session->userdata('user_id'))
                    ->update('users');
    }

    function logout_model_for_health_worker(){
        return  $this->db->set('login_status', ('0'))
                    ->where('health_worker_id', $this->session->userdata('health_worker_id'))
                    ->update('health_worker');
    }
    
}
