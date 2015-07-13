
 <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                       คุณอยู่ที่ >> บันทึกข้อมูลทะเบียน >> ทะเบียนครุภัณฑ์</h3>
                     <span class="pull-right clickable panel-collapsed" id="clickable"><i class="glyphicon glyphicon-plus"></i></span>
                </div>
                <form id="form_save_eqm" enctype="multipart/form-data" onsubmit = "return false">
                     <div class="panel-body">
                            <a href = "index.php/eqm/main_eqm" id = "add_new_eqm" class = "btn btn-warning">เพิ่มครุภัณฑ์</a>
                            <a href = "index.php/eqm/report_properties" id = "add_new_eqm" class = "btn btn-success">รายงานมูลค่าทรัพย์สินสุทธิ</a>
                            <a href = "index.php/eqm/main_eqm_more5000" id = "add_new_eqm" class = "btn btn-success">รายงานมูลค่าทรัพย์สินสูงกว่า 5000 บาท</a>
                            <a href = "index.php/eqm/main_eqm_less5000" id = "add_new_eqm" class = "btn btn-success">รายงานมูลค่าทรัพย์สินต่ำกว่า 5000 บาท</a>
                            <br/><br/>
                             <div class="row setup-content" id="step-1">
                                    <div class="col-xs-12">
                                        <div class="col-md-12 well text-center">
                                               <div class="table-responsive">
                                        <center>
                                        <table>
                                            <tr>
                                                <td style = "font-weight:bold;">&nbsp;&nbsp;BARCODE ::&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td><div id = "g_barcode"></div></td>
                                                   <input type = "text" id = "id_depreciation"  name = "id_depreciation" style  = "display:none"/>
                                                   <input type = "text" id = "id_group"  name = "id_group" style  = "display:none"/>
                                                   <input type = "text" id = "id_type"   name = "id_type"  style  = "display:none"/>
                                                   <input type = "text" id = "id_detail" name = "id_detail" style  = "display:none"/>
                                            </tr>
                                        <table>
                                        </center>
                                        <br>
                                    <table class="table table-striped  ">
                                        <tbody>
                                            <tr>
                                                <td width = "200px"><span style="color:red;font-weight:bold;"><big>*</big></span>&nbsp;หมายเลขครุภัณฑ์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href = "#get_number_eqm" keyboard = "false" data-backdrop = "static" data-toggle="modal"><img id = "open_pic" src = "icon/open.ico" width="30px" ></a></td>
                                                <td width = "250px"><input type = "text" class="form-control" id = "eqm_numbers_amount" name = "eqm_numbers_amount" readonly/><p id = "chk1" style = "color:red;display:none;">กรุณาเลือกหมายเลขครุภัณฑ์</p></td>
                                                <td width = "180px"><span style="color:red;font-weight:bold;"><big>*</big></span>&nbsp;ราคาต่อหน่วย</td>
                                                <td width = "250px"><input class="form-control" type = "text" id = "eqm_price_unit" name = "eqm_price_unit" disabled placeholder="กรอกตัวเลขเท่านั้น"/><p id = "chk4" style = "color:red;display:none;">กรุณากรอกราคาต่อหน่วย</p></td>
                                                <td width = "150px"><span style="color:red;font-weight:bold;"><big>*</big></span>&nbsp;ที่เอกสาร</td>
                                                <td><input class="form-control" type = "text" id = "report_number" name = "report_number"/><p id = "chk6" style = "color:red;display:none;">กรุณากรอกที่เอกสาร</p></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;ชื่อครุภัณฑ์</td>
                                                <td><input type = "text" class="form-control" id = "eqm_names" name = "eqm_names" readonly/></td>
                                                <td><span style="color:red;font-weight:bold;"><big>*</big></span>&nbsp;จำนวนหน่วย/ชุด</td>
                                                <td><input class="form-control" type = "text" id = "eqm_unit_set" name = "eqm_unit_set" value = "1" disabled placeholder="กรอกตัวเลขเท่านั้น"/><p id = "chk5" style = "color:red;display:none;">กรุณากรอกจำนวนหน่วย/ชุด</p></td>
                                                <td>&nbsp;&nbsp;มูลค่ารวม</td>
                                                <td><input class="form-control" type = "text" id = "cost_total" name = "cost_total" readonly/></td>
                                            </tr>
                                            <tr>
                                                <td><span style="color:red;font-weight:bold;"><big>*</big></span>&nbsp;คุณลักษณะ/ส่วนประกอบ</td>
                                                <td><input class="form-control" type = "text" id = "eqm_components" name = "eqm_components"/><p id = "chk2" style = "color:red;display:none;">กรุณากรอกคุณลักษณะ/ส่วนประกอบ</p></td>
                                                <td>&nbsp;&nbsp;ประเภทงบประมาณ</td>
                                                <td>
                                                    <select id = "type_budget_id" name = "type_budget_id" class="form-control">
                                                        <?php foreach($select_4 as $row){?>
                                                           <option  value="<?= $row['type_budget_id'];?>"><?= $row['type_budget_name']; ?></option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td>&nbsp;&nbsp;วิธีการได้มา</td>
                                                <td>
                                                    <select id = "method_id" name = "method_id" class="form-control">
                                                        <?php foreach($select_6 as $row){?>
                                                           <option  value="<?= $row['method_id'];?>"><?= $row['method_name']; ?></option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                            </tr>
                                             <tr>
                                                <td><span style="color:red;font-weight:bold;"><big>*</big></span>&nbsp;รุ่นแบบ</td>
                                                <td><input class="form-control" type = "text" id = "eqm_model" name = "eqm_model"/><p id = "chk3" style = "color:red;display:none;">กรุณากรอกรุ่นแบบ</p></td>
                                                <td>&nbsp;&nbsp;ปีงบประมาณ</td>
                                                <td>
                                                    <select id = "year_budget_id" name = "year_budget_id" class="form-control">
                                                        <?php foreach($select_5 as $row){?>
                                                           <option  value="<?= $row['year_budget_id'];?>"><?= $row['year_budget_name']; ?></option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td><span style="color:red;font-weight:bold;"><big>*</big></span>&nbsp;วันที่ได้รับ</td>
                                                <td><input class="form-control" type = "text" id = "date_receive" name = "date_receive"/><p id = "chk7" style = "color:red;display:none;">กรุณาเลือกวันที่ได้รับ</p></td>
                                            </tr>
                                             <tr>
                                                <td>&nbsp;&nbsp;หน่วยนับ</td>
                                                <td>
                                                    <select id = "unit_id" name = "unit_id" class="form-control">
                                                        <?php foreach($select_2 as $row){?>
                                                           <option  value="<?= $row['unit_id'];?>"><?= $row['unit_name']; ?></option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td>&nbsp;&nbsp;อายุการใช้งานของครุภัณฑ์</td>
                                                <td><input type = "text" class="form-control" id = "depreciation_age" name = "depreciation_age" readonly/></td>
                                                <td>&nbsp;&nbsp;มูลค่าสุทธิ</td>
                                                <td><input class="form-control" type = "text" id = "cost_net" name = "cost_net" readonly/></td>
                                            </tr>
                                             <tr>
                                                <td>&nbsp;&nbsp;ชื่อผู้ขาย/ผู้รับจ้าง/ผู้บริจาค</td>
                                                <td>
                                                    <select id = "agency_id" name = "agency_id" class="form-control">
                                                        <?php foreach($select_3 as $row){?>
                                                           <option value="<?= $row['agency_id'];?>"><?= $row['agency_name']; ?></option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td>&nbsp;&nbsp;อัตราค่าเสื่อม</td>
                                                <td><input type = "text" class="form-control" id = "depreciation" name = "depreciation" readonly/></td>
                                                <td>&nbsp;&nbsp;อัตราค่าเสื่อมต่อปี</td>
                                                <td><input class="form-control" type = "text" id = "depreciation_year" name = "depreciation_year" readonly/></td>
                                            </tr>
                                             <tr>
                                                <td></td>
                                                <td></td>
                                                <td>&nbsp;&nbsp;หมายเหตุ</td>
                                                <td colspan = "3"><input class="form-control" type = "text" id = "comment" name = "comment"/></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                            <!--<button id="activate-step-2" class="btn btn-primary btn-lg">ขั้นตอนต่อไป</button>-->
                                            <a href = "javascript:void(0)" id="activate-step-2" class="btn btn-primary btn-lg">ขั้นตอนต่อไป</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-2">
                                    <div class="col-xs-12">
                                        <div class="col-md-12 well">
                                             <table class="table table-striped  ">
                                        <tbody>
                                            <tr>
                                                <td width = ""><span style="color:red;font-weight:bold;"><big>*</big></span>&nbsp;เลขที่ใบตรวจรับ</td>
                                                <td width = ""><input class="form-control" type = "text" id = "inspection_number" name = "inspection_number"/><p id = "chked1" style = "color:red;display:none;">กรุณากรอกเลขที่ใบตรวจรับ</p></td>
                                                <td width = ""><span style="color:red;font-weight:bold;"><big>*</big></span>&nbsp;เลขที่สัญญา</td>
                                                <td width = ""><input class="form-control" type = "text" id = "contract_number" name = "contract_number"/><p id = "chked4" style = "color:red;display:none;">กรุณากรอกเลขที่สัญญา</p></td>
                                            </tr>
                                            <tr>
                                                <td><span style="color:red;font-weight:bold;"><big>*</big></span>&nbsp;วันที่ทำสัญญาซื้อ</td>
                                                <td><input type = "text" class="form-control" id = "date_contract" name = "date_contract" /><p id = "chked2" style = "color:red;display:none;">กรุณากรอกวันที่ทำสัญญาซื้อ</p></td>
                                                <td>&nbsp;&nbsp;ภาพครุภัณฑ์</td>
                                                <td><input class="form-control" type="file" name="image_eqm" id="image_eqm"><!--<input class="form-control" type = "text" id = "date_contract2" name = "date_contract2"/>--></td>
                                            </tr>
                                            <input type = "text" id = "hid_image_eqm" name = "hid_image_eqm" style = "display :none;" /><!--style = "display :none;"-->
                                            <tr>
                                                <td><span style="color:red;font-weight:bold;"><big>*</big></span>&nbsp;จำนวนปีรับประกัน</td>
                                                <td><input type = "text" class="form-control" id = "vouch_year" name = "vouch_year" /><p id = "chked3" style = "color:red;display:none;">กรุณากรอกจำนวนปีรับประกัน</p></td>
                                                <td>&nbsp;&nbsp;เอกสารที่เกี่ยวข้อง</td>
                                                <td>
                                                    <input class="form-control" type="file" name="document_about" id="document_about">
                                                </td>
                                            </tr>
                                            <input type = "text" id = "hide_document_about" name = "hide_document_about" style = "display :none;" /><!--style = "display :none;"-->
                                             <tr>
                                                <td>&nbsp;&nbsp;สถานะ</td>
                                                <td>
                                                     <div class="form-group">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="status_use" id="status_use" value="1" checked>ใช้งานได้
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="status_use" id="status_use" value="0">เลิกใช้งาน
                                                        </label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td>
                                                </td>
                                               
                                            </tr>
                                             <tr>
                                                <td>&nbsp;&nbsp;สถานที่ตั้ง/สังกัดหน่วยงาน</td>
                                                <td>
                                                     <select id = "be_under_id" name = "be_under_id" class="form-control" readonly>
                                                        <?php foreach($select_7 as $row){?>
                                                           <option  value="<?= $row['be_under_id'];?>"><?= $row['be_under_name']; ?></option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                
                                            </tr>
                                             <tr>
                                                <td>&nbsp;&nbsp;ผู้ใช้งาน/ผู้รับผิดชอบที่ 1</td>
                                                <td>
                                                    <input type = "text" class="form-control" id = "user1" name = "user1" value = "<?php echo $this->full_name; ?>" readonly/>
                                                </td>
                                                
                                            </tr>
                                             <tr>
                                                <td>&nbsp;&nbsp;ผู้ใช้งาน/ผู้รับผิดชอบที่ 2</td>
                                                <td>
                                                    <input type = "text" class="form-control" id = "user2" name = "user2" />
                                                </td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                          <center style = "margin-top:10px;margin-buttom:10px;">
                                             <!--<button id="back_to_one" class="btn btn-info btn-lg">ย้อนกลับ</button>
                                             <button id="activate-step-3" class="btn btn-primary btn-lg">ขั้นตอนต่อไป</button>-->
                                             <a href = "javascript:void(0)" id="back_to_one" class="btn btn-info btn-lg">ย้อนกลับ</a>
                                             <a href = "javascript:void(0)" id="activate-step-3" class="btn btn-primary btn-lg">ขั้นตอนต่อไป</a>
                                         </center>
                                        </div>
                                    </div>

                                </div>
                                <div class="row setup-content" id="step-3">
                                    <div class="col-xs-12">
                                        <div class="col-md-12 well">
                                             <table class="table table-striped  ">
                                        <tbody>
                                            <tr>
                                                <td width = "30%">หมายเลขครุภัณฑ์ </td>
                                                <td width = "">
                                                    <p  style = "font-weight:900;color:#0000FF;" id = "total_result1"></p>
                                                </td>
                                                <td width = "">ชื่อผู้ขาย/ผู้รับจ้าง/ผู้บริจาค</td>
                                                <td width = ""><p  style = "font-weight:900;color:#0000FF;" id = "total_result2"></p></td>
                                            </tr>
                                            <tr>
                                                <td>ชื่อครุภัณฑ์</td>
                                                <td><p  style = "font-weight:900;color:#0000FF;" id = "total_result3"></p></td>
                                                <td>วันที่ได้รับ</td>
                                                <td><p  style = "font-weight:900;color:#0000FF;" id = "total_result4"></p></td>
                                            </tr>
                                            <tr>
                                                <td>ราคาต่อหน่วย</td>
                                                <td><p  style = "font-weight:900;color:#0000FF;" id = "total_result5"></p></td>
                                                <td>สถานที่ตั้ง/สังกัดหน่วยงาน</td>
                                                <td><p  style = "font-weight:900;color:#0000FF;" id = "total_result6"></p></td>
                                                
                                            </tr>
                                             <tr>
                                                <td>มูลค่ารวม</td>
                                                <td><p  style = "font-weight:900;color:#0000FF;" id = "total_result7"></p></td>
                                                <td>ผู้ใช้งาน/ผู้รับผิดชอบที่ 1</td>
                                                <td><p  style = "font-weight:900;color:#0000FF;" id = "total_result8"></p></td>               
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input type = "hidden" id = "hide_edit" name = "hide_edit"/>
                                    <center>
                                                 <a class = "btn btn-success btn-lg" id = "back_to_two">ย้อนกลับ</a>
                                                 <!--<a href = "javascript:void(0);" class="btn btn-info btn-lg" id = "btn_submit_eqm">บันทึกข้อมูล</a>-->
                                                 <input type ="submit" class="btn btn-info btn-lg" id = "btn_submit_eqm" value = "บันทึกข้อมูล"/>
                                                 <a href = "index.php/eqm/main_eqm" class="btn btn-danger btn-lg" id = "cancel_eqm" onclick="return confirm('Are you sure?')">ยกเลิก</a>
                                             </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-xs-12">
                                        <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                                            <li class="active"><a href="#step-1">
                                                <h4 class="list-group-item-heading">ข้อมูลหลัก</h4>
                                            </a></li>
                                            <li class="disabled"><a href="#step-2">
                                                <h4 class="list-group-item-heading">ข้อมูลอ้างอิง</h4>
                                            </a></li>
                                            <li class="disabled"><a href="#step-3">
                                                <h4 class="list-group-item-heading">บันทึก</h4>
                                            </a></li>
                                        </ul>
                                    </div>
                                </div>
                        </div>
                    </form>

            </div>
   <div style = "margin-left:20px;margin-right:20px;">
   		                    <div class="table-responsive">
                                <div id = "show_content_data_eqm"></div>
                            </div>
                        </div>

        <!--Modal-->
         <div class="modal fade" id="get_number_eqm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-warning">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h2>กรุณาเลือกข้อมูลหมวดทะเบียนครุภัณฑ์</h2>
                                    </div>
                                    <div class="modal-body">
                                               
                                               <form onsubmit = "return false" id  = "my_agency1" >
                                                <center>
                                                    <div style = "width:100%!important;margin-top:10px!important;">
                                                         <table class="table table-striped">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td width = "20%">กลุ่มประเภท</td>
                                                                                <td><p id = "select_num1" style = "font-weight:900;color:#0000FF;">----</p></td>
                                                                                <td width = "60%px">
                                                                                     <select id="e1">
                                                                                        <option value="----">กรุณาเลือก</option>
                                                                                        <?php foreach($select_1 as $row){?>
                                                                                         <option name = "test" value="<?= $row['group_type_numbers'].$row['group_type_id'];?>"><?= $row['group_type_names']; ?></option>
                                                                                        <?php }?>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                             <tr>
                                                                                <td>ชนิด</td>
                                                                                <td><p id = "select_num2" style = "font-weight:900;color:#0000FF;">----</p></td>
                                                                                <td>
                                                                                    <select id="e2">
                                                                                        <option value="----">กรุณาเลือก</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                             <tr>
                                                                                <td>ชื่อรายละเอียด</td>
                                                                                <td><p id = "select_num3" style = "font-weight:900;color:#0000FF;">----</p></td>
                                                                                <td>
                                                                                     <select id="e3">
                                                                                        <option value="----">กรุณาเลือก</option>
                                                                                    </select>
                                                                                    <input type = "text" id = "hiden_eqm_name" style = "display:none;"/>
                                                                                    <input type = "text" id = "get_detail_eqm" style = "display:none;"/>
                                                                                </td>
                                                                            </tr>
                                                                             <tr>
                                                                                <td>หมายเลชครุภัณฑ์</td>
                                                                                <td colspan = "2"><p id = "total_number_eqm" style = "font-weight:900;color:#0000FF;"></p></td>
                                                                            </tr>
                                                                        </tbody>
                                                         </table>
                                                                <div style = "padding-bottom:10px!important;">
                                                                     <a href = "index.php/eqm/data_eqm" class="btn btn-success" id = "btn_go_set">ตั้งค่าหมวด</a>
                                                                     <a href = "javascript:void(0);" class="btn btn-info" id = "btn_active">ตกลง</a>
                                                                     <a data-dismiss="modal" class="btn btn-danger" id = "btn_clear">ยกเลิก</a>
                                                                </div>
                                                                <input type = 'hidden' id = 'agency_id1' name = "agency_id1"/>
                                                        </div>
                                              </center>
                                              </form>
                                       </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <style>
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
                            #e1{
                                width: 500px!important;
                            }
                            
                    </style>
                                                                        <script>
                                                                               function  get_update_data()
                                                                               {
                                                                                     $.post( "index.php/eqm/main_eqm/get_eqm_data", function( data ) {
                                                                                      $( "#show_content_data_eqm" ).html( data );
                                                                                     });
                                                                               }
                                                                               $(document).ready(function(){
                                                                                    $("#add_new_eqm").hide();
                                                                                    get_update_data();
                                                                                    $("#form_save_eqm").submit(function(e){
                                                                                         var formData = new FormData(this);
                                                                                              $.ajax({
                                                                                                url: "index.php/eqm/main_eqm/save_eqm_data",
                                                                                                type: 'POST',
                                                                                                data: formData,
                                                                                                contentType: false,
                                                                                                cache: false,
                                                                                                processData:false,
                                                                                                success: function(data)
                                                                                                {
                                                                                                   //alert(data);
                                                                                                         $.colorbox({
                                                                                                             href: "assets/loading.gif",
                                                                                                             escKey: false,
                                                                                                             overlayClose: false,
                                                                                                             scrolling:false,
                                                                                                             closeButton:false,
                                                                                                         }); 

                                                                                                   setTimeout(function(){
                                                                                                       $.colorbox.close();
                                                                                                       //alert(data);
                                                                                                       get_update_data();
                                                                                                       $(".clickable").click();
                                                                                                       $('ul.setup-panel li:eq(0)').removeClass('disabled');
                                                                                                       $('ul.setup-panel li:eq(1)').addClass('disabled');
                                                                                                       $('ul.setup-panel li:eq(2)').addClass('disabled');
                                                                                                       $('ul.setup-panel li a[href="#step-1"]').trigger('click');
                                                                                                       $("input[type=text],input[type=file], textarea").val("");
                                                                                                       $("#g_barcode").html('');
                                                                                                       $("#eqm_unit_set").prop('disabled', true);
                                                                                                       $("#eqm_unit_set").val('1');
                                                                                                       var user1 = "<?php echo $this->full_name; ?>";
                                                                                                       $("#user1").val(user1);
                                                                                                   }, 2000);
                                                                                                   
                                                                                                }
                                                                                            });
                                                                                    });
                                                                                    $('#e1').change(function(){
                                                                                        //alert($(this).val());
                                                                                        //alert($("#total_number_eqm").text());
                                                                                         $('#e2 option[value!="0"]').remove();
                                                                                         $('#e3 option[value!="0"]').remove();
                                                                                         $("#select_num1").text('');
                                                                                         $("#select_num1").text($(this).val().substring(0, 4));
                                                                                         $("#select_num2").text('----');
                                                                                         $("#select_num3").text('----');
                                                                                         $("#e2").select2("val", "----");
                                                                                         $("#e3").select2("val", "----");
                                                                                          if($("#total_number_eqm").text() != "")
                                                                                         {  
                                                                                            if($("#select_num1").text() == "----" || $("#select_num2").text() == "----" || $("#select_num3").text() == "----")
                                                                                            {
                                                                                               $("#total_number_eqm").text('');
                                                                                            }
                                                                                         }
                                                                                        
                                                                                             var id_change1 = $(this).val().substring(4);
                                                                                             //alert(id_change1);
                                                                                             $("#id_group").val(id_change1);
                                                                                             $("#get_detail_eqm").val(id_change1);
                                                                                                     $.post( "index.php/eqm/data_eqm/get_number1",{'id':id_change1}, function( data1 ) {
                                                                                                       $('#e2').attr('enabled', 'true');
                                                                                                            $('#e2').append(
                                                                                                                  $("<option></option>").text('กรุณาเลือก').val('----')
                                                                                                              );
                                                                                                             $('#e3').append(
                                                                                                                  $("<option></option>").text('กรุณาเลือก').val('----')
                                                                                                              );
                                                                                                            $("#e2").select2("val", "----");
                                                                                                            $("#e3").select2("val", "----");
                                                                                                           $.each(data1, function() {
                                                                                                              $('#e2').append(
                                                                                                                  $("<option></option>").text(this.type_names).val(this.type_numbers+this.type_id)
                                                                                                              );
                                                                                                           });
                                                                                                     });
                                                                                        });
                                                                                        $('#e2').change(function(){

                                                                                         $("#e3").select2("val", "----");
                                                                                         $("#select_num3").text('----');
                                                                                         $('#e3 option[value!="0"]').remove();
                                                                                          if($("#total_number_eqm").text() != "")
                                                                                         {  
                                                                                            if($("#select_num1").text() == "----" || $("#select_num2").text() == "----" || $("#select_num3").text() == "----")
                                                                                            {
                                                                                               $("#total_number_eqm").text('');
                                                                                            }
                                                                                         }
                                                                                         //$("#select_num2").text('');
                                                                                         $("#select_num2").text($(this).val().substring(0, 4));
                                                                                             var id_change2 = $(this).val().substring(4);
                                                                                            // alert(id_change2);
                                                                                             $("#id_type").val(id_change2);
                                                                                                     $.post( "index.php/eqm/data_eqm/get_number2",{'id':id_change2}, function( data2 ) {
                                                                                                        //alert(data.detail_names);
                                                                                                         $('#e3').attr('enabled', 'true');
                                                                                                          $('#e3').append(
                                                                                                                  $("<option></option>").text('กรุณาเลือก').val('----')
                                                                                                              );
                                                                                                          $("#e3").select2("val", "----");
                                                                                                           $.each(data2, function() {
                                                                                                              $('#e3').append(
                                                                                                                  $("<option></option>").text(this.detail_names).val(this.detail_numbers+this.detail_id)
                                                                                                              );
                                                                                                           });
                                                                                                     });
                                                                                        });
                                                                                         $('#e3').change(function(){
                                                                                         $("#select_num3").text($(this).val().substring(0, 4));
                                                                                        // alert($(this).val().substring(4));
                                                                                         $("#id_detail").val($(this).val().substring(4));
                                                                                         var name_change = $(this).val().substring(4);
                                                                                         $("#hiden_eqm_name").val(name_change);
                                                                                          if($("#total_number_eqm").text() != "")
                                                                                         {  
                                                                                            if($("#select_num1").text() == "----" || $("#select_num2").text() == "----" || $("#select_num3").text() == "----")
                                                                                            {
                                                                                               $("#total_number_eqm").text('');
                                                                                            }
                                                                                         }
                                                                                         var total_eqm_number = $("#select_num1").text()+"-"+$("#select_num2").text()+"-"+$("#select_num3").text();
                                                                                             if($("#select_num1").text() == "----" || $("#select_num2").text() == "----" || $("#select_num3").text() == "----")
                                                                                             {
                                                                                                 //alert("not mat");
                                                                                             }
                                                                                             else 
                                                                                             {  
                                                                                                //alert(total_eqm_number);
                                                                                                $("#total_number_eqm" ).html( "<img  src = '<?php echo base_url();?>assets/loading3.gif' width = '80px'/>" );
                                                                                                $.post( "index.php/eqm/main_eqm/check_number_eqm",{'number_eqm':total_eqm_number},function( data ) {

                                                                                                    //alert(data);

                                                                                                     if(data.length == 1)
                                                                                                      {
                                                                                                         var amout_number = "000"+(parseInt(data)+1);
                                                                                                         if(amout_number.length == 5)
                                                                                                         {
                                                                                                            var amout_number = amout_number.substr(1);
                                                                                                         }
                                                                                                      }
                                                                                                      else if(data.length == 2)
                                                                                                      { 
                                                                                                         var amout_number = "00"+(parseInt(data)+1);
                                                                                                      }
                                                                                                      else if(data.length == 3)
                                                                                                      { 
                                                                                                         var amout_number = "0"+(parseInt(data)+1);
                                                                                                      }
                                                                                                      else
                                                                                                      {
                                                                                                         var amout_number = (parseInt(data)+1);
                                                                                                      }
                                                                                                      var amout_number_total = amout_number;
                                                                                                      $("#total_number_eqm").text(total_eqm_number+"/"+amout_number_total);

                                                                                                 });
                                                                                             }
                                                                                        });
                                                                                    $("#btn_active").click(function(){
                                                                                         //alert($("#id_detail").val());
                                                                                        // get name
                                                                                            $.post( "index.php/eqm/main_eqm/get_name_depreciation",{'id':$("#id_group").val()},function( data ) {
                                                                                                $("#id_depreciation").val(data);
                                                                                            });
                                                                                            $.post( "index.php/eqm/main_eqm/get_name_eqm",{'id':$("#id_detail").val()},function( data ) {
                                                                                                $("#eqm_names").val(data);
                                                                                            });
                                                                                         if($("#total_number_eqm").text() != "" )
                                                                                         {
                                                                                           $("#get_number_eqm").modal('hide');
                                                                                           $("#eqm_numbers_amount").val($("#total_number_eqm").text());
                                                                                           $("#eqm_names").val($("#hiden_eqm_name").val());
                                                                                           $.post( "index.php/eqm/main_eqm/get_detail_eqm",{'get_detail_id':$("#get_detail_eqm").val()}, function( data ) {
                                                                                                 var depreciation_age = data['0'].depreciation_age ;
                                                                                                 var depreciation_year = data['0'].depreciation_year ;
                                                                                                 $("#depreciation_age").val(depreciation_age);
                                                                                                 $("#depreciation").val(depreciation_year);
                                                                                                 $("#chk1").hide();
                                                                                                 $("#eqm_price_unit").prop('disabled', false);
                                                                                                 $("#depreciation_year").val(depreciation_year);
                                                                                                 //$("#depreciation_year").val('0');
                                                                                                 //alert(depreciation_age+depreciation_year);
                                                                                            }, "json");
                                                                                            var get_full_bar = $("#total_number_eqm").text();
                                                                                            $("#g_barcode").html('<img src="<?php echo base_url();?>bc/barcode.php/?text='+get_full_bar+'"/>');
                                                                                            set_default();

                                                                                         }
                                                                                         else
                                                                                         {
                                                                                            alert('กรณาเลือกเมนู');
                                                                                         }
                                                                                    });
                                                                                    $("#btn_clear").click(function(){
                                                                                        set_default();
                                                                                         var id = $("#hideo").val();
                                                                                            var url = "<?php echo site_url('eqm/main_eqm/get_detail_edit/');?>"+"/"+id;
                                                                                            $.post( url , function( data ) {
                                                                                               $(".clickable").hide();
                                                                                               $("#id_depreciation").val(data[0]['id_depreciation']);
                                                                                               $("#id_group").val(data[0]['id_group']);
                                                                                               $("#id_type").val(data[0]['id_type']);
                                                                                               $("#id_detail").val(data[0]['id_detail']);
                                                                                               $("#hide_edit").val(data[0]['eqm_id']);
                                                                                               //$("#g_barcode").html('<img src="http://localhost/equipment-eqm/index.php/eqm/main_eqm/gen/?a='+data[0]['barcode']+'"/>');
                                                                                               $("#g_barcode").html('<img src="<?php echo base_url();?>bc/barcode.php/?text='+data[0]['barcode']+'"/>');
                                                                                                                                   $.post( "index.php/eqm/main_eqm/get_name_depreciation",{'id':$("#id_group").val()},function( data ) {
                                                                                                                                        $("#id_depreciation").val(data);
                                                                                                                                    });
                                                                                                                                    $.post( "index.php/eqm/main_eqm/get_name_eqm",{'id':$("#id_detail").val()},function( data ) {
                                                                                                                                        $("#eqm_names").val(data);
                                                                                                                                    });
                                                                                               $("#eqm_price_unit").prop('disabled', false);
                                                                                               $("#eqm_unit_set").prop('disabled', false);
                                                                                               $("#eqm_numbers_amount").val(data[0]['eqm_numbers1']+"-"+data[0]['eqm_numbers2']+"-"+data[0]['eqm_numbers3']+"/"+data[0]['eqm_amout_number']);
                                                                                              // $("#eqm_names").val(data[0]['eqm_names']);
                                                                                               $("#eqm_components").val(data[0]['eqm_components']);
                                                                                               $("#eqm_model").val(data[0]['eqm_model']); 
                                                                                               $("#unit_id").val(data[0]['unit_id']);
                                                                                               $("#agency_id").val(data[0]['agency_id']);
                                                                                               $("#eqm_price_unit").val(data[0]['eqm_price_unit']);
                                                                                               $("#eqm_unit_set").val(data[0]['eqm_unit_set']);
                                                                                               $("#type_budget_id").val(data[0]['type_budget_id']);
                                                                                               $("#year_budget_id").val(data[0]['year_budget_id']);
                                                                                               $("#depreciation_age").val(data[0]['depreciation_age']);
                                                                                               $("#depreciation").val(data[0]['depreciation']);
                                                                                               $("#comment").val(data[0]['comment']);
                                                                                               $("#report_number").val(data[0]['report_number']);
                                                                                               $("#cost_total").val(data[0]['cost_total']);
                                                                                               $("#method_id").val(data[0]['method_id']);
                                                                                               var str = data[0]['date_receive'];
                                                                                               var res = str.split("-");
                                                                                               $("#date_receive").val(res[2]+'-'+res[1]+'-'+res[0]);
                                                                                               $("#cost_net").val(data[0]['cost_net']);
                                                                                               $("#depreciation_year").val(data[0]['depreciation_year']);
                                                                                               $("#inspection_number").val(data[0]['inspection_number']);
                                                                                               var str = data[0]['date_contract'];
                                                                                               var res = str.split("-");
                                                                                               $("#date_contract").val(res[2]+'-'+res[1]+'-'+res[0]);
                                                                                               $("#vouch_year").val(data[0]['vouch_year']);
                                                                                               var a = data[0]['status_use'];
                                                                                                 if(a = "waste")
                                                                                                 {
                                                                                                    var stat = "0";
                                                                                                 }
                                                                                                 else
                                                                                                 {
                                                                                                    var stat = "1";
                                                                                                 }
                                                                                                 $('#status_use[value='+stat+']:checked').val();
                                                                                               //$("#status_use['value'=>stat]").val(stat);//radio
                                                                                               $("#be_under_id").val(data[0]['be_under_id']);
                                                                                               $("#user1").val(data[0]['user1']);
                                                                                               $("#user2").val(data[0]['user2']);
                                                                                               $("#contract_number").val(data[0]['contract_number']);

                                                                                               $("#hid_image_eqm").val(data[0]['image_eqm']);
                                                                                               $("#hide_document_about").val(data[0]['document_about']);
                                                                                               $("#btn_submit_eqm").val("แก้ไขข้อมูล");

                                                                                               //$("#open_pic").hide();
                                                                                            },"json");             
                                                                                    });
                                                                                    function set_default()
                                                                                    {
                                                                                        $("#select_num1").text('----');
                                                                                        $("#select_num2").text('----');
                                                                                        $("#select_num3").text('----');
                                                                                        $("#total_number_eqm").text('');
                                                                                        $('#e2 option[value!="0"]').remove();
                                                                                        $('#e3 option[value!="0"]').remove();
                                                                                        $('#e2').append(
                                                                                           $("<option></option>").text('กรุณาเลือก').val('----')
                                                                                         );
                                                                                           $('#e3').append(
                                                                                         $("<option></option>").text('กรุณาเลือก').val('----')
                                                                                         );
                                                                                         $("#e1").select2("val", "----");
                                                                                         $("#e2").select2("val", "----");
                                                                                         $("#e3").select2("val", "----");

                                                                                         //edit data

                                                                                    }
                                                                                 });         
                                                                            </script>   


                                                                            <script>
                                                                                $(document).ready(function(){
                                                                                    $("#eqm_price_unit").keyup(function( e ){
                                                                                         if($("#eqm_price_unit").val() == "")
                                                                                         {
                                                                                            $("#eqm_unit_set").prop('disabled', true);
                                                                                            $("#eqm_unit_set").val('1');
                                                                                            $("#cost_total").val('');
                                                                                            $("#cost_net").val('');
                                                                                         }
                                                                                         else
                                                                                         {  
                                                                                            $("#eqm_unit_set").prop('disabled', false);
                                                                                            if($.isNumeric($("#eqm_price_unit").val()))
                                                                                              {
                                                                                                    var eqm_price_unit = parseInt($("#eqm_price_unit").val());
                                                                                                    var eqm_unit_set   = parseInt($("#eqm_unit_set").val());
                                                                                                    $("#cost_total").val(eqm_price_unit*eqm_unit_set);
                                                                                                    $("#cost_net").val(eqm_price_unit*eqm_unit_set);

                                                                                              }
                                                                                              else
                                                                                              {
                                                                                                 alert("ต้องกรอกตัวเลขเท่านั้น");
                                                                                                 $(this).val('');
                                                                                                 $(this).focus();
                                                                                                 $("#eqm_unit_set").prop('disabled', true);
                                                                                              }
                                                                                         }        
                                                                                    });
                                                                                        $("#eqm_unit_set").keyup(function(e){
                                                                                         if($("#eqm_unit_set").val() == "")
                                                                                         {
                                                                                            $("#cost_total").val('');
                                                                                            $("#cost_net").val('');
                                                                                         }
                                                                                         else
                                                                                        {
                                                                                                   if(!isNaN($("#eqm_unit_set").val()))
                                                                                                      {
                                                                                                            var eqm_price_unit = parseInt($("#eqm_price_unit").val());
                                                                                                            var eqm_unit_set   = parseInt($("#eqm_unit_set").val());
                                                                                                            $("#cost_total").val(eqm_price_unit*eqm_unit_set);
                                                                                                            $("#cost_net").val(eqm_price_unit*eqm_unit_set);

                                                                                                            /*
                                                                                                            var sumation_per_year = eqm_price_unit*eqm_unit_set;
                                                                                                            var year_working_eqm  = parseInt($("#depreciation_age").val());
                                                                                                            var eqm_per_year = sumation_per_year/year_working_eqm;
                                                                                                            $("#depreciation_year").val(eqm_per_year.toFixed(2));
                                                                                                            */
                                                                
                                                                                                      }

                                                                                                  else
                                                                                                      {
                                                                                                         alert("ต้องกรอกตัวเลขเท่านั้น");
                                                                                                         $(this).val('');
                                                                                                         $(this).focus();
                                                                                                         $("#cost_total").val('');
                                                                                                         $("#cost_net").val('');
                                                                                                      }
                                                                                        }
                                                                                        });
                                                                                    });
                                                                            </script>
