
<div class="machineOwners form">

    <fieldset>
        <legend><?= ___('إضافة معدة لمزود الخدمة  ') ?></legend>

        <div class="panel panel-default">
            <div class="panel-heading">
                <?php
                echo $this->Navbars->actionButtons(['buttons_group' => 'add']);
                ?>
            </div>
            <div class="panel-body">

                <?php
                echo $this->AlaxosForm->create($machineOwner, ['type' => 'file', 'class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate']);

                
                    echo '<div class="form-group col-sm-12">';
                    echo '<div class=" col-sm-offset-5 col-sm-5">';
                echo $this->AlaxosForm->input('owner_id', ['options' => $owners, 'label' => false, 'class' => 'form-control']);
                echo '</div>';
                echo $this->AlaxosForm->label('owner_id', __('مزود الخدمة'), ['class' => 'col-sm-2 control-label']);

                echo '</div>';
     
                ////////////choose machine 
                 echo $this->element('front/choose_machine');
              ////////////choose machine 

                echo '<div class="form-group col-sm-12">';
                    echo '<div class=" col-sm-offset-5 col-sm-5">';
                echo $this->AlaxosForm->input('photo[]', ['type' => 'file', 'multiple','label' => false, 'class' => 'form-control']);
                echo '</div>';
                echo $this->AlaxosForm->label('photo', __('صور المعدة'), ['class' => 'col-sm-2 control-label']);

                echo '</div>';

                echo '<div class="form-group ">';
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
