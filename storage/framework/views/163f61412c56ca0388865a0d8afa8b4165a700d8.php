<?php if($logo = core()->getCurrentChannel()->logo_url): ?>
    <img src="<?php echo e($logo); ?>" alt="<?php echo e(config('app.name')); ?>" style="height: 40px; width: 110px;"/>
<?php else: ?>
    <img src="<?php echo e(asset('themes/default/assets/images/logo.svg')); ?>" alt="<?php echo e(config('app.name')); ?>"/>
<?php endif; ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Webkul/Shop/src/Providers/../Resources/views/emails/layouts/logo.blade.php ENDPATH**/ ?>