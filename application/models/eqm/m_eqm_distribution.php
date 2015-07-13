<?php


class m_eqm_distribution extends CI_Model{
    //put your code here
    function getDataEquipmentDB(){
        $this->db->select('*');
        $this->db->from('equipment');
        $this->db->where('eqm_status','ready');
        $this->db->or_where('eqm_status', 'waste');
        $this->db->or_where('eqm_status', 'transfer');
        $this->db->order_by('eqm_names','asc');
        $result = $this->db->get();
        return $result->result();
    }
    function getDataEquipmentSelectDB($eqm_id){
        $this->db->select('*');
        $this->db->from('equipment');
        $this->db->where('eqm_id',$eqm_id);
       
        $this->db->order_by('eqm_names','asc');
        $result = $this->db->get();
        return $result->result();
    }
    function saveData_eqm_distributionDB($data){
        $this->db->insert('eqm_distribution', $data);
    }
    function getShowDataEqmDistributionDB(){
        $this->db->select('eqm_distribution.id as eqm_distribution_id,distribution_number,distribution_date,eqm_numbers1,eqm_numbers2,eqm_numbers3,eqm_amout_number,eqm_names,type_distribution,company_name,price,file_attach_distribution');
        $this->db->from('eqm_distribution');
        $this->db->join('equipment', 'equipment.eqm_id = eqm_distribution.equipment_id');
        $this->db->join('company', 'company.id = eqm_distribution.company_distribution_id');
        //$this->db->where('eqm_status', 'distribution');
        $result = $this->db->get();
        return $result->result();
    }
    function getShowDataEqmDistributionDB2(){
        $this->db->select('equipment.*,eqm_distribution.equipment_id  as   equipment_id, eqm_distribution.id as eqm_distribution_id,distribution_number,distribution_date,barcode,eqm_names,type_distribution,company_name,price,file_attach_distribution');
        $this->db->from('eqm_distribution');
        $this->db->join('equipment', 'equipment.eqm_id = eqm_distribution.equipment_id');
        $this->db->join('company', 'company.id = eqm_distribution.company_distribution_id');
        //$this->db->where('eqm_status', 'distribution');
        $result = $this->db->get();
        return $result->result();
    }
    function updateStatusEqm($equipment_id,$status){
        $data = array(
            "eqm_status" => $status
        );
        $this->db->where('eqm_id', $equipment_id);
        $this->db->update('equipment', $data); 
    }
    
    function getDataEditDistributionDB($distribution_id){
        $this->db->select('eqm_distribution.*,equipment.barcode,equipment.eqm_names');
        $this->db->from('eqm_distribution');
        $this->db->join('equipment', 'equipment.eqm_id = eqm_distribution.equipment_id');
        $this->db->where('eqm_distribution.id',$distribution_id);
        $result = $this->db->get();
        return $result->result_array();
    }
    
    function updateData_eqm_distributionDB($data,$distribution_id){
        $this->db->where('id', $distribution_id);
        $this->db->update('eqm_distribution', $data); 
    }
}
