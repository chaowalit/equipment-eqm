<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class register_mtr extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_service');
        $this->load->model('mtr/m_register_mtr');
    }

    function index()
    {
        $data['type_group'] = $this->m_register_mtr->getTypeGroup_mtr();        
        $data['unit_count'] = $this->m_register_mtr->getAllUnitCount();
        $this->load->view('mtr/register_mtr',$data);
        
    }
    public function AddRegisterMaterials(){
        $mtr_number = $this->input->post('mtr_number');
        $mtr_name = $this->input->post('mtr_name');
        $mtr_unit = $this->input->post('mtr_unit');
        $mtr_balance = $this->input->post('mtr_balance');
        $min_amount = $this->input->post('min_amount');
        $max_amount = $this->input->post('max_amount');
        $mtr_address = $this->input->post('mtr_address');
        $mtr_detail = $this->input->post('mtr_detail');
        $materials_id = $this->input->post('materials_id');
        
        $temp1 = $this->m_register_mtr->checkCategory_of_materials($this->input->post('mtr_detail_info'));
        
        if(!$materials_id){
            $data = array(
                "tbl_mtr_type_id" => $this->input->post('mtr_type_info'),
                "tbl_mtr_model_id" => $this->input->post('mtr_model_info'),
                "tbl_mtr_detail_id" => $temp1[0]['detail_id'],
                "mtr_number" => $mtr_number,
                "mtr_name" => $mtr_name,
                "mtr_unit" => $mtr_unit,
                "mtr_balance" => $mtr_balance,
                "min_amount" => $min_amount,
                "max_amount" => $max_amount,
                "mtr_address" => $mtr_address,
                "mtr_detail" => $mtr_detail,
                "created" => date("Y-m-d H:i:s"),
                "updated" => date("Y-m-d H:i:s")
            );
            $this->m_register_mtr->AddRegisterMaterialsToDB($data);
            log_activity($this->session->userdata('log_id') , "บันทึกข้อมูลทะเบียน >> ทะเบียนวัสดุ", "บันทึกทะเบียนวัสดุ : ".$mtr_name);
            echo "บันทึกทะเบียนวัสดุ เรียบร้อยแล้ว";
        }else{
            $data = array(
                "tbl_mtr_type_id" => $this->input->post('mtr_type_info'),
                "tbl_mtr_model_id" => $this->input->post('mtr_model_info'),
                "tbl_mtr_detail_id" => $temp1[0]['detail_id'],
                "mtr_number" => $mtr_number,
                "mtr_name" => $mtr_name,
                "mtr_unit" => $mtr_unit,
                "mtr_balance" => $mtr_balance,
                "min_amount" => $min_amount,
                "max_amount" => $max_amount,
                "mtr_address" => $mtr_address,
                "mtr_detail" => $mtr_detail,
                //"created" => date("Y-m-d H:i:s"),
                "updated" => date("Y-m-d H:i:s")
            );
            $this->m_register_mtr->UpdateRegisterMaterialsToDB($data,$materials_id);
            log_activity($this->session->userdata('log_id') , "บันทึกข้อมูลทะเบียน >> ทะเบียนวัสดุ", "ปรับปรุงทะเบียนวัสดุ : ".$mtr_name);
            echo "ปรับปรุงทะเบียนวัสดุ เรียบร้อยแล้ว";
        }
        
    }
    public function getReport_mtr($materials_id = "")
    {   
        //Header data 
        $result_type = $this->m_register_mtr->get_type_name($materials_id);
        foreach($result_type as $row)
        {
            $data['type_name']       = $row['group_type_names'];
            $data['mtr_numbers']     = $row['group_type_numbers']."-".$row['type_numbers']."-".$row['detail_number'];
            $data['min_amount']      = $row['min_amount'];
            $data['max_amount']      = $row['max_amount'];
            $data['mtr_address']     = $row['mtr_address'];
            $data['mtr_detail']      = $row['mtr_detail'];
        }

        //exit;
        //Table data
        $sql    = "select * from transaction_mtr";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
        // exit;
        $my_array = array();
        foreach($result as $row)
        {   
             $id = "";
             $type = "";
             $ids  = $row['id'];
             if($row['type_transaction'] == "purchasing" && $row['active'] == 1)
             {      
                    $type = "1";
             }
             else if($row['type_transaction'] == "withdrawal" && $row['active'] == 1)
             {      
                    $type = "2"; 
             }
             if($type == "1")
             {
                 $data_result = $this->m_register_mtr->getDataMtr1($materials_id,$ids);
             }
             else
             {
                 $data_result =  $this->m_register_mtr->getDataMtr2($materials_id,$ids);
             }
             array_push($my_array,$data_result);
        }

        $data['mydata'] = array_filter($my_array);
        $html  =  $this->load->view('report/mtr/gen_report_mtr',$data,true);
        $this->mpdf= new mPDF('th','A4-L','0'); //เรียกใช้งาน mPDF ส่งค่า parameter เข้าไปครับ
        $curent_url =  base_url()."index.php/mtr/register_mtr/getReport_mtr/".$materials_id;
        $this->mpdf->SetHeader($curent_url."         ".date("Y/m/d"));
        $this->mpdf->SetFooter('{PAGENO}');
        $this->mpdf->WriteHTML($html);
        $this->mpdf->Output("Mtr".$materials_id.'.pdf', 'D');
    }
    public function getShowAllDataRegisterMaterials(){
        $data['mtr_register'] = $this->m_register_mtr->getShowAllDataRegisterMaterialsDB();
        
        $this->load->view('mtr/list_register_mtr',$data);
    }
    public function getDataEditRegister_mtr(){
        $materials_id = $this->input->post('materials_id');
        $result = $this->m_register_mtr->getDataEditRegister_mtrDB($materials_id);
        echo json_encode($result);
    }
    public function getDataTypeGroup_mtr(){
        $select_num_type_mtr = $this->input->post('select_num_type_mtr');
        $model_group = $this->m_register_mtr->getModelGroup_mtr($select_num_type_mtr);
        echo json_encode($model_group);
    }
    public function getDataModelGroup_mtr(){
        $select_num_model_mtr = $this->input->post('select_num_model_mtr');
        $detail_group = $this->m_register_mtr->getDataDetailGroup_mtr($select_num_model_mtr);
        echo json_encode($detail_group);
    }
    
    public function mtr_number_total(){
        $tbl_mtr_type_id = $this->input->post('tbl_mtr_type_id');
        $tbl_mtr_model_id = $this->input->post('tbl_mtr_model_id');
        $tbl_mtr_detail_id = $this->input->post('tbl_mtr_detail_id');
        
        $temp1 = $this->m_register_mtr->get_mtr_type($tbl_mtr_type_id);
        $temp2 = $this->m_register_mtr->get_mtr_model($tbl_mtr_model_id);
        $temp3 = $this->m_register_mtr->get_mtr_detail($tbl_mtr_detail_id);
        if(count($temp1) == 0){
            exit;
        }
        //echo json_encode($temp1);
        echo $temp1[0]['group_type_numbers'].'-'.$temp2[0]['type_numbers'].'-'.$temp3[0]['detail_number'];
    }
    function mtr_detail_info(){
        $tbl_mtr_detail_id = $this->input->post('tbl_mtr_detail_id');
        $temp3 = $this->m_register_mtr->get_mtr_detail($tbl_mtr_detail_id);
        echo $temp3[0]['detail_number'];
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */