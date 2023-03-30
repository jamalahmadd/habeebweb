<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.catalog.families.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('admin::app.catalog.families.title')); ?></h1>
            </div>

            <div class="page-action">
                <a href="<?php echo e(route('admin.catalog.families.create')); ?>" class="btn btn-lg btn-primary">
                    <?php echo e(__('admin::app.catalog.families.add-family-btn-title')); ?>

                </a>
            </div>
        </div>

        <?php echo view_render_event('bagisto.admin.catalog.families.list.before'); ?>


        <div class="page-content">
            <datagrid-plus src="<?php echo e(route('admin.catalog.families.index')); ?>"></datagrid-plus>
        </div>

        <?php echo view_render_event('bagisto.admin.catalog.families.list.after'); ?>


    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Webkul/Admin/src/Providers/../Resources/views/catalog/families/index.blade.php ENDPATH**/ ?>