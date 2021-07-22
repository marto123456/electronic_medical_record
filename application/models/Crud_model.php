<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Crud_model extends CI_Model { 
    
    function __construct()
    {
        parent::__construct();
    }

   
function get_type_fname_by_id($type, $type_id = '', $field = 'fname') {
    $this->db->where($type . '_id', $type_id);
    $query = $this->db->get($type);
    $result = $query->result_array();
    foreach ($result as $row)
    return $row[$field];
}

function get_type_lname_by_id($type, $type_id = '', $field = 'lname') {
        $this->db->where($type . '_id', $type_id);
        $query = $this->db->get($type);
        $result = $query->result_array();
        foreach ($result as $row)
        return $row[$field];
    }
    

function get_image_url($type = '', $id = '') {
        if (file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
            $image_url = base_url() . 'uploads/' . $type . '_image/' . $id . '.jpg';
        else
            $image_url = base_url() . 'uploads/user.jpg';
        return $image_url;
    }

function send_new_private_message(){
        $message    = $this->input->post('message');
        $timestamp  = strtotime(date("Y-m-d H:i:s"));
        $receiver   = $this->input->post('receiver');
        $sender     = $this->session->userdata('user_id');

        // check if the thread between those two users exist. if not create a new thread
        $num1 = $this->db->get_where('message_thread', array('sender' => $sender, 'receiver' => $receiver))->num_rows();
        $num2 = $this->db->get_where('message_thread', array('sender' => $receiver, 'receiver' => $sender))->num_rows();
        
        if($num1 == 0 && $num2 == 0){
            $message_thread_code                    =   substr(md5(rand(1000000, 2000000)), 0, 15);
            $data_message['message_thread_code']    =   $message_thread_code;
            $data_message['sender']                 =   $sender;
            $data_message['receiver']               =   $receiver;
            
            $sql = "select * from message_thread order by message_thread_id desc limit 1";
            $return_query = $this->db->query($sql)->row()->message_thread_id + 1;
            $data_message['message_thread_id'] = $return_query;
            $this->db->insert('message_thread', $data_message);
        }

        if($num1 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $sender, 'receiver' => $receiver))->row()->message_thread_code;
        if($num2 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $receiver, 'receiver' => $sender))->row()->message_thread_code;

            $data_message2['message_thread_code']    =   $message_thread_code;
            $data_message2['message']                =   $message;
            $data_message2['sender']                 =   $sender;
            $data_message2['timestamp']              =   $timestamp;

            $sql = "select * from message order by message_id desc limit 1";
            $return_query = $this->db->query($sql)->row()->message_id + 1;
            $data_message2['message_id'] = $return_query;

            $this->db->insert('message', $data_message2);

            return $message_thread_code;
        
    }

