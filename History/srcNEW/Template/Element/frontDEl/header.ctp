<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        
        <link rel="shortcut icon" href="<?= URL ?>images/logo.png">

        <title>naQl</title>
     
 <?php
		//echo $this->Html->meta('icon');
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
                echo $this->Html->script('/plugins/jquery-1.11.3.min.js');
                ?>

                 
         
      
 
        <!--------- end old files ------------>
        
        <!--Morris Chart CSS -->
        
<!--	<script src="<?= URL ?>dashboard/js/jquery-3.2.0.min.js"></script>-->
 
  <link rel="stylesheet" href="<?= URL ?>dashboard/css/morris.css">
<!--        <link href="<?= URL ?>dashboard/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />-->
        <link href="<?= URL ?>dashboard/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?= URL ?>dashboard/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?= URL ?>dashboard/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?= URL ?>dashboard/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?= URL ?>dashboard/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="<?= URL ?>dashboard/css/elhay.css" rel="stylesheet" type="text/css" />
        <script src="<?= URL ?>dashboard/js/modernizr.min.js"></script>

        <style>
            
           
            
            @font-face {
                font-family: myFont;
                src: url(<?= URL ?>dashboard/fonts/GE-SS-Two-Light.otf);
            }
            html {
                font-family: myFont !important;
            }
            body {
                font-family: myFont !important;
            }
 
            
            .fixed-left-void{
 
            }
                           .fixed-left-void-logo i {
    color: #ff1919 !important;
}

.datepicker{
    top: 29px !important;
    width: 100% !important;
       right: 675px !important; 
    width: 239px !important;
    left: -656px !important;
    display: block;
}
.form-horizontal{
        margin-top: 70px;
}
.form-control {
    background-color: #FFFFFF;
    border: 1px solid #E3E3E3;
    border-radius: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
    color: #565656;
    padding: 7px 12px;
    height: 50px;
    max-width: 100%;
    -webkit-box-shadow: none;
    box-shadow: none;
    -webkit-transition: all 300ms linear;
    -moz-transition: all 300ms linear;
    -o-transition: all 300ms linear;
    -ms-transition: all 300ms linear;
    transition: all 300ms linear;
}
 #wrapper {
    height: 100%;
    overflow: hidden;
    width: 100%;
    margin-top: 100px;
}
.dl-horizontal dt {
    float: right;
}
.glyphicon {
    font-size:15px ; 
    display: unset ; 
}
            </style>
            
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper" style="/*overflow: scroll !important;*/">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <div class="logo ">
                            <a  href="<?=URL?>webroot/dashboard" style="color:white;">
                            <img src="<?= URL ?>images/logo.png" style="    height: 53px;">
                                 <span style="margin-right: 10px;color:white"> نقل</span></a>
                           <div class="pull-left">
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="md md-menu"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                        </div>
                        <!-- Image Logo here -->
 
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            

 

                            


                            <ul class="nav navbar-nav navbar-right pull-right">
                         
                                   
                                <li class="dropdown top-menu-item-xs" style="border-right:  1px solid #ddd; height: 64px  ">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="<?= URL ?>dashboard/img/user-image.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu" >
                                        <li><a href="javascript:void(0)"><i class="ti-user m-r-10 text-custom"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="ti-settings m-r-10 text-custom"></i> Settings</a></li>
                                        <li><a href="javascript:void(0)"><i class="ti-lock m-r-10 text-custom"></i> Lock screen</a></li>
                                        <li class="divider"></li>
                                        <li><a href="javascript:void(0)"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
                                    </ul>
                                </li>
                         
                           
                            </ul> 
<!--                            <form role="search" class="navbar-left app-search pull-left hidden-xs" >
                                
                                <input type="text" style="color:black !important" placeholder="" class="form-control">
			                     <a href=""><i class="fa fa-search"></i></a>
			                </form>-->
                              
                            
                        </div>
                        <!--/.nav-collapse -->
                      <nav class="navbar navbar-default navbar-fixed-top bootstrapdropmenu" style="   
    background: none;  ">

                          <div class="container contain" >
        <div class="navbar-header" >
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"style="    background-color: white;">
                <span class="icon-bar" style="background: #38aed9;"></span>
                <span class="icon-bar"  style="background: #38aed9;"></span>
                <span class="icon-bar"  style="background: #38aed9;"></span>                        
            </button>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right" style="background-color: white; border: none; margin: auto; text-align: right;">
        
                <li class="ulli" style="    cursor: pointer;">
                           <a href="<?=URL?>dashboard"> <span  style="color:black">الصفحة الرئيسية</span> </a>
                        </li>
                       
                         <li class="ulli" style="    cursor: pointer;">
                            <a style="    cursor: pointer;" href="<?=URL?>areas" > <span style="color:black">المناطق</span> </a>
                        </li>
                     
                        <li class="ulli" style="    cursor: pointer;">
                            <a style="    cursor: pointer;" href="<?=URL?>machines"> <span style="color:black">الاقسام</span> </a>
                        </li>
                        <li class="ulli" style="    cursor: pointer;">
                            <a style="    cursor: pointer;" href="<?=URL?>machineDetails"> <span style="color:black">المعدات</span> </a>
                        </li>
            
                       
                       
                        
                        
                
                
        </ul>
        </div>
    </div>
