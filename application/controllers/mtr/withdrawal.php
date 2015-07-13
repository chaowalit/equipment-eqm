<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class withdrawal extends eqm_backend_controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_service');
        $this->load->model('mtr/m_withdrawal');
        $this->load->model('mtr/m_purchasing');
    }

    function index()
    {   
        $data['mtr_list'] = $this->m_purchasing->getDataAllMaterials();
        $data['user_account'] = $this->m_withdrawal->getDataUserAccount();
        $this->load->view('mtr/withdrawal',$data);
    }
    public function show_list_order_withdrawal($withdrawal_id){
        
        $data['order_withdrawal'] = $this->m_withdrawal->getListAllOrderWithdrawal($withdrawal_id);
        $this->load->view('mtr/list_order_withdrawal',$data);
    }
    public function CreateWithdrawal(){
        $withdrawal_number_1 = $this->input->post('withdrawal_number_1');
        $withdrawal_number_2 = $this->input->post('withdrawal_number_2');
        $date_of_withdrawal = $this->input->post('date_of_withdrawal');
        $title_content = $this->input->post('title_content');
        $withdrawal_recieve_person = $this->input->post('withdrawal_recieve_person');
        $withdrawal_person = $this->input->post('withdrawal_person');
        $content_detail = $this->input->post('content_detail');
        $updated_withdrawal_materials_id = $this->input->post('updated_withdrawal_materials_id');
        
        if(!$updated_withdrawal_materials_id){
            $data = array(
                "withdrawal_number" => $withdrawal_number_1."/".$withdrawal_number_2,
                "withdrawal_date" => date( "Y-m-d", strtotime($date_of_withdrawal)),
                "withdrawal_person" => $withdrawal_person,
                "title_content" => $title_content,
                "content_detail" => $content_detail,
                "withdrawal_recieve_person" => $withdrawal_recieve_person,
                "active" => 0,
                "created" => date("Y-m-d H:i:s"),
                "updated" => date("Y-m-d H:i:s")
            );
            $id_withdrawal = $this->m_withdrawal->CreateWithdrawalDB($data);
            echo $id_withdrawal;
        }else{
            $data = array(
                "withdrawal_number" => $withdrawal_number_1."/".$withdrawal_number_2,
                "withdrawal_date" => date( "Y-m-d", strtotime($date_of_withdrawal)),
                "withdrawal_person" => $withdrawal_person,
                "title_content" => $title_content,
                "content_detail" => $content_detail,
                "withdrawal_recieve_person" => $withdrawal_recieve_person,
                "active" => 1,
                //"created" => date("Y-m-d H:i:s"),
                "updated" => date("Y-m-d H:i:s")
            );
            $this->m_withdrawal->UpdatedWithdrawalDB($data,$updated_withdrawal_materials_id);
            //---------------------------- remove amount balance mtr-----------------------------------------------
            $result = $this->m_withdrawal->getAmountExportOfWithdrawal($updated_withdrawal_materials_id);
            foreach($result as $row){
                $result_amount = $this->m_purchasing->getAmountBalanceOfRegisterMTR($row->materials_id,$row->materials_number);
                if($result_amount){
                    $amount_update = ($result_amount[0]['mtr_balance'] - $row->amount_withdrawal);
                    if($amount_update < 0){
                       $amount_update = 0; 
                    }
                    $this->m_purchasing->UpdateAmountBalanceOfRegister_mtr($row->materials_id,$amount_update);  //updated 
                }
            }
            $this->m_withdrawal->SaveTransactionMaterials($updated_withdrawal_materials_id,'withdrawal');  //save 
            //---------------------------------------------------------------------------
        }
    }
    public function getData_mtr_last_of_withdrawal(){
        $id_mtr = $this->input->post('id_mtr');
        $result = $this->m_withdrawal->getLastWithdrawal_Of_MTR($id_mtr);
        echo json_encode($result);
    }
    public function AddListWithdrawalOrder(){
        $withdrawal_materials_id = $this->input->post('withdrawal_materials_id');
        $materials_id = $this->input->post('materials_id');
        $materials_number = $this->input->post('materials_number');
        $materials_name = $this->input->post('materials_name');
        $date_withdrawal_last = $this->input->post('date_withdrawal_last');
        $amount_withdrawal_last = $this->input->post('amount_withdrawal_last');
        $balance_current = $this->input->post('balance_current');
        $amount_withdrawal = $this->input->post('amount_withdrawal');
        $amount_available_take = $this->input->post('amount_available_take');
        $comment_withdrawal = $this->input->post('comment_withdrawal');
        
        if($balance_current < $amount_withdrawal){
            $amount_available_take = $balance_current - $amount_withdrawal;
        }else{
            $amount_available_take = $amount_withdrawal;
        }
        
        $data = array(
            "withdrawal_materials_id" => $withdrawal_materials_id,
            "materials_id" => $materials_id,
            "materials_number" => $materials_number,
            "materials_name" => $materials_name,
            "date_withdrawal_last" => date("Y-m-d"),
            "amount_withdrawal_last" => $amount_withdrawal,
            "balance_current" => $balance_current,
            "amount_withdrawal" => $amount_withdrawal,
            "amount_available_take" => $amount_available_take,
            "comment_withdrawal" => $comment_withdrawal,
            "active" => 1,
            "created" => date("Y-m-d H:i:s"),
            "updated" => date("Y-m-d H:i:s")
        );
        $this->m_withdrawal->AddListWithdrawalOrderDB($data);
    }
    public function RemoveItemOrderWithdrawal(){
        $order_of_withdrawal_id = $this->input->post('order_of_withdrawal_id');
        $this->m_withdrawal->RemoveItemOrderWithdrawalDB($order_of_withdrawal_id);
    }
    public function PrintWithdrawal($withdrawal_id){
        $data['prin_winthdrawal'] = $this->m_withdrawal->getDataGeneratePDF($withdrawal_id);
        $list_user = $this->m_withdrawal->getUserAccountAll();
        $array_user = array();
        foreach($list_user as $row){
            $array_user[$row->id] = $row->full_name;
        }
        $data['array_user'] = $array_user;
        
        $html = $this->load->view('mtr/print_withdrawal',$data,true);
        $this->mpdf= new mPDF('th','A4','0'); //เรียกใช้งาน mPDF ส่งค่า parameter เข้าไปครับ

        $curent_url =  base_url()."index.php/index.php/mtr/withdrawal";
        $this->mpdf->SetHeader($curent_url."         ".date("Y/m/d"));
        $this->mpdf->SetFooter('{PAGENO}');

        $this->mpdf->WriteHTML($html); // สั่งให้ mPDF เขียนไฟล์ pdf
        $this->mpdf->Output("W".$withdrawal_id.'.pdf', 'D'); // จากนั้นส่งชื่อไฟล์ออกมาครับผม
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */