<div class="loginTokens index">
	
	<h2><?= ___('login tokens'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['paginate_infos' => true, 'select_pagination_limit' => true]);
		?>
		</div>
		<div class="panel-body">
			
			<div class="table-responsive">
			
			<table cellpadding="0" cellspacing="0" class="table table-striped table-hover table-condensed">
			<thead>
			<tr class="sortHeader">
				<th></th>
				<th><?php echo $this->Paginator->sort('user_id', ___('user_id')); ?></th>
				<th><?php echo $this->Paginator->sort('token', ___('token')); ?></th>
				<th><?php echo $this->Paginator->sort('duration', ___('duration')); ?></th>
				<th><?php echo $this->Paginator->sort('used', ___('used')); ?></th>
				<th style="width:160px;"><?php echo $this->Paginator->sort('expires', ___('expires')); ?></th>
				<th style="width:160px;"><?php echo $this->Paginator->sort('created', ___('created')); ?></th>
				<th class="actions"></th>
			</tr>
			<tr class="filterHeader">
				<td>
				<?php
				echo $this->AlaxosForm->checkbox('_Tech.selectAll', ['id' => 'TechSelectAll']);
				
				echo $this->AlaxosForm->create($search_entity, array('url' => [], 'class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate'));
				?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('user_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('token');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('duration');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('used');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterDate('expires');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterDate('created');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->button(___('filter'), ['class' => 'btn btn-default']);
					echo $this->AlaxosForm->end();
					?>
				</td>
			</tr>
			</thead>
			
			<tbody>
			<?php foreach ($loginTokens as $i => $loginToken): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('Login Token.' . $i . '.id', array('value' => $loginToken->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo $loginToken->has('user') ? $this->Html->link($loginToken->user->id, ['controller' => 'Users', 'action' => 'view', $loginToken->user->id]) : ''; ?>
					</td>
					<td>
						<?php echo h($loginToken->token) ?>
					</td>
					<td>
						<?php echo h($loginToken->duration) ?>
					</td>
					<td>
						<?php echo $this->AlaxosHtml->yesNo($loginToken->used); ?>
					</td>
					<td>
						<?php echo h($loginToken->to_display_timezone('expires')); ?>
					</td>
					<td>
						<?php echo h($loginToken->to_display_timezone('created')); ?>
					</td>
					<td class="actions">
						<?php 
// 						echo $this->Navbars->actionButtons(['buttons_group' => 'list_item', 'buttons_list_item' => [['view', 'edit', 'delete']], 'model_id' => $loginToken->id]);
						?>
						
						<?php 
// 						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span> ' . __d('alaxos', 'view'), ['action' => 'view', $loginToken->id], ['class' => 'to_view', 'escape' => false]);
// 						echo ' ';
// 						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ' . __d('alaxos', 'edit'), ['action' => 'edit', $loginToken->id], ['escape' => false]);
// 						echo ' ';
// 						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span> ' . __d('alaxos', 'delete'), ['action' => 'delete', $loginToken->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loginToken->id), 'escape' => false]);
						?>
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $loginToken->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $loginToken->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $loginToken->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loginToken->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($loginTokens) && $loginTokens->count() > 0)
			{
				echo '<div class="row">';
				echo '<div class="col-md-1">';
				echo $this->AlaxosForm->postActionAllButton(__d('alaxos', 'delete all'), ['action' => 'delete_all'], ['confirm' => __d('alaxos', 'do you really want to delete the selected items ?')]);
				echo '</div>';
				echo '</div>';
			}
			?>
			
			<div class="paging text-center">
				<ul class="pagination pagination-sm">
				<?php
				$this->Paginator->templates(['ellipsis' => '<li class="ellipsis"><span>...</span></li>']);
				echo $this->Paginator->prev('< ' . __('previous'));
				echo $this->Paginator->numbers(['first' => 2, 'last' => 2]);
				echo $this->Paginator->next(__('next') . ' >');
				?>
				</ul>
			</div>
			
		</div>
	</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function(){
	Alaxos.start();
});
</script>