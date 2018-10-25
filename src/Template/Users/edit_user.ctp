<?php
  //debug($owner);

   $ownerid = $owner[0]["id"];
   $user_id = $owner[0]["user_id"];
?>
 <main>
      <div class="ownerForm">
            <div class="container">
                <!------   ------>
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
    <script>
var IDQuery = <?=$user_id ?>,
    OwnerId = <?=$ownerid?>;
            //Get Owner Data
            $.ajax({
            url: "http://localhost/naql/api/users/views/" + IDQuery + ".json",
            type: "GET",
            accept: "application/json",
            success: function (result) {
                $("#ownerUserName").val(result.user.username);
                $("#ownerEmail").val(result.user.email);
                $("#ownerPassword").val(result.user.mobile);
                $('.profileImg').attr('src', 'http://localhost/naql/library/profile/' +
                    result.user.photo);
            }
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.profileImg').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#userUploadImg").change(function () {
            readURL(this);
        });

        //Update Onwer Data
        $(".update").on("click", function () {
            $('.postLoading').show();
            var formdata = new FormData();
            if($('#userUploadImg').val() !=''){
                var file = $("#userUploadImg")[0].files[0],
                    reader;
                if (!!file.type.match(/image.*/)) {

                }

                if (window.FileReader) {
                    reader = new FileReader();
                    reader.onloadend = function (e) {
                        //   showUploadedItem(e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
                if (formdata) {
                    formdata.append("photo", file);
                }
            }

            formdata.append("username", $("#ownerUserName").val());
            formdata.append("email", $("#ownerEmail").val());
            formdata.append("mobile", $("#ownerPassword").val());
            $.ajax({
                url: "http://localhost/naql/api/users/edit/" + IDQuery + ".json",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                accept: "application/json",
                success: function () {
                    $('.postLoading').hide();
                    $('#ownerFrm').prepend(
                        "\
                                <div class = 'alert alert-success'>\
                                    <strong> تم التعديل بنجاح </strong>\
                                </div>"
                    );
                    setTimeout(function () {
                        $('.alert').fadeOut(500)
                    }, 3000);

                }
            })
        });
</script>