// display the loading animation
$('.postLoading').show();

// declaring the most used variables
var currentDateObj = new Date();
var currentDate = Date.parse(currentDateObj);
var UserGroup = localStorage.getItem('UserGroup');
if(UserGroup == 2){localStorage.removeItem("OwnerId")}
else {var OwnerId = localStorage.getItem('OwnerId');}
var UserId =  localStorage.getItem('UserId');
var URL = "http://www.localhost/naql/";

// language choice
$('#lang_form').change(function(){
    if($('#lang_form').val() == 1){window.location = URL+"owners/myorders"}
    else if ($('#lang_form').val() == 2){window.location = URL+"owners/myordersen"}
});

// map function
var mapClicked = 0;
function myMap() {
    var myCenter = new google.maps.LatLng(localStorage.getItem("start_lat"),localStorage.getItem("start_long"));
    var mapCanvas = document.getElementById(localStorage.getItem("mapContainerID"));
    var mapOptions = {center: myCenter, zoom: 15};
    var map = new google.maps.Map(mapCanvas, mapOptions);
    var marker = new google.maps.Marker({position:myCenter,animation:google.maps.Animation.BOUNCE});
    marker.setMap(map);
    var myCity = new google.maps.Circle({
        center: myCenter,
        radius: 100,
        strokeColor: "#0000FF",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#0000FF",
        fillOpacity: 0.4
    });
    myCity.setMap(map);
}

// rating the owner for the user
function ratingOwner(id){
    var stars = $('#'+id).attr("stars");
    var count = $('#'+id).attr("countOdRating");
    var starsToShow = Math.round(stars / count);
    if(starsToShow>0 && starsToShow<=1){
        $('#'+id).html('<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">');}
    if(starsToShow>1 && starsToShow<=2){
        $('#'+id).html('<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">');}
    if(starsToShow>2 && starsToShow<=3){
        $('#'+id).html('<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">');}
    if(starsToShow>3 && starsToShow<=4){
        $('#'+id).html('<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">');}
    if(starsToShow>4) {
        $('#'+id).html('<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">');
    }
}

$('#currentOrdersBtn').click(function(){
    $('#currentOrders').show(); $('#orders_pagination').show();
    $('#prevOrders').hide();  $('#previous_orders_pagination').removeClass("d-flex");
    $('#currentOrdersBtn').css('border-bottom', '03px #ffad33 solid');
    $('#prevOrdersBtn').css('border-bottom', '03px #fff solid');
    $('#currentOrdersBtn').find('h5').addClass('text-warning');
    $('#prevOrdersBtn').find('h5').removeClass('text-warning');
});

$('#prevOrdersBtn').click(function(){
    $('#prevOrders').show();  $('#previous_orders_pagination').addClass("d-flex");
    $('#currentOrders').hide(); $('#orders_pagination').hide();
    $('#prevOrdersBtn').css('border-bottom', '03px #ffad33 solid');
    $('#currentOrdersBtn').css('border-bottom', '03px #fff solid');
    $('#prevOrdersBtn').find('h5').addClass('text-warning');
    $('#currentOrdersBtn').find('h5').removeClass('text-warning');
});

