<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ระบบทะเบียนครุภัณฑ์ - วัสดุ</title>
    <base href="<?= base_url(); ?>"/>
    <!-- Core CSS - Include with every page -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="assets/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="assets/css/plugins/timeline/timeline.css" rel="stylesheet">
        <!-- Page-Level Plugin CSS - Tables -->
    <link href="assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <!-- SB Admin CSS - Include with every page -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <!--My Style-->
    <link href="assets/css/mystyle2.css" rel="stylesheet">
    <style type="text/css">
	    body { padding-top: 70px; min-height: 410px }
	    .tab-content p { padding: 10px 0; }
    </style>
    
    <!-- Core Scripts - Include with every page -->
    <script src="assets/js/jquery-1.8.0.js"></script>
    <script src="assets/js/jquery.confirm.js"></script>
    <!--context-->
    <link href="assets/context/contextMenu.css" rel="stylesheet">
    <script src="assets/context/contextMenu.js"></script>
    <!-- selection -->
    <link href="assets/selection/select2.css" rel="stylesheet">
    <script src="assets/selection/select2.js"></script>
    <script>
        $(document).ready(function() { 
            $("#select_num_mtr1,#select_num_mtr2,#select_num_mtr3,#search_select_mtr,#withdrawal_person,#withdrawal_recieve_person").select2(); 
        });
    </script>
</head>

