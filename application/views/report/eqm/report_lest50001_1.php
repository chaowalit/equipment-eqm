


<html>
	<head>
		<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="TEXT/HTML; CHARSET=utf-8" >
	</head>
	<body>
	<center>
	<h3 style ="text-align:center">รายงานมูลค่าทรัพย์สินสุทธิมูลค่าต่ำกว่า 5000</h3>
	<table border="1" cellspacing="0" cellpadding="0" width = "100%" style = "heigth :100%!important;">
	        <tr>
	            <th width="43" valign="top">
	                <p align="center">
	                    วันที่
	                </p>
	            </th>
	            <th width="84" valign="top">
	                <p align="center">
	                    ที่เอกสาร
	                </p>
	            </th>
	            <th width="228" valign="top">
	                <p align="center">
	                    หมายเลขครุภัณฑ์
	                </p>
	            </th>
	            <th width="162" valign="top">
	                <p align="center">
	                    รายการ
	                </p>
	            </th>
	            <th width="121" valign="top">
	                <p align="center">
	                    จำนวน
	                </p>
	            </th>
	              <th width="121" valign="top">
	                <p align="center">
	                    ราคาต่อหน่วย
	                </p>
	            </th>
	              <th width="121" valign="top">
	                <p align="center">
	                    มูลค่า
	                </p>
	            </th>
	            <th width="121" valign="top">
	                <p align="center">
	                    อายุการใช้งาน
	                </p>
	            </th>
	            <th width="121" valign="top">
	                <p align="center">
	                    ค่าเสื่อมราคา
	                </p>
	            </th>
	        </tr>
  			         <?php foreach($eqm as $row) {
                                        ?>

                                        <tr  style="cursor:pointer" id = "<?php echo $row['eqm_id'];?>">
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo date('d/m/Y',strtotime($row['cdate']))?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['report_number'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['eqm_numbers1']."-".$row['eqm_numbers2']."-".$row['eqm_numbers3'].$row['eqm_amout_number'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['eqm_names'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['eqm_unit_set'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['eqm_price_unit'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['cost_total'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php echo $row['depreciation_age'];?></td>
                                            <td class  =  "testButton" id = "<?php echo $row['eqm_id'];?>"><?php if($row['cost_total'] < 5000){echo "-";}else{echo $row['depreciation_year'];}?></td>
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