if (UserGroup == 1 || UserGroup == 3) {    // display current orders for "admin"
    

    // show the first page contents automatically at the first time
    $.post('http://localhost/naql/api/Reservations/orders/'+OwnerId+'/'+1+'.json',
        function(data, status){
            var currentObj = data.data;
            $('.postLoading').hide();
            if(currentObj.length == 0){
                $('#currentOrders').html('<div class="col-12 bg-white text-center"><img src="'+URL+'images/404.png" class="img-fluid my-5"><h4 class="text-center text-danger">Sorry, No Orders To Display</h4><a href="'+URL+'"><button class="btn btn-outline-secondary py-lg-3 my-5" onclick="window.location="'+URL+'"><h5 class="order_text my-auto">Back To Main Page</h5></button></a></div>');}
            if(UserGroup == 1) {createCurrentOrdersForAdmin(currentObj);}
            else if (UserGroup == 3) {createCurrentOrdersForOwner(currentObj);}
          });

      // number of pages
    $.get("http://localhost/naql/api/Reservations/orders/"+OwnerId+"/1.json",
    function(data){
        var number_of_orders = data.count;
        var number_of_pages = Math.ceil(number_of_orders/10);
        
        
        if(number_of_pages<=5){
            for(var p=1 ; p<=number_of_pages ; p++){
                $('#orders_pagination').append('<li class="page-item" id="page_number_'+p+'" page_number="'+p+'"><a class="page-link">'+p+'</a></li>');
            }
        }
        else if(number_of_pages>5){
            for(var p=1 ; p<=5 ; p++){
                $('#orders_pagination').append('<li class="page-item" id="page_number_'+p+'" page_number="'+p+'"><a class="page-link">'+p+'</a></li>');
            }
            // hiding the rest of the pages whose more than 5
            for(var p=6 ; p<=number_of_pages ; p++){
                $('#orders_pagination').append('<li class="page-item d-none" id="page_number_'+p+'" page_number="'+p+'"><a class="page-link">'+p+'</a></li>');
            }
        }
        
        // activating the first page in the pagination
        $('.page-item:first').addClass("active");
        
        // clicking on any page number
        $('.page-item').click(function(){
            $('.page-item').removeClass("active");
            $(this).addClass("active");
            var y = $(this).attr("page_number");
            $.post('http://localhost/naql/api/Reservations/orders/'+OwnerId+'/'+y+'.json',
            function(data){
                console.log(data);
                var currentObj = data.data;
                if(currentObj.length == 0){
                    $('#currentOrders').html('<div class="col-12 bg-white text-center"><img src="'+URL+'images/404.png" class="img-fluid my-5"><h4 class="text-center text-danger">Sorry, No Orders To Display</h4><a href="'+URL+'"><button class="btn btn-outline-secondary py-lg-3 my-5" onclick="window.location="'+URL+'"><h5 class="order_text my-auto">Back To Main Page</h5></button></a></div>');}
                if(UserGroup == 1) {createCurrentOrdersForAdmin(currentObj);}
                else if (UserGroup == 3) {createCurrentOrdersForOwner(currentObj);}
                // window.scrollTo(0, 0);
            });
        });
        

        // adding the next and the previous buttons
        $('<li class="" id="prev_page"><a class="page-link">Prev</a></li>').prependTo('#orders_pagination');
        $('#orders_pagination').append('<li class="" id="next_page"><a class="page-link">Next</a></li>');

        // disabling the previous button when displayoing the first page
        if($('#page_number_1').hasClass("active") == true){
            $('#prev_page').addClass("disabled");
        }

        // disabling the next button whtn displaying the last page
        if($('#page_number_'+number_of_pages).hasClass("active") == true){
            $('#next_page').addClass("disabled");
        }

        // changing to the next page when clicking on the next button
        $('#next_page').click(function(){
            var active_page_string = $('.page-item').filter('.active').attr("page_number");
            var active_page = parseInt(active_page_string);
            $('#page_number_'+(active_page+1)).click();
            for(var x=1 ; x<=number_of_pages ; x++){
            if($('#page_number_1').hasClass('active') == true){
                $()
            }else if($('#page_number_2').hasClass('active') == true){
                $()
            }else if($('#page_number_'+(parseInt(number_of_pages))).hasClass('active') == true){
                $()
            }else if($('#page_number_'+(parseInt(number_of_pages)-1)).hasClass('active') == true){
                $()
            }
            else {
                if(x>=active_page-1 && x<=active_page+3){$('#page_number_'+x).removeClass('d-none');}
                else {$('#page_number_'+x).addClass('d-none')}
            }
            }
        });
        // changing to the previous page when clicking on the previous button
        $('#prev_page').click(function(){
            var active_page_string = $('.page-item').filter('.active').attr("page_number");
            var active_page = parseInt(active_page_string);
            $('#page_number_'+(active_page-1)).click();
            for(var x=1 ; x<=number_of_pages ; x++){
            if($('#page_number_1').hasClass('active') == true){
                $()
            } else if($('#page_number_2').hasClass('active') == true){
                $()
            } else if($('#page_number_'+(parseInt(number_of_pages))).hasClass('active') == true){
                $()
            } else if($('#page_number_'+(parseInt(number_of_pages)-1)).hasClass('active') == true){
                $()
            } else if($('#page_number_'+(parseInt(number_of_pages)-2)).hasClass('active') == true){
                $()
            }
            else {
                if(x>=active_page-3 && x<=active_page+1){$('#page_number_'+x).removeClass('d-none');}
                else {$('#page_number_'+x).addClass('d-none')}
            }
            }
        });
    });

    // display previous orders for "admin" $ "owner"
    $.post("http://localhost/naql/api/Reservations/history/1.json",
    {ownerID :OwnerId, status : 'completed'},
    function(data){
        var obj = data.data;
        $('.postLoading').hide();
        if(obj.length == 0){
            $('#prevOrders').html('<div class="col-12 bg-white text-center"><img src="'+URL+'images/404.png" class="img-fluid my-5"><h4 class="text-center text-danger">Sorry, No Orders To Display</h4><a href="'+URL+'"><button class="btn btn-outline-secondary py-lg-3 my-5" onclick="window.location="'+URL+'"><h5 class="order_text my-auto">Back To Main Page</h5></button></a></div>');}
        if(UserGroup == 1) {createPrevOrdersAdmin(obj);}
        else if (UserGroup == 3) {createPrevOrdersOwner(obj);}
      });

    // number of pages
    $.post("http://localhost/naql/api/Reservations/history/1.json",
    {ownerID: OwnerId, status: 'completed'},
        function(data){
            var number_of_orders = data.count;
            console.log(data)
            // console.log(typeof(number_of_orders));
            var number_of_prev_pages = Math.ceil(number_of_orders/10);
            // console.log("number of pages : " + Math.ceil(number_of_orders/10));

            if(number_of_prev_pages<=5){
              for(var v=1 ; v<=number_of_prev_pages ; v++){
                console.log("number of previous pages = " + number_of_prev_pages);
                  $('#previous_orders_pagination').append('<li class="page-item previous" id="prev_page_number_'+v+'" page_number="'+v+'"><a class="page-link">'+v+'</a></li>');
              }
            }
            else if(number_of_prev_pages>5){
              console.log("number of previous pages = " + number_of_prev_pages);
              for(var v=1 ; v<=5 ; v++){
                  $('#previous_orders_pagination').append('<li class="page-item previous" id="prev_page_number_'+v+'" page_number="'+v+'"><a class="page-link">'+v+'</a></li>');
              }
              // hiding the rest of the pages whose more than 5
              for(var p=6 ; p<=number_of_prev_pages ; v++){
                  $('#previous_orders_pagination').append('<li class="page-item previous d-none" id="prev_page_number_'+v+'" page_number="'+v+'"><a class="page-link">'+v+'</a></li>');
              }
            }

            // activating the first page in the pagination
            $('.page-item.previous:first').addClass("active");

            // clicking on any button of the pagination buttons
            $('.page-item.previous').click(function(){
                $(".page-item.previous").removeClass("active");
                $(this).addClass("active");
                var y = $(this).attr("page_number");
                $.post('http://localhost/naql/api/Reservations/history/'+y+'.json',
                  {ownerID: OwnerId, status: 'completed'},
                  function(data){
                  var obj = data.data;
                  if(obj.length == 0){
                      $('#prevOrders').html('<div class="col-12 bg-white text-center"><img src="'+URL+'images/404.png" class="img-fluid my-5"><h4 class="text-center text-danger">Sorry, No Orders To display</h4><a href="'+URL+'"><button class="btn btn-outline-secondary py-lg-3 my-5" onclick="window.location="'+URL+'"><h5 class="order_text my-auto">Back To Main Page</h5></button></a></div>');}
                      if(UserGroup == 1) {createPrevOrdersAdmin(obj);}
                      else if (UserGroup == 3) {createPrevOrdersOwner(obj);}
                      // window.scrollTo(0, 0);
                  });
            });

            // adding the next and the previous buttons
            $('<li class="previous" id="goto_prev_page"><a class="page-link">Prev</a></li>').prependTo('#previous_orders_pagination');
            $('#previous_orders_pagination').append('<li class="previous" id="goto_next_page"><a class="page-link">Next</a></li>');

            // disabling the previous button when displayoing the first page
            if($('#prev_page_number_1').hasClass("active") == true){
              // console.log("first page is active right now");
              $('#goto_prev_page').addClass("disabled");
            }

            // disabling the next button whtn displaying the last page
            if($('#prev_page_number_'+number_of_prev_pages).hasClass("active") == true){
              // console.log("last page is active right now");
              $('#goto_next_page').addClass("disabled");
            }

            // changing to the next page when clicking on the next button
            $('#goto_next_page').click(function(){
              var active_prev_page_string = $('.page-item.previous').filter('.active').attr("page_number");
              var active_prev_page = parseInt(active_prev_page_string);
              // console.log('active page is '+ $('.page-item').filter('.active').attr("page_number"));
              // console.log(typeof(active_page));
              $('#prev_page_number_'+(active_prev_page+1)).click();
              for(var x=1 ; x<=number_of_prev_pages ; x++){
                if($('#prev_page_number_1').hasClass('active') == true){
                  $()
                }else if($('#prev_page_number_2').hasClass('active') == true){
                  $()
                }else if($('#prev_page_number_'+(parseInt(number_of_prev_pages))).hasClass('active') == true){
                  $()
                }else if($('#prev_page_number_'+(parseInt(number_of_prev_pages)-1)).hasClass('active') == true){
                  $()
                }
                else {
                  if(x>=active_prev_page-1 && x<=active_prev_page+3){$('#prev_page_prev_number_'+x).removeClass('d-none');}
                  else {$('#prev_page_number_'+x).addClass('d-none')}
                }
              }
            });
            // changing to the previous page when clicking on the previous button
            $('#goto_prev_page').click(function(){
              var active_prev_page_string = $('.page-item.previous').filter('.active').attr("page_number");
              var active_prev_page = parseInt(active_prev_page_string);
              // console.log('active page is '+ $('.page-item').filter('.active').attr("page_number"));
              // console.log(typeof(active_page));
              $('#prev_page_number_'+(active_prev_page-1)).click();
              for(var x=1 ; x<=number_of_prev_pages ; x++){
                if($('#prev_page_number_1').hasClass('active') == true){
                  $()
                } else if($('#prev_page_number_2').hasClass('active') == true){
                  $()
                } else if($('#prev_page_number_'+(parseInt(number_of_prev_pages))).hasClass('active') == true){
                  $()
                } else if($('#prev_page_number_'+(parseInt(number_of_prev_pages)-1)).hasClass('active') == true){
                  $()
                } else if($('#prev_page_number_'+(parseInt(number_of_prev_pages)-2)).hasClass('active') == true){
                  $()
                }
                else {
                  if(x>=active_prev_page-3 && x<=active_prev_page+1){$('#prev_page_number_'+x).removeClass('d-none');}
                  else {$('#prev_page_number_'+x).addClass('d-none')}
                }
              }
            });
        });
}
else if(UserGroup == 2) {
    $.post("http://localhost/naql/api/Reservations/talabaty/"+UserId+"/1.json",
    function(data, status){
        var currentObj = data.data;
        if(currentObj.length == 0){
            $('#currentOrders').html('<div class="col-12 bg-white text-center"><img src="'+URL+'images/404.png" class="img-fluid my-5"><h4 class="text-center text-danger">Sorry, No Orders To Display</h4><a href="'+URL+'"><button class="btn btn-outline-secondary py-lg-3 my-5" onclick="window.location="'+URL+'"><h5 class="order_text my-auto">Back To Main Page</h5></button></a></div>');}
        createCurrentOrdersForUser(currentObj);});

        // number of pages
        $.get("http://localhost/naql/api/Reservations/talabaty/"+UserId+"/1.json",
            function(data){
                var number_of_orders = data.count;
                // console.log(typeof(number_of_orders));
                var number_of_pages = Math.ceil(number_of_orders/10);
                // console.log("number of pages : " + Math.ceil(number_of_orders/10));

                if(number_of_pages<=5){
                  console.log("number of pages = " + number_of_pages);
                  for(var p=1 ; p<=number_of_pages ; p++){
                      $('#orders_pagination').append('<li class="page-item" id="page_number_'+p+'" page_number="'+p+'"><a class="page-link">'+p+'</a></li>');
                  }
                }
                else if(number_of_pages>5){
                  console.log("number of pages = " + number_of_pages);
                  for(var p=1 ; p<=5 ; p++){
                      $('#orders_pagination').append('<li class="page-item" id="page_number_'+p+'" page_number="'+p+'"><a class="page-link">'+p+'</a></li>');
                  }
                  // hiding the rest of the pages whose more than 5
                  for(var p=6 ; p<=number_of_pages ; p++){
                      $('#orders_pagination').append('<li class="page-item d-none" id="page_number_'+p+'" page_number="'+p+'"><a class="page-link">'+p+'</a></li>');
                  }
                }

                // activating the first page in the pagination
                $('.page-item:first').addClass("active");

                // clicking on any page number
                $('.page-item').click(function(){
                    $('.page-item').removeClass("active");
                    $(this).addClass("active");
                    var y = $(this).attr("page_number");
                    $.post('http://localhost/naql/api/Reservations/orders/'+OwnerId+'/'+y+'.json',
                    function(data){
                        console.log(data);
                        var currentObj = data.data;
                        if(currentObj.length == 0){
                            $('#currentOrders').html('<div class="col-12 bg-white text-center"><img src="'+URL+'images/404.png" class="img-fluid my-5"><h4 class="text-center text-danger">Sorry, No Orders To Display</h4><a href="'+URL+'"><button class="btn btn-outline-secondary py-lg-3 my-5" onclick="window.location="'+URL+'"><h5 class="order_text my-auto">Back To Main Page</h5></button></a></div>');}
                        createCurrentOrdersForUser(currentObj);
                        // window.scrollTo(0, 0);
                    });
                });

                // adding the next and the previous buttons
                $('<li class="" id="prev_page"><a class="page-link">Prev</a></li>').prependTo('#orders_pagination');
                $('#orders_pagination').append('<li class="" id="next_page"><a class="page-link">Next</a></li>');

                // disabling the previous button when displayoing the first page
                if($('#page_number_1').hasClass("active") == true){
                  // console.log("first page is active right now");
                  $('#prev_page').addClass("disabled");
                }

                // disabling the next button whtn displaying the last page
                if($('#page_number_'+number_of_pages).hasClass("active") == true){
                  // console.log("last page is active right now");
                  $('#next_page').addClass("disabled");
                }

                // changing to the next page when clicking on the next button
                $('#next_page').click(function(){
                  var active_page_string = $('.page-item').filter('.active').attr("page_number");
                  var active_page = parseInt(active_page_string);
                  // console.log('active page is '+ $('.page-item').filter('.active').attr("page_number"));
                  // console.log(typeof(active_page));
                  $('#page_number_'+(active_page+1)).click();
                  for(var x=1 ; x<=number_of_pages ; x++){
                    if($('#page_number_1').hasClass('active') == true){
                      $()
                    }else if($('#page_number_2').hasClass('active') == true){
                      $()
                    }else if($('#page_number_'+(parseInt(number_of_pages))).hasClass('active') == true){
                      $()
                    }else if($('#page_number_'+(parseInt(number_of_pages)-1)).hasClass('active') == true){
                      $()
                    }
                    else {
                      if(x>=active_page-1 && x<=active_page+3){$('#page_number_'+x).removeClass('d-none');}
                      else {$('#page_number_'+x).addClass('d-none')}
                    }
                  }
                });
                // changint to the previous page when clicking on the previous button
                $('#prev_page').click(function(){
                  var active_page_string = $('.page-item').filter('.active').attr("page_number");
                  var active_page = parseInt(active_page_string);
                  // console.log('active page is '+ $('.page-item').filter('.active').attr("page_number"));
                  // console.log(typeof(active_page));
                  $('#page_number_'+(active_page-1)).click();
                  for(var x=1 ; x<=number_of_pages ; x++){
                    if($('#page_number_1').hasClass('active') == true){
                      $()
                    } else if($('#page_number_2').hasClass('active') == true){
                      $()
                    } else if($('#page_number_'+(parseInt(number_of_pages))).hasClass('active') == true){
                      $()
                    } else if($('#page_number_'+(parseInt(number_of_pages)-1)).hasClass('active') == true){
                      $()
                    } else if($('#page_number_'+(parseInt(number_of_pages)-2)).hasClass('active') == true){
                      $()
                    }
                    else {
                      if(x>=active_page-3 && x<=active_page+1){$('#page_number_'+x).removeClass('d-none');}
                      else {$('#page_number_'+x).addClass('d-none')}
                    }
                  }
                });
            });

    // displaying previous orders for "user"
    $.post("http://localhost/naql/api/reservations/history/1.json",
    {userID : UserId, status : 'completed'},
    function(data, status){
        var obj = data.data;
        $('.postLoading').hide();
        if(obj.length == 0){
            $('#prevOrders').html('<div class="col-12 bg-white text-center"><img src="'+URL+'images/404.png" class="img-fluid my-5"><h4 class="text-center text-danger">Sorry, No Orders To Display</h4><a href="'+URL+'"><button class="btn btn-outline-secondary py-lg-3 my-5" onclick="window.location="'+URL+'"><h5 class="order_text my-auto">Back To Main Page</h5></button></a></div>');}
        createPrevOrdersUser(obj);
      });

      // number of pages
      $.post("http://localhost/naql/api/Reservations/history/1.json",
      {userID: UserId, status: 'completed'},
          function(data){
              var number_of_orders = data.count;
              console.log(data)
              // console.log(typeof(number_of_orders));
              var number_of_prev_pages = Math.ceil(number_of_orders/10);
              // console.log("number of pages : " + Math.ceil(number_of_orders/10));

              if(number_of_prev_pages<=5){
                for(var v=1 ; v<=number_of_prev_pages ; v++){
                  console.log("number of previous pages = " + number_of_prev_pages);
                    $('#previous_orders_pagination').append('<li class="page-item previous" id="prev_page_number_'+v+'" page_number="'+v+'"><a class="page-link">'+v+'</a></li>');
                }
              }
              else if(number_of_prev_pages>5){
                for(var v=1 ; v<=5 ; v++){
                    $('#previous_orders_pagination').append('<li class="page-item previous" id="prev_page_number_'+v+'" page_number="'+v+'"><a class="page-link">'+v+'</a></li>');
                }
                // hiding the rest of the pages whose more than 5
                for(var p=6 ; p<=number_of_prev_pages ; v++){
                    $('#previous_orders_pagination').append('<li class="page-item previous d-none" id="prev_page_number_'+v+'" page_number="'+v+'"><a class="page-link">'+v+'</a></li>');
                }
              }

              // activating the first page in the pagination
              $('.page-item.previous:first').addClass("active");

              // clicking on any button of the pagination buttons
              $('.page-item.previous').click(function(){
                $(".page-item.previous").removeClass("active");
                $(this).addClass("active");
                var y = $(this).attr("page_number");
                $.post('http://localhost/naql/api/Reservations/history/'+y+'.json',
                  {ownerID: OwnerId, status: 'completed'},
                  function(data){
                  var obj = data.data;
                  if(obj.length == 0){
                      $('#currentOrders').html('<div class="col-12 bg-white text-center"><img src="'+URL+'images/404.png" class="img-fluid my-5"><h4 class="text-center text-danger">Sorry, No Orders To Display</h4><a href="'+URL+'"><button class="btn btn-outline-secondary py-lg-3 my-5" onclick="window.location="'+URL+'"><h5 class="order_text my-auto">Back To Main Page</h5></button></a></div>');}
                      if(UserGroup == 1) {createPrevOrdersAdmin(obj);}
                      else if (UserGroup == 3) {createPrevOrdersOwner(obj);}
                      // window.scrollTo(0, 0);
                  });
            });

              // adding the next and the previous buttons
              $('<li class="previous" id="goto_prev_page"><a class="page-link">Prev</a></li>').prependTo('#previous_orders_pagination');
              $('#previous_orders_pagination').append('<li class="previous" id="goto_next_page"><a class="page-link">Next</a></li>');

              // disabling the previous button when displayoing the first page
              if($('#prev_page_number_1').hasClass("active") == true){
                // console.log("first page is active right now");
                $('#goto_prev_page').addClass("disabled");
              }

              // disabling the next button whtn displaying the last page
              if($('#prev_page_number_'+number_of_prev_pages).hasClass("active") == true){
                // console.log("last page is active right now");
                $('#goto_next_page').addClass("disabled");
              }

              // changing to the next page when clicking on the next button
              $('#goto_next_page').click(function(){
                var active_prev_page_string = $('.page-item.previous').filter('.active').attr("page_number");
                var active_prev_page = parseInt(active_prev_page_string);
                // console.log('active page is '+ $('.page-item').filter('.active').attr("page_number"));
                // console.log(typeof(active_page));
                $('#prev_page_number_'+(active_prev_page+1)).click();
                for(var x=1 ; x<=number_of_prev_pages ; x++){
                  if($('#prev_page_number_1').hasClass('active') == true){
                    $()
                  }else if($('#prev_page_number_2').hasClass('active') == true){
                    $()
                  }else if($('#prev_page_number_'+(parseInt(number_of_prev_pages))).hasClass('active') == true){
                    $()
                  }else if($('#prev_page_number_'+(parseInt(number_of_prev_pages)-1)).hasClass('active') == true){
                    $()
                  }
                  else {
                    if(x>=active_prev_page-1 && x<=active_prev_page+3){$('#prev_page_number_'+x).removeClass('d-none');}
                    else {$('#prev_page_number_'+x).addClass('d-none')}
                  }
                }
              });
              // changint to the previous page when clicking on the previous button
              $('#goto_prev_page').click(function(){
                var active_prev_page_string = $('.page-item.previous').filter('.active').attr("page_number");
                var active_prev_page = parseInt(active_prev_page_string);
                // console.log('active page is '+ $('.page-item').filter('.active').attr("page_number"));
                // console.log(typeof(active_page));
                $('#prev_page_number_'+(active_prev_page-1)).click();
                for(var x=1 ; x<=number_of_prev_pages ; x++){
                  if($('#prev_page_number_1').hasClass('active') == true){
                    $()
                  } else if($('#prev_page_number_2').hasClass('active') == true){
                    $()
                  } else if($('#prev_page_number_'+(parseInt(number_of_prev_pages))).hasClass('active') == true){
                    $()
                  } else if($('#prev_page_number_'+(parseInt(number_of_prev_pages)-1)).hasClass('active') == true){
                    $()
                  } else if($('#prev_page_number_'+(parseInt(number_of_prev_pages)-2)).hasClass('active') == true){
                    $()
                  }
                  else {
                    if(x>=active_prev_page-3 && x<=active_prev_page+1){$('#prev_page_number_'+x).removeClass('d-none');}
                    else {$('#prev_page_number_'+x).addClass('d-none')}
                  }
                }
              });
          });
    }


