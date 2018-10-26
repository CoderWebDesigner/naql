var IDQuery = $('main').attr('user-id'),
    OwnerId = $('main').attr('owner-id'),
    ownerKindSelect = document.getElementById("selectType"),
    ownerAreaSelect = document.getElementById("selectArea"),
    listOwnerEquip = document.getElementsByClassName("my-equip")[0],
    inputLocalFont = document.getElementById("ownerSelectImgs"),
    URL = 'http://localhost/naql/',
    imgsArray = new Array();

$(document).attr("title", "الصفحة الشخصية");

//Hide Reservation Section & Next Btn
$('#reservationForm,.next,#preview-area,.postLoading').hide();



function getUserData() {
    //Get Owner Data
    $.ajax({
        url: `http://localhost/naql/api/users/views/${IDQuery}.json`,
        type: "GET",
        accept: "application/json",
        success: function (result) {
            $("#ownerUserName").val(result.user.username);
            $("#ownerEmail").val(result.user.email);
            $("#ownerPassword").val(result.user.mobile);
            $('.profileImg').attr('src', `http://localhost/naql/library/profile/${result.user.photo}`);
        }
    });
}
getUserData()

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.profileImg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$('.profileImg').on('click', function () {
    $("#userUploadImg").click();
})
$("#userUploadImg").change(function () {
    readURL(this);
});

function updateUserData() {
    $('.postLoading').show();
    var formdata = new FormData();
    if ($('#userUploadImg').val() != '') {
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
        url: `http://localhost/naql/api/users/edit/${IDQuery}.json`,
        type: "POST",
        data: formdata,
        processData: false,
        contentType: false,
        accept: "application/json",
        success: function () {
            $('.postLoading').hide();
            $('#ownerFrm').prepend(
                `
                <div class = 'alert alert-success'>
                    <strong> تم التعديل بنجاح </strong>
                </div>`
            );
            setTimeout(function () {
                $('.alert').fadeOut(500)
            }, 3000);
            getUserData()
        }
    })

}
$(function () {
    // Multiple images preview in browser
    var imagesPreview = function (input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function (event) {

                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    $('#preview-area').show();
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#ownerSelectImgs').on('change', function () {
        $('#preview-area').empty();
        imagesPreview(this, '#preview-area');
    });
});
function listMachines() {
    $.ajax({
        url: "http://localhost/naql/api/machines.json",
        type: "GET",
        accept: "application/json",
        success: function (result) {
            $("#equipService").empty();
            for (var i = 0; i < result.data.length; i++) {
                $('#equipService').append(`
                <div class='col-md-4 col-sm-6 equip' id='${result.data[i].id}' location='${result.data[i].location}' nme='${result.data[i].name}'>
                    <div class='row'>
                        <div class='icon'>
                            <img src=' http://localhost/naql/library/machine/${result.data[i].photo}' alt='' class='center-block'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='title text-center'>
                            <h3>${result.data[i].name}</h3>
                        </div>
                    </div>
                </div>`);
            }
            $('.equip').on('click', function () {
                localStorage.removeItem("machineId");
                //Set  Machine Id
                localStorage.setItem('machineId', $(this).attr("id"));
                //Clicked Machine Class
                $('.equip.clicked').removeClass('clicked');
                $(this).attr("class", "col-md-4 col-sm-6 equip clicked");
                //Show Next Btn
                $(".next").show();
                //list Machine Types
                $.ajax({
                    url: `http://localhost/naql/api/machineDetails/subCat/${localStorage.getItem('machineId')}.json`,
                    type: "GET",
                    accept: "application/json",
                    success: function (result) {
                        $('#selectType').html(
                            "<option selected disabled>اختر الدنيا المطلوبة</option>"
                        );
                        for (var type = 0; type < result.data.length; type++) {
                            $('#selectType').append(
                                `<option opt='type${type}' value='${result.data[type].name}' detail-id='${result.data[type].id}' class='option'>
                                ${result.data[type].name}</option>`);
                        }
                    }
                });
            });
            $('.next').on('click', function () {
                $('#equipPanel').fadeOut(800);
                $('#reservationForm').fadeIn(1000);
                $(this).hide();
            });
            $('#reserve').on('click', function (e) {
                //validation
                var empty = $('#reservationForm .form').find(".form-control").filter(function () {
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
                    $.ajax({
                        url: `http://localhost/naql/api/MachineOwners/machineProfile/${OwnerId}.json`,
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
                            formdata.append("machine_detail_id", parseInt($('#selectType').find('option:selected').attr('detail-id')));
                            formdata.append("machine_id", localStorage.getItem('machineId'));
                            formdata.append("count", parseInt($('#ownerCars').val()));
                            formdata.append("area_id", parseInt($('#selectArea').find('option:selected').attr('id')));
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
                                    if (result.chkAddNewMachine.length != 0) {
                                        $('.form').prepend(
                                            '<div class="alert alert-success">\
                                                <strong>المركبة مسجلة مسبقا</strong>\
                                            </div>');
                                        setTimeout(function () {
                                            $('.alert').fadeOut(300);
                                        }, 3000);
                                    } else {
                                        //Active My Machines Tab Btn
                                        $('.tabsBtn.active').removeClass(
                                            'active');
                                        $('.tabsBtn:eq( 2 )').addClass(
                                            "active");
                                        //Active My Machines Tab Content
                                        $('#addNewEquip').removeClass(
                                            "active in");
                                        $('#myEquips').addClass('active in');
                                        // $.ajax({
                                        //     url: "http://localhost/naql/api/MachineOwners/machineProfile/" +
                                        //         OwnerId + ".json",
                                        //     type: "GET",
                                        //     accept: "application/json",
                                        //     success: function (response) {
                                        //         $('#myEquips').empty();
                                        //         for (var m = 0; m < response.data.length; m++) {
                                        //             $('#myEquips').append(
                                        //                 "\
                                        //                                     <div class='panel panel-default machine' id='machine" +
                                        //                 parseInt(m) +
                                        //                 "' style='width: 97%;height: 150px;margin: 40px auto;'>\
                                        //                                                 <div class='panel-body'>\
                                        //                                                     <div class='my-equip_img col-xs-4'>\
                                        //                                                         <img src='http://localhost/naql/library/machine/" +
                                        //                 response.data[m].machine_detail.machine_photo +
                                        //                 "' alt='' style='width:127px;height:127px;'>\
                                        //                                                     </div>\
                                        //                                                     <div class='my-equip_title col-xs-6'>\
                                        //                                                         <h4>" +
                                        //                 response.data[m].machine_detail.name +
                                        //                 "</h4>\
                                        //                                                     </div>\
                                        //                                                     <div class='my-equip_buttons col-xs-2'>\
                                        //                                                         <button class='btn btn-default edit-equip' style='width:40px' id=" +
                                        //                 response.data[m].id +
                                        //                 ">\
                                        //                                                             <img src='<?=URL?>img/icon/edit.png' style='width: 120%' alt=''>\
                                        //                                                         </button>\
                                        //                                                         <button class='btn btn-default delete-equip' style='width:40px' id=" +
                                        //                 response.data[m].id +
                                        //                 ">\
                                        //                                                             <img src='<?=URL?>img/icon/delete.png' style='width: 120%' alt=''>\
                                        //                                                         </button>\
                                        //                                                     </div>\
                                        //                                                 </div>\
                                        //                                             </div>"
                                        //             );
                                        //         }
                                        //         //Send Machine ID To page Edit Machine
                                        //         $('.edit-equip').on('click', function (e) {
                                        //             localStorage.setItem("currentMachineId", $(this).attr('id'));

                                        //             window.open("<?=URL?>Machines/machinesedit", "_self");

                                        //         });

                                        //         //Delete Machine
                                        //         $('.delete-equip').on('click', function () {

                                        //             $('.postLoading').show();
                                        //             $(this).closest('.panel').fadeOut(500);
                                        //             $('.my-equip').prepend(
                                        //                 '<div class="alert alert-success">\
                                        //                                                 <strong>تم مسح المركبة بنجاح</strong>\
                                        //                                             </div>'
                                        //             );
                                        //             setTimeout(function () {
                                        //                 $('.alert').fadeOut(300);
                                        //             }, 3000);


                                        //             $.ajax({
                                        //                 url: "http://localhost/naql/api/machine_owners/delete/" +
                                        //                     $(this).attr("id") + ".json",
                                        //                 type: "POST",
                                        //                 accept: "application/json",
                                        //                 success: function (result) {
                                        //                     $('.postLoading').hide();
                                        //                 }

                                        //             });
                                        //         });
                                        //     }

                                        // });
                                    }
                                }
                            });
                        }
                    });
                }
            });

        }
    });
}

//Update User Data Section
$(".update").on("click", function () {
    updateUserData()
});

//Add Machine Section 
$('#addMachineBtn').on('click', function () {
    $('#equipPanel').show()
    $('#reservationForm,#preview-area').hide();
    listMachines();
});

//list User's Machines Section 

