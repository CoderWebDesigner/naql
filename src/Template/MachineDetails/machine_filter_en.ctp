  <style>
a:hover {
    color: white;
   background-color: beige;
}

</style>
<script>
    $(document).ready(function () {

       var docid = 0
                 $('.choose').click(function(){
             
           $(".filterEn").val($(this).attr('resultfilterEn'));
 
  docid = $(this).attr('resultfilterEn')

            })
         

        })
        </script>
<?php  foreach ($filterMachineEn as $searchh) : ?>

         
       
          
        <div class=" col-sm-6">
        <a href=#" >
        <p   type="text" name="name"  class="choose" resultfilterEn="<?= $searchh['name_en']; ?>"
       style="border: none; color: silver; font-size: 14px;  text-align: left;cursor: pointer;">
        
        <?php echo $searchh['name_en']; ?></p>
    </a>
            </div>
           <div class=" col-sm-6"></div>  
        
 
<?php
  endforeach ;  ?>
         
 
            
            
           
       <script src="<?=URL?>dashboard/js/jquery.min.js"></script>
      <script src="<?=URL?>dashboard/js/bootstrap.min.js"></script>