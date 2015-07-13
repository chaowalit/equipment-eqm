<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';
date_default_timezone_set('Asia/Bangkok');


class report_repair extends eqm_backend_controller{
    //put your code here
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_main_eqm');
    }
    public function index()
    {
         $data['eqm'] = $this->m_main_eqm->get_all_data2();
         $this->load->view('include/eqm/header');
         $this->load->view('eqm/maindata/sub_eqm/sub_eqm_repair',$data);
         $this->load->view('include/eqm/footer');
    }
    
}
