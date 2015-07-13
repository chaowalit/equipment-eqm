<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';
date_default_timezone_set('Asia/Bangkok');

class notify_alert extends eqm_backend_controller{
    //put your code here
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_account/m_user_account','',TRUE);
        $this->load->model('eqm/m_profile_account','',TRUE);
        $this->load->model('eqm/m_eqm_transfer','',TRUE);
        $this->load->model('eqm/m_eqm_distribution','',TRUE);
        $this->load->model('m_notify_alert','',TRUE);
    }
    public function repair_finish($repair_id){
        $this->m_notify_alert->changeNotifyAlertFinish($repair_id);
        redirect('eqm/eqm_repair','refresh');
    }
    public function repair_notify_alert($repair_id){
        
    }
}
