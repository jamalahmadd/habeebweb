<ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
    <li class="nav-item mb-4" role="presentation">
        <a class="nav-link" href="<?php echo e(route('customer.profile.index')); ?>">
            <i class="flaticon-user"></i>
            <?php echo e(__('shop::app.header.profile')); ?>

        </a>
    </li>
    <li class="nav-item mb-4" role="presentation">
        <a class="nav-link" href="<?php echo e(route('customer.address.index')); ?>">
            <i class="flaticon-user"></i>
            <?php echo e(__('velocity::app.shop.general.addresses')); ?>

        </a>
    </li>
    <li class="nav-item mb-4" role="presentation">
        <a class="nav-link" href="<?php echo e(route('customer.orders.index')); ?>">
            <i class="flaticon-shopping-bag"></i>
            <?php echo e(__('velocity::app.shop.general.orders')); ?>

        </a>
    </li>
    <li class="nav-item mb-4" role="presentation">
        <a class="nav-link" href="<?php echo e(route('customer.wishlist.index')); ?>">
            <i class="flaticon-settings"></i>
            Wishlist
        </a>
    </li>
    <li class="nav-item mb-4" role="presentation">
        <a class="nav-link" href="<?php echo e(route('customer.session.logout')); ?>">
            <i class="flaticon-logout"></i>
            <?php echo e(__('shop::app.header.logout')); ?>

        </a>
    </li>
</ul>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $(".icon.icon-arrow-down.right").on('click', function(e) {
                var currentElement = $(e.currentTarget);
                if (currentElement.hasClass('icon-arrow-down')) {
                    $(this).parents('.menu-block').find('.menubar').show();
                    currentElement.removeClass('icon-arrow-down');
                    currentElement.addClass('icon-arrow-up');
                } else {
                    $(this).parents('.menu-block').find('.menubar').hide();
                    currentElement.removeClass('icon-arrow-up');
                    currentElement.addClass('icon-arrow-down');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/resources/themes/magic/views/customers/account/partials/sidemenu.blade.php ENDPATH**/ ?>