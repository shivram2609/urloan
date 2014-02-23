<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js ie6 oldie"><![endif]-->
<!--[if IE 7]><html class="no-js ie7 oldie"><![endif]-->
<!--[if IE 8]><html class="no-js ie8 oldie"><![endif]-->
<!--[if IE 9]><html class="no-js ie9 oldie"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js"><!--<![endif]-->
	<head>
		<title>
		<?php echo $title_for_layout; ?>
	</title>
		<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array("style","style_custom"));
		echo $this->Html->script(array('jquery.min',"functionality"));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		?>
	</head>	
	<body>
		<!-- HEADER PART STARTS HERE -->
			<?php echo $this->element("header"); ?>
			<section class="content">
				<div class="wrapper">
					<?php echo $this->element("navigation"); ?>
					<?php echo $content_for_layout; ?>
					<div class="clear"></div>
				</div>
			</section>
			<?php echo $this->element("footer"); ?>
	</body>
</html>