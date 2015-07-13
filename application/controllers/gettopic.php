<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class gettopic extends eqm_backend_controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('gettopic');
    }
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */