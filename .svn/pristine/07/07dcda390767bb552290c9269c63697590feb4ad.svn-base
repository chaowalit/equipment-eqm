
<?php 
    $agencies;
    foreach($data_service as $row){
        $agencies = $row->agencies;
    }
?>   
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead class = "hd1">
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อ-นามสกุล</th>
            <th>สังกัด</th>
            <th>ระดับ</th>
            <th>ตำแหน่ง</th>
            <th>เบอร์โทร</th>
            <th>รับราชการ</th>
            <th>วันเกษียร</th>
            <th width="145px">จัดการ</th>
        </tr>
    </thead>
    <tbody>
<?php
    $count=1;
    foreach($data_user as $row){ 
?>
<?php if($count%2 == 1){ ?>
<tr class="odd gradeX">
    <td><?php echo $count; ?></td>
    <td><?php echo $row->full_name; ?></td>
    <td><?php echo $agencies; ?></td>
    <td class="center"><?php echo $row->degree; ?></td>
    <td class="center"><?php echo $row->position; ?></td>
    <td><?php echo $row->telephone; ?></td>
    <td><?php echo $row->domination_day; ?></td>
    <td><?php echo $row->retirement_day; ?></td>
    <td class="center">
        <a href="#setPermission" data-toggle="modal" class="delete-hover setPermissionUserAccount" title="<?php echo $row->id; ?>"><img src="<?php echo base_url(); ?>icon/permission-icon.png" title="กำหนดสิทธิ์ผู้ใช้งาน" style="width: 25px;height: 25px;"></a>
        <a href="#editUserAccount" data-toggle="modal" class="delete-hover editUserAccount" title="<?php echo $row->id; ?>"><img src="<?php echo base_url(); ?>icon/edit-icon.png" title="แก้ไขข้อมูลผู้ใช้งาน" style="width: 25px;height: 25px;"></a>
        <a onclick="return confirm('คุณต้องการลบผู้ใช้งานนี้หรือไม่?')" href="<?php echo base_url(); ?>index.php/eqm/user_account/delete_user_account/<?php echo $row->id; ?>" class="delete-hover"><img src="<?php echo base_url(); ?>icon/delete-icon.png" title="ลบผู้ใช้งาน" style="width: 25px;height: 25px;"></a>
    </td>
    
</tr>
<?php }else{ ?>
<tr class="even gradeC">
    <td><?php echo $count; ?></td>
    <td><?php echo $row->full_name; ?></td>
    <td><?php echo $agencies; ?></td>
    <td class="center"><?php echo $row->degree; ?></td>
    <td class="center"><?php echo $row->position; ?></td>
    <td><?php echo $row->telephone; ?></td>
    <td><?php echo $row->domination_day; ?></td>
    <td><?php echo $row->retirement_day; ?></td>
    <td class="center">
        <a href="#setPermission" data-toggle="modal" class="delete-hover setPermissionUserAccount" title="<?php echo $row->id; ?>"><img src="<?php echo base_url(); ?>icon/permission-icon.png" title="กำหนดสิทธิ์ผู้ใช้งาน" style="width: 25px;height: 25px;"></a>
        <a href="#editUserAccount" data-toggle="modal" class="delete-hover editUserAccount" title="<?php echo $row->id; ?>"><img src="<?php echo base_url(); ?>icon/edit-icon.png" title="แก้ไขข้อมูลผู้ใช้งาน" style="width: 25px;height: 25px;"></a>
        <a onclick="return confirm('คุณต้องการลบผู้ใช้งานนี้หรือไม่?')" href="<?php echo base_url(); ?>index.php/eqm/user_account/delete_user_account/<?php echo $row->id; ?>" class="delete-hover"><img src="<?php echo base_url(); ?>icon/delete-icon.png" title="ลบผู้ใช้งาน" style="width: 25px;height: 25px;"></a>
    </td>
</tr>

<?php
    }
    $count++;
    } 
?>
    </tbody>
</table>

<!-- ------------------------------------------------------------------------------------------------------- -->
<div class="modal fade" id="setPermission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:50% !important;">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2>กำหนดสิทธิ์การเข้าใช้เมนูของผู้ใช้งาน</h2>
            </div>
            <div class="modal-body" id="show_list_permission_user_account">
                <!-- form edit -->
                
                <!-- -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(document).ready(function(){
        $('.setPermissionUserAccount').click(function(){
            var user_id = $(this).attr( "title" );
            
            show_data_permission_user_account(user_id);
        });
        $('#form_set_permission').live('submit',function(e){
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/eqm/user_account/updatePermissionUserAccount",
                type: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData:false,

                success: function(data)
                {
                    alert(data);
                    $("#setPermission").modal('hide');
                    location.reload();
                }
            });
        });
        
    });
    
    function show_data_permission_user_account(user_id){
        $("#show_list_permission_user_account").load("<?php echo base_url(); ?>index.php/eqm/user_account/getPermissionUserAccount/"+user_id);
    }
</script>

<!-- ------------------------------------------------------------------------------------------------------- -->
<div class="modal fade" id="editUserAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2>แก้ไข ส่วนงาน/ผู้ใช้งาน</h2>
            </div>
            <div class="modal-body">
                <!-- form edit -->
                <form id="form_user_account_edit" enctype="multipart/form-data">
                <table width="100%" border="0">

                    <tr>
                        <td width="50%"> <!------------------------------------------------------------------------- -->
                            <div class="panel-body">
                                <table class="table table-striped  ">
                                    <tbody>
                                        <tr>
                                            <td width = "30%">ส่วนราชการ</td>
                                            <td width = "68%"><input class="form-control" type="text" name="dominationEdit" id="dominationEdit" value="<?php foreach($data_service as $row){ echo $row->service_name; } ?>" style="border-top: none;border-left: none;border-right: none;background-color: white;" readonly></td>
                                            <td><span id = "error11">กรอกส่วนราชการ</span></td>
                                        </tr>
                                        <tr>
                                            <td>หน่วยงาน</td>
                                            <td><input class="form-control" type="text" name="institutionEdit" id="institutionEdit" value="<?php foreach($data_service as $row){ echo $row->agencies; } ?>" style="border-top: none;border-left: none;border-right: none;background-color: white;" readonly></td>
                                            <td><span id = "error22">กรอกหน่วยงาน</span></td>
                                        </tr>
                                        <tr>
                                            <td>กลุ่มงาน</td>
                                            <td>
                                                <select name="workgroupEdit" id="workgroupEdit" class="form-control">
                                                    <option value="">เลือกกลุ่มงาน</option>
                                                    <?php
                                                        foreach($workgroup as $row){
                                                            echo "<option value=\"$row->be_under_id\">$row->be_under_name</option>";
                                                        }
                                                    ?>
                                                </select>
                                                <span id = "error33">*กรุณาเลือกกลุ่มงาน</span>
                                            </td>
                                            <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        </tr>
                                        <tr>
                                            <td>ตำแหน่ง</td>
                                            <td>
                                                <input class="form-control" type="text" name="positionEdit" id="positionEdit">
                                                <span id = "error44">*กรุณากรอกตำแหน่ง</span>
                                            </td>
                                            <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        </tr>
                                        <tr>
                                            <td>ระดับ</td>
                                            <td>
                                                <input class="form-control" type="text" name="degreeEdit" id="degreeEdit">
                                                <span id = "error55">*กรุณากรอกระดับ</span>
                                            </td>
                                            <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        </tr>
                                        <tr>
                                            <td>คำนำหน้า</td>
                                            <td>
                                                <select name="prefix_nameEdit" id="prefix_nameEdit" class="form-control">
                                                    <option value="">เลือกคำนำหน้า</option>
                                                    <?php
                                                        foreach($title_name as $row){
                                                            echo "<option value=\"$row->title_name_id\">$row->title_name</option>";
                                                        }
                                                    ?>
                                                </select>
                                                <span id = "error66">*กรุณาเลือกคำนำหน้า</span>
                                            </td>
                                            <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        </tr>
                                        <tr>
                                            <td>ชื่อ</td>
                                            <td><input class="form-control" type="text" name="nameEdit" id="nameEdit">
                                                <span id = "error77">*กรุณากรอกชื่อ</span>
                                            </td>
                                            <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        </tr>
                                        <tr>
                                            <td>นามสกุล</td>
                                            <td><input class="form-control" type="text" name="lastnameEdit" id="lastnameEdit">
                                                <span id = "error88">*กรุณากรอกนามสกุล</span>
                                            </td>
                                            <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;</td>
                                            <td><input class="form-control" type="text" name="service_idEdit" value="<?php foreach($data_service as $row){ echo $row->service_id; } ?>" style="border: none;color:white;background-color: white;" readonly></td>
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
                                            <td width = "68%"><input class="form-control" type="text" name="birthdayEdit" id="birthdayEdit">
                                                                <span id = "error99">*กรุณากรอกวันเดือนปีเกิด</span>
                                            </td>
                                            <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        </tr>
                                         <tr>
                                            <td>วันรับราชการ</td>
                                            <td><input class="form-control" type="text" name="domination_dayEdit" id="domination_dayEdit">
                                                <span id = "error100">*กรุณากรอกวันรับราชการ</span>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>วันเกษียร/สิ้นสุดสัญญา</td>
                                            <td><input class="form-control" type="text" name="retirement_dayEdit" id="retirement_dayEdit">
                                                <span id = "error111">*กรุณากรอกวันเกษียร/สิ้นสุดสัญญา</span>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>เบอร์โทร</td>
                                            <td>
                                                <input class="form-control" type="text" name="telephoneEdit" id="telephoneEdit">
                                                <span id = "error122">*กรุณากรอกเบอร์โทร</span>
                                            </td>
                                            <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        </tr>
                                        <tr>
                                            <td>E-mail</td>
                                            <td>
                                                <input class="form-control" type="text" name="emailEdit" id="emailEdit">
                                                <span id = "error133">*กรุณากรอกอีเมล</span>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>รูปพนักงาน</td>
                                            <td>
                                                 <input class="form-control" type="file" name="image_accountEdit" id="image_accountEdit">
                                                 <span id = "error144">*กรุณาเลือกรูปพนักงาน</span>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>ชื่อผู้ใช้งานระบบ</td>
                                            <td><input class="form-control" type="text" name="user_nameEdit" id="user_nameEdit">
                                                <span id = "error155">*กรุณากรอกชื่อผู้ใช้งานระบบ</span>
                                            </td>

                                            <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        </tr>
                                        <tr>
                                            <td>รหัสผ่านเข้าระบบ</td>
                                            <td><input class="form-control" type="password" name="passwordEdit" id="passwordEdit">
                                                <span id = "error166">*กรอกรหัสผ่านเข้าระบบ</span>
                                            </td>
                                            <td><span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        </tr>
                                        <tr>
                                            <td>ยืนยันรหัสผ่านเข้าระบบ</td>
                                            <td><input class="form-control" type="password" name="re_passwordEdit" id="re_passwordEdit">
                                                <span id = "error177">*กรุณากรอกยืนยันรหัสผ่านเข้าระบบ</span>
                                                <span id = "error188">*รหัสผ่านไม่ตรงกัน</span>
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
                                <input type="hidden" name="account_id" id="account_id">
                                <input type="hidden" name="image_accountOld" id="image_accountOld">
                                <button type="submit"  class="btn btn-primary" id = "btn_update_user_account" >บันทึก</button> &nbsp;
                                <a data-dismiss="modal" class="btn btn-danger" id = "clearDataUserAccount">ยกเลิก</a>
                            </center>
                        </td>
                    </tr>

                </table>
                </form>
                <!-- -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    $(function() {
        $('#dataTables-example').dataTable();
        $("#error11,#error22,#error33,#error44,#error55,#error66,#error77,#error88,#error99,#error100,#error111,#error122,#error133,#error144,#error155,#error166,#error177,#error188").hide();
        
        $('.editUserAccount').click(function(){
            var id = $(this).attr( "title" );
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>index.php/eqm/user_account/getDataUserAccountIdForUpdate",
                data:{ account_id:id },
                dataType: 'json',
                success:function(result){
                    var obj = result;
                    
                    $('#workgroupEdit').val(obj['working_group_id']);
                    $('#positionEdit').val(obj['position']);
                    $('#degreeEdit').val(obj['degree']);
                    $('#prefix_nameEdit').val(obj['title_name_id']);
                    $('#nameEdit').val(obj['first_name']);
                    $('#lastnameEdit').val(obj['last_name']);
                    $('#birthdayEdit').val(obj['birthday']);
                    $('#domination_dayEdit').val(obj['domination_day']);
                    $('#retirement_dayEdit').val(obj['retirement_day']);
                    $('#telephoneEdit').val(obj['telephone']);
                    $('#emailEdit').val(obj['email']);
                    $('#account_id').val(obj['id']);
                    $('#image_accountOld').val(obj['image_account']);
                    $('#user_nameEdit').val(obj['user_name']);
                }
            }); 
        });
        $('#clearDataUserAccount').click(function(){
            $("#error11,#error22,#error33,#error44,#error55,#error66,#error77,#error88,#error99,#error100,#error111,#error122,#error133,#error144,#error155,#error166,#error177,#error188").hide();
            $('#image_accountEdit').val('');
            //$("#show_data_user").load("<?php echo base_url(); ?>index.php/eqm/user_account/getUserDataAccount");
        });
    });
</script>
<style type="text/css"> 
    .delete-hover { 
         
        padding: 10px; 
    } 
    .delete-hover:hover { 
        -moz-box-shadow: 0 0 10px #ccc; 
        -webkit-box-shadow: 0 0 10px #ccc; 
        box-shadow: 0 0 10px #ccc; 
    } 
    .modal-header-warning {
        color:#fff;
        padding:9px 15px;
        border-bottom:1px solid #eee;
        background-color: #FF6633;
        -webkit-border-top-left-radius: 5px;
        -webkit-border-top-right-radius: 5px;
        -moz-border-radius-topleft: 5px;
        -moz-border-radius-topright: 5px;
         border-top-left-radius: 5px;
         border-top-right-radius: 5px;
    }
    .modal-dialog{
        width:88% !important ; 
    }     
</style>
<script type="text/javascript">
    $(document).ready(function() {
        var d = new Date();
        var toDay = d.getDate() + '-' + (d.getMonth() + 1) + '-' + (d.getFullYear() );
        //+ 543

        $("#birthdayEdit,#domination_dayEdit,#retirement_dayEdit").datepicker({ 
          changeMonth: true, changeYear: true,dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay,
          dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
          dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
          monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
          monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']

        });

    });

</script>