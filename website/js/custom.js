/*global $, alert, console*/
/*this frore mini navbar for xs screen*/

$(document).ready(function () {
    /*butons img when u clik chang bkg-color*/
    $("label").click(function () {

        //$(".img-dw").show();
       // $(".img-dw").show();$(this).siblings().removeClass("img-dw");   
       
        $(".img-dw").addClass("activ-laple");
      $(this).siblings().removeClass("activ-laple");

        /*this belong img click to another img*/

    });
});