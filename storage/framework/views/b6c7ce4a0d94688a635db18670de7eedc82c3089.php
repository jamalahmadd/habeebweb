<?php
    $categories = [];

    foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category) {
        if ($category->slug)
        array_push($categories, $category);
    }

$cart = cart()->getCart();

$cartItemsCount = trans('shop::app.minicart.zero');

if ($cart) {
    $cartItemsCount = $cart->items->count();
}
$language=session()->get('locale');
?>
<!--NEW-->
<!--END NEW-->
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<style>
/*New*/       *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
		#social-icons{
		position:fixed;
		right:10px;
		display:none;
		bottom:55px;
		z-index:999;
		text-align:center;
		width:40px;
		height:95px;
		}
	.social-tags{
	display:block;
	cursor:pointer;
	text-decoration:none;
	height:40px;
	line-height:40px;
	margin:5px 0;
	color:#ffffff;
	border-radius:50%;
	background-color: #5eac11;
	}
	.social-tags:hover{
	color:#ffffff;
	}
        #mapp{
            width: 90vw;
            height: 80vh;
            position: fixed;
			z-index:1200;
            top: -250%;
            left: 5%;
            transition: top 0.8s ease-in-out;
            color: #000000;
        }
		#icon_map,#icon_menu{
            position: absolute;
            right: 5px;
            top: 5px;
			z-index:80;
            cursor: pointer;
        }
	<?php if(isset($language) && $language=='ar'): ?>
		#icon_menu{
		right: unset;
		left:5px;
		}
	<?php endif; ?>
	#icon_menu:hover{
	color:#ff0000;
	}
	#menu_bars{
	color:#000000;
	font-size:20px;
	cursor:pointer;
	}
	#menu_bars:hover{
	color:#5eac11;
	}
	#map {
  height: 100%;
}
	#overlay,#overlay_map{
	position:fixed;
	top:0;
	display:unset;
	left:0;
	width:100%;
	opacity:0.5;
	height:100vh;
	visibility:hidden;
	z-index: 1100;
	background-color:#000000;
	}
		  .custom-map-control-button,#confirm-location {
  background-color: #fff;
  border: 0;
  border-radius: 2px;
  box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
  margin: 10px;
  padding: 0 0.5em;
  font: 400 18px Roboto, Arial, sans-serif;
  overflow: hidden;
  height: 40px;
  cursor: pointer;
}
.custom-map-control-button:hover,#confirm-location:hover {
  background: rgb(235, 235, 235);
}
	#confirm-location{
	margin:0 auto;
	position:relative;
	z-index:100;
	bottom:50px;
	display:block;
	}
	 #mega_menu{
            width: 90%;
            height: 85vh;
		 	z-index:1200;
            position: fixed;
            top: -250%;
            left: 5%;
            transition: top 0.8s ease-in-out;
            color: #000000;
        }
        .sides{
            display: inline-block;
			<?php if(isset($language) && $language=='ar'): ?>
			 float: right;	
			<?php else: ?>
            float: left;
			<?php endif; ?>
            height: 100%;
        }
        #category-side{
            background-color:  #5eac11;
            width: 25%;
			overflow:auto;
        }
        #subcategory-side{
            background-color: #ffffff;
            color: #000000;
            padding: 0;
            width: 50%;
        }
        #featured-side{
            background-color:  #ffffff;
            width: 25%;
			overflow: auto;
        }
        #c_list{
            width: 100%;
            height: 100%;
        }
        .c_list_item{
          font-weight: bold;
          font-size: 16px;
          list-style: none;
          width: 100%;
          position: relative;
			
        }

        .menu-links,.drop-links{
            text-decoration: none !important;
            color: #000000;
			<?php if(isset($language) && $language=='ar'): ?>
			padding-right: 15px;	
			<?php else: ?>	
            padding-left: 15px;
			<?php endif; ?>
            display: block;
			position:relative;
			font-weight:bold;
            cursor: pointer;
            width: 100%;
            /*height: 100%;*/
            text-transform: capitalize;
            line-height: 30px;
            transition: color 1s ease-in-out 0.5s,background-color 0.5s ease-in-out 0.1s;
        }
	<?php if(isset($language) && $language=='ar'): ?>
	.menu-links{
	padding-left:45px;
	}	
	<?php else: ?>
	.menu-links{
	padding-right:45px;
	}
	<?php endif; ?>
	.drop-links{
	 transition: none;
	}
        .menu-links:hover{
            color: #000000;
            background-color:#dcdcdc;
        }
        .drop-links:hover{
            color: #000000;
        }
        .c_list_drop{
            width: 100%;
           /* max-height: 120px;*/
            background-color: #fcf6f5ff;
            display: none;
           /* overflow: auto;*/
		   height:auto;
        }
        .angles{
            transition: 0.4s !important;
            position:absolute;
            top:8px;
			right:15px;
        }
	
	.angles-container{
	position:absolute;
	text-align:center;
	top:0;
	right:0;
	width:40px;
	height:100%;
	}
	<?php if(isset($language) && $language=='ar'): ?>
        .rotate{
            transform: rotate(-90deg);
        }
	<?php else: ?>
	    .rotate{
            transform: rotate(90deg);
        }
	<?php endif; ?>
        .unrotate{
            transform: rotate(0deg);
        }
        .sub-wrapper{
            display: none;
            width: 100%;
            overflow: auto;
            height: 100%;
		    grid-auto-rows: max-content;
			grid-gap: 20px;
    		grid-template-columns: 1fr 1fr;
        }
        .sub-container {
            /*width: 50%;*/
            height: auto;
            /*overflow: auto;*/
            /*display: inline-block;*/
            /*padding: 4%;*/
			padding: 6%;
            color: #000000;
            /*float: left;*/   
        }
        .header-side{
            width: 100%;
            height: 15%;
            color: #ffffff;
            padding: 1%;
            background-color:  #ffffff;
        }
		.featured-content{
			height:85%;
			padding:2.5%;
			overflow:auto;
			
		}
		.featured-product{
		width:45%;
		float:left;
		height:220px;
		margin:2%;
		padding:5% 3% 2%;
		background-color:#dcdcdc;
		display:inline-block;
		}
		.featured-image{
		display:block;
		width:120px;
		margin: 0px auto;
		margin-bottom:40px;
		height: 60px;
		}
	.featured-name,.featured-price{
	text-align:left;
	line-height:18px;
	font-size:14px;
	}
	.featured-price{
	font-weight:bold;
	}
        .header-side h2{
            font-size: 20px;
        }
        .header-side h3{
            font-size: 18px;
        }
        .header-titles{
            text-align: center;
        }
        .sub-listing{
            line-height: 20px;
        }
	    .sub-title,.sub-listing{
           font-size: 15px;
        }
        ::-webkit-scrollbar {
            width: 5px;
            height: 10px;
        }
	.title-links,.listing-links{
	text-decoration:none;
	cursor:pointer;
	}
	.title-links:hover,.listing-links:hover{
	color: #5eac11;
	
	}
        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        /*.row{
            width: 100%;
            height: initial;
            padding: 0;
            margin: 0;
        }*/
	@media screen and (max-width:768px){
		.custom-map-control-button{
		left:0 !important;
		top:50px !important;
		width: 170px !important;
		position:absolute;
		font-size:13px;
		}
	}
        @media screen and (max-width: 992px){
            #mega_menu{
                display: none;
            }
			#overlay{
				display:none;
			}
        }
	@media screen and (max-width:1200px){
		.featured-product{
		display:block;
		width:90%;
		float:none;
		margin:8px auto;
		}
	}
/*End New*/
</style>
<?php $__env->startPush('styles'); ?>
    <style>
		.fa-search{
color: var(--color-green);
		}
.colors{
  list-style:none;
  width:20px;
  height: 20px;
  margin:17px auto;
  border-radius:50%;
  border : 2px solid #fff;
cursor:pointer;
}
#blue{
  background: #3498db ;
}
#red{
  background: #e74c3c;
}
#purple{
  background: #9b59b6;
}
#green{
  background: #2ecc71;
}

@media screen and (min-width: 767px)and (max-width: 1024px){
.css-114osi9 a {
    overflow: hidden;
    transition: opacity 0.3s ease 0s;
    margin-left: 5px;
}
		}

    </style>
<?php $__env->stopPush(); ?>
<!--New-->
<div id="overlay">

</div>
<div id="overlay_map">

</div>
<div id="mapp">
<i class="icon-cross" id="icon_map" onclick="hideMap()"></i>
<div id="map">
</div>
<form method="POST" action="<?php echo e(route('set_location')); ?>">
<?php echo csrf_field(); ?>
<input type="hidden" id="distance-value" name="distance_value"/>
<button type="submit" name="submit" id="confirm-location">Confirm</button>
</form>
</div>
<div id="social-icons">
	<a class="social-tags" target="_blank" href="https://www.facebook.com/alhabeebmarket">
		<i class="fa fa-facebook"></i>
	</a>
	<a class="social-tags" target="_blank" href="HTTPS://WWW.INSTAGRAM.COM/alhabeebmarket">
		<i class="fa fa-instagram"></i>
	</a>
</div>
<div id="mega_menu" <?php if(isset($language) && $language=='ar'): ?> style="text-align:right;" <?php endif; ?>>
	<i class="fa fa-times fa-lg" id="icon_menu" onclick="hideMenu()"></i>
    <div id="category-side" class="sides">
    <ul id="c_list">
		<?php if(count($categories)): ?>
		 <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li class="c_list_item" id="">
		<a class="menu-links" href="#" id=""><?php echo e($category_data->name); ?> <?php if(count($category_data->children)): ?>
			<?php if(isset($language) && $language=='ar'): ?>
			<i class="fa fa-solid fa-angle-left angles" style="right:unset; left:15px;"></i>
			<?php else: ?>
			<i class="fa fa-solid fa-angle-right angles"></i>
			<?php endif; ?>
			
			<?php endif; ?> </a>
		                        <?php if(count($category_data->children)): ?>
                                                            <ul  class="c_list_drop">
                                                                <?php $__currentLoopData = $category_data->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li>
																		<a class="drop-links"  onmouseover="displaysubMenu(this,<?php echo e($sub['id']); ?>)"
                                                                            href="<?php echo e(url('/' . $category_data->slug . '/' . $sub['slug'])); ?>"><?php echo e($sub['name']); ?></a>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
			<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
			
		<?php endif; ?>  
		</li>
		<!--
        <li class="c_list_item" id="supermarket_item">
            <a class="menu-links" href="#" id="supermarket" >Supermarket<i class="fa fa-solid fa-angle-right dropdown angles"></i></a>
            <ul class="c_list_drop" id="supermarket_drop">
                <li class="c_list_item">
                    <a class="drop-links" href="#">Meat</a>
                </li>
                <li class="c_list_item">
                    <a class="drop-links" href="#">Chicken</a>
                </li>
                <li class="c_list_item">
                    <a class="drop-links" href="#"  onmouseover="displaysubMenu(this)" >Meat</a>
                </li>
                <li class="c_list_item">
                    <a class="drop-links" href="#">Chicken</a>
                </li>
            </ul>
        </li>
       <li class="c_list_item" id="clothes_item">
           <a class="menu-links" href="#" id="clothes">Clothes  <i class="fa fa-solid fa-angle-right dropdown angles"></i></a>
           <ul class="c_list_drop">
               <li class="c_list_item">
                   <a class="drop-links" href="#">Shoes</a>
               </li>
               <li class="c_list_item">
                   <a class="drop-links" href="#">T-Shirt</a>
               </li>
               <li class="c_list_item">
                   <a class="drop-links" href="#">Pants</a>
               </li>
               <li class="c_list_item">
                   <a class="drop-links" href="#">Jackets</a>
               </li>
               <li class="c_list_item">
                   <a class="drop-links" href="#">Jeans</a>
               </li>
           </ul>
        </li>-->

    </ul>
    </div>
    <div id="subcategory-side" class="sides">
		<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php $__currentLoopData = $category_data->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="sub-wrapper" id="<?php echo e($sub['id']); ?>">
		<?php $__currentLoopData = $sub->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_next): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="sub-container">
			<h5 class="sub-title"><a class="title-links" style="font-weight:bold;" href="<?php echo e(url('/'  . $category_data->slug . '/'  . $sub['slug'] . '/' . $sub_next['slug'])); ?>"><?php echo e($sub_next['name']); ?></a></h5>
		<?php $__currentLoopData = $sub_next->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_last): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<p class="sub-listing"><a class="listing-links" href="<?php echo e(url('/'  . $category_data->slug . '/'  . $sub['slug'] . '/' . $sub_next['slug']. '/' . $sub_last['slug'])); ?>"><?php echo e($sub_last['name']); ?></a></p>	
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div id="featured-side" class="sides">
        <div class="header-side">
            <h2 class="header-titles">Featured Products</h2>
            <h3 class="header-titles">Supermarket</h3>
        </div>
		<div class="featured-content">
			<div class="featured-product">
			<img class="featured-image" src="https://hab.mobi/magic/assets/img/habib/logo1.png">
			<p class="featured-name">Test Product Test Product Test Product</p>
			<p  class="featured-price">150 EGP</p>
			</div>
			<div class="featured-product">
			<img class="featured-image" src="https://hab.mobi/magic/assets/img/habib/logo1.png">
			<p class="featured-name">Test Product</p>
			<p  class="featured-price">150 EGP</p>
			</div>
			
			<div class="featured-product">
			
			</div>
			<div class="featured-product">
			
			</div>
			<div class="featured-product">
			
			</div>
		</div>
    </div>
</div>
<!--End New-->
<header class="ps-header ps-header--2">
    <div class="ps-noti">
        <div class="upper-bar">

            <div class="ps-header__top">
                <div class="container">
                    <div class="ps-header__text animate-text">
                        <span><strong>100% Secure delivery </strong>without contacting the
                            courier </span>
                        <span><strong>Save up 35% off today</strong> Shop now </span>
                        <span><strong>Save More with coupon </strong>Habeeb market </span>
                        <span><strong>100% Secure delivery </strong>without contacting the
                            courier </span>
                    </div>
                    <div class="ps-top__right">

                        <div class="ps-top__social">
                            <ul class="ps-social">
								<li><a class="ps-social__link instagram" target="_blank" href="HTTPS://WWW.alhabeeb.org">AlHabeeb Group</a>
                                </li>
                                <li><a class="ps-social__link facebook" target="_blank" href="https://www.facebook.com/alhabeebmarket"><i class="fa fa-facebook">
                                        </i><span class="ps-tooltip">Facebook</span></a></li>
                                <li><a class="ps-social__link instagram" target="_blank" href="HTTPS://WWW.INSTAGRAM.COM/alhabeebmarket"><i
                                            class="fa fa-instagram"></i><span class="ps-tooltip">Instagram</span></a>
                                </li>
								
                            </ul>
                        </div>
                        <ul class="menu-top">
							 <li class="nav-item"><a class="nav-link" target="_blank" href="/customer/account/wishlist">Wishlist</a></li>
							<!--New-->
							<li class="nav-item"><a class="nav-link"  onclick="displayMap()" href="#">Location&nbsp; <i class="icon-location"></i></a></li>
							<!--End New-->
                            <li class="nav-item"><a class="nav-link" target="_blank" href="/page/about-us?locale=en">About</a></li>

                            <li class="nav-item"><a class="nav-link" target="_blank" href="/page/contact-us?locale=en">Contact</a></li>
							  
                        </ul>
                        <div class="ps-header__text">Need help? <strong>Al Habeed Market</strong></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="middle-bar">
            <div class="container">
                <div class="ps-header__middle">
                    <div class="container">
						<div class="ps-logo"><a id="menu_bars" onclick="displayMenu()"><i class="fa fa-bars fa-lg"></i></a><a href="/"> <img src="<?php echo e(asset('magic/assets/img/habib/logo1.png')); ?>" alt=""></a>
                        </div><a class="ps-menu--sticky" href="#"></a>
                        <div class="ps-header__right">
                            <ul class="ps-header__icons">


                                <i class="css-4w3267"></i>

                                <li><a href="/customer/account/wishlist" data-testid="header_login_register" class="css-1bgs063">
                                        <i class="fa fa-heart-o"></i></a></li>
                                <li><?php if(!Auth::guard('customer')->user()): ?> <a href="<?php echo e(route('customer.session.create')); ?>" class="ps-header__item"><i class="icon-user"></i></a> <?php endif; ?>
									<style>
