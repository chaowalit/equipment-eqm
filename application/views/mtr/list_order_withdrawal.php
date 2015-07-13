<div style="margin-left:20px;margin-right:20px;">
    <table class="table  table-bordered table_withdrawal" id="dataTables-withdrawal">
        <thead class = "hd1">
            <tr>
                <th rowspan="2" style="margin-left: auto;margin-right: auto;text-align: center;">ลำดับ</th>
                <th rowspan="2">รายการ</th>
                <th colspan="2">เบิกครั้งสุดท้าย</th>
                <th rowspan="2">ขณะนี้คงเหลือ</th>
                <th rowspan="2">ขอเบิกครั้งนี้</th>
                <th rowspan="2">จำนวนจ่าย</th>
                <th rowspan="2">หมายเหตุ</th>
            </tr>
            <tr>
                <th>ว.ด.ป.</th>
                <th>จำนวน</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 0; foreach($order_withdrawal as $row){ ?>
            <tr id="<?php echo $row->id; ?>" style="cursor:pointer">
                <td class="menu_mtr_withdrawal"><?php echo ++$count; ?></td>
                <td class="menu_mtr_withdrawal"><?php echo $row->materials_name; ?></td>
                <td class="menu_mtr_withdrawal"><?php echo ($row->date_withdrawal_last == "0000-00-00")? "-" : $row->date_withdrawal_last; ?></td>
                <td class="menu_mtr_withdrawal"><?php echo ($row->amount_withdrawal_last == "0")? "-": $row->amount_withdrawal_last; ?></td>
                <td class="menu_mtr_withdrawal"><?php echo $row->balance_current; ?></td>
                <td class="menu_mtr_withdrawal"><?php echo $row->amount_withdrawal; ?></td>
                <td class="menu_mtr_withdrawal"><?php echo ($row->amount_available_take < 0)? "<span style='color:red;'>".$row->amount_available_take."</span>" : $row->amount_available_take; ?></td>
                <td class="menu_mtr_withdrawal"><?php echo $row->comment_withdrawal; ?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<input type="hidden" name="order_of_withdrawal_id" id="order_of_withdrawal_id">

<script type="text/javascript">
    $(function() {
        $('html').click(function(){
            $("#dataTables-withdrawal tbody tr").removeClass("highlighted");
        });
        
        $("#dataTables-withdrawal tbody tr").click(function(event) {
            var order_of_withdrawal_id = $(this).attr('id');
            $('#order_of_withdrawal_id').val(order_of_withdrawal_id);
            
            $("#dataTables-withdrawal tbody tr").removeClass("highlighted");
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
        $('.menu_mtr_withdrawal').live().contextMenu(menu);
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
<style>
    .table_withdrawal thead tr th{
        margin-left: auto;margin-right: auto;text-align: center;
    }
    .table_withdrawal tbody tr td{
        margin-left: auto;margin-right: auto;text-align: center;
    }
</style>