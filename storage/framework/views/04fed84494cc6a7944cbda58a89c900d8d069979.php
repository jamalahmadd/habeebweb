<?php if($product[$attribute->code]): ?>
    <a href="<?php echo e(route('admin.catalog.products.file.download', [$product->product_id, $attribute->id] )); ?>" target="_blank">
        <i class="icon sort-down-icon download"></i>
    </a>
<?php endif; ?>

<input type="file" v-validate="'<?php echo e($validations); ?>'" class="control" id="<?php echo e($attribute->code); ?>" name="<?php echo e($attribute->code); ?>" value="<?php echo e(old($attribute->code) ?: $product[$attribute->code]); ?>" data-vv-as="&quot;<?php echo e($attribute->admin_name); ?>&quot;" style="padding-top: 5px;"/>

<?php if($product[$attribute->code]): ?>
    <div class="control-group" style="margin-top: 5px;">
        <span class="checkbox">
            <input type="checkbox" id="<?php echo e($attribute->code); ?>[delete]"  name="<?php echo e($attribute->code); ?>[delete]" value="1">

            <label class="checkbox-view" for="delete"></label>
                <?php echo e(__('admin::app.configuration.delete')); ?>

        </span>
    </div>
<?php endif; ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Webkul/Admin/src/Providers/../Resources/views/catalog/products/field-types/file.blade.php ENDPATH**/ ?>