// current orders for "admin"
function createCurrentOrdersForAdmin(currentObj) {
    for(var i = 0 ; i < currentObj.length ; i++) {
        $('#currentOrders').append('<div class="container my-3" reservationID="'+ currentObj[i].id+'" id="admin_container'+i+1+'"></div>');
        $('#admin_container'+i+1).html('<div class="row bg-white orderContainer" id="admin_row'+i+1+'"></div>');
        $('#admin_row'+i+1).html('<div class="col-3 my-auto text-left p-1" id="admin_col'+i+3+'"></div>'
            +'<div class="col-5 col-sm-7 text-left my-auto p-0" id="admin_col'+i+2+'"></div>'
            +'<div class="col-4 col-sm-2 my-auto" id="admin_col'+i+1+'"></div>'
            +'<div class="col-12 p-0 m-0"><div id="div'+i+'" class="mapContainer"></div></div>'
            +'<div class="col-12 text-left" id="admin_col'+i+4+'"></div>'
            +'<div class="col-12 text-left" id="admin_col'+i+5+'"></div>'
            +'<div class="col-12 text-left" id="admin_col'+i+6+'"></div>'
            +'<div class="col-12 text-left" id="admin_col'+i+7+'"></div>'
            +'<div class="col-12 text-left"  id="admin_col'+i+9+'"></div>'
            +'<div class="col-12 text-center" id="admin_col'+i+10+'"></div>');
        $('#admin_col'+i+1).html('<img src="'+URL+'images/earth_globe.png" id="map'+i+'" start_lat="'+currentObj[i].start_lat+'" '
            +'start_long="'+currentObj[i].start_long+'" mapContainerID="div'+i+'" alt="Location" class="mapIcon map d-inline"><br>'
            +'<button type="button" class="btn btn-secondary showOffers my-1 px-2 py-1 d-inline" reservationID="'+currentObj[i].id+'">'
            +'<h6 class="my-auto">offers</h6></button>');
        $('#admin_col'+i+2).html('<h5 class="order_main_username"><b>'+currentObj[i].user.username+'</b></h5>'
            +'<h6 class="order_main_orderID">Order Number : <span>'+currentObj[i].id+'</span></h6>');
        $('#admin_col'+i+3).html('<div class="ownerImgContainer text-center">'
            +'<img src="http://naql.codesroots.com/library/profile/'+currentObj[i].user.photo+'" alt="ProfileImage" class="ownerImage"></div>');
        $('#admin_col'+i+4).html('<h6 class="order_text">Date / Time : <span>'+currentObj[i].date+'</span></h6>');
        $('#admin_col'+i+5).html('<h6 class="order_text">Reservation Type : '+currentObj[i].reservation_type.name_en+'</h6>');
        $('#admin_col'+i+6).html('<h6 class="order_text">OrderCreated Since : '
            +Math.floor((currentDate - Date.parse(currentObj[i].created))/(1000*60*60*24))
            +' Day and '
            +Math.floor(((currentDate - Date.parse(currentObj[i].created))%(1000*60*60*24))/(1000*60*60))
            +' Hour </h6>');
        $('#admin_col'+i+7).html('<div class="container m-0 p-0" id="admin_internalContainer'+i+1+'"></div>');
        $('#admin_internalContainer'+i+1).html('<div class="row my-auto m-0 p-0" id="admin_internalRow'+i+1+'"></div>');
        $('#admin_internalRow'+i+1).html('<div class="col-1 text-right m-0 p-0">'
            +'<img src="'+URL+'images/solid-green-circle.png" alt="green bullet" class="circleBullet"></div>'
            +'<div class="col-11 my-1 p-0">'
            +'<h6 class="order_text px-2">Starting Point : <span>'+currentObj[i].start_point+'</span></h6></div>'
            +'<div class="col-1 text-right m-0 p-0">'
            +'<img src="'+URL+'images/red-solid-circle.png" alt="red bullet" class="circleBullet"></div>'
            +'<div class="col-11 my-1 p-0">'
            +'<h6 class="order_text px-2">Destination Point : <span>'+currentObj[i].end_point+'</span></h6></div>');
        $('#admin_col'+i+9).html('<h6 class="order_text bg-light p-2 mx-1">Order Details : '+currentObj[i].description+'</h6>');

        // update the price zone. offer a price or wait customer approval
        var numberOfPrices = currentObj[i].owner_prices.length;
        if(numberOfPrices == 0){
            $('#admin_col'+i+10).html('<hr>'
                +'<h6 class="order_text text-left m-0 p-1">Please Enter The Appropriate Price : </h6>'
                +'<input type="number" class="inputPrice" id="newprice'+i+'">'
                +'<button type="button" class="my-1 p-2 btn btn-secondary sendRequest d-block mx-auto mb-2 my-md-3" '
                +'id="sendRequest'+i+1+'" '
                +'ownerID="'+ OwnerId +'" '
                +'reservationID="'+ currentObj[i].id +'" '
                +'inputID="newprice'+i+'" '
                +'priceContainer="admin_col'+i+10+'">'
                +'<h6 class="order_text my-auto">Send Reservation Request</h6></button>');}
        else {
            for(var ii = 0 ; ii<numberOfPrices ; ii++){
                if(currentObj[i].owner_prices[ii].owner_id == OwnerId){
                    $('#admin_col'+i+10).html('<hr><h6 class="order_text text-center py-2 py-md-4">Waiting Customer Approval</h6>');
                    break;}
                else {
                    $('#admin_col'+i+10).html('<hr>'
                    +'<h6 class="order_text text-left m-0 p-1">Please Enter The Appropriate Price : </h6>'
                    +'<input type="number" class="inputPrice" id="newprice'+i+'">'
                    +'<button type="button" class="my-1 p-2 btn btn-secondary sendRequest d-block mx-auto mb-2 my-md-3" '
                    +'id="sendRequest'+i+1+'" '
                    +'ownerID="'+ OwnerId +'" '
                    +'reservationID="'+ currentObj[i].id +'" '
                    +'inputID="newprice'+i+'" '
                    +'priceContainer="admin_col'+i+10+'">'
                    +'<h6 class="order_text my-auto">Send Reservation Request</h6></button>');
                }
            }
        }
    }

    // add the price offer to the order
    $('.sendRequest').click(function(){
        var clickedButtonID = $(this).attr("id");
        var inputField = $(this).attr("inputID");
        var priceContainer = $(this).attr("priceContainer");
        if(!$('#'+inputField).val()){
            $('#priceResponse').html('<h5 class="order_text text-center my-auto py-3 py-lg-5">Please Enter A correct Price</h5>');
            $('#priceResponse').fadeIn(2000).fadeOut(2000);}
        else if($('#'+inputField).val() < 0) {
            $('#priceResponse').html('<h5 class="order_text text-center my-auto py-3 py-lg-5">Please Enter A Number Greater Than 0</h5>');
            $('#priceResponse').fadeIn(2000).fadeOut(2000);}
        else {
            $.post("http://naql.codesroots.com/api/ownerPrices/add.json",
            {
                owner_id: OwnerId,
                reservation_id: $('#'+clickedButtonID).attr("reservationID"),
                price: $('#'+inputField).val()
            },
            function(status){
                $('#'+priceContainer).html('<hr><h6 class="order_text text-center py-2 py-md-4">Waiting Customer Approval</h6>');});
            }
        });

    // go to the offers of this order
    $('.showOffers').click(function(){
        localStorage.setItem("userGroupID",1);
        localStorage.setItem("offerID",$(this).attr("reservationID"));
        window.location = ''+URL+'owners/offers_En';
    });

    // show or hide the start location on the map
    $('.map').click(function(){
        var mapContainerID = $(this).attr("mapContainerID");
        if($(this).hasClass("clicked")== false){
            $('#'+mapContainerID).show();$(this).addClass("clicked");
            localStorage.setItem("start_lat",$(this).attr("start_lat"));
            localStorage.setItem("start_long",$(this).attr("start_long"));
            localStorage.setItem("mapContainerID",$(this).attr("mapContainerID"));
            $('#'+mapContainerID).html('<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDI7pISFjXEJgcNN9OAJQU4ceVqOBxtYuw&callback=myMap"></script>');}
        else {
            $('#'+mapContainerID).hide();$(this).removeClass("clicked");
        }
    });
}

