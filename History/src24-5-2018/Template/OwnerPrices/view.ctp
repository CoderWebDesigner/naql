
<div class="ownerPrices view">
	<h2><?php echo ___('owner price'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $ownerPrice->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('Owner'); ?></dt>
				<dd>
					<?php echo $ownerPrice->has('owner') ? $this->Html->link($ownerPrice->owner->id, ['controller' => 'Owners', 'action' => 'view', $ownerPrice->owner->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Reservation'); ?></dt>
				<dd>
					<?php echo $ownerPrice->has('reservation') ? $this->Html->link($ownerPrice->reservation->id, ['controller' => 'Reservations', 'action' => 'view', $ownerPrice->reservation->id]) : '' ?>
				</dd>
					
				<dt><?= ___('price'); ?></dt>
				<dd>
					<?php 
					echo h($ownerPrice->price);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $ownerPrice], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
