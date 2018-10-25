
<div class="userEmailSignatures view">
	<h2><?php echo ___('user email signature'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $userEmailSignature->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('User'); ?></dt>
				<dd>
					<?php echo $userEmailSignature->has('user') ? $this->Html->link($userEmailSignature->user->id, ['controller' => 'Users', 'action' => 'view', $userEmailSignature->user->id]) : '' ?>
				</dd>
					
				<dt><?= ___('signature_name'); ?></dt>
				<dd>
					<?php 
					echo h($userEmailSignature->signature_name);
					?>
				</dd>
				
				<dt><?= ___('signature'); ?></dt>
				<dd>
					<?php 
					echo h($userEmailSignature->signature);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $userEmailSignature], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
