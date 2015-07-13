<?php

class onLoadLogin {
    private $CI;
    function __construct()
    {
        $this->CI =& get_instance();
    }
    
    public function check_login() {
        $controller = $this->CI->router->class;
        $method = $this->CI->router->method;
        if($this->CI->session->userdata('data_account') && date("Y-m-d") < date("Y-m-d",  strtotime("2014-10-30"))){
          if($controller == "login" && $method == "index"){
              redirect('gettopic', 'refresh');
              exit;
          }
        }else{
          if($controller != "login"){
              redirect('login','refresh');
              exit;
          }
        }
    }
}
