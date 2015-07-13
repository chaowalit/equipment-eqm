<?php $this->load->view('include/mtr/header'); ?>
<div class="panel panel-primary">
    <div class="panel-heading">
         <h3 class="panel-title">
                            คุณอยู่ที่ >> บันทึกข้อมูลทะเบียน >> บันทึกการขอเบิกวัสดุ</h3>
        <span class="pull-right clickable panel-collapsed" id="clickable"><i class="glyphicon glyphicon-plus"></i></span>
    </div>
    <div class="panel-body">
        <form id="form_created_withdrawal">
        <table class="table table-striped" style="border:1px #A4A7A8 dashed;">
            <tr>
                <td style="width:60%;text-align:left;">
                    <!--ใช้ div แทน form-->
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="width:5%!important;text-align:left!important;">ที่ <span style="color:red;font-weight:bold;"><big>*</big></span></label>
                            <div class="">
                                <input type="text" class="form-control" name="withdrawal_number_1" id="withdrawal_number_1" placeholder="" style="display:inline;width:20%;text-align:left!important;">
                                <font style="font-weight:700;">/25</font> 
                                <select name="withdrawal_number_2" id="withdrawal_number_2" class="input-small form-control" style="display:inline!important;width:auto;">
                                    <?php for($i = 57 ; $i < 100 ; $i++){ ?>
                                        <option value="<?php echo "25".$i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select> 
                                <font style="font-weight:700;">&nbsp;&nbsp; วันที่เบิกวัสดุ :  <span style="color:red;font-weight:bold;"><big>*</big></span></font> 
                                <input style="display:inline;width:auto;text-align:left!important;" type="text" name="date_of_withdrawal" class="form-control" id="date_of_withdrawal" placeholder="คลิกเพื่อเลือกวันที่">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="width:7%!important;text-align:left!important;">เรียน <span style="color:red;font-weight:bold;"><big>*</big></span></label>
                            <div class="">
                                <input type="text" class="form-control" name="title_content" id="title_content" placeholder="กรุณากรอกข้อมูล" style="width:88%!important;text-align:left!important;">
                            </div>
                        </div>
                    </div>
                    <div style="font-weight:700;width:100%;display: inline-block;">
                        <span style="display: inline-block;">มีความประสงค์ขอเบิกสิ่งของสำหรับใช้ในราชการ ตามรายการข้างล่างนี้และมอบให้  <span style="color:red;font-weight:bold;"><big>*</big></span></span>  
                        
                        <select name="withdrawal_recieve_person" id="withdrawal_recieve_person" style="margin-top:8px;margin-bottom:8px;width:45%!important;text-align:left!important;display: inline-block;">
                            <option value="">เลือกผู้รับเบิก</option>
                            <?php foreach ($user_account as $row){ ?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->full_name; ?></option>
                            <?php } ?>
                        </select>
                        <span style="display: inline-block;"> เป็นผู้รับเบิก </span>
                    </div>
                </td>
                <td style="width:40%;text-align:left">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="width:11%!important;text-align:left!important;">ผู้เบิก :  <span style="color:red;font-weight:bold;"><big>*</big></span></label>
                            <div class="col-sm-10">
                              
                                <select name="withdrawal_person" id="withdrawal_person" placeholder="" style="text-align:left!important;">
                                    <option value="">เลือกผู้เบิก</option>
                                    <?php foreach ($user_account as $row){ ?>
                                    <option value="<?php echo $row->id; ?>"><?php echo $row->full_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="width:11%!important;text-align:left!important;">ด้วย :  <span style="color:red;font-weight:bold;"><big>*</big></span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="content_detail" id="content_detail" placeholder="กรุณากรอกข้อมูล" style="text-align:left!important;">
                            </div>
                        </div>
                    </div>
                </td>
							
            </tr>   
            <tr>
                <td colspan="2">
                    <center>
                        <input type="hidden" name="updated_withdrawal_materials_id" id="updated_withdrawal_materials_id">
                        <button type="submit" class="btn btn-success" id="btn_created_withdrawal"><big>สร้างใบเบิกวัสดุ</big></button>  &nbsp;
                        <button type="reset" class="btn btn-warning" id = "btn_cancel_withdrawal_1"><big>ยกเลิกใบเบิกวัสดุ</big></button> <br>
                        <span id="error_step1" style="color:red;font-weight:bold;">*กรุณากรอกข้อมูลด้านบนให้ครบถ้วน ถูกต้อง</span>
                    </center>
                </td>
            </tr>
        </table>
	</form>			
    </div>
</div>
<script>
    $(function(){
        $("#error_step1").hide();
        $("#created_withdrawal").hide();
        $("#form_created_withdrawal").submit(function(e){
            e.preventDefault();
            if(check_form_created_withdrawal()){
                var formData = new FormData(this);
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/mtr/withdrawal/CreateWithdrawal",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData:false,

                    success: function(data_withdrawal_id)
                    {
                        if($("#updated_withdrawal_materials_id").val() == ""){
                            if(data_withdrawal_id != "error"){
                                alert("ระบบได้สร้างใบเบิกวัสดุแล้ว ขั้นตอนต่อไปกรุณาเลือกรายการวัสดุ");
                                $("#withdrawal_materials_id").val(data_withdrawal_id);
                                $("#updated_withdrawal_materials_id").val(data_withdrawal_id);  //เอาไว้ตอนทำการอัพเดตตารางการสั่งซื้อวัสดุ -----------
                                $("#created_withdrawal").show(500);
                                $("#btn_created_withdrawal").hide();
                                $("#btn_cancel_withdrawal_1").hide();
                                $("#error_step1").hide();
                                $("#created_withdrawal").show(500);
                                show_list_order_withdrawal(data_withdrawal_id);
                                
                            }else if(data_withdrawal_id == "error"){
                                alert("error");
                            }else{
                                alert("error");
                            }
                        }else{
                            var temp = $("#updated_withdrawal_materials_id").val();
                            alert("ระบบได้ทำการบันทึกใบเบิกวัสดุ เสร็จสมบูรณ์แล้ว");
                            $("#btn_cancel_withdrawal_1").click();
                            window.location="<?php echo base_url(); ?>"+"index.php/mtr/withdrawal/PrintWithdrawal/"+temp;
                            
                            setTimeout(function() {
                                    location.reload();
                            }, 4000); 
                        }
                    }
                });
            }else{
                $("#error_step1").show();
            }
        });
        
        $("#btn_cancel_withdrawal_1").click(function(){
            $("#error_step1").hide();
            $("#updated_withdrawal_materials_id").val('');
            $("#withdrawal_materials_id").val('');
        });
    });
    function check_form_created_withdrawal(){
        var check = true;
        if($.trim($("#withdrawal_number_1").val()) == ""){
            check = false;
        }
        if($.trim($("#date_of_withdrawal").val()) == ""){
            check = false;
        }
        if($.trim($("#title_content").val()) == ""){
            check = false;
        }
        if($.trim($("#withdrawal_recieve_person").val()) == ""){
            check = false;
        }
        if($.trim($("#withdrawal_person").val()) == ""){
            check = false;
        }
        if($.trim($("#content_detail").val()) == ""){
            check = false;
        }
        return check;
    }
</script>
<!-- --------------------------------------------------- รายการ การเบิกวัสดุ สินค้าประเภทวัสดุ ---------------------------------------------------------------------------------- -->
<input type="hidden" name="withdrawal_materials_id" id="withdrawal_materials_id">

<div id="created_withdrawal" style="width:100% !important;">
    <div class="panel panel-primary">
        <div class="">
            
       </div>
        <div class="panel-body">    
            <table class="" border="0">
                <tr>
                    <td>
                        <center>
                            <table class="">
                                <tr>
                                    <td style="width:500px;text-align: center;">
                                       <div class="form-group">
                                            <label class="col-sm-1 control-label" style="padding-left:5px;padding-right:5px;width:100%;">วัสดุ</label>
                                            <div class="col-sm-11" style="padding-left:5px;padding-right:5px;width:100%;">
                                                <select name="search_select_mtr" id="search_select_mtr">
                                                    <option value="">กรุณาเลือกรายการวัสดุที่ต้องการเบิก</option>
                                                    <?php foreach($mtr_list as $row){ ?>
                                                    <?php
                                                        $this->db->select('*');
                                                        $this->db->from('tbl_mtr_type');
                                                        $this->db->where('group_type_id',$row->tbl_mtr_type_id);
                                                        $result = $this->db->get();
                                                        $mtr_type = $result->result_array();
                                                        $temp11 = $mtr_type[0]['group_type_numbers'];

                                                        $this->db->select('*');
                                                        $this->db->from('tbl_mtr_model');
                                                        $this->db->where('type_id',$row->tbl_mtr_model_id);
                                                        $result = $this->db->get();
                                                        $mtr_model = $result->result_array();
                                                        $temp22 = $mtr_model[0]['type_numbers'];

                                                        $this->db->select('*');
                                                        $this->db->from('tbl_mtr_detail');
                                                        $this->db->where('detail_id',$row->tbl_mtr_detail_id);
                                                        $result = $this->db->get();
                                                        $mtr_detail = $result->result_array();
                                                        $temp33 = $mtr_detail[0]['detail_number'];
                                                    ?>
                                                    <option value="<?php echo $row->id; ?>"><?php echo $temp11.'-'.$temp22.'-'.$temp33." -- ".$row->mtr_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width:330px;text-align: center;">
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label" style="padding-left:5px;padding-right:5px;width:100%;">เบิกครั้งสุดท้าย</label>
                                            <div class="col-sm-8" style="padding-left:5px;padding-right:5px;width:100%;">
                                                <input type="text" name="withdrawal_last_date" id="withdrawal_last_date" class="form-control" readonly>
                                                <input type="hidden" name="withdrawal_last_amount" id="withdrawal_last_amount" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width:300px;text-align: center;">
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label" style="padding-left:5px;padding-right:5px;width:100%;">ขณะนี้คงเหลือ</label>
                                            <div class="col-sm-8" style="padding-left:5px;padding-right:5px;width:100%;">
                                                <input type="number" name="balance_current" id="balance_current" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width:300px;text-align: center;">
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label" style="padding-left:5px;padding-right:5px;width:100%;">ขอเบิกครั้งนี้</label>
                                            <div class="col-sm-8" style="padding-left:5px;padding-right:5px;width:100%;">
                                                <input type="number" name="amount_withdrawal" id="amount_withdrawal" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width:350px;text-align: center;">
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label" style="padding-left:5px;padding-right:5px;width:100%;">จำนวนที่จ่ายได้</label>
                                            <div class="col-sm-8" style="padding-left:5px;padding-right:5px;width:100%;">
                                                <input type="number" name="amount_available" id="amount_available" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width:350px;text-align: center;">
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label" style="padding-left:5px;padding-right:5px;width:100%;">หมายเหตุ</label>
                                            <div class="col-sm-8" style="padding-left:5px;padding-right:5px;width:100%;">
                                                <input type="text" name="comment_withdrawal" id="comment_withdrawal" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width:100px;text-align: left;">
                                        <input type="hidden" name="temp_mtr_id" id="temp_mtr_id">
                                        <input type="hidden" name="temp_mtr_number" id="temp_mtr_number">
                                        <input type="hidden" name="temp_mtr_name" id="temp_mtr_name">
                                        
                                        <img id="add_list_withdrawal" src="icon/save.png" style="display: inline-block;cursor: pointer;width:40px;height:40px;margin-top: 20px;margin-left: 8px;">
                                    </td>
                                </tr>
                            </table> 
                        </center>
                    </td>
                </tr>
                <tr>
                    <td><center><span id="show_error_withdrawal" style="color:red;">* กรุณากรอกข้อมูลช่องด้านบนให้ครบ</span></center></td>
                </tr>
            </table>
        </div>
    </div>

    <div style="margin-left:20px;margin-right:20px;" id="show_list_order_withdrawal">
        <!-- 
            แสดงรายการที่สั่งซื้อวัสดุ
        
        -->
    </div>
    <br>
    <div class="panel-body">
        <center>
            <button type="button" class="btn btn-info" id="btn_save_withdrawal"><big>บันทึกใบเบิกวัสดุ</big></button>  &nbsp;
            <button type="button" class="btn btn-warning" id = "btn_cancel_withdrawal_2"><big>ยกเลิกใบเบิกวัสดุ</big></button>
        </center>
    </div>
</div>
<!-- --------------------------------------------------- จบ รายการ การเบิก สินค้าประเภทวัสดุ ---------------------------------------------------------------------------------- -->

<script>
    $(document).ready(function () {
        $("#show_error_withdrawal").hide();
        show_list_order_withdrawal('withdrawal_id');
        
        $("#add_list_withdrawal").click(function(){
            if(check_form_add_list_withdrawal()){
                var withdrawal_materials_id = $("#withdrawal_materials_id").val();
                var materials_id = $("#temp_mtr_id").val();
                var materials_number = $("#temp_mtr_number").val();
                var materials_name = $("#temp_mtr_name").val();
                
                var date_withdrawal_last = $("#withdrawal_last_date").val();
                var amount_withdrawal_last = $("#withdrawal_last_amount").val();
                var balance_current = $("#balance_current").val();
                var amount_withdrawal = $("#amount_withdrawal").val();
                var amount_available_take = $("#amount_available").val();
                var comment_withdrawal = $("#comment_withdrawal").val();
                
                $.ajax({  ////ดึงค่ารายการ ของวัสดุ
                        url: "<?php echo base_url(); ?>index.php/mtr/withdrawal/AddListWithdrawalOrder",
                        type: 'POST',
                        data: {withdrawal_materials_id:withdrawal_materials_id,materials_id:materials_id,materials_number:materials_number,materials_name:materials_name,
                                date_withdrawal_last:date_withdrawal_last,amount_withdrawal_last:amount_withdrawal_last,balance_current:balance_current,amount_withdrawal:amount_withdrawal,
                                amount_available_take:amount_available_take,comment_withdrawal:comment_withdrawal},
                        
                        success: function()
                        { 
                            $("#balance_current").val('');
                            $("#amount_available").val('');
                            $("#withdrawal_last_date").val('');
                            $("#amount_withdrawal").val('');
                            $("#comment_withdrawal").val('');

                            $("#temp_mtr_id").val('');
                            $("#temp_mtr_number").val('');
                            $("#temp_mtr_name").val('');

                            $("#search_select_mtr").select2('val','');
                            show_list_order_withdrawal(withdrawal_materials_id);
                        }
                    });
                $("#show_error_withdrawal").hide();
            }else{
               $("#show_error_withdrawal").show(); 
            }
        });
        
        $("#search_select_mtr").change(function(){
            var id_mtr = $(this).val();
            if(id_mtr != ""){
                $.ajax({  ////ดึงค่ารายการ ของวัสดุ
                        url: "<?php echo base_url(); ?>index.php/mtr/purchasing/getData_mtr_of_purchasing",
                        type: 'POST',
                        data: {id_mtr:id_mtr},
                        dataType: 'json',
                        success: function(data)
                        {
                            $("#balance_current").val(data[0]['mtr_balance']);
                            $("#amount_available").val(data[0]['mtr_balance']);
                            
                            $("#temp_mtr_id").val(data[0]['id']);
                            //$("#temp_mtr_number").val(data[0]['mtr_number']);
                            $("#temp_mtr_name").val(data[0]['mtr_name']);
                           
                            var temp1 = data[0]['tbl_mtr_type_id'];
                            var temp2 = data[0]['tbl_mtr_model_id'];
                            var temp3 = data[0]['tbl_mtr_detail_id'];
                            $.ajax({
                                type:"POST",
                                url:"<?php echo base_url(); ?>index.php/mtr/register_mtr/mtr_number_total",
                                data:{ tbl_mtr_type_id:temp1, tbl_mtr_model_id:temp2, tbl_mtr_detail_id:temp3},
                                dataType: 'html',
                                success:function(result_temp){
                                    $("#temp_mtr_number").val(result_temp);
                                }
                            }); 
                        }
                    });
                
                $.ajax({  //ดึงค่าการเบิกครั้งสุดท้าย ของวัสดุ
                        url: "<?php echo base_url(); ?>index.php/mtr/withdrawal/getData_mtr_last_of_withdrawal",
                        type: 'POST',
                        data: {id_mtr:id_mtr},
                        dataType: 'json',
                        success: function(data)
                        {
                            //alert(data.length);
                            if(data.length != 0){
                                $("#withdrawal_last_date").val("วันที่ "+data[0]['date_withdrawal_last']+" "+" จำนวน = "+data[0]['amount_withdrawal_last']);
                                $("#withdrawal_last_amount").val(data[0]['amount_withdrawal_last']);
                            }else{
                                $("#withdrawal_last_date").val("<?php echo date("Y-m-d"); ?>");
                                $("#withdrawal_last_amount").val('0');
                            }
                            
                        }
                    });
            }else{
               $("#balance_current").val('');
               $("#amount_available").val('');
               $("#withdrawal_last_date").val('');
               $("#amount_withdrawal").val('');
               $("#comment_withdrawal").val('');
               
               $("#temp_mtr_id").val('');
               $("#temp_mtr_number").val('');
               $("#temp_mtr_name").val('');
               
               $("#search_select_mtr").select2('val','');
            }
        });
        
        $("#btn_save_withdrawal").click(function(){
            $("#form_created_withdrawal").submit();
        });
        $("#btn_cancel_withdrawal_2").click(function(){
            location.reload();
        });
    });
    
    function check_form_add_list_withdrawal(){
        var check = true;
        if($.trim($("#search_select_mtr").val()) == "" || $.trim($("#temp_mtr_id").val()) == ""){
            check = false;
        }
        if($.trim($("#balance_current").val()) == ""){
            check = false;
        }
        if($.trim($("#amount_available").val()) == ""){
            check = false;
        }
        if($.trim($("#comment_withdrawal").val()) == ""){
            check = false;
        }
        if($.trim($("#amount_withdrawal").val()) == ""){
            check = false;
        }
        if($.trim($("#withdrawal_materials_id").val()) == ""){
            check = false;
        }
        return check;
    }
    function show_list_order_withdrawal(withdrawal_id){
        //alert(purchasing_id);
        $("#show_list_order_withdrawal").load("<?php echo base_url(); ?>index.php/mtr/withdrawal/show_list_order_withdrawal/"+withdrawal_id);
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
$(document).ready(function () {
    $('.panel-heading span.clickable').click();
    $('.panel div.clickable').click();
});

</script>
<!-- script menu for list order withdrawal -->
<script type="text/javascript">
    $(function() {
        $('.menu_mtr_withdrawal').live().contextMenu(menu);
    });
    var menu = [{
        name: 'ลบรายการนี้ ออกจากใบเบิกวัสดุ',
        img: 'icon/del1.png',
        title: 'ลบรายการนี้ ออกจากใบเบิกวัสดุ',
        fun: function () {
           var order_of_withdrawal_id = $("#order_of_withdrawal_id").val();
           if(order_of_withdrawal_id){
               if(confirm("Do you want to delete this item ?")){
                   $.ajax({
                        url: "<?php echo base_url(); ?>index.php/mtr/withdrawal/RemoveItemOrderWithdrawal",
                        type: 'POST',
                        data: {order_of_withdrawal_id:order_of_withdrawal_id},
                        
                        success: function()
                        {
                            show_list_order_withdrawal($("#withdrawal_materials_id").val());
                        }
                    });
               }
           }
        }
    }];
    $('.menu_mtr_withdrawal').live().contextMenu(menu);
</script>
<!-- ------------------------------------ -->
<style>
    .highlighted {
          color: #261F1D !important;
          background-color:#98FBF9 !important;
         }
     .iw-mSelected {
      background-color: #C9FBFC;
      color: #3E3F3F;
     }
     
</style>
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
    a.clickable { color: inherit; }
    a.clickable:hover { text-decoration:none; }
</style>
<?php $this->load->view('include/mtr/footer'); ?>