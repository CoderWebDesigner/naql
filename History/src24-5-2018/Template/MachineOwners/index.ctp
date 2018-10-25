<div class="machineOwners index">
	
	<h2><?= ___('مزود الخدمة '); ?></h2>
	
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
				<th><?php echo $this->Paginator->sort('machine_detail_id', ___('المعدة')); ?></th>
				<th><?php echo $this->Paginator->sort('owner_id', ___('مزود الخدمة')); ?></th>
				<th><?php echo $this->Paginator->sort('photos', ___('صور المعدة')); ?></th>
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
					echo $this->AlaxosForm->filterField('machine_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('machine_detail_id');
					?>
				</td>
				<td>
					 
                                    <?php
                           
   echo $this->AlaxosForm->filterField('owner_id', ['options' => $owners, 'label' => false, 'style' => "text-align:left", 'class' => 'form-control filterEn', "autocomplete" => "off"]);
             
                                   ?>
				</td>
				<td>
					<?php
					//echo $this->AlaxosForm->filterField('photos');
					?>
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
			<?php foreach ($machineOwners as $i => $machineOwner):
                          
                            
                            debug($machineOwners);
                            ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('Machine Owner.' . $i . '.id', array('value' => $machineOwner->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo $machineOwner->has('machine') ? $this->Html->link($machineOwner->machine->name, ['controller' => 'Machines', 'action' => 'view', $machineOwner->machine->name]) : ''; ?>
					</td>
					<td>
						<?php echo $machineOwner->has('machine_detail') ? $this->Html->link($machineOwner->machine_detail->name, ['controller' => 'MachineDetails', 'action' => 'view', $machineOwner->machine_detail->id]) : ''; ?>
					</td>
					<td>
						<?php echo $machineOwner['owner']['name']; ?>
					</td>
					<td  class="col-sm-12">
                                            
                                       
                                            <?php  foreach ($machineOwner['machine_photos'] as  $machinePhotoss): ?>
                                            <div class="col-sm-4">
                                            <img src="<?=URL?>library/machineOwners/<?php echo  $machinePhotoss['photo'] ; ?>" style="text-align: center; height: 100px;width: 150px;">
					</div>
                                                <?php endforeach; ?>
                                           
                                        </td>
					<td>
						<?php echo h($machineOwner->to_display_timezone('created')); ?>
					</td>
					 
					<td class="actions">
					 
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $machineOwner->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $machineOwner->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $machineOwner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machineOwner->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($machineOwners) && $machineOwners->count() > 0)
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