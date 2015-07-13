                            <div style="height: 300px; overflow:scroll!important;">
                                     <table class="table" id="data4">
                                    <thead class = "header1">
                                        <tr>
                                            <th>รหัส</th>
                                            <th>ชนิด</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $num = count($getall);
                                        if($num == 0){ 
                                        ?>
                                         <tr>
                                            <td  colspan="3" style = "text-align:center!important;">--- ไม่มีข้อมูล ---</td>
                                          </tr>
                                        <?php }else{?>
                                        <?php foreach($getall as $row){?>
                                          <tr title = "<?php echo $row['detail_id'];?>" style="cursor:pointer">
                                            <td width = "20%"><?php echo $row['detail_numbers'];?></td>
                                            <td width = "60%"><?php echo $row['detail_names'];?></td>
                                            <td width = "20%">
                                                <a  title = "<?php echo $row['detail_id'];?>" class = 'delete4' href = "javascript:void(0);"><img src="icon/delete.ico" width="20px"></a><a title = "<?php echo $row['detail_id'];?>" class = "edit4" href="#edit4" data-toggle="modal"><img src = "icon/edit.ico" width = "20px"></a>
                                            </td>
                                          </tr>
                                        <?php }}?>                           
                                    </tbody>
                                </table>
                             </div>


                             <!--modal bootstap-->
                                   <div class="modal fade" id="edit4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-warning">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h2>แก้ไขชื่อ/รายละเอียด</h2>
                                    </div>
                                    <div class="modal-body">
                                                 <form onsubmit = "return false" id  = "form4_4">
                                                    <center>
                                                          <div style = "width:100%!important;">
                                                                     <table class="table table-striped">
                                                                              <tbody>
                                                                                  <tr>
                                                                                      <td width = "40%">รหัส</td>
                                                                                      <td width = "60%px"><input class="form-control" id = "detail_numbers1" name = "detail_numbers1" maxlength="4"></td>
                                                                                  </tr>
                                                                                   <tr>
                                                                                      <td>ชื่อ/รายละเอียด</td>
                                                                                      <td><input class="form-control" id = "detail_names1" name = "detail_names1" ></td>
                                                                                  </tr>
                                                                                  <tr>
                                                                                      <td></td>
                                                                                      <td>
                                                                                           <div style = "padding-bottom:10px!important;">
                                                                                                 <input data-dismiss="modal" type = "submit" class="btn btn-info" value = "ตกลง" id  = "btn_edit4"/>
                                                                                                 <a data-dismiss="modal" class="btn btn-danger" id = "clear">ยกเลิก</a>
                                                                                            </div>
                                                                                            <input type = 'hidden' id = 'detail_id1' name = "detail_id1"/>
                                                                                      </td>
                                                                                  </tr>
                                                                              </tbody>
                                                                     </table>
                                                            </div>
                                                  </center>
                                           </form>
                                       </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
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
                    <script type="text/javascript">
                        $("#detail_numbers1").keyup(function(){
                            var txt = $(this).val();
                            if(isNaN(txt))
                            {
                              alert("ต้องกรอกตัวเลขเท่านั้น");
                              $(this).val('');
                            }
                            else
                            {
                               
                            }
                        });
                    </script>