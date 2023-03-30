@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
@inject ('customHelper', 'Webkul\Velocity\Helpers\Helper')
@inject ('productImageHelper', 'Webkul\Product\ProductImage')
@inject ('configurableOptionHelper', 'Webkul\Product\Helpers\ConfigurableOption')
@inject ('wishListHelper', 'Webkul\Customer\Helpers\Wishlist')
@inject('wishlist','Webkul\Customer\Models\Wishlist')

@php

$buyOnWhatsappParams = [
    'phone' => 'xxxxxxxx',
    'text' =>
        'Hello, I want to buy:

' .
        $product->name .
        '
' .
        url($product->url_key),
];

$buyOnWhatsapp = http_build_query($buyOnWhatsappParams);

$total = $reviewHelper->getTotalReviews($product);

$avgRatings = $reviewHelper->getAverageRating($product);
$avgStarRating = round($avgRatings);

$galleryImages = $productImageHelper->getGalleryImages($product);
$productImages = [];
$images = productimage()->getGalleryImages($product);

foreach ($images as $key => $image) {
    array_push($productImages, $image['medium_image_url']);
}
$images = productimage()->getGalleryImages($product);
$videos = productvideo()->getVideos($product);
// dd($images);
$videoData = $imageData = [];

foreach ($videos as $key => $video) {
    $videoData[$key]['type'] = $video['type'];
    $videoData[$key]['large_image_url'] = $videoData[$key]['small_image_url'] = $videoData[$key]['medium_image_url'] = $videoData[$key]['original_image_url'] = $video['video_url'];
}

foreach ($images as $key => $image) {
    $imageData[$key]['type'] = '';
    $imageData[$key]['large_image_url'] = $image['large_image_url'];
    $imageData[$key]['small_image_url'] = $image['small_image_url'];
    $imageData[$key]['medium_image_url'] = $image['medium_image_url'];
    $imageData[$key]['original_image_url'] = $image['original_image_url'];
}

$images = array_merge($imageData, $videoData);
$productBaseImage = $images[0];
// dd($productBaseImage);
$categories = $product->product->notRootcategories ? $product->product->notRootcategories : [];

$relatedProducts = $product->related_products()->get();
// $config = $configurableOptionHelper->getConfigurationConfig($product);
// dd($config);
@endphp

@extends('shop::layouts.master')

@section('page_title')
    {{ trim($product->meta_title) != '' ? $product->meta_title : $product->name }}
@stop
@push('styles')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
<style>
    .ps-product--detail .ps-product__title a {
        font-size: 18px;
    }

    .ps-product--detail .ps-product__feature {
        margin-top: 0px !important;
    }
	.product-main-image #Mainimg1{
	width:350px !important;
	height:350px;
	max-width:unset !important;
	}
	#removeButton{
		background-color:#FF0000;
		border:1px solid #FF0000;
		color:#ffffff;
	}
	#removeButton:hover{
	background-color:#ffffff;
	color:#ff0000;
	}
    .ps-product__content {
        margin-top: 25px;
    }

    .ps-product--detail .ps-product__content .ps-desc {
        text-align: justify;
    }

    @media (max-width:767px) {
		.product-main-image {
    height: 300px;
    overflow: hidden;
    width: 70%;
    margin: auto;
}
		.product-main-image{
			height:300px;
			overflow:hidden;
		}
        .ps-product--gallery {
            margin-bottom: 30px !important;
        }

        .ps-product--detail .ps-product__info {
            margin-bottom: 30px;
        }

        .ps-product--detail .ps-product__content .ps-title {
            font-size: 20px;
        }

        .ps-product--detail .ps-tab-list li a {
            font-size: 20px;
        }
    }
	.rating {
display: flex;
flex-direction: row-reverse;
justify-content: center;
}


.rating > input{ display:none;}

.rating > label {
position: relative;
width: 1.1em;
font-size: 40px;
color: #FFD700;
cursor: pointer;
}

.rating > label::before{
content: "\2605";
position: absolute;
opacity: 0;
}

.rating > label:hover:before,
.rating > label:hover ~ label:before {
opacity: 1 !important;
}

.rating > input:checked ~ label:before{
opacity:1;
}

