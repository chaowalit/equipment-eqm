<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class category_of_materials extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('mtr/m_category_of_materials');
    }

    function index()
    {   
        $this->load->view('include/mtr/header');
        $this->load->view('mtr/data_mtr/data_mtr');
        $this->load->view('include/mtr/footer');  
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */