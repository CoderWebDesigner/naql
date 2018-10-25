<!DOCTYPE html>

<?php
//debug($owner);
$ownerid = $owner[0]["id"];
$user_id = $this->UserAuth->getUserId();
$groupid = $this->UserAuth->getGroupId();
?>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="html tabs">
    <meta name="keywords" content="HTML,CSS,JavaScript">
    <meta name="author" content="Ahmed Shehatah">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="<?=URL?>css/task.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body class="bg-lighter">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="container-fluid p-0 m-0">
    <div class="row bg-dark-yellow border-bottom p-1 m-0">
        <div class="col-7 my-auto">
            <form class="d-inline" id="language_form">
                <select id="lang_form">
                    <option value="1">عربي</option>
                    <option value="2">English</option>
                </select>
            <form>
            <h6 class="d-inline text-dark">اللغة</h6>
        </div>
        <div class="col-5 text-right my-auto">
            <a href="http://www.youtube.com" target="_blank">
                <img src="<?=URL?>images/youtube_icon.png" alt="youtube icon" class="lang_bar_icon">
            </a>
            <a href="http://www.twitter.com" target="_blank">
                <img src="<?=URL?>images/twitter_icon.png" alt="twitter icon" class="lang_bar_icon">
            </a>
            <a href="http://www.facebook.com" target="_blank">
                <img src="<?=URL?>images/facebook_icon.png" alt="facebook icon" class="lang_bar_icon">
            </a>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg bg-yellow border-bottom m-0 p-0">
  <!-- Brand/logo -->
  <a class="navbar-brand ml-md-5 pl-md-5 m-0 p-0" href="<?=URL?>">
    <img src="<?=URL?>images/Naql-logo-Final.png" alt="logo" class="navbar_image">
  </a>

<!-- Toggler/collapsibe Button -->
<button class="navbar-toggler my-auto" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <img src="<?=URL?>images/menu3.png" class="navbar_collapse_image">
</button>

  <!-- Links -->
<div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
  <ul class="navbar-nav text-right" dir="rtl">
    <li class="nav-item m-md-3">
      <a class="nav-link" href="<?=URL?>">الرئيسية</a>
    </li>
    <li class="nav-item m-md-3">
      <a class="nav-link" href="<?=URL?>owners/aboutus">عن نقل</a>
    </li>
    <li class="nav-item m-md-3">
      <a class="nav-link" href="<?=URL?>owners/contactus">تواصل معنا</a>
    </li>
    <li class="nav-item m-md-3">
      <a class="nav-link" href="<?=URL?>login">التسجيل</a>
    </li>
    <li class="nav-item m-md-3">
      <a class="nav-link" href="<?=URL?>owners/myorders">طلباتي</a>
    </li>
  </ul>
</div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 bg-yellow my-auto">
            <h2 class="text-center text-dark page_title">الطلبات</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-6 text-center my-auto bg-white" id="prevOrdersBtn">
            <h5 class="text-secondary m-0 py-2 main_page_selectors">طلبات سابقة</h5>
        </div>
        <div class="col-6 text-center my-auto bg-white" id="currentOrdersBtn">
            <h5 class="text-warning m-0 py-2 main_page_selectors">طلبات حالية</h5>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
      <div class="col-12">
        <div class="postLoading">
            <div class="loading-img">
                <img src="<?=URL?>images/loader_img.jpg" alt="loader_img">
            </div>
        </div>
        <div class="col-12 text-center bg-lighter m-0" id="currentOrders"></div>
        <div class="col-12 text-center bg-lighter m-0" id="prevOrders"></div>
    </div>
  </div>
</div>


<!-- the validation for the price that the owner and the admin enters -->
<div id="priceResponse"></div>

<!-- the pagination for the orders -->
<ul class="pagination justify-content-center" dir="rtl" id="orders_pagination"></ul>

<!-- the pagination for the previous orders -->
<ul class="d-none flex-row pagination previous justify-content-center" dir="rtl" id="previous_orders_pagination"></ul>


<script>
if  ("<?=$ownerid?>" != ""){
    localStorage.setItem('OwnerId',<?=$ownerid?>)
    }
    localStorage.setItem('UserId',<?=$user_id?>)
    localStorage.setItem('UserGroup',<?=$groupid?>)
</script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="<?=URL?>/js/task.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
