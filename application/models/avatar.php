<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Avatar extends CI_Model
{
    public function update_profile_pic($user_id){
    //show($user_id);
    if($_FILES['avatar']['error'] == 0){
        $relative_url = 'profile_pic/'.$this->upload->file_name;
        $profile_data['avatar'] = $relative_url;
    }
    $this->db->where('id', $user_id);
    $this->db->update('user_profiles', $profile_data);
    }
}