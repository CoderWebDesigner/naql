<script>
    

$(document).ready(function () {


     $('.machineDeatil').click(function () {


                        $.ajax({url: "<?= URL ?>MachineDetails/resMachineDeatils", type: "post", accept: "application/json",
                            data: {"machineID": $(this).find('.machineDeatilsss').val()}

                            , success: function (result) {
                                console.log(result);
                                $('.deatils').html(result);
                            }});

                    })
                     });

    </script>


<!---------------- body  ---------------->
<div class="carousel-inner" style="margin-bottom:50px;">
    <div>
        <div style="position: relative; top: 0;
                    left: 0;">
            <img src="<?=URL?>images/MediaImage_022_17366.png" style="height:500px; ">

        ,<div class="container">
                <div class="otlp-heding">
              
            <h1>     معدة فى خدمتك  </h1>
        <h5>أطلب الآن</h5>
            </div>
            </div>
        </div>
    </div>

<!---------------------------------->
<div class="container">
    <div class="col-sm-12" style="text-align: center; ">
        <style>
    .form-control {
        background-color: #eeeeee !important;}
    input[type="file"] {
        padding-top: 4px;
        display: block;
 
    }
    input , select {
        width:200px !important;
    }
            
            .otlp-heding{
               position: relative;
    top: -333px;
    color: white;
              
            }
           
            .otlp-heding h1{
                 margin: 0;
    text-align: center;
                padding: 0;
                    font-weight: bold;
                    direction: rtl;
            }
            .otlp-heding h1::before{
                content: "250";

            }
            .otlp-heding h5{
                     margin: 0;
    padding: 0;
    padding: 18px;
    text-align: center;
    font-size: 32px;
    font-weight: bolder;
            }
</style>


<main class="col-sm-12 buttons">


   
    <input id="tab1" type="radio" name="tabs" checked>
    <label for="tab1" >
    
        <img src="<?=URL?>images/send.png" style="    width: 50px;">  <br> <br>
        <div class="img-dw">
        <img src="<?=URL?>images/arrow-down.jpg">
        </div>
        اختر نوع المعدة
    </label>
  

     <input id="tab2" type="radio" name="tabs" >
    <label for="tab2" >
           <img src="<?=URL?>images/e36c1e6c5964fb13936a71160923af74.png" style="      width: 100px; height: 60px;">
        <div class="img-dw">
        <img src="<?=URL?>images/arrow-down.jpg">
        </div>
           <br> <br>
        اختر نوع المعدة
    </label>
  


     <input id="tab3" type="radio" name="tabs">
    <label for="tab3" >
           <img src="<?=URL?>images/send.png" style="    width: 50px;">  <br> <br>
        <div class="img-dw">
        <img src="<?=URL?>images/arrow-down.jpg">
        </div>
        اكتب تفاصيل الطلب
    </label>
 
    



    <style>
        .img-dw{
         width: 6%;
    height: 6%;
    position: absolute;
    margin-right: 25px;
     display: none;
            
            
        }
        .activ-laple{

        }
        .buton-img{

  background-color: red;
            color: fuchsia;
          
           
            
        }
        
        
  .machine {
    text-align: center;
    float: left;
    padding-top: 20px;
    padding-bottom: 20px;
    background: white;
    border-bottom: 1px solid #ddd;
    border-left: 1px solid #ddd;
      
}
        #content1 img{
     width: 100%;
            height: 70px;
        } 
        
        
        
        
        
        
        
        
        </style>


        <section id="content2"  style="max-height:3000px;" >
   
        <div class="container">
            <div class="col-sm-12 deatils">
      
      
            </div> 
            
              </div>
  
      
    </section> 

    <section id="content3" style="max-height:3000px;">
        
        
    <style>

        #content2 img{
     width: 100%;
            height: 70px;
        }
        
        
   @font-face {
    font-family: myFirstFont;
    src: url(fonts/JF-Flat-regular.otf);
}
          body h5 {
              
              font-family: myFirstFont;
          }
          *{
                font-family: myFirstFont;
          }
     
        
        
        
        
        </style>
            
                         <style>
               .inputform{
                       border: none !important;
    height: 60px !important;
       cursor: -webkit-grab !important;
    color: black !important;
    position: relative !important;
    font-size: 15px !important;
    padding: 5px !important;
    opacity: 1 !important;
    background:  white !important ; 
        width: 100% !important;
       
               }
               </style>
       <div class="container">
     <?php
      //  echo $this->AlaxosForm->create($reservations, [ "onsubmit"=>"return client()",  "name"=>"RForm",'type'=>'file','class' => 'form-horizontal', "style" => " direction: rtl !important;", 'role' => 'form', 'novalidate' => 'novalidate']);

      echo '<div style="background:white;height: 70px;  background: white; border: 1px solid #ddd;">';
      echo '<div class="col-sm-11">';
        echo $this->AlaxosForm->input('email', ['placeholder'=>'نوع المركبة','label' => false, 'class' => 'form-control inputform']);
        echo '</div>';
        ?>
           <img src="<?=URL?>images/Bitmap7.png" style="width:100px ; height:60px;"class="col-sm-1" >
         <?php
           echo '</div>';
          
         echo '<div style="background:white;height: 70px;  background: white; border: 1px solid #ddd;">';
        echo '<div class="col-sm-11">';
        echo $this->AlaxosForm->input('username', ['placeholder'=>'area_id','label' => false, 'class' => 'form-control inputform']);
        echo '</div>';
     ?>
           <img src="<?=URL?>images/Group 17.png" style="width:100px ; height:60px;"class="col-sm-1" >
         <?php
  echo '</div>';

  
   echo '<div style="background:white;height: 70px;  background: white; border: 1px solid #ddd;">';
      echo '<div class="col-sm-11">';
        echo $this->AlaxosForm->input('email', ['placeholder'=>'مكان العمل','label' => false, 'class' => 'form-control inputform']);
        echo '</div>';
          ?>
           <img src="<?=URL?>images/Group 5.png" style="width:50px ;height:50px"   class="col-sm-1" >
         <?php
           echo '</div>';
         
           echo '<div style="background:white;height: 70px;  background: white; border: 1px solid #ddd;">';
        echo '<div class="col-sm-11">';
        echo $this->AlaxosForm->input('username', ['placeholder'=>'اليوم / الشهر','label' => false, 'class' => 'form-control inputform']);
       echo '</div>';
  ?>
           <img src="<?=URL?>images/OLAZ600.png" style="width:100px ; height:60px; float: right"class="col-sm-1" >
         <?php
            echo '</div>';
            

   echo '<div style="background:white;height: 70px;  background: white; border: 1px solid #ddd;">';
      echo '<div class="col-sm-11">';
        echo $this->AlaxosForm->input('email', ['placeholder'=>'أختر مدة التعاقد','label' => false, 'class' => 'form-control inputform']);
        echo '</div>';
  ?>
           <img src="<?=URL?>images/tools-and-utensils.png" style="width:100px ; height:60px;" class="col-sm-1">
         <?php
           echo '</div>';
         
           
           
           
           echo '<div style="background:white;height: 70px;  background: white; border: 1px solid #ddd;">';
        echo '<div class="col-sm-12" style="    height: 100px !important; ">';
        echo $this->AlaxosForm->textarea('username', ['placeholder'=>'الوصف ','label' => false, 'class' => 'form-control inputform']);
        echo '</div>';    echo '</div>';
 

  
 

        
        echo '</div>';

        echo '<div class="form-group">';
        echo '<div class=" col-sm-6">';
        echo $this->AlaxosForm->button(___('أرسل'), ['class' => 'btn btn-default']);
        echo '</div>';
        echo '</div>';
        ?>

        <?php
        //echo $this->AlaxosForm->end();
        ?>
              </div>
    </section>

    <section id="content1" style="max-height:3000px;">
        
         <style>

        #content1 img{
     width: 100%;
            height: 70px;
        } 
        </style>
        
       <div class="container">
            
       
               <div class="col-sm-12">
                <?php foreach($chooseMachines as $chooseMachiness){ ?>
                <div class="col-sm-4 machine" >
                    <div class="col-sm-12">   <img src="<?=URL?>library/machine/<?= $chooseMachiness['photo']; ?>" style="   width: 50%;"></div>
                         <div class="col-sm-12 machinedetails">  <span><?= $chooseMachiness['name']  ?></span></div>
                      <!---------- radio choose -------------->
                      
                       
                      <label class="col-sm-5 col-sm-offset-5 machineDeatil" style="    margin-top: 20px;"> 
                          <input type="radio" checked="checked" name="radio" class="machineDeatilsss" value="<?= $chooseMachiness['id'] ; ?>">
  <span class="checkmark"></span>
</label>
                      
                      
                      
                      
                     
<style>
/* The container */
.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default radio button */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
</style>
                    
                        

 
                      <!----------- end radio--------->

                </div>
                <?php } ?>
      
            </div>   </div> 
    </section>

        <div class="col-sm-12">
            <button class="btnNext" style="    width: 250px; cursor: pointer;    border: 1px solid #ddd;   margin-top: 25px;text-align: left;
    height: 50px;
    background: #f5db5f;
        border-radius: 11px;">
   
    التالى
     <img src="<?=URL?>images/next.png" style="    width: 22px;">
