<div class="signup_form_main">
	<h1>Sign Up</h1>
	<?php echo $this->Form->create("User"); ?>
		<div class="signup_form_row">
			<div class="signup_form_indiv left">
				<label for="UserUsername">Username</label>
				<?php echo $this->Form->input("username",array("type"=>"text","maxlength"=>"100","div"=>false,"label"=>false,"class"=>"username_input")); ?>
			</div>
			<div class="signup_form_indiv right">
				<label for="UserdetailFirstName">Name</label>
				<?php echo $this->Form->input("Userdetail.first_name",array("type"=>"text","maxlength"=>"100","div"=>false,"label"=>false,"class"=>"name_input")); ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="signup_form_row">
			<div class="signup_form_indiv left">
				<label for="UserPassword">Password</label>
				<?php echo $this->Form->input("password",array("type"=>"password","maxlength"=>"15","div"=>false,"label"=>false,"class"=>"password_input")); ?>
			</div>
			<div class="signup_form_indiv right">
				<label>Confirm Password</label>
				<?php echo $this->Form->input("confirmpassword",array("type"=>"password","maxlength"=>"15","div"=>false,"label"=>false,"class"=>"confirmpassword_input")); ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="signup_form_row">
			<div class="signup_form_indiv right">
				<?php echo $this->Form->submit("Signup",array("div"=>false,"label"=>false,"class"=>"login_submit")); ?>
			</div>
			<div class="clear"></div>
		</div>
		<p>Already have an account? <a href="<?php echo $this->Html->url("/login"); ?>">Login</a></p>
	<?php echo $this->Form->end(); ?>
</div>