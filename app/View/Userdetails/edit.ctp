<?php echo $this->Html->css("jquery.ui"); ?>
<?php echo $this->Html->script("jquery.ui"); ?>
 <script>
$(function() {
$( "#UserdetailBirthDate" ).datepicker({dateFormat: 'yy-mm-dd',maxDate: new Date(1995, 1 - 1, 1)});
});
</script>
<div class="userdetails form">
<?php echo $this->Form->create('Userdetail'); ?>
	<fieldset>
		<legend><?php echo __('Edit Profile'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('salutation',array("options"=>array("Mr"=>"Mr","Ms"=>"Ms")));
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('gender',array("options"=>array("Male"=>"Male","Female"=>"Female")));
		echo $this->Form->input('birth_date',array("type"=>"text"));
		echo $this->Form->input('work_phone');
		echo $this->Form->input('work_phone_extension');
		echo $this->Form->input('home_phone');
		echo $this->Form->input('mobile_phone');
		echo $this->Form->input('street_address');
		echo $this->Form->input('address1');
		echo $this->Form->input('city');
		echo $this->Form->input('province');
		echo $this->Form->input('postal_code');
		echo $this->Form->input('communication_preferences');
		echo $this->Form->input('email_notifications');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
