<?php


class m_all_withdrawal extends CI_Model{

    function get_all_withdrawal()
    {
        $sql  = "
        	select * from withdrawal_materials a
            left join order_of_withdrawal b on a.id = b.withdrawal_materials_id
            left join user_account c on a.withdrawal_person = c.id
            left join materials d on b.materials_id = d.id
            left join tbl_mtr_type e on d.tbl_mtr_type_id = e.group_type_id
            where a.active = 1 
            order by a.created  DESC
 			";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
    function get_searchdaily_withdrawal($data_compare = '')
    {
        $sql  = "
            select * from withdrawal_materials a
            left join order_of_withdrawal b on a.id = b.withdrawal_materials_id
            left join user_account c on a.withdrawal_person = c.id
            left join materials d on b.materials_id = d.id
            left join tbl_mtr_type e on d.tbl_mtr_type_id = e.group_type_id
            where a.active = 1 and a.withdrawal_date = '$data_compare'
            order by a.created  DESC
            ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
    function get_searchmount_withdrawal($mount_from = "",$mount_to = "")
    {
        $sql  = "
            select * from withdrawal_materials a
            left join order_of_withdrawal b on a.id = b.withdrawal_materials_id
            left join user_account c on a.withdrawal_person = c.id
            left join materials d on b.materials_id = d.id
            left join tbl_mtr_type e on d.tbl_mtr_type_id = e.group_type_id
            where a.active = 1 and a.withdrawal_date >= '$mount_from' and a.withdrawal_date <= '$mount_to'
            order by a.created  DESC
            ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
    function get_search_withdrawal($type_id = '')
    {
         $sql  = "
                select * from withdrawal_materials a
                left join order_of_withdrawal b on a.id = b.withdrawal_materials_id
                left join user_account c on a.withdrawal_person = c.id
                left join materials d on b.materials_id = d.id
                left join tbl_mtr_type e on d.tbl_mtr_type_id = e.group_type_id
                where a.active = 1 
                and e.group_type_id = $type_id
                order by a.created  DESC
            ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
    function get_searchperson_withdrawal($type_id = '')
    {
        $sql  = "
                select * from withdrawal_materials a
                left join order_of_withdrawal b on a.id = b.withdrawal_materials_id
                left join user_account c on a.withdrawal_person = c.id
                left join materials d on b.materials_id = d.id
                left join tbl_mtr_type e on d.tbl_mtr_type_id = e.group_type_id
                where a.active = 1 
                and a.withdrawal_person = $type_id
                order by a.created  DESC
            ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
    function get_type_mtr()
    {
        $sql  = "
                 select * from tbl_mtr_type a order by  a.group_type_id Desc
            ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
    function get_person_mtr()
    {
        $sql  = "
                 select * from user_account a order by  a.id Desc
            ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
}