.rating:hover > input:checked ~ label:before{ opacity: 0.4; }



   @media screen and (max-width: 992px) {
	   .product-main-image img {
    max-width: 100% !important;
		   padding-inline-start: 10px;
    padding-inline-end: 21PX;
    margin: auto;
}
	}
	.nav-tabs .nav-link.active {
    color: #495057;
    background-color: transparent;
    border-color: #dee2e6 #dee2e6 #fff;
}
	#productContentTabs{
		padding-top:40px;
	}
		#productContentTabs a{
			color:black;
			font-weight:600;
	}
    @media screen and (min-width: 992px) {
		.product-main-image img {
    max-width: 80% !important;
    padding-inline-start: 42px;
    padding-inline-end: 40px;
}
		.product-main-image{
			width:100%;
			max-height:600px;
			overflow:hidden;
	
		}
        .product-gallery-vertical .product-main-image {
            flex: 0 0 80%;
            max-width: 80%;
        }

        .product-gallery-vertical .product-main-image {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .product-gallery-vertical .btn-product-gallery {
            right: 2.5rem;
        }

        .product-gallery-vertical .product-image-gallery {
            width: auto;
            flex: 0 0 20%;
            max-width: 20%;
            margin-left: 0;
            margin-right: 0;
        }

        .product-gallery-vertical .product-image-gallery,
        .product-gallery-vertical .product-main-image {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .product-gallery-vertical .product-gallery-item {
            flex: 0 0 100%;
            max-width: 100%;
            padding-left: 0;
            padding-right: 0;
            margin-bottom: 1rem;
        }

        .product-gallery-vertical .row {
            margin-left: -0.5rem;
            margin-right: -0.5rem;
            flex-direction: row-reverse;
        }
    }

    .product-main-image {
        position: relative;
        margin-bottom: 1rem;
    }

    .zoom {
        display: inline-block;
        width: 100%;
        position: relative;
    }

    .product-image-gallery {
        display: flex;
        flex-flow: row wrap;
        /* margin-left: -0.5rem; */
        /* margin-right: -0.5rem; */
    }

    .product-gallery-item {
        position: relative;
        display: block;
        flex: 0 0 25%;
        max-width: 25%;
        padding-left: 0.5rem;
        padding-right: 0.5rem;
        margin-bottom: 1rem;
    }

    .product-gallery-item img {
        max-width: none;
        width: 100%;
    }

.ps-noti{
	position:relative;
	z-index:999;
}
.zoomContainer{
	z-index:99 !important;
}

</style>
@endpush
@section('seo')
    <meta name="description"
        content="{{ trim($product->meta_description) != '' ? $product->meta_description : \Illuminate\Support\Str::limit(strip_tags($product->description), 120, '') }}" />

    <meta name="keywords" content="{{ $product->meta_keywords }}" />

    @if (core()->getConfigData('catalog.rich_snippets.products.enable'))
        <script type="application/ld+json">
            {{ app('Webkul\Product\Helpers\SEO')->getProductJsonLd($product) }}
        </script>
    @endif

    <?php $productBaseImage = productimage()->getProductBaseImage($product); ?>

    <meta name="twitter:card" content="summary_large_image" />

    <meta name="twitter:title" content="{{ $product->name }}" />

    <meta name="twitter:description" content="{!! htmlspecialchars(trim(strip_tags($product->description))) !!}" />

    <meta name="twitter:image:alt" content="" />

    <meta name="twitter:image" content="{{ $productBaseImage['medium_image_url'] }}" />

    <meta property="og:type" content="og:product" />

    <meta property="og:title" content="{{ $product->name }}" />

    <meta property="og:image" content="{{ $productBaseImage['medium_image_url'] }}" />

    <meta property="og:description" content="{!! htmlspecialchars(trim(strip_tags($product->description))) !!}" />

    <meta property="og:url" content="{{ route('shop.productOrCategory.index', $product->url_key) }}" />
<meta http-equiv="content-type" 
        content="text/html;charset=UTF-8" />
    <meta name="viewport" content=
        "width=device-width, initial-scale=1.0">
  
  
    <style type="text/css">
        @media screen and (min-width: 500px) {
            a {
                display: none
            }
        }
    </style>
@stop

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('magic/assets/plugins/font-awesome/css/font-awesome.min.css') }}">
@endpush

