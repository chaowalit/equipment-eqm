<form id="form_set_permission" enctype="multipart/form-data">
    <div>
        <table class="table table-hover" style="width:100% !important;">
            <thead>
                <tr style="text-align: center;">
                    <th>ชื่อเมนู</th>
                    <th>อนุญาติ</th>
                    <th>ไม่อนุญาติ</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($menu_all as $row){
                        echo "<tr>";
                        echo "<td>$row->menu_name</td>";
                        if(@$permission_to_array[$row->id] == $row->id){
                            echo "<td><input type=\"radio\"  name=\"$row->id\" value=\"$row->id\" checked></td>";
                            echo "<td><input type=\"radio\"  name=\"$row->id\" value=\"0\"></td>";
                        }else{
                            echo "<td><input type=\"radio\"  name=\"$row->id\" value=\"$row->id\"></td>";
                            echo "<td><input type=\"radio\"  name=\"$row->id\" value=\"0\" checked></td>";
                        }
                        echo "</tr>";
                    }
                ?>
                <tr>
                    <td colspan="3">
                        <div style="text-align: right;">
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                            <a data-dismiss="modal" class="btn btn-danger" id = "clearDataSetPermission">ยกเลิก</a> &nbsp;
                            <button type="submit"  class="btn btn-info" id = "btn_update_permission_user"><< บันทึก</button> 
                        </div>
                    </td>
                </tr>
            </tbody>
        </table> 
    </div>
</form>

