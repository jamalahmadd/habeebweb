<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.checkout.cart.title')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
    <style>
		.ps-checkout .ps-checkout__title{
			font-size:40px !important;
		}
		.c-bag-qty{
display:flex;
}
.c-bag-qty .qty-num{
text-align:center;
}
		.sui_icon_plus_16px ,
		.sui_icon_min_16px{
			cursor: pointer;
		}
        .ps-product--detail .ps-product__title a {
            font-size: 18px;
        }

        .ps-product--detail .ps-product__feature {
            margin-top: 0px !important;
        }

        .ps-product__content {
            margin-top: 25px;
        }

        .ps-product--detail .ps-product__content .ps-desc {
            text-align: justify;
        }

        @media (max-width:767px) {
            .ps-product .ps-product__quantity .number-input {
                background-color: transparent;
            }

            .ps-product .ps-product__quantity .number-input {
                width: 100% !important;
                justify-content: end !important;
            }

            .ps-product .ps-product__quantity .number-input input[type="number"] {
                max-width: 10%;
            }

            .ps-shopping .ps-shopping__footer .ps-btn {
                display: inline-block;
                width: auto;
                text-transform: initial;
                height: 50px !important;
                padding: 0px 12px !important;
                font-size: 11px !important;
                font-weight: 400 !important;
            }
        }
		.ps-shopping .ps-shopping__checkout .ps-btn {
			text-decoration:none;
		}
		@media (min-width: 1280px){
.ps-shopping .ps-shopping__title {
    font-size: 40px !important;
    line-height: 60px;
    font-family: 'Raleway', serif !important;
}
			.ps-table--product thead{
				border-bottom:1px dashed #8080806e;
			}
		}
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content-wrapper'); ?>

    <div class="ps-shopping">
        <div class="container">
            <ul class="ps-breadcrumb">
                <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>
                <li class="ps-breadcrumb__item active" aria-current="page">Shopping cart</li>
            </ul>
            <h3 class="ps-shopping__title">Shopping cart<sup></sup></h3>
            <div class="ps-shopping__content">
                <div class="row">
                    <div class="col-12 col-md-7 col-lg-9">
                        <ul class="ps-shopping__list">
                            <li>
                                <div class="ps-product ps-product--wishlist">
                                    <div class="ps-product__remove"><a href="#"><i class="icon-cross"></i></a></div>
                                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                            <figure><img src="img/products/001.jpg" alt="alt">
                                            </figure>
                                        </a></div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title"><a href="#">loreum loreum</a></h5>
                                        <div class="ps-product__row">
                                            <div class="ps-product__label">Price:</div>
                                            <div class="ps-product__value"><span class="ps-product__price sale">EGP
                                                    55.22</span><span class="ps-product__del">EGP 100.00</span>
                                            </div>
                                        </div>
                                        <div class="ps-product__row ps-product__stock">
                                            <div class="ps-product__label">Stock:</div>
                                            <div class="ps-product__value"><span class="ps-product__in-stock">In
                                                    Stock</span>
                                            </div>
                                        </div>
                                        <div class="ps-product__cart">
                                            <button class="ps-btn">Add to cart</button>
                                        </div>
                                        <div class="ps-product__row ps-product__quantity">
                                            <div class="ps-product__label">Quantity:</div>
                                            <div class="ps-product__quantity">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                            class="icon-minus"></i></button>
                                                    <input class="quantity" min="0" name="quantity" value="1"
                                                        type="number">
                                                    <button class="plus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                            class="icon-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ps-product__row ps-product__subtotal">
                                            <div class="ps-product__label">Subtotal:</div>
                                            <div class="ps-product__value">EGP 50.33</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="ps-product ps-product--wishlist">
                                    <div class="ps-product__remove"><a href="#"><i class="icon-cross"></i></a></div>
                                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                            <figure><img src="img/products/001.jpg" alt="alt">
                                            </figure>
                                        </a></div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title"><a href="#">loreum loreum</a></h5>
                                        <div class="ps-product__row">
                                            <div class="ps-product__label">Price:</div>
                                            <div class="ps-product__value"><span class="ps-product__price sale">EGP
                                                    77.65</span><span class="ps-product__del">EGP 80.65</span>
                                            </div>
                                        </div>
                                        <div class="ps-product__row ps-product__stock">
                                            <div class="ps-product__label">Stock:</div>
                                            <div class="ps-product__value"><span class="ps-product__in-stock">In
                                                    Stock</span>
                                            </div>
                                        </div>
                                        <div class="ps-product__cart">
                                            <button class="ps-btn">Add to cart</button>
                                        </div>
                                        <div class="ps-product__row ps-product__quantity">
                                            <div class="ps-product__label">Quantity:</div>
                                            <div class="ps-product__quantity">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                            class="icon-minus"></i></button>
                                                    <input class="quantity" min="0" name="quantity" value="1"
                                                        type="number">
                                                    <button class="plus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                            class="icon-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ps-product__row ps-product__subtotal">
                                            <div class="ps-product__label">Subtotal:</div>
                                            <div class="ps-product__value">EGP 77.65</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="ps-shopping__table">
                            <form method="POST" id="cart-form" action="<?php echo e(route('shop.checkout.cart.update')); ?>">

                                <?php echo csrf_field(); ?>
                                <table class="table ps-table ps-table--product">
                                    <thead>
                                        <tr>
                                            <th class="ps-product__remove"></th>
                                            <th class="ps-product__thumbnail"></th>
                                            <th class="ps-product__name">Product name</th>
                                            <th class="ps-product__meta">Price</th>
                                            <th class="ps-product__quantity">Quantity</th>
                                            <th class="ps-product__subtotal">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($cart != null): ?>
                                            <?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
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
                                                    
                                                ?>
                                                <tr>
                                                    <td class="ps-product__remove"> <a
                                                            href="<?php echo e(route('shop.checkout.cart.remove', ['id' => $item->id])); ?>"><i
                                                                class="icon-cross"></i></a>
                                                    </td>
                                                    <td class="ps-product__thumbnail"><a class="ps-product__image"
                                                            href="#">
                                                            <figure><img src="<?php echo e($productBaseImage['medium_image_url']); ?>"
                                                                    alt=""></figure>
                                                        </a></td>
                                                    <td class="ps-product__name">
                                                        <a href="<?php echo e(route('shop.productOrCategory.index', $url_key)); ?>">
                                                            <?php echo e($product->name); ?>

                                                        </a>
                                                    </td>
                                                    <td class="ps-product__meta">
                                                        <span class="ps-product__price">
                                                            <?php echo e('EGP ' . number_format((float) $item->base_price, 2, '.', '')); ?>

                                                        </span>
                                                    </td>
                                                    <td class="ps-product__quantity">

                                                        <div class="table-cell">
                                                            <ul class="c-bag-qty">
                                                                <li class="qty-opt left">
                                                                    <span class="suiiconfont sui_icon_min_16px"
                                                                        onclick="minusQty(<?php echo e($item->id); ?>)"
                                                                        id="sub">-</span>
                                                                </li>
                                                                <li><input type="text" class="qty-num"
                                                                        name="qty[<?php echo e($item->id); ?>]"
                                                                        id="qty-<?php echo e($item->id); ?>"
                                                                        value="<?php echo e($item->quantity); ?>">
                                                                </li>
                                                                <li tabindex="0" role="button"
                                                                    class="qty-opt right">
                                                                    <span class="suiiconfont sui_icon_plus_16px"
                                                                        id="add"
                                                                        onclick="addQty(<?php echo e($item->id); ?>)">+</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td class="ps-product__subtotal">
                                                        <?php echo e(core()->currency($item->base_total)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        
                    </div>
                    <div class="col-12 col-md-5 col-lg-3">
                        <div class="ps-shopping__label">Cart totals</div>
                        <div class="ps-shopping__box">
                            <div class="ps-shopping__row">
                                <div class="ps-shopping__label">Subtotal</div>
                                <div class="ps-shopping__price">
                                    <?php if($cart != null): ?>
                                        <?php echo e(core()->currency($cart->base_sub_total)); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="ps-shopping__row">
                                <div class="ps-shopping__label">Total</div>
                                <div class="ps-shopping__price">
                                    <?php if($cart != null): ?>
                                        <?php echo e(core()->currency($cart->base_grand_total)); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="ps-shopping__checkout"><a class="ps-btn ps-btn--warning"
                                    href="<?php echo e(route('shop.checkout.onepage.index')); ?>">Proceed to checkout</a><a
                                    class="ps-btn ps-btn--warning ps-shopping__link" href="<?php echo e(route('shop.home.index')); ?>">Continue To
                                    Shopping</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        function minusQty(id) {
            let qty = $('#qty-' + id);
            if (qty && parseInt(qty.val()) > 0)
                qty.val(parseInt(qty.val()) - 1);
            document.getElementById('cart-form').submit();
        }

        function addQty(id) {
            $('#qty-' + id).val(parseInt($('#qty-' + id).val()) + 1)
            document.getElementById('cart-form').submit();
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/resources/themes/magic/views/checkout/cart/index.blade.php ENDPATH**/ ?>