@section('content-wrapper')

    {!! view_render_event('bagisto.shop.products.view.before', ['product' => $product]) !!}
    {{-- @php
        dd($product);
    @endphp --}}

    <div class="ps-page--product">
        <div class="container">
            <ul class="ps-breadcrumb">
                <li class="ps-breadcrumb__item"><a href="/">Home</a></li>
				
                <li class="ps-breadcrumb__item"><a href="#">Shop</a></li>

            </ul>
            <div class="ps-page__content">
                <div class="ps-product--detail">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-gallery product-gallery-vertical ">
                                            <div class="row">
                                                <figure class="product-main-image">

                                                    <div class='zoom'>
                                                        <img src="{{ $productBaseImage['original_image_url'] }}" id="Mainimg1"
                                                            data-zoom-image="{{ $productBaseImage['original_image_url'] }}"
                                                            data-toggle="lightbox" alt="product image"/>

                                                    </div>

                                                    <a href="{{ $productBaseImage['original_image_url'] }}" class="btn-product-gallery">
                                                        <i class="icon-arrows"></i>
                                                    </a>

                                                </figure><!-- End .product-main-image -->

                                                <div id="zoomGallery" class="product-image-gallery filter  hdpe">

                                                    @foreach ($images as $image)
                                                        <a class="product-gallery-item   @if($loop->first) active @endif" href="#"
                                                            data-zoom-image="{{ $image['original_image_url'] }}">
                                                            <img   src="{{ $image['original_image_url'] }}" id="Mainimg"
                                                                alt="product side" onclick="showImg(this)"
                                                                data-zoom-image="{{ $image['original_image_url'] }}"
                                                                class="small-img">
                                                        </a>
                                                    @endforeach
                                                </div><!-- End .product-image-gallery -->
                                            </div><!-- End .row -->
                                        </div><!-- End .product-gallery -->
                                    </div><!-- End .col-md-6 -->
                                    <div class="col-12 col-md-6 ">
                                        <div class="ps-product__info">

                                            <div class="ps-product__title"><a href="#">{{ $product->name }}</a></div>

                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>{{ $product->short_description }}</li>
                                                </ul>
                                            </div>
											<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
											<ul class="ps-product__bundle">
												{{ $product->description }}
											</ul>
                                           <!-- <ul class="ps-product__bundle">
                                                <li><i class="icon-wallet"></i>100% Money back</li>
                                                <li><i class="icon-bag2"></i>Non-contact shipping</li>
                                                <li><i class="icon-truck"></i>Free delivery for order over EGP 200
                                                </li>
                                            </ul>-->
											
                                            <div class="ps-product__type">
                                                <ul class="ps-product__list">
                                                    <li> <span class="ps-list__title">Brand: </span><a
                                                            class="ps-list__text" href="#">{{ $product->brand_label }}</a>
                                                    </li>
													<li> <span class="ps-list__title">Tags: </span><a
                                                            class="ps-list__text" href="#">{{ $product->meta_keywords }}</a>
                                                    </li>
											
                                                </ul>
                                            </div>
                                         <div class="ps-product__social">
											  <!-- 	<div class="fb-share-button" 
													data-href="https://habeeb.verozone.cloud" 
													data-layout="button">
												</div>-->
                                                <ul class="ps-social ps-social--color">
													<div class="ps-product__social">
												<li><div class="fb-share-button" 
													data-href="https://habeeb.verozone.cloud" 
													data-layout="button">
													</div></li>
																							 <li style="height:20px; border-radius:3px; width:66px;"><a class="ps-social__link twitter"  href="https://twitter.com/intent/tweet?text=https://habeeb.verozone.cloud/{{$product->product->url_key}}" style=" height:100%; width:100%; line-height:20px; font-size:11px; color:#ffffff;   padding:0 6px;font-family: Helvetica, Arial, sans-serif;"><i
                                                                class="fa fa-twitter"></i> <span style="padding:0 4px; font-weight:bold;">Share</span>
												 </a>
														</li>
													 <li style="height:20px; border-radius:3px; width:66px;"><a class="ps-social__link whatsapp"  href=
												"whatsapp://send?text=https://habeeb.verozone.cloud/{{$product->product->url_key}}"
   											     data-action="share/whatsapp/share"
   											     target="_blank" style=" height:100%; width:100%; line-height:20px; font-size:11px; color:#ffffff;   padding:0 6px;font-family: Helvetica, Arial, sans-serif;"><i class="fa fa-whatsapp"></i> <span style="padding:0 4px; font-weight:bold;">Share</span></a></li>
                                                  <!--  <li><div class="fb-share-button" 
													data-href="https://habeeb.verozone.cloud" data-layout="button" >
															 <a class="ps-social__link facebook" href="https://habeeb.verozone.cloud" ><i
                                                                class="fa fa-facebook"> </i><span
                                                                class="ps-tooltip">Facebook</span></a>

														</div>	</li>-->
														
														
                                                   <!--Commented <li><a class="ps-social__link twitter"  href="https://twitter.com/intent/tweet?text=https://habeeb.verozone.cloud/{{$product->name}}"><i
                                                                class="fa fa-twitter"></i><span
                                                                class="ps-tooltip">Twitter</span></a></li>
													 <li><a class="ps-social__link whatsapp"  href=
												"whatsapp://send?text=https://habeeb.verozone.cloud/{{$product->name}}"
   											     data-action="share/whatsapp/share"
   											     target="_blank"><i class="fa fa-whatsapp"></i><span
                                                                class="ps-tooltip">Whatsap</span></a></li>
														
														End Commented-->
													</div>		
                                                </ul>
												<!--<a class="twitter-share-button"
  href="https://twitter.com/intent/tweet?text=Hello%20world">
