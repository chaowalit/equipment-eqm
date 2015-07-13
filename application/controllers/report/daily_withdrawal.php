<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class daily_withdrawal extends eqm_backend_controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mtr/m_all_withdrawal');
    }
    function index()
    {
       $data['all_withdrawal'] = $this->m_all_withdrawal->get_all_withdrawal();
       $this->load->view('include/mtr/header');
       $this->load->view('mtr/report_mtr/withdrawalpage/daily_withdrawal',$data);
       $this->load->view('include/mtr/footer');
    }
    function search_daily()
    {
       $date_daily   = $this->input->post('daily_date');
       $d            =  strtotime($date_daily);
       $data_compare =  date("Y-m-d",$d);
       
       $data['all_withdrawal'] = $this->m_all_withdrawal->get_searchdaily_withdrawal($data_compare);
       $data['data_compares']   = $date_daily;
       $this->load->view('include/mtr/header');
       $this->load->view('mtr/report_mtr/withdrawalpage/daily_withdrawal',$data);
       $this->load->view('include/mtr/footer');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */