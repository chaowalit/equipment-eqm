 <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                       คุณอยู่ที่ >> บันทึกข้อมูลบื้องต้น >> ข้อมูลหลัก</h3>
                </div>
                <!-- Nav tabs -->
            <br/>
            <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#a" role="tab" data-toggle="tab">หน่วยนับ</a></li>
              <!--<li><a href="#b" role="tab" data-toggle="tab">ผู้ขาย/ผู้รับจ้าง/ผู้บริจาค</a></li>-->
              <li><a href="#c" role="tab" data-toggle="tab">วิธีการที่ได้มา</a></li>
              <li><a href="#d" role="tab" data-toggle="tab">ปีงบประมาณ</a></li>
              <li><a href="#e" role="tab" data-toggle="tab">ประเภทงบประมาณ</a></li>
              <li><a href="#f" role="tab" data-toggle="tab">สถานที่ตั้ง/สังกัดหน่วยงาน</a></li>
              <li><a href="#g" role="tab" data-toggle="tab">คำนำหน้าชื่อ</a></li>
              <!--<li><a href="#h" role="tab" data-toggle="tab">กลุ่มงาน</a></li>-->
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="a">
                <form onsubmit = "return false" id  = "my_unit">
                  <center>
                        <div style = "width:50%!important;margin-top:10px!important;">
                             <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width = "20%">รหัสยูนิต</td>
                                                    <td width = "60%px"><input class="form-control" id = "unit_number" name = "unit_number" ></td>
                                                    <td><span class = "rr" id = "error1">กรอกรหัสยูนิต</span></td>
                                                </tr>
                                                 <tr>
                                                    <td>ชื่อยูนิต</td>
                                                    <td><input class="form-control" id = "unit_name" name = "unit_name" ></td>
                                                    <td><span class = "rr" id = "error2">กรอกชื่อยูนิต</span></td>
                                                </tr>
                                            </tbody>
                             </table>
                                     <div style = "padding-bottom:10px!important;">
                                         <input type = "submit" class="btn btn-info" value = "ตกลง"/>
                                         <a class="btn btn-danger" id = "clear">ยกเลิก</a>
                                    </div>
                                    <div id ="result"></div>
                          </div>
                </center>
              </form>
              </div>
              <div class="tab-pane" id="b">
                <form onsubmit = "return false" id  = "my_unit2">
                  <center>
                        <div style = "width:70%!important;margin-top:10px!important;">
                             <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width = "20%">รหัสผู้ขาย/ผู้รับจ้าง/ผู้บริจาค</td>
                                                    <td width = "60%px"><input class="form-control" id = "agency_number" name = "agency_number" ></td>
                                                    <td><span class = "rr" id = "error3">กรอกรหัสู้ขาย/ผู้รับจ้าง/ผู้บริจาค</span></td>
                                                </tr>
                                                 <tr>
                                                    <td>ชื่อู้ขาย/ผู้รับจ้าง/ผู้บริจาค</td>
                                                    <td><input class="form-control" id = "agency_name" name = "agency_name" ></td>
                                                    <td><span class = "rr" id = "error4">กรอกชื่อู้ขาย/ผู้รับจ้าง/ผู้บริจาค</span></td>
                                                </tr>
                                            </tbody>
                             </table>
                                     <div style = "padding-bottom:10px!important;">
                                         <input type = "submit" class="btn btn-info" value = "ตกลง"/>
                                         <a class="btn btn-danger" id = "clear2">ยกเลิก</a>
                                    </div>
                                    <div id ="result2"></div>
                          </div>
                </center>
              </form>
              </div>
              <div class="tab-pane" id="c">
                <form onsubmit = "return false" id  = "my_method">
                  <center>
                        <div style = "width:50%!important;margin-top:10px!important;">
                             <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width = "20%">รหัสวิธีการที่ได้มา</td>
                                                    <td width = "60%px"><input class="form-control" id = "method_number" name = "method_number" ></td>
                                                    <td><span class = "rr" id = "error5">กรอกรหัสวิธีการที่ได้มา</span></td>
                                                </tr>
                                                 <tr>
                                                    <td>ชื่อวิธีการที่ได้มา</td>
                                                    <td><input class="form-control" id = "method_name" name = "method_name" ></td>
                                                    <td><span class = "rr" id = "error6">กรอกชื่อวิธีการที่ได้มา</span></td>
                                                </tr>
                                            </tbody>
                             </table>
                                     <div style = "padding-bottom:10px!important;">
                                         <input type = "submit" class="btn btn-info" value = "ตกลง"/>
                                         <a class="btn btn-danger" id = "clear3">ยกเลิก</a>
                                    </div>
                                    <div id ="result3"></div>
                          </div>
                </center>
              </form>
              </div>
              <div class="tab-pane" id="d">
                <form onsubmit = "return false" id  = "my_year_budget">
                  <center>
                        <div style = "width:50%!important;margin-top:10px!important;">
                             <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width = "20%">รหัสปีงบประมาณ</td>
                                                    <td width = "60%px"><input class="form-control" id = "year_budget_number" name = "year_budget_number" ></td>
                                                    <td><span class = "rr" id = "error7">กรอกรหัสปีงบประมาณ</span></td>
                                                </tr>
                                                 <tr>
                                                    <td>ชื่อปีงบประมาณ</td>
                                                    <td><input class="form-control" id = "year_budget_name" name = "year_budget_name" ></td>
                                                    <td><span class = "rr" id = "error8">กรอกชื่อปีงบประมาณ</span></td>
                                                </tr>
                                            </tbody>
                             </table>
                                     <div style = "padding-bottom:10px!important;">
                                         <input type = "submit" class="btn btn-info" value = "ตกลง"/>
                                         <a class="btn btn-danger" id = "clear4">ยกเลิก</a>
                                    </div>
                                    <div id ="result4"></div>
                          </div>
                </center>
              </form>
              </div>
               <div class="tab-pane" id="e">
                   <form onsubmit = "return false" id  = "my_type_budget">
                     <center>
                        <div style = "width:50%!important;margin-top:10px!important;">
                             <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width = "20%">รหัสประเภทงบประมาณ</td>
                                                    <td width = "60%px"><input class="form-control" id = "type_budget_number" name = "type_budget_number" ></td>
                                                    <td><span class = "rr" id = "error9">กรอกรหัสประเภทงบประมาณ</span></td>
                                                </tr>
                                                 <tr>
                                                    <td>ชื่อประเภทงบประมาณ</td>
                                                    <td><input class="form-control" id = "type_budget_name" name = "type_budget_name" ></td>
                                                    <td><span class = "rr" id = "error10">กรอกชื่อประเภทงบประมาณ</span></td>
                                                </tr>
                                            </tbody>
                             </table>
                                     <div style = "padding-bottom:10px!important;">
                                         <input type = "submit" class="btn btn-info" value = "ตกลง"/>
                                         <a class="btn btn-danger" id = "clear5">ยกเลิก</a>
                                    </div>
                                    <div id ="result5"></div>
                          </div>
                   </center>
                </form>
               </div>
              <div class="tab-pane" id="f">
                   <form onsubmit = "return false" id  = "my_under_company">
                     <center>
                        <div style = "width:75%!important;margin-top:10px!important;">
                             <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width = "20%">รหัสสถานที่ตั้ง/สังกัดหน่วยงาน</td>
                                                    <td width = "60%px"><input class="form-control" id = "be_under_number" name = "be_under_number" ></td>
                                                    <td><span class = "rr" id = "error11">กรอกรหัสสถานที่ตั้ง/สังกัดหน่วยงาน</span></td>
                                                </tr>
                                                 <tr>
                                                    <td>ชื่อสถานที่ตั้ง/สังกัดหน่วยงาน</td>
                                                    <td><input class="form-control" id = "be_under_name" name = "be_under_name" ></td>
                                                    <td><span class = "rr" id = "error12">กรอกชื่อสถานที่ตั้ง/สังกัดหน่วยงาน</span></td>
                                                </tr>
                                            </tbody>
                             </table>
                                     <div style = "padding-bottom:10px!important;">
                                         <input type = "submit" class="btn btn-info" value = "ตกลง"/>
                                         <a class="btn btn-danger" id = "clear6">ยกเลิก</a>
                                    </div>
                                    <div id ="result6"></div>
                          </div>
                   </center>
                </form>
              </div>
               <div class="tab-pane" id="g">
                   <form onsubmit = "return false" id  = "my_title_name">
                     <center>
                        <div style = "width:50%!important;margin-top:10px!important;">
                             <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width = "20%">รหัสคำนำหน้าชื่อ</td>
                                                    <td width = "60%px"><input class="form-control" id = "title_name_number" name = "title_name_number" ></td>
                                                    <td><span class = "rr" id = "error13">กรอกรหัสคำนำหน้าชื่อ</span></td>
                                                </tr>
                                                 <tr>
                                                    <td>ชื่อคำนำหน้าชื่อ</td>
                                                    <td><input class="form-control" id = "title_name" name = "title_name" ></td>
                                                    <td><span class = "rr" id = "error14">กรอกชื่อคำนำหน้าชื่อ</span></td>
                                                </tr>
                                            </tbody>
                             </table>
                                     <div style = "padding-bottom:10px!important;">
                                         <input type = "submit" class="btn btn-info" value = "ตกลง"/>
                                         <a class="btn btn-danger" id = "clear7">ยกเลิก</a>
                                    </div>
                                    <div id ="result7"></div>
                          </div>
                   </center>
                </form>
              </div>
              <!--
               <div class="tab-pane" id="h">
                   <form onsubmit = "return false" id  = "my_working_group">
                     <center>
                        <div style = "width:50%!important;margin-top:10px!important;">
                             <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width = "20%">รหัสกลุ่มงาน</td>
                                                    <td width = "60%px"><input class="form-control" id = "working_group_number" name = "working_group_number" ></td>
                                                    <td><span class = "rr" id = "error15">กรอกรหัสกลุ่มงาน</span></td>
                                                </tr>
                                                 <tr>
                                                    <td>ชื่อกลุ่มงาน</td>
                                                    <td><input class="form-control" id = "working_group_name" name = "working_group_name" ></td>
                                                    <td><span class = "rr" id = "error16">กรอกชื่อกลุ่มงาน</span></td>
                                                </tr>
                                            </tbody>
                             </table>
                                     <div style = "padding-bottom:10px!important;">
                                         <input type = "submit" class="btn btn-info" value = "ตกลง"/>
                                         <a class="btn btn-danger" id = "clear8">ยกเลิก</a>
                                    </div>
                                    <div id ="result8"></div>
                          </div>
                   </center>
                </form>
              </div>
            -->
            </div>
