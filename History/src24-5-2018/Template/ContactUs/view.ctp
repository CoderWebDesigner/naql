
<div class="contactUs view">
	<h2><?php echo ___('contact u'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $contactU->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('name'); ?></dt>
				<dd>
					<?php 
					echo h($contactU->name);
					?>
				</dd>
				
				<dt><?= ___('email'); ?></dt>
				<dd>
					<?php 
					echo h($contactU->email);
					?>
				</dd>
				
				<dt><?= ___('phone'); ?></dt>
				<dd>
					<?php 
					echo h($contactU->phone);
					?>
				</dd>
				
				<dt><?= ___('message'); ?></dt>
				<dd>
					<?php 
					echo h($contactU->message);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $contactU], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
