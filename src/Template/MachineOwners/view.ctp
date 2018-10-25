
<div class="machineOwners view">
	<h2><?php echo ___('machine owner'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $machineOwner->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('Machine Detail'); ?></dt>
				<dd>
					<?php echo $machineOwner->has('machine_detail') ? $this->Html->link($machineOwner->machine_detail->name, ['controller' => 'MachineDetails', 'action' => 'view', $machineOwner->machine_detail->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Owner'); ?></dt>
				<dd>
					<?php echo $machineOwner->has('owner') ? $this->Html->link($machineOwner->owner->id, ['controller' => 'Owners', 'action' => 'view', $machineOwner->owner->id]) : '' ?>
				</dd>
					
				<dt><?= ___('photos'); ?></dt>
				<dd>
					<?php 
					echo h($machineOwner->photos);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $machineOwner], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
