<main>
    <div class="container">
        <div class="row">
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
                                    <input type="number" class="form-control" placeholder="Machines Count" id="ownerCars">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-icon col-sm-2 col-xs-3">
                                    <img src="<?=URL?>img/icon/4f007748-d53c-4917-81a0-b38de46fd515.jpg" alt="">
                                </div>
                                <div class=" col-sm-10 col-xs-9">
                                    <label style="cursor: pointer;margin-top: 16px;">Machine Photos</label>
                                    <input type="file" name="photo[]" style="
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
                                <textarea class="form-control" rows="5" id="description" placeholder="Description"></textarea>
                            </div>
                            <button class="btn btn-default custom-btn" id="updateMachine" style="">
                                Edit
                            </button>
                            <button class="btn btn-default back" style="float:left">
                                Back
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Reservation Form-->
        </div>
    </div>
</main>


<script>
    $(document).ready(function () {

        var machineIDQuery = localStorage.getItem("machineId"),
            editedArea = document.getElementById("selectArea"),
            inputLocalFont = document.getElementById("ownerSelectImgs"),
            imgsArray = new Array();

        //Hide Post Loading
        $('.postLoading').hide();
        $('.preview-area').hide();

        //Send Machine Area
        $.ajax({
            url: "http://localhost/naql/api/areas.json",
            type: "GET",
            accept: "application/json",
            success: function (data) {
                $.each(data, function (k, area) {
                    for (k in area) {
                        editedArea.innerHTML +=
                            "<option value='" + area[k].name + "' id='" + area[k].id +
                            "'>" + area[k].name + "</option>";
                    }
                })
            }
        });

        //Get Machine Data
        $.ajax({
            url: 'http://localhost/naql/api/machine_owners/view/' + localStorage.getItem(
                "currentMachineId") + '.json',
            type: "GET",
            accept: "application/json",
            success: function (e) {
                $("#selectArea option[id=" + e.data.area_id + "]").prop('selected', true);
                $('#description').val(e.data.description);
                $('#ownerCars').val(e.data.count)
            }
        });

        //show Selected Images
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

            }

        }
        //Send Updated Data
        $('#updateMachine').on('click', function () {
            //Show Post Loading
            $('.postLoading').show();
            //Send Updated Data
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
            formdata.append("count", parseInt($('#ownerCars').val()));
            formdata.append("area_id", parseInt($('#selectArea').find('option:selected').attr('id')));
            formdata.append("description", $('#description').val());
            $.ajax({
                url: "http://localhost/naql/api/MachineOwners/edit/" + localStorage.getItem(
                    "currentMachineId") + ".json",
                type: "POST",
                data: formdata,
                accept: "application/json",
                processData: false,
                contentType: false,
                success: function (result) {
                    $('.postLoading').hide();
                    //validation Msg
                    $('.form').prepend(
                        "\
                            <div class = 'alert alert-success'>\
                                Updated Successfully \
                            </div>"
                    );
                    setTimeout(function () {
                        $('.alert').fadeOut(500)
                    }, 3000);
                }
            });


        });
        $('.back').on('click', function (e) {
            e.preventDefault();
            window.open("<?=URL?>Owners/onwerprofile", "_self");
        });
    });
</script>
