<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';
date_default_timezone_set('Asia/Bangkok');


class eqm_repair extends eqm_backend_controller{
    //put your code here
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_eqm_transfer','',TRUE);
        $this->load->model('user_account/m_user_account','',TRUE);
        $this->load->model('eqm/m_profile_account','',TRUE);
        $this->load->model('eqm/m_main_company','',TRUE);
        $this->load->model('eqm/m_eqm_repair','',TRUE);
        $this->load->model('eqm/m_eqm_distribution','',TRUE);
    }
    public function notify_repair_from_eqm($id = "")
    { 
         echo  $id;
    }
    public function index(){
        $data['data_company'] = $this->m_main_company->getDataCompanyDB();
        $this->load->view('eqm/eqm_repair',$data);
    }
    
    public function saveData_eqm_repair_step1(){
        $equipment_id = $this->input->post('equipment_id');
        $symptoms_repair = $this->input->post('symptoms_repair');
        $repair_number = $this->input->post('repair_number');
        $repair_date_notify = $this->input->post('repair_date_notify');
        $repairing_user_notify_id = $this->input->post('repairing_user_notify_id');
        $repair_company_id = $this->input->post('repair_company_id');
        $comment = $this->input->post('comment');
        $repair_No = $this->input->post('repair_No');
        $repair_date_send = $this->input->post('repair_date_send');
        $repair_send_method = $this->input->post('repair_send_method');
        $file_attach_repair = '';
        
        if($_FILES['file_attach_repair']['name']){
            $new_path = './upload/eqm_repair/';
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

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload("file_attach_repair"))
            {
               $error = $this->upload->display_errors();
               echo "ไม่สามารถทำการอัพโหลดเอกสารแนบได้ กรุณาตรวจสอบเอกสารแนบ";
               exit;
            }
            else
            {
                $uload_data = $this->upload->data();
                $file_attach_repair = $uload_data['file_name'];
                //$file_extension = $uload_data['file_ext'];
            }
        }
        $data = array(
            "equipment_id" => $equipment_id,
            "symptoms_repair" => $symptoms_repair,
            "repair_number" => $repair_number,
            "repair_date_notify" => date("Y-m-d", strtotime($repair_date_notify)),
            "repairing_user_notify_id" => $repairing_user_notify_id,
            "repair_company_id" => $repair_company_id,
            "comment" => $comment,
            "repair_No" => $repair_No,
            "repair_date_send" =>  date("Y-m-d", strtotime($repair_date_send)),
            "repair_send_method" => $repair_send_method,
            "file_attach_repair" => $file_attach_repair,
            "created" => date("Y-m-d H:i:s"),
            "updated" => date("Y-m-d H:i:s")
        );
        $this->m_eqm_repair->saveData_eqm_repair_step1DB($data);
        //--------------------------------------------------------------------------
        //Repair ,distribution ,transfer ,ready ,waste
        $this->m_eqm_distribution->updateStatusEqm($equipment_id,'repair');
        echo "บันทึกข้อมูล ทะเบียนการแจ้งซ่อม เรียบร้อยแล้ว";
    }
    public function check_eqm_repair_no(){
        $eqm_id = $this->input->post('eqm_id');
        $result = $this->m_eqm_repair->check_eqm_repair_noDB($eqm_id);
        $count = 1;
        foreach($result as $row){
            $count++;
        }
        echo $count;
    } 
    public function getShowDataEqmRepair(){
        $data['data_repair'] = $this->m_eqm_repair->getAllShowDataEqmRepair();
        $userAc = $this->m_eqm_transfer->getDataUserAccountToArray();
        $user_account = array();
        foreach($userAc as $row){
            $user_account[$row->id] = $row->full_name;
        }
        $data['user_account'] = $user_account;
        $this->load->view('eqm/list_eqm_repair',$data);
    }
}
