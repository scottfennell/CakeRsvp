<div class="invites form">
<?php echo $this->Form->create('Invite');?>
	<fieldset>
		<legend><?php echo __('Admin Add Invite'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('address');
		echo $this->Form->input('num_people');
		echo $this->Form->input('confirmed');
		echo $this->Form->input('comments');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Invites'), array('action' => 'index'));?></li>
	</ul>
</div>
