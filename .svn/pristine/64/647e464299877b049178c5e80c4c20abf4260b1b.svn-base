<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class unit_data extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_unit');
    }
    function index()
    {
         $data['getall'] = $this->m_unit->get_all();
         echo $this->load->view('eqm/maindata/submenu/sub_unit',$data,true);
    }
    function index2()
    {
        $data['getall'] = $this->m_unit->get_all();
        $json_data = $data['getall'];
        echo json_encode($json_data);
    }
    function insert_unit()
    {
         $unit_number = $this->input->post('unit_number');
         $unit_name   = $this->input->post('unit_name');
         //check unit number duplicate
         $data['getall'] = $this->m_unit->get_all();

         foreach($data['getall'] as $row)
         {
            if($row['unit_number'] == $unit_number)
            {
                echo "200";
                exit;
            }
         }
         $data = array(
           'unit_number' => $unit_number,
           'unit_name'   => $unit_name
        );
         $this->m_unit->insert_unit( $data );
         $data['getall'] = $this->m_unit->get_all();
         echo $this->load->view('eqm/maindata/submenu/sub_unit',$data,true);
    }
    function delete_content()
    {
        $id = $this->input->post('id');
        $this->db->delete('tbl_unit',array('unit_id' => $id));
        echo "ลบข้อมูลเรียบร้อยแล้ว";
    }
    function edit_unit()
    {
        $id       = $this->input->post('id');
        $get_edit = $this->m_unit->get_edit($id);
        echo json_encode($get_edit);
    }
    function update_unit()
    {
        $unit_number1      = $this->input->post('unit_number1');
        $unit_name1        = $this->input->post('unit_name1');
        $unit_id           = $this->input->post('unit_id');
        $ch = $this->m_unit->check_dupli($unit_number1,$unit_id);
        if($ch == 0)
        {
            $data = array(
               'unit_number' => $unit_number1,
               'unit_name'   => $unit_name1
            );
             $this->m_unit->update_unit($data,$unit_id);
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