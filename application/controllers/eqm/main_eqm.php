<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/eqm_backend_controller.php';

class main_eqm extends eqm_backend_controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('eqm/m_main_eqm');
    }
    function get_name_depreciation()
    {
        $id = $this->input->post('id');
        $data['get_name_depreciation'] = $this->m_main_eqm->get_name_depreciation($id);
        echo $data['get_name_depreciation'][0]['depreciation_id'];
    }
    function get_name_eqm()
    {
        $name = $this->input->post('id');
        $data['get_name_eqm'] = $this->m_main_eqm->get_name_eqm($name);
        echo $data['get_name_eqm'][0]['detail_names'];
    }
    function get_detail_edit($id = '')
    {
       $data['eqm_edit'] = $this->m_main_eqm->get_edit_data($id );
       $json_data = $data['eqm_edit'];
       echo json_encode($json_data);
    }
    function show_info()
    {
        phpinfo();
    }
    function index()
    {   
        $data['select_1'] = $this->m_main_eqm->get_select1();
        $data['select_2'] = $this->m_main_eqm->get_select2();
        $data['select_3'] = $this->m_main_eqm->get_select3();
        $data['select_4'] = $this->m_main_eqm->get_select4();
        $data['select_5'] = $this->m_main_eqm->get_select5();
        $data['select_6'] = $this->m_main_eqm->get_select6();
        $data['select_7'] = $this->m_main_eqm->get_select7();
      	$this->load->view('include/eqm/header');
        $this->load->view('eqm/main_eqm',$data);
        $this->load->view('include/eqm/footer');
    }
    function report_font($id = "")
    {
       echo "hello".$id;
    }
    function get_eqm_data()
    { 
      $data['eqm'] = $this->m_main_eqm->get_all_data();
      echo $this->load->view('eqm/maindata/sub_eqm/sub_eqm',$data);
    }
    function test()
    {
      $rest = substr("0005-0002-0789/0012", 0, 14); 
      $rest1 = substr("0005-0002-0789/0012", 15); 
      echo $rest."<br>";
      echo $rest1;

    }
    function get_edit_data($id = "")
    {

    }
    function save_eqm_data()
    {  
           $eqm_numbers_amount  = $this->input->post('eqm_numbers_amount'); //หมายเลขครุภัณฑ์ 
           $eqm_names           = $this->input->post('eqm_names');   //ชื่อครุภัณฑ์
           $eqm_components      = $this->input->post('eqm_components'); //คุณลักษณะ/ส่วนประกอบ
           $eqm_model           = $this->input->post('eqm_model'); // รุ่นแบบ 
           $unit_id             = $this->input->post('unit_id'); // หน่วยนับ
           $agency_id           = $this->input->post('agency_id'); //ชื่อผู้ขาย/ผู้รับจ้าง/ผู้บริจาค
           $eqm_price_unit      = $this->input->post('eqm_price_unit');//ราคาต่อหน่วย
           $eqm_unit_set        = $this->input->post('eqm_unit_set');//ราคาต่อหน่วย
           $type_budget_id      = $this->input->post('type_budget_id');//ประเภทงบประมาณ
           $year_budget_id      = $this->input->post('year_budget_id');//ปีงบประมาณ
           $depreciation_age    = $this->input->post('depreciation_age');//อายุการใช้งานของครุภัณฑ์
           $depreciation        = $this->input->post('depreciation');//อัตราค่าเสื่อม
           $comment             = $this->input->post('comment');//หมายเหตุ
           $report_number       = $this->input->post('report_number');//ที่เอกสาร 
           $cost_total          = $this->input->post('cost_total');//มูลค่ารวม
           $method_id           = $this->input->post('method_id');//วิธีการได้มา
           $date_receive        = $this->input->post('date_receive');//วันที่ได้รับ 
           $cost_net            = $this->input->post('cost_net');//มูลค่าสุทธิ 
           $depreciation_year   = $this->input->post('depreciation_year');//อัตราค่าเสื่อมต่อปี 
           $inspection_number   = $this->input->post('inspection_number');//เลขที่ใบตรวจรับ 
           $date_contract       = $this->input->post('date_contract');//วันที่ทำสัญญาซื้อ 
           $vouch_year          = $this->input->post('vouch_year');//จำนวนปีรับประกัน 
           $status_use          = $this->input->post('status_use');//สถานะ 
           $be_under_id         = $this->input->post('be_under_id');//สถานที่ตั้ง/สังกัดหน่วยงาน
           $user1               = $this->input->post('user1');//ผู้ใช้งาน/ผู้รับผิดชอบที่ 1 
           $user2               = $this->input->post('user2');//ผู้ใช้งาน/ผู้รับผิดชอบที่ 2
           $contract_number     = $this->input->post('contract_number');//เลขที่สัญญา
           $hid_image_eqm       = $this->input->post('hid_image_eqm');//ภาพครุภัณฑ์
           $hide_document_about = $this->input->post('hide_document_about');//เอกสารที่เกี่ยวข้อง
           $id_depreciation     = $this->input->post('id_depreciation');
           $id_group            = $this->input->post('id_group');
           $id_type             = $this->input->post('id_type');
           $id_detail           = $this->input->post('id_detail');

       if($this->input->post('hide_edit') != "")
       {  
              if($_FILES["image_eqm"]["name"] != ""){
                $new_path = './upload/eqm_image/';
                if(is_dir($new_path)){
                }else{
                    mkdir($new_path , 0777);
                }
                
                $config['upload_path'] = $new_path;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['overwrite'] = false;
                $config['overwrite'] = TRUE;
                $config['max_size'] = '10000';
                $config['max_width']  = '2048';
                $config['max_height']  = '2048';
                //------------------------------------------------------------------
                 $config['file_name'] = $_SERVER['REQUEST_TIME'].rand().'-data-eqm';
                //------------------------------------------------------------------

                $this->load->library('upload', $config);

                if ( !($this->upload->do_upload("image_eqm")))
                {
                     $error = $this->upload->display_errors();
                     echo "";
                }
                else
                {
                      $uload_data = $this->upload->data();
                      $image_eqm = $uload_data['file_name'];
                }
            }
            else
            {
              $image_eqm = $hid_image_eqm ;
            }
             if($_FILES["document_about"]["name"] != ""){      
                $config['upload_path'] = $new_path;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['overwrite'] = false;
                $config['overwrite'] = TRUE;
                $config['max_size'] = '10000';
                $config['max_width']  = '2048';
                $config['max_height']  = '2048';
                 //------------------------------------------------------------------
                 $config['file_name'] = $_SERVER['REQUEST_TIME'].rand().'-data-eqm1';
                //------------------------------------------------------------------
                $this->load->library('upload', $config);

                if (!($this->upload->do_upload("document_about")))
                {
                   $error = $this->upload->display_errors();
                   echo "";
                }
                else
                {
                    $uload_data = $this->upload->data();
                    $document_about = $uload_data['file_name'];
                }
            }
            else
            {
                $document_about = $hide_document_about;
            }
            //set true data 
            if($status_use == 1)
            {
                $status = "ready";
            }
            else
            {
                $status = "waste";
            }
            $rest = substr($eqm_numbers_amount, 0, 14); 
            $rest1 = substr($eqm_numbers_amount, 15); 
            $rest2 = substr($eqm_numbers_amount, 0, 4); 
            $rest3 = substr($eqm_numbers_amount, 5, 4); 
            $rest4 = substr($eqm_numbers_amount, 10, 4);



            $data =   array(
                "id_depreciation"    => $id_depreciation ,
                "id_group"           => $id_group ,
                "id_type"            => $id_type ,
                "id_detail"          => $id_detail, 
                "barcode"            => $eqm_numbers_amount,
                "eqm_numbers"        => $rest,
                "eqm_numbers1"        => $rest2,
                "eqm_numbers2"        => $rest3,
                "eqm_numbers3"        => $rest4,
                "eqm_amout_number"   => $rest1,
                "eqm_names"          => $eqm_names,
                "eqm_components"     => $eqm_components,
                "eqm_model"          => $eqm_model,
                "unit_id"            => $unit_id,
                "agency_id"          => $agency_id,
                "eqm_price_unit"     => $eqm_price_unit,
                "eqm_unit_set"       => $eqm_unit_set,
                "type_budget_id"     => $type_budget_id,
                "year_budget_id"     => $year_budget_id,
                "depreciation_age"   => $depreciation_age,
                "depreciation"       => $depreciation,
                "comment"            => $comment,
                "report_number"      => $report_number,
                "cost_total"         => $cost_total,
                "method_id"          => $method_id,
                "date_receive"       => date( "Y-m-d", strtotime($date_receive)),
                "cost_net"           => $cost_net,
                "depreciation_year"  => $depreciation_year,
                "inspection_number"  => $inspection_number,
                "date_contract"      => date( "Y-m-d", strtotime($date_contract)),
                "vouch_year"         => $vouch_year,
                "status_use"         => $status_use,
                "be_under_id"        => $be_under_id,
                "user1"              => $user1,
                "user2"              => $user2,
                "contract_number"    => $contract_number,
                "image_eqm"          => $image_eqm,
                "document_about"     => $document_about,
                "eqm_status"         => $status,
                "active"             => 1
            );
            $this->m_main_eqm->save_edit_Dataeqm($data,$this->input->post('hide_edit'));
            log_activity($this->session->userdata('log_id') , "บันทึกข้อมูลทะเบียน >> มูลค่าทรัพย์สินสุทธิ", "แก้ไขครุภัณฑ์  : ".$eqm_names);
            echo "แก้ไขข้อมูลเรียบร้อย";
       }
       else
       {
           

            if($_FILES["image_eqm"]["name"] != ""){
                $new_path = './upload/eqm_image/';
                if(is_dir($new_path)){
                }else{
                    mkdir($new_path , 0777);
                }
                
                $config['upload_path'] = $new_path;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['overwrite'] = false;
                $config['overwrite'] = TRUE;
                $config['max_size'] = '10000';
                $config['max_width']  = '2048';
                $config['max_height']  = '2048';
                $config['file_name'] = $_SERVER['REQUEST_TIME'].rand().'-data-eqm';
                $this->load->library('upload', $config);

                if ( !($this->upload->do_upload("image_eqm")))
                {
                     $error = $this->upload->display_errors();
                     echo "";
                }
                else
                {
                      $uload_data = $this->upload->data();
                      $image_eqm = $uload_data['file_name'];
                }
            }
            else
            {
              $image_eqm = "";
            }
             if($_FILES["document_about"]["name"] != ""){      
                $config['upload_path'] = $new_path;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['overwrite'] = false;
                $config['overwrite'] = TRUE;
                $config['max_size'] = '10000';
                $config['max_width']  = '2048';
                $config['max_height']  = '2048';
                 $config['file_name'] = $_SERVER['REQUEST_TIME'].rand().'-data-eqm1';
                $this->load->library('upload', $config);

                if (!($this->upload->do_upload("document_about")))
                {
                   $error = $this->upload->display_errors();
                   echo "";
                }
                else
                {
                    $uload_data = $this->upload->data();
                    $document_about = $uload_data['file_name'];
                }
            }
            else
            {
                $document_about = "";
            }
            //set true data 
            if($status_use == 1)
            {
                $status = "ready";
            }
            else
            {
                $status = "waste";
            }
            $rest = substr($eqm_numbers_amount, 0, 14); 
            $rest1 = substr($eqm_numbers_amount, 15); 
            $rest2 = substr($eqm_numbers_amount, 0, 4); 
            $rest3 = substr($eqm_numbers_amount, 5, 4); 
            $rest4 = substr($eqm_numbers_amount, 10, 4);



            $data =   array(
                "eqm_id"             => "",
                "id_depreciation"    => $id_depreciation ,
                "id_group"           => $id_group ,
                "id_type"            => $id_type ,
                "id_detail"          => $id_detail,  
                "barcode"            => $eqm_numbers_amount,
                "eqm_numbers"        => $rest,
                "eqm_numbers1"       => $rest2,
                "eqm_numbers2"       => $rest3,
                "eqm_numbers3"       => $rest4,
                "eqm_amout_number"   => $rest1,
                "eqm_names"          => $eqm_names,
                "eqm_components"     => $eqm_components,
                "eqm_model"          => $eqm_model,
                "unit_id"            => $unit_id,
                "agency_id"          => $agency_id,
                "eqm_price_unit"     => $eqm_price_unit,
                "eqm_unit_set"       => $eqm_unit_set,
                "type_budget_id"     => $type_budget_id,
                "year_budget_id"     => $year_budget_id,
                "depreciation_age"   => $depreciation_age,
                "depreciation"       => $depreciation,
                "comment"            => $comment,
                "report_number"      => $report_number,
                "cost_total"         => $cost_total,
                "method_id"          => $method_id,
                "date_receive"       => date( "Y-m-d", strtotime($date_receive)),
                "cost_net"           => $cost_net,
                "depreciation_year"  => $depreciation_year,
                "inspection_number"  => $inspection_number,
                "date_contract"      => date( "Y-m-d", strtotime($date_contract)),
                "vouch_year"         => $vouch_year,
                "status_use"         => $status_use,
                "be_under_id"        => $be_under_id,
                "user1"              => $user1,
                "user2"              => $user2,
                "contract_number"    => $contract_number,
                "image_eqm"          => $image_eqm,
                "document_about"     => $document_about,
                "eqm_status"         => $status,
                "active"             => 1
            );
            $this->m_main_eqm->saveDataeqm($data);
            log_activity($this->session->userdata('log_id') , "บันทึกข้อมูลทะเบียน >> มูลค่าทรัพย์สินสุทธิ", "บันทึกครุภัณฑ์  : ".$eqm_names);
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
        }

    }
    function check_number_eqm()
    {
        $number_eqm = $this->input->post('number_eqm');
        $amout = $this->m_main_eqm->amout_eqm($number_eqm);
        $my_num = array();
        foreach($amout as $row)
        {
           array_push($my_num, abs($row['eqm_amout_number']));
        }
        if($my_num)
        {
          $max_num = max($my_num);
          echo $max_num;
        }
        else
        {
          echo "0";
        }
    }
    function get_detail_eqm()
    {
        $id       = $this->input->post('get_detail_id');
        $get_edit = $this->m_main_eqm->get_detail_eqm($id);
        echo json_encode($get_edit);
    }
    function gen(){
        
        // $gencode = $_GET['a'];
        // require_once(FCPATH.'application/libraries/barcode/class/BCGFontFile.php');
        // require_once(FCPATH.'application/libraries/barcode/class/BCGColor.php');
        // require_once(FCPATH.'application/libraries/barcode/class/BCGDrawing.php');
        // require_once(FCPATH.'application/libraries/barcode/class/BCGFontFile.php');
    
        // require_once(FCPATH.'application/libraries/barcode/class/BCGcode39.barcode.php');
    
        // $colorFront = new BCGColor(0, 0, 0);
        // $colorBack = new BCGColor(255, 255, 255);
    
        // $font = new BCGFontFile('assets/fonts/Arial.ttf', 12);
    
        // $code = new BCGcode39(); // Or another class name from the manual
        // $code->setScale(2); // Resolution
        // //$code->setThickness(20); // Thickness
        // //$code->setForegroundColor($colorFront); // Color of bars
        // $code->setBackgroundColor($colorBack); // Color of spaces
        // $code->setFont($font); // Font (or 0)
        // $code->parse($gencode); // Text
    
        // $drawing = new BCGDrawing('', $colorBack);
        // $drawing->setBarcode($code);
        // $drawing->draw();
    
        // header('Content-Type: image/png');
        // $drawing->finish(BCGDrawing::IMG_FORMAT_PNG);
        $text = (isset($_GET["a"])?$_GET["a"]:"0");
        $size = (isset($_GET["size"])?$_GET["size"]:"20");
        $orientation = (isset($_GET["orientation"])?$_GET["orientation"]:"horizontal");
        $code_type = (isset($_GET["codetype"])?$_GET["codetype"]:"code128");
        $code_string = "";

        // Translate the $text into barcode the correct $code_type
        if ( strtolower($code_type) == "code128" ) {
            $chksum = 104;
            // Must not change order of array elements as the checksum depends on the array's key to validate final code
            $code_array = array(" "=>"212222","!"=>"222122","\""=>"222221","#"=>"121223","$"=>"121322","%"=>"131222","&"=>"122213","'"=>"122312","("=>"132212",")"=>"221213","*"=>"221312","+"=>"231212",","=>"112232","-"=>"122132","."=>"122231","/"=>"113222","0"=>"123122","1"=>"123221","2"=>"223211","3"=>"221132","4"=>"221231","5"=>"213212","6"=>"223112","7"=>"312131","8"=>"311222","9"=>"321122",":"=>"321221",";"=>"312212","<"=>"322112","="=>"322211",">"=>"212123","?"=>"212321","@"=>"232121","A"=>"111323","B"=>"131123","C"=>"131321","D"=>"112313","E"=>"132113","F"=>"132311","G"=>"211313","H"=>"231113","I"=>"231311","J"=>"112133","K"=>"112331","L"=>"132131","M"=>"113123","N"=>"113321","O"=>"133121","P"=>"313121","Q"=>"211331","R"=>"231131","S"=>"213113","T"=>"213311","U"=>"213131","V"=>"311123","W"=>"311321","X"=>"331121","Y"=>"312113","Z"=>"312311","["=>"332111","\\"=>"314111","]"=>"221411","^"=>"431111","_"=>"111224","\`"=>"111422","a"=>"121124","b"=>"121421","c"=>"141122","d"=>"141221","e"=>"112214","f"=>"112412","g"=>"122114","h"=>"122411","i"=>"142112","j"=>"142211","k"=>"241211","l"=>"221114","m"=>"413111","n"=>"241112","o"=>"134111","p"=>"111242","q"=>"121142","r"=>"121241","s"=>"114212","t"=>"124112","u"=>"124211","v"=>"411212","w"=>"421112","x"=>"421211","y"=>"212141","z"=>"214121","{"=>"412121","|"=>"111143","}"=>"111341","~"=>"131141","DEL"=>"114113","FNC 3"=>"114311","FNC 2"=>"411113","SHIFT"=>"411311","CODE C"=>"113141","FNC 4"=>"114131","CODE A"=>"311141","FNC 1"=>"411131","Start A"=>"211412","Start B"=>"211214","Start C"=>"211232","Stop"=>"2331112");
            $code_keys = array_keys($code_array);
            $code_values = array_flip($code_keys);
            for ( $X = 1; $X <= strlen($text); $X++ ) {
                $activeKey = substr( $text, ($X-1), 1);
                $code_string .= $code_array[$activeKey];
                $chksum=($chksum + ($code_values[$activeKey] * $X));
            }
            $code_string .= $code_array[$code_keys[($chksum - (intval($chksum / 103) * 103))]];

            $code_string = "211214" . $code_string . "2331112";
        } elseif ( strtolower($code_type) == "code39" ) {
            $code_array = array("0"=>"111221211","1"=>"211211112","2"=>"112211112","3"=>"212211111","4"=>"111221112","5"=>"211221111","6"=>"112221111","7"=>"111211212","8"=>"211211211","9"=>"112211211","A"=>"211112112","B"=>"112112112","C"=>"212112111","D"=>"111122112","E"=>"211122111","F"=>"112122111","G"=>"111112212","H"=>"211112211","I"=>"112112211","J"=>"111122211","K"=>"211111122","L"=>"112111122","M"=>"212111121","N"=>"111121122","O"=>"211121121","P"=>"112121121","Q"=>"111111222","R"=>"211111221","S"=>"112111221","T"=>"111121221","U"=>"221111112","V"=>"122111112","W"=>"222111111","X"=>"121121112","Y"=>"221121111","Z"=>"122121111","-"=>"121111212","."=>"221111211"," "=>"122111211","$"=>"121212111","/"=>"121211121","+"=>"121112121","%"=>"111212121","*"=>"121121211");

            // Convert to uppercase
            $upper_text = strtoupper($text);

            for ( $X = 1; $X<=strlen($upper_text); $X++ ) {
                $code_string .= $code_array[substr( $upper_text, ($X-1), 1)] . "1";
            }

            $code_string = "1211212111" . $code_string . "121121211";
        } elseif ( strtolower($code_type) == "code25" ) {
            $code_array1 = array("1","2","3","4","5","6","7","8","9","0");
            $code_array2 = array("3-1-1-1-3","1-3-1-1-3","3-3-1-1-1","1-1-3-1-3","3-1-3-1-1","1-3-3-1-1","1-1-1-3-3","3-1-1-3-1","1-3-1-3-1","1-1-3-3-1");

            for ( $X = 1; $X <= strlen($text); $X++ ) {
                for ( $Y = 0; $Y < count($code_array1); $Y++ ) {
                    if ( substr($text, ($X-1), 1) == $code_array1[$Y] )
                        $temp[$X] = $code_array2[$Y];
                }
            }

            for ( $X=1; $X<=strlen($text); $X+=2 ) {
                if ( isset($temp[$X]) && isset($temp[($X + 1)]) ) {
                    $temp1 = explode( "-", $temp[$X] );
                    $temp2 = explode( "-", $temp[($X + 1)] );
                    for ( $Y = 0; $Y < count($temp1); $Y++ )
                        $code_string .= $temp1[$Y] . $temp2[$Y];
                }
            }

            $code_string = "1111" . $code_string . "311";
        } elseif ( strtolower($code_type) == "codabar" ) {
            $code_array1 = array("1","2","3","4","5","6","7","8","9","0","-","$",":","/",".","+","A","B","C","D");
            $code_array2 = array("1111221","1112112","2211111","1121121","2111121","1211112","1211211","1221111","2112111","1111122","1112211","1122111","2111212","2121112","2121211","1121212","1122121","1212112","1112122","1112221");

            // Convert to uppercase
            $upper_text = strtoupper($text);

            for ( $X = 1; $X<=strlen($upper_text); $X++ ) {
                for ( $Y = 0; $Y<count($code_array1); $Y++ ) {
                    if ( substr($upper_text, ($X-1), 1) == $code_array1[$Y] )
                        $code_string .= $code_array2[$Y] . "1";
                }
            }
            $code_string = "11221211" . $code_string . "1122121";
        }

        // Pad the edges of the barcode
        $code_length = 20;
        for ( $i=1; $i <= strlen($code_string); $i++ )
            $code_length = $code_length + (integer)(substr($code_string,($i-1),1));

        if ( strtolower($orientation) == "horizontal" ) {
            $img_width = $code_length;
            $img_height = $size;
        } else {
            $img_width = $size;
            $img_height = $code_length;
        }

        $image = imagecreate($img_width, $img_height);
        $black = imagecolorallocate ($image, 0, 0, 0);
        $white = imagecolorallocate ($image, 255, 255, 255);

        imagefill( $image, 0, 0, $white );

        $location = 10;
        for ( $position = 1 ; $position <= strlen($code_string); $position++ ) {
            $cur_size = $location + ( substr($code_string, ($position-1), 1) );
            if ( strtolower($orientation) == "horizontal" )
                imagefilledrectangle( $image, $location, 0, $cur_size, $img_height, ($position % 2 == 0 ? $white : $black) );
            else
                imagefilledrectangle( $image, 0, $location, $img_width, $cur_size, ($position % 2 == 0 ? $white : $black) );
            $location = $cur_size;
        }
        // Draw barcode to the screen
        header ('Content-type: image/png');
        imagepng($image);
        imagedestroy($image);

    }
    function amount_day()
    {
        $str = Date('Y-m-d');
        $datetime1 = new DateTime('28-5-2014');
        $datetime2 = new DateTime($str);
        $interval = $datetime1->diff($datetime2);
        echo $interval->format('%y years %m months and %d days');
    }
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */