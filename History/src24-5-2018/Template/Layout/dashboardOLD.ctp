
<?PHP 

echo $this->element('dashboard/header');?>
<script language="javascript">
		var urlForJs="<?php echo SITE_URL ?>";
	</script>
    <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        
                        <small>Control Panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home Page</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<?php
			echo $this->element('Usermgmt.message_notification');

echo $this->fetch('content');?>
                    
                </section>
    </div>
                    <?php

echo $this->element('dashboard/footer');?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
