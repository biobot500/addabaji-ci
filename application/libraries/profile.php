<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Profile {

    function  __construct() {

    }
    function update_profile($params,$user_id) {
        $ci = &get_instance();
        $ci->db->where("user_id",$user_id);
        $ci->db->update("user_profiles",$params);
    }
    function get_profile($user_id) {
        $ci = &get_instance();
        $sql = "SELECT * FROM user_profiles WHERE user_id=$user_id";
        $result = $ci->db->query($sql);
        if($result->num_rows()>0) {
            return $result->row();
        }
        return false;
    }
    function get_avatar($user_id)  {
        $ci = &get_instance();
        $sql = "SELECT * FROM user_profiles WHERE user_id=$user_id";
        $result = $ci->db->query($sql);
        if($result->num_rows()>0) {
            return $result->row()->avatar;
        }
        return false;
    }
}
?>
