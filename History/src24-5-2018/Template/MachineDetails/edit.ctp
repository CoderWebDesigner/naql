 
<div class="machineDetails form">

    <fieldset>
       <legend><?= ___('تحديث  بيانات المعدة  ') ?></legend>

        <div class="panel panel-default">
            <div class="panel-heading">
                <?php
                echo $this->Navbars->actionButtons(['buttons_group' => 'add']);
                ?>
         
            </div>

            <div class="panel-body">

                <?php
                echo $this->AlaxosForm->create($machineDetail, ['type' => 'file', 'class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate']);

                //////////////////////////////end sec form machine details
  

                echo '<div class="form-group col-sm-12">';




                echo '<div class=" col-sm-4">';
                echo $this->AlaxosForm->input('name_en', ['label' => false, 'class' => 'form-control']);
                echo '</div>';
                echo $this->AlaxosForm->label('name_en', __('إسم المعدة (إنجليزى)'), ['class' => 'col-sm-2 control-label']);


                echo '<div class=" col-sm-4">';
                echo $this->AlaxosForm->input('name', ['label' => false, 'class' => 'form-control']);
                echo '</div>';
                echo $this->AlaxosForm->label('name', __('إسم المعدة (عربى)'), ['class' => 'col-sm-2 control-label']);



                echo '</div>';
                ////////////////////////////////////

              echo '<div class="form-group col-sm-12">';


                echo '<div class=" col-sm-6">';
                 echo '</div>';
 


                echo '<div class=" col-sm-4">';
                echo $this->AlaxosForm->input('machine_id', ['options' => $machines, 'label' => false, 'style' => "text-align:left", 'class' => 'form-control filterEn', "autocomplete" => "off"]);
                echo '</div>';
                echo $this->AlaxosForm->label('machine_id', __('القسم'), ['class' => 'col-sm-2 control-label']);
                echo '</div>';








                echo '<div class="col-sm-offset-2 col-sm-5">';
                echo $this->AlaxosForm->button(___('حفظ'), ['class' => 'btn btn-default']);
                echo '</div>';
                echo '</div>';

                echo '</div>';

                echo $this->AlaxosForm->end();
                ?>
            </div>
        </div>

    </fieldset>

</div>
