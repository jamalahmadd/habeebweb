<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.login-form.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php
    $messages = [];

    if(isset($errors) && count($errors)) {
        $messages = $errors->getMessages();
    }
?>
<?php $__env->startPush('styles'); ?>
<style>
	#social-icons{
	display: none !important;
	}
	#reset-form{
	width:40%;
	max-width:400px;
	min-width:300px;
	height:200px !important;
	background-color:#ffffff;
	overflow:unset;
	margin:10% auto;
	padding:8px;
	}

    .ps-product--detail .ps-product__title a {
        font-size: 18px;
    }

    .ps-product--detail .ps-product__feature {
        margin-top: 0px !important;
    }

    .ps-product__content {
        margin-top: 25px;
    }

    .ps-product--detail .ps-product__content .ps-desc {
        text-align: justify;
    }

    @media (max-width:767px) {
        .ps-product--gallery {
            margin-bottom: 30px !important;
        }

        .ps-product--detail .ps-product__info {
            margin-bottom: 30px;
        }

        .ps-product--detail .ps-product__content .ps-title {
            font-size: 20px;
        }

        .ps-product--detail .ps-tab-list li a {
            font-size: 20px;
        }
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content-wrapper'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div id="reset-form"  class="modal fade"tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-hidden="true" >
	<form method="POST" action="<?php echo e(route('customer.password.forget')); ?>"  style="width:100%; height:100%">
		<?php echo csrf_field(); ?>
                        <div class="ps-form__group" style="margin:2% 0;">
                            <label class="ps-form__label" style="margin:1%;">Enter Your Phone Number</label>
                            <input class="form-control ps-form__input" type="text" name="phoner" placeholder="Your phone">
                        </div>
						<div class="ps-form__submit">
                            <button class="ps-btn ps-btn--warning" type="submit" name="submit" >Submit</button>
                        </div>
	</form>
</div>
<div class="ps-account">
    <div class="container">
        <?php if($errors->any()): ?>
		<script>
			Swal.fire({
				icon: 'error',
				text: '<?php echo e($errors->first()); ?>'
			})
		</script>
        <?php endif; ?>
<?php if(Session::get('success')): ?>
		<script>
			Swal.fire({
				icon: 'success',
				text: "<?php echo e(Session::get('success')); ?>"
			})
		</script>
 <?php endif; ?>

        <div class="row">
            <div class="col-12 col-md-6">
                <form method="POST" action="<?php echo e(Route('customerlogin')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="ps-form--review">
                        <h2 class="ps-form__title">Login</h2>
                        <div class="ps-form__group">
                            <label class="ps-form__label">Phone Number *</label>
                            <input class="form-control ps-form__input" type="text" name="phone" id="phone" placeholder="Your phone" required value="<?php echo e(old('phone')); ?>">
                            <?php if(isset($messages['phone']) && count($messages['phone'])): ?>
                                <span class="control-error" style="color: red"><?php echo e($messages['phone'][0]); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="ps-form__group">
                            <label class="ps-form__label">Password *</label>
                            <div class="input-group">
                                <input class="form-control ps-form__input" id="password" name="password" type="password" placeholder="Your Password" required>
                                <div class="input-group-append"><a class="fa fa-eye-slash toogle-password"
                                        href="javascript: vois(0);"></a></div>
                                <?php if(isset($messages['password']) && count($messages['password'])): ?>
                                    <span class="control-error" style="color: red"><?php echo e($messages['password'][0]); ?></span>
                                <?php endif; ?>
                            </div>
							<?php if(session()->has('reset-error')): ?>
                                <span class="control-error" style="color: red"><?php echo e(session()->get('reset-error')); ?></span>
								<?php session()->forget('reset-error'); ?>
                          <?php endif; ?>
							<a href="#" id="forgetPassword" class="ps-form__label" style="float:right; color:#5eac11; font-weight:bold; margin-top:5px;"  >Forget Password</a>
                        </div>
                        <div class="ps-form__submit">
                            <button class="ps-btn ps-btn--warning" type="submit">Log in</button>
                        </div>
						 <style>
								 .bttn
								 {
									    font-size: 18px !important;
										font-weight: 500;
										border-radius: 2px;
									 	border:none;
										box-shadow: none;
										text-shadow: none;
										cursor: pointer;
										text-align: center;
										padding: 10px 25px;
										line-height: 24px;
										display: inline-block;
										width: 50%;
									 	color:white;
								 }
							 	.bttn:hover
							 {
								 color:white !important;
							 }
							 </style>
						 <div class="flex items-center justify-end mt-4">
							
							 <a class="bttn" href="/auth/facebook/user" style="background-color:#1877f2 !important"><i class="fa fa-facebook" aria-hidden="true"></i> Login with Facebook</a>
						</div>
						<div class="flex items-center justify-end mt-4">
							 <a href="/auth/google/user" class="bttn" style="background-color: rgb(221, 75, 57);"><i class="fa fa-google" aria-hidden="true"></i> Sign in with google</a>
            			</div>
                        
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6">
                <form method="POST" action="<?php echo e(Route('customersms')); ?>">
                    <?php echo csrf_field(); ?>
                <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"> <input type="hidden" name="_token"
                    id="csrf_token" value="<?php echo e(csrf_token()); ?>">
                    <div class="ps-form--review">
                        <h2 class="ps-form__title">Register</h2>
                        <div class="ps-form__group">
                            <label class="ps-form__label">First Name*</label>
                            <input type="text" id="fname" id="first_name" name="first_name" class="form-control ps-form__input"
                            value="<?php echo e(old('first_name')); ?>" required placeholder="Your first name">
                        </div>
                        <div class="ps-form__group">
                            <label class="ps-form__label">Last Name*</label>
                            <input type="text" id="first_name" name="last_name" class="form-control ps-form__input"
                            value="<?php echo e(old('first_name')); ?>" placeholder="Your last name" required>

                        </div>
                        <div class="ps-form__group">
                            <label class="ps-form__label">Email address</label>
                            <input class="form-control ps-form__input" type="text" id="email" placeholder="Your email" id="email" name="email"
                            value="<?php echo e(old('email')); ?>">

                        </div>
                        <div class="ps-form__group">
                            <label class="ps-form__label">Phone Number *</label>
                            <input class="form-control ps-form__input" type="text" id="phone" placeholder="Your phone" id="phone" name="phone"
                            value="<?php echo e(old('phone')); ?>" required>
						  <?php if(session()->has('register-error')): ?>
                                <span class="control-error" style="color: red"><?php echo e(session()->get('register-error')); ?></span>
								<?php session()->forget('register-error'); ?>
                          <?php endif; ?>
                        </div>
                        <div class="ps-form__group">
                            <label class="ps-form__label">Password *</label>
                            <div class="input-group">
                                <input class="form-control ps-form__input" type="password" placeholder="Enter a password" id="password" name="password"
                                value="<?php echo e(old('password')); ?>" required>
                                <div class="input-group-append"><a class="fa fa-eye-slash toogle-password"
                                        href="javascript: vois(0);"></a></div>

                            </div>
                        </div>
                        <div class="ps-form__group">
                            <label class="ps-form__label">Confirm Password *</label>
                            <div class="input-group">
                                <input class="form-control ps-form__input" type="password" placeholder="Confirm password" id="confirmpassword"
                                name="confirmpassword" value="<?php echo e(old('confirmpassword')); ?>" required>
                                <div class="input-group-append"><a class="fa fa-eye-slash toogle-password"
                                        href="javascript: void(0);"></a></div>

                            </div>
                        </div>
                            <div class="ps-form__group">
								<label class="ps-form__label"><?php echo e(__('shop::app.customer.signup-form.subscribe-to-newsletter')); ?> </label>
								 <div class="input-group">
                                	<input class="form-control ps-form__input" type="checkbox" id="checkbox2" name="is_subscribed">
								</div>
								
                            </div>

                        <div class="ps-form__submit">
                            <button type="submit" class="ps-btn ps-btn--warning">Register</button>
                        </div>
                    </div>
					</form>
									<div class="modal fade" id="regmodal" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Mobile Verification</h5>
									</div>
									<form method="POST" action="<?php echo e(Route('customerregister')); ?>">
										<?php echo csrf_field(); ?>
									<div class="modal-body">
										<input type="hidden" name="first_name" value="<?php echo e(old('first_name')); ?>">
										<input type="hidden" name="last_name" value="<?php echo e(old('last_name')); ?>">
										<input type="hidden" name="email" value="<?php echo e(old('email')); ?>">
										<input type="hidden" name="phone" value="<?php echo e(old('phone')); ?>">
										<input type="hidden" name="password" value="<?php echo e(old('password')); ?>">
										<input type="hidden" name="confirmpassword" value="<?php echo e(old('confirmpassword')); ?>">
										<input type="hidden" name="google_id" value="<?php echo e(old('google_id')); ?>">
										<input type="hidden" name="facebook_id" value="<?php echo e(old('facebook_id')); ?>">
										<input type="text" class="form-control ps-form__input" required placeholder="Please enter verification number" name="code">
									</div>
									<div class="modal-footer">
										<button type="submit" class="ps-btn ps-btn--warning">Confirm</button>
									</div>
									</form>
								</div>
							</div>
						</div>
				<div class="modal fade" id="socialmodal" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">User Registration</h5>
									</div>
									<form method="POST" action="<?php echo e(Route('customersms')); ?>">
										<?php echo csrf_field(); ?>
									<div class="modal-body">
										<div class="ps-form--review">
												<input type="hidden" id="fname" id="first_name" name="first_name" class="form-control ps-form__input"
													   value="<?php echo e(Session::get('first_name')); ?>" required placeholder="Your first name">
												<input type="hidden" id="last_name" name="last_name" class="form-control ps-form__input"
													   value="<?php echo e(Session::get('last_name')); ?>" placeholder="Your last name" required>

												<input class="form-control ps-form__input" type="hidden" id="email" placeholder="Your email" id="email" name="email"
													   value="<?php echo e(Session('email')); ?>">

											<div class="ps-form__group">
												<label class="ps-form__label">Phone Number *</label>
												<input class="form-control ps-form__input" name="phone" type="text" id="phone" placeholder="Your phone" id="phone" name="phone"
													   value="<?php echo e(old('phone')); ?>" required>

											</div>
											<div class="ps-form__group">
												<label class="ps-form__label">Password *</label>
												<div class="input-group">
													<input class="form-control ps-form__input" type="password" placeholder="Enter a password" id="password" name="password"
														   value="<?php echo e(old('password')); ?>" required>
													<div class="input-group-append"><a class="fa fa-eye-slash toogle-password"
																					   href="javascript: vois(0);"></a></div>

												</div>
											</div>
											<div class="ps-form__group">
												<label class="ps-form__label">Confirm Password *</label>
												<div class="input-group">
													<input class="form-control ps-form__input" type="password" placeholder="Confirm password" id="confirmpassword"
														   name="confirmpassword" value="<?php echo e(old('confirmpassword')); ?>" required>
													<div class="input-group-append"><a class="fa fa-eye-slash toogle-password"
																					   href="javascript: void(0);"></a></div>

												</div>
											</div>

										</div>
										<input type="hidden" class="form-control ps-form__input" required <?php if(Session::get('google_id')): ?> name="google_id" <?php elseif(Session::get('facebook_id')): ?> name="facebook_id" <?php endif; ?> <?php if(Session::get('google_id')): ?> value="<?php echo e(Session::get('google_id')); ?>" <?php elseif(Session::get('facebook_id')): ?>  value="<?php echo e(Session::get('facebook_id')); ?>" <?php endif; ?>>
										</div>
										
										<div class="modal-footer">
											<button type="submit" class="ps-btn ps-btn--warning">Submit</button>
										</div>
									</form>
								</div>
					</div>
				</div>
						<?php if(Session::get('otp')): ?>
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
						<script>
							$(window).load(function()
										   {
								$('#regmodal').modal('show');
							});
						</script>
						<?php endif; ?>

				<?php if(Session::get('google_id') || Session::get('facebook_id')): ?>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
						<script>
							$(window).load(function()
										   {
								$('#socialmodal').modal('show');
							});
						</script>
				<?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<script>
		//function showResetForm(){
		//var form=document.getElementById('reset-form');
		//form.style.top="10%";
		//}
			$(document).read(function()
										   {
								$('#socialmodal').modal('show');
							});
</script>
<?php $__env->startPush('scripts'); ?>
    <?php echo Captcha::renderJS(); ?>

    <script>
        $(document).ready(function() {
            $("#shoPassword").click(function() {
                var input = $('#password').attr("type");
                if (input == "password") {
                    $('#password').attr("type", "text");
                } else {
                    $('#password').attr("type", "password");
                }
            });
			$("#forgetPassword").click(function(){
			$('#reset-form').modal('show');
			});

            $(":input[name=email]").focus();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/resources/themes/magic/views/customers/session/index.blade.php ENDPATH**/ ?>