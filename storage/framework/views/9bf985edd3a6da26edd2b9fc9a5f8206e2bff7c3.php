<textarea v-validate="'<?php echo e($validations); ?>'" class="control <?php echo e($attribute->enable_wysiwyg ? 'enable-wysiwyg' : ''); ?>" id="<?php echo e($attribute->code); ?>" name="<?php echo e($attribute->code); ?>" data-vv-as="&quot;<?php echo e($attribute->admin_name); ?>&quot;"><?php echo e(old($attribute->code) ?: $product[$attribute->code]); ?></textarea><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Webkul/Admin/src/Providers/../Resources/views/catalog/products/field-types/textarea.blade.php ENDPATH**/ ?>