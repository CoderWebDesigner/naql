
<div class="users form">
    
    <fieldset>
        <legend><?= ___('إضافة عميل ') ?></legend>
        
        <div class="panel panel-default">
            <div class="panel-heading">
            <?php
            echo $this->Navbars->actionButtons(['buttons_group' => 'add']);
            ?>
            </div>
            <div class="panel-body">
            
            <?php
            echo $this->AlaxosForm->create($users, ['type'=>'file','class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate']);
            
             
            
            echo '<div class="form-group col-sm-12">';
            
            echo '<div class="col-sm-offset-5 col-sm-5">';
            echo $this->AlaxosForm->input('username', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo $this->AlaxosForm->label('username', __('إسم المستخدم'), ['class' => 'col-sm-2 control-label']);
            echo '</div>';
            
            
            
            echo '<div class="form-group col-sm-12">';
         
            echo '<div class="col-sm-offset-5 col-sm-5">';
            echo $this->AlaxosForm->input('email', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
               echo $this->AlaxosForm->label('email', __('البريد الإلكترونى'), ['class' => 'col-sm-2 control-label']);
            echo '</div>';
            
            
            echo '<div class="form-group col-sm-12">';
         
            echo '<div class="col-sm-offset-5 col-sm-5">';
            echo $this->AlaxosForm->input('password', ['type'=>'password','label' => false, 'class' => 'form-control']);
            echo '</div>';
               echo $this->AlaxosForm->label('password', __('الرقم السرى'), ['class' => 'col-sm-2 control-label']);
            echo '</div>';
            
            
            echo '<div class="form-group col-sm-12">';
         
            echo '<div class="col-sm-offset-5 col-sm-5">';
            echo $this->AlaxosForm->input('cpassword', ['type'=>'password','label' => false, 'class' => 'form-control']);
            echo '</div>';
               echo $this->AlaxosForm->label('cpassword', __('إعادة الرقم السرى'), ['class' => 'col-sm-2 control-label']);
            echo '</div>';
            
            
            
            
            echo '<div class="form-group col-sm-12">';
            echo '<div class="col-sm-offset-5 col-sm-5">';
            echo $this->AlaxosForm->input('photo', ['type'=>'file','label' => false, 'class' => 'form-control']);
            echo '</div>';
                        echo $this->AlaxosForm->label('photo', __('الصورة'), ['class' => 'col-sm-2 control-label']);

            echo '</div>';
         
             
            echo '<div class="form-group col-sm-12">';
            echo '<div class="col-sm-offset-5 col-sm-5">';
            echo $this->AlaxosForm->input('area_id', ['options' => $areas, 'label' => false, 'class' => 'form-control']);
            echo '</div>';
             echo $this->AlaxosForm->label('area_id', __('المنطقة'), ['class' => 'col-sm-2 control-label']);

            echo '</div>';
            
            echo '<div class="form-group col-sm-12">';
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
