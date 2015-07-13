<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class mount_withdrawal extends eqm_backend_controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mtr/m_all_withdrawal');
    }
    function index()
    {
       $data['all_withdrawal'] = $this->m_all_withdrawal->get_all_withdrawal();
       $this->load->view('include/mtr/header');
       $this->load->view('mtr/report_mtr/withdrawalpage/mount_withdrawal',$data);
       $this->load->view('include/mtr/footer');
    }
    function search_mount()
    {
       $mount_from1   = $this->input->post('mount_from');
       $mount_to1     = $this->input->post('mount_to');

       $d1            =  strtotime($mount_from1);
       $mount_from =  date("Y-m-d",$d1);

       $d2            =  strtotime($mount_to1);
       $mount_to =  date("Y-m-d",$d2);

       $data['all_withdrawal'] = $this->m_all_withdrawal->get_searchmount_withdrawal($mount_from,$mount_to);
       $data['mount_from']   = $mount_from1;
       $data['mount_to']     = $mount_to1;

       $this->load->view('include/mtr/header');
       $this->load->view('mtr/report_mtr/withdrawalpage/mount_withdrawal',$data);
       $this->load->view('include/mtr/footer');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */