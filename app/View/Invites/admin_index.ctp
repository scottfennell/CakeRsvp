<div class="invites index">
	<h2><?php echo __('Attendies');?></h2>
    <div class="invites_count">
        Currently, there are a total of <?php echo $snp ?> people confirmed to attend.
    </div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('address');?></th>
			<th><?php echo $this->Paginator->sort('num_people');?></th>
			<th><?php echo $this->Paginator->sort('confirmed');?></th>
			<th><?php echo $this->Paginator->sort('user_comments');?></th>
                        <th><?php echo $this->Paginator->sort('code');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($invites as $invite): ?>
    <?php
        if(!empty($invite['Invite']['comments']) && strlen($invite['Invite']['comments'])>15){
           $invite['Invite']['comments'] = $invite['Invite']['comments'];
           $invite['Invite']['subcomments'] = substr($invite['Invite']['comments'], 0, 15);
        } else {
           $invite['Invite']['subcomments'] = $invite['Invite']['comments']; 
        }
    ?>
	<tr>
		<td><?php echo h($invite['Invite']['id']); ?>&nbsp;</td>
		<td>
            <a href="/admin/invites/view/<?php echo h($invite['Invite']['id']); ?>">
                <?php echo h($invite['Invite']['name']); ?>
            </a>    
            &nbsp;<br/>
            <?php if(!empty($invite['Invite']['subcomments'])){ ?>
            <div class="comment_block">Comment:"<?php echo h($invite['Invite']['subcomments']) ?>"</div> 
            <?php } ?>
        </td>
		<td><?php echo h($invite['Invite']['email']); ?>&nbsp;</td>
		<td><?php echo h($invite['Invite']['address']); ?>&nbsp;</td>
		<td><?php echo h($invite['Invite']['num_people']); ?>&nbsp;</td>
		<td><?php echo h($invite['Invite']['confirmed']); ?>&nbsp;</td>
		<td><?php echo h((strlen($invite['Invite']['user_comments'])>0)?'[Has Comment]':''); ?>&nbsp;</td>
                <td><?php echo h($invite['Invite']['code']); ?>&nbsp;</td>
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
        <li><?php echo $this->Html->link(__('Rsvp Cards'), array('action' => 'cards')); ?></li>
        <li>
            <div class="invite_search">
                <?php 
                    echo $this->Form->create();
                    echo $this->Form->input("name");
                    echo $this->Form->input("confirmed");
                    echo $this->Form->submit("Search");
                    echo $this->Form->end();
                ?>
            </div>
         
        </li>
	</ul>
</div>