</nav>
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu" style=" position:  fixed">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                   
                    <!--------- slide right bar -------->
                    <div id="sidebar-menu">
                            <!------ admin profile ------>
                            <div class="col-sm-12 adminfo" style="">
                               <div class="col-sm-4" style="float:right;    padding-top: 10px;"> 
                                   <img id="imgafter" src="<?= URL ?>dashboard/img/user-image.jpg" style="  border-radius: 110px;  height: 50px; ">
                                </div>
                                <div class="col-sm-8 " style="float:right;margin-top:5px">
                                    <div>
<!--                                    <h4  style="color:white;font-family: myFont;">محمد عبد الله</h4>-->
                                    <h5 style="color:white;font-family: myFont;">أدمن </h5>
                                    </div>
                                    <div>
                                        <a href="#" style="margin-right: 12px;"> 
                                            <img   src="<?= URL ?>dashboard/img/user-icon1.png" style="  height: 10px; ">
                          
                                        </a>
                                     <a href="#">  <img src="<?= URL ?>dashboard/img/user-icon2.png" style="   height: 10px;  margin-right: 10px;"></a>
                                     <a href="#">  <img src="<?= URL ?>dashboard/img/user-icon3.png" style="  height: 10px;  margin-right: 10px;"></a>
                                    </div>
