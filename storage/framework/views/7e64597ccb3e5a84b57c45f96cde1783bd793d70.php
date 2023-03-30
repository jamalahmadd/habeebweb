<span id="product-<?php echo e($product->id); ?>-quantity">
    <a id="product-<?php echo e($product->id); ?>-quantity-anchor" href="javascript:void(0);" onclick="showEditQuantityForm('<?php echo e($product->id); ?>')"><?php echo e($totalQuantity); ?></a>
</span>

<span id="edit-product-<?php echo e($product->id); ?>-quantity-form-block" style="display: none;">
    <form id="edit-product-<?php echo e($product->id); ?>-quantity-form" action="javascript:void(0);">
        <?php echo csrf_field(); ?>

        <?php echo method_field('PUT'); ?>

        <?php $__currentLoopData = $inventorySources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventorySource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $qty = 0;

                foreach ($product->inventories as $inventory) {
                    if ($inventory->inventory_source_id == $inventorySource->id) {
                        $qty = $inventory->qty;
                        break;
                    }
                }

                $qty = old('inventories[' . $inventorySource->id . ']') ?: $qty;
            ?>

            <div class="control-group" :class="[errors.has('inventories[<?php echo e($inventorySource->id); ?>]') ? 'has-error' : '']">
                <label><?php echo e($inventorySource->name); ?></label>

                <input
                    type="text"
                    name="inventories[<?php echo e($inventorySource->id); ?>]"
                    class="control" value="<?php echo e($qty); ?>"
                    onkeyup="document.getElementById('inventoryErrors<?php echo e($product->id); ?>').innerHTML = ''" />
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="control-group has-error">
            <span class="control-error" id="inventoryErrors<?php echo e($product->id); ?>"></span>
        </div>

        <button class="btn btn-primary" onclick="saveEditQuantityForm('<?php echo e(route('admin.catalog.products.update-inventories', $product->id)); ?>', '<?php echo e($product->id); ?>')"><?php echo e(__('admin::app.catalog.products.save')); ?></button>

        <button class="btn btn-danger" onclick="cancelEditQuantityForm('<?php echo e($product->id); ?>')"><?php echo e(__('admin::app.catalog.products.cancel')); ?></button>
    </form>
</span>
<?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Webkul/Admin/src/Providers/../Resources/views/catalog/products/datagrid/quantity.blade.php ENDPATH**/ ?>