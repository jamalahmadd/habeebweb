@php
$messages = [];
if (isset($errors) && count($errors)) {
    $messages = $errors->getMessages();
}
@endphp
@extends('shop::customers.account.index')
@section('page_title')
    {{ __('shop::app.customer.account.profile.index.title') }}
@endsection
@push('styles')
<style>
	.profile-form-wrapper{
		margin-bottom:40px !important;
	}
	.account-sitting-wrapper input {
	padding: 2px 6px;
    background: black;
    color: white;
    font-weight: 600;
    border: 2px double;
		height:38px;
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
@inject('locations','App\Models\LocationsModel')
{!! view_render_event('bagisto.shop.customers.account.address.list.before', ['addresses' => $addresses]) !!}
<div class="ps-lost-password">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Addresses</li>
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
                            <div id="tab-setting" role="tab-panel"
                            aria-labelledby="tab-setting-link">
                            <div class="account-sitting-wrapper">
                                <div class="row">
                                      <!--  <div class="empty">{{ __('shop::app.customer.account.address.index.empty') }}</div>-->
                                        <div class="col-lg-10 col-md-6"></div>
                                        <div class="col-lg-2 col-md-6" style="padding-bottom: 5px;" class="eg-input-group profile-form-sumbit reg-submit-input d-flex align-items-center">
                                            <form action="/customer/account/addresses/create">
                                                <input type="submit" value="Add Address">
                                            </form>
                                        </div>
                                        @foreach ($locations->where('customer_id',Auth::guard('customer')->user()->id)->get() as $address)
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-card">
                                                    <div class="edit-icon">
                                                        <a href="{{ route('customer.address.edit', $address->id) }}"><i class="flaticon-edit"></i></a>
                                                    </div>
                                                    <h5 class="card-title">Billing Address</h5>
                                                    <ul class="card-list">
                                                        <li><span>Area <small>:</small></span> {{ $address->area }}</li>
                                                        <li><span>Building Type <small>:</small></span> {{ $address->building_type }} </li>
                                                        <li><span>Street Name <small>:</small></span>{{ $address->street_name }} </li>
                                                        <li><span>Building Name <small>:</small></span>{{ $address->building_name }} </li>
                                                        <li><span>Address Name <small>:</small></span>{{ $address->address_name }} </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! view_render_event('bagisto.shop.customers.account.address.list.after', ['addresses' => $addresses]) !!}
@endsection
@push('scripts')
    <script>
        function deleteAddress(message, addressId) {
            if (! confirm(message)) {
                return;
            }
            $(`#deleteAddressForm${addressId}`).submit();
        }
    </script>
@endpush
