<?php
    $this->load->view('include/eqm/header');
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
           คุณอยู่ที่ >> เกี่ยวกับโปรแกรม >> ข้อมูลส่วนตัว</h3>
        <!--<span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span> -->
    </div>
    <center>
    
        <form  method="POST" id="form_user_account" enctype="multipart/form-data">
        <table width="90%" border="0">

            <tr>
                <td width="50%"> <!------------------------------------------------------------------------- -->
                    <div class="panel-body">
                        <table class="table table-striped  ">
                            <tbody>
                                <tr>
                                    <td width = "30%">ส่วนราชการ</td>
                                    <td width = "68%"><input class="form-control" type="text" name="domination" id="domination" value="<?php foreach($data_service as $row){ echo $row->service_name; } ?>" style="border-top: none;border-left: none;border-right: none;background-color: white;" readonly></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>หน่วยงาน</td>
                                    <td><input class="form-control" type="text" name="institution" id="institution" value="<?php foreach($data_service as $row){ echo $row->agencies; } ?>" style="border-top: none;border-left: none;border-right: none;background-color: white;" readonly></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>กลุ่มงาน</td>
                                    <td>
                                        <select name="workgroup" id="workgroup" class="form-control">
                                            <option value="">เลือกกลุ่มงาน</option>
                                            <?php
                                                foreach($workgroup as $row1){
                                                    foreach($data_profile as $row2){
                                                       if($row1->be_under_id == $row2->working_group_id){
                                                           echo "<option value=\"$row1->be_under_id\" selected>$row1->be_under_name</option>";
                                                       }else{
                                                           echo "<option value=\"$row1->be_under_id\">$row1->be_under_name</option>"; 
                                                       }
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <span id = "error3">*กรุณากรอกกลุ่มงาน</span>
                                    </td>
                                    <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                </tr>
                                <tr>
                                    <td>ตำแหน่ง</td>
                                    <td>
                                        <input class="form-control" type="text" name="position" id="position" value="<?php foreach($data_profile as $row) echo $row->position; ?>">
                                        <span id = "error4">*กรุณากรอกตำแหน่ง</span>
                                    </td>
                                    <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                </tr>
                                <tr>
                                    <td>ระดับ</td>
                                    <td>
                                        <input class="form-control" type="text" name="degree" id="degree" value="<?php foreach($data_profile as $row) echo $row->degree; ?>">
                                        <span id = "error5">*กรุณากรอกระดับ</span>
                                    </td>
                                    <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                </tr>
                                <tr>
                                    <td>คำนำหน้า</td>
                                    <td>
                                        <select name="prefix_name" id="prefix_name" class="form-control">
                                            <option value="">เลือกคำนำหน้า</option>
                                            <?php
                                                foreach($title_name as $row1){
                                                    foreach($data_profile as $row2){
                                                        if($row1->title_name_id == $row2->title_name_id){
                                                            echo "<option value=\"$row1->title_name_id\" selected>$row1->title_name</option>"; 
                                                        }else{
                                                            echo "<option value=\"$row1->title_name_id\">$row1->title_name</option>"; 
                                                        }
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <span id = "error6">*กรุณาเลือกคำนำหน้า</span>
                                    </td>
                                    <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                </tr>
                                <tr>
                                    <td>ชื่อ</td>
                                    <td><input class="form-control" type="text" name="name" id="name" value="<?php foreach($data_profile as $row){ $pieces = explode(" ", $row->full_name); echo $pieces[0]; } ?>">
                                        <span id = "error7">*กรุณากรอกชื่อ</span>
                                    </td>
                                    <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                </tr>
                                <tr>
                                    <td>นามสกุล</td>
                                    <td><input class="form-control" type="text" name="lastname" id="lastname" value="<?php foreach($data_profile as $row){ $pieces = explode(" ", $row->full_name); echo $pieces[1]; } ?>">
                                        <span id = "error8">*กรุณากรอกนามสกุล</span>
                                    </td>
                                    <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                </tr>
                                <tr>
                                    <td width = "30%">วันเดือนปีเกิด</td>
                                    <td width = "68%"><input class="form-control" type="text" name="birthday" id="birthday" value="<?php foreach($data_profile as $row) echo date( "d-m-Y", strtotime($row->birthday)); ?>">
                                                        <span id = "error9">*กรุณากรอกวันเดือนปีเกิด</span>
                                    </td>
                                    <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                </tr>
                                 <tr>
                                    <td>วันรับราชการ</td>
                                    <td><input class="form-control" type="text" name="domination_day" id="domination_day" value="<?php foreach($data_profile as $row) echo date( "d-m-Y", strtotime($row->domination_day)); ?>">
                                        <span id = "error10">*กรุณากรอกวันรับราชการ</span>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>วันเกษียร/สิ้นสุดสัญญา</td>
                                    <td><input class="form-control" type="text" name="retirement_day" id="retirement_day" value="<?php foreach($data_profile as $row) echo date( "d-m-Y", strtotime($row->retirement_day)); ?>">
                                        <span id = "error11">*กรุณากรอกวันเกษียร/สิ้นสุดสัญญา</span>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><input class="form-control" type="text" name="service_id" value="<?php foreach($data_service as $row){ echo $row->service_id; } ?>" style="border: none;color:white;background-color: white;" readonly></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                     </div>
                </td>
                <td width="50%"> <!------------------------------------------------------------------------- -->
                    <div class="panel-body">
                        <table class="table table-striped  ">
                            <tbody>
                                <tr>
                                    <td colspan="3"  class="center">
                                        <center>
                                            <?php
                                            foreach($data_profile as $row):
                                                if($row->image_account){
                                            ?>
                                                <img src="<?php echo base_url(); ?>upload/image_account/<?php echo $row->image_account; ?>" style="width: 188px;height: 188px;" class="picHover"> 
                                            <?php }else{ ?>
                                            <img src="<?php echo base_url(); ?>icon/User-Executive-Green-icon.png" style="width: 188px;height: 188px;" class="picHover">
                                            <?php } endforeach; ?>
                                        </center>
                                        <input type="hidden" name="image_old" value="<?php foreach($data_profile as $row) echo $row->image_account; ?>">
                                        <input type="hidden" name="account_id" value="<?php foreach($data_profile as $row) echo $row->id; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>เบอร์โทร</td>
                                    <td>
                                        <input class="form-control" type="text" name="telephone" id="telephone" value="<?php foreach($data_profile as $row) echo $row->telephone; ?>">
                                        <span id = "error12">*กรุณากรอกเบอร์โทร</span>
                                    </td>
                                    <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td>
                                        <input class="form-control" type="text" name="email" id="email" value="<?php foreach($data_profile as $row) echo $row->email; ?>">
                                        <span id = "error13">*กรุณากรอกอีเมล</span>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>รูปพนักงาน</td>
                                    <td>
                                         <input class="form-control" type="file" name="image_account" id="image_account">
                                         <span id = "error14">*กรุณาเลือกรูปพนักงาน</span>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>ชื่อผู้ใช้งานระบบ</td>
                                    <td><input class="form-control" type="text" name="user_name" id="user_name" value="<?php foreach($data_profile as $row) echo $row->user_name; ?>">
                                        <span id = "error15">*กรุณากรอกชื่อผู้ใช้งานระบบ</span>
                                    </td>
                                        
                                    <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                </tr>
                                <tr>
                                    <td>รหัสผ่านเข้าระบบ</td>
                                    <td><input class="form-control" type="password" name="password" id="password">
                                        <span id = "error16">*กรอกรหัสผ่านเข้าระบบ</span>
                                    </td>
                                    <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                </tr>
                                <tr>
                                    <td>ยืนยันรหัสผ่านเข้าระบบ</td>
                                    <td><input class="form-control" type="password" name="re_password" id="re_password">
                                        <span id = "error17">*กรุณากรอกยืนยันรหัสผ่านเข้าระบบ</span>
                                        <span id = "error18">*รหัสผ่านไม่ตรงกัน</span>
                                    </td>
                                    <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                </tr>

                            </tbody>
                        </table>

                     </div>
                </td> <!------------------------------------------------------------------------- -->
            </tr>
            <tr>
                <td colspan="2">
                    <center>
                        <button type="submit" class="btn btn-primary" id="btn_save_user_account"> >>บันทึก</button> &nbsp;
                        <button type="button" class="btn btn-danger" id="btn_cancel_user_account"> >>ยกเลิก</button> <p>
                        
                    </center>
                </td>
            </tr>

        </table>
        </form>
   
    </center>
</div>
<style type="text/css"> 
    .picHover{ 
         -moz-box-shadow: 0 0 10px #ccc; -webkit-box-shadow: 0 0 10px #ccc; box-shadow: 0 0 10px #ccc;
        //border:2px solid #000000; 
    } 
    .picHover:hover {
        opacity: 0.3; 
        filter: alpha(opacity=30);
    } 
</style>
<script>
    $(document).ready(function(){
        $("#error1,#error2,#error3,#error4,#error5,#error6,#error7,#error8,#error9,#error10,#error11,#error12,#error13,#error14,#error15,#error16,#error17,#error18").hide();
        
        $( "form" ).submit(function(e) {
            var formData = new FormData(this);
            if(check_form_data_account() == true){
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/eqm/profile_account/updateDataProfileAccount",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData:false,

                    success: function(data)
                    {
                        alert(data);
                        location.reload();
                    }
                });
            }
            e.preventDefault();
        });
        
        $("#btn_cancel_user_account").click(function() {
            $("#error1,#error2,#error3,#error4,#error5,#error6,#error7,#error8,#error9,#error10,#error11,#error12,#error13,#error14,#error15,#error16,#error17,#error18").hide();
            location.reload();
        });
    });
    function check_form_data_account(){
        var check_true = true;
        if($("#position").val() == ""){
            $("#error4").css('color','red').show();
            check_true = false;
        }
        if($("#degree").val() == ""){
            $("#error5").css('color','red').show();
            check_true = false;
        }
        if($("#prefix_name").val() == ""){
            $("#error6").css('color','red').show();
            check_true = false;
        }
        if($("#name").val() == ""){
            $("#error7").css('color','red').show();
            check_true = false;
        }
        if($("#lastname").val() == ""){
            $("#error8").css('color','red').show();
            check_true = false;
        }
        if($("#birthday").val() == ""){
            $("#error9").css('color','red').show();
            check_true = false;
        }
        if($("#telephone").val() == ""){
            $("#error12").css('color','red').show();
            check_true = false;
        }
        if($("#user_name").val() == ""){
            $("#error15").css('color','red').show();
            check_true = false;
        }
        //if($("#password").val() == ""){
            //$("#error16").css('color','red').show();
            //check_true = false;
        //}
        //if($("#re_password").val() == ""){
            //$("#error17").css('color','red').show();
            //check_true = false;
        //}
        if($("#password").val() != $("#re_password").val()){
            $("#error18").css('color','red').show();
            check_true = false;
        }
        //--------------------------------------------------------
        if($("#position").val() != ""){
            $("#error4").hide();
            //check_true = false;
        }
        if($("#degree").val() != ""){
            $("#error5").hide();
            //check_true = false;
        }
        if($("#prefix_name").val() != ""){
            $("#error6").hide();
            //check_true = false;
        }
        if($("#name").val() != ""){
            $("#error7").hide();
            //check_true = false;
        }
        if($("#lastname").val() != ""){
            $("#error8").hide();
            //check_true = false;
        }
        if($("#birthday").val() != ""){
            $("#error9").hide();
            //check_true = false;
        }
        if($("#telephone").val() != ""){
            $("#error12").hide();
            //check_true = false;
        }
        if($("#user_name").val() != ""){
            $("#error15").hide();
            //check_true = false;
        }
        if($("#password").val() != ""){
            $("#error16").hide();
            //check_true = false;
        }
        if($("#re_password").val() != ""){
            $("#error17").hide();
            //check_true = false;
        }
        if($("#password").val() == $("#re_password").val()){
            $("#error18").hide();
            //check_true = false;
        } 
        return check_true;
    }
</script>

<?php
    $this->load->view('include/eqm/footer');
?>

