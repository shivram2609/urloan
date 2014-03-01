<?php

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('cake.generic',"style_custom"));
		echo $this->Html->script(array('jquery.min','jquery.validate',"functionality"));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<?php if($this->Session->read("Auth.User.id")) { ?>
				<a href="<?php echo $this->Html->url("/logout"); ?>">Logout</a>&nbsp;|&nbsp;
				<a href="<?php echo $this->Html->url("/apply-loan"); ?>">Loan Application</a>
				&nbsp;|&nbsp;<a href="<?php echo $this->Html->url("/change-password"); ?>">Change Password</a>
				&nbsp;|&nbsp;<a href="<?php echo $this->Html->url("/profile"); ?>">My Profile</a>
			<?php } ?>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