//List Machines
//$('#addMachineBtn').on('click', function () {
//Empty Input Fields
// $('#ownerCars,#description').val('');
// $('#preview-area,#reservationForm').hide();
// //Onclick on Next Btn show Reservation Section & Hide Machines List Section
// $('#equipPanel').show();
// $('#preview-area').empty();
// $(function () {
//     // Multiple images preview in browser
//     var imagesPreview = function (input, placeToInsertImagePreview) {

//         if (input.files) {
//             var filesAmount = input.files.length;

//             for (i = 0; i < filesAmount; i++) {
//                 var reader = new FileReader();
//                 reader.onload = function (event) {
//                     $('#preview-area').empty();
//                     $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
//                     $('#preview-area').show();
//                 }

//                 reader.readAsDataURL(input.files[i]);
//             }
//         }

//     };

//     $('#ownerSelectImgs').on('change', function () {
//         imagesPreview(this, '#preview-area');
//     });
// });
// //List Machines
// $.ajax({
//     url: "http://localhost/naql/api/machines.json",
//     type: "GET",
//     accept: "application/json",
//     success: function (result) {
//         $("#equipService").empty()
//         $.each(result, function (h, val) {
//             for (h in val) {
//                 document.getElementById('equipService').innerHTML +=
//                     "<div class='col-md-4 col-sm-6 equip'  id='" +
//                     val[h].id +
//                     "' location='" + val[h].location + "' nme=" +
//                     val[h].name +
//                     " >\
//                                 <div class='row'>\
//                                     <div class='icon'>\
//                                         <img src=' http://localhost/naql/library/machine/" +
//                     val[h].photo +
//                     "' alt='' class='center-block'>\
//                                     </div>\
//                                 </div>\
//                                 <div class='row'>\
//                                     <div class='title text-center'>\
//                                         <h3>" +
//                     val[h].name +
//                     "</h3>\
//                                     </div>\
//                                 </div>\
//                         </div>";
//             }
//         });

//         /*           ### on Choose Machine ###
//          ** Set Machine Id in Local Storage
//          ** remove class Clicked from previous Machine selected & add it to currently selected machine
//          ** show next Btn
//          */

//         $('.equip').on('click', function () {
//             localStorage.removeItem("machineId");
//             //Set  Machine Id
//             localStorage.setItem('machineId', $(this).attr("id"));
//             //Clicked Machine Class
//             $('.equip.clicked').removeClass('clicked');
//             $(this).attr("class", "col-md-4 col-sm-6 equip clicked");
//             //Show Next Btn
//             $(".next").show();

//             //list Machine Types
//             $.ajax({
//                 url: "http://localhost/naql/api/machineDetails/subCat/" +
//                     localStorage.getItem('machineId') + ".json",
//                 type: "GET",
//                 accept: "application/json",
//                 success: function (result) {
//                     $('#selectType').html(
//                         "<option selected disabled>اختر الدنيا المطلوبة</option>"
//                     );
//                     for (var type = 0; type < result.data.length; type++) {
//                         $('#selectType').append(
//                             "<option opt='type" + type +
//                             "' " +
//                             "value=" + result.data[type]
//                             .name + " " +
//                             "detail-id=" + result.data[
//                                 type].id + " " +
//                             "onchange='showOptions(this)' class='option'>" +
//                             result.data[type].name +
//                             " </option>");
//                     }
//                 }
//             });
//             //Show Areas
//             $.ajax({
//                 url: "http://localhost/naql/api/areas.json",
//                 type: "GET",
//                 accept: "application/json",
//                 success: function (result) {
//                     $('#selectArea').html(
//                         "<option  selected disabled>اختر المنطقة</option>"
//                     );
//                     for (var area = 0; area < result.data.length; area++) {
//                         $('#selectArea').append(
//                             "<option opt='area" + area +
//                             "' " +
//                             "value=" + result.data[area]
//                             .name + " " +
//                             "id=" + result.data[area].id +
//                             " " +
//                             "onchange='showOptions(this)' class='option'>" +
//                             result.data[area].name +
//                             " </option>");
//                     }
//                 }
//             });

//         });
//         // /*     #### Onclick on next Btn ###

//         //   ** hide equipPanel Section
//         //   ** show reservationForm
//         //   ** hide next btn
//         //   ** list Machines Types
//         //   ** List Area

//         // */
//         $('.next').on('click', function () {
//             $('#equipPanel').fadeOut(800);
//             $('#reservationForm').fadeIn(1000);
//             $(this).hide();
//         });

