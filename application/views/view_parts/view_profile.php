<table width="100%" border="0">
  <tr>
    <td width="15%" rowspan="5">
        <center>
        <img src="<?=  $avatar?>" width="120" height="100" class="triangle-border-img"/><br/>
        <? if($info->user_id != get_logged_in_user_id()) { ?>
        
            <a href="<?=  base_url()?>profile/<?=$info->user_id?>/send_message/?keepThis=true&TB_iframe=true&height=250&width=700" class="thickbox">Send Message</a>
        
        <? } ?>
            </center>
    </td>
    <td width="9%">Name</td>
    <td width="56%">:<?=$info->name?></td>
  </tr>
  <tr>
    <td>Age</td>
    <td>:<?=$info->age?></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td>:<?=$info->gender?></td>
  </tr>
  <tr>
    <td>Location</td>
    <td>:<?=$info->location?></td>
  </tr>
  <tr>
    <td>Occupation</td>
    <td>:<?=$info->occu?></td>
  </tr>
</table>
<?php
if($status) {
    foreach($status->result() as $s) {


                    $s_info = array(
                        'id'=>$s->id,
                        'user_id'=>$s->user_id,
                        'status'=>$s->status,
                        'type'=>$s->type,
                        'date'=>$s->date
                    );
        ?>
                <?=$this->load->view('view_parts/status_template',$s_info)?>
    <?
    }
} else {
    echo "No Post Yet!";
}
?>

