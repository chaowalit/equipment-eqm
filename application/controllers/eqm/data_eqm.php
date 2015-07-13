<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class data_eqm extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_data_eqm');
    }
    
    function index()
    {   
        $this->load->view('include/eqm/header');
        $this->load->view('eqm/maindata/data_eqm');
        $this->load->view('include/eqm/footer');
    }
    function get_number1()
    {
         $id = $this->input->post('id');
         $sql = "select * from tbl_type where group_type_id  = $id";
         $result = $this->db->query($sql);
         $result = $result->result_array();
         header('Content-Type: application/json');

        echo json_encode( $result );
    }
     function get_number2()
    {
         $id = $this->input->post('id');
         $sql = "select * from tbl_detail where type_id  = $id";
         $result = $this->db->query($sql);
         $result = $result->result_array();
         header('Content-Type: application/json');

         echo json_encode( $result );
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */