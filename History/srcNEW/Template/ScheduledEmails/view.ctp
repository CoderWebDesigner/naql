
<div class="scheduledEmails view">
	<h2><?php echo ___('scheduled email'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $scheduledEmail->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('User Email'); ?></dt>
				<dd>
					<?php echo $scheduledEmail->has('user_email') ? $this->Html->link($scheduledEmail->user_email->id, ['controller' => 'UserEmails', 'action' => 'view', $scheduledEmail->user_email->id]) : '' ?>
				</dd>
					
				<dt><?= ___('type'); ?></dt>
				<dd>
					<?php 
					echo h($scheduledEmail->type);
					?>
				</dd>
				
				<dt><?php echo __('User Group'); ?></dt>
				<dd>
					<?php echo $scheduledEmail->has('user_group') ? $this->Html->link($scheduledEmail->user_group->name, ['controller' => 'UserGroups', 'action' => 'view', $scheduledEmail->user_group->id]) : '' ?>
				</dd>
					
				<dt><?= ___('cc_to'); ?></dt>
				<dd>
					<?php 
					echo h($scheduledEmail->cc_to);
					?>
				</dd>
				
				<dt><?= ___('from_name'); ?></dt>
				<dd>
					<?php 
					echo h($scheduledEmail->from_name);
					?>
				</dd>
				
				<dt><?= ___('from_email'); ?></dt>
				<dd>
					<?php 
					echo h($scheduledEmail->from_email);
					?>
				</dd>
				
				<dt><?= ___('subject'); ?></dt>
				<dd>
					<?php 
					echo h($scheduledEmail->subject);
					?>
				</dd>
				
				<dt><?= ___('message'); ?></dt>
				<dd>
					<?php 
					echo h($scheduledEmail->message);
					?>
				</dd>
				
				<dt><?= ___('schedule_date'); ?></dt>
				<dd>
					<?php 
					echo h($scheduledEmail->to_display_timezone('schedule_date'));
					?>
				</dd>
				
				<dt><?= ___('is_sent'); ?></dt>
				<dd>
					<?php 
					echo h($scheduledEmail->is_sent);
					?>
				</dd>
				
				<dt><?= ___('scheduled_by'); ?></dt>
				<dd>
					<?php 
					echo h($scheduledEmail->scheduled_by);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $scheduledEmail], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
