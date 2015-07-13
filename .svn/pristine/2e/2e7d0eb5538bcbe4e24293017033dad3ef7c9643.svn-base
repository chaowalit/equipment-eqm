<?php

class m_type extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    function get_all()
    {
        $sql  = "select * from tbl_type order by type_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
     function check_duplicate($id = "")
    {
        $sql  = "select * from tbl_type where type_numbers = $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
    }
      function insert_type($data = '')
    {
        $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('tbl_type', $data); 
    }
    function search($id = "")
    {
        $sql  = "select * from tbl_type where group_type_id = $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    function get_edit($id = '')
    {
        $sql  = "select * from tbl_type where type_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function check_dupli($num = '', $id)
    {
        $sql  = "select * from tbl_type where type_numbers = '$num' && type_id <> $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
    }
    function edit_type($data = "",$data2 = "" , $id = "")
    {
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->where('type_id', $id);
        $this->db->update('tbl_type', $data); 

        $this->db->where('id_type', $id);
        $this->db->update('equipment', $data2); 

        $sql = "select * from equipment where id_type = $id";
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
        $this->db->where('id_type', $id);
        $this->db->update('equipment', $data3);
    }
    function search_type($txt = '')
    {
        $sql  = "select * from tbl_type where type_numbers  LIKE '%$txt%' or type_names  LIKE '%$txt%' ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
}
?>