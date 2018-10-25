$(document).ready(function () {
    $('.postLoading').hide();
})

$(function () {
    //page title
    if ($('html')[0].lang == 'ar') {
        $(document).attr("title", "دخول");
    } else {
        $(document).attr("title", "Log In");
    }
});