<!DOCTYPE html>
<html>
    <style>
        .form-control { height: 55px !important;}
    </style>
    <head>
        <?php
		echo $this->Html->meta('icon');
		/* Bootstrap CSS */
		echo $this->Html->css('/plugins/bootstrap/css/bootstrap.min.css?q='.QRDN);
		
		/* Usermgmt Plugin CSS */
		echo $this->Html->css('/usermgmt/css/umstyle.css?q='.QRDN);
		
		/* Bootstrap Datepicker is taken from https://github.com/eternicode/bootstrap-datepicker */
		echo $this->Html->css('/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css?q='.QRDN);

		/* Bootstrap Datepicker is taken from https://github.com/smalot/bootstrap-datetimepicker */
		echo $this->Html->css('/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css?q='.QRDN);
		
		/* Chosen is taken from https://github.com/harvesthq/chosen/releases/ */
		echo $this->Html->css('/plugins/chosen/chosen.min.css?q='.QRDN);

		/* Toastr is taken from https://github.com/CodeSeven/toastr */
		echo $this->Html->css('/plugins/toastr/build/toastr.min.css?q='.QRDN);

		/* Jquery latest version taken from http://jquery.com */
		echo $this->Html->script('/plugins/jquery-1.11.3.min.js');
		
		/* Bootstrap JS */
		echo $this->Html->script('/plugins/bootstrap/js/bootstrap.min.js?q='.QRDN);

		/* Bootstrap Datepicker is taken from https://github.com/eternicode/bootstrap-datepicker */
		echo $this->Html->script('/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js?q='.QRDN);

		/* Bootstrap Datepicker is taken from https://github.com/smalot/bootstrap-datetimepicker */
		echo $this->Html->script('/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js?q='.QRDN);
		
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
                echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                        
                        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dashboard</title>
        <link rel="shortcut icon" href="slices/crlogo.png" type="image/x-icon">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?= URL ?>bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= URL ?>dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?= URL ?>dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?= URL ?>plugins/iCheck/flat/blue.css">
        <link rel="stylesheet" href="<?= URL ?>plugins/morris/morris.css">
        <link rel="stylesheet" href="<?= URL ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="<?= URL ?>plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="<?= URL ?>plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="<?= URL ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <style>
            
             @font-face {
                font-family: myFirstFont;
                src: url(<?= URL ?>font/GE-SS-Two-Bold.otf);
            }
            @font-face {
                font-family: mysecondFont;
                src: url(<?= URL ?>font/GE-SS-Two-Light.otf);
            }
            @font-face {
                font-family: mythirdFont;
                src: url(<?= URL ?>font/GE-SS-Two-Medium.otf);
            }
            body {
                font-family: mysecondFont !important;
            }
            h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    font-family: mysecondFont !important;
}
            
            #mainpt1{    background-image: url(<?= URL ?>slices/1.png);
    background-size: 100% 100%;
    height: 160px;}
           #mainpt2{    background-image: url(<?= URL ?>slices/2.png);
    background-size: 100% 100%;
    height: 160px;}
                                    
           #mainpt3{    background-image: url(<?= URL ?>slices/3.png);
    background-size: 100% 100%;
    height: 160px;}
                                                
           #mainpt4{    background-image: url(<?= URL ?>slices/4.png);
    background-size: 100% 100%;
    height: 160px;}
                                                            
           #mainpt5{    background-image: url(<?= URL ?>slices/5.png);
    background-size: 100% 100%;
    height: 160px;}
                                                                        
          #mainpt6{    background-image: url(<?= URL ?>slices/6.png);
    background-size: 100% 100%;
    height: 160px;}
            .small-box>.inner {
    padding: 58px !important;
}

#mainpth{padding-top: 26px;}
#mainptp{float: right;    padding-top: 15px;}
@media screen and (max-width: 1000px) {
   .small-box h3 {
    font-size: 20px !important;
    white-space: pre-line !important;
}
}
/*.table-hover { background-color : black !important;}*/
table{border: solid 1px !important;}
tbody{    border: solid rgba(34, 45, 50, 0.71) !important;}

        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b><span style="color:#f9c60d;">C</span></b><span style="color:#c23188;">R</span></span>
                    <!-- logo for regular state and mobile devices -->
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                       
                                            <!-- end message -->
                                           
                                          
                                         
                                          
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- Notifications: style can be found in dropdown.less -->
                            
          

                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel" style="height: 70px;">
                        <div class="pull-left image">
<!--                            <img src="<?= URL ?>library/drgus/19679857_480906285580202_286007257_n (1).png" class="img-circle" alt="User Image" >-->
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $user[0]['username'];?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
<!--                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>-->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                      <?php if ($user[0]['user_group_id'] == 1) { ?>
                    <ul class="sidebar-menu">
                        <li class="header">Home Page</li>
 

          
                             <li class="active treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span> تفاسير ومقاطع صوتية</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                   <li class="treeview">
                            <a href="<?= URL ?>tafaseer/add">
                                <i class="fa fa-users"></i> <span>إضافة تفسير ومقطع صوتى للسورة</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                           
                        </li>
                            </ul>
           
                            <ul class="treeview-menu">
                                   <li class="treeview">
                            <a href="<?= URL ?>tafaseer/index">
                                <i class="fa fa-users"></i> <span>عرض كل المقاطع والتفاسير</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                           
                        </li>
                            </ul>
           
           
           
           
                        </li>
                        
          
                             <li class="active treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span> القرآن الكريم</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                   <li class="treeview">
                            <a href="<?= URL ?>quraan/add">
                                <i class="fa fa-users"></i> <span>إضافة سورة قرآنية</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                           
                        </li>
                            </ul>
           
                            <ul class="treeview-menu">
                                   <li class="treeview">
                            <a href="<?= URL ?>quraan/index">
                                <i class="fa fa-users"></i> <span>كل السور القرآنية</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                           
                        </li>
                            </ul>
           
           
           
           
                        </li>
                             <li class="active treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span> أجزاء القرآن الكريم</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                   <li class="treeview">
                            <a href="<?= URL ?>parts/add">
                                <i class="fa fa-users"></i> <span>إضافة جزء</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                           
                        </li>
                            </ul>
           
                            <ul class="treeview-menu">
                                   <li class="treeview">
                            <a href="<?= URL ?>parts/index">
                                <i class="fa fa-users"></i> <span>كل الاجزاء</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                           
                        </li>
                            </ul>
           
           
           
           
                        </li>
                        
                        
                        

  
                       
                      
                      
                     
                        
                   
                      
                    </ul>
                                     
 <?php }  ?>
 

                       


                 
                      
                      
       
                                       
                                          
                                                  
                                        
                </section>
                <!-- /.sidebar -->
            </aside>
