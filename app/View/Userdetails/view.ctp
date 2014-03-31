<h1>My Profile</h2>
<span style="float:right;"><a href="<?php echo $this->Html->url("/editprofile/".$userdetail['Userdetail']['id']); ?>">Edit Profile</a></span>
<section class="left_cont"></section>
<section class="right_cont">

		<label class="header"><?php echo __('Salutation'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['salutation']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('First Name'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['first_name']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Last Name'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['last_name']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Gender'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['gender']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Birth Date'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['birth_date']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Work Phone'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['work_phone']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Work Phone Extension'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['work_phone_extension']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Home Phone'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['home_phone']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Mobile Phone'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['mobile_phone']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Street Address'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['street_address']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Address1'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['address1']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('City'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['city']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Street Number'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['street_number']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Street Name'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['street_name']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Street Unit'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['street_unit']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Street Type'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['street_type']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Street Direction'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['street_direction']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Province'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Province']['name']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Postal Code'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['postal_code']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Communication Preferences'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['communication_preferences']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Email Notifications'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['email_notifications']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Created'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['created']); ?>
			&nbsp;
		</label>
		<div class="separator"></div>
		<label class="header"><?php echo __('Modified'); ?></label>
		<label class="cont">
			<?php echo h($userdetail['Userdetail']['modified']); ?>
			&nbsp;
		</label>
	</dl>
</section>
