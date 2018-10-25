 
      <link href="<?= URL ?>dashboard/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />

<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <style>
                
             
              @media (min-width: 360px) and (max-width: 640px) {
                     .addchat {
                    margin-top: 14px;
                } 
                .pCHAT2 {
                    width: 80%;
                }
                .criclef {
       margin-right: 36px;
    padding-right: 33px;
}
.crictxtlef {
     padding-right: 65px;
}
 
}  
                
       .imgcalc {
    width: 33px;
    height: 33px;
    text-align: center;
    margin-top: 8px;
    padding: 0;
}         
                
                .datepicker {
    width: 250px;
    top: 383px !important;
    right: 84px !important;
    margin-right: 613px !important;
    margin-top: 300px;
}
</style>

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                              

                                  <div style="float: right">  <h4 class="page-title">لوحة التحكم / الرئيسية</h4></div>
                            
                            </div>
                        </div>
                         <!-- end Page-Title -->

                        <div class="row" style="    margin-top: 15px;">
                            
                            <div class="col-md-6 col-sm-6 col-lg-3 lenovo ">
                                <div class="widget-bg-color-icon  fadeInDown animated">
                                    <div class="col-sm-12 box" style="background: #0bc4e0;">
                                           <div class="col-sm-6"></div>
                                        <img class="imgcalc col-sm-6" src="<?= URL ?>img/clients-main.png">
                                    </div>
                              <div class="col-sm-12 whitebox">
                                  <h4 class="texty isa" style=" padding-right: 17px;">عدد العملاء</h4>
                                   <div class="text-right">  <h3 class="text-dark"><b  style="color: #0bc4e0;" class="counter"><?= $customerCount ?></b></h3>  </div> 
                              </div>
 
 
                                   
                                    <div class="clearfix"></div>
                                </div>
                                
                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-3 smallscreen lenovo">
                                <div class="widget-bg-color-icon ">
                               <div class="col-sm-12 box " style="background: #f1a80b;">
                                      <div class="col-sm-6"></div>
                                   <img class="imgcalc col-sm-6"  src="<?= URL ?>img/drivers-main.png"></div>
                              <div class="col-sm-12 whitebox">
                                  <h4 class="texty isa" style="padding-right: 13px;" >عدد المندوبين</h4>
                                     <div class="text-right " >  <h3 class="text-dark"><b style="color: #f1a80b;" class="counter"><?= $driverCount ?></b></h3>  </div>
                              </div>
                                  
                                    
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-3 smallscreen lenovo">
                                <div class="widget-bg-color-icon ">
                                             <div class="col-sm-12 box" style="background: #1e74eb ;">
                                                 <div class="col-sm-6"></div>
                                                 <img  class="imgcalc col-sm-6" style="" src="<?= URL ?>img/orders-main.png">
                                             
                                             </div>
                            <div class="col-sm-12 whitebox">
                                <h4 class="texty isa" style="    padding-right: 17px;">عدد الطلبات</h4>
                                
                                     <div class="text-right ">      <h3   class="text-dark"><b style="color: #1e74eb ;" class="counter"><?= $ordersCount ?></b></h3>  </div>
                            </div>
                                
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-3 smallscreen lenovo">
                                <div class="widget-bg-color-icon ">
                                        <div class="col-sm-6"></div>         
                                    <div class="col-sm-12 box" style="background: #85c976;">
                                        <div  class="col-sm-6"></div>        
                                        <img class="imgcalc"  src="<?= URL ?>img/money-main.png"></div>
                            <div class="col-sm-12 whitebox">
                                <h4 class="texty isa" >التحويلات (ريال)</h4>
                                 <div class="text-right "> <h3 class="text-dark"><b  style="color: #85c976;" class="counter"><?= $allprices ?></b></h3>  </div>
                            </div>
                                  
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                     
                        <!-- end row -->
                 <!--------------- Cricel ------------------>
                 <div class="row">
                 <div class="col-sm-12 maincol12"  style="    margin-top: 30px;" > 
                       
                        <div class="col-sm-6 col-xs-12 cricright" style=""> <div class="circle" id="circles-2" data-value='<?= $percentDone ?>'></div>
                            <h4 class="crictxtrig" style=" ">طلبات تمت بنجاح</h4>
                        </div>
                      <div class="col-sm-6 col-xs-12 criclef" style=" "> <div class="circle" id="circles-1" data-value='<?= $percentFail ?>'> </div>
                            <h4  class="crictxtlef" style=""> طلبات ملغاه</h4>
                        </div>
                       
                    </div>
                     </div> 
                      <!---------------end Cricel ------------------>

 
<style>
   .gm-style .gm-style-iw {   text-align: left; }
</style>

               <!-----------------end map ---------->
               
               
               
               <!-----------------orderDetails ---------->
               <div class="row" style="background: white;border-radius: 6px;">
                 
      
		 
            <div class="col-sm-12 headbg">
                
               <h2 class="headtxt col-sm-2"> جميع الطلبات </h2>  
              
          
             
             
            </div> 
            <!-----end headbg-->
               
              
		<div class="panel-body col-sm-12">
                    
			
			<div class="table-responsive">
			
			<table cellpadding="0" cellspacing="0" class="table table-striped table-hover table-condensed">
			<thead >
    
			<tr class="sortHeader">
				                         
                                <th ><?php echo $this->Paginator->sort('id', ___('رقم الطلب')); ?></th>	
                                                                <th ><?php echo $this->Paginator->sort('user_id', ___('العميل')); ?></th>			      
                                                                <th><?php echo $this->Paginator->sort('owner_id', ___('المندوب')); ?></th>

                                <th><?php echo $this->Paginator->sort('description', ___('الطلب')); ?></th>  

                                <th style="width:160px;"><?php echo $this->Paginator->sort('created', ___('التاريخ')); ?></th>   
                                <th><?php echo $this->Paginator->sort('price', ___('تكلفة التوصيل')); ?></th>
                                <th><?php echo $this->Paginator->sort('order_status', ___('الحالة')); ?></th>
 			<th class="actions"></th>
			</tr>
	
			</thead>
			
			<tbody>
			<?php foreach ($orderDetailss as $i => $orderDetail): 
                            
  //   debug($orderDetail);
                            ?>
                           
				<tr>
                                   
                                        <td>
                                                                             <?php echo $orderDetail['id']; ?>

                                        </td>
                                        
                                     
                                        <td>
                                       <?php echo $orderDetail['user']['username']; 
                                       ?>
                                        </td>

                                        <td>
                                            <?php echo $orderDetail['owner']["user"]['username']; ?>
                                        </td>

                                        <td>
                                            <?php echo $orderDetail['start_point'] ; ?>
                                        </td>
 

                                        <td>
                                       <?php echo $orderDetail['created'] ; ?>
                                        </td> 
                                        
                                            
                                       
                                        <td>
                                       <?php echo $orderDetail['price'] ; ?>
                                            
                                        </td>
                                            <td>
                                            <?php 
                                            
//                                        
                                            if($orderDetail->status == "pending"){
                                                ?>
                                                   <button class="btn-default">قيد الانتظار</button>
                                                   <?php
                                            }elseif($orderDetail->status=="completed"){
                                                ?>
                                                   <button class="btn-info">تم قبول الطلب</button>
                                                   <?php
                                            }
                                      
                                            ?>
                                            
                               
                                        </td>


			 	        <td class="actions" >
             <a  class='dropdown-toggle col-sm-12' data-toggle='dropdown'  style="    margin: 1px;width: 50px;cursor: pointer;">
                <img src="<?=URL?>img/more.png" style="     height: 25px;  margin-top: 30px; width: 25px;">
              
             </a>
                    
                           <?php
                            echo "<ul class='dropdown-menu'>";
                             echo "<li>" . $this->Html->link(__('تعديل بيانات الطلب '), ['controller' => 'Reservations', 'action' => 'edit', $orderDetail['id'],'plugin'=>null, ['escape' => false]]) . "</li>";
                            echo "<li>" . $this->Html->link(__('عرض بيانات الطلب '), ['controller' => 'Reservations', 'action' => 'view', $orderDetail['id'],'plugin'=>null, ['escape' => false]]) . "</li>";
                            echo "</ul>";
                            ?>

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
				echo $this->Paginator->prev('< ' . __('السابق'));
				echo $this->Paginator->numbers(['first' => 2, 'last' => 2]);
				echo $this->Paginator->next(__('التالى') . ' >');
				?>
				</ul>
			</div>
			
		</div>
	 
 
 
<script type="text/javascript">
jQuery(document).ready(function(){
	Alaxos.start();
});
</script>
                       
                       
                       
                       
                
                   
                   
               </div>
               <!-----------------end index ---------->
               
               
                       <!-----------------chats ---------->
           
               <!-----------------end index ---------->
               <!---------------- end ---------------->
               
               <div class="row">
                   <div class="col-sm-12 maincol12">
                  
                  
             

                  <div class="panel panel-primary">

	<div class="panel-body dashboard-section">
