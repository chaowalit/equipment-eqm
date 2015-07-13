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
                                            <th>สถานะการใช้งาน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($eqm as $row) {
                                        ?>

                                        <tr  style="cursor:pointer" id = "<?php echo $row['eqm_id'];?>">
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo date('d/m/Y',strtotime($row['aa']))?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['report_number'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['group_type_numbers']."-".$row['type_numbers']."-".$row['detail_numbers'].'/'.$row['eqm_amout_number'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['detail_names'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['eqm_unit_set'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['eqm_price_unit'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['cost_total'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['depreciation_age'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php if($row['cost_total'] < 5000){echo "-";}else{echo $row['depreciation_year'];}?></td>
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
                                        </tr>
                                       <?php }?>
                                    </tbody>
                                </table>

                                <input type = "hidden" id = "hideo" />
                                <input type = "hidden" id = "curent_url" />
                                <input type="hidden" id="temp" name="temp" value="temp">
                                <script>
                                $(document).ready(function() {

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
                                                     //alert(document.URL);
                                                     $("#curent_url").val(document.URL);
                                                     var checking = $( "#clickable" ).live().attr('class');
                                                        if(checking == "pull-right clickable panel-collapsed"){
                                                            $( ".clickable" ).live().click();
                                                            
                                                        }else{
                                                            
                                                        }
                                                    context_menu();
                                                    var id = $(this).attr('id');  
                                                    $("#hideo").val(id);
                                                    //$("#curent_url").val(document.URL);
                                                    
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
                                                   //var curent_url = $("#curent_url").val();
                                                   //alert(curent_url);
                                                   var url = "<?php echo site_url('report/report_eqm/gen_pdf_front');?>"+"/"+id;
                                                   window.open(url, '_blank');
                                            }
                                        }, {
                                            name: 'รายงานทะเบียนทรัพย์สิน(หลัง)',
                                            img: 'icon/report.png',
                                            title: 'รายงานทะเบียนทรัพย์สิน(หลัง)',
                                            fun: function () {
                                               var id = $("#hideo").val();
                                                   var url = "<?php echo site_url('report/report_eqm/gen_pdf_back');?>"+"/"+id;
                                                   window.open(url, '_blank');
                                            }
                                        }, {
                                            name: 'ปรับปรุงทะเบียนทรัพย์สิน',
                                            img: 'icon/edit.png',
                                            title: 'ปรับปรุงทะเบียนทรัพย์สิน',
                                            fun: function () {
                                                    $("#add_new_eqm").show();
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
                                                       $("#g_barcode").html('<img src="<?php echo base_url();?>bc/barcode.php/?text='+data[0]['eqm_numbers1']+"-"+data[0]['eqm_numbers2']+"-"+data[0]['eqm_numbers3']+"/"+data[0]['eqm_amout_number']+'"/>');
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
                                             }
                                        }, {
                                            name: 'บันทึกทะเบียนซ่อมทรัพย์สิน',
                                            img: 'icon/edit.png',
                                            title: 'บันทึกทะเบียนซ่อมทรัพย์สิน',
                                            fun: function () {
                                                var id = $("#hideo").val();
                                                   var url = "<?php echo site_url('eqm/eqm_repair/index/');?>"+"/"+id;
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
