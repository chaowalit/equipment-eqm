<?php


class m_purchasing extends CI_Model{
    //put your code here
    function getDataCompany(){
        $this->db->select('*');
        $this->db->from('company');
        $this->db->order_by('company_name','asc');
        $result = $this->db->get();
        return $result->result();
    }
    function getDataAllMaterials(){
        $this->db->select('*');
        $this->db->from('materials');
        $this->db->order_by('mtr_name','asc');
        $result = $this->db->get();
        return $result->result();
    }
    function getData_mtr_of_purchasingDB($id_mtr){
        $this->db->select('*');
        $this->db->from('materials');
        $this->db->where('id',$id_mtr);
        $result = $this->db->get();
        return $result->result_array();
    }
    function CreatedPurchasingDB($data){
        $this->db->trans_start();
        $this->db->insert('purchasing_materials',$data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return  $insert_id;
    }
    function show_list_order_purchasingDB($purchasing_id){
        $this->db->select('*');
        $this->db->from('order_invoice_of_purchasing');
        $this->db->where('purchasing_id',$purchasing_id);
        $this->db->order_by('created','asc');
        $result = $this->db->get();
        return $result->result();
    }
    function add_item_invoice_of_purchasingDB($data){
        $this->db->insert('order_invoice_of_purchasing',$data);
    }
    function RemoveItemOrderInvoiceDB($order_invoice_of_purchasing_id){
        $this->db->where('id', $order_invoice_of_purchasing_id);
        $this->db->delete('order_invoice_of_purchasing'); 
    }
    function UpdatedDataPurchasingTerminal($data,$update_purchasing_id){
        $this->db->where('id', $update_purchasing_id);
        $this->db->update('purchasing_materials', $data); 
    }
    function getAmountImportOfPurchasing($update_purchasing_id){
        $this->db->select('*');
        $this->db->from('order_invoice_of_purchasing');
        $this->db->where('purchasing_id',$update_purchasing_id);
        $this->db->order_by('created','asc');
        $result = $this->db->get();
        return $result->result();
    }
    function getAmountBalanceOfRegisterMTR($materials_id){
        $this->db->select('*');
        $this->db->from('materials');
        $this->db->where('id',$materials_id);
        //$this->db->where('mtr_number',$materials_number);
        $result = $this->db->get();
        return $result->result_array();
    }
    function UpdateAmountBalanceOfRegister_mtr($mtr_id,$amount_update){
        $data = array(
            "mtr_balance" => $amount_update,
            "updated" => date("Y-m-d H:i:s")
        );
        $this->db->where('id', $mtr_id);
        //$this->db->where('mtr_number',$mtr_number);
        $this->db->update('materials', $data); 
    }
    function SaveTransactionMaterials($item_id,$status){
        $data = array(
            "purchasing_materials_id" => $item_id,
            "withdrawal_materials_id" => 0,
            "type_transaction" => $status,
            "active" => 1,
            "created" => date("Y-m-d H:i:s"),
            "updated" => date("Y-m-d H:i:s")
        );
        $this->db->insert('transaction_mtr',$data);
    }
}
