@extends('shop::layouts.master')
@section('page_title')
    {{ __('shop::app.customer.signup-form.page-title') }}
@endsection
@php
$messages = [];

if (isset($errors) && count($errors)) {
    $messages = $errors->getMessages();
}
@endphp
@section('content-wrapper')

<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-wrap">
                    <h3 class="page-title">Register</h3>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="register-wrapper mt-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="register-switcher text-center">
                    <a href="#" class="resister-btn active">Register</a>
                    <a href="{{ route('customer.session.create') }}" class="login-btn">Login</a>
                </div>
            </div>
        </div>
        <div class="row mt-100 justify-content-center">
            <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-10">
                <div class="reg-login-forms">
                    <h4 class="reg-login-title text-center">
                        Register Your Account
                    </h4>
                    <form id='form' method="POST" action="{{ route('customer.register.create') }}">

                        {{ csrf_field() }}
                    {{-- <form action="#" method="POST" id="register-form"> --}}
                        <div class="reg-input-group">
                            <label for="fname">First Name*</label>
                            <input type="text" id="fname" id="first_name" name="first_name"
                            value="{{ old('first_name') }}" required placeholder="Your first name">
                            @if (isset($messages['first_name']) && count($messages['first_name']))
                                @foreach ($messages['first_name'] as $message)
                                    <div class="control-error lh-20 {{ $loop->first ? 'pt-1' : '' }}">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="reg-input-group">
                            <label for="lname">Last Name*</label>
                            <input type="text" id="last_name" name="last_name"
                            value="{{ old('last_name') }}" placeholder="Your last name" required>
                            @if (isset($messages['last_name']) && count($messages['last_name']))
                                @foreach ($messages['last_name'] as $message)
                                    <div class="control-error lh-20 {{ $loop->first ? 'pt-1' : '' }}">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="reg-input-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" placeholder="Your email" id="email" name="email"
                            value="{{ old('email') }}" required>
                            @if (isset($messages['email']) && count($messages['email']))
                                @foreach ($messages['email'] as $message)
                                    <div class="control-error lh-20 {{ $loop->first ? 'pt-1' : '' }}">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="reg-input-group">
                            <label for="password">Password *</label>
                            <input type="password" placeholder="Enter a password" id="password" name="password"
                            value="{{ old('password') }}" required>
                            @if (isset($messages['password']) && count($messages['password']))
                                @foreach ($messages['password'] as $message)
                                    <div class="control-error lh-20 {{ $loop->first ? 'pt-1' : '' }}">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="reg-input-group">
                            <label for="sure-pass">Confirm Password *</label>
                            <input type="password" placeholder="Confirm password" id="password_confirmation"
                            name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                            @if (isset($messages['confirm_password']) && count($messages['confirm_password']))
                                @foreach ($messages['confirm_password'] as $message)
                                    <div class="control-error lh-20 {{ $loop->first ? 'pt-1' : '' }}">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="reg-input-group reg-check-input d-flex align-items-center">
                            <input type="checkbox" id="form-check" required="">
                            <label for="form-check">I agree to the <a href="#">Terms & Policy</a></label>
                        </div>
                        <div class="reg-input-group reg-submit-input d-flex align-items-center">
                            <input type="submit" id="submite-btn" value="CREATE AN ACCOUNT">
                        </div>

                    </form>
                    <div class="reg-social-login">
                        <h5>or Signup WITH</h5>
                        <ul class="social-login-options">
                            <li><a href="#" class="facebook-login"><i class="flaticon-facebook-app-symbol"></i> Sign
                                    up whit facebook</a></li>
                            <li><a href="#" class="google-login"><i class="flaticon-pinterest-1"></i> Signup whit
                                    google</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

    <script>
        $(function(){
            $(":input[name=first_name]").focus();
        });
    </script>

{!! Captcha::renderJS() !!}

@endpush