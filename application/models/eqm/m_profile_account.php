<?php

class m_profile_account extends CI_Model{
    //put your code here
    function getDataProfileAccountDB($account_id){
        $this->db->select('*');
        $this->db->from('user_account');
        $this->db->where('id',$account_id);
        $this->db->limit(1); 
        $result = $this->db->get();
        return $result->result();
    }
    function updateUserDataAccountDB($data,$account_id){
        $this->db->where('id', $account_id);
        $this->db->update('user_account', $data); 
    }
}
