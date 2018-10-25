<main>
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
                    <div class="preview-area col-md-10 col-xs-9" style="background: #fff;margin-bottom: 15px;width: 100%"></div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="description" placeholder="وصف"></textarea>
                    </div>
                    <button class="btn btn-default center-block custom-btn" id="reserve">
                        <a href="#myEquips" aria-controls="myEquips" role="tab" data-toggle="tab" id="myMachinesBtn">أضافة</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Reservation Form-->
</main>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=URL?>js/bootstrap.min.js"></script>
<!--  Custom Script -->
<script src="<?=URL?>js/updated/getMachineType.js"></script>
