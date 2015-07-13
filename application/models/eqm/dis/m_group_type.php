<?php

class m_group_type extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    function get_all()
    {
        $sql  = "select * from tbl_group_type order by group_type_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function insert_group_type($data = '')
    {
        $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('tbl_group_type', $data); 
    }
    function get_edit($id = '')
    {
        $sql  = "select * from tbl_group_type where group_type_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function check_duplicate($id = "")
    {
        $sql  = "select * from tbl_group_type where group_type_numbers = $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
    }
    function search($id = "")
    {
        $sql  = "select * from tbl_group_type where depreciation_id = $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    function edit_group_type($data = "",$data2 = "", $id = "")
    {
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->where('group_type_id', $id);
        $this->db->update('tbl_group_type', $data); 

        $this->db->where('id_group', $id);
        $this->db->update('equipment', $data2);

        $sql = "select * from equipment where id_group = $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();

        foreach ($result as  $row) {
            $eqm_numbers1 = $row['eqm_numbers1'];
            $eqm_numbers2 = $row['eqm_numbers2'];
            $eqm_numbers3 = $row['eqm_numbers3'];
            $eqm_amout_number = $row['eqm_amout_number'];
        }  
              $data3 = array(
                   'barcode' => $eqm_numbers1."-".$eqm_numbers2."-".$eqm_numbers3."/".$eqm_amout_number
                );
        $this->db->where('id_group', $id);
        $this->db->update('equipment', $data3);
    }
    function check_dupli($num = '', $id)
    {
        $sql  = "select * from tbl_group_type where group_type_numbers = '$num' && group_type_id <> $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
    }
    function search_group_type($txt = '')
    {
        $sql  = "select * from tbl_group_type where group_type_numbers  LIKE '%$txt%' or group_type_names  LIKE '%$txt%' ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
}
?>