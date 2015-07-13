<?php

class m_eqm_transfer extends CI_Model{
    //put your code here
    function getDataUserAccountWithWorkGroupDB($workgroup_id){
        $this->db->select('*');
        $this->db->from('user_account');
        $this->db->where('working_group_id',$workgroup_id);
        $this->db->where('active',1);
        $this->db->order_by('full_name','asc');
        $result = $this->db->get();
        return $result->result();
    }
    function saveData_eqm_transferDB($data){
        $this->db->insert('eqm_transfer', $data);
    }
    function getShowDataEqmTransferDB(){
        $this->db->select('*');
        $this->db->from('eqm_transfer');
        $this->db->join('equipment', 'equipment.eqm_id = eqm_transfer.equipment_id');
        //$this->db->join('company', 'company.id = eqm_transfer.company_distribution_id');
        //$this->db->where('eqm_status', 'transfer');
        $this->db->order_by('eqm_transfer.updated','desc');
        $result = $this->db->get();
        return $result->result();
    }
    function getShowDataEqmTransferDB2(){
        $this->db->select('*');
        $this->db->from('eqm_transfer');
        $this->db->join('equipment', 'equipment.eqm_id = eqm_transfer.equipment_id');
        //$this->db->join('company', 'company.id = eqm_transfer.company_distribution_id');
        $this->db->group_by('eqm_transfer.equipment_id');
        $this->db->order_by('eqm_transfer.updated','desc');
        $result = $this->db->get();
        return $result->result();
    }
    function getDataWorkGroupToArray(){
        $this->db->select('*');
        $this->db->from('be_under_company');
        
        $result = $this->db->get();
        return $result->result();
    }
    function getDataUserAccountToArray(){
        $this->db->select('*');
        $this->db->from('user_account');
        
        $result = $this->db->get();
        return $result->result();
    }
    function getDataEditTrasferDB($transfer_id){
        $this->db->select('eqm_transfer.*,equipment.eqm_numbers1,equipment.eqm_numbers2,equipment.eqm_numbers3,equipment.eqm_amout_number,equipment.eqm_names');
        $this->db->from('eqm_transfer');
        $this->db->join('equipment', 'equipment.eqm_id = eqm_transfer.equipment_id');
        $this->db->where('eqm_transfer.id',$transfer_id);
        $result = $this->db->get();
        return $result->result_array();
    }
    function updateData_eqm_transferDB($data,$transfer_id){
        $this->db->where('id', $transfer_id);
        $this->db->update('eqm_transfer', $data); 
    }
}
