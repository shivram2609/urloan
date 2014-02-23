<div class="userdetails index">
	<h2><?php echo __('Userdetails'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('salutation'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('gender'); ?></th>
			<th><?php echo $this->Paginator->sort('birth_date'); ?></th>
			<th><?php echo $this->Paginator->sort('work_phone'); ?></th>
			<th><?php echo $this->Paginator->sort('work_phone_extension'); ?></th>
			<th><?php echo $this->Paginator->sort('home_phone'); ?></th>
			<th><?php echo $this->Paginator->sort('mobile_phone'); ?></th>
			<th><?php echo $this->Paginator->sort('street_address'); ?></th>
			<th><?php echo $this->Paginator->sort('address1'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('province'); ?></th>
			<th><?php echo $this->Paginator->sort('postal_code'); ?></th>
			<th><?php echo $this->Paginator->sort('communication_preferences'); ?></th>
			<th><?php echo $this->Paginator->sort('email_notifications'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userdetails as $userdetail): ?>
	<tr>
		<td><?php echo h($userdetail['Userdetail']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userdetail['User']['id'], array('controller' => 'users', 'action' => 'view', $userdetail['User']['id'])); ?>
		</td>
		<td><?php echo h($userdetail['Userdetail']['salutation']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['gender']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['birth_date']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['work_phone']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['work_phone_extension']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['home_phone']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['mobile_phone']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['street_address']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['address1']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['city']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['province']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['postal_code']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['communication_preferences']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['email_notifications']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['created']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userdetail['Userdetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userdetail['Userdetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userdetail['Userdetail']['id']), null, __('Are you sure you want to delete # %s?', $userdetail['Userdetail']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Userdetail'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
