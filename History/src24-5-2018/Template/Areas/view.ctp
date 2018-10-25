
<div class="areas view">
	<h2><?php echo ___('area'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $area->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('إسم بالعربى'); ?></dt>
				<dd>
					<?php 
					echo h($area->name);
					?>
				</dd>
				
				<dt><?= ___('إسم بالانجليزى'); ?></dt>
				<dd>
					<?php 
					echo h($area->name_en);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $area], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
