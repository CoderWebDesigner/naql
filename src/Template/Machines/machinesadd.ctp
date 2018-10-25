<main>
        <div class="container">
            <div class="row">
                <div class="owner-profile">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active col-xs-4 text-center">
                            <a href="#editMyData" aria-controls="editMyData" role="tab" data-toggle="tab">تعديل بياناتي</a>
                        </li>
                        <li role="presentation" class="col-xs-4 text-center">
                            <a href="#addNewEquip" aria-controls="addNewEquip" role="tab" data-toggle="tab">اضافة معدة جديدة</a>
                        </li>
                        <li role="presentation" class="col-xs-4 text-center">
                            <a href="#myEquips" aria-controls="myEquips" role="tab" data-toggle="tab">معداتي</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="editMyData" style="margin-top: 30px;">
                            <!--Owner Img-->
                            <div class="owner-icon">
                                <img src="img/icon/download.png" alt="" class="img-responsive center-block">
                            </div>
                            <!--Owner Form-->
                            <div class="form-horizontal" id="ownerFrm">
                                <div class="form-group">
                                    <div class="control-label col-sm-1 col-xs-2">
                                        <img src="img/icon/train-driver-icon-cartoon-style-vector-10970857.png" alt="">
                                    </div>
                                    <div class="col-sm-11 col-xs-10">
                                        <input type="text" class="form-control" id="ownerUserName" placeholder="اكتب اسم المستخدم">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="control-label col-sm-1 col-xs-2">
                                        <img src="img/icon/letter.png" alt="">
                                    </div>
                                    <div class="col-sm-11 col-xs-10">
                                        <input type="email" class="form-control" id="ownerEmail" placeholder="اكتب البريد الالكتروني">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="control-label col-sm-1 col-xs-2">
                                        <img src="img/icon/Graphicloads-Colorful-Long-Shadow-Lock.png" alt="">
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
                                    <button class="btn btn-default next center-block"> التالي</button>
                                </div>
                            </div>
                            <div id="moreService">
                                <div class="form-horizontal" id="ownerFrm">
                                    <div class="form-group" style="height: 50px;">
                                        <div class="form-icon col-md-2 col-xs-2">
                                            <img src="img/0bff8b3c6c8bb49aa111be8bfa65bef8.png" alt="" style="margin-top: 10px;">
                                        </div>
                                        <select class="form-control col-md-9 col-xs-10" id="select-kind-Owner" name="kind" required>
                                            <option selected disabled>اختر النوع الدنيا المطلوبة</option>
                                        </select>
                                    </div>
                                    <div class="form-group" style="height: 50px;">
                                        <div class="form-icon col-md-2 col-xs-2">
                                            <img src="img/street-map.png" alt="" style="margin-top: 10px;">
                                        </div>
                                        <select class="form-control col-md-9 col-xs-10" id="select-area-owner" name="kind" required>
                                            <option selected disabled>اختر المنطقة</option>
                                        </select>
                                    </div>
                                    <div class="form-group" style="height: 50px;">
                                        <div class="form-icon col-md-2 col-xs-2">
                                            <img src="<?=URL?>img/icon/groupcars.jpg" alt="">
                                        </div>
                                        <div class="form-control col-md-9 col-xs-10">
                                            <input type="number" placeholder="ادخل عدد السيارات" id="ownerCars" style="width: 100%;border: 0;outline: 0">
                                        </div>
                                    </div>
                                    <div class="form-group" style="height: 50px;">
                                        <div class="form-icon col-md-2 col-xs-2">
                                            <img src="img/icon/4f007748-d53c-4917-81a0-b38de46fd515.jpg" alt="" style="margin-top: 10px;">
                                        </div>
                                        <div class="form-control col-md-9 col-xs-10">
                                            <label style="cursor: pointer;margin-top: 8px;">ادخل صورة المعدة</label>
                                            <input type="file" style="
                                                        width: 100%;
                                                        border: 0;
                                                        outline: 0;
                                                        opacity: 0;
                                                        position: absolute;
                                                        margin-top: -27px;" class="form-control" multiple id="ownerSelectImgs">
                                        </div>
                                    </div>
                                    <!-- Show Images -->
                                    <div class="preview-area col-md-10 col-xs-9" style="background: #fff;margin-bottom: 15px;width: 100%"></div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <div class="form-icon col-md-2 col-xs-3">
                                        </div>
                                        <div class="col-md-9 col-xs-10" style="padding:0">
                                            <textarea rows="5" class="form-control" placeholder="اكتب نبذة عنك لتصل الي العملاء" style="width: 100%;outline: 0" id="ownerDescription"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group" style="background: transparent">
                                        <div class="col-sm-push-1 col-sm-11">
                                            <button class="btn btn-default regist-owner center-block next2">التالي</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="loading" style="width: 100px;height: 100px;">
                                    <img scr='https://www.urbanears.com.tw/lazyweb/loading-1.gif' width="100%">
                                </div>
                            </div>
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
    <script src="js/bootstrap.min.js"></script>
    <script>
        //Add New Equip Tab

        /**
         * Get the value of a querystring
         * @param  {String} field The field to get the value of
         * @param  {String} url   The URL to get the value from (optional)
         * @return {String}       The field value
         */
        var getQueryString = function (field, url) {
            var href = url ? url : window.location.href;
            var reg = new RegExp('[?&]' + field + '=([^&#]*)', 'i');
            var string = reg.exec(href);
            return string ? string[1] : null;
        };
        var IDQuery = localStorage.getItem("id"),//getQueryString('id'),
            OwnerId = localStorage.getItem("ownerId"),//getQueryString("ownerID"),
            ownerKindSelect = document.getElementById("select-kind-Owner"),
            ownerAreaSelect = document.getElementById("select-area-owner"),
            listOwnerEquip = document.getElementsByClassName("my-equip")[0];
        $('#moreService').hide();
        $(document).ready(function () {
            $('.next').hide();
            $('.next').on('click', function () {
                $('#equipPanel').fadeOut(800);
                $('#moreService').fadeIn(1000);
                $(this).hide();
            });

            //Get Owner Data
            $.ajax({
                url: "http://localhost/naql/api/users/views/" + IDQuery + ".json",
                type: "GET",
                accept: "application/json",
                success: function (result) {
                    $("#ownerUserName").val(result.user.username);
                    $("#ownerEmail").val(result.user.email);
                    $("#ownerPassword").val(result.user.mobile);

                }
            });

            //Send Updated Owner Data
            $(".update").on("click", function () {

                $.ajax({
                    url: "http://localhost/naql/api/users/edit/" + IDQuery + ".json",
                    type: "POST",
                    data: {
                        'username': $("#ownerUserName").val(),
                        'email': $("#ownerEmail").val(),
                        'mobile': $("#ownerPassword").val()
                    },
                    accept: "application/json",
                    success: function (e) {
                        $('#ownerFrm').prepend(
                            "\
                            <div class = 'alert alert-success'>\
                                <strong> تم التعديل بنجاح </strong>\
                            </div>"
                        );
                        setTimeout(function () {
                            $('.alert').fadeOut(500)
                        }, 3000);

                    },
                    error: function (xhr, textStatus, error) {
                        console.log(xhr.textStatus);
                        console.log(textStatus);
                        console.log(error)
                    }
                })
            });
            //List machines
            $.ajax({
                url: "http://localhost/naql/api/machines.json",
                type: "GET",
                accept: "application/json",
                success: function (result) {
                    $.each(result, function (h, val) {
                        for (h in val) {
                            document.getElementById('equipService').innerHTML +=
                                "<div class='col-md-4 col-sm-6 equip'  id='" + val[
                                    h].id +
                                "' location='" + val[h].location + "' nme=" + val[h]
                                .name +
                                " >\
                                <div class='icon'>\
                                    <img src=' http://localhost/naql/library/machine/" +
                                val[h].photo +
                                "' alt='' class='center-block'>\
                                </div>\
                                <div class='title text-center'>\
                                    <h3>" +
                                val[h].name +
                                "</h3>\
                                </div>\
                            </div>";
                        }
                    });
                    //Show Areas
                    $.ajax({
                        url: "http://localhost/naql/api/areas.json",
                        type: "GET",
                        accept: "application/json",
                        success: function (data) {
                            $.each(data, function (k, area) {
                                for (k in area) {
                                    ownerAreaSelect.innerHTML +=
                                        "<option value=" + area[k].name +
                                        " id=" + area[k].id +
                                        " onchange='showOptions(this)'>" +
                                        area[k].name + "</option>";
                                }
                            })
                        }
                    });


                    $('.equip').one('click', function () {
                        localStorage.setItem("machine_id", this.id);
                        $(this).attr("class", "col-md-4 col-sm-6 equip clicked");
                        $(".next").show();
                        $.ajax({
                            url: "http://localhost/naql/api/machineDetails/subCat/" +
                                $(this).attr("id") + ".json",
                            type: "GET",
                            accept: "application/json",
                            success: function (result) {
                                $.each(result, function (j, equip) {
                                    for (var j in equip) {
                                        ownerKindSelect.innerHTML +=
                                            "<option value=" +
                                            equip[j]
                                            .name +
                                            " detail-id=" +
                                            equip[j].id +
                                            ">" +
                                            equip[j].name +
                                            "</option>";
                                    }
                                })
                            }
                        });

                        //Send Equip Data
                        $('.next2').on('click', function (e) {

                            if ($('#select-kind-Owner').val() === '' || $(
                                    '#select-area-owner').val() === '' ||
                                $('#ownerCars').val() === '' || $(
                                    '#ownerSelectImgs').val() === '') {
                                $('#moreService').prepend(
                                    "\
                            <div class = 'alert alert-danger'>\
                                <strong> خطأ! </strong> ادخل البيانات المطلوبة. \
                            </div>"
                                );
                                setTimeout(function () {
                                    $('.alert').fadeOut(500)
                                }, 3000)
                            } else {
                                var formdata = new FormData();
                                var i = 0,
                                    len = $("#ownerSelectImgs")[0].files.length,
                                    img, reader, file;
                                for (; i < len; i++) {
                                    file = $("#ownerSelectImgs")[0].files[i];

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
                                        formdata.append("photo[]", file);
                                    }

                                }
                                //Local Storage
                                localStorage.setItem("machine_detail_id", parseInt(
                                    $(
                                        '#select-kind-Owner').find(
                                        'option:selected').attr(
                                        'detail-id')));
                                formdata.append("machine_detail_id", parseInt($(
                                    '#select-kind-Owner').find(
                                    'option:selected').attr(
                                    'detail-id')));
                                formdata.append("machine_id", $(this).attr('id'));
                                formdata.append("count", parseInt($('#ownerCars').val()));
                                formdata.append("area_id", parseInt($(
                                        '#select-area-owner')
                                    .find('option:selected').attr('id')
                                ));
                                formdata.append("description", $(
                                    '#ownerDescription').val());

                                //      fr = new FileReader();
                                //      fr.onload = receivedText;
                                //      //fr.readAsText(file);
                                //      fr.readAsDataURL(file);
                                //      console.log(fr)


                                $("#OwnerId").value = $(this).attr('id');
                                $.ajax({
                                    url: "http://localhost/naql/api/machine_owners/add/" +
                                        IDQuery + ".json",
                                    type: "POST",
                                    data: formdata,
                                    accept: "application/json",
                                    processData: false,
                                    contentType: false,

                                    success: function (result) {
                                        $('.msg').hide();
                                        console.log(result)
                                    }
                                });

                            }

                        });
                        //show Selected Images 
                        var inputLocalFont = document.getElementById("ownerSelectImgs"),
                            imgsArray = new Array();
                        $('.preview-area').hide();
                        inputLocalFont.addEventListener("change", previewImages, false); //bind the function to the input

                        function previewImages() {
                            var fileList = this.files;
                            imgsArray.push(fileList);

                            var anyWindow = window.URL || window.webkitURL;
                            $('.preview-area').show();
                            for (var i = 0; i < fileList.length; i++) {
                                imgsArray.push(fileList)
                                //get a blob to play with
                                var objectUrl = anyWindow.createObjectURL(fileList[i]);
                                // for the next line to work, you need something class="preview-area" in your html

                                $('.preview-area').append('<img src="' + objectUrl + '" />');
                                // get rid of the blob
                                window.URL.revokeObjectURL(fileList[i]);
                                // console.log(imgsArray)
                            }

                        }
                    });
                }

            });
            //List Owner Machines
            $.ajax({
                url: "http://localhost/naql/api/MachineOwners/machineProfile/" + OwnerId + ".json",
                type: "GET",
                accept: "application/json",
                success: function (response) {
                    console.log(response)
                    $.each(response, function (i, myEquip) {
                        for (i in myEquip) {
                            listOwnerEquip.innerHTML +=
                                "<div class='panel panel-default'>\
                                    <div class='panel-body'>\
                                        <div class='my-equip_img col-xs-4'>\
                                            <img src='http://localhost/naql/library/machine/" +
                                myEquip[i].machine_detail.machine_photo +
                                "' alt=''>\
                                        </div>\
                                        <div class='my-equip_title col-xs-6'>\
                                            <h4>" +
                                myEquip[i].machine_detail.name +
                                "</h4>\
                                        </div>\
                                        <div class='my-equip_buttons col-xs-2'>\
                                            <button class='btn btn-default edit-equip' style='width:50px' id=" +
                                myEquip[i].id +
                                ">\
                                                <img src='img/icon/edit.png' style='width: 100%' alt=''>\
                                            </button>\
                                            <button class='btn btn-default delete-equip' style='width:50px' id=" +
                                myEquip[i].id +
                                ">\
                                                <img src='img/icon/delete.png' style='width: 100%' alt=''>\
                                            </button>\
                                        </div>\
                                    </div>\
                                </div>";

                        }

                    });

                    //Send Machine ID To page Edit Machine
                    // Store
                    //localStorage.setItem("ownerId", OwnerId);
                    
                    $('.edit-equip').on('click', function () {
                        // window.open("editMachine.html?id=" + IDQuery + "&ownerId=" +
                        //     OwnerId + "&machineId=" + $(this).attr('id'), "_self");
                        localStorage.setItem("machineId",$(this).attr('id'))
                        window.open("editMachine.html","_self");
                    });

                    //Delete Machine 
                    $('.delete-equip').on('click', function () {
                        $(this).closest('.panel').fadeOut(500);
                        $('.my-equip').prepend(
                            '<div class="alert alert-success">\
                                    <strong>تم مسح المنتج بنجاح !</strong>\
                                 </div>'
                        );
                        setTimeout(function () {
                            $('.alert').fadeOut(300);
                        }, 2000);


                        $.ajax({
                            url: "http://localhost/naql/api/machine_owners/delete/" +
                                $(this).attr("id") + ".json",
                            type: "POST",
                            accept: "application/json",
                            success: function (result) {
                                //console.log(result)
                            }

                        });
                    });
                }

            });

        });
    </script>
</body>

</html>
