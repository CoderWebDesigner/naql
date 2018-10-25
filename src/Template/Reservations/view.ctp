
<div class="reservations view">
	<h2><?php echo ___('reservation'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $reservation->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('User'); ?></dt>
				<dd>
					<?php echo $reservation->has('user') ? $this->Html->link($reservation->user->id, ['controller' => 'Users', 'action' => 'view', $reservation->user->id]) : '' ?>
				</dd>
					
				<dt><?= ___('start_point'); ?></dt>
				<dd>
					<?php 
					echo h($reservation->start_point);
					?>
				</dd>
				
				<dt><?= ___('end_point'); ?></dt>
				<dd>
					<?php 
					echo h($reservation->end_point);
					?>
				</dd>
				
				<dt><?= ___('date'); ?></dt>
				<dd>
					<?php 
					echo h($reservation->date);
					?>
				</dd>
				
				<dt><?php echo __('Owner'); ?></dt>
				<dd>
					<?php echo $reservation->has('owner') ? $this->Html->link($reservation->owner->id, ['controller' => 'Owners', 'action' => 'view', $reservation->owner->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Reservation Type'); ?></dt>
				<dd>
					<?php echo $reservation->has('reservation_type') ? $this->Html->link($reservation->reservation_type->name, ['controller' => 'ReservationTypes', 'action' => 'view', $reservation->reservation_type->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Machine'); ?></dt>
				<dd>
					<?php echo $reservation->has('machine') ? $this->Html->link($reservation->machine->name, ['controller' => 'Machines', 'action' => 'view', $reservation->machine->id]) : '' ?>
				</dd>
					
				<dt><?= ___('status'); ?></dt>
				<dd>
					<?php 
					echo h($reservation->status);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $reservation], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
