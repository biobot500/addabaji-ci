<form action="<?=base_url()?>profile/<?=$user_id?>/send_message" method="post">
<table width="100%" border="0" id="send_msg" cellpadding="5" cellspacing="5">
  <tr>
    <td width="28" valign="top">To</td>
    <td width="3" valign="top">:</td>
    <td width="1136" valign="top"><?=$username?></td>
  </tr>
  <tr>
    <td width="28" valign="top">Subject</td>
    <td width="3" valign="top">:</td>
    <td width="1136" valign="top"><input type="input" name="subject" /></td>
  </tr>
  <tr>
    <td colspan="3" valign="top"><label for="textarea"></label>
    <textarea name="body" id="textarea" cols="45" rows="5" style="width: 100%"></textarea></td>
  </tr>
  <tr>
    <td colspan="3" valign="top">
        <Center>
            <input type="submit" value="Send Message" /></td>
        </Center>
  </tr>
</table>
</form>