<?php
    $this->load->view('include/eqm/header');
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
           คุณอยู่ที่ >> บันทึกข้อมูลทะเบียน >> ทะเบียนแจ้งซ้อม</h3>
        <span class="pull-right clickable panel-collapsed" id="clickable"><i class="glyphicon glyphicon-plus"></i></span>
    </div>
    <div class="panel-body">
        <form id="save_form_eqm_repair_step1" enctype="multipart/form-data">
        <div class="row setup-content" id="step-1">
               <div class="col-xs-12">
                   <div class="col-md-12 well text-center">
                        <div class="table-responsive">
                            <table class="table table-striped" border="0">
                                <tbody>
                                    <tr>
                                        <td width = "15%" style="text-align: right !important;">หมายเลขครุภัณฑ์ : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        <td width = "35%">
                                            <div style="display: inline-block;">
                                                <input type="text" name="equipment_number" id="equipment_number" class="form-control" style="border-top: none;border-left: none;border-right: none;background-color: white;width:390px !important;display: inline-block;" value="<?php echo $eqm_barcode_page; ?>" readonly>
                                                &nbsp;<span style="color:red;font-weight:bold;display: inline-block;"><a href="#searchBoxEqmRepair" data-toggle="modal" data-backdrop="static" id="disabled_button"><img src="<?php echo base_url(); ?>icon/search1.png" id="search_eqm_repair" style="width:30px;height: 30px;cursor: pointer"></a></span>
                                                <input type="hidden" name="equipment_id" id="equipment_id" value="<?php echo $eqm_id_page; ?>">
                                            </div>
                                            <span id = "error1" style="color:red;">*กรุณาเลือกครุภัณฑ์</span>
                                        </td>
                                        <td style="text-align: right !important;">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        
                                    </tr>
                                    <tr>
                                        <td style="text-align: right !important;">ชื่อครุภัณฑ์ : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        <td>
                                            <input type="text" name="equipment_name" id="equipment_name" value="<?php echo $eqm_name_page; ?>" class="form-control" style="border-top: none;border-left: none;border-right: none;background-color: white;" readonly>
                                        </td>
                                        <td width = "15%" style="text-align: right !important;" rowspan="2">อาการที่แจ้งซ่อม : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        <td width = "35%" rowspan="2">
                                            <textarea name="symptoms_repair" id="symptoms_repair" class="form-control" rows="5"></textarea>
                                            <span id = "error2" style="color:red;">*กรุณากรอกอาการที่แจ้งซ่อม</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right !important;">เลขที่ใบแจ้งซ่อม : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        <td>
                                            <input type="text" name="repair_number" id="repair_number" class="form-control">
                                            <span id = "error3" style="color:red;">*กรุณากรอกเลขที่ใบแจ้งซ่อม</span>
                                        </td>
                                        
                                    </tr>
                                     <tr>
                                        <td style="text-align: right !important;">วันที่แจ้งซ่อม : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        <td>
                                            <input type="text" name="repair_date_notify" id="repair_date_notify" class="form-control">
                                            <span id = "error4" style="color:red;">*กรุณากรอกวันที่แจ้งซ่อม</span>
                                        </td>
                                       
                                    </tr>
                                     <tr>
                                        <td style="text-align: right !important;">ผู้ที่แจ้งซ่อม : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        <td>
                                            <input type="text" name="repairing_user_notify" id="repairing_user_notify" value="<?php echo $this->full_name; ?>" class="form-control" style="border-top: none;border-left: none;border-right: none;background-color: white;" readonly>
                                            <input type="hidden" name="repairing_user_notify_id" id="repairing_user_notify_id" value="<?php echo $this->account_id; ?>">
                                            <span id = "error5" style="color:red;">*กรุณากรอกผู้ที่แจ้งซ่อม</span>
                                        </td>
                                        <td style="text-align: right !important;">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    </tr>
                                     
                                </tbody>
                            </table>
                        </div>
                       <!--<button id="activate-step-2" class="btn btn-primary btn-lg">ขั้นตอนต่อไป</button> -->
                   </div>
               </div>
        </div>
        <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12 well text-center">
                    <div class="table-responsive">
                            <table class="table table-striped" border="0">
                                <tbody>
                                    <tr>
                                        <td width = "15%" style="text-align: right !important;">บริษัทที่ส่งซ่อม : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        <td width = "35%">
                                            <select name="repair_company_id" id="repair_company_id" class="form-control">
                                                <option value="-">เลือกบริษัทที่รับซ่อม</option>
                                                <?php 
                                                    foreach($data_company as $row){
                                                        echo "<option value=\"$row->id\">$row->company_number -- $row->company_name</option>";
                                                    }
                                                ?>
                                            </select>
                                            <span id = "error6" style="color:red;">*กรุณากรอกบริษัทที่ส่งซ่อม</span>
                                        </td>
                                        <td width = "15%" style="text-align: right !important;" rowspan="3">หมายเหตุ</td>
                                        <td width = "35%" rowspan="3">
                                            <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td style="text-align: right !important;">ซ่อมครั้งที่ : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        <td>
                                            <div style="display: inline-block;">
                                                <input type="text" name="repair_No" id="repair_No" class="form-control" style="border-top: none;border-left: none;border-right: none;background-color: white;width:390px !important;display: inline-block;" readonly>
                                                &nbsp;<span style="color:red;font-weight:bold;display: inline-block;"><img src="<?php echo base_url(); ?>icon/repair1.png" id="check_eqm_repair_no" style="width:30px;height: 30px;cursor: pointer"></span>
                                               
                                            </div>
                                            <span id = "error7" style="color:red;">*กรุณากรอกซ่อมครั้งที่</span>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td style="text-align: right !important;">วันที่ส่งซ่อม : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        <td>
                                            <input type="text" name="repair_date_send" id="repair_date_send" class="form-control">
                                            <span id = "error8" style="color:red;">*กรุณากรอกวันที่ส่งซ่อม</span>
                                        </td>
                                        
                                    </tr>
                                     <tr>
                                        <td style="text-align: right !important;">การนำส่งซ่อม : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                        <td>
                                            <input type="text" name="repair_send_method" id="repair_send_method" class="form-control">
                                            <span id = "error9" style="color:red;">*กรุณากรอกการนำส่งซ่อม</span>
                                        </td>
                                        <td style="text-align: right !important;">เอกสารแนบ</td>
                                        <td>
                                            <input type="file" name="file_attach_repair" id="file_attach_repair" class="form-control">
                                            ** .jpg | .jpeg | .png | .gif | .pdf | .doc | .docx | .xml | .xlsx | .xls
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center !important;" colspan="4">
                                            <input type="hidden" name="repair_id" id="repair_id">
                                            <input type="hidden" name="image_old_repair" id="image_old_repair">
                                            <button type="button" id="btn_save_eqm_repair" class="btn btn-primary">ส่งซ่อม</button> &nbsp;
                                            <button type="reset" id="btn_cancel_eqm_repair" class="btn btn-warning">ยกเลิก</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                       <!--<button id="activate-step-3" class="btn btn-primary btn-lg">ขั้นตอนต่อไป</button> -->
                </div>
            </div>
        </div>
        </form>
        <form id="save_form_eqm_repair_step2" enctype="multipart/form-data">
        <div class="row setup-content" id="step-3">
            <div class="col-xs-12">
                <div class="col-md-12 well text-center">
                    <div class="table-responsive">
                        <table class="table table-striped" border="0">
                            <tbody>
                                <tr>
                                    <td width = "15%" style="text-align: right !important;">บริษัทที่ส่งซ่อม</td>
                                    <td width = "35%">
                                        
                                        <select name="show_repair_company" id="show_repair_company" class="form-control" style="border-top: none;border-left: none;border-right: none;background-color: white;" disabled>
                                            <option value="">เลือกบริษัทที่รับซ่อม</option>
                                            <?php 
                                                foreach($data_company as $row){
                                                    echo "<option value=\"$row->id\">$row->company_number -- $row->company_name</option>";
                                                }
                                            ?>
                                        </select>
                                        <span id = "error22" style="color:red;">*กรุณาเลือกบริษัทที่รับซ่อม</span>
                                    </td>
                                    <td width = "15%" style="text-align: right !important;" rowspan="2">อาการแจ้งซ่อม</td>
                                    <td width = "35%" rowspan="2">
                                        <textarea name="show_symptoms_repair" id="show_symptoms_repair" class="form-control" rows="5" style="border-top: none;border-left: none;border-right: none;background-color: white;" readonly></textarea>
                                        <span id = "error33" style="color:red;">*กรุณากรอกอาการแจ้งซ่อม</span>
                                    </td>

                                </tr>
                                <tr>
                                    <td style="text-align: right !important;">ซ่อมครั้งที่</td>
                                    <td>
                                        <input type="text" name="show_repair_No" id="show_repair_No" class="form-control" style="border-top: none;border-left: none;border-right: none;background-color: white;" readonly>
                                        
                                    </td>

                                </tr>
                                <tr>
                                    <td style="text-align: right !important;">วันที่รับซ่อมคืน : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                    <td>
                                        <input type="text" name="repair_date_receive" id="repair_date_receive" class="form-control">
                                        <span id = "error10" style="color:red;">*กรุณากรอกวันที่รับซ่อมคืน</span>
                                    </td>
                                    <td style="text-align: right !important;" rowspan="2">การตรวจซ่อม : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                    <td rowspan="2">
                                        <textarea name="repairing_checking" id="repairing_checking" class="form-control" rows="5"></textarea>
                                        <span id = "error11" style="color:red;">*กรุณากรอกการตรวจซ่อม</span>
                                    </td>
                                </tr>
                                 <tr>
                                    <td style="text-align: right !important;">ราคาซ่อม : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                                    <td>
                                        <input type="text" name="price_repair" id="price_repair" class="form-control">
                                        <span id = "error12" style="color:red;">*กรุณากรอกราคาซ่อม</span>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td style="text-align: center !important;" colspan="4">
                                        <input type="hidden" name="show_repair_id" id="show_repair_id">
                                        <input type="hidden" name="show_equipment_id" id="show_equipment_id">
                                        <input type="hidden" name="show_equipment_status" id="show_equipment_status">
                                        <button type="button" id="btn_save_eqm_repair_step2" class="btn btn-primary">ซ่อมเสร็จ</button>
                                        <button type="reset" id="btn_cancel_eqm_repair_finish" class="btn btn-warning">ยกเลิก</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div class="row form-group">
            <div class="col-xs-12">
                <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                    <li class="active" id="step1">
                        <a href="#step-1" id="step1_click">
                            <h4 class="list-group-item-heading">ผู้ใช้งานแจ้งซ่อม</h4>
                        </a>
                    </li>
                    <li class="" id="step2">
                        <a href="#step-2" id="step2_click">
                            <h4 class="list-group-item-heading">ข้อมูลการส่งซ่อม</h4>
                        </a>
                    </li>
                    <?php if(__permission($this->account_id,"repair_finish")){ ?>
                    <li class="" id="step3">
                        <a href="#step-3" id="step3_click">
                            <h4 class="list-group-item-heading">ซ่อมเสร็จ</h4>
                        </a>
                    </li>
                    <?php }else{ ?>
                    <li class="disabled" id="step3">
                        <a href="#step-3" id="step3_click">
                            <h4 class="list-group-item-heading">ซ่อมเสร็จ</h4>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div style = "margin-left:20px;margin-right:20px;">
    <div class="table-responsive" id="show_data_eqm_repair">
        
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------- -->
<div class="modal fade" id="searchBoxEqmRepair" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                        <select name="select_eqm_repair" id="select_eqm_repair">
                                            
                                            
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
                                        <button type="button"  class="btn btn-info" id = "btn_select_eqm"><< เลือก</button> 
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
        $("#error1,#error2,#error3,#error4,#error5,#error6,#error7,#error8,#error9,#error10,#error11,#error12,#error22,#error33").hide();
        
        $('#select_eqm_repair').change(function(){
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
                            var html = '<img src="<?php echo base_url(); ?>icon/status.png">'+' ใช้งานไม่ได้';
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
            if($('#select_eqm_repair').val() == "0"){
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
                $('#select_eqm_repair').select2('val','0');
            }else{
                $('#equipment_number').val($('#eqm_number').val());
                $('#equipment_id').val($('#select_eqm_repair').val());
                $('#equipment_name').val($('#eqm_name').val());
                $("#searchBoxEqmRepair").modal('hide');
            }
            $("#repair_No").val('');
            //$('#clearDataSelectEqm').click();
        });
        
        $('#search_eqm_repair').click(function(){
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>index.php/eqm/eqm_distribution/getDataEquipment",
                
                dataType: 'html',
                success:function(result){
                    $('#select_eqm_repair').html('');
                    
                    
                    $('#select_eqm_repair').append("<option value='0' selected='selected'>กรุณาเลือกครุภัณฑ์ที่ต้องการ</option>");
                    $('#select_eqm_repair').append(result);
                    $('#select_eqm_repair').select2('val','0');
                }
            }); 
        });
        
        $('#clearDataSelectEqm').click(function(){
            $('#select_eqm_repair').html('');
            
            $('#show_image_eqm').html("");
            $('#show_image_eqm').append('<img src="<?php echo base_url(); ?>icon/no-img.png" style="width:180px;height: 180px;">');
            $('#show_eqm_number').html('คุณยังไม่ได้เลือกครุภัณฑ์');
            $('#show_eqm_name').html('คุณยังไม่ได้เลือกครุภัณฑ์');
            $('#eqm_number').val('');
            $('#eqm_name').val('');
            $('#select_eqm_repair').select2('val','0');
        });
        
        $('#btn_cancel_eqm_repair').click(function(){
            $("#error1,#error2,#error3,#error4,#error5,#error6,#error7,#error8,#error9,#error10,#error11,#error12").hide();
            
            $('#equipment_number').val('');
            $('#equipment_name').val('');
            
            $( ".clickable" ).show();
            $("#disabled_button").show();
            $('#check_eqm_repair_no').show();
            $('#btn_save_eqm_repair').html('ส่งซ่อม');
            $('#repair_id').val('');
            
            $('#step3').removeClass("active");
            $('#step2').removeClass("active");
            $('#step1_click').click();
            
            $('#show_repair_id').val('');
            $('#show_repair_company').val('');
            $('#show_repair_No').val('');
            $('#show_symptoms_repair').val('');
            $('#repair_date_receive').val('');
            $('#repairing_checking').val('');
            $('#price_repair').val('');
            //$('#company_distribution').val("");
            $( ".clickable" ).click();
            $('#select_eqm_repair').select2('val','0');
            $("#step1").click();
        });
        $("#btn_cancel_eqm_repair_finish").click(function(){
        
            $('#btn_cancel_eqm_repair').click();
        });
        
        $("#check_eqm_repair_no").click(function(){
            var eqm_id = $('#equipment_id').val();
            if(eqm_id){
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/eqm/eqm_repair/check_eqm_repair_no",
                    type: 'POST',
                    data: {eqm_id:eqm_id},
                    success: function(data)
                    {
                        $('#repair_No').val(data);
                    }
                });
            }else{
                alert('กรุณาเลือกรายการครุภัณฑ์ก่อน');
            }
            
        });
        //--------------------------------------------------------------------------------------------------------------
        $('#btn_save_eqm_repair').click(function(){
            if(check_form_data_eqm_repair_step1()){
                $('#save_form_eqm_repair_step1').submit();
                //$( ".clickable" ).click(); #company_distribution,#select_eqm_distribution
                //alert('lll');
            }
            //alert(check_form_data_eqm_repair_step1());
        });
        $('#save_form_eqm_repair_step1').submit(function(e){
            
            var formData = new FormData(this);
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/eqm/eqm_repair/saveData_eqm_repair_step1",
                type: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData:false,

                success: function(data)
                {
                    alert(data);
                    $('#btn_cancel_eqm_repair').click();
                    $('#btn_cancel_eqm_repair_finish').click();
                    show_list_eqm_repair();
                    $('#select_eqm_repair').select2('val','0');
                }
            });
            e.preventDefault();
        });
        //------------------------------------------------------------------------------------------------------------------
        $('#btn_save_eqm_repair_step2').click(function(){
            if(check_form_data_eqm_repair_step2()){
                $('#save_form_eqm_repair_step2').submit();
                //$( ".clickable" ).click(); #company_distribution,#select_eqm_distribution
                //alert('lll');
            }
            //alert(check_form_data_eqm_repair_step1());
            
        });
        $('#save_form_eqm_repair_step2').submit(function(e){
            
            var formData = new FormData(this);
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/eqm/eqm_repair/saveData_eqm_repair_step2",
                type: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData:false,

                success: function(data)
                {
                    alert(data);
                    $('#btn_cancel_eqm_repair_finish').click();
                    $('#btn_cancel_eqm_repair').click();
                    show_list_eqm_repair();
                    $('#select_eqm_repair').select2('val','0');
                }
            });
            e.preventDefault();
        });
        //------------------------------------------------------------------------------------------------------------------
        show_list_eqm_repair();
    });
    function show_list_eqm_repair(){
        $("#show_data_eqm_repair").load("<?php echo base_url(); ?>index.php/eqm/eqm_repair/getShowDataEqmRepair");
    }
    function check_form_data_eqm_repair_step1(){
        var check_true = true;
        
        if($('#equipment_number').val() == "" || $('#equipment_name').val() == ""){
            $("#error1").css('color','red').show();
            check_true = false;
        }
        if($("#symptoms_repair").val() == ""){
            $("#error2").css('color','red').show();
            check_true = false;
        }
        if($("#repair_number").val() == ""){
            $("#error3").css('color','red').show();
            check_true = false;
        }
        if($("#repair_date_notify").val() == ""){
            $("#error4").css('color','red').show();
            check_true = false;
        }
        if($("#repairing_user_notify").val() == ""){
            $("#error5").css('color','red').show();
            check_true = false;
        }
        if($("#repair_company_id").val() == "-"){
            $("#error6").css('color','red').show();
            check_true = false;
        }
        if($("#repair_No").val() == ""){
            $("#error7").css('color','red').show();
            check_true = false;
        }
        if($("#repair_date_send").val() == ""){
            $("#error8").css('color','red').show();
            check_true = false;
        }
        if($("#repair_send_method").val() == ""){
            $("#error9").css('color','red').show();
            check_true = false;
        }
        //--------------------------------------------------------
        
        if($('#equipment_number').val() != "" && $('#equipment_name').val() != ""){
            $("#error1").hide();
            //check_true = false;
        }
        if($("#symptoms_repair").val() != ""){
            $("#error2").hide();
            //check_true = false;
        }
        if($("#repair_number").val() != ""){
            $("#error3").hide();
            //check_true = false;
        }
        if($("#repair_date_notify").val() != ""){
            $("#error4").hide();
            //check_true = false;
        }
        if($("#repairing_user_notify").val() != ""){
            $("#error5").hide();
            //check_true = false;
        }
        if($("#repair_company_id").val() != "-"){
            $("#error6").hide();
            //check_true = false;
        }
        if($("#repair_No").val() != ""){
            $("#error7").hide();
            //check_true = false;
        }
        if($("#repair_date_send").val() != ""){
            $("#error8").hide();
            //check_true = false;
        }
        if($("#repair_send_method").val() != ""){
            $("#error9").hide();
            //check_true = false;
        }
        return check_true;
    }
    function check_form_data_eqm_repair_step2(){
        var check_true = true;
        
        if($('#equipment_number').val() == "" || $('#equipment_name').val() == "" || $('#equipment_id').val() == ""){
            $("#error1").css('color','red').show();
            check_true = false;
        }
        if($("#show_repair_company").val() == ""){
            $("#error22").css('color','red').show();
            check_true = false;
        }
        if($("#show_symptoms_repair").val() == ""){
            $("#error33").css('color','red').show();
            check_true = false;
        }
        if($("#repair_date_receive").val() == ""){
            $("#error10").css('color','red').show();
            check_true = false;
        }
        if($("#repairing_checking").val() == ""){
            $("#error11").css('color','red').show();
            check_true = false;
        }
        if($("#price_repair").val() == ""){
            $("#error12").css('color','red').show();
            check_true = false;
        }
        
        //--------------------------------------------------------
        
        if($('#equipment_number').val() != "" && $('#equipment_name').val() != ""){
            $("#error1").hide();
            //check_true = false;
        }
        if($("#show_repair_company").val() != ""){
            $("#error22").hide();
            //check_true = false;
        }
        if($("#show_symptoms_repair").val() != ""){
            $("#error33").hide();
            //check_true = false;
        }
        if($("#repair_date_receive").val() != ""){
            $("#error10").hide();
            //check_true = false;
        }
        if($("#repairing_checking").val() != ""){
            $("#error11").hide();
            //check_true = false;
        }
        if($("#price_repair").val() != ""){
            $("#error12").hide();
            //check_true = false;
        }
        return check_true;
    }
</script>
<style type="text/css"> 

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
<?php if(@$open_box == "true"){ ?>
    <script>
        $(document).ready(function(){
            //var test = $( "#clickable" ).attr('class');
            //alert(test);
        });
    </script>
<?php } ?>

<?php $this->load->view('include/eqm/footer'); ?>