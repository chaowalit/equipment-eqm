<?php

class m_register_mtr extends CI_Model{
    //put your code here
    function getAllUnitCount(){
        $this->db->select('*');
        $this->db->from('tbl_unit');
        $this->db->order_by('unit_name','asc');
        $result = $this->db->get();
        return $result->result();
    }
    function get_type_name($materials_id = "")
    {
         $sql    = "
                   select * from materials a
                    left join tbl_mtr_type b on a.tbl_mtr_type_id = b.group_type_id
                    left join tbl_mtr_type e on a.tbl_mtr_type_id = e.group_type_id
                    left join tbl_mtr_model f on a.tbl_mtr_model_id = f.type_id
                    left join tbl_mtr_detail g on a.tbl_mtr_detail_id = g.detail_id
                    where a.id = $materials_id
                ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    function getDataMtr1($id = "", $ids= "")
    {
            $sql    = "     select * , a.created as to_time from transaction_mtr a
                        left join purchasing_materials b on a.purchasing_materials_id = b.id
                        left join order_invoice_of_purchasing c on  b.id = c.purchasing_id
                        left join materials d on c.materials_id = d.id
                        left join tbl_mtr_type e on d.tbl_mtr_type_id = e.group_type_id
                        left join tbl_mtr_model f on d.tbl_mtr_model_id = f.type_id
                        left join tbl_mtr_detail g on d.tbl_mtr_detail_id = g.detail_id
                        where c.materials_id = $id and a.id = $ids
                        and b.active = 1 
                    ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    function getDataMtr2($id = "",$ids= "")
    {
        $sql    = "
                    select * ,a.created as to_time from transaction_mtr a
                    left join withdrawal_materials b on a.withdrawal_materials_id  = b.id
                    left join order_of_withdrawal c on b.id = c.withdrawal_materials_id
                    left join materials d on c.materials_id = d.id
                    left join tbl_mtr_type e on d.tbl_mtr_type_id = e.group_type_id
                    left join tbl_mtr_model f on d.tbl_mtr_model_id = f.type_id
                    left join tbl_mtr_detail g on d.tbl_mtr_detail_id = g.detail_id
                    where c.materials_id = $id and a.id = $ids
                    and b.active = 1 
                ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    function AddRegisterMaterialsToDB($data){
        $this->db->insert('materials', $data);
    }
    function getShowAllDataRegisterMaterialsDB(){
        $this->db->select('*');
        $this->db->from('materials');
        //$this->db->join('tbl_unit', 'tbl_unit.unit_id = materials.mtr_unit');
        $this->db->order_by('updated','desc');
        $result = $this->db->get();
        return $result->result();
    }
    function getDataEditRegister_mtrDB($materials_id){
        $this->db->select('*');
        $this->db->from('materials');
        $this->db->where('id',$materials_id);
        $result = $this->db->get();
        return $result->result_array();
    }
    function UpdateRegisterMaterialsToDB($data,$materials_id){
        $this->db->where('id', $materials_id);
        $this->db->update('materials', $data);
    }
    function getTypeGroup_mtr(){
        $this->db->select('*');
        $this->db->from('tbl_mtr_type');
        
        $result = $this->db->get();
        return $result->result();
    }
    function getModelGroup_mtr($select_num_type_mtr){
        $this->db->select('tbl_mtr_model.*,tbl_mtr_type.group_type_numbers');
        $this->db->from('tbl_mtr_model');
        $this->db->join('tbl_mtr_type', 'tbl_mtr_type.group_type_id = tbl_mtr_model.group_type_id');
        $this->db->where('tbl_mtr_model.group_type_id',$select_num_type_mtr);
        $result = $this->db->get();
        return $result->result_array();
    }
    function getDataDetailGroup_mtr($select_num_model_mtr){
        $this->db->select('tbl_mtr_detail.*,tbl_mtr_model.*');
        $this->db->from('tbl_mtr_detail');
        $this->db->join('tbl_mtr_model', 'tbl_mtr_model.type_id = tbl_mtr_detail.type_id');
        $this->db->where('tbl_mtr_model.type_id',$select_num_model_mtr);
        $result = $this->db->get();
        return $result->result();
    }
    function checkCategory_of_materials($mtr_detail_info){
        $this->db->select('*');
        $this->db->from('tbl_mtr_detail');
        $this->db->where('detail_number',$mtr_detail_info);
        $this->db->limit(1);
        $result = $this->db->get();
        return $result->result_array();
    }
    function get_mtr_type($tbl_mtr_type_id){
        $this->db->select('*');
        $this->db->from('tbl_mtr_type');
        $this->db->where('group_type_id',$tbl_mtr_type_id);
        //$this->db->limit(1);
        $result = $this->db->get();
        return $result->result_array();
    }
    function get_mtr_model($tbl_mtr_model_id){
        $this->db->select('*');
        $this->db->from('tbl_mtr_model');
        $this->db->where('type_id',$tbl_mtr_model_id);
        //$this->db->limit(1);
        $result = $this->db->get();
        return $result->result_array();
    }
    function get_mtr_detail($tbl_mtr_detail_id){
        $this->db->select('*');
        $this->db->from('tbl_mtr_detail');
        $this->db->where('detail_id',$tbl_mtr_detail_id);
        //$this->db->limit(1);
        $result = $this->db->get();
        return $result->result_array();
    }
}
