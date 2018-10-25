
<div class="userContacts view">
	<h2><?php echo ___('user contact'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $userContact->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('User'); ?></dt>
				<dd>
					<?php echo $userContact->has('user') ? $this->Html->link($userContact->user->id, ['controller' => 'Users', 'action' => 'view', $userContact->user->id]) : '' ?>
				</dd>
					
				<dt><?= ___('name'); ?></dt>
				<dd>
					<?php 
					echo h($userContact->name);
					?>
				</dd>
				
				<dt><?= ___('email'); ?></dt>
				<dd>
					<?php 
					echo h($userContact->email);
					?>
				</dd>
				
				<dt><?= ___('phone'); ?></dt>
				<dd>
					<?php 
					echo h($userContact->phone);
					?>
				</dd>
				
				<dt><?= ___('requirement'); ?></dt>
				<dd>
					<?php 
					echo h($userContact->requirement);
					?>
				</dd>
				
				<dt><?= ___('reply_message'); ?></dt>
				<dd>
					<?php 
					echo h($userContact->reply_message);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $userContact], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
