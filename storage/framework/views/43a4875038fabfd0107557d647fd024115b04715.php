<?php $__env->startSection('page_title'); ?>
    <?php echo e($page->page_title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('seo'); ?>
    <meta name="title" content="<?php echo e($page->meta_title); ?>" />

    <meta name="description" content="<?php echo e($page->meta_description); ?>" />

    <meta name="keywords" content="<?php echo e($page->meta_keywords); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <?php echo DbView::make($page)->field('html_content')->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/resources/themes/magic/views/cms/page.blade.php ENDPATH**/ ?>