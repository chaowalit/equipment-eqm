


<html>
	<head>
		<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="TEXT/HTML; CHARSET=utf-8" >
	</head>
	<body>
	<center>
	<h3 style ="text-align:center">รายงานใบสั่งซื้อ</h3>
	<table border="1" cellspacing="0" cellpadding="0" width = "100%" style = "heigth :100%!important;">
	        <tr>
	        	<th width="43" valign="top">
	                <p align="center">
	                    วันที่
	                </p>
	            </th>
	            <th width="43" valign="top">
	                <p align="center">
	                    รหัสวัสดุ
	                </p>
	            </th>
	            <th width="84" valign="top">
	                <p align="center">
	                    ชื่อวัสดุ
	                </p>
	            </th>
	            <th width="228" valign="top">
	                <p align="center">
	                    วันที่รับวัสดุ
	                </p>
	            </th>
	            <th width="162" valign="top">
	                <p align="center">
	                    จำนวนนำเข้า
	                </p>
	            </th>
	            <th width="121" valign="top">
	                <p align="center">
	                    จำนวนคงเหลือ<br>ขณะนั้น
	                </p>
	            </th>
	              <th width="121" valign="top">
	                <p align="center">
	                    ราคาต่อหน่วย
	                </p>
	            </th>
	              <th width="121" valign="top">
	                <p align="center">
	                    ราคารวม
	                </p>
	            </th>

	        </tr>
  			         <?php
  			         $summation = 0 ;
  			         foreach($eqm as $row) { 
  			         	$summation = $summation + $row['total'];
  			         	?>
                               <tr  style="cursor:pointer" id = "<?php echo $row['id'];?>">
                                    <td class  =  "testButton" id = "<?php echo $row['id'];?>"><?php echo date('d/m/Y',strtotime($row['created']))?></td>
                                    <td class  =  "testButton" id = "<?php echo $row['id'];?>"><?php echo $row['materials_number'];?></td>
                                    <td class  =  "testButton" id = "<?php echo $row['id'];?>"><?php echo $row['materials_name'];?></td>
                                    <td class  =  "testButton" id = "<?php echo $row['id'];?>"><?php echo date('d/m/Y',strtotime($row['date_of_recieve_mtr']))?></td>
                                    <td class  =  "testButton" id = "<?php echo $row['id'];?>"><?php echo $row['imports_amount'];?></td>
                                    <td class  =  "testButton" id = "<?php echo $row['id'];?>"><?php echo $row['balance_mtr'];?></td>
                                    <td class  =  "testButton" id = "<?php echo $row['id'];?>"><?php echo $row['price_per_unit'];?></td>
                                    <td class  =  "testButton" id = "<?php echo $row['id'];?>"><?php echo $row['total'];?></td>

                                </tr>
                    <?php }?>
                     <tr  style="cursor:pointer" >
                                    <td colspan = "8" align = "right" >รวมทั้งหมด :: <?php echo $summation;?></td>	
                                </tr>
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