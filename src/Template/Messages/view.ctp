
<div class="messages view">
	<h2><?php echo ___('message'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $message->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('User'); ?></dt>
				<dd>
					<?php echo $message->has('user') ? $this->Html->link($message->user->id, ['controller' => 'Users', 'action' => 'view', $message->user->id]) : '' ?>
				</dd>
					
				<dt><?= ___('too'); ?></dt>
				<dd>
					<?php 
					echo h($message->too);
					?>
				</dd>
				
				<dt><?= ___('fromm'); ?></dt>
				<dd>
					<?php 
					echo h($message->fromm);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $message], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
