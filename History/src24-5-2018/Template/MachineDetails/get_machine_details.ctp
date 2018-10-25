     
<?php 
echo '<div class=" col-sm-offset-5 col-sm-5">';
                echo $this->AlaxosForm->input('machine_detail_id', ['options' => $getMachineDetails, 'label' => false, 'class' => 'form-control']);
                echo '</div>';
                echo $this->AlaxosForm->label('machine_detail_id', __('المعدة'), ['class' => 'col-sm-2 control-label']);