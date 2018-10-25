
<div class="users view">
	<h2><?php echo ___('user'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $user->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('User Group'); ?></dt>
				<dd>
					<?php echo $user->has('user_group') ? $this->Html->link($user->user_group->name, ['controller' => 'UserGroups', 'action' => 'view', $user->user_group->id]) : '' ?>
				</dd>
					
				<dt><?= ___('username'); ?></dt>
				<dd>
					<?php 
					echo h($user->username);
					?>
				</dd>
				
				<dt><?= ___('email'); ?></dt>
				<dd>
					<?php 
					echo h($user->email);
					?>
				</dd>
				
				<dt><?= ___('first_name'); ?></dt>
				<dd>
					<?php 
					echo h($user->first_name);
					?>
				</dd>
				
				<dt><?= ___('last_name'); ?></dt>
				<dd>
					<?php 
					echo h($user->last_name);
					?>
				</dd>
				
				<dt><?= ___('gender'); ?></dt>
				<dd>
					<?php 
					echo h($user->gender);
					?>
				</dd>
				
				<dt><?= ___('photo'); ?></dt>
				<dd>
					<?php 
					echo h($user->photo);
					?>
				</dd>
				
				<dt><?= ___('bday'); ?></dt>
				<dd>
					<?php 
					echo h($user->to_display_timezone('bday'));
					?>
				</dd>
				
				<dt><?= ___('active'); ?></dt>
				<dd>
					<?php 
					echo h($user->active);
					?>
				</dd>
				
				<dt><?= ___('email_verified'); ?></dt>
				<dd>
					<?php 
					echo h($user->email_verified);
					?>
				</dd>
				
				<dt><?= ___('last_login'); ?></dt>
				<dd>
					<?php 
					echo h($user->to_display_timezone('last_login'));
					?>
				</dd>
				
				<dt><?= ___('ip_address'); ?></dt>
				<dd>
					<?php 
					echo h($user->ip_address);
					?>
				</dd>
				
				<dt><?= ___('black_list'); ?></dt>
				<dd>
					<?php 
					echo h($user->black_list);
					?>
				</dd>
				
				<dt><?php echo __('Area'); ?></dt>
				<dd>
					<?php echo $user->has('area') ? $this->Html->link($user->area->name, ['controller' => 'Areas', 'action' => 'view', $user->area->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $user], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
