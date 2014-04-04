<?php echo $this->element("left_navigation"); ?>
<section class="right_cont">
<div class="login_form_main">
	<h1>Change Password</h1>
	
	<?php echo $this->Form->create("User"); ?>
	<div class="login_form_row">
		<label for="UserOldpassword">Current Password</label>
		<?php echo $this->Form->input("oldpassword",array("type"=>"password","maxlength"=>15,"div"=>false,"label"=>false,"class"=>"username_input")); ?>
	</div>
	<div class="login_form_row">
		<label for="UserNewpassword">New Password</label>
		<?php echo $this->Form->input("newpassword",array("type"=>"password","maxlength"=>15,"div"=>false,"label"=>false,"class"=>"username_input")); ?>
	</div>
	<div class="login_form_row">
		<label for="UserUsername">Confirm Password</label>
		<?php echo $this->Form->input("confirmpassword",array("type"=>"password","maxlength"=>15,"div"=>false,"label"=>false,"class"=>"username_input")); ?>
	</div>
	<div class="login_form_row">
		<?php echo $this->Form->submit("Submit",array("div"=>false,"label"=>false,"class"=>"login_submit")); ?>
	</div>
	<?php echo $this->Form->end(); ?>
</div>
</section>