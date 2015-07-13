<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class service extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_service');
    }
    function get_tambol()
    {
         $id = $this->input->post('id');
         $sql = "select * from tbl_district where amphur_id =  $id";
         $result = $this->db->query($sql);
         $result = $result->result_array();
         header('Content-Type: application/json');
         echo json_encode( $result );
    }
    function index()
    {   
        $getall = $this->m_service->get_all();
        $data['prov']   = $this->m_service->get_provinc();
        $data['amphur'] = $this->m_service->get_amphur();
        $data['tambols'] = $this->m_service->get_tambol();

        // echo "<pre>";
        // print_r($data['tambols']);
        // echo "</pre>";
        // exit;

         //set data
        if(empty($getall))
        {
            $data['service_number'] =  '';
            $data['service_name']   =  '';
            $data['agencies']       =  '';
            $data['address']        =  '';
            $data['district']       =  '';
            $data['provinc']        =  '';
            $data['tambol']         =  '';
            $data['zip_code']       =  '';
            $data['tel']            =  '';
            $data['fax']            =  '';
            $data['logo']           =  'default.jpg';
        }
        else
        {
            $data['service_number'] =  $getall[0]['service_number'];
            $data['service_name']   =  $getall[0]['service_name'];
            $data['agencies']       =  $getall[0]['agencies'];
            $data['address']        =  $getall[0]['address'];
            $data['district']       =  $getall[0]['district'];
            $data['provinc']        =  $getall[0]['provinc'];
            $data['tambol']         =  $getall[0]['tambol'];
            $data['zip_code']       =  $getall[0]['zip_code'];
            $data['tel']            =  $getall[0]['tel'];
            $data['fax']            =  $getall[0]['fax'];
            $data['logo']           =  $getall[0]['logo'];
        }


        $this->load->view('include/eqm/header');
        $this->load->view('eqm/maindata/service',$data);
        $this->load->view('include/eqm/footer');
    }
    function get_default()
    {
         $id     = $this->input->post('id');
         $sql    = "select * from service limit 1";
         $result = $this->db->query($sql);
         $result = $result->result_array();

         echo    $result['0']['district'];
    }
    function  get_distric()
    {
         $id = $this->input->post('id');
         $sql = "select * from tbl_amphur where province_id = $id";
         $result = $this->db->query($sql);
         $result = $result->result_array();
         header('Content-Type: application/json');

        echo json_encode( $result );
    }
     function destroy_data()
    {
        $sql  = "delete from service";
        $result = $this->db->query($sql);
        //$base_part = $_SERVER['DOCUMENT_ROOT'] . "/eqm/upload/service";
        $base_part = './upload/service/';
        $this->load->helper("file");
        delete_files($base_part);
        $this->session->set_flashdata('msg', ':: ยกเลิกข้อมูลเรียบร้อยแล้ว ::');
        $this->session->set_flashdata('msg2', '1');
        redirect('eqm/service','refresh');
    }
    function update_data()
    { 
        //input data 
        //$base_part = $_SERVER['DOCUMENT_ROOT'] . "/eqm/upload/service"; 
        $base_part = './upload/service/';
        $service_number = $this->input->post('service_number');
        $service_name   = $this->input->post('service_name');
        $agencies       = $this->input->post('agencies');
        $address        = $this->input->post('address');
        $district       = $this->input->post('district');
        $provinc        = $this->input->post('provinc');
        $zip_code       = $this->input->post('zip_code');
        $tel            = $this->input->post('tel');
        $fax            = $this->input->post('fax');

        //addition 
        $tambol        = $this->input->post('tambols');
        // $district       = $this->input->post('district');
        // $provinc        = $this->input->post('provinc');
        // $tambol        = $this->input->post('tambol');
        // echo $tambol."<br>";
        // echo $provinc."<br>";
        // echo $district."<br>";
        // exit;


        $config['upload_path'] = $base_part;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '500';
        $config['max_width']  = '3000';
        $config['max_height']  = '3000';
        //------------------------------------------------------------------
            $config['file_name'] = $_SERVER['REQUEST_TIME'].rand().'-service_logo';
        //------------------------------------------------------------------

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('logo'))
        {
            $error = array('error' => $this->upload->display_errors());
            $hide1 = $this->input->post('hide1');
            $data = array(
                'service_number' => $service_number , 
                'service_name'   => $service_name   , 
                'agencies'       => $agencies       ,
                'address'        => $address        ,
                'district'       => $district       ,
                'provinc'        => $provinc        ,
                'tambol'         => $tambol         ,
                'zip_code'       => $zip_code       ,
                'tel'            => $tel            ,
                'fax'            => $fax            ,
                'logo'           => $hide1      
            );
            $this->m_service->save_service($data);
            $this->session->set_flashdata('msg', ':: อัพเดทข้อมูลเรียบร้อยแล้ว ::');
            redirect('eqm/service','refresh');
            exit;
        }
        else
        {   
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data(); 
            $logo  =   $upload_data['file_name'];
            
            $data = array(
                'service_number' => $service_number , 
                'service_name'   => $service_name   , 
                'agencies'       => $agencies       ,
                'address'        => $address        ,
                'district'       => $district       ,
                'provinc'        => $provinc        ,
                'zip_code'       => $zip_code       ,
                'tel'            => $tel            ,
                'fax'            => $fax            ,
                'logo'           => $logo       
            );
            $this->m_service->save_service($data);
            $this->session->set_flashdata('msg', ':: อัพเดทข้อมูลเรียบร้อยแล้ว ::');
            redirect('eqm/service','refresh');
            exit;
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */