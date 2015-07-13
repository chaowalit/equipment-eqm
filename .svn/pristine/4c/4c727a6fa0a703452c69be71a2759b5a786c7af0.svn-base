<?php

class m_method extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
     function check_dupli($num = '', $id)
    {
        $sql  = "select * from acquire_method where method_number = '$num' && method_id <> $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
    }
    function get_all()
    {
        $sql  = "select * from acquire_method order by method_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
     function insert_method($data = '')
    {
        $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('acquire_method', $data);  
    }
    function get_edit($id = '')
    {
        $sql  = "select * from acquire_method where method_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function update_method($data = '' ,$id = '')
    {   
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->where('method_id', $id);
        $this->db->update('acquire_method', $data); 
    }
}
?>