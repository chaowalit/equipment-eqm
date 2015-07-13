                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="method">
                                    <thead class = "hd1">
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รหัสวิธีการที่ได้มา</th>
                                            <th>ชื่อวิธีการที่ได้มา</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $num = 0;
                                        foreach($getall as $row){ $num++;?>
                                        <tr class="odd gradeX" id = "se_<?php echo $row['method_id'];?>">
                                            <td><?php echo $num;?></td>
                                            <td><?php echo $row['method_number'];?></td>
                                            <td><?php echo $row['method_name'];?></td>
                                            <td style="text-align:center!important;">
                                                <a href="javascript:void(0)" class = "mm3" title = "<?php echo $row['method_id'];?>"><img src = "icon/delete.ico" width = "20px"></a>
                                                &nbsp;<a title = "<?php echo $row['method_id'];?>" class = "nn" href="#warning2" data-toggle="modal"><img src = "icon/edit.ico" width = "20px"></a>
                                            </td>
                                        </tr>
                                        <?php }?>                                       
                                    </tbody>
                                </table>
                         </div>
                          <div class="modal fade" id="warning2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-warning">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h2>แก้ไข วิธีการที่ได้มา</h2>
                                    </div>
                                    <div class="modal-body">
                                               <form onsubmit = "return false" id  = "my_method1" >
                                                <center>
                                                    <div style = "width:100%!important;margin-top:10px!important;">
                                                         <table class="table table-striped">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td width = "25%">รหัสวิธีการที่ได้มา</td>
                                                                                <td width = "60%px"><input class="form-control" id = "method_number1" name = "method_number1" ></td>
                                                                                <td><span class = "rr" id = "error5">กรอกรหัส วิธีการที่ได้มา</span></td>
                                                                            </tr>
                                                                             <tr>
                                                                                <td>ชื่อวิธีการที่ได้มา</td>
                                                                                <td><input class="form-control" id = "method_name1" name = "method_name1" ></td>
                                                                                <td><span class = "rr" id = "error6">กรอกชื่อ วิธีการที่ได้มา</span></td>
                                                                            </tr>
                                                                        </tbody>
                                                         </table>
                                                                <div style = "padding-bottom:10px!important;">
                                                                     <input data-dismiss="modal" type = "submit" class="btn btn-info" value = "ตกลง" id  = "btn_submit3"/>
                                                                     <a data-dismiss="modal" class="btn btn-danger" id = "clear">ยกเลิก</a>
                                                                </div>
                                                                <input type = 'hidden' id = 'method_id1' name = "method_id1"/>
                                                        </div>
                                              </center>
                                              </form>
                                       </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    <script>
                        $(document).ready(function() {
                            $("#error5,#error6").hide();
                            
                            //clear form edit 
                            $("#clear").click(function( event ){
                                $("#unit_number").val('');
                                $("#unit_name").val('');
                            });
                            //get value at edit 
                            $(".nn").click(function( event ){
                                var id = $(this).attr('title');
                                 $.post( "index.php/eqm/method_data/edit_method",{'id':id}, function( data ) {
                                         var id = data['0'].method_id ;
                                         var method_number = data['0'].method_number ;
                                         var method_name = data['0'].method_name ;
                                         $("#method_number1").val(method_number);
                                         $("#method_name1").val(method_name);
                                         $("#method_id1").val(id);
                                         
                                }, "json"); 

                            });
                            $('#method').dataTable();
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