</div>
<style>
    .rr{
        color: red;
    }
</style>
<!-- UNIT A-->
<script>
    $(document).ready(function(){
             $("#error1,#error2").hide();
             $("#clear").click(function(){
                $("#unit_number").val('');
                $("#unit_name").val('');
                $("#error1,#error2").hide();
             });
               $("#btn_submit").live('click',function( event ){
                         $.post( "index.php/eqm/unit_data/update_unit",$("#my_unit1").serialize(), function( data ) {                                           
                                         if(data == '200')
                                        {    
                                              alert('แก้ไขข้อมูลเรียบร้อย');
                                              $.post( "index.php/eqm/unit_data/index",function( data ) {            
                                                  $("#result" ).html( data );
                                              });   
                                        }
                                        else
                                        {
                                            alert('บันทึกไม่ได้เนื่องจากรหัสซ้ำ');
                                        }
                                        
                          }); 
                     });
                      //delete content
                      $(".mm1").live('click',function( event ){         
                          var a = $(this).attr('title');
                           $.confirm({
                              text: "คุณต้องการลบ ยูนิต จริงหรือไม่",
                              confirm: function(button) {
                                  $.post( "index.php/eqm/unit_data/delete_content",{'id':a}, function( data ) {
                                    alert(data);
                                     $.post( "index.php/eqm/unit_data/index",function( data ) {            
                                                    $("#result" ).html( data );
                                     });
                                  });
                              },
                              cancel: function(button) {
                              }
                          });
                       });

             $.post( "index.php/eqm/unit_data/index",function( data ) {            
                            $("#result" ).html( data );
             }); 
            $("#my_unit").submit(function( event ){
            var unit_number = $("#unit_number").val();
            var unit_name   = $("#unit_name").val();
               if(unit_number == ''){
                    $("#error1").show();
                    event.preventDefault();
               }
               if(unit_name == ''){
                    $("#error2").show();
                    event.preventDefault();
               }
                if(unit_number != ''){
                    $("#error1").hide();
               }
               if(unit_name != ''){
                    $("#error2").hide();
               }
               if(unit_number != '' && unit_name != ''){
                    $.post( "index.php/eqm/unit_data/insert_unit",$("#my_unit").serialize(), function( data ) {
                            if(data == '200')
                            {   
                                 alert("รหัสยูนิตซ้ำ");
                                 $("#error1").text('รหัสซ้ำ').show();
                                 $("#unit_number").val('');
                            }
                            else
                            {
                               $("#result" ).html( data );
                                $("#unit_number").val('');
                                $("#unit_name").val('');
                                alert("บันทึกข้อมูลเรียบร้อยแล้ว");
                            }                
                    }); 
               }
            });
    });
