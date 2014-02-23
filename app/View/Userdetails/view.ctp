<div class="userdetails view">
<h2><?php echo __('Profile'); ?></h2>
<span style="float:right;"><a href="<?php echo $this->Html->url("/editprofile/".$userdetail['Userdetail']['id']); ?>">Edit Profile</a></span>
	<dl>
		<dt><?php echo __('Salutation'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['salutation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birth Date'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['birth_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Work Phone'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['work_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Work Phone Extension'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['work_phone_extension']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Home Phone'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['home_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile Phone'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['mobile_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street Address'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['street_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address1'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['address1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Province'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['province']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postal Code'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['postal_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Communication Preferences'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['communication_preferences']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email Notifications'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['email_notifications']); ?>
			&nbsp;
		</dd>
	</dl>
</div>