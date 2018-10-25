
$('.postLoading').show();

// declaring login variables
var UserGroup = localStorage.getItem('UserGroup');
if (UserGroup == 2) {localStorage.removeItem("OwnerId")}
else {var OwnerId = localStorage.getItem('OwnerId');}
var UserId =  localStorage.getItem('UserId');
var URL = "http://localhost/naql/";

$('img').on("error",function(){
  console.log('error has been detected');
  $(this).attr("src",URL+"images/image_not_found.png");
});

// language choice
$('#lang_form').change(function(){
    if($('#lang_form').val() == 1){window.location = URL+"owners/offers"}
    else if ($('#lang_form').val() == 2){window.location = URL+"owners/offers_en"}
});

console.log("offer id = " , localStorage.getItem("offerID"));
console.log("owner id = " , OwnerId);

var orderLink = "http://naql.codesroots.com/api/ownerPrices/getAllOffers/"+localStorage.getItem("offerID") +".json";
$.get(orderLink,
    function(data, status){
        $('.postLoading').hide();
        var offersObj = data;
        viewOffers(offersObj);
    }
);

function viewOffers(offersObj){
    for(var i = 0 ; i < offersObj.data.length ; i++) {
        if(UserGroup == 1){
            if(offersObj.data[i].admin_approved == 0){
                console.log("owner id for this offer = " + offersObj.data[i].owner.id);
                $('#showOffers').append('<div class="container my-3 removeid" id="container'+i+1+'"></div>');
                $('#container'+i+1).html('<div class="row bg-white orderContainer" id="row'+i+1+'"></div>');
                $('#row'+i+1).html('<div class="col-2 my-auto text-center p-1" id="col'+i+2+'"></div>'
                    +'<div class="col-7 col-md-8 text-right my-auto p-0" id="col'+i+3+'"></div>'
                    +'<div class="col-3 col-md-2 my-auto" id="col'+i+4+'"></div>'
                    +'<div class="col-9 col-md-10 text-right my-auto" dir="rtl" id="col'+i+5+'"></div>'
                    +'<div class="col-3 col-md-2 text-center m-0 p-0" dir="rtl" id="col'+i+6+'"></div>'
                    +'<div class="col-4 col-sm-3 text-center" dir="rtl" id="col'+i+9+'"></div>'
                    +'<div class="col-5 col-sm-6 col-md-7 my-auto p-0 text-right" dir="rtl" id="col'+i+7+'"></div>'
                    +'<div class="col-3 col-md-2 text-center my-auto" dir="rtl" id="col'+i+8+'"></div>');
                $('#col'+i+2).html('<img src="'+URL+'images/inf.png" alt="" ownerID="'+offersObj.data[i].owner.id+'" machine_detail_id="'+offersObj.reservation[0].machine_detail_id+'" class="infoIcon driver_info pr-1">');
                $('#col'+i+3).html('<h5 class="order_main_username m-0 p-0 pt-2">'+offersObj.data[i].owner.user.username+'</h5>'
                        +'<div class="container"><div class="row"><div class="col-12 p-0 m-0" id="userRatingArea'+i+'" stars="'+offersObj.data[i].owner.rates[0].stars+'" countOdRating="'+offersObj.data[i].owner.rates[0].count+'">'
                        +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                        +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                        +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                        +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                        +'</div>'
                        +'<div class="col-12 m-0 p-0">'
                        +'<p class="order_text p-0 m-0 mb-2">(من <span>'+offersObj.data[i].owner.rates[0].count+'</span> عميل)</p>'
                        +'</div></div></div>');
                $('#col'+i+4).html('<div class="ownerImgContainer text-center"><img src="http://naql.codesroots.com/library/profile/'+offersObj.data[i].owner.user.photo +'" alt="owner image" class="ownerImage"></div>');
                $('#col'+i+5).html('<h6 class="order_text">'+offersObj.reservation[0].machine_detail.name+'</h6>');
                $('#col'+i+6).html('<img src="http://naql.codesroots.com/library/machine/'+ offersObj.reservation[0].machine_detail.machine_photo+'" alt="machine image" class="offer_machine_photo">');
                $('#col'+i+7).html('<h6 class="order_text py-1 my-auto">السعر : <span>'+offersObj.data[i].price+'</span></h6>');
                $('#col'+i+8).html('<img src="'+URL+'images/dollar.png" alt="dollar" class="dollarSign">');
                $('#col'+i+9).html('<button type="button" class="btn btn-warning my-1 p-2 sendApproval" offerID="'+offersObj.data[i].id +'" containerID="container'+i+1+'"><h6 class="order_text my-auto">موافق</h6></button>');
                ratingOwner('userRatingArea'+i);
            }

            $('.sendApproval').click(function(){
                $('.postLoading').show();
                     var containerID = $(this).parents('.removeid').fadeOut(500)
                console.log($(this).attr("offerID"));
                $.ajax({
                    type: 'PUT',
                    dataType: 'json',
                    url: 'http://naql.codesroots.com/api/ownerPrices/edit/'+ $(this).attr("offerID") +'.json',
                    data: {"admin_approved": 1},
                    success : function approvalSent(containerID) {
                        $('.postLoading').hide();
                    //    $('#'+containerID).hide();
                    }
                });
            });


        // go to the driver info
        $('.driver_info').click(function(){
            OwnerId = $(this).attr("ownerID");
            localStorage.setItem("OwnerId", $(this).attr("ownerID"));
            console.log(localStorage.getItem("OwnerId"));
            localStorage.setItem("machine_detail_id", $(this).attr("machine_detail_id"));
            console.log(localStorage.getItem("machine_detail_id"));
            window.location = ""+URL+"owners/driverdetails";
        });
        }
        if(UserGroup == 2){
            if(offersObj.priceApproved == "admin"){
                if(offersObj.data[i].admin_approved == 1){
                    console.log("owner id for this offer = " + offersObj.data[i].owner.id);
                    $('#showOffers').append('<div class="container my-3 removeid" id="container'+i+1+'"></div>');
                    $('#container'+i+1).html('<div class="row bg-white orderContainer" id="row'+i+1+'"></div>');
                    $('#row'+i+1).html('<div class="col-2 my-auto text-center p-1" id="col'+i+2+'"></div>'
                        +'<div class="col-7 col-md-8 text-right my-auto p-0" id="col'+i+3+'"></div>'
                        +'<div class="col-3 col-md-2 my-auto" id="col'+i+4+'"></div>'
                        +'<div class="col-9 col-md-10 text-right my-auto" dir="rtl" id="col'+i+5+'"></div>'
                        +'<div class="col-3 col-md-2 text-center m-0 p-0" dir="rtl" id="col'+i+6+'"></div>'
                        +'<div class="col-4 col-sm-3 text-center" dir="rtl" id="col'+i+9+'"></div>'
                        +'<div class="col-5 col-sm-6 col-md-7 my-auto p-0 text-right" dir="rtl" id="col'+i+7+'"></div>'
                        +'<div class="col-3 col-md-2 text-center my-auto" dir="rtl" id="col'+i+8+'"></div>');
                    $('#col'+i+2).html('<img src="'+URL+'images/inf.png" alt="" ownerID="'+offersObj.data[i].owner.id+'" machine_detail_id="'+offersObj.reservation[0].machine_detail_id+'" class="infoIcon driver_info pr-1">');
                    $('#col'+i+3).html('<h5 class="order_main_username m-0 p-0 pt-2">'+offersObj.data[i].owner.user.username+'</h5>'
                            +'<div class="container"><div class="row"><div class="col-12 p-0 m-0" id="userRatingArea'+i+'" stars="'+offersObj.data[i].owner.rates[0].stars+'" countOdRating="'+offersObj.data[i].owner.rates[0].count+'">'
                            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                            +'</div>'
                            +'<div class="col-12 m-0 p-0">'
                            +'<p class="order_text p-0 m-0 mb-2">(من <span>'+offersObj.data[i].owner.rates[0].count+'</span> عميل)</p>'
                            +'</div></div></div>');
                    $('#col'+i+4).html('<div class="ownerImgContainer text-center"><img src="http://naql.codesroots.com/library/profile/'+offersObj.data[i].owner.user.photo +'" alt="owner image" class="ownerImage"></div>');
                    $('#col'+i+5).html('<h6 class="order_text">'+offersObj.reservation[0].machine_detail.name+'</h6>');
                    $('#col'+i+6).html('<img src="http://naql.codesroots.com/library/machine/'+ offersObj.reservation[0].machine_detail.machine_photo+'" alt="machine image" class="offer_machine_photo">');
                    $('#col'+i+7).html('<h6 class="order_text py-1 my-auto">السعر : <span>'+offersObj.data[i].price+'</span></h6>');
                    $('#col'+i+8).html('<img src="'+URL+'images/dollar.png" alt="dollar" class="dollarSign">');
                    $('#col'+i+9).html('<button type="button" class="btn btn-warning my-1 p-2 sendApproval" offerID="'+offersObj.data[i].id +'" containerID="container'+i+1+'"><h6 class="order_text my-auto">موافق</h6></button>');
                    ratingOwner('userRatingArea'+i);
                }
                $('.sendApproval').click(function(){
                    $('.postLoading').show();
                     var containerID = $(this).parents('.container').hide()
                    console.log($(this).attr("offerID"));
                    $.ajax({
                        type: 'PUT',
                        dataType: 'json',
                        url: 'http://naql.codesroots.com/api/ownerPrices/edit/'+ $(this).attr("offerID") +'.json',
                        data: {"status": "approved"},
                        success : function approvalSent() {
                            $('.postLoading').hide();
                        //    $('#'+containerID).hide();
                            window.location = URL+"owners/myorders";
                        }
                    });
                });


              // go to the driver info
        $('.driver_info').click(function(){
            OwnerId = $(this).attr("ownerID");
            localStorage.setItem("OwnerId", $(this).attr("ownerID"));
            console.log(localStorage.getItem("OwnerId"));
            localStorage.setItem("machine_detail_id", $(this).attr("machine_detail_id"));
            console.log(localStorage.getItem("machine_detail_id"));
            window.location = ""+URL+"owners/driverdetails";
        });
            }
            else {
                console.log("owner id for this offer = " + offersObj.data[i].owner.id);
                $('#showOffers').append('<div class="container my-3 removeid" id="container'+i+1+'"></div>');
                $('#container'+i+1).html('<div class="row bg-white orderContainer" id="row'+i+1+'"></div>');
                $('#row'+i+1).html('<div class="col-2 my-auto text-center p-1" id="col'+i+2+'"></div>'
                    +'<div class="col-7 col-md-8 text-right my-auto p-0" id="col'+i+3+'"></div>'
                    +'<div class="col-3 col-md-2 my-auto" id="col'+i+4+'"></div>'
                    +'<div class="col-9 col-md-10 text-right my-auto" dir="rtl" id="col'+i+5+'"></div>'
                    +'<div class="col-3 col-md-2 text-center m-0 p-0" dir="rtl" id="col'+i+6+'"></div>'
                    +'<div class="col-4 col-sm-3 text-center" dir="rtl" id="col'+i+9+'"></div>'
                    +'<div class="col-5 col-sm-6 col-md-7 my-auto p-0 text-right" dir="rtl" id="col'+i+7+'"></div>'
                    +'<div class="col-3 col-md-2 text-center my-auto" dir="rtl" id="col'+i+8+'"></div>');
                $('#col'+i+2).html('<img src="'+URL+'images/inf.png" alt="" ownerID="'+offersObj.data[i].owner.id+'" machine_detail_id="'+offersObj.reservation[0].machine_detail_id+'" class="infoIcon driver_info pr-1">');
                $('#col'+i+3).html('<h5 class="order_main_username m-0 p-0 pt-2">'+offersObj.data[i].owner.user.username+'</h5>'
                        +'<div class="container"><div class="row"><div class="col-12 p-0 m-0" id="userRatingArea'+i+'" stars="'+offersObj.data[i].owner.rates[0].stars+'" countOdRating="'+offersObj.data[i].owner.rates[0].count+'">'
                        +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                        +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                        +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                        +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                        +'</div>'
                        +'<div class="col-12 m-0 p-0">'
                        +'<p class="order_text p-0 m-0 mb-2">(من <span>'+offersObj.data[i].owner.rates[0].count+'</span> عميل)</p>'
                        +'</div></div></div>');
                $('#col'+i+4).html('<div class="ownerImgContainer text-center"><img src="http://naql.codesroots.com/library/profile/'+offersObj.data[i].owner.user.photo +'" alt="owner image" class="ownerImage"></div>');
                $('#col'+i+5).html('<h6 class="order_text">'+offersObj.reservation[0].machine_detail.name+'</h6>');
                $('#col'+i+6).html('<img src="http://naql.codesroots.com/library/machine/'+ offersObj.reservation[0].machine_detail.machine_photo+'" alt="machine image" class="offer_machine_photo">');
                $('#col'+i+7).html('<h6 class="order_text py-1 my-auto">السعر : <span>'+offersObj.data[i].price+'</span></h6>');
                $('#col'+i+8).html('<img src="'+URL+'images/dollar.png" alt="dollar" class="dollarSign">');
                $('#col'+i+9).html('<button type="button" class="btn btn-warning my-1 p-2 sendApproval" offerID="'+offersObj.data[i].id +'" containerID="container'+i+1+'"><h6 class="order_text my-auto">موافق</h6></button>');
                ratingOwner('userRatingArea'+i);
            }
            $('.sendApproval').click(function(){
                $('.postLoading').show();
                     var containerID = $(this).parents('.container').hide()
                console.log($(this).attr("offerID"));
                $.ajax({
                    type: 'PUT',
                    dataType: 'json',
                    url: 'http://naql.codesroots.com/api/ownerPrices/edit/'+ $(this).attr("offerID") +'.json',
                    data: {"status": "approved"},
                    success : function approvalSent(containerID) {
                        $('.postLoading').hide();
                      //  $('#'+containerID).hide();
                        window.location = URL+"owners/myorders";
                    }
                });
            });

         // go to the driver info
        $('.driver_info').click(function(){
            OwnerId = $(this).attr("ownerID");
            localStorage.setItem("OwnerId", $(this).attr("ownerID"));
            console.log(localStorage.getItem("OwnerId"));
            localStorage.setItem("machine_detail_id", $(this).attr("machine_detail_id"));
            console.log(localStorage.getItem("machine_detail_id"));
            window.location = ""+URL+"owners/driverdetails";
        });
        }
    }
    if ($('#showOffers').is(':empty')) {
        $('#showOffers').html('<div class="col-12 bg-white text-center"><img src="'+URL+'images/404.png" class="img-fluid my-5"><h3 class="text-center text-danger">لا يوجد عروض حالياً</h3><a href="'+URL+'owners/myorders"><button class="btn btn-outline-secondary py-lg-3 my-5" ><h5 class="order_text my-auto">العودة للصفحة الرئيسية</h5></button></a></div>');
    }

}
function ratingOwner(id){
    var stars = $('#'+id).attr("stars");
    var count = $('#'+id).attr("countOdRating");
    var starsToShow = Math.round(stars / count);
    if(starsToShow>0 && starsToShow<=1){
        $('#'+id).html('<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">');
    } if(starsToShow>1 && starsToShow<=2){
        $('#'+id).html('<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">');
    } if(starsToShow>2 && starsToShow<=3){
        $('#'+id).html('<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">');
    } if(starsToShow>3 && starsToShow<=4){
        $('#'+id).html('<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">');
    } if(starsToShow>4) {
        $('#'+id).html('<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">');
    }
}


$('#backButton').click(function(){
    window.history.back();
});