</script>
<!-- AGEBCY B -->
<script>
  $(document).ready(function(){
      $("#error3,#error4").hide();
      $("#clear2").click(function(){
                $("#agency_number").val('');
                $("#agency_name").val('');
                $("#error3,#error4").hide();
             });
            $("#btn_submit2").live('click',function( event ){
                  $.post( "index.php/eqm/agency_data/update_agency",$("#my_agency1").serialize(), function( data ) {
                                       if(data == '200')
                                        {    
                                              alert('แก้ไขข้อมูลเรียบร้อย');
                                              $.post( "index.php/eqm/agency_data/index",function( data ) {            
                                                $("#result2" ).html( data );
                                             });  
                                        }
                                        else
                                        {
                                            alert('บันทึกไม่ได้เนื่องจากรหัสซ้ำ');
                                        }
                          
                  }); 
             });
            $(".mm2").live('click',function( event ){         
                          var a = $(this).attr('title');
                           $.confirm({
                              text: "คุณต้องการลบ ผู้ขาย/ผู้รับจ้าง/ผู้บริจาค จริงหรือไม่",
                              confirm: function(button) {
                                  $.post( "index.php/eqm/agency_data/delete_content",{'id':a}, function( data ) {
                                    alert(data);
                                     $.post( "index.php/eqm/agency_data/index",function( data ) {            
                                            $("#result2" ).html( data );
                                   });
                                  });
                              },
                              cancel: function(button) {
                              }
                          });
                       });
      $.post( "index.php/eqm/agency_data/index",function( data ) {            
                            $("#result2" ).html( data );
             });
       $("#my_unit2").submit(function( event ){
              var agency_number = $("#agency_number").val();
              var agency_name   = $("#agency_name").val();
               if(agency_number == ''){
                    $("#error3").show();
                    event.preventDefault();
               }
               if(agency_name == ''){
                    $("#error4").show();
                    event.preventDefault();
               }
                if(agency_number != ''){
                    $("#error3").hide();
               }
               if(agency_name != ''){
                    $("#error4").hide();
               }
               if(agency_number != '' && agency_name != ''){
                    $.post( "index.php/eqm/agency_data/insert_agency",$(this).serialize(), function( data ) {
                            if(data == '200')
                            {   
                                 alert("รหัส ผู้ขาย/ผู้รับจ้าง/ผู้บริจาค ซ้ำ");
                                 $("#error3").text('รหัสซ้ำ').show();
                                 $("#agency_number").val('');
                            }
                            else
                            {
                               $("#result2" ).html( data );
                                $("#agency_number").val('');
                                $("#agency_name").val('');
                                alert("บันทึกข้อมูลเรียบร้อยแล้ว");
                            }                
                    }); 
               }
            });
  });
</script>
<!--METHOD C -->
<script>
     $(document).ready(function(){
      $("#error5,#error6").hide();
      $("#clear3").click(function(){
                $("#method_number").val('');
                $("#method_name").val('');
                $("#error5,#error6").hide();
             });
          //submit edit form
                            $("#btn_submit3").live('click',function( event ){
                                $.post( "index.php/eqm/method_data/update_method",$("#my_method1").serialize(), function( data ) {
                                        if(data == '200')
                                        {    
                                              alert('แก้ไขข้อมูลเรียบร้อย');
                                              $.post( "index.php/eqm/method_data/index",function( data ) {            
                                                      $("#result3" ).html( data );
                                              });
                                        }
                                        else
                                        {
                                            alert('บันทึกไม่ได้เนื่องจากรหัสซ้ำ');
                                        }
                                        
                                }); 
                            });
                 $(".mm3").live('click',function( event ){         
                          var a = $(this).attr('title');
                           $.confirm({
                              text: "คุณต้องการลบ วิธีการที่ได้มา จริงหรือไม่",
                              confirm: function(button) {
                                  $.post( "index.php/eqm/method_data/delete_content",{'id':a}, function( data ) {
                                    alert(data);
                                     $.post( "index.php/eqm/method_data/index",function( data ) {            
                                           $("#result3" ).html( data );
                                   });
                                  });
                              },
                              cancel: function(button) {
                              }
                          });
                       });
            $.post( "index.php/eqm/method_data/index",function( data ) {            
                            $("#result3" ).html( data );
             });
       $("#my_method").submit(function( event ){
              var method_number = $("#method_number").val();
              var method_name   = $("#method_name").val();
               if(method_number == ''){
                    $("#error5").show();
                    event.preventDefault();
               }
               if(method_name == ''){
                    $("#error6").show();
                    event.preventDefault();
               }
                if(method_number != ''){
                    $("#error5").hide();
               }
               if(method_name != ''){
                    $("#error6").hide();
               }
               if(method_number != '' && method_name != ''){
                    $.post( "index.php/eqm/method_data/insert_method",$(this).serialize(), function( data ) {
                            if(data == '200')
                            {   
                                 alert("รหัส วิธีการที่ได้มา ซ้ำ");
                                 $("#error5").text('รหัสซ้ำ').show();
                                 $("#method_number").val('');
                            }
                            else
                            {
                               $("#result3" ).html( data );
                                $("#method_number").val('');
                                $("#method_name").val('');
                                alert("บันทึกข้อมูลเรียบร้อยแล้ว");
                            }                
                    }); 
               }
            });
  });
</script>
<!--YEAR BUDGET D -->
<script>

  $(document).ready(function(){
      $("#error7,#error8").hide();
      $("#clear4").click(function(){
                $("#year_budget_number").val('');
                $("#year_budget_name").val('');
                $("#error7,#error8").hide();
             });
          //submit edit form
                            $("#btn_submit4").live('click',function( event ){
                                $.post( "index.php/eqm/year_budget_data/update_year_budget",$("#my_year_budget1").serialize(), function( data ) {
                                         if(data == '200')
                                        {    
                                              alert('แก้ไขข้อมูลเรียบร้อย');
                                             $.post( "index.php/eqm/year_budget_data/index",function( data ) {            
                                                      $("#result4" ).html( data );
                                             });
                                        }
                                        else
                                        {
                                            alert('บันทึกไม่ได้เนื่องจากรหัสซ้ำ');
                                        }
                                        
                                }); 
                            });

               $(".mm4").live('click',function( event ){         
                          var a = $(this).attr('title');
                           $.confirm({
                              text: "คุณต้องการลบ ปีงบประมาณ จริงหรือไม่",
                              confirm: function(button) {
                                  $.post( "index.php/eqm/year_budget_data/delete_content",{'id':a}, function( data ) {
                                     alert(data);
                                     $.post( "index.php/eqm/year_budget_data/index",function( data ) {            
                                                    $("#result4" ).html( data );
                                     });
                                  });
                              },
                              cancel: function(button) {
                              }
                          });
                       });

            $.post( "index.php/eqm/year_budget_data/index",function( data ) {            
                            $("#result4" ).html( data );
             });
       $("#my_year_budget").submit(function( event ){
              var year_budget_number = $("#year_budget_number").val();
              var year_budget_name   = $("#year_budget_name").val();
               if(year_budget_number == ''){
                    $("#error7").show();
                    event.preventDefault();
               }
               if(year_budget_name == ''){
                    $("#error8").show();
                    event.preventDefault();
               }
                if(year_budget_number != ''){
                    $("#error7").hide();
               }
               if(year_budget_name != ''){
                    $("#error8").hide();
               }
               if(year_budget_number != '' && year_budget_name != ''){
                    
                    $.post( "index.php/eqm/year_budget_data/insert_year_budget",$(this).serialize(), function( data ) {
                            if(data == '200')
                            {   
                                 alert("รหัสปีงบประมาณ ซ้ำ");
                                 $("#error7").text('รหัสซ้ำ').show();
                                 $("#year_budget_number").val('');
                            }
                            else
                            {
                               $("#result4" ).html( data );
                                $("#year_budget_number").val('');
                                $("#year_budget_name").val('');
                                alert("บันทึกข้อมูลเรียบร้อยแล้ว");
                            }                
                    }); 
                    
               }
            });
  });
</script>
<!--TYPE BUDGET E -->
<script>
  $(document).ready(function(){
      $("#error9,#error10").hide();
      $("#clear5").click(function(){
                $("#type_budget_number").val('');
                $("#type_budget_name").val('');
                $("#error9,#error10").hide();
             });
          //submit edit form
                            $("#btn_submit5").live('click',function( event ){
                                $.post( "index.php/eqm/type_budget_data/update_type_budget",$("#my_type_budget1").serialize(), function( data ) {
                                       if(data == '200')
                                        {    
                                             alert('แก้ไขข้อมูลเรียบร้อย');
                                             $.post( "index.php/eqm/type_budget_data/index",function( data ) {            
                                                      $("#result5" ).html( data );
                                       });
                                        }
                                        else
                                        {
                                            alert('บันทึกไม่ได้เนื่องจากรหัสซ้ำ');
                                        }
                                        
                                }); 
                            });

                    $(".mm5").live('click',function( event ){         
                          var a = $(this).attr('title');
                           $.confirm({
                              text: "คุณต้องการลบ ประเภทงบประมาณ จริงหรือไม่",
                              confirm: function(button) {
                                  $.post( "index.php/eqm/type_budget_data/delete_content",{'id':a}, function( data ) {
                                     alert(data);
                                     $.post( "index.php/eqm/type_budget_data/index",function( data ) {            
                                          $("#result5" ).html( data );
                                      });
                                  });
                              },
                              cancel: function(button) {
                              }
                          });
                       });

                          $.post( "index.php/eqm/type_budget_data/index",function( data ) {            
                                          $("#result5" ).html( data );
                           });
       $("#my_type_budget").submit(function( event ){
              var type_budget_number = $("#type_budget_number").val();
              var type_budget_name   = $("#type_budget_name").val();
               if(type_budget_number == ''){
                    $("#error9").show();
                    event.preventDefault();
               }
               if(type_budget_name == ''){
                    $("#error10").show();
                    event.preventDefault();
               }
                if(type_budget_number != ''){
                    $("#error9").hide();
               }
               if(type_budget_name != ''){
                    $("#error10").hide();
               }
               if(type_budget_number != '' && type_budget_name != ''){
                           
                    $.post( "index.php/eqm/type_budget_data/insert_type_budget",$(this).serialize(), function( data ) {
                            if(data == '200')
                            {   
                                 alert("รหัสประเภทงบประมาณ ซ้ำ");
                                 $("#error9").text('รหัสซ้ำ').show();
                                 $("#type_budget_number").val('');
                            }
                            else
                            {
                               $("#result5" ).html( data );
                                $("#type_budget_number").val('');
                                $("#type_budget_name").val('');
                                alert("บันทึกข้อมูลเรียบร้อยแล้ว");
                            }                
                    }); 
                    
                    
               }
            });
  });
