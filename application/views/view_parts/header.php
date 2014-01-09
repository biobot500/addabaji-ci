    	<div class="logo">
            <a href="<?=base_url()?>">ADDABAJI.NET</a>
        </div>
        <div class="top_nav">
            <? if ($this->tank_auth->is_logged_in()) { ?>
            Hello <?=get_user_name(get_logged_in_user_id()) ?> :
            <a href="<?= base_url()?>">Home</a>
            <a href="<?=  get_profile_url(get_logged_in_user_id())?>">My Profile</a>
            <a href="<?=base_url()?>messages">Messages</a>
                <a href="<?=base_url()?>update_profile">Update Profile</a>
        	<a href="<?=base_url()?>auth/logout">Logout</a>
            <? } else {?>
            	<a href="<?=base_url()?>auth/login">Login</a>&nbsp;<a href="<?=base_url()?>auth/register">Signup</a>
            <? } ?>
        </div>