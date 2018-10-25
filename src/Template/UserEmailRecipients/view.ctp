
<div class="userEmailRecipients view">
	<h2><?php echo ___('user email recipient'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $userEmailRecipient->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('User Email'); ?></dt>
				<dd>
					<?php echo $userEmailRecipient->has('user_email') ? $this->Html->link($userEmailRecipient->user_email->id, ['controller' => 'UserEmails', 'action' => 'view', $userEmailRecipient->user_email->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('User'); ?></dt>
				<dd>
					<?php echo $userEmailRecipient->has('user') ? $this->Html->link($userEmailRecipient->user->id, ['controller' => 'Users', 'action' => 'view', $userEmailRecipient->user->id]) : '' ?>
				</dd>
					
				<dt><?= ___('email_address'); ?></dt>
				<dd>
					<?php 
					echo h($userEmailRecipient->email_address);
					?>
				</dd>
				
				<dt><?= ___('is_email_sent'); ?></dt>
				<dd>
					<?php 
					echo h($userEmailRecipient->is_email_sent);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $userEmailRecipient], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
