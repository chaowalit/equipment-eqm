<?php

class m_eqm_distribution extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    function keeplog($depreciation_type = "")
    {   
        $data = array(
           'log_id' => '' ,
           'logname' => "ค่าเสื่อมราคา :: ".$depreciation_type ,
           'log_by' => $this->full_name
        );
        $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('log_maindata_eqm', $data); 
    }
    function keeplog_group_type($group_type_names = "")
    {
        $data = array(
           'log_id' => '' ,
           'logname' => "กลุ่มประเภท :: ".$group_type_names ,
           'log_by' => $this->full_name
        );
        $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('log_maindata_eqm', $data); 
    }
    function keeplog_type($type_names = "")
    {
        $data = array(
           'log_id' => '' ,
           'logname' => "ชนิด :: ".$type_names ,
           'log_by' => $this->full_name
        );
        $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('log_maindata_eqm', $data); 
    }
    function keeplog_detail($detail_names = "")
    {
        $data = array(
           'log_id' => '' ,
           'logname' => "ชื่อ/รายละเอียด :: ".$detail_names ,
           'log_by' => $this->full_name
        );
        $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('log_maindata_eqm', $data); 
    }
    function get_check()
    {
        $sql  = "select * from equipment";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function get_all()
    {
        $sql  = "select * from tbl_depreciation order by depreciation_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function insert_eqm_distribution($data = '')
    {   
        $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('tbl_depreciation', $data); 
    }
    function get_edit($id = '')
    {
        $sql  = "select * from tbl_depreciation where depreciation_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function edit_eqm_distribution($data = "", $id = "")
    {
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->where('depreciation_id', $id);
        $this->db->update('tbl_depreciation', $data); 
    }
    function search_eqm_distribution($txt = '')
    {
        $sql  = "select * from tbl_depreciation where depreciation_number  LIKE '%$txt%' or depreciation_type  LIKE '%$txt%' ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
}
?>