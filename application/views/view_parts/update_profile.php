<?
$profile = get_profile(get_logged_in_user_id());
?>
<div class="profile_update">
    <h1>Basic Informations</h1>

<form id="form1" name="form1" method="post" action="<?=base_url()?>update_profile">
  <table width="521" border="0">
    <tr>
      <td width="93">Name</td>
      <td width="8">:</td>
      <td width="398">
      <input type="text" name="name" id="name" value="<?=$profile->name?>"/></td>
    </tr>
    <tr>
      <td>Age</td>
      <td>:</td>
      <td><input type="text" name="age" id="age"  value="<?=$profile->age?>"/></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td>:</td>
      <td>
        <select name="gender" id="gender">
            <option value="-">-Select-</option>
            <option value="male" <?=$profile->gender=='male'?'selected':''?>>Male</option>
            <option value="female" <?=$profile->gender=='female'?'selected':''?>>Female</option>
      </select>
      </td>
    </tr>
    <tr>
      <td>Location</td>
      <td>:</td>
      <td><input type="text" name="location" id="location"  value="<?=$profile->location?>"/></td>
    </tr>
    <tr>
      <td>Occupation</td>
      <td>:</td>
      <td><input type="text" name="occu" id="occu"  value="<?=$profile->occu?>"/></td>
    </tr>
    <tr>
      <td colspan="3"><input type="submit" name="button" id="button" value="Update" /></td>
    </tr>
  </table>
</form>
    <h1>Profile Picture</h1>
  
<div id="profile_page">
        



<table width="100%" border="0">
    <tr>
      <td  height="93"><img src="<?php echo $avatar; ?>" width="100" class="triangle-border-img"/></td>
      <td >
        <?php
        // underneath display the form to update the picture
        echo form_open_multipart('user/edit_profilepic');
        $Fdata = array('name' => 'avatar', 'class' => 'file'); // set your file and class for the image
        echo form_upload($Fdata); // upload the datas here the image that user has selected.
        echo form_submit('mysubmit', 'Upload'); // your submit button fucntion
        ?>
      </td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
</div>
    <center><a href="<?=base_url()?>profile/<?=  get_logged_in_user_id()?>">View My Profile</a> | <a href="<?=base_url()?>auth/change_password">Change Password</a></center>

    
    <br/>
    <br/>
</div>

