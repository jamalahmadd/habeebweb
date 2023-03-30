<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.sales.invoices.add-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>
    <div class="content full-page">
        <form method="POST" action="<?php echo e(route('admin.sales.invoices.store', $order->id)); ?>" @submit.prevent="onSubmit">
            <?php echo csrf_field(); ?>

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '<?php echo e(url('/admin/dashboard')); ?>';"></i>

                        <?php echo e(__('admin::app.sales.invoices.add-title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.sales.invoices.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="sale-container">

                    <accordian :title="'<?php echo e(__('admin::app.sales.orders.order-and-account')); ?>'" :active="true">
                        <div slot="body">

                            <div class="sale-section">
                                <div class="secton-title">
                                    <span><?php echo e(__('admin::app.sales.orders.order-info')); ?></span>
                                </div>

                                <div class="section-content">
                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.invoices.order-id')); ?>

                                        </span>

                                        <span class="value">
                                            <a href="<?php echo e(route('admin.sales.orders.view', $order->id)); ?>">#<?php echo e($order->increment_id); ?></a>
                                        </span>
                                    </div>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.orders.order-date')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($order->created_at); ?>

                                        </span>
                                    </div>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.orders.order-status')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($order->status_label); ?>

                                        </span>
                                    </div>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.orders.channel')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($order->channel_name); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="sale-section">
                                <div class="secton-title">
                                    <span><?php echo e(__('admin::app.sales.orders.account-info')); ?></span>
                                </div>

                                <div class="section-content">
                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.orders.customer-name')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($order->customer_full_name); ?>

                                        </span>
                                    </div>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.orders.email')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($order->customer_email); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </accordian>

                    <accordian :title="'<?php echo e(__('admin::app.sales.orders.address')); ?>'" :active="true">
                        <div slot="body">

                            <div class="sale-section">
                                <div class="section-content">
									<?php if($order->location): ?>
										Location area: <?php echo e($order->location->area); ?>

										<br>
										Street name: <?php echo e($order->location->street_name); ?>

										<br>
										Building type: <?php echo e($order->location->building_type); ?>

										<br>
										Building name: <?php echo e($order->location->street_name); ?>

										<br>
										Floor number: <?php echo e($order->location->floor_number); ?>

										<br>
										Apartment number: <?php echo e($order->location->apartment_number); ?>

										<br>
										Address number: <?php echo e($order->location->address_name); ?>

										<br>
									<?php else: ?>
										Order Pickup
									<?php endif; ?>
									
                                </div>
                            </div>

                        </div>
                    </accordian>

                    <accordian :title="'<?php echo e(__('admin::app.sales.orders.payment-and-shipping')); ?>'" :active="true">
                        <div slot="body">

                            <div class="sale-section">
                                <div class="secton-title">
                                    <span><?php echo e(__('admin::app.sales.orders.payment-info')); ?></span>
                                </div>

                                <div class="section-content">
                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.orders.payment-method')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e(core()->getConfigData('sales.paymentmethods.' . $order->payment->method . '.title')); ?>

                                        </span>
                                    </div>

                                    <div class="row">
                                        <span class="title">
                                            <?php echo e(__('admin::app.sales.orders.currency')); ?>

                                        </span>

                                        <span class="value">
                                            <?php echo e($order->order_currency_code); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>

                            <?php if($order->shipping_address): ?>
                                <div class="sale-section">
                                    <div class="secton-title">
                                        <span><?php echo e(__('admin::app.sales.orders.shipping-info')); ?></span>
                                    </div>

                                    <div class="section-content">
                                        <div class="row">
                                            <span class="title">
                                                <?php echo e(__('admin::app.sales.orders.shipping-method')); ?>

                                            </span>

                                            <span class="value">
                                                <?php echo e($order->shipping_title); ?>

                                            </span>
                                        </div>

                                        <div class="row">
                                            <span class="title">
                                                <?php echo e(__('admin::app.sales.orders.shipping-price')); ?>

                                            </span>

                                            <span class="value">
                                                <?php echo e(core()->formatBasePrice($order->base_shipping_amount)); ?>

                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </accordian>

                    <accordian :title="'<?php echo e(__('admin::app.sales.orders.products-ordered')); ?>'" :active="true">
                        <div slot="body">

                            <div class="table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('admin::app.sales.orders.SKU')); ?></th>
                                            <th><?php echo e(__('admin::app.sales.orders.product-name')); ?></th>
                                            <th><?php echo e(__('admin::app.sales.invoices.qty-ordered')); ?></th>
                                            <th><?php echo e(__('admin::app.sales.invoices.qty-to-invoice')); ?></th>
                                        </tr>
                                    </thead>

                                    <tbody>
										<?php $product = app('Webkul\Product\Models\Product'); ?>
                                        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item->qty_to_invoice > 0): ?>
                                                <tr>
                                                    <td><?php echo e($item->getTypeInstance()->getOrderedItem($item)->sku); ?></td>
                                                    <td>
														<?php
														$name=$product->where('sku',$item->getTypeInstance()->getOrderedItem($item)->sku)->first()->name;
														?>
                                                        <?php echo e($name); ?>


                                                        <?php if(isset($item->additional['attributes'])): ?>
                                                            <div class="item-options">

                                                                <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <b><?php echo e($attribute['attribute_name']); ?> : </b><?php echo e($attribute['option_label']); ?></br>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($item->qty_ordered); ?></td>
                                                    <td>
                                                        <div class="control-group" :class="[errors.has('invoice[items][<?php echo e($item->id); ?>]') ? 'has-error' : '']">

                                                            <?php
                                                                $rmaStatus = app('\Webkul\RMA\Helpers\Helper')->getRMAStatus($item['id']);
                                                            ?>

                                                            <?php if($rmaStatus): ?>
                                                                <?php echo e(__('rma::app.admin.general.rma_has_been_created')); ?>


                                                                <input
                                                                    value="0"
                                                                    type="hidden"
                                                                    class="control"
                                                                    id="invoice[items][<?php echo e($item->id); ?>]"
                                                                    v-validate="'required|numeric|min:0'"
                                                                    name="invoice[items][<?php echo e($item->id); ?>]"
                                                                    data-vv-as="&quot;<?php echo e(__('admin::app.sales.invoices.qty-to-invoice')); ?>&quot;" />
                                                            <?php else: ?>
                                                                <input
                                                                    type="text"
                                                                    class="control"
                                                                    value="<?php echo e($item->qty_to_invoice); ?>"
                                                                    id="invoice[items][<?php echo e($item->id); ?>]"
                                                                    v-validate="'required|numeric|min:0'"
                                                                    name="invoice[items][<?php echo e($item->id); ?>]"
                                                                    data-vv-as="&quot;<?php echo e(__('admin::app.sales.invoices.qty-to-invoice')); ?>&quot;" />
                                                            <?php endif; ?>

                                                            <span class="control-error" v-if="errors.has('invoice[items][<?php echo e($item->id); ?>]')">
                                                                
                                                                    {{ errors.first('invoice[items][<?php echo $item->id ?>]') }}
                                                                
                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </accordian>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/resources/views/vendor/admin/sales/invoices/create.blade.php ENDPATH**/ ?>