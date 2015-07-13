<?php

class m_working_group extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
     function check_dupli($num = '', $id)
    {
        $sql  = "select * from working_group where working_group_number = '$num' && working_group_id <> $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
    }
    function get_all()
    {
        $sql  = "select * from working_group order by working_group_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function insert_working_group($data = '')
    {
        $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('working_group', $data); 
    }
    function get_edit($id = '')
    {
        $sql  = "select * from working_group where working_group_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function update_working_group($data = '' ,$id = '')
    {
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->where('working_group_id', $id);
        $this->db->update('working_group', $data); 
    }

}
?>