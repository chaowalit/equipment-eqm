<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class main_menu extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
       // $this->load->model('eqm/m_service');
    }
    function index()
    {
    	$this->load->view('include/eqm/header');
        $this->load->view('eqm/maindata/main_menu');
        $this->load->view('include/eqm/footer');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */