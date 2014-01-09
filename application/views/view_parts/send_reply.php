<?
    //$info = get_profile($sender_id);
?>

<form action="<?=base_url()?>messages/send_reply/<?=$msg_id?>" method="post">
<table width="100%" border="0" id="send_msg" cellpadding="5" cellspacing="5">
<?
    if(isset($status)) {
?>
   <tr>
       <td colspan="3" width="1136" valign="top"><p><?=$status?></p></td>
  </tr>
<?
    }
?>
<tr>    
    <td colspan="3" valign="top"><label for="textarea"></label>
    <textarea name="body" id="textarea" cols="45" rows="5" style="width: 100%"></textarea></td>
  </tr>
  <tr>
    <td colspan="3" valign="top">
        <Center>
            <input type="submit" value="Send Reply" /></td>
        </Center>
  </tr>
</table>
</form>