// current orders for "owner"
function createCurrentOrdersForOwner(currentObj) {
    for(var i = 0 ; i < currentObj.length ; i++) {
        $('#currentOrders').append('<div class="container my-3" id="owner_container'+i+1+'"></div>');
        $('#owner_container'+i+1).html('<div class="row bg-white orderContainer" id="owner_row'+i+1+'"></div>');
        $('#owner_row'+i+1).html('<div class="col-3 my-auto text-center p-1" id="owner_col'+i+3+'"></div>'
            +'<div class="col-6 col-sm-7 text-left my-auto p-0" id="owner_col'+i+2+'"></div>'
            +'<div class="col-3 col-sm-2 my-auto" id="owner_col'+i+1+'"></div>'
            +'<div class="col-12 p-0 m-0"><div id="div'+i+'" class="mapContainer"></div></div>'
            +'<div class="col-12 text-left" id="owner_col'+i+4+'"></div>'
            +'<div class="col-12 text-left" id="owner_col'+i+5+'"></div>'
            +'<div class="col-12 text-left" id="owner_col'+i+6+'"></div>'
            +'<div class="col-12 text-left" id="owner_col'+i+7+'"></div>'
            +'<div class="col-12 text-left" id="owner_col'+i+8+'"></div>'
            +'<div class="col-12 text-left"  id="owner_col'+i+9+'"></div>'
            +'<div class="col-12 text-center" id="owner_col'+i+10+'"></div>');
        $('#owner_col'+i+1).html('<img src="'+URL+'images/earth_globe.png" id="map'+i+'" start_lat="'+currentObj[i].start_lat+'" '
            +'start_long="'+currentObj[i].start_long+'" mapContainerID="div'+i+'" alt="Location" class="mapIcon map d-inline">');
        $('#owner_col'+i+2).html('<h5 class="order_main_username"><b>'+currentObj[i].user.username+'</b></h5>'
            +'<h6 class="order_main_orderID">Order Number : <span>'+currentObj[i].id+'</span></h6>'
            +'<h6 class="order_text">Machine Type : <span>'+currentObj[i].machine_detail.name_en+'</span></h6>');
        $('#owner_col'+i+3).html('<div class="ownerImgContainer">'
            +'<img src="http://naql.codesroots.com/library/profile/'+currentObj[i].user.photo+'" alt="ProfileImage" class="ownerImage"></div>');
        $('#owner_col'+i+4).html('<h6 class="order_text">Date / Time : <span>'+currentObj[i].date+'</span></h6>');
        $('#owner_col'+i+5).html('<h6 class="order_text">Reservation Type : '+currentObj[i].reservation_type.name_en+'</h6>');
        $('#owner_col'+i+6).html('<h6 class="order_text">Order Created Since : '
            +Math.floor((currentDate - Date.parse(currentObj[i].created))/(1000*60*60*24))
            +' Day and '
            +Math.floor(((currentDate - Date.parse(currentObj[i].created))%(1000*60*60*24))/(1000*60*60))
            +' Hour </h6>');
        $('#owner_col'+i+7).html('<div class="container m-0 p-0" id="owner_internalContainer'+i+1+'"></div>');
        $('#owner_internalContainer'+i+1).html('<div class="row my-auto m-0 p-0" id="owner_internalRow'+i+1+'"></div>');
        $('#owner_internalRow'+i+1).html('<div class="col-1 text-right m-0 p-0">'
            +'<img src="'+URL+'images/solid-green-circle.png" alt="green bullet" class="circleBullet"></div>'
            +'<div class="col-11 m-0 p-0">'
            +'<h6 class="order_text px-2">Starting Point : <span>'+currentObj[i].start_point+'</span></h6></div>'
            +'<div class="col-1 text-right m-0 p-0"><img src="'+URL+'images/red-solid-circle.png" alt="red bullet" class="circleBullet"></div>'
            +'<div class="col-11 m-0 p-0"><h6 class="order_text px-2">Destination Point : <span>'+currentObj[i].end_point+'</span></h6></div>');
        $('#owner_col'+i+9).html('<h6 class="order_text bg-light p-2 mx-1">Order Details : '+currentObj[i].description+'</h6>');

        // update the price zone. offer a price or wait customer approval
        var numberOfPrices = currentObj[i].owner_prices.length;
        if(numberOfPrices == 0){
            $('#owner_col'+i+10).html('<hr>'
                +'<h6 class="order_text text-left m-0 p-1">Please Enter The Appropriate Price : </h6>'
                +''
                +'<input type="number" class="inputPrice" id="newprice'+i+'">'
                +'<button type="button" class="my-1 p-2 btn btn-secondary sendRequest d-block mx-auto mb-2 my-md-3" '
                +'id="sendRequest'+i+1+'" '
                +'ownerID="'+ OwnerId +'" '
                +'reservationID="'+ currentObj[i].id +'" '
                +'inputID="newprice'+i+'" '
                +'priceContainer="owner_col'+i+10+'">'
                +'<h6 class="order_text my-auto">Send Reservation Order</h6></button>');}
        else {
            for(var ii = 0 ; ii<numberOfPrices ; ii++){
                if(currentObj[i].owner_prices[ii].owner_id == OwnerId){
                    $('#owner_col'+i+10).html('<hr><h6 class="order_text text-center py-2 py-md-4">Waiting Customer Approval</h6>');
                    break;}
                else {
                    $('#owner_col'+i+10).html('<hr>'
                    +'<h6 class="order_text text-left m-0 p-1">Please Enter The Appropriate Price : </h6>'
                    +''
                    +'<input type="number" class="inputPrice" id="newprice'+i+'">'
                    +'<button type="button" class="my-1 p-2 btn btn-secondary sendRequest d-block mx-auto mb-2 my-md-3" '
                    +'id="sendRequest'+i+1+'" '
                    +'ownerID="'+ OwnerId +'" '
                    +'reservationID="'+ currentObj[i].id +'" '
                    +'inputID="newprice'+i+'" '
                    +'priceContainer="owner_col'+i+10+'">'
                    +'<h6 class="order_text my-auto">Send Reservation Order</h6></button>');
                }
            }
        }
    }

    // add the price offer to the order
    $('.sendRequest').click(function(){
        var clickedButtonID = $(this).attr("id");
        var inputField = $(this).attr("inputID");
        var priceContainer = $(this).attr("priceContainer");
        if(!$('#'+inputField).val()){
            $('#priceResponse').html('<h5 class="order_text text-center my-auto py-3 py-lg-5">Please Enter A correct Price</h5>');
            $('#priceResponse').fadeIn(2000).fadeOut(2000);}
        else if($('#'+inputField).val() < 0) {
            $('#priceResponse').html('<h5 class="order_text text-center my-auto py-3 py-lg-5">Please Enter A Number Greater Than 0</h5>');
            $('#priceResponse').fadeIn(2000).fadeOut(2000);}
        else {
            $.post("http://naql.codesroots.com/api/ownerPrices/add.json",
            {
                owner_id: OwnerId,
                reservation_id: $('#'+clickedButtonID).attr("reservationID"),
                price: $('#'+inputField).val()
            },
            function(status){
                $('#'+priceContainer).html('<hr><h6 class="order_text text-center py-2 py-md-4">Waiting Customer Approval</h6>');});
            }
        });

    // show or hide the start location on the map
    $('.map').click(function(){
        var mapContainerID = $(this).attr("mapContainerID");
        if($(this).hasClass("clicked")==false){
            $('#'+mapContainerID).show();$(this).addClass("clicked");
            localStorage.setItem("start_lat",$(this).attr("start_lat"));
            localStorage.setItem("start_long",$(this).attr("start_long"));
            localStorage.setItem("mapContainerID",$(this).attr("mapContainerID"));
            $('#'+mapContainerID).html('<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDI7pISFjXEJgcNN9OAJQU4ceVqOBxtYuw&callback=myMap"></script>');}
        else {
            $('#'+mapContainerID).hide();$(this).removeClass("clicked");
        }
    });
}

