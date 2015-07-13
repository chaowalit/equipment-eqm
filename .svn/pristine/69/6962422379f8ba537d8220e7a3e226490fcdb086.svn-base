                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="unit">
                                    <thead class = "hd1">
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รหัสยูนิต</th>
                                            <th>ชื่อยูนิต</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $num = 0;
                                        foreach($getall as $row){ $num++;?>
                                        <tr class="odd gradeX" id = "se_<?php echo $row['unit_id'];?>">
                                            <td><?php echo $num;?></td>
                                            <td><?php echo $row['unit_number'];?></td>
                                            <td><?php echo $row['unit_name'];?></td>
                                            <td style="text-align:center!important;">
                                                <a href="javascript:void(0)" class = "mm1" title = "<?php echo $row['unit_id'];?>"><img src = "icon/delete.ico" width = "20px"></a>
                                                &nbsp;<a title = "<?php echo $row['unit_id'];?>" class = "nn" href="#warning" data-toggle="modal"><img src = "icon/edit.ico" width = "20px"></a>
                                            </td>
                                        </tr>
                                        <?php }?>                                       
                                    </tbody>
                                </table>
                         </div>
                          <div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-warning">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h2>แก้ไขยูนิต</h2>
                                    </div>
                                    <div class="modal-body">
                                               <form onsubmit = "return false" id  = "my_unit1" >
                                                <center>
                                                    <div style = "width:100%!important;margin-top:10px!important;">
                                                         <table class="table table-striped">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td width = "20%">รหัสยูนิต</td>
                                                                                <td width = "60%px"><input class="form-control" id = "unit_number1" name = "unit_number1" ></td>
                                                                                <td><span class = "rr" id = "error1">กรอกรหัสยูนิต</span></td>
                                                                            </tr>
                                                                             <tr>
                                                                                <td>ชื่อยูนิต</td>
                                                                                <td><input class="form-control" id = "unit_name1" name = "unit_name1" ></td>
                                                                                <td><span class = "rr" id = "error2">กรอกชื่อยูนิต</span></td>
                                                                            </tr>
                                                                        </tbody>
                                                         </table>
                                                                <div style = "padding-bottom:10px!important;">
                                                                     <input data-dismiss="modal" type = "submit" class="btn btn-info" value = "ตกลง" id  = "btn_submit"/>
                                                                     <a data-dismiss="modal" class="btn btn-danger" id = "clear">ยกเลิก</a>
                                                                </div>
                                                                <input type = 'hidden' id = 'unit_id' name = "unit_id"/>
                                                        </div>
                                              </center>
                                              </form>
                                       </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    <script>
                        $(document).ready(function() {
                            $("#error1,#error2").hide();
                            //submit edit form
                            
                            //clear form edit 
                            $("#clear").click(function( event ){
                                $("#unit_number").val('');
                                $("#unit_name").val('');
                            });
                            //get value at edit 
                            $(".nn").click(function( event ){
                                var id = $(this).attr('title');
                                 $.post( "index.php/eqm/unit_data/edit_unit",{'id':id}, function( data ) {
                                         var id = data['0'].unit_id ;
                                         var unit_number = data['0'].unit_number ;
                                         var unit_name   = data['0'].unit_name ;
                                         $("#unit_number1").val(unit_number);
                                         $("#unit_name1").val(unit_name);
                                         $("#unit_id").val(id);
                                         
                                }, "json"); 

                            });
                            $('#unit').dataTable();
                           
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