.dropbtn {
	background-color:white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
	 transition: all 2s ease;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
	 transition: all 2s ease;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

										
										
										
.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
  transition: all 0.5s ease;
}

</style>
<?php if(auth()->guard('customer')->check()): ?>
<div class="dropdown">
  <button class="dropbtn"><i class="icon-user"></i></button>
  <div class="dropdown-content">
    <a class="nav-link" href="/customer/account/profile">
            <i class="flaticon-user"></i>
             <?php echo e(__('shop::app.header.profile')); ?>

        </a>
    <a class="nav-link" href="/customer/account/addresses">
            <i class="flaticon-user"></i>
           <?php echo e(__('velocity::app.shop.general.addresses')); ?>

        </a>
    <a class="nav-link" href="/customer/account/orders">
            <i class="flaticon-shopping-bag"></i>
            <?php echo e(__('velocity::app.shop.general.orders')); ?>

        </a>
	  <a class="nav-link" href="/customer/account/wishlist">
            <i class="flaticon-settings"></i>
            Wishlist
        </a>
	  
	  <a class="nav-link" href="/customer/logout">
            <i class="flaticon-logout"></i>
            <?php echo e(__('shop::app.header.logout')); ?>

        </a>
  </div>
</div>
<?php endif; ?>
								</li>
                                <li><a class="ps-header__item" href="#" id="cart-mini"><i
                                            class="icon-cart-empty"></i><span
                                            class="badge"><?php echo e($cartItemsCount); ?></span></a>
                                    <div class="ps-cart--mini">

                                        <?php if($cart): ?>
                                            <ul class="ps-cart__items">
                                                <?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                    // $images = $productImageHelper->getGalleryImages($item->product);
                                                    ?>
                                                    <li class="ps-cart__item" id="item_<?php echo e($item->id); ?>">
                                                        <div class="ps-product--mini-cart">
                                                            <a class="ps-product__thumbnail"
                                                                href="<?php echo e(route('shop.productOrCategory.index', $url_key)); ?>">
                                                                <img
                                                                    src="<?php echo e($productBaseImage['original_image_url']); ?>"alt="alt">
                                                            </a>
                                                            <div class="ps-product__content"><a class="ps-product__name"
                                                                    href="<?php echo e(route('shop.productOrCategory.index', $url_key)); ?>"><?php echo e($item->name); ?></a>
                                                                <p class="ps-product__meta"><span
                                                                        class="<?php echo e($item->id); ?>"><?php echo e($item->quantity); ?></span>x
                                                                    <span
                                                                        class="ps-product__price"><?php echo e(core()->currency($item->price)); ?></span>
                                                                </p>
                                                            </div><a class="ps-product__remove"
                                                                href="<?php echo e(route('shop.checkout.cart.remove', ['id' => $item->id])); ?>"><i
                                                                    class="icon-cross"></i></a>
                                                        </div>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                            <div class="ps-cart__total"><span>Subtotal
                                                </span><span><?php echo e(core()->currency($cart->base_grand_total)); ?></span>
                                            </div>
                                            <div class="ps-cart__footer"><a class="ps-btn ps-btn--outline"
                                                    href="<?php echo e(route('shop.checkout.cart.index')); ?>">View Cart</a><a
                                                    class="ps-btn ps-btn--warning"
                                                    href="<?php echo e(route('shop.checkout.onepage.index')); ?>">Checkout</a>
                                            </div>
                                        <?php else: ?>
                                            <div class="cart_item empty-item" id="item_0">
                                                <span class="empty-item">Cart is empty</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            </ul>
							 <div class="ps-language-currency dropdown">
								<i class="fa fa-language" style="font-size:30px" aria-hidden="true"></i>
								 				<div class="dropdown">
 
 <?php use Illuminate\Support\Facades\DB;
