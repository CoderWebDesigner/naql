<style>
    .form-horizontal {
        margin-top: 40px;
    }
    .panel .panel-body {
        padding: 0px !important;
    }
</style>
<div class="owners form">

    <fieldset>
        <legend><?= ___('إضافة مزود خدمة جديد ') ?></legend>

        <div class="panel panel-default">
            <div class="panel-heading">
                <?php
                echo $this->Navbars->actionButtons(['buttons_group' => 'add']);
                ?>
            </div>
            <div class="panel-body">

                <?php
                echo $this->AlaxosForm->create($owner, ['type' => 'file', 'class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate']);
                ?>
                <div style="border-bottom: 1px #ddd solid;display: flow-root;margin-bottom: 15px;">
                    <?php
                    echo '<div class="form-group col-sm-12">';
                    echo '<div class=" col-sm-offset-5 col-sm-5">';
                    echo $this->AlaxosForm->input('username', ['label' => false, 'class' => 'form-control']);
                    echo '</div>';
                    echo $this->AlaxosForm->label('username', __('إسم المستخدم'), ['class' => 'col-sm-2 control-label']);
                    echo '</div>';


                    echo '<div class="form-group col-sm-12" >';
                    echo '<div class=" col-sm-offset-5 col-sm-5">';
                    echo $this->AlaxosForm->input('email', ['label' => false, 'style' => "text-align:left", 'class' => 'form-control filterEn', "autocomplete" => "off"]);
                    echo '</div>';
                    echo $this->AlaxosForm->label('email', __('البريد الإلكترونى'), ['class' => 'col-sm-2 control-label']);
                    echo '</div>';


                    echo '<div class="form-group col-sm-12">';
                    echo '<div class=" col-sm-offset-5 col-sm-5">';
                    echo $this->AlaxosForm->input('password', ['type' => 'password', 'label' => false, 'style' => "text-align:left", 'class' => 'form-control filterEn', "autocomplete" => "off"]);
                    echo '</div>';
                    echo $this->AlaxosForm->label('password', __('الرقم السرى'), ['class' => 'col-sm-2 control-label']);
                    echo '</div>';

                    echo '<div class="form-group col-sm-12">';
                    echo '<div class=" col-sm-offset-5 col-sm-5">';
                    echo $this->AlaxosForm->input('cpassword', ['type' => 'password', 'label' => false, 'style' => "text-align:left", 'class' => 'form-control filterEn', "autocomplete" => "off"]);
                    echo '</div>';
                    echo $this->AlaxosForm->label('cpassword', __('إعادة الرقم السرى'), ['class' => 'col-sm-2 control-label']);
                    echo '</div>';


                    echo '<div class="form-group col-sm-12">';
                    echo '<div class=" col-sm-offset-5 col-sm-5">';
                    echo $this->AlaxosForm->input('area_id', ['options' => $area, 'label' => false, 'style' => "text-align:left", 'class' => 'form-control filterEn', "autocomplete" => "off"]);
                    echo '</div>';
                    echo $this->AlaxosForm->label('area_id', __(' المنطقة'), ['class' => 'col-sm-2 control-label']);


                    echo '</div>';


                    echo '<div class="form-group col-sm-12">';
                    echo '<div class=" col-sm-offset-5 col-sm-5">';
                    echo $this->AlaxosForm->input('photo', ['type' => 'file', 'label' => false, 'style' => "text-align:left", 'class' => 'form-control filterEn', "autocomplete" => "off"]);
                    echo '</div>';
                    echo $this->AlaxosForm->label('photo', __('صورة شخصية'), ['class' => 'col-sm-2 control-label']);
                    echo '</div>';
                    ?>

                </div>
                <!--/////////////------------end user data  + save user in owner table --------------->
              <?php  
       
     
                ////////////choose machine 
                 echo $this->element('front/choose_machine');
              ////////////choose machine 

             echo '<div class="form-group col-sm-12">';
                    echo '<div class=" col-sm-offset-5 col-sm-5">';
                echo $this->AlaxosForm->input('photo[]', ['type' => 'file', 'multiple','label' => false, 'class' => 'form-control']);
                echo '</div>';
                echo $this->AlaxosForm->label('photo', __('صور المعدة'), ['class' => 'col-sm-2 control-label']);

                echo '</div>';


/////////////-------------------------    

echo '<div class="form-group">';
echo '<div class="col-sm-offset-2 col-sm-5">';
echo $this->AlaxosForm->button(___('حفظ'), ['class' => 'btn btn-default']);
echo '</div>';
echo '</div>';

echo $this->AlaxosForm->end();
?>

            </div>
        </div>

    </fieldset>

</div>
