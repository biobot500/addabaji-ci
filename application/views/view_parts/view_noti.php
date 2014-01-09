<link rel="stylesheet" href="<?=base_url()?>style/style.css">
<?php
error_reporting(0);
if($noti) {
foreach($noti->result() as $n) {
    if($n->new==1) {
        $new = "notification_new";
    } else {
        $new = "";
    }
    switch($n->type) {
        case 'comment':
            $status = $this->status->get_status_by_id($n->obj_id);
            echo '<p class="notification '.$new.'"><a href="'.  get_profile_url($status->user_id).'/'.$status->id.'" target="_blank">'.$n->msg.':'.$status->status.'</a></p>';
        break;
        case 'message':
            echo '<p class="notification '.$new.'"><a href="'.  base_url().'messages" target="_blank">'.$n->msg.'</a></p>';
        break;
    }
}
$this->notifications->clear();
} else {
    echo "No new notification found.";
}
?>