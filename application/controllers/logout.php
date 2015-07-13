<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class logout extends eqm_backend_controller{
    //put your code here
    public function index()
    {
        //log_activity($this->session->userdata('log_id'), '$activity', '$comment');
        logout_log_activity($this->account_id, date("Y-m-d H:i:s"), $this->session->userdata('log_id'));
        $this->session->unset_userdata('data_account');
        $this->session->unset_userdata('log_id');
        @session_destroy();
        @redirect('login', 'refresh');
    }
}
