<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class report_eqm extends eqm_backend_controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/report/m_report_eqm');
        $this->load->model('eqm/m_eqm_transfer','',TRUE);
        $this->load->model('eqm/m_eqm_distribution','',TRUE);
    }
    function index()
    {
       
    }
    function test1($id = "")
    {   
        $data['eqm'] = $this->m_report_eqm->get_data_from_id($id);
        foreach($data['eqm'] as $row)
        {
           $data['barcode'] = $row['barcode'];
        }

        $this->load->view('report/eqm/gen_report_eqm_front',$data);
    }
    function gen_pdf_front($id = "", $url = "")
    {   
        // echo "url is : ".$url;
        // exit;
        $curent_url =  base_url()."index.php/report/report_eqm/gen_pdf_front/".$id;
        //exit;
        $data['eqm_front'] = $this->m_report_eqm->get_data_from_id($id);
        // echo "<pre>";
        // print_r($data['eqm_front']);
        // echo "</pre>";
        // exit;
        $data['current_url']  = $curent_url;
        foreach($data['eqm_front'] as $row)
        {
           $data['barcode'] = $row['eqm_numbers1']."-".$row['eqm_numbers2']."-".$row['eqm_numbers3']."/".$row['eqm_amout_number'];
           $data['cdate']   = date('d/m/Y',strtotime($row['cdate']));
           $data['eqm_components'] = $row['eqm_components'];
           $data['eqm_model'] = $row['eqm_model'];
           $data['depreciation_age'] = $row['depreciation_age'];
           $data['type_budget_id']   = $row['type_budget_id'];
           $data['method_id']        = $row['method_id'];
           $data['be_under_name']    = $row['be_under_name'];
           $be_under_id       = $row['be_under_id'];
           $data['agency_name'] = $row['agency_name'];
        }
        // echo $data['be_under_name']."<br/>";
        // echo $data['agency_name']."<br/>";
       // exit;
        // echo "<><><><><><><><><><><>";
        // echo $data['barcode'];
        // exit;
        // echo $this->tambol;
        // exit;
        $tambol = $this->m_report_eqm->tambol_name($this->tambol);
        if($tambol == "1")
        {
          $data['tambol_name'] = " - ";
        }
        else
        {
          $data['tambol_name'] = $tambol[0]['district_name'];
        }

        $provinc = $this->m_report_eqm->provinc_name($this->provinc);
        if($provinc == "1")
        {
          $data['provinc_name'] = " - ";
        }
        else
        {
          $data['provinc_name'] = $provinc[0]['province_name'];
        }
        

        $district = $this->m_report_eqm->district_name($this->district);
        if($district == "1")
        {
            $data['district_name'] = " - ";
        }
        else
        {
            $data['district_name'] = $district[0]['amphur_name'];
        }
        
       // exit;
        $data['type_number'] = $data['barcode'];
        $type_number         = substr($data['type_number'],0,4);
        // echo $type_number ;
        // exit;
        $data['type'] = $this->m_report_eqm->get_name_type($type_number);
         foreach($data['type'] as $row)
        {
           $data['type_name'] = $row['group_type_names'];
        }
        // echo $data['type_name'];
        // exit;
        $year         = substr($data['cdate'], 6);
        $new          = date('Y/m/d',$cal_date);
        $now_date     = date('Y/m/d');
        $now_date_cal = strtotime($now_date);
        $my_year = array();
        for($i = 1 ; $i <=  $data['depreciation_age']+1 ; $i++)
        {
           $cal_date   = strtotime($year.'/09/30+'.$i.' year');
           $new        = date('Y/m/d',$cal_date);
           array_push($my_year, $new);
        }
        $year_loop =  array();
        $count_loop = 0 ;
        foreach($my_year as $index => $row)
        {      
                //if(strtotime(date('2020/10/01')) >= strtotime($row) && count($my_year) != ($index+1))
                if(strtotime(date('Y/m/d')) >= strtotime($row) && count($my_year) != ($index+1))
                {
                    array_push($year_loop, $row);
                    $count_loop++;
                }
                else
                {
                    break;
                }
        }

        $data['year'] = $year_loop ;
       // $data['count'] = $count_loop ;
        $data['count'] = count($my_year)-1;
        $data['type_budget'] = $this->m_report_eqm->get_type_budget();
        $data['method'] = $this->m_report_eqm->get_method();
        $html = $this->load->view('report/eqm/gen_report_eqm_front',$data,true);
        $this->mpdf= new mPDF('th','A4-L','0'); //เรียกใช้งาน mPDF ส่งค่า parameter เข้าไปครับ
        $this->mpdf->SetHeader($curent_url."         ".date("Y/m/d"));
        $this->mpdf->SetFooter('{PAGENO}');
        $this->mpdf->WriteHTML($html); // สั่งให้ mPDF เขียนไฟล์ pdf
        //$this->mpdf->Output("test1");
        $this->mpdf->Output("F".$id.'.pdf', 'D');
    }
     function gen_pdf_back($id = "")
    {   
        $data['eqm_back'] = $this->m_report_eqm->get_back($id);
        $html = $this->load->view('report/eqm/gen_report_eqm_back',$data,true);
        $this->mpdf= new mPDF('th','A4-L','0'); //เรียกใช้งาน mPDF ส่งค่า parameter เข้าไปครับ
        $curent_url =  base_url()."index.php/report/report_eqm/gen_pdf_back/".$id;
        $this->mpdf->SetHeader($curent_url."         ".date("Y/m/d"));
        $this->mpdf->SetFooter('{PAGENO}');
        $this->mpdf->WriteHTML($html); // สั่งให้ mPDF เขียนไฟล์ pdf
        $this->mpdf->Output("B".$id.'.pdf', 'D'); // จากนั้นส่งชื่อไฟล์ออกมาครับผม
    }
    function gen_report_transfer($id = "")
    {
      
        $data['eqm_front'] = $this->m_report_eqm->get_data_from_id($id);
        foreach($data['eqm_front'] as $row)
        {
           $data['barcode'] = $row['eqm_numbers1']."-".$row['eqm_numbers2']."-".$row['eqm_numbers3']."/".$row['eqm_amout_number'];
           $data['cdate']   = date('d/m/Y',strtotime($row['cdate']));
           $data['eqm_components'] = $row['eqm_components'];
           $data['eqm_model'] = $row['eqm_model'];
           $data['depreciation_age'] = $row['depreciation_age'];
           $data['type_budget_id']   = $row['type_budget_id'];
           $data['method_id']        = $row['method_id'];
           $data['be_under_name']    = $row['be_under_name'];
           $be_under_id       = $row['be_under_id'];
           $data['agency_name'] = $row['agency_name'];
        }

        $tambol = $this->m_report_eqm->tambol_name($this->tambol);
        if($tambol == "1")
        {
          $data['tambol_name'] = " - ";
        }
        else
        {
          $data['tambol_name'] = $tambol[0]['district_name'];
        }
        
        $provinc = $this->m_report_eqm->provinc_name($this->provinc);
        if($provinc == "1")
        {
          $data['provinc_name'] = " - ";
        }
        else
        {
          $data['provinc_name'] = $provinc[0]['province_name'];
        }
        $district = $this->m_report_eqm->district_name($this->district);
        if($district == "1")
        {
            $data['district_name'] = " - ";
        }
        else
        {
            $data['district_name'] = $district[0]['amphur_name'];
        }
        
       // exit;
        $data['type_number'] = $row['barcode'];
        $type_number         = substr($data['type_number'],0,4);
        $data['type'] = $this->m_report_eqm->get_name_type($type_number);
         foreach($data['type'] as $row)
        {
           $data['type_name'] = $row['group_type_names'];
        }
        $year         = substr($data['cdate'], 6);
        $new          = date('Y/m/d',$cal_date);
        $now_date     = date('Y/m/d');
        $now_date_cal = strtotime($now_date);
        $my_year = array();
        for($i = 1 ; $i <=  $data['depreciation_age']+1 ; $i++)
        {
           $cal_date   = strtotime($year.'/09/30+'.$i.' year');
           $new        = date('Y/m/d',$cal_date);
           array_push($my_year, $new);
        }
        $year_loop =  array();
        $count_loop = 0 ;
        foreach($my_year as $index => $row)
        {      
                //if(strtotime(date('2016/10/01')) >= strtotime($row) && count($my_year) != ($index+1))
                if(strtotime(date('Y/m/d')) >= strtotime($row) && count($my_year) != ($index+1))
                {
                    array_push($year_loop, $row);
                    $count_loop++;
                }
                else
                {
                    break;
                }
        }
        $userAc = $this->m_eqm_transfer->getDataUserAccountToArray();
        $user_account = array();
        foreach($userAc as $row){
            $user_account[$row->id] = $row->full_name;
        }
        $data['user_account'] =  $user_account ;
        $data['year'] = $year_loop ;
       // $data['count'] = $count_loop ;
        $data['count'] = count($my_year)-1;
        $data['type_budget'] = $this->m_report_eqm->get_type_budget();
        $data['method'] = $this->m_report_eqm->get_method();
        $data['eqm_tran'] = $this->m_report_eqm->get_tran($id);
        $html = $this->load->view('report/eqm/gen_report_transfer',$data,true);
        $this->mpdf= new mPDF('th','A4-L','0'); //เรียกใช้งาน mPDF ส่งค่า parameter เข้าไปครับ

        $curent_url =  base_url()."index.php/report/report_eqm/report_transfer/".$id;
        $this->mpdf->SetHeader($curent_url."         ".date("Y/m/d"));
        $this->mpdf->SetFooter('{PAGENO}');

        $this->mpdf->WriteHTML($html); // สั่งให้ mPDF เขียนไฟล์ pdf
       // $this->mpdf->Output("test1");
        $this->mpdf->Output("T".$id.'.pdf', 'D');
        
    }
    function gen_report_distribution($id = "")
    {

        $data['eqm_front'] = $this->m_report_eqm->get_data_from_id($id);
        // echo "<pre>";
        // print_r($data['eqm_front']);
        // echo "</pre>";
        // exit;
        foreach($data['eqm_front'] as $row)
        {
           $data['barcode'] = $row['eqm_numbers1']."-".$row['eqm_numbers2']."-".$row['eqm_numbers3']."/".$row['eqm_amout_number'];
           $data['cdate']   = date('d/m/Y',strtotime($row['cdate']));
           $data['eqm_components'] = $row['eqm_components'];
           $data['eqm_model'] = $row['eqm_model'];
           $data['depreciation_age'] = $row['depreciation_age'];
           $data['type_budget_id']   = $row['type_budget_id'];
           $data['method_id']        = $row['method_id'];
           $data['be_under_name']        = $row['be_under_name'];
           $be_under_id       = $row['be_under_id'];
           $data['agency_name'] = $row['agency_name'];
        }
        $tambol = $this->m_report_eqm->tambol_name($this->tambol);
        if($tambol == "1")
        {
          $data['tambol_name'] = " - ";
        }
        else
        {
          $data['tambol_name'] = $tambol[0]['district_name'];
        }
        
        $provinc = $this->m_report_eqm->provinc_name($this->provinc);
        if($provinc == "1")
        {
          $data['provinc_name'] = " - ";
        }
        else
        {
          $data['provinc_name'] = $provinc[0]['province_name'];
        }
        

        $district = $this->m_report_eqm->district_name($this->district);
        if($district == "1")
        {
            $data['district_name'] = " - ";
        }
        else
        {
            $data['district_name'] = $district[0]['amphur_name'];
        }
        
       // exit;
        $data['type_number'] = $row['barcode'];
        $type_number         = substr($data['type_number'],0,4);
        $data['type'] = $this->m_report_eqm->get_name_type($type_number);
         foreach($data['type'] as $row)
        {
           $data['type_name'] = $row['group_type_names'];
        }
        $year         = substr($data['cdate'], 6);
        $new          = date('Y/m/d',$cal_date);
        $now_date     = date('Y/m/d');
        $now_date_cal = strtotime($now_date);
        $my_year = array();
        for($i = 1 ; $i <=  $data['depreciation_age']+1 ; $i++)
        {
           $cal_date   = strtotime($year.'/09/30+'.$i.' year');
           $new        = date('Y/m/d',$cal_date);
           array_push($my_year, $new);
        }
        $year_loop =  array();
        $count_loop = 0 ;
        foreach($my_year as $index => $row)
        {      
                //if(strtotime(date('2016/10/01')) >= strtotime($row) && count($my_year) != ($index+1))
                if(strtotime(date('Y/m/d')) >= strtotime($row) && count($my_year) != ($index+1))
                {
                    array_push($year_loop, $row);
                    $count_loop++;
                }
                else
                {
                    break;
                }
        }
        $userAc = $this->m_eqm_transfer->getDataUserAccountToArray();
        $user_account = array();
        foreach($userAc as $row){
            $user_account[$row->id] = $row->full_name;
        }
        $data['user_account'] =  $user_account ;
        $data['year'] = $year_loop ;
       // $data['count'] = $count_loop ;
        $data['count'] = count($my_year)-1;
        $data['type_budget'] = $this->m_report_eqm->get_type_budget();
        $data['method'] = $this->m_report_eqm->get_method();
        $data['eqm_dis'] = $this->m_report_eqm->get_dis($id);
        // echo "<pre>";
        // print_r($data['eqm_dis']);
        // echo "</pre>";
        // exit;
        $html = $this->load->view('report/eqm/gen_report_dis',$data,true);
        $this->mpdf= new mPDF('th','A4-L','0'); //เรียกใช้งาน mPDF ส่งค่า parameter เข้าไปครับ

        $curent_url =  base_url()."index.php/report/report_eqm/report_distribution/".$id;
        $this->mpdf->SetHeader($curent_url."         ".date("Y/m/d"));
        $this->mpdf->SetFooter('{PAGENO}');

        $this->mpdf->WriteHTML($html); // สั่งให้ mPDF เขียนไฟล์ pdf
        //$this->mpdf->Output("test1");
        $this->mpdf->Output("D".$id.'.pdf', 'D');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */