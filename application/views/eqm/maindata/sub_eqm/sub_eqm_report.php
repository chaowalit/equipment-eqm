                             <style>
                                .report_style{
                                    margin-left: 10px!important;
                                }
                             </style>  
                             <div class="panel panel-primary">
                               <div class="panel-heading">
                                    <h3 class="panel-title">
                                       คุณอยู่ที่ >> บันทึกข้อมูลทะเบียน >> มูลค่าทรัพย์สินสุทธิ</h3>
                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
                                </div>
                                <div class = "report_style">
                                    <h3><b>มูลค่าทรัพย์สินสุทธิ</b></h3><br/>
                                <table class="table  table-bordered " id="sub1">
                                    <thead class = "hd1">
                                        <tr>
                                            <th>วันที่</th>
                                            <th>ที่เอกสาร</th>
                                            <th>หมายเลขครุภัณฑ์</th>
                                            <th>รายการ</th>
                                            <th>จำนวน</th>
                                            <th>ราคา/หน่วย</th>
                                            <th>มูลค่า</th>
                                            <th>อายุการใช้งาน</th>
                                            <th>ค่าเสื่อมราคา</th>
                                            <!--<th>สถานะการใช้งาน</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($eqm as $row) {
                                        ?>

                                        <tr  style="cursor:pointer" id = "<?php echo $row['eqm_id'];?>">
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo date('d/m/Y',strtotime($row['cdate']))?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['report_number'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['eqm_numbers1']."-".$row['eqm_numbers2']."-".$row['eqm_numbers3']."/".$row['eqm_amout_number'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['eqm_names'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['eqm_unit_set'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['eqm_price_unit'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['cost_total'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['depreciation_age'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php if($row['cost_total'] < 5000){echo "-";}else{echo $row['depreciation_year'];}?></td>
                                           <!--
                                            <td class  =  "testButton">
                                                <?php if($row['eqm_status'] == "ready"){?>
                                                    <img src = "icon/status.png" width = "25px"/><span style = "color:green;"><b>ใช้งานได้</b></span>
                                                <?php }?>
                                                <?php if($row['eqm_status'] == "waste"){?>
                                                    <img src = "icon/status-busy.png" width = "25px"/><span style = "color:green"><b>ใช้งานไม่ได้</b></span>
                                                <?php }?>
                                                <?php if($row['eqm_status'] == "transfer"){?>
                                                    <img src = "icon/status.png" width = "25px"/><span style = "color:green"><b>โอนไปแล้ว</b></span>
                                                <?php }?>
                                                <?php if($row['eqm_status'] == "distribution"){?>
                                                    <img src = "icon/status-busy.png" width = "25px"/><span style = "color:green"><b>แทงจำหน่ายแล้ว</b></span>
                                                <?php }?>
                                                <?php if($row['eqm_status'] == "repair"){?>
                                                    <img src = "icon/status-away.png" width = "25px"/><span style = "color:green"><b>กำลังส่งซ่อม</b></span>
                                                <?php }?>
                                            </td>
                                        -->
                                        </tr>
                                       <?php }?>
                                    </tbody>
                                </table>
                                 <center><a class = "btn btn-primary btn-lg" id = "report_pdf1" href = "index.php/report/report_button_print/report_main1_1" target = "_blank">ส่งออก PDF</a>&nbsp;<!--<a class = "btn btn-primary btn-lg" id = "report_pdf1" href = "index.php/report/report_button_print/report_main1_2" target = "_blank">ปริ้นรายงาน</a>--></center>
                             </div>
                            </div>
                                <input type = "hidden" id = "hideo" />
                                <input type="hidden" id="temp" name="temp" value="temp">
                                <script>
                                $(document).ready(function() {
                                    $( ".clickable" ).live().click(function(){
                                        if($('#temp').val() == "temp"){
                                            $('#temp').val('');
                                        }else{
                                            $('#temp').val("temp");
                                        }
                                    });
                                    $('#sub1').dataTable({
                                        "order": [[ 0, "desc" ]]
                                    });
                                });
                                </script>
                                  <script>
                                        $(document).ready(function(){

                                            $('html').click(function(){
                                                $("#sub1 tbody tr").removeClass("highlighted");
                                            });
                                            //var gg ;
                                            $(".paginate_button a").live('click',function(){
                                                context_menu();
                                            });         
                                            $(".testButton").contextMenu(menu); 
                                            $("#sub1 tbody tr").live('click',function() {
                                                    context_menu();
                                                    var id = $(this).attr('id');  
                                                    $("#hideo").val(id);
                                                    var selected = $(this).hasClass("highlighted");
                                                    $("#sub1 tbody tr").removeClass("highlighted");
                                                    if(!selected){ 
                                                            $(this).addClass("highlighted");
                                                    }
                                                    else
                                                    {
                                                        //$("#sub1 tbody tr").removeClass("highlighted");
                                                    }
                                                });
                                        });
                                           
                                            var menu = [{
                                            name: 'รายงานทะเบียนทรัพย์สิน(หน้า)',
                                            img: 'icon/report.png',
                                            title: 'รายงานทะเบียนทรัพย์สิน(หน้า)',
                                            fun: function () {
                                                   var id = $("#hideo").val();
                                                   var url = "<?php echo site_url('report/report_eqm/gen_pdf_front');?>"+"/"+id;
                                                   window.open(url, '_blank');
                                            }
                                        }];
                                        context_menu();
                                        function context_menu()
                                        {
                                            $(".testButton").live().contextMenu(menu); 
                                        }
                                   </script>
                                   <style>
                                      .highlighted {
                                            color: #261F1D !important;
                                            background-color:#FFBC67 !important;
                                           }
                                       .iw-mSelected {
                                        background-color: #FF6633;
                                        color: #F2F2F2;
                                       }
                                   </style>
