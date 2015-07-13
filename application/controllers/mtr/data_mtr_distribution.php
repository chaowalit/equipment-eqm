<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class data_mtr_distribution extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('mtr/m_category_of_materials');
    }

    function index()
    {   
        $data['getall'] = $this->m_category_of_materials->get_all();
        echo $this->load->view('mtr/maindata/sub_dis/data_mtr_distribution',$data,true);  
    }
    function insert_mtr_distribution()
    {    
         $mtr_code_of_type      = $this->input->post('mtr_code_of_type');
         $mtr_code_of_materials = $this->input->post('mtr_code_of_materials');
        
        
        $count =  $this->m_category_of_materials->check_duplicate($mtr_code_of_type);
        if($count > 0)
        {
            echo "200";
            exit;
        }
         $data = array(
             'group_type_id' =>'',
             'group_type_numbers'   => $mtr_code_of_type,
             'group_type_names'     => $mtr_code_of_materials
          );

        $this->m_category_of_materials->insert_mtr_distribution($data);
        $data['getall'] = $this->m_category_of_materials->get_all();
        echo $this->load->view('mtr/maindata/sub_dis/data_mtr_distribution',$data,true);
    }
     function delete_item()
    {   
        $id = $this->input->post('id');
        //keep log
        $get_edit1 = $this->m_category_of_materials->get_edit($id);
        $message   = $get_edit1['0']['group_type_names'];
         log_activity($this->session->userdata('log_id') , "บันทึกข้อมูลเบื้องต้น >> หมวดหมู่วัสดุ", "ลบประเภทวัสดุ  : ".$message);
         //
        $this->db->delete('tbl_mtr_type', array('group_type_id' => $id)); 
        echo "200";
    }
    function edit_unit()
    {
        $id       = $this->input->post('id');
        $get_edit = $this->m_category_of_materials->get_edit($id);
        echo json_encode($get_edit);
    }
    function edit_mtr_distribution()
    {
        $group_type_numbers1   = $this->input->post('group_type_numbers1');
        $group_type_names1     = $this->input->post('group_type_names1');
        $group_type_hide1        = $this->input->post('group_type_hide1');
            
        $ch = $this->m_category_of_materials->check_dupli($group_type_numbers1,$group_type_hide1 );
        if($ch == 0)
        {
            $data = array(
                   'group_type_numbers' => $group_type_numbers1,
                   'group_type_names' => $group_type_names1
                );
            $this->m_category_of_materials->edit_group_type($data , $group_type_hide1);
            echo "200";
        }
        else
        {
            echo "300";
        }
    }

    function search_mtr_distribution()
    {
        $txt_search1 = $this->input->post('txt_search1');
        $data['getall'] = $this->m_category_of_materials->search_group_type($txt_search1);
        echo $this->load->view('mtr/maindata/sub_dis/data_mtr_distribution',$data,true);
    }
    public function remove_type_category_of_materials(){
        $mtr_type_id = $this->input->post('mtr_type_id');
        
        $this->m_category_of_materials->remove_materials_data($mtr_type_id);
        
        $tbl_mtr_model = $this->m_category_of_materials->get_tbl_mtr_model($mtr_type_id);
        foreach($tbl_mtr_model as $row){
            $this->m_category_of_materials->remove_tbl_mtr_detail($row->type_id);
            
        }
        $this->m_category_of_materials->remove_tbl_mtr_model($mtr_type_id);
        $this->m_category_of_materials->remove_tbl_mtr_type($mtr_type_id);
        echo "ok";
    }
    public function remove_model_category_of_materials(){
        $mtr_model_id = $this->input->post('mtr_model_id');
        
        $this->m_category_of_materials->remove_tbl_mtr_detail($mtr_model_id);
        $this->m_category_of_materials->remove_tbl_mtr_model_v2($mtr_model_id);
        $this->m_category_of_materials->remove_materials_data_model($mtr_model_id);
        echo "ok";
    }
    public function remove_detail_category_of_materials(){
        $mtr_detail_id = $this->input->post('mtr_detail_id');
        
        $this->m_category_of_materials->remove_tbl_mtr_detail_v3($mtr_detail_id);
        $this->m_category_of_materials->remove_materials_data_detail($mtr_detail_id);
        echo "ok";
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */