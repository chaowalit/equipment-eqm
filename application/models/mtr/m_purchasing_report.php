<?php


class m_purchasing_report extends CI_Model{
    //put your code here
    function get_data_purchasing()
    {
        //$sql  = "select * from purchasing_materials where active  = '1' order by id DESC ";
        $sql = "
                     select * , a.id as ids from purchasing_materials  a
                     left join company b on a.company_purchasing = b.id
                     where a.active  = '1' order by a.id DESC 
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function get_data_purchasing_order($id = "")
    {
        $sql  = "
        select * from purchasing_materials a
        left join order_invoice_of_purchasing b on a.id  = b.purchasing_id
        where b.purchasing_id = $id
        and a.active = 1
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
}
