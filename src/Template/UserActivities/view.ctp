
<div class="userActivities view">
	<h2><?php echo ___('user activity'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $userActivity->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('useragent'); ?></dt>
				<dd>
					<?php 
					echo h($userActivity->useragent);
					?>
				</dd>
				
				<dt><?php echo __('User'); ?></dt>
				<dd>
					<?php echo $userActivity->has('user') ? $this->Html->link($userActivity->user->id, ['controller' => 'Users', 'action' => 'view', $userActivity->user->id]) : '' ?>
				</dd>
					
				<dt><?= ___('last_action'); ?></dt>
				<dd>
					<?php 
					echo h($userActivity->last_action);
					?>
				</dd>
				
				<dt><?= ___('last_url'); ?></dt>
				<dd>
					<?php 
					echo h($userActivity->last_url);
					?>
				</dd>
				
				<dt><?= ___('user_browser'); ?></dt>
				<dd>
					<?php 
					echo h($userActivity->user_browser);
					?>
				</dd>
				
				<dt><?= ___('ip_address'); ?></dt>
				<dd>
					<?php 
					echo h($userActivity->ip_address);
					?>
				</dd>
				
				<dt><?= ___('logout'); ?></dt>
				<dd>
					<?php 
					echo h($userActivity->logout);
					?>
				</dd>
				
				<dt><?= ___('deleted'); ?></dt>
				<dd>
					<?php 
					echo h($userActivity->deleted);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $userActivity], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
