<div class="userdetails form">
<?php echo $this->Form->create('Userdetail'); ?>
	<fieldset>
		<legend><?php echo __('Add Userdetail'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('salutation');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('gender');
		echo $this->Form->input('birth_date');
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Userdetails'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
