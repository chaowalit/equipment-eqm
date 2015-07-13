<?php

class m_detail extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    function get_all()
    {
        $sql  = "select * from tbl_detail order by detail_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
     function check_duplicate($id = "")
    {
        $sql  = "select * from tbl_detail where detail_numbers = $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
    }
      function insert_detail($data = '')
    {
        $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('tbl_detail', $data); 
    }
    function search($id = "")
    {
        $sql  = "select * from tbl_detail where type_id = $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    function get_edit($id = '')
    {
        $sql  = "select * from tbl_detail where detail_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function check_dupli($num = '', $id)
    {
        $sql  = "select * from tbl_detail where detail_numbers = '$num' && detail_id <> $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
    }
    function edit_detail($data = "",$data2 = "", $id = "")
    {
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->where('detail_id', $id);
        $this->db->update('tbl_detail', $data); 

        $this->db->where('id_detail', $id);
        $this->db->update('equipment', $data2); 

         $sql = "select * from equipment where id_detail = $id";
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
        $this->db->where('id_detail', $id);
        $this->db->update('equipment', $data3);
    }
    function search_detail($txt = '')
    {
        $sql  = "select * from tbl_detail where detail_numbers  LIKE '%$txt%' or detail_names  LIKE '%$txt%' ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
}
?>