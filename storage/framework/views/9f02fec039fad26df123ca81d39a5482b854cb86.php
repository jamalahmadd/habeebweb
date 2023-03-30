<?php

$categories = [];

foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(1) as $category) {
    if ($category->slug) {
        array_push($categories, $category);
    }
}

$cart = cart()->getCart();

$cartItemsCount = trans('shop::app.minicart.zero');

if ($cart) {
    $cartItemsCount = $cart->items->count();
}
?>

<section class="section-padding footer-mid">
    <div class="container pt-15 pb-20">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="ps-footer--address">
                            <div class="ps-logo"><a href="/"> <img src="<?php echo e(asset('magic/assets/img/habib/logo.png')); ?>" alt=""><img
                                        class="logo-white" src="<?php echo e(asset('magic/assets/img/logo-white.png')); ?>" alt=""><img
                                        class="logo-black" src="<?php echo e(asset('magic/assets/img/Logo-black.png')); ?>" alt=""><img
                                        class="logo-white-all" src="<?php echo e(asset('magic/assets/img/logo-white1.png')); ?>" alt=""><img
                                        class="logo-green" src="<?php echo e(asset('magic/assets/img/logo-green.png')); ?>" alt=""></a></div>
                            <div class="ps-footer__title">Our store</div>
                            <p>Qena Main Branch - Sidi Omar Square</p>
                            <p><a target="_blank" href="https://goo.gl/maps/AWaE1w4zrMSTAh3T7">Show on map</a>
                            </p>

                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="ps-footer--contact">
                            <h5 class="ps-footer__title">Need help</h5>
                            <div class="ps-footer__fax"><i class="icon-telephone"></i> 096-33224222</div>
                            <p class="ps-footer__work"><svg width="17" height="17" viewBox="0 0 17 17"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path
                                            d="M7.39402 16.8696H0.727356V15.5363H7.39402V16.8696ZM6.06069 12.8696H0.727356V14.203H6.06069V12.8696ZM4.72736 10.203H0.727356V11.5363H4.72736V10.203ZM8.72736 0.869629C6.60633 0.871923 4.57283 1.71551 3.07304 3.21531C1.57324 4.7151 0.72965 6.7486 0.727356 8.86963H2.06069C2.06069 7.55109 2.45168 6.26216 3.18423 5.16583C3.91677 4.0695 4.95796 3.21502 6.17613 2.71043C7.39431 2.20585 8.73475 2.07383 10.028 2.33106C11.3212 2.5883 12.5091 3.22323 13.4414 4.15558C14.3738 5.08793 15.0087 6.27582 15.2659 7.56903C15.5232 8.86223 15.3911 10.2027 14.8866 11.4209C14.382 12.639 13.5275 13.6802 12.4312 14.4128C11.3348 15.1453 10.0459 15.5363 8.72736 15.5363V16.8696C10.8491 16.8696 12.8839 16.0268 14.3842 14.5265C15.8845 13.0262 16.7274 10.9914 16.7274 8.86963C16.7274 6.7479 15.8845 4.71307 14.3842 3.21277C12.8839 1.71248 10.8491 0.869629 8.72736 0.869629V0.869629ZM8.06069 5.5363V9.14563L10.256 11.341L11.1987 10.3983L9.39402 8.59363V5.5363H8.06069Z"
                                            fill="#3BB77E"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="16" height="16" fill="white"
                                                transform="translate(0.727356 0.869629)"></rect>
                                        </clipPath>
                                    </defs>
                                </svg> Monday – Friday: 9:00-20:00</p>
                            <hr>
                            <p><a class="ps-footer__email" href="mailto:info@alhabeeb.org"> <i
                                        class="icon-envelope"></i>info@alhabeeb.org </a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="ps-footer--block">
                            <h5 class="ps-block__title">Information</h5>
                            <ul class="ps-block__list">
                                <li><a href="/page/about-us">About us</a></li>
                                <li><a href="/page/contact-us">Contact Us</a></li>
                                <li><a href="/page/privacy-policy">Privacy Policy</a></li>
                                <li><a href="/customer/account/profile">My Account</a></li>

                            </ul>
                        </div>
                    </div>
					<?php
					$attributeRepository = app('\Webkul\CMS\Repositories\CmsRepository');
    				$locale = core()->getRequestedLocaleCode();
					$pagess=$attributeRepository->where('cms_pages.active',1)->join('cms_page_translations','cms_page_translations.cms_page_id','cms_pages.id')->where('cms_page_translations.locale',$locale)->get();
					?>
							<div class="col-12 col-md-4">
							<div class="ps-footer--block">
								<h5 class="ps-block__title">Pages</h5>
								<ul class="ps-block__list">
									<?php $__currentLoopData = $pagess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li><a href="/page/<?php echo e($p->url_key); ?>"><?php echo e($p->page_title); ?></a></li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								</ul>
							</div>
						</div>
									

                    <div class="col-12 col-md-4">
                        <div class="footer-link-widget widget-install-app col  wow animate__ animate__fadeInUp animated"
                            data-wow-delay=".5s"
                            style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <h4 class="widget-title ">Install App</h4>
                            <p>From App Store or Google Play</p>
                            <div class="download-app">
                                <a href="#" class="hover-up mb-sm-2 mb-lg-0">
                                    <img class="active"
                                        src="https://nest.botble.com/storage/general/app-store.jpg">
                                </a>
                                <a href="https://play.google.com/store/apps/details?id=com.verozone.alhabeebmarket" class="hover-up mb-sm-2">
                                    <img src="https://nest.botble.com/storage/general/google-play.jpg">
                                </a>
                            </div>
                            <p class="mb-20">Secured Payment Gateways</p>
                            <img src="<?php echo e(asset('magic/assets/img/habib/paymob.png')); ?>" alt="Payment gateways">
                            <img src="<?php echo e(asset('magic/assets/img/habib/Picture2.png')); ?>" alt="Payment gateways">
                            <img src="<?php echo e(asset('magic/assets/img/habib/Picture3.png')); ?>" alt="Payment gateways">
                            <img src="<?php echo e(asset('magic/assets/img/habib/Picture4.png')); ?>" alt="Payment gateways">
                            <img src="<?php echo e(asset('magic/assets/img/habib/Picture5.png')); ?>" alt="Payment gateways">
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<div class="container pb-2  wow animate__ animate__fadeInUp animated" data-wow-delay="0"
    style="visibility: visible; animation-name: fadeInUp;">
    <div class="row align-items-center">
        <div class="col-12 mb-30">
            <div class="footer-bottom"></div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6">
            <p class="font-sm  font-sm-mobile mb-0">Copyright © 2022 All Rights Reserved. Powered by Verozone
                Solutions</p>
        </div>
        <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
            <div class="hotline d-lg-inline-flex">
                <i class=""></i>
                <p class="font-sm mb-0"> <span>24/7 Support Center - 096-33224222</span></p>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
            <div class="mobile-social-icon">
                <h6>Follow Us</h6>
                <a target="_blank" href="https://www.facebook.com/alhabeebmarket" title="Facebook">
                    <img src="https://nest.botble.com/storage/general/facebook.png" alt="Facebook">
                </a>
				<a target="_blank" href="HTTPS://WWW.INSTAGRAM.COM/alhabeebmarket" title="Instagram">
                    <img src="https://nest.botble.com/storage/general/instagram.png" alt="Instagram">
                </a>
               <!-- <a target="_blank" href="HTTPS://WWW.TWITTER.COM/" title="Twitter">
                    <img src="https://nest.botble.com/storage/general/twitter.png" alt="Twitter">
                </a>-->
            </div>

        </div>
    </div>
</div><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/resources/themes/magic/views/layouts/footer/footer.blade.php ENDPATH**/ ?>