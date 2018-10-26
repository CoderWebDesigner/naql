var IDQuery = localStorage.getItem("UserId"),
    ownerKindSelect = document.getElementById("selectType"),
    ownerAreaSelect = document.getElementById("selectArea"),
    listOwnerEquip = document.getElementsByClassName("my-equip")[0],
    inputLocalFont = document.getElementById("ownerSelectImgs"),
    URL = 'http://localhost/naql/',
    imgsArray = new Array();

$(document).attr("title", "اختر معدتك");

//Hide Reservation Section & Next Btn
$('#reservationForm,.next,.preview-area,.postLoading').hide();

$(function () {
    // Multiple images preview in browser
    var imagesPreview = function (input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function (event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#ownerSelectImgs').on('change', function () {
        imagesPreview(this, '.preview-area');
        $('.preview-area').show();
        $('.preview-area').empty();
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
                    val[h].name +
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
                    val[h].name +
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
            localStorage.setItem('machineId', $(this).attr("id"));
            //Clicked Machine Class
            $('.equip.clicked').removeClass('clicked');
            $(this).attr("class", "col-md-4 col-sm-6 equip clicked");
            //Show Next Btn
            $(".next").show();

        });
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
            //list Machine Types
            $.ajax({
                url: "http://localhost/naql/api/machineDetails/subCat/" +
                    localStorage.getItem('machineId') + ".json",
                type: "GET",
                accept: "application/json",
                success: function (result) {
                    $('#selectType').html(
                        "<option selected disabled>اختر الدنيا المطلوبة</option>"
                    );
                    for (var type = 0; type < result.data.length; type++) {
                        $('#selectType').append(
                            "<option opt='type" + type +
                            "' " +
                            "value=" + result.data[type]
                            .name + " " +
                            "detail-id=" + result.data[
                                type].id + " " +
                            "onchange='showOptions(this)' class='option'>" +
                            result.data[type].name +
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
                        "<option  selected disabled>اختر المنطقة</option>"
                    );
                    for (var area = 0; area < result.data.length; area++) {
                        $('#selectArea').append(
                            "<option opt='area" + area +
                            "' " +
                            "value=" + result.data[area]
                            .name + " " +
                            "id=" + result.data[area].id +
                            " " +
                            "onchange='showOptions(this)' class='option'>" +
                            result.data[area].name +
                            " </option>");
                    }
                }
            });
        });

        //Send Equip Data
        $('#reserve').on('click', function (e) {
            //validation
            var empty = $('.form').find(".form-control").filter(function () {
                return this.value === "";
            });
            if (empty.length) {
                $('.form').prepend(
                    "<div class='alert alert-danger'>ادخل البيانات المطلوبة</div>"
                );
                setTimeout(function () {
                    $('.alert').fadeOut(500);
                }, 3000);
            } else {
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
                        window.open(URL + 'login', '_self');
                    }
                });
            }
        });
    }
});