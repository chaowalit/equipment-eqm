


<html>
	<head>
		<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="TEXT/HTML; CHARSET=utf-8" >
	</head>
	<body>
	<center>
	<h3 style ="text-align:center">รายงานการเบิกวัสดุทั้งหมด</h3>
	<table border="1" cellspacing="0" cellpadding="0" width = "100%" style = "heigth :100%!important;">
	        <tr>
            <th>เลขที่ใบเบิก</th>
            <th>วันที่เบิก</th>
            <th>ผู้เบิก</th>
            <th>รายการที่เบิก</th> 
            <th>ยอดปัจจุบัน<br/>ยอด(ก่อนเบิก)</th>
            <th>จำนวนเบิก<br/>(ยอดเบิก)</th>    
            <th>ยอดคงเหลือ <br/>ณ ตอนนั้น</th>  
             <th>หน่วย</th>          
        </tr>
         <?php
            foreach($all_withdrawal as $row){
        ?>
        <tr>
            <td><?php echo $row['withdrawal_number'];?></td>
            <td><?php echo date('d/m/Y',strtotime($row['created']))?></td>
            <td><?php echo $row['full_name'];?></td>
            <td><?php echo $row['materials_name'];?></td>
            <td><?php echo $row['balance_current'];?></td>
            <td><?php echo $row['amount_withdrawal_last'];?></td>
            <td><?php echo ($row['balance_current']-$row['amount_withdrawal_last']);?></td>
            <td><?php echo $row['mtr_unit'];?></td>
        </tr>  
        <?php }?>
  			      
</table>
</center>
	</body>
</html>
<style>
	table{
		font-size:14px!important;
	}
	th{ 
		padding-top: 5px;
		background-color: #DDDDDD;
	}
	tr td{
		padding-top: 5px!important;
		padding-left: 5px!important;
	}
</style>

<script>
		javascript:window.print();
</script>