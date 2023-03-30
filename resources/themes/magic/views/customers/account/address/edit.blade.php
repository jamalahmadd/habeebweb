@extends('shop::customers.account.index')

@section('page_title')
    {{ __('shop::app.customer.account.address.edit.page-title') }}
@endsection
@push('styles')
<style>
		.profile-form-wrapper{
		margin-bottom:40px !important;
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
    
<div class="ps-lost-password">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Edit address</li>
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
                        <div>
                            <div class="profile-form-wrapper">
                                <h5>Address</h5>
                                                            <form method="POST" action="{{ route('customer.location.update',$address->id) }}" id="profile"
                                class="mt-4 mb-4">
                                @csrf
                                {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.before') !!}
								<div class="row">
									<div class="col-lg-12">
										<div class="eg-input-group">
											<label
												   for="area">Area*</label>
											<input type="text"  name="area" value="{{ $address->area }}" placeholder="Tagammoa 5 - South Investors">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="eg-input-group">
											<label
												   for="area">Building Type*</label>
											<input type="text"  name="building_type" value="{{ $address->building_type }}"  placeholder="Apartment">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="eg-input-group">
											<label
												   for="area">Street Name*</label>
											<input type="text"  name="street_name" value="{{ $address->building_type }}"  placeholder="Street name example">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="eg-input-group">
											<label
												   for="area">Building Name*</label>
											<input type="text"  name="building_name" value="{{ $address->building_type }}"  placeholder="Building name example">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="eg-input-group">
											<label
												   for="area">Floor Number*</label>
											<input type="text"  name="floor_number" value="{{ $address->floor_number }}"  placeholder="00">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="eg-input-group">
											<label
												   for="area">Apartment Number*</label>
											<input type="text"  name="apartment_number" value="{{ $address->apartment_number }}"  placeholder="00">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="eg-input-group">
											<label
												   for="area">Landmark, group number, etc*</label>
											<input type="text"  name="landmark" value="{{ $address->landmark }}"  placeholder="Landmark/group number">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="eg-input-group">
											<label
												   for="area">Address name*</label>
											<input type="text"  name="address_name" value="{{ $address->address_name }}"  placeholder="Home address">
										</div>
									</div>
								</div>
								<div class="row justify-content-center" align="center" style="align-items: center;">
									<div class="col-lg-6 justify-content-center" align="center">
										<div class="eg-input-group justify-content-center" align="center">
											<input type="submit" id="submite-btn" value="Save address">
										</div>
									</div>
								</div>
                                <!--<div class="row">
                                    <div class="col-lg-6">
                                        <div class="eg-input-group">
                                            <label
                                                for="fname">{{ __('shop::app.customer.account.address.create.first_name') }}*</label>
                                            <input type="text" value="{{ Auth::guard('customer')->user()->first_name }}" name="first_name"
                                                placeholder="Your First Name">
                                            @if (isset($messages['first_name']) && count($messages['first_name']))
                                                @foreach ($messages['first_name'] as $message)
                                                    <div class="control-error lh-20 {{ $loop->first ? 'pt-1' : '' }}">
                                                        {{ $message }}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.first_name.after') !!}
                                    <div class="col-lg-6">
                                        <div class="eg-input-group">
                                            <label
                                                for="lname">{{ __('shop::app.customer.account.address.create.last_name') }}*</label>
                                            <input type="text" value="{{ old('last_name') }}" name="last_name"
                                                placeholder="Your Last Name">
                                            @if (isset($messages['last_name']) && count($messages['last_name']))
                                                @foreach ($messages['last_name'] as $message)
                                                    <div class="control-error lh-20 {{ $loop->first ? 'pt-1' : '' }}">
                                                        {{ $message }}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.last_name.after') !!}
                                    <div class="col-lg-12">
                                        <div class="eg-input-group">
                                            <label
                                                for="text">{{ __('shop::app.customer.account.address.create.street-address') }}
                                                *</label>
                                            <input type="text"
                                                value="{{ isset($addresses[0]) ? $addresses[0] : '' }}" id="address_0"
                                                name="address1[]" placeholder="Your Address" required>
                                            @if (isset($messages['address1']) && count($messages['address1']))
                                                @foreach ($messages['address1'] as $message)
                                                    <div class="control-error lh-20 {{ $loop->first ? 'pt-1' : '' }}">
                                                        {{ $message }}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        @if (core()->getConfigData('customer.settings.address.street_lines') &&
                                            core()->getConfigData('customer.settings.address.street_lines') > 1)
                                            @for ($i = 1; $i < core()->getConfigData('customer.settings.address.street_lines'); $i++)
                                                <div class="control-group" style="margin-top: -25px;">
                                                    <input type="text" class="form-control"
                                                        name="address1[{{ $i }}]"
                                                        id="address_{{ $i }}"
                                                        value="{{ $addresses[$i] ?? '' }}">
                                                </div>
                                            @endfor
                                        @endif
                                    </div>
                                    {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.street-addres.after') !!}
                                    <div class="col-lg-12">
                                        <div class="eg-input-group">
                                            <label
                                                for="text">{{ __('shop::app.customer.account.address.create.city') }}
                                                *</label>
                                            <input type="text" value="{{ old('city') }}" id="address_0"
                                                name="city" placeholder="Your Address" required>
                                            @if (isset($messages['city']) && count($messages['city']))
                                                @foreach ($messages['city'] as $message)
                                                    <div class="control-error lh-20 {{ $loop->first ? 'pt-1' : '' }}">
                                                        {{ $message }}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.create.after') !!}
                                    <div class="col-lg-12">
                                        <div class="eg-input-group">
                                            <label
                                                for="text">{{ __('shop::app.customer.account.address.create.postcode') }}
                                                *</label>
                                            <input type="text" value="{{ old('postcode') }}" id=""
                                                name="postcode" placeholder="Your Postal Code" required>
                                            @if (isset($messages['postcode']) && count($messages['postcode']))
                                                @foreach ($messages['postcode'] as $message)
                                                    <div class="control-error lh-20 {{ $loop->first ? 'pt-1' : '' }}">
                                                        {{ $message }}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.postcode.after') !!}
                                    <div class="col-lg-12">
                                        <div class="eg-input-group">
                                            <label
                                                for="text">{{ __('shop::app.customer.account.address.create.phone') }}
                                                *</label>
                                            <input type="text" value="{{ old('phone') }}" id=""
                                                name="phone" placeholder="Your Postal Code" required>
                                            @if (isset($messages['phone']) && count($messages['phone']))
                                                @foreach ($messages['phone'] as $message)
                                                    <div class="control-error lh-20 {{ $loop->first ? 'pt-1' : '' }}">
                                                        {{ $message }}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.after') !!}

                                    <div class="col-lg-12">
                                        <div class="control-group">
                                            <span
                                                class="checkbox fs16 display-inbl no-margin d-flex align-items-center">
                                                <input type="checkbox" id="default_address" class="w-auto"
                                                    name="default_address">
                                                <span class="p-1">
                                                    {{ __('shop::app.customer.account.address.default-address') }}
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div
                                            class="eg-input-group profile-form-sumbit reg-submit-input d-flex align-items-center">
                                            <input type="submit" id="submite-btn" value="Save Change">
                                        </div>
                                    </div>
                                </div>
                                {!! view_render_event('bagisto.shop.customers.account.address.create.after') !!}-->
                            </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