// current orders for "user"
function createCurrentOrdersForUser(currentObj) {
    for(var i = 0 ; i < currentObj.length ; i++) {
        $('#currentOrders').append('<div class="container my-3" id="user_container'+i+1+'"></div>');
        $('#user_container'+i+1).html('<div class="row bg-white orderContainer user_order_Container" reservationID="'+ currentObj[i].id+'" id="user_row'+i+1+'"></div>');
        $('#user_row'+i+1).html('<div class="col-3 my-auto text-center p-1" id="user_col'+i+3+'"></div>'
            +'<div class="col-6 col-sm-7 text-left my-auto p-0" id="user_col'+i+2+'"></div>'
            +'<div class="col-3 col-sm-2 my-auto" id="user_col'+i+1+'"></div>'
            +'<div class="col-12 p-0 m-0"><div id="div'+i+'" class="mapContainer"></div></div>'
            +'<div class="col-12 text-left" id="user_col'+i+4+'"></div>'
            +'<div class="col-12 text-left" id="user_col'+i+5+'"></div>'
            +'<div class="col-12 text-left" id="user_col'+i+6+'"></div>'
            +'<div class="col-12 text-left" id="user_col'+i+7+'"></div>'
            +'<div class="col-12 text-left" id="user_col'+i+8+'"></div>'
            +'<div class="col-12 text-left"  id="user_col'+i+9+'"></div>');
        $('#user_col'+i+1).html('<img src="'+URL+'images/earth_globe.png" id="map'+i+'" start_lat="'+currentObj[i].start_lat+'" '
            +'start_long="'+currentObj[i].start_long+'" mapContainerID="div'+i+'" alt="Location" class="mapIcon map d-inline">');
        $('#user_col'+i+2).html('<h5 class="order_main_username"><b>'+currentObj[i].machine_detail.name_en+'</b></h5>'
            +'<h6 class="order_main_orderID">Order Number : <span>'+currentObj[i].id+'</span></h6>');
        $('#user_col'+i+3).html('<div class="ownerImgContainer text-center">'
            +'<img src="http://naql.codesroots.com/library/machine/'+currentObj[i].machine_detail.machine_photo+'" '
            +'alt="ProfileImage" class="ownerImage"></div>');
        $('#user_col'+i+4).html('<h6 class="order_text">Date / Time : <span>'+currentObj[i].date+'</span></h6>');
        $('#user_col'+i+5).html('<h6 class="order_text">Reservation Type : '+currentObj[i].reservation_type.name_en+'</h6>');
        $('#user_col'+i+6).html('<h6 class="order_text">Order Created Since : '
            +Math.floor((currentDate - Date.parse(currentObj[i].created))/(1000*60*60*24))
            +' Day and '
            +Math.floor(((currentDate - Date.parse(currentObj[i].created))%(1000*60*60*24))/(1000*60*60))
            +' Hour </h6>');
        $('#user_col'+i+7).html('<div class="container m-0 p-0" id="user_internalContainer'+i+1+'"></div>');
        $('#user_internalContainer'+i+1).html('<div class="row m-0 p-0" id="user_internalRow'+i+1+'"></div>');
        $('#user_internalRow'+i+1).html('<div class="col-1 text-right m-0 p-0">'
            +'<img src="'+URL+'images/solid-green-circle.png" alt="green bullet" class="circleBullet"></div>'
            +'<div class="col-11 my-1 p-0">'
            +'<h6 class="order_text px-2">Starting Point : <span>'+currentObj[i].start_point+'</span></h6></div>'
            +'<div class="col-1 text-right m-0 p-0"><img src="'+URL+'images/red-solid-circle.png" alt="red bullet" class="circleBullet"></div>'
            +'<div class="col-11 my-1 p-0"><h6 class="order_text px-2">Destination Point : <span>'+currentObj[i].end_point+'</span></h6></div>');
        $('#user_col'+i+9).html('<h6 class="order_text bg-light p-2 mx-1">Order Details : '+currentObj[i].description+'</h6>');
    }

    // show or hide the start location on the map
    $('.map').click(function(){
        mapClicked = 1;
        var mapContainerID = $(this).attr("mapContainerID");
        if($(this).hasClass("clicked")==false){
            $('#'+mapContainerID).show();$(this).addClass("clicked");
            localStorage.setItem("start_lat",$(this).attr("start_lat"));
            localStorage.setItem("start_long",$(this).attr("start_long"));
            localStorage.setItem("mapContainerID",$(this).attr("mapContainerID"));
            $('#'+mapContainerID).html('<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDI7pISFjXEJgcNN9OAJQU4ceVqOBxtYuw&callback=myMap"></script>');}
        else {
            $('#'+mapContainerID).hide();$(this).removeClass("clicked");
        }
    });

    // as a user, click on the order body to go to the offers of this order
    $('.user_order_Container').click(function(){
        if(mapClicked==1){
            mapClicked = 0;}
        else {
            localStorage.setItem("userGroupID",2);
            localStorage.setItem("offerID",$(this).attr("reservationID"));
            window.location = ''+URL+'owners/offers_En';
        }
    });
}

