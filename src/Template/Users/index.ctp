<style>
    table > tbody > tr > td  {
            min-width: 200px;
    }
    </style>

<div class="users index">
	
	<h2><?= ___('العملاء'); ?></h2>
	
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
				 
				<th><?php echo $this->Paginator->sort('username', ___('إسم المستخدم')); ?></th>
				<th><?php echo $this->Paginator->sort('email', ___('البريد اللإلكترونى')); ?></th>
                             
				 <th><?php echo $this->Paginator->sort('photo', ___('الصورة')); ?></th>
				 <th><?php echo $this->Paginator->sort('active', ___('حالة الحساب')); ?></th>
				<th><?php echo $this->Paginator->sort('email_verified', ___('حالة البريد الإلكترونى')); ?></th>
                                
				 <th style="width:160px;"><?php echo $this->Paginator->sort('created', ___('تاريخ إنشاء الحساب')); ?></th>
			       <th><?php echo $this->Paginator->sort('black_list', ___('حظر العميل')); ?></th>
				
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
					//echo $this->AlaxosForm->filterField('photo');
					?>
				</td>
				 
				<td>
					<?php
					echo $this->AlaxosForm->filterField('active');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('email_verified');
					?>
				</td>
				 
				<td>
					<?php
					echo $this->AlaxosForm->filterDate('created');
					?>
				</td>
				 
				<td>
					<?php
					echo $this->AlaxosForm->filterField('black_list');
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
					 
                                        <td class="col-sm-12">
                                          <?php 
                                                if(h($user->active) == 0){
                                                echo '<button class="btn btn-success col-sm-8">';
                                                echo ' activeted';
                                                echo '</button>'; 
                                                    }else{
                                                echo '<button class="btn btn-danger col-sm-8">';
                                                 echo ' diactiveted';
                                                echo '</button>'; 
                                                    }
                                                    ?>    
			   <a class="btnsstyle  col-sm-4" href="#">
                    <?php
                    echo "<li style='list-style: none !important;'>" . $this->Form->postLink(   
                            $this->Html->image(URL . 'images/stop.png', ['alt' => __('Effacer'), "style" => "width: 25px;"]), ["class" => "col-sm-8", 'controller' => 'Users', 'action' => 'diactiveted', $user->id]
                            , ['escape' => false, 'style' => '  color: #d41e29;padding-right: 18px;', 'confirm' => __('سيتم تعطيل الحساب'),
                                                       ]);
                    ?>
                    <?php "</li>"; ?></a>
					</td>
					<td>
                                            <?php 
                                                if(h($user->email_verified) ==1){
                                                echo '<button class="btn btn-success col-sm-8">';
                                                echo ' verified';
                                                echo '</button>'; 
                                                    }else{
                                                echo '<button class="btn btn-danger col-sm-8">';
                                                 echo ' not verified';
                                                echo '</button>'; 
                                                    }
                                                    
                                                    ?>
                                               <a class="btnsstyle  col-sm-4" href="#">
                    <?php
                    echo "<li style='list-style: none !important;'>" . $this->Form->postLink(   
                           $this->Html->image(URL . 'images/stop.png', ['alt' => __('Effacer'), "style" => "width: 25px;"]), ["class" => "col-sm-8", 'controller' => 'Users', 'action' => 'verified', $user->id]
                            , ['escape' => false, 'style' => '  color: #d41e29;padding-right: 18px;', 'confirm' => __('سبتم تعطيل البريدالإلكترونى'),
                                                       ]);
                    ?>
                    <?php "</li>"; ?></a>
					 
					</td>
					 
					<td>
						<?php echo h($user->to_display_timezone('created')); ?>
					</td>
					 
					<td>
<!--                                <a class="btnsstyle" href="#">
                    <?php
                    echo "<li>" . $this->Form->postLink(   
                            $this->Html->image(URL . 'images/stop.png', ['alt' => __('Effacer'), "style" => "width: 25px;"]), ["class" => "col-sm-8", 'controller' => 'Users', 'action' => 'diactiveted', $user->id]
                            , ['escape' => false, 'style' => '  color: #d41e29;padding-right: 18px;', 'confirm' => __('سيتم تعطيل الحساب'),
                                                       ]);
                    ?>
                    <?php "</li>"; ?></a>-->
                                             <?php 
//                                                if(h($user->black_list) == 0){
//                                                echo '<button class="btn btn-success">';
//                                                echo 'user allow';
//                                                echo '</button>'; 
//                                                    }else{
//                                                echo '<button class="btn btn-danger">';
//                                                 echo 'user blocked';
//                                                echo '</button>'; 
//                                                    }
                                                    ?>
						 
					</td>
					
					<td class="actions">
 
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $user->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $user->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($users) && $users->count() > 0)
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