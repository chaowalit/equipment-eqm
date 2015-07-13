<?php

class m_agency extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
      function check_dupli($num = '', $id)
    {
        $sql  = "select * from tbl_agency where agency_number = '$num' && agency_id <> $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
    }
    function get_all()
    {
        $sql  = "select * from tbl_agency order by agency_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
     function insert_agency($data = '')
    {
        $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('tbl_agency', $data);  
    }
    function get_edit($id = '')
    {
        $sql  = "select * from tbl_agency where agency_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
     function update_agency($data = '' ,$id = '')
    {   
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->where('agency_id', $id);
        $this->db->update('tbl_agency', $data); 
    }
}
?>