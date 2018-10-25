<div class="machines index">
	
	<h2><?= ___('كل الأقسام'); ?></h2>
	
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
				<th><?php echo $this->Paginator->sort('name', ___('القسم بالعربى')); ?></th>
				<th><?php echo $this->Paginator->sort('name_en', ___('القسم بالانجليزى')); ?></th>
				<th><?php echo $this->Paginator->sort('location', ___('اللوكشن')); ?></th>
				<th><?php echo $this->Paginator->sort('photo', ___('الصورة')); ?></th>
				<th style="width:160px;"><?php echo $this->Paginator->sort('created', ___('تاريخ الانشاء')); ?></th>
			 
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
				 	echo $this->AlaxosForm->filterField('location');
					?>
				</td>
				<td>
					 
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterDate('created');
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
			<?php foreach ($machines as $i => $machine): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('Machine.' . $i . '.id', array('value' => $machine->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo h($machine->name) ?>
					</td>
					<td>
						<?php echo h($machine->name_en) ?>
					</td>
					<td>
						<?php echo h($machine->location) ?>
					</td>
					<td>
					   <img src="<?php  echo URL. "library".'/'.'machine'.'/'. $machine->photo; ?>" style="width: 200px;height: 150px;">
					</td>
					<td>
						<?php echo h($machine->to_display_timezone('created')); ?>
					</td>
					 
					<td class="actions">
 
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $machine->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $machine->id], ['escape' => false]);
						echo '&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $machine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machine->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($machines) && $machines->count() > 0)
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