$locales=DB::table('locales')->select('locales.*')->get();?>
  <div class="dropdown-content">
	  <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	  
    <a class="nav-link" href="?locale=<?php echo e($locale->code); ?>">
          <img src="<?php echo e(url('').'/storage/'.$locale->locale_image); ?>" style="max-width:20% !important;"/> <?php echo e($locale->name); ?>

        </a>
	  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>				 			 
                            </div>
                            <div class="ps-header__search">
                                <form action="<?php echo e(url('search')); ?>">
                                    <div class="ps-search-table">
                                        <div class="input-group">
                                            <input class="form-control ps-input" type="text" id="action-search" name="term" value="<?php echo e(request()->get('term')); ?>" required
                                                placeholder="Search for products">
                                            <div class="input-group-append">
												<button type="submit" style="background-color:transparent;border:none;"><i class="fa fa-search"></i></button></div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>




		
        <div class="ps-navigation">
            <div class="container">
                <div class="ps-navigation__left">
				<!--Comment Here
                    <nav class="ps-main-menu">
                        <ul class="menu">
                            <?php if(count($categories)): ?>

                                <li class="has-mega-menu"><a href="#">All Category<span class="sub-toggle"><i
                                                class="fa fa-chevron-down"></i></span></a>
                                    <div class="mega-menu">
                                        <div class="container">
                                            <div class="mega-menu__row">

                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="mega-menu__column">
                                                        <h4><?php echo e($category_data->name); ?></h4>
                                                        <?php if(count($category_data->children)): ?>
                                                            <ul class="sub-menu--mega">
                                                                <?php $__currentLoopData = $category_data->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li><a
                                                                            href="<?php echo e(url('/' . $category_data->slug . '/' . $sub['slug'])); ?>"><?php echo e($sub['name']); ?></a>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </div>

                                        </div>
                                    </div>
                                </li>
                            <?php endif; ?>
                            


                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="has-mega-menu">
                                    <a
                                        <?php if(count($category_data->children)>0): ?> href="#" <?php else: ?> href="<?php echo e(url('/' . $item['slug'])); ?>" <?php endif; ?>><?php echo e($category_data->name); ?><span
                                            class="sub-toggle"><i class="fa fa-chevron-down"></i></span></a>
                                    <div class="mega-menu">
                                        <div class="container">
                                            <div class="mega-menu__row">
                                                <div class="mega-menu__column">
                                                    <?php if(count($category_data->children)): ?>
                                                        <ul class="sub-menu--mega">
                                                            <?php $__currentLoopData = $category_data->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><a
                                                                        href="<?php echo e(url('/' . $category_data->slug . '/' . $sub['slug'])); ?>"><?php echo e($sub['name']); ?></a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </nav>Comment Here-->
				
                </div>
            </div>
        </div>

	</div>
</header>

