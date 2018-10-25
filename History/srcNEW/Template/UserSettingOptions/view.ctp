
<div class="userSettingOptions view">
	<h2><?php echo ___('user setting option'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $userSettingOption->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('User Setting'); ?></dt>
				<dd>
					<?php echo $userSettingOption->has('user_setting') ? $this->Html->link($userSettingOption->user_setting->name, ['controller' => 'UserSettings', 'action' => 'view', $userSettingOption->user_setting->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Setting Option'); ?></dt>
				<dd>
					<?php echo $userSettingOption->has('setting_option') ? $this->Html->link($userSettingOption->setting_option->title, ['controller' => 'SettingOptions', 'action' => 'view', $userSettingOption->setting_option->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $userSettingOption], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
