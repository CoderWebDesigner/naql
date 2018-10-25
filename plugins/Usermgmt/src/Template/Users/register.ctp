<?php
/* Cakephp 3.x User Management Premium Version (a product of Ektanjali Softwares Pvt Ltd)
Website- http://ektanjali.com
Plugin Demo- http://cakephp3-user-management.ektanjali.com/
Author- Chetan Varshney (The Director of Ektanjali Softwares Pvt Ltd)
Plugin Copyright No- 11498/2012-CO/L

UMPremium is a copyrighted work of authorship. Chetan Varshney retains ownership of the product and any copies of it, regardless of the form in which the copies may exist. This license is not a sale of the original product or any copies.

By installing and using UMPremium on your server, you agree to the following terms and conditions. Such agreement is either on your own behalf or on behalf of any corporate entity which employs you or which you represent ('Corporate Licensee'). In this Agreement, 'you' includes both the reader and any Corporate Licensee and Chetan Varshney.

The Product is licensed only to you. You may not rent, lease, sublicense, sell, assign, pledge, transfer or otherwise dispose of the Product in any form, on a temporary or permanent basis, without the prior written consent of Chetan Varshney.

The Product source code may be altered (at your risk)

All Product copyright notices within the scripts must remain unchanged (and visible).

If any of the terms of this Agreement are violated, Chetan Varshney reserves the right to action against you.

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Product.

THE PRODUCT IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE PRODUCT OR THE USE OR OTHER DEALINGS IN THE PRODUCT. */
?>
 <main>
      <div class="ownerForm">
            <div class="container">
                <div class="row">
                
            
            <!------------------- Right --------------------->

           
                <script>
                    $(document).ready(function () {
                        $(".slideselect").click(function (e) {
                            e.preventDefault();
                            $(this).siblings('a.active').removeClass("active");
                            $(this).addClass("active");
                            var index = $(this).index();
                            console.log(index)
                            $(".slideactive").removeClass("active");
                            $(".slideactive").eq(index).addClass("active");
                        });


                    });
                </script>

                <!------   ------>
                                                                 <div class="form-horizontal" id="ownerFrm">

                                <div class="row">
                                    <div class="col-sm-12">

                                          
                                                <?php echo $this->element('Usermgmt.ajax_validation', ['formId'=>'registerForm', 'submitButtonId'=>'registerSubmitBtn']);?>
				<?php echo $this->Form->create($userEntity, ['url'=>URL.'register','id'=>'registerForm', 'class'=>'form-horizontal', 'novalidate'=>true]);?>
                                                <!--Owner Img-->
                    <div class="owner-icon" style="width: 150px; height:150px;margin: 0 auto;border:5px solid #ffffff85;border-radius: 50%">
                        <img src="" alt="" class="img-responsive center-block show-img" style="
                        width: 100%;
                        height: 100%;
                        border-radius: 50%;
                        ">
                        <input name="User[photo]" type="file" id="userUploadImg" style="
                        position: absolute;
                        height: 160px;
                        top:17%;
                        z-index: 1;
                        opacity: 0;
                        ">
                    </div>
                                                      <div class="form-group">
                                                            <div class="control-label col-sm-1 col-xs-2">
                                <img src="<?=URL?>img/train-driver-icon-cartoon-style-vector-10970857.png" alt="">
                            </div>
                                                                 <div class="col-sm-11 col-xs-10">
<?php echo $this->Form->input('Users.username', ['type'=>'text', 'label'=>false, 'div'=>false,'placeholder'=>'اسم المستخدم','id'=>'ownerUserName', 'class'=>'form-control']);?>

                                                    
                                                </div>	
                                                          
                                                      </div>
                                            <div class="form-group">
                            <div class="control-label col-sm-1 col-xs-2">
                                <img src="<?=URL?>img/icon/letter.png" alt="">
                            </div>
                            <div class="col-sm-11 col-xs-10">
						<?php echo $this->Form->input('Users.email', ['type'=>'text', 'label'=>false,'id'=>'ownerEmail', 'div'=>false,'placeholder'=>'الايميل', 'class'=>'form-control']);?>
                            </div>
                                            </div>
                                                             <div class="form-group">
                            <div class="control-label col-sm-1 col-xs-2">
                                <img src="<?=URL?>img/icon/letter.png" alt="">
                            </div>
                            <div class="col-sm-11 col-xs-10">
						<?php echo $this->Form->input('Users.mobile', ['type'=>'text', 'label'=>false,'id'=>'ownerPhone', 'div'=>false,'placeholder'=>'رقم الهاتف', 'class'=>'form-control']);?>
                            </div>
                                            </div>
                                    
						<?php echo $this->Form->input('Users.user_group_id', ['type'=>'hidden', 'value'=>'3','label'=>false,'id'=>'ownerEmail', 'div'=>false,'placeholder'=>' الاسم الاول', 'class'=>'form-control']);?>
                           
                               <div class="form-group">
                            <div class="control-label col-sm-1 col-xs-2">
                                <img src="<?=URL?>img/Graphicloads-Colorful-Long-Shadow-Lock.png" alt="">
                            </div>
                            <div class="col-sm-11 col-xs-10">
						<?php echo $this->Form->input('Users.password', ['label'=>false,'id'=>'ownerEmail', 'div'=>false,'placeholder'=>' كلمة المرور','type'=>'password', 'class'=>'form-control']);?>
                            </div>
                                            </div>
                                               <div class="form-group">
                            <div class="control-label col-sm-1 col-xs-2">
                                <img src="<?=URL?>img/Graphicloads-Colorful-Long-Shadow-Lock.png" alt="">
                            </div>
                            <div class="col-sm-11 col-xs-10">
						<?php echo $this->Form->input('Users.cpassword', ['label'=>false,'id'=>'ownerEmail', 'div'=>false,'placeholder'=>'تاكيد كلمة المرور','type'=>'password', 'class'=>'form-control']);?>
                            </div>
                                            </div>





                                                       <div class="form-group" style="background: transparent">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit"  class="btn btn-default regist-owner center-block col-xs-8 col-sm-push-1 col-xs-push-2">تسجيل
                                    <img src="img/icon/check.jpg" alt="">
                                </button>
                            </div>
                        </div>
                                                <?php echo $this->Form->end();?>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </section>


                    </div>
                </div>

            </div>



        </div>\
        <script>
           if ($('#userUploadImg').val() == '') {
            $('.show-img').attr("src", "<?=URL?>img/download.png");
        }
              function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.show-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#userUploadImg").change(function () {
            readURL(this);
        });
        </script>

