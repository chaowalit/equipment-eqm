<?php

class m_title_name extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
     function check_dupli($num = '', $id)
    {
        $sql  = "select * from title_name where title_name_number = '$num' && title_name_id <> $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
    }
    function get_all()
    {
        $sql  = "select * from title_name order by title_name_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function insert_title_name($data = '')
    {
        $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('title_name', $data); 
    }
    function get_edit($id = '')
    {
        $sql  = "select * from title_name where title_name_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function update_title_name($data = '' ,$id = '')
    {
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->where('title_name_id', $id);
        $this->db->update('title_name', $data); 
    }

}
?>