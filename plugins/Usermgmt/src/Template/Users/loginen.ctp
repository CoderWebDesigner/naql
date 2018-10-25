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
    <div class="login-header">
        <div class="header-img">
            <div class="logo-img">
                <img src="<?=URL?>img/7d51affd-254c-4702-a415-dac577a6a44c.png" alt="">
            </div>
        </div>
        <div class="background-img"></div>
    </div>
    <main style="background: #fff">
        <div class="postLoading">
            <div class="loading-img">
                <img src="<?=URL?>img/gas-oil-truck-logistic-petroleum-transportation-car-tanker-metal-barrel-flat-vector-illustration-78344313.jpg"
                    alt="">
            </div>
        </div>
			<div class="container">
				<div class="row">
					<div class="panel-body">
						<?php echo $this->element('Usermgmt.ajax_validation', ['formId'=>'loginForm', 'submitButtonId'=>'loginSubmitBtn']); ?>
						<?php echo $this->Form->create($userEntity, ['url'=>URL.'login/en','id'=>'loginForm', 'class'=>'form-horizontal login-form']); ?>
									<div id="msg"></div>
						<div class="form-group">
								<?php echo $this->Form->input('Users.email', ['type'=>'text', 'label'=>false, 'div'=>false, 'placeholder'=>"username",'id'=>'loginUsername', 'class'=>'form-control']); ?>
						</div>
						<div class=" form-group">
								<?php echo $this->Form->input('Users.password', ['type'=>'password','id'=>'loginPassword', 'label'=>false, 'div'=>false, 'placeholder'=>"password", 'class'=>'form-control']); ?>
						</div>
						<?php if(USE_REMEMBER_ME) { ?>
								<!--					<div class="um-form-row form-group">
								<?php if(!isset($userEntity['remember'])) {
										$userEntity['remember'] = true;
									} ?>
								<div class="col-sm-7">
									<?php echo $this->Form->input('Users.remember', ['type'=>'checkbox', 'label'=>false, 'div'=>false, 'style'=>'margin-left:0']); ?>
								</div>
							</div>-->
						<?php } ?>
						<?php if($this->UserAuth->canUseRecaptha('login')) {
							$errors = $userEntity->errors();
							$error = "";
							if(isset($errors['captcha']['_empty'])) {
								$error = $errors['captcha']['_empty'];
							} else if(isset($errors['captcha']['mustMatch'])) {
								$error = $errors['captcha']['mustMatch'];
							}?>
							<div class="um-form-row form-group">
								<label class="col-sm-4 control-label required"><?php echo __('Prove you\'re not a robot');?></label>
								<div class="col-sm-8">
									<?php echo $this->UserAuth->showCaptcha($error);?>
								</div>
							</div>
						<?php } ?>
						<div class="um-button-row">
							<?php echo $this->Form->Submit(__('Sign In'), ['div'=>false, 'class'=>'btn btn-default login', 'id'=>'loginSubmitBtn']); ?>
							<p class="col-xs-6">
								<a href="<?= URL?>/userregisteren">new register</a>
							</p>
							<p class="col-xs-6 text-right">
								<a href="<?= URL?>/forgotPassword">Forget Password?</a>
							</p>
							</fo>
							<p class="col-xs-12 text-center">
								<a href="<?= URL?>owners/registeren">owner register</a>
							</p>
						</div>
						<?php echo $this->Form->end(); ?>
						<?php echo $this->element('Usermgmt.provider'); ?>
					</div>

			</div>
       </div>
    </main>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=URL?>js/bootstrap.min.js"></script>
<!--  Custom Script -->
<script src="<?=URL?>js/updated/login.js"></script>
