<?php


class m_category_of_materials extends CI_Model{

   function insert_mtr_distribution($data = "")
   {
   	    $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('tbl_mtr_type', $data); 
   }
   function get_all()
   {
   	    $sql  = "select * from tbl_mtr_type order by group_type_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
   }
   function check_duplicate($number = "")
   {
   	    $sql  = "select * from tbl_mtr_type where group_type_numbers = '$number'";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
   }
    function get_edit($id = '')
    {
        $sql  = "select * from tbl_mtr_type where group_type_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function check_dupli($num = '', $id)
    {
        $sql  = "select * from tbl_mtr_type where group_type_numbers = '$num' && group_type_id <> $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
    }
   function edit_group_type($data = "", $id = "")
    {
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->where('group_type_id', $id);
        $this->db->update('tbl_mtr_type', $data); 
    }
    function search_group_type($txt = "")
    {
    	$sql  = "select * from tbl_mtr_type where group_type_numbers  LIKE '%$txt%' or group_type_names  LIKE '%$txt%' ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
    //-------------------------------------------------------------------------------------------------
    function remove_materials_data($mtr_type_id){
        $this->db->where('tbl_mtr_type_id', $mtr_type_id);
        $this->db->delete('materials'); 
    }
    function get_tbl_mtr_model($mtr_type_id){
        $this->db->select('*');
        $this->db->from('tbl_mtr_model');
        $this->db->where('group_type_id',$mtr_type_id);
        $result = $this->db->get();
        return $result->result();
    }
    function remove_tbl_mtr_detail($type_id){
        $this->db->where('type_id', $type_id);
        $this->db->delete('tbl_mtr_detail'); 
    }
    function remove_tbl_mtr_model($mtr_type_id){
        $this->db->where('group_type_id', $mtr_type_id);
        $this->db->delete('tbl_mtr_model'); 
    }
    function remove_tbl_mtr_type($mtr_type_id){
        $this->db->where('group_type_id', $mtr_type_id);
        $this->db->delete('tbl_mtr_type'); 
    }
    //--------------------------------------------------------------------------------------------------
    function remove_tbl_mtr_model_v2($mtr_model_id){
        $this->db->where('type_id', $mtr_model_id);
        $this->db->delete('tbl_mtr_model'); 
    }
    function remove_materials_data_model($mtr_model_id){
        $this->db->where('tbl_mtr_model_id', $mtr_model_id);
        $this->db->delete('materials'); 
    }
    //-------------------------------------------------------------------------------------------------
    function remove_tbl_mtr_detail_v3($mtr_detail_id){
        $this->db->where('detail_id', $mtr_detail_id);
        $this->db->delete('tbl_mtr_detail'); 
    }
    function remove_materials_data_detail($mtr_detail_id){
        $this->db->where('tbl_mtr_detail_id', $mtr_detail_id);
        $this->db->delete('materials'); 
    }
}
