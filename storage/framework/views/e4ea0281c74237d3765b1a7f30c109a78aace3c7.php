<?php
$channel = core()->getCurrentChannel();

$homeSEO = $channel->home_seo;

if (isset($homeSEO)) {
    $homeSEO = json_decode($channel->home_seo);

    $metaTitle = $homeSEO->meta_title;

    $metaDescription = $homeSEO->meta_description;

    $metaKeywords = $homeSEO->meta_keywords;
}
$categories = [];

foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(1) as $category) {
    if ($category->slug) {
        array_push($categories, $category);
    }
}

$sliders = app('Webkul\Widgets\Repositories\WidgetRepository')->widget('home-slider');

$groupedSlider = [];

if ($sliders && count($sliders)) {
    foreach ($sliders as $slide) {
        $groupedSlider[$slide->sort_order][] = $slide;
    }
}

//dd($groupedSlider);

?>

<?php $__env->startSection('page_title'); ?>
    <?php echo e(isset($metaTitle) ? $metaTitle : ''); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
		.ps-product__content{
			min-height:80px;
		}
		.ps-product__title{
			height:52px;
		}
		.ps-section--latest .ps-section__title {
 font-size:24px !important;
}
		.css-1xcxiyg {
font-size:24px !important;
}
		.ps-product--standard .ps-product__image {
			background:transparent;
		}
		.ps-product--standard .ps-product__image figure img:first-child {
    max-width: 100% !important;
}
		.css-nzni4o span{
			font-weight:600;
		}
		       @media (min-width:787px) {
		.ps-section--categories .ps-categories__list{
			flex-flow:unset !important;
		}
		}
				       @media (max-width:787px) {
		.ps-section--categories .ps-categories__list{
	flex-flow: row wrap;
		}
						   .ps-banner--container .ps-banner__fluid .ps-banner__image {
    object-position: right !important;
}
		}
								   .ps-banner--container .ps-banner__fluid .ps-banner__image {
    object-position: right !important;
}
		.profile-form-wrapper{
			margin-bottom:10px;
		}
        @media (max-width:787px) {
            .ps-section--banner {
                min-height: 385px !important;
                position: relative;
            }

            .ps-banner--container .ps-banner {
                min-height: 361px;
            }

            .ps-section--categories .ps-categories__item {
                width: 50.3333%;
                flex-basis: 44.3333%;
            }
        }


        .menu>li>a:hover {
            color: var(--color-yellow);
        }

        .mega-menu .sub-menu--mega li a {
            display: block;
            line-height: 24px;
            padding: 5px 5px 5px 0;
            font-size: 15px;
            color: #000;
            background-color: transparent;
            position: relative;
        }

        .mega-menu .sub-menu--mega li a:first-letter {
            text-transform: capitalize;
        }

        .mega-menu .sub-menu--mega li a:hover {
            color: var(--color-green);
        }

        .mega-menu h4 {
            font-weight: 600;
            font-size: 18px;
            color: #000;
            text-transform: capitalize;
            margin-bottom: 20px;
        }

        .ps-product__title {
            display: block;
            font-size: 14px;
            line-height: 26px;
            margin-bottom: 13px;
            min-height: 28px;
            font-weight: 400;
            color: var(--color-green);
            text-align: left;
        }

        .ps-product__title:hover {
            color: var(--color-green);
        }

        .ps-promo .text-yellow {
            color: var(--color-green);
        }

        .ps-promo .text-warning {
            color: var(--color-green) !important;
        }

        .ps-promo .btn-warning {
            background-color: var(--color-green) !important;
            border-color: var(--color-green) !important;
        }

        .ps-promo .btn-warning:hover {
            background-color: var(--color-green) !important;
            border-color: var(--color-green) !important;
        }

        .ps-promo .btn-yellow {
            background-color: var(--color-green) !important;
            border-color: var(--color-green) !important;
        }

        .ps-promo .btn-yellow:hover {
            background-color: var(--color-green) !important;
            border-color: var(--color-green) !important;
            color: var(--color-green) !important;
        }

        .ps-promo .btn-green {
            background-color: var(--color-green) !important;
            border-color: var(--color-green) !important;
        }

        .ps-promo .btn-green:hover {
            background-color: var(--color-green) !important;
            border-color: var(--color-green) !important;
        }

        .ps-promo .btn-white {
            background-color: white !important;
            border-color: white !important;
            color: #333;
        }

        .ps-promo .btn-white:hover {
            background-color: var(--color-green) !important;
            border-color: var(--color-green) !important;
            color: white;
        }

        @media (max-width:767px) {
            .ps-product__title {
                text-align: center;
            }

            .ps-product__meta {
                text-align: center;
            }

            .ps-product--standard .ps-product__group-mobile {
                justify-content: center;
            }

            .ps-section--categories .ps-categories__item {
                width: 36.3333%;
                flex-basis: 45.3333%;
            }

            .ps-footer--block .ps-block__title {
                font-size: 14px !important;
            }
        }

        .ps-product__rating {
            display: none;
        }

        @media (max-width:767px) {
            .ps-menu--slidebar {
                background: var(--color-green);
            }

            .menu--mobile>li>a {
                color: #fff;
            }

            .menu--mobile .sub-toggle {
                color: #fff;
            }

            .ps-menu--slidebar .ps-menu__item {
                color: #fff;
            }

            .ps-menu--slidebar .ps-language-currency>li a {
                color: #fff;
            }

            .menu--mobile .sub-menu {
                background-color: transparent;
                color: #fff;
            }

            .sub-menu>li>a {
                color: #fff;
            }

            .ps-footer--block .ps-block__list li a {
                font-size: 14px;
            }
        }

        .ps-product__rating {
            display: none;
        }

        .ps-section--latest .ps-section__title {
            color: var(--color-green);
            font-weight: 600;
        }

        .css-1xcxiyg {
            color: var(--color-green);
        }

        .css-nzni4o {
            color: var(--color-green);
        }

        .css-81y9u6 span {
            color: var(--color-green);
        }

        .css-1jd230p {
            background-color: var(--color-green);
        }

        .css-17q1va4 p {
            color: #fff;
        }

        .ps-section--categories .ps-categories__show {
            color: var(--color-green);
            border: 1px solid var(--color-green);
        }

        .ps-footer--block .ps-block__list li a {
            color: #000;
        }

        .ps-footer--2 {
            background-color: var(--color-green);
        }

        .ps-footer__middle {
            padding: 30px;
        }

        .scroll-top {
            background-color: var(--color-yellow);
        }

        .scroll-top:hover {
            background-color: var(--color-green);
        }

        .scroll-top:hover i {
            color: #fff;
        }

        .scroll-top i {
            color: var(--color-green);
        }

        .ps-footer--block .ps-block__title {
            color: #000 !important;
        }

        .ps-footer--bottom p {
            color: #000;
        }

        .ps-product__actions .ps-product__item,
        .ps-product__price {
            color: #000;
        }

        .css-1fnixr7,
        .css-1ag6kvf p {
            color: var(--color-green);
        }

        .css-6lzko9P p {
            color: var(--color-green);
        }

        @media (max-width:767px) {
            .ps-menu--slidebar {
                background: var(--color-green);
            }

            .menu--mobile>li>a {
                color: #fff;
            }

            .menu--mobile .sub-toggle {
                color: #fff;
            }

            .ps-menu--slidebar .ps-menu__item {
                color: #fff;
            }

            .ps-menu--slidebar .ps-language-currency>li a {
                color: #fff;
            }

            .menu--mobile .sub-menu {
                background-color: transparent;
                color: #fff;
            }

            .sub-menu>li>a {
                color: #fff;
            }
        }

        .ps-product__rating {
            display: none;
        }

        .ps-section--latest .ps-section__title {
            color: #000;
            font-weight: 600;
        }

        .css-1xcxiyg {
            color: #000;
        }

        .css-nzni4o {
            color: var(--color-green);
        }

        .css-81y9u6 span {
            color: var(--color-green);
        }

        .css-1jd230p {
            background-color: var(--color-green);
        }

        .css-17q1va4 p {
            color: #fff;
        }

        .ps-section--categories .ps-categories__show {
            color: var(--color-green);
            border: 1px solid var(--color-green);
        }

        .ps-footer--block .ps-block__list li a {
            color: #000;
        }

        .ps-footer--2 {
            background-color: var(--color-green);
        }

        .ps-footer__middle {
            padding: 30px;
        }

        .scroll-top {
            background-color: var(--color-yellow);
        }

        .scroll-top:hover {
            background-color: var(--color-green);
        }

        .scroll-top:hover i {
            color: #fff;
        }

        .scroll-top i {
            color: var(--color-green);
        }

        .ps-footer--block .ps-block__title {
            color: #000 !important;
        }

        .ps-footer--bottom p {
            color: #000;
        }

        .ps-header__middle .ps-nav__item {
            margin: 15px 0 15px 0;
            color: var(--color-green);
            justify-content: center;
        }

        .ps-nav__item a {
            color: var(--color-green);
            display: inline-flex;
            width: 44px;
            height: 44px;
            margin: 0 auto;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .ps-nav__item .badge {
            position: absolute;
            top: 4px;
            right: 2px;
            width: 18px;
            height: 18px;
            font-size: 9px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--color-green);
            color: #fff;
        }

        .ps-nav__item i {
            font-weight: 600;
            font-size: 20px;
        }

        .ps-product__actions .ps-product__item:hover a {
            color: var(--color-green) !important;
        }

        .ps-product__actions .ps-product__item {
            color: var(--color-green) !important;
        }

        .ps-header__top .animate-text span {
            display: none;
        }

        .ps-header__top .animate-text span.text-in {
            display: block;
            animation: texIn .5s ease;
        }

        @keyframes texIn {
            0% {
                transform: translateY(100%);
            }

            100% {
                transform: translateY(0%);
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('head'); ?>
    <?php if(isset($homeSEO)): ?>
        <?php if(isset($metaTitle)): ?>
            <meta name="title" content="<?php echo e($metaTitle); ?>" />
        <?php endif; ?>

        <?php if(isset($metaDescription)): ?>
            <meta name="description" content="<?php echo e($metaDescription); ?>" />
        <?php endif; ?>

        <?php if(isset($metaKeywords)): ?>
            <meta name="keywords" content="<?php echo e($metaKeywords); ?>" />
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
<?php $banner = app('App\Models\BannerModel'); ?>
    <div class="ps-home ps-home--2 pt-5">
        <div class="ps-home__content">
            <div class="container">
                <section class="ps-section--banner ps-banner--container">
                    <div class="ps-section__overlay">
                        <div class="ps-section__loading"></div>
                    </div>
                    <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="15000"
                        data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1"
                        data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000"
                        data-owl-mousedrag="on">
                        <?php
                            $slider = app('Webkul\Core\Repositories\SliderRepository')->slider();
                        ?>
                        <?php if($slider): ?>
                            <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="ps-banner">
                                <div class="container-no-round">
                                    <div class="ps-banner__block">
                                        <div class="ps-banner__content">
                                            <div class="ps-banner__btn-group">
                                            </div>
                                            <div class="ps-banner__thumnail ps-banner__fluid">
                                                <img class="ps-banner__image" src="<?php echo e(url('storage/' . $slide->path)); ?>" alt="alt">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                </section>

                <section class="ps-section--categories">
                    <h3 class="ps-section__title">Top categories</h3>
                    <div class="ps-section__content">
                        <div class="ps-categories__list">
                            
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="ps-categories__item"><a class=""><img style="height:100px"
                                src="<?php echo e(request()->getSchemeAndHttpHost()); ?>/storage/<?php echo e($category->image); ?>" alt=""></a><a class="ps-categories__name"
                            href="#"><?php echo e($category->name); ?></a></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        
                    </div>
                </section>


                




				
                <?php $topdeals = app('App\TopDealsModel'); ?>
				<?php $cart = app('Webkul\Checkout\Models\Cart'); ?>
				<?php $wish = app('Webkul\Customer\Models\Wishlist'); ?>
                <section class="ps-section--latest">
                    <div class="container">
                       <!-- <h3 class="ps-section__title">Collections</h3>
                        <br>-->
						<!--NEW-->
						<?php $customer_cart = cart()->getCart();?>
						<!--End New-->
                        <?php $__currentLoopData = $topdeals->with('products')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h5 class="ps-section__title"><?php echo e($deal->title); ?></h5>
                        <div class="ps-section__carousel">
                            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                                data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5"
                                data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="2" data-owl-item-lg="5"
                                data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                                <?php $__currentLoopData = $deal->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($product->product): ?>
								<!--New-->
								<?php if($customer_cart): ?>
								<?php $__currentLoopData = $customer_cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($product->product->id==$item->product_id): ?>	
									<?php
									$found=true;
									$found_quantity=$item->quantity;
									break;
									?>
								<?php else: ?>	
									<?php
									$found=false;
									?>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
								<!--End New-->
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                            href="/<?php echo e($product->product->url_key); ?>">
                                                <figure><img src="<?php echo e($product->product->firstimages?->url); ?>" alt="alt" height="200"><img
                                                        src="<?php echo e($product->product->firstimages?->url); ?>" alt="alt" height="200">
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist">
													<?php if(Auth::guard('customer')->user()): ?>		
													<?php if(count($wish->where(['customer_id'=>Auth::guard('customer')->user()->id,'product_id'=>$product->product_id])->get())>0): ?>
																					
								<form method="POST" action="<?php echo e(route('customer.wishlist.delete', $product->product_id)); ?>">
											<?php echo csrf_field(); ?>
											<button type="submit" style=" border:none;background-color:transparent;">
													<i style="color:red" class="fa fa-heart"
													   aria-hidden="true"></i>
											</button>
										</form>	
										<?php else: ?>
										<form method="POST" action="<?php echo e(route('customer.wishlist.add', $product->product_id)); ?>">
											<?php echo csrf_field(); ?>
											<button type="submit"  style=" border:none;background-color:transparent;">
													<i style="color:red" class="fa fa-heart-o"
													   aria-hidden="true"></i>
											</button>
										</form>	
													<?php endif; ?>
													<?php else: ?>
													<a href="<?php echo e(route('customer.session.index')); ?>"><i style="color:red" class="fa fa-heart-o"
														  aria-hidden="true"></i></a>
													<?php endif; ?>
													</div>
                                            </div>
											
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--sold"></div>
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                                <h5 class="ps-product__title"><a <?php if($product->product): ?>
                                                    href="/<?php echo e($product->product->url_key); ?>"
                                                <?php endif; ?>><?php echo e($product->product->name); ?></a></h5>
                                            <div class="ps-product__meta d-flex justify-content-between">
                                                <span class="ps-product__price"><?php echo e('EGP '.floatval($product->product->price)); ?>

													<?php if($customer_cart): ?>													
													<?php if($found==true): ?>
													<br>&nbsp;In cart:&nbsp;<?=$found_quantity?>
													<?php endif; ?>
													<?php endif; ?>
												</span>
                                                <span><form method="POST" action="<?php echo e(Route('cart.add',$product->product->id)); ?>"><?php echo csrf_field(); ?><input type="hidden" value="1" name="quantity"><button type="submit" style="border: none;background-color:transparent">


<?php if($customer_cart): ?>
<?php if($found==true): ?>
	<span> In cart:&nbsp;<?=$found_quantity?></span>
	<i class="fa fa-plus"></i> 												
<?php else: ?>
	<i class="fa fa-shopping-bag"></i> 												
<?php endif; ?>
<?php else: ?>	
<i class="fa fa-shopping-bag"></i> 
<?php endif; ?>

</button><input type="hidden" name="product_id" value="<?php echo e($product->product->id); ?>"></form></span>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                            </div>
                        </div>
                        <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </section>



                <section class="css-830jy7 mb-5">
                    <div data-testid="4-in-1" class="css-id6vwk">
                        <div class="css-1xcxiyg">Essentials Deals

                        </div>
      				                       <div class="ps-section__carousel">
                            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="5000"
                                data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1"
                                data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1"
                                data-owl-item-xl="1" data-owl-duration="1000" data-owl-mousedrag="on">
                                <?php $__currentLoopData = $banner->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                            href="<?php echo e($ban->link); ?>">
                                                <figure><img src="<?php echo e($ban->image); ?>" alt="alt" height="200"><img
                                                        src="<?php echo e($ban->image); ?>" alt="alt" height="200">
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                            </div>
                        </div>
                    </div>
                </section>



                


                <div class="container">


                    
                    
                   
                        </div>
                    </section>--}}

                    





                    <section class="ps-section--latest mt-5">
                        <div class="container">
                            <h3 class="ps-section__title">Shop by Brand</h3>
                            <div class="ps-section__carousel">
                                <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true"
                                    data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true"
                                    data-owl-item="" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="2"
                                    data-owl-item-lg="2" data-owl-item-xl="2" data-owl-duration="1000"
                                    data-owl-mousedrag="on">
                                    <div class="ps-section__product">
                                        <a href="#" data-testid="category_level_1" class="css-7txxm5">
                                            <hgroup class="css-psil8l">
                                                <h2 class="teshrin-medium css-1palj5t">Smartphones, Tablets &amp;
                                                    Wearables</h2>
                                            </hgroup><img alt="Smartphones, Tablets &amp; Wearables"
                                                class="swiper-lazy swiper-lazy-loaded" src="<?php echo e(asset('magic/assets/img/habib/im1.webp')); ?>">
                                        </a>



                                        <div data-testid="category_sub_category" class="css-1r8lsdl">
                                            <a href="#" data-testid="category_level_2" class="css-1k3m5w0">
                                                <div class="css-edau80">
                                                    <img alt="Smartphones &amp; Wearables"
                                                        class="swiper-lazy swiper-lazy-loaded"
                                                        src="https://hybrisproduction.blob.core.windows.net/sys-master-prod/L1-L2-images/SmartphonesTabletsWearables/Level2/1230000.png">
                                                </div>
                                                <h2 class="teshrin-medium css-101m8i6">Smartphones &amp; Wearables

                                                </h2>
                                            </a><a href="#" data-testid="category_level_2" class="css-1k3m5w0">
                                                <div class="css-edau80">
                                                    <img alt="Tablets &amp; E-Readers"
                                                        class="swiper-lazy swiper-lazy-loaded"
                                                        src="https://hybrisproduction.blob.core.windows.net/sys-master-prod/L1-L2-images/SmartphonesTabletsWearables/Level2/1230000.png">
                                                </div>
                                                <h2 class="teshrin-medium css-101m8i6">Tablets &amp; E-Readers</h2>
                                            </a><a href="#" data-testid="category_level_2" class="css-1k3m5w0">
                                                <div class="css-edau80">
                                                    <img alt="Headphones &amp; Earphone"
                                                        class="swiper-lazy swiper-lazy-loaded"
                                                        src="https://cdnprod.mafretailproxy.com/sys-master-root/h54/h67/12942491222046/NF1210300.png">
                                                </div>
                                                <h2 class="teshrin-medium css-101m8i6">Headphones &amp; Earphone
                                                </h2>
                                            </a><a href="#" data-testid="category_level_2" class="css-1k3m5w0">
                                                <div class="css-edau80">
                                                    <img alt="Mobile Accessories" class="swiper-lazy swiper-lazy-loaded"
                                                        src="https://hybrisproduction.blob.core.windows.net/sys-master-prod/L1-L2-images/SmartphonesTabletsWearables/Level2/1210000.png">
                                                </div>
                                                <h2 class="teshrin-medium css-101m8i6">Mobile Accessories</h2>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="ps-section__product">
                                        <a href="#" data-testid="category_level_1" class="css-7txxm5">
                                            <hgroup class="css-psil8l">
                                                <h2 class="teshrin-medium css-1palj5t">Smartphones, Tablets &amp;
                                                    Wearables</h2>
                                            </hgroup><img alt="Smartphones, Tablets &amp; Wearables"
                                                class="swiper-lazy swiper-lazy-loaded" src="<?php echo e(asset('magic/assets/img/habib/im1.webp')); ?>">
                                        </a>



                                        <div data-testid="category_sub_category" class="css-1r8lsdl">
                                            <a href="#" data-testid="category_level_2" class="css-1k3m5w0">
                                                <div class="css-edau80">
                                                    <img alt="Smartphones &amp; Wearables"
                                                        class="swiper-lazy swiper-lazy-loaded"
                                                        src="https://cdnprod.mafretailproxy.com/sys-master-root/h00/hc4/13165720371230">
                                                </div>
                                                <h2 class="teshrin-medium css-101m8i6">Smartphones &amp; Wearables

                                                </h2>
                                            </a><a href="#" data-testid="category_level_2" class="css-1k3m5w0">
                                                <div class="css-edau80">
                                                    <img alt="Tablets &amp; E-Readers"
                                                        class="swiper-lazy swiper-lazy-loaded"
                                                        src="https://hybrisproduction.blob.core.windows.net/sys-master-prod/L1-L2-images/SmartphonesTabletsWearables/Level2/1230000.png">
                                                </div>
                                                <h2 class="teshrin-medium css-101m8i6">Tablets &amp; E-Readers</h2>
                                            </a><a href="#" data-testid="category_level_2" class="css-1k3m5w0">
                                                <div class="css-edau80">
                                                    <img alt="Headphones &amp; Earphone"
                                                        class="swiper-lazy swiper-lazy-loaded"
                                                        src="https://cdnprod.mafretailproxy.com/sys-master-root/h54/h67/12942491222046/NF1210300.png">
                                                </div>
                                                <h2 class="teshrin-medium css-101m8i6">Headphones &amp; Earphone
                                                </h2>
                                            </a><a href="#" data-testid="category_level_2" class="css-1k3m5w0">
                                                <div class="css-edau80">
                                                    <img alt="Mobile Accessories" class="swiper-lazy swiper-lazy-loaded"
                                                        src="https://hybrisproduction.blob.core.windows.net/sys-master-prod/L1-L2-images/SmartphonesTabletsWearables/Level2/1210000.png">
                                                </div>
                                                <h2 class="teshrin-medium css-101m8i6">Mobile Accessories</h2>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="ps-section__product">
                                        <a href="#" data-testid="category_level_1" class="css-7txxm5">
                                            <hgroup class="css-psil8l">
                                                <h2 class="teshrin-medium css-1palj5t">Smartphones, Tablets &amp;
                                                    Wearables</h2>
                                            </hgroup><img alt="Smartphones, Tablets &amp; Wearables"
                                                class="swiper-lazy swiper-lazy-loaded" src="<?php echo e(asset('magic/assets/img/habib/im2.jpg')); ?>">
                                        </a>



                                        <div data-testid="category_sub_category" class="css-1r8lsdl">
                                            <a href="#" data-testid="category_level_2" class="css-1k3m5w0">
                                                <div class="css-edau80">
                                                    <img alt="Smartphones &amp; Wearables"
                                                        class="swiper-lazy swiper-lazy-loaded"
                                                        src="https://cdnprod.mafretailproxy.com/sys-master-root/h00/hc4/13165720371230">
                                                </div>
                                                <h2 class="teshrin-medium css-101m8i6">Smartphones &amp; Wearables

                                                </h2>
                                            </a><a href="#" data-testid="category_level_2" class="css-1k3m5w0">
                                                <div class="css-edau80">
                                                    <img alt="Tablets &amp; E-Readers"
                                                        class="swiper-lazy swiper-lazy-loaded"
                                                        src="https://hybrisproduction.blob.core.windows.net/sys-master-prod/L1-L2-images/SmartphonesTabletsWearables/Level2/1230000.png">
                                                </div>
                                                <h2 class="teshrin-medium css-101m8i6">Tablets &amp; E-Readers</h2>
                                            </a><a href="#" data-testid="category_level_2" class="css-1k3m5w0">
                                                <div class="css-edau80">
                                                    <img alt="Headphones &amp; Earphone"
                                                        class="swiper-lazy swiper-lazy-loaded"
                                                        src="https://cdnprod.mafretailproxy.com/sys-master-root/h54/h67/12942491222046/NF1210300.png">
                                                </div>
                                                <h2 class="teshrin-medium css-101m8i6">Headphones &amp; Earphone
                                                </h2>
                                            </a><a href="#" data-testid="category_level_2" class="css-1k3m5w0">
                                                <div class="css-edau80">
                                                    <img alt="Mobile Accessories" class="swiper-lazy swiper-lazy-loaded"
                                                        src="https://hybrisproduction.blob.core.windows.net/sys-master-prod/L1-L2-images/SmartphonesTabletsWearables/Level2/1210000.png">
                                                </div>
                                                <h2 class="teshrin-medium css-101m8i6">Mobile Accessories</h2>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="ps-section__product">
                                        <a href="#" data-testid="category_level_1" class="css-7txxm5">
                                            <hgroup class="css-psil8l">
                                                <h2 class="teshrin-medium css-1palj5t">Smartphones, Tablets &amp;
                                                    Wearables</h2>
                                            </hgroup><img alt="Smartphones, Tablets &amp; Wearables"
                                                class="swiper-lazy swiper-lazy-loaded" src="<?php echo e(asset('magic/assets/img/habib/im1.webp')); ?>">
                                        </a>



                                        <div data-testid="category_sub_category" class="css-1r8lsdl">
                                            <a href="#" data-testid="category_level_2" class="css-1k3m5w0">
                                                <div class="css-edau80">
                                                    <img alt="Smartphones &amp; Wearables"
                                                        class="swiper-lazy swiper-lazy-loaded"
                                                        src="https://cdnprod.mafretailproxy.com/sys-master-root/h00/hc4/13165720371230">
                                                </div>
                                                <h2 class="teshrin-medium css-101m8i6">Smartphones &amp; Wearables

                                                </h2>
                                            </a><a href="#" data-testid="category_level_2" class="css-1k3m5w0">
                                                <div class="css-edau80">
                                                    <img alt="Tablets &amp; E-Readers"
                                                        class="swiper-lazy swiper-lazy-loaded"
                                                        src="https://hybrisproduction.blob.core.windows.net/sys-master-prod/L1-L2-images/SmartphonesTabletsWearables/Level2/1230000.png">
                                                </div>
                                                <h2 class="teshrin-medium css-101m8i6">Tablets &amp; E-Readers</h2>
                                            </a><a href="#" data-testid="category_level_2" class="css-1k3m5w0">
                                                <div class="css-edau80">
                                                    <img alt="Headphones &amp; Earphone"
                                                        class="swiper-lazy swiper-lazy-loaded"
                                                        src="https://cdnprod.mafretailproxy.com/sys-master-root/h54/h67/12942491222046/NF1210300.png">
                                                </div>
                                                <h2 class="teshrin-medium css-101m8i6">Headphones &amp; Earphone
                                                </h2>
                                            </a><a href="#" data-testid="category_level_2" class="css-1k3m5w0">
                                                <div class="css-edau80">
                                                    <img alt="Mobile Accessories" class="swiper-lazy swiper-lazy-loaded"
                                                        src="https://hybrisproduction.blob.core.windows.net/sys-master-prod/L1-L2-images/SmartphonesTabletsWearables/Level2/1210000.png">
                                                </div>
                                                <h2 class="teshrin-medium css-101m8i6">Mobile Accessories</h2>
                                            </a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                    </section>
                    <section class="ps-section--newsletter" data-background="<?php echo e(asset('magic/assets/img/newsletter-bg.jpg')); ?>">
                        <h3 class="ps-section__title">Join our newsletter and get <br>20% discount for your first
                            order</h3>
                        <div class="ps-section__content">
                            <form action="<?php echo e(Route('addtolettercustomer')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="ps-form--subscribe">
                                    <div class="ps-form__control">
                                        <input class="form-control ps-input" required type="email" name="email"
                                            placeholder="Enter your email address">
                                        <button class="ps-btn ps-btn--warning">Subscribe</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/resources/themes/magic/views/home/index.blade.php ENDPATH**/ ?>