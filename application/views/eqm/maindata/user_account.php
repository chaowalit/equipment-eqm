<?php
    $this->load->view('include/eqm/header');
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
           คุณอยู่ที่ >> บันทึกข้อมูลบื้องต้น >> ส่วนงาน/ผู้ใช้</h3>
        <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
    </div>
    <center>
    <div class="panel-body">
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
                                    <td><span id = "error1">กรอกส่วนราชการ</span></td>
                                </tr>
                                <tr>
                                    <td>หน่วยงาน</td>
                                    <td><input class="form-control" type="text" name="institution" id="institution" value="<?php foreach($data_service as $row){ echo $row->agencies; } ?>" style="border-top: none;border-left: none;border-right: none;background-color: white;" readonly></td>
                                    <td><span id = "error2">กรอกหน่วยงาน</span></td>
                                </tr>
                                <tr>
                                    <td>กลุ่มงาน</td>
                                    <td>
                                        <select name="workgroup" id="workgroup" class="form-control">
                                            <option value="">เลือกกลุ่มงาน</option>
                                            <?php
                                                foreach($workgroup as $row){
                                                    echo "<option value=\"$row->be_under_id\">$row->be_under_name</option>";
                                                }
                                            ?>
                                        </select>
                                        <span id = "error3">*กรุณาเลือกกลุ่มงาน</span>
                                    </td>
                                    <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                </tr>
                                <tr>
                                    <td>ตำแหน่ง</td>
                                    <td>
                                        <input class="form-control" type="text" name="position" id="position">
                                        <span id = "error4">*กรุณากรอกตำแหน่ง</span>
                                    </td>
                                    <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                </tr>
                                <tr>
                                    <td>ระดับ</td>
                                    <td>
                                        <input class="form-control" type="text" name="degree" id="degree">
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
                                                foreach($title_name as $row){
                                                    echo "<option value=\"$row->title_name_id\">$row->title_name</option>";
                                                }
                                            ?>
                                        </select>
                                        <span id = "error6">*กรุณาเลือกคำนำหน้า</span>
                                    </td>
                                    <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                </tr>
                                <tr>
                                    <td>ชื่อ</td>
                                    <td><input class="form-control" type="text" name="name" id="name">
                                        <span id = "error7">*กรุณากรอกชื่อ</span>
                                    </td>
                                    <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                </tr>
                                <tr>
                                    <td>นามสกุล</td>
                                    <td><input class="form-control" type="text" name="lastname" id="lastname">
                                        <span id = "error8">*กรุณากรอกนามสกุล</span>
                                    </td>
                                    <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
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
                                    <td width = "30%">วันเดือนปีเกิด</td>
                                    <td width = "68%"><input class="form-control" type="text" name="birthday" id="birthday">
                                                        <span id = "error9">*กรุณากรอกวันเดือนปีเกิด</span>
                                    </td>
                                    <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                </tr>
                                 <tr>
                                    <td>วันรับราชการ</td>
                                    <td><input class="form-control" type="text" name="domination_day" id="domination_day">
                                        <span id = "error10">*กรุณากรอกวันรับราชการ</span>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>วันเกษียร/สิ้นสุดสัญญา</td>
                                    <td><input class="form-control" type="text" name="retirement_day" id="retirement_day">
                                        <span id = "error11">*กรุณากรอกวันเกษียร/สิ้นสุดสัญญา</span>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>เบอร์โทร</td>
                                    <td>
                                        <input class="form-control" type="text" name="telephone" id="telephone">
                                        <span id = "error12">*กรุณากรอกเบอร์โทร</span>
                                    </td>
                                    <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td>
                                        <input class="form-control" type="text" name="email" id="email">
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
                                    <td><input class="form-control" type="text" name="user_name" id="user_name">
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
                        <button type="submit" class="btn btn-primary" id="btn_save_user_account"> บันทึก</button> &nbsp;
                        <button type="reset" class="btn btn-danger" id="btn_cancel_user_account"> ยกเลิก</button> <p>
                    </center>
                </td>
            </tr>

        </table>
        </form>
    </div>
    </center>
</div>

<div style = "margin-left:20px;margin-right:20px;">
    <div class="table-responsive" id="show_data_user">

        
    </div>
</div>

