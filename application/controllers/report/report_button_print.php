<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class report_button_print extends eqm_backend_controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_main_eqm');
        $this->load->model('eqm/m_eqm_transfer');
        $this->load->model('eqm/m_eqm_distribution','',TRUE);
        $this->load->model('mtr/m_all_withdrawal');
    }
    function index()
    {
    	echo "test";
    }
    function mtr_mount_withdrawal($mount_from1 = '' ,$mount_to1 = '')
    {  
           $d1            =  strtotime($mount_from1);
           $mount_from =  date("Y-m-d",$d1);

           $d2            =  strtotime($mount_to1);
           $mount_to =  date("Y-m-d",$d2);
        if($mount_from1 == '' || $mount_to1 == '')
        {
            $data['all_withdrawal'] = $this->m_all_withdrawal->get_all_withdrawal();
            $data['withdrawal_mount'] = "รวมทุกเดือน";
        }
        else
        {
            $data['all_withdrawal'] = $this->m_all_withdrawal->get_searchmount_withdrawal($mount_from,$mount_to);
            $data['withdrawal_mount'] =  $mount_from." ถึง ".$mount_to ;
        }
        // echo "<pre>";
        // print_r($data['all_withdrawal']);
        // echo "</pre>";
        // exit;
        $html = $this->load->view('report/mtr/report_mount_withdrawal',$data,true);
        $this->mpdf= new mPDF('th','A4-L','0'); //เรียกใช้งาน mPDF ส่งค่า parameter เข้าไปครับ
        $curent_url =  base_url()."index.php/report/report_button_print/mtr_mount_withdrawal/";
        $this->mpdf->SetHeader($curent_url.$id."         ".date("Y/m/d"));
        $this->mpdf->SetFooter('{PAGENO}');
        $this->mpdf->WriteHTML($html); // สั่งให้ mPDF เขียนไฟล์ pdf
        $this->mpdf->Output("Mount-Withdrawal".'pdf', 'D'); // จากนั้นส่งชื่อไฟล์ออกมาครับผม
    }
    function mtr_daily_withdrawal($id = '')
    {   
        $d1            =  strtotime($id);
        $data_compare  =  date("Y-m-d",$d1);
        if($id == '')
        {
            $data['all_withdrawal'] = $this->m_all_withdrawal->get_all_withdrawal();
            $data['withdrawal_date'] = "รวมทุกวัน";
        }
        else
        {
            $data['all_withdrawal'] = $this->m_all_withdrawal->get_searchdaily_withdrawal($data_compare);
            $data['withdrawal_date'] =  $data['all_withdrawal']['0']['withdrawal_date'];
        }
        
        $html = $this->load->view('report/mtr/report_daily_withdrawal',$data,true);
        $this->mpdf= new mPDF('th','A4-L','0'); //เรียกใช้งาน mPDF ส่งค่า parameter เข้าไปครับ
        $curent_url =  base_url()."index.php/report/report_button_print/mtr_daily_withdrawal/";
        $this->mpdf->SetHeader($curent_url.$id."         ".date("Y/m/d"));
        $this->mpdf->SetFooter('{PAGENO}');
        $this->mpdf->WriteHTML($html); // สั่งให้ mPDF เขียนไฟล์ pdf
        $this->mpdf->Output("Daily-Withdrawal".'pdf', 'D'); // จากนั้นส่งชื่อไฟล์ออกมาครับผม
    }
    function mtr_person_withdrawal($id = "")
    {  
        if($id == 0)
        {
            $data['all_withdrawal'] = $this->m_all_withdrawal->get_all_withdrawal();
            $data['person_name'] = "รวมทุกคน";
        }
        else
        {
            $data['all_withdrawal'] = $this->m_all_withdrawal->get_searchperson_withdrawal($id);
            $data['person_name'] =  $data['all_withdrawal']['0']['full_name'];
        }
        
        $html = $this->load->view('report/mtr/report_person_withdrawal',$data,true);
        $this->mpdf= new mPDF('th','A4-L','0'); //เรียกใช้งาน mPDF ส่งค่า parameter เข้าไปครับ
        $curent_url =  base_url()."index.php/report/report_button_print/mtr_person_withdrawal/";
        $this->mpdf->SetHeader($curent_url.$id."         ".date("Y/m/d"));
        $this->mpdf->SetFooter('{PAGENO}');
        $this->mpdf->WriteHTML($html); // สั่งให้ mPDF เขียนไฟล์ pdf
        $this->mpdf->Output("Person-Withdrawal".'pdf', 'D'); // จากนั้นส่งชื่อไฟล์ออกมาครับผม
    }
    function mtr_type_withdrawal($id = "")
    {   
        if($id == 0)
        {
            $data['all_withdrawal'] = $this->m_all_withdrawal->get_all_withdrawal();
            $data['group_type_names'] =  "ทุกประเภท";
        }
        else
        {
            $data['all_withdrawal'] = $this->m_all_withdrawal->get_search_withdrawal($id);
            $data['group_type_names'] =  $data['all_withdrawal']['0']['group_type_names'];
        }
        
        $html = $this->load->view('report/mtr/report_type_withdrawal',$data,true);
        $this->mpdf= new mPDF('th','A4-L','0'); //เรียกใช้งาน mPDF ส่งค่า parameter เข้าไปครับ
        $curent_url =  base_url()."index.php/report/report_button_print/mtr_type_withdrawal/";
        $this->mpdf->SetHeader($curent_url.$id."         ".date("Y/m/d"));
        $this->mpdf->SetFooter('{PAGENO}');
        $this->mpdf->WriteHTML($html); // สั่งให้ mPDF เขียนไฟล์ pdf
        $this->mpdf->Output("Type-Withdrawal".'pdf', 'D'); // จากนั้นส่งชื่อไฟล์ออกมาครับผม
    }
    function mtr_all_withdrawal()
    {
        $data['all_withdrawal'] = $this->m_all_withdrawal->get_all_withdrawal();
        $html = $this->load->view('report/mtr/report_all_withdrawal',$data,true);
        $this->mpdf= new mPDF('th','A4-L','0'); //เรียกใช้งาน mPDF ส่งค่า parameter เข้าไปครับ
        $curent_url =  base_url()."index.php/report/report_button_print/mtr_all_withdrawal";
        $this->mpdf->SetHeader($curent_url."         ".date("Y/m/d"));
        $this->mpdf->SetFooter('{PAGENO}');
        $this->mpdf->WriteHTML($html); // สั่งให้ mPDF เขียนไฟล์ pdf
        $this->mpdf->Output("All-Withdrawal".'pdf', 'D'); // จากนั้นส่งชื่อไฟล์ออกมาครับผม
    }
    function report_main1_1()
    {
        $curent_url =  base_url()."index.php/eqm/report_properties";
        $data['eqm'] = $this->m_main_eqm->get_all_data_report_all();
        // echo "<pre>";
        // print_r($data['eqm']);
        // echo "</pre>";
        // exit;
        $html = $this->load->view('report/eqm/all_main_data',$data,true);
        $this->mpdf= new mPDF('th','A4-L','0'); //เรียกใช้งาน mPDF ส่งค่า parameter เข้าไปครับ
        $this->mpdf->SetHeader($curent_url."         ".date("Y/m/d"));
        $this->mpdf->SetFooter('{PAGENO}');
        $this->mpdf->WriteHTML($html); // สั่งให้ mPDF เขียนไฟล์ pdf
        $this->mpdf->Output("F_All".$id.'.pdf', 'D'); // จากนั้นส่งชื่อไฟล์ออกมาครับผม
    }
     function report_main1_2()
    {

        $data['eqm'] = $this->m_main_eqm->get_all_data_report_all();
        echo $this->load->view('report/eqm/all_main_data',$data,true);
    }
    function report_more50001_1()
    {   
        $data['eqm'] = $this->m_main_eqm->get_all_data_more();
        $html = $this->load->view('report/eqm/report_more50001_1',$data,true);
        $this->mpdf= new mPDF('th','A4-L','0'); //เรียกใช้งาน mPDF ส่งค่า parameter เข้าไปครับ
        $curent_url =  base_url()."index.php/eqm/main_eqm_more5000";
        $this->mpdf->SetHeader($curent_url."         ".date("Y/m/d"));
        $this->mpdf->SetFooter('{PAGENO}');
        $this->mpdf->WriteHTML($html); // สั่งให้ mPDF เขียนไฟล์ pdf
        $this->mpdf->Output("more5000".$id.'.pdf', 'D'); // จากนั้นส่งชื่อไฟล์ออกมาครับผม
    }
    function report_more50001_2()
    {
        $data['eqm'] = $this->m_main_eqm->get_all_data_more();
        echo $this->load->view('report/eqm/report_more50001_1',$data,true);
    }
    function report_less50001_1()
    {
        $data['eqm'] = $this->m_main_eqm->get_all_data_less();
        $html = $this->load->view('report/eqm/report_lest50001_1',$data,true);
        $this->mpdf= new mPDF('th','A4-L','0'); //เรียกใช้งาน mPDF ส่งค่า parameter เข้าไปครับ
        $curent_url =  base_url()."index.php/eqm/main_eqm_less5000";
        $this->mpdf->SetHeader($curent_url."         ".date("Y/m/d"));
        $this->mpdf->SetFooter('{PAGENO}');
        $this->mpdf->WriteHTML($html); // สั่งให้ mPDF เขียนไฟล์ pdf
        $this->mpdf->Output("less5000".$id.'.pdf', 'D'); // จากนั้นส่งชื่อไฟล์ออกมาครับผม
    }
    function report_less50001_2()
    {
        $data['eqm'] = $this->m_main_eqm->get_all_data_less();
        echo  $this->load->view('report/eqm/report_lest50001_1',$data,true);
    }
    function report_repaire1_1()
    {
        $data['eqm'] =    $this->m_main_eqm->get_all_data_repair();
        $html        =    $this->load->view('report/eqm/report_repair',$data,true);

        $this->mpdf= new mPDF('th','A4-L','0'); //เรียกใช้งาน mPDF ส่งค่า parameter เข้าไปครับ

        $curent_url =  base_url()."index.php/eqm/report_repair";
        $this->mpdf->SetHeader($curent_url."         ".date("Y/m/d"));
        $this->mpdf->SetFooter('{PAGENO}');

        $this->mpdf->WriteHTML($html); // สั่งให้ mPDF เขียนไฟล์ pdf
        $this->mpdf->Output("repairlist".$id.'.pdf', 'D'); // จากนั้นส่งชื่อไฟล์ออกมาครับผม
    }
    function report_repaire1_2()
    {
        $data['eqm'] =    $this->m_main_eqm->get_all_data_repair();
        echo $this->load->view('report/eqm/report_repair',$data,true);
    }
    function report_transfer1_1()
    {
        $data['EqmTransfer'] = $this->m_eqm_transfer->getShowDataEqmTransferDB2();
        $workG =  $this->m_eqm_transfer->getDataWorkGroupToArray();
        $workgroup = array();
        foreach($workG as $row){
            $workgroup[$row->be_under_id] = $row->be_under_name;
        }
        $userAc = $this->m_eqm_transfer->getDataUserAccountToArray();
        $user_account = array();
        foreach($userAc as $row){
            $user_account[$row->id] = $row->full_name;
        }
        $data['workgroup'] = $workgroup;
        $data['user_account'] = $user_account;
        //$html =  $this->load->view('eqm/maindata/sub_eqm/sub_eqm_transfer',$data,true);
        $html =  $this->load->view('report/eqm/report_transfer',$data,true);
        $this->mpdf= new mPDF('th','A4-L','0'); //เรียกใช้งาน mPDF ส่งค่า parameter เข้าไปครับ

         $curent_url =  base_url()."index.php/eqm/report_transfer";
        $this->mpdf->SetHeader($curent_url."         ".date("Y/m/d"));
        $this->mpdf->SetFooter('{PAGENO}');
        
        $this->mpdf->WriteHTML($html); // สั่งให้ mPDF เขียนไฟล์ pdf
        $this->mpdf->Output("transferlist".$id.'.pdf', 'D'); // จากนั้นส่งชื่อไฟล์ออกมาครับผม
    }
    function report_transfer1_2()
    {
        $data['EqmTransfer'] = $this->m_eqm_transfer->getShowDataEqmTransferDB2();
        $workG =  $this->m_eqm_transfer->getDataWorkGroupToArray();
        $workgroup = array();
        foreach($workG as $row){
            $workgroup[$row->working_group_id] = $row->working_group_name;
        }
        $userAc = $this->m_eqm_transfer->getDataUserAccountToArray();
        $user_account = array();
        foreach($userAc as $row){
            $user_account[$row->id] = $row->full_name;
        }
        $data['workgroup'] = $workgroup;
        $data['user_account'] = $user_account;
        //$html =  $this->load->view('eqm/maindata/sub_eqm/sub_eqm_transfer',$data,true);
        echo  $this->load->view('report/eqm/report_transfer',$data,true);
    }
    function report_distribution1_1()
    {   

        // $data['eqm'] =    $this->m_main_eqm->get_all_data_repair();
        // $html        =    $this->load->view('report/eqm/report_repair',$data,true);

        $data['EqmDistribution'] = $this->m_eqm_distribution->getShowDataEqmDistributionDB2();
        $html= $this->load->view('report/eqm/report_distribution',$data,true);

        $this->mpdf= new mPDF('th','A4-L','0'); //เรียกใช้งาน mPDF ส่งค่า parameter เข้าไปครับ

        $curent_url =  base_url()."index.php/eqm/report_distribution";
        $this->mpdf->SetHeader($curent_url."         ".date("Y/m/d"));
        $this->mpdf->SetFooter('{PAGENO}');

        $this->mpdf->WriteHTML($html); // สั่งให้ mPDF เขียนไฟล์ pdf
        $this->mpdf->Output("repairlist".$id.'.pdf', 'D'); // จากนั้นส่งชื่อไฟล์ออกมาครับผม
    }   
    function report_distribution1_2()
    {
        $data['EqmDistribution'] = $this->m_eqm_distribution->getShowDataEqmDistributionDB2();
        echo $this->load->view('report/eqm/report_distribution',$data,true);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */