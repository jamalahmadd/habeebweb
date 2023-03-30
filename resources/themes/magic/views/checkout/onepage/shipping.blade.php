<div class="row">
    <div class="col-12">
        <h5>Shipping method</h5>
    </div>
    <div class="col-12">
        <div class="row">
            @foreach ($shippingRateGroups as $rateGroup)
                @foreach ($rateGroup['rates'] as $rate)
                    <div class="col-lg-12 col-md-12 address-holder pl0">
                        <label class="w-100">
                            <div class="">
                                <div class="card-body row">

                                    <div class="col-2" style="width: 5% !important;">
                                        <input type="radio" name="shipping_method" id="{{ $rate->method }}"
                                            value="{{ $rate->method }}" data-vv-as="&quot;Shipping Method&quot;"
                                            aria-required="true" aria-invalid="false">
                                        <span class="checkmark"></span>
                                    </div>


                                    <div class="col-10">
                                        <h5 class="card-title fw6">
                                            {{ core()->currency($rate->base_price) }}
                                        </h5>

                                        <ul type="none">
                                            <li>{{ $rate->method_title }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
    <div class="button-row d-lg-flex d-block mt-4 mt-lg-4">
        <button class="btn mx-auto btn-dark py-2 btn-block js-btn-next" type="submit" title="Next">Next</button>
    </div>
</div>
