<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('mediamanager::app.admin.menu.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
    <!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/mediamanager/css/elfinder.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/mediamanager/css/theme.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/mediamanager/custom/style.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content" style="height: 100%;">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('mediamanager::app.admin.menu.heading')); ?></h1>
            </div>
        </div>

        <div class="page-content">
            <div id="elfinder"></div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script src="<?php echo e(asset('vendor/mediamanager/js/elfinder.min.js')); ?>"></script>

    <!-- elFinder initialization (REQUIRED) -->
    <script type="text/javascript" charset="utf-8">
        $().ready(function() {

            $('#elfinder').elfinder({
                customData: { 
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                baseUrl: '/vendor/mediamanager/',
                url : '<?php echo e(route("elfinder.connector")); ?>',
                soundPath: '<?php echo e(asset('vendor/mediamanager/sounds')); ?>',
                resizable: false,
                height: '770px',
                defaultView: 'icons',
                bootCallback : function(fm) {
                    fm.bind('init', function() {
                        fm._commands.quicklook.getstate = function() {
                            return -1;
                        }
                    });
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('mediamanager::admin.mediamanager.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Ridhima/MediaManager/src/Providers/../Resources/views/admin/mediamanager/index.blade.php ENDPATH**/ ?>