// previous orders for "admin"
function createPrevOrdersAdmin(obj){
    for(var i = 0 ; i<obj.length ; i++){
        $('#prevOrders').append('<div class="container my-3" id="container'+i+1+'"></div>');
        $('#container'+i+1).html('<div class="row bg-white orderContainer" id="row'+i+1+'"></div>');
        $('#row'+i+1).html('<div class="col-3 col-sm-2 my-auto text-center p-1" id="col'+i+4+'"></div>'
            +'<div class="col-6 col-sm-7 text-left my-auto p-0" id="col'+i+3+'"></div>'
            +'<div class="col-3 my-auto" id="col'+i+2+'"></div>'
            +'<div class="col-12 p-0 m-0"><div id="prev_div_'+i+'" class="mapContainer"></div></div>'
            +'<div class="col-12 my-2" id="col'+i+5+'"></div>'
            +'<div class="col-12 col-lg-6 text-left"  id="col'+i+6+'"></div>'
            +'<div class="col-12 col-lg-6 text-left"  id="col'+i+7+'"></div>'
            +'<div class="col-12 text-left"  id="col'+i+8+'"></div>'
            +'<div class="col-12" id="col'+i+9+'"></div>');
        $('#col'+i+2).html('<img src="'+URL+'images/earth_globe.png" id="prev_map'+i+'" start_lat="'+obj[i].start_lat+'" '
            +'start_long="'+obj[i].start_long+'" mapContainerID="prev_div_'+i+'" alt="Location" class="mapIcon map d-inline">');
        $('#col'+i+3).html('<h5 class="order_main_username"><b>'+obj[i].user.username+'</b></h5>');
        $('#col'+i+4).html('<div class="ownerImgContainer text-center">'
            +'<img src="http://naql.codesroots.com/library/profile/'+obj[i].user.photo+'" alt="ProfileImage" class="ownerImage"></div>');
        $('#col'+i+5).html('<div class="container p-0 m-0" id="internalContainerPrev'+i+1+'"></div>');
        $('#internalContainerPrev'+i+1).html('<div class="row my-auto m-0 p-0" id="internalRowPrev'+i+1+'"></div>');
        $('#internalRowPrev'+i+1).html('<div class="col-1 text-right m-0 p-0">'
            +'<img src="'+URL+'images/solid-green-circle.png" alt="green bullet" class="circleBullet"></div>'
            +'<div class="col-11 text-left my-1 p-0">'
            +'<h6 class="order_text px-2">Starting Point : <span>'+obj[i].start_point+'</span></h6></div>'
            +'<div class="col-1 text-right m-0 p-0"><img src="'+URL+'images/red-solid-circle.png" alt="red bullet" class="circleBullet"></div>'
            +'<div class="col-11 text-left my-1 p-0"><h6 class="order_text px-2">Destination Point : <span>'+obj[i].end_point+'</span></h6></div>');
        $('#col'+i+6).html('<h6 class="order_text">Reservation Type : '+obj[i].reservation_type.name_en+'</h6>');
        $('#col'+i+7).html('<h6 class="order_text">Date / time : <span>'+obj[i].date+'</span></h6>');
        $('#col'+i+8).html('<h6 class="order_text text-left bg-light p-2 mx-1">Order Details : '+obj[i].description+'</h6><hr>');
        $('#col'+i+9).html('<div class="container m-0 p-0" id="internalContainer'+i+1+'"></div>');
        $('#internalContainer'+i+1).html('<div class="row m-0 p-0" id="internalRow'+i+1+'"></div>');
        $('#internalRow'+i+1).html('<div class="col-2 text-right m-0 p-0" id="internalCol'+i+3+'"></div>'
            +'<div class="col-10 text-left my-auto" id="internalCol'+i+2+'"></div>');
        $('#internalCol'+i+2).html('<h6 class="order_text py-1">Delivery Price : <span>'+obj[i].price+'</span></h6>');
        $('#internalCol'+i+3).html('<img src="'+URL+'images/dollar.png" alt="price" class="dollarSign my-auto">');
    }

    // show or hide the start location on the map
    $('.map').click(function(){
        var mapContainerID = $(this).attr("mapContainerID");
        if($(this).hasClass("click") == true){
            $('#'+mapContainerID).show();$(this).addClass("click");
            localStorage.setItem("start_lat",$(this).attr("start_lat"));
            localStorage.setItem("start_long",$(this).attr("start_long"));
            localStorage.setItem("mapContainerID",$(this).attr("mapContainerID"));
            $('#'+mapContainerID).html('<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDI7pISFjXEJgcNN9OAJQU4ceVqOBxtYuw&callback=myMap"></script>');}
        else {
            $('#'+mapContainerID).hide();$(this).removeClass("click");
        }
    });
}

