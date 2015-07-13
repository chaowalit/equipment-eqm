
<html>
    <head>
        <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="TEXT/HTML; CHARSET=utf-8" >
        <base href="<?= base_url(); ?>"/>
        
    </head>
    <body>
        <?php
            $index_withdrawal_number = explode('/',$prin_winthdrawal[0]['withdrawal_number']);
            $date_index = explode("-", $prin_winthdrawal[0]['withdrawal_date']);
            $thaifullmonth = array("มกราคม.","กุมภาพันธ์.","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม", "พฤศจิกายน","ธันวาคม");
        ?>
        <div>
            <div>
                <h2 style="text-align:center;">ใบเบิกของ</h2>
                
                                <div style="clear:both;text-align: left;display:inline-block;">
                                    <p style="display:inline-block;float:left;width:100px!important;margin-left:40px;">เล่มที่..........</p>
                                    
                                    <div style="text-align: right;display:inline-block;">
                                        <p style="display:inline-block;float:right;width:100px !important;">เลขที่..........</p>
                                        
                                    </div>
                                </div>
                            
                            
                <div  style="line-height: 1px;display:inline-block;width:100%;height: 1px;" >
                    <p style="display:inline-block;float:left;width:74px!important;margin-left:20px;">ส่วนราชการ</p>
                    <p style="display:inline-block;float:left;width:250px;border-bottom: 1px dotted #000;text-decoration: none;padding-bottom: 8px;"><span><?php echo $this->service_name;?></span></p>
                </div>
                <div style="line-height: 1px;display:inline-block;width:100%;height: 1px; ">
                    <p style="display:inline-block;float:left;width:30px !important;margin-left:20px;">ที่</p>
                    <p style="display:inline-block;float:left;width:80px;border-bottom: 1px dotted #000;text-decoration: none;padding-bottom: 8px;"><span><?php echo $index_withdrawal_number[0];?></span></p>
                    <p style="display:inline-block;float:left;width:30px!important;margin-left:10px;">/25</p>
                    <p style="display:inline-block;float:left;width:60px;border-bottom: 1px dotted #000;text-decoration: none;padding-bottom: 8px;"><span><?php echo substr($index_withdrawal_number[1],-2);?></span></p>
                    <p style="display:inline-block;float:left;width:38px!important;margin-left:10px;">วันที่</p>
                    <p style="display:inline-block;float:left;width:60px;border-bottom: 1px dotted #000;text-decoration: none;padding-bottom: 8px;"><span><?php echo $date_index[2];?></span></p>
                    <p style="display:inline-block;float:left;width:40px!important;margin-left:10px;">เดือน</p>
                    <p style="display:inline-block;float:left;width:130px;border-bottom: 1px dotted #000;text-decoration: none;padding-bottom: 8px;"><span><?php echo $thaifullmonth[abs($date_index[1])-1];?></span></p>
                    <p style="display:inline-block;float:left;width:40px!important;margin-left:10px;">พ.ศ.</p>
                    <p style="display:inline-block;float:left;width:90px;border-bottom: 1px dotted #000;text-decoration: none;padding-bottom: 8px;"><span><?php echo ($date_index[0]+543);?></span></p>
                </div>
                
                <div style="line-height: 1px;display:inline-block;">
                    <p style="display:inline-block;float:left;width:40px!important;margin-left:20px;">เรียน</p>
                    <p style="display:inline-block;float:left;width:350px;border-bottom: 1px dotted #000;text-decoration: none;padding-bottom: 8px;"><span><?php echo $prin_winthdrawal[0]['title_content'];?></span></p>
                </div>
               
                <div style="line-height: 1px;display:inline-block;">
                    <p style="display:inline-block;float:left;width:40px!important;margin-left:60px;">ด้วย</p>
                    <p style="display:inline-block;float:left;width:580px;border-bottom: 1px dotted #000;text-decoration: none;padding-bottom: 8px;"><span><?php echo $prin_winthdrawal[0]['content_detail'];?></span></p>
                </div>
                
                <div style="line-height: 1px;display:inline-block;">
                    <p style="display:inline-block;float:left;width:480px !important;margin-left:20px;"><span>มีความประสงค์ขอเบิกสิ่งของสำหรับใช้ในราชการ ตามรายการข้างล่างนี้ และมอบให้</span></p>
                    <p style="display:inline-block;float:left;width:180px;border-bottom: 1px dotted #000;text-decoration: none;padding-bottom: 8px;">&nbsp;</p>
                </div>
               
                <div style="line-height: 1px;display:inline-block;">
                    <p style="display:inline-block;float:left;width:350px;border-bottom: 1px dotted #000;text-decoration: none;margin-left:20px;padding-bottom: 8px;"><?php echo $array_user[$prin_winthdrawal[0]['withdrawal_recieve_person']]; ?></p>
                    <p style="display:inline-block;float:left;width:auto !important;margin-left:0px;"><span>เป็นผู้รับ</span></p>
                    
                </div>
            </div>
            <div>
                <table border="1" cellspacing="0" cellpadding="0" width="100%"> 
                    <tbody>
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
                        <?php foreach($prin_winthdrawal as $index => $row){ ?>
                        <tr>
                            <td><?php echo ++$index; ?></td>
                            <?php 
                            $this->db->select('*');
                            $this->db->from('materials');
                            $this->db->where('id',$row['materials_id']);
                            $result = $this->db->get();
                            $temp = $result->result_array();
                            ?>
                            <td><?php echo $temp[0]['mtr_name']; ?></td>
                            <td><?php echo $row['date_withdrawal_last']; ?></td>
                            <td><?php echo $row['amount_withdrawal_last']; ?></td>
                            <td><?php echo $row['balance_current']; ?></td>
                            <td><?php echo $row['amount_withdrawal']; ?></td>
                            <td><?php echo $row['amount_available_take']; ?></td>
                            <td><?php echo $row['comment_withdrawal']; ?></td>
                        </tr>
                        <?php } ?>
                        <?php for($i = 0; $i < (15 - count($prin_winthdrawal)); $i++){ ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
            <br>
            <div>
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tbody>
                        <tr>
                            <td style="width:50%;display:inline-block;">
                                (ลงชื่อ)................................................................ผู้เบิก <br>
                                (ตำแหน่ง)...........................................................
                            </td>
                            <td style="width:50%;">
                                (ลงชื่อ)................................................................ผู้อนุญาติ <br>
                                (ตำแหน่ง)...........................................................
                            </td>
                        </tr>
                        <tr>
                            <td style="width:50%;border: 1px solid black;">
                                <br>
                                <div style="width:90%;">
                                    &nbsp;&nbsp;(ลงชื่อ)................................................................ผู้รับของ <br>
                                    &nbsp;&nbsp;(ตำแหน่ง)........................................................... <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;............./.........................../.................<br>
                                    &nbsp;&nbsp;(ลงชื่อ)................................................................ผู้จ่ายของ <br>
                                    &nbsp;&nbsp;(ตำแหน่ง)........................................................... <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;............./.........................../................. <br>
                                </div>
                            </td>
                            <td style="width:50%;">
                                เรียน...................................................................<br><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เห็นควรเบิกจ่ายให้ตามข้อ 153 แห่งระเบียบ ฯ <br><br>
                                (ลงชื่อ)................................................................. <br>
                                (ตำแหน่ง)............................................................
                            </td>
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
<script>
    $(function(){
        window.print();
    });
</script>