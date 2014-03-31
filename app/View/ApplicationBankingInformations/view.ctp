<div class="applicationBankingInformations view">
<h2><?php echo __('Application Banking Information'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($applicationBankingInformation['ApplicationBankingInformation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Application'); ?></dt>
		<dd>
			<?php echo $this->Html->link($applicationBankingInformation['Application']['id'], array('controller' => 'applications', 'action' => 'view', $applicationBankingInformation['Application']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institute Number'); ?></dt>
		<dd>
			<?php echo h($applicationBankingInformation['ApplicationBankingInformation']['institute_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transit Number'); ?></dt>
		<dd>
			<?php echo h($applicationBankingInformation['ApplicationBankingInformation']['transit_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account Number'); ?></dt>
		<dd>
			<?php echo h($applicationBankingInformation['ApplicationBankingInformation']['account_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name Of Account'); ?></dt>
		<dd>
			<?php echo h($applicationBankingInformation['ApplicationBankingInformation']['name_of_account']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Second Name Of Account'); ?></dt>
		<dd>
			<?php echo h($applicationBankingInformation['ApplicationBankingInformation']['second_name_of_account']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($applicationBankingInformation['ApplicationBankingInformation']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($applicationBankingInformation['ApplicationBankingInformation']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($applicationBankingInformation['ApplicationBankingInformation']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Application Banking Information'), array('action' => 'edit', $applicationBankingInformation['ApplicationBankingInformation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Application Banking Information'), array('action' => 'delete', $applicationBankingInformation['ApplicationBankingInformation']['id']), null, __('Are you sure you want to delete # %s?', $applicationBankingInformation['ApplicationBankingInformation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Application Banking Informations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Application Banking Information'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Applications'), array('controller' => 'applications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Application'), array('controller' => 'applications', 'action' => 'add')); ?> </li>
	</ul>
</div>
