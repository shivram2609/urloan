<div class="applicationBankingInformations index">
	<h2><?php echo __('Application Banking Informations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('application_id'); ?></th>
			<th><?php echo $this->Paginator->sort('institute_number'); ?></th>
			<th><?php echo $this->Paginator->sort('transit_number'); ?></th>
			<th><?php echo $this->Paginator->sort('account_number'); ?></th>
			<th><?php echo $this->Paginator->sort('name_of_account'); ?></th>
			<th><?php echo $this->Paginator->sort('second_name_of_account'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($applicationBankingInformations as $applicationBankingInformation): ?>
	<tr>
		<td><?php echo h($applicationBankingInformation['ApplicationBankingInformation']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($applicationBankingInformation['Application']['id'], array('controller' => 'applications', 'action' => 'view', $applicationBankingInformation['Application']['id'])); ?>
		</td>
		<td><?php echo h($applicationBankingInformation['ApplicationBankingInformation']['institute_number']); ?>&nbsp;</td>
		<td><?php echo h($applicationBankingInformation['ApplicationBankingInformation']['transit_number']); ?>&nbsp;</td>
		<td><?php echo h($applicationBankingInformation['ApplicationBankingInformation']['account_number']); ?>&nbsp;</td>
		<td><?php echo h($applicationBankingInformation['ApplicationBankingInformation']['name_of_account']); ?>&nbsp;</td>
		<td><?php echo h($applicationBankingInformation['ApplicationBankingInformation']['second_name_of_account']); ?>&nbsp;</td>
		<td><?php echo h($applicationBankingInformation['ApplicationBankingInformation']['type']); ?>&nbsp;</td>
		<td><?php echo h($applicationBankingInformation['ApplicationBankingInformation']['created']); ?>&nbsp;</td>
		<td><?php echo h($applicationBankingInformation['ApplicationBankingInformation']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $applicationBankingInformation['ApplicationBankingInformation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $applicationBankingInformation['ApplicationBankingInformation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $applicationBankingInformation['ApplicationBankingInformation']['id']), null, __('Are you sure you want to delete # %s?', $applicationBankingInformation['ApplicationBankingInformation']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Application Banking Information'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Applications'), array('controller' => 'applications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Application'), array('controller' => 'applications', 'action' => 'add')); ?> </li>
	</ul>
</div>
