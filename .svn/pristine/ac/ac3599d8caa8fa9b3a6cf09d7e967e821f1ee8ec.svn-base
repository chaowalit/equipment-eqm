 <div class="panel panel-primary">
                               <div class="panel-heading">
                                    <h3 class="panel-title">
                                       คุณอยู่ที่ >> บันทึกข้อมูลทะเบียน >> ทะเบียนการโอน</h3>
                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
                                </div>
<div class = "padd">
    <h3><b>ทะเบียนการโอน</b></h3><br/>
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
            <!--<th width="90px">สถานะใช้งาน</th>-->
        </tr>
    </thead>
    <tbody>
        <?php foreach($EqmTransfer as $row){ ?>
        <tr id="<?php echo $row->equipment_id; ?>" style="cursor:pointer">
            <td class="menu_eqm"><?php echo $row->transfer_number; ?></td>
            <td class="menu_eqm"><?php echo date('d/m/Y',strtotime($row->transfer_date)); ?></td>
            <td class="menu_eqm"><?php echo $row->eqm_numbers1."-".$row->eqm_numbers2."-".$row->eqm_numbers3."/".$row->eqm_amout_number; ?></td>
            <td class="menu_eqm"><?php echo $row->eqm_names; ?></td>
            <td class="menu_eqm"><?php echo $user_account[$row->transfer_from_account_id]; ?></td>
            <td class="menu_eqm"><?php echo $workgroup[$row->transfer_from_workgroup_id]; ?></td>
            <td class="menu_eqm"><?php echo $user_account[$row->transferee_account_id]; ?></td>
           <!--
            <td>
                <?php if($row->file_attach){ ?>
                    <a href="<?php echo base_url('upload/eqm_transfer/'.$row->file_attach); ?>upload/eqm_transfer/<?php echo $row->file_attach; ?>" target="_blank" class="delete-hover"><img src="<?php echo base_url(); ?>icon/attach-icon.png" title="เอกสารแนบ" style="width: 25px;height: 25px;"></a>
                <?php } ?>
                <img src="<?php echo base_url(); ?>icon/status.png" title="ใช้งานได้" style="width: 25px;height: 25px;">
            </td>
           -->
        </tr>
        <?php } ?>
    </tbody>
</table>
  <center><a class = "btn btn-primary btn-lg" id = "report_pdf5" href = "index.php/report/report_button_print/report_transfer1_1" target = "_blank">ส่งออก PDF</a>&nbsp;<!--<a class = "btn btn-primary btn-lg" id = "report_pdf5" href = "index.php/report/report_button_print/report_transfer1_2" target = "_blank">ปริ้นรายงาน</a>--></center>
</div>
</div>
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
                    name: 'รายงานการโอนครุภัณฑ์นี้',
                    img: 'icon/edit.png',
                    title: 'รายงานการโอนครุภัณฑ์นี้',
                    fun: function () {
                       var id = $("#transfer_id").val();
                       var url = "<?php echo site_url('report/report_eqm/gen_report_transfer');?>"+"/"+id;
                       window.open(url, '_blank');
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
    .padd{
        margin-top: 10px;
        margin-left:10px;
        margin-right: 10px;
    }
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