<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class purchasing_report extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_service');
        $this->load->model('mtr/m_purchasing_report');
    }

    function index()
    {   
       $data['get_purchasing'] = $this->m_purchasing_report->get_data_purchasing();
       $this->load->view('mtr/report_mtr/purchasing_report',$data);
    }
    function gen_report($id = "")
    {   
        $data['eqm'] = $this->m_purchasing_report->get_data_purchasing_order($id );
        $html = $this->load->view('report/mtr/purchasing_report',$data,true);
        $this->mpdf= new mPDF('th','A4-L','0');

        $curent_url = base_url()."index.php/mtr/purchasing_report/gen_report"."/".$id;
        $this->mpdf->SetHeader($curent_url."         ".date("Y/m/d"));
        $this->mpdf->SetFooter('{PAGENO}');

        $this->mpdf->WriteHTML($html);
        $this->mpdf->Output("purchasing".$id.'.pdf', 'D');
    }
  
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */