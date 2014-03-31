<div class="applicationBankingInformations form">
<?php echo $this->Form->create('ApplicationBankingInformation'); ?>
	<fieldset>
		<legend><?php echo __('Edit Application Banking Information'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('application_id');
		echo $this->Form->input('institute_number');
		echo $this->Form->input('transit_number');
		echo $this->Form->input('account_number');
		echo $this->Form->input('name_of_account');
		echo $this->Form->input('second_name_of_account');
		echo $this->Form->input('type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ApplicationBankingInformation.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ApplicationBankingInformation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Application Banking Informations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Applications'), array('controller' => 'applications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Application'), array('controller' => 'applications', 'action' => 'add')); ?> </li>
	</ul>
</div>
