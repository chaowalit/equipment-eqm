<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_eqm_repair
 *
 * @author Chaowalit kongkom
 */
class m_eqm_repair extends CI_Model{
    //put your code here
    function saveData_eqm_repair_step1DB($data){
        $this->db->insert('eqm_repair', $data);
    }
    function check_eqm_repair_noDB($eqm_id){
        $this->db->select('*');
        $this->db->from('eqm_repair');
        $this->db->where('equipment_id',$eqm_id);
        $result = $this->db->get();
        return $result->result();
    }
    function getAllShowDataEqmRepair(){
        $this->db->select('eqm_repair.*,equipment.eqm_numbers1,equipment.eqm_numbers2,equipment.eqm_numbers3,equipment.eqm_amout_number,equipment.eqm_names,company.company_name');
        $this->db->from('eqm_repair');
        $this->db->join('equipment', 'equipment.eqm_id = eqm_repair.equipment_id');
        $this->db->join('company', 'company.id = eqm_repair.repair_company_id');
        $this->db->where('repair_finish', 0);
        $this->db->order_by('eqm_repair.updated','desc');
        $result = $this->db->get();
        return $result->result();
    }
    function getDataRepairFromEqmPage($equipment_id){
        $this->db->select('*');
        $this->db->from('equipment');
        $this->db->where('eqm_id',$equipment_id);
        $this->db->where('eqm_status <>','repair');
        $this->db->where('eqm_status <>','distribution');
        $result = $this->db->get();
        return $result->result_array();
    }
    function getDataEditRepairDB($repair_id){
        $this->db->select('eqm_repair.*,equipment.eqm_numbers1,equipment.eqm_numbers2,equipment.eqm_numbers3,equipment.eqm_amout_number,equipment.eqm_names,equipment.eqm_status,user_account.full_name');
        $this->db->from('eqm_repair');
        $this->db->join('equipment', 'equipment.eqm_id = eqm_repair.equipment_id');
        $this->db->join('user_account', 'user_account.id = eqm_repair.repairing_user_notify_id');
        $this->db->where('eqm_repair.id',$repair_id);
        $result = $this->db->get();
        return $result->result_array();
    }
    function updateData_eqm_repair_step1DB($data,$repair_id){
        $this->db->where('id', $repair_id);
        $this->db->update('eqm_repair', $data); 
    }
    function saveData_eqm_repair_step2DB($show_repair_id,$data){
        $this->db->where('id', $show_repair_id);
        $this->db->update('eqm_repair', $data); 
    }
}
