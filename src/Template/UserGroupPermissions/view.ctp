
<div class="userGroupPermissions view">
	<h2><?php echo ___('user group permission'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $userGroupPermission->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('User Group'); ?></dt>
				<dd>
					<?php echo $userGroupPermission->has('user_group') ? $this->Html->link($userGroupPermission->user_group->name, ['controller' => 'UserGroups', 'action' => 'view', $userGroupPermission->user_group->id]) : '' ?>
				</dd>
					
				<dt><?= ___('prefix'); ?></dt>
				<dd>
					<?php 
					echo h($userGroupPermission->prefix);
					?>
				</dd>
				
				<dt><?= ___('plugin'); ?></dt>
				<dd>
					<?php 
					echo h($userGroupPermission->plugin);
					?>
				</dd>
				
				<dt><?= ___('controller'); ?></dt>
				<dd>
					<?php 
					echo h($userGroupPermission->controller);
					?>
				</dd>
				
				<dt><?= ___('action'); ?></dt>
				<dd>
					<?php 
					echo h($userGroupPermission->action);
					?>
				</dd>
				
				<dt><?= ___('allowed'); ?></dt>
				<dd>
					<?php 
					echo h($userGroupPermission->allowed);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $userGroupPermission], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
