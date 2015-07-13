<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead class = "hd1">
        <tr>
            <th>รหัส</th>
            <th>ชื่อของบริษัท</th>
            <th>ที่อยู่</th>
            <th>อำเภอ</th>
            <th>จังหวัด</th>
            <th>เบอร์โทร</th>
            <th>แฟกซ์</th>
            <th>ผู้ติดต่อ</th>
            <th width="90px">เอกสารแนบ</th>
            <th width="100px">จัดการ</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($data_company as $row){
                echo "<tr>";
                echo "<td>$row->company_number</td>";
                echo "<td>$row->company_name</td>";
                echo "<td>$row->address</td>";
                echo "<td>$row->amphur_name</td>";
                echo "<td>$row->province_name</td>";
                echo "<td>$row->tel</td>";
                echo "<td>$row->fax</td>";
                echo "<td>$row->contact</td>";
        ?>
                <td style="text-align: center !important;">
                    <?php if($row->file_attach){ ?>
                    <a href="<?php echo base_url('upload/company_file/'.$row->file_attach); ?>upload/company_file/<?php echo $row->file_attach; ?>" target="_blank" class="delete-hover"><img src="<?php echo base_url(); ?>icon/attach-icon.png" title="เอกสารแนบ" style="width: 25px;height: 30px;"></a>
                    <?php } ?>
                </td>
                <td>
                    <a href="#editCompany" data-toggle="modal" title="<?php echo $row->id; ?>" class="delete-hover clickEdit"><img src="<?php echo base_url(); ?>icon/edit.ico" title="แก้ไขข้อมูลบริษัท/หจก." style="width: 25px;height: 25px;"></a>
                    <a id="deleteCompany" href="#" title="<?php echo $row->id; ?>" class="delete-hover"><img src="<?php echo base_url(); ?>icon/delete.ico" title="ลบบริษัท/หจก." style="width: 25px;height: 25px;"></a>
                
                </td>
                </tr>
        <?php
            }
        ?>
    </tbody>
</table>

<div class="modal fade" id="editCompany" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2>แก้ไข บริษัท/หจก.</h2>
            </div>
            <div class="modal-body">
                <form id="form_update_company" enctype="multipart/form-data">
                <table class="table table-striped" border="0">
                    <tbody>
                        <tr>
                            <td width = "15%" style="text-align: right !important;">รหัสบริษัท/หจก.</td>
                            <td width = "35%">
                                <input type="text" name="company_numberEdit" id="company_numberEdit" class="form-control">
                                <input type="hidden" name="company_id" id="company_id" class="form-control">
                                <input type="hidden" name="file_attachOld" id="file_attachOld" class="form-control">
                                <span id="error11" style="color:red;">* กรุณากรอกรหัสบริษัท/หจก.</span>
                            </td>
                            <td width = "15%" style="text-align: right !important;">เบอร์โทร</td>
                            <td width = "35%">
                                <input type="text" name="telephoneEdit" id="telephoneEdit" class="form-control">
                                <span id="error22" style="color:red;">* กรุณากรอกเบอร์โทร</span>
                            </td>

                        </tr>
                        <tr>
                            <td style="text-align: right !important;">ชื่อของบริษัท</td>
                            <td>
                                <input type="text" name="company_nameEdit" id="company_nameEdit" class="form-control">
                                <span id="error33" style="color:red;">* กรุณากรอกชื่อของบริษัท</span>
                            </td>
                            <td style="text-align: right !important;">เบอร์แฟกซ์</td>
                            <td>
                                <input type="text" name="fax_telEdit" id="fax_telEdit" class="form-control">
                                <span id="error44" style="color:red;">* กรุณากรอกเบอร์แฟกซ์</span>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2" style="text-align: right !important;">ที่อยู่</td>
                            <td rowspan="2">
                                <textarea name="address_companyEdit" id="address_companyEdit" class="form-control" rows="4"></textarea>
                                <span id="error55" style="color:red;">* กรุณากรอกที่อยู่</span>
                            </td>
                            <td style="text-align: right !important;">ผู้ติดต่อ</td>
                            <td>
                                <input type="text" name="contact_personEdit" id="contact_personEdit" class="form-control">
                                <span id="error66" style="color:red;">* กรุณากรอกผุ้ติดต่อ</span>
                            </td>
                        </tr>
                         <tr>

                            <td rowspan="4" style="text-align: right !important;">เอกสารแนบ</td>
                            <td rowspan="4">
                                <input type="file" name="file_attachEdit" id="file_attachEdit" class="form-control">
                                <span>** .jpg | .jpeg | .png | .gif | .pdf | .doc | .docx | .xml | .xlsx | .xls</span>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: right !important;">จังหวัด</td>
                            <td>
                                <select name="provinceEdit" id="provinceEdit" class="form-control">
                                    <option value=''>เลือกจังหวัด</option>
                                    <?php
                                    foreach($province as $row){
                                        echo "<option value=\"$row->province_id\">$row->province_name</option>";
                                    }
                                    ?>
                                </select>
                                <span id="error88" style="color:red;">* กรุณาเลือกจังหวัด</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right !important;">อำเภอ</td>
                            <td>
                                <select name="amphurEdit" id="amphurEdit" class="form-control">
                                    <option value=''>เลือกอำเภอ</option>
                                    <?php
                                    foreach($amphur as $row){
                                        echo "<option value=\"$row->amphur_id\">$row->amphur_name</option>";
                                    }
                                    ?>
                                </select>
                                <span id="error77" style="color:red;">* กรุณาเลือกอำเภอ</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right !important;">ตำบล</td>
                            <td>
                                <select name="districtEdit" id="districtEdit" class="form-control">
                                    <option value=''>เลือกตำบล</option>

                                </select>
                                <span id="error99" style="color:red;">* กรุณาเลือกตำบล</span>
                            </td>
                        </tr>
                         <tr>
                             <td style="text-align: center !important;" colspan="4">
                                 <a class="btn btn-primary" id = "btn_update_company">บันทึก</a> &nbsp;
                                 <a data-dismiss="modal" class="btn btn-danger" id = "clearDataCompany">ยกเลิก</a>
                             </td>
                        </tr>

                    </tbody>
                </table>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    $(function() {
        $('#dataTables-example').dataTable();
        $("#error11,#error22,#error33,#error44,#error55,#error66,#error77,#error88,#error99").hide();
        
        $('.clickEdit').click(function(){
           var id = $(this).attr( "title" );
           $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>index.php/eqm/main_company/getDataCompanyIdForUpdate",
                data:{company_id:id},
                dataType: 'json',
                success:function(result){
                    var obj = result;
                    //alert(JSON.stringify(obj));
                    //alert(obj['company_number']);
                    //var company_number = result['0'].company_number;
                    $('#company_numberEdit').val(obj['company_number']);
                    $('#company_id').val(obj['id']);
                    $('#telephoneEdit').val(obj['tel']);
                    $('#company_nameEdit').val(obj['company_name']);
                    $('#file_attachOld').val(obj['file_attach']);
                    $('#fax_telEdit').val(obj['fax']);
                    $('#address_companyEdit').val(obj['address']);
                    $('#contact_personEdit').val(obj['contact']);
                    $('#provinceEdit').val(obj['province_id']);
                    $('#amphurEdit').val(obj['amphur_id']);
                    $('#file_attachEdit').val('');
                    $.ajax({
                        type:"POST",
                        url:"<?php echo base_url(); ?>index.php/eqm/main_company/getElementDistrict",
                        data:{amphur_id:obj['amphur_id']},
                        success:function(result){
                            $("#districtEdit").html(result);
                        }
                    });
                    $('#districtEdit').val(obj['district_id']);
                }
            }); 
        });
        
        $('#clearDataCompany').click(function(){
            $('#file_attachEdit').val('');
            $("#error11,#error22,#error33,#error44,#error55,#error66,#error77,#error88").hide();
            var setDefault = ""; 
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>index.php/eqm/main_company/getElementByIdAmphur",
                data:{amphur_id:setDefault},
                success:function(result){
                    $("#amphurEdit").html(result);
                }
            });
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>index.php/eqm/main_company/getElementByIdProvince",
                data:{province_id:setDefault},
                success:function(result){
                    
                    $("#provinceEdit").html(result);
                }
            });
        });
        
        $('#amphurEdit').change(function(){
            if($(this).val() != ''){
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>index.php/eqm/main_company/getElementByIdAmphur",
                    data:{amphur_id:$(this).val()},
                    success:function(result){
                        $("#provinceEdit").html(result);
                    }
                });
                //-----------------------------------------------------------------------------------
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>index.php/eqm/main_company/getElementDistrict",
                    data:{amphur_id:$(this).val()},
                    success:function(result){
                        $("#districtEdit").html(result);
                    }
                });
            }else{
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>index.php/eqm/main_company/getElementByIdAmphur",
                    data:{amphur_id:$(this).val()},
                    success:function(result){
                        $("#amphurEdit").html(result);
                    }
                });
                $("#districtEdit").html("<option value='' selected>เลือกตำบล</option>");
            }
            
        });
        
        $('#provinceEdit').change(function(){
           if($(this).val() != ''){
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>index.php/eqm/main_company/getElementByIdProvince",
                    data:{province_id:$(this).val()},
                    success:function(result){
                        $("#amphurEdit").html(result);
                    }
                });
            }else{
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>index.php/eqm/main_company/getElementByIdProvince",
                    data:{province_id:$(this).val()},
                    success:function(result){
                        $("#provinceEdit").html(result);
                    }
                });
            }
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
        width:1024px !important ; 
    }     
</style>