</script>
<!--BE_UNDER_COMPANY F -->
<script>
  $(document).ready(function(){
      $("#error11,#error12").hide();
      $("#clear6").click(function(){
                $("#be_under_number").val('');
                $("#be_under_name").val('');
                $("#error11,#error12").hide();
             });
          //submit edit form
                            $("#btn_submit6").live('click',function( event ){
                                $.post( "index.php/eqm/be_under_data/update_be_under",$("#my_be_under1").serialize(), function( data ) {
                                        if(data == '200')
                                        {    
                                             alert('แก้ไขข้อมูลเรียบร้อย');
                                              $.post( "index.php/eqm/be_under_data/index",function( data ) {            
                                                      $("#result6" ).html( data );
                                             });
                                        }
                                        else
                                        {
                                            alert('บันทึกไม่ได้เนื่องจากรหัสซ้ำ');
                                        }
                                       
                                }); 
                            });

                      $(".mm6").live('click',function( event ){         
                          var a = $(this).attr('title');
                           $.confirm({
                              text: "คุณต้องการลบ สถานที่ตั้ง/สังกัดหน่วยงาน จริงหรือไม่",
                              confirm: function(button) {
                                  $.post( "index.php/eqm/be_under_data/delete_content",{'id':a}, function( data ) {
                                     alert(data);
                                     $.post( "index.php/eqm/be_under_data/index",function( data ) {            
                                          $("#result6" ).html( data );
                                      });
                                  });
                              },
                              cancel: function(button) {
                              }
                          });
                       });
                          $.post( "index.php/eqm/be_under_data/index",function( data ) {            
                                          $("#result6" ).html( data );
                           });
       $("#my_under_company").submit(function( event ){
              var be_under_number = $("#be_under_number").val();
              var be_under_name   = $("#be_under_name").val();
               if(be_under_number == ''){
                    $("#error11").show();
                    event.preventDefault();
               }
               if(be_under_name == ''){
                    $("#error12").show();
                    event.preventDefault();
               }
                if(be_under_number != ''){
                    $("#error11").hide();
               }
               if(be_under_name != ''){
                    $("#error12").hide();
               }
               if(be_under_number != '' && be_under_name != ''){            
                    $.post( "index.php/eqm/be_under_data/insert_be_under",$(this).serialize(), function( data ) {
                            if(data == '200')
                            {   
                                 alert("รหัสสถานที่ตั้ง/สังกัดหน่วยงาน ซ้ำ");
                                 $("#error11").text('รหัสซ้ำ').show();
                                 $("#be_under_number").val('');
                            }
                            else
                            {
                               $("#result6" ).html( data );
                                $("#be_under_number").val('');
                                $("#be_under_name").val('');
                                alert("บันทึกข้อมูลเรียบร้อยแล้ว");
                            }                
                    });      
               }
            });
  });