//previous orders for "owner"
function createPrevOrdersOwner(obj) {
    for(var i = 0 ; i < obj.length ; i++){
        $('#prevOrders').append('<div class="container my-3" id="container'+i+1+'"></div>');
        $('#container'+i+1).html('<div class="row bg-white orderContainer" id="row'+i+1+'"></div>');
        $('#row'+i+1).html('<div class="col-3 col-sm-2 my-auto text-center p-1" id="col'+i+4+'"></div>'
            +'<div class="col-6 col-sm-7 text-left my-auto p-0" id="col'+i+3+'"></div>'
            +'<div class="col-3 my-auto" id="col'+i+2+'"></div>'
            +'<div class="col-12 p-0 m-0"><div id="prev_div_'+i+'" class="mapContainer"></div></div>'
            +'<div class="col-12 my-2" id="col'+i+5+'"></div>'
            +'<div class="col-12 col-lg-6 text-left" id="col'+i+6+'"></div>'
            +'<div class="col-12 col-lg-6 text-left" id="col'+i+7+'"></div>'
            +'<div class="col-12 text-left" id="col'+i+8+'"></div>'
            +'<div class="col-12" id="col'+i+9+'"></div>');
        $('#col'+i+2).html('<img src="'+URL+'images/earth_globe.png" '
        +'id="prev_map'+i+'" start_lat="'+obj[i].start_lat+'" start_long="'+obj[i].start_long+'" '
        +'mapContainerID="prev_div_'+i+'" alt="Location" class="mapIcon map d-inline">');
        $('#col'+i+3).html('<h5 class="order_main_username"><b>'+ obj[i].user.username +'</b></h5>');
        $('#col'+i+4).html('<div class="ownerImgContainer text-center">'
            +'<img src="http://naql.codesroots.com/library/profile/'+obj[i].user.photo+'" alt="ProfileImage" class="ownerImage"></div>');
        $('#col'+i+5).html('<div class="container p-0 m-0" id="internalContainerPrev'+i+1+'"></div>');
        $('#internalContainerPrev'+i+1).html('<div class="row my-auto m-0 p-0" id="internalRowPrev'+i+1+'"></div>');
        $('#internalRowPrev'+i+1).html('<div class="col-1 text-right m-0 p-0">'
            +'<img src="'+URL+'images/solid-green-circle.png" alt="green bullet" class="circleBullet"></div>'
            +'<div class="col-11 text-left my-1 p-0">'
            +'<h6 class="order_text px-2">Starting Point : <span>'+obj[i].start_point+'</span></h6></div>'
            +'<div class="col-1 text-right m-0 p-0"><img src="'+URL+'images/red-solid-circle.png" alt="red bullet" class="circleBullet"></div>'
            +'<div class="col-11 text-left my-1 p-0"><h6 class="order_text px-2">Destination Point : <span>'+obj[i].end_point+'</span></h6></div>');
        $('#col'+i+6).html('<h6 class="order_text">Reservation Type : '+obj[i].reservation_type.name_en+'</h6>');
        $('#col'+i+7).html('<h6 class="order_text">Date / Time : <span>'+obj[i].date+'</span></h6>');
        $('#col'+i+8).html('<h6 class="order_text text-right bg-light p-2 mx-1">Orders Details : '+obj[i].description+'</h6><hr>');
        $('#col'+i+9).append('<div class="container m-0 p-0" id="internalContainer'+i+1+'"></div>');
        $('#internalContainer'+i+1).html('<div class="row m-0 p-0" id="internalRow'+i+1+'"></div>');
        $('#internalRow'+i+1).html('<div class="col-2 text-right m-0 p-0" id="internalCol'+i+2+'"></div>'
            +'<div class="col-10 text-left my-auto" id="internalCol'+i+3+'"></div>');
        $('#internalCol'+i+3).html('<h6 class="order_text py-1">Price : <span>'+obj[i].price+'</span></h6>');
        $('#internalCol'+i+2).html('<img src="'+URL+'images/dollar.png" alt="price" class="dollarSign my-auto">');
    }

    // show or hide the start location on the map
    $('.map').click(function(){
        var mapContainerID = $(this).attr("mapContainerID");
        if($(this).hasClass("click")== true){
            $('#'+mapContainerID).show();$(this).addClass("click");
            localStorage.setItem("start_lat",$(this).attr("start_lat"));
            localStorage.setItem("start_long",$(this).attr("start_long"));
            localStorage.setItem("mapContainerID",$(this).attr("mapContainerID"));
            $('#'+mapContainerID).html('<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDI7pISFjXEJgcNN9OAJQU4ceVqOBxtYuw&callback=myMap"></script>');}
        else {
            $('#'+mapContainerID).hide();$(this).removeClass("click");
        }
    });
}

