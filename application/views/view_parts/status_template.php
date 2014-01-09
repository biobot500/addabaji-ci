<?
error_reporting(0);
?>
<div class="status_templates">
    <div class="pic">
        <img src="<?=  get_avatar($user_id)?>" width="50" height="50" class="triangle-border-img"/>
    </div>
    <div class="status">
    <p class="triangle-border left">
            <span id="user_info">
                <b><a href="<?=get_profile_url($user_id)?>"><?=get_user_name($user_id)?></a></b> on <?=date("d F h:i A",  strtotime($date))?><br/>
            </span>
        <?=$status?>
<br/><br/>

<a href="javascript:void(0)" onclick="get_comments('<?=$id?>')"><?=get_comments_count($id)?> Comments</a> | <a href="<?=  get_profile_url($user_id)?>/<?=$id?>">View</a>


    </p>
    
    </div>
</div>
<div id="comment_<?=$id?>"  class="comment_templates" style="margin-left:120px;width:500px;">

</div>
<?php
if($show_comments) {
    ?>
<script>
        get_comments('<?=$id?>')
</script>
    <?
}
?>