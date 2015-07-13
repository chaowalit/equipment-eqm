<?php

class m_be_under extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    function check_dupli($num = '', $id)
    {
        $sql  = "select * from be_under_company where be_under_number = '$num' && be_under_id <> $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
    }
    function get_all()
    {
        $sql  = "select * from be_under_company order by be_under_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function insert_be_under($data = '')
    {
        $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('be_under_company', $data); 
    }
    function get_edit($id = '')
    {
        $sql  = "select * from be_under_company where be_under_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function update_be_under($data = '' ,$id = '')
    {
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->where('be_under_id', $id);
        $this->db->update('be_under_company', $data); 
    }

}
?>