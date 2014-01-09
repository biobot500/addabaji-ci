
<table width="100%" border="0">
  <tr>
    <td width="15%" rowspan="5">
        <center>
        <img src="<?=  $avatar?>" width="120" height="100" class="triangle-border-img"/><br/>
        
        <a href="">Send Message</a>
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
$s = $status;


                $s_info = array(
                    'id'=>$s->id,
                    'user_id'=>$s->user_id,
                    'status'=>$s->status,
                    'type'=>$s->type,
                    'date'=>$s->date,
                    'show_comments'=>true
                );
?>
            <?=$this->load->view('view_parts/status_template',$s_info)?>
