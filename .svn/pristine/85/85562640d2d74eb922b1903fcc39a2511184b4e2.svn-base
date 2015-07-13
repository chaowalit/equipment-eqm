<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class data_mtr_detail extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('mtr/m_mtr_detail');
    }
    function index()
    {
        $data['getall'] = $this->m_mtr_detail->get_all(); 
        echo $this->load->view('mtr/maindata/sub_dis/data_mtr_detail',$data,true);    
    }
    function edit_unit()
    {
        $id       = $this->input->post('id');
        $get_edit = $this->m_mtr_detail->get_edit($id);
        echo json_encode($get_edit);
    }
    function search()
    {
        $txt_search = $this->input->post('txt_search');
        $data['getall'] = $this->m_mtr_detail->search($txt_search);
         echo $this->load->view('mtr/maindata/sub_dis/data_mtr_detail',$data,true);   
    }
    function insert_mtr_detail()
    {
         $detail_number          = $this->input->post('detail_number');
         $detail_name            = $this->input->post('detail_name');
         $hide_id3              = $this->input->post('hide_id3');

        $count =  $this->m_mtr_detail->check_duplicate($detail_number);
        if($count > 0)
        {
            echo "200";
            exit;
        }
          $data = array(
             'detail_id'              => '',
             'type_id'                => $hide_id3,
             'detail_number'          => $detail_number,
             'detail_name'            => $detail_name
          );

        $this->m_mtr_detail->insert_mtr_detail($data);
        $data['getall'] = $this->m_mtr_detail->get_all(); 
        echo $this->load->view('mtr/maindata/sub_dis/data_mtr_detail',$data,true);   
    }
     function delete_item()
    {   
        $id = $this->input->post('id');
        //keeplog
        $get_edit = $this->m_mtr_detail->get_edit($id);
        $message  = $get_edit['0']['detail_name'];
        log_activity($this->session->userdata('log_id') , "บันทึกข้อมูลเบื้องต้น >> หมวดหมู่วัสดุ", "ลบขนาด/ลักษณะ  : ".$message);
        //
        $this->db->delete('tbl_mtr_detail', array('detail_id' => $id)); 
        echo "200";
    }
     function edit_mtr_detail()
    {
        $detail_number3         = $this->input->post('detail_number3');
        $detail_name3           = $this->input->post('detail_name3');
        $detail_hide3           = $this->input->post('detail_hide3');
            
        $ch = $this->m_mtr_detail->check_dupli($detail_number3,$detail_hide3 );
        if($ch == 0)
        {
            $data = array(
                   'detail_number' => $detail_number3,
                   'detail_name'   => $detail_name3
            );
            $this->m_mtr_detail->edit_model($data , $detail_hide3);
            echo "200";
        }
        else
        {
            echo "300";
        }
    }
    function search_mtr_detail()
    {
        $txt_search3 = $this->input->post('txt_search3');
        $data['getall'] = $this->m_mtr_detail->search_detail($txt_search3);
        echo $this->load->view('mtr/maindata/sub_dis/data_mtr_detail',$data,true);
    }
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */