

<html>
	<head>		
			<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="TEXT/HTML; CHARSET=utf-8" >
			<link rel="stylesheet" href="<?php echo base_url();?>assets/report/css/print.css" type="text/css" media="print" />
			<base href="<?= base_url(); ?>"/>

	</head>

	<body class="absolute">
		<!--
		<div class="absolute">
		    <div id="relative"></div>
		</div>
     	-->
     	<!--
     	<?php 
		echo date("Y/m/d")."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a>".$current_url."</a>";
	    ?>
	    -->
		<div >
			<div >
				<h3 style="text-align:center;">ทะเบียนคุมทรัพย์สิน</h3>

				<p style="text-align:right;">ส่วนราชการ <?php echo $this->service_name;?>&emsp;&emsp;&emsp;&emsp;</p>

				<p style="text-align:right;">หน่วยงาน  <?php echo $this->agencies;?>&emsp;&emsp;&emsp;&emsp;</p>
				<div class="row">
					<p class="aa">ประเภท</p>
					<p class="bb"><span class "line"><?php echo $type_name;?><span></p>
					<p class="cc">รหัส</p>
					<p class="dd"><span class "line"><?php echo $barcode;?><span></p>
					<p class="ee">ลักษณะ/คุณสมบัติ</p>
					<p class="ff"><span class "line"><?php echo $eqm_components;?><span></p>
					<p class="gg">รุ่น/แบบ</p>
					<p class="hh"><span class "line"><?php echo $eqm_model;?><span></p>
			    </div>
			    <div class="row">
					<p class="ii">สถานที่ตั้ง/หน่วยงานผู้รับผิดชอบ</p>
					<p class="jj"><span class "line"><?php echo $be_under_name;?><span></p>
					<p class="kk">ชื่อผู้ขาย/ผู้รับจ้าง/ผู้บริจาค</p>
					<p class="ll"><span class "line"><?php echo $agency_name;?><span></p>
			    </div>
			    <div class="row">
					<p class="mm">ที่อยู่</p>
					<p class="nn"><span class "line"><?php echo $this->address;?>&nbsp;ตำบล&nbsp;<?php echo $tambol_name;?>&nbsp;อำเภอ&nbsp;<?php echo $district_name;?>&nbsp;จังหวัด&nbsp;<?php echo $provinc_name;?><span></p>
					<p class="oo">โทรศัพท์ </p>
					<p class="pp">
							<span class "line">
							<?php if($this->tel == ""){
								echo "&nbsp;&nbsp; -";
							}else
							{
 								echo $this->tel;
							}?>
						    <span>
					</p>
			    </div>
			    <div class="row"><p>&emsp;ประเภทเงิน
				    <?php foreach($type_budget as $row){
				    	if($row['type_budget_id'] == $type_budget_id){
				    		$sym = "<span style = 'font-size:18px!important'>/</span>";
				        }
				        else
				        {
				        	$sym = "";
				        }
				        ?>
				    		&emsp;(&nbsp;<?php echo $sym;?>&nbsp;) <?php echo $row['type_budget_name'];?> &emsp;&emsp;
				    <?php }?>
				 </p>
			    </div>
			    <div class="row"><p>&emsp;วิธีการที่ได้มา
				    <?php foreach($method as $row){
				    	if($row['method_id'] == $method_id){
				    		$sym = "<span style = 'font-size:18px!important'>/</span>";
				        }
				        else
				        {
				        	$sym = "";
				        }
				    ?>
				   			&emsp;(&nbsp;<?php echo $sym;?>&nbsp;) <?php echo $row['method_name'];?> &emsp;&emsp;
				    <?php }?>
				 </p>
			    </div>
				
			</div>
			<div>
				<table border="1" cellspacing="0" cellpadding="0" width="100%"> 
					<tbody>
						<tr>
							<th valign="top" ><p>วันเดือนปี</p></th>
							<th valign="top" ><p>ที่เอกสาร</p></th>
							<th valign="top" ><p>รายการ</p></th>
							<th valign="top" ><p>จำนวนหน่วย</p></th>
							<th valign="top" ><p>ราคา/<br>หน่วย</p></th>
							<th valign="top" ><p>มูลค่ารวม</p></th>
							<th valign="top" ><p>อายุ<br>ใช้งาน</p></th>
							<th valign="top" ><p>อัตราค่า<br>เสื่อมราคา</p></th>
							<th valign="top" ><p>ค่าเสื่อม<br>ประจำปี</p></th>
							<th valign="top" ><p>ค่าเสื่อม<br>สะสม</p></th>
							<th valign="top" ><p>มูลค่าสุทธิ</p></th>
							<th valign="top" ><p>หมายเหตุ</p></th>
						</tr>
						<?php 
						   foreach($eqm_front as $row){
						   $age_use = 0;
						 ?>
						<tr>
							<td valign="top" ><?php echo date('d/m/Y',strtotime($row['aa']));?></td>
							<td valign="top" ><?php echo $row['report_number'];?></td>
							<td valign="top" ><?php echo $row['detail_names'];?></td>
							<td valign="top" ><?php echo $row['eqm_unit_set'];?></td>
							<td valign="top" ><?php echo number_format($row['eqm_price_unit'],2);?></td>
							<td valign="top" ><?php echo number_format($row['cost_total'],2);?></td>
							<td valign="top" ><?php echo $age_use;?></td>
							<td valign="top" ><?php echo $row['kk'];?></td>
							<td valign="top" ><?php echo "0";//echo $row['depreciation_year'];?></td>
							<td valign="top" ><?php echo "0";?></td>
							<td valign="top" ><?php echo number_format($row['cost_net'],2);?></td>
							<td valign="top" >อายุการใช้งาน&nbsp;<?php echo $row['jj'];?>&nbsp;ปี</td>
						</tr>
						 <?php } if($row['cost_total'] >= 5000){?>
						 <?php 

						   $a = "ii";
						   //$count = count($year);
						   foreach($year as $index => $row1){
						   	$count1 = $index+1;
						   	$x = ($row['cost_net']/$row['depreciation_age']);
						   	$y = (($row['cost_net']/$count)*$count1);
						   	$z = ($row['cost_net']-(($row['cost_net']/$count)*$count1));
						   	if($a != "ii")
						   	{
						   		$x = ($a/$count);
						   		$y = (($a/$count)*$count1);
						   		$z = ($a-(($a/$count)*$count1));
						   	}
						 ?>
						<tr>
							<td valign="top" ><?php echo date('d/m/Y',strtotime($row1));?></td>
							<td valign="top" ><?php echo $row['report_number'];?></td>
							<td valign="top" ><?php echo $row['detail_names'];?></td>
							<td valign="top" ><?php echo $row['eqm_unit_set'];?></td>
							<td valign="top" ><?php echo number_format($row['eqm_price_unit'],2);?></td>
							<td valign="top" ><?php echo number_format($row['cost_total'],2);?></td>
							<td valign="top" ><?php echo $index+1; ?></td>
							<td valign="top" ><?php echo $row['kk'];?></td>
							<td valign="top" ><?php echo number_format($x,2);?></td>
							<td valign="top" ><?php echo number_format($y,2);?></td>
							<td valign="top" >
								<?php 
									if(number_format($z,2) == "0")
									{
										echo "1";
									}
									else
									{
										echo number_format($z,2); 			
									}
									$a = $z;						
								?>
							</td>
							<td valign="top" >อายุการใช้งาน&nbsp;<?php echo $row['depreciation_age'];?>&nbsp;ปี</td>
						</tr>
						 <?php }}
						 else{
						 	
						 } ?>
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