function send_new_private_message_for_health_worker(){
        $message    = $this->input->post('message');
        $timestamp  = strtotime(date("Y-m-d H:i:s"));
        $receiver   = $this->input->post('receiver');
        $sender     = $this->session->userdata('health_worker_id');

        // check if the thread between those two users exist. if not create a new thread
        $num1 = $this->db->get_where('message_thread', array('sender' => $sender, 'receiver' => $receiver))->num_rows();
        $num2 = $this->db->get_where('message_thread', array('sender' => $receiver, 'receiver' => $sender))->num_rows();
        
        if($num1 == 0 && $num2 == 0){
            $message_thread_code                    =   substr(md5(rand(1000000, 2000000)), 0, 15);
            $data_message['message_thread_code']    =   $message_thread_code;
            $data_message['sender']                 =   $sender;
            $data_message['receiver']               =   $receiver;
            
            $sql = "select * from message_thread order by message_thread_id desc limit 1";
            $return_query = $this->db->query($sql)->row()->message_thread_id + 1;
            $data_message['message_thread_id'] = $return_query;
            $this->db->insert('message_thread', $data_message);
        }

        if($num1 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $sender, 'receiver' => $receiver))->row()->message_thread_code;
        if($num2 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $receiver, 'receiver' => $sender))->row()->message_thread_code;

            $data_message2['message_thread_code']    =   $message_thread_code;
            $data_message2['message']                =   $message;
            $data_message2['sender']                 =   $sender;
            $data_message2['timestamp']              =   $timestamp;

            $sql = "select * from message order by message_id desc limit 1";
            $return_query = $this->db->query($sql)->row()->message_id + 1;
            $data_message2['message_id'] = $return_query;

            $this->db->insert('message', $data_message2);

            return $message_thread_code;
        
    }


    function send_reply_message($message_thread_code){

        $message    = html_escape($this->input->post('message'));
        $timestamp  = strtotime(date("Y-m-d H:i:s"));
        $sender     = $this->session->userdata('user_id');

        $data_message['message_thread_code']    =   $message_thread_code;
        $data_message['message']                =   $message;
        $data_message['sender']                 =   $sender;
        $data_message['timestamp']              =   $timestamp;

        $sql = "select * from message order by message_id desc limit 1";
        $return_query = $this->db->query($sql)->row()->message_id + 1;
        $data_message['message_id'] = $return_query;

        $this->db->insert('message', $data_message);

    }

    function send_reply_message1($message_thread_code){

        $message    = html_escape($this->input->post('message'));
        $timestamp  = strtotime(date("Y-m-d H:i:s"));
        $sender     = $this->session->userdata('health_worker_id');

        $data_message['message_thread_code']    =   $message_thread_code;
        $data_message['message']                =   $message;
        $data_message['sender']                 =   $sender;
        $data_message['timestamp']              =   $timestamp;

        $sql = "select * from message order by message_id desc limit 1";
        $return_query = $this->db->query($sql)->row()->message_id + 1;
        $data_message['message_id'] = $return_query;

        $this->db->insert('message', $data_message);

    }


    function mark_thread_messages_read($message_thread_code){

        // mark read only the opponent messages of the thread, not the current logged in user's sent message
        $current_user = $this->session->userdata('user_id');
        $this->db->where('sender !=', $current_user);
        $this->db->where('message_thread_code', $message_thread_code);
        $this->db->update('message', array('read_status' => 1));

    }


    function count_unread_message_of_thread($message_thread_code){
        $unread_message_counter = 0;
        $current_user = $this->session->userdata('user_id');
        $current_hw = $this->session->userdata('health_worker_id');
        $messages = $this->db->get_where('message', array('message_thread_code' => $message_thread_code))->result_array();
        foreach ($messages as $key => $row) {
            # code...
            if($row['sender'] != $current_user && $row['read_status'] == 0)
            $unread_message_counter++;
            if($row['sender'] != $current_hw && $row['read_status'] == 0)
            $unread_message_counter++;
        }

        return $unread_message_counter;
    }


    public function get_last_message_by_message_thread_code($message_thread_code){

        $this->db->order_by('message_id', 'desc');
        $this->db->limit(1);
        $this->db->where('message_thread_code', $message_thread_code);
        return $this->db->get('message');

    }

    function get_user_image_url($user_id){

        if(file_exists('uploads/'. $user_id. '.png'))
            return base_url(). 'uploads/'. $user_id. '.png';
        else
        return base_url(). 'uploads/default_image.png';

    }

    function get_all_users($user_id = 0){

        if($user_id > 0){
            $this->db->where('user_id', $user_id);
        }
        return $this->db->get('users');

    }

    function get_user($user_id = 0){

        if($user_id > 0){
            $this->db->where('user_id', $user_id);
        }
        $this->db->where('role_id', 1);
        $this->db->or_where('role_id', 2);
        return $this->db->get('users');
    }
    function get_health_workers($health_worker_id = 0){

        if($health_worker_id > 0){
            $this->db->where('health_worker_id', $health_worker_id);
        }
        $this->db->where('role_id', 3);
        return $this->db->get('health_worker');
    }

    function get_all_health_workers($health_worker_id = 0){

        if($health_worker_id > 0){
            $this->db->where('health_worker_id', $health_worker_id);
        }
        return $this->db->get('health_worker');

    }


}



