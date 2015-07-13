<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';
date_default_timezone_set('Asia/Bangkok');

class main_company extends eqm_backend_controller{
    //put your code here
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_main_company','',TRUE);
    }
    public function index(){
        $data['province'] = $this->m_main_company->getDataProvinceShow();
        $data['amphur'] = $this->m_main_company->getDataAmphurShow();
        $this->load->view('eqm/maindata/main_company',$data);
    }
    public function getElementByIdAmphur(){
        $amphur_id = $this->input->post('amphur_id'); 
        $data = $this->m_main_company->getProvinceOfAmphur($amphur_id);
        if(empty($data)){
            $amphur = $this->m_main_company->getDataAmphurShow();
            echo "<option value='' selected>เลือกอำเภอ</option>";
            foreach($amphur as $row){
                echo "<option value=\"$row->amphur_id\">$row->amphur_name</option>";
            }
        }else{
            echo "<option value=''>กลับไปค่าเริ่มต้น</option>";
            foreach ($data as $row){
                echo "<option value=\"$row->province_id\" selected>$row->province_name</option>";
            }
        }
        
    }
    public function getElementByIdProvince(){
        $province_id = $this->input->post('province_id'); 
        $data = $this->m_main_company->getAmphurOfProvince($province_id);
        if(empty($data)){
            $province = $this->m_main_company->getDataProvinceShow();
            echo "<option value='' selected>เลือกจังหวัด</option>";
            foreach($province as $row){
                echo "<option value=\"$row->province_id\">$row->province_name</option>";
            }
        }else{
            echo "<option value=''>กลับไปค่าเริ่มต้น</option>";
            foreach ($data as $row){
                echo "<option value=\"$row->amphur_id\" selected>$row->amphur_name</option>";
                
            }
        }
    }
    public function getDataCompany(){
        $data['province'] = $this->m_main_company->getDataProvinceShow();
        $data['amphur'] = $this->m_main_company->getDataAmphurShow();
        $data['data_company'] = $this->m_main_company->getDataCompanyDB();
        $this->load->view('eqm/maindata/list_main_company',$data);
    }
    public function saveDataCompany(){
        $company_number = $this->input->post('company_number');
        $telephone = $this->input->post('telephone');
        $company_name = $this->input->post('company_name');
        $fax_tel = $this->input->post('fax_tel');
        $address_company = $this->input->post('address_company');
        $contact_person = $this->input->post('contact_person');
        $amphur = $this->input->post('amphur');
        $province = $this->input->post('province');
        $district = $this->input->post('district');
        $file_attach = "";
        $file_extension = "";
        if($_FILES['file_attach']['name']){
            $new_path = './upload/company_file/';
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
            $config['file_name'] = $_SERVER['REQUEST_TIME'].'-company';
            //------------------------------------------------------------------
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload("file_attach"))
            {
               $error = $this->upload->display_errors();
               echo "ไม่สามารถทำการอัพโหลดเอกสารแนบได้ กรุณาตรวจสอบเอกสารแนบ";
               exit;
            }
            else
            {
                $uload_data = $this->upload->data();
                $file_attach = $uload_data['file_name'];
                $file_extension = $uload_data['file_ext'];
            }
        }
        $data = array(
            "company_number" => $company_number,
            "company_name" => $company_name,
            "address" => $address_company,
            "province_id" => $province,
            "amphur_id" => $amphur,
            "district_id" => $district,
            "tel" => $telephone,
            "fax" => $fax_tel,
            "contact" => $contact_person,
            "file_attach" => $file_attach
        );
        $this->m_main_company->saveDataCompanyDB($data);
        log_activity($this->session->userdata('log_id') , "บันทึกข้อมูลบื้องต้น >> บริษัท/หจก.", "บันทึกข้อมูล บริษัท/หจก. : ".$company_name);
        echo "บันทึกข้อมูล บริษัท/หจก. เรียบร้อยแล้ว";
    }
    public function deleteDataCompany(){
        $company_id = $this->input->post('company_id');
        $file_attach = "";
        $file_name = $this->m_main_company->dataFileNameForDelete($company_id);
        foreach ($file_name as $row){
            $file_attach = $row->file_attach;
        }
        
        if(!empty($file_name)){
            $deleteFile = './upload/company_file/'.$file_attach;
            if(file_exists($deleteFile)){
                unlink($deleteFile);
            }
        }
        $this->m_main_company->deleteDataCompanyDB($company_id);
    }
    public function getDataCompanyIdForUpdate(){
        $company_id = $this->input->post('company_id');
        $data_company = $this->m_main_company->getDataCompanyForUpdate($company_id);
        $data_json = array();
        foreach($data_company as $row){
            $data_json = array(
                'id' => $row->id,
                'company_number' => $row->company_number,
                'company_name' => $row->company_name,
                'address' => $row->address,
                'province_id' => $row->province_id,
                'amphur_id' => $row->amphur_id,
                'tel' => $row->tel,
                'fax' => $row->fax,
                'contact' => $row->contact,
                'file_attach' => $row->file_attach
            );
        }
        if($data_company){
            echo json_encode($data_json);
        }
        
    }
    public function updateDataCompany(){
        $company_number = $this->input->post('company_numberEdit');
        $telephone = $this->input->post('telephoneEdit');
        $company_name = $this->input->post('company_nameEdit');
        $fax_tel = $this->input->post('fax_telEdit');
        $address_company = $this->input->post('address_companyEdit');
        $contact_person = $this->input->post('contact_personEdit');
        $amphur = $this->input->post('amphurEdit');
        $province = $this->input->post('provinceEdit');
        $districtEdit = $this->input->post('districtEdit');
        $file_attach = $this->input->post('file_attachOld');
        $company_id = $this->input->post('company_id');
        
        if($_FILES["file_attachEdit"]["name"] != ""){
            $new_path = './upload/company_file/';
            if(is_dir($new_path)){
                //if($file_attach){
                    //$deleteFile = './upload/company_file/'.$file_attach;
                    //if(file_exists($deleteFile)){
                        //unlink($deleteFile);
                   //}
                //}
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
            $config['file_name'] = $_SERVER['REQUEST_TIME'].'-company';
            //------------------------------------------------------------------
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload("file_attachEdit"))
            {
               $error = $this->upload->display_errors();
               echo "ไม่สามารถทำการอัพโหลดเอกสารแนบได้ กรุณาตรวจสอบเอกสารแนบ";
               exit;
            }
            else
            {
                $uload_data = $this->upload->data();
                $file_attach = $uload_data['file_name'];
                //$file_extension = $uload_data['file_ext'];
            }
        }
        $data = array(
            "company_number" => $company_number,
            "company_name" => $company_name,
            "address" => $address_company,
            "province_id" => $province,
            "amphur_id" => $amphur,
            "district_id" => $districtEdit,
            "tel" => $telephone,
            "fax" => $fax_tel,
            "contact" => $contact_person,
            "file_attach" => $file_attach
        );
        $this->m_main_company->updateDataCompanyDB($data,$company_id);
        echo "แก้ไขข้อมูล บริษัท/หจก. เรียบร้อยแล้ว";
    }
    public function getElementDistrict(){
        $amphur_id = $this->input->post('amphur_id');
        $district = $this->m_main_company->getDataDistrictShow($amphur_id);
        echo "<option value='' selected>เลือกตำบล</option>";
        foreach($district as $row){
            echo "<option value=\"$row->district_id\" selected>$row->district_name</option>";
        }
    }
}
