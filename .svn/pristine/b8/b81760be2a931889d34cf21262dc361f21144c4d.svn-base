<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class all_withdrawal extends eqm_backend_controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mtr/m_all_withdrawal');
    }
    function index()
    {  
       $data['all_withdrawal'] = $this->m_all_withdrawal->get_all_withdrawal();
       $this->load->view('include/mtr/header');
       $this->load->view('mtr/report_mtr/withdrawalpage/all_withdrawal',$data);
       $this->load->view('include/mtr/footer');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */