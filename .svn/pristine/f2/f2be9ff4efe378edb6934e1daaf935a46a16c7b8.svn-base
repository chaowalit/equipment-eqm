 <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                       คุณอยู่ที่ >> บันทึกข้อมูลบื้องต้น >> ส่วนราชการ</h3>
                    <!--<span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>-->
                </div>
                <div id = "message" class="alert alert-success alert-dismissable" style = "margin-top:10px;margin-left:10px;margin-right:10px;">
                       <center><h3><?php echo $this->session->flashdata('msg');?></h3></center>          
                </div>
                <center>
                <form action = "index.php/eqm/service/update_data" method = "post" id = "service_id" enctype="multipart/form-data">
                <div class="panel-body">
                     <table class="table table-striped  ">
                                    <tbody>
                                        <tr>
                                            <td width = "20%">รหัสส่วนราชการ</td>
                                            <td width = "60%px"><input class="form-control" id = "service_number" name = "service_number" value = "<?php echo $service_number;?>" ></td>
                                            <td><span id = "error1">กรอกรหัสส่วนราชการ</span></td>
                                        </tr>
                                         <tr>
                                            <td>ชื่อส่วนราชการ</td>
                                            <td><input class="form-control" id = "service_name" name = "service_name" value = "<?php echo $service_name;?>"></td>
                                            <td><span id = "error2">กรอกชื่อส่วนราชการ</span></td>
                                        </tr>
                                        <tr>
                                            <td>ชื่อหน่วยงาน</td>
                                            <td><input class="form-control" id = "agencies" name = "agencies" value = "<?php echo $agencies;?>"></td>
                                            <td><span id = "error3">กรอกชื่อหน่วยงาน</span></td>
                                        </tr>
                                        <tr>
                                            <td>ที่อยู่</td>
                                            <td>
                                                <textarea class="form-control" rows="3" id = "address" name = "address" ><?php echo $address;?></textarea>
                                            </td>
                                            <td><span id = "error4">กรอกที่อยู่</span></td>
                                        </tr>
                                        <tr>
                                            <td>จังหวัด</td>
                                            <td>
                                                <!--<input class="form-control" id = "provinc" name = "provinc" value = "<?php echo $provinc;?>">-->
                                                <select class="form-control" id = "provinc" name = "provinc">
                                                        <option selected>กรณาเลือกจังหวัด</option>
                                                        <?php foreach($prov as $row){?>
                                                            <option value = "<?php echo $row['province_id'];?>"><?php echo $row['province_name'];?></option>
                                                        <?php }?>
                                                </select>
                                            </td>
                                            <td><span id = "error6">เลือกจังหวัด</span></td>
                                        </tr>
                                        <tr>
                                            <td>อำเภอ</td>
                                            <td>
                                                <!--<input class="form-control" id = "district" name = "district" value = "<?php echo $district;?>">-->
                                                <select class="form-control" id = "district" name = "district">
                                                       <option selected>กรณาเลือกอำเภอ</option>
                                                        <?php foreach($amphur as $row){?>
                                                            <option value = "<?php echo $row['amphur_id'];?>"><?php echo $row['amphur_name'];?></option>
                                                        <?php }?>
                                                </select>
                                            </td>
                                            <td><span id = "error5">เลือกอำเภอ</span></td>
                                        </tr>
                                        <tr>
                                            <td>ตำบล</td>
                                            <td>
                                                <!--<input class="form-control" id = "district" name = "district" value = "<?php echo $district;?>">-->
                                                <select class="form-control" id = "tambols" name = "tambols">
                                                       <option selected>กรณาเลือกตำบล</option>
                                                        <?php foreach($tambols as $row){?>
                                                             <option value = "<?php echo $row['district_id'];?>"><?php echo $row['district_name'];?></option>
                                                        <?php }?>
                                                </select>
                                            </td>
                                            <td><span id = "errort">เลือกตำบล</span></td>
                                        </tr>
                                        <tr>
                                            <td>รหัสไปรษณีย์</td>
                                            <td><input class="form-control" id = "zip_code" name = "zip_code" value = "<?php echo $zip_code;?>"></td>
                                            <td><span id = "error7">กรอกรหัสไปรษณีย์</span></td>
                                        </tr>
                                        <tr>
                                            <td>เบอร์โทร</td>
                                            <td><input class="form-control" id = "tel" name = "tel" value = "<?php echo $tel;?>"></td>
                                            <td><span id = "error8">กรอกเบอร์โทร</span></td>
                                        </tr>
                                        <tr>
                                            <td>เบอร์แฟกซ์</td>
                                            <td><input class="form-control" id = "fax" name = "fax" value = "<?php echo $fax;?>"></td>
                                            <td><span id = "error9">กรอกเบอร์แฟกซ์</span></td>
                                        </tr>
                                        <tr>
                                            <td>ตรา</td>
                                            <td>
                                                <?php if($logo == 'default.jpg'){?>
                                                    <img src = "<?php echo base_url();?>icon/default.jpg"/>
                                                <?php }else{?>
                                                     <img src = "<?php echo base_url();?>upload/service/<?php echo $logo;?>" width = "150px"/>
                                                <?php }?>
                                                    <hr>
                                                    <input type="file" id = "logo" name  = "logo">
                                                    <input type="hidden" id = "hide1" name  = "hide1" value = "<?php echo $logo;?>">
                                            </td>
                                            <td><span id = "error10">เลือกตรา</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" id = "set_visible" class="btn btn-success">แก้ไข</button>
                                <input type = "submit" class="btn btn-info" value = "ตกลง"/>
                                <a class="btn btn-danger" href = "index.php/eqm/service/destroy_data" onclick = "return confirm('Are you sure?')">ยกเลิก</a>
                                <!--<input type = "submit" class="btn btn-danger" value = "ยกเลิก"/>-->
                                <!--
                                
                                <button type="button" class="btn btn-info">ตกลง</button>
                                <button type="button" class="btn btn-danger">ยกเลิก</button>
                                -->
                     </div>
                 </form>
                 </center>
                  <script>   
                        $(document).ready(function(){
                            $('#provinc').val($('#provinc option').eq(<?php echo $provinc;?>).val());
                            $('#district').val($('#district option').eq(<?php echo $district;?>).val());
                            $('#tambols').val($('#tambols option').eq(<?php echo $tambol;?>).val());
                           // alert(<?php echo $tambol;?>);
                            $('#provinc').change(function(){
                                $('#district option[value!="0"]').remove();
                                $('#tambols  option[value!="0"]').remove();
                                $.post( "index.php/eqm/service/get_distric",{'id':$(this).val()},function( jsonResult ) {
                                    $('#district').attr('enabled', 'true');
                                    $('#district').append(
                                    $("<option selected></option>").text("กรณาเลือกอำเภอ")
                                    );
                                    $.each(jsonResult, function() {
                                       $('#district').append(
                                            $("<option></option>").text(this.amphur_name).val(this.amphur_id)
                                       );
                                    });
                                });
                            });
                            
                             $('#district').change(function(){
                                $.post( "index.php/eqm/service/get_tambol",{'id':$(this).val()},function( jsonResult ) {
                                     $('#tambols option[value!="0"]').remove();
                                    $('#tambols').attr('enabled', 'true');
                                    $('#tambols').append(
                                    $("<option selected></option>").text("กรณาเลือกตำบล")
                                    );
                                    $.each(jsonResult, function() {
                                       $('#tambols').append(
                                            $("<option></option>").text(this.district_name).val(this.district_id)
                                       );
                                    });
                                });
                            });
                             
                            //flash session
                            $("#message").hide();
                            var message = "<?php echo $this->session->flashdata('msg');?>";
                            var flax = "<?php echo $this->session->flashdata('msg2');?>";
                                if(message != "")
                                {   
                                    if(flax == '1')
                                    {
                                        $("#message").toggleClass('alert alert-danger');
                                        $("#message").show();
                                    }
                                        $("#message").show();
                                }


                            $("#error1,#error2,#error3,#error4,#error5,#error6,#error7,#error8,#error9,#error10,#errort").hide();
                            var ini = "<?php echo $district;?>";
                            if(ini != "")
                                {
                                    $("input,#address,select").prop('disabled', true);
                                }
                                var aa = '<?php echo $district;?>';

                                $("#set_visible").click(function(){
                                   $("input,#address,select").prop('disabled', false);
                                     $('#provinc').val($('#provinc option').eq(<?php echo $provinc;?>).val()); 
                                });
                            
                              $("#service_id").submit(function( event ){
                                var service_number = $("#service_number").val();
                                var service_name   = $("#service_name").val();
                                var agencies       = $("#agencies").val();
                                var address        = $("#address").val();
                                var tambols        = $("$tambols").val();
                                var district       = $("#district").val();
                                var provinc        = $("#provinc").val();
                                var zip_code       = $("#zip_code").val();
                                var tel            = $("#tel").val();
                                var fax            = $("#fax").val();
                                var logo           = $("#logo").val();
                                //condition
                                if(service_number == '')
                                {
                                    $("#error1").show();
                                    event.preventDefault();
                                }
                                if(service_name == '')
                                {
                                    $("#error2").show();
                                    event.preventDefault();
                                }
                                if(agencies == '')
                                {
                                    $("#error3").show();
                                    event.preventDefault();
                                }
                                if(address == '')
                                {
                                    $("#error4").show();
                                    event.preventDefault();
                                }
                                if(tambols == '')
                                {
                                    $("#errort").show();
                                    event.preventDefault();
                                }
                                if(district == '')
                                {
                                    $("#error5").show();
                                    event.preventDefault();
                                }
                                if(provinc == '')
                                {
                                    $("#error6").show();
                                    event.preventDefault();
                                }
                                if(zip_code == '')
                                {
                                    $("#error7").show();
                                    event.preventDefault();
                                }
                                 if(tel == '')
                                {
                                    $("#error8").show();
                                    event.preventDefault();
                                }
                                if(fax == '')
                                {
                                    $("#error9").show();
                                    event.preventDefault();
                                }

                                //condition not empty
                                if(service_number != '')
                                {
                                    $("#error1").hide();
                                }
                                if(service_name != '')
                                {
                                    $("#error2").hide();
                                }
                                if(agencies != '')
                                {
                                    $("#error3").hide();
                                }
                                if(address != '')
                                {
                                    $("#error4").hide();
                                }
                                 if(tambols == '')
                                {
                                    $("#errort").hide();
                                }
                                if(district != '')
                                {
                                    $("#error5").hide();
                                }
                                if(provinc != '')
                                {
                                    $("#error6").hide();
                                }
                                if(zip_code != '')
                                {
                                    $("#error7").hide();
                                }
                                 if(tel != '')
                                {
                                    $("#error8").hide();
                                }
                                if(fax != '')
                                {
                                    $("#error9").hide();
                                }
                            });
                        });
                  </script>
                     <style>    
                        .table{
                            width: 50%!important;
                        }
                        .panel-body{
                            margin-bottom: 10px!important;
                        }
                        td span{
                            color: red;
                        }
                     </style>

