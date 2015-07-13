<?php


class m_mtr_model extends CI_Model{

    function check_duplicate($number = "")
   {
   	    $sql  = "select * from tbl_mtr_model where type_numbers = '$number'";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
   }
   function edit_model($data = "", $id = "")
    {
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->where('type_id', $id);
        $this->db->update('tbl_mtr_model', $data); 
    }
   function check_dupli($num = '', $id)
    {
        $sql  = "select * from tbl_mtr_model where type_numbers = '$num' && type_id <> $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
    }
   function get_edit($id = '')
    {
        $sql  = "select * from tbl_mtr_model where type_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
   function insert_mtr_model($data = "")
   {
   	    $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('tbl_mtr_model', $data); 
   }
   function get_all()
   {
   	    $sql  = "select * from tbl_mtr_model order by group_type_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
   }
   function search($id = "")
    {
        $sql  = "select * from tbl_mtr_model where group_type_id = $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    function search_model($txt = "")
    {
    	$sql  = "select * from tbl_mtr_model where type_numbers  LIKE '%$txt%' or type_names  LIKE '%$txt%' ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
}
