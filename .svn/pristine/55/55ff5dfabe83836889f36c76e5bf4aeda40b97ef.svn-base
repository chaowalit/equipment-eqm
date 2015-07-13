


<html>
	<head>
		<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="TEXT/HTML; CHARSET=utf-8" >
	</head>
	<body>
	<center>
	<h3 style ="text-align:center">รายงานทะเบียนการแทงจำหน่ายครุภัณฑ์ทั้งหมด</h3>
	<table border="1" cellspacing="0" cellpadding="0" width = "100%" style = "heigth :100%!important;">
	        <tr>
	            <th width="43" valign="top">
	                <p align="center">
	                    เลขที่<br/>ใบแทงจำหน่าย
	                </p>
	            </th>
	            <th width="84" valign="top">
	                <p align="center">
	                    วันที่<br/>แทงจำหน่าย
	                </p>
	            </th>
	            <th width="228" valign="top">
	                <p align="center">
	                    หมายเลข<br/>ครุภัณฑ์
	                </p>
	            </th>
	            <th width="162" valign="top">
	                <p align="center">
	                    รายการ
	                </p>
	            </th>
	            <th width="121" valign="top">
	                <p align="center">
	                    ประเภท<br/>การแทงจำหน่าย
	                </p>
	            </th>
	              <th width="121" valign="top">
	                <p align="center">
	                    บริษัทห้างร้านที่ซื้อ
	                </p>
	            </th>
	              <th width="121" valign="top">
	                <p align="center">
	                    ราคาที่ซื้อ
	                </p>
	            </th>
	          
	        </tr>
  			         <?php foreach($EqmDistribution as $row){ ?>
				        <tr id="<?php echo $row->equipment_id; ?>" style="cursor:pointer">
				            <td class="menu_eqm"><?php echo $row->distribution_number; ?></td>
				            <td class="menu_eqm"><?php echo date('d/m/Y',strtotime($row->distribution_date)); ?></td>
				            <td class="menu_eqm"><?php echo $row->eqm_numbers1."-".$row->eqm_numbers2."-".$row->eqm_numbers3."/".$row->eqm_amout_number; ?></td>
				            <td class="menu_eqm"><?php echo $row->eqm_names; ?></td>
				            <td class="menu_eqm"><?php echo $row->type_distribution; ?></td>
				            <td class="menu_eqm"><?php echo $row->company_name; ?></td>
				            <td class="menu_eqm"><?php echo $row->price; ?></td>
				        </tr>
				       <?php } ?>
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