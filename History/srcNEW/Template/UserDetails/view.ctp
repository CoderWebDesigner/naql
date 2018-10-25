
<div class="userDetails view">
	<h2><?php echo ___('user detail'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $userDetail->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('User'); ?></dt>
				<dd>
					<?php echo $userDetail->has('user') ? $this->Html->link($userDetail->user->id, ['controller' => 'Users', 'action' => 'view', $userDetail->user->id]) : '' ?>
				</dd>
					
				<dt><?= ___('location'); ?></dt>
				<dd>
					<?php 
					echo h($userDetail->location);
					?>
				</dd>
				
				<dt><?= ___('cellphone'); ?></dt>
				<dd>
					<?php 
					echo h($userDetail->cellphone);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $userDetail], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
