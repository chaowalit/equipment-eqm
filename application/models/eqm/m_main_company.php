<?php

class m_main_company extends CI_Model{
    //put your code here
    function getDataProvinceShow(){
        $this->db->select('*');
        $this->db->from('tbl_province');
        $this->db->order_by('province_name','asc');
        $result = $this->db->get();
        return $result->result();
    }
    function getDataAmphurShow(){
        $this->db->select('*');
        $this->db->from('tbl_amphur');
        $this->db->order_by('amphur_name','asc');
        $result = $this->db->get();
        return $result->result();
    }
    function getProvinceOfAmphur($amphur_id){
        $this->db->select('*');
        $this->db->from('tbl_amphur');
        $this->db->join('tbl_province','tbl_province.province_id = tbl_amphur.province_id');
        $this->db->where('amphur_id',$amphur_id);
        $this->db->order_by('province_name','asc');
        $result = $this->db->get();
        return $result->result();
    }
    function getAmphurOfProvince($province_id){
        $this->db->select('*');
        $this->db->from('tbl_amphur');
        $this->db->where('province_id',$province_id);
        $this->db->order_by('amphur_name','asc');
        $result = $this->db->get();
        return $result->result();
    }
    function saveDataCompanyDB($data){
        $this->db->insert('company', $data);
    }
    function getDataCompanyDB(){
        $this->db->select('*');
        $this->db->from('company');
        $this->db->join('tbl_province','tbl_province.province_id = company.province_id');
        $this->db->join('tbl_amphur','tbl_amphur.amphur_id = company.amphur_id');
        $this->db->order_by('id','asc');
        $result = $this->db->get();
        return $result->result();
    }
    function deleteDataCompanyDB($company_id){
        $this->db->delete('company', array('id' => $company_id)); 
    }
    function dataFileNameForDelete($company_id){
        $this->db->select('*');
        $this->db->from('company');
        $this->db->where('id',$company_id);
        $result = $this->db->get();
        return $result->result();
    }
    function getDataCompanyForUpdate($company_id){
        $this->db->select('*');
        $this->db->from('company');
        $this->db->where('id',$company_id);
        $result = $this->db->get();
        return $result->result();
    }
    function updateDataCompanyDB($data,$company_id){
        $this->db->where('id', $company_id);
        $this->db->update('company', $data);
    }
    function getDataDistrictShow($amphur_id){
        $this->db->select('*');
        $this->db->from('tbl_district');
        $this->db->where('amphur_id',$amphur_id);
        $result = $this->db->get();
        return $result->result();
    }
}
