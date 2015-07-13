<?php

class m_main_eqm extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    function get_name_depreciation($id = "")
    {
        $sql  = "select * from tbl_group_type where group_type_id = $id ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
    function get_name_eqm($name = "")
    {
        $sql  = "select * from tbl_detail where detail_id  = $name ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function save_edit_Dataeqm($data = "" , $id = "")
    {  
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->where('eqm_id', $id);
        $this->db->update('equipment', $data); 
    }
    function get_edit_data($id = "")
    {
        //$sql  = "select * from equipment where eqm_id  = $id";
        $sql  = " select * , a.cdate AS aa from equipment a 
                left join tbl_depreciation b on a.id_depreciation = b.depreciation_id
                left join tbl_group_type c on a.id_group = c.group_type_id
                left join tbl_type d on a.id_type = d.type_id
                left join tbl_detail e on a.id_detail= e.detail_id
                where a.eqm_id  = $id
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function get_all_data()
    {
        //$sql  =   "select * from equipment order by eqm_id DESC";
        $sql    = "
        select * , a.cdate AS aa from equipment a 
        left join tbl_depreciation b on a.id_depreciation = b.depreciation_id
        left join tbl_group_type c on a.id_group = c.group_type_id
        left join tbl_type d on a.id_type = d.type_id
        left join tbl_detail e on a.id_detail= e.detail_id
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
     function get_all_data2()
    {
        //$sql  =   "select * from equipment order by eqm_id DESC";
        $sql    = "
         select * , a.cdate AS aa from equipment a 
        left join tbl_depreciation b on a.id_depreciation = b.depreciation_id
        left join tbl_group_type c on a.id_group = c.group_type_id
        left join tbl_type d on a.id_type = d.type_id
        left join tbl_detail e on a.id_detail= e.detail_id
        left join eqm_repair f on a.eqm_id = f.equipment_id
        where f.equipment_id <> 'null'
        and f.repair_finish <> '0'
        group by f.equipment_id 
        
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
     function get_all_data_repair()
    {
        /*
        $sql  = "
            select * from equipment a
            left join eqm_repair b on a.eqm_id = b.equipment_id
            where b.equipment_id <> 'null'
        ";
        */
        $sql = "
            select * , a.cdate AS aa from equipment a 
            left join tbl_depreciation b on a.id_depreciation = b.depreciation_id
            left join tbl_group_type c on a.id_group = c.group_type_id
            left join tbl_type d on a.id_type = d.type_id
            left join tbl_detail e on a.id_detail= e.detail_id
            left join eqm_repair f on a.eqm_id = f.equipment_id
            where f.equipment_id <> 'null'
            and f.repair_finish <> '0'
            group by f.equipment_id 
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function get_all_data_report_all()
    {
       // $sql  = "select * from equipment order by eqm_id ASC";
        $sql = "
            select * , a.cdate AS aa from equipment a 
            left join tbl_depreciation b on a.id_depreciation = b.depreciation_id
            left join tbl_group_type c on a.id_group = c.group_type_id
            left join tbl_type d on a.id_type = d.type_id
            left join tbl_detail e on a.id_detail= e.detail_id
             ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function get_all_data_less()
    {
        // $sql  = "select * from equipment where eqm_price_unit < 5000 order by eqm_id DESC";
        $sql = "
            select * , a.cdate AS aa from equipment a 
            left join tbl_depreciation b on a.id_depreciation = b.depreciation_id
            left join tbl_group_type c on a.id_group = c.group_type_id
            left join tbl_type d on a.id_type = d.type_id
            left join tbl_detail e on a.id_detail= e.detail_id
            where a.eqm_price_unit < 5000 order by a.eqm_id DESC
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
     function get_all_data_more()
    {
       // $sql  = "select * from equipment where eqm_price_unit >= 5000 order by eqm_id DESC";
        $sql = "
            select * , a.cdate AS aa from equipment a 
            left join tbl_depreciation b on a.id_depreciation = b.depreciation_id
            left join tbl_group_type c on a.id_group = c.group_type_id
            left join tbl_type d on a.id_type = d.type_id
            left join tbl_detail e on a.id_detail= e.detail_id
            where a.eqm_price_unit >= 5000 order by a.eqm_id DESC
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function saveDataeqm($data = "")
    {
        $this->db->set('cdate', 'NOW()', FALSE);
        $this->db->set('udate', 'NOW()', FALSE);
        $this->db->insert('equipment', $data);
    }
    function get_select1()
    {
        $sql  = "select * from tbl_group_type order by group_type_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
    function get_select2()
    {
         $sql  = "select * from tbl_unit order by unit_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
    function get_select3()
    {
         $sql  = "select * from tbl_agency order by agency_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
     function get_select4()
    {
         $sql  = "select * from type_budget order by type_budget_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
    function get_select5()
    {
         $sql  = "select * from year_budget order by year_budget_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
    function get_select6()
    {
         $sql  = "select * from acquire_method order by method_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
    function get_select7()
    {
         $sql  = "select * from be_under_company order by be_under_id DESC";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ;
    }
    function amout_eqm_number($number = '')
    {
        $sql  = "select * from equipment where eqm_numbers = '$number'";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return count($result); 
    }
    function amout_eqm($number = '')
    {   
        $rest2 = substr($number, 0, 4); 
        $rest3 = substr($number, 5, 4); 
        $rest4 = substr($number, 10, 4);
        $sql  = "select * from equipment 
            where eqm_numbers1 = '$rest2'
            and eqm_numbers2   = '$rest3'
            and eqm_numbers3   = '$rest4'";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result; 
    }
    function get_detail_eqm($id = "")
    {
        $sql  = "
                select b.* from tbl_group_type a
                left join tbl_depreciation b on a.depreciation_id = b.depreciation_id
                where a.group_type_id = $id
               ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result ; 
    }
}
?>