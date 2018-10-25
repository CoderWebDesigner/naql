
<div class="owners view">
	<h2><?php echo ___('owner'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $owner->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('User'); ?></dt>
				<dd>
					<?php echo $owner->has('user') ? $this->Html->link($owner->user->id, ['controller' => 'Users', 'action' => 'view', $owner->user->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $owner], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
