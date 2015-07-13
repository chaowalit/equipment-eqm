<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class data_detail extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/dis/m_detail');
        $this->load->model('eqm/dis/m_eqm_distribution');
    }

    function index()
    {   
        $data['getall'] = $this->m_detail->get_all();
        $this->load->view('eqm/maindata/sub_dis/data_detail',$data);
    }
    function insert_detail()
    {
        $detail_numbers = $this->input->post('detail_numbers');
        $detail_names     = $this->input->post('detail_names');
        $hid3         = $this->input->post('hid3');
        
        $count =  $this->m_detail->check_duplicate($detail_numbers);
        if($count > 0)
        {
            echo "200";
            exit;
        }
        $data = array(
           'type_id'    => $hid3,
           'detail_numbers'     => $detail_numbers,
           'detail_names'       => $detail_names
        );

        $this->m_detail->insert_detail($data);
        $data['getall'] = $this->m_detail->get_all();
        echo $this->load->view('eqm/maindata/sub_dis/data_detail',$data,true);
    }
    function delete_item()
    {   
        $id = $this->input->post('id');

         $sql1  = "select * from tbl_detail where detail_id =  '$id' ";
        $result1 = $this->db->query($sql1);
        $result1 = $result1->result_array();
        $detail_names = $result1['0']['detail_names'];

         $this->db->delete('equipment', array('id_detail' => $id)); //ลบครุภัณที่ใช้ค่าเสื่อมนี้
        $this->db->delete('tbl_detail', array('detail_id' => $id)); 

        //keeplog
        // $this->m_eqm_distribution->keeplog_detail($detail_names);
         log_activity($this->session->userdata('log_id') , "บันทึกข้อมูลบื้องต้น >> ประเภททะเบียน/อายุการใช้งาน/ค่าเสื่อม", "ลบชื่อ/รายละเอียด : ".$detail_names);
         echo "200";
    }
    function edit_unit()
    {
        $id       = $this->input->post('id');
        $get_edit = $this->m_detail->get_edit($id);
        echo json_encode($get_edit);
    }
     function edit_detail()
    {
        $detail_numbers1   = $this->input->post('detail_numbers1');
        $detail_names1     = $this->input->post('detail_names1');
        $detail_id1        = $this->input->post('detail_id1');
            
        $ch = $this->m_detail->check_dupli($detail_numbers1,$detail_id1 );
        if($ch == 0)
        {
             $data = array(
                   'detail_numbers' => $detail_numbers1,
                   'detail_names'   => $detail_names1
                );
             $data2 = array(
                   'eqm_numbers3' => $detail_numbers1,
                   'eqm_names'   => $detail_names1
                );
            $this->m_detail->edit_detail($data , $data2 ,$detail_id1);
            echo "200";
        }
        else
        {
            echo "300";
        }
     }
    function search_detail()
     {
        $txt_search4 = $this->input->post('txt_search4');
        $data['getall'] = $this->m_detail->search_detail($txt_search4);
        echo $this->load->view('eqm/maindata/sub_dis/data_detail',$data,true);
     }
     function search()
     {
        $txt_search = $this->input->post('txt_search');
        $data['getall'] = $this->m_detail->search($txt_search);
        echo $this->load->view('eqm/maindata/sub_dis/data_detail',$data,true);
     }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */