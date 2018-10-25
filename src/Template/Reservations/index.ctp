<div class="reservations index">
	
	<h2><?= ___('reservations'); ?></h2>
	
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
				<th><?php echo $this->Paginator->sort('start_point', ___('start_point')); ?></th>
				<th><?php echo $this->Paginator->sort('end_point', ___('end_point')); ?></th>
				<th><?php echo $this->Paginator->sort('date', ___('date')); ?></th>
				<th><?php echo $this->Paginator->sort('owner_id', ___('owner_id')); ?></th>
				<th><?php echo $this->Paginator->sort('reservation_type_id', ___('reservation_type_id')); ?></th>
				<th><?php echo $this->Paginator->sort('machine_id', ___('machine_id')); ?></th>
				<th><?php echo $this->Paginator->sort('status', ___('status')); ?></th>
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
					echo $this->AlaxosForm->filterField('start_point');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('end_point');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('date');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('owner_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('reservation_type_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('machine_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('status');
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
			<?php foreach ($reservations as $i => $reservation): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('Reservation.' . $i . '.id', array('value' => $reservation->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo $reservation->has('user') ? $this->Html->link($reservation->user->id, ['controller' => 'Users', 'action' => 'view', $reservation->user->id]) : ''; ?>
					</td>
					<td>
						<?php echo h($reservation->start_point) ?>
					</td>
					<td>
						<?php echo h($reservation->end_point) ?>
					</td>
					<td>
						<?php echo h($reservation->date) ?>
					</td>
					<td>
						<?php echo $reservation->has('owner') ? $this->Html->link($reservation->owner->id, ['controller' => 'Owners', 'action' => 'view', $reservation->owner->id]) : ''; ?>
					</td>
					<td>
						<?php echo $reservation->has('reservation_type') ? $this->Html->link($reservation->reservation_type->name, ['controller' => 'ReservationTypes', 'action' => 'view', $reservation->reservation_type->id]) : ''; ?>
					</td>
					<td>
						<?php echo $reservation->has('machine') ? $this->Html->link($reservation->machine->name, ['controller' => 'Machines', 'action' => 'view', $reservation->machine->id]) : ''; ?>
					</td>
					<td>
						<?php echo h($reservation->status) ?>
					</td>
					<td>
						<?php echo h($reservation->to_display_timezone('created')); ?>
					</td>
					<td>
						<?php echo h($reservation->to_display_timezone('modified')); ?>
					</td>
					<td class="actions">
						<?php 
// 						echo $this->Navbars->actionButtons(['buttons_group' => 'list_item', 'buttons_list_item' => [['view', 'edit', 'delete']], 'model_id' => $reservation->id]);
						?>
						
						<?php 
// 						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span> ' . __d('alaxos', 'view'), ['action' => 'view', $reservation->id], ['class' => 'to_view', 'escape' => false]);
// 						echo ' ';
// 						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ' . __d('alaxos', 'edit'), ['action' => 'edit', $reservation->id], ['escape' => false]);
// 						echo ' ';
// 						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span> ' . __d('alaxos', 'delete'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id), 'escape' => false]);
						?>
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $reservation->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $reservation->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($reservations) && $reservations->count() > 0)
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