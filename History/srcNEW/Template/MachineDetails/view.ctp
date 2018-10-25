
<div class="machineDetails view">
	<h2><?php echo ___('machine detail'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $machineDetail->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('القسم'); ?></dt>
				<dd>
					<?php echo $machineDetail->has('machine') ? $this->Html->link($machineDetail->machine->name, ['controller' => 'Machines', 'action' => 'view', $machineDetail->machine->id]) : '' ?>
				</dd>
					
				<dt><?= ___('إسم المعدة (عربى)'); ?></dt>
				<dd>
					<?php 
					echo h($machineDetail->name);
					?>
				</dd>
				
				<dt><?= ___('إسم المعدة (انجليزى)'); ?></dt>
				<dd>
					<?php 
					echo h($machineDetail->name_en);
					?>
				</dd>
				
<!--				<dt><?= ___('الصورة'); ?></dt>
				<dd>
                                 <img src="<?=URL?>library/machine/<?php  echo h($machineDetail->machine_photo); ?>" style="width: 200px;height: 200px;">
					
				</dd>-->
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $machineDetail], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
