                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="working_group">
                                    <thead class = "hd1">
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รหัสกลุ่มงาน</th>
                                            <th>ชื่อกลุ่มงาน</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $num = 0;
                                        foreach($getall as $row){ $num++;?>
                                        <tr class="odd gradeX" id = "se_<?php echo $row['working_group_id'];?>">
                                            <td><?php echo $num;?></td>
                                            <td><?php echo $row['working_group_number'];?></td>
                                            <td><?php echo $row['working_group_name'];?></td>
                                            <td style="text-align:center!important;">
                                                <a href="javascript:void(0)"  class = "mm8" title = "<?php echo $row['working_group_id'];?>"><img src = "icon/delete.ico" width = "20px"></a>
                                                &nbsp;<a title = "<?php echo $row['working_group_id'];?>" class = "nn" href="#warning8" data-toggle="modal"><img src = "icon/edit.ico" width = "20px"></a>
                                            </td>
                                        </tr>
                                        <?php }?>                                       
                                    </tbody>
                                </table>
                         </div>
                          <div class="modal fade" id="warning8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-warning">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h2>แก้ไข กลุ่มงาน</h2>
                                    </div>
                                    <div class="modal-body">
                                               <form onsubmit = "return false" id  = "my_working_group1" >
                                                <center>
                                                    <div style = "width:100%!important;margin-top:10px!important;">
                                                         <table class="table table-striped">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td width = "25%">รหัสกลุ่มงาน</td>
                                                                                <td width = "60%px"><input class="form-control" id = "working_group_number1" name = "working_group_number1" ></td>
                                                                                <td><span class = "rr" id = "error15">กรอกรหัสกลุ่มงาน</span></td>
                                                                            </tr>
                                                                             <tr>
                                                                                <td>ชื่อกลุ่มงาน</td>
                                                                                <td><input class="form-control" id = "working_group_name1" name = "working_group_name1" ></td>
                                                                                <td><span class = "rr" id = "error16">กรอกชื่อชื่อกลุ่มงาน</span></td>
                                                                            </tr>
                                                                        </tbody>
                                                         </table>
                                                                <div style = "padding-bottom:10px!important;">
                                                                     <input data-dismiss="modal" type = "submit" class="btn btn-info" value = "ตกลง" id  = "btn_submit8"/>
                                                                     <a data-dismiss="modal" class="btn btn-danger" id = "clear">ยกเลิก</a>
                                                                </div>
                                                                <input type = 'hidden' id = 'working_group_id1' name = "working_group_id1"/>
                                                        </div>
                                              </center>
                                              </form>
                                       </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    <script>
                        $(document).ready(function() {
                            $("#error15,#error16").hide();
                            
                            //clear form edit 
                            $("#clear").click(function( event ){
                                $("#unit_number").val('');
                                $("#unit_name").val('');
                            });
                            //get value at edit 
                            $(".nn").click(function( event ){
                                var id = $(this).attr('title');
                                 $.post( "index.php/eqm/working_group_data/edit_working_group",{'id':id}, function( data ) {
                                         var id = data['0'].working_group_id ;
                                         var working_group_number = data['0'].working_group_number ;
                                         var working_group_name   = data['0'].working_group_name ;
                                         $("#working_group_number1").val(working_group_number);
                                         $("#working_group_name1").val(working_group_name);
                                         $("#working_group_id1").val(id);
                                         
                                }, "json"); 

                            });
                            $('#working_group').dataTable();
                        });
                    </script>
                    <style>
                    .modal-header-warning {
                        color:#fff;
                        padding:9px 15px;
                        border-bottom:1px solid #eee;
                        background-color: #FF6633;
                        -webkit-border-top-left-radius: 5px;
                        -webkit-border-top-right-radius: 5px;
                        -moz-border-radius-topleft: 5px;
                        -moz-border-radius-topright: 5px;
                         border-top-left-radius: 5px;
                         border-top-right-radius: 5px;
                    }
                    </style>