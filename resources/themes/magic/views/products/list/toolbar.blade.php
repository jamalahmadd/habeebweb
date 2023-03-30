@inject ('toolbarHelper', 'Webkul\Product\Helpers\Toolbar')

{!! view_render_event('bagisto.shop.products.list.toolbar.before') !!}
{{-- <div class="col-lg-5">
    <div class="show-text"><span>
            {{ __('shop::app.products.pager-info', ['showing' => $products->firstItem() . '-' . $products->lastItem(), 'total' => $products->total()]) }}
        </span></div>
</div>
<div class="col-lg-7">
    <div class="row">
        <div class="col-lg-8 col-md-7 col-sm-6">
            <div class="product-searchbar">
                <form action="#" method="POST" class="product-searchbar-form">
                    <input type="text" id="search" name="sidebar-search-input" id="sidebar-search-input" placeholder="Search">
                    <button type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
        <div class="col-lg-4 col-md-5 col-sm-6">

            <select onchange="window.location.href = this.value" name="category-sort" id="category-sort">
                @foreach ($toolbarHelper->getAvailableOrders() as $key => $order)
                    <option value="{{ $toolbarHelper->getOrderUrl($key) }}"
                        {{ $toolbarHelper->isOrderCurrent($key) ? 'selected' : '' }}>
                        {{ __('shop::app.products.' . $order) }}
                    </option>
                @endforeach
			</select> 
        </div>
    </div>
</div> --}}

<div class="ps-categogy__sort" style="width:100%;">
		<span class="tool-icons" style="float:left;">          
				<a href="#" id="grid_view" onclick="changeLayout(this)">
                  <i class="icon-grid fa-lg" style="font-size:25px;"></i>
                </a>
				<a href="#" id="list_view" onclick="changeLayout(this)">
				   <i class="icon-list fa-lg" style="font-size:25px;"></i>
                </a>
		</span>
    <form style="display:inline-block;float:right;"><span>Sort by</span>
        <select class="form-select" onchange="window.location.href = this.value" name="category-sort" id="category-sort">
            @foreach ($toolbarHelper->getAvailableOrders() as $key => $order)
			@if($order!="oldest-first")
                <option value="{{ $toolbarHelper->getOrderUrl($key) }}"
						@if($order=="From A-Z")
               {{--  {{ $toolbarHelper->isOrderCurrent($key) ? 'selected' : '' }}--}}
					selected @endif>
					
                    {{ __('shop::app.products.' . $order) }} 
                </option>
			
			@endif
            @endforeach
        </select> 

    </form>

</div>
{{-- <div class="top-toolbar mb-35">

    <div class="page-info">
        <span>
            {{ __('shop::app.products.pager-info', ['showing' => $products->firstItem() . '-' . $products->lastItem(), 'total' => $products->total()]) }}
        </span>

        <span class="sort-filter">
            <i class="icon sort-icon" id="sort" ></i>
            <i class="icon filter-icon" id="filter"></i>
        </span>
    </div>

    <div class="pager">

        <div class="view-mode">
            @if ($toolbarHelper->isModeActive('grid'))
                <span class="grid-view">
                    <i class="icon grid-view-icon"></i>
                </span>
            @else
                <a href="{{ $toolbarHelper->getModeUrl('grid') }}" class="grid-view" aria-label="Grid">
                    <i class="icon grid-view-icon"></i>
                </a>
            @endif

            @if ($toolbarHelper->isModeActive('list'))
                <span class="list-view">
                    <i class="icon list-view-icon"></i>
                </span>
            @else
                <a href="{{ $toolbarHelper->getModeUrl('list') }}" class="list-view" aria-label="list">
                    <i class="icon list-view-icon"></i>
                </a>
            @endif
        </div>

        

        <div class="limiter">
            <label for="show-toolbar">{{ __('shop::app.products.show') }}</label>

            <select onchange="window.location.href = this.value" id="show-toolbar">

                @foreach ($toolbarHelper->getAvailableLimits() as $limit)

                    <option value="{{ $toolbarHelper->getLimitUrl($limit) }}" {{ $toolbarHelper->isLimitCurrent($limit) ? 'selected' : '' }}>
                        {{ $limit }}
                    </option>

                @endforeach

            </select>
        </div>

    </div>

</div> --}}

{!! view_render_event('bagisto.shop.products.list.toolbar.after') !!}


<div class="responsive-layred-filter mb-20">
    <layered-navigation></layered-navigation>
</div>
<script>
function changeLayout(layout){
var trigger=layout.id;
var form=document.getElementsByClassName('ps--form');
const quantity_grid=document.getElementsByClassName('quantity-cart-grid');
const quantity_list=document.getElementsByClassName('quantity-cart-list');
const product_containers=document.getElementsByClassName('ps-container');
const product_standards=document.getElementsByClassName('ps-product ps-product--standard');
const content_containers=document.getElementsByClassName('ps-product__content content-products');
const image_containers=document.getElementsByClassName('ps-product__thumbnail thumbnail-products');
const image_elements=document.getElementsByClassName('ps-product__image');
const image_tags_first=document.getElementsByClassName('image_tag_one');
const image_tags_second=document.getElementsByClassName('image_tag_two');
const product_wishlist=document.getElementsByClassName('product-wishlist');
if(layout.id=="list_view"){
for(var i=0; i<product_containers.length;i++ ){
	product_containers[i].className="col-12 col-lg-6  mt-2 ps-container";
	product_containers[i].style.height="200px";
	product_containers[i].style.padding="25px";
	product_containers[i].style.minWidth="350px";
	product_standards[i].style.minHeight="unset";
	product_standards[i].style.height="100%";
	image_containers[i].style.float="left";
	image_containers[i].style.width="120px";
	image_elements[i].style.width="120px";
	image_tags_first[i].style.cssText="width:120px;height:120px;";
	image_tags_second[i].style.cssText="width:120px;height:120px;";
	content_containers[i].style.left="160px";
	content_containers[i].style.maxHeight="unset";
	content_containers[i].style.width="45%";
	content_containers[i].style.bottom="unset";
	content_containers[i].style.top="40px";
	content_containers[i].style.height="200px";
	product_wishlist[i].style.left="40px";
	product_wishlist[i].style.top="50px";
	form[i].style.cssText="position:absolute;top:95px; left:10px;";
}
for(var i=0; i<quantity_list.length;i++){
quantity_list[i].style.display="inline";
}
for(var i=0; i<quantity_grid.length;i++){
quantity_grid[i].style.display="none";
}
}
else{
	for(var i=0; i<product_containers.length;i++ ){
	product_containers[i].className="col-12 col-lg-3 col-xl-3 p-0 mt-5 ps-container";
	product_containers[i].style.height="340px";
	product_containers[i].style.padding="unset";
	product_containers[i].style.minWidth="200px";
	product_standards[i].style.minHeight="320px";
	product_standards[i].style.height="100%";
	image_containers[i].style.float="unset";
	image_containers[i].style.width="100%";
	image_elements[i].style.width="unset";
	image_tags_first[i].style.cssText="width:unset;height:unset;";
	image_tags_second[i].style.cssText="width:unset;height:unset;";
	content_containers[i].style.left="unset";
	content_containers[i].style.width="90%";
	content_containers[i].style.maxHeight="95px";
	content_containers[i].style.bottom="0px";
	content_containers[i].style.top="unset";
	content_containers[i].style.height="unset";
	product_wishlist[i].style.left="10px";
	product_wishlist[i].style.top="25px";
	form[i].style.cssText="position:static;top:unset; left:unset;";
}
for(var i=0; i<quantity_list.length;i++){
quantity_list[i].style.display="none";
}
for(var i=0; i<quantity_grid.length;i++){
quantity_grid[i].style.display="inline";
}
}
}
</script>