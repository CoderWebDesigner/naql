<?php
  //debug($owner);

   $ownerid = $owner[0]["id"];
   $user_id = $owner[0]["user_id"];
?>
<main>
    <div class="container">
        <div class="row">
            <div class="owner-profile">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active col-xs-4 text-center tabsBtn">
                        <a href="#editMyData" aria-controls="editMyData" role="tab" data-toggle="tab" id="editDataBtn">Edit Data</a>
                    </li>
                    <li role="presentation" class="col-xs-4 text-center tabsBtn">
                        <a href="#addNewEquip" aria-controls="addNewEquip" role="tab" data-toggle="tab" id="addMachineBtn">Add New Machine </a>
                    </li>
                    <li role="presentation" class="col-xs-4 text-center tabsBtn">
                        <a href="#myEquips" aria-controls="myEquips" role="tab" data-toggle="tab" id="myMachinesBtn">My Machines</a>
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
                                    <input type="text" class="form-control" id="ownerUserName" placeholder="User Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-label col-sm-1 col-xs-2">
                                    <img src="<?=URL?>img/icon/letter.png" alt="">
                                </div>
                                <div class="col-sm-11 col-xs-10">
                                    <input type="email" class="form-control" id="ownerEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-label col-sm-1 col-xs-2">
                                    <img src="<?=URL?>img/icon/mobile_phone.png" alt="" style="width: 34px;">
                                </div>
                                <div class="col-sm-11 col-xs-10">
                                    <input type="text" class="form-control" id="ownerPassword" placeholder="Phone ">
                                </div>
                            </div>
                            <div class="form-group" style="background: transparent">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button class="btn btn-default regist-owner center-block col-xs-8 col-sm-push-1 col-xs-push-2 update">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="addNewEquip" style="margin-top: 30px;">
                        <div class="panel panel-default" id="equipPanel">
                            <div class="panel-body">
                                <div id="equipService"></div>
                                <div class="clearfix"></div>
                                <button class="btn btn-default next custom-btn center-block"> Next</button>
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
                                                    <option selected disabled>Select Type</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-icon col-md-2 col-xs-3">
                                                <img src="<?=URL?>img/street-map.png" alt="">
                                            </div>
                                            <div class="form-element col-md-10 col-xs-9">
                                                <select class="form-control" id="selectArea" required>
                                                    <option selected disabled>Select Area</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-icon col-sm-2 col-xs-3">
                                            <img src="<?=URL?>img/icon/groupcars.jpg" alt="">
                                            </div>
                                            <div class=" col-sm-10 col-xs-9">
                                                <input type="number" class="form-control" placeholder="Cars Count" id="ownerCars">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-icon col-sm-2 col-xs-3">
                                                <img src="<?=URL?>img/icon/4f007748-d53c-4917-81a0-b38de46fd515.jpg" alt="">
                                            </div>
                                            <div class=" col-sm-10 col-xs-9">
                                                <label style="cursor: pointer;margin-top: 16px;">Machine Photos</label>
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
                                            <textarea class="form-control" rows="5" id="description" placeholder="Description"></textarea>
                                        </div>
                                        <button class="btn btn-default center-block custom-btn" id="reserve">
                                            <a href="#myEquips" aria-controls="myEquips" role="tab" data-toggle="tab" id="myMachinesBtn">Reservation</a>
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
<script>
    $(document).ready(function () {
        var IDQuery = <?=$user_id ?>,
            OwnerId = <?=$ownerid?>,
            ownerKindSelect = document.getElementById("selectType"),
            ownerAreaSelect = document.getElementById("selectArea"),
            listOwnerEquip = document.getElementsByClassName("my-equip")[0],
            inputLocalFont = document.getElementById("ownerSelectImgs"),
            imgsArray = new Array();

        //Hide Reservation Section & Next Btn
        $('#reservationForm').hide();
        $('.next').hide();
        $('#preview-area').hide();
        $('.postLoading').hide();
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
                                    <strong>Updated Successfully </strong>\
                                </div>"
                    );
                    setTimeout(function () {
                        $('.alert').fadeOut(500)
                    }, 3000);

                }
            })
        });

        //List Machines
        $('#addMachineBtn').on('click', function () {
             //Empty Input Fields
             $('#ownerCars').val('');
             $('#description').val('');
             $('#preview-area').hide();
            //Onclick on Next Btn show Reservation Section & Hide Machines List Section
            $('#equipPanel').show();
            $('#reservationForm').hide();
            $('#preview-area').empty();

            $(function() {
              // Multiple images preview in browser
              var imagesPreview = function(input, placeToInsertImagePreview) {

                  if (input.files) {
                      var filesAmount = input.files.length;

                      for (i = 0; i < filesAmount; i++) {
                          var reader = new FileReader();
                          reader.onload = function(event) {
                            $('#preview-area').empty();
                              $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                              $('#preview-area').show();
                          }

                          reader.readAsDataURL(input.files[i]);
                      }
                  }

              };

              $('#ownerSelectImgs').on('change', function() {
                  imagesPreview(this, '#preview-area');
              });
          });
            //List Machines
            $.ajax({
                url: "http://localhost/naql/api/machines.json",
                type: "GET",
                accept: "application/json",
                success: function (result) {
                    $("#equipService").empty()
                    $.each(result, function (h, val) {
                        for (h in val) {
                            document.getElementById('equipService').innerHTML +=
                                "<div class='col-md-4 col-sm-6 equip'  id='" +
                                val[h].id +
                                "' location='" + val[h].location + "' nme=" +
                                val[h].name_en +
                                " >\
                                    <div class='row'>\
                                        <div class='icon'>\
                                            <img src=' http://localhost/naql/library/machine/" +
                                val[h].photo +
                                "' alt='' class='center-block'>\
                                        </div>\
                                    </div>\
                                    <div class='row'>\
                                        <div class='title text-center'>\
                                            <h3>" +
                                val[h].name_en +
                                "</h3>\
                                        </div>\
                                    </div>\
                            </div>";
                        }
                    });
                    /*           ### on Choose Machine ###
                     ** Set Machine Id in Local Storage
                     ** remove class Clicked from previous Machine selected & add it to currently selected machine
                     ** show next Btn
                     */

                    $('.equip').on('click', function () {
                        //Set  Machine Id
                        localStorage.removeItem("machineId");
                        localStorage.setItem('machineId', $(this).attr("id"));
                        console.log('add machine Id '+localStorage.getItem('machineId'));
                        //Clicked Machine Class
                        $('.equip.clicked').removeClass('clicked');
                        $(this).attr("class", "col-md-4 col-sm-6 equip clicked");
                        //Show Next Btn
                        $(".next").show();
                        $.ajax({
                                url: "http://localhost/naql/api/machineDetails/subCat/" +
                                    localStorage.getItem('machineId') + ".json",
                                type: "GET",
                                accept: "application/json",
                                success: function (result) {
                                    $('#selectType').html(
                                        "<option selected disabled>Select Type</option>"
                                    );
                                    for (var type = 0; type < result.data.length; type++) {
                                        $('#selectType').append(
                                            "<option opt='type" + type +
                                            "' " +
                                            "value=" + result.data[type]
                                            .name_en + " " +
                                            "detail-id=" + result.data[
                                                type].id + " " +
                                            "onchange='showOptions(this)' class='option'>" +
                                            result.data[type].name_en +
                                            " </option>");
                                    }
                                }
                            });
                            //Show Areas
                            $.ajax({
                                url: "http://localhost/naql/api/areas.json",
                                type: "GET",
                                accept: "application/json",
                                success: function (result) {
                                    $('#selectArea').html(
                                        "<option  selected disabled>Select Area</option>"
                                    );
                                    for (var area = 0; area < result.data.length; area++) {
                                        $('#selectArea').append(
                                            "<option opt='area" + area +
                                            "' " +
                                            "value=" + result.data[area]
                                            .name_en + " " +
                                            "id=" + result.data[area].id +
                                            " " +
                                            "onchange='showOptions(this)' class='option'>" +
                                            result.data[area].name_en +
                                            " </option>");
                                    }
                                }
                            });

                    });
                    //list Machine Types
                    console.log('current machine Id '+localStorage.getItem('machineId'));

                    // /*     #### Onclick on next Btn ###

                    //   ** hide equipPanel Section
                    //   ** show reservationForm
                    //   ** hide next btn
                    //   ** list Machines Types
                    //   ** List Area

                    // */
                    $('.next').on('click', function () {
                        $('#equipPanel').fadeOut(800);
                        $('#reservationForm').fadeIn(1000);
                        $(this).hide();
                    });

                    //Send Equip Data
                    $('#reserve').on('click', function (e) {
                        //validation
                        if ($('#ownerCars').val() === '' || $('#selectType').val() ===
                            '' || $('#selectArea').val() === '' || $(
                                '#ownerSelectImgs').val() === '' || $(
                                '#description').val() ===
                            '') {
                            $('.form').prepend(
                                "<div class='alert alert-danger'>Enter Required Data</div>"
                            );
                            setTimeout(function () {
                                $('.alert').fadeOut(500);
                            }, 3000);
                        } else {

                            $.ajax({
                                url: "http://localhost/naql/api/MachineOwners/machineProfile/" +
                                        OwnerId + ".json",
                                    type: "GET",
                                    accept: "application/json",
                                    success: function (response) {
                                        $('.postLoading').show();
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
                                                formdata.append("machine_detail_id", parseInt($(
                                                    '#selectType').find(
                                                    'option:selected').attr(
                                                    'detail-id')));
                                                formdata.append("machine_id", localStorage.getItem(
                                                    'machineId'));
                                                formdata.append("count", parseInt($('#ownerCars').val()));
                                                formdata.append("area_id", parseInt($('#selectArea')
                                                    .find('option:selected').attr('id')
                                                ));
                                                formdata.append("description", $('#description').val());
                                                $.ajax({
                                                    url: "http://localhost/naql/api/machine_owners/add/" +
                                                        IDQuery + ".json",
                                                    type: "POST",
                                                    data: formdata,
                                                    accept: "application/json",
                                                    processData: false,
                                                    contentType: false,
                                                    success: function (result) {
                                                        $('.postLoading').hide();
                                                        console.log(result.chkAddNewMachine.length)
                                                        if(result.chkAddNewMachine.length != 0){
                                                            $('.form').prepend(
                                                            '<div class="alert alert-success">\
                                                                <strong>Machine Already Exists</strong>\
                                                            </div>');
                                                            setTimeout(function () {
                                                                $('.alert').fadeOut(300);
                                                            }, 3000);
                                                        }else{
                                                            //Active My Machines Tab Btn
                                                            $('.tabsBtn.active').removeClass(
                                                                'active');
                                                            $('.tabsBtn:eq( 2 )').addClass(
                                                                "active");
                                                            //Active My Machines Tab Content
                                                            $('#addNewEquip').removeClass(
                                                                "active in");
                                                            $('#myEquips').addClass('active in');
                                                            $.ajax({
                                                                url: "http://localhost/naql/api/MachineOwners/machineProfile/" +
                                                                    OwnerId + ".json",
                                                                type: "GET",
                                                                accept: "application/json",
                                                                success: function (response) {
                                                                    $('#myEquips').empty();
                                                                    for (var m = 0; m < response.data.length; m++) {
                                                                        $('#myEquips').append(
                                                                            "\
                                                                            <div class='panel panel-default machine' id='machine" +
                                                                            parseInt(m) +
                                                                            "' style='width: 97%;height: 150px;margin: 40px auto;'>\
                                                                                        <div class='panel-body'>\
                                                                                            <div class='my-equip_img col-xs-4'>\
                                                                                                <img src='http://localhost/naql/library/machine/" +
                                                                            response.data[m].machine_detail.machine_photo +
                                                                            "' alt='' style='width:127px;height:127px;'>\
                                                                                            </div>\
                                                                                            <div class='my-equip_title col-xs-6'>\
                                                                                                <h4>" +
                                                                            response.data[m].machine_detail.name_en +
                                                                            "</h4>\
                                                                                            </div>\
                                                                                            <div class='my-equip_buttons col-xs-2'>\
                                                                                                <button class='btn btn-default edit-equip' style='width:40px' id=" +
                                                                            response.data[m].id +
                                                                            ">\
                                                                                                    <img src='<?=URL?>img/icon/edit.png' style='width: 120%' alt=''>\
                                                                                                </button>\
                                                                                                <button class='btn btn-default delete-equip' style='width:40px' id=" +
                                                                            response.data[m].id +
                                                                            ">\
                                                                                                    <img src='<?=URL?>img/icon/delete.png' style='width: 120%' alt=''>\
                                                                                                </button>\
                                                                                            </div>\
                                                                                        </div>\
                                                                                    </div>"
                                                                        );
                                                                    }
                                                                    //Send Machine ID To page Edit Machine
                                                                    $('.edit-equip').on('click', function (e) {
                                                                        localStorage.setItem("currentMachineId", $(this).attr('id'));

                                                                        window.open("<?=URL?>Machines/machinesediten", "_self");

                                                                    });

                                                                    //Delete Machine
                                                                    $('.delete-equip').on('click', function () {

                                                                        $('.postLoading').show();
                                                                        $(this).closest('.panel').fadeOut(500);
                                                                        $('.my-equip').prepend(
                                                                            '<div class="alert alert-success">\
                                                                                        <strong>Machine Deleted Successfully</strong>\
                                                                                    </div>'
                                                                        );
                                                                        setTimeout(function () {
                                                                            $('.alert').fadeOut(300);
                                                                        }, 3000);


                                                                        $.ajax({
                                                                            url: "http://localhost/naql/api/machine_owners/delete/" +
                                                                                $(this).attr("id") + ".json",
                                                                            type: "POST",
                                                                            accept: "application/json",
                                                                            success: function (result) {
                                                                                $('.postLoading').hide();
                                                                            }

                                                                        });
                                                                    });
                                                                }

                                                            });
                                                        }
                                                    }
                                                });
                                    }
                            });


                        }
                    });
                }
            });

        });

        /* On click on myMachineBtn
         **empty Previous Listed Machines
         **list current Owner's machines
         **edit Machine
         **delete Machine
         */

        $('#myMachinesBtn').on('click', function () {
            $.ajax({
                url: "http://localhost/naql/api/MachineOwners/machineProfile/" +
                    OwnerId + ".json",
                type: "GET",
                accept: "application/json",
                success: function (response) {
                    $('#myEquips').empty();
                    for (var m = 0; m < response.data.length; m++) {
                        $('#myEquips').append(
                            "\
                            <div class='panel panel-default machine' id='machine" +
                            parseInt(m) +
                            "' style='width: 97%;height: 150px;margin: 40px auto;'>\
                                        <div class='panel-body'>\
                                            <div class='my-equip_img col-xs-4'>\
                                                <img src='http://localhost/naql/library/machine/" +
                            response.data[m].machine_detail.machine_photo +
                            "' alt='' style='width:127px;height:127px;'>\
                                            </div>\
                                            <div class='my-equip_title col-xs-6'>\
                                                <h4>" +
                            response.data[m].machine_detail.name_en +
                            "</h4>\
                                            </div>\
                                            <div class='my-equip_buttons col-xs-2'>\
                                                <button class='btn btn-default edit-equip' style='width:40px' id=" +
                            response.data[m].id +
                            ">\
                                                    <img src='<?=URL?>img/icon/edit.png' style='width: 120%' alt=''>\
                                                </button>\
                                                <button class='btn btn-default delete-equip' style='width:40px' id=" +
                            response.data[m].id +
                            ">\
                                                    <img src='<?=URL?>img/icon/delete.png' style='width: 120%' alt=''>\
                                                </button>\
                                            </div>\
                                        </div>\
                                    </div>"
                        );
                    }
                    //Send Machine ID To page Edit Machine
                    $('.edit-equip').on('click', function (e) {
                        localStorage.setItem("currentMachineId", $(this).attr('id'));

                        window.open("<?=URL?>Machines/machinesediten", "_self");

                    });

                    //Delete Machine
                    $('.delete-equip').on('click', function () {

                        $('.postLoading').show();
                        $(this).closest('.panel').fadeOut(500);
                        $('#myEquips').prepend(
                            '<div class="alert alert-success">\
                                <strong>Machine Deleted Successfully</strong>\
                            </div>'
                        );
                        setTimeout(function () {
                            $('.alert').fadeOut(300);
                        }, 3000);


                        $.ajax({
                            url: "http://localhost/naql/api/machine_owners/delete/" +
                                $(this).attr("id") + ".json",
                            type: "POST",
                            accept: "application/json",
                            success: function (result) {
                                $('.postLoading').hide();
                            }

                        });
                    });
                }

            });
        });

    });
</script>