<!--                                     <ul class="togole">
                                  <li class="togoleshowmargin">
                                      <a href="<?=URL?>usermgmt/users">  
                 <img src="<?= URL ?>dashboard/img/client-menu.png"   class="icon col-sm-2 "   style="     margin-right: -5px;   margin-top: 19px;">
                                    
                  
                                      </a>
                              
                                  </li>    
                                  <li class="togoleshowmargin">
                                      <a href="<?=URL?>Deliveries">  
                 <img src="<?= URL ?>dashboard/img/driver-menu.png"  class="icon col-sm-2"   style="    margin-right: -5px;    margin-top: 19px;">
                                  </a>
                                  </li> 
                                  <li class="togoleshowmargin">  
                                      <a href="<?=URL?>OrderDetails">  
                 <img src="<?= URL ?>dashboard/img/orders-menu.png"  class="icon col-sm-2"   style="     margin-right: -5px;   margin-top: 19px;">
                                      </a>
                                  </li> 
                                  <li class="togoleshowmargin">
                                         <a href="<?=URL?>BankTransfers">  
                 <img src="<?= URL ?>dashboard/img/money-transfer-menu.png"  class="icon col-sm-2"   style="      margin-right: -5px;  margin-top: 19px;">
                                         </a>
                                  </li> 
                                  <li class="togoleshowmargin">
                                             <a href="<?=URL?>CustomerQueries">  
                 <img src="<?= URL ?>dashboard/img/complain-menu.png"  class="icon col-sm-2"   style="      margin-right: -5px;  margin-top: 19px;">
                                                    </a>

                                  </li> 
                                  <li class="togoleshowmargin">
                                      <a href="<?=URL?>orderDetails/settings">  
                                          <img src="<?= URL ?>dashboard/img/setting-menu.png"  class="icon col-sm-2"   style="       margin-right: -5px; margin-top: 19px;">
                                                    </a>
                                  </li> 
                         
                              </ul>-->
                                </div>
                                
                            </div>
                              <!------ admin profile ------> 
                    <!----------disaply none in menu on --------->         
                        <ul id="media">
                       
                        	 <a href="<?=URL?>webroot/dashboard">
                         <li class="has_sub " style="    padding-right: 20px;  padding-top: 20px;    background: #e64803; color: white;  height: 50px;  margin-top: 102px;  ">
                             <img src="<?= URL ?>dashboard/img/home-menu.png" style="height: 15px;">
                             <span style="padding-right:10px;margin-top:10px;color:white"> 
                                     الرئيسية      </span>
                         </li></a>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect "> <span> المنطقة</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                   
                                    <li class="listyle">
                                         <a href="<?=URL?>areas/add" class=" col-sm-12">
                                        <img src="<?= URL ?>images/plus.png" class="icon col-sm-2-5"> 
                                         <span class="col-sm-9-5">إضافة منطقة</span>
                                    </a> 
                                         </li> 
                                    
                                    
                                   
                                    <li class="listyle" style="    margin-top: 5px;">
                                         <a href="<?=URL?>areas" class=" col-sm-12">
                                      <img src="<?= URL ?>images/view-list-button.png"  class="icon col-sm-2-5">
                                      <span class=" col-sm-9-5"> كل المناطق</span>
                                    </a>
                                         </li>
                                    
                                  
                                </ul>
                            </li>
                            <!------------------------machine cats------------>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect "> <span> أقسام</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                   
                                    <li class="listyle">
                                         <a href="<?=URL?>machines/add" class=" col-sm-12">
                                        <img src="<?= URL ?>images/plus.png" class="icon col-sm-2-5"> 
                                         <span class="col-sm-9-5">إضافة قسم جديد</span>
                                    </a> 
                                         </li> 
                                    
                                    
                                   
                                    <li class="listyle" style="    margin-top: 5px;">
                                         <a href="<?=URL?>machines" class=" col-sm-12">
                                      <img src="<?= URL ?>images/view-list-button.png"  class="icon col-sm-2-5">
                                      <span class=" col-sm-9-5"> عرض الأقسام</span>
                                    </a>
                                         </li>
                                    
                                  
                                </ul>
                            </li>
                                 <!-----------------------end machine cats------------>
                               <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"> <span> المعدات</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    
                                   
                                    <li class="listyle">
                                         <a href="<?= URL ?>MachineDetails/add" class=" col-sm-12">
                                        <img src="<?= URL ?>images/plus.png" class="icon col-sm-2-5"> 
                                        <span class="col-sm-9-5">إضافة معدة</span> 
                                      </a> 
                                         </li>
                                  
                                     
                                     
                                     <li class="listyle"  style="    margin-top: 5px;" >
                                         <a href="<?= URL ?>MachineDetails" class=" col-sm-12">
                                        <img src="<?= URL ?>images/view-list-button.png"  class="icon col-sm-2-5">
                                        <span class="col-sm-9-5"> كل المعدات</span>
                                     </a>
                                         </li>
                                    
                                  
                                </ul>
                            </li>
                              <!-----------------------end all  machineDeatails------------>
 
                               <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"> <span> مزودو الخدمة</span> <span class="menu-arrow"></span></a>
                                
                                <ul class="list-unstyled">
                                
                                       
                                    
                                      <li class="listyle" style="    margin-top: 5px;">
                                           <a href="<?=URL?>Owners/add" class=" col-sm-12">
                                        <img src="<?= URL ?>images/plus.png"  class="icon col-sm-2-5">
                                     <span class="col-sm-9-5"> إضافة مزود خدمة</span>
                                      </a>
                                      </li>
                                    
                                       
                                    
                                      <li class="listyle" style="    margin-top: 5px;">
                                           <a href="<?=URL?>machineOwners/add" class=" col-sm-12">
                                        <img src="<?= URL ?>images/plus.png"  class="icon col-sm-2-5">
                                     <span class="col-sm-9-5"> إضافة معدة لمزود خدمة</span>
                                      </a>
                                      </li>
                                    
                                      <li class="listyle" style="    margin-top: 5px;">
                                           <a href="<?=URL?>machine-owners" class=" col-sm-12">
                                        <img src="<?= URL ?>images/view-list-button.png"  class="icon col-sm-2-5">
                                     <span class="col-sm-9-5">  معدات مزودو الخدمة</span>
                                      </a>
                                      </li>
 
                                     
                                  
                                </ul>
                            </li>
                            
  <!----------disaply on in menu off --------->         
 
                              <!-----------------------users----------->
 
                               <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"> <span>العملاء</span> <span class="menu-arrow"></span></a>
                                
                                <ul class="list-unstyled">
                                
                                       
                                    
                                      <li class="listyle" style="    margin-top: 5px;">
                                           <a href="<?=URL?>users" class=" col-sm-12">
                                        <img src="<?= URL ?>images/view-list-button.png"  class="icon col-sm-2-5">
                                     <span class="col-sm-9-5"> العملاء</span>
                                      </a>
                                      </li>
                                    
                                       
                                     
 
                                     
                                  
                                </ul>
                            </li>
                            
  <!----------disaply on in menu off --------->         
 
                        </ul>

                                 
                              
                           
                             <!----------disaply on in menu off --------->            
                                    
                      
                    </div>
                    
                     <!---------end slide right bar -------->
                    <div class="clearfix"></div>
                </div>
            </div>
                
            <!-- Left Sidebar End -->
 