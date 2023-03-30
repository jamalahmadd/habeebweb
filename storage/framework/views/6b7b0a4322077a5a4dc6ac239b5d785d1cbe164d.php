<?php $__env->startSection('page_title'); ?>
    Orders
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>Change Status</h1>
            </div>
            <div class="page-action">
				<div class="export-import">

					<a href="javascript:history.back(1)" class="btn btn-lg btn-primary">
                    Back
                </a></div>
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
							<?php
					$InventorySource = app('\Webkul\Inventory\Repositories\InventorySourceRepository');
    				$locale = core()->getRequestedLocaleCode();
					$inventories=$InventorySource->all();
					?>
						<?php $boys = app('Webkul\User\Models\Admin'); ?>
                    <div class="table-responsive">
                        <form action="<?php echo e(Route('admin.sales.orders.inventory.action',Request()->id)); ?>" method="POST">
							<?php echo csrf_field(); ?>
						<div class="control-group multi-select"><label for="channels" class="required">Inventory</label> 
							<select name="inventory" id="inventory" aria-required="true" aria-invalid="false" class="control" required>
								<option value="" disabled selected>--Choose Inventory--</option>
								<!--<?php if($order->status_mobile!='PENDING_COLLECTION'): ?>
								<option value="PROCESSED">Processed</option>
								<?php endif; ?>-->
								<?php $__currentLoopData = $inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($inventory->id); ?>" <?php if($inventory->id==$order->inventory_id) echo 'selected'?>><?php echo e($inventory->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select></div>
							<br>
							<div style="display:none" class="control-group multi-select" id="collection_id"><label for="channels" class="required">Colection boy</label> 
							<select name="collection_id"  aria-required="true" aria-invalid="false" class="control">
								<option value="" disabled selected>--Choose collection boy--</option>
								<?php $__currentLoopData = $boys->where('role_id',3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $boy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($boy->id); ?>"><?php echo e($boy->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select></div>
							<br>
							<div class="control-group multi-select" id="delivery_id"  style="display:none" ><label for="channels" class="required">Delivery boy</label> 
							<select name="delivery_id"aria-required="true" aria-invalid="false" class="control">
								<option value="" disabled selected>--Choose collection boy--</option>
								<?php $__currentLoopData = $boys->where('role_id',2)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $boy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($boy->id); ?>"><?php echo e($boy->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select></div>
							<script>
								function showboy()
								{
									var status=document.getElementById('status').value;
									if(status=='COLLECTING') { document.getElementById('collection_id').style.display='block'; document.getElementById('delivery_id').style.display='none'; }
									else if(status=='PROCESSED') { document.getElementById('delivery_id').style.display='block'; document.getElementById('collection_id').style.display='none';	}
									else {
									document.getElementById('collection_id').style.display='none';	
										document.getElementById('delivery_id').style.display='none';
									}
								}
							</script>
							<br>
							<div align="center"><button type="submit" class="btn btn-lg btn-primary">Update</button>
							</div>
						</form>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Webkul/Admin/src/Providers/../Resources/views/sales/orders/inventory.blade.php ENDPATH**/ ?>