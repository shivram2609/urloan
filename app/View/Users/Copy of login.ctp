<?php
	echo $this->Session->flash();
	echo $this->Form->create("User",array("validate"=>false));
	echo $this->Form->input("username",array("type"=>"text","maxlength"=>"100"));
	echo $this->Form->input("password",array("type"=>"password","maxlength"=>"15"));
	echo $this->Form->submit("Login");
?>
	<br/>
	<p>Don't have an account yet? <a href="<?php echo $this->Html->url("/signup"); ?>">Sign Up</a></p>
<?php	
	echo $this->Form->end();
?>