<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class data_eqm_distribution extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/dis/m_eqm_distribution');
    }

    function index()
    {   
        $data['check']  = $this->m_eqm_distribution->get_check();
        $data['getall'] = $this->m_eqm_distribution->get_all();
        $this->load->view('eqm/maindata/sub_dis/data_eqm_distribution',$data);
    }
    function insert_eqm_distribution()
    {
        $depreciation_number = $this->input->post('depreciation_number');
        $depreciation_type   = $this->input->post('depreciation_type');
        $depreciation_age = $this->input->post('depreciation_age');
        $depreciation_year = $this->input->post('depreciation_year');

        $data = array(
           'depreciation_number' => $depreciation_number,
           'depreciation_type'   => $depreciation_type,
           'depreciation_age'    => $depreciation_age,
           'depreciation_year'   => $depreciation_year
        );

        $this->m_eqm_distribution->insert_eqm_distribution($data);
        $data['getall'] = $this->m_eqm_distribution->get_all();
        echo $this->load->view('eqm/maindata/sub_dis/data_eqm_distribution',$data,true);
    }
    function delete_item()
    {   
        $id = $this->input->post('id');

        $sql  = "select * from tbl_group_type where depreciation_id = '$id' ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        $group_type_id = $result['0']['group_type_id'];

        $sql2  = "select * from tbl_depreciation  where depreciation_id = '$id' ";
        $result2 = $this->db->query($sql2);
        $result2 = $result2->result_array();
        $depreciation_type = $result2['0']['depreciation_type'];

        $a = array();
        foreach($result as $row)
        {
            array_push($a,$row['group_type_id']);
        }
        $data1 =  implode(",",$a);
        if(strlen($data1) == 0)
        {
             $sql1  = "select * from tbl_type where group_type_id IN ('')";
        }
        else
        {
             $sql1  = "select * from tbl_type where group_type_id IN ($data1)";    
        }
        $result1 = $this->db->query($sql1);
        $result1 = $result1->result_array();
        $b = array();
        foreach($result1 as $row)
        {
            array_push($b,$row['type_id']);
        }
        $this->db->delete('equipment', array('id_depreciation' => $id)); //ลบครุภัณที่ใช้ค่าเสื่อมนี้
        $this->db->delete('tbl_depreciation', array('depreciation_id' => $id)); //ลบค่าเสื่อมราคา
        $this->db->delete('tbl_group_type', array('depreciation_id' => $id)); //ลบกลุ่มประเภท
        if(count($a) > 0)
        {
            $a = $a ;
        }
        else
        {
            $a = array('');
        }
        $this->db->where_in('group_type_id', $a);
        $this->db->delete('tbl_type');


        if(count($b) > 0)
        {
            $b = $b ;
        }
        else
        {
            $b = array('');
        }
        $this->db->where_in('type_id', $b);
        $this->db->delete('tbl_detail');

        //keep log

        $this->m_eqm_distribution->keeplog($depreciation_type);
        log_activity($this->session->userdata('log_id') , " บันทึกข้อมูลบื้องต้น >> ประเภททะเบียน/อายุการใช้งาน/ค่าเสื่อม", "ลบประเภทค่าเสื่อมราคา : ".$depreciation_type);
       // echo $this->log_id;
        echo "200";
    }
     function edit_unit()
    {
        $id       = $this->input->post('id');
        $get_edit = $this->m_eqm_distribution->get_edit($id);
        echo json_encode($get_edit);
    }
    function edit_eqm_distribution()
    {
        $depreciation_number1   = $this->input->post('depreciation_number1');
        $depreciation_type1     = $this->input->post('depreciation_type1');
        $depreciation_age1      = $this->input->post('depreciation_age1');
        $depreciation_year1     = $this->input->post('depreciation_year1');
        $depreciation_id1       = $this->input->post('depreciation_id1');
        $data = array(
               'depreciation_number' => $depreciation_number1,
               'depreciation_type' => $depreciation_type1,
               'depreciation_age' => $depreciation_age1,
               'depreciation_year' => $depreciation_year1
            );
        $this->m_eqm_distribution->edit_eqm_distribution($data , $depreciation_id1);
        echo "200";
    }
    function search_eqm_distribution(){
        $txt_search1 = $this->input->post('txt_search1');
        $data['getall'] = $this->m_eqm_distribution->search_eqm_distribution($txt_search1);
        echo $this->load->view('eqm/maindata/sub_dis/data_eqm_distribution',$data,true);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */