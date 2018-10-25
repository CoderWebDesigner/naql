
<div class="userEmails view">
	<h2><?php echo ___('user email'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $userEmail->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('type'); ?></dt>
				<dd>
					<?php 
					echo h($userEmail->type);
					?>
				</dd>
				
				<dt><?php echo __('User Group'); ?></dt>
				<dd>
					<?php echo $userEmail->has('user_group') ? $this->Html->link($userEmail->user_group->name, ['controller' => 'UserGroups', 'action' => 'view', $userEmail->user_group->id]) : '' ?>
				</dd>
					
				<dt><?= ___('cc_to'); ?></dt>
				<dd>
					<?php 
					echo h($userEmail->cc_to);
					?>
				</dd>
				
				<dt><?= ___('from_name'); ?></dt>
				<dd>
					<?php 
					echo h($userEmail->from_name);
					?>
				</dd>
				
				<dt><?= ___('from_email'); ?></dt>
				<dd>
					<?php 
					echo h($userEmail->from_email);
					?>
				</dd>
				
				<dt><?= ___('subject'); ?></dt>
				<dd>
					<?php 
					echo h($userEmail->subject);
					?>
				</dd>
				
				<dt><?= ___('message'); ?></dt>
				<dd>
					<?php 
					echo h($userEmail->message);
					?>
				</dd>
				
				<dt><?= ___('sent_by'); ?></dt>
				<dd>
					<?php 
					echo h($userEmail->sent_by);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $userEmail], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
