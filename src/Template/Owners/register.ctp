    <!-- End Nav-->
    <main>
        <div class="ownerForm">
            <div class="container">
                <div class="row">
                    <!--Owner Form-->
                    <div class="form-horizontal" id="ownerFrm">
                        <!--Owner Img-->
                        <div class="owner-icon" style="width: 150px; height:150px;margin: 0 auto;border:5px solid #ffffff85;border-radius: 50%;position:relative">
                            <img src="<?=URL?>img/icon/download.png" alt="" class="img-responsive center-block profileImg">
                            <input type="file" id="userUploadImg" hidden class="form-control">
                        </div>
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
                                <img src="<?=URL?>img/icon/mobile_phone.png" alt="" style="width:35px">
                            </div>
                            <div class="col-sm-11 col-xs-10">
                                <input type="text" class="form-control" id="mobile" placeholder="موبايل">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-sm-1 col-xs-2">
                                <img src="<?=URL?>img/icon/Graphicloads-Colorful-Long-Shadow-Lock.png" alt="">
                            </div>
                            <div class="col-sm-11 col-xs-10">
                                <input type="password" class="form-control" id="password" placeholder=" كلمة المرور">
                            </div>
                        </div>
                        <div class="form-group" style="background: transparent">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-default regist-owner center-block col-xs-8 col-sm-push-1 col-xs-push-2">تسجيل</button>
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
    <script src="<?=URL?>js/updated/ownerRegister.js"></script>
