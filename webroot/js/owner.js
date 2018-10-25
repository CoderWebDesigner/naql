$('.postLoading').show();

var currentDateObj = new Date();
var currentDate = Date.parse(currentDateObj);
var OwnerId = localStorage.getItem('OwnerId');
var UserId =  localStorage.getItem('UserId');
var UserGroup = localStorage.getItem('UserGroup');
var URL = "http://localhost/naql/";

// language choice
$('#lang_form').change(function(){
    if($('#lang_form').val() == 1){window.location = URL+"owners/driverdetails"}
    else if ($('#lang_form').val() == 2){window.location = URL+"owners/driverdetails_en"}
});

console.log("owner id " + OwnerId);
console.log("machine detail id " + localStorage.getItem("machine_detail_id"));

$('#commentsButton').click(function(){
    $('#comments').show();
    $('#aboutPerson').hide();
    $('#commentsButton').css('border-bottom', '03px #ffad33 solid');
    $('#aboutPersonButton').css('border-bottom', '03px #fff solid');
    $('#commentsButton').find('h5').addClass('text-warning');
    $('#aboutPersonButton').find('h5').removeClass('text-warning');
});

$('#aboutPersonButton').click(function(){
    $('#comments').hide();
    $('#aboutPerson').show();
    $('#aboutPersonButton').css('border-bottom', '03px #ffad33 solid');
    $('#commentsButton').css('border-bottom', '03px #fff solid');
    $('#aboutPersonButton').find('h5').addClass('text-warning');
    $('#commentsButton').find('h5').removeClass('text-warning');
});

$.get("http://naql.codesroots.com/api/owners/ownerInfo/"+OwnerId+"/"+localStorage.getItem("machine_detail_id")+".json",function(data , status){
    $('.postLoading').hide();
    var commentObj = data.comments;
    viewComments(commentObj);
});

$.get("http://naql.codesroots.com/api/owners/ownerInfo/"+OwnerId+"/"+localStorage.getItem("machine_detail_id")+".json",function(data , status){
    $('.postLoading').hide();
    var ownerObj = data.data;
    ownerInfo(ownerObj);
});

function ownerInfo (ownerObj) {
    $('#ownerName').html(ownerObj[0].user.username);
    $('#ownerPhoto').attr("src","http://naql.codesroots.com/library/profile/"+ownerObj[0].user.photo);
    if (ownerObj[0].rates.length == 0){
        $('#howManyCustomerRated').html(0);
        $('#userRatingArea').html('<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
            +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">');}
    else {
        $('#howManyCustomerRated').html(ownerObj[0].rates[0].count);
        var numberOfStars = ownerObj[0].rates[0].stars;
        var numberOfUserRated = ownerObj[0].rates[0].count;
        var starsToShow = Math.round(numberOfStars / numberOfUserRated);

        if(starsToShow>0 && starsToShow<=1){
            $('#userRatingArea').html('<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">');
        } if(starsToShow>1 && starsToShow<=2){
            $('#userRatingArea').html('<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">');
        } if(starsToShow>2 && starsToShow<=3){
            $('#userRatingArea').html('<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">');
        } if(starsToShow>3 && starsToShow<=4){
            $('#userRatingArea').html('<img src="'+URL+'images/emptyRating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">');
        } if(starsToShow>4) {
            $('#userRatingArea').html('<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">'
                +'<img src="'+URL+'images/rating.png" alt="rating" class="userRating2">');
        }
    }
    // display the owner description
    $('#aboutPerson').html('<div class="col-12 text-center my-3"><p class="order_text my-3 py-3">'+ownerObj[0].description+'</p></div>');

    // machine photos in carousel
    if(ownerObj[0].machine_owners.length == 0){
        $('.carousel').parent().addClass("text-center py-5").html('<img src="'+URL+'images/no_photos_available.jpg" alt="machine photo" class="img-fluid text-center"><h2 class="order_text text-danger py-2">لا يوجد صور لمعدات المالك حالياً</h2>');
    }
    else if(ownerObj[0].machine_owners[0].machine_photos.length == 0){
        $('.carousel').parent().addClass("text-center py-5").html('<img src="'+URL+'images/no_photos_available.jpg" alt="machine photo" class="img-fluid text-center"><h2 class="order_text text-danger py-2">لا يوجد صور لمعدات المالك حالياً</h2>');
    }else {
	    console.log("number of photos " + ownerObj[0].machine_owners[0].machine_photos.length)
        for(var n = 0 ; n<ownerObj[0].machine_owners[0].machine_photos.length ; n++){
            $('.carousel-inner').html('<div class="carousel-item active">'
            +'<img src="http://naql.codesroots.com/library/machineOwners/'+ownerObj[0].machine_owners[0].machine_photos[n].photo+'" alt="">');
            $('.carousel-indicators').html('<li data-target="#demo" data-slide-to="'+n+1+'"></li>')
        }
        $('.carousel').addClass("slide");
    }
}

function viewComments(commentObj){
    if(commentObj.length == 0){
        $('#comments').html('<div class="col-12 text-center py-5"><h5 class="order_text">لا يوجد تعليق من أي عميل بعد</h5></div>');}
    else {
        for(var m = 0 ; m < commentObj.length ; m++){
            $('#comments').append('<div class="col-4" id="col-' + m+1 + '"></div>'
                +'<div class="col-6 text-right" dir="rtl" id="col-' + m+2 + '"></div>'
                +'<div class="col-2 text-center m-0 p-0" id="col-' + m+3 + '"></div>');
            $('#col-' + m+1).html('<h5 class="user_comment_time py-2" dir="rtl">'
                 + Math.floor((currentDate - Date.parse(commentObj[m].created))/(1000*60*60*24))
                 + ' يوم و '
                 + Math.floor(((currentDate - Date.parse(commentObj[m].created))%(1000*60*60*24))/(1000*60*60))
                 + ' ساعة </h5>');
            $('#col-' + m+2).html('<h5 class="comment_username">' + commentObj[m].user.username + '</h5>'
                +'<p class="user_comment">' + commentObj[m].comment + '</p>');
            $('#col-' + m+3).html('<div class="ownerImgContainer text-center">\n\
                <img src="'+URL+'/images/customer.png" class="ownerImage comment_profile_image" alt="profile image"></div>');
        }
    }
}

$('#backButton').click(function(){
    window.history.back();
});
