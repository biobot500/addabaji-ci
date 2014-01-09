<div class="profile_update">
<h1>Messages</h1>
<?php
    $msg_threads = $this->mahana_messaging->get_all_threads_grouped(get_logged_in_user_id(),false,'DESC');

    foreach($msg_threads['retval'] as $k=>$v)  {

        $sender_id= 1;
        $last_index = count($v['messages'])-1;
        $info = $v['messages'][$last_index];

        $subject = $info['subject'];
        $sender_id = $info['sender_id'];


        $this->load->view('view_parts/msg_thread_template',$v);
    }
?>
</div>