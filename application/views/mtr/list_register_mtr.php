<table class="table  table-bordered" id="dataTables-example">
    <thead class = "hd1">
        <tr>
            <th>รหัสวัสดุ</th>
            <th>ชื่อวัสดุ</th>
            <th>หน่วยนับ</th>
            <th>จำนวนคงเหลือ</th>
            <th>จุดสั่งซื้อวัสดุ(MIN)</th>
            <th>สต๊อกวัสดุสูงสุด(MAX)</th>
            <th>ที่เก็บวัสดุ</th>
            <th>รายละเอียดเพิ่มเติม</th>
            
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($mtr_register as $row){
        ?>
        <tr id="<?php echo $row->id; ?>" style="cursor:pointer">
            <?php 
                
                $this->db->select('*');
                $this->db->from('tbl_mtr_type');
                $this->db->where('group_type_id',$row->tbl_mtr_type_id);
                $result = $this->db->get();
                $mtr_type = $result->result_array();
                $temp11 = $mtr_type[0]['group_type_numbers'];
                
                $this->db->select('*');
                $this->db->from('tbl_mtr_model');
                $this->db->where('type_id',$row->tbl_mtr_model_id);
                $result = $this->db->get();
                $mtr_model = $result->result_array();
                $temp22 = $mtr_model[0]['type_numbers'];
                
                $this->db->select('*');
                $this->db->from('tbl_mtr_detail');
                $this->db->where('detail_id',$row->tbl_mtr_detail_id);
                $result = $this->db->get();
                $mtr_detail = $result->result_array();
                $temp33 = $mtr_detail[0]['detail_number'];
            ?>
            <td class="menu_mtr_register"><?php echo $temp11.'-'.$temp22.'-'.$temp33; ?></td>
            <td class="menu_mtr_register"><?php echo $row->mtr_name; ?></td>
            <td class="menu_mtr_register"><?php echo $row->mtr_unit; ?></td>
            <td class="menu_mtr_register"><?php echo $row->mtr_balance; ?></td>
            <td class="menu_mtr_register"><?php echo $row->min_amount; ?></td>
            <td class="menu_mtr_register"><?php echo $row->max_amount; ?></td>
            <td class="menu_mtr_register"><?php echo $row->mtr_address; ?></td>
            <td class="menu_mtr_register"><?php echo $row->mtr_detail; ?></td>
            
        </tr>
        <?php } ?>
    </tbody>
</table>
<input type="hidden" name="materials_id" id="materials_id">

<script type="text/javascript">
    $(function() {
        $('#dataTables-example').dataTable();
        
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
        name: 'รายงานทะเบียนวัสดุ',
        img: 'icon/report.png',
        title: 'รายงานทะเบียนวัสดุ',
        fun: function () {
           //alert('รายงานนะ อย่าลืมละ ฮ่าๆๆ'); 
           var materials_id = $("#materials_id").val();
           var url = "<?php echo site_url('mtr/register_mtr/getReport_mtr');?>"+"/"+materials_id;
           window.open(url, '_blank');
        }
    },{
        name: 'ปรับปรุงทะเบียนวัสดุ',
        img: 'icon/edit.png',
        title: 'ปรับปรุงทะเบียนวัสดุ',
        fun: function () {
            var materials_id = $("#materials_id").val();
            

            $( ".clickable" ).hide();
            //$("#disabled_button").hide();
            $('#submit_mtr_register').html('ปรับปรุงทะเบียนวัสดุ');

            var checking = $( "#clickable" ).live().attr('class');
            if(checking == "pull-right clickable panel-collapsed"){
                $( ".clickable" ).live().click();

            }else{

            }

            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>index.php/mtr/register_mtr/getDataEditRegister_mtr",
                data:{ materials_id:materials_id },
                dataType: 'json',
                success:function(result){
                    var obj = result;
                    
                    var temp1 = obj[0]['tbl_mtr_type_id'];
                    var temp2 = obj[0]['tbl_mtr_model_id'];
                    var temp3 = obj[0]['tbl_mtr_detail_id'];
                    $.ajax({
                        type:"POST",
                        url:"<?php echo base_url(); ?>index.php/mtr/register_mtr/mtr_number_total",
                        data:{ tbl_mtr_type_id:temp1, tbl_mtr_model_id:temp2, tbl_mtr_detail_id:temp3},
                        dataType: 'html',
                        success:function(result_temp){
                            $("#mtr_number").val(result_temp);
                        }
                    }); 
                    
                    
                    //$("#mtr_number").val(mtr_numbre);
                    $("#mtr_name").val(obj[0]['mtr_name']);
                    $("#mtr_unit").val(obj[0]['mtr_unit']);
                    $("#mtr_balance").val(obj[0]['mtr_balance']);
                    $("#min_amount").val(obj[0]['min_amount']);
                    $("#max_amount").val(obj[0]['max_amount']);
                    $("#mtr_address").val(obj[0]['mtr_address']);
                    $("#mtr_detail").val(obj[0]['mtr_detail']);
                    $("#materials_id").val(obj[0]['id']);
                    $("#gen_barcode").html('<img src="<?php echo base_url();?>bc/barcode.php/?text='+obj[0]['mtr_number']+'"/>');
                    
                    $.ajax({
                        type:"POST",
                        url:"<?php echo base_url(); ?>index.php/mtr/register_mtr/mtr_detail_info",
                        data:{ tbl_mtr_detail_id:temp3 },
                        dataType: 'html',
                        success:function(result_temp2){
                            $("#mtr_detail_info").val(result_temp2);
                        }
                    }); 
                    $("#mtr_type_info").val(temp1);
                    $("#mtr_model_info").val(temp2);
                    
                }
            }); 
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