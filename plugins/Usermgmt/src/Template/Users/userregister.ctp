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
                <!------   ------>
                <div class="form-horizontal" id="ownerFrm">
                    <div class="row">
                        <div class="col-sm-12">
                            <!--Owner Img-->
                            <div class="owner-icon" style="width: 150px; height:150px;margin: 0 auto;border:5px solid #ffffff85;border-radius: 50%;position:relative">
                                <img src="" alt="" class="img-responsive center-block show-img" style="
                                width: 100%;
                                height: 100%;
                                border-radius: 50%;
                                ">
                                <input name="User[photo]" type="file" id="userUploadImg" hidden class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="control-label col-sm-1 col-xs-2">
                                <img src="<?=URL?>img/icon/train-driver-icon-cartoon-style-vector-10970857.png" alt="">
                            </div>
                            <div class="col-sm-11 col-xs-10">
                                <?php echo $this->Form->input('Users.username', ['type'=>'text', 'label'=>false, 'div'=>false,'placeholder'=>'اسم المستخدم','id'=>'ownerUserName', 'class'=>'form-control']);?>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="control-label col-sm-1 col-xs-2">
                                <img src="<?=URL?>img/icon/mobile_phone.png" alt="" style="width:35px;">
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
                                <?php echo $this->Form->input('Users.mobile', ['type'=>'text', 'label'=>false,'id'=>'mobile', 'div'=>false,'placeholder'=>'رقم الهاتف', 'class'=>'form-control']);?>
                            </div>
                        </div>
                        <?php echo $this->Form->input('Users.user_group_id', ['type'=>'hidden', 'value'=>'2','label'=>false,'id'=>'ownerFirstName', 'div'=>false,'placeholder'=>' الاسم الاول', 'class'=>'']);?>
                        <div class="form-group">
                            <div class="control-label col-sm-1 col-xs-2">
                                <img src="<?=URL?>img/icon/Graphicloads-Colorful-Long-Shadow-Lock.png" alt="">
                            </div>
                            <div class="col-sm-11 col-xs-10">
                                <?php echo $this->Form->input('Users.password', ['label'=>false,'id'=>'Password', 'div'=>false,'placeholder'=>' كلمة المرور','type'=>'password', 'class'=>'form-control']);?>
                            </div>
                        </div>
                        <div class="form-group" style="background: transparent">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button   class="btn btn-default regist-owner center-block col-xs-8 col-sm-push-1 col-xs-push-2">تسجيل
                                    <img src="img/icon/check-box.png" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=URL?>js/bootstrap.min.js"></script>
<!--  Custom Script -->
<script src="<?=URL?>js/updated/userRegister.js"></script>