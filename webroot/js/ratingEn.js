$('.postLoading').show();

$('#ownerName').html(localStorage.getItem("ownerName"));
$('#orderID').html(localStorage.getItem("orderID"));
$('#orderDate').html(localStorage.getItem("orderDate"));
$('#ownerImage').attr("src","http://naql.codesroots.com/library/profile/" + localStorage.getItem("ownerPhoto"));
$('#startPoint').html(localStorage.getItem("orderStartPoint"));
$('#endPoint').html(localStorage.getItem("orderEndPoint"));
$('.postLoading').hide();

var ratingArray = [0, 0, 0, 0, 0];
var OwnerId = localStorage.getItem('OwnerId');
var UserId =  localStorage.getItem('UserId');
var UserGroup = localStorage.getItem('UserGroup');
var URL = "http://www.localhost/naql/";

// language choice
$('#lang_form').change(function(){
    if($('#lang_form').val() == 1){window.location = URL+"owners/rating"}
    else if ($('#lang_form').val() == 2){window.location = URL+"owners/rating_en"}    
});

function resetRatingArray(){
    ratingArray = [0, 0, 0, 0, 0];
    $('#rating1').attr("src",""+URL+"images/emptyRating.png");
    $('#rating2').attr("src",""+URL+"images/emptyRating.png");
    $('#rating3').attr("src",""+URL+"images/emptyRating.png");
    $('#rating4').attr("src",""+URL+"images/emptyRating.png");
    $('#rating5').attr("src",""+URL+"images/emptyRating.png");
}

$('#rating1').click(function(){
    if(ratingArray.includes(1)){resetRatingArray();}
    else {ratingArray[0] = 1;
        $('#rating1').attr("src",""+URL+"images/rating.png");
        localStorage.setItem("userRate",1);}
});

$('#rating2').click(function(){
    if(ratingArray.includes(1)){resetRatingArray();}
    else {ratingArray[0] = 1;ratingArray[1] =1;
        $('#rating1').attr("src",""+URL+"images/rating.png");
        $('#rating2').attr("src",""+URL+"images/rating.png");
        localStorage.setItem("userRate",2);}
});

$('#rating3').click(function(){
    if(ratingArray.includes(1)){resetRatingArray();}
    else {ratingArray[0] = 1;ratingArray[1] =1;ratingArray[2] = 1;
        $('#rating1').attr("src",""+URL+"images/rating.png");
        $('#rating2').attr("src",""+URL+"images/rating.png");
        $('#rating3').attr("src",""+URL+"images/rating.png");
        localStorage.setItem("userRate",3);}
});

$('#rating4').click(function(){
    if(ratingArray.includes(1)){resetRatingArray();}
    else {ratingArray[0] = 1;ratingArray[1] =1;ratingArray[2] = 1;ratingArray[3] = 1;
        $('#rating1').attr("src",""+URL+"images/rating.png");
        $('#rating2').attr("src",""+URL+"images/rating.png");
        $('#rating3').attr("src",""+URL+"images/rating.png");
        $('#rating4').attr("src",""+URL+"images/rating.png");
        localStorage.setItem("userRate",4);}
});

$('#rating5').click(function(){
    if(ratingArray.includes(1)){resetRatingArray();}
    else {ratingArray[0] = 1;ratingArray[1] =1;ratingArray[2] = 1;ratingArray[3] = 1;ratingArray[4] = 1;
        $('#rating1').attr("src",""+URL+"images/rating.png");
        $('#rating2').attr("src",""+URL+"images/rating.png");
        $('#rating3').attr("src",""+URL+"images/rating.png");
        $('#rating4').attr("src",""+URL+"images/rating.png");
        $('#rating5').attr("src",""+URL+"images/rating.png");
        localStorage.setItem("userRate",5);}
});

if(!ratingArray.includes(1)){
    localStorage.setItem("userRate",0);
}

$('#rating1').hover(
    function(){
        if(!ratingArray.includes(1)){
            $('#rating1').attr("src",""+URL+"images/emptyRatingHover.png");
        }
    },
    function(){
        if(!ratingArray.includes(1)){
            $('#rating1').attr("src",""+URL+"images/emptyRating.png");
        }
    });

$('#rating2').hover(
    function(){
        if(!ratingArray.includes(1)){
            $('#rating1').attr("src",""+URL+"images/emptyRatingHover.png");
            $('#rating2').attr("src",""+URL+"images/emptyRatingHover.png");
        }
        
},
    function(){
        if(!ratingArray.includes(1)){
            $('#rating1').attr("src",""+URL+"images/emptyRating.png");
            $('#rating2').attr("src",""+URL+"images/emptyRating.png");
        }
});

