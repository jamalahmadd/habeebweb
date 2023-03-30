@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.search.page-title') }}
@endsection

@section('content-wrapper')
    @if (request('image-search'))
        <image-search-result-component></image-search-result-component>
    @endif

    @if (! $results)
        {{  __('shop::app.search.no-results') }}
    @endif

    @if ($results)
            @if ($results->isEmpty())
                <div class="search-result-status">
                    <h2>{{ __('shop::app.products.whoops') }}</h2>
                    <span>{{ __('shop::app.search.no-results') }}</span>
                </div>
            @else
                <div class="search-result-status mb-20">
                    <span>
                        <b>{{ $results->total() }} </b>

                        {{ ($results->total() == 1) ? __('shop::app.search.found-result') : __('shop::app.search.found-results') }}
                    </span>
                </div>

<div class="row m-0">
                    @foreach ($results as $productFlat)
    <?php
                                            $product = $productFlat->product;
	$productBaseImage = productimage()->getProductBaseImage($product);
	?>
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
                    @endforeach
                </div>

                @include('ui::datagrid.pagination')
            @endif
    @endif
@endsection

@push('scripts')

    <script type="text/x-template" id="image-search-result-component-template">
        <div class="image-search-result">
            <div class="searched-image">
                <img :src="searched_image_url" alt=""/>
            </div>

            <div class="searched-terms">
                <h3>{{ __('shop::app.search.analysed-keywords') }}</h3>

                <div class="term-list">
                    <a v-for="term in searched_terms" :href="'{{ route('shop.search.index') }}?term=' + term">
                        @{{ term }}
                    </a>
                </div>
            </div>
        </div>
    </script>

    <script>
        Vue.component('image-search-result-component', {

            template: '#image-search-result-component-template',

            data: function() {
                return {
                    searched_image_url: localStorage.searched_image_url,

                    searched_terms: []
                }
            },

            created: function() {
                if (localStorage.searched_terms && localStorage.searched_terms != '') {
                    this.searched_terms = localStorage.searched_terms.split('_');
                }
            }
        });
    </script>

@endpush