                            <div style="height: 300px; overflow:scroll!important;">
                                  <table class="table" id="data3" >
                                    <thead class = "header1">
                                        <tr>
                                            <th>รหัส</th>
                                            <th>ขนาด/ลักษณะ</th>
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
                                            <td width = "20%"><?php echo $row['detail_number'];?></td>
                                            <td width = "60%"><?php echo $row['detail_name'];?></td>
                                            <td width = "20%">
                                                <a  title = "<?php echo $row['detail_id'];?>" class = 'delete3' href = "javascript:void(0);"><img src="icon/delete.ico" width="20px"></a><a title = "<?php echo $row['detail_id'];?>" class = "edit3" href="#edit3" data-toggle="modal"><img src = "icon/edit.ico" width = "20px"></a>
                                            </td>
                                          </tr>
                                        <?php }}?>                           
                                    </tbody>
                                </table>
                             </div>


                             <!--modal bootstap-->
                           <div class="modal fade" id="edit3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-warning">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h2>แก้ไขขนาด/ลักษณะ</h2>
                                    </div>
                                    <div class="modal-body">
                                               <form onsubmit = "return false" id  = "form3_3">
                                                  <center>
                                                        <div style = "width:80%!important;">
                                                                   <table class="table table-striped">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width = "40%">ลำดับ</td>
                                                                                    <td width = "60%px"><input class="form-control" id = "detail_number3" name = "detail_number3" ></td>
                                                                                </tr>
                                                                                 <tr>
                                                                                    <td>ประเภท</td>
                                                                                    <td><input class="form-control" id = "detail_name3" name = "detail_name3" ></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td>
                                                                                            <div style = "padding-bottom:10px!important;">
                                                                                                 <input data-dismiss="modal" type = "submit" class="btn btn-info" value = "ตกลง" id  = "btn_edit3"/>
                                                                                                 <a data-dismiss="modal" class="btn btn-danger" id = "clear">ยกเลิก</a>
                                                                                            </div>
                                                                                            <input type = 'hidden' id = 'detail_hide3' name = "detail_hide3"/>
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
                        background-color: #0099FF!important;
                        -webkit-border-top-left-radius: 5px;
                        -webkit-border-top-right-radius: 5px;
                        -moz-border-radius-topleft: 5px;
                        -moz-border-radius-topright: 5px;
                         border-top-left-radius: 5px;
                         border-top-right-radius: 5px;
                    }
                    </style>
                    <script type="text/javascript">
                        $(document).ready(function(){
                          $("#depreciation_age1").keyup(function(){
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
                          $("#depreciation_year1").keyup(function(){
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
                        });
                    </script>