<?php

class m_service extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    function get_amphur()
    {
        $sql  = "select * from tbl_amphur";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
    function get_tambol()
    {
        $sql  = "select * from tbl_district";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
    function get_provinc()
    {
        $sql  = "select * from tbl_province";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
    function get_all()
    {
        $sql  = "select * from service order by service_id DESC limit 1";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
    function save_service($data)
    {     
        $sql  = "delete from service";
        $result = $this->db->query($sql);

         $this->db->set('cdate', 'NOW()', FALSE);
         $this->db->set('udate', 'NOW()', FALSE);
         $this->db->insert('service', $data);
         return true; 
    }
}
?>