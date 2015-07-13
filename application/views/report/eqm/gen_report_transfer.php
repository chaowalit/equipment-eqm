

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
		<div >
			<div >
				<h3 style="text-align:center;">ทะเบียนการโอนครุภัณฑ์</h3>

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
			    </div><br/>
			    <!--
			    
			    <div class="row"><p>&emsp;ประเภทเงิน
				    <?php foreach($type_budget as $row){
				    	if($row['type_budget_name'] == $type_budget_id){
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
				    	if($row['method_name'] == $method_id){
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
			-->
				
			</div>
			<div>
				<table border="1" cellspacing="0" cellpadding="0" width="100%"> 
					<tbody>
						<tr>
							<th><p>เลขที่ใบโอน</p></th>
							<th><p>วันที่โอน</p></th>
							<th><p>หมายเลขครุภัณฑ์</p></th>
							<th><p>รายการ</p></th>
							<th><p>โอนจาก</p></th>
							<th><p>สังกัดหน่วยงาน</p></th>
							<th><p>ผู้ใช้งาน</p></th>
						</tr>
						<?php foreach($eqm_tran as $row){?>
						<tr>
							<td><?php echo $row['transfer_number'];?></td>
							<td><?php echo date('d/m/Y',strtotime($row['cdate']));?></td>
							<td><?php echo $row['barcode'];?></td>
							<td><?php echo $row['eqm_names'];?></td>
							<td><?php echo $row['full_name'];?></td>
							<td><?php echo $row['be_under_name'];?></td>
							<td><?php echo $user_account[$row['transferee_account_id']];?></td>
						</tr>
						<?php }?>
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