<body>
    <?php
        /* กำหนดรูปแบบของปี ให้อยู่ในรูปของ พ.ศ. เก็บค่าเอาไว้ในตัวแปร $year */
        $yearfull = date("Y")+543; //ปี พ.ศ. แบบเต็ม
        $yearsmall = date("y")+43; //ปี พ.ศ. แบบย่อ
        /* สร้าง array เก็บชื่อวัน เดือนเป็นภาษาไทย */
        //ชื่อเดือนแบบย่อ
        $thaismallmonth = array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.", "พ.ย.","ธ.ค.");
        //ชื่อเดือนแบบย่อแบบเต็ม
        $thaifullmonth = array("มกราคม.","กุมภาพันธ์.","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม", "พฤศจิกายน","ธันวาคม");
        //ชื่อวันแบบย่อ
        $thaismalldate = array("อา","จ","อ","พ","พฤ","ศ","ส");
        //ชื่อวันแบบเต็ม
        $thaifulldate = array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");


        /* แสดงผล */
        // รูปแบบการแสดงผลวันเดือนปีแบบเต็ม
        //echo "วัน".$thaifulldate[date("w")]."ที่&nbsp;".date ("d")."&nbsp;".$thaifullmonth[date('m')-1]."&nbsp;พ.ศ.".$yearfull."<br>";

        // รูปแบบการแสดงผลวันเดือนปีแบบย่อ
        //echo $thaismalldate[date("w")] .date (“d”).$thaismallmonth[date('m')-1] .$yearsmall;

    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            var d = new Date();
            var toDay = d.getDate() + '-' + (d.getMonth() + 1) + '-' + (d.getFullYear() );
            //+ 543

            $("#date_of_recieve_mtr,#date_of_purchasing,#date_of_withdrawal,#daily_date,#mount_from,#mount_to").datepicker({ 
              changeMonth: true, changeYear: true,dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay,
              dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']
             
            });
            
        });
        
    </script>

   <div class = "headerpage">
        <table  width = "100%">
            <tr>
                <td align = 'left' width = "70%">
                     <h2 class = "h2Header">ระบบทะเบียนวัสดุสำนักงาน</h2>
                     <h4 class = "h2Header"><?php echo "วัน".$thaifulldate[date("w")]."ที่&nbsp;".date ("d")."&nbsp;".$thaifullmonth[date('m')-1]."&nbsp; พ.ศ. ".$yearfull; ?> เวลา <?php echo date( "H:i:s", strtotime(date("H:i:s")) ); ?> น.</h4>
                 
                </td>
                <td style="list-style:none;width:65px;height:70px;">
                    <li class="dropdown" style="widht:65px;height:31px;">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle" data-hover="dropdown" data-delay="1500">
                            <div style="width:10px;height:10px;">
                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </button>
                            </div>
                        </a>
                        <ul class="dropdown-menu message-dropdown" role="menu">
                        <?php 
                            $this->db->select('*');
                            $this->db->from('eqm_repair');
                            $this->db->join('equipment', 'equipment.eqm_id = eqm_repair.equipment_id');
                            $this->db->where('repairing_user_notify_id',$this->account_id);
                            $this->db->where('repair_finish',1);
                            $this->db->where('notify_alert',1);
                            $this->db->where('equipment.eqm_status','ready');
                            $result_alert = $this->db->get();
                            $alert_finish = $result_alert->result_array();

                            if($alert_finish){
                        ?>

                        <?php foreach($alert_finish as $row){ ?>

                            <li class="message-preview">
                                <a href="<?php echo base_url(); ?>index.php/notify_alert/repair_finish/<?php echo $row['id']; ?>">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" style="width: 50px;height: 50px;" src="<?php echo base_url(); ?>upload/eqm_image/<?php echo $row['image_eqm']; ?>" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong><?php echo $this->full_name; ?></strong></h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i>
                                            <?php 
                                                $str = explode(" ", $row['updated']); 
                                                echo date("d-m-Y",strtotime($str[0]))." "." ".$str[1];
                                            ?>
                                            </p>
                                            <p>หมายเลขครุภัณฑ์ : <?php echo $row['barcode']; ?></p>
                                            <p>ชื่อครุภัณฑ์ : <?php echo $row['eqm_names']; ?></p>
                                            <p style="color:green;">ครุภัณฑ์ที่คุณได้แจ้งซ่อมไว้ ได้ทำการซ่อมเสร็จเรียบร้อยแล้ว</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php } 
                            }
                            if(__permission($this->account_id, "repair_finish")){
                                $this->db->select('*');
                                $this->db->from('eqm_repair');
                                $this->db->join('equipment', 'equipment.eqm_id = eqm_repair.equipment_id');
                                //$this->db->where('repairing_user_notify_id',$this->account_id);
                                $this->db->where('repair_finish',0);
                                $this->db->where('notify_alert',0);
                                $this->db->where('equipment.eqm_status','repair');
                                $result_alert_notify = $this->db->get();
                                $alert_notify_repair = $result_alert_notify->result_array();
                            if($alert_notify_repair){
                                foreach($alert_notify_repair as $row){
                                    $this->db->select('*');
                                    $this->db->from('user_account'); 
                                    $this->db->where('id',$row['repairing_user_notify_id']);
                                    $user_notify = $this->db->get();
                                    $alert_notify_user = $user_notify->result_array();
                        ?>
                            <li class="message-preview">
                                <a href="<?php echo base_url(); ?>index.php/notify_alert/repair_finish/<?php echo $row['id']; ?>">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" style="width: 50px;height: 50px;" src="<?php echo base_url(); ?>upload/eqm_image/<?php echo $row['image_eqm']; ?>" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong><?php echo $this->full_name; ?></strong></h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i>
                                            <?php 
                                                $str = explode(" ", $row['updated']); 
                                                echo date("d-m-Y",strtotime($str[0]))." "." ".$str[1];
                                            ?>
                                            </p>
                                            <p>ผู้แจ้งซ่อม : <?php echo $alert_notify_user[0]['full_name']; ?></p>
                                            <p>หมายเลขครุภัณฑ์ : <?php echo $row['barcode']; ?></p>
                                            <p>ชื่อครุภัณฑ์ : <?php echo $row['eqm_names']; ?></p>
                                            <p style="color:red;">มีการแจ้งซ่อมครุภัณฑ์ ที่เกิดการชำรุดเสียหาย</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php 
                                }
                            } 

                        } ?>
                            <?php if(__permission($this->account_id, "alert_materials_min_amount")){ ?>
                            <?php
                                $this->db->select('*');
                                $this->db->from('materials');
                                $this->db->where('active',1);
                                $result = $this->db->get();
                                $alert_notify_min = $result->result_array();
                            ?>
                            <?php 
                                foreach($alert_notify_min as $row){
                                $this->db->select('*');
                                $this->db->from('materials');
                                $this->db->where('id',$row['id']);
                                $this->db->where('mtr_balance <=',$row['min_amount']);
                                
                                $result2 = $this->db->get();
                                $alert_min = $result2->result_array();
                                
                                if(count($alert_min) > 0){
                            ?>
                            <li class="message-preview">
                                <a href="<?php echo base_url(); ?>index.php/mtr/register_mtr">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" style="width: 50px;height: 50px;" src="<?php echo base_url(); ?>icon/alert.png" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong><?php echo $this->full_name; ?></strong></h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i>
                                            <?php 
                                                $str = explode(" ", date("Y-m-d H:i:s")); 
                                                echo date("d-m-Y",strtotime($str[0]))." "." ".$str[1];
                                            ?>
                                            </p>
                                            
                                            <p>รหัสวัสดุ : 
                                            <?php 
                                                $this->db->select('*');
                                                $this->db->from('tbl_mtr_type');
                                                $this->db->where('group_type_id',$alert_min[0]['tbl_mtr_type_id']);
                                                $result = $this->db->get();
                                                $mtr_type = $result->result_array();
                                                $temp11 = $mtr_type[0]['group_type_numbers'];

                                                $this->db->select('*');
                                                $this->db->from('tbl_mtr_model');
                                                $this->db->where('type_id',$alert_min[0]['tbl_mtr_model_id']);
                                                $result = $this->db->get();
                                                $mtr_model = $result->result_array();
                                                $temp22 = $mtr_model[0]['type_numbers'];

                                                $this->db->select('*');
                                                $this->db->from('tbl_mtr_detail');
                                                $this->db->where('detail_id',$alert_min[0]['tbl_mtr_detail_id']);
                                                $result = $this->db->get();
                                                $mtr_detail = $result->result_array();
                                                $temp33 = $mtr_detail[0]['detail_number'];
                                                echo $temp11.'-'.$temp22.'-'.$temp33; 
                                            
                                            ?></p>
                                            <p>ชื่อวัสดุ : <?php echo $alert_min[0]['mtr_name']; ?></p>
                                            <p>จำนวนคงเหลือ : <?php echo $alert_min[0]['mtr_balance']; ?></p>
                                            <p style="color:red;">มีการแจ้งเตือนรายการวัสดุเหลือน้อย หรือ วัสดุหมด กรุณาสั่งชื้อวัสดุ</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <?php } ?>
                            <?php } ?>
                            <?php } ?>
                            <li class="message-footer">
                                <a href="#">ดูข้อความทั้งหมด</a>
                            </li>
                        </ul>
                    </li>								
                </td>
                <td align = 'left' style = "padding-right:0px">
                    <h4>ส่วนราชการ   : <?php echo $this->service_name; ?></h4>
                    <h4>หน่วยงาน    : <?php echo $this->agencies; ?></h4>
                    <h4>
                        <div style="display:block">
                            <label style="float:left;font-size:18px;font-family:inherit;font-weight:500;line-height:1.1;color:inherit;">เจ้าหน้าที่   :</label>
                            <li class="dropdown" style="list-style-type:none">
                                <a href="#" data-hover="dropdown" data-delay="500" data-toggle="dropdown" style="text-decoration: none;color:white;" class="dropdown-toggle">&nbsp;&nbsp;  <?php echo $this->full_name; ?>&nbsp;<span style="font-size:0.5em" class="glyphicon glyphicon-pencil"></span></a>
                                <ul class="dropdown-menu" id="menu1">
                                    <li><a href="index.php/eqm/profile_account">ข้อมูลส่วนตัว</a></li>
                                    <li><a href="index.php/logout">ออกจากระบบ</a></li>
                                </ul>
                            </li>
                       </div>
                    </h4>
                </td>
            </tr>
        </table>
       	
   </div>
  <nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    
    <!-- Collect the nav links, forms, and other content for toggling -->
	
	
	
	
	
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
	<div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a href = "index.php/gettopic"><img style = "padding-top:10px;"src = "icon/home.png" width = "40px"/></a>
    </div>
	
	
      <div class="nav navbar-nav">
	 <!-- ref : http://jsfiddle.net/2Smgv/3100/ -->
