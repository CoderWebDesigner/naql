<style>
    table > tbody > tr > td  {
            min-width: 200px;
    }
    </style>

<div class="users index">
	
	<h2><?= ___('قائمة المحظورين'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		 
		</div>
		<div class="panel-body">
			
			<div class="table-responsive">
			
			<table cellpadding="0" cellspacing="0" class="table table-striped table-hover table-condensed">
			<thead>
			<tr class="sortHeader">
				<th></th>
				 
				<th><?php echo $this->Paginator->sort('username', ___('إسم المستخدم')); ?></th>
				<th><?php echo $this->Paginator->sort('email', ___('البريد اللإلكترونى')); ?></th>
                             
				 <th><?php echo $this->Paginator->sort('photo', ___('الصورة')); ?></th>
 			     
				
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
					echo $this->AlaxosForm->filterField('username');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('email');
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
			<?php foreach ($users as $i => $user): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('User.' . $i . '.id', array('value' => $user->id, 'class' => 'model_id'));
						?>
					</td>
					 
					<td>
						<?php echo h($user->username) ?>
					</td>
					<td>
						<?php echo h($user->email) ?>
					</td>
					 
					<td>
                                            <img src="<?=URL?>library/profile/<?php echo h($user->photo) ?>" style="    height: 90px;width: 90px;border-radius: 50px;" >
					</td>
				 
					 
					 
 
					 
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
		 
			
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