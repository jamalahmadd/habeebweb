@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.login-form.page-title') }}
@endsection

@php
    $messages = [];

    if(isset($errors) && count($errors)) {
        $messages = $errors->getMessages();
    }
@endphp
@push('styles')
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
@endpush
@section('content-wrapper')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div id="reset-form"  class="modal fade"tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-hidden="true" >
	<form method="POST" action="{{route('customer.password.forget')}}"  style="width:100%; height:100%">
		@csrf
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
        @if ($errors->any())
		<script>
			Swal.fire({
				icon: 'error',
				text: '{{ $errors->first() }}'
			})
		</script>
        @endif
@if (Session::get('success'))
		<script>
			Swal.fire({
				icon: 'success',
				text: "{{ Session::get('success') }}"
			})
		</script>
 @endif

        <div class="row">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{ Route('customerlogin') }}">
                    @csrf
                    <div class="ps-form--review">
                        <h2 class="ps-form__title">Login</h2>
                        <div class="ps-form__group">
                            <label class="ps-form__label">Phone Number *</label>
                            <input class="form-control ps-form__input" type="text" name="phone" id="phone" placeholder="Your phone" required value="{{ old('phone') }}">
                            @if(isset($messages['phone']) && count($messages['phone']))
                                <span class="control-error" style="color: red">{{ $messages['phone'][0] }}</span>
                            @endif
                        </div>
                        <div class="ps-form__group">
                            <label class="ps-form__label">Password *</label>
                            <div class="input-group">
                                <input class="form-control ps-form__input" id="password" name="password" type="password" placeholder="Your Password" required>
                                <div class="input-group-append"><a class="fa fa-eye-slash toogle-password"
                                        href="javascript: vois(0);"></a></div>
                                @if(isset($messages['password']) && count($messages['password']))
                                    <span class="control-error" style="color: red">{{ $messages['password'][0] }}</span>
                                @endif
                            </div>
							@if(session()->has('reset-error'))
                                <span class="control-error" style="color: red">{{ session()->get('reset-error') }}</span>
								@php session()->forget('reset-error'); @endphp
                          @endif
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
                        {{-- <a class="ps-account__link" href="lost-password.html">Lost your password?</a> --}}
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6">
                <form method="POST" action="{{ Route('customersms') }}">
                    @csrf
                <meta name="csrf-token" content="{{ csrf_token() }}"> <input type="hidden" name="_token"
                    id="csrf_token" value="{{ csrf_token() }}">
                    <div class="ps-form--review">
                        <h2 class="ps-form__title">Register</h2>
                        <div class="ps-form__group">
                            <label class="ps-form__label">First Name*</label>
                            <input type="text" id="fname" id="first_name" name="first_name" class="form-control ps-form__input"
                            value="{{ old('first_name') }}" required placeholder="Your first name">
                        </div>
                        <div class="ps-form__group">
                            <label class="ps-form__label">Last Name*</label>
                            <input type="text" id="first_name" name="last_name" class="form-control ps-form__input"
                            value="{{ old('first_name') }}" placeholder="Your last name" required>

                        </div>
                        <div class="ps-form__group">
                            <label class="ps-form__label">Email address</label>
                            <input class="form-control ps-form__input" type="text" id="email" placeholder="Your email" id="email" name="email"
                            value="{{ old('email') }}">

                        </div>
                        <div class="ps-form__group">
                            <label class="ps-form__label">Phone Number *</label>
                            <input class="form-control ps-form__input" type="text" id="phone" placeholder="Your phone" id="phone" name="phone"
                            value="{{ old('phone') }}" required>
						  @if(session()->has('register-error'))
                                <span class="control-error" style="color: red">{{ session()->get('register-error') }}</span>
								@php session()->forget('register-error'); @endphp
                          @endif
                        </div>
                        <div class="ps-form__group">
                            <label class="ps-form__label">Password *</label>
                            <div class="input-group">
                                <input class="form-control ps-form__input" type="password" placeholder="Enter a password" id="password" name="password"
                                value="{{ old('password') }}" required>
                                <div class="input-group-append"><a class="fa fa-eye-slash toogle-password"
                                        href="javascript: vois(0);"></a></div>

                            </div>
                        </div>
                        <div class="ps-form__group">
                            <label class="ps-form__label">Confirm Password *</label>
                            <div class="input-group">
                                <input class="form-control ps-form__input" type="password" placeholder="Confirm password" id="confirmpassword"
                                name="confirmpassword" value="{{ old('confirmpassword') }}" required>
                                <div class="input-group-append"><a class="fa fa-eye-slash toogle-password"
                                        href="javascript: void(0);"></a></div>

                            </div>
                        </div>
                            <div class="ps-form__group">
								<label class="ps-form__label">{{ __('shop::app.customer.signup-form.subscribe-to-newsletter') }} </label>
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
									<form method="POST" action="{{ Route('customerregister') }}">
										@csrf
									<div class="modal-body">
										<input type="hidden" name="first_name" value="{{ old('first_name') }}">
										<input type="hidden" name="last_name" value="{{ old('last_name') }}">
										<input type="hidden" name="email" value="{{ old('email') }}">
										<input type="hidden" name="phone" value="{{ old('phone') }}">
										<input type="hidden" name="password" value="{{ old('password') }}">
										<input type="hidden" name="confirmpassword" value="{{ old('confirmpassword') }}">
										<input type="hidden" name="google_id" value="{{ old('google_id') }}">
										<input type="hidden" name="facebook_id" value="{{ old('facebook_id') }}">
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
									<form method="POST" action="{{ Route('customersms') }}">
										@csrf
									<div class="modal-body">
										<div class="ps-form--review">
												<input type="hidden" id="fname" id="first_name" name="first_name" class="form-control ps-form__input"
													   value="{{ Session::get('first_name') }}" required placeholder="Your first name">
												<input type="hidden" id="last_name" name="last_name" class="form-control ps-form__input"
													   value="{{ Session::get('last_name') }}" placeholder="Your last name" required>

												<input class="form-control ps-form__input" type="hidden" id="email" placeholder="Your email" id="email" name="email"
													   value="{{ Session('email') }}">

											<div class="ps-form__group">
												<label class="ps-form__label">Phone Number *</label>
												<input class="form-control ps-form__input" name="phone" type="text" id="phone" placeholder="Your phone" id="phone" name="phone"
													   value="{{ old('phone') }}" required>

											</div>
											<div class="ps-form__group">
												<label class="ps-form__label">Password *</label>
												<div class="input-group">
													<input class="form-control ps-form__input" type="password" placeholder="Enter a password" id="password" name="password"
														   value="{{ old('password') }}" required>
													<div class="input-group-append"><a class="fa fa-eye-slash toogle-password"
																					   href="javascript: vois(0);"></a></div>

												</div>
											</div>
											<div class="ps-form__group">
												<label class="ps-form__label">Confirm Password *</label>
												<div class="input-group">
													<input class="form-control ps-form__input" type="password" placeholder="Confirm password" id="confirmpassword"
														   name="confirmpassword" value="{{ old('confirmpassword') }}" required>
													<div class="input-group-append"><a class="fa fa-eye-slash toogle-password"
																					   href="javascript: void(0);"></a></div>

												</div>
											</div>

										</div>
										<input type="hidden" class="form-control ps-form__input" required @if(Session::get('google_id')) name="google_id" @elseif(Session::get('facebook_id')) name="facebook_id" @endif @if(Session::get('google_id')) value="{{ Session::get('google_id') }}" @elseif(Session::get('facebook_id'))  value="{{ Session::get('facebook_id') }}" @endif>
										</div>
										
										<div class="modal-footer">
											<button type="submit" class="ps-btn ps-btn--warning">Submit</button>
										</div>
									</form>
								</div>
					</div>
				</div>
						@if(Session::get('otp'))
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
						<script>
							$(window).load(function()
										   {
								$('#regmodal').modal('show');
							});
						</script>
						@endif

				@if(Session::get('google_id') || Session::get('facebook_id'))
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
						<script>
							$(window).load(function()
										   {
								$('#socialmodal').modal('show');
							});
						</script>
				@endif
            </div>
        </div>
    </div>
</div>
@stop
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
@push('scripts')
    {!! Captcha::renderJS() !!}
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
@endpush
