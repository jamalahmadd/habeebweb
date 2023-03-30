<div class="row">
    <div class="col-12">
        <h5>Payment</h5>
    </div>
    <div class="col-12">
        <div class="row">

            @foreach ($paymentMethods as $payment)
                {!! view_render_event('bagisto.shop.checkout.payment-method.before', ['payment' => $payment]) !!}
                <div class="col-lg-12 col-md-12 address-holder pl0">
                    <label class="w-100">
                        <div class="">
                            <div class="card-body row">

                                <div class="col-2" style="width: 5% !important">
                                    <input type="radio" id="{{ $payment['method'] }}" name="payment[method]"
                                        value="{{ $payment['method'] }}" data-vv-as="&quot;Payment Method&quot;"
                                        aria-required="true" aria-invalid="false">
                                    <span class="checkmark"></span>
                                </div>


                                <div class="col-10">
                                    <h5 class="card-title fw6">
                                        {{ $payment['method_title'] }}
                                    </h5>

                                    <ul type="none">
                                        <li>{{ __($payment['description']) }}</li>
                                        <?php $additionalDetails = \Webkul\Payment\Payment::getAdditionalDetails($payment['method']); ?>

                                        @if (!empty($additionalDetails))
                                            <li class="instructions"
                                                v-show="payment.method == '{{ $payment['method'] }}'">
                                                <label>{{ $additionalDetails['title'] }}</label>
                                                <p>{{ $additionalDetails['value'] }}</p>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="button-row d-lg-flex d-block mt-4 mt-lg-4">
        <button
            class="btn mx-auto btn-dark py-2 btn-block js-btn-next"
            type="submit" title="Next">Next</button>
    </div>
</div>
