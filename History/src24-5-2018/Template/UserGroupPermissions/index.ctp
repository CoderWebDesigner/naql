<div class="userGroupPermissions index">
	
	<h2><?= ___('user group permissions'); ?></h2>
	
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
				<th><?php echo $this->Paginator->sort('user_group_id', ___('user_group_id')); ?></th>
				<th><?php echo $this->Paginator->sort('prefix', ___('prefix')); ?></th>
				<th><?php echo $this->Paginator->sort('plugin', ___('plugin')); ?></th>
				<th><?php echo $this->Paginator->sort('controller', ___('controller')); ?></th>
				<th><?php echo $this->Paginator->sort('action', ___('action')); ?></th>
				<th><?php echo $this->Paginator->sort('allowed', ___('allowed')); ?></th>
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
					echo $this->AlaxosForm->filterField('user_group_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('prefix');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('plugin');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('controller');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('action');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('allowed');
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
			<?php foreach ($userGroupPermissions as $i => $userGroupPermission): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('User Group Permission.' . $i . '.id', array('value' => $userGroupPermission->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo $userGroupPermission->has('user_group') ? $this->Html->link($userGroupPermission->user_group->name, ['controller' => 'UserGroups', 'action' => 'view', $userGroupPermission->user_group->id]) : ''; ?>
					</td>
					<td>
						<?php echo h($userGroupPermission->prefix) ?>
					</td>
					<td>
						<?php echo h($userGroupPermission->plugin) ?>
					</td>
					<td>
						<?php echo h($userGroupPermission->controller) ?>
					</td>
					<td>
						<?php echo h($userGroupPermission->action) ?>
					</td>
					<td>
						<?php echo h($userGroupPermission->allowed) ?>
					</td>
					<td class="actions">
						<?php 
// 						echo $this->Navbars->actionButtons(['buttons_group' => 'list_item', 'buttons_list_item' => [['view', 'edit', 'delete']], 'model_id' => $userGroupPermission->id]);
						?>
						
						<?php 
// 						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span> ' . __d('alaxos', 'view'), ['action' => 'view', $userGroupPermission->id], ['class' => 'to_view', 'escape' => false]);
// 						echo ' ';
// 						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ' . __d('alaxos', 'edit'), ['action' => 'edit', $userGroupPermission->id], ['escape' => false]);
// 						echo ' ';
// 						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span> ' . __d('alaxos', 'delete'), ['action' => 'delete', $userGroupPermission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userGroupPermission->id), 'escape' => false]);
						?>
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $userGroupPermission->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $userGroupPermission->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $userGroupPermission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userGroupPermission->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($userGroupPermissions) && $userGroupPermissions->count() > 0)
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