<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_user_role'))
{
	function get_user_role($type = "", $user_id = '') {
		$CI	=&	get_instance();
		$CI->load->database();

        $role_id	=	$CI->db->get_where('users' , array('user_id' => $user_id))->row()->role_id;
        $user_role	=	$CI->db->get_where('role' , array('role_id' => $role_id))->row()->name;

        if ($type == "user_role") {
            return $user_role;
        }else {
            return $role_id;
        }
	}
}

if ( ! function_exists('get_health_worker_role'))
{
    function get_health_worker_role($type = "", $health_worker_id = '') {
        $CI =&  get_instance();
        $CI->load->database();

        $role_id    =   $CI->db->get_where('health_worker' , array('health_worker_id' => $health_worker_id))->row()->role_id;
        $health_worker_role  =   $CI->db->get_where('role' , array('role_id' => $role_id))->row()->name;

        if ($type == "health_worker_role") {
            return $health_worker_role;
        }else {
            return $role_id;
        }
    }
}