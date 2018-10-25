<?php 
use Alaxos\Lib\StringTool;
?>

<div class="userActivities index">
	
	<h2><?= ___('user activities'); ?></h2>
	
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
				<th><?php echo $this->Paginator->sort('useragent', ___('useragent')); ?></th>
				<th><?php echo $this->Paginator->sort('user_id', ___('user_id')); ?></th>
				<th><?php echo $this->Paginator->sort('last_action', ___('last_action')); ?></th>
				<th><?php echo $this->Paginator->sort('last_url', ___('last_url')); ?></th>
				<th><?php echo $this->Paginator->sort('user_browser', ___('user_browser')); ?></th>
				<th><?php echo $this->Paginator->sort('ip_address', ___('ip_address')); ?></th>
				<th><?php echo $this->Paginator->sort('logout', ___('logout')); ?></th>
				<th><?php echo $this->Paginator->sort('deleted', ___('deleted')); ?></th>
				<th style="width:160px;"><?php echo $this->Paginator->sort('created', ___('created')); ?></th>
				<th style="width:160px;"><?php echo $this->Paginator->sort('modified', ___('modified')); ?></th>
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
					echo $this->AlaxosForm->filterField('useragent');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('user_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('last_action');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('last_url');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('user_browser');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('ip_address');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('logout');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('deleted');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterDate('created');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterDate('modified');
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
			<?php foreach ($userActivities as $i => $userActivity): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('User Activity.' . $i . '.id', array('value' => $userActivity->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo h($userActivity->useragent) ?>
					</td>
					<td>
						<?php echo $userActivity->has('user') ? $this->Html->link($userActivity->user->id, ['controller' => 'Users', 'action' => 'view', $userActivity->user->id]) : ''; ?>
					</td>
					<td>
						<?php echo h($userActivity->last_action) ?>
					</td>
					<td>
						<?php echo h(StringTool::shorten($userActivity->last_url)); ?>
					</td>
					<td>
						<?php echo h(StringTool::shorten($userActivity->user_browser)); ?>
					</td>
					<td>
						<?php echo h($userActivity->ip_address) ?>
					</td>
					<td>
						<?php echo h($userActivity->logout) ?>
					</td>
					<td>
						<?php echo h($userActivity->deleted) ?>
					</td>
					<td>
						<?php echo h($userActivity->to_display_timezone('created')); ?>
					</td>
					<td>
						<?php echo h($userActivity->to_display_timezone('modified')); ?>
					</td>
					<td class="actions">
						<?php 
// 						echo $this->Navbars->actionButtons(['buttons_group' => 'list_item', 'buttons_list_item' => [['view', 'edit', 'delete']], 'model_id' => $userActivity->id]);
						?>
						
						<?php 
// 						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span> ' . __d('alaxos', 'view'), ['action' => 'view', $userActivity->id], ['class' => 'to_view', 'escape' => false]);
// 						echo ' ';
// 						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ' . __d('alaxos', 'edit'), ['action' => 'edit', $userActivity->id], ['escape' => false]);
// 						echo ' ';
// 						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span> ' . __d('alaxos', 'delete'), ['action' => 'delete', $userActivity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userActivity->id), 'escape' => false]);
						?>
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $userActivity->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $userActivity->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $userActivity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userActivity->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($userActivities) && $userActivities->count() > 0)
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