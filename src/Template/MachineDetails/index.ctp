<div class="machineDetails index">
	
	<h2><?= ___('كل المعدات '); ?></h2>
	
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
				<th><?php echo $this->Paginator->sort('machine_id', ___('القسم')); ?></th>
				<th><?php echo $this->Paginator->sort('name', ___('إسم المعدة بالعربى')); ?></th>
				<th><?php echo $this->Paginator->sort('name_en', ___('إسم المعدة بالانجليزى')); ?></th>
				<th style="width:160px;"><?php echo $this->Paginator->sort('created', ___('تاريخ الانشاء')); ?></th>
				<th><?php echo $this->Paginator->sort('machine_photo', ___('الصورة')); ?></th>
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
					echo $this->AlaxosForm->filterField('machine_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('name');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('name_en');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterDate('created');
					?>
				</td>
				<td>
					<?php
					//echo $this->AlaxosForm->filterField('machine_photo');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->button(___('بحث'), ['class' => 'btn btn-default']);
					echo $this->AlaxosForm->end();
					?>
				</td>
			</tr>
			</thead>
			
			<tbody>
			<?php foreach ($machineDetails as $i => $machineDetail): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('Machine Detail.' . $i . '.id', array('value' => $machineDetail->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo $machineDetail->has('machine') ? $this->Html->link($machineDetail->machine->name, ['controller' => 'Machines', 'action' => 'view', $machineDetail->machine->id]) : ''; ?>
					</td>
					<td>
						<?php echo h($machineDetail->name) ?>
					</td>
					<td>
						<?php echo h($machineDetail->name_en) ?>
					</td>
					<td>
						<?php echo h($machineDetail->to_display_timezone('created')); ?>
					</td>
					<td>
           <img src="<?=URL?>library/machine/<?php  echo h($machineDetail->machine_photo); ?>" style="width: 200px;height: 200px;">
                 
						 
					</td>
					<td class="actions">
 
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $machineDetail->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $machineDetail->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $machineDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machineDetail->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($machineDetails) && $machineDetails->count() > 0)
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