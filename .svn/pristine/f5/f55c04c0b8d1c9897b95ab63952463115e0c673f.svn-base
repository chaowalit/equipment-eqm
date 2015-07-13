<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class Login extends eqm_backend_controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_account/m_login');	
    }

    function index()
    {
        if($this->input->post('submit_user')){
            $user_name = $this->input->post('user_name');
            $password = $this->input->post('password');
            $result = $this->m_login->check_login($user_name,$password);
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
                create_log_activity($this->account_id, date("Y-m-d H:i:s"));
                redirect('gettopic', 'refresh');
                exit;
            }else{
                $this->load->view('login');
            }
        }else if($this->session->userdata('data_account')){
            redirect('gettopic', 'refresh');
            exit;
        }else{
            $this->load->view('login');
        }
    }
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */