<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class working_group_data extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_working_group');
    }
    function index()
    {
         $data['getall'] = $this->m_working_group->get_all();
         echo $this->load->view('eqm/maindata/submenu/sub_working_group',$data,true);
    }
     function insert_working_group()
    {
         $working_group_number = $this->input->post('working_group_number');
         $working_group_name   = $this->input->post('working_group_name');
         //check unit number duplicate
         $data['getall'] = $this->m_working_group->get_all();

         foreach($data['getall'] as $row)
         {
            if($row['working_group_number'] == $working_group_number)
            {
                echo "200";
                exit;
            }
         }
         $data = array(
           'working_group_number' => $working_group_number,
           'working_group_name'   => $working_group_name
        );
         $this->m_working_group->insert_working_group( $data );
         $data['getall'] = $this->m_working_group->get_all();
         echo $this->load->view('eqm/maindata/submenu/sub_working_group',$data,true);
    }
      function delete_content()
    {
        $id = $this->input->post('id');
        $this->db->delete('working_group',array('working_group_id' => $id));
        echo "ลบข้อมูลเรียบร้อยแล้ว";
    }
     function edit_working_group()
     {
        $id       = $this->input->post('id');
        $get_edit = $this->m_working_group->get_edit($id);
        echo json_encode($get_edit);
     }
      function update_working_group()
     {
        $working_group_number1      = $this->input->post('working_group_number1');
        $working_group_name1        = $this->input->post('working_group_name1');
        $working_group_id1          = $this->input->post('working_group_id1');
        $ch = $this->m_working_group->check_dupli($working_group_number1,$working_group_id1);
        if($ch == 0)
        {
            $data = array(
                   'working_group_number' => $working_group_number1,
                   'working_group_name'   => $working_group_name1
                );
            $this->m_working_group->update_working_group($data,$working_group_id1);
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