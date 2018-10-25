<?php 
use Alaxos\Lib\StringTool;
?>

<div class="userContacts index">
	
	<h2><?= ___('user contacts'); ?></h2>
	
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
				<th><?php echo $this->Paginator->sort('name', ___('name')); ?></th>
				<th><?php echo $this->Paginator->sort('email', ___('email')); ?></th>
				<th><?php echo $this->Paginator->sort('phone', ___('phone')); ?></th>
				<th><?php echo $this->Paginator->sort('requirement', ___('requirement')); ?></th>
				<th><?php echo $this->Paginator->sort('reply_message', ___('reply_message')); ?></th>
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
					echo $this->AlaxosForm->filterField('user_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('name');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('email');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('phone');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('requirement');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('reply_message');
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
			<?php foreach ($userContacts as $i => $userContact): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('User Contact.' . $i . '.id', array('value' => $userContact->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo $userContact->has('user') ? $this->Html->link($userContact->user->id, ['controller' => 'Users', 'action' => 'view', $userContact->user->id]) : ''; ?>
					</td>
					<td>
						<?php echo h($userContact->name) ?>
					</td>
					<td>
						<?php echo h($userContact->email) ?>
					</td>
					<td>
						<?php echo h($userContact->phone) ?>
					</td>
					<td>
						<?php echo h(StringTool::shorten($userContact->requirement)); ?>
					</td>
					<td>
						<?php echo h(StringTool::shorten($userContact->reply_message)); ?>
					</td>
					<td>
						<?php echo h($userContact->to_display_timezone('created')); ?>
					</td>
					<td>
						<?php echo h($userContact->to_display_timezone('modified')); ?>
					</td>
					<td class="actions">
						<?php 
// 						echo $this->Navbars->actionButtons(['buttons_group' => 'list_item', 'buttons_list_item' => [['view', 'edit', 'delete']], 'model_id' => $userContact->id]);
						?>
						
						<?php 
// 						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span> ' . __d('alaxos', 'view'), ['action' => 'view', $userContact->id], ['class' => 'to_view', 'escape' => false]);
// 						echo ' ';
// 						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ' . __d('alaxos', 'edit'), ['action' => 'edit', $userContact->id], ['escape' => false]);
// 						echo ' ';
// 						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span> ' . __d('alaxos', 'delete'), ['action' => 'delete', $userContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userContact->id), 'escape' => false]);
						?>
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $userContact->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $userContact->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $userContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userContact->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($userContacts) && $userContacts->count() > 0)
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