<header class="ps-header ps-header--2 ps-header--mobile">
						<div class="ps-navigation--footer">
            <div class="ps-nav__item"><a href="#" id="open-menu"><i class="icon-menu"></i></a><a href="#" id="close-menu"><i class="icon-cross"></i></a></div>
            <div class="ps-nav__item"><a href="/"><i class="icon-home2"></i></a></div>
            <div class="ps-nav__item"><a href="<?php echo e(route('customer.session.create')); ?>">
                    <span class="css-1hbm47t"><i class="fa fa-user" aria-hidden="true"></i></span>
                </a></div>
            <div class="ps-nav__item"><a href="/customer/account/wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></div>

        </div>
    <div class="ps-noti">

        <div class="ps-header__middle">
            <div class="container">
                <div class="ps-logo"><a href="#"> <img src="<?php echo e(asset('magic/assets/img/habib/logo1.png')); ?>" alt=""></a></div>
                <div class="ps-nav__item">
					<a href="<?php echo e(route('shop.checkout.cart.index')); ?>"><i class="icon-cart-empty"></i><span
                            class="badge"><?php echo e($cartItemsCount); ?></span> </a>
							<!--New-->
				                
					<a href="#"  onclick="displayMap()"><i class="icon-location"></i></a>
				<!--End New-->
				</div>
				
                <div class="ps-header__search">
                                <form action="<?php echo e(url('search')); ?>">
                        <div class="ps-search-table">
                            <div class="input-group">
                                <input class="form-control ps-input" type="text" id="action-search" name="term" value="<?php echo e(request()->get('term')); ?>" required placeholder="Search for products">
								<div class="input-group-append">
									<button type="submit"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</div>
                                </form>
                        </div>
					

                </div>
            </div>
        </div>
	<div class="ps-menu--slidebar">
        <div class="ps-menu__content">
            <ul class="menu--mobile">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="menu-item-has-children"><a <?php if(count($category_data->children)>0): ?> href="#" <?php else: ?> href="<?php echo e(url('/' . $item['slug'])); ?>" <?php endif; ?>><?php echo e($category_data->name); ?></a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                                                    <?php if(count($category_data->children)): ?>
                    <ul class="sub-menu">
                                                            <?php $__currentLoopData = $category_data->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><a
                                                                        href="<?php echo e(url('/' . $category_data->slug . '/' . $sub['slug'])); ?>"><?php echo e($sub['name']); ?></a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <li class="menu-item-has-children"><a href="/page/about-us">About Us</a></li>
                <li class="menu-item-has-children"><a href="/page/contact-us">Contact</a></li>
            </ul>
        </div>

    </div>
</header>
<!--New-->
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmHeOF0K-GV2oHbSj78Z9ygz9PMGkw0QI&callback=initMap&v=weekly"
      defer
    ></script>
<script>
    function displayMap(){
		hideMenu();
        var map=document.getElementById('mapp');
		var overlay_map=document.getElementById('overlay_map');
        map.style.top="50px";
		overlay_map.style.visibility="visible";
    }
    function hideMap(){
        var map=document.getElementById('mapp');
		var overlay_map=document.getElementById('overlay_map');
        map.style.top="-250%";
		overlay_map.style.visibility="hidden";
    }
	function displayMenu(){
		hideMap();
        var menu=document.getElementById('mega_menu');
		var overlay=document.getElementById('overlay');
        menu.style.top="8%";
		overlay.style.visibility="visible";
    }
    function hideMenu(){
        var menu=document.getElementById('mega_menu');
		var overlay=document.getElementById('overlay');
        menu.style.top="-100%";
		overlay.style.visibility="hidden";
    }
    function displaysubMenu(link,parameter){
		const subwrappers=document.getElementsByClassName('sub-wrapper');
		const drop_links=document.getElementsByClassName('drop-links');
        var subcategory=document.getElementById(parameter);
		for(var i=0; i<subwrappers.length;i++){
		subwrappers[i].style.display="none";
		}
		for(var i=0; i<drop_links.length;i++){
		drop_links[i].style.backgroundColor="#fcf6f5ff";
		}
        subcategory.style.display="grid";
        link.style.backgroundColor="#dcdcdc";
    }
	
let mybuttoncontainer = document.getElementById("social-icons");
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybuttoncontainer.style.display = "block";
  } else {
    mybuttoncontainer.style.display = "none";
  }
}
</script>
<script>
    $(document).ready(function(){
        $(".menu-links").click(function(){
            $('.c_list_drop').not($(this).siblings()).slideUp();
            $('.angles').not($(this).children()).removeClass('rotate');
            $(this).next(".c_list_drop").slideToggle();
            $(this).find(".angles").toggleClass('rotate');
        });
    });
</script>
<!--End NEw-->
	<?php $__env->startPush('scripts'); ?>
	        <script>
 $('.colors').each(function(){
    $(this).click(function(){
        let color = $(this).attr('data-color');
        document.documentElement.style.setProperty('--color-green', color);
    })
 })
            </script>

	  <script>
	  // In the following example, markers appear when the user clicks on the map.
// The markers are stored in an array.
// The user can then click an option to hide, show or delete the markers.
let map;
let markers = [];

function initMap() {
  const haightAshbury = { lat: 26.735662862762414, lng: 33.36557665039063 };

  map = new google.maps.Map(document.getElementById("map"), {
    zoom:8,
    center: haightAshbury,
    mapTypeId: "terrain",
  });
	infoWindow = new google.maps.InfoWindow();

	const locationButton = document.createElement("button");

  locationButton.textContent = "Select My Current Location";
  locationButton.classList.add("custom-map-control-button");
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
  locationButton.addEventListener("click", () => {
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
			deleteMarkers();
			 addMarker(pos);
         let coordinates = {lat:27.23706 , lng:33.83281};
			let {lat, lng} = coordinates;
		let positionn=pos;
		let { lat: latitude, lng: longitude } = positionn;
//alert(getDistanceFromLatLonInKm(latitude,longitude,lat,lng));
		var distance = getDistanceFromLatLonInKm(latitude,longitude,lat,lng);
	    var distance_input=document.getElementById('distance-value');
	    distance_input.value=distance;
          map.setCenter(pos);
			//alert(distance);
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });
  // This event listener will call addMarker() when the map is clicked.
  map.addListener("click", (event) => {
	  deleteMarkers();
	
    addMarker(event.latLng);
	  let coordinatess = {lat:27.23706 , lng:33.83281};
			let {lat, lng} = coordinatess;
	//	let positionnn=event.latLng;
	  var latt = event.latLng.lat();
    var lngg = event.latLng.lng();
		//let { lat: latitudee, lng: longitudee } =event.latLng;
//alert(getDistanceFromLatLonInKm(latt,lngg,lat,lng));
	 
	  var distance = getDistanceFromLatLonInKm(latt,lngg,lat,lng);
	  var distance_input=document.getElementById('distance-value');
	  distance_input.value=distance;
	 // alert(distance);
	  
  });
  // add event listeners for the buttons


  // Adds a marker at the center of the map.
  addMarker(haightAshbury);
}

// Adds a marker to the map and push to the array.
function addMarker(position) {
  const marker = new google.maps.Marker({
    position,
    map,
  });
	
 markers.push(marker);
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
  for (let i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function hideMarkers() {
  setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
  setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  hideMarkers();
  markers = [];
}
  function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
  var R = 6371; // Radius of the earth in km
  var dLat = deg2rad(lat2-lat1);  // deg2rad below
  var dLon = deg2rad(lon2-lon1); 
  var a = 
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ; 
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
  var d = R * c; // Distance in km
  return d;
}

function deg2rad(deg) {
  return deg * (Math.PI/180)
}

window.initMap = initMap;
	  </script>
<!--
<script>
$(document).ready(function(){
$("#form-submit").on('submit', function(e){
	console.log("Form submitted!");
    e.preventDefault();
	var distance=document.getElementById('distance-value').value;
    $.ajax({
        type: "POST",
        url: "/set-location",
        data: { variable: distance, _token: '<?php echo e(csrf_token()); ?>'  },
		success: function(response) {
        console.log(response);
    }
    });
});
});

</script>-->
	<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/resources/themes/magic/views/layouts/header/index.blade.php ENDPATH**/ ?>