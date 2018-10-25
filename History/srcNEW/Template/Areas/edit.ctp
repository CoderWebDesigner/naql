
<div class="areas form" >
    
    <fieldset>
                    <legend style="color:black !important;border-bottom: none" ><?= ___('تعديل المنطقة  ') ?></legend>
   
        
        <div class="panel panel-default">
                    

            <div class="col-sm-12" style="border-bottom: 1px solid #ddd ">
                <div class="col-sm-6">   
            <?php
            echo $this->Navbars->actionButtons(['buttons_group' => 'add']);
            ?>    </div>
            </div>
            <div class="panel-body" style="margin-top:10px;">
           
            <?php
            echo $this->AlaxosForm->create($area, ['class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate']);
            
            echo '<div class="form-group">';
           
              echo '<div class="col-sm-offset-5 col-sm-5">';
            echo $this->AlaxosForm->input('name', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
             echo $this->AlaxosForm->label('name', __('إسم المنطقة'), ['class' => 'col-sm-2 control-label']);
            echo '</div>';
            
            echo '<div class="form-group">';
          
            echo '<div class="col-sm-offset-5 col-sm-5">';
            echo $this->AlaxosForm->input('name_en', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
              echo $this->AlaxosForm->label('name_en', __('إسم المنطقة إنجليزى'), ['class' => 'col-sm-2 control-label']);
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
