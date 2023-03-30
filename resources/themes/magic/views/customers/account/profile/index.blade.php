@extends('shop::customers.account.index')
@php
$messages = [];

if (isset($errors) && count($errors)) {
    $messages = $errors->getMessages();
}
@endphp

@section('page_title')
    {{ __('shop::app.customer.account.profile.index.title') }}
@endsection

@push('styles')
<style>
	.profile-form-wrapper{
		margin-bottom:20px;
	}
    .small,
    small {
        font-size: .875em;
    }

    .nav-link {
        cursor: pointer;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link {
        color: #000 !important;
    }
</style>
@endpush

@section('account-content')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (Session::get('errr'))
		<script>
			Swal.fire({
				icon: 'success',
				text: "{{ Session::get('errr') }}",
				timer: 5000,
			})
		</script>
 @endif
<div class="ps-lost-password">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="/">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Profile</li>
        </ul>

        <div class="dashbord-wrapper mt-120">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="dashbord-switcher">
                            @include('shop::customers.account.partials.sidemenu')
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="tab-content" id="myTabContent">
                            <div id="tab-profile" role="tab-panel"
                                aria-labelledby="tab-profile-link">
                                <div class="profile-form-wrapper">
                                    <h5>Profile</h5>
                                    {!! view_render_event('bagisto.shop.customers.account.profile.edit.before', ['customer' => $customer]) !!}
                                    <form method="post" action="{{ route('customer.update.profile') }}" id="profile-form"
                                        @submit.prevent="onSubmit">
                                        <div class="row">
                                            @csrf
                                            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.before', [
                                                'customer' => $customer,
                                            ]) !!}
                                            <div class="col-lg-6">
                                                <div class="eg-input-group">
                                                    <label for="fname">First Name*</label>
                                                    <input type="text" value="{{ $customer->first_name }}" id="fname" name="first_name" placeholder="Your first name"
                                                        required="">
                                                        @if (isset($messages['first_name']) && count($messages['first_name']))
                                                            <span class="control-error">
                                                                {{ $messages['first_name'][0] }}
                                                            </span>
                                                        @endif
                                                </div>
                                            </div>
                                            {!! view_render_event('bagisto.shop.customers.account.profile.edit.first_name.after') !!}
                                            <div class="col-lg-6">
                                                <div class="eg-input-group">
                                                    <label for="lname">Last Name*</label>
                                                    <input type="text" id="lname" value="{{ $customer->last_name }}" name="last_name" placeholder="Your last name"
                                                        required="">
                                                    @if (isset($messages['last_name']) && count($messages['last_name']))
                                                        <span class="control-error">
                                                            {{ $messages['last_name'][0] }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            {!! view_render_event('bagisto.shop.customers.account.profile.edit.last_name.after') !!}
                                            <div class="col-lg-12">
                                                <div class="eg-input-group">
                                                    <label for="email">Email *</label>
                                                    <input type="email" id="email" value="{{ $customer->email }}" name="email" placeholder="Your email"
                                                        required="">
                                                        @if (isset($messages['email']) && count($messages['email']))
                                                            <span class="control-error">
                                                                {{ $messages['email'][0] }}
                                                            </span>
                                                        @endif
                                                </div>
                                            </div>
                                            {!! view_render_event('bagisto.shop.customers.account.profile.edit.email.after') !!}
                                            <div class="col-lg-12">
                                                <div class="eg-input-group">
                                                    <label for="Number">Phone Number *</label>
                                                    <input type="tel" value="{{ old('phone') ?? $customer->phone }}" name="phone" id="Number" required="" onchange="formRoute()">
                                                    <!--@if (isset($messages['phone']) && count($messages['phone']))
                                                        <span class="control-error">
                                                            {{ $messages['phone'][0] }}
                                                        </span>
                                                    @endif-->
                                                </div>
                                            </div>
                                            {!! view_render_event('bagisto.shop.customers.account.profile.edit.phone.after') !!}
                                            <select name="gender" hidden class="control" v-validate="'required'"
                                                data-vv-as="&quot;{{ __('shop::app.customer.account.profile.gender') }}&quot;">
                                                <option value="" @if ($customer->gender == '') selected @endif>
                                                    {{ __('admin::app.customers.customers.select-gender') }}</option>
                                                <option value="Other" @if ($customer->gender == 'Other') selected @endif>
                                                    {{ __('shop::app.customer.account.profile.other') }}</option>
                                                <option value="Male" @if ($customer->gender == 'Male') selected @endif>
                                                    {{ __('shop::app.customer.account.profile.male') }}</option>
                                                <option value="Female" @if ($customer->gender == 'Female') selected @endif>
                                                    {{ __('shop::app.customer.account.profile.female') }}</option>
                                            </select>
                                            {!! view_render_event('bagisto.shop.customers.account.profile.edit.gender.after') !!}
    
                                            <input type="hidden" class="control" name="date_of_birth"
                                                value="{{ old('date_of_birth') ?? $customer->date_of_birth }}" v-validate=""
                                                data-vv-as="&quot;{{ __('shop::app.customer.account.profile.dob') }}&quot;">
    
                                            {!! view_render_event('bagisto.shop.customers.account.profile.edit.date_of_birth.after') !!}
                                            
                                            <div class="col-lg-12">
                                                <div class="eg-input-group">
                                                    <label for="password">Old Password *</label>
                                                    <input type="password" id="password" placeholder="Old Password" value=""
                                                    name="oldpassword">
                                                        @if (isset($messages['oldpassword']) && count($messages['oldpassword']))
                                                            <span class="control-error">
                                                                {{ $messages['oldpassword'][0] }}
                                                            </span>
                                                        @endif
                                                </div>
                                            </div>
                                            {!! view_render_event('bagisto.shop.customers.account.profile.edit.oldpassword.after') !!}
                                            <div class="col-lg-12">
                                                <div class="eg-input-group">
                                                    <label for="password">New Password *</label>
                                                    <input type="password" id="password" placeholder="New Password"
                                                    value="" name="password">
                                                    @if (isset($messages['password']) && count($messages['password']))
                                                        <span class="control-error">
                                                            {{ $messages['password'][0] }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            {!! view_render_event('bagisto.shop.customers.account.profile.edit.password.after') !!}
                                            <div class="col-lg-12">
                                                <div class="eg-input-group">
                                                    <label for="sure-pass">Confirm Password *</label>
                                                    <input type="password" id="password_confirmation"
                                                    placeholder="Confirm Password" value=""
                                                    name="password_confirmation">
                                                        @if (isset($messages['password_confirmation']) && count($messages['password_confirmation']))
                                                            <span class="control-error">
                                                                {{ $messages['password_confirmation'][0] }}
                                                            </span>
                                                        @endif
                                                </div>
                                            </div>
                                            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.after', [
                                                'customer' => $customer,
                                            ]) !!}
                                            <div class="col-lg-12">
                                                <div
                                                    class="eg-input-group profile-form-sumbit reg-submit-input d-flex align-items-center">
                                                    <input type="submit" id="submite-btn" value="Save Change">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {!! view_render_event('bagisto.shop.customers.account.profile.edit.after', ['customer' => $customer]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--New-->
									<div class="modal fade" id="regmodal" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Mobile Verification</h5>
									</div>
									<form method="POST"  action="{{ route('customer.update.profile.sms') }}">
										@csrf
									<div class="modal-body">
										<input type="hidden" name="first_name" value="{{ old('first_name') }}">
										<input type="hidden" name="last_name" value="{{ old('last_name') }}">
										<input type="hidden" name="email" value="{{ old('email') }}">
										<input type="hidden" name="phone" value="{{ old('phone') }}">
										<input type="hidden" name="password" value="{{ old('password') }}">
										<input type="hidden" name="confirmpassword" value="{{ old('confirmpassword') }}">
										<input type="text" class="form-control ps-form__input" required placeholder="Please enter verification number" name="code">
									</div>
									<div class="modal-footer">
										<button type="submit" class="ps-btn ps-btn--warning">Confirm</button>
									</div>
									</form>
								</div>
							</div>
						</div>
<script>
function formRoute(){
var original_phone={{$customer->phone}};
var phone_input=document.getElementById('Number');
var form=document.getElementById('profile-form');
if(original_phone==phone_input.value){
form.action="{{ route('customer.update.profile') }}";
}
else{
form.action="{{ route('customerupdatesms') }}";
}
}
</script>
<!--End New-->
@endsection
						@if(Session::get('otp'))
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
						<script>
							$(window).load(function()
										   {
								$('#regmodal').modal('show');
							});
						</script>
						@endif
