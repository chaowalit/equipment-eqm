<table class="table  table-bordered" id="dataTables-example">
    <thead class = "hd1">
        <tr>
            <th>เลขที่ใบแจ้งซ่อม</th>
            <th>วันที่ส่งซ่อม</th>
            <th>หมายเลขครุภัณฑ์</th>
            <th>รายการครุถัณฑ์</th>
            <th>สาเหตุการแจ้งซ่อม</th>
            <th>บริษัท/ห้างร้านที่ส่งซ่อม</th>
            <th>ราคาซ่อม</th>
            <th width="90px">สถานะใช้งาน</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data_repair as $row){ ?>
        <tr id="<?php echo $row->id; ?>" style="cursor:pointer">
            <td class="menu_eqm"><?php echo $row->repair_number; ?></td>
            <td class="menu_eqm"><?php echo date('d/m/Y',strtotime($row->repair_date_send)); ?></td>
            <td class="menu_eqm"><?php echo $row->eqm_numbers1.'-'.$row->eqm_numbers2.'-'.$row->eqm_numbers3.'/'.$row->eqm_amout_number; ?></td>
            <td class="menu_eqm"><?php echo $row->eqm_names; ?></td>
            <td class="menu_eqm"><?php echo $row->symptoms_repair; ?></td>
            <td class="menu_eqm"><?php echo $row->company_name; ?></td>
            <td class="menu_eqm"><?php echo $row->price_repair; ?></td>
            <td>
                <?php if($row->file_attach_repair){ ?>
                    <a href="<?php echo base_url('upload/eqm_repair/'.$row->file_attach_repair); ?>upload/eqm_repair/<?php echo $row->file_attach_repair; ?>" target="_blank" class="delete-hover"><img src="<?php echo base_url(); ?>icon/attach-icon.png" title="เอกสารแนบ" style="width: 25px;height: 25px;"></a>
                <?php } ?>
                <img src="<?php echo base_url(); ?>icon/status-away.png" title="กำลังรอการซ่อม" style="width: 25px;height: 25px;">
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<input type="hidden" id="repair_id" name="repair_id">


<script type="text/javascript">
    $(function() {
        $('#dataTables-example').dataTable();
        
        $('html').click(function(){
            $("#dataTables-example tbody tr").removeClass("highlighted");
        });
        
        $(".paginate_button a").live('click',function(){
            context_menu();
        });     
        
        $("#dataTables-example tbody tr").click(function(event) {
            var repair_id = $(this).attr('id');
            $('#repair_id').val(repair_id);
            
            $("#dataTables-example tbody tr").removeClass("highlighted");
            var selected = $(this).hasClass("highlighted");
            //$("#dataTables-example tbody tr").removeClass("highlighted");
            if(!selected){ 
                $(this).addClass("highlighted");
            }
            else
            {
                //$("#dataTables-example tbody tr").removeClass("highlighted");
            }
            event.stopPropagation();
        });
        context_menu(); 
    });
    
    function context_menu()
    {
        $(".menu_eqm").live().contextMenu(menu); 
    }
    
     var menu = [{
                    name: 'ปรับปรุงทะเบียนแจ้งซ่อมครุภัณฑ์',
                    img: 'icon/edit.png',
                    title: 'ปรับปรุงทะเบียนแจ้งซ่อมครุภัณฑ์',
                    fun: function () {
                        var repair_id = $("#repair_id").val();
                        //alert(repair_id);
                        load_delay();
                        setTimeout('$.colorbox.close()', 1000);
                        
                        $( ".clickable" ).hide();
                        $("#disabled_button").hide();
                        $('#check_eqm_repair_no').hide();
                        $('#btn_save_eqm_repair').html('ปรับปรุงทะเบียนแจ้งซ่อมครุภัณฑ์');
                        
                        var checking = $( "#clickable" ).live().attr('class');
                        if(checking == "pull-right clickable panel-collapsed"){
                            $( ".clickable" ).live().click();
                            
                        }else{
                            
                        }
                        //alert(repair_id);
                        $.ajax({
                            type:"POST",
                            url:"<?php echo base_url(); ?>index.php/eqm/eqm_repair/getDataEditRepair",
                            data:{ repair_id:repair_id },
                            dataType: 'json',
                            success:function(result){
                               
                                var obj = result;
                                var str1 = obj[0]['repair_date_notify'];
                                var res1 = str1.split("-");
                                
                                var str2 = obj[0]['repair_date_send'];
                                var res2 = str2.split("-");
                                
                                var str3 = obj[0]['repair_date_receive'];
                                //alert(obj[0]['repair_date_receive']+'0');
                                if(str3){
                                    var res3 = str3.split("-");
                                    //alert(obj[0]['repair_date_send']+'1');
                                }else{
                                    var res3 = new Array('','','');
                                    //alert(obj[0]['repair_date_send']+'2');
                                }
                                
                                //alert(repair_id+'kkk');
                                
                                $('#equipment_number').val(obj[0]['eqm_numbers1']+'-'+obj[0]['eqm_numbers2']+'-'+obj[0]['eqm_numbers3']+'/'+obj[0]['eqm_amout_number']);
                                $('#equipment_name').val(obj[0]['eqm_names']);
                                $('#repair_number').val(obj[0]['repair_number']);
                                $('#repair_date_notify').val(res1[2]+'-'+res1[1]+'-'+res1[0]);
                                $('#repairing_user_notify').val(obj[0]['full_name']);
                                $('#repairing_user_notify_id').val(obj[0]['repairing_user_notify_id']);
                                $('#symptoms_repair').val(obj[0]['symptoms_repair']);
                                $('#repair_company_id').val(obj[0]['repair_company_id']);
                                $('#repair_No').val(obj[0]['repair_No']);
                                $('#repair_date_send').val(res2[2]+'-'+res2[1]+'-'+res2[0]);
                                $('#repair_send_method').val(obj[0]['repair_send_method']);
                                $('#comment').val(obj[0]['comment']);
                                
                                $('#equipment_id').val(obj[0]['equipment_id']);
                                $('#repair_id').val(obj[0]['id']);
                                $('#image_old_repair').val(obj[0]['file_attach_repair']);
                                $('#show_repair_id').val(obj[0]['id']);
                                $('#show_repair_company').val(obj[0]['repair_company_id']);
                                $('#show_repair_No').val(obj[0]['repair_No']);
                                $('#show_symptoms_repair').val(obj[0]['symptoms_repair']);
                                $('#show_equipment_id').val(obj[0]['equipment_id']);
                                $('#show_equipment_status').val(obj[0]['repair_finish']);
                                if(res3[0] != ''){
                                    $('#repair_date_receive').val(res3[2]+'-'+res3[1]+'-'+res3[0]);
                                }else{
                                    $('#repair_date_receive').val('');
                                }
                                
                                $('#repairing_checking').val(obj[0]['repairing_checking']);
                                $('#price_repair').val(obj[0]['price_repair']);
                                
                                if($('#step3').attr('class') == "disabled"){
                                    $('#step2').attr('class','active');
                                    $('#step1').removeClass("active");
                                    $('#step2_click').click();
                                }else{
                                    $('#step3').attr('class','active');
                                    $('#step1').removeClass("active");
                                    $('#step3_click').click();
                                }
                            }
                        }); 
                    }
                }];
    $('.menu_eqm').contextMenu(menu);
    
    function load_delay(){
        $.colorbox({
            html: "<img src=\"<?php echo base_url(); ?>assets/32.gif\" style=\"width:100%;height:100%;\" alt=\"The linked image\" />",
            scalePhotos:false,
            open:true
            //escKey: false,
            //overlayClose: false,
            //scrolling:false,
            //closeButton:false
        });
    }
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
</style>
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