<div class="status_templates">
    <div class="pic">
        <img src="<?=  get_avatar($sender_id)?>" width="50px" height="50" class="triangle-border-img"/>
    </div>
    <div class="status">
    <p class="triangle-border left">
            <span id="user_info">
                <b><a href="<?=get_profile_url($sender_id)?>"><?=get_user_name($sender_id)?></a></b> on <?=date("d F h:i A",  strtotime($cdate))?><br/>
            </span>
        
        <?=$body?><br/>
        <a href="<?=  base_url()?>messages/send_reply/<?=$id?>?keepThis=true&TB_iframe=true&height=250&width=700" class="thickbox">Reply</a>
        
    </p>

    </div>
</div>
<?
    $this->mahana_messaging->update_message_status($id, $sender_id, 0);
?>