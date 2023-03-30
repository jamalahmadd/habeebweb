{!! view_render_event('bagisto.shop.products.list.card.before', ['product' => $product]) !!}
    <?php $productBaseImage = productimage()->getProductBaseImage($product); ?>
<div class="col-4 col-lg-4 col-xl-3 p-0 mt-5">

    <div class=" ps-product ps-product--standard">
        <div class="ps-product__thumbnail">
            <a class="ps-product__image"
                href="{{ route('shop.productOrCategory.index', $product->url_key) }}">
                <figure>
                    <img src="{{ $productBaseImage['original_image_url'] }}" height="340px"
                        alt="alt">
                    <img src="{{ $productBaseImage['original_image_url'] }}" height="340px"
                        alt="alt">
                </figure>
            </a>

            <div class="ps-product__badge">
                <div class="ps-badge ps-badge--sale">

                    @if (!$product->getTypeInstance()->haveSpecialPrice() && $product->new)
                        {{ __('shop::app.products.new') }}
                    @endif
                </div>
            </div>
            <div class="ps-product__actions">
                <div class="ps-product__item" data-toggle="tooltip"
                    data-placement="left" title="Wishlist">
				{{--<a href="#"><i class="fa fa-heart"
                            aria-hidden="true"></i></a>--}}
                </div>
            </div>
        </div>
        <div class="ps-product__content">
            <h5 class="ps-product__title">
                <a href="{{ route('shop.productOrCategory.index', $product->url_key) }}">
                    {{ $product->name }}
                </a>
            </h5>
            <div
                class="ps-product__meta d-flex justify-content-between">
                <span
                    class="ps-product__price">{!! $product->getTypeInstance()->getPriceHtml() !!}</span>
                <span><i class="fa fa-shopping-bag"></i></span>
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
{{-- <div class="product-card">

    <?php $productBaseImage = productimage()->getProductBaseImage($product); ?>

    @if (!$product->getTypeInstance()->haveSpecialPrice() && $product->new)
        <div class="sticker new">
            {{ __('shop::app.products.new') }}
        </div>
    @endif



    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="product-card-m">
            <div class="product-thumb">
                <a class="picture1" id="Mainimg" href="{{ route('shop.productOrCategory.index', $product->url_key) }}"
                    title="{{ $product->name }}">
                    <img src="{{ $productBaseImage['medium_image_url'] }}"
                        onerror="this.src='{{ asset('vendor/webkul/ui/assets/images/product/meduim-product-placeholder.png') }}'"
                        alt="" height="500">
                </a>
                <div class="picture2">
                    <a href="#"> <img class="img-responsive" src="{{ $productBaseImage['medium_image_url'] }}"
                            onerror="this.src='{{ asset('vendor/webkul/ui/assets/images/product/meduim-product-placeholder.png') }}'"
                            alt="" height="500"></a>
                </div>
                <div class="product-lavels">
                    <span class="sale">sale</span>
                </div>
                <div class="add-product"><a href="product-details.html"><i class="flaticon-plus"></i></a></div>

            </div>
            <div class="product-body">
                <h5 class="product-title">
                    <a href="{{ route('shop.productOrCategory.index', $product->url_key) }}"
                        title="{{ $product->name }}">
                        <span>
                            {{ $product->name }}
                        </span>
                    </a>
                </h5>

                @include ('shop::products.price', ['product' => $product])
                <div class="product-price">
                    <del class="old-price">$65.00</del><ins class="new-price">$29.00</ins>
                </div>
                <div class="product-actions">
                    <a href="#"><i class="flaticon-heart"></i></a>

                    @include('shop::products.add-buttons', ['product' => $product])
                    <a href="#"><i class="flaticon-shopping-cart"></i></a>
                </div>
            </div>
        </div>
    </div>










    <div class="product-image">
        <a href="{{ route('shop.productOrCategory.index', $product->url_key) }}" title="{{ $product->name }}">
            <img src="{{ $productBaseImage['medium_image_url'] }}"
                onerror="this.src='{{ asset('vendor/webkul/ui/assets/images/product/meduim-product-placeholder.png') }}'"
                alt="" height="500" />
        </a>
    </div>

    <div class="product-information">

        <div class="product-name">
            <a href="{{ route('shop.productOrCategory.index', $product->url_key) }}" title="{{ $product->name }}">
                <span>
                    {{ $product->name }}
                </span>
            </a>
        </div>

        @include ('shop::products.price', ['product' => $product])

        @include('shop::products.add-buttons', ['product' => $product])
    </div>

</div> --}}

{!! view_render_event('bagisto.shop.products.list.card.after', ['product' => $product]) !!}
