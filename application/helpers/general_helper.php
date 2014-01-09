<?
function get_image_url($image_name) {
	$ci = &get_instance();
	return base_url().$ci->config->item('image_path').$image_name;
}
function is_authenticated() {
	$ci = &get_instance();
        if ($ci->tank_auth->is_logged_in()) {
            return true;
        }
        return false;
}
function insert_status()
{
        
	$ci = &get_instance();
        $data = array(
            'user_id' => get_logged_in_user_id(),
            'type' => "text",
            'status' => $ci->input->post("status"),
            'date' => date('Y-m-d H:i:s'),
            'banned' => 0
        );
        $ci->status->insert_status($data);

}
function get_logged_in_user_id() {
    $ci = &get_instance();
    return $ci->session->userdata('user_id');
}
function get_status()
{
    $ci = &get_instance();
    return $ci->status->get_status();
}
function get_user_name($user_id) {
	$ci = &get_instance();
        $name = $ci->tank_auth->get_name($user_id);
        if ($name) {
            return $name;
        }
        return false;
}
function get_comments_count($status_id) {
        $ci = &get_instance();
    return $ci->status->get_comments_count($status_id);
}
function get_comments($status_id) {
        $ci = &get_instance();
    return $ci->status->get_comments($status_id);
}
function insert_comment($params) {
    $ci = &get_instance();
    return $ci->status->insert_comment($params);
}
function update_profile($params, $user_id) {
    $ci = &get_instance();
    $data = array(
      'name' => $params['name'],
      'age'=>$params['age'],
      'gender'=>$params['gender'],
      'location'=>$params['location'],
      'occu'=>$params['occu']
    );
    return $ci->profile->update_profile($data,$user_id);
}
function get_profile($user_id) {
    $ci = &get_instance();
    return $ci->profile->get_profile($user_id);
}
function get_avatar($user_id) {
    $ci = &get_instance();
    return base_url().'/'.$ci->profile->get_avatar($user_id);
}
function get_profile_url($user_id) {
    return base_url().'profile/'.$user_id;
}
?>