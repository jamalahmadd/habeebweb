<?php if($order->payment?->method == 'weaccept'): ?>
    <?php if($order->canRefund()): ?>
        <a href="<?php echo e(route('admin.sales.weaccept.refunds.create', $order->id)); ?>" class="btn btn-lg btn-primary">
            <?php echo e(__('weaccept::app.admin.system.weaccept_refund')); ?>

        </a>
        <?php if($order->canShip()): ?>
            <?php $__env->startPush('scripts'); ?>
                    <script>
                    $( ".page-action a:nth-last-child(2)" ).remove();
                    </script>
            <?php $__env->stopPush(); ?>
        <?php else: ?>
            <?php $__env->startPush('scripts'); ?>
                    <script>
                    $( ".page-action a:nth-last-child(1)" ).remove();
                    </script>
            <?php $__env->stopPush(); ?>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Webkul/WeAccept/src/Providers/../Resources/views/admin/sales/orders/view.blade.php ENDPATH**/ ?>