<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Patient_model extends CI_Model { 
    
    function __construct()
    {
        parent::__construct();
    }

    function patient_created_by()
    {
        $hw = $this->session->userdata('health_worker_id');
        return $hwab = $this->db->get_where('health_worker', array('health_worker_id' => $hw))->row_array();
        echo $hwab['fname'].' '. $hwab['lname'];
    }

   


    
}
