<?php

class m_withdrawal extends CI_Model{
    //put your code here
    function getDataUserAccount(){
        $this->db->select('*');
        $this->db->from('user_account');
        $result = $this->db->get();
        return $result->result();
    }
    function CreateWithdrawalDB($data){
        $this->db->trans_start();
        $this->db->insert('withdrawal_materials',$data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return  $insert_id;
    }
    function getLastWithdrawal_Of_MTR($id_mtr){
        $this->db->select('*');
        $this->db->from('order_of_withdrawal');
        $this->db->join('withdrawal_materials', 'withdrawal_materials.id = order_of_withdrawal.withdrawal_materials_id');
        $this->db->where('order_of_withdrawal.materials_id',$id_mtr);
        $this->db->where('withdrawal_materials.active',1);
        $this->db->order_by('withdrawal_materials.updated','desc');
        $this->db->limit(1);
        $result = $this->db->get();
        return $result->result_array();
    }
    function AddListWithdrawalOrderDB($data){
        $this->db->insert('order_of_withdrawal',$data);
    }
    function getListAllOrderWithdrawal($withdrawal_id){
        $this->db->select('*');
        $this->db->from('order_of_withdrawal');
        $this->db->where('withdrawal_materials_id',$withdrawal_id);
        $this->db->where('active',1);
        $result = $this->db->get();
        return $result->result();
    }
    function RemoveItemOrderWithdrawalDB($order_of_withdrawal_id){
        $this->db->where('id', $order_of_withdrawal_id);
        $this->db->delete('order_of_withdrawal'); 
    }
    function UpdatedWithdrawalDB($data,$updated_withdrawal_materials_id){
        $this->db->where('id', $updated_withdrawal_materials_id);
        $this->db->update('withdrawal_materials', $data); 
    }
    function getAmountExportOfWithdrawal($updated_withdrawal_materials_id){
        $this->db->select('*');
        $this->db->from('order_of_withdrawal');
        $this->db->where('withdrawal_materials_id', $updated_withdrawal_materials_id);
        $this->db->where('active',1);
        $result = $this->db->get();
        return $result->result();
    }
    function SaveTransactionMaterials($item_id,$status){
        $data = array(
            "purchasing_materials_id" => 0,
            "withdrawal_materials_id" => $item_id,
            "type_transaction" => $status,
            "active" => 1,
            "created" => date("Y-m-d H:i:s"),
            "updated" => date("Y-m-d H:i:s")
        );
        $this->db->insert('transaction_mtr',$data);
    }
    function getDataGeneratePDF($withdrawal_id){
        $this->db->select('*');
        $this->db->from('withdrawal_materials');
        $this->db->join('order_of_withdrawal', 'order_of_withdrawal.withdrawal_materials_id = withdrawal_materials.id');
        $this->db->where('withdrawal_materials.id',$withdrawal_id);
        $this->db->where('withdrawal_materials.active',1);
        $result = $this->db->get();
        return $result->result_array();
    }
    function getUserAccountAll(){
        $this->db->select('*');
        $this->db->from('user_account');
        $result = $this->db->get();
        return $result->result();
    }
}
