@extends('shop::customers.account.index')
@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')

@section('page_title')
    {{ __('shop::app.customer.account.wishlist.page-title') }}
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
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Wishlist</li>
        </ul>

                </div>
            </div>
        </div>
    </div>

    <div class="dashbord-wrapper mt-120">
        <div class="container-fluid">
            <div class="row justify-content-center">

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="dashbord-switcher">
                        @include('shop::customers.account.partials.sidemenu')
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <div class="tab-content" id="myTabContent">
                        <div role="tab-panel" aria-labelledby="tab-order-link">
                            <div class="order-details">
                                <table class="table order-table mb-0">
                                    <thead>
                                        <tr>
                                            <td align="center" >Remove</td>
                                            <td align="center" >Product</td>
                                            <td align="center" >Price</td>
											<td align="center" >Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($items as $item)
                                        @php
                                            $image = $item->product->getTypeInstance()->getBaseImage($item);
                                        @endphp
                                            <tr>
                                                <td align="center"  >
                                                        <a class="mb-50"
                                                            href="javascript:void(0);"
                                                            onclick="document.getElementById('wishlist-{{ $item->id }}').submit();">
                                                            X
                                                        </a>
                                                </td>
                                                <td align="center"  >
                                                    <a href="{{ route('shop.productOrCategory.index', $item->product->url_key) }}" title="{{ $item->product->name }}">
                                                        <img class="media" src="{{ $image['small_image_url'] }}" alt="" width="100px" />
                                                    </a>
                                                    {{ $item->product->name }}
                                                </td>
												<td align="center" >{{ 'EGP '.floatval($item->product->price) }}</td>
                                                <td align="center">
                                                    <div  align="center" class="eg-input-group profile-form-sumbit reg-submit-input d-flex align-items-center">
                                                        
														
														<form method="POST" action="{{ Route('cart.add',$item->product->id) }}">@csrf<input type="hidden" value="1" name="quantity"><input type="hidden" value="{{ $item->product->id }}" name="product_id"> <input type="submit" value="{{ __('shop::app.customer.account.wishlist.move-to-cart') }}"></form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">You Don't Have Any Items In Your Wishlist!</td>
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
    {!! view_render_event('bagisto.shop.customers.account.wishlist.list.before', ['wishlist' => $items]) !!}
    {{-- @php
    dd($items);
@endphp --}}
    <div class="account-layout">
        <div class="account-head mb-15">
            {{-- <span class="account-heading">{{ __('shop::app.customer.account.wishlist.title') }}</span> --}}

            {{-- @if (count($items))
                <div class="account-action">
                    <form id="remove-all-wishlist" action="{{ route('customer.wishlist.removeall') }}" method="POST">
                        @method('DELETE')

                        @csrf
                    </form>

                    @if ($isSharingEnabled)
                        <a href="javascript:void(0);" onclick="window.showShareWishlistModal();" class="m-20">
                            {{ __('shop::app.customer.account.wishlist.share') }}
                        </a>
                    @endif

                    <a href="javascript:void(0);" onclick="window.deleteAllWishlist()">
                        {{ __('shop::app.customer.account.wishlist.deleteall') }}
                    </a>
                </div>
            @endif --}}

            <div class="horizontal-rule"></div>
        </div>

        {!! view_render_event('bagisto.shop.customers.account.wishlist.list.before', ['wishlist' => $items]) !!}

        <div class="account-items-list">
            @if ($items->count())
                @foreach ($items as $item)
                    @include('shop::customers.account.wishlist.wishlist-product', [
                        'item' => $item,
                        'visibility' => $isSharingEnabled,
                    ])
                @endforeach

                {{-- <div class="bottom-toolbar">
                    {{ $items->links() }}
                </div> --}}
            @else
                {{-- <div class="empty">
                    {{ __('customer::app.wishlist.empty') }}
                </div> --}}
            @endif
        </div>

        @if ($isSharingEnabled)
            <div id="shareWishlistModal" class="d-none">
                <modal id="shareWishlist" :is-open="modalIds.shareWishlist">
                    <h3 slot="header">
                        {{ __('shop::app.customer.account.wishlist.share-wishlist') }}
                    </h3>

                    <div slot="body">
                        <share-component></share-component>
                    </div>
                </modal>
            </div>
        @endif

        {!! view_render_event('bagisto.shop.customers.account.wishlist.list.after', ['wishlist' => $items]) !!}
    </div>
