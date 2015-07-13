<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';
date_default_timezone_set('Asia/Bangkok');


class report_distribution extends eqm_backend_controller{
    //put your code here
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_main_eqm');
         $this->load->model('eqm/m_eqm_distribution','',TRUE);
    }
    public function index()
    {
         $this->load->view('include/eqm/header');
         $data['EqmDistribution'] = $this->m_eqm_distribution->getShowDataEqmDistributionDB2();
         // echo "<pre>";
         // print_r($data['EqmDistribution']);
         // echo "</pre>";
         // exit;
         $this->load->view('eqm/maindata/sub_eqm/sub_eqm_distribution',$data);
         $this->load->view('include/eqm/footer');
    }
    
}
