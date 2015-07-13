<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class agency_data extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_agency');
    }
    function index()
    {
         $data['getall'] = $this->m_agency->get_all();
         echo $this->load->view('eqm/maindata/submenu/sub_agency',$data,true);
    }
    function insert_agency()
    {
         $agency_number = $this->input->post('agency_number');
         $agency_name   = $this->input->post('agency_name');
         //check unit number duplicate
         $data['getall'] = $this->m_agency->get_all();

         foreach($data['getall'] as $row)
         {
            if($row['agency_number'] == $agency_number)
            {
                echo "200";
                exit;
            }
         }
         $data = array(
           'agency_number' => $agency_number,
           'agency_name'   => $agency_name
        );
         $this->m_agency->insert_agency( $data );
         $data['getall'] = $this->m_agency->get_all();
         echo $this->load->view('eqm/maindata/submenu/sub_agency',$data,true);
    }
    function delete_content()
    {
        $id = $this->input->post('id');
        $this->db->delete('tbl_agency',array('agency_id' => $id));
        echo "ลบข้อมูลเรียบร้อยแล้ว";
    }
     function edit_agency()
    {
        $id       = $this->input->post('id');
        $get_edit = $this->m_agency->get_edit($id);
        echo json_encode($get_edit);
    }
    function update_agency()
    {   
        $agency_number1      = $this->input->post('agency_number1');
        $agency_name1        = $this->input->post('agency_name1');
        $agency_id1          = $this->input->post('agency_id1');

         $ch = $this->m_agency->check_dupli($agency_number1,$agency_id1);
        if($ch == 0)
        {
             $data = array(
               'agency_number' => $agency_number1,
               'agency_name'   => $agency_name1
            );
            $this->m_agency->update_agency($data,$agency_id1);
             echo "200";
        }
        else
        {
            echo "300";
        }
       
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */