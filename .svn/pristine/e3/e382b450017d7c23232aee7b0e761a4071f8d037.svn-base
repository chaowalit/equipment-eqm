<?php $this->load->view('include/mtr/header'); ?>
<div class="panel panel-primary">
    <div class="panel-heading">
         <h3 class="panel-title">
                            คุณอยู่ที่ >> บันทึกข้อมูลทะเบียน >> บันทึกการจัดซื้อวัสดุ</h3>
        <span class="pull-right clickable panel-collapsed" id="clickable"><i class="glyphicon glyphicon-plus"></i></span>
    </div>
    <div class="panel-body">
        <form id="form_created_purchasing" enctype="multipart/form-data">
        <table class="table table-striped">
            <tr>
                <td>
                    <div class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">วันที่รับวัสดุ : <span style="color:red;font-weight:bold;"><big>*</big></span></label>
                            <div class="col-sm-10">
                              <input type="text" name="date_of_recieve_mtr" class="form-control" id="date_of_recieve_mtr" placeholder="คลิกเพื่อเลือกวันที่">
                              <span id = "date_of_recieve_mtr_error" style="color:red;">*กรุณาเลือกวันที่รับวัสดุ</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">เลขที่ใบสั่งซื้อ : <span style="color:red;font-weight:bold;"><big>*</big></span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="purchasing_number" id="purchasing_number" placeholder="กรุณากรอกข้อมูล">
                              <span id = "purchasing_number_error" style="color:red;">*กรุณากรอกเลขที่ใบสั่งซื้อ</span>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">วันที่สั่งซื้อ : <span style="color:red;font-weight:bold;"><big>*</big></span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="date_of_purchasing" id="date_of_purchasing" placeholder="คลิกเพื่อเลือกวันที่">
                              <span id = "date_of_purchasing_error" style="color:red;">*กรุณาเลือกวันที่สั่งซื้อ</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">เลขที่ใบส่งของ : <span style="color:red;font-weight:bold;"><big>*</big></span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="invoice_number" id="invoice_number" placeholder="กรุณากรอกข้อมูล">
                                <span id = "invoice_number_error" style="color:red;">*กรุณากรอกเลขที่ใบส่งของ</span>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">บริษัท/หจก. : <span style="color:red;font-weight:bold;"><big>*</big></span></label>
                            <div class="col-sm-10">
                              
                              <select class="form-control" name="company_purchasing" id="company_purchasing">
                                  <option value="">กรุณาเลือกบริษัท/หจก.</option>
                                  <?php foreach($company as $row){ ?>
                                  <option value="<?php echo $row->id; ?>"><?php echo $row->company_name; ?></option>
                                  <?php } ?>
                              </select>
                              <span id = "company_purchasing_error" style="color:red;">*กรุณาเลือกบริษัท/หจก.</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">แนบเอกสาร : </label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control" name="file_attach_purchasing" id="file_attach_purchasing" placeholder="แนบเอกสาร">
                              ** .jpg | .jpeg | .png | .gif | .pdf | .doc | .docx | .xml | .xlsx | .xls
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <center>
                        <input type="hidden" name="update_purchasing_id" id="update_purchasing_id">
                        <button type="submit" class="btn btn-success" id="btn_created_purchasing"><big>สร้างใบสั่งซื้อวัสดุ</big></button>  &nbsp;
                        <button type="reset" class="btn btn-warning" id = "btn_cancel_purchasing_1"><big>ยกเลิกใบสั่งซื้อ</big></button>
                    </center>
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#date_of_recieve_mtr_error,#purchasing_number_error,#date_of_purchasing_error,#invoice_number_error,#company_purchasing_error").hide();
        $("#form_created_purchasing").submit(function(e){
            e.preventDefault();
            if(check_form_created_purchasing()){
                var formData = new FormData(this);
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/mtr/purchasing/CreatePurchasing",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData:false,

                    success: function(data_purchasing_id)
                    {
                        if($("#update_purchasing_id").val() == ""){
                            if(data_purchasing_id != "error"){
                                alert("ระบบได้สร้างใบการสั่งซื้อวัสดุแล้ว ขั้นตอนต่อไปกรุณาเลือกรายการวัสดุ");
                                $("#purchasing_id").val(data_purchasing_id);
                                $("#update_purchasing_id").val(data_purchasing_id);  //เอาไว้ตอนทำการอัพเดตตารางการสั่งซื้อวัสดุ -----------
                                $("#created_invoice").show(500);
                                $("#btn_created_purchasing").hide();
                                $("#btn_cancel_purchasing_1").hide();
                                show_list_order_purchasing($("#purchasing_id").val());

                            }else if(data_purchasing_id == "error"){
                                alert("ไม่สามารถทำการอัพโหลดเอกสารแนบได้ กรุณาตรวจสอบเอกสารแนบ");
                            }else{
                                alert("เกิดข้อผิดพลาด จากการสร้างใบสั่งซื้อ กรุณาลองใหม่อีกครั้ง");
                            }
                        }else{
                            alert("ระบบได้ทำการบันทึกรายการการสั่งซื้อ เสร็จสมบูรณ์แล้ว");
                            location.reload();
                        }
                    }
                });
            }
            
        });
        
        $("#btn_cancel_purchasing_1").click(function(){
            $("#date_of_recieve_mtr_error,#purchasing_number_error,#date_of_purchasing_error,#invoice_number_error,#company_purchasing_error").hide();
            $("#created_invoice").hide();
            $("#purchasing_id").val('');
        });
        $("#created_invoice").hide();
        $(".clickable").hide();
    });
    
    function check_form_created_purchasing(){
        var check = true;
        if($.trim($("#date_of_recieve_mtr").val()) == ""){
            $("#date_of_recieve_mtr_error").show();
            check = false;
        }
        if($.trim($("#purchasing_number").val()) == ""){
            $("#purchasing_number_error").show();
            check = false;
        }
        if($.trim($("#date_of_purchasing").val().trim()) == ""){
            $("#date_of_purchasing_error").show();
            check = false;
        }
        if($.trim($("#invoice_number").val().trim()) == ""){
            $("#invoice_number_error").show();
            check = false;
        }
        if($.trim($("#company_purchasing").val().trim()) == ""){
            $("#company_purchasing_error").show();
            check = false;
        }
        //-----------------------------------------------------
        if($.trim($("#date_of_recieve_mtr").val()) != ""){
            $("#date_of_recieve_mtr_error").hide();
            //check = false;
        }
        if($.trim($("#purchasing_number").val()) != ""){
            $("#purchasing_number_error").hide();
            //check = false;
        }
        if($.trim($("#date_of_purchasing").val().trim()) != ""){
            $("#date_of_purchasing_error").hide();
            //check = false;
        }
        if($.trim($("#invoice_number").val().trim()) != ""){
            $("#invoice_number_error").hide();
            //check = false;
        }
        if($.trim($("#company_purchasing").val().trim()) != ""){
            $("#company_purchasing_error").hide();
            //check = false;
        }
        return check;
        
    }
</script>
<input type="hidden" name="purchasing_id" id="purchasing_id">  <!-- เอาไว้จัดการกับ รายการ invoice -->
<!-- --------------------------------------------------- รายการ PO สินค้าประเภทวัสดุ ---------------------------------------------------------------------------------- -->

<div id="created_invoice" style="width:100% !important;">
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
                                            <label class="col-sm-1 control-label">วัสดุ</label>
                                            <div class="col-sm-11">
                                                <select name="search_select_mtr" id="search_select_mtr">
                                                    <option value="">กรุณาเลือกรายการวัสดุที่จัดซื้อ</option>
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
                                    <td style="width:300px;text-align: center;">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">หน่วยนับ</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="unit_mtr" id="unit_mtr" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width:300px;text-align: center;">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">จำนวน</label>
                                            <div class="col-sm-8">
                                                <input type="number" name="amount_purchasing" id="amount_purchasing" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width:300px;text-align: center;">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">คงเหลือ</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="balance_mtr" id="balance_mtr" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width:350px;text-align: center;">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">ราคา/หน่วย</label>
                                            <div class="col-sm-8">
                                                <input type="number" name="price_per_unit" id="price_per_unit" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width:100px;text-align: left;">
                                        <input type="hidden" name="temp_mtr_id" id="temp_mtr_id">
                                        <input type="hidden" name="temp_mtr_number" id="temp_mtr_number">
                                        <input type="hidden" name="temp_mtr_name" id="temp_mtr_name">
                                        <input type="hidden" name="temp_unit_mtr" id="temp_unit_mtr">
                                        <img id="add_list_invoice" src="icon/save.png" style="display: inline-block;cursor: pointer;width:40px;height:40px;">
                                    </td>
                                </tr>
                            </table> 
                        </center>
                    </td>
                </tr>
                <tr>
                    <td><center><span id="show_error_po" style="color:red;">* กรุณากรอกข้อมูลช่องด้านบนให้ครบ</span></center></td>
                </tr>
            </table>
        </div>
    </div>

    <div style="margin-left:20px;margin-right:20px;" id="show_list_order_purchasing">
        <!-- 
            แสดงรายการที่สั่งซื้อวัสดุ
        
        -->
    </div>
    <br>
    <div class="panel-body">
        <center>
            <button type="button" class="btn btn-info" id="btn_save_purchasing"><big>บันทึกการจัดซื้อวัสดุ</big></button>  &nbsp;
            <button type="button" class="btn btn-warning" id = "btn_cancel_purchasing_2"><big>ยกเลิกใบจัดซื้อวัสดุ</big></button>
        </center>
    </div>
</div>
<!-- --------------------------------------------------- จบ รายการ PO สินค้าประเภทวัสดุ ---------------------------------------------------------------------------------- -->
<script>
    $(document).ready(function () {
        $('.panel-heading span.clickable').click();
        $('.panel div.clickable').click();
        $("#show_error_po").hide();
        
        $("#add_list_invoice").click(function(){
            var purchasing_id = $('#purchasing_id').val();
            var temp_mtr_id = $('#temp_mtr_id').val();
            var temp_mtr_number = $("#temp_mtr_number").val();
            var temp_mtr_name = $("#temp_mtr_name").val();
            var temp_unit_mtr = $('#temp_unit_mtr').val();
            var amount_purchasing = $("#amount_purchasing").val();
            var balance_mtr = $("#balance_mtr").val();
            var price_per_unit = $("#price_per_unit").val();
            
            //alert($("#purchasing_id").val());
            if(check_form_add_list_invoice()){
                
                $.ajax({
                        url: "<?php echo base_url(); ?>index.php/mtr/purchasing/add_item_invoice_of_purchasing",
                        type: 'POST',
                        data: {purchasing_id:purchasing_id,temp_mtr_id:temp_mtr_id,temp_mtr_number:temp_mtr_number,temp_mtr_name:temp_mtr_name,temp_unit_mtr:temp_unit_mtr,
                                amount_purchasing:amount_purchasing,balance_mtr:balance_mtr,price_per_unit:price_per_unit},
                        success: function()
                        {
                            $("#unit_mtr").val('');
                            $("#amount_purchasing").val('');
                            $("#balance_mtr").val('');
                            $("#price_per_unit").val('');
                            $("#temp_mtr_id").val('');
                            $("#temp_mtr_number").val('');
                            $("#temp_mtr_name").val('');
                            $("#temp_unit_mtr").val('');
                            $("#search_select_mtr").select2('val','');
                            show_list_order_purchasing(purchasing_id);
                            $("#show_error_po").hide();
                        }
                    });
            }else{
                $("#show_error_po").show(500);
            }
        });
        
        $("#search_select_mtr").change(function(){
            var id_mtr = $(this).val();
            if(id_mtr != ""){
                $.ajax({
                        url: "<?php echo base_url(); ?>index.php/mtr/purchasing/getData_mtr_of_purchasing",
                        type: 'POST',
                        data: {id_mtr:id_mtr},
                        dataType: 'json',
                        success: function(data)
                        {
                            $("#unit_mtr").val(data[0]['mtr_unit']);
                            $("#balance_mtr").val(data[0]['mtr_balance']);
                            
                            $("#temp_mtr_id").val(data[0]['id']);
                            
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
                            
                            //$("#temp_mtr_number").val(data[0]['mtr_number']);
                            $("#temp_mtr_name").val(data[0]['mtr_name']);
                            $("#temp_unit_mtr").val(data[0]['mtr_unit']);
                        }
                    });
            }else{
               $("#unit_mtr").val('');
               $("#amount_purchasing").val('');
               $("#balance_mtr").val('');
               $("#price_per_unit").val('');
               $("#temp_mtr_id").val('');
               $("#temp_mtr_number").val('');
               $("#temp_mtr_name").val('');
               $("#temp_unit_mtr").val('');
               $("#search_select_mtr").select2('val','');
            }
        });
        
        $("#btn_save_purchasing").click(function(){
            $("#form_created_purchasing").submit();
        });
        
        $("#btn_cancel_purchasing_2").click(function(){
            location.reload();
        });
    });
    
    function check_form_add_list_invoice(){
        var check = true;
        if($.trim($("#search_select_mtr").val()) == ""){
            check = false;
        }
        if($.trim($("#unit_mtr").val()) == ""){
            check = false;
        }
        if($.trim($("#amount_purchasing").val()) == ""){
            check = false;
        }
        if($.trim($("#balance_mtr").val()) == ""){
            check = false;
        }
        if($.trim($("#price_per_unit").val()) == ""){
            check = false;
        }
        return check;
    }
    function show_list_order_purchasing(purchasing_id){
        //alert(purchasing_id);
        $("#show_list_order_purchasing").load("<?php echo base_url(); ?>index.php/mtr/purchasing/show_list_order_purchasing/"+purchasing_id);
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
</script>
<!-- script menu for list order purchasing -->
<script type="text/javascript">
    $(function() {
        $('.menu_mtr_purchasing').live().contextMenu(menu);
    });
    var menu = [{
        name: 'ลบรายการนี้ ออกจากใบสั่งซื้อ',
        img: 'icon/del1.png',
        title: 'ลบรายการนี้ ออกจากใบสั่งซื้อ',
        fun: function () {
           var order_invoice_of_purchasing_id = $("#order_invoice_of_purchasing_id").val();
           if(order_invoice_of_purchasing_id){
               if(confirm("Do you want to delete this item ?")){
                   $.ajax({
                        url: "<?php echo base_url(); ?>index.php/mtr/purchasing/RemoveItemOrderInvoice",
                        type: 'POST',
                        data: {order_invoice_of_purchasing_id:order_invoice_of_purchasing_id},
                        
                        success: function()
                        {
                            show_list_order_purchasing($("#purchasing_id").val());
                        }
                    });
               }
           }
        }
    }];
    $('.menu_mtr_purchasing').live().contextMenu(menu);
</script>
<!-- ------------------------------------ -->
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
    a.clickable { 
        color: inherit; 
    }
    a.clickable:hover { 
        text-decoration:none; 
    }
</style>

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
<?php $this->load->view('include/mtr/footer'); ?>