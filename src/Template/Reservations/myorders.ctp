<link rel="stylesheet" href="<?=URL?>css/myorders.css">

<div class="row">
<?php foreach($data as $dataa){ ?>
                            <div class="col-lg-offset-1 col-lg-10">
                        		<div class="card-box">
                                         <!---------- order heade-------->
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                    <div class="col-sm-3">  <img src="<?= URL ?>images/earth_globes.png" class="imgproflef" ></div>
                                                    <div class="col-sm-3">  <img src="<?= URL ?>images/chat.png" class="imgproflef" ></div>
                                                 
                                                  
                                                    
                                                </div>
                                                
                                            <h4 class="text-dark header-title m-t-0 m-b-30 col-sm-5" >admin <br><span>طلب رقم : <?= $dataa['id']; ?></span></h4>
                                            <div class="col-sm-1">
                                                <img src="<?= URL ?>images/userone.png" class="imgprof" >
                                            </div>
                                            </div>
                                          <!---------- order heade-------->
                                         <!---------- order body-------->
                                            <div class="col-sm-12">
                                                <div class="col-sm-offset-1 col-sm-10" style="margin-top: 20px;">
                                                    <div class="col-sm-offset-1 col-sm-5" style="text-align: left"><span ><?= $dataa['start_point']; ?></span></div>
                                                    <div class="col-sm-5">
                                                        <div style="text-align: right;">
                                                             <img src="<?= URL ?>images/egypt.png" class="imgpoint" >
                                                             <span>نقطة الانطلاق</span>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                     
                                                <div class="col-sm-offset-1 col-sm-10" style="margin-top:20px;">
                                                    <div class="col-sm-offset-1 col-sm-5" style="text-align: left"><span ><?= $dataa['end_point']; ?></span></div>
                                                    <div class="col-sm-5">
                                                        <div style="text-align: right;">
                                                             <img src="<?= URL ?>images/egypt.png" class="imgpoint" >
                                                             <span>نقطة الوصول</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                <form class="col-sm-12" method="POST" action=''>
                                                   
                                                    <input  class="col-sm-6 col-sm-offset-4" value="<?= $dataa['date']; ?>">
                                                     <label  class=" col-sm-2">طلب تم منز :</label>
                                                   
                                                    <input  class="col-sm-6 col-sm-offset-4" value="<?= $dataa['date']; ?>">
                                                     <label  class=" col-sm-2">تاريخ/وقت:</label>
                                                   
                                                    
                                                    <input  class="col-sm-3" value="<?php echo 'كم ' .  $dataa['distance']; ?>" >
                                                     <label  class=" col-sm-3">المسافة بين نقطتين:</label>
                                                     
                                                     <input  class="col-sm-2 col-sm-offset-2" value="<?= $dataa['reservation_type']['name']; ?>">
                                                     <label  class=" col-sm-2">نوع التعاقد:</label>
                                                     
                                                     
                                                     <input  class=" spcol col-sm-10 col-sm-offset-2 " placeholder="تفاصيل الطلب" value="<?= $dataa['description'];?>" >
                                                    <hr>
                                                     <input name="price" class='col-sm-2 col-sm-offset-5    offer'  style="margin-top: 20px">
                                                     <label  class="  col-sm-5  "  style="font-size: 18px;">من فضلك اكتب السعر المناسب</label>
                                                   
                                                      <input type="hidden" name="reservation_id" value="<?= $dataa['id']; ?>">
                                                    <input type="hidden" name="owner_id" value="<?= $ownerId ; ?>">
                                                    
                                                    <div class="col-sm-12">
                                                    <button class="col-sm-offset-5 col-sm-7 btn btn-block   custombtn" style="width:200px; margin-top: 20px">ارسل عرض الطلب</button>
                                                    </div>
                                                </form>
                                               
                                               
                                            </div>
                                          <!---------- order heade-------->
                        		 
                        		</div>

                            </div>
 

<?php } ?>

						</div>