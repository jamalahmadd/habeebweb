@extends('shop::customers.account.index')

@section('page_title')
    {{ __('shop::app.customer.account.order.index.page-title') }}
@endsection

@push('styles')
<style>
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
{!! view_render_event('bagisto.shop.customers.account.orders.list.before') !!}

<div class="ps-lost-password">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Orders</li>
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
                        <div id="tab-order" role="tab-panel"aria-labelledby="tab-order-link">
                            <div class="order-details" style="overflow:auto;"> 
                                <table class="table order-table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="order-id">Order ID</th>
                                            <th scope="col" class="order-date">Order Date</th>
                                            <th scope="col" class="order-status">Status</th>
                                            <th scope="col" class="order-amount">Total</th>
                                            <th scope="col" class="order-active">Active</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($orders as $order)
                                            <tr>
                                                <td class="order-id">{{ $order->id }}</td>
                                                <td class="order-date">{{ $order->created_at }}</td>
                                                <td class="order-status">{{ $order->status_mobile}}</td>
                                                <td class="order-amount">{{ core()->formatPrice($order->grand_total, $order->order_currency_code) }}</td>
                                                <td class="order-active">
                                                    <a href="{{ route('customer.orders.view', $order->id) }}">
                                                        <i class="flaticon-visibility"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">No orders found!</td>
                                            </tr>
                                        @endforelse
									
                                    </tbody>
                                </table>
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! view_render_event('bagisto.shop.customers.account.orders.list.after') !!}

@endsection