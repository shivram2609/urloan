<div class="login_form_main">
	<h1>Login</h1>
	<?php
	echo $this->Session->flash();
	echo $this->Form->create("User",array("validate"=>false));
	?>
		<div class="login_form_row">
			<label for="UserUsername">Username</label>
			<?php echo $this->Form->input("username",array("type"=>"text","maxlength"=>"100","div"=>false,"label"=>false,"class"=>"username_input")); ?>
		</div>
		<div class="login_form_row">
			<label for="UserPassword">Password</label>
			<?php echo $this->Form->input("password",array("type"=>"password","maxlength"=>"15","div"=>false,"label"=>false,"class"=>"password_input")); ?>
		</div>
		<div class="login_form_row">
			<?php echo $this->Form->submit("Login",array("div"=>false,"label"=>false,"class"=>"login_submit")); ?>
		</div>
		<br/>
	<p>Don't have an account yet? <a href="<?php echo $this->Html->url("/signup"); ?>">Sign Up</a></p>
	<?php echo $this->Form->end(); ?>
</div>