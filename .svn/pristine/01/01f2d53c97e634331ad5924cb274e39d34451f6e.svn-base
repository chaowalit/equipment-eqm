<?php $this->load->view('include/mtr/header'); ?>

<div class="panel panel-primary">
    <div class="panel-heading">
         <h3 class="panel-title">
                            คุณอยู่ที่ >> บันทึกข้อมูลทะเบียน >> รายงานการนำเข้า</h3>
        <!--<span class="pull-right clickable panel-collapsed" id="clickable"><i class="glyphicon glyphicon-plus"></i></span>-->
    </div>
</div>
<div style = "margin-left:10px;margin-right:10px;">
    <h2><b>รายงานการนำเข้า(การจัดซื้อวัสดุ)</b></h2>
<table class="table  table-bordered" id="dataTables-example">
    <thead class = "hd1">
        <tr>
            <th>เลขที่ใบสั่งซื้อ</th>
            <th>วันที่สั่งซื้อ</th>
            <th>วันที่รับวัสดุ</th>
            <th>บริษัท/หจก.</th>
            <th>เลขที่ใบส่งของ</th>         
        </tr>
    </thead>
    <tbody>
        
        <?php 
            foreach($get_purchasing as $row){
        ?>
        <tr id="<?php echo $row['ids']; ?>" style="cursor:pointer">
            <td class="menu_mtr_register"><?php echo $row['invoice_number']; ?></td>
            <td class="menu_mtr_register"><?php echo date('d/m/Y',strtotime($row['date_of_purchasing']))?></td>
            <td class="menu_mtr_register"><?php echo date('d/m/Y',strtotime($row['date_of_recieve_mtr']))?></td>
            <td class="menu_mtr_register"><?php echo $row['company_name']; ?></td>
            <td class="menu_mtr_register"><?php echo $row['purchasing_number']; ?></td>
        </tr>

        <?php } ?>
    </tbody>
</table>
</div>
<input type="hidden" name="materials_id" id="materials_id">

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
<?php $this->load->view('include/mtr/footer'); ?>