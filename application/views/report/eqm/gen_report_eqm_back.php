


<html>
	<head>
		<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="TEXT/HTML; CHARSET=utf-8" >
	</head>
	<body>
	<center>
	<h3 style ="text-align:center">ประวัติการซ่อมบำรุงรักษาครุภัณฑ์ – ทรัพย์สิน</h3>
	<table border="1" cellspacing="0" cellpadding="0" width = "100%" style = "heigth :100%!important;">
	        <tr>
	            <th width="43" valign="top">
	                <p align="center">
	                    ครั้งที่
	                </p>
	            </th>
	            <th width="84" valign="top">
	                <p align="center">
	                    วันที่
	                </p>
	            </th>
	            <th width="228" valign="top">
	                <p align="center">
	                    รายการ
	                </p>
	            </th>
	            <th width="162" valign="top">
	                <p align="center">
	                    จำนวนเงิน
	                </p>
	            </th>
	            <th width="121" valign="top">
	                <p align="center">
	                    หมายเหตุ
	                </p>
	            </th>
	        </tr>
	    <?php 
	    $num = 0;
	    $sumation = 0;
	    foreach($eqm_back as $row){
         $num++;
	    ?>
	        <tr>
	    		<td width="43"  valign="top"><?php echo $num;?></td>
	            <td width="84"  valign="top"><?php echo date('d/m/Y',strtotime($row['repair_date_receive']));?></td>
	            <td width="228" valign="top"><?php echo $row['eqm_names'];?></td>
	            <td width="162" valign="top"><?php echo $row['price_repair'];?></td>
	            <td width="121" valign="top"><?php echo $row['company_name'];?></td>
	        </tr>
	    <?php 
	    $sumation = $sumation+$row['price_repair'];
	    }?>
	    <tr>
	    		<td width="43"  valign="top"></td>
	            <td width="84"  valign="top"></td>
	            <td width="228" style="text-align:right;">รวม</td>
	            <td width="162" valign="top"><?php echo $sumation;?><hr></td>
	            <td width="121" valign="top"></td>
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
