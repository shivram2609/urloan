<?php echo $this->element("left_navigation"); ?>
<section class="right-panel">
<h1>My Applications</h1>
<?php echo $this->Session->flash(); ?>
	<div class="applications index" style="width:99%;">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th><?php echo $this->Paginator->sort('purpose'); ?></th>
			<th><?php echo $this->Paginator->sort('appstatus',"Status"); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($applications as $application): ?>
	<tr>
		<td><?php echo h($application['Application']['amount']); ?>&nbsp;</td>
		<td><?php echo h($application['Application']['purpose']); ?>&nbsp;</td>
		<td><?php echo h($application['Application']['appstatus']); ?>&nbsp;</td>
		<td><?php echo h($application['Application']['created']); ?>&nbsp;</td>
		<td><?php echo h($application['Application']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php if($application['Application']['appstatus'] == 'Incomplete') {
				if($application['Application']['app_step'] == 1){
					$controller = "add-details";
				} elseif($application['Application']['app_step'] == 2){
					$controller = "banking-details";
				} elseif($application['Application']['app_step'] == 3){
					$controller = "addfiles";
				} else {
					$controller = "add-details";
				}
			?>
				<?php echo $this->Html->link(__('Complete It'), array('controller' => $controller,"action"=>$application['Application']['id'])); ?>
			<?php } else { ?>
				<?php echo $this->Html->link(__('View Uploaded Documents'), array('controller' => "addfiles","action"=>$application['Application']['id'])); ?>
			<?php } ?>
			
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
</section>
