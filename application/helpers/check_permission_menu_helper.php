<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('__permission'))
{
    function __permission($user_id,$controller)
    {
        $CI =& get_instance();
        $CI->load->model('user_account/m_user_account');
        $check = $CI->m_user_account->check_permission_user_account($user_id,$controller);
        if($check){
            return true;
        }else{
            return false;
        }
    }   
}

if ( ! function_exists('create_log_activity'))
{
    function create_log_activity($user_id,$login_time)
    {
        $CI =& get_instance();
        $CI->load->model('m_log_activity');
        $log_id = $CI->m_log_activity->create_log_activityDB($user_id, $login_time);
        $CI->session->set_userdata('log_id',$log_id);
    }   
}

if ( ! function_exists('logout_log_activity'))
{
    function logout_log_activity($user_id, $logout_time, $log_id)
    {
        $CI =& get_instance();
        $CI->load->model('m_log_activity');
        $CI->m_log_activity->logout_log_activityDB($user_id, $logout_time, $log_id);
        
    }   
}

if ( ! function_exists('log_activity'))
{
    function log_activity($log_id, $activity, $comment)
    {
        $CI =& get_instance();
        $CI->load->model('m_log_activity');
        $CI->m_log_activity->log_activityDB($log_id, $activity, $comment);
        
    }   
}