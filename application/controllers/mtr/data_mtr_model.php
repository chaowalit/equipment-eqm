<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class data_mtr_model extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('mtr/m_mtr_model');
    }
    function index()
    {
        $data['getall'] = $this->m_mtr_model->get_all(); 
        echo $this->load->view('mtr/maindata/sub_dis/data_mtr_model',$data,true);    
    }
    function edit_unit()
    {
        $id       = $this->input->post('id');
        $get_edit = $this->m_mtr_model->get_edit($id);
        echo json_encode($get_edit);
    }
    function search()
    {
        $txt_search = $this->input->post('txt_search');
        $data['getall'] = $this->m_mtr_model->search($txt_search);
         echo $this->load->view('mtr/maindata/sub_dis/data_mtr_model',$data,true);   
    }
    function insert_mtr_model()
    {
         $model_number          = $this->input->post('model_number');
         $model_name            = $this->input->post('model_name');
         $hide_id2              = $this->input->post('hide_id2');
         
        $count =  $this->m_mtr_model->check_duplicate($model_number);
        if($count > 0)
        {
            echo "200";
            exit;
        }
          $data = array(
             'type_id'              => '',
             'group_type_id'        => $hide_id2 ,
             'type_numbers'         => $model_number,
             'type_names'           => $model_name
          );

        $this->m_mtr_model->insert_mtr_model($data);
        $data['getall'] = $this->m_mtr_model->get_all();
        echo $this->load->view('mtr/maindata/sub_dis/data_mtr_model',$data,true);
    }
     function delete_item()
    {   
        $id = $this->input->post('id');
        //kepp log
        $get_edit = $this->m_mtr_model->get_edit($id);
        $message  = $get_edit['0']['type_names'];
        log_activity($this->session->userdata('log_id') , "บันทึกข้อมูลเบื้องต้น >> หมวดหมู่วัสดุ", "ลบชื่อ/ชนิดวัสดุ  : ".$message);
        //
        $this->db->delete('tbl_mtr_model', array('type_id' => $id)); 
        echo "200";
    }
     function edit_mtr_model()
    {
        $model_number2         = $this->input->post('model_number2');
        $model_name2           = $this->input->post('model_name2');
        $model_hide2           = $this->input->post('model_hide2');
            
        $ch = $this->m_mtr_model->check_dupli($model_number2,$model_hide2 );
        if($ch == 0)
        {
            $data = array(
                   'type_numbers' => $model_number2,
                   'type_names'   => $model_name2
            );
            $this->m_mtr_model->edit_model($data , $model_hide2);
            echo "200";
        }
        else
        {
            echo "300";
        }
    }
    function search_mtr_model()
    {
        $txt_search2 = $this->input->post('txt_search2');
        $data['getall'] = $this->m_mtr_model->search_model($txt_search2);
        echo $this->load->view('mtr/maindata/sub_dis/data_mtr_model',$data,true);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */