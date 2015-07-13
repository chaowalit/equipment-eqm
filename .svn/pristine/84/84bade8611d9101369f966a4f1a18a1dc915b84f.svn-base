<?php $this->load->view('include/eqm/header'); ?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
           คุณอยู่ที่ >> บันทึกข้อมูลทะเบียน >> ทะเบียนโอนครุภัณฑ์</h3>
        <span class="pull-right clickable panel-collapsed" id="clickable"><i class="glyphicon glyphicon-plus"></i></span>
    </div>
    <div class="panel-body">    
        <div class="table-responsive">
            <form id="save_form_eqm_transfer" enctype="multipart/form-data">
            <table class="table table-striped" border="0">
                <tbody>
                    <tr>
                        <td width = "15%" style="text-align: right !important;">หมายเลขครุภัณฑ์ : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                        <td width = "35%">
                            <div style="display: inline-block;">
                                <input type="text" name="equipment_number" id="equipment_number" class="form-control" style="border-top: none;border-left: none;border-right: none;background-color: white;width:404px !important;display: inline-block;" readonly>
                                &nbsp;<span style="color:red;font-weight:bold;display: inline-block;"><a href="#searchBoxEqmTransfer" data-toggle="modal" data-backdrop="static" id="disabled_button"><img src="<?php echo base_url(); ?>icon/search1.png" id="search_eqm_transfer" style="width:30px;height: 30px;cursor: pointer"></a></span>
                                <input type="hidden" name="equipment_id" id="equipment_id">
                            </div>
                            <span id = "error" style="color:red;">*กรุณาเลือกครุภัณฑ์</span>
                        </td>
                        <td width = "15%" style="text-align: right !important;">โอนไปกลุ่มงาน : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                        <td width = "35%">
                            <select name="workgroup" id="workgroup" class="form-control">
                                <option value="">--เลือกกลุ่มงาน--</option>
                                <?php
                                    foreach($workgroup as $row){
                                        echo "<option value=\"$row->be_under_id\">$row->be_under_name</option>";
                                    }
                                ?>
                            </select>
                            <span id = "error1" style="color:red;">*กรุณาเลือกกลุ่มงาน</span>
                        </td>

                    </tr>
                    <tr>
                        <td style="text-align: right !important;">ชื่อครุภัณฑ์ : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                        <td><input type="text" name="equipment_name" id="equipment_name" class="form-control" style="border-top: none;border-left: none;border-right: none;background-color: white;" readonly></td>
                        <td style="text-align: right !important;">ผู้รับโอน : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                        <td>
                            <select name="transferee_user" id="transferee_user" class="form-control">
                                <option value="">--เลือกผู้รับโอน--</option>
                                
                            </select>
                            <span id = "error2" style="color:red;">*กรุณาเลือกผู้รับโอน</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right !important;">เลขที่ใบโอน : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                        <td>
                            <input type="text" name="transfer_number" id="transfer_number" class="form-control">
                            <span id = "error3" style="color:red;">*กรุณากรอกเลขที่ใบโอน</span>
                        </td>
                        <td style="text-align: right !important;">หมายเหตุ : </td>
                        <td><input type="text" name="comment" id="comment" class="form-control"></td>
                    </tr>
                     <tr>
                        <td style="text-align: right !important;">วันที่โอน : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                        <td>
                            <input type="text" name="transfer_date" id="transfer_date" class="form-control">
                            <span id = "error4" style="color:red;">*กรุณากรอกวันที่โอน</span>
                        </td>
                        <td style="text-align: right !important;">เอกสารแนบ</td>
                        <td>
                            <input type="file" name="file_attach_transfer" id="file_attach_transfer" class="form-control">
                            ** .jpg | .jpeg | .png | .gif | .pdf | .doc | .docx | .xml | .xlsx | .xls
                        </td>
                    </tr>
                     <tr>
                         <td style="text-align: center !important;" colspan="4">
                             <input type="hidden" name="transfer_id" id="transfer_id">
                             <input type="hidden" name="file_repair_old" id="file_repair_old">
                             <button type="button" class="btn btn-primary" id="btn_save_eqm_transfer">บันทึก</button> &nbsp;
                             <button type="reset" class="btn btn-warning" id="btn_cancel_eqm_transfer">ยกเลิก</button>
                         </td>
                    </tr>

                </tbody>
            </table>
            </form>
        </div>  
    </div>
</div>

<div style = "margin-left:20px;margin-right:20px;">
    <div class="table-responsive" id="show_data_eqm_transfer">
        
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------- -->
<div class="modal fade" id="searchBoxEqmTransfer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2>ค้นหา รายการครุภัณฑ์</h2>
            </div>
            <div class="modal-body">
                <!-- form edit -->
                <form id="form_" enctype="multipart/form-data">
                    <table class="table table-striped" border="0">
                        <tbody>
                            
                            <tr style="text-align: center;">
                                <td colspan="2" style="text-align: center;">
                                    <div style="text-align: center;width:600px;margin: auto">
                                        กรุณาเลือกครุภัณฑ์ที่ต้องการ
                                        <select name="select_eqm_transfer" id="select_eqm_transfer">
                                            
                                            
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="237px">
                                    <div class="col-md-6">
                                        <div class="box box-danger">
                                            <div class="box-header" style="width:200px">
                                                
                                                <h3 class="box-title" style="margin-top: 2px;">รูปภาพครุภัณฑ์</h3>
                                            </div><!-- /.box-header -->
                                            <div class="box-body" id="show_image_eqm">
                                                <img src="<?php echo base_url(); ?>icon/no-img.png" style="width:180px;height: 180px;">
                                            </div><!-- /.box-body -->
                                        </div><!-- /.box -->
                                    </div><!-- /.col -->
                                </td>
                                <td width="530px">
                                    <div class="col-md-14">
                                        <div class="box box-danger">
                                            <div class="box-header">
                                                
                                                <h3 class="box-title" style="margin-top: 2px;">รายละเอียดครุภัณฑ์ที่เลือก</h3>
                                            </div><!-- /.box-header -->
                                            <div class="box-body">
                                                <div class="alert alert-info alert-dismissable">
                                                    <i class="fa fa-info"></i>
                                                    <input type="hidden" name="eqm_number" id="eqm_number">
                                                    <b>หมายเลขครุภัณฑ์</b>&nbsp;&nbsp;<span id="show_eqm_number">คุณยังไม่ได้เลือกครุภัณฑ์</span>
                                                </div>
                                                <div class="alert alert-info alert-dismissable">
                                                    <i class="fa fa-info"></i>
                                                    <input type="hidden" name="eqm_name" id="eqm_name">
                                                    <b>ชื่อครุภัณฑ์</b>&nbsp;&nbsp;<span id="show_eqm_name">คุณยังไม่ได้เลือกครุภัณฑ์</span>
                                                </div>
                                                <div class="alert alert-info alert-dismissable">
                                                    <i class="fa fa-info"></i>
                                                    
                                                    <b>สถานะครุภัณฑ์</b>&nbsp;&nbsp;
                                                    <span id="show_eqm_status">คุณยังไม่ได้เลือกครุภัณฑ์</span>
                                                </div>
                                            </div><!-- /.box-body -->
                                        </div><!-- /.box -->
                                    </div><!-- /.col -->
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div style="text-align: right;">
                                        <a data-dismiss="modal" class="btn btn-danger" id = "clearDataSelectEqm">ยกเลิก</a> &nbsp;
                                        <button type="submit"  class="btn btn-info" id = "btn_select_eqm"><< เลือก</button> 
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <!-- -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    $(document).ready(function(){
        $("#error,#error1,#error2,#error3,#error4").hide();
        show_list_eqm_transfer();
        
        $('#select_eqm_transfer').change(function(){
            var eqm_id = $(this).val();
            if(eqm_id != '0'){
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>index.php/eqm/eqm_distribution/getDataEquipmentSelect",
                    data:{ eqm_id:eqm_id },
                    dataType: 'json',
                    success:function(result){
                        var obj = result;
                        $('#show_image_eqm').html("");
                        if(obj['image_eqm']){
                            $('#show_image_eqm').append('<img src="<?php echo base_url(); ?>upload/eqm_image/'+ obj['image_eqm'] +'" style="width:180px;height: 180px;">');
                        }else{
                            $('#show_image_eqm').append('<img src="<?php echo base_url(); ?>icon/no-img.png" style="width:180px;height: 180px;">');
                        }
                        $('#show_eqm_number').html(obj['barcode']);
                        $('#show_eqm_name').html(obj['eqm_names']);
                        $('#eqm_number').val(obj['barcode']);
                        $('#eqm_name').val(obj['eqm_names']);
                        if(obj['eqm_status'] == "ready" || obj['eqm_status'] == "transfer"){
                            var html = '<img src="<?php echo base_url(); ?>icon/status.png">'+' ใช้งานได้';
                            $('#show_eqm_status').html(html);
                        }else if(obj['eqm_status'] == "waste"){
                            var html = '<img src="<?php echo base_url(); ?>icon/status.png">'+' ใช้ไม่งานได้';
                            $('#show_eqm_status').html(html);
                        }
                        //$('#workgroupEdit').val(obj['working_group_id']);
                    }
                }); 
            }else{
                $('#show_image_eqm').html("");
                $('#show_image_eqm').append('<img src="<?php echo base_url(); ?>icon/no-img.png" style="width:180px;height: 180px;">');
                $('#show_eqm_number').html('คุณยังไม่ได้เลือกครุภัณฑ์');
                $('#show_eqm_name').html('คุณยังไม่ได้เลือกครุภัณฑ์');
                $('#eqm_number').val('');
                $('#eqm_name').val('');
            }
        });
        
        $('#btn_select_eqm').click(function(e){
            e.preventDefault();
            if($('#select_eqm_transfer').val() == "0"){
                alert('คุณยังไม่ได้เลือกครุภัณฑ์');
                //$('#equipment_number').val('');
                //$('#equipment_id').val('');
                //$('#equipment_name').val('');
                
                $('#show_image_eqm').html("");
                $('#show_image_eqm').append('<img src="<?php echo base_url(); ?>icon/no-img.png" style="width:180px;height: 180px;">');
                $('#show_eqm_number').html('คุณยังไม่ได้เลือกครุภัณฑ์');
                $('#show_eqm_name').html('คุณยังไม่ได้เลือกครุภัณฑ์');
                $('#eqm_number').val('');
                $('#eqm_name').val('');
                $('#select_eqm_transfer').select2('val','0');
            }else{
                $('#equipment_number').val($('#eqm_number').val());
                $('#equipment_id').val($('#select_eqm_transfer').val());
                $('#equipment_name').val($('#eqm_name').val());
                $("#searchBoxEqmTransfer").modal('hide');
            }
            
            //$('#clearDataSelectEqm').click();
        });
        
        $('#search_eqm_transfer').click(function(){
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>index.php/eqm/eqm_distribution/getDataEquipment",
                
                dataType: 'html',
                success:function(result){
                    $('#select_eqm_transfer').html('');
                    
                    
                    $('#select_eqm_transfer').append("<option value='0' selected='selected'>กรุณาเลือกครุภัณฑ์ที่ต้องการ</option>");
                    $('#select_eqm_transfer').append(result);
                    $('#select_eqm_transfer').select2('val','0');
                }
            }); 
        });
        
        $('#clearDataSelectEqm').click(function(){
            $('#select_eqm_transfer').select2('val','0');
            
            $('#show_image_eqm').html("");
            $('#show_image_eqm').append('<img src="<?php echo base_url(); ?>icon/no-img.png" style="width:180px;height: 180px;">');
            $('#show_eqm_number').html('คุณยังไม่ได้เลือกครุภัณฑ์');
            $('#show_eqm_name').html('คุณยังไม่ได้เลือกครุภัณฑ์');
            $('#eqm_number').val('');
            $('#eqm_name').val('');
        });
        
        $('#btn_save_eqm_transfer').click(function(){
            if(check_form_data_eqm_transfer()){
                $('#save_form_eqm_transfer').submit();
            }
        });
        
        $('#save_form_eqm_transfer').submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/eqm/eqm_transfer/saveData_eqm_transfer",
                type: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData:false,

                success: function(data)
                {
                    alert(data);
                    $('#btn_cancel_eqm_transfer').click();
                    show_list_eqm_transfer();
                    
                }
            });
        });
        
        $('#btn_cancel_eqm_transfer').click(function(){
            $("#error,#error1,#error2,#error3,#error4").hide();
            $( ".clickable" ).show();
            $("#disabled_button").show();
            $('#btn_save_eqm_transfer').html('บันทึก');
            
            $( ".clickable" ).click();
        });
        
        $('#workgroup').change(function(){
            var workgroup_id = $(this).val();
            if(workgroup_id){
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>index.php/eqm/eqm_transfer/getDataUserAccountWithWorkGroup",
                    data:{ workgroup_id:workgroup_id },
                    dataType: 'html',
                    success:function(result){
                        $("#transferee_user").html(result);
                    }
                }); 
            }else{
                $("#transferee_user").html("<option value=''>--เลือกผู้รับโอน--</option>");
            }
        });
    });
    
    function show_list_eqm_transfer(){
        $("#show_data_eqm_transfer").load("<?php echo base_url(); ?>index.php/eqm/eqm_transfer/getShowDataEqmTransfer");
    }
    
    function check_form_data_eqm_transfer(){
        var check_true = true;
        if($('#equipment_number').val() == "" || $('#equipment_name').val() == ""){
            $("#error").css('color','red').show();
            check_true = false;
        }
        if($("#workgroup").val() == ""){
            $("#error1").css('color','red').show();
            check_true = false;
        }
        if($("#transferee_user").val() == ""){
            $("#error2").css('color','red').show();
            check_true = false;
        }
        if($("#transfer_number").val() == ""){
            $("#error3").css('color','red').show();
            check_true = false;
        }
        if($("#transfer_date").val() == ""){
            $("#error4").css('color','red').show();
            check_true = false;
        }

        //--------------------------------------------------------
        if($('#equipment_number').val() != "" && $('#equipment_name').val() != ""){
            $("#error").hide();
            //check_true = false;
        }
        if($("#workgroup").val() != ""){
            $("#error1").hide();
            //check_true = false;
        }
        if($("#transferee_user").val() != ""){
            $("#error2").hide();
            //check_true = false;
        }
        if($("#transfer_number").val() != ""){
            $("#error3").hide();
            //check_true = false;
        }
        if($("#transfer_date").val() != ""){
            $("#error4").hide();
            //check_true = false;
        }
        return check_true;
    }
        
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
        width:60% !important ; 
    }     
</style>
<?php $this->load->view('include/eqm/footer'); ?>

