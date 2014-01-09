<a class="handle" href="javascript:void(0)">Share</a>
<?
if(is_authenticated ()) {
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td  height="23" valign="top">
<div class="status_templates">
    <div class="pic" style="float:left">
        <img src="<?=  get_avatar(get_logged_in_user_id())?>" width="50" height="50" style="" class="triangle-border-img"/>
    </div>
    <div class="status">
   <p class="triangle-border left">

          <textarea name="textarea" id="share" style="height:35px;width:100%;margin-bottom:5px"></textarea><br/>
      <input type="button" onclick="insert_status()" name="button" id="button" value="Share" style="margin-right:10px;font-size: 15px;width:100px"/>

      Keyboard: <span id="kb" style="font-weight: bold">English</span>
      <span style="font-size:9px;font-weight: bold">
      (Press Ctrl + M to switch to <span id="kb2">English</span>)
      </span>


   </p>
   </div>
</div>
    </td>

    <td width="334" valign="top">
        <center>
        <h1 style="margin:50px;">
        <a href="<?=  base_url()?>main/view_notifications/?keepThis=true&TB_iframe=true&height=250&width=700" title="New Notifications" class="thickbox">
        <?=$this->notifications->get_notifications_count(get_logged_in_user_id())?> Notification(s)
        </a>
        </h1>
        </center>
    </td>
  </tr>
</table>
<?
} else {
?>
<center>
    <br/>
<h1>
    <a href="<?=  base_url()?>auth/login">Click here</a> to Login. New user??? <a href="<?=  base_url()?>auth/register">Click here</a> to Signup
</h1>
    </center>
<?
}
?>

<script>
    <? if($this->uri->segment(1)=="") { ?>
    $(document).ready(function() {
        $( ".handle" ).trigger( "click" );
    });
    <? } ?>
</script>