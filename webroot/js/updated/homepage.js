$(function () {
    //page title
    if ($('html')[0].lang == 'ar') {
        $(document).attr("title", "الرئيسية");
    } else {
        $(document).attr("title", "Home");
    }
    //change to english
    var URL = "http://localhost/naql/"
    $('#language').change(function () {
        if ($('#language').val() == 1) {
            window.location = URL + 'owners/homepage';
        } else {
            window.location = URL + 'owners/homepageen';
        }
    });
    //plugins
    new WOW().init();
    $('#slider').nivoSlider({
        controlNav: false,
        prevText: '<div class="controls control-left"><i class="fas fa-angle-left"></i></div>',
        nextText: '<div class="controls control-right"><i class="fas fa-angle-right"></i></div>',
    });
    //Code for Add Facebook page
    (function (d, s, id) {
        var js,
            fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12";
        fjs.parentNode.insertBefore(js, fjs);
    })(document, "script", "facebook-jssdk");
})