
<div class="userSocials view">
	<h2><?php echo ___('user social'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $userSocial->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('User'); ?></dt>
				<dd>
					<?php echo $userSocial->has('user') ? $this->Html->link($userSocial->user->id, ['controller' => 'Users', 'action' => 'view', $userSocial->user->id]) : '' ?>
				</dd>
					
				<dt><?= ___('type'); ?></dt>
				<dd>
					<?php 
					echo h($userSocial->type);
					?>
				</dd>
				
				<dt><?= ___('socialid'); ?></dt>
				<dd>
					<?php 
					echo h($userSocial->socialid);
					?>
				</dd>
				
				<dt><?= ___('access_token'); ?></dt>
				<dd>
					<?php 
					echo h($userSocial->access_token);
					?>
				</dd>
				
				<dt><?= ___('access_secret'); ?></dt>
				<dd>
					<?php 
					echo h($userSocial->access_secret);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $userSocial], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
