
<div class="userSettings view">
	<h2><?php echo ___('user setting'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $userSetting->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('name'); ?></dt>
				<dd>
					<?php 
					echo h($userSetting->name);
					?>
				</dd>
				
				<dt><?= ___('display_name'); ?></dt>
				<dd>
					<?php 
					echo h($userSetting->display_name);
					?>
				</dd>
				
				<dt><?= ___('value'); ?></dt>
				<dd>
					<?php 
					echo h($userSetting->value);
					?>
				</dd>
				
				<dt><?= ___('type'); ?></dt>
				<dd>
					<?php 
					echo h($userSetting->type);
					?>
				</dd>
				
				<dt><?= ___('category'); ?></dt>
				<dd>
					<?php 
					echo h($userSetting->category);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $userSetting], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
