<?php


class m_mtr_detail extends CI_Model{

    function check_duplicate($number = "")
   {
   	    $sql  = "select * from tbl_mtr_detail where detail_number = '$number'";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
   }
   function edit_model($data = "", $id = "")
    {
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->where('detail_id', $id);
        $this->db->update('tbl_mtr_detail', $data); 
    }
   function check_dupli($num = '', $id)
    {
        $sql  = "select * from tbl_mtr_detail where detail_number = '$num' && detail_id <> $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
    }
   function get_edit($id = '')
    {
        $sql  = "select * from tbl_mtr_detail where detail_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
   function insert_mtr_detail($data = "")
   {
   	    $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('tbl_mtr_detail', $data); 
   }
   function get_all()
   {
   	    $sql  = "select * from tbl_mtr_detail order by detail_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
   }
   function search($id = "")
    {
        $sql  = "select * from tbl_mtr_detail where type_id = $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    function search_detail($txt = "")
    {
    	  $sql  = "select * from tbl_mtr_detail where detail_number  LIKE '%$txt%' or detail_name  LIKE '%$txt%' ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
}
