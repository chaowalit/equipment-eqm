                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="title_names">
                                    <thead class = "hd1">
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รหัสคำนำหน้าชื่อ</th>
                                            <th>ชื่อคำนำหน้าชื่อ</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $num = 0;
                                        foreach($getall as $row){ $num++;?>
                                        <tr class="odd gradeX" id = "se_<?php echo $row['title_name_id'];?>">
                                            <td><?php echo $num;?></td>
                                            <td><?php echo $row['title_name_number'];?></td>
                                            <td><?php echo $row['title_name'];?></td>
                                            <td style="text-align:center!important;">
                                                <a href="javascript:void(0)" class = "mm7" title = "<?php echo $row['title_name_id'];?>"><img src = "icon/delete.ico" width = "20px"></a>
                                                &nbsp;<a title = "<?php echo $row['title_name_id'];?>" class = "nn" href="#warning7" data-toggle="modal"><img src = "icon/edit.ico" width = "20px"></a>
                                            </td>
                                        </tr>
                                        <?php }?>                                       
                                    </tbody>
                                </table>
                         </div>
                          <div class="modal fade" id="warning7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-warning">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h2>แก้ไข คำนำหน้าชื่อ</h2>
                                    </div>
                                    <div class="modal-body">
                                               <form onsubmit = "return false" id  = "my_title_name1" >
                                                <center>
                                                    <div style = "width:100%!important;margin-top:10px!important;">
                                                         <table class="table table-striped">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td width = "25%">รหัสคำนำหน้าชื่อ</td>
                                                                                <td width = "60%px"><input class="form-control" id = "title_name_number1" name = "title_name_number1" ></td>
                                                                                <td><span class = "rr" id = "error13">กรอกรหัส วิธีการที่ได้มา</span></td>
                                                                            </tr>
                                                                             <tr>
                                                                                <td>คำนำหน้าชื่อ</td>
                                                                                <td><input class="form-control" id = "title_name1" name = "title_name1" ></td>
                                                                                <td><span class = "rr" id = "error14">กรอกชื่อ วิธีการที่ได้มา</span></td>
                                                                            </tr>
                                                                        </tbody>
                                                         </table>
                                                                <div style = "padding-bottom:10px!important;">
                                                                     <input data-dismiss="modal" type = "submit" class="btn btn-info" value = "ตกลง" id  = "btn_submit7"/>
                                                                     <a data-dismiss="modal" class="btn btn-danger" id = "clear">ยกเลิก</a>
                                                                </div>
                                                                <input type = 'hidden' id = 'title_id1' name = "title_id1"/>
                                                        </div>
                                              </center>
                                              </form>
                                       </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    <script>
                        $(document).ready(function() {
                            $("#error13,#error14").hide();
                            
                            //clear form edit 
                            $("#clear").click(function( event ){
                                $("#unit_number").val('');
                                $("#unit_name").val('');
                            });
                            //get value at edit 
                            $(".nn").click(function( event ){
                                var id = $(this).attr('title');
                                 $.post( "index.php/eqm/title_name_data/edit_title_name",{'id':id}, function( data ) {
                                         var id = data['0'].title_name_id ;
                                         var title_name_number = data['0'].title_name_number ;
                                         var title_name   = data['0'].title_name ;
                                         $("#title_name_number1").val(title_name_number);
                                         $("#title_name1").val(title_name);
                                         $("#title_id1").val(id);
                                         
                                }, "json"); 

                            });
                            $('#title_names').dataTable();
                            $(".mm").click(function( event ){
                                    var id = $(this).closest('tr').attr('id').replace("se_","");
                                        $('[id$="_'+id+'"]').remove();
                                        $.post( "index.php/eqm/title_name_data/delete_content",{'id':$(this).attr('title')}, function( data ) {
                                        });
                                     event.preventDefault();
                            });
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