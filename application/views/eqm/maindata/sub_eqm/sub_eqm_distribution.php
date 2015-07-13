 <div class="panel panel-primary">
                               <div class="panel-heading">
                                    <h3 class="panel-title">
                                       คุณอยู่ที่ >> บันทึกข้อมูลทะเบียน >> ทะเบียนการแทงจำหน่าย</h3>
                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
                                </div>
<div class = "padd">
    <h3><b>ทะเบียนการแทงจำหน่าย</b></h3><br/>
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
            <!--<th width="90px">สถานะใช้งาน</th>-->
        </tr>
    </thead>
    <tbody>
        <?php foreach($EqmDistribution as $row){ ?>
        <tr id="<?php echo $row->equipment_id; ?>" style="cursor:pointer">
            <td class="menu_eqm"><?php echo $row->distribution_number; ?></td>
            <td class="menu_eqm"><?php echo date('d/m/Y',strtotime($row->distribution_date)); ?></td>
            <td class="menu_eqm"><?php echo $row->eqm_numbers1."-".$row->eqm_numbers2."-".$row->eqm_numbers3."/".$row->eqm_amout_number; ?></td>
            <td class="menu_eqm"><?php echo $row->eqm_names; ?></td>
            <td class="menu_eqm"><?php echo $row->type_distribution; ?></td>
            <td class="menu_eqm"><?php echo $row->company_name; ?></td>
            <td class="menu_eqm"><?php echo $row->price; ?></td>
            <!--
            <td>
                <?php if($row->file_attach_distribution){ ?>
                    <a href="<?php echo base_url('upload/eqm_distribution/'.$row->file_attach_distribution); ?>upload/eqm_distribution/<?php echo $row->file_attach_distribution; ?>" target="_blank" class="delete-hover"><img src="<?php echo base_url(); ?>icon/attach-icon.png" title="เอกสารแนบ" style="width: 25px;height: 25px;"></a>
                <?php } ?>
                <img src="<?php echo base_url(); ?>icon/status-busy.png" title="ใช้งานไม่ได้" style="width: 25px;height: 25px;">
            </td>
           -->
        </tr>
        <?php } ?>
    </tbody>
</table>
  <center><a class = "btn btn-primary btn-lg" id = "report_pdf6" href = "index.php/report/report_button_print/report_distribution1_1" target = "_blank">ส่งออก PDF</a>&nbsp;<!--<a class = "btn btn-primary btn-lg" id = "report_pdf6" href = "index.php/report/report_button_print/report_distribution1_2" target = "_blank">ปริ้นรายงาน</a>--></center>
</div>
</div>
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
                    name: 'รายงานการแทงจำหน่ายครุภัณฑ์นี้',
                    img: 'icon/edit.png',
                    title: 'รายงานการแทงจำหน่ายครุภัณฑ์นี้',
                    fun: function () {
                        var distribution_id = $("#distribution_id").val();
                        var url = "<?php echo site_url('report/report_eqm/gen_report_distribution');?>"+"/"+distribution_id;
                        window.open(url, '_blank');
                    }
                }];
    $('.menu_eqm').contextMenu(menu);
    
    function load_delay(){
        $.colorbox({
            html: "<img src=\"<?php echo base_url(); ?>assets/32.gif\" style=\"width:100%;height:100%;\" alt=\"The linked image\" />",
            scalePhotos:false,
            open:true
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