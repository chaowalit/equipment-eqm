<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class type_budget_data extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_type_budget');
    }
    function index()
    {
         $data['getall'] = $this->m_type_budget->get_all();
         echo $this->load->view('eqm/maindata/submenu/sub_type_budget',$data,true);
    }
    function insert_type_budget()
    {
         $type_budget_number = $this->input->post('type_budget_number');
         $type_budget_name   = $this->input->post('type_budget_name');
         //check unit number duplicate
         $data['getall'] = $this->m_type_budget->get_all();

         foreach($data['getall'] as $row)
         {
            if($row['type_budget_number'] == $type_budget_number)
            {
                echo "200";
                exit;
            }
         }
         $data = array(
           'type_budget_number' => $type_budget_number,
           'type_budget_name'   => $type_budget_name
        );
         $this->m_type_budget->insert_type_budget( $data );
         $data['getall'] = $this->m_type_budget->get_all();
         echo $this->load->view('eqm/maindata/submenu/sub_type_budget',$data,true);
    }
    function delete_content()
    {
        $id = $this->input->post('id');
        $this->db->delete('type_budget',array('type_budget_id' => $id));
        echo "ลบข้อมูลเรียบร้อยแล้ว";
    }
    function edit_type_budget()
    {
        $id       = $this->input->post('id');
        $get_edit = $this->m_type_budget->get_edit($id);
        echo json_encode($get_edit);
    }
    function update_type_budget()
    {
        $type_budget_number1      = $this->input->post('type_budget_number1');
        $type_budget_name1        = $this->input->post('type_budget_name1');
        $type_budget_id1          = $this->input->post('type_budget_id1');
        $ch = $this->m_type_budget->check_dupli($type_budget_number1,$type_budget_id1);
        if($ch == 0)
        {
             $data = array(
               'type_budget_number' => $type_budget_number1,
               'type_budget_name'   => $type_budget_name1
            );
             $this->m_type_budget->update_type_budget($data,$type_budget_id1);
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