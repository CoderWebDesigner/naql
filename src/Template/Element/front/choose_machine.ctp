<script>
 $(document).ready(function () {
     
$('.machine').change(function () {
$.ajax({url: "<?= URL ?>MachineDetails/getMachineDetails", type: "post", accept: "application/json",
data: {"machineID": $('.machine').val()}
, success: function (result) {
console.log(result);
$('#machineElhay').html(result);
}});
 
})


//$('.cancel').click(function () {
//$('.typess').val("15")
//alert('توافق على إلغاء العقد ؟')
//$('.yarab').attr('type','date')
//$('input').attr('readonly', 'readonly');
//$('.closed').css('display','none');
//})  

})
</script>    

  <?php
      
      
                echo '<div class="form-group col-sm-12">';
                     echo '<div class=" col-sm-offset-5 col-sm-5">';
                echo $this->AlaxosForm->input('machine_id', ['options' => $machines, 'label' => false, 'class' => 'form-control machine']);
                echo '</div>';
                echo $this->AlaxosForm->label('machine_id', __('القسم'), ['class' => 'col-sm-2 control-label']);
              echo '</div>';

            
                
                echo '<div class="form-group col-sm-12" id="machineElhay">';
                     echo '<div class=" col-sm-offset-5 col-sm-5">';
                echo $this->AlaxosForm->input('machine_detail_id', ['options' => $machineDetails, 'label' => false, 'class' => 'form-control']);
                echo '</div>';
                echo $this->AlaxosForm->label('machine_detail_id', __('المعدة'), ['class' => 'col-sm-2 control-label']);
              echo '</div>';
