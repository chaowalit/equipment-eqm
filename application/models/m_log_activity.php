<?php


class m_log_activity extends CI_Model{
    //put your code here
    function getLogActivity(){
        $this->db->select('*');
        $this->db->from('log_user');
        $this->db->join('user_account', 'user_account.id = log_user.user_account_id');
        $this->db->join('log_user_activity', 'log_user_activity.log_user_id = log_user.id');
        
        $this->db->order_by('log_user.login_time','desc');
        $result = $this->db->get();
        return $result->result();
    }
    function create_log_activityDB($user_id, $login_time){
        $data = array(
            "user_account_id" => $user_id,
            "login_time" => $login_time
        );
        
        $this->db->trans_start();
        $this->db->insert('log_user',$data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return  $insert_id;
    }
    function logout_log_activityDB($user_id, $logout_time, $log_id){
        $data = array(
            
            "logout_time" => $logout_time
        );
        $this->db->where('id', $log_id);
        $this->db->update('log_user', $data); 
    }
    function log_activityDB($log_id, $activity, $comment){
        $data = array(
            "log_user_id" => $log_id,
            "activity" => $activity,
            "comment" => $comment
        );
        $this->db->insert('log_user_activity',$data);
    }
}
