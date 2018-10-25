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
             
           $(".filterAr").val($(this).attr('resultfilter'));
 
  docid = $(this).attr('resultfilter')

            })
         

        })
        </script>
<?php  foreach ($filterMachineAr as $searchh) : ?>

         
          <div class=" col-sm-6"></div>  
          
        <div class=" col-sm-6">
        <a href=#" >
        <p   type="text" name="name"  class="choose" resultfilter="<?= $searchh['name']; ?>"
       style="border: none; color: silver; font-size: 14px;  text-align: center;cursor: pointer;">
        
        <?php echo $searchh['name']; ?></p>
    </a>
            </div>
        
 
<?php
  endforeach ;  ?>
         
<!--    echo '<div class="form-group col-sm-12">';
             echo '<div class=" col-sm-4">';
            echo $this->AlaxosForm->input('machineNmEn', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
             echo $this->AlaxosForm->label('machineNmEn', __('إسم المعدة (إنجليزى)'), ['class' => 'col-sm-2 control-label']);
         
            ////////////////////////////////////
       
            
             echo '<div class=" col-sm-4">';
            echo $this->AlaxosForm->input('machineNmAr', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
               echo $this->AlaxosForm->label('machineNmAr', __('إسم المعدة (عربى)'), ['class' => 'col-sm-2 control-label']);
            echo '</div>';  -->
        
            
            
           
       <script src="<?=URL?>dashboard/js/jquery.min.js"></script>
      <script src="<?=URL?>dashboard/js/bootstrap.min.js"></script>