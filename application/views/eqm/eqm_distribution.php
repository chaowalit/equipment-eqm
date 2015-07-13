<?php $this->load->view('include/eqm/header'); ?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
           คุณอยู่ที่ >> บันทึกข้อมูลทะเบียน >> ทะเบียนแทงจำหน่าย</h3>
        <span class="pull-right clickable panel-collapsed" id="clickable"><i class="glyphicon glyphicon-plus"></i></span>
    </div>
    <div class="panel-body">    
        <div class="table-responsive">
            <form id="save_form_eqm_distribution" enctype="multipart/form-data">
            <table class="table table-striped" border="0">
                <tbody>
                    <tr>
                        <td width = "15%" style="text-align: right !important;">หมายเลขครุภัณฑ์ : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                        <td width = "35%">
                            <div style="display: inline-block;">
                                <input type="text" name="equipment_number" id="equipment_number" class="form-control" style="border-top: none;border-left: none;border-right: none;background-color: white;width:404px !important;display: inline-block;" readonly>
                                &nbsp;<span style="color:red;font-weight:bold;display: inline-block;"><a href="#searchBoxEqmDistribution" data-toggle="modal" data-backdrop="static" id="disabled_button"><img src="<?php echo base_url(); ?>icon/search1.png" id="search_eqm_distribution" style="width:30px;height: 30px;cursor: pointer"></a></span>
                                <input type="hidden" name="equipment_id" id="equipment_id">
                            </div>
                            <span id = "error1" style="color:red;">*กรุณาเลือกครุภัณฑ์</span>
                        </td>
                        <td width = "15%" style="text-align: right !important;">บริษัทที่รับซื้อ : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                        <td width = "35%">
                            <div>
                                <!--<input type="text" name="company_distribution" id="company_distribution" class="form-control" style="width:404px !important;display: inline-block;" readonly>
                                &nbsp;<span style="color:red;font-weight:bold;display: inline-block;"><a href="#searchBoxEqmDistributionCompany" data-toggle="modal"><img src="<?php echo base_url(); ?>icon/search1.png" id="search_company_eqm_distribution" style="width:30px;height: 30px;cursor: pointer"></a></span>-->
                                <select name="company_distribution" id="company_distribution">
                                    <option value="">เลือกบริษัทที่รับซื้อ</option>
                                    <?php 
                                        foreach($data_company as $row){
                                            echo "<option value=\"$row->id\">$row->company_number -- $row->company_name</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <span id = "error2" style="color:red;">*กรุณาเลือกบริษัทที่รับซื้อ</span>
                        </td>

                    </tr>
                    <tr>
                        <td style="text-align: right !important;">ชื่อครุภัณฑ์ : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                        <td><input class="form-control" name="equipment_name" id="equipment_name" style="border-top: none;border-left: none;border-right: none;background-color: white;" readonly></td>
                        <td style="text-align: right !important;">ราคารับซื้อ(บาท) : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                        <td>
                            <input type="text" name="price" id="price" class="form-control">
                            <span id = "error3" style="color:red;">*กรุณากรอกราคารับซื้อ</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right !important;">เลขที่ใบแทงจำหน่าย  : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                        <td>
                            <input type="text" name="distribution_number" id="distribution_number" class="form-control">
                            <span id = "error4" style="color:red;">*กรุณากรอกเลขที่ใบแทงจำหน่าย</span>
                        </td>
                        <td style="text-align: right !important;">เอกสารแนบ</td>
                        <td>
                            <input type="file" name="file_attach_distribution" id="file_attach_distribution" class="form-control">
                            ** .jpg | .jpeg | .png | .gif | .pdf | .doc | .docx | .xml | .xlsx | .xls
                        </td>
                    </tr>
                     <tr>
                        <td style="text-align: right !important;">วันที่แจงจำหน่าย  : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                        <td>
                            <input type="text" name="distribution_date" id="distribution_date" class="form-control">
                            <span id = "error5" style="color:red;">*กรุณากรอกวันที่แจงจำหน่าย</span>
                        </td>
                        <td style="text-align: right !important;" rowspan="2">หมายเหตุ</td>
                        <td rowspan="2"><textarea name="comment" id="comment" class="form-control" rows="3"></textarea></td>
                    </tr>
                    <tr>
                        <td style="text-align: right !important;">ประเภทการแจงจำหน่าย : <span style="color:red;font-weight:bold;"><big>*</big></span></td>
                        <td>
                            <input type="text" name="type_distribution" id="type_distribution" class="form-control">
                            <span id = "error6" style="color:red;">*กรุณากรอกประเภทการแจงจำหน่าย</span>
                        </td>
                    </tr>
                     <tr>
                         <td style="text-align: center !important;" colspan="4">
                             <input type="hidden" name="distribution_id" id="distribution_id">
                             <input type="hidden" name="image_old_distribution" id="image_old_distribution">
                             <button type="button" class="btn btn-primary" id="btn_save_eqm_distribution">บันทึก</button> &nbsp;
                             <button type="reset" class="btn btn-warning" id="btn_cancel_eqm_distribution">ยกเลิก</button>
                         </td>
                    </tr>

                </tbody>
            </table>
            </form>
        </div>  
    </div>
</div>

<div style = "margin-left:20px;margin-right:20px;">
    <div class="table-responsive" id="show_data_eqm_distribution">
        
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------- -->
<div class="modal fade" id="searchBoxEqmDistribution" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                        <select name="select_eqm_distribution" id="select_eqm_distribution">
                                            
                                            
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
        $("#error1,#error2,#error3,#error4,#error5,#error6").hide();
        show_list_eqm_distribution();
        
        $('#select_eqm_distribution').change(function(){
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
            if($('#select_eqm_distribution').val() == "0"){
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
                $('#select_eqm_distribution').select2('val','0');
            }else{
                $('#equipment_number').val($('#eqm_number').val());
                $('#equipment_id').val($('#select_eqm_distribution').val());
                $('#equipment_name').val($('#eqm_name').val());
                $("#searchBoxEqmDistribution").modal('hide');
            }
            
            //$('#clearDataSelectEqm').click();
        });
        
        $('#btn_save_eqm_distribution').click(function(){
            if(check_form_data_eqm_distribution()){
                $('#save_form_eqm_distribution').submit();
                //$( ".clickable" ).click(); #company_distribution,#select_eqm_distribution
            }
        });
        $('#save_form_eqm_distribution').submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/eqm/eqm_distribution/saveData_eqm_distribution",
                type: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData:false,

                success: function(data)
                {
                    alert(data);
                    $('#btn_cancel_eqm_distribution').click();
                    show_list_eqm_distribution();
                    
                }
            });
        });
        
        $('#search_eqm_distribution').click(function(){
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>index.php/eqm/eqm_distribution/getDataEquipment",
                
                dataType: 'html',
                success:function(result){
                    $('#select_eqm_distribution').html('');
                    
                    
                    $('#select_eqm_distribution').append("<option value='0' selected='selected'>กรุณาเลือกครุภัณฑ์ที่ต้องการ</option>");
                    $('#select_eqm_distribution').append(result);
                    $('#select_eqm_distribution').select2('val','0');
                    
                }
            }); 
        });
        
        $('#clearDataSelectEqm').click(function(){
            $('#select_eqm_distribution').select2('val','0');
            
            $('#show_image_eqm').html("");
            $('#show_image_eqm').append('<img src="<?php echo base_url(); ?>icon/no-img.png" style="width:180px;height: 180px;">');
            $('#show_eqm_number').html('คุณยังไม่ได้เลือกครุภัณฑ์');
            $('#show_eqm_name').html('คุณยังไม่ได้เลือกครุภัณฑ์');
            $('#eqm_number').val('');
            $('#eqm_name').val('');
        });
        
        $('#btn_cancel_eqm_distribution').click(function(){
            $( ".clickable" ).show();
            $("#disabled_button").show();
            $('#distribution_id').val('');
            $('#btn_save_eqm_distribution').html('บันทึก');
            
            $("#error1,#error2,#error3,#error4,#error5,#error6").hide();
            $('#company_distribution').val("");
            $( ".clickable" ).click();
        });
    });
    
    function show_list_eqm_distribution(){
        $("#show_data_eqm_distribution").load("<?php echo base_url(); ?>index.php/eqm/eqm_distribution/getShowDataEqmDistribution");
    }
    
    function check_form_data_eqm_distribution(){
        var check_true = true;
        
        if($('#equipment_number').val() == "" || $('#equipment_name').val() == ""){
            $("#error1").css('color','red').show();
            check_true = false;
        }
        if($("#company_distribution").val() == ""){
            $("#error2").css('color','red').show();
            check_true = false;
        }
        if($("#price").val() == ""){
            $("#error3").css('color','red').show();
            check_true = false;
        }
        if($("#distribution_number").val() == ""){
            $("#error4").css('color','red').show();
            check_true = false;
        }
        if($("#distribution_date").val() == ""){
            $("#error5").css('color','red').show();
            check_true = false;
        }
        if($("#type_distribution").val() == ""){
            $("#error6").css('color','red').show();
            check_true = false;
        }

        //--------------------------------------------------------
        
        if($('#equipment_number').val() != "" && $('#equipment_name').val() != ""){
            $("#error1").hide();
            //check_true = false;
        }
        if($("#company_distribution").val() != ""){
            $("#error2").hide();
            //check_true = false;
        }
        if($("#price").val() != ""){
            $("#error3").hide();
            //check_true = false;
        }
        if($("#distribution_number").val() != ""){
            $("#error4").hide();
            //check_true = false;
        }
        if($("#distribution_date").val() != ""){
            $("#error5").hide();
            //check_true = false;
        }
        if($("#type_distribution").val() != ""){
            $("#error6").hide();
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
<?php $this->load->view('include/eqm/footer'); ?>