Tweet</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <form method="POST" id="product-form" action="{{ route('cart.add', $product->product_id) }}"
                                    @click="onSubmit($event)">
                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                    <input type="hidden" id="selected_configurable_option" name="selected_configurable_option"
                                        value="">
                                    <input type="hidden" name="is_buy_now" v-model="is_buy_now">@csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <div class="ps-product__feature">
                                        <div class="ps-product__badge"><span class="ps-badge ps-badge--instock"> IN
                                                STOCK</span>
                                        </div>
										
                                        <div class="ps-product__meta"><span class="ps-product__price"style="color: black;">{!! $product->getTypeInstance()->getPriceHtml() !!}</span>
                                        </div>

                                        <div class="ps-product__quantity">
                                            <h6>Quantity</h6>
                                            <div class="def-number-input number-input safari_only">
                                                <button type="button" class="minus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                        class="icon-minus"></i></button>
                                                <input class="quantity" min="1" name="quantity" id="quantity" value="1" type="number">
                                                <button type="button" class="plus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                        class="icon-plus"></i></button>
                                            </div>
                                        </div>
                                        <button type="submit" class="ps-btn ps-btn--warning">
                                            {{ $product->type == 'booking' ? __('shop::app.products.book-now') : __('shop::app.products.add-to-cart') }}
                                        </button>
                                </form>
									@auth('customer')
										@php 
										$checkWishlist=$wishlist->where('customer_id',auth()->guard('customer')->user()->id)
										->where('product_id',$product->product_id)->first();
										@endphp
									    @if(!isset($checkWishlist))
										<form method="POST" action="{{ route('customer.wishlist.add', $product->product_id) }}">
											@csrf
											<div class="ps-product__variations"><button class="ps-btn ps-btn--warning"
																						type="submit">Add to wishlist</button></div>
										
										</form>
										@else
										<form method="POST" action="{{ route('customer.wishlist.delete', $product->product_id) }}">
											@csrf
											<div class="ps-product__variations"><button class="ps-btn" 
																		id="removeButton" type="submit">Remove from wishlist</button></div>
										
										</form>
										@endif
									@endauth
									@auth('customer')
									<h6 style="margin-top:20px">Rate this product</h6>
<form method="POST" action="{{route('customer.review.add')}}">	
	@csrf
<div class="rating">

  <input type="hidden" name="product_id" value="{{$product->product_id}}" >
  <input type="submit" name="rating" value="5" id="5"><label for="5">☆</label>
  <input type="submit" name="rating" value="4" id="4"><label for="4">☆</label>
  <input type="submit" name="rating" value="3" id="3"><label for="3">☆</label>
  <input type="submit" name="rating" value="2" id="2"><label for="2">☆</label>
  <input type="submit" name="rating" value="1" id="1"><label for="1">☆</label>
</div>
									</form>
@endauth 
                                    </div>
						</div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-product__content">
                        <ul class="nav nav-tabs ps-tab-list" id="productContentTabs" role="tablist">
                            <li class="nav-item" role="presentation"><a class="nav-link active" id="description-tab"
                                    data-toggle="tab" href="#description-content" role="tab"
                                    aria-controls="description-content" aria-selected="true">Description</a></li>
                            {{-- <li class="nav-item" role="presentation"><a class="nav-link" id="information-tab"
                                    data-toggle="tab" href="#information-content" role="tab"
                                    aria-controls="information-content" aria-selected="false">Additional
                                    information</a></li> --}}

                        </ul>
                        <div class="tab-content" id="productContent" style="margin-bottom: 80px;">
                            <div class="tab-pane fade show active" id="description-content" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="ps-document">
                                    <h2 class="ps-title">Product description</h2>
                                    <p class="ps-desc">
                                        {!! $product->description !!}
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="information-content" role="tabpanel"
                                aria-labelledby="information-tab">
                                <table class="table ps-table ps-table--oriented">
                                    <tbody>
                                        <tr>
                                            <th class="ps-table__th">Color</th>
                                            <td>Black/Gold</td>
                                        </tr>
                                        <tr>
                                            <th class="ps-table__th">Size</th>
                                            <td>65"</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! view_render_event('bagisto.shop.products.view.after', ['product' => $product]) !!}