$('#rating3').hover(
    function(){
        if(!ratingArray.includes(1)){
            $('#rating1').attr("src",""+URL+"images/emptyRatingHover.png");
            $('#rating2').attr("src",""+URL+"images/emptyRatingHover.png");
            $('#rating3').attr("src",""+URL+"images/emptyRatingHover.png");
        }
},
    function(){
        if(!ratingArray.includes(1)){
            $('#rating1').attr("src",""+URL+"images/emptyRating.png");
            $('#rating2').attr("src",""+URL+"images/emptyRating.png");
            $('#rating3').attr("src",""+URL+"images/emptyRating.png");
        }
});

$('#rating4').hover(
    function(){
        if(!ratingArray.includes(1)){
            $('#rating1').attr("src",""+URL+"images/emptyRatingHover.png");
            $('#rating2').attr("src",""+URL+"images/emptyRatingHover.png");
            $('#rating3').attr("src",""+URL+"images/emptyRatingHover.png");
            $('#rating4').attr("src",""+URL+"images/emptyRatingHover.png");
        }
},
    function(){
        if(!ratingArray.includes(1)){
            $('#rating1').attr("src",""+URL+"images/emptyRating.png");
            $('#rating2').attr("src",""+URL+"images/emptyRating.png");
            $('#rating3').attr("src",""+URL+"images/emptyRating.png");
            $('#rating4').attr("src",""+URL+"images/emptyRating.png");
        }
        
});

$('#rating5').hover(
    function(){
        if(!ratingArray.includes(1)){
            $('#rating1').attr("src",""+URL+"images/emptyRatingHover.png");
            $('#rating2').attr("src",""+URL+"images/emptyRatingHover.png");
            $('#rating3').attr("src",""+URL+"images/emptyRatingHover.png");
            $('#rating4').attr("src",""+URL+"images/emptyRatingHover.png");
            $('#rating5').attr("src",""+URL+"images/emptyRatingHover.png");
        }
},
    function(){
        if(!ratingArray.includes(1)){
            $('#rating1').attr("src",""+URL+"images/emptyRating.png");
            $('#rating2').attr("src",""+URL+"images/emptyRating.png");
            $('#rating3').attr("src",""+URL+"images/emptyRating.png");
            $('#rating4').attr("src",""+URL+"images/emptyRating.png");
            $('#rating5').attr("src",""+URL+"images/emptyRating.png");
        }       
});

var commentedBefore = 0;
$('#sendRating').click(function(){
    console.log(OwnerId);
    $('.postLoading').show();
    $.get("http://naql.codesroots.com/api/owners/ownerInfo/"+OwnerId+".json",
        function(data){
            var checkObj = data.comments;
            for(var x = 0 ; x<checkObj.length ; x++){
                if(checkObj[x].user_id == UserId){                    
                    commentedBefore = 1;
                    break;
                }
            }
            if (commentedBefore == 1) {
                $('.postLoading').hide();
                $('#ratingResponse').html('<h5 class="text-center p-2 p-lg-5 my-auto">you already rated before</h5>');
                $('#ratingResponse').fadeIn(2000).fadeOut(2000);
                setTimeout(function(){window.location = URL+"owners/myordersen"}, 4000);
            }else {
                if(localStorage.getItem("userRate") == 0) {
                    $('.postLoading').hide();
                    $('#ratingResponse').html('<h5 class="order_text text-center p-2 p-lg-5 my-auto">kindly enter a correct rating</h5>');
                    $('#ratingResponse').fadeIn(2000).fadeOut(2000);
                }
                else {
                    if($('#userComment').val() == ""){
                        $('.postLoading').hide();
                        $('#ratingResponse').html('<h5 class="order_text text-center p-2 p-lg-5 my-auto">kindly enter a correct comment</h5>');
                        $('#ratingResponse').fadeIn(2000).fadeOut(2000);
                    }
                    else {
                        $.post("http://naql.codesroots.com/api/rates/add.json",
                        {
                            user_id: UserId,
                            star: localStorage.getItem("userRate"),
                            comment: $('#userComment').val(),
                            owner_id: OwnerId
                        },
                        function(data , status){
                            $('.postLoading').hide();
                            $('#ratingResponse').html('<h5 class="order_text text-center p-2 p-lg-5 my-auto">Rating added successfully</h5>');
                            $('#ratingResponse').fadeIn(2000).fadeOut(2000);
                            setTimeout(function(){window.location = URL+"owners/myordersen"}, 4000);
                        });
                    }
                }
            }
        }
    );
    
});

$('#backButton').click(function(){
    window.history.back();
});