</button></div>   
</main>
 
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700');
    @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    *, *:before, *:after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html, body {
        height: 100vh;
    }

    body {
        font: 14px/1 'Open Sans', sans-serif;
        color: #555;
        background: #eee;
    }

    h1 {
        padding: 50px 0;
        font-weight: 400;
        text-align: center;
    }

    p {
        margin: 0 0 20px;
        line-height: 1.5;
    }

    main {
        
        max-height: 3000px;
        direction: rtl;
        min-width: 320px;
        max-width: 800px;
        padding-top: 25px;
        margin: 0 auto;
/*            background: #f5db5f !important;*/
    }

    section {
        display: none;
        padding: 20px 0 0;
        
    }

    input {
        display: none;
    }

    label {
    
        display: inline-block;
        margin: 0 0 -1px;
        padding: 15px 25px;
        font-weight: 600;
        text-align: center;
        color: #bbb;
        border: 1px solid transparent;
    }

    label:before {
         
        font-family: fontawesome;
        font-weight: normal;
        margin-right: 10px;
    }

/*    label[for*='1']:before { content: '\f1cb'; }
    label[for*='2']:before { content: '\f17d'; }
    label[for*='3']:before { content: '\f16b'; }
    label[for*='4']:before { content: '\f1a9'; }*/

    label:hover {
        color: #888;
        cursor: pointer;
    }

    input:checked + label {
        color: #555;
          border: 1px solid #0404093d;
     
    border-bottom: 1px solid #fff;
    background: white;
}
    

    #tab1:checked ~ #content1,
    #tab2:checked ~ #content2  {
        display: block;
    }
    #tab3:checked ~ #content3  {
        display: block;
    }

    @media screen and (max-width: 650px) {
        label {
            
            font-size: 0;
        }
        label:before {
            margin: 0;
            font-size: 18px;
        }
    }

    @media screen and (max-width: 400px) {
        label {
            padding: 15px;
        }
    }
</style>


 
    
    
   
    </div>
</div>

</div>
 
   

<Script>
    $(document).ready(function () {
    $(function() {
  var $this = $(this);
  
// Setup next button
  $('.btnNext').on('click', function() {        
    if(isLastTab()) 
      alert('submitting the form...');
    else 
      nextTab();  
  });
  
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    isLastTab();
  });
  
  $('.tab-form-wrap .tab-content fieldset').on('click', function() {
    $this.children('.input-clear').focus();
  });
  
  $('.tab-form-wrap .tab-content fieldset .input-clear')
    .on('focus', function() {
    $this.parent().addClass('focus');
  })
    .on('focusout', function() {
    $this.parent().removeClass('focus');
  });

});

function nextTab() {
  var e = $('ul[role="tablist"] li.active').next().find('a[data-toggle="tab"]');  
  if(e.length > 0) e.click();  
  isLastTab();
}

function isLastTab() {
  var e = $('ul[role="tablist"] li:last').hasClass('active'); 
  if( e ) $('.btnNext').text('submit'); 
  else $('.btnNext').text('next step'); 
  return e;
}
    });
    </script>