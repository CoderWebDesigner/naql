
<div class="userEmailTemplates view">
	<h2><?php echo ___('user email template'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $userEmailTemplate->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('User'); ?></dt>
				<dd>
					<?php echo $userEmailTemplate->has('user') ? $this->Html->link($userEmailTemplate->user->id, ['controller' => 'Users', 'action' => 'view', $userEmailTemplate->user->id]) : '' ?>
				</dd>
					
				<dt><?= ___('template_name'); ?></dt>
				<dd>
					<?php 
					echo h($userEmailTemplate->template_name);
					?>
				</dd>
				
				<dt><?= ___('header'); ?></dt>
				<dd>
					<?php 
					echo h($userEmailTemplate->header);
					?>
				</dd>
				
				<dt><?= ___('footer'); ?></dt>
				<dd>
					<?php 
					echo h($userEmailTemplate->footer);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $userEmailTemplate], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
