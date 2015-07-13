<?php $this->load->view('include/mtr/header'); ?>

<div class="panel panel-primary">
    <div class="panel-heading">
         <h3 class="panel-title">
                            คุณอยู่ที่ >> บันทึกข้อมูลทะเบียน >> ทะเบียนวัสดุ</h3>
        <span class="pull-right clickable panel-collapsed" id="clickable"><i class="glyphicon glyphicon-plus"></i></span>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" id="form_register_mtr">
        <table class="table table-striped">   
            <tr>
                <td>
                    <!--ใช้ div แทน form-->
                    <div class="form-horizontal">
                        <div class="form-group">
                              <label class="col-sm-2 control-label">บาร์โค้ด : <span style="color:red;font-weight:bold;"><big>*</big></span></label>
                              <div class="col-sm-10" style="height:25px;width: 100%;margin-top: 10px;" id="gen_barcode">
                                
                              </div>
                        </div>
                        <div class="form-group">
                              <label  class="col-sm-2 control-label">รหัสวัสดุ : <span style="color:red;font-weight:bold;"><big>*</big></span></label>
                              <div class="col-sm-10"  style="display: inline-block;">
                                  <input type="text" class="form-control" name="mtr_number" id="mtr_number" placeholder="กรุณากรอกข้อมูล" style="width:90%;display: inline-block;" readonly> &nbsp; 
                                  <a href="#generate_mtr_number" data-toggle="modal" data-backdrop="static" id="disabled_button"><img id="open_pic" src="icon/open.ico" width="30px" style="display: inline-block;cursor: pointer;"></a>
                                  <input type="hidden" name="mtr_type_info" id="mtr_type_info">
                                  <input type="hidden" name="mtr_model_info" id="mtr_model_info">
                                  <input type="hidden" name="mtr_detail_info" id="mtr_detail_info">
                                  <span id = "mtr_number_error" style="color:red;">*กรุณาเลือกรหัสวัสดุ</span>
                              </div>
                        </div>
                        <div class="form-group">
                              <label  class="col-sm-2 control-label">ชื่อวัสดุ : <span style="color:red;font-weight:bold;"><big>*</big></span></label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="mtr_name" id="mtr_name" placeholder="กรุณากรอกข้อมูล">
                                <span id = "mtr_name_error" style="color:red;">*กรุณากรอกชื่อวัสดุ</span>
                              </div>
                        </div>
                        <div class="form-group">
                              <label  class="col-sm-2 control-label">หน่วยนับ : <span style="color:red;font-weight:bold;"><big>*</big></span></label>
                              <div class="col-sm-10">
                                <select name="mtr_unit" id="mtr_unit" class="form-control">
                                    <option value="">กรุณาเลือกหน่วยนับ</option>
                                    <?php 
                                        foreach($unit_count as $row){
                                            echo "<option value=\"$row->unit_name\">$row->unit_name</option>";
                                        }
                                    ?>
                                </select>
                                <span id = "mtr_unit_error" style="color:red;">*กรุณากรอกหน่วยนับ</span>
                              </div>
                        </div>
                        <div class="form-group">
                              <label  class="col-sm-2 control-label">จำนวนคงเหลือ : <span style="color:red;font-weight:bold;"><big>*</big></span></label>
                              <div class="col-sm-10">
                                  <input type="number" class="form-control" name="mtr_balance" id="mtr_balance" placeholder="กรุณากรอกข้อมูล">
                                <span id = "mtr_balance_error" style="color:red;">*กรุณากรอกจำนวนคงเหลือ</span>
                              </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-horizontal">
                        <div class="form-group">
                              <label class="col-sm-2 control-label">จุดสั่งซื้อวัสดุ(MIN) : <span style="color:red;font-weight:bold;"><big>*</big></span></label>
                              <div class="col-sm-10">
                                <input type="number" class="form-control" name="min_amount" id="min_amount" placeholder="กรุณากรอกข้อมูล">
                                <span id = "min_amount_error" style="color:red;">*กรุณากรอกจุดสั่งซื้อวัสดุ(MIN)</span>
                              </div>
                        </div>
                        <div class="form-group">
                              <label  class="col-sm-2 control-label">สต๊อกวัสดุสูงสุด(MAX) : <span style="color:red;font-weight:bold;"><big>*</big></span></label>
                              <div class="col-sm-10">
                                <input type="number" class="form-control" name="max_amount" id="max_amount" placeholder="กรุณากรอกข้อมูล">
                                <span id = "max_amount_error" style="color:red;">*กรุณากรอกสต๊อกวัสดุสูงสุด(MAX)</span>
                              </div>
                        </div>
                        <div class="form-group">
                              <label  class="col-sm-2 control-label">ที่เก็บวัสดุ : <span style="color:red;font-weight:bold;"><big>*</big></span></label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="mtr_address" id="mtr_address" placeholder="กรุณากรอกข้อมูล">
                                <span id = "mtr_address_error" style="color:red;">*กรุณากรอกที่เก็บวัสดุ</span>
                              </div>
                        </div>
                        <div class="form-group">
                              <label  class="col-sm-2 control-label">รายละเอียดเพิ่มเติม :</label>
                              <div class="col-sm-10">
                                <textarea name="mtr_detail" id="mtr_detail" class="form-control" rows="3"></textarea>
                              </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <input type="hidden" name="materials_id" id="materials_id">
                
                <td colspan="2"><center><button type="submit" class="btn btn-info" id="submit_mtr_register">บันทึก</button> 
                <button type="reset" class="btn btn-info" id = "cancel_mtr_register">ยกเลิก</button></center></td>
            </tr>
        </table>
	</form>			
    </div>
</div>

<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
	
<div style="margin-left:20px;margin-right:20px;" id="show_list_item_mtr">
    
</div>
<!--   Modal   ---------------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="generate_mtr_number" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2>กรุณาเลือกข้อมูลหมวดทะเบียนวัสดุ</h2>
            </div>
            <div class="modal-body">
            <form onsubmit = "return false" id  = "form_generate_mtr_number" >
            <center>
                <div style = "width:100%!important;margin-top:10px!important;">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td width = "20%">กลุ่มประเภท</td>
                                <td><p id = "show_select_num_mtr1" style = "font-weight:900;color:#0000FF;">----</p></td>
                                <td width = "60%px">
                                     <select id="select_num_mtr1">
                                        <option value="----">กรุณาเลือก</option>
                                        <?php foreach($type_group as $row){ ?>
                                        <option value="<?php echo $row->group_type_id; ?>"><?php echo $row->group_type_names; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                             <tr>
                                <td>ชนิด</td>
                                <td><p id = "show_select_num_mtr2" style = "font-weight:900;color:#0000FF;">----</p></td>
                                <td>
                                    <select id="select_num_mtr2">
                                        <option value="----">กรุณาเลือก</option>
                                        
                                    </select>
                                </td>
                            </tr>
                             <tr>
                                <td>ชื่อรายละเอียด</td>
                                <td><p id = "show_select_num_mtr3" style = "font-weight:900;color:#0000FF;">----</p></td>
                                <td>
                                    <select id="select_num_mtr3">
                                        <option value="----">กรุณาเลือก</option>
                                        
                                    </select>
                                    <input type = "text" id = "hidden_mtr_name" style = "display:none;"/>
                                    <input type = "text" id = "get_detail_mtr" style = "display:none;"/>
                                </td>
                            </tr>
                             <tr>
                                <td>หมายเลขรหัสวัสดุ</td>
                                <td colspan = "2"><p id = "total_number_mtr" style = "font-weight:900;color:#0000FF;"></p></td>
                            </tr>
                        </tbody>
                    </table>
                <div style = "padding-bottom:10px!important;">
                     <a href = "index.php/mtr/category_of_materials" class="btn btn-success" id = "btn_go_setting_mtr">ตั้งค่าหมวด</a>
                     <a href = "javascript:void(0);" class="btn btn-info" id = "btn_select_mtr_number">ตกลง</a>
                     <a data-dismiss="modal" class="btn btn-danger" id = "btn_clear_mtr_number">ยกเลิก</a>
                </div>
                    
                </div>
            </center>
            </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    $(document).ready(function(){
        $('#select_num_mtr1').change(function(){
            if($(this).val() != '----'){
                
                 $.ajax({
                        url: "<?php echo base_url(); ?>index.php/mtr/register_mtr/getDataTypeGroup_mtr",
                        type: 'POST',
                        data: {select_num_type_mtr:$(this).val()},
                        dataType: 'json',
                        success: function(data)
                        {
                            if(data.length != 0){
                                $("#show_select_num_mtr1").html(data[0]['group_type_numbers']);
                                $("#show_select_num_mtr2").html('----');
                                $("#show_select_num_mtr3").html('----');
                                
                                $('#select_num_mtr3').html('');
                                $('#select_num_mtr3').append( $("<option></option>").text('กรุณาเลือก').val('----') );
                                $("#select_num_mtr3").select2("val", "----");
                                
                                    $('#select_num_mtr2').html('');
                                    $('#select_num_mtr2').append( $("<option></option>").text('กรุณาเลือก').val('----') );
                                    $("#select_num_mtr2").select2("val", "----");
                                    $.each(data, function() {
                                       $('#select_num_mtr2').append(
                                           $("<option></option>").text(this.type_names).val(this.type_id)
                                       );
                                    });
                                
                            }else{
                                $("#show_select_num_mtr1").html('----');
                                $('#select_num_mtr2').html('');
                                $('#select_num_mtr2').append( $("<option></option>").text('กรุณาเลือก').val('----') );
                                $("#select_num_mtr2").select2("val", "----");
                            }
                            
                            
                        }
                    });
            }else{
                $("#show_select_num_mtr1").html('----');
                
                $('#select_num_mtr2').html('');
                $('#select_num_mtr2').append( $("<option></option>").text('กรุณาเลือก').val('----') );
                $("#select_num_mtr2").select2("val", "----");
            
                $("#show_select_num_mtr2").html('----');
                $('#select_num_mtr3').html('');
                $('#select_num_mtr3').append( $("<option></option>").text('กรุณาเลือก').val('----') );
                $("#select_num_mtr3").select2("val", "----");
                
                $("#show_select_num_mtr3").html('----');
            }
            $("#total_number_mtr").html('');
        });
        $("#select_num_mtr2").change(function(){
            if($(this).val() != '----'){
                
                 $.ajax({
                        url: "<?php echo base_url(); ?>index.php/mtr/register_mtr/getDataModelGroup_mtr",
                        type: 'POST',
                        data: {select_num_model_mtr:$(this).val()},
                        dataType: 'json',
                        success: function(data)
                        {
                            if(data.length != 0){
                                $("#show_select_num_mtr2").html(data[0]['type_numbers']);
                                
                                    $('#select_num_mtr3').html('');
                                    $('#select_num_mtr3').append( $("<option></option>").text('กรุณาเลือก').val('----') );
                                    $("#select_num_mtr3").select2("val", "----");
                                     $.each(data, function() {
                                        $('#select_num_mtr3').append(
                                            $("<option></option>").text(this.detail_name).val(this.detail_number)
                                        );
                                     });
                                
                            }else{
                                $("#show_select_num_mtr2").html('----');
                                $('#select_num_mtr3').html('');
                                $('#select_num_mtr3').append( $("<option></option>").text('กรุณาเลือก').val('----') );
                                $("#select_num_mtr3").select2("val", "----");
                            }
                            
                            
                        }
                    });
            }else{
                //$("#show_select_num_mtr1").html('----');
                //$('#select_num_mtr2').html('');
                //$('#select_num_mtr2').append( $("<option></option>").text('กรุณาเลือก').val('----') );
                //$("#select_num_mtr2").select2("val", "----");
            
                $("#show_select_num_mtr2").html('----');
                $('#select_num_mtr3').html('');
                $('#select_num_mtr3').append( $("<option></option>").text('กรุณาเลือก').val('----') );
                $("#select_num_mtr3").select2("val", "----");
                
                $("#show_select_num_mtr3").html('----');
            }
            $("#total_number_mtr").html('');
        });
        $("#select_num_mtr3").change(function(){
            $("#show_select_num_mtr3").html($(this).val());
            if($(this).val() != '----'){
                
                $("#total_number_mtr").html($("#show_select_num_mtr1").html()+'-'+$("#show_select_num_mtr2").html()+'-'+$("#show_select_num_mtr3").html());
            }else{
                $("#total_number_mtr").html('');
            }
        });
        
        $("#disabled_button").click(function(){
            $("#show_select_num_mtr1").html('----');
            $("#show_select_num_mtr2").html('----');
            $("#show_select_num_mtr3").html('----');
            
            $("#select_num_mtr1").select2('val','----');
            $("#select_num_mtr2").select2('val','----');
            $("#select_num_mtr3").select2('val','----');
            
            $("#show_select_num_mtr1").html('----');
                
            $('#select_num_mtr2').html('');
            $('#select_num_mtr2').append( $("<option></option>").text('กรุณาเลือก').val('----') );
            $("#select_num_mtr2").select2("val", "----");

            $("#show_select_num_mtr2").html('----');
            $('#select_num_mtr3').html('');
            $('#select_num_mtr3').append( $("<option></option>").text('กรุณาเลือก').val('----') );
            $("#select_num_mtr3").select2("val", "----");

            $("#show_select_num_mtr3").html('----');
            
            $("#total_number_mtr").html('');
        });
        $("#btn_select_mtr_number").click(function(){
            if($("#total_number_mtr").html() != ""){
                $("#gen_barcode").html('<img src="<?php echo base_url();?>bc/barcode.php/?text='+$("#total_number_mtr").html()+'"/>');
                $("#generate_mtr_number").modal('hide');
                
                $("#mtr_number").val($("#total_number_mtr").html());
                
                $("#mtr_type_info").val($('#select_num_mtr1').val());
                $("#mtr_model_info").val($('#select_num_mtr2').val());
                $("#mtr_detail_info").val($('#select_num_mtr3').val());
            }else{
                alert('กรุณาเลือกหมายเลขวัสดุ ให้ครบทุกช่อง');
            }
        });
        $("#cancel_mtr_register").click(function(){
            $("#gen_barcode").html('');
        });
        
    });
</script>
<style>
    .modal-header-warning {
        color:#fff;
        padding:9px 15px;
        border-bottom:1px solid #eee;
        background-color: #0099FF;
        -webkit-border-top-left-radius: 5px;
        -webkit-border-top-right-radius: 5px;
        -moz-border-radius-topleft: 5px;
        -moz-border-radius-topright: 5px;
         border-top-left-radius: 5px;
         border-top-right-radius: 5px;
    }
</style>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<script>
    $(document).ready(function () {
        $('.panel-heading span.clickable').click();
        $('.panel div.clickable').click();
        $('#mtr_number_error,#mtr_name_error,#mtr_unit_error,#mtr_balance_error,#min_amount_error,#max_amount_error,#mtr_address_error').hide();
        
        $("#form_register_mtr").submit(function(e){
             e.preventDefault();
             var Form_data = $( this ).serialize();
             if(check_form_register_mtr()){
                  $.ajax({
                        url: "<?php echo base_url(); ?>index.php/mtr/register_mtr/AddRegisterMaterials",
                        type: 'POST',
                        data: Form_data,

                        success: function(data)
                        {
                            alert(data);
                            $('#cancel_mtr_register').click();
                            show_list_mtr_register();

                        }
                    });
             }
        });
        
        $("#cancel_mtr_register").click(function(){
            $("#materials_id").val('');
            $('#mtr_number_error,#mtr_name_error,#mtr_unit_error,#mtr_balance_error,#min_amount_error,#max_amount_error,#mtr_address_error').hide();
            $( ".clickable" ).show();
            $("#disabled_button").show();
            $('#submit_mtr_register').html('บันทึก');
        });
        show_list_mtr_register();
    });
    function show_list_mtr_register(){
        $("#show_list_item_mtr").load("<?php echo base_url(); ?>index.php/mtr/register_mtr/getShowAllDataRegisterMaterials");
    }
    function check_form_register_mtr(){
        var check_form = true;
        if($('#mtr_number').val() == ""){
            $('#mtr_number_error').show();
            check_form = false;
        }
        if($('#mtr_name').val() == ""){
            $('#mtr_name_error').show();
            check_form = false;
        }
        if($('#mtr_unit').val() == ""){
            $('#mtr_unit_error').show();
            check_form = false;
        }
        if($('#mtr_balance').val() == ""){
            $('#mtr_balance_error').show();
            check_form = false;
        }
        if($('#min_amount').val() == ""){
            $('#min_amount_error').show();
            check_form = false;
        }
        if($('#max_amount').val() == ""){
            $('#max_amount_error').show();
            check_form = false;
        }
        if($('#mtr_address').val() == ""){
            $('#mtr_address_error').show();
            check_form = false;
        }
        //---------------------------------------------------------
        if($('#mtr_number').val() != ""){
            $('#mtr_number_error').hide();
            //check_form = false;
        }
        if($('#mtr_name').val() != ""){
            $('#mtr_name_error').hide();
            //check_form = false;
        }
        if($('#mtr_unit').val() != ""){
            $('#mtr_unit_error').hide();
            //check_form = false;
        }
        if($('#mtr_balance').val() != ""){
            $('#mtr_balance_error').hide();
            //check_form = false;
        }
        if($('#min_amount').val() != ""){
            $('#min_amount_error').hide();
            //check_form = false;
        }
        if($('#max_amount').val() != ""){
            $('#max_amount_error').hide();
            //check_form = false;
        }
        if($('#mtr_address').val() != ""){
            $('#mtr_address_error').hide();
            //check_form = false;
        }
        return check_form;
    }
    $(document).on('click', '.panel-heading span.clickable', function (e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }
    });
    $(document).on('click', '.panel div.clickable', function (e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }
    });
    $("#cancel_mtr_register").click(function(){
	$(".clickable").click();
    });

</script>
<style>
    .clickable
    {
        cursor: pointer;
    }

    .clickable .glyphicon
    {
        background: rgba(0, 0, 0, 0.15);
        display: inline-block;
        padding: 6px 12px;
        border-radius: 4px
    }

    .panel-heading span
    {
        margin-top: -23px;
        font-size: 15px;
        margin-right: -9px;
    }
    a.clickable 
    { 
        color: inherit; 
    }
    a.clickable:hover 
    { 
        text-decoration:none; 
    }
</style>
<?php $this->load->view('include/mtr/footer'); ?>