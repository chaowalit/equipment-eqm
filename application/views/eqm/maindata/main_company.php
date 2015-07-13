<?php
    $this->load->view('include/eqm/header');
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
           คุณอยู่ที่ >> บันทึกข้อมูลบื้องต้น >> บริษัท/หจก.</h3>
        <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
    </div>
    <div class="panel-body">    
        <div class="table-responsive">
            <form id="form_save_company" enctype="multipart/form-data">
            <table class="table table-striped" border="0">
                <tbody>
                    <tr>
                        <td width = "15%" style="text-align: right !important;">รหัสบริษัท/หจก.</td>
                        <td width = "35%">
                            <input type="text" name="company_number" id="company_number" class="form-control">
                            <span id="error1" style="color:red;">* กรุณากรอกรหัสบริษัท/หจก.</span>
                        </td>
                        <td width = "15%" style="text-align: right !important;">เบอร์โทร</td>
                        <td width = "35%">
                            <input type="text" name="telephone" id="telephone" class="form-control">
                            <span id="error2" style="color:red;">* กรุณากรอกเบอร์โทร</span>
                        </td>

                    </tr>
                    <tr>
                        <td style="text-align: right !important;">ชื่อของบริษัท</td>
                        <td>
                            <input type="text" name="company_name" id="company_name" class="form-control">
                            <span id="error3" style="color:red;">* กรุณากรอกชื่อของบริษัท</span>
                        </td>
                        <td style="text-align: right !important;">เบอร์แฟกซ์</td>
                        <td>
                            <input type="text" name="fax_tel" id="fax_tel" class="form-control">
                            <span id="error4" style="color:red;">* กรุณากรอกเบอร์แฟกซ์</span>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" style="text-align: right !important;">ที่อยู่</td>
                        <td rowspan="2">
                            <textarea name="address_company" id="address_company" class="form-control" rows="4"></textarea>
                            <span id="error5" style="color:red;">* กรุณากรอกที่อยู่</span>
                        </td>
                        <td style="text-align: right !important;">ผู้ติดต่อ</td>
                        <td>
                            <input type="text" name="contact_person" id="contact_person" class="form-control">
                            <span id="error6" style="color:red;">* กรุณากรอกผุ้ติดต่อ</span>
                        </td>
                    </tr>
                     <tr>
                       
                        <td rowspan="4" style="text-align: right !important;">เอกสารแนบ</td>
                        <td rowspan="4">
                            <input type="file" name="file_attach" class="form-control">
                            <span>** .jpg | .jpeg | .png | .gif | .pdf | .doc | .docx | .xml | .xlsx | .xls</span>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="text-align: right !important;">จังหวัด</td>
                        <td>
                            <select name="province" id="province" class="form-control">
                                <option value=''>เลือกจังหวัด</option>
                                <?php
                                foreach($province as $row){
                                    echo "<option value=\"$row->province_id\">$row->province_name</option>";
                                }
                                ?>
                            </select>
                            <span id="error8" style="color:red;">* กรุณาเลือกจังหวัด</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right !important;">อำเภอ</td>
                        <td>
                            <select name="amphur" id="amphur" class="form-control">
                                <option value=''>เลือกอำเภอ</option>
                                <?php
                                foreach($amphur as $row){
                                    echo "<option value=\"$row->amphur_id\">$row->amphur_name</option>";
                                }
                                ?>
                            </select>
                            <span id="error7" style="color:red;">* กรุณาเลือกอำเภอ</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right !important;">ตำบล</td>
                        <td>
                            <select name="district" id="district" class="form-control">
                                <option value=''>เลือกตำบล</option>
                                
                            </select>
                            <span id="error9" style="color:red;">* กรุณาเลือกตำบล</span>
                        </td>
                    </tr>
                     <tr>
                         <td style="text-align: center !important;" colspan="4">
                             <button type="submit" id="btn_save_company" class="btn btn-primary">บันทึก</button> &nbsp;
                             <button type="reset" id="btn_cancel_company" class="btn btn-warning">ยกเลิก</button>
                         </td>
                    </tr>

                </tbody>
            </table>
            </form>
        </div>  
    </div>
</div>

<div style = "margin-left:20px;margin-right:20px;">
    <div class="table-responsive" id="show_data_company">
        
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#error1,#error2,#error3,#error4,#error5,#error6,#error7,#error8,#error9").hide();
        
        $('#deleteCompany').live('click',function(e){
            var id = $(this).attr( "title" );
            if(confirm('คุณต้องการลบบริษัท/หจก.นี้หรือไม่?')){
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/eqm/main_company/deleteDataCompany",
                    type: 'POST',
                    data: {company_id:id},
                    success: function(data)
                    {
                        show_data_company();
                    }
                });
            }
            e.preventDefault();
        });
        
        $( "#form_save_company" ).submit(function(e) {
            var formData = new FormData(this);
            if(check_form_data_company() == true){
               
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/eqm/main_company/saveDataCompany",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData:false,

                    success: function(data)
                    {
                        alert(data);
                        
                        show_data_company();

                       $("#btn_cancel_company").click();
                       
                    }
                });
             
            }
            e.preventDefault();
        });
        
        $("#btn_cancel_company").click(function() {
            $( ".clickable" ).click();
        });
        
        $('#amphur').change(function(){
            if($(this).val() != ''){
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>index.php/eqm/main_company/getElementByIdAmphur",
                    data:{amphur_id:$(this).val()},
                    success:function(result){
                        $("#province").html(result);
                    }
                });
                //-----------------------------------------------------------------------------------
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>index.php/eqm/main_company/getElementDistrict",
                    data:{amphur_id:$(this).val()},
                    success:function(result){
                        $("#district").html(result);
                    }
                });
            }else{
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>index.php/eqm/main_company/getElementByIdAmphur",
                    data:{amphur_id:$(this).val()},
                    success:function(result){
                        $("#amphur").html(result);
                    }
                });
                $("#district").html("<option value='' selected>เลือกตำบล</option>");
            }
            
        });
        
        $('#province').change(function(){
           if($(this).val() != ''){
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>index.php/eqm/main_company/getElementByIdProvince",
                    data:{province_id:$(this).val()},
                    success:function(result){
                        $("#amphur").html(result);
                    }
                });
            }else{
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>index.php/eqm/main_company/getElementByIdProvince",
                    data:{province_id:$(this).val()},
                    success:function(result){
                        $("#province").html(result);
                    }
                });
            }
        });
        
        show_data_company();
        $('#btn_update_company').live('click',function(e){
            $(this).submit();
            e.preventDefault();
        });
        $('#form_update_company').live('submit',function(e) {
            
            var formData = new FormData(this);
            if(check_form_data_company_update() == true){
               
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/eqm/main_company/updateDataCompany",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData:false,

                    success: function(data)
                    {
                        alert(data);
                        $('#clearDataCompany').live().click();
                        
                        setTimeout('show_data_company()', 500);
                        //$('#clearDataCompany').click();
                        //show_data_company();
                        
                       //e.preventDefault();
                       
                    }
                });
             
            }
            e.preventDefault();
        });
    });
    function show_data_company(){
        $("#show_data_company").load("<?php echo base_url(); ?>index.php/eqm/main_company/getDataCompany");
        
    }
    function check_form_data_company(){
        var check_true = true;
        if($("#company_number").val() == ""){
            $("#error1").show();
            check_true = false;
        }
        if($("#telephone").val() == ""){
            $("#error2").show();
            check_true = false;
        }
        if($("#company_name").val() == ""){
            $("#error3").show();
            check_true = false;
        }
        if($("#fax_tel").val() == ""){
            $("#error4").show();
            check_true = false;
        }
        if($("#address_company").val() == ""){
            $("#error5").show();
            check_true = false;
        }
        if($("#contact_person").val() == ""){
            $("#error6").show();
            check_true = false;
        }
        if($("#amphur").val() == ""){
            $("#error7").show();
            check_true = false;
        }
        if($("#province").val() == ""){
            $("#error8").show();
            check_true = false;
        }
        if($("#district").val() == ""){
            $("#error9").show();
            check_true = false;
        }
        //--------------------------------------------------------
        if($("#company_number").val() != ""){
            $("#error1").hide();
            //check_true = false;
        }
        if($("#telephone").val() != ""){
            $("#error2").hide();
            //check_true = false;
        }
        if($("#company_name").val() != ""){
            $("#error3").hide();
            //check_true = false;
        }
        if($("#fax_tel").val() != ""){
            $("#error4").hide();
            //check_true = false;
        }
        if($("#address_company").val() != ""){
            $("#error5").hide();
            //check_true = false;
        }
        if($("#contact_person").val() != ""){
            $("#error6").hide();
            //check_true = false;
        }
        if($("#amphur").val() != ""){
            $("#error7").hide();
            //check_true = false;
        }
        if($("#province").val() != ""){
            $("#error8").hide();
            //check_true = false;
        }
        if($("#district").val() != ""){
            $("#error9").hide();
            //check_true = false;
        }
        return check_true;
    }
    function check_form_data_company_update(){
        var check_true = true;
        if($("#company_numberEdit").val() == ""){
            $("#error11").show();
            check_true = false;
        }
        if($("#telephoneEdit").val() == ""){
            $("#error22").show();
            check_true = false;
        }
        if($("#company_nameEdit").val() == ""){
            $("#error33").show();
            check_true = false;
        }
        if($("#fax_telEdit").val() == ""){
            $("#error44").show();
            check_true = false;
        }
        if($("#address_companyEdit").val() == ""){
            $("#error55").show();
            check_true = false;
        }
        if($("#contact_personEdit").val() == ""){
            $("#error66").show();
            check_true = false;
        }
        if($("#amphurEdit").val() == ""){
            $("#error77").show();
            check_true = false;
        }
        if($("#provinceEdit").val() == ""){
            $("#error88").show();
            check_true = false;
        }
        if($("#districtEdit").val() == ""){
            $("#error99").show();
            check_true = false;
        }
        //--------------------------------------------------------
        if($("#company_numberEdit").val() != ""){
            $("#error11").hide();
            //check_true = false;
        }
        if($("#telephoneEdit").val() != ""){
            $("#error22").hide();
            //check_true = false;
        }
        if($("#company_nameEdit").val() != ""){
            $("#error33").hide();
            //check_true = false;
        }
        if($("#fax_telEdit").val() != ""){
            $("#error44").hide();
            //check_true = false;
        }
        if($("#address_companyEdit").val() != ""){
            $("#error55").hide();
            //check_true = false;
        }
        if($("#contact_personEdit").val() != ""){
            $("#error66").hide();
            //check_true = false;
        }
        if($("#amphurEdit").val() != ""){
            $("#error77").hide();
            //check_true = false;
        }
        if($("#provinceEdit").val() != ""){
            $("#error88").hide();
            //check_true = false;
        }
        if($("#districtEdit").val() != ""){
            $("#error99").hide();
            //check_true = false;
        }
        return check_true;
    }
</script>

<?php
    $this->load->view('include/eqm/footer');
?>
