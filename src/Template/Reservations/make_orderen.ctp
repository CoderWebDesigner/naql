<!DOCTYPE html>
<?php
//debug($owner);
$ownerid = $owner[0]["id"];
$user_id = $this->UserAuth->getUserId();
$groupid = $this->UserAuth->getGroupId();
?>
  <div class="order-now">
    <div class="container">
      <div class="row">
        <h1 class="text-center" style="font-family: 'arial'">250 Prepared at your service</h1>
      </div>
    </div>
  </div>


<main>
    <!-- Start Step Section -->
    <div class="steps-bar">
      <div class="container">
        <div class="row">
          <div class="col-xs-4">
            <div class="step active-step">
              <div class="step-icon">
                <img src="<?=URL?>img/archive 2/e36c1e6c5964fb13936a71160923af74.png" alt="icon" class="center-block" style="width: 90px">
              </div>
              <div class="step-title hidden-xs">
                <h3 class="text-center "> Select Machine</h3>
              </div>
            </div>
          </div>
          <div class="col-xs-4">
            <div class="step">
              <div class="step-icon">
                <img src="<?=URL?>img/archive 2/send.png" alt="icon" class="center-block">
              </div>
              <div class="step-title hidden-xs">
                <h3 class="text-center "> Machine Details</h3>
              </div>
            </div>
          </div>
          <div class="col-xs-4">
            <div class="step">
              <div class="step-icon">
                <img src="<?=URL?>img/complete.png" alt="icon" class="center-block">
              </div>
              <div class="step-title hidden-xs">
                <h3 class="text-center"> Complete</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Step Section -->

    <!-- Start Reservation -->
    <div class="reservation">
      <div class="container">
        <div class="row">
          <!--Start Show Machines -->
          <div id="chooseMachine">
            <div class="panel panel-default">
              <div class="panel-body" id="chooseEquip_list"></div>
            </div>
          </div>
        </div>
        <button class="btn center-block custom-btn more custom-btn"> Next
          <img src="<?=URL?>img/next.png" alt="">
        </button>
        <!-- End Show Machines -->

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
                  <div class="form-icon col-md-2 col-xs-3" id='show-map'>
                    <img src="<?=URL?>img/lorry-512.png" alt="">
                  </div>
                  <div class="col-md-10 col-xs-9">
                    <input type='text' class='form-control' id='select-start-area' placeholder='Start Point'>
                    <div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                      <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                            <h4 class='modal-title' id='myModalLabel'>Select Address</h4>
                          </div>
                          <div class='modal-body'>
                            <div id='map' style='width: 100%; height: 400px;'></div>
                            <input type="text" id="us1-lat">
                            <input type="text" id="us1-lon">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class='form-group' id="end-location">
                  <div class='form-icon col-md-2 col-xs-3' id='show-map2'>
                    <img src='img/lorry-512.png' alt=''>
                  </div>
                  <div class='col-md-10 col-xs-9'>
                    <input type='text' class='form-control' id='select-end-area' name='endarea' placeholder='End Point'>
                    <div class='modal fade' id='myModal2' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                      <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                            <h4 class='modal-title' id='myModalLabel'>Select Address</h4>
                          </div>
                          <div class='modal-body'>
                            <div id='map2' style='width: 100%; height: 400px;'></div>
                            <input type="text" id="us2-lat">
                            <input type="text" id="us2-lon">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-icon col-sm-2 col-xs-3">
                    <img src="<?=URL?>img/time.png" alt="">
                  </div>
                  <div class=" col-sm-10 col-xs-9">
                    <input type="text" class="form-control" id="datepicker1" placeholder="Date">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-icon col-md-2 col-xs-3">
                    <img src="<?=URL?>img/sand-clock.png" alt="">
                  </div>
                  <div class="form-element col-md-10 col-xs-9">
                    <select class="form-control" id="selectDeal" required>
                      <option selected disabled>Deal</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <textarea class="form-control" rows="5" id="description" placeholder="Description"></textarea>
                </div>
                <button class="btn btn-default center-block custom-btn" id="reserve">Reservation</button>
              </div>
            </div>
          </div>
        </div>
        <!-- End Reservation Form-->

        <!-- Start Complete Page -->
        <div id="complete">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="complete-msg">
                <div class="complete-icon">
                  <img src="<?=URL?>img/complete.png" alt="" class="img-responsive center-block">
                </div>
                <div class="complete-title text-center">
                  <h4>Your booking has been successfully completed</h4>
                  <p> Please wait for offers from drivers</p>

                  <button class="btn btn-default">My Orders</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Complete Page -->
      </div>
    </div>
    <!-- End Reservation -->
  </main>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="<?=URL?>https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?=URL?>js/bootstrap.min.js"></script>
  <!-- jquery Ui -->
  <script src="<?=URL?>https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- Map Picker -->
  <script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyD2TDovK1nzuQ8m0SY3SOQ_u-H6RS7JgfY&sensor=false&libraries=places'></script>
  <script src="<?=URL?>js/locationpicker.jquery.js"></script>

  <script>
    $(document).ready(function () {
      //Hide ResevationForm Section
      $('#reservationForm').hide();
      //Hide Complete Section
      $('#complete').hide();
      //Hide More Btn
      $(".more").hide();
      //Hide Post Loading
      $('.postLoading').hide();
var currentLocation;
      //List Machines
      $.ajax({
        url: "http://localhost/naql/api/machines.json",
        type: "GET",
        accept: "application/json",
        success: function (result) {
          $.each(result, function (i, value) {
            for (var i in value) {
              $('#chooseEquip_list').append(
                "\
                            <div class='col-md-4 col-sm-6 equip'  id='" +
                value[i].id +
                "'location='" + value[i].location +
                "'name=" + value[i].name_en +
                " >\
                                <div class='row'>\
                                    <div class='icon'>\
                                        <img src=' http://localhost/naql/library/machine/" +
                value[i].photo +
                "' alt='' class='img-responsive center-block'>\
                                    </div>\
                                </div>\
                                <div class='row'>\
                                    <div class='title text-center'>\
                                        <h3>" +
                value[i].name_en +
                "</h3>\
                                    </div>\
                                </div>\
                            </div>"
              );
            }
          });

          //Choose Machine
          $('.equip').on('click', function () {
            localStorage.setItem('machineId', this.id);
            localStorage.setItem('machineName', $(this).attr("name"));

             currentLocation = $(this).attr('location');
            //Clicked Machine Class
            $('.equip.clicked').removeClass('clicked');
            $(this).attr("class", "col-md-4 col-sm-6 equip clicked");

            //Show Next Btn
            $(".more").show();
            if (currentLocation === "2") {
              $("#end-location").show();
            } else {
              $("#end-location").hide();
            }

            // Start Plugins
            var mapInput = document.getElementById("show-map"),
              mapInput2 = document.getElementById("show-map2");
            $("#datepicker1").datepicker();
            //map start
            //Current Location
            navigator.geolocation.getCurrentPosition(function (position) {
              // You can set it the plugin
              $('#map').locationpicker('location', {
                latitude: position.coords.latitude,
                longitude: position.coords.longitude,
              });
            });
            $('#map').locationpicker({

              enableAutocomplete: true,
              enableReverseGeocode: true,
              radius: 0,
              inputBinding: {
                latitudeInput: $('#us1-lat'),
                longitudeInput: $('#us1-lon'),
                locationNameInput: $('#select-start-area'),
              }
            });

            //Current Location
            navigator.geolocation.getCurrentPosition(function (position) {
              // You can set it the plugin
              $('#map2').locationpicker('location', {
                latitude: position.coords.latitude,
                longitude: position.coords.longitude,
              });
            });
            $('#map2').locationpicker({
              enableAutocomplete: true,
              enableReverseGeocode: true,
              radius: 0,
              inputBinding: {
                latitudeInput: $('#us2-lat'),
                longitudeInput: $('#us2-lon'),
                locationNameInput: $('#select-end-area'),
              }
            });
            //Modal 1
            mapInput.onclick = function () {
              $('#myModal').modal({
                show: true
              });
            };
            //Modal 2
            mapInput2.onclick = function () {
              $('#myModal2').modal({
                show: true
              });
            };
          });

          //Next Btn
          //Show Reservation Form & hide Select Machine & hide More Btn
          $(".more").on('click', function () {
            var machineDetail = document.getElementById('selectType'),
              area = document.getElementById('selectArea'),
              reservationTypes = document.getElementById('selectDeal');
            //Remove Active Step From Previous Step
            $('.active-step').removeClass('active-step');
            $('.step:eq( 1 )').addClass("active-step");
            //Hide Section Choose Machine & Show reservation Form & hide More Btn
            $('#chooseMachine').fadeOut(800);
            $('#reservationForm').fadeIn(500);
            //machine details
            $.ajax({
              url: "http://localhost/naql/api/machineDetails/subCat/" + localStorage.getItem(
                'machineId', this.id) + ".json",
              type: "GET",
              accept: "application/json",
              success: function (result) {
                $.each(result, function (j, equip) {
                  for (var j in equip) {
                    machineDetail.innerHTML +=
                      "<option value=" +
                      equip[j].name_en +
                      " detail-id=" +
                      equip[j].id + ">" +
                      equip[j].name_en + "</option>";
                  }
                })
              }
            });
            //List Machine Area
            $.ajax({
              url: "http://localhost/naql/api/areas.json",
              type: "GET",
              accept: "application/json",
              success: function (data) {
                $.each(data, function (k, area) {
                  for (k in area) {
                    $('#selectArea').append(
                      "<option value=" + area[
                        k].name_en +
                      ">" + area[k].name_en +
                      "</option>");
                  }
                });
              }
            });
            //Reservation Type
            $.ajax({
              url: "http://localhost/naql/api/ReservationTypes.json",
              type: "GET",
              accept: "application/json",
              success: function (data) {
                $.each(data, function (k, reservation) {
                  for (m in reservation) {
                    reservationTypes.innerHTML +=
                      "<option value=" +
                      reservation[m].name_en +
                      " id=" + reservation[m].id +
                      ">" +
                      reservation[m].name_en +
                      "</option>";
                  }
                })
              }
            });
            $(this).hide();
          });

          //Send Reservation Data
          $('#reserve').on('click', function () {
            //validation
            if ($('#selectType').val() === '' ||
              $('#selectArea').val() === '' ||
              $('#select-start-area').val() === '' ||
              $('#datepicker1').val() === '' ||
              $('#selectDeal').val() === '' ||
              $('#description').val() === '') {
              $(".form").prepend(
                "\
                    <div class='alert alert-danger'>\
                        Complete fill Data\
                    </div>\
                  "
              );
              setTimeout(function () {
                $('.alert').fadeOut(500);
              }, 3000);

            } else {
              //Declare Object Json
              var jsonData
              //Show Loading
              $('.postLoading').show();
    if (currentLocation === "1") {
                jsonData = JSON.stringify({
                  "user_id": <?=$user_id?>,
                  "start_point": $(
                    "#select-start-area").val(),
                  "end_point": $("#select-end-area").val(),
                  "date": $("#datepicker1").val(),
                  "machine_id": localStorage.getItem('machineId', this.id),
                  "machine_name": localStorage.getItem('machineName', $(this).attr("name")),
                  "machine_detail_id": $(
                    '#selectType').children(
                    ":selected").attr(
                    "detail-id"),
                  "reservation_type": $(
                    '#selectDeal').children(
                    ":selected").val(),
                "area_id":  $(
                    '#selectDeal').children(
                    ":selected").attr("id"),
                  "reservation_type_id": $(
                    '#selectDeal').children(
                    ":selected").attr("id"),
                  "start_lat": $("#us1-lat").val(),
                  "start_long": $("#us1-lon").val(),
                  "end_lat": 0,
                  "end_long": 0,
                  "description": $("#description").val()
                });
              } else {
                jsonData = JSON.stringify({
                  "user_id": <?=$user_id?>,
                  "start_point": $(
                    "#select-start-area").val(),
                  "end_point": $("#select-start-area")
                    .val(),
                  "date": $("#datepicker1").val(),
                  "machine_id": localStorage.getItem('machineId', this.id),
                  "machine_name": localStorage.getItem('machineName', $(this).attr("name")),
                  "machine_detail_id": $(
                    '#selectType').children(
                    ":selected").attr(
                    "detail-id"),
                  "reservation_type": $(
                    '#selectDeal').children(
                    ":selected").val(),
              "area_id":  $(
                    '#selectDeal').children(
                    ":selected").attr("id"),
                  "reservation_type_id": $(
                    '#selectArea').children(
                    ":selected").attr("id"),
                  "start_lat": $("#us1-lat").val(),
                  "start_long": $("#us1-lon").val(),
                  "end_lat": $("#us2-lat").val(),
                  "end_long": $("#us2-lon").val(),
                  "description": $("#dscription").val()
                });
              }
              //Send Reservation of Machine
              $.ajax({
                url: "http://localhost/naql/api/reservations/add.json",
                type: "POST",
                data: jsonData,
                contentType: "application/json",
                success: function (data) {
                  console.log(data)
                  //Remove Loading after send data successfully
                  $('.postLoading').hide();
                  //Active Complete Step & hide Reservation Form Step
                  $('#reservationForm').hide();
                  $('#complete').fadeIn(800);
                  //Remove Active Step From Previous Step
                  $('.active-step').removeClass('active-step');
                  $('.step:eq( 2 )').addClass("active-step");
                }
              });
            }
          });
        }
      });
    });
  </script>

</body>

</html>