// previous orders for "user"
function createPrevOrdersUser (obj){
    for(var i = 0 ; i < obj.length ; i++){
        $('#prevOrders').append('<div class="container my-3" id="container'+i+1+'"></div>');
        $('#container'+i+1).html('<div class="row bg-white orderContainer" id="row'+i+1+'"></div>');
        $('#row'+i+1).html('<div class="col-3 col-sm-2 my-auto text-center p-1" id="col'+i+2+'"></div>'
            +'<div class="col-6 col-sm-7 text-left my-auto" id="col'+i+3+'"></div>'
            +'<div class="col-3 my-auto" id="col'+i+4+'"></div>'
            +'<div class="col-12 p-0 m-0"><div id="prev_div_'+i+'" class="mapContainer"></div></div>'
            +'<div class="col-12 my-2" id="col'+i+5+'"></div>'
            +'<div class="col-12 col-lg-6 text-left"  id="col'+i+6+'"></div>'
            +'<div class="col-12 col-lg-6 text-left"  id="col'+i+7+'"></div>'
            +'<div class="col-12 text-left"  id="col'+i+8+'"></div>'
            +'<div class="col-12" id="col'+i+9+'"></div>');
        $('#col'+i+4).html('<img src="'+URL+'images/inf.png" alt="" ownerID="'+obj[i].owner.id+'" machine_detail_id="'
            +obj[i].machine_detail_id+'" class="infoIcon driver_info pr-1">'
            +'<img src="'+URL+'images/earth_globe.png" '
            +'id="prev_map'+i+'" start_lat="'+obj[i].start_lat+'" start_long="'+obj[i].start_long+'" '
            +'mapContainerID="prev_div_'+i+'" alt="Location" class="mapIcon map d-inline">');
        $('#col'+i+3).html('<h5 class="order_main_username m-0 p-0"><b>'+ obj[i].owner.user.username +'</b></h5>'
            +'<div class="container"><div class="row">'
            +'<div class="col-12 text-left p-0 m-0" dir="rtl" id="userRatingArea'+i+'" stars="'+obj[i].owner.rates[0].stars+'" '
            +'countOdRating="'+obj[i].owner.rates[0].count+'">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'</div>'
            +'<div class="col-12 m-0 p-0">'
            +'<p class="order_text p-0 m-0">(rated by <span>'+obj[i].owner.rates[0].count+'</span> customers)</p>'
            +'</div></div></div>'
            +'<h6 class="order_text">order number : '+ obj[i].id +'</h6>');
        $('#col'+i+2).html('<div class="ownerImgContainer text-center">'
            +'<img src="http://naql.codesroots.com/library/profile/'+obj[i].owner.user.photo+'" '
            +'alt="ProfileImage" class="ownerImage"></div>');
        $('#col'+i+5).html('<div class="container p-0 m-0" id="internalContainerPrev'+i+1+'"></div>');
        $('#internalContainerPrev'+i+1).html('<div class="row my-auto m-0 p-0" id="internalRowPrev'+i+1+'"></div>');
        $('#internalRowPrev'+i+1).html('<div class="col-1 text-right m-0 p-0">'
            +'<img src="'+URL+'images/solid-green-circle.png" alt="green bullet" class="circleBullet"></div>'
            +'<div class="col-11 text-left my-1 p-0">'
            +'<h6 class="order_text px-2">Starting Point : <span>'+obj[i].start_point+'</span></h6></div>'
            +'<div class="col-1 text-right m-0 p-0"><img src="'+URL+'images/red-solid-circle.png" alt="red bullet" class="circleBullet"></div>'
            +'<div class="col-11 text-left my-1 p-0"><h6 class="order_text px-2">Destination Point : <span>'+obj[i].end_point+'</span></h6></div>');
        $('#col'+i+6).html('<h6 class="order_text">Rerservation Type : '+obj[i].reservation_type.name_en+'</h6>');
        $('#col'+i+7).html('<h6 class="order_text">Date / Time : <span>'+obj[i].date+'</span></h6>');
        $('#col'+i+8).html('<h6 class="order_text text-left bg-light p-2 mx-1">Order Details : '+obj[i].description+'</h6><hr>');
        $('#col'+i+9).append('<div class="container m-0 p-0" id="internalContainer'+i+1+'"></div>');
        $('#internalContainer'+i+1).html('<div class="row m-0 p-0" id="internalRow'+i+1+'"></div>');
        $('#internalRow'+i+1).html('<div class="col-2 text-right my-auto py-1" id="internalCol'+i+4+'"></div>'
            +'<div class="col-8 text-left my-auto" id="internalCol'+i+3+'"></div>'
            +'<div class="col-2 text-left my-auto" id="internalCol'+i+1+'"></div>');
        $('#internalCol'+i+1).html('<img src="'+URL+'images/okSign.png" class="ratingIcon okSign" '
            +'id="okSign-'+i+1+'" orderID="'+obj[i].id+'" ownerName="'+obj[i].owner.user.username+'" orderDate=" '+obj[i].date+'" '
            +'ownerID="'+obj[i].owner_id+'" ownerPhoto="'+obj[i].owner.user.photo+'" startPoint="'+obj[i].start_point+'" '
            +'endPoint="'+obj[i].end_point+'" userID="'+obj[i].user_id+'" alt="like">');
        $('#internalCol'+i+3).html('<h6 class="order_text py-1 my-auto">Delivery Price : <span>'+obj[i].price+'</span></h6>');
        $('#internalCol'+i+4).html('<img src="'+URL+'images/dollar.png" alt="price" class="dollarSign my-auto">');
        ratingOwner('userRatingArea'+i);
    }

    // rate this owner
    $('.okSign').click(function(){
        localStorage.setItem("UserId",$(this).attr("userID"));
        localStorage.setItem("OwnerId",$(this).attr("ownerID"));
        localStorage.setItem("ownerName",$(this).attr("ownerName"));
        localStorage.setItem("orderID",$(this).attr("orderID"));
        localStorage.setItem("orderDate",$(this).attr("orderDate"));
        localStorage.setItem("ownerPhoto",$(this).attr("ownerPhoto"));
        localStorage.setItem("orderStartPoint",$(this).attr("startPoint"));
        localStorage.setItem("orderEndPoint",$(this).attr("endPoint"));
        window.location = ""+URL+"owners/rating_En";
    });

    // go to the driver info
    $('.driver_info').click(function(){
        OwnerId = $(this).attr("ownerID");
        localStorage.setItem("OwnerId", $(this).attr("ownerID"));
        console.log(localStorage.getItem("OwnerId"));
        localStorage.setItem("machine_detail_id", $(this).attr("machine_detail_id"));
        console.log(localStorage.getItem("machine_detail_id"));
        window.location = ""+URL+"owners/driverdetails_en";
    });

    // show or hide the start location on the map
    $('.map').click(function(){
        var mapContainerID = $(this).attr("mapContainerID");
        if($(this).hasClass("click")== true){
            $('#'+mapContainerID).show();$(this).addClass("click");
            localStorage.setItem("start_lat",$(this).attr("start_lat"));
            localStorage.setItem("start_long",$(this).attr("start_long"));
            localStorage.setItem("mapContainerID",$(this).attr("mapContainerID"));
            $('#'+mapContainerID).html('<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDI7pISFjXEJgcNN9OAJQU4ceVqOBxtYuw&callback=myMap"></script>');}
        else {
            $('#'+mapContainerID).hide();$(this).removeClass("click");
        }
    });
}
