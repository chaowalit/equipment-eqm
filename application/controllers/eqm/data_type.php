<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class data_type extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/dis/m_type');
        $this->load->model('eqm/dis/m_eqm_distribution');
    }

    function index()
    {   
        $data['getall'] = $this->m_type->get_all();
        $this->load->view('eqm/maindata/sub_dis/data_type',$data);
    }
    function insert_type()
    {
        $type_numbers = $this->input->post('type_numbers');
        $type_names   = $this->input->post('type_names');
        $hid2         = $this->input->post('hid2');
        
        $count =  $this->m_type->check_duplicate($type_numbers);
        if($count > 0)
        {
            echo "200";
            exit;
        }
        $data = array(
           'group_type_id'    => $hid2,
           'type_numbers'     => $type_numbers,
           'type_names'       => $type_names
        );

        $this->m_type->insert_type($data);
        $data['getall'] = $this->m_type->get_all();
        echo $this->load->view('eqm/maindata/sub_dis/data_type',$data,true);
    }
    function search()
    {
        $txt_search = $this->input->post('txt_search');
        $data['getall'] = $this->m_type->search($txt_search);
        echo $this->load->view('eqm/maindata/sub_dis/data_type',$data,true);
    }
     function delete_item()
    {   
        $id = $this->input->post('id');
       

        $sql1  = "select * from tbl_type where type_id =  '$id' ";
        $result1 = $this->db->query($sql1);
        $result1 = $result1->result_array();
        $type_names = $result1['0']['type_names'];

        $this->db->delete('equipment', array('id_type' => $id)); //ลบครุภัณที่ใช้ค่าเสื่อมนี้
         $this->db->delete('tbl_type', array('type_id' => $id)); 
        $this->db->delete('tbl_detail', array('type_id' => $id)); 

        //keep log
        //$this->m_eqm_distribution->keeplog_type($type_names);
         log_activity($this->session->userdata('log_id') , "บันทึกข้อมูลบื้องต้น >> ประเภททะเบียน/อายุการใช้งาน/ค่าเสื่อม", "ลบชนิด : ".$type_names);
        echo "200";
    }
     function edit_unit()
    {
        $id       = $this->input->post('id');
        $get_edit = $this->m_type->get_edit($id);
        echo json_encode($get_edit);
    }
    function edit_type()
    {
        $type_numbers1   = $this->input->post('type_numbers1');
        $type_names1     = $this->input->post('type_names1');
        $type_id1        = $this->input->post('type_id1');
            
        $ch = $this->m_type->check_dupli($type_numbers1,$type_id1 );
        if($ch == 0)
        {
            $data = array(
                   'type_numbers' => $type_numbers1,
                   'type_names'   => $type_names1
                );
            $data2 = array(
                   'eqm_numbers2' => $type_numbers1
                );
            $this->m_type->edit_type($data , $data2 ,$type_id1);
            echo "200";
        }
        else
        {
            echo "300";
        }
    }
    function search_type()
    {
        $txt_search3 = $this->input->post('txt_search3');
        $data['getall'] = $this->m_type->search_type($txt_search3);
        echo $this->load->view('eqm/maindata/sub_dis/data_type',$data,true);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */