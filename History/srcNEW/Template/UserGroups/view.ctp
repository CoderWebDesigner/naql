
<div class="userGroups view">
	<h2><?php echo ___('user group'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $userGroup->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('Parent User Group'); ?></dt>
				<dd>
					<?php echo $userGroup->has('parent_user_group') ? $this->Html->link($userGroup->parent_user_group->name, ['controller' => 'UserGroups', 'action' => 'view', $userGroup->parent_user_group->id]) : '' ?>
				</dd>
					
				<dt><?= ___('name'); ?></dt>
				<dd>
					<?php 
					echo h($userGroup->name);
					?>
				</dd>
				
				<dt><?= ___('description'); ?></dt>
				<dd>
					<?php 
					echo h($userGroup->description);
					?>
				</dd>
				
				<dt><?= ___('registration_allowed'); ?></dt>
				<dd>
					<?php 
					echo h($userGroup->registration_allowed);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $userGroup], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
