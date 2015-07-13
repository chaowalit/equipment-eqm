<?php

class m_notify_alert extends CI_Model{
    //put your code here
    function changeNotifyAlertFinish($repair_id){
        $data = array(
            "notify_alert" => 0
        );
        $this->db->where('id', $repair_id);
        $this->db->update('eqm_repair', $data); 
    }
}
