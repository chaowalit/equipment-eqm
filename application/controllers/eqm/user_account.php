<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';
date_default_timezone_set('Asia/Bangkok');

class user_account extends eqm_backend_controller{
    //put your code here
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_account/m_user_account','',TRUE);
        $this->load->model('eqm/m_profile_account','',TRUE);
    }
    public function index(){
        $data['data_service'] = $this->m_user_account->getDataServiceDB();
        $data['workgroup'] = $this->m_user_account->getDataWorkGroup();
        $data['title_name'] = $this->m_user_account->getDataTitleName();
        $this->__updateDataLogin();
        $this->load->view('eqm/maindata/user_account',$data);
    }
    public function getUserDataAccount(){
        $data['workgroup'] = $this->m_user_account->getDataWorkGroup();
        $data['title_name'] = $this->m_user_account->getDataTitleName();
        $data['data_user'] = $this->m_user_account->getUserDataAccountDB();
        $data['data_service'] = $this->m_user_account->getDataServiceDB();
        $this->load->view('eqm/maindata/list_user_account',$data);
    }
    public function saveUserDataAccount(){
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
        $password = $_POST['password'];
        $image_name = "";
        if($_FILES['image_account']['name']){
            $new_path = './upload/image_account/';
            if(is_dir($new_path)){

            }else{
                mkdir($new_path , 0777);
            }
            $config['upload_path'] = $new_path;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '3000';
            $config['max_width']  = '1024';
            $config['max_height']  = '1024';
            //$config['file_name'] = date('Y-m-d').'_'.date('H:i:s');
            $config['overwrite'] = false;
            //------------------------------------------------------------------
            $config['file_name'] = $_SERVER['REQUEST_TIME'].'-user';
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
            "created" => date("Y-m-d H:i:s"),
            "updated" => date("Y-m-d H:i:s") 
        );
        $this->m_user_account->saveUserDataAccountDB($data);
        echo "บันทึกผู้ใช้งาน เรียบร้อยแล้ว";
    }
    public function delete_user_account($id){
        $this->m_user_account->deleteUserDataAccountDB($id);
        redirect('eqm/user_account','refresh');
    }
    public function getDataUserAccountIdForUpdate(){
        $account_id = $_POST['account_id'];
        $result = $this->m_user_account->getUserDataAccountDBForUpdate($account_id);
        $data = array();
        foreach($result as $row){
            $val = explode(' ', $row->full_name);
            $first_name = $val[0];
            $last_name = $val[1];
            
            $data = array(
                "id" => $row->id,
                "user_name" => $row->user_name,
                "password" => $row->password,
                "service_id" => $row->service_id,
                "position" => $row->position,
                "degree" => $row->degree,
                "working_group_id" => $row->working_group_id,
                "title_name_id" => $row->title_name_id,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "birthday" => date( "d-m-Y", strtotime($row->birthday)),
                "domination_day" => date( "d-m-Y", strtotime($row->domination_day)),
                "retirement_day" => date( "d-m-Y", strtotime($row->retirement_day)),
                "telephone" => $row->telephone,
                "email" => $row->email,
                "image_account" => $row->image_account
            );
        }
        echo json_encode($data);
    }
    public function updateDataUserAccount(){
        $account_id = $_POST['account_id'];
        $workgroup = $_POST['workgroupEdit'];
        $position = $_POST['positionEdit'];
        $degree = $_POST['degreeEdit'];
        $prefix_name = $_POST['prefix_nameEdit'];
        $name = $_POST['nameEdit'];
        $lastname = $_POST['lastnameEdit'];
        $service_id = $_POST['service_idEdit'];
        $birthday = $_POST['birthdayEdit'];
        $domination_day = $_POST['domination_dayEdit'];
        $retirement_day = $_POST['retirement_dayEdit'];
        $telephone = $_POST['telephoneEdit'];
        $email = $_POST['emailEdit'];
        $user_name = $_POST['user_nameEdit'];
        $password = trim($_POST['passwordEdit']);
        $image_name = $_POST['image_accountOld'];
        
        if($_FILES['image_accountEdit']['name']){
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
            $config['max_size']	= '4000';
            $config['max_width']  = '1024';
            $config['max_height']  = '1024';
            $config['overwrite'] = false;
            //------------------------------------------------------------------
            $config['file_name'] = $_SERVER['REQUEST_TIME'].'-user';
            //------------------------------------------------------------------
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload("image_accountEdit"))
            {
               $error = $this->upload->display_errors();
               echo "fail_image";
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
        if($account_id == $this->account_id){
            $this->__updateDataLogin();
            echo "updateLoginOwner";
        }else{
            echo "แก้ไขข้อมูลผู้ใช้งาน เรียบร้อยแล้ว";
        }
    }
    public function getPermissionUserAccount($user_id){
        $data['menu_all'] = $this->m_user_account->getMenuAll();
        $permission = $this->m_user_account->getPermissionUser($user_id);
        $permission_to_array = array();
        foreach($permission as $row){
            $permission_to_array[$row->menu_list_id] = $row->menu_list_id;
        }
        $data['user_id'] = $user_id;
        $data['permission_to_array'] = $permission_to_array;
        $this->load->view('eqm/maindata/permission_user_account',$data);
    }
    public function updatePermissionUserAccount(){
        $user_id = $this->input->post('user_id');
        $this->m_user_account->delectPermissionUserOld($user_id);
        
        $menu_all = $this->m_user_account->getMenuAll();
        $data = array();
        foreach($menu_all as $row){
            if($this->input->post($row->id)){
                $data = array(
                    'user_account_id' => $user_id,
                    'menu_list_id' => $row->id
                );
                $this->m_user_account->updatePermissionUserAccountDB($data);
            }
        }
        echo "ระบบทำการตั้งค่าการเข้าถึงเมนู เรียบร้อยแล้ว";
    }
}
