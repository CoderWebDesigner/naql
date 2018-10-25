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
    <link rel="stylesheet" href="<?=URL?>css/taskEn.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body class="bg-lighter">
<div class="container-fluid m-0 p-0">
    <div class="row bg-dark-yellow border-bottom p-1">
        <div class="col-4 d-sm-block text-left my-auto">
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
        <div class="col-8 my-auto text-right">
            <h6 class="d-inline text-dark"  id="language_form">Language</h6>
            <form class="d-inline" id="language_form">
                <select id="lang_form">
                    <option value="1">عربي</option>
                    <option value="2" selected>English</option>
                </select>
            <form>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-md bg-yellow border-bottom">
  <!-- Brand/logo -->
  <a class="navbar-brand ml-md-5 pl-md-5" href="<?=URL?>">
    <img src="<?=URL?>images/Naql-logo-Final.png" alt="logo" class="navbar_image">
  </a>

<!-- Toggler/collapsibe Button -->
<button class="navbar-toggler my-auto" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <img src="<?=URL?>images/menu3.png" class="navbar_collapse_image">
</button>

  <!-- Links -->
<div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
  <ul class="navbar-nav">
    <li class="nav-item m-md-3">
      <a class="nav-link" href="<?=URL?>owners/homepageen">Home</a>
    </li>
    <li class="nav-item m-md-3">
      <a class="nav-link" href="<?=URL?>owners/aboutusen">About Naql</a>
    </li>
    <li class="nav-item m-md-3">
      <a class="nav-link" href="<?=URL?>owners/contactusen">Contact Us</a>
    </li>
    <li class="nav-item m-md-3">
      <a class="nav-link" href="<?=URL?>loginen">Login</a>
    </li>
    <li class="nav-item m-md-3">
      <a class="nav-link" href="<?=URL?>owners/myordersen">My Orders</a>
    </li>
  </ul>
</div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 bg-yellow my-auto">
            <h2 class="text-center text-dark page_title">Orders</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-6 text-center my-auto bg-white" id="currentOrdersBtn">
            <h5 class="text-warning m-0 py-2 main_page_selectors">Current Orders</h5>
        </div>
        <div class="col-6 text-center my-auto bg-white" id="prevOrdersBtn">
            <h5 class="text-secondary m-0 py-2 main_page_selectors">Previous Orders</h5>
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
      </div>
      <div class="col-12 text-center bg-lighter" id="currentOrders"></div>
      <div class="col-12 text-center bg-lighter" id="prevOrders"></div>
    </div>
</div>
<div id="priceResponse"></div>

<!-- the pagination for the orders -->
<ul class="pagination justify-content-center" id="orders_pagination"></ul>

<!-- the pagination for the previous orders -->
<ul class="d-none flex-row pagination previous justify-content-center" id="previous_orders_pagination"></ul>

<!-- footer -->
<footer class="m-0 p-0">
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
        <div class="contact-us col-md-4 col-sm-12">
            <img src="http://localhost/naql/img/Naql-logo-Final.png" alt="footer logo" class="img-fluid">
            <ul class="text-left">
                <li class="text-dark">
                    <a href="http://localhost/naql/owners/aboutus">About Naql</a></li>
                <li class="text-dark">
                    <a href="http://localhost/naql/owners/contactus">Contact Us</a></li>
                <li class="text-dark">
                    <a href="http://localhost/naql/owners/aboutus">Terms</a></li>
            </ul>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="contact-us text-center justify-content-center">
                <h5 class="text-dark">our page on facebook</h5>
                <div class="facebook-page">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FLiverpoolFC%2F&tabs=timeline&width=250&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="250" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="contact-us text-center justify-content-center">
                <h5 class="text-dark">our page on instagram</h5>
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

<script>
    localStorage.setItem("OwnerId",<?=$ownerid?>);
    localStorage.setItem("UserId",<?=$user_id?>);
    localStorage.setItem("UserGroup",<?=$groupid?>);
</script>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="<?=URL?>js/taskEn.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
