
<div class="staticPages view">
	<h2><?php echo ___('static page'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $staticPage->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('page_name'); ?></dt>
				<dd>
					<?php 
					echo h($staticPage->page_name);
					?>
				</dd>
				
				<dt><?= ___('url_name'); ?></dt>
				<dd>
					<?php 
					echo h($staticPage->url_name);
					?>
				</dd>
				
				<dt><?= ___('page_content'); ?></dt>
				<dd>
					<?php 
					echo h($staticPage->page_content);
					?>
				</dd>
				
				<dt><?= ___('page_title'); ?></dt>
				<dd>
					<?php 
					echo h($staticPage->page_title);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $staticPage], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
