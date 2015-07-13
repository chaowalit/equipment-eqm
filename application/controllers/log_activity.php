<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class log_activity extends eqm_backend_controller {
    //put your code here
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_service');
        $this->load->model('mtr/m_withdrawal');
        $this->load->model('mtr/m_purchasing');
        $this->load->model('m_log_activity');
    }
    public function index(){
        $data['log_print'] = $this->m_log_activity->getLogActivity();
        $this->load->view('log_activity',$data);
    }
}