//         //Send Equip Data
//         $('#reserve').on('click', function (e) {
//             //validation
//             var empty = $('#reservationForm .form').find(".form-control").filter(function () {
//                 return this.value === "";
//             });
//             if (empty.length) {
//                 $('.form').prepend(
//                     "<div class='alert alert-danger'>ادخل البيانات المطلوبة</div>"
//                 );
//                 setTimeout(function () {
//                     $('.alert').fadeOut(500);
//                 }, 3000);
//             } else {

//                 $.ajax({
//                     url: "http://localhost/naql/api/MachineOwners/machineProfile/" +
//                         OwnerId + ".json",
//                     type: "GET",
//                     accept: "application/json",
//                     success: function (response) {
//                         $('.postLoading').show();
//                         var formdata = new FormData();
//                         var i = 0,
//                             len = $("#ownerSelectImgs")[0].files.length,
//                             img, reader, file;
//                         for (; i < len; i++) {
//                             file = $("#ownerSelectImgs")[0].files[i];

//                             if (!!file.type.match(/image.*/)) {

//                             }

//                             if (window.FileReader) {
//                                 reader = new FileReader();
//                                 reader.onloadend = function (e) {
//                                     //   showUploadedItem(e.target.result);
//                                 };
//                                 reader.readAsDataURL(file);
//                             }
//                             if (formdata) {
//                                 formdata.append("photo[]", file);
//                             }
//                         }
//                         formdata.append("machine_detail_id", parseInt($(
//                             '#selectType').find(
//                             'option:selected').attr(
//                             'detail-id')));
//                         formdata.append("machine_id", localStorage.getItem(
//                             'machineId'));
//                         formdata.append("count", parseInt($('#ownerCars').val()));
//                         formdata.append("area_id", parseInt($('#selectArea')
//                             .find('option:selected').attr('id')
//                         ));
//                         formdata.append("description", $('#description').val());
//                         $.ajax({
//                             url: "http://localhost/naql/api/machine_owners/add/" +
//                                 IDQuery + ".json",
//                             type: "POST",
//                             data: formdata,
//                             accept: "application/json",
//                             processData: false,
//                             contentType: false,
//                             success: function (result) {
//                                 $('.postLoading').hide();
//                                 console.log(result.chkAddNewMachine.length)
//                                 if (result.chkAddNewMachine.length != 0) {
//                                     $('.form').prepend(
//                                         '<div class="alert alert-success">\
//                                                             <strong>المركبة مسجلة مسبقا</strong>\
//                                                         </div>');
//                                     setTimeout(function () {
//                                         $('.alert').fadeOut(300);
//                                     }, 3000);
//                                 } else {
//                                     //Active My Machines Tab Btn
//                                     $('.tabsBtn.active').removeClass(
//                                         'active');
//                                     $('.tabsBtn:eq( 2 )').addClass(
//                                         "active");
//                                     //Active My Machines Tab Content
//                                     $('#addNewEquip').removeClass(
//                                         "active in");
//                                     $('#myEquips').addClass('active in');
//                                     $.ajax({
//                                         url: "http://localhost/naql/api/MachineOwners/machineProfile/" +
//                                             OwnerId + ".json",
//                                         type: "GET",
//                                         accept: "application/json",
//                                         success: function (response) {
//                                             $('#myEquips').empty();
//                                             for (var m = 0; m < response.data.length; m++) {
//                                                 $('#myEquips').append(
//                                                     "\
//                                                                         <div class='panel panel-default machine' id='machine" +
//                                                     parseInt(m) +
//                                                     "' style='width: 97%;height: 150px;margin: 40px auto;'>\
//                                                                                     <div class='panel-body'>\
//                                                                                         <div class='my-equip_img col-xs-4'>\
//                                                                                             <img src='http://localhost/naql/library/machine/" +
//                                                     response.data[m].machine_detail.machine_photo +
//                                                     "' alt='' style='width:127px;height:127px;'>\
//                                                                                         </div>\
//                                                                                         <div class='my-equip_title col-xs-6'>\
//                                                                                             <h4>" +
//                                                     response.data[m].machine_detail.name +
//                                                     "</h4>\
//                                                                                         </div>\
//                                                                                         <div class='my-equip_buttons col-xs-2'>\
//                                                                                             <button class='btn btn-default edit-equip' style='width:40px' id=" +
//                                                     response.data[m].id +
//                                                     ">\
//                                                                                                 <img src='<?=URL?>img/icon/edit.png' style='width: 120%' alt=''>\
//                                                                                             </button>\
//                                                                                             <button class='btn btn-default delete-equip' style='width:40px' id=" +
//                                                     response.data[m].id +
//                                                     ">\
//                                                                                                 <img src='<?=URL?>img/icon/delete.png' style='width: 120%' alt=''>\
//                                                                                             </button>\
//                                                                                         </div>\
//                                                                                     </div>\
//                                                                                 </div>"
//                                                 );
//                                             }
//                                             //Send Machine ID To page Edit Machine
//                                             $('.edit-equip').on('click', function (e) {
//                                                 localStorage.setItem("currentMachineId", $(this).attr('id'));

