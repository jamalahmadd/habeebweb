<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="#" rel="">
    <link href="#" rel="" type="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Home | Al Habeeb Market</title>
    <link rel="stylesheet" href="<?php echo e(asset('magic/assets/plugins/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('magic/assets/fonts/Linearicons/Font/demo-files/demo.css')); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="../../css?family=Jost:400,500,600,700&amp;display=swap&amp;ver=1607580870">
    <link rel="stylesheet" href="<?php echo e(asset('magic/assets/plugins/bootstrap4/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('magic/assets/plugins/owl-carousel/assets/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('magic/assets/plugins/slick/slick/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('magic/assets/plugins/lightGallery/dist/css/lightgallery.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('magic/assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('magic/assets/plugins/select2/dist/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('magic/assets/plugins/lightGallery/dist/css/lightgallery.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('magic/assets/plugins/noUiSlider/nouislider.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('magic/assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('magic/assets/css/home-2.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('magic/assets/fonts/Linearicons/Font/flaticon.ttf')); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="<?php echo e(asset('magic/assets/fonts/Linearicons/Font/flaticon.css')); ?>">
    <?php echo $__env->yieldContent('head'); ?>
<?php $__env->startPush('styles'); ?>
	<style>
		.mega-menu .sub-menu--mega li a {
    display: block;
    line-height: 24px;
    padding: 2px 2px 2px 0;
    font-size: 12px !important;

}
		.mega-menu h4 {
		    font-size: 14px !important;	
		}
		.menu > li.has-mega-menu .mega-menu {
			top:78% !important;
		}
		.mega-menu h4{
			margin-bottom:6px !important;
		}

				.mega-menu__row {
	  animation: smoothSlide 1s forwards;
}
		@keyframes smoothSlide {
	0% {
		transform: translateY(80px);
	}
	100% {
		transform: translateY(0px);
	}
}
			@media screen and (min-width: 768px) {
		.ps-header--sticky{
			  animation: smoothScroll 1s forwards;
		}
		@keyframes smoothScroll {
	0% {
		transform: translateY(-40px);
	}
	100% {
		transform: translateY(0px);
	}
}

		}
		.fa-search{
			color:var(--color-green);
		}
		.input-group-append button{
			border:none;
		}


	</style>
	<?php $__env->stopPush(); ?>
    
    <?php echo $__env->yieldContent('seo'); ?>

    
    <?php if($favicon = core()->getCurrentChannel()->favicon_url): ?>
        <link rel="icon" sizes="16x16" href="<?php echo e($favicon); ?>" />
    <?php else: ?>
        <link rel="icon" sizes="16x16" href="<?php echo e(asset('favicon.ico')); ?>" />
    <?php endif; ?>
    
    <?php echo $__env->yieldPushContent('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css"
        integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php
        $color = app('Webkul\Category\Repositories\CategoryRepository')->FrontColor();
        $imagefront = app('Webkul\Category\Repositories\CategoryRepository')->FrontImage();
    ?>         
    <script>	
        document.documentElement.style.setProperty('--color-green', '<?php echo e($color->color_hex); ?>');
    </script>
</head>



<body <?php if(core()->getCurrentLocale() && core()->getCurrentLocale()->direction == 'rtl'): ?> class="rtl" <?php endif; ?>>

    <?php echo view_render_event('bagisto.shop.layout.body.before'); ?>


    <div id="app">
        <flash-wrapper ref='flashes'></flash-wrapper>

        <div class="main-container-wrapper">

            <?php echo view_render_event('bagisto.shop.layout.header.before'); ?>


            <?php echo $__env->make('shop::layouts.header.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo view_render_event('bagisto.shop.layout.header.after'); ?>


            <?php echo $__env->yieldContent('slider'); ?>

            <main class="content-container"  <?php if($imagefront->image=='Null'): ?> <?php else: ?> style="scroll-behavior: smooth;background-image: url(<?php echo e($imagefront->image); ?>);" <?php endif; ?>>

                <?php echo view_render_event('bagisto.shop.layout.content.before'); ?>


                <?php echo $__env->yieldContent('content-wrapper'); ?>

                <?php echo view_render_event('bagisto.shop.layout.content.after'); ?>


            </main>

        </div>

        <?php echo view_render_event('bagisto.shop.layout.footer.before'); ?>


        <?php echo $__env->make('shop::layouts.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo view_render_event('bagisto.shop.layout.footer.after'); ?>


        <?php if(core()->getConfigData('general.content.footer.footer_toggle')): ?>
            
        <?php endif; ?>

        <overlay-loader :is-open="show_loader"></overlay-loader>

        <go-top bg-color="#0041ff"></go-top>
    </div>



    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="<?php echo e(asset('magic/assets/plugins/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('magic/assets/plugins/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('magic/assets/plugins/bootstrap4/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('magic/assets/plugins/select2/dist/js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('magic/assets/plugins/owl-carousel/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('magic/assets/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')); ?>"></script>
    <script src="<?php echo e(asset('magic/assets/plugins/lightGallery/dist/js/lightgallery-all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('magic/assets/plugins/slick/slick/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('magic/assets/plugins/noUiSlider/nouislider.min.js')); ?>"></script>
    <!-- custom code-->
    <script src="<?php echo e(asset('magic/assets/js/main.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.19/dist/sweetalert2.min.js"></script>
    <script>
        const txts = document.querySelector(".animate-text").children;
        txtslen = txts.length;
        let index = 0;
        function animateText() {
            for (let i = 0; i < txtslen; i++) {
                txts[i].classList.remove("text-in");
            }
            txts[index].classList.add("text-in");
            if (index == txtslen - 1) {
                index = 0;
            }
            else {
                index++;
            }
            setTimeout(animateText, 3000);
        }
        window.onload = animateText;
    </script>
    <script>


        function setIsLoading(isLoding) {
            if (isLoding) {
                $(':input[type="submit"]').prop('disabled', true);
                $(':button').prop('disabled', true);
                $('body').removeClass('loaded');
            } else {
                $(':input[type="submit"]').prop('disabled', false);
                $(':button').prop('disabled', false);
                $('body').addClass('loaded');
            }
        }
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>

    <script>
        <?php echo core()->getConfigData('general.content.custom_scripts.custom_javascript'); ?>

    </script>


    <script type="text/javascript">
        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        (() => {

            let messageType = '';
            let messageLabel = '';

            <?php if($message = session('success')): ?>
                messageType = 'success';
                messageLabel = "<?php echo e(__('velocity::app.shop.general.alert.success')); ?>";
            <?php elseif($message = session('warning')): ?>
                messageType = 'warning';
                messageLabel = "<?php echo e(__('velocity::app.shop.general.alert.warning')); ?>";
            <?php elseif($message = session('error')): ?>
                messageType = 'error';
                messageLabel = "<?php echo e(__('velocity::app.shop.general.alert.error')); ?>";
            <?php elseif($message = session('info')): ?>
                messageType = 'info';
                messageLabel = "<?php echo e(__('velocity::app.shop.general.alert.info')); ?>";
            <?php endif; ?>

            if (messageType && '<?php echo e($message); ?>' !== '') {
                toastMixin.fire({
                    animation: true,
                    icon: messageType,
                    title: '<?php echo e($message); ?>'
                });

            }

            window.serverErrors = [];
            <?php if(isset($errors)): ?>
                <?php if(count($errors)): ?>
                    window.serverErrors = <?php echo json_encode($errors->getMessages(), 15, 512) ?>;
                <?php endif; ?>
            <?php endif; ?>

            window._translations = <?php echo json_encode(app('Webkul\Velocity\Helpers\Helper')->jsonTranslations(), 15, 512) ?>;
        })();
    </script>

    <script>
        function addToCart(id, type) {

            var data = null;
            if (type == 'simple') {
                data = {
                    "quantity": 1,
                    "product_id": id,
                    "_token": '<?php echo e(csrf_token()); ?>',
                    "is_configurable": "is_configurable"
                };
            } else if (type == 'configurable') {

                if ($("#selected_configurable_option").val()) {
                    data = {
                        "product_id": id,
                        "quantity": 1,
                        "is_configurable": "true",
                        "selected_configurable_option": $("#selected_configurable_option").val(),
                        "_token": '<?php echo e(csrf_token()); ?>',
                        "super_attribute": this.selected_attributes
                    };
                console.log(data);
                } else {
                    toastMixin.fire({
                        animation: true,
                        icon: 'error',
                        title: <?php echo json_encode(trans('shop::app.checkout.cart.quantity.inventory_warning'), 15, 512) ?>
                    });
                }

            }

            if (!data) {
                if (type == 'configurable') {
                    for (let i = 0; i < this.attributes.length; i++) {
                        let element = this.attributes[i];

                        if (!$("input:radio[name='super_attribute_" + element.id + "']").is(':checked')) {
                            toastMixin.fire({
                                animation: true,
                                icon: 'error',
                                title: 'Please Choose a ' + element.label
                            });
                            return;
                        }
                    }
                } else
                    toastMixin.fire({
                        animation: true,
                        icon: 'error',
                        title: 'Something went wrong!'
                    });
            } else {
                $('#overlay').fadeIn();
                $.ajax({
                    type: "POST",
                    url: "<?php echo e(e(url()->to('/')) . '/api/checkout/cart/add/'); ?>" + id,
                    data: data,
                    success: function(result) {
                        $('#overlay').fadeOut();
                        if (result['error']) {
                            toastMixin.fire({
                                animation: true,
                                icon: 'error',
                                title: result['error']['message']
                            });
                            // $('#overlay').fadeOut();
                        } else {
                            buildCart(result['data']);

                            // $('#overlay').fadeOut();
                            toastMixin.fire({
                                animation: true,
                                icon: 'success',
                                title: result['message']
                            });
                        }

                    },
                    headers: {
                        'X-CSRF-Token': '<?php echo e(csrf_token()); ?>',
                    },
                    error: function(result) {
                        toastMixin.fire({
                            animation: true,
                            icon: 'error',
                            title: 'Something went wrong!'
                        });

                        // $('#overlay').fadeOut();
                        console.log(result);
                    },
                    timeout: 20000
                });
            }
        }

        function buildCart(cart) {
            if (cart) {
                $('.cart-count').html(cart['items_count']);
                if ($('.empty-item').length)
                    $('.empty-item').remove();
                for (let i = 0; i < cart['items_count']; i++) {
                    var item = cart['items'][i];

                    if ($('.item_' + item['id']).length) {
                        $('.item_info_' + item['id']).html(`<span class="cart-product-qty">` + item['quantity'] +
                            `</span> × ` + item['formated_price']);
                    } else {
                        var product = null;
                        if (item['child']) {
                            product = item['child']['product'];

                        } else if (item['product']) {
                            product = item['product'];
                        }


                        var cartHTML = `<div class="product item_` + item['id'] + `" id="item_` + item['id'] + `">
                                                <div class="product-cart-details">
                                                    <h4 class="product-title">
                                                        <a href="/` + item['url_key'] + `">
                                                            ` + item['name'] + `</a>
                                                    </h4>
        
                                                    <span class="cart-product-info item_info_` + item['id'] + `">
                                                        <span class="cart-product-qty">` + item['quantity'] + `</span> x
                                                        ` + item['formated_price'] + `
                                                    </span>
                                                </div>
        
                                                <figure class="product-image-container">
                                                    <a href="/` + item['url_key'] + `"
                                                        class="product-image">
                                                        <img src="` + item['product']['base_image'][
                            'original_image_url'
                        ] + `"
                                                            alt="` + item['name'] + `">
                                                    </a>
                                                </figure>
                                                <a href="javascript:;" onclick="removeProduct(` + item['id'] + `);"
                                                    class="btn-remove" title="Remove Product"><i
                                                        class="icon-close"></i></a>
                                            </div>`

                        $('.cart-total-price').html(cart['formated_sub_total'])

                        if ($('.mini_cart_inner').length) {
                            $('.mini_cart_inner').append(cartHTML);
                        } else {

                            var mini_cart_footer = `<div class="dropdown-cart-total">
                                                        <span>Total</span>
                        
                                                        <span class="cart-total-price">` + cart['formated_sub_total'] + `</span>
                                                    </div>
                        
                                                    <div class="dropdown-cart-action">
                                                        <a href="<?php echo e(route('shop.checkout.cart.index')); ?>" class="btn btn-primary">View
                                                            Cart</a>
                                                        <a href="<?php echo e(route('shop.checkout.onepage.index')); ?>"
                                                            class="btn btn-outline-primary-2"><span>Checkout</span><i
                                                                class="icon-long-arrow-right"></i></a>
                                                    </div>`;
                            $('.dropdown-cart-products').append('<div class="mini_cart_inner">' + cartHTML + '</div>' +
                                mini_cart_footer);
                        }

                    }
                }
            } else {
                $('.cart-count').html(0);
                $(".dropdown-cart-products").html(
                    '<div class="cart_item empty-item" id="item_0"><span class="empty-item">Cart is empty</span></div>');
            }
        }

        function removeProduct(id) {

            // $('#overlay').fadeIn();

            $.ajax({
                type: "GET",
                url: "<?php echo e(e(url()->to('/')) . '/api/checkout/cart/remove-item/'); ?>" + id,
                data: {},
                success: function(result) {
                    console.log(result);
                    if (result['data']) {
                        var cart = result['data'];
                        $('.cart-count').html(cart['items_count']);
                        if (cart['items_count']) {

                            if ($('.item_' + id).length > 0) {
                                $(".item_" + id).remove();
                            }

                            $('.cart-total-price').html(cart['formated_sub_total'])
                        }

                    } else {
                        $('.cart-count').html(0);
                        $(".dropdown-cart-total").remove();
                        $(".dropdown-cart-action").remove();

                        $(".dropdown-cart-products").html(
                            '<div class="cart_item empty-item" id="item_0"><span class="empty-item">Cart is empty</span></div>'
                            );
                    }



                    // $('#overlay').fadeOut();
                    toastMixin.fire({
                        animation: true,
                        icon: 'error',
                        title: result['message']
                    });
                },
                headers: {
                    'X-CSRF-Token': '<?php echo e(csrf_token()); ?>',
                },
                error: function(result) {
                    // $('#overlay').fadeOut();
                    // console.log(result);
                    // alert('error');
                }
            });
        }

        $("#btnlogin").click(function(event) {
            var email = $('#si-email').val();
            var password = $('#si-password').val();

            if (email == "" || password == "") {
                document.getElementById("err").style.display = "initial";
                $("#err").append("Email or password fields are empty.");
            } else {
                $("#btnlogin > i").attr('class', 'lds-dual-ring');
                $("#btnlogin").prop('disabled', true);
                $.ajax({
                    type: "Post",
                    url: "<?php echo e(e(url()->to('/')) . '/api/customer/login'); ?>",
                    data: {
                        email: email,
                        password: password
                    },
                    success: function(result) {
                        $("#btnlogin").prop('disabled', false);
                        $("#btnlogin > i").attr('class', 'icon-long-arrow-right');

                        if (result['success'] == true) {
                            window.location.replace(
                                "<?php echo e(e(url()->to('/')) . '/customer/account/profile'); ?>");
                        } else {
                            document.getElementById("err").style.display = "initial";
                            $("#err").html(result['message']);
                        }
                    },
                    headers: {
                        'X-CSRF-Token': '<?php echo e(csrf_token()); ?>',
                    },
                    error: function(result) {
                        $("#btnlogin").prop('disabled', false);
                        $("#btnlogin > i").attr('class', 'icon-long-arrow-right');
                    }
                });
            }
        });

        $("#btnregister").click(function(event) {
            var fn = $('#re-fn').val();
            var ln = $('#re-ln').val();
            var phone = $('#re-phone').val();
            var email = $('#re-email').val();
            var country = $('#re-country').val();
            var password = $('#re-password').val();
            var confpass = $('#re-confpass').val();

            document.getElementById("err1").style.display = "none";
            $('#err1').empty();

            if (fn == "" || ln == "" || phone == "" || email == "" || country == "" || password == "" || confpass ==
                "") {
                document.getElementById("err1").style.display = "initial";
                $("#err1").append('<span style="color:red">Some fields are empty.');
            } else {
                $("#btnregister > i").attr('class', 'lds-dual-ring');
                $("#btnregister").prop('disabled', true);
                $.ajax({
                    type: "Post",
                    url: "<?php echo e(e(url()->to('/')) . '/api/customer/register'); ?>",
                    data: {
                        first_name: fn,
                        last_name: ln,
                        phone: phone,
                        email: email,
                        country_id: country,
                        password: password,
                        password_confirmation: confpass
                    },
                    success: function(result) {
                        console.log(result);
                        $("#btnregister").prop('disabled', false);
                        $("#btnregister > i").attr('class', '"icon-long-arrow-right');
                        $(".error").html('');

                        if (result['success']) {
                            window.location.replace(
                                "<?php echo e(e(url()->to('/')) . '/customer/account/profile'); ?>");
                        } else {
                            if (result['errors']) {
                                Object.keys(result['errors']).forEach(key => {
                                    $('input[name="' + key + '"]').next('span').html(result[
                                        'errors'][key].join('<br>'));
                                });
                            }
                        }
                    },
                    headers: {
                        'X-CSRF-Token': '<?php echo e(csrf_token()); ?>',
                    },
                    error: function(result) {
                        $("#btnregister").prop('disabled', false);
                        $("#btnregister > i").attr('class', '"icon-long-arrow-right');
                    }
                });
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".plus").click(function(event) {
                $("." + event.target.id + "-categories").toggle("1000");
            });

        });
    </script>

    <script>
        jQuery(function($) {
            $('.js-menu__open').on('touchend click', function(event) {
                event.preventDefault();
                var menu = $(this).attr('data-menu');

                $(menu).toggleClass('js-menu__expanded');
                $(menu).parent().toggleClass('js-menu__expanded');

            });

            $('.js-menu__context, .js-menu__close').on('touchend click', function(event) {

                if ($(event.target).hasClass('js-menu__context') || $(event.target).hasClass(
                        'js-menu__close')) {
                    $('.js-menu__expanded').removeClass('js-menu__expanded');
                }
            });

        });
    </script>

</body>

</html>
<?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/resources/themes/magic/views/layouts/master.blade.php ENDPATH**/ ?>