@endsection

@push('scripts')
<script>
function showImg(smallimg){
var mainimg=document.getElementById('Mainimg1');
var main_src=mainimg.src;
var small_src=smallimg.src;
mainimg.src=small_src;

}
	
</script>
<script type="text/javascript"
src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>

<script type="text/javascript"
src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
    <script>
        $(document).ready(function() {


            //initiate the plugin and pass the id of the div containing gallery images
            $("#Mainimg").ezPlus({
                gallery: 'zoomGallery',
                cursor: 'crosshair',
                galleryActiveClass: 'active',
                zoomType: "window",
                imageCrossfade: true
            });

            var MainImg = document.getElementById('Mainimg');
            var smallimg = document.getElementsByClassName('small-img');
            var colorFilter = document.getElementsByClassName('color-filter');

            $(".small-img").each(function(index) {
                $(this).click(function() {
                    $("#Mainimg").attr("data-zoom-image", $(this).attr('src'));
                    $(".product-main-image").attr("href", $(this).attr('src'));
                    $(".product-main-image a").attr("href", $(this).attr('src'));
                    $(".product-main-image a img").attr("src", $(this).attr('src'));
                    $("#Mainimg").attr("href", $(this).attr('src'));
                    $(".zoomWindowContainer").css("background-image", "url(" + $(this).attr('src') +
                        ")");
                    $("div .zoomWindow").css("background-image", "url(" + $(this).attr('src') +
                        ")");
                });
            });
        });
    </script>
    <script>
        function submitForm() {
            $('#product-form').submit();
        }
    </script>

    <script type="text/x-template" id="quantity-changer-template">
        <div class="quantity control-group" :class="[errors.has(controlName) ? 'has-error' : '']">
            <label class="required">{{ __('shop::app.products.quantity') }}</label>

            <span class="quantity-container">
                <button type="button" class="decrease" @click="decreaseQty()">-</button>

                <input
                    ref="quantityChanger"
                    :name="controlName"
                    :model="qty"
                    class="control"
                    v-validate="validations"
                    data-vv-as="&quot;{{ __('shop::app.products.quantity') }}&quot;"
                    @keyup="setQty($event)">

                <button type="button" class="increase" @click="increaseQty()">+</button>
            </span>

            <span class="control-error" v-if="errors.has(controlName)">@{{ errors.first(controlName) }}</span>
        </div>
    </script>

    <script>
        window.onload = function() {
            var thumbList = document.getElementsByClassName('thumb-list')[0];
            var thumbFrame = document.getElementsByClassName('thumb-frame');
            var productHeroImage = document.getElementsByClassName('product-hero-image')[0];

            if (thumbList && productHeroImage) {

                for (let i = 0; i < thumbFrame.length; i++) {
                    thumbFrame[i].style.height = (productHeroImage.offsetHeight / 4) + "px";
                    thumbFrame[i].style.width = (productHeroImage.offsetHeight / 4) + "px";
                }

                if (screen.width > 720) {
                    thumbList.style.width = (productHeroImage.offsetHeight / 4) + "px";
                    thumbList.style.minWidth = (productHeroImage.offsetHeight / 4) + "px";
                    thumbList.style.height = productHeroImage.offsetHeight + "px";
                }
            }

            window.onresize = function() {
                if (thumbList && productHeroImage) {

                    for (let i = 0; i < thumbFrame.length; i++) {
                        thumbFrame[i].style.height = (productHeroImage.offsetHeight / 4) + "px";
                        thumbFrame[i].style.width = (productHeroImage.offsetHeight / 4) + "px";
                    }

                    if (screen.width > 720) {
                        thumbList.style.width = (productHeroImage.offsetHeight / 4) + "px";
                        thumbList.style.minWidth = (productHeroImage.offsetHeight / 4) + "px";
                        thumbList.style.height = productHeroImage.offsetHeight + "px";
                    }
                }
            }
        };
    </script>


    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script>
        function openNav2() {
            var mq = window.matchMedia("(min-width: 1280px)");
            if (mq.matches) {
                document.getElementById("mySidebar2").style.width = "500px";
            } else {
                document.getElementById("mySidebar2").style.width = "320px";
            }

        }

        function closeNav2() {
            document.getElementById("mySidebar2").style.width = "0";
            document.getElementById("main2").style.marginLeft = "0";
        }
    </script>

