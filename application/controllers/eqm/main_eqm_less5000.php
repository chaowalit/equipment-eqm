<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class main_eqm_less5000 extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_main_eqm');
    }
    
    function index()
    {   
         $data['eqm'] = $this->m_main_eqm->get_all_data_less();
         $this->load->view('include/eqm/header');
         $this->load->view('eqm/maindata/sub_eqm/sub_eqm_less5000',$data);
         $this->load->view('include/eqm/footer');
    }
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */