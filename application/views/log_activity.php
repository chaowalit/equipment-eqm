<?php $this->load->view('include/eqm/header'); ?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
           คุณอยู่ที่ >> เกี่ยวกับโปรแกรม >> ข้อมูลการใช้งาน</h3>
        <span class="pull-right clickable panel-collapsed" id="clickable"><i class="glyphicon glyphicon-plus"></i></span>
    </div>
    <div class="panel-body">  
        <div style = "margin-left:20px!important">  
            <h3><b>
                ข้อมูลการใช้งานระบบ
                 </b>
            </h3>
            <br/>
        </div>
        <div class="table-responsive">
            <div style = "margin-left:20px;margin-right:20px;">
                <div class="table-responsive" id="show_data_log">
                    <table class="table  table-bordered" id="dataTables-example">
                        <thead class = "hd1">
                            <tr>
                                <th>วัน/เวลาเข้าระบบ</th>
                                <th>วัน/เวลาออกจากระบบ</th>
                                <th>ชื่อผู้ใช้งาน</th>
                                <th>เข้าใช้งานระบบ</th>
                                <th>หมายเหตุ</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                                foreach($log_print as $row){
                           ?>
                            <tr>
                                <td><?php echo $row->login_time; ?></td>
                                <td><?php echo $row->logout_time; ?></td>
                                <td><?php echo $row->full_name; ?></td>
                                <td><?php echo $row->activity; ?></td>
                                <td><?php echo $row->comment; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>
</div>
<?php $this->load->view('include/eqm/footer'); ?>

