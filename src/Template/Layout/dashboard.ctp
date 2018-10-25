<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script language="javascript">
		var urlForJs="<?php echo SITE_URL ?>";
	</script>
	<?php
		/* Bootstrap CSS */
		echo $this->Html->css('/plugins/bootstrap/css/bootstrap.min.css?q='.QRDN);
		
		/* Usermgmt Plugin CSS */
		echo $this->Html->css('/usermgmt/css/umstyle.css?q='.QRDN);
		
		/* Bootstrap Datepicker is taken from https://github.com/eternicode/bootstrap-datepicker */

		/* Bootstrap Datepicker is taken from https://github.com/smalot/bootstrap-datetimepicker */
		
		/* Chosen is taken from https://github.com/harvesthq/chosen/releases/ */
		echo $this->Html->css('/plugins/chosen/chosen.min.css?q='.QRDN);

		/* Toastr is taken from https://github.com/CodeSeven/toastr */
		echo $this->Html->css('/plugins/toastr/build/toastr.min.css?q='.QRDN);

		/* Jquery latest version taken from http://jquery.com */
		echo $this->Html->script('/plugins/jquery-1.11.3.min.js');
		
		/* Bootstrap JS */
		echo $this->Html->script('/plugins/bootstrap/js/bootstrap.min.js?q='.QRDN);

		/* Bootstrap Datepicker is taken from https://github.com/eternicode/bootstrap-datepicker */

		/* Bootstrap Datepicker is taken from https://github.com/smalot/bootstrap-datetimepicker */
		
		/* Bootstrap Typeahead is taken from https://github.com/biggora/bootstrap-ajax-typeahead */
		echo $this->Html->script('/plugins/bootstrap-ajax-typeahead/js/bootstrap-typeahead.min.js?q='.QRDN);
		
		/* Chosen is taken from https://github.com/harvesthq/chosen/releases/ */
		echo $this->Html->script('/plugins/chosen/chosen.jquery.min.js?q='.QRDN);

		/* Toastr is taken from https://github.com/CodeSeven/toastr */
		echo $this->Html->script('/plugins/toastr/build/toastr.min.js?q='.QRDN);

		/* Usermgmt Plugin JS */
		echo $this->Html->script('/usermgmt/js/umscript.js?q='.QRDN);
		echo $this->Html->script('/usermgmt/js/ajaxValidation.js?q='.QRDN);

		echo $this->Html->script('/usermgmt/js/chosen/chosen.ajaxaddition.jquery.js?q='.QRDN);
		echo $this->fetch('css');

		echo $this->fetch('script');
	?>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php echo $this->Html->charset();?>
<?php  echo $this->element('dashboard/header'); ?>
  <?php echo $this->element('Usermgmt.message_notification'); ?>

<div class="content-page" style="
     @font-face {
                font-family: myFont;
                src: url(<?= URL ?>dashboard/fonts/GE-SS-Two-Light.otf);
            }">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
<?php
 
echo $this->fetch('content');
?>
 

  <!-- ==========================ENDENDEND ENDENDEND ENDENDEND==================================== -->
       </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                 
                </footer>

</div>
<?php echo $this->element('dashboard/footer'); ?>

