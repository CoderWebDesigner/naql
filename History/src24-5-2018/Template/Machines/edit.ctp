
<div class="machines form">
    
    <fieldset>
      
        
        <div class="panel panel-default">
            <div class="panel-heading">
            <?php
            echo $this->Navbars->actionButtons(['buttons_group' => 'add']);
            ?>
                  <legend><?= ___(' تعديل القسم ') ?></legend>
            </div>
            <div class="panel-body">
            
            <?php
            echo $this->AlaxosForm->create($machine, ['type'=>'file','class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate']);
            
            echo '<div class="form-group">';
          
                
             echo '<div class="col-sm-4">';
            echo $this->AlaxosForm->input('name_en', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
              echo $this->AlaxosForm->label('name_en', __('إسم المعدة بالإنجليزى'), ['class' => 'col-sm-2 control-label']);
      
            
             echo '<div class="col-sm-4">';
            echo $this->AlaxosForm->input('name', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
              echo $this->AlaxosForm->label('name', __('إسم المعدة بالعربى'), ['class' => 'col-sm-2 control-label']);
           
             echo '</div>';
          
             
             
             
                    echo '<div class="form-group">';
                    
                                echo '<div class="col-sm-4">';
            echo $this->AlaxosForm->input('location', [ 'options'=>$location,'label' => false, 'class' => 'form-control']);
            echo '</div>';
             echo $this->AlaxosForm->label('location', __('اللوكيشن'), ['class' => 'col-sm-2 control-label']);
             
                 echo '<div class="col-sm-4">';
            echo $this->AlaxosForm->input('photo', ['type'=>'file','label' => false, 'class' => 'form-control']);
            echo '</div>';
             echo $this->AlaxosForm->label('photo', __('صورة المعدة'), ['class' => 'col-sm-2 control-label']);
           
            
           
            echo '</div>';
           
             
             
           
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
