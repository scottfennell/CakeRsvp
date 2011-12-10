<div class="invites index">
	<h2><?php echo __('Invites');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('address');?></th>
			<th><?php echo $this->Paginator->sort('num_people');?></th>
			<th><?php echo $this->Paginator->sort('confirmed');?></th>
			<th><?php echo $this->Paginator->sort('comments');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($invites as $invite): ?>
	<tr>
		<td><?php echo h($invite['Invite']['id']); ?>&nbsp;</td>
		<td><?php echo h($invite['Invite']['name']); ?>&nbsp;</td>
		<td><?php echo h($invite['Invite']['email']); ?>&nbsp;</td>
		<td><?php echo h($invite['Invite']['address']); ?>&nbsp;</td>
		<td><?php echo h($invite['Invite']['num_people']); ?>&nbsp;</td>
		<td><?php echo h($invite['Invite']['confirmed']); ?>&nbsp;</td>
		<td><?php echo h($invite['Invite']['comments']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $invite['Invite']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $invite['Invite']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $invite['Invite']['id']), null, __('Are you sure you want to delete # %s?', $invite['Invite']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Invite'), array('action' => 'add')); ?></li>
	</ul>
</div>
