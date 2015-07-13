<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class purchasing extends eqm_backend_controller {
//eqm_backend_controller
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_service');
        $this->load->model('mtr/m_purchasing');
    }

    function index()
    {   
        $data['mtr_list'] = $this->m_purchasing->getDataAllMaterials();
        $data['company'] = $this->m_purchasing->getDataCompany();
        $this->load->view('mtr/purchasing',$data);
          
    }
    public function getData_mtr_of_purchasing(){
        $id_mtr = $this->input->post('id_mtr');
        $result = $this->m_purchasing->getData_mtr_of_purchasingDB($id_mtr);
        echo json_encode($result);
    }
    public function CreatePurchasing(){
        $date_of_recieve_mtr = $this->input->post('date_of_recieve_mtr');
        $date_of_purchasing = $this->input->post('date_of_purchasing');
        $company_purchasing = $this->input->post('company_purchasing');
        $purchasing_number = $this->input->post('purchasing_number');
        $invoice_number = $this->input->post('invoice_number');
        $file_attach_purchasing = "";
        $update_purchasing_id = $this->input->post('update_purchasing_id');
        
        if(!$update_purchasing_id){
            if($_FILES['file_attach_purchasing']['name']){
                $new_path = './upload/file_purchasing/';
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
                $config['file_name'] = $_SERVER['REQUEST_TIME'].'-Purchasing';
                //------------------------------------------------------------------
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload("file_attach_purchasing"))
                {
                   $error = $this->upload->display_errors();
                   echo "error";
                   //echo "ไม่สามารถทำการอัพโหลดเอกสารแนบได้ กรุณาตรวจสอบเอกสารแนบ";
                   exit;
                }
                else
                {
                    $uload_data = $this->upload->data();
                    $file_attach_purchasing = $uload_data['file_name'];
                    //$file_extension = $uload_data['file_ext'];
                }
            }
            $data = array(
                "date_of_recieve_mtr" => date( "Y-m-d", strtotime($date_of_recieve_mtr)),
                "date_of_purchasing" => date( "Y-m-d", strtotime($date_of_purchasing)),
                "company_purchasing" => $company_purchasing,
                "purchasing_number" => $purchasing_number,
                "invoice_number" => $invoice_number,
                "file_attach_purchasing" => $file_attach_purchasing,
                "active" => 0,
                "created" => date("Y-m-d H:i:s"),
                "updated" => date("Y-m-d H:i:s")
            );
            $id_purchasing = $this->m_purchasing->CreatedPurchasingDB($data);
            echo $id_purchasing;
        }else{
            if($_FILES['file_attach_purchasing']['name']){
                $new_path = './upload/file_purchasing/';
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
                $config['file_name'] = $_SERVER['REQUEST_TIME'].'-Purchasing';
                //------------------------------------------------------------------
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload("file_attach_purchasing"))
                {
                   $error = $this->upload->display_errors();
                   echo "error";
                   //echo "ไม่สามารถทำการอัพโหลดเอกสารแนบได้ กรุณาตรวจสอบเอกสารแนบ";
                   exit;
                }
                else
                {
                    $uload_data = $this->upload->data();
                    $file_attach_purchasing = $uload_data['file_name'];
                    //$file_extension = $uload_data['file_ext'];
                }
            }
            $data = array(
                "date_of_recieve_mtr" => date( "Y-m-d", strtotime($date_of_recieve_mtr)),
                "date_of_purchasing" => date( "Y-m-d", strtotime($date_of_purchasing)),
                "company_purchasing" => $company_purchasing,
                "purchasing_number" => $purchasing_number,
                "invoice_number" => $invoice_number,
                "file_attach_purchasing" => $file_attach_purchasing,
                "active" => 1,
                //"created" => date("Y-m-d H:i:s"),
                "updated" => date("Y-m-d H:i:s")
            );
            $this->m_purchasing->UpdatedDataPurchasingTerminal($data,$update_purchasing_id);
            
            //------------------- update amount balance table register_mtr -------------------------
            $result = $this->m_purchasing->getAmountImportOfPurchasing($update_purchasing_id);
            foreach($result as $row){
                $result_amount = $this->m_purchasing->getAmountBalanceOfRegisterMTR($row->materials_id);
                if($result_amount){
                    $amount_update = ($row->imports_amount + $result_amount[0]['mtr_balance']);
                
                    $this->m_purchasing->UpdateAmountBalanceOfRegister_mtr($row->materials_id,$amount_update); 
                }
            }
            $this->m_purchasing->SaveTransactionMaterials($update_purchasing_id,'purchasing');
        }
    }
    public function show_list_order_purchasing($purchasing_id){
        $data['order_po'] = $this->m_purchasing->show_list_order_purchasingDB($purchasing_id);
        
        $this->load->view('mtr/list_order_purchasing',$data);
    }
    public function add_item_invoice_of_purchasing(){
        $purchasing_id = $this->input->post('purchasing_id');
        $temp_mtr_id = $this->input->post('temp_mtr_id');
        $temp_mtr_number = $this->input->post("temp_mtr_number");
        $temp_mtr_name = $this->input->post("temp_mtr_name");
        $temp_unit_mtr = $this->input->post('temp_unit_mtr');
        $amount_purchasing = $this->input->post("amount_purchasing");
        $balance_mtr = $this->input->post("balance_mtr");
        $price_per_unit = $this->input->post("price_per_unit");
        
        $data = array(
            "purchasing_id" => $purchasing_id,
            "materials_id" => $temp_mtr_id,
            "materials_number" => $temp_mtr_number,
            "materials_name" => $temp_mtr_name,
            "materials_unit" => $temp_unit_mtr,
            "imports_amount" => $amount_purchasing,
            "balance_mtr" => $balance_mtr,
            "price_per_unit" => $price_per_unit,
            "total" => ($amount_purchasing * $price_per_unit),
            "active" => 1,
            "created" => date("Y-m-d H:i:s"),
            "updated" => date("Y-m-d H:i:s")
        );
        $this->m_purchasing->add_item_invoice_of_purchasingDB($data);
        
    }
    public function RemoveItemOrderInvoice(){
        $order_invoice_of_purchasing_id = $this->input->post('order_invoice_of_purchasing_id');
        $this->m_purchasing->RemoveItemOrderInvoiceDB($order_invoice_of_purchasing_id);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */