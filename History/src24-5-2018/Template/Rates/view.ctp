
<div class="rates view">
	<h2><?php echo ___('rate'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $rate->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('User'); ?></dt>
				<dd>
					<?php echo $rate->has('user') ? $this->Html->link($rate->user->id, ['controller' => 'Users', 'action' => 'view', $rate->user->id]) : '' ?>
				</dd>
					
				<dt><?= ___('star'); ?></dt>
				<dd>
					<?php 
					echo h($rate->star);
					?>
				</dd>
				
				<dt><?= ___('comment'); ?></dt>
				<dd>
					<?php 
					echo h($rate->comment);
					?>
				</dd>
				
				<dt><?php echo __('Owner'); ?></dt>
				<dd>
					<?php echo $rate->has('owner') ? $this->Html->link($rate->owner->id, ['controller' => 'Owners', 'action' => 'view', $rate->owner->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $rate], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
