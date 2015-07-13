                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="year_budget">
                                    <thead class = "hd1">
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รหัสปีงบประมาณ</th>
                                            <th>ชื่อปีงบประมาณ</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $num = 0;
                                        foreach($getall as $row){ $num++;?>
                                        <tr class="odd gradeX" id = "se_<?php echo $row['year_budget_id'];?>">
                                            <td><?php echo $num;?></td>
                                            <td><?php echo $row['year_budget_number'];?></td>
                                            <td><?php echo $row['year_budget_name'];?></td>
                                            <td style="text-align:center!important;">
                                                <a href="javascript:void(0)"  class = "mm4" title = "<?php echo $row['year_budget_id'];?>"><img src = "icon/delete.ico" width = "20px"></a>
                                                &nbsp;<a title = "<?php echo $row['year_budget_id'];?>" class = "nn" href="#warning3" data-toggle="modal"><img src = "icon/edit.ico" width = "20px"></a>
                                            </td>
                                        </tr>
                                        <?php }?>                                       
                                    </tbody>
                                </table>
                         </div>
                          <div class="modal fade" id="warning3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-warning">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h2>แก้ไข ปีงบประมาณ</h2>
                                    </div>
                                    <div class="modal-body">
                                               <form onsubmit = "return false" id  = "my_year_budget1" >
                                                <center>
                                                    <div style = "width:100%!important;margin-top:10px!important;">
                                                         <table class="table table-striped">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td width = "25%">รหัสปีงบประมาณ</td>
                                                                                <td width = "60%px"><input class="form-control" id = "year_budget_number1" name = "year_budget_number1" ></td>
                                                                                <td><span class = "rr" id = "error7">กรอกรหัส วิธีการที่ได้มา</span></td>
                                                                            </tr>
                                                                             <tr>
                                                                                <td>ชื่อปีงบประมาณ</td>
                                                                                <td><input class="form-control" id = "year_budget_name1" name = "year_budget_name1" ></td>
                                                                                <td><span class = "rr" id = "error8">กรอกชื่อ วิธีการที่ได้มา</span></td>
                                                                            </tr>
                                                                        </tbody>
                                                         </table>
                                                                <div style = "padding-bottom:10px!important;">
                                                                     <input data-dismiss="modal" type = "submit" class="btn btn-info" value = "ตกลง" id  = "btn_submit4"/>
                                                                     <a data-dismiss="modal" class="btn btn-danger" id = "clear">ยกเลิก</a>
                                                                </div>
                                                                <input type = 'hidden' id = 'year_budget_id1' name = "year_budget_id1"/>
                                                        </div>
                                              </center>
                                              </form>
                                       </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    <script>
                        $(document).ready(function() {
                            $("#error7,#error8").hide();
                            
                            //clear form edit 
                            $("#clear").click(function( event ){
                                $("#unit_number").val('');
                                $("#unit_name").val('');
                            });
                            //get value at edit 
                            $(".nn").click(function( event ){
                                var id = $(this).attr('title');
                                 $.post( "index.php/eqm/year_budget_data/edit_year_budget",{'id':id}, function( data ) {
                                         var id = data['0'].year_budget_id ;
                                         var year_budget_number = data['0'].year_budget_number ;
                                         var year_budget_name   = data['0'].year_budget_name ;
                                         $("#year_budget_number1").val(year_budget_number);
                                         $("#year_budget_name1").val(year_budget_name);
                                         $("#year_budget_id1").val(id);
                                         
                                }, "json"); 

                            });
                            $('#year_budget').dataTable();
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