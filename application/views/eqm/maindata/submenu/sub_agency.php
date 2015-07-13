                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="agency">
                                    <thead class = "hd1">
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รหัส ผู้ขาย/ผู้รับจ้าง/ผู้บริจาค</th>
                                            <th>ชื่อ ผู้ขาย/ผู้รับจ้าง/ผู้บริจาค</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $num = 0;
                                        foreach($getall as $row){ $num++;?>
                                        <tr class="odd gradeX" id = "se_<?php echo $row['agency_id'];?>">
                                            <td><?php echo $num;?></td>
                                            <td><?php echo $row['agency_number'];?></td>
                                            <td><?php echo $row['agency_name'];?></td>
                                            <td style="text-align:center!important;">
                                                <a href="javascript:void(0)"  class = "mm2" title = "<?php echo $row['agency_id'];?>"><img src = "icon/delete.ico" width = "20px"></a>
                                                &nbsp;<a title = "<?php echo $row['agency_id'];?>" class = "nn" href="#warning1" data-toggle="modal"><img src = "icon/edit.ico" width = "20px"></a>
                                            </td>
                                        </tr>
                                        <?php }?>                                       
                                    </tbody>
                                </table>
                         </div>
                          <div class="modal fade" id="warning1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-warning">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h2>แก้ไข ผู้ขาย/ผู้รับจ้าง/ผู้บริจาค</h2>
                                    </div>
                                    <div class="modal-body">
                                               <form onsubmit = "return false" id  = "my_agency1" >
                                                <center>
                                                    <div style = "width:100%!important;margin-top:10px!important;">
                                                         <table class="table table-striped">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td width = "20%">รหัส ผู้ขาย/ผู้รับจ้าง/ผู้บริจาค</td>
                                                                                <td width = "60%px"><input class="form-control" id = "agency_number1" name = "agency_number1" ></td>
                                                                                <td><span class = "rr" id = "error1">กรอกรหัส ผู้ขาย/ผู้รับจ้าง/ผู้บริจาค</span></td>
                                                                            </tr>
                                                                             <tr>
                                                                                <td>ชื่อ ผู้ขาย/ผู้รับจ้าง/ผู้บริจาค</td>
                                                                                <td><input class="form-control" id = "agency_name1" name = "agency_name1" ></td>
                                                                                <td><span class = "rr" id = "error2">กรอกชื่อ ผู้ขาย/ผู้รับจ้าง/ผู้บริจาค</span></td>
                                                                            </tr>
                                                                        </tbody>
                                                         </table>
                                                                <div style = "padding-bottom:10px!important;">
                                                                     <input data-dismiss="modal" type = "submit" class="btn btn-info" value = "ตกลง" id  = "btn_submit2"/>
                                                                     <a data-dismiss="modal" class="btn btn-danger" id = "clear">ยกเลิก</a>
                                                                </div>
                                                                <input type = 'hidden' id = 'agency_id1' name = "agency_id1"/>
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
                                 $.post( "index.php/eqm/agency_data/edit_agency",{'id':id}, function( data ) {
                                         var id = data['0'].agency_id ;
                                         var agency_number = data['0'].agency_number ;
                                         var agency_name = data['0'].agency_name ;
                                         $("#agency_number1").val(agency_number);
                                         $("#agency_name1").val(agency_name);
                                         $("#agency_id1").val(id);
                                         
                                }, "json"); 

                            });
                            $('#agency').dataTable();
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
                    .select2-container
                    {
                        width: 100%!important;
                    }
                    </style>