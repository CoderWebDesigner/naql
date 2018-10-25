<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="<?=URL?>img/Naql-logo-Final.png" rel="shortcut icon">
    <!-- Bootstrap -->
    <link href="<?=URL?>css/bootstrap.css" rel="stylesheet">
    <!-- RTL Version Bootstrap -->
    <link href="<?=URL?>css/bootstrap-rtl.min.css" rel="stylesheet">
    <!-- Jquery Ui css -->
    <link href="<?=URL?>css/jquery-ui.css" rel="stylesheet" />
    <!-- Animate css -->
    <link href="<?=URL?>css/animate.css" rel="stylesheet"/>
    <!-- Nivo Slider Css -->
    <link href="<?=URL?>css/nivo-slider.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Custom css -->
    <link href="<?=URL?>css/style.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
  <!-- start Top header -->
  <div class="top-header" style="background:#e1bc0e;padding:10px 0">
        <div class="container">
            <div class="row">
            <div class="col-xs-6">
                    <div class="social">
                        <ul style="list-style:none">
                            <li style="display:inline;padding:0 10px"><a href="#" style="color:#1b0400;font-size:18px;"><i class="fab fa-facebook"></i></a></li>
                            <li style="display:inline;padding:0 10px"><a href="#" style="color:#1b0400;font-size:18px;"><i class="fab fa-twitter"></i></a></li>
                            <li style="display:inline;padding:0 10px"><a href="#" style="color:#1b0400;font-size:18px;"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="lang" style="float:left">
                        <span>اللغه :</span>
                        <select  id="language" style="border:1px solid #1b0400">
                            <option value=1 selected="selected">AR </option>
                            <option value=2>EN </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <!-- End Top header -->
  <!-- Start Nav -->
  <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
          aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= URL?>">
          <img src="<?=URL?>img/Naql-logo-Final.png" alt="Logo" class="img-responsive">
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="<?= URL?>">الرئيسية</a>
          </li>
          <li>
            <a href="<?= URL?>/aboutus">عن النقل</a>
          </li>
          <li>
            <a href="<?= URL?>/contactus">تواصل معنا</a>
          </li>
          <li>
              <a href="<?= URL?>login">التسجيل</a>
          </li>
           <li>
              <a href="<?= URL?>owners/myorders">طلباتي</a>
              <?php
            if ($this->UserAuth->getuserId()){
            
            ?>
             <li>
              <a href="<?= URL?>logout">خروج</a>
          </li>
           <?php
           }  
              
               ?>
                     <?php
            if ($this->UserAuth->getuserId() == 1){
            
            ?>
             <li>
              <a href="<?= URL?>dashboards">لوحة التحكم</a>
          </li>
           <?php
           }  
              
               ?>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>
  <!-- End Nav-->

  <?php

    echo $this->fetch('content');
  ?>

<!-- Start Footer -->
<div class="container">
  <footer>
      <div class="container">
          <div class="row">
              <div class="col-md-4 col-sm-6">
                  <div class="contact-us">
                      <h3>صفحتنا علي الفيس بوك</h3>
                      <div class="facebook-page">
                          <div id="fb-root"></div>
                          <div class="fb-page" data-href="https://www.facebook.com/pg/Kandil6October" data-tabs="timeline" data-height="200" data-small-header="false"
                              data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                              <blockquote cite="https://www.facebook.com/pg/Kandil6October" class="fb-xfbml-parse-ignore">
                                  <a href="https://www.facebook.com/pg/Kandil6October">Kandil October</a>
                              </blockquote>
                          </div>
                      </div>

                  </div>
              </div>
              <div class="col-md-4 col-sm-6">
                  <div class="contact-us">
                      <h3>صفحتنا علي الانستجرام</h3>
                    
                      <!-- InstaWidget -->
                      <div class="instgramPge" style="height:200px; overflow-y:scroll">
                          <!-- InstaWidget -->
                          <a href="https://instawidget.net/v/user/naqql" id="link-1b91803cc16f4d6c7f4d11f503db260c3fff9f6029a6b3e230593e7793b365e1">@naqql</a>
                          <script src="https://instawidget.net/js/instawidget.js?u=1b91803cc16f4d6c7f4d11f503db260c3fff9f6029a6b3e230593e7793b365e1&width=300px"></script>
                      </div>
                  </div>
              </div>
              <div class="col-md-4 col-sm-12">
                  <div class="contact-us">
                      <div class="logo-img">
                          <img src="<?=URL?>img/Naql-logo-Final.png" alt="" class="center-block">
                      </div>
                      <ul class="text-center social" >
                          <li>
                            <a href="<?=URL?>/aboutus">عن نقل</a>
                          </li>
                          <li>
                              <a href="<?=URL?>/contactus">تواصل معنا</a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </footer>
</div>
<!-- End Footer -->
</body>
</html>
