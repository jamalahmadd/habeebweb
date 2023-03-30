<?php $__env->startSection('page_title'); ?>
    Shipping methods | Add new
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
<?php $__env->startPush('styles'); ?>
.btn-file{
display: flex !important;
    flex-direction: column !important;
    text-align: initial !important;
    padding-left: 20px !important;
}
.control-group .control {
    height: 52px !important;
}
	@media only screen and (min-width: 770px){
.control-group .control {
    height: 52px !important;
padding:10px !important;
}
}
<?php $__env->stopPush(); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>Add New Method</h1>
            </div>
            <div class="page-action">
            </div>
        </div>
        <div class="page-content">
            <form action="<?php echo e(Route('addnewaction')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
				<div class="control-group"><label for="method" class="required">Method</label> <input type="text"
                        id="method" name="method" value="" class="control" aria-required="true"
                        aria-invalid="false">
                </div>
				<div class="control-group" id="lnkid"><label for="title" class="required">Title</label> <input type="text"
                        id="title" name="title" value="" class="control" aria-required="true"
                        aria-invalid="false">
                </div>
				<div class="control-group" id="lnkid"><label for="method" class="required">Description</label> <textarea
                        id="description" name="description" value="" class="control" aria-required="true"
				aria-invalid="false"></textarea>
                </div>
				<div class="control-group" id="lnkid"><label for="rate" class="required">In Town Rate</label> <input type="text"
                        id="rate" name="rate" value="" class="control" aria-required="true"
                        aria-invalid="false">
                </div>
				<div class="control-group" id="lnkid"><label for="outrate" class="required">Out Town Rate</label> <input type="text"
                        id="outrate" name="outrate" value="" class="control" aria-required="true"
                        aria-invalid="false">
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Save</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Webkul/Admin/src/Providers/../Resources/views/shipping/add.blade.php ENDPATH**/ ?>