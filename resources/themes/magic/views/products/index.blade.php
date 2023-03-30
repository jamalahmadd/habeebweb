@inject ('toolbarHelper', 'Webkul\Product\Helpers\Toolbar')
@inject ('productRepository', 'Webkul\Product\Repositories\ProductRepository')
@inject ('attributeRepository', 'Webkul\Attribute\Repositories\AttributeRepository')
@inject ('productFlatRepository', 'Webkul\Product\Repositories\ProductFlatRepository')

<?php

$filterAttributes = $attributes = [];
$maxPrice = 0;

if (isset($category)) {
    $filterAttributes = $productFlatRepository->getProductsRelatedFilterableAttributes($category);

    $maxPrice = core()->convertPrice($productFlatRepository->getCategoryProductMaximumPrice($category));
} else {
    $category = null;
}

if (!count($filterAttributes) > 0) {
    // $filterAttributes = $attributeRepository->getFilterAttributes();
}

$fromPrice = 0;
$toPrice = $maxPrice;
if ($range = app('request')->input('price')) {
    $range = explode(',', $range);
    $fromPrice = $range[0];
    $toPrice = $range[1];
}

$categories = [];

$parent_id = $category ? $category->parent_id : 1;

foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(1) as $cat) {
    if ($cat->slug) {
        array_push($categories, $cat);
    }
}

// $categories = [];

// foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(1) as $category) {
//     if ($category->slug) {
//         array_push($categories, $category);
//     }
// }

?>
@extends('shop::layouts.master')

@section('page_title')
    {{ trim($category->meta_title) != '' ? $category->meta_title : $category->name }}
@stop

@section('seo')
    <meta name="description"
        content="{{ trim($category->meta_description) != '' ? $category->meta_description : \Illuminate\Support\Str::limit(strip_tags($category->description), 120, '') }}" />

    <meta name="keywords" content="{{ $category->meta_keywords }}" />

    @if (core()->getConfigData('catalog.rich_snippets.categories.enable'))
        <script type="application/ld+json">
            {!! app('Webkul\Product\Helpers\SEO')->getCategoryJsonLd($category) !!}
        </script>
    @endif
@stop
@push('styles')
    <style>
		/*New*/
		.sub1-toggle{
	    width: 22px;
   	    height: 22px;
        font-size: 14px;
    	line-height: 20px;
    	text-align: center;
    	border-radius: 2px;
    	background-color: #f0f2f5;
	    position: absolute;
    	top: 5px;
    	right: 0;
    	z-index: 20;
    	display: inline-block;
		cursor: pointer;
    	transform-style: preserve-3d;
		}
		.quantity-cart-list{
		font-size:15px;
		display:none;
		}
		.quantity-cart-grid{
		display:inline;
		}
		#list_view:hover,#grid_view:hover{
		color:#5eac11;
		}

		.ps-product__actions{
		left:10px;
		top:25px;
		right:unset;
		}
		.ps-product__price{
		line-height:10px;
		margin-top:5px;
		}
		#product-submit{
		margin-top:5px;
		}
		/*End New*/
		.ps-container{
		min-width:200px;
		}
		.ps-product--standard{
			min-height:320px;
		}
		.ps-product__content{
			width:-webkit-fill-available;
		}
		.ps-product__content{
			position:absolute;
			max-height:95px;
			/*NEW*/
			width: 90%;
			/*End NEw*/
			bottom:0;
		}
		.ps-product__thumbnail{
			margin:auto !important;
		}
		.sub-menu{
			padding:10px !important;
		}
.ps-product__thumbnail {
    width: 100%;
	max-width:230px;
    max-height: 230px;
    overflow: hidden;
}

		.ps-categogy--grid .ps-product--standard{
			    max-width: 100% !important;
			    width: initial;
		}
		.ps-product--standard .ps-product__image figure img:first-child {
    max-width: 100% !important;
}
        .nav-link-box {
            box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
        }

        @media (min-width:768px) {
            .section ul {
                display: flex;
                justify-content: center;
            }

            .nav-link-box:nth-child(2) {
                margin-left: 30px;
            }
        }

        @media (max-width:767px) {
            .section ul {
                display: block;
            }

            .nav-link-box img {
                width: 85px !important;
            }
        }

        .ps-categogy__type {
            display: block !important;
        }

        .ps-product__meta {
            text-align: center;
        }

        .ps-widget__content {
            overflow-x: hidden;
        }

        .ps-widget--product .ps-widget__block .ps-widget__content {
            overflow-x: hidden;
        }

        @media (min-width:768px) {
            .ul-product-box {
                display: contents !important;
            }

            .css-o3ayd5-product {
                min-height: 50px !important;
            }
        }

        @media (max-width:767px) {}

        .css-o3ayd5-product {
            background-color: transparent !important;
        }
		.product-price .new-price{
			text-decoration:none;
		}
    </style>
@endpush
@section('content-wrapper')
    @inject ('productRepository', 'Webkul\Product\Repositories\ProductRepository')

    <div class="ps-categogy ps-categogy--dark">
        <div class="container">
            <ul class="ps-breadcrumb">
                <li class="ps-breadcrumb__item"><a href="/">Home</a></li>
                <!--<li class="ps-breadcrumb__item"><a href="#">Shop</a></li>-->
				@if(Request::segment(1))
                <li class="ps-breadcrumb__item active" aria-current="page">{{ Request::segment(1) }}</li>
				@endif
				@if(Request::segment(2))
                <li class="ps-breadcrumb__item active" aria-current="page">{{ Request::segment(2) }}</li>
				@endif
				@if(Request::segment(3))
                <li class="ps-breadcrumb__item active" aria-current="page">{{ Request::segment(3) }}</li>
				@endif
				@if(Request::segment(4))
                <li class="ps-breadcrumb__item active" aria-current="page">{{ Request::segment(4) }}</li>
				@endif
            </ul>

            <div class="ps-categogy__content">
                <div class="row row-reverse">
                    <div class="col-12 col-md-9">


                        {{-- <div class="dashbord-switcher">
                            <ul class="nav nav-tabs nav-tabs-product " id="myTab" role="tablist">
                                <li class="nav-item mb-4" role="presentation">
                                    <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab"
                                        data-target="#tab-dashboard" role="tab" aria-controls="tab-dashboard"
                                        aria-selected="true"> All</a>
                                </li>
                                <li class="nav-item mb-4" role="presentation">
                                    <a class="nav-link" id="tab-profile-link" data-toggle="tab" data-target="#tab-profile"
                                        role="tab" aria-controls="tab-profile" aria-selected="false">Juice</a>
                                </li>
                                <li class="nav-item mb-4" role="presentation">
                                    <a class="nav-link" id="tab-wishlist-link" data-toggle="tab" data-target="#tab-wishlist"
                                        role="tab" aria-controls="tab-wishlist-link">Fruit & Vegetables</a>
                                </li>

                            </ul>
                        </div> --}}
