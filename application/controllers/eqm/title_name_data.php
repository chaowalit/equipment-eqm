<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class title_name_data extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_title_name');
    }
    function index()
    {
         $data['getall'] = $this->m_title_name->get_all();
         echo $this->load->view('eqm/maindata/submenu/sub_title_name',$data,true);
    }
      function insert_title_name()
    {
         $title_name_number = $this->input->post('title_name_number');
         $title_name   = $this->input->post('title_name');
         //check unit number duplicate
         $data['getall'] = $this->m_title_name->get_all();

         foreach($data['getall'] as $row)
         {
            if($row['title_name_number'] == $title_name_number)
            {
                echo "200";
                exit;
            }
         }
         $data = array(
           'title_name_number' => $title_name_number,
           'title_name'        => $title_name
        );
         $this->m_title_name->insert_title_name( $data );
         $data['getall'] = $this->m_title_name->get_all();
         echo $this->load->view('eqm/maindata/submenu/sub_title_name',$data,true);
    }
     function delete_content()
    {
        $id = $this->input->post('id');
        $this->db->delete('title_name',array('title_name_id' => $id));
        echo "ลบข้อมูลเรียบร้อยแล้ว";
    }
      function edit_title_name()
     {
        $id       = $this->input->post('id');
        $get_edit = $this->m_title_name->get_edit($id);
        echo json_encode($get_edit);
     }
       function update_title_name()
     {
        $title_name_number1      = $this->input->post('title_name_number1');
        $title_name1             = $this->input->post('title_name1');
        $title_id1            = $this->input->post('title_id1');
         $ch = $this->m_title_name->check_dupli($title_name_number1,$title_id1);
        if($ch == 0)
        {
            $data = array(
                   'title_name_number' => $title_name_number1,
                   'title_name'   => $title_name1
                );
            $this->m_title_name->update_title_name($data,$title_id1);
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