<!--   <div class="col-sm-12 lowernewssmdiv1 displaybigscren margtopside" >
                    <div class="row rowwidthyone" style="width: 100%;">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" >

                            <div class=" bhoechie-tab-menu " style="height: 100%;">
                                <div class="list-group col-lg-12 col-md-12 col-sm-12 col-xs-12 onepaddright" style="display: flex;">
                                    <a href="#"  class=" slideselect list-group-item active text-center widttwnt sidewionce ">
                                        أطباء 
                                    </a>
                                    <a href="#"  class=" slideselect list-group-item text-center widttwnt sidewionce">
                                        مستشفيات
                                    </a>
                                    <a href="#"  class="slideselect list-group-item text-center widttwnt sidewionce">
                                        نصائح
                                    </a>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab">
                              section 
                            <div class="slideactive bhoechie-tab-content active ">
                                <?php foreach ($doctors as $new): ?>
                                <div class="col-sm-12 sideboxmid wow fadeInUp hrefside" onclick="location.href = '<?= URL ?>/hospitals/docdetails/<?= $new['id']; ?>'" data-wow-duration="1s">
                                    <div class="col-sm-7">
                                        <h3 class="colorycarsiz"><?= $new['name']  ?></h3>
                                    </div>
                                    <div class="col-sm-5 mbr-figure smallscreenpos sidpicnpd">
                                        <img src="<?= URL ?>library/doctors/<?= $new['id']; ?>/umphotos/<?= $new['photo']; ?>" class="mbr-figure__img picsizmain">
                                    </div>
                                </div>
                         <?php endforeach;?>
                            </div>
                              section 
                            <div class="slideactive bhoechie-tab-content " >
                                 <?php foreach ($hos as $expert): ?>
                              
                                <div class="col-sm-12 sideboxmid wow fadeInUp hrefside" onclick="location.href = '<?=URL?>/hospitals/details/<?=$expert['id']?>'" data-wow-duration="1s">
                                    <div class="col-sm-7">
                                        <h3 class="colorycarsiz"><?= $expert['name']  ?></h3>
                                    </div>
                                    <div class="col-sm-5 mbr-figure smallscreenpos sidpicnpd">
                                        <img src="<?= URL ?>library/hospitals//<?= $expert['id']; ?>/umphotos/<?= $expert['photo']?>" class="mbr-figure__img picsizmain">
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>


                            <div class="slideactive bhoechie-tab-content " >
                               
                               
                              
                                  <?php foreach ($adv as $course): ?>
                              
                                <div class="col-sm-12 sideboxmid wow fadeInUp hrefside" onclick="location.href = '<?=URL?>/advices/details/<?=$course['id']?>'" data-wow-duration="1s">
                                    <div class="col-sm-7">
                                        <h3 class="colorycarsiz"><?= $course['name']  ?></h3>
                                    </div>
                                    <div class="col-sm-5 mbr-figure smallscreenpos sidpicnpd">
                                        <img src="<?= URL ?>library/advice/<?= $course['id']?>/umphotos/<?= $course['photo']?>" class="mbr-figure__img picsizmain">
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>


                    </div>
                </div>-->