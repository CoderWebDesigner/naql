
<div class="scheduledEmailRecipients view">
	<h2><?php echo ___('scheduled email recipient'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $scheduledEmailRecipient->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('Scheduled Email'); ?></dt>
				<dd>
					<?php echo $scheduledEmailRecipient->has('scheduled_email') ? $this->Html->link($scheduledEmailRecipient->scheduled_email->id, ['controller' => 'ScheduledEmails', 'action' => 'view', $scheduledEmailRecipient->scheduled_email->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('User'); ?></dt>
				<dd>
					<?php echo $scheduledEmailRecipient->has('user') ? $this->Html->link($scheduledEmailRecipient->user->id, ['controller' => 'Users', 'action' => 'view', $scheduledEmailRecipient->user->id]) : '' ?>
				</dd>
					
				<dt><?= ___('email_address'); ?></dt>
				<dd>
					<?php 
					echo h($scheduledEmailRecipient->email_address);
					?>
				</dd>
				
				<dt><?= ___('is_email_sent'); ?></dt>
				<dd>
					<?php 
					echo h($scheduledEmailRecipient->is_email_sent);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $scheduledEmailRecipient], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