<script>
	(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>


    <script>
        var config = @json(isset($config) ? $config : null);
        var attributes = config['attributes'];
        var selected_attributes = {};

        function configure(attribute_id, event) {

            var allSelected = true;
            var arr = [];

            this.attributes.forEach(element => {
                if (!$("input:radio[name='super_attribute_" + element.id + "']").is(':checked')) {
                    allSelected = false;
                } else {
                    var val = $("input:radio[name='super_attribute_" + element.id + "']:checked").val();
                    var obj = [];
                    obj.push(element['id']);
                    obj.push(val);
                    arr.push(obj);
                    this.selected_attributes[element['id']] = val;
                }

            });

            if (allSelected) {
                var productID = findProductID(arr);
                console.log(productID)
                if (productID) {
                    $("#selected_configurable_option").val(productID)
                    updatePrice(productID);
                    updateSlider(productID);
                }
            }
        }

        function updateSlider(productID) {
            var variant_images = this.config['variant_images'];

            if (variant_images[productID] && variant_images[productID].length > 0) {

                var img = variant_images[productID][0];
                var gallery = '';
                var active = '';
                var mainImage = '';

                for (i = 0; i < variant_images[productID].length; i++) {
                    var img = variant_images[productID][i];

                    if (i == 0) {
                        let active = ' active';
                        $("#Mainimg").attr("data-zoom-image", variant_images[productID][0]['original_image_url']);
                        $(".product-main-image").attr("href", variant_images[productID][0]['original_image_url']);
                        $(".product-main-image a").attr("href", variant_images[productID][0]['original_image_url']);
                        $(".product-main-image a img").attr("src", variant_images[productID][0]['original_image_url']);
                        $("#Mainimg").attr("href", variant_images[productID][0]['original_image_url']);
                        $("div .zoomWindow").css("background-image", "url(" + variant_images[productID][0][
                            'original_image_url'
                        ] + ")");

                        $(".zoomWindowContainer").css("background-image", "url(" + variant_images[productID][0][
                            'original_image_url'
                        ] + ")");

                    }




                }

                $(".product-gallery-item").each(function(index) {
                    if (index >= variant_images[productID].length) {
                        $(this).remove();
                    } else {
                        $(this).attr("data-zoom-image", variant_images[productID][index]['original_image_url']);
                        $(this).attr("href", variant_images[productID][index]['original_image_url']);

                        $(this).find('img').attr("data-zoom-image", variant_images[productID][index][
                            'original_image_url'
                        ]);
                        $(this).find('img').attr("href", variant_images[productID][index]['original_image_url']);
                        $(this).find('img').attr("src", variant_images[productID][index]['original_image_url']);
                        // $("div .zoomWindow").css("background-image", "url(" + variant_images[productID][index][
                        //     'original_image_url'
                        // ] + ")");

                        // $(".zoomWindowContainer").css("background-image", "url(" + variant_images[productID][index][
                        //     'original_image_url'
                        // ] + ")");
                    }
                });
            }
        }

        function updatePrice(productID) {
            var variant_prices = this.config['variant_prices'];
            var regular_price = variant_prices[productID]['regular_price']['price'];
            var final_price = variant_prices[productID]['final_price']['price'];
            if (regular_price != final_price) {
                $('.product-price').html('<del class="old-price">' + variant_prices[productID]['regular_price'][
                        'formated_price'
                    ] + '</del>' +
                    '<span class="product-price">' + variant_prices[productID]['final_price']['formated_price'] +
                    '</span>');
            } else {
                $('.product-price').html('<span class="product-price">' + variant_prices[productID]['final_price'][
                    'formated_price'
                ] + '</span>');
            }
        }

        function findProductID(arr) {
            var index = this.config['index'];
            for (const property in index) {

                var obj = index[property];
                var b = true;
                arr.forEach(e => {
                    if (obj[e[0]]) {
                        if (obj[e[0]] != e[1]) {
                            b = false;
                        }
                    }
                });
                if (b) {
                    return property;
                }
            }
            return null;
        }
    </script>
@endpush