//                                                 window.open("<?=URL?>Machines/machinesedit", "_self");

//                                             });

//                                             //Delete Machine
//                                             $('.delete-equip').on('click', function () {

//                                                 $('.postLoading').show();
//                                                 $(this).closest('.panel').fadeOut(500);
//                                                 $('.my-equip').prepend(
//                                                     '<div class="alert alert-success">\
//                                                                                     <strong>تم مسح المركبة بنجاح</strong>\
//                                                                                 </div>'
//                                                 );
//                                                 setTimeout(function () {
//                                                     $('.alert').fadeOut(300);
//                                                 }, 3000);


//                                                 $.ajax({
//                                                     url: "http://localhost/naql/api/machine_owners/delete/" +
//                                                         $(this).attr("id") + ".json",
//                                                     type: "POST",
//                                                     accept: "application/json",
//                                                     success: function (result) {
//                                                         $('.postLoading').hide();
//                                                     }

//                                                 });
//                                             });
//                                         }

//                                     });
//                                 }
//                             }
//                         });
//                     }
//                 });


//             }
//         });
//     }
// });

//});

/* On click on myMachineBtn
 **empty Previous Listed Machines
 **list current Owner's machines
 **edit Machine
 **delete Machine
 */

// $('#myMachinesBtn').on('click', function () {
//     $.ajax({
//         url: "http://localhost/naql/api/MachineOwners/machineProfile/" +
//             OwnerId + ".json",
//         type: "GET",
//         accept: "application/json",
//         success: function (response) {
//             $('#myEquips').empty();
//             for (var m = 0; m < response.data.length; m++) {
//                 $('#myEquips').append(
//                     "\
//                             <div class='panel panel-default machine' id='machine" +
//                     parseInt(m) +
//                     "' style='width: 97%;height: 150px;margin: 40px auto;'>\
//                                         <div class='panel-body'>\
//                                             <div class='my-equip_img col-xs-4'>\
//                                                 <img src='http://localhost/naql/library/machine/" +
//                     response.data[m].machine_detail.machine_photo +
//                     "' alt='' style='width:127px;height:127px;'>\
//                                             </div>\
//                                             <div class='my-equip_title col-xs-6'>\
//                                                 <h4>" +
//                     response.data[m].machine_detail.name +
//                     "</h4>\
//                                             </div>\
//                                             <div class='my-equip_buttons col-xs-2'>\
//                                                 <button class='btn btn-default edit-equip' style='width:40px' id=" +
//                     response.data[m].id +
//                     ">\
//                                                     <img src='<?=URL?>img/icon/edit.png' style='width: 120%' alt=''>\
//                                                 </button>\
//                                                 <button class='btn btn-default delete-equip' style='width:40px' id=" +
//                     response.data[m].id +
//                     ">\
//                                                     <img src='<?=URL?>img/icon/delete.png' style='width: 120%' alt=''>\
//                                                 </button>\
//                                             </div>\
//                                         </div>\
//                                     </div>"
//                 );
//             }
//             //Send Machine ID To page Edit Machine
//             $('.edit-equip').on('click', function (e) {
//                 localStorage.setItem("currentMachineId", $(this).attr('id'));

//                 window.open("<?=URL?>Machines/machinesedit", "_self");

//             });

//             //Delete Machine
//             $('.delete-equip').on('click', function () {

//                 $('.postLoading').show();
//                 $(this).closest('.panel').fadeOut(500);
//                 $('#myEquips').prepend(
//                     '<div class="alert alert-success">\
//                                 <strong>تم مسح المركبة بنجاح</strong>\
//                             </div>'
//                 );
//                 setTimeout(function () {
//                     $('.alert').fadeOut(300);
//                 }, 3000);


//                 $.ajax({
//                     url: "http://localhost/naql/api/machine_owners/delete/" +
//                         $(this).attr("id") + ".json",
//                     type: "POST",
//                     accept: "application/json",
//                     success: function (result) {
//                         $('.postLoading').hide();
//                     }

//                 });
//             });
//         }

//     });
// });