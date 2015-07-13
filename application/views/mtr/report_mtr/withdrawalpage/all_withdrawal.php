
<div class="panel panel-primary">
    <div class="panel-heading">
         <h3 class="panel-title">
                            คุณอยู่ที่ >> บันทึกข้อมูลทะเบียน >> รายงานการเบิกวัสดุทั้งหมด</h3>
        <!--<span class="pull-right clickable panel-collapsed" id="clickable"><i class="glyphicon glyphicon-plus"></i></span>-->
    </div>
</div>
<div style = "margin-left:10px;margin-right:10px;">
    <h2><b>รายงานการเบิกวัสดุทั้งหมด</b></h2>
<table class="table  table-bordered" id="dataTables-example">
    <thead class = "hd1">
        <tr>
            <th>เลขที่ใบเบิก</th>
            <th>วันที่เบิก</th>
            <th>ผู้เบิก</th>
            <th>ประเภท</th>
            <th>รายการที่เบิก</th> 
            <th>ยอดปัจจุบัน<br/>ยอด(ก่อนเบิก)</th>
            <th>จำนวนเบิก<br/>(ยอดเบิก)</th>    
            <th>ยอดคงเหลือ <br/>ณ ตอนนั้น</th>  
             <th>หน่วย</th>          
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($all_withdrawal as $row){
        ?>
        <tr>
            <td><?php echo $row['withdrawal_number'];?></td>
            <td><?php echo date('d/m/Y',strtotime($row['withdrawal_date']))?></td>
            <td><?php echo $row['full_name'];?></td>
            <td><?php echo $row['group_type_names'];?></td>
            <td><?php echo $row['materials_name'];?></td>
            <td><?php echo $row['balance_current'];?></td>
            <td><?php echo $row['amount_withdrawal_last'];?></td>
            <td><?php echo ($row['balance_current']-$row['amount_withdrawal_last']);?></td>
            <td><?php echo $row['mtr_unit'];?></td>
        </tr>  
        <?php }?>
    </tbody>
</table>
  <center><a class = "btn btn-primary btn-lg" id = "report_pdf1" href = "index.php/report/report_button_print/mtr_all_withdrawal" target = "_blank">ส่งออก PDF</a>&nbsp;<!--<a class = "btn btn-primary btn-lg" id = "report_pdf1" href = "index.php/report/report_button_print/report_main1_2" target = "_blank">ปริ้นรายงาน</a>--></center>

</div>
<input type="hidden" name="materials_id" id="materials_id">

<script type="text/javascript">
    $(function() {
        $('#dataTables-example').dataTable({
            "order": [[ 1, "asc" ]]
        });
        
        $('html').click(function(){
            $("#dataTables-example tbody tr").removeClass("highlighted");
        });
        
        $(".paginate_button a").live('click',function(){
            context_menu();
        });     
        
        $("#dataTables-example tbody tr").click(function(event) {
            var materials_id = $(this).attr('id');
            $('#materials_id').val(materials_id);
            
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
        $(".menu_mtr_register").live().contextMenu(menu); 
    }
    var menu = [{
        name: 'รายงานการนำเข้า',
        img: 'icon/report.png',
        title: 'รายงานการนำเข้า',
        fun: function () {
          //alert($("#materials_id").val()); 
            var id = $("#materials_id").val();
            var url = "<?php echo base_url();?>index.php/mtr/purchasing_report/gen_report"+"/"+id;
             window.open(url, '_blank');

        }
    }];
    $('.menu_mtr_register').contextMenu(menu);
</script>
<style>
    .highlighted {
          color: #261F1D !important;
          background-color:#98FBF9 !important;
         }
     .iw-mSelected {
      background-color: #0099FF;
      color: #F2F2F2;
     }
</style>