<?php


class m_user_account extends CI_Model{
    //put your code here
    function getDataServiceDB(){
        $this->db->select('*');
        $this->db->from('service');
        $this->db->limit(1); 
        $result = $this->db->get();
        return $result->result();
    }
    function getUserDataAccountDB(){
        $this->db->select('*');
        $this->db->from('user_account');
        
        $this->db->order_by("id", "desc"); 
        $result = $this->db->get();
        return $result->result();
    }
    function saveUserDataAccountDB($data){
        $this->db->insert('user_account', $data); 
    }
    function deleteUserDataAccountDB($id){
        $this->db->delete('user_account', array('id' => $id)); 
    }
    function getDataWorkGroup(){
        $this->db->select('*');
        $this->db->from('be_under_company');
        
        //$this->db->order_by("id", "desc"); 
        $result = $this->db->get();
        return $result->result();
    }
    function getDataTitleName(){
        $this->db->select('*');
        $this->db->from('title_name');
        
        //$this->db->order_by("id", "desc"); 
        $result = $this->db->get();
        return $result->result();
    }
    function getUserDataAccountDBForUpdate($account_id){
        $this->db->select('*');
        $this->db->from('user_account');
        $this->db->where('id',$account_id);
        $this->db->order_by("id", "desc"); 
        $result = $this->db->get();
        return $result->result();
    }
    function getMenuAll(){
        $this->db->select('*');
        $this->db->from('menu_list');
        
        $this->db->order_by("menu_name", "asc"); 
        $result = $this->db->get();
        return $result->result();
    }
    function getPermissionUser($user_id){
        $this->db->select('*');
        $this->db->from('user_account');
        $this->db->join('permission_menu', 'permission_menu.user_account_id = user_account.id');
        //$this->db->join('company', 'company.id = eqm_transfer.company_distribution_id');
        $this->db->where('user_account.id', $user_id);
        //$this->db->order_by('eqm_transfer.updated','desc');
        $result = $this->db->get();
        return $result->result();
    }
    function delectPermissionUserOld($user_id){
        $this->db->delete('permission_menu', array('user_account_id' => $user_id));
    }
    function updatePermissionUserAccountDB($data){
        $this->db->insert('permission_menu', $data);
    }
    function check_permission_user_account($user_id,$controller){
        $this->db->select('*');
        $this->db->from('permission_menu');
        $this->db->join('menu_list', 'menu_list.id = permission_menu.menu_list_id');
        //$this->db->join('company', 'company.id = eqm_transfer.company_distribution_id');
        $this->db->where('permission_menu.user_account_id', $user_id);
        $this->db->where('menu_list.controller_name', $controller);
        //$this->db->order_by('eqm_transfer.updated','desc');
        $result = $this->db->get();
        return $result->result();
    }
}
