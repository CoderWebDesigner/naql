
<div class="machines view">
	<h2><?php echo ___('machine'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $machine->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('إسم المعدة بالعربى'); ?></dt>
				<dd>
					<?php 
					echo h($machine->name);
					?>
				</dd>
				
				<dt><?= ___('إسم بالانجليزى'); ?></dt>
				<dd>
					<?php 
					echo h($machine->name_en);
					?>
				</dd>
				<dt><?= ___('اللوكشن'); ?></dt>
				<dd>
                                  <?= $machine->location; ?>
				</dd>
				
                                
				<dt><?= ___('الصورة'); ?></dt>
				<dd>
                                  
                                    <img src="<?php  echo URL. "library".'/'.'machine'.'/'. $machine->photo; ?>" style="width: 200px;height: 200px;">
				</dd>
				
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $machine], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
