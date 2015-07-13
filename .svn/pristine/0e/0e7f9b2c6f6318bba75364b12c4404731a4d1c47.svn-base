<table class="table  table-bordered" id="dataTables-example">
    <thead class = "hd1">
        <tr>
            <th>เลขที่ใบโอน</th>
            <th>วันที่โอน</th>
            <th>หมายเลขครุภัณฑ์</th>
            <th>รายการครุถัณฑ์</th>
            <th>โอนจาก</th>
            <th>สังกัดหน่วยงาน</th>
            <th>ผู้ใช้งาน</th>
            <th width="90px">สถานะใช้งาน</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($EqmTransfer as $row){ ?>
        <tr id="<?php echo $row->id; ?>" style="cursor:pointer">
            <td class="menu_eqm"><?php echo $row->transfer_number; ?></td>
            <td class="menu_eqm"><?php echo date('d/m/Y',strtotime($row->transfer_date)); ?></td>
            <td class="menu_eqm"><?php echo $row->eqm_numbers1.'-'.$row->eqm_numbers2.'-'.$row->eqm_numbers3.'/'.$row->eqm_amout_number; ?></td>
            <td class="menu_eqm"><?php echo $row->eqm_names; ?></td>
            <td class="menu_eqm"><?php echo $user_account[$row->transfer_from_account_id]; ?></td>
            <td class="menu_eqm"><?php echo $workgroup[$row->transfer_from_workgroup_id]; ?></td>
            <td class="menu_eqm"><?php echo $user_account[$row->transferee_account_id]; ?></td>
            <td>
                <?php if($row->file_attach){ ?>
                    <a href="<?php echo base_url('upload/eqm_transfer/'.$row->file_attach); ?>upload/eqm_transfer/<?php echo $row->file_attach; ?>" target="_blank" class="delete-hover"><img src="<?php echo base_url(); ?>icon/attach-icon.png" title="เอกสารแนบ" style="width: 25px;height: 25px;"></a>
                <?php } ?>
                <img src="<?php echo base_url(); ?>icon/status.png" title="ใช้งานได้" style="width: 25px;height: 25px;">
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<input type="hidden" id="transfer_id" name="transfer_id">

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
            var transfer_id = $(this).attr('id');
            $('#transfer_id').val(transfer_id);
            
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
                    name: 'ปรับปรุงทะเบียนการโอนครุภัณฑ์',
                    img: 'icon/edit.png',
                    title: 'ปรับปรุงทะเบียนการโอนครุภัณฑ์',
                    fun: function () {
                        var transfer_id = $("#transfer_id").val();
                        //alert(transfer_id);
                        load_delay();
                        setTimeout('$.colorbox.close()', 1000);
                        
                        $( ".clickable" ).hide();
                        $("#disabled_button").hide();
                        $('#btn_save_eqm_transfer').html('ปรับปรุงทะเบียนการโอนครุภัณฑ์');
                        
                        var checking = $( "#clickable" ).live().attr('class');
                        if(checking == "pull-right clickable panel-collapsed"){
                            $( ".clickable" ).live().click();
                            
                        }else{
                            
                        }
                        
                        $.ajax({
                            type:"POST",
                            url:"<?php echo base_url(); ?>index.php/eqm/eqm_transfer/getDataEditTransfer",
                            data:{ transfer_id:transfer_id },
                            dataType: 'json',
                            success:function(result){
                                var obj = result;
                                var str = obj[0]['transfer_date'];
                                var res = str.split("-");
                                
                                $('#equipment_number').val(obj[0]['eqm_numbers1']+'-'+obj[0]['eqm_numbers2']+'-'+obj[0]['eqm_numbers3']+'/'+obj[0]['eqm_amout_number']);
                                $('#equipment_id').val(obj[0]['equipment_id']);
                                $('#equipment_name').val(obj[0]['eqm_names']);
                                $('#transfer_number').val(obj[0]['transfer_number']);
                                $('#comment').val(obj[0]['comment']);
                                $('#transfer_date').val(res[2]+'-'+res[1]+'-'+res[0]);
                                $('#transfer_id').val(obj[0]['id']);
                                $('#file_repair_old').val(obj[0]['file_attach']);
                                
                                
                                if(obj[0]['transfer_to_workgroup_id'].length > 0){
                                    $.ajax({
                                        type:"POST",
                                        url:"<?php echo base_url(); ?>index.php/eqm/eqm_transfer/getDataUserAccountWithWorkGroup",
                                        data:{ workgroup_id : obj[0]['transfer_to_workgroup_id'] },
                                        dataType: 'html',
                                        success:function(result){
                                            $("#transferee_user").html(result);
                                            $('#transferee_user').val(obj[0]['transferee_account_id']);
                                        }
                                    }); 
                                }else{
                                    $("#transferee_user").html("<option value=''>--เลือกผู้รับโอน--</option>");
                                }
                                $('#workgroup').val(obj[0]['transfer_to_workgroup_id']);
                                
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