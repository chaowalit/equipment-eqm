<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';
date_default_timezone_set('Asia/Bangkok');


class profile_account extends eqm_backend_controller{
    //put your code here
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_account/m_user_account','',TRUE);
        $this->load->model('eqm/m_profile_account','',TRUE);
    }
    public function index(){
        $data['data_service'] = $this->m_user_account->getDataServiceDB();
        $data['data_profile'] = $this->m_profile_account->getDataProfileAccountDB($this->account_id);
        $data['workgroup'] = $this->m_user_account->getDataWorkGroup();
        $data['title_name'] = $this->m_user_account->getDataTitleName();
        
        $this->load->view('eqm/abountProgram/profile_account',$data);
    }
    public function updateDataProfileAccount(){
        $account_id = $_POST['account_id'];
        $workgroup = $_POST['workgroup'];
        $position = $_POST['position'];
        $degree = $_POST['degree'];
        $prefix_name = $_POST['prefix_name'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $service_id = $_POST['service_id'];
        $birthday = $_POST['birthday'];
        $domination_day = $_POST['domination_day'];
        $retirement_day = $_POST['retirement_day'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $user_name = $_POST['user_name'];
        $password = trim($_POST['password']);
        $image_name = $_POST['image_old'];
        
        if($_FILES['image_account']['name']){
            $new_path = './upload/image_account/';
            if(is_dir($new_path)){
                if($image_name){
                    $deleteImage = './upload/image_account/'.$image_name;
                    if(file_exists($deleteImage)){
                        unlink($deleteImage);
                    }
                }
            }else{
                mkdir($new_path , 0777);
            }
            $config['upload_path'] = $new_path;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '3000';
            $config['max_width']  = '1024';
            $config['max_height']  = '1024';
            $config['overwrite'] = false;
            //------------------------------------------------------------------
            $config['file_name'] = $_SERVER['REQUEST_TIME'].'-userprofile';
            //------------------------------------------------------------------
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload("image_account"))
            {
               $error = $this->upload->display_errors();
               echo "ไม่สามารถทำการบันทึกรูปได้ กรุณาตรวจสอบรูป";
               exit;
            }
            else
            {
                $uload_data = $this->upload->data();
                $image_name = $uload_data['file_name'];
            }
        }
        $data;
        if($password){
            $data = array(
                "user_name" => $user_name,
                "password" => sha1($password),
                "service_id" => $service_id,
                "position" => $position,
                "degree" => $degree,
                "working_group_id" => $workgroup,
                "title_name_id" => $prefix_name,
                "full_name" => trim($name)." ".trim($lastname),
                "birthday" => date( "Y-m-d", strtotime($birthday)),
                "domination_day" => date( "Y-m-d", strtotime($domination_day)),
                "retirement_day" => date( "Y-m-d", strtotime($retirement_day)),
                "telephone" => $telephone,
                "email" => $email,
                "image_account" => $image_name,
                //"created" => date("Y-m-d H:i:s"),
                "updated" => date("Y-m-d H:i:s")
            );
        }else{
            $data = array(
                "user_name" => $user_name,
                //"password" => sha1($password),
                "service_id" => $service_id,
                "position" => $position,
                "degree" => $degree,
                "working_group_id" => $workgroup,
                "title_name_id" => $prefix_name,
                "full_name" => trim($name)." ".trim($lastname),
                "birthday" => date( "Y-m-d", strtotime($birthday)),
                "domination_day" => date( "Y-m-d", strtotime($domination_day)),
                "retirement_day" => date( "Y-m-d", strtotime($retirement_day)),
                "telephone" => $telephone,
                "email" => $email,
                "image_account" => $image_name,
                //"created" => date("Y-m-d H:i:s"),
                "updated" => date("Y-m-d H:i:s")
            );
        }
        
        $this->m_profile_account->updateUserDataAccountDB($data,$account_id);
        $this->__updateDataLogin();
        echo "บันทึกผู้ใช้งาน เรียบร้อยแล้ว";
    }
}
