<?php

class m_unit extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    function insert_unit($data = '')
    {
        $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('tbl_unit', $data);  
    }
    function check_dupli($num = '', $id)
    {
        $sql  = "select * from tbl_unit where unit_number = '$num' && unit_id <> $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
    }
    function get_all()
    {
        $sql  = "select * from tbl_unit order by unit_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function get_edit($id = '')
    {
        $sql  = "select * from tbl_unit where unit_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function update_unit($data = '' ,$id = '')
    {   
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->where('unit_id', $id);
        $this->db->update('tbl_unit', $data); 
    }
    function check_duplicate($unit_id1 = '')
    {
         $sql  = "select * from tbl_unit where unit_id != $unit_id1";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }

}
?>