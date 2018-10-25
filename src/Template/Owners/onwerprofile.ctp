<?php
  //debug($owner);

   $ownerid = $owner[0]["id"];
   $user_id = $owner[0]["user_id"];
?>
<main user-id='<?=$user_id ?>' owner-id='<?=$ownerid?>'>
    <div class="container">
        <div class="row">
            <div class="owner-profile">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active col-xs-4 text-center tabsBtn">
                        <a href="#editMyData" aria-controls="editMyData" role="tab" data-toggle="tab" id="editDataBtn">تعديل بياناتي</a>
                    </li>
                    <li role="presentation" class="col-xs-4 text-center tabsBtn">
                        <a href="#addNewEquip" aria-controls="addNewEquip" role="tab" data-toggle="tab" id="addMachineBtn">اضافة معدة جديدة</a>
                    </li>
                    <li role="presentation" class="col-xs-4 text-center tabsBtn">
                        <a href="#myEquips" aria-controls="myEquips" role="tab" data-toggle="tab" id="myMachinesBtn">معداتي</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="editMyData" style="margin-top: 30px;">
                        <!--Owner Img-->
                        <div class="owner-icon" style="width: 150px; height:150px;margin: 0 auto;border:5px solid #ffffff85;border-radius: 50%;position:relative">
                            <img src="" alt="" class="img-responsive center-block profileImg" style="
                            width: 100%;
                            height: 100%;
                            border-radius: 50%;
                            ">
                            <input type="file" id="userUploadImg" >
                        </div>
                        <!--Owner Form-->
                        <div class="form-horizontal" id="ownerFrm">
                            <div class="form-group">
                                <div class="control-label col-sm-1 col-xs-2">
                                    <img src="<?=URL?>img/icon/train-driver-icon-cartoon-style-vector-10970857.png" alt="">
                                </div>
                                <div class="col-sm-11 col-xs-10">
                                    <input type="text" class="form-control" id="ownerUserName" placeholder="اكتب اسم المستخدم">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-label col-sm-1 col-xs-2">
                                    <img src="<?=URL?>img/icon/letter.png" alt="">
                                </div>
                                <div class="col-sm-11 col-xs-10">
                                    <input type="email" class="form-control" id="ownerEmail" placeholder="اكتب البريد الالكتروني">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-label col-sm-1 col-xs-2">
                                    <img src="<?=URL?>img/icon/mobile_phone.png" alt="" style="width: 34px;">
                                </div>
                                <div class="col-sm-11 col-xs-10">
                                    <input type="text" class="form-control" id="ownerPassword" placeholder="اكتب رقم الهاتف ">
                                </div>
                            </div>
                            <div class="form-group" style="background: transparent">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button class="btn btn-default regist-owner center-block col-xs-8 col-sm-push-1 col-xs-push-2 update">ارسال</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="addNewEquip" style="margin-top: 30px;">
                        <div class="panel panel-default" id="equipPanel">
                            <div class="panel-body">
                                <div id="equipService"></div>
                                <div class="clearfix"></div>
                                <button class="btn btn-default next custom-btn center-block"> التالي</button>
                            </div>
                        </div>
                        <!-- Start Reservation Form-->
                        <div id="reservationForm">
                            <div class="container">
                                <div class="row">
                                    <div class="form-horizontal form">
                                        <div class="postLoading">
                                            <div class="loading-img">
                                                <img src="<?=URL?>img/gas-oil-truck-logistic-petroleum-transportation-car-tanker-metal-barrel-flat-vector-illustration-78344313.jpg"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-icon col-md-2 col-xs-3">
                                                <img src="<?=URL?>img/0bff8b3c6c8bb49aa111be8bfa65bef8.png" alt="">
                                            </div>
                                            <div class="form-element col-md-10 col-xs-9">
                                                <select class="form-control" id="selectType" required>
                                                    <option selected disabled>اختر النوع الدنيا المطلوبة</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-icon col-md-2 col-xs-3">
                                                <img src="<?=URL?>img/street-map.png" alt="">
                                            </div>
                                            <div class="form-element col-md-10 col-xs-9">
                                                <select class="form-control" id="selectArea" required>
                                                    <option selected disabled>اختر المنطقة</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-icon col-sm-2 col-xs-3">
                                            <img src="<?=URL?>img/icon/groupcars.jpg" alt="">
                                            </div>
                                            <div class=" col-sm-10 col-xs-9">
                                                <input type="number" class="form-control" placeholder="عدد السيارات" id="ownerCars">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-icon col-sm-2 col-xs-3">
                                                <img src="<?=URL?>img/icon/4f007748-d53c-4917-81a0-b38de46fd515.jpg" alt="">
                                            </div>
                                            <div class=" col-sm-10 col-xs-9">
                                                <label style="cursor: pointer;margin-top: 16px;">ادخل صورة المعدة</label>
                                                <input type="file" name="photo" style="
                                                    width: 100%;
                                                    border: 0;
                                                    outline: 0;
                                                    opacity: 0;
                                                    position: absolute;
                                                    margin-top: -27px;" class="form-control" multiple id="ownerSelectImgs">
                                            </div>

                                        </div>
                                        <div class=" col-md-10 col-xs-9" id="preview-area" style="background: #fff;margin-bottom: 15px;width: 100%"></div>
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" id="description" placeholder="وصف"></textarea>
                                        </div>
                                        <button class="btn btn-default center-block custom-btn" id="reserve">
                                            <a href="#myEquips" aria-controls="myEquips" role="tab" data-toggle="tab" id="myMachinesBtn">حجز</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Reservation Form-->
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="myEquips" style="margin-top: 30px;">
                        <div class="my-equip">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=URL?>js/bootstrap.min.js"></script>
<!--  Custom Script -->
<script src="<?=URL?>js/updated/ownerProfile.js"></script>