<?php

class m_type_budget extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    function check_dupli($num = '', $id)
    {
        $sql  = "select * from type_budget where type_budget_number = '$num' && type_budget_id <> $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
    }
    function get_all()
    {
        $sql  = "select * from type_budget order by type_budget_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function insert_type_budget($data = '')
    {
        $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('type_budget', $data); 
    }
    function get_edit($id = '')
    {
        $sql  = "select * from type_budget where type_budget_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function update_type_budget($data = '' ,$id = '')
    {
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->where('type_budget_id', $id);
        $this->db->update('type_budget', $data); 
    }

}
?>