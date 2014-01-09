<script>
        $(document).ready(function() {
          $('textarea, input[type=text]').avro({"bangla":false});
        })
</script>
<table width="513" border="0">
<?php
//echo $this->db->last_query();

foreach($comments->result() as $comment) {

    $profile_image = get_avatar($comment->user_id);
    $user_id = $comment->user_id;
    $date = $comment->date;
?>

  <tr>
    <td width="50" valign="top"><img name="" src="<?=$profile_image?>" width="50" alt="" class="triangle-border-img"/></td>
    <td width="427" valign="top"><b><a href="<?=get_profile_url($user_id)?>"><?=get_user_name($user_id)?></a></b> on <?=date("d F h:i A",  strtotime($date))?><br/>
        <?=$comment->comment;?>
    </td>
  </tr>

<?
}
?>
  <?
  if(is_authenticated ()) {
  ?>
    <tr>
        <td colspan="2" valign="top">
            <textarea style="width:400px;float: left;height:42px;" id="comment_text_<?=$status_id?>"></textarea>
            <input type="button" value="Comment" style="height:50px" onclick="send_comment('<?=$status_id?>')"/>
        </td>
    </tr>
    <?
    } else {
    ?>
    <tr>
        <td colspan="2" valign="top">
            <center>
            <a href="<?=base_url()?>auth/login">Login</a> to Comment
            </center>
        </td>
    </tr>
    <?
    }
    ?>
</table>