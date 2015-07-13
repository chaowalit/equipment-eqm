<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';
date_default_timezone_set('Asia/Bangkok');


class report_transfer extends eqm_backend_controller{
    //put your code here
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_main_eqm');
        $this->load->model('eqm/m_eqm_transfer');
    }
    public function index()
    {
        $data['EqmTransfer'] = $this->m_eqm_transfer->getShowDataEqmTransferDB2();

        // echo "<pre>";
        // print_r($data['EqmTransfer']);
        // echo "</pre>";
        // exit;
        $workG =  $this->m_eqm_transfer->getDataWorkGroupToArray();
        $workgroup = array();
        foreach($workG as $row){
            $workgroup[$row->be_under_id] = $row->be_under_name;
        }
        $userAc = $this->m_eqm_transfer->getDataUserAccountToArray();
        $user_account = array();
        foreach($userAc as $row){
            $user_account[$row->id] = $row->full_name;
        }
        $data['workgroup'] = $workgroup;
        $data['user_account'] = $user_account;

        $this->load->view('include/eqm/header');
        $this->load->view('eqm/maindata/sub_eqm/sub_eqm_transfer',$data);
        $this->load->view('include/eqm/footer');

    }
    
}
