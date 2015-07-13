<?php 

class eqm_backend_controller extends CI_Controller{
    private $CI;
    //--------------------------------
    public $account_id;
    public $user_name;
    public $full_name;
    public $password;
    public $image_account;
    public $service_id;
    public $position;
    public $degree;
    public $working_group_id;
    public $title_name_id;
    public $birthday;
    public $domination_day;
    public $retirement_day;
    public $telephone;
    public $email;
    //-------------------------------
    public $service_id2;
    public $service_number;
    public $service_name;
    public $agencies;
    public $address;
    public $tambol;
    public $district;
    public $provinc;
    public $zip_code;
    public $tel;
    public $fax;
    public $logo;
    //--------------------------------
    public $controller;
    public $method;
    
    function __construct($id = null)
    {
        parent::__construct($id);
        $this->CI =& get_instance();
        $this->CI->load->model('user_account/m_login');	
        $this->CI->load->model('user_account/m_user_account');	
        $this->__login();
        $this->getDataService();
        $this->getControllerAndMethod();
        
        $array_no_check_permission = array(
                                            'gettopic','login','logout','data_eqm_distribution','data_group_type','data_type','data_detail',
                                            'unit_data','agency_data','method_data','year_budget_data','type_budget_data','be_under_data','title_name_data','working_group_data','main_mtr',
                                            'report_eqm','profile_account','notify_alert','index_eqm','data_mtr_distribution','data_mtr_model','data_mtr_detail','main_eqm_more5000','main_eqm_less5000',
                                            'report_button_print'
                                          );  //ทำการยกเลิกการตรวจสอบการกำหนดสิทธิ์
        if(!in_array($this->controller, $array_no_check_permission)){
            $this->check_permission($this->account_id,$this->controller);
        }
    }
    
    public function getControllerAndMethod(){
        $this->controller = $this->router->class;
        $this->method = $this->router->method;
    }
    
    public function __login()
    {
        $data_login = $this->session->userdata('data_account');
        if($data_login){
            $this->account_id = $data_login['account_id'];
            $this->user_name = $data_login['user_name'];
            $this->password = $data_login['password'];
            $this->full_name = $data_login['full_name'];
            $this->image_account = $data_login['image_account'];
            $this->service_id = $data_login['service_id'];
            $this->position = $data_login['position'];
            $this->degree = $data_login['degree'];
            $this->working_group_id = $data_login['working_group_id'];
            $this->title_name_id = $data_login['title_name_id'];
            $this->birthday = $data_login['birthday'];
            $this->domination_day = $data_login['domination_day'];
            $this->retirement_day = $data_login['retirement_day'];
            $this->telephone = $data_login['telephone'];
            $this->email = $data_login['email'];
            
        }
    }
    public function __updateDataLogin(){
        $result = $this->CI->m_login->getDataLogin($this->account_id);
        if(!empty($result)){
            $data_account = array();
            foreach($result as $row){
                $data_account = array(
                    'account_id' => $row->id,
                    'user_name' => $row->user_name,
                    'password' => $row->password,
                    'service_id' => $row->service_id,
                    'position' => $row->position,
                    'degree' => $row->degree,
                    'working_group_id' => $row->working_group_id,
                    'title_name_id' => $row->title_name_id,
                    'full_name' => $row->full_name,
                    'birthday' => $row->birthday,
                    'domination_day' => $row->domination_day,
                    'retirement_day' => $row->retirement_day,
                    'telephone' => $row->telephone,
                    'email' => $row->email,
                    'image_account' => $row->image_account

                );
            }
            $this->session->set_userdata('data_account',$data_account);
            $this->__login();
        }else{
            $message = "No Data Profile Account Please contact the system administrator";
            echo "<script type='text/javascript'>alert('$message');</script>";
            $this->session->unset_userdata('data_account');
            redirect('login','refresh');
            exit;
        }
    }
    public function check_permission($account_id,$controller){
        $check = $this->CI->m_user_account->check_permission_user_account($account_id,$controller);
        if($check){
            
        }else{
            //$message = "No Permission ,Please contact the system administrator";
            //echo "<script>alert('$message');</script>";
            redirect('login','refresh');
            //header('Location: '+ base_url()+'index.php/gettopic');
            //$url = base_url()+'index.php/gettopic';
            //echo "<script type=\"text/javascript\">window.location.href=\"$url\";</script>";
            //$this->CI->load->view('gettopic');
            exit;
        }
    }
    public function check_permission_menu($account_id,$controller){
       
        $check = $this->CI->m_user_account->check_permission_user_account($account_id,$controller);
        if($check){
            return 1;
        }else{
            return 0;
        }
    }
    public function getDataService(){
        $data_service = $this->CI->m_user_account->getDataServiceDB();
        foreach($data_service as $row){
            $this->service_id2 = $row->service_id;
            $this->service_number = $row->service_number;
            $this->service_name = $row->service_name;
            $this->agencies = $row->agencies;
            $this->address = $row->address;
            $this->tambol = $row->tambol;
            $this->district = $row->district;
            $this->provinc = $row->provinc;
            $this->zip_code = $row->zip_code;
            $this->tel = $row->tel;
            $this->fax = $row->fax;
            $this->logo = $row->logo;
        }
    }
}
?>