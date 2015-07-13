<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class be_under_data extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_be_under');
    }
    function index()
    {
         $data['getall'] = $this->m_be_under->get_all();
         echo $this->load->view('eqm/maindata/submenu/sub_be_under',$data,true);
    }
    function insert_be_under()
    {
         $be_under_number = $this->input->post('be_under_number');
         $be_under_name   = $this->input->post('be_under_name');
         //check unit number duplicate
         $data['getall'] = $this->m_be_under->get_all();

         foreach($data['getall'] as $row)
         {
            if($row['be_under_number'] == $be_under_number)
            {
                echo "200";
                exit;
            }
         }
         $data = array(
           'be_under_number' => $be_under_number,
           'be_under_name'   => $be_under_name
        );
         $this->m_be_under->insert_be_under( $data );
         $data['getall'] = $this->m_be_under->get_all();
         echo $this->load->view('eqm/maindata/submenu/sub_be_under',$data,true);
    }
    function delete_content()
    {
        $id = $this->input->post('id');
        $this->db->delete('be_under_company',array('be_under_id' => $id));
        echo "ลบข้อมูลเรียบร้อยแล้ว";
    }
     function edit_be_under()
    {
        $id       = $this->input->post('id');
        $get_edit = $this->m_be_under->get_edit($id);
        echo json_encode($get_edit);
    }
    function update_be_under()
    {
        $be_under_number1      = $this->input->post('be_under_number1');
        $be_under_name1        = $this->input->post('be_under_name1');
        $be_under_id1          = $this->input->post('be_under_id1');
        $ch = $this->m_be_under->check_dupli($be_under_number1,$be_under_id1);
        if($ch == 0)
        {
            $data = array(
                   'be_under_number' => $be_under_number1,
                   'be_under_name'   => $be_under_name1
                );
            $this->m_be_under->update_be_under($data,$be_under_id1);
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