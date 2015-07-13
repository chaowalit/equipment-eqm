<table class="table  table-bordered" id="dataTables-example">
    <thead class = "hd1">
        <tr>
            <th>เลขที่ใบแทงจำหน่าย</th>
            <th>วันที่แทงจำหน่าย</th>
            <th>หมายเลขครุภัณฑ์</th>
            <th>รายการครุถัณฑ์</th>
            <th>ประเภทแทงจำหน่าย</th>
            <th>บริษัท/ห้างร้านที่ซื้อ</th>
            <th>ราคาซื้อ</th>
            <th width="90px">สถานะใช้งาน</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($EqmDistribution as $row){ ?>
        <tr id="<?php echo $row->eqm_distribution_id; ?>" style="cursor:pointer">
            <td class="menu_eqm"><?php echo $row->distribution_number; ?></td>
            <td class="menu_eqm"><?php echo date('d/m/Y',strtotime($row->distribution_date)); ?></td>
            <td class="menu_eqm"><?php echo $row->eqm_numbers1.'-'.$row->eqm_numbers2.'-'.$row->eqm_numbers3.'/'.$row->eqm_amout_number; ?></td>
            <td class="menu_eqm"><?php echo $row->eqm_names; ?></td>
            <td class="menu_eqm"><?php echo $row->type_distribution; ?></td>
            <td class="menu_eqm"><?php echo $row->company_name; ?></td>
            <td class="menu_eqm"><?php echo $row->price; ?></td>
            <td>
                <?php if($row->file_attach_distribution){ ?>
                    <a href="<?php echo base_url('upload/eqm_distribution/'.$row->file_attach_distribution); ?>upload/eqm_distribution/<?php echo $row->file_attach_distribution; ?>" target="_blank" class="delete-hover"><img src="<?php echo base_url(); ?>icon/attach-icon.png" title="เอกสารแนบ" style="width: 25px;height: 25px;"></a>
                <?php } ?>
                <img src="<?php echo base_url(); ?>icon/status-busy.png" title="ใช้งานไม่ได้" style="width: 25px;height: 25px;">
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<input type="hidden" id="distribution_id" name="distribution_id">


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
            var distribution_id = $(this).attr('id');
            $('#distribution_id').val(distribution_id);
            
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
                    name: 'ปรับปรุงทะเบียนแทงจำหน่ายครุภัณฑ์',
                    img: 'icon/edit.png',
                    title: 'ปรับปรุงทะเบียนแทงจำหน่ายครุภัณฑ์',
                    fun: function () {
                        var distribution_id = $("#distribution_id").val();
                        
                        load_delay();
                        setTimeout('$.colorbox.close()', 1000);
                        
                        $( ".clickable" ).hide();
                        $("#disabled_button").hide();
                        $('#btn_save_eqm_distribution').html('ปรับปรุงทะเบียนแทงจำหน่ายครุภัณฑ์');
                        
                        var checking = $( "#clickable" ).live().attr('class');
                        if(checking == "pull-right clickable panel-collapsed"){
                            $( ".clickable" ).live().click();
                            
                        }else{
                            
                        }
                        
                        $.ajax({
                            type:"POST",
                            url:"<?php echo base_url(); ?>index.php/eqm/eqm_distribution/getDataEditDistribution",
                            data:{ distribution_id:distribution_id },
                            dataType: 'json',
                            success:function(result){
                                var obj = result;
                                var str = obj[0]['distribution_date'];
                                var res = str.split("-");
                                
                                $('#equipment_number').val(obj[0]['barcode']);
                                $('#equipment_name').val(obj[0]['eqm_names']);
                                $('#distribution_number').val(obj[0]['distribution_number']);
                                $('#distribution_date').val(res[2]+'-'+res[1]+'-'+res[0]);
                                $('#type_distribution').val(obj[0]['type_distribution']);
                                $('#price').val(obj[0]['price']);
                                $('#comment').val(obj[0]['comment']);
                                $('#equipment_id').val(obj[0]['equipment_id']);
                                $('#distribution_id').val(obj[0]['id']);
                                $('#image_old_distribution').val(obj[0]['file_attach_distribution']);
                                
                                $('#company_distribution').select2('val',obj[0]['company_distribution_id']);
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