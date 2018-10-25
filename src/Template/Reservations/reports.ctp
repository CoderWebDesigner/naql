<link href="<?= URL ?>/css/cricel.css" rel="stylesheet" type="text/css"/>
<div id="wpwrap">
    <div id="adminmenumain" role="navigation" aria-label="Main menu">


        <div id="wpcontent">


            <div id="wpbody" role="main">

                <div id="wpbody-content" aria-label="Main content" tabindex="0">
                    <div id="screen-meta" class="metabox-prefs">

                        <div id="contextual-help-wrap" class="hidden no-sidebar" tabindex="-1" aria-label="Contextual Help Tab">
                            <div id="contextual-help-back"></div>
                            <div id="contextual-help-columns">
                                <div class="contextual-help-tabs">
                                    <ul>
                                    </ul>
                                </div>


                                <div class="contextual-help-tabs-wrap">
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .vc_license-activation-notice {
                            position: relative;
                        }
                    </style>

                    <div class="updated vc_license-activation-notice" id="vc_license-activation-notice"><p>Hola! Would you like to receive automatic updates and unlock premium support? Please <a href="<?=URL?>images/logo.png">activate your copy</a> of Visual Composer.</p><button type="button" class="notice-dismiss vc-notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span>
                        </button>
                    </div>
                    <style>
                        div.logo h2
                        {
                            font-weight: bold;
                            text-align: center;
                            color: #282880;
                        }
                        .notice-error, .notice-warning, .notice-success, .notice-info, .updated, .error, .update-nag
                        {
                            display: none !important;
                        }
                    </style>
                    <div class="bootstrap-wrapper">
                        <!-- start process message -->
                        <div id="processMessageContainer" class="processMessageContainer">
                            <div id="processMessage" class="processMessage successStatus">
                                <span></span>
                            </div>
                        </div>
                        <!-- end process message -->



                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-md-5 col-lg-4 logo clearfix" style="background: none !important" >
                                    <img src="<?=URL?>images/logo.png" style="width: 100%; height: 100%;" />
                                    <h2>Naql  Service</h2>
                                </div>
                                <div class="col-xs-12 col-md-5 col-md-offset-1 col-lg-offset-2 clearfix" style="padding: 20px 17px;background: none !important">
                                    <a href="http://sfc-oman.com/wp-login.php?action=logout&amp;_wpnonce=3cf2e380d2" class="btn btn-danger" style="float: right;">Logout&nbsp;<span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                                    <a href="http://sfc-oman.com/wp-admin/admin.php?page=mhchresrep" class="btn btn-info" style="float: right; margin-right: 10px;">Reservations report&nbsp;<span class="glyphicon glyphicon-stats"></span></a>
                                </div>
                                <!-- col-xs-offset-2 col-sm-offset-3 col-md-offset-4 col-lg-offset-4 -->
                            </div>
                        </div>
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <div class="row" style="border: 1px gainsboro solid;border-radius: 5px;padding-bottom: 20px;padding-top: 20px" >
                            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 reservlabel" style="text-align: center;padding-bottom: 10px">
                                إحصائيات الحجوزات
                            </div>

<?php
foreach ($all as $data) {
if ($data->status == "pending") {
$wait[] = array_sum($data);
}

if ($data->status == "completed") {
$accept[] = array_sum($data);
}
}
?>



                            <!-- HTML Chart -->
                            <div class="circle" id="circle-a" data="<?= round(count($wait) * 100 / count($all)) / 100 ?>">
                                <strong class="strong" ><?= round(count($wait) * 100 / count($all, 2)) ?>%</strong>
                                <span  >انتظار:  <?= count($wait) ?></span>

                            </div>
                            <div class="circle" id="circle-b" data="<?= round(count($accept) * 100 / count($all)) / 100 ?>">
                                <strong class="strong"><?= round(count($accept) * 100 / count($all), 2) ?>%</strong>
                                <span  >مكتمل: <?= count($accept) ?></span>

                            </div>




                            <!-- Node.js Chart -->


                        </div>
                        <div class="row" style="border: 1px gainsboro solid;border-radius: 5px;padding-bottom: 20px;padding-top: 20px">
                            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12" >
                                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                                <script type="text/javascript">
                                    google.charts.load('current', {'packages': ['corechart']});
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {

                                        var data = google.visualization.arrayToDataTable([
                                            ['Task', 'Hours per Day'],
                                <?php foreach($query->toarray() as $data){ ?>
                                            ["<?php echo $data["name"]; ?>", <?php echo $data["total_result"]; ?>   ],
                                <?php } ?>

                                        ]);

                                        var options = {
                                            title: 'مؤشر حجوزات المعدات'
                                        };

                                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                                        chart.draw(data, options);
                                    }
                                </script>
                                </head>

                                <div id="piechart" style="width: 850px; height: 500px;margin: 0 auto;" ></div>

                            </div>





                        </div>
                        <div class="row" style="border: 1px gainsboro solid;border-radius: 5px;padding-bottom: 20px;padding-top: 20px" >
                            <!--                            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 reservlabel" style="text-align: left;padding-bottom: 10px">
                            Statistics  Reservations
                            </div>-->

<?php ?>







                        </div>
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
				<th><?php echo $this->Paginator->sort('user_id', ___('العميل')); ?></th>
				<th><?php echo $this->Paginator->sort('start_point', ___('الانطلاق')); ?></th>
				<th><?php echo $this->Paginator->sort('end_point', ___('الوصول')); ?></th>
				<th><?php echo $this->Paginator->sort('date', ___('التاريخ')); ?></th>
				<th><?php echo $this->Paginator->sort('owner_id', ___('المالك')); ?></th>
				<th><?php echo $this->Paginator->sort('reservation_type_id', ___('النوع')); ?></th>
				<th><?php echo $this->Paginator->sort('machine_id', ___('المعدة')); ?></th>
           <th><?php echo $this->Paginator->sort('machine_detail_id', ___('المعدة الفرعية')); ?></th>

				<th><?php echo $this->Paginator->sort('status', ___('حالة الطلب')); ?></th>
				<th style="width:160px;"><?php echo $this->Paginator->sort('created', ___('تاريخ الطلب')); ?></th>
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
					echo $this->AlaxosForm->filterField('machine_detail_id');
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
						<?php echo $reservation->has('user') ? $this->Html->link($reservation->user->username, ['controller' => 'Users', 'action' => 'view', $reservation->user->id]) : ''; ?>
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
						<?php echo $reservation->has('owner') ? $this->Html->link($reservation->owner->user->username, ['controller' => 'Owners', 'action' => 'view', $reservation->owner->id]) : ''; ?>
					</td>
					<td>
						<?php echo $reservation->has('reservation_type') ? $this->Html->link($reservation->reservation_type->name, ['controller' => 'ReservationTypes', 'action' => 'view', $reservation->reservation_type->id]) : ''; ?>
					</td>
					<td>
						<?php echo $reservation->has('machine') ? $this->Html->link($reservation->machine->name, ['controller' => 'Machines', 'action' => 'view', $reservation->machine->id]) : ''; ?>
					</td>
                                        	<td>
						<?php echo $reservation->has('machine_detail') ? $this->Html->link($reservation->machine_detail->name, ['controller' => 'Machines', 'action' => 'view', $reservation->machine->id]) : ''; ?>
					</td>
					<td>
						<?php echo h($reservation->status) ?>
					</td>
					<td>
						<?php echo h($reservation->to_display_timezone('created')); ?>
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
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.1.3/circle-progress.min.js"></script>

                        <script src="<?= URL ?>/css/circles.min.js"></script>