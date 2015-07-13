<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class type_withdrawal extends eqm_backend_controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mtr/m_all_withdrawal');
    }
    function index()
    {  
       $data['type_mtr']       =  $this->m_all_withdrawal->get_type_mtr();
       $data['all_withdrawal'] = $this->m_all_withdrawal->get_all_withdrawal();
       $this->load->view('include/mtr/header');
       $this->load->view('mtr/report_mtr/withdrawalpage/type_withdrawal',$data);
       $this->load->view('include/mtr/footer');
    }
    function search_type()
    { 
      $hide_type_id = $this->input->post('hide_type_id');
      $type_id = $this->input->post('type_id');
      if($type_id == "0")
      {
         redirect('report/type_withdrawal','refresh');
         exit;
      }
      else
      { 
        $data['type_id']        = $type_id;
        $data['type_name']      =  "ประเภทที่ค้นหา : ".$hide_type_id ;
        $data['type_mtr']       =  $this->m_all_withdrawal->get_type_mtr();
        $data['all_withdrawal'] = $this->m_all_withdrawal->get_search_withdrawal($type_id);
        $this->load->view('include/mtr/header');
        $this->load->view('mtr/report_mtr/withdrawalpage/type_withdrawal',$data);
        $this->load->view('include/mtr/footer');
      }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */