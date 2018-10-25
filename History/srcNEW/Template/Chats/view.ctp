
<div class="chats view">
	<h2><?php echo ___('chat'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $chat->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('post'); ?></dt>
				<dd>
					<?php 
					echo h($chat->post);
					?>
				</dd>
				
				<dt><?= ___('too'); ?></dt>
				<dd>
					<?php 
					echo h($chat->too);
					?>
				</dd>
				
				<dt><?= ___('fromm'); ?></dt>
				<dd>
					<?php 
					echo h($chat->fromm);
					?>
				</dd>
				
				<dt><?php echo __('Message'); ?></dt>
				<dd>
					<?php echo $chat->has('message') ? $this->Html->link($chat->message->id, ['controller' => 'Messages', 'action' => 'view', $chat->message->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $chat], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
