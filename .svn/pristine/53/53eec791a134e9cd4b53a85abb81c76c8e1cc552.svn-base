<?php

class m_report_eqm extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    function get_data_from_id($id = "")
    {
       // $sql  = "select * from equipment where eqm_id = $id";

        $sql = "
               select * , a.cdate AS aa , f.depreciation_age AS jj , f.depreciation_year AS kk from equipment a 
                left join tbl_depreciation b on a.id_depreciation = b.depreciation_id
                left join tbl_group_type c on a.id_group = c.group_type_id
                left join tbl_type d on a.id_type = d.type_id
                left join tbl_detail e on a.id_detail= e.detail_id
                left join tbl_depreciation f on a.id_depreciation = f.depreciation_id
                left join be_under_company g on a.be_under_id = g.be_under_id
                left join tbl_agency  h on a.agency_id = h.agency_id
                where a.eqm_id = $id 
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result; 
    }
    function get_tran($id = "")
    {
        
        $sql  = "
                select * from eqm_transfer a
                left join equipment b on a.equipment_id = b.eqm_id 
                left join user_account c on a.transfer_from_account_id = c.id
                left join be_under_company d on a.transfer_from_workgroup_id = d.be_under_id
                where a.equipment_id = $id
                ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    function get_dis($id = "")
    {
        // $sql  = "select a.company_distribution_id from eqm_distribution a 
        //         left join equipment b  on a.equipment_id = b.eqm_id";
        $sql  = "
        select * from eqm_distribution a 
        left join equipment b  on a.equipment_id = b.eqm_id
        left join company c on a.company_distribution_id = c.id
        ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    function get_back($id = "")
    {
        $sql  = "select * from eqm_repair a
                left join equipment b on a.equipment_id = b.eqm_id
                left join company c on a.repair_company_id = c.id
                where a.equipment_id = $id and a.repair_finish = 1";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    function get_name_type($number = "")
    {
        $sql  = "select * from  tbl_group_type where group_type_numbers = $number ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    function be_under_name($id = "")
    {
        $sql  = "select * from  be_under_company where be_under_id = $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;    
    }
    function agency_name($id = "")
    {
        $sql  = "select * from  tbl_agency where agency_id = $id";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;  
    }
    function provinc_name($id = "")
    {   
        if($id == "")
        {
           return "1";
        }
        else
        {
            $sql  = "select * from  tbl_province where province_id = $id";
            $result = $this->db->query($sql);
            $result = $result->result_array();
            return $result; 
        }
          
    }
    function tambol_name($id = "")
    {   
        if($id == "")
        {
           return "1";
        }
        else
        {
            $sql  = "select * from  tbl_district where district_id = $id";
            $result = $this->db->query($sql);
            $result = $result->result_array();
            return $result; 
        }
          
    }
    function district_name($id = "")
    {   
         if($id == "")
        {
           return "1";
        }
        else
        {
            $sql  = "select * from  tbl_amphur where amphur_id = $id";
            $result = $this->db->query($sql);
            $result = $result->result_array();
            return $result; 
        }
         
    }
    function get_type_budget()
    {
        $sql  = "select * from  type_budget";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;  
    }
    function get_method()
    {
        $sql    = "select * from acquire_method";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;  
    }
}
?>