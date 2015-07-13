
<div class="panel panel-primary">
    <div class="panel-heading">
         <h3 class="panel-title">
                            คุณอยู่ที่ >> บันทึกข้อมูลทะเบียน >> รายงานการเบิกวัสดุแยกตามประเภท</h3>
        <!--<span class="pull-right clickable panel-collapsed" id="clickable"><i class="glyphicon glyphicon-plus"></i></span>-->
    </div>
</div>
<div style = "margin-left:10px;margin-right:10px;">	    		
				<form class="navbar-form navbar-left" role="search" action = "index.php/report/type_withdrawal/search_type" method = "post">
				<h2><b>รายงานการเบิกวัสดุแยกตามประเภท</b></h2>
				<div class="form-group">
					<h4><b>เลือกประเภทวัสดุที่ต้องการค้นหา</b></h4>
		        </div>
		        <div class="form-group">
		           <select class="form-control" style = "width : 300px!important" name = "type_id" id = "type_id">
		           	    <option value = "0">ประเภททั้งหมด</option>
		           	  <?php foreach($type_mtr as $row){?>
					  	<option value = "<?php echo $row['group_type_id']?>"><?php echo $row['group_type_names']?></option>
					  <?php } ?>
					</select>
                    <input type = "hidden" id = "hide_type_id" name = "hide_type_id"/>
		        </div>
		        <button type="submit" class="btn btn-success">ค้นหา</button>
                <a href = "index.php/report/type_withdrawal" class="btn btn-warning" >ค้นหาทั้งหมด</a>
                <br/>
                <h3 style = "color :red;"><b><?php echo $type_name;?></b></h3>
		      </form>	   
<br/><br/><br/><br/><br/><br/><br/><br/>

    
<table class="table  table-bordered" id="dataTables-example">
    <thead class = "hd1">
        <tr>
            <th>เลขที่ใบเบิก</th>
            <th>วันที่เบิก</th>
            <th>ผู้เบิก</th>
            <th>ประเภท</th>
            <th>รายการที่เบิก</th> 
            <th>ยอดปัจจุบัน<br/>ยอด(ก่อนเบิก)</th>
            <th>จำนวนเบิก<br/>(ยอดเบิก)</th>    
            <th>ยอดคงเหลือ <br/>ณ ตอนนั้น</th>  
             <th>หน่วย</th>          
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($all_withdrawal as $row){
        ?>
        <tr>
            <td><?php echo $row['withdrawal_number'];?></td>
            <td><?php echo date('d/m/Y',strtotime($row['withdrawal_date']))?></td>
            <td><?php echo $row['full_name'];?></td>
            <td><?php echo $row['group_type_names'];?></td>
            <td><?php echo $row['materials_name'];?></td>
            <td><?php echo $row['balance_current'];?></td>
            <td><?php echo $row['amount_withdrawal_last'];?></td>
            <td><?php echo ($row['balance_current']-$row['amount_withdrawal_last']);?></td>
            <td><?php echo $row['mtr_unit'];?></td>
        </tr>  
        <?php }?>
    </tbody>
</table>
  <center><a class = "btn btn-primary btn-lg" id = "report_pdf1" href = "index.php/report/report_button_print/mtr_type_withdrawal/<?php if($type_id != ""){ echo $type_id;}else{echo '0';} ?>" target = "_blank">ส่งออก PDF</a>&nbsp;<!--<a class = "btn btn-primary btn-lg" id = "report_pdf1" href = "index.php/report/report_button_print/report_main1_2" target = "_blank">ปริ้นรายงาน</a>--></center>

</div>
<input type="hidden" name="materials_id" id="materials_id">
<script type="text/javascript">
                $("#type_id").change(function( event ){
                        // alert($("#type_id option:selected").text());
                        $("#hide_type_id").val($("#type_id option:selected").text());
                });
	 $(document).ready(function(){
	 	//alert($("#materials_id").val());
		$('#type_id').val($('#type_id option').eq('27').val());
	 });
    $(function() {
        $('#dataTables-example').dataTable({
            "order": [[ 1, "asc" ]]
        });
        
        $('html').click(function(){
            $("#dataTables-example tbody tr").removeClass("highlighted");
        });
        
        $(".paginate_button a").live('click',function(){
            context_menu();
        });     
        
        $("#dataTables-example tbody tr").click(function(event) {
            var materials_id = $(this).attr('id');
            $('#materials_id').val(materials_id);
            
            $("#dataTables-example tbody tr").removeClass("highlighted");
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
        
        context_menu();
    });
    function context_menu()
    {
        $(".menu_mtr_register").live().contextMenu(menu); 
    }
    var menu = [{
        name: 'รายงานการนำเข้า',
        img: 'icon/report.png',
        title: 'รายงานการนำเข้า',
        fun: function () {
          //alert($("#materials_id").val()); 
            var id = $("#materials_id").val();
            var url = "<?php echo base_url();?>index.php/mtr/purchasing_report/gen_report"+"/"+id;
             window.open(url, '_blank');

        }
    }];
    $('.menu_mtr_register').contextMenu(menu);
</script>
<style>
    .highlighted {
          color: #261F1D !important;
          background-color:#98FBF9 !important;
         }
     .iw-mSelected {
      background-color: #0099FF;
      color: #F2F2F2;
     }
</style>