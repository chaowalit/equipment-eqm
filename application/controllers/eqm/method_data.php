<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class method_data extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_method');
    }
    function index()
    {
         $data['getall'] = $this->m_method->get_all();
         echo $this->load->view('eqm/maindata/submenu/sub_method',$data,true);
    }
    function insert_method()
    {
         $method_number = $this->input->post('method_number');
         $method_name   = $this->input->post('method_name');
         //check unit number duplicate
         $data['getall'] = $this->m_method->get_all();

         foreach($data['getall'] as $row)
         {
            if($row['method_number'] == $method_number)
            {
                echo "200";
                exit;
            }
         }
         $data = array(
           'method_number' => $method_number,
           'method_name'   => $method_name
        );
         $this->m_method->insert_method( $data );
         $data['getall'] = $this->m_method->get_all();
         echo $this->load->view('eqm/maindata/submenu/sub_method',$data,true);
    }
    function delete_content()
    {
        $id = $this->input->post('id');
        $this->db->delete('acquire_method',array('method_id' => $id));
        echo "ลบข้อมูลเรียบร้อยแล้ว";
    }
     function edit_method()
    {
        $id       = $this->input->post('id');
        $get_edit = $this->m_method->get_edit($id);
        echo json_encode($get_edit);
    }
    function update_method()
    {
        $method_number1      = $this->input->post('method_number1');
        $method_name1        = $this->input->post('method_name1');
        $method_id1          = $this->input->post('method_id1');
        $ch = $this->m_method->check_dupli($method_number1,$method_id1);
        if($ch == 0)
        {
            $data = array(
                   'method_number' => $method_number1,
                   'method_name'   => $method_name1
                );
            $this->m_method->update_method($data,$method_id1);
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