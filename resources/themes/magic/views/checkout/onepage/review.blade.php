<div class="form-container review-checkout-conainer">
    <accordian :title="'{{ __('shop::app.checkout.onepage.summary') }}'" :active="true">
        

        <div slot="body">
            <div class="address-summary row">
                @if ($cart->haveStockableItems() && ($shippingAddress = $cart->shipping_address))
                    <div class="shipping-address col-4">
                        <div class="card-title mb-20">
                            <h5 class="card-title fw6">{{ __('shop::app.checkout.onepage.shipping-address') }}</h5>
                            <br>
                        </div>

                        <div class="card-content">
                            <ul>
                                <li>
                                    {{ $shippingAddress->company_name ?? '' }}
                                </li>
                                <li>
                                    {{ $shippingAddress->name }}
                                </li>
                                <li>
                                    {{ $shippingAddress->address1 }},
                                </li>

                                <li>
                                    {{-- {{ $shippingAddress->postcode . ' ' . core()->city_name_by_id($shippingAddress->city) }} --}}
                                </li>

                                <li>
                                    {{ $shippingAddress->city }}
                                </li>

                                <li>
                                    {{ core()->country_name($shippingAddress->country) }}
                                </li>

                                <li>
                                    {{ __('shop::app.checkout.onepage.contact') }} : {{ $shippingAddress->phone }}
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="col-4">
                    @if ($cart->haveStockableItems())
                        <div class="card-title mb-20">
                            <h5 class="card-title fw6">{{ $cart->selected_shipping_rate->method_title }}</h5>
                            <br>
                        </div>
                        <div class="shipping mb20">
                            <div class="decorator">
                                <i class="icon shipping-icon"></i>
                            </div>

                            <div class="text">
                                {{ core()->currency($cart->selected_shipping_rate->base_price) }}
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-4">
                    <div class="card-title mb-20">
                        <h5 class="card-title fw6">{{ __('shop::app.customer.account.order.view.payment-method') }}</h5>
                        <br>
                    </div>
                    <div class="shipping mb20">
                        <div class="decorator">
                            <i class="icon shipping-icon"></i>
                        </div>

                        <div class="text">
                            {{ core()->getConfigData('sales.paymentmethods.' . $cart->payment->method . '.title') }}
                        </div>
                    </div>

                    <br>
                </div>
                <div class="col-12">
                    <br>
                    <br>
                    <button type="button" onclick="placeOrder()" class="btn btn-primary btn-place-order"
                        form="address-form">
                        Place order
                    </button>
                </div>

            </div>
    </accordian>
</div>