<h4><span class="label label-default"> المستخدمين</span>
</h4><br>
<a href="<?=URL?>users/add" class="btn btn-default um-btn">إضافة مستخدم </a>
<a href="<?=URL?>usermgmt/users" class="btn btn-default um-btn">كل المستخدمين </a>
<a href="<?=URL?>usermgmt/users/online" class="btn btn-default um-btn">المستخدمين الحاليين </a>
<hr><h4><span class="label label-default">المجموعات </span>
</h4><br><a href="<?=URL?>usermgmt/user_group_permissions/permissionGroupMatrix" class="btn btn-default um-btn">صلاحيات المجموعات </a>
<hr><h4><span class="label label-default">البريد الإلكترونى </span></h4><br>
<a href="<?=URL?>usermgmt/user_emails/send" class="btn btn-default um-btn">إرسال بريد إلكترونى </a>
<a href="<?=URL?>usermgmt/user_emails" class="btn btn-default um-btn">عرض المرسل  </a>
<a href="<?=URL?>usermgmt/scheduled_emails" class="btn btn-default um-btn">طلبات الإتصال </a>
<a href="<?=URL?>usermgmt/user_email_templates" class="btn btn-default um-btn"> جدولة البريد</a>
<a href="<?=URL?>usermgmt/user_email_signatures" class="btn btn-default um-btn">إرسال تنيه </a><hr>	</div>
</div> 
</div> 
                  
                  
              
                   
               </div>
                        <!-- end row -->

                        

             
  <!-- ==========================ENDENDEND ENDENDEND ENDENDEND==================================== -->

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
              <!--------------end orders------------->          
<!--              <div class="col-sm-12 maincol12">
                  
                  
                  <div class="panel panel-primary" >

	<div class="panel-body dashboard-section">
<?php	if($this->UserAuth->isLogged()) {
	
                        if($this->UserAuth->isAdmin()) {
                        			echo "<h4><span class='label label-default'> المستخدمين</span></h4><br/>";
				if($this->UserAuth->HP('Users', 'addUser', 'Usermgmt')) {
					echo $this->Html->link(__('إضافة مستخدم '), ['controller'=>'Users', 'action'=>'addUser', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}

				if($this->UserAuth->HP('Users', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('كل المستخدمين '), ['controller'=>'Users', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('Users', 'online', 'Usermgmt')) {
					echo $this->Html->link(__('المستخدمين الحاليين '), ['controller'=>'Users', 'action'=>'online', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
		 
				echo "<hr/>";

				echo "<h4><span class='label label-default'>المجموعات </span></h4><br/>";
				if($this->UserAuth->HP('UserGroupPermissions', 'permissionGroupMatrix', 'Usermgmt')) {
					echo $this->Html->link(__('صلاحيات المجموعات '), ['controller'=>'UserGroupPermissions', 'action'=>'permissionGroupMatrix', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
                        }
                                
                        echo "<hr/>";
	

			if($this->UserAuth->isAdmin()) {
	 
				echo "<h4><span class='label label-default'>البريد الإلكترونى </span></h4><br/>";
				if($this->UserAuth->HP('UserEmails', 'send', 'Usermgmt')) {
					echo $this->Html->link(__('إرسال بريد إلكترونى '), ['controller'=>'UserEmails', 'action'=>'send', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserEmails', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('عرض المرسل  '), ['controller'=>'UserEmails', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('ScheduledEmails', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('طلبات الإتصال '), ['controller'=>'ScheduledEmails', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
			
				if($this->UserAuth->HP('UserEmailTemplates', 'index', 'Usermgmt')) {
					echo $this->Html->link(__(' جدولة البريد'), ['controller'=>'UserEmailTemplates', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserEmailSignatures', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('إرسال تنيه '), ['controller'=>'UserEmailSignatures', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				echo "<hr/>";

			}
		} ?>
	</div>
</div> 
                  
                  
              </div>-->
                <!--------------end admin settings------------->          
            
        <!------------ end container ---------->

    <script type="text/javascript">
jQuery(document).ready(function(){
	Alaxos.start();
});
</script>
  
           <style>
   @media  (min-width :1024px) and (max-width :1300px)
{
    .mrgtop{
         margin-top: 350px;
    }
                 .datepicker{ 
                      width: 250px;
                     top: 682px !important;
    right: 84px !important;
      margin-right: 613px !important; margin-top: 300px;
              
               }
               
}

             
@media  (min-width :768px) and (max-width :1024px){
   .datepicker{
        display: block;
    top: 1127px !important;
    
    width: 250px;
        margin-right: 613px !important;
    margin-top: 300px;
    }  
}
        .datepicker{ 
                      width: 250px;
                     top: 682px !important;
    right: 84px !important;
      margin-right: 613px !important; margin-top: 300px;
              
               }
   
    </style> 