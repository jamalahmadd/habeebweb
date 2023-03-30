<?php $__env->startSection('page_title'); ?>
    Shipping Methods
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>

    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>Shipping Methods</h1>
            </div>
            <div class="page-action">
                <div class="export-import"><i class="export-icon"></i> <span>
                        Export
                    </span></div>
            </div>
        </div>
        <div class="page-content">
            <div class="table">
                <div class="grid-container">
                    <div class="grid-top">
                        <div class="datagrid-filters">
                            <div class="filter-left">
                                <div>
                                </div>
                            </div>
                        </div>
                        <div align="right">
                            <a href="<?php echo e(Route('addnewship')); ?>" class="btn btn-lg btn-primary">Add new</a>
                        </div>
                    <div class="table-responsive">
                        <table class="table">
                            <!---->
                            <thead>
                                <tr style="height: 65px;">
                                    <!---->
                                    <th class="grid_head sortable">ID</th>
                                    <th class="grid_head sortable">Title</th>
                                    <th class="grid_head sortable">In Town Rate</th>
                                    <th class="grid_head sortable">Out Town Rate</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td data-value="ID"><?php echo e($method->id); ?></td>
                                    <td data-value="Sub Total"><?php echo e($method->title); ?></td>
									<td data-value="Sub Total"><?php echo e($method->rate); ?></td>
									<td data-value="Sub Total"><?php echo e($method->outrate); ?></td>
                                    <td data-value="Actions" class="actions" style="white-space: nowrap; width: 100px;">
                                        <div class="action"><a href="<?php echo e(Route('editshippage',$method->id)); ?>"><span class="icon pencil-lg-icon"></span></a></div>
                                        <div class="action"><a href="<?php echo e(Route('deleteship',$method->id)); ?>"><span class="icon trash-icon"></span></a></div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Webkul/Admin/src/Providers/../Resources/views/shipping/index.blade.php ENDPATH**/ ?>