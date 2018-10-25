<!DOCTYPE html>

<?php
//debug($owner);
$ownerid = $owner[0]["id"];
$user_id = $owner[0]["user_id"];
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
<div class="container-fluid p-0 m-0">
    <div class="row bg-dark-yellow border-bottom p-1 m-0">
        <div class="col-7 my-auto">
            <form class="d-inline" id="language_form">
                <select class="" id="lang_form">
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
<nav class="navbar navbar-expand-md bg-yellow border-bottom m-0 p-0">
  <!-- Brand/logo -->
  <a class="navbar-brand ml-md-5 pl-md-5 m-0 p-0" href="<?=URL?>">
    <img src="<?=URL?>images/Naql-logo-Final.png" alt="logo" class="navbar_image">
  </a>

<!-- Toggler/collapsibe Button -->
<button class="navbar-toggler my-auto" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <img src="<?=URL?>images/menu3.png" class="navbar_collapse_image">
</button>

  <!-- Links -->
<div class="collapse navbar-collapse justify-content-end mr-md-5 pr-md-3" id="collapsibleNavbar">
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
    <div class="col-12">
      <div class="postLoading">
        <div class="loading-img">
          <img src="<?=URL?>images/loader_img.jpg" alt="loader_img">
        </div>
      </div>
    </div>
  </div><div class="row bg-yellow">
        <div class="col-12 text-center my-auto py-2">
            <img src="<?=URL?>images/back4.png" alt="back button" class="my-2 float-left" id="backButton">
            <h6 class="text-center text-dark offers_page_title">التقييم</h6>
        </div>
    </div>
</div>
<div class="container bg-white">
    
    <div class="row p-0 m-0">
        <div class="col-12 text-center p-0 m-0">
            <h5 class="order_main_username py-3" id="ownerName"></h5>
        </div>
    </div>
    <div class="row p-0 m-0">
        <div class="col-12 text-center p-0 m-0">
            <h5 class="order_main_username pb-3" dir="rtl">رقم الطلب : <span id="orderID"></span></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h5 class="order_main_username" id="orderDate"></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center my-auto ">
            <img src="<?=URL?>images/ratingConnection.jpg" alt="rating connection" class="img-fluid">
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-6 text-center my-auto">
            <h5 class="order_main_username" id="startPoint"></h5>
        </div>
        <div class="col-6 text-center my-auto">
            <h5 class="order_main_username" id="endPoint"></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <hr>
            <div id="ownerImageContainer">
                <img src="<?=URL?>images/account.png" alt="account image" id="ownerImage">
            </div>
        </div>
        <div class="col-12 text-center">
            <h4 class="order_main_username">من فضلك قم بالتقييم حسب مدى رضاءك</h4>
        </div>
        <div class="col-12 text-center">
            <img src="<?=URL?>images/emptyRating.png" alt="rating" class="userRating" id="rating5">
            <img src="<?=URL?>images/emptyRating.png" alt="rating" class="userRating" id="rating4">
            <img src="<?=URL?>images/emptyRating.png" alt="rating" class="userRating" id="rating3">
            <img src="<?=URL?>images/emptyRating.png" alt="rating" class="userRating" id="rating2">
            <img src="<?=URL?>images/emptyRating.png" alt="rating" class="userRating" id="rating1">
            <hr>
        </div>
        <div class="col-12 mb-2">
            <form>
                <textarea class="form-control" placeholder="اكتب تعليق ..." rows="7" dir="rtl" id="userComment"></textarea>
            </form>
        </div>
        <div class="col-12 text-center mb-5">
            <button class="btn btn-warning my-1 p-2 d-block mx-auto font-weight-bold" id="sendRating"><h6 class="order_text my-auto">ارسل</h6></button>
        </div>
    </div>
</div>

<div id="ratingResponse"></div>

<!-- footer -->
<footer class="m-0 p-0">
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
        <div class="contact-us col-md-4 col-sm-12">
            <img src="http://localhost/naql/img/Naql-logo-Final.png" alt="footer logo" class="img-fluid">
            <ul class="text-left">
                <li class="text-dark">
                    <a href="http://localhost/naql/owners/aboutus">عن نقل</a></li>
                <li class="text-dark">
                    <a href="http://localhost/naql/owners/contactus">تواصل معنا</a></li>
                <li class="text-dark">
                    <a href="http://localhost/naql/owners/aboutus">شروط واحكام</a></li>
            </ul>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="contact-us text-center justify-content-center">
                <h5 class="text-dark">صفحتنا علي الفيس بوك</h5>
                <div class="facebook-page">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FLiverpoolFC%2F&tabs=timeline&width=250&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="250" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="contact-us text-center justify-content-center">
                <h5 class="text-dark">صفحتنا علي الانستجرام</h5>
                <!-- InstaWidget -->
                <div class="instgramPge">
                    <!-- InstaWidget -->
                    <a href="https://instawidget.net/v/user/amrdiab" id="link-130f82224e21a4dd7b0e71a42ba12c0a1829ba1b52aa3ebb144577371a894b09">@amrdiab</a>
                    <script src="https://instawidget.net/js/instawidget.js?u=130f82224e21a4dd7b0e71a42ba12c0a1829ba1b52aa3ebb144577371a894b09&width=250px"></script>
                </div>
            </div>
        </div>
        </div>
    </div>
</footer>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="<?=URL?>js/rating.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
