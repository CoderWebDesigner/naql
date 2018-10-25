<div class="scheduledEmailRecipients index">
	
	<h2><?= ___('scheduled email recipients'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['paginate_infos' => true, 'select_pagination_limit' => true]);
		?>
		</div>
		<div class="panel-body">
			
			<div class="table-responsive">
			
			<table cellpadding="0" cellspacing="0" class="table table-striped table-hover table-condensed">
			<thead>
			<tr class="sortHeader">
				<th></th>
				<th><?php echo $this->Paginator->sort('scheduled_email_id', ___('scheduled_email_id')); ?></th>
				<th><?php echo $this->Paginator->sort('user_id', ___('user_id')); ?></th>
				<th><?php echo $this->Paginator->sort('email_address', ___('email_address')); ?></th>
				<th><?php echo $this->Paginator->sort('is_email_sent', ___('is_email_sent')); ?></th>
				<th class="actions"></th>
			</tr>
			<tr class="filterHeader">
				<td>
				<?php
				echo $this->AlaxosForm->checkbox('_Tech.selectAll', ['id' => 'TechSelectAll']);
				
				echo $this->AlaxosForm->create($search_entity, array('url' => [], 'class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate'));
				?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('scheduled_email_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('user_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('email_address');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('is_email_sent');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->button(___('filter'), ['class' => 'btn btn-default']);
					echo $this->AlaxosForm->end();
					?>
				</td>
			</tr>
			</thead>
			
			<tbody>
			<?php foreach ($scheduledEmailRecipients as $i => $scheduledEmailRecipient): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('Scheduled Email Recipient.' . $i . '.id', array('value' => $scheduledEmailRecipient->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo $scheduledEmailRecipient->has('scheduled_email') ? $this->Html->link($scheduledEmailRecipient->scheduled_email->id, ['controller' => 'ScheduledEmails', 'action' => 'view', $scheduledEmailRecipient->scheduled_email->id]) : ''; ?>
					</td>
					<td>
						<?php echo $scheduledEmailRecipient->has('user') ? $this->Html->link($scheduledEmailRecipient->user->id, ['controller' => 'Users', 'action' => 'view', $scheduledEmailRecipient->user->id]) : ''; ?>
					</td>
					<td>
						<?php echo h($scheduledEmailRecipient->email_address) ?>
					</td>
					<td>
						<?php echo h($scheduledEmailRecipient->is_email_sent) ?>
					</td>
					<td class="actions">
						<?php 
// 						echo $this->Navbars->actionButtons(['buttons_group' => 'list_item', 'buttons_list_item' => [['view', 'edit', 'delete']], 'model_id' => $scheduledEmailRecipient->id]);
						?>
						
						<?php 
// 						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span> ' . __d('alaxos', 'view'), ['action' => 'view', $scheduledEmailRecipient->id], ['class' => 'to_view', 'escape' => false]);
// 						echo ' ';
// 						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ' . __d('alaxos', 'edit'), ['action' => 'edit', $scheduledEmailRecipient->id], ['escape' => false]);
// 						echo ' ';
// 						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span> ' . __d('alaxos', 'delete'), ['action' => 'delete', $scheduledEmailRecipient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scheduledEmailRecipient->id), 'escape' => false]);
						?>
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $scheduledEmailRecipient->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $scheduledEmailRecipient->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $scheduledEmailRecipient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scheduledEmailRecipient->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($scheduledEmailRecipients) && $scheduledEmailRecipients->count() > 0)
			{
				echo '<div class="row">';
				echo '<div class="col-md-1">';
				echo $this->AlaxosForm->postActionAllButton(__d('alaxos', 'delete all'), ['action' => 'delete_all'], ['confirm' => __d('alaxos', 'do you really want to delete the selected items ?')]);
				echo '</div>';
				echo '</div>';
			}
			?>
			
			<div class="paging text-center">
				<ul class="pagination pagination-sm">
				<?php
				$this->Paginator->templates(['ellipsis' => '<li class="ellipsis"><span>...</span></li>']);
				echo $this->Paginator->prev('< ' . __('previous'));
				echo $this->Paginator->numbers(['first' => 2, 'last' => 2]);
				echo $this->Paginator->next(__('next') . ' >');
				?>
				</ul>
			</div>
			
		</div>
	</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function(){
	Alaxos.start();
});
</script>