</script>
<!--TITLE NAME G -->
<script>
 $(document).ready(function(){
      $("#error13,#error14").hide();
      $("#clear7").click(function(){
                $("#title_name_number").val('');
                $("#title_name").val('');
                $("#error13,#error14").hide();
             });
          //submit edit form
                            $("#btn_submit7").live('click',function( event ){
                                $.post( "index.php/eqm/title_name_data/update_title_name",$("#my_title_name1").serialize(), function( data ) {
                                        if(data == '200')
                                        {    
                                             alert('แก้ไขข้อมูลเรียบร้อย');
                                             $.post( "index.php/eqm/title_name_data/index",function( data ) {            
                                              $("#result7" ).html( data );
                                           });
                                        }
                                        else
                                        {
                                            alert('บันทึกไม่ได้เนื่องจากรหัสซ้ำ');
                                        }
                                        
                                }); 
                            });
                   $(".mm7").live('click',function( event ){         
                          var a = $(this).attr('title');
                           $.confirm({
                              text: "คุณต้องการลบ คำนำหน้าชื่อ จริงหรือไม่",
                              confirm: function(button) {
                                  $.post( "index.php/eqm/title_name_data/delete_content",{'id':a}, function( data ) {
                                     alert(data);
                                     $.post( "index.php/eqm/title_name_data/index",function( data ) {            
                                          $("#result7" ).html( data );
                                     });
                                  });
                              },
                              cancel: function(button) {
                              }
                          });
                       });
                          $.post( "index.php/eqm/title_name_data/index",function( data ) {            
                                          $("#result7" ).html( data );
                           });
       $("#my_title_name").submit(function( event ){
              var title_name_number = $("#title_name_number").val();
              var title_name   = $("#title_name").val();
               if(title_name_number == ''){
                    $("#error13").show();
                    event.preventDefault();
               }
               if(title_name == ''){
                    $("#error14").show();
                    event.preventDefault();
               }
                if(title_name_number != ''){
                    $("#error13").hide();
               }
               if(title_name != ''){
                    $("#error14").hide();
               }
               if(title_name_number != '' && title_name != ''){      
                    $.post( "index.php/eqm/title_name_data/insert_title_name",$(this).serialize(), function( data ) {
                            if(data == '200')
                            {   
                                 alert("รหัสคำนำหน้าชื่อ ซ้ำ");
                                 $("#error13").text('รหัสซ้ำ').show();
                                 $("#title_name_number").val('');
                            }
                            else
                            {
                               $("#result7" ).html( data );
                                $("#title_name_number").val('');
                                $("#title_name").val('');
                                alert("บันทึกข้อมูลเรียบร้อยแล้ว");
                            }                
                    });     
               }
            });
  });
</script>
<!--WORKING GROUP H-->
<script>
$(document).ready(function(){
      $("#error15,#error16").hide();
      $("#clear8").click(function(){
                $("#working_group_number").val('');
                $("#working_group_name").val('');
                $("#error15,#error16").hide();
             });
          //submit edit form
                            $("#btn_submit8").live('click',function( event ){
                                $.post( "index.php/eqm/working_group_data/update_working_group",$("#my_working_group1").serialize(), function( data ) {
                                        if(data == '200')
                                        {    
                                             alert('แก้ไขข้อมูลเรียบร้อย');
                                              $.post( "index.php/eqm/working_group_data/index",function( data ) {            
                                                $("#result8").html( data );
                                            });
                                        }
                                        else
                                        {
                                            alert('บันทึกไม่ได้เนื่องจากรหัสซ้ำ');
                                        }
                                       
                                }); 
                            });
                       $(".mm8").live('click',function( event ){         
                          var a = $(this).attr('title');
                           $.confirm({
                              text: "คุณต้องการลบ กลุ่มงาน จริงหรือไม่",
                              confirm: function(button) {
                                  $.post( "index.php/eqm/working_group_data/delete_content",{'id':a}, function( data ) {
                                     alert(data);
                                      $.post( "index.php/eqm/working_group_data/index",function( data ) {            
                                          $("#result8").html( data );
                                      });
                                  });
                              },
                              cancel: function(button) {
                              }
                          });
                       });
                          $.post( "index.php/eqm/working_group_data/index",function( data ) {            
                                          $("#result8").html( data );
                           });
       $("#my_working_group").submit(function( event ){
              var working_group_number = $("#working_group_number").val();
              var working_group_name   = $("#working_group_name").val();
               if(working_group_number == ''){
                    $("#error15").show();
                    event.preventDefault();
               }
               if(working_group_name == ''){
                    $("#error16").show();
                    event.preventDefault();
               }
                if(working_group_number != ''){
                    $("#error15").hide();
               }
               if(working_group_name != ''){
                    $("#error16").hide();
               }
               if(working_group_number != '' && working_group_name != ''){  
                   
                    $.post( "index.php/eqm/working_group_data/insert_working_group",$(this).serialize(), function( data ) {
                            if(data == '200')
                            {   
                                 alert("รหัสกลุ่มงาน ซ้ำ");
                                 $("#error15").text('รหัสซ้ำ').show();
                                 $("#working_group_number").val('');
                            }
                            else
                            {
                               $("#result8" ).html( data );
                                $("#working_group_number").val('');
                                $("#working_group_name").val('');
                                alert("บันทึกข้อมูลเรียบร้อยแล้ว");
                            }                
                    }); 
                        
               }
            });
  });

</script>