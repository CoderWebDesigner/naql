var URL = 'http://localhost/naql/';

//Set Page Title
$(document).attr("title", "Owner Register");

$('.regist-owner').on('click', function () {
    //Validation on Fields
    var empty = $('#ownerFrm').find("input.form-control").filter(function () {
        return this.value === "";
    });
    console.log(empty)
    if (empty.length) {
        //validation Msg
        $('#ownerFrm').prepend(
            `<div class = 'alert alert-danger'>
                Complete Required data. 
            </div>`
        );
        setTimeout(function () {
            $('.alert').fadeOut(500)
        }, 3000);
    } else {
        var formdata = new FormData(),
            file = $("#userUploadImg")[0].files[0],
            reader;
        console.log(file)
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

        formdata.append("username", $("#ownerUserName").val());
        formdata.append("email", $("#ownerEmail").val());
        formdata.append("mobile", $("#mobile").val());
        formdata.append("password", $("#password").val());
        formdata.append("email_verified", 1);
        formdata.append("active", 1)
        formdata.append("user_group_id", 3)

        $.ajax({
            url: "http://localhost/naql/api/users/add.json",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            accept: "application/json",
            success: function (returne) {
                console.log(returne["data"]["user_id"])
                $('.postLoading').hide();
                $('#ownerFrm').prepend(
                    "\
                        <div class = 'alert alert-success'>\
                            <strong> Succesfully  </strong>\
                        </div>"
                );
                setTimeout(function () {
                    $('.alert').fadeOut(500)
                }, 3000);
                localStorage.setItem("UserId", returne["data"]["user_id"]);
                window.location = URL + "owners/getmachinetypeen";


            },
            error: function (error) {
                if (error.responseJSON.data.code === 422) {
                    //validation Msg
                    $('#ownerFrm').prepend("\
                    <div class = 'alert alert-danger'>\
                    Username OR Phone OR Email already Exists.\
                    </div>");
                    setTimeout(function () {
                        $('.alert').fadeOut(500)
                    }, 3000);
                }
            }
        });

    }

})

//show upload image 
$(function () {
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.profileImg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $('.show-img').on('click', function () {
        $('#userUploadImg').click();
    })
    $("#userUploadImg").change(function () {
        readURL(this);
    });

})