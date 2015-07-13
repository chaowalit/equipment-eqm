<table class="table table-bordered" id="table_list_order_purchasing"> <!-- id="dataTables-example" -->
    <thead class = "hd1">
        <tr>
            <th>ลำดับ</th>
            <th>รหัสวัสดุ</th>
            <th>ชื่อวัสดุ</th>
            <th>หน่วยนับ</th>
            <th>ยอดนำเข้า</th>
            <th>ยอดคงเหลือ</th>
            <th>ราคา/หน่วย</th>
            <th>รวม</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 0; 
        $total_all = 0.00;
        foreach($order_po as $row){ 
            $total_all = $total_all + $row->total;
        ?>
            <tr id="<?php echo $row->id; ?>" style="cursor:pointer">
                <td class="menu_mtr_purchasing"><?php echo ++$count; ?></td>
                <td class="menu_mtr_purchasing"><?php echo $row->materials_number; ?></td>
                <td class="menu_mtr_purchasing"><?php echo $row->materials_name; ?></td>
                <td class="menu_mtr_purchasing"><?php echo $row->materials_unit; ?></td>
                <td class="menu_mtr_purchasing"><?php echo $row->imports_amount; ?></td>
                <td class="menu_mtr_purchasing"><?php echo $row->balance_mtr; ?></td>
                <td class="menu_mtr_purchasing"><?php echo $row->price_per_unit; ?></td>
                <td class="menu_mtr_purchasing"><?php echo $row->total; ?></td>
            </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="8" style="text-align: right;font-size: 20px;">ราคารวม : ..... <?php echo number_format($total_all,2); ?> ..... บาท</td>
        </tr> 
    </tfoot>
</table>
<input type="hidden" name="order_invoice_of_purchasing_id" id="order_invoice_of_purchasing_id">

<script type="text/javascript">
    $(function() {
        $('html').click(function(){
            $("#table_list_order_purchasing tbody tr").removeClass("highlighted");
        });
        
        $("#table_list_order_purchasing tbody tr").click(function(event) {
            var order_invoice_of_purchasing_id = $(this).attr('id');
            $('#order_invoice_of_purchasing_id').val(order_invoice_of_purchasing_id);
            
            $("#table_list_order_purchasing tbody tr").removeClass("highlighted");
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
        $('.menu_mtr_purchasing').live().contextMenu(menu);
    });
</script>
<style>
    .highlighted {
          color: #261F1D !important;
          background-color:#98FBF9 !important;
         }
     .iw-mSelected {
      background-color: #FF6633;
      color: #F2F2F2;
     }
</style>