  <script>
    

$(document).ready(function () {

 
            
             var elhay = 0 ; 
     $('.machineOrder').click(function () {
 
                     var  elhay = $(this).attr('order');
                             //$(".machineOrder").val($(this).attr('order'));
                  //     alert(elhay);

                    })
                     });

    </script>

<?php foreach($getMachineDetails as $getMachineDetailsss){ ?>

<div class="col-sm-4 machine" >
                    <div class="col-sm-12">   <img src="<?=URL?>library/machine/<?= $getMachineDetailsss['machine_photo']; ?>" style="   width: 50%;"></div>
                         <div class="col-sm-12 machinedetails">  <span><?= $getMachineDetailsss['name'] ?></span></div>
                


          <!---------- radio choose -------------->
                      
                       
                      <label class="col-sm-5 col-sm-offset-5 " style="    margin-top: 20px;"> 
                          <input type="radio" class="machineOrder" name="radio" order='<?= $getMachineDetailsss['id'] ; ?>'  value="<?= $getMachineDetailsss['id'] ; ?>">
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