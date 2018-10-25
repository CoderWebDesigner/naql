
<div class="loginTokens view">
	<h2><?php echo ___('login token'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $loginToken->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('User'); ?></dt>
				<dd>
					<?php echo $loginToken->has('user') ? $this->Html->link($loginToken->user->id, ['controller' => 'Users', 'action' => 'view', $loginToken->user->id]) : '' ?>
				</dd>
					
				<dt><?= ___('token'); ?></dt>
				<dd>
					<?php 
					echo h($loginToken->token);
					?>
				</dd>
				
				<dt><?= ___('duration'); ?></dt>
				<dd>
					<?php 
					echo h($loginToken->duration);
					?>
				</dd>
				
				<dt><?= ___('used'); ?></dt>
				<dd>
					<?php 
					echo $this->AlaxosHtml->yesNo($loginToken->used);
					?>
				</dd>
				
				<dt><?= ___('expires'); ?></dt>
				<dd>
					<?php 
					echo h($loginToken->to_display_timezone('expires'));
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $loginToken], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
