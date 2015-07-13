<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class data_group_type extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/dis/m_group_type');
        $this->load->model('eqm/dis/m_eqm_distribution');
    }

    function index()
    {   
        $data['getall'] = $this->m_group_type->get_all();
        $this->load->view('eqm/maindata/sub_dis/data_group_type',$data);
    }
    function insert_group_type()
    {
        $group_type_numbers = $this->input->post('group_type_numbers');
        $group_type_names   = $this->input->post('group_type_names');
        $hid1               = $this->input->post('hid1');
        
        $count =  $this->m_group_type->check_duplicate($group_type_numbers);
        if($count > 0)
        {
            echo "200";
            exit;
        }
        $data = array(
           'depreciation_id'    => $hid1,
           'group_type_numbers' => $group_type_numbers,
           'group_type_names'   => $group_type_names
        );

        $this->m_group_type->insert_group_type($data);
        $data['getall'] = $this->m_group_type->get_all();
        echo $this->load->view('eqm/maindata/sub_dis/data_group_type',$data,true);
    }
    function delete_item()
    {   
        $id = $this->input->post('id');
        $sql  = "select * from tbl_type where group_type_id = '$id' ";
        $result = $this->db->query($sql);
        $result = $result->result_array();


        $sql1  = "select * from tbl_group_type where group_type_id = '$id' ";
        $result1 = $this->db->query($sql1);
        $result1 = $result1->result_array();
        $group_type_names = $result1['0']['group_type_names'];

        $a = array();
        foreach($result as $row)
        {
            array_push($a,$row['type_id']);
        }

        if(count($a) > 0)
        {
            $a = $a ;
        }
        else
        {
            $a = array('');
        }
        
        $this->db->where_in('type_id', $a);
        $this->db->delete('tbl_detail');
        
        $this->db->delete('equipment', array('id_group' => $id)); //ลบครุภัณที่ใช้ค่าเสื่อมนี้
        $this->db->delete('tbl_group_type', array('group_type_id' => $id)); 
        $this->db->delete('tbl_type', array('group_type_id' => $id));

        
        //keep log
        //$this->m_eqm_distribution->keeplog_group_type($group_type_names);
        log_activity($this->session->userdata('log_id') , "บันทึกข้อมูลบื้องต้น >> ประเภททะเบียน/อายุการใช้งาน/ค่าเสื่อม", "ลบกลุ่มประเภท : ".$group_type_names);
        
        echo "200";
    }
    function edit_unit()
    {
        $id       = $this->input->post('id');
        $get_edit = $this->m_group_type->get_edit($id);
        echo json_encode($get_edit);
    }
    function search()
    {
        $txt_search = $this->input->post('txt_search');
        $data['getall'] = $this->m_group_type->search($txt_search);
        echo $this->load->view('eqm/maindata/sub_dis/data_group_type',$data,true);
    }
    function edit_group_type()
    {
        $group_type_numbers1   = $this->input->post('group_type_numbers1');
        $group_type_names1     = $this->input->post('group_type_names1');
        $group_type_id1        = $this->input->post('group_type_id1');
            
        $ch = $this->m_group_type->check_dupli($group_type_numbers1,$group_type_id1 );
        if($ch == 0)
        {
            $data = array(
                   'group_type_numbers' => $group_type_numbers1,
                   'group_type_names' => $group_type_names1
                );
            $data2 = array(
                   'eqm_numbers1' => $group_type_numbers1
                );
            $this->m_group_type->edit_group_type($data ,$data2, $group_type_id1);
            echo "200";
        }
        else
        {
            echo "300";
        }
    }
    function search_group_type()
    {
        $txt_search2 = $this->input->post('txt_search2');
        $data['getall'] = $this->m_group_type->search_group_type($txt_search2);
        echo $this->load->view('eqm/maindata/sub_dis/data_group_type',$data,true);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */