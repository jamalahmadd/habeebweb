@inject('location_model','App\Models\LocationsModel')
@php
$location=$location_model->where('customer_id',Auth::guard('customer')->user()->id)->first();
@endphp
@if(isset($location)==false)
@php 
session()->flash('error','Please Add Your Address');
@endphp
<script>window.location.href='{{route("customer.address.index")}}';</script>
@endif

@inject ('productImageHelper', 'Webkul\Product\ProductImage')
@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.checkout.onepage.title') }}
@stop

@push('styles')
<style>
    .ps-checkout .ps-checkout__row {
        padding: 15px 10px !important;
    }

    @media (max-width:767px) {}

    .ps-checkout .ps-checkout__order {
        border: none !important;
        border-radius: 4px;
        padding: 25px 20px 30px;
        margin-bottom: 50px;
    }
.address-container {
	width:100%;
	margin-top:40px;
	}
    .iti input,
    .iti input[type=tel],
    .iti input[type=text] {
        position: relative;
        z-index: 0;
        margin-top: 0 !important;
        margin-bottom: 0 !important;
        padding-left: 61px !important;
        margin-right: 25px;
    }

    .iti {
        width: 100%;
    }

    .ps-checkout__row {
        box-shadow: none !important;
    }
	.display-inbl {
		display:flex;
	}
		.display-inbl input {
			width:auto !important;
	}
</style>
@endpush

@php
$addresses = [];
$first_name = '';
$last_name = '';
$phone = '';
@endphp
@auth('customer')
    @php
        $first_name = auth('customer')->user()->first_name;
        $last_name = auth('customer')->user()->last_name;
        $phone = auth('customer')->user()->phone;
    @endphp
    @if (auth('customer')->user()->addresses)
        @php
            $addresses = auth('customer')->user()->addresses;
        @endphp
    @endif
@endauth
@section('content-wrapper')

<div class="ps-checkout">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page"> Checkout</li>
        </ul>
        <h3 class="ps-checkout__title"> Checkout</h3>
        <div class="ps-checkout__content">
            <div class="ps-checkout__wapper">
                {{-- <p class="ps-checkout__text">Returning customer? <a href="/customer/account/profile">Click here to
                        login</a></p> --}}

            </div>
                <form id="address-form" action="{{ Route('neworderweb') }}" method="POST" class="needs-validation" >
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-8 {{ !count($addresses) ? 'd-none' : '' }} addresses-cards">
                        <div class="ps-checkout__form">
						
                            <h3 class="ps-checkout__heading">Delivery Address
                            <a class="btn btn-secondary float-end btn btn-sm" style="float:right;" role="button" onclick="newBillingAddress()">New Address</a>
							</h3>
                            <div class="">
                                <div class="address-container row full-width no-margin">
                                    
                                    @foreach($addresses as $address)
                                        <div class="col-12 col-lg-6 address-holder pl0">
                                            <label class="w-100">
                                                <div class="card">
                                                    <div class="card-body row">
                        
                                                        <div class="col-1">
                        
                                                            <input style="width: 10px;" type="radio"
                                                                required
                                                                name="address_id"
                                                                value="{{ $address['id'] }}"
                                                                {{ $address['default_address'] ? 'checked' : ''}}/>
                        
                                                            <span class="checkmark"></span>
                                                        </div>
                        
                                                        <div class="col-10">
                                                            <h5 class="card-title fw6">
                                                                {{ $address['first_name'] }} {{ $address['last_name'] }},
                                                            </h5>
                        
                                                            <ul type="none">
                                                                <li>{{ $address['address1'] }},</li>
                                                                <li>{{ $address['postcode'] }} {{ $address['city'] }}, {{ $address['country'] }}</li>
                                                                <li>
                                                                    {{ __('shop::app.customer.account.address.index.contact') }} : {{ $address['phone'] }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 {{ count($addresses) ? 'd-none' : '' }} new-address-form">
                        <div class="ps-checkout__form">
                            <h3 class="ps-checkout__heading">Delivery details
                            @auth('customer')
                                @if(count(auth('customer')->user()->addresses))
                                    <a class="btn btn-secondary" style="float: right;padding: 2px 10px;" role="button" onclick="backToSavedBillingAddress()">Back</a>
                                @endif
                            @endauth
							</h3>
                            @inject('locations','App\Models\LocationsModel')
							@inject('shipmethod','App\Models\ShippingModels')
							<fieldset class="border p-2">
								<legend>Delivery Location</legend>
							<div class="container">
								
									
							  <div class="row">
							@foreach($locations->where('customer_id',Auth::guard('customer')->user()->id)->get() as $location)
								  <div class="col-sm-3">
								   <div class="form-check">
                                        <input type="radio" class="form-check-input" id="location_id{{ $location->id }}" @if($loop->first) checked @endif name="shipping_address" value="{{ $location->id }}">
                                        <label class="form-check-label" for="location_id{{ $location->id }}">
									    <p><b>Area: </b>{{ $location->area }}</p>  
										<p><b>Street Name: </b>{{ $location->street_name }}</p>  
										<p><b>Building Name: </b>{{ $location->building_name }}</p>  
									   </label>
                                    </div>
								  </div>
								  
								
								<!--<div class="col-lg-3 offset-lg-3">
									<script
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcbClPLrUGwjWRI1tcLNVNXz2Me1Lmpk0&callback=initMap"
	async defer></script>
<script type="text/javascript">
var map;
function initMap() {
	var mapLayer = document.getElementById("map-layer");
	var centerCoordinates = new google.maps.LatLng(37.6, -95.665);
	var defaultOptions = { center: centerCoordinates, zoom: 4 }

	map = new google.maps.Map(mapLayer, defaultOptions);
}

function locate(){
	document.getElementById("btnAction").disabled = true;
	document.getElementById("btnAction").innerHTML = "Processing...";
	if ("geolocation" in navigator){
		navigator.geolocation.getCurrentPosition(function(position){ 
			var currentLatitude = position.coords.latitude;
			var currentLongitude = position.coords.longitude;

			var infoWindowHTML = "Latitude: " + currentLatitude + "<br>Longitude: " + currentLongitude;
			var infoWindow = new google.maps.InfoWindow({map: map, content: infoWindowHTML});
			var currentLocation = { lat: currentLatitude, lng: currentLongitude };
			infoWindow.setPosition(currentLocation);
			document.getElementById("btnAction").style.display = 'none';
		});
	}
}
</script>
									<img src="https://via.placeholder.com/500"></div>-->
							 
							@endforeach
                         </div>
								
							</div>
								</fieldset>
							<br>
							<fieldset class="border p-2">
								<legend>Shipping Method</legend>
							<div class="container">
								
									
							  <div class="row">
							@foreach($shipmethod->all() as $method)
								  <div class="col-sm-3">
								   <div class="form-check">
                                        <input type="radio" class="form-check-input" onchange="shippingCheck()" id="method{{ $method->id }}" @if($loop->first) checked @endif name="shipment_method" value="{{ $method->id }}">
                                        <label class="form-check-label" for="method{{ $method->id }}">
									    <p>{{ $method->title }}</p>  
									   </label>
                                    </div>
								  </div>
							@endforeach
                         </div>
								
							</div>
								</fieldset>
						<!--NEW-->
							<br>
							<fieldset class="border p-2" id="delivery-branch">
								<legend>Delivering From</legend>
							<div class="container">	
								<span>{{session()->get('variable')}}&nbsp;Branch</span>
                        	</div>
								
						
								</fieldset>	
						<!--END NEW-->
								</div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="ps-checkout__order">
                            <h3 class="ps-checkout__heading">Your order</h3>
                            <div class="ps-checkout__row">
                                <div class="ps-title">Product</div>
                                <div class="ps-title">Subtotal</div>
                            </div>

                            @foreach ($cart->items as $key => $item)
                            @php
                                $images = $productImageHelper->getGalleryImages($item->product);
                                $productBaseImage = $item->product->getTypeInstance()->getBaseImage($item);
                                $product = $item->product;
                                $productPrice = $product->getTypeInstance()->getProductPrices();
                                if (is_null($product->url_key)) {
                                    if (!is_null($product->parent)) {
                                        $url_key = $product->parent->url_key;
                                    }
                                } else {
                                    $url_key = $product->url_key;
                                }
                                // dd($productBaseImage);
                            @endphp
                                <div class="ps-checkout__row ps-product">
                                    <div class="ps-product__name">{{ $product->name }} × {{ $item->quantity }} <span></span></div>
                                    <div class="ps-product__price">{{ core()->currency($item->base_price) }}</div>
                                </div>
                            @endforeach
                            {{-- <div class="ps-checkout__row">
                                <div class="ps-title">Subtotal</div>
                                <div class="ps-product__price">{{ core()->currency($cart->base_grand_total) }}</div>
                            </div> --}}
							<!--New Added-->
						    <div class="ps-checkout__row" id="delivery-container">
                                <div class="ps-title">Delivery Charge</div>
                                <div class="ps-product__price" id="delivery-charge"></div>
                            </div>
							<!--End Added-->
                            <div class="ps-checkout__row">
                                <div class="ps-title">Total</div><input type="hidden" name="totalitem" value="{{ DB::table('cart_items')->where('cart_id',$cart->id)->count() }}"><input type="hidden" name="total_price" value="{{ $cart->base_grand_total }}">
                                <div class="ps-product__price" id="label-total">{{ core()->currency($cart->base_grand_total) }}</div>
                            </div>
                            <input type="hidden" name="total" value="{{ $cart->base_grand_total }}">
                            <div class="ps-checkout__payment">


                                <div class="ps-shopping__checkbox">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="paypal"
                                             name="payment_method" value="paymentonline">
                                        <label class="form-check-label" for="paypal">Online payment
                                            <div class="logo-payment">
                                                <img src="{{ asset('magic/assets/img/habib/paymob.png') }}">
                                                <img src="{{ asset('magic/assets/img/habib/Picture2.png') }}">
                                                <img src="{{ asset('magic/assets/img/habib/Picture3.png') }}">
                                                <img src="{{ asset('magic/assets/img/habib/Picture4.png') }}">
                                                <img src="{{ asset('magic/assets/img/habib/Picture5.png') }}">
                                            </div>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="cart-ship"
                                             name="payment_method" value="cardondelivery">
                                        <label class="form-check-label" for="cart-ship" id="label-card">Card on delivery</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="cart-ship-2"
                                             value="cashondelivery" name="payment_method" checked>
                                        <label class="form-check-label" for="cart-ship-2" id="label-cash" > Cash on
                                            delivery</label>
                                    </div>
                                </div>
                                <div class="check-faq">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="agree-faq"
                                            checked onclick="agreementCheck()">
                                        <label class="form-check-label" for="agree-faq">I have read and agree to
                                            the website terms and conditions *.</label>
                                    </div>
                                </div>
                                <!--<button class="ps-btn ps-btn--warning" id="place-order" type="button" onclick="placeOrder()">Place Order</button> -->
                                <button id="btn-checkout" class="ps-btn ps-btn--warning" type="submit" onclick="actionCheck()">Place order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@php 
$delivery_method=$shipmethod->where('id',3)->first();
$rate=$delivery_method->rate;
$Subtotal=$cart->base_grand_total;
@endphp
<script>
function agreementCheck(){
var checkbox=document.getElementById('agree-faq');
var checkoutButton=document.getElementById('btn-checkout');
if(checkbox.checked==true){
checkoutButton.disabled=false;
}
else{
checkoutButton.disabled=true;
}
}
	
function shippingCheck(){
var pickup=document.getElementById('method2');
var delivery=document.getElementById('method3');
var delivery_branch=document.getElementById('delivery-branch');
var charge=document.getElementById('delivery-charge');
var charge_container=document.getElementById('delivery-container');
var cash=document.getElementById('label-cash');
var card=document.getElementById('label-card');
var total=document.getElementById('label-total');
var text=total.innerText;
var piece=text.slice(4);
var price=parseFloat(piece);
var rate={{$rate}};
var subtotal={{$Subtotal}};
if(pickup.checked==true){
cash.innerHTML="Cash on pickup";
card.innerHTML="Card on pickup";
charge.innerHTML="Free";
delivery_branch.style.display="none";
charge_container.style.display="none";
if(price>subtotal){
price=price-rate;
}
total.innerHTML="EGP "+price;
}
else{
cash.innerHTML="Cash on delivery";
card.innerHTML="Card on delivery";
delivery_branch.style.display="block";
charge_container.style.display="flex";
charge.innerHTML="{{ core()->currency($rate) }}";
price=price+rate;
total.innerHTML="EGP "+price;



}
}

function actionCheck(){
var form=document.getElementById('address-form');
var online=document.getElementById('paypal');
if(online.checked==true){
form.action = "{{route('paymob_payment')}}"; 
}
else{
form.action = "{{route('neworderweb')}}"; 
}
}
agreementCheck();
shippingCheck();

</script>

@endsection

@push('scripts')
    <script src="{{ asset('magic/assets/js/function.js') }}"></script>
  
<!--<script>
    
    var customerAddress = '';
    var new_billing_address = true;
    var new_shipping_address = false;
    var isPlaceOrderEnabled = false;
    var countries = '';
    var allAddress = {};
    var address = {
                billing: {
                    address1: [''],
                    save_as_address: false,
                    use_for_shipping: true,
                },

                shipping: {
                    address1: ['']
                }
            }
    $( document ).ready(function() {
        
        @auth('customer')
            @if(auth('customer')->user()->addresses)
                customerAddress = @json(auth('customer')->user()->addresses);
                customerAddress.email = "{{ auth('customer')->user()->email }}";
                customerAddress.first_name = "{{ auth('customer')->user()->first_name }}";
                customerAddress.last_name = "{{ auth('customer')->user()->last_name }}";
            @endif
        @endauth
        
        if (! customerAddress) {
            new_shipping_address = true;
            new_billing_address = true;
        } else {
            new_shipping_address = false;
            new_billing_address = false;
            address.billing.first_name = address.shipping.first_name = customerAddress.first_name;
            address.billing.last_name = address.shipping.last_name = customerAddress.last_name;
            address.billing.email = address.shipping.email = customerAddress.email;
    
            if (customerAddress.length < 1) {
                new_shipping_address = true;
                new_billing_address = true;
            } else {
                allAddress = customerAddress;
                console.log(allAddress)
    
                for (let country in countries) {
                    for (let code in allAddress) {
                        if (allAddress[code].country) {
                            if (allAddress[code].country == countries[country].code) {
                                allAddress[code]['country'] = countries[country].name;
                            }
                        }
                    }
                }
            }
        }
    });
    
        
    
    
    $('input, select').on('input',function(event){
        
        if(!new_billing_address) {
            if( !validateAddressList()) {
                isPlaceOrderEnabled = true;
            }
        }
        else {
            if( !validateAddressForm('address-form')) {
                isPlaceOrderEnabled = true;
                saveAddress();
            }
        }
    });
    
    
    
    
    
    function newBillingAddress () {
        new_billing_address = true;
        address.billing.address_id = null;
        $(".new-address-form").toggleClass("d-none");
        $(".addresses-cards").toggleClass("d-none");
    }
    
    function backToSavedBillingAddress () {
        new_billing_address = false;
        $(".new-address-form").toggleClass("d-none");
        $(".addresses-cards").toggleClass("d-none");
    }
    function validateAddressList() {
        var isManualValidationFail = true;
        
        address['billing']['save_as_address'] = 0;

        var radios = document.getElementsByName('address_id');

        for (var i = 0; i < radios.length; i++) {
            if (radios[i].type === 'radio' && radios[i].checked) {
                value = radios[i].value;
                address['billing']['address_id'] = value;
                isManualValidationFail = false;
                break;
            }
        }
        if(!isManualValidationFail)
            saveAddress();
        return isManualValidationFail;
    }
    function validateAddressForm (id) {

        var isManualValidationFail = false;
        
        let form = $("#" + id);

        // validate that if all the field contains some value
        if (form) {
            form.find(':input,select').each((index, element) => {
                let value = $(element).val();
                let elementId = element.id;
                if(elementId == 'address1')
                    address['billing'][elementId] = [value];
                else
                    address['billing'][elementId] = value;
                if(new_billing_address) {
                    delete address.billing.address_id;
                }

                if (value == ""
                    && element.id != 'place-order'
                    && element.id != 'company_name'
                ) {
                    isManualValidationFail = true;
                }
            });
            
        }
        
        address['billing']['save_as_address'] = document.getElementById('save_as_address').checked ? 1 : 0;

        // validate that if customer wants to use different shipping address
        // if (! address.billing.use_for_shipping) {
        //     if (! address.shipping.address_id && ! new_shipping_address) {
        //         isManualValidationFail = true;
        //     }
        // }
        

        return isManualValidationFail;
    }
    
    function saveAddress () {
        console.log(allAddress)
        if (allAddress.length > 0) {
            let final_address = allAddress.forEach(addr => {
                if (addr.id == address.billing.address_id) {
                    address.billing.address1 = [addr.address1];

                    if (addr.email) {
                        address.billing.email = addr.email;
                    }

                    if (addr.first_name) {
                        address.billing.first_name = addr.first_name;
                    }

                    if (addr.last_name) {
                        address.billing.last_name = addr.last_name;
                    }
                }

                if (addr.id == address.shipping.address_id) {
                        address.shipping.address1 = [addr.address1];

                    if (addr.email) {
                        address.shipping.email = addr.email;
                    }

                    if (addr.first_name) {
                        address.shipping.first_name = addr.first_name;
                    }

                    if (addr.last_name) {
                        address.shipping.last_name = addr.last_name;
                    }
                }
            });
        }
        console.log(address)
        // return;
        
        address['billing']['save_as_address'] = 0;
        
        $('#overlay').fadeIn();
        $.ajax({
            type: "POST",
            url: "{{ route('shop.checkout.save-address') }}",
            data: address,
            success: function(result) {
                $('#overlay').fadeOut();
                if(result && result['success']) {
                    updateTotals(result.cart)
                    console.log(result)
                }
                else if(result['redirect_url'])
                    window.location.href = result.redirect_url;
            },
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            error: function(result) {
                $('#overlay').fadeOut();
                window.showAlert(`alert-danger`, '', "{{ __('shop::app.common.error') }}");
            }
        });
    }
    
    function updateTotals(cart) {
        if(cart) {
            var totalsHTML = `
                <tr>
                    <th>Cart Subtotal</th>
                    <td>` + cart.formated_sub_total + `</td>
                </tr>`;
                
            if(cart.selected_shipping_rate)
                totalsHTML += `
                    <tr>
                        <th>Shipping</th>
                        <td><strong>` + cart.selected_shipping_rate.formated_price + `</strong></td>
                    </tr>
                    `;
                    
            if(cart.base_discount > 0)
                totalsHTML += `
                    <tr>
                        <th>{{ __('shop::app.checkout.total.disc-amount') }}</th>
                        <td><strong>` + cart.formated_discount + `</strong></td>
                    </tr>
                    `;
                
            totalsHTML += `     
                <tr class="order_total">
                    <th>Order Total</th>
                    <td><strong>` + cart.formated_grand_total + `</strong></td>
                </tr>
            `; 
            
            $('#totals').html(totalsHTML);
        }
    }
    
    function placeOrder() {
        
        var isFormValid = true;
        $("#address-form .required").each(function () { // Note the input:text
            if ($.trim($(this).val()).length == 0) {
                $(this).addClass("border border-danger");
                isFormValid = false;
            } else {
                $(this).removeClass("border border-danger");
            }
        });
        // if (!isFormValid) alert("Please fill in all the required fields (highlighted in red)");
        
        if(!new_billing_address) {
            if( !validateAddressList()) {
                isPlaceOrderEnabled = true;
            }
            else {
                window.showAlert(`alert-danger`, '', "Choose address first!");
            }
        }
        else {
            if( !validateAddressForm('address-form')) {
                isPlaceOrderEnabled = true;
            }
            else {
                window.showAlert(`alert-danger`, '', "Please fill in all the required fields!");
            }
        }
        if (isPlaceOrderEnabled) {
            // isPlaceOrderEnabled = false;
            
            if (allAddress.length > 0) {
            let final_address = allAddress.forEach(addr => {
                if (addr.id == address.billing.address_id) {
                    address.billing.address1 = [addr.address1];

                    if (addr.email) {
                        address.billing.email = addr.email;
                    }

                    if (addr.first_name) {
                        address.billing.first_name = addr.first_name;
                    }

                    if (addr.last_name) {
                        address.billing.last_name = addr.last_name;
                    }
                }

                if (addr.id == address.shipping.address_id) {
                        address.shipping.address1 = [addr.address1];

                    if (addr.email) {
                        address.shipping.email = addr.email;
                    }

                    if (addr.first_name) {
                        address.shipping.first_name = addr.first_name;
                    }

                    if (addr.last_name) {
                        address.shipping.last_name = addr.last_name;
                    }
                }
            });
        }
        
        $('#overlay').fadeIn();
        
        $.ajax({
            type: "POST",
            url: "{{ route('shop.checkout.save-order') }}",
            data: {'_token': "{{ csrf_token() }}", 'address': address, 'shipping_method': 'flatrate_flatrate', 'payment': { 'method': 'cashondelivery' }},
            success: function(response) {
                $('#overlay').fadeOut();
                if (response.success) {
                    if (response.redirect_url) {
                        window.location.href = response.redirect_url;
                    } else {
                        window.location.href = "{{ route('shop.checkout.success') }}";
                    }
                }
            },
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            error: function(result) {
                $('#overlay').fadeOut();
                window.showAlert(`alert-danger`, '', "{{ __('shop::app.common.error') }}");
            }
        });

        } else {
            
            
        }
      
    }

</script>-->

@endpush
