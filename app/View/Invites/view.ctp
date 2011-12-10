<div class="invites view">
<h2><?php  echo __('Invite');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($invite['Invite']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($invite['Invite']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($invite['Invite']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($invite['Invite']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num People'); ?></dt>
		<dd>
			<?php echo h($invite['Invite']['num_people']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Confirmed'); ?></dt>
		<dd>
			<?php echo h($invite['Invite']['confirmed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($invite['Invite']['comments']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Invite'), array('action' => 'edit', $invite['Invite']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Invite'), array('action' => 'delete', $invite['Invite']['id']), null, __('Are you sure you want to delete # %s?', $invite['Invite']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Invites'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invite'), array('action' => 'add')); ?> </li>
	</ul>
</div>
