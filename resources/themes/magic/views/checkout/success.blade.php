@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.checkout.success.title') }}
@stop

@section('content-wrapper')


    <div class="dashbord-wrapper mt-120">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8"></div>
                <div class="col-xl-8 col-lg-8">
                    <div class="tab-content">

                        <h1 style="margin-bottom: 15px;">{{ __('shop::app.checkout.success.thanks') }}</h1>

                        <p style="margin-bottom: 15px;">
                            @if (auth()->guard('customer')->user())
                                {!! __('shop::app.checkout.success.order-id-info', [
                                    'order_id' => '<a href="' . route('customer.orders.view', $order->id) . '">' . $order->increment_id . '</a>',
                                ]) !!}
                            @else
                                {{ __('shop::app.checkout.success.order-id-info', ['order_id' => $order->increment_id]) }}
                            @endif
                        </p>

                        {{-- <p style="margin-bottom: 15px;margin-left: 120px;">{{ __('shop::app.checkout.success.info') }}</p> --}}

                        {{ view_render_event('bagisto.shop.checkout.continue-shopping.before', ['order' => $order]) }}

                        <div class="eg-input-group profile-form-sumbit reg-submit-input d-flex align-items-center">
                            <a style="display: inline-block;margin-left: 120px;background: #131313;border-radius: 5px;border: none;outline: none;font-weight: 500;font-size: 16px;color: #fff;font-family: var(--font-secondary);padding: 6px 14px;border: 1px solid transparent;-webkit-transition: all .3s;transition: all .3s;margin-top: -4px;"
                                href="{{ route('shop.home.index') }}" class="btn btn-lg btn-primary">
                                {{ __('shop::app.checkout.cart.continue-shopping') }}
                            </a>
                        </div>

                        {{ view_render_event('bagisto.shop.checkout.continue-shopping.after', ['order' => $order]) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
