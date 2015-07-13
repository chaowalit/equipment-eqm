<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';
date_default_timezone_set('Asia/Bangkok');

class eqm_transfer extends eqm_backend_controller{
    //put your code here
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_account/m_user_account','',TRUE);
        $this->load->model('eqm/m_profile_account','',TRUE);
        $this->load->model('eqm/m_eqm_transfer','',TRUE);
        $this->load->model('eqm/m_eqm_distribution','',TRUE);
    }
    public function index(){
        $data['workgroup'] = $this->m_user_account->getDataWorkGroup();
        $this->load->view('eqm/eqm_transfer',$data);
    }
    public function getDataUserAccountWithWorkGroup(){
        $workgroup_id = $_POST['workgroup_id'];
        $user_workgroup = $this->m_eqm_transfer->getDataUserAccountWithWorkGroupDB($workgroup_id);
        echo "<option value=''>--เลือกผู้รับโอน--</option>";
        foreach($user_workgroup as $row){
            echo "<option value=\"$row->id\">$row->full_name</option>";
        }
    }
    public function saveData_eqm_transfer(){
        $equipment_id = $this->input->post('equipment_id');
        $transfer_to_workgroup_id = $this->input->post('workgroup'); //โอนไปกลุ่มงาน
        $transferee_account_id = $this->input->post('transferee_user'); //ผู้รับโอน หรือ ผู้ใช้งาน
        $transfer_number = $this->input->post('transfer_number');
        $comment = $this->input->post('comment');
        $transfer_date = $this->input->post('transfer_date');
        $transfer_from_account_id = $this->account_id;  //โอนจาก ชื่อคนที่โอน
        $transfer_from_workgroup_id = $this->working_group_id;  //โอนจากสังกัดหน่วยงาน กลุ่มงาน
        $file_transfer = "";
        
        if(!$this->input->post('transfer_id')){
            if($_FILES['file_attach_transfer']['name']){
                $new_path = './upload/eqm_transfer/';
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
                $config['file_name'] = $_SERVER['REQUEST_TIME'].'-eqm_transfer';
                //------------------------------------------------------------------
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload("file_attach_transfer"))
                {
                   $error = $this->upload->display_errors();
                   echo "ไม่สามารถทำการอัพโหลดเอกสารแนบได้ กรุณาตรวจสอบเอกสารแนบ";
                   exit;
                }
                else
                {
                    $uload_data = $this->upload->data();
                    $file_transfer = $uload_data['file_name'];
                    //$file_extension = $uload_data['file_ext'];
                }
            }
            $data = array(
                "equipment_id" => $equipment_id,
                "transfer_number" => $transfer_number,

                "transfer_date" => date( "Y-m-d", strtotime($transfer_date)),
                "transfer_from_account_id" => $transfer_from_account_id,
                "transfer_from_workgroup_id" => $transfer_from_workgroup_id,
                "transfer_to_workgroup_id" => $transfer_to_workgroup_id,
                "transferee_account_id" => $transferee_account_id,
                "comment" => $comment,
                "file_attach" => $file_transfer,

                "created" => date("Y-m-d H:i:s"),
                "updated" => date("Y-m-d H:i:s")
            );
            $this->m_eqm_transfer->saveData_eqm_transferDB($data);
            //--------------------------------------------------------------------------
            //Repair ,distribution ,transfer ,ready ,waste
            $this->m_eqm_distribution->updateStatusEqm($equipment_id,'transfer');
            echo "บันทึกข้อมูล ทะเบียนการโอนครุภัณฑ์ เรียบร้อยแล้ว";
        }else{
            if($_FILES['file_attach_transfer']['name']){
                $new_path = './upload/eqm_transfer/';
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
                $config['file_name'] = $_SERVER['REQUEST_TIME'].'-eqm_transfer';
                //------------------------------------------------------------------
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload("file_attach_transfer"))
                {
                   $error = $this->upload->display_errors();
                   echo "ไม่สามารถทำการอัพโหลดเอกสารแนบได้ กรุณาตรวจสอบเอกสารแนบ";
                   exit;
                }
                else
                {
                    $uload_data = $this->upload->data();
                    $file_transfer = $uload_data['file_name'];
                    //$file_extension = $uload_data['file_ext'];
                }
            }
            $data = array(
                "equipment_id" => $equipment_id,
                "transfer_number" => $transfer_number,

                "transfer_date" => date( "Y-m-d", strtotime($transfer_date)),
                "transfer_from_account_id" => $transfer_from_account_id,
                "transfer_from_workgroup_id" => $transfer_from_workgroup_id,
                "transfer_to_workgroup_id" => $transfer_to_workgroup_id,
                "transferee_account_id" => $transferee_account_id,
                "comment" => $comment,
                "file_attach" => ($file_transfer == '')? $this->input->post('file_repair_old') : $file_transfer,

                //"created" => date("Y-m-d H:i:s"),
                "updated" => date("Y-m-d H:i:s")
            );
            $this->m_eqm_transfer->updateData_eqm_transferDB($data,$this->input->post('transfer_id'));
            
            echo "บันทึกข้อมูล การปรับปรุงทะเบียนการโอนครุภัณฑ์ เรียบร้อยแล้ว";
        }
    }
    public function getShowDataEqmTransfer(){
        $data['EqmTransfer'] = $this->m_eqm_transfer->getShowDataEqmTransferDB();
        $workG =  $this->m_eqm_transfer->getDataWorkGroupToArray();
        $workgroup = array();
        foreach($workG as $row){
            $workgroup[$row->be_under_id] = $row->be_under_name;
        }
        $userAc = $this->m_eqm_transfer->getDataUserAccountToArray();
        $user_account = array();
        foreach($userAc as $row){
            $user_account[$row->id] = $row->full_name;
        }
        $data['workgroup'] = $workgroup;
        $data['user_account'] = $user_account;
        $this->load->view('eqm/list_eqm_transfer',$data);
    }
    public function getDataEditTransfer(){
        $transfer_id = $this->input->post('transfer_id');
        $result = $this->m_eqm_transfer->getDataEditTrasferDB($transfer_id);
        
        echo json_encode($result);
    }
}
