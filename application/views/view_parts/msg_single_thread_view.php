<?
$msg_threads = $this->mahana_messaging->get_full_thread($thread_id,  get_logged_in_user_id());
?>
<div class="profile_update">
<h1>Messages > <?=$msg_threads['retval'][0]['subject']?></h1>
<?php
    
    foreach($msg_threads['retval'] as $k=>$v)  {
        //echo '<pre>';
        //    print_r($v);
        //echo '</pre>';
        $this->load->view('view_parts/msg_single_thread_template',$v);
    }
?>
</div>