<script>   
    $(document).ready(function(){
        $("#error1,#error2,#error3,#error4,#error5,#error6,#error7,#error8,#error9,#error10,#error11,#error12,#error13,#error14,#error15,#error16,#error17,#error18").hide();
        
        $( "form" ).submit(function(e) {
            var formData = new FormData(this);
            if(check_form_data_account() == true){
           
                     $.ajax({
                         url: "<?php echo base_url(); ?>index.php/eqm/user_account/saveUserDataAccount",
                         type: 'POST',
                         data: formData,
                         contentType: false,
                         cache: false,
                         processData:false,

                         success: function(data)
                         {
                             alert(data);
                             $( ".clickable" ).click();
                             show_data_user_account();
                             
                             $('#workgroup').val('');
                            $('#position').val('');
                            $('#degree').val('');
                            $('#prefix_name').val("");
                            $('#name').val('');
                            $('#lastname').val('');
                            $('#service_id').val('');
                            $('#birthday').val('');
                            $('#domination_day').val('');
                            $('#retirement_day').val('');
                            $('#telephone').val('');
                            $('#email').val('');
                            $('#image_account').val('');
                            $('#user_name').val('');
                            $('#password').val('');
                            $('#re_password').val('');
                         }
                     });
             
            }
            e.preventDefault();
        });
        $("#btn_cancel_user_account").click(function() {
            $('#workgroup').val('');
            $('#position').val('');
            $('#degree').val('');
            //$prefix_name = $_POST['prefix_name'];
            $('#name').val('');
            $('#lastname').val('');
            $('#service_id').val('');
            $('#birthday').val('');
            $('#domination_day').val('');
            $('#retirement_day').val('');
            $('#telephone').val('');
            $('#email').val('');
            $('#user_name').val('');
            $('#password').val('');
            $( ".clickable" ).click();
        });
        show_data_user_account();
        //--------------------------------------------------------------
        
        $('#form_user_account_edit').live('submit',function(e){
            var formData = new FormData(this);
            if(check_form_data_account_edit() == true){
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/eqm/user_account/updateDataUserAccount",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData:false,

                    success: function(data)
                    {
                        if(data == 'fail_image'){
                            alert('ไม่สามารถทำการบันทึกรูปได้ กรุณาตรวจสอบรูป');
                        }else if(data == 'updateLoginOwner'){
                            alert("แก้ไขข้อมูลผู้ใช้งาน เรียบร้อยแล้ว");
                            location.reload();
                        }else{
                            //show_data_user_account();
                            alert(data);
                            
                            $('#clearDataUserAccount').live().click();
                            //$("#show_data_user").load("<?php echo base_url(); ?>index.php/eqm/user_account/getUserDataAccount");
                            setTimeout('show_data_user_account()', 500);
                        }
                    }
                });
                
            }
            e.preventDefault();
        });
    });
    function show_data_user_account(){
        //$('#clearDataUserAccount').live().click();
        $("#show_data_user").load("<?php echo base_url(); ?>index.php/eqm/user_account/getUserDataAccount");
    }
    function check_form_data_account(){
        var check_true = true;
        if($("#workgroup").val() == ""){
            $("#error3").css('color','red').show();
            check_true = false;
        }
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
        if($("#password").val() == ""){
            $("#error16").css('color','red').show();
            check_true = false;
        }
        if($("#re_password").val() == ""){
            $("#error17").css('color','red').show();
            check_true = false;
        }
        if($("#password").val() != $("#re_password").val()){
            $("#error18").css('color','red').show();
            check_true = false;
        }
        //--------------------------------------------------------
        if($("#workgroup").val() != ""){
            $("#error3").hide();
            //check_true = false;
        }
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
    function check_form_data_account_edit(){
        var check_true = true;
        if($("#workgroupEdit").val() == ""){
            $("#error33").css('color','red').show();
            check_true = false;
        }
        if($("#positionEdit").val() == ""){
            $("#error44").css('color','red').show();
            check_true = false;
        }
        if($("#degreeEdit").val() == ""){
            $("#error55").css('color','red').show();
            check_true = false;
        }
        if($("#prefix_nameEdit").val() == ""){
            $("#error66").css('color','red').show();
            check_true = false;
        }
        if($("#nameEdit").val() == ""){
            $("#error77").css('color','red').show();
            check_true = false;
        }
        if($("#lastnameEdit").val() == ""){
            $("#error88").css('color','red').show();
            check_true = false;
        }
        if($("#birthdayEdit").val() == ""){
            $("#error99").css('color','red').show();
            check_true = false;
        }
        if($("#telephoneEdit").val() == ""){
            $("#error122").css('color','red').show();
            check_true = false;
        }
        if($("#user_nameEdit").val() == ""){
            $("#error155").css('color','red').show();
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
        if($("#passwordEdit").val() != $("#re_passwordEdit").val()){
            $("#error188").css('color','red').show();
            check_true = false;
        }
        //--------------------------------------------------------
        if($("#workgroupEdit").val() != ""){
            $("#error33").hide();
            //check_true = false;
        }
        if($("#positionEdit").val() != ""){
            $("#error44").hide();
            //check_true = false;
        }
        if($("#degreeEdit").val() != ""){
            $("#error55").hide();
            //check_true = false;
        }
        if($("#prefix_nameEdit").val() != ""){
            $("#error66").hide();
            //check_true = false;
        }
        if($("#nameEdit").val() != ""){
            $("#error77").hide();
            //check_true = false;
        }
        if($("#lastnameEdit").val() != ""){
            $("#error88").hide();
            //check_true = false;
        }
        if($("#birthdayEdit").val() != ""){
            $("#error99").hide();
            //check_true = false;
        }
        if($("#telephoneEdit").val() != ""){
            $("#error122").hide();
            //check_true = false;
        }
        if($("#user_nameEdit").val() != ""){
            $("#error155").hide();
            //check_true = false;
        }
        if($("#passwordEdit").val() != ""){
            $("#error166").hide();
            //check_true = false;
        }
        if($("#re_passwordEdit").val() != ""){
            $("#error177").hide();
            //check_true = false;
        }
        if($("#passwordEdit").val() == $("#re_passwordEdit").val()){
            $("#error188").hide();
            //check_true = false;
        } 
        return check_true;
    }
</script>


<?php
    $this->load->view('include/eqm/footer');
?>