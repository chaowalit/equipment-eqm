

<html>
	<head>		
			<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="TEXT/HTML; CHARSET=utf-8" >
			<link rel="stylesheet" href="<?php echo base_url();?>assets/report/css/print2.css" type="text/css" media="print" />
			<base href="<?= base_url(); ?>"/>

	</head>

	<body class="absolute">
		<div >
			<div >
				<h3 style="text-align:center;">ทะเบียนวัสดุ</h3>

				<p style="text-align:right;">ส่วนราชการ <?php echo $this->service_name;?>&emsp;&emsp;&emsp;&emsp;</p>

				<p style="text-align:right;">หน่วยงาน  <?php echo $this->agencies;?>&emsp;&emsp;&emsp;&emsp;</p>
				<div class="row">
					<p class="aa">ประเภทวัสดุ</p>
					<p class="bb"><span class "line"><?php echo $type_name; ?><span></p>
					<p class="cc">รหัสวัสดุ</p>
					<p class="dd"><span class "line"><?php echo $mtr_numbers; ?><span></p>
			    </div>
			    <div class="row">
					<p class="ii">จุดสั่งซื้อวัสดุ(MIN)</p>
					<p class="jj"><span class "line"><?php echo $min_amount; ?><span></p>
					<p class="kk">สต๊อกวัสดุสูงสุด(MAX)</p>
					<p class="ll"><span class "line"><?php echo $max_amount;?><span></p>
			    </div>
			    <div class="row">
					<p class="mm">ที่เก็บวัสดุ</p>
					<p class="nn"><span class "line"><?php echo $mtr_address;?></p>
					<p class="oo">รายละเอียดเพิ่มเติม</p>
					<p class="pp"><?php echo $mtr_detail;?></p>
			    </div>				
			</div>
			<div>
				<table border="1" cellspacing="0" cellpadding="0" width="100%"> 
					<tbody>
						<tr>
							<th valign="top" ><p>วันที่</p></th>
							<th valign="top" ><p>ชื่อวัสดุ</p></th>
							<th valign="top" ><p>รหัสวัสดุ</p></th>
							<th valign="top" ><p>การดำเนินการ</p></th>
							<th valign="top" ><p>จำนวน</p></th>
							<th valign="top" ><p>หน่วยนับ</p></th>
							<th valign="top" ><p>ราคาต่อหน่วย</p></th>
							<th valign="top" ><p>ราคารวม</p></th>
						</tr>
						<?php 
							$sumation_price = 0 ;
							foreach ($mydata as $key => $row) {
						?>
						 <tr>
							<td><?= date('d/m/Y',strtotime($row['0']['to_time'])); ?></td>
							<td><?= $row['0']['mtr_name']; ?></td>
							<td><?= $row['0']['group_type_numbers']."-".$row['0']['type_numbers']."-".$row['0']['detail_number']; ?></td>
							<td><?php
								if($row['0']['type_transaction'] == "purchasing")
								{
									echo "จัดซื้อวัสดุ";
								}	
								else
								{
									echo "เบิกวัสดุ";
								}
							   ?>
							</td>
							<td>

								<?php
								if($row['0']['type_transaction'] == "purchasing")
								{
									echo $row['0']['imports_amount'];
									$sumation += $row['0']['imports_amount'];
								}	
								else
								{
									echo $row['0']['amount_withdrawal'];
									$sumation -= $row['0']['amount_withdrawal'];
								}
							   ?>
							</td>
							<td><?= $row['0']['mtr_unit']; ?></td>
							<td><?= $row['0']['price_per_unit'];?></td>
							<td><?= number_format($row['0']['total'],2); ?></td>
						 </tr>
						<?php 
							$sumation_price = $sumation_price + $row['0']['total'];
					    }?>
						 <tr>
						 	<td colspan = "4" align = "right"><p >ยอดคงเหลือทั้งหมด</p></td>
						 	<td><?= $row['0']['mtr_balance'];?></td>
						 	<td colspan = "2" align = "right"><p >ราคานำเข้าทั้งหมด</p></td>
						 	<td><?php echo number_format($sumation_price,2) ;?></td>
						 </tr>
						</tbody>

					</table>

				</div>
			</div>
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