@inject('wish','Webkul\Customer\Models\Wishlist')
                        <div class="ps-categogy__wrapper">
                            <!--<div class="ps-categogy__type">

                                {{-- <a href="grid-two.html"><img src="img/icon/gird2-dark.svg" alt=""></a>
                                <a href="grid-three.html"><img src="img/icon/gird3-dark.svg" alt=""></a>
                                <a class="active" href="grid-four.html"><img src="img/icon/gird4-dark.svg"
                                        alt=""></a> --}}
                            </div>-->

                            <?php $products = $productRepository->getAll($category->id); ?>
                            @include ('shop::products.list.toolbar')

                        </div>
                        <div class="product ps-categogy--grid">
						<!--NEW-->
						@php $customer_cart = cart()->getCart();@endphp
						<!--End New-->

                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade active show" id="tab-dashboard" role="tab-panel"
                                    aria-labelledby="tab-dashboard-link">
                                    <div class="row m-0">

                                        @if (in_array($category->display_mode, [null, 'products_only', 'products_and_description']))


                                            {{-- @include ('shop::products.list.toolbar') --}}
      <style>
                                .ribbon {
                                    position: absolute;
                                    right: -5px;
                                    top: -5px;
                                    z-index: 1;
                                    overflow: hidden;
                                    width: 93px;
                                    height: 93px;
                                    text-align: right;
                                }

                                .ribbon span {
                                    font-size: 12px;
                                    color: #fff;
                                    text-transform: uppercase;
                                    text-align: center;
                                    font-weight: bold;
                                    line-height: 32px;
                                    transform: rotate(45deg);
                                    width: 125px;
                                    display: block;
                                    background: #ff0000;
                                    background: linear-gradient(#ff0000 0%, #ff0000 100%);
                                    box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
                                    position: absolute;
                                    top: 17px;
                                    right: -29px;
                                }

                                .ribbon span::before {
                                    content: '';
                                    position: absolute;
                                    left: 0px;
                                    top: 100%;
                                    z-index: -1;
                                    border-left: 3px solid #ff0000;
                                    border-right: 3px solid transparent;
                                    border-bottom: 3px solid transparent;
                                    border-top: 3px solid #ff0000;
                                }

                                .ribbon span::after {
                                    content: '';
                                    position: absolute;
                                    right: 0%;
                                    top: 100%;
                                    z-index: -1;
                                    border-right: 3px solid #ff0000;
                                    border-left: 3px solid transparent;
                                    border-bottom: 3px solid transparent;
                                    border-top: 3px solid #ff0000;
                                }

                                .red span {
                                    background: linear-gradient(#f70505 0%, #8f0808 100%);
                                }

                                .red span::before {
                                    border-left-color: #8f0808;
                                    border-top-color: #8f0808;
                                }

                                .red span::after {
                                    border-right-color: #8f0808;
                                    border-top-color: #8f0808;
                                }

                                .blue span {
                                    background: linear-gradient(#2989d8 0%, #1e5799 100%);
                                }

                                .blue span::before {
                                    border-left-color: #1e5799;
                                    border-top-color: #1e5799;
                                }

                                .blue span::after {
                                    border-right-color: #1e5799;
                                    border-top-color: #1e5799;
                                }

                                .foo {
                                    clear: both;
                                }

                                .bar {
                                    content: "";
                                    left: 0px;
                                    top: 100%;
                                    z-index: -1;
                                    border-left: 3px solid #ff0000;
                                    border-right: 3px solid transparent;
                                    border-bottom: 3px solid transparent;
                                    border-top: 3px solid #ff0000;
                                }

                                .baz {
                                    font-size: 1rem;
                                    color: #fff;
                                    text-transform: uppercase;
                                    text-align: center;
                                    font-weight: bold;
                                    line-height: 2em;
                                    transform: rotate(45deg);
                                    width: 100px;
                                    display: block;
                                    background: #79a70a;
                                    background: linear-gradient(#9bc90d 0%, #79a70a 100%);
                                    box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
                                    position: absolute;
                                    top: 100px;
                                    left: 1000px;
                                }
                            </style>
                                            @if (count($products))
                                                @foreach ($products as $product)
								<!--New-->
								@if($customer_cart)
								@foreach($customer_cart->items as $item)
									@if($product->product->id==$item->product_id)	
									@php
									$found=true;
									$found_quantity=$item->quantity;
									break;
									@endphp
								@else	
									@php
									$found=false;
									@endphp
									@endif
								@endforeach
								@endif
								<!--End New-->
                                                    <?php $productBaseImage = productimage()->getProductBaseImage($product); ?>
                                                    <div class="col-12 col-lg-3 col-xl-3 p-0 mt-5 ps-container">
	
                                                        <div class=" ps-product ps-product--standard">
															
															<div class="ps-product__actions product-wishlist">
																
                                                <form id="frm{{ $product->id }}" action="{{ Route('customer.wishlist.add',$product->id) }}" method="POST"> @csrf<div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Wishlist">@if(Auth::guard('customer')->user())
													@if(Auth::guard('customer')->user())		
													@if(count($wish->where(['customer_id'=>Auth::guard('customer')->user()->id,'product_id'=>$product->product_id])->get())>0)
													<i onclick="document.getElementById('frm{{ $product->id }}').submit();"  style="color:red"  class="fa fa-heart" aria-hidden="true"></i>
													@else
													<i onclick="document.getElementById('frm{{ $product->id }}').submit();" style="color:red" class="fa fa-heart-o"
													   aria-hidden="true"></i>
													@endif
													@else
													<i style="color:red" class="fa fa-heart-o"
													   aria-hidden="true"></i>
													@endif
													@else <a href="/customer/login"><i class="fa fa-heart" aria-hidden="true"></i></a> @endif</div></form>
															
															</div>
                                                            <div class="ps-product__thumbnail thumbnail-products">
																
                                                                <a class="ps-product__image"
                                                                    href="{{ route('shop.productOrCategory.index', $product->url_key) }}">
                                                                    
																	<figure>
																		@if($product->special_price)
																		<div class="ribbon"><span><s>{{ ($product->price*$product->special_price)/100 }} % off</s></span></div>
																		@endif
                                                                        <img src="{{ $productBaseImage['original_image_url'] }}"
                                                                            alt="alt" class="image_tag_one">
                                                                        <img src="{{ $productBaseImage['original_image_url'] }}"
                                                                            alt="alt" class="image_tag_two">
                                                                    </figure>
                                                                </a>

                                                                <div class="ps-product__badge">
                                                                    <div class="ps-badge ps-badge--sale">

                                                                        @if (!$product->getTypeInstance()->haveSpecialPrice() && $product->new)
                                                                            {{ __('shop::app.products.new') }}
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ps-product__content content-products">
                                                                <h5 class="ps-product__title">
                                                                    <a href="{{ route('shop.productOrCategory.index', $product->url_key) }}">
                                                                        {{ $product->name }}
                                                                    </a>
                                                                </h5>
																
                                                                <div
                                                                    class="ps-product__meta d-flex justify-content-between">
                                                                    <span
                                                                        class="ps-product__price">{!! $product->getTypeInstance()->getPriceHtml() !!}
																																																			@if($customer_cart)
																@if($found==true)
																<br><span class="quantity-cart-grid" style="float:left; margin-top:0px;">in cart:&nbsp;<?=$found_quantity?></span>
																@endif
																@endif
																	</span>
                                                                    
                                <form method="POST" id="product-form" class="ps--form" action="{{ route('cart.add', $product->product_id) }}"
                                    @click="onSubmit($event)">
                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                    <input type="hidden" id="selected_configurable_option" name="selected_configurable_option"
                                        value="">
                                    <input type="hidden" name="is_buy_now" v-model="is_buy_now">@csrf
                                    <input type="hidden" name="quantity" value="1">
									<button type="submit" id="product-submit" style="color: #fff;background-color: var(--color-green);padding: 0px 7px 3px 8px;border: 0;" class="ps--submit">
										<!--<i class="fa fa-shopping-bag"></i>-->
@if($customer_cart)
@if($found==true)

<i class="fa fa-plus"></i> 												
@else
	<i class="fa fa-shopping-bag"></i> 												
@endif
@else	
<i class="fa fa-shopping-bag"></i> 
@endif
									</button>
									@if($customer_cart)
									@if($found==true)
									&nbsp; <span class="quantity-cart-list">in cart:&nbsp;<?=$found_quantity?></span>
									@endif
									@endif
																	</form>
                                                                </div>


                                                                <div class="ps-product__actions ps-product__group-mobile">
                                                                    <div class="ps-product__quantity">
                                                                        <div
                                                                            class="def-number-input number-input safari_only">
                                                                            <button class="minus"
                                                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                                    class="icon-minus"></i></button>
                                                                            <input class="quantity" min="0"
                                                                                name="quantity" value="1"
                                                                                type="number">
                                                                            <button class="plus"
                                                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                                    class="icon-plus"></i></button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ps-product__cart"> <a
                                                                            class="ps-btn ps-btn--warning" href="#"
                                                                            data-toggle="modal"
                                                                            data-target="#popupAddcart">Add
                                                                            to cart</a></div>
                                                                    <div class="ps-product__item cart"
                                                                        data-toggle="tooltip" data-placement="left"
                                                                        title="Add to cart"><a
                                                                            href="product-details.html"><i
                                                                                class="fa fa-shopping-basket"></i></a>
                                                                    </div>
                                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                                        data-placement="left" title="Wishlist"><a
                                                                            href="#"><i class="fa fa-heart"
                                                                                aria-hidden="true"></i></a>
                                                                    </div>
                                                                    <div class="ps-product__item rotate"
                                                                        data-toggle="tooltip" data-placement="left"
                                                                        title="Add to compare"><a href="#"><i
                                                                                class="fa fa-align-left"></i></a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="ps-pagination">
                            <ul class="pagination">
                                <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div> --}}
                        <div class="ps-delivery ps-delivery--info" data-background="img/promotion/banner-delivery-3.jpg">
                            <div class="ps-delivery__content">
                                <div class="ps-delivery__text"> <i class="icon-shield-check"></i><span> <strong>100%
                                            Secure delivery </strong>without contacting the courier</span></div>
								{{-- <a class="ps-delivery__more" href="#">More</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="ps-widget ps-widget--product mb-5">
                            <div class="ps-widget__block">
                                <h4 class="ps-widget__title">Categories</h4><a class="ps-block-control" href="#"><i
                                        class="fa fa-angle-down"></i></a>
                                <div class="ps-widget__content ps-widget__category">
                                    <ul class="menu--mobile">

										{{-- @foreach ($categories as $category_data)
                                            <li><a
                                                    @if (count($category_data->children)) href="#" @else href="" @endif>
                                                    {{ $category_data->name }}
                                                </a>
                                                <span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>

                                                <ul class="sub-menu" style="z-index:0 !important">
                                                    @foreach ($category_data->children as $sub)
                                                        <li><a
                                                                href="{{ url('/' . $category_data->slug . '/' . $sub['slug']) }}">{{ $sub['name'] }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach --}}
										
                                        @foreach ($categories as $category_data)
										<h4 class="ps-widget__title">{{ $category_data->name }}</h4>
                                                    @foreach ($category_data->children as $sub)
                                            <li @if(Request::segment(2)==$sub->slug) class="active" @endif><a
                                                    @if (count($sub->children)) href="#" @else href="" @endif>
                                                    {{ $sub->name }}
                                                </a>
                                                <span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>

                                                {{-- @if (count($category_data->children)) --}}
                                                <ul class="sub-menu" style="z-index:0 !important;@if(Request::segment(2)==$sub->slug) display: block; @endif">
                                                    @foreach ($sub->children as $sub1)
                                                        <li>
															<a href="{{ url('/' . $category_data->slug . '/' . $sub->slug . '/' . $sub1['slug']) }}">
																{{ $sub1['name'] }}
															</a>
															<!--NEW
															<span class="sub1-toggle"><i class="fa fa-plus sub1-icon" style="font-size:8px;"></i></span>
															<ul class="sub1-menu" style="z-index:0 !important;display:none;">
															 @foreach ($sub1->children as $sub2)
                                                        <li>
															<a href="{{ url('/' . $category_data->slug . '/' . $sub->slug . '/' . $sub1['slug'] .'/'. $sub2['slug']) }}">
																{{ $sub2['name'] }}
															</a>
															</li>
															@endforeach
															</ul>
															END NEW-->
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                {{-- @endif --}}
                                            </li>
                                                    @endforeach
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            {{-- <div class="ps-widget__block">
                                <h4 class="ps-widget__title">Brands</h4><a class="ps-block-control" href="#"><i
                                        class="fa fa-angle-down"></i></a>
								<div class="ps-widget__content">
								@foreach(DB::table('product_flat')->distinct('brand_label')->get() as $brand)
                                    <div class="ps-widget__item">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="BestPharm">
                                            <label class="custom-control-label" for="BestPharm">{{ $brand->brand_label }}</label>
                                        </div>
                                    </div>
									@endforeach
                                </div>
                            </div> --}}


                            @if ($filterAttributes)
                            @foreach ($filterAttributes as $filterAttribute)
                                @if ($filterAttribute->type == 'price')
                                   {{-- <div class="pricing-range">
                                        <h5 class="sb-title">PRICE RANGE</h5>
                                        <form method="GET">
                                            <div class="price-range-slider"
                                                id="widget-{{ $filterAttribute->code }}">
                                                <div id="slider-range" class="range-bar"></div>
                                                <div class="pricing-value d-flex align-items-center">
                                                    <span>Price : </span>
                                                    <span id="filter-price-range" name="my_range"></span>
                                                    <input type="text" id="amount" readonly="">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="ps-widget__block">
                                        <h4 class="ps-widget__title">By price</h4><a class="ps-block-control" href="#"><i
                                                class="fa fa-angle-down"></i></a>
                                        <form method="GET">
                                            <div class="ps-widget__content"
                                                id="widget-{{ $filterAttribute->code }}">
                                                <div class="ps-widget__price">
                                                    <div id="slider-range"></div>
                                                </div>
                                                <div class="ps-widget__input">
                                                    <span class="ps-price" id="slide-price-min">
                                                        <input type="text" id="amount" readonly="">
                                                        EGP
                                                        0</span><span class="bridge">-</span><span class="ps-price"
                                                        id="slide-price-max">EGP 820</span></div>
                                                <button class="ps-widget__filter">Filter</button>
                                            </div>
                                        </form>
                                    </div>--}}
                                @else
                                    <?php
                                    $init_attr = [];
                                    $i = 0;
                                    if (isset($_GET[$filterAttribute->code])) {
                                        $params = explode(',', $_GET[$filterAttribute->code]);
                                        foreach ($params as $op) {
                                            $init_attr[$op] = 'checked';
                                        }
                                    }
                                    
                                    ?>
                                    
                            <div class="ps-widget__block">
                                <h4 class="ps-widget__title">
                                    {{ $filterAttribute->name ? $filterAttribute->name : $filterAttribute->admin_name }}
                                </h4>
                                <a class="ps-block-control" href="#"><i
                                        class="fa fa-angle-down"></i></a>
								<div class="ps-widget__content">
                                @foreach ($filterAttribute->options as $option)
                                    <div class="ps-widget__item">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox"
                                            name="{{ $filterAttribute->code }}"
                                            value="{{ $option->id }}"
                                            id="{{ $option->id }}"
                                            onchange="optionClicked({{ $option->id }}, '{{ $filterAttribute->code }}', event)"
                                            <?php echo isset($init_attr[$option->id]) ? 'checked' : ''; ?>>
                                            <label class="custom-control-label" for="{{ $option->id }}">
                                                {{ $option->label ? $option->label : $option->admin_name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                                @endif
                            @endforeach
                        @endif
                            {{-- <div class="ps-widget__block">
                                <h4 class="ps-widget__title">By price</h4><a class="ps-block-control" href="#"><i
                                        class="fa fa-angle-down"></i></a>
                                <div class="ps-widget__content">
                                    <div class="ps-widget__price">
                                        <div id="slide-price"></div>
                                    </div>
                                    <div class="ps-widget__input"><span class="ps-price" id="slide-price-min">EGP
                                            0</span><span class="bridge">-</span><span class="ps-price"
                                            id="slide-price-max">EGP 820</span></div>
                                    <button class="ps-widget__filter">Filter</button>
                                </div>
                            </div> --}}



                            <div class="ps-widget__promo"><img src="img/habib/Slider.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@stop

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.responsive-layred-filter').css('display', 'none');
            $(".sort-icon, .filter-icon").on('click', function(e) {
                var currentElement = $(e.currentTarget);
                if (currentElement.hasClass('sort-icon')) {
                    currentElement.removeClass('sort-icon');
                    currentElement.addClass('icon-menu-close-adj');
                    currentElement.next().removeClass();
                    currentElement.next().addClass('icon filter-icon');
                    $('.responsive-layred-filter').css('display', 'none');
                    $('.pager').css('display', 'flex');
                    $('.pager').css('justify-content', 'space-between');
                } else if (currentElement.hasClass('filter-icon')) {
                    currentElement.removeClass('filter-icon');
                    currentElement.addClass('icon-menu-close-adj');
                    currentElement.prev().removeClass();
                    currentElement.prev().addClass('icon sort-icon');
                    $('.pager').css('display', 'none');
                    $('.responsive-layred-filter').css('display', 'block');
                    $('.responsive-layred-filter').css('margin-top', '10px');
                } else {
                    currentElement.removeClass('icon-menu-close-adj');
                    $('.responsive-layred-filter').css('display', 'none');
                    $('.pager').css('display', 'none');
                    if ($(this).index() == 0) {
                        currentElement.addClass('sort-icon');
                    } else {
                        currentElement.addClass('filter-icon');
                    }
                }
            });
        });
    </script>



    <script>
        let maxPrice = <?php echo json_encode($maxPrice); ?>;
        let fromPrice = <?php echo json_encode($fromPrice); ?>;
        let toPrice = <?php echo json_encode($toPrice); ?>;
        console.log(maxPrice)
        maxPrice = maxPrice ? ((parseInt(maxPrice) !== 0 || maxPrice) ? parseInt(maxPrice) : 500) : 500;

        var filters = [];
        var appliedFilters = {};
        $(document).ready(function() {
            let urlParams = new URLSearchParams(window.location.search);

            urlParams.forEach((value, index) => {
                appliedFilters[index] = value.split(',');
            });
        });

        $("#slider-range").slider({
            range: true,
            min: 0,
            max: maxPrice,
            values: [fromPrice, toPrice],
            slide: function(event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            },
            stop: function(event, ui) {
                appliedFilters['price'] = [ui.values[0], ui.values[1]];
                applyFilter();
            }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

        // Slider For category pages / filter price
        // if (typeof noUiSlider === 'object') {
        //     var priceSlider = document.getElementById('slider-range');

        //     // Check if #price-slider elem is exists if not return
        //     // to prevent error logs
        //     if (priceSlider) {
        //         noUiSlider.create(priceSlider, {
        //             start: [fromPrice, toPrice],
        //             connect: true,
        //             margin: 10,
        //             range: {
        //                 'min': 0,
        //                 'max': maxPrice
        //             },
        //             tooltips: true,
        //             format: wNumb({
        //                 decimals: 0,
        //                 prefix: '$'
        //             })
        //         });

        //         // Update Price Range
        //         priceSlider.noUiSlider.on('update', function(values, handle) {
        //             $('#filter-price-range').text(values.join(' - '));
        //         });

        //         priceSlider.noUiSlider.on('end', function(values, handle) {

        //             appliedFilters['price'] = [parseInt(values[0].split("$")[1]), parseInt(values[1].split("$")[
        //                 1])];
        //             applyFilter();
        //         });
        //     }
        // }




        function optionClicked(id, attributeCode, event) {
            let checkbox = $(`#${id}`);
            if (checkbox && checkbox.length > 0 && event.type != "checkbox") {
                checkbox = checkbox[0];
                // checkbox.checked = !checkbox.checked;
                if (!appliedFilters[attributeCode])
                    appliedFilters[attributeCode] = [];

                if (checkbox.checked) {
                    appliedFilters[attributeCode].push(id);
                } else {
                    let idPosition = appliedFilters[attributeCode].indexOf(id);
                    if (idPosition == -1)
                        idPosition = appliedFilters[attributeCode].indexOf(id.toString());

                    appliedFilters[attributeCode].splice(idPosition, 1);
                }
                if (!appliedFilters[attributeCode].length) {
                    delete appliedFilters[attributeCode];
                }
                applyFilter();
            }
        }

        function applyFilter() {
            var params = [];

            for (key in appliedFilters) {
                if (key != 'page') {
                    params.push(key + '=' + this.appliedFilters[key].join(','))
                }
            }

            window.location.href = "?" + params.join('&');
        }
    </script>

<!--NEW
<script>
    $(document).ready(function(){
        $(".sub1-toggle").click(function(){
            $('.sub1-menu').not($(this).siblings()).slideUp();
            $('.sub1-icon').not($(this).children()).attr('class', 'fa fa-plus sub1-icon');
            $(this).next(".sub1-menu").slideToggle();
            $(this).attr('class', 'fa fa-minus sub1-icon');
        });
    });
</script>
END NEW-->
@endpush
