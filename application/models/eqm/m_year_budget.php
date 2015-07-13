<?php

class m_year_budget extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
     function check_dupli($num = '', $id)
    {
        $sql  = "select * from year_budget where year_budget_number = '$num' && year_budget_id <> $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
    }
    function get_all()
    {
        $sql  = "select * from year_budget order by year_budget_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function insert_year_budget($data = '')
    {
        $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('year_budget', $data); 
    }
    function get_edit($id = '')
    {
        $sql  = "select * from year_budget where year_budget_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function update_year_budget($data = '' ,$id = '')
    {
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->where('year_budget_id', $id);
        $this->db->update('year_budget', $data); 
    }

}
?>