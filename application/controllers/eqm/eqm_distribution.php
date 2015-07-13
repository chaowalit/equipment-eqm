<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';
date_default_timezone_set('Asia/Bangkok');

class eqm_distribution extends eqm_backend_controller{
    //put your code here
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_account/m_user_account','',TRUE);
        $this->load->model('eqm/m_profile_account','',TRUE);
        $this->load->model('eqm/m_main_company','',TRUE);
        $this->load->model('eqm/m_eqm_distribution','',TRUE);
    }
    public function index(){
        $data['data_company'] = $this->m_main_company->getDataCompanyDB();
        $this->load->view('eqm/eqm_distribution',$data);
    }
    public function getDataEquipment(){
        $result = $this->m_eqm_distribution->getDataEquipmentDB();
        //echo "<option value='0' selected='selected'>กรุณาเลือกครุภัณฑ์ที่ต้องการ</option>";
        foreach($result as $row){
            echo "<option value=\"$row->eqm_id\">$row->eqm_numbers1-$row->eqm_numbers2-$row->eqm_numbers3/$row->eqm_amout_number : $row->eqm_names</option>";
        }
    }
    public function getDataEquipmentSelect(){
        $eqm_id = $_POST['eqm_id'];
        $result = $this->m_eqm_distribution->getDataEquipmentSelectDB($eqm_id);
        
        $data = array();
        foreach($result as $row){
            $data = array(
                "eqm_id" => $row->eqm_id,
                "barcode" => $row->eqm_numbers1.'-'.$row->eqm_numbers2.'-'.$row->eqm_numbers3.'/'.$row->eqm_amout_number,
                "eqm_names" => $row->eqm_names,
                "image_eqm" => $row->image_eqm,
                "eqm_status" => $row->eqm_status
            );
        }
        echo json_encode($data);
    }
    public function saveData_eqm_distribution(){
        $equipment_id = $this->input->post('equipment_id');
        $company_distribution = $this->input->post('company_distribution');
        $price = $this->input->post('price');
        $distribution_number = $this->input->post('distribution_number');
        $distribution_date = $this->input->post('distribution_date');
        $comment = $this->input->post('comment');
        $type_distribution = $this->input->post('type_distribution');
        $distribution_id = $this->input->post('distribution_id');
        $file_distribution = '';
        
        if(!$distribution_id){
            if($_FILES['file_attach_distribution']['name']){
                $new_path = './upload/eqm_distribution/';
                if(is_dir($new_path)){

                }else{
                    mkdir($new_path , 0777);
                }
                $config['upload_path'] = $new_path;
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml|docx|xlsx|xls';
                $config['overwrite'] = TRUE;
                $config['max_size']	= '10000';
                $config['max_width']  = '2048';
                $config['max_height']  = '2048';
                $config['overwrite'] = false;
                //------------------------------------------------------------------
                $config['file_name'] = $_SERVER['REQUEST_TIME'].'-eqm_distribution';
                //------------------------------------------------------------------
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload("file_attach_distribution"))
                {
                   $error = $this->upload->display_errors();
                   echo "ไม่สามารถทำการอัพโหลดเอกสารแนบได้ กรุณาตรวจสอบเอกสารแนบ";
                   exit;
                }
                else
                {
                    $uload_data = $this->upload->data();
                    $file_distribution = $uload_data['file_name'];
                    //$file_extension = $uload_data['file_ext'];
                }
            }
            $data = array(
                "equipment_id" => $equipment_id,
                "company_distribution_id" => $company_distribution,
                "price" => $price,
                "distribution_number" => $distribution_number,
                "distribution_date" => date( "Y-m-d", strtotime($distribution_date)),
                "comment" => $comment,
                "type_distribution" => $type_distribution,
                "file_attach_distribution" => $file_distribution,
                "created" => date("Y-m-d H:i:s"),
                "updated" => date("Y-m-d H:i:s")
            );
            $this->m_eqm_distribution->saveData_eqm_distributionDB($data);
            //--------------------------------------------------------------------------
            //repair ,distribution ,transfer ,ready ,waste
            $this->m_eqm_distribution->updateStatusEqm($equipment_id,'distribution');
            echo "บันทึกข้อมูล ทะเบียนการแทงจำหน่าย เรียบร้อยแล้ว";
        }else{
            if($_FILES['file_attach_distribution']['name']){
                $new_path = './upload/eqm_distribution/';
                if(is_dir($new_path)){

                }else{
                    mkdir($new_path , 0777);
                }
                $config['upload_path'] = $new_path;
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml|docx|xlsx|xls';
                $config['overwrite'] = TRUE;
                $config['max_size']	= '10000';
                $config['max_width']  = '2048';
                $config['max_height']  = '2048';
                $config['overwrite'] = false;
                //------------------------------------------------------------------
                $config['file_name'] = $_SERVER['REQUEST_TIME'].'-eqm_distribution';
                //------------------------------------------------------------------
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload("file_attach_distribution"))
                {
                   $error = $this->upload->display_errors();
                   echo "ไม่สามารถทำการอัพโหลดเอกสารแนบได้ กรุณาตรวจสอบเอกสารแนบ";
                   exit;
                }
                else
                {
                    $uload_data = $this->upload->data();
                    $file_distribution = $uload_data['file_name'];
                    //$file_extension = $uload_data['file_ext'];
                }
            }
            $data = array(
                "equipment_id" => $equipment_id,
                "company_distribution_id" => $company_distribution,
                "price" => $price,
                "distribution_number" => $distribution_number,
                "distribution_date" => date( "Y-m-d", strtotime($distribution_date)),
                "comment" => $comment,
                "type_distribution" => $type_distribution,
                "file_attach_distribution" => ($file_distribution == '')? $this->input->post('image_old_distribution') : $file_distribution,
                //"created" => date("Y-m-d H:i:s"),
                "updated" => date("Y-m-d H:i:s")
            );
            $this->m_eqm_distribution->updateData_eqm_distributionDB($data,$distribution_id);
            echo "บันทึกข้อมูล การปรับปรุงทะเบียนการแทงจำหน่าย เรียบร้อยแล้ว";
        }
        
    }
    public function getShowDataEqmDistribution(){
        $data['EqmDistribution'] = $this->m_eqm_distribution->getShowDataEqmDistributionDB();
        $this->load->view('eqm/list_eqm_distribution',$data);
    }
    public function getDataEditDistribution(){
        $distribution_id = $this->input->post('distribution_id');
        $result = $this->m_eqm_distribution->getDataEditDistributionDB($distribution_id);
        echo json_encode($result);
    }
}