@endsection

@push('scripts')
    @if ($isSharingEnabled)
        <script type="text/x-template" id="share-component-template"> 
            <form method="POST">
                @csrf

                <div class="control-group">
                    <label for="shared" class="required">{{ __('shop::app.customer.account.wishlist.wishlist-sharing') }}</label>

                    <select name="shared" class="control" @change="shareWishlist($event.target.value)">
                        <option value="0" :selected="! isWishlistShared">{{ __('shop::app.customer.account.wishlist.disable') }}</option>
                        <option value="1" :selected="isWishlistShared">{{ __('shop::app.customer.account.wishlist.enable') }}</option>
                    </select>
                </div>

                <div class="control-group">
                    <label class="required">{{ __('shop::app.customer.account.wishlist.visibility') }}</label>

                    <div style="margin-top: 10px; margin-bottom: 5px;">
                        <span class="badge badge-sm badge-success" v-if="isWishlistShared">
                            {{ __('shop::app.customer.account.wishlist.public') }}
                        </span>

                        <span class="badge badge-sm badge-danger" v-else>
                            {{ __('shop::app.customer.account.wishlist.private') }}
                        </span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="required">{{ __('shop::app.customer.account.wishlist.shared-link') }}</label>

                    <div style="margin-top: 10px; margin-bottom: 5px;">
                        <div class="input-group"  v-if="isWishlistShared">
                            <input
                                type="text"
                                class="control"
                                v-model="wishlistSharedLink"
                                v-on:focus="$event.target.select()" 
                                ref="sharedLink"
                            />

                            <div class="input-group-append">
                                <button
                                    class="btn btn-primary btn-md"
                                    type="button"
                                    id="copy-btn"
                                title="{{ __('shop::app.customer.account.wishlist.copy-link') }}"
                                    @click="copyToClipboard"
                                >
                                    {{ __('shop::app.customer.account.wishlist.copy') }}
                                </button>
                            </div>
                        </div>
                            
                        <p class="alert alert-danger" v-else>
                            {{ __('shop::app.customer.account.wishlist.enable-wishlist-info') }}
                        </p>
                    </div>
                </div>
            </form>
        </script>

        <script>
            /**
             * Show share wishlist modal.
             */
            function showShareWishlistModal() {
                document.getElementById('shareWishlistModal').classList.remove('d-none');

                window.app.showModal('shareWishlist');
            }

            Vue.component('share-component', {
                template: '#share-component-template',

                inject: ['$validator'],

                data: function() {
                    return {
                        isWishlistShared: parseInt("{{ $isWishlistShared }}"),

                        wishlistSharedLink: "{{ $wishlistSharedLink }}",
                    }
                },

                methods: {
                    shareWishlist: function(val) {
                        var self = this;

                        this.$root.showLoader();

                        this.$http.post("{{ route('customer.wishlist.share') }}", {
                                shared: val
                            })
                            .then(function(response) {
                                self.$root.hideLoader();

                                self.isWishlistShared = response.data.isWishlistShared;

                                self.wishlistSharedLink = response.data.wishlistSharedLink;
                            })
                            .catch(function(error) {
                                self.$root.hideLoader();

                                window.location.reload();
                            })
                    },

                    copyToClipboard: function() {
                        this.$refs.sharedLink.focus();

                        document.execCommand('copy');
                        showCopyMessage();
                    }
                }
            });
        </script>
    @endif

    <script>
        /**
         * Delete all wishlist.
         */
        function deleteAllWishlist() {
            if (confirm('{{ __('shop::app.customer.account.wishlist.confirm-delete-all') }}')) document.getElementById(
                'remove-all-wishlist').submit();

            return;
        }

        function showCopyMessage() {
            $('#copy-btn').text("{{ __('shop::app.customer.account.wishlist.copied') }}");
            $('#copy-btn').css({
                backgroundColor: '#146e24'
            });
        }
    </script>
@endpush