<ul class="nav nav-pills">
<?php if(__permission($this->account_id,"category_of_materials") || __permission($this->account_id,"register_mtr") || __permission($this->account_id,"main_company")){ ?>
<li class="dropdown">
  <a href="#" data-toggle="dropdown" class="dropdown-toggle" data-hover="dropdown" data-delay="500">&nbsp;บันทึกข้อมูลเบื้องต้น <b class="caret"></b></a>
  <ul class="dropdown-menu" id="menu1">
    <?php if(__permission($this->account_id,"category_of_materials")){ ?>
    <li><a href="index.php/mtr/category_of_materials">&nbsp;หมวดหมู่วัสดุ</a></li>
    <?php } ?>
    <?php if(__permission($this->account_id,"register_mtr")){ ?>
    <li><a href="index.php/mtr/register_mtr">&nbsp;ทะเบียนวัสดุ</a></li>
    <?php } ?>
    <?php if(__permission($this->account_id,"main_company")){ ?>
    <li><a href="index.php/eqm/main_company">&nbsp;บริษัท/หจก</a></li>
    <?php } ?>
  </ul>
</li>
<?php } ?>
<?php if(__permission($this->account_id,"purchasing") || __permission($this->account_id,"withdrawal")){ ?>
<li class="dropdown">
  <a href="#" data-toggle="dropdown" class="dropdown-toggle" data-hover="dropdown" data-delay="500">&nbsp;บันทึกข้อมูลทะเบียน <b class="caret"></b></a>
  <ul class="dropdown-menu" id="menu1">
    <?php if(__permission($this->account_id,"purchasing")){ ?>
    <li><a href="index.php/mtr/purchasing">&nbsp;บันทึกการจัดซื้อวัสดุ</a></li>
    <?php } ?>
    <?php if(__permission($this->account_id,"withdrawal")){ ?>
    <li><a href="index.php/mtr/withdrawal">&nbsp;บันทึกการขอเบิกวัสดุ</a></li>
    <?php } ?>
  </ul>
</li>
<?php } ?>
<?php if(__permission($this->account_id,"all_withdrawal") || __permission($this->account_id,"daily_withdrawal") || __permission($this->account_id,"mount_withdrawal") || __permission($this->account_id,"type_withdrawal") || __permission($this->account_id,"person_withdrawal") || __permission($this->account_id,"purchasing_report")){ ?>  
<li class="dropdown">
  <a href="#" data-toggle="dropdown" class="dropdown-toggle" data-hover="dropdown" data-delay="500">&nbsp;รายงานข้อมูลทะเบียน <b class="caret"></b></a>
  <ul class="dropdown-menu" id="menu1">
    <?php if(__permission($this->account_id,"all_withdrawal") || __permission($this->account_id,"daily_withdrawal") || __permission($this->account_id,"mount_withdrawal") || __permission($this->account_id,"type_withdrawal") || __permission($this->account_id,"person_withdrawal")){ ?>  
        <li><a href="javascript:void(0)">&nbsp;รายงานการขอเบิก<span style="font-size:0.5em;" class="glyphicon glyphicon-chevron-right"></span></a>
            <ul class="dropdown-menu sub-menu">
                <?php if(__permission($this->account_id,"all_withdrawal")){ ?>
                    <li><a href="index.php/report/all_withdrawal">วัสดุทั้งหมด</a></li>
                <?php } ?>
                <?php if(__permission($this->account_id,"daily_withdrawal")){ ?>
                    <li><a href="index.php/report/daily_withdrawal">วัสดุรายวัน</a></li>
                <?php } ?>
                <?php if(__permission($this->account_id,"mount_withdrawal")){ ?>
                    <li><a href="index.php/report/mount_withdrawal">วัสดุรายเดือน</a></li>
                <?php } ?>
                <?php if(__permission($this->account_id,"type_withdrawal")){ ?>
                    <li><a href="index.php/report/type_withdrawal">วัสดุแยกประเภท</a></li>
                <?php } ?>
                <?php if(__permission($this->account_id,"person_withdrawal")){ ?>
                    <li><a href="index.php/report/person_withdrawal">วัสดุแยกตามผู้เบิก</a></li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>
    <?php if(__permission($this->account_id,"purchasing_report")){ ?>
        <li><a href="index.php/mtr/purchasing_report">&nbsp;รายงานการนำเข้า</a></li>
    <?php } ?>
  </ul>
</li>
<?php } ?>
<!--
<li class="dropdown">
  <a href="#" data-toggle="dropdown" class="dropdown-toggle" data-hover="dropdown" data-delay="500">&nbsp;เกี่ยวกับโปรแกรม <b class="caret"></b></a>
  <ul class="dropdown-menu" id="menu1">
    <li><a href="#">สำรองข้อมูล</a></li>
    <li><a href="#">นำเข้าข้อมูล</a></li>
  </ul>
</li>
-->
</ul>

        </div>
     
      <ul class="nav navbar-nav navbar-right">
    <!--
    	 <form class="navbar-form navbar-left" role="search">
        <div class="form-group" style="margin:3px">
         </span>&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" placeholder="ค้นหา" style="margin: none">
        </div>
        <button type="submit" class="btn btn-default ">ค้นหา</button>
      </form>
  -->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <!-- --------------------------------------------------------------------------------------- -->

<style>
    body {
        //padding-top: 60px;
        //padding-bottom: 40px;
    }
    .nev-profile{
        width: 100px !important;
    }
    .sidebar-nav {
        padding: 9px 0;
    }

    .dropdown-menu .sub-menu {
        left: 100%;
        position: absolute;
        top: 0;
        visibility: hidden;
        margin-top: -1px;
    }

    .dropdown-menu li:hover .sub-menu {
        visibility: visible;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

    .nav-tabs .dropdown-menu, .nav-pills .dropdown-menu, .navbar .dropdown-menu {
        margin-top: 0;
    }

    .navbar .sub-menu:before {
        border-bottom: 7px solid transparent;
        border-left: none;
        border-right: 7px solid rgba(0, 0, 0, 0.2);
        border-top: 7px solid transparent;
        left: -7px;
        top: 10px;
    }
    .navbar .sub-menu:after {
        border-top: 6px solid transparent;
        border-left: none;
        border-right: 6px solid #fff;
        border-bottom: 6px solid transparent;
        left: 10px;
        top: 11px;
        left: -6px;
    }

</style>

