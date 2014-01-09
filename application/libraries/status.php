<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Status {
    
    function  __construct() {
        
    }
    function insert_status($params) {
        $ci = &get_instance();
        $ci->db->insert("status",$params);
    }
    function get_status()
    {
        $ci = &get_instance();
        $result = $ci->db->query("SELECT * FROM status WHERE banned=0 ORDER by id DESC");
        if($result->num_rows()>0){
            return $result->result();
        }
        return false;
    }
    function get_comments_count($status_id) {
        $ci = &get_instance();
        $result = $ci->db->query("SELECT COUNT(*) as t FROM comments WHERE status_id=$status_id AND banned=0 ORDER by date ASC");
        return $result->row()->t;
    }
    function get_comments($status_id) {
        $ci = &get_instance();
        $result = $ci->db->query("SELECT *  FROM comments WHERE status_id=$status_id AND banned=0 ORDER by date ASC");
        return $result;
    }
    function insert_comment($params) {
        $ci = &get_instance();
        $ci->db->insert("comments",$params);
    }
    function get_status_by_userid($user_id)
    {
        $ci = &get_instance();
        $result = $ci->db->query("SELECT * FROM status WHERE user_id='$user_id' AND banned=0 ORDER by id DESC");
        if($result->num_rows()>0){
            return $result;
        }
        return false;
    }
    function get_single_status_by_id($status_id) {
        $ci = &get_instance();
        $result = $ci->db->query("SELECT * FROM status WHERE id='$status_id' AND banned=0 ORDER by id DESC");
        if($result->num_rows()>0){
            return $result->row();
        }
        return false;
    }
    function get_status_by_id($id)
    {
        $ci = &get_instance();
        $result = $ci->db->query("SELECT * FROM status WHERE banned=0 AND id=$id ORDER by id DESC");
        if($result->num_rows()>0){
            return $result->row();
        }
        return false;
    }

}
?>
