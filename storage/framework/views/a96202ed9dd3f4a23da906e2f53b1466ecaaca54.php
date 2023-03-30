<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.sales.orders.view-title', ['order_id' => $order->increment_id])); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>

    <div class="content full-page">

        <div class="page-header">

            <div class="page-title">
                <h1>
                    <?php echo view_render_event('sales.order.title.before', ['order' => $order]); ?>


                    <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '<?php echo e(route('admin.dashboard.index')); ?>';"></i>

                    <?php echo e(__('admin::app.sales.orders.view-title', ['order_id' => $order->increment_id])); ?>


                    <?php echo view_render_event('sales.order.title.after', ['order' => $order]); ?>

                </h1>
            </div>

            <?php if($order->status_mobile != "Canceled"): ?>
                <div class="page-action">
                    <?php echo view_render_event('sales.order.page_action.before', ['order' => $order]); ?>


                    <?php if($order->canCancel()): ?>
                        <a href="<?php echo e(route('admin.sales.orders.cancel', $order->id)); ?>" class="btn btn-lg btn-primary" v-alert:message="'<?php echo e(__('admin::app.sales.orders.cancel-confirm-msg')); ?>'">
                            <?php echo e(__('admin::app.sales.orders.cancel-btn-title')); ?>

                        </a>
                    <?php endif; ?>

                    <?php if($order->canInvoice()): ?>
                        <a href="<?php echo e(route('admin.sales.invoices.create', $order->id)); ?>" class="btn btn-lg btn-primary">
                            <?php echo e(__('admin::app.sales.orders.invoice-btn-title')); ?>

                        </a>
                    <?php endif; ?>
					
                    <?php if($order->canRefund() &&  $order->status_mobile == "ORDER_DELIVERED"): ?>
                        <a href="<?php echo e(route('admin.sales.refunds.create', $order->id)); ?>" class="btn btn-lg btn-primary">
                            <?php echo e(__('admin::app.sales.orders.refund-btn-title')); ?>

                        </a>
                    <?php endif; ?>

                    <?php if($order->canShip()): ?>
                        <a href="<?php echo e(route('admin.sales.shipments.create', $order->id)); ?>" class="btn btn-lg btn-primary">
                            <?php echo e(__('admin::app.sales.orders.shipment-btn-title')); ?>

                        </a>
                    <?php endif; ?>
					 <a href="<?php echo e(route('admin.sales.orders.change.process', $order->id)); ?>" class="btn btn-lg btn-primary">
                            Change Status
                        </a>
                    <?php echo view_render_event('sales.order.page_action.after', ['order' => $order]); ?>

                </div>
            <?php endif; ?>
        </div>

        <div class="page-content">

            <tabs>
                <?php echo view_render_event('sales.order.tabs.before', ['order' => $order]); ?>


                <tab name="<?php echo e(__('admin::app.sales.orders.info')); ?>" :selected="true">
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
                                                <?php echo e(__('admin::app.sales.orders.order-date')); ?>

                                            </span>

                                            <span class="value">
                                                <?php echo e($order->created_at); ?>

                                            </span>
                                        </div>

                                        <?php echo view_render_event('sales.order.created_at.after', ['order' => $order]); ?>


                                        <div class="row">
                                            <span class="title">
                                                <?php echo e(__('admin::app.sales.orders.order-status')); ?>

                                            </span>

                                            <span class="value">
												<?php if($order->status_mobile == 'PROCESSED'): ?> 
                										ORDER PROCESSED
												<?php elseif($order->status_mobile == 'DELIVERING'): ?>
														OUT FOR DELIVERY
												<?php elseif( $order->status_mobile == 'ORDER_DELIVERED'): ?>
													ORDER DELIVERED
												<?php elseif( $order->status_mobile == 'ORDER_DELIVERED_WITH_ITEM_RETURNED'): ?> 																		ORDER DELIVERED [with Item returned]
												<?php elseif($order->status_mobile == 'COLLECTING'): ?>
													UNDER COLLECTION
												<?php elseif($order->status_mobile == 'CANCELED'): ?>
													<?php echo e('ORDER '.str_replace('_',' ',$order->status_mobile)); ?>

												
												<?php else: ?>
													<?php echo e(str_replace('_',' ',$order->status_mobile)); ?>

												<?php endif; ?>
                                            </span>
                                        </div>

                                        <?php echo view_render_event('sales.order.status_label.after', ['order' => $order]); ?>


                                        <div class="row">
                                            <span class="title">
                                                <?php echo e(__('admin::app.sales.orders.channel')); ?>

                                            </span>

                                            <span class="value">
                                                <?php echo e($order->channel_name); ?>

                                            </span>
                                        </div>

                                        <?php echo view_render_event('sales.order.channel_name.after', ['order' => $order]); ?>

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

                                        <?php echo view_render_event('sales.order.customer_full_name.after', ['order' => $order]); ?>


                                        <div class="row">
                                            <span class="title">
                                                <?php echo e(__('admin::app.sales.orders.email')); ?>

                                            </span>

                                            <span class="value">
                                                <?php echo e($order->customer_email); ?>

                                            </span>
                                        </div>

                                        <?php echo view_render_event('sales.order.customer_email.after', ['order' => $order]); ?>


                                        <?php if(! is_null($order->customer) && ! is_null($order->customer->group)): ?>
                                            <div class="row">
                                                <span class="title">
                                                    <?php echo e(__('admin::app.customers.customers.customer_group')); ?>

                                                </span>

                                                <span class="value">
                                                    <?php echo e($order->customer->group->name); ?>

                                                </span>
                                            </div>
                                        <?php endif; ?>

                                        <?php echo view_render_event('sales.order.customer_group.after', ['order' => $order]); ?>

                                    </div>
                                </div>

                            </div>
                        </accordian>

                        <?php if(($order->billing_address || $order->shipping_address) && $order->location): ?>
                            <accordian :title="'<?php echo e(__('admin::app.sales.orders.address')); ?>'" :active="true">
                                <div slot="body">

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

                                    

                                </div>
                            </accordian>
                        <?php endif; ?>

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
                                                <?php echo e(core()->getConfigData('sales.paymentmethods.' . $order->payment?->method . '.title')); ?>

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

                                        <?php 
										if(isset($order->payment?->method) && $order->location){
										try{
										 $additionalDetails = \Webkul\Payment\Payment::getAdditionalDetails($order->payment?->method);
										}
										finally {
											$additionalDetails = [];
										}
										}
										else 
											$additionalDetails = [];
										?>

                                        <?php if(! empty($additionalDetails)): ?>
                                            <div class="row">
                                                <span class="title">
                                                    <?php echo e($additionalDetails['title']); ?>

                                                </span>

                                                <span class="value">
                                                    <?php echo e($additionalDetails['value']); ?>

                                                </span>
                                            </div>
                                        <?php endif; ?>

                                        <?php echo view_render_event('sales.order.payment-method.after', ['order' => $order]); ?>

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
                                                    <?php echo e(__('admin::app.sales.orders.shipping-price')); ?> hh
                                                </span>

                                                <span class="value">
                                                    <?php echo e(core()->formatBasePrice($order->base_shipping_amount)); ?>

                                                </span>
                                            </div>

                                            <?php echo view_render_event('sales.order.shipping-method.after', ['order' => $order]); ?>

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
                                                <th><?php echo e(__('admin::app.sales.orders.price')); ?></th>
                                                <th><?php echo e(__('admin::app.sales.orders.item-status')); ?></th>
                                                <th><?php echo e(__('admin::app.sales.orders.subtotal')); ?></th>
                                                <th><?php echo e(__('admin::app.sales.orders.tax-percent')); ?></th>
                                                <th><?php echo e(__('admin::app.sales.orders.tax-amount')); ?></th>
                                                <?php if($order->base_discount_amount > 0): ?>
                                                    <th><?php echo e(__('admin::app.sales.orders.discount-amount')); ?></th>
                                                <?php endif; ?>
                                                <th><?php echo e(__('admin::app.sales.orders.grand-total')); ?></th>
												<th><?php echo e(__('admin::app.sales.invoices.action')); ?></th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <tr>
                                                    <td>
                                                        <?php echo e($item->getTypeInstance()->getOrderedItem($item)->sku); ?>

                                                    </td>

                                                    <td>
                                                        <?php echo e($item->name); ?>


                                                        <?php if(isset($item->additional['attributes'])): ?>
                                                            <div class="item-options">

                                                                <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <b><?php echo e($attribute['attribute_name']); ?> : </b><?php echo e($attribute['option_label']); ?></br>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                    </td>

                                                    <td><?php echo e(core()->formatBasePrice($item->base_price)); ?></td>

                                                    <td>
                                                        <span class="qty-row">
                                                            <?php echo e($item->qty_ordered ? __('admin::app.sales.orders.item-ordered', ['qty_ordered' => $item->qty_ordered]) : ''); ?>

                                                        </span>

                                                        <span class="qty-row">
                                                            <?php echo e($item->qty_invoiced ? __('admin::app.sales.orders.item-invoice', ['qty_invoiced' => $item->qty_invoiced]) : ''); ?>

                                                        </span>

                                                        <span class="qty-row">
                                                            <?php echo e($item->qty_shipped ? __('admin::app.sales.orders.item-shipped', ['qty_shipped' => $item->qty_shipped]) : ''); ?>

                                                        </span>

                                                        <span class="qty-row">
                                                            <?php echo e($item->qty_refunded ? __('admin::app.sales.orders.item-refunded', ['qty_refunded' => $item->qty_refunded]) : ''); ?>

                                                        </span>

                                                        <span class="qty-row">
                                                            <?php echo e($item->qty_canceled ? __('admin::app.sales.orders.item-canceled', ['qty_canceled' => $item->qty_canceled]) : ''); ?>

                                                        </span>
                                                    </td>

                                                    <td><?php echo e(core()->formatBasePrice($item->base_total)); ?></td>

                                                    <td><?php echo e($item->tax_percent); ?>%</td>

                                                    <td><?php echo e(core()->formatBasePrice($item->base_tax_amount)); ?></td>

                                                    <?php if($order->base_discount_amount > 0): ?>
                                                        <td><?php echo e(core()->formatBasePrice($item->base_discount_amount)); ?></td>
                                                    <?php endif; ?>

                                                    <td><?php echo e(core()->formatBasePrice($item->base_total + $item->base_tax_amount - $item->base_discount_amount)); ?></td>
									 <td>
									<div class="action"><a href="<?php echo e(Route('edititem',$item->id)); ?>" data-method="GET" ><span class="icon pencil-lg-icon"></span></a></div>
									</td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>

                                <div class="summary-comment-container">
                                    <div class="comment-container">
                                        <form action="<?php echo e(route('admin.sales.orders.comment', $order->id)); ?>" method="post" @submit.prevent="onSubmit">
                                            <?php echo csrf_field(); ?>

                                            <div class="control-group" :class="[errors.has('comment') ? 'has-error' : '']">
                                                <label for="comment" class="required"><?php echo e(__('admin::app.sales.orders.comment')); ?></label>
                                                <textarea v-validate="'required'" class="control" id="comment" name="comment" data-vv-as="&quot;<?php echo e(__('admin::app.sales.orders.comment')); ?>&quot;"></textarea>
                                                <span class="control-error" v-if="errors.has('comment')">{{ errors.first('comment') }}</span>
                                            </div>

                                            <div class="control-group">
                                                <span class="checkbox">
                                                    <input type="checkbox" name="customer_notified" id="customer-notified" name="checkbox[]">
                                                    <label class="checkbox-view" for="customer-notified"></label>
                                                    <?php echo e(__('admin::app.sales.orders.notify-customer')); ?>

                                                </span>
                                            </div>

                                            <button type="submit" class="btn btn-lg btn-primary">
                                                <?php echo e(__('admin::app.sales.orders.submit-comment')); ?>

                                            </button>
                                        </form>

                                        <ul class="comment-list">
                                            <?php $__currentLoopData = $order->comments()->orderBy('id', 'desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <span class="comment-info">
                                                        <?php if($comment->customer_notified): ?>
                                                            <?php echo __('admin::app.sales.orders.customer-notified', ['date' => $comment->created_at]); ?>

                                                        <?php else: ?>
                                                            <?php echo __('admin::app.sales.orders.customer-not-notified', ['date' => $comment->created_at]); ?>

                                                        <?php endif; ?>
                                                    </span>

                                                    <p><?php echo e($comment->comment); ?></p>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>

                                    <table class="sale-summary">
                                        <tr>
                                            <td><?php echo e(__('admin::app.sales.orders.subtotal')); ?></td>
                                            <td>-</td>
                                            <td><?php echo e(core()->formatBasePrice($order->base_sub_total)); ?></td>
                                        </tr>

                                        <?php if($order->haveStockableItems()): ?>
                                            <tr>
                                                <td><?php echo e(__('admin::app.sales.orders.shipping-handling')); ?></td>
                                                <td>-</td>
                                                <td><?php echo e(core()->formatBasePrice($order->base_shipping_amount)); ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if($order->base_discount_amount > 0): ?>
                                            <tr>
                                                <td>
                                                    <?php echo e(__('admin::app.sales.orders.discount')); ?>


                                                    <?php if($order->coupon_code): ?>
                                                        (<?php echo e($order->coupon_code); ?>)
                                                    <?php endif; ?>
                                                </td>
                                                <td>-</td>
                                                <td><?php echo e(core()->formatBasePrice($order->base_discount_amount)); ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <tr class="border">
                                            <td><?php echo e(__('admin::app.sales.orders.tax')); ?></td>
                                            <td>-</td>
                                            <td><?php echo e(core()->formatBasePrice($order->base_tax_amount)); ?></td>
                                        </tr>

                                        <tr class="bold">
                                            <td><?php echo e(__('admin::app.sales.orders.grand-total')); ?></td>
                                            <td>-</td>
                                            <td><?php echo e(core()->formatBasePrice($order->base_grand_total)); ?></td>
                                        </tr>

                                        <tr class="bold">
                                            <td><?php echo e(__('admin::app.sales.orders.total-paid')); ?></td>
                                            <td>-</td>
                                            <td><?php echo e(core()->formatBasePrice($order->base_grand_total_invoiced)); ?></td>
                                        </tr>

                                        <tr class="bold">
                                            <td><?php echo e(__('admin::app.sales.orders.total-refunded')); ?></td>
                                            <td>-</td>
                                            <td><?php echo e(core()->formatBasePrice($order->base_grand_total_refunded)); ?></td>
                                        </tr>

                                        <tr class="bold">
                                            <td><?php echo e(__('admin::app.sales.orders.total-due')); ?></td>
                                            <td>-</td>
                                            <td><?php echo e(core()->formatBasePrice($order->base_total_due)); ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </accordian>

                    </div>
                </tab>

                <tab name="<?php echo e(__('admin::app.sales.orders.invoices')); ?>">

                    <div class="table" style="padding: 20px 0">
                        <table>
                            <thead>
                                <tr>
                                    <th><?php echo e(__('admin::app.sales.invoices.id')); ?></th>
                                    <th><?php echo e(__('admin::app.sales.invoices.date')); ?></th>
                                    <th><?php echo e(__('admin::app.sales.invoices.order-id')); ?></th>
                                    <th><?php echo e(__('admin::app.sales.invoices.customer-name')); ?></th>
                                    <th><?php echo e(__('admin::app.sales.invoices.status')); ?></th>
                                    <th><?php echo e(__('admin::app.sales.invoices.amount')); ?></th>
                                    <th><?php echo e(__('admin::app.sales.invoices.action')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $order->invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>#<?php echo e($invoice->id); ?></td>
                                        <td><?php echo e($invoice->created_at); ?></td>
                                        <td>#<?php echo e($invoice->order->increment_id); ?></td>
                                        <td></td>
                                        <td><?php echo e($invoice->status_label); ?></td>
                                        <td><?php echo e(core()->formatBasePrice($invoice->base_grand_total)); ?></td>
                                        <td class="action">
                                            <a href="<?php echo e(route('admin.sales.invoices.view', $invoice->id)); ?>">
                                                <i class="icon eye-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if(! $order->invoices->count()): ?>
                                    <tr>
                                        <td class="empty" colspan="7"><?php echo e(__('admin::app.common.no-result-found')); ?></td>
                                    <tr>
                                <?php endif; ?>
                        </table>
                    </div>

                </tab>

                <tab name="<?php echo e(__('admin::app.sales.orders.shipments')); ?>">

                    <div class="table" style="padding: 20px 0">
                        <table>
                            <thead>
                                <tr>
                                    <th><?php echo e(__('admin::app.sales.shipments.id')); ?></th>
                                    <th><?php echo e(__('admin::app.sales.shipments.date')); ?></th>
                                    <th><?php echo e(__('admin::app.sales.shipments.carrier-title')); ?></th>
                                    <th><?php echo e(__('admin::app.sales.shipments.tracking-number')); ?></th>
                                    <th><?php echo e(__('admin::app.sales.shipments.total-qty')); ?></th>
                                    <th><?php echo e(__('admin::app.sales.shipments.action')); ?></th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php $__currentLoopData = $order->shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>#<?php echo e($shipment->id); ?></td>
                                        <td><?php echo e($shipment->created_at); ?></td>
                                        <td><?php echo e($shipment->carrier_title); ?></td>
                                        <td><?php echo e($shipment->track_number); ?></td>
                                        <td><?php echo e($shipment->total_qty); ?></td>
                                        <td class="action">
                                            <a href="<?php echo e(route('admin.sales.shipments.view', $shipment->id)); ?>">
                                                <i class="icon eye-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if(! $order->shipments->count()): ?>
                                    <tr>
                                        <td class="empty" colspan="7"><?php echo e(__('admin::app.common.no-result-found')); ?></td>
                                    <tr>
                                <?php endif; ?>
                        </table>
                    </div>

                </tab>

                <tab name="<?php echo e(__('admin::app.sales.orders.refunds')); ?>">

                    <div class="table" style="padding: 20px 0">
                        <table>
                            <thead>
                                <tr>
                                    <th><?php echo e(__('admin::app.sales.refunds.id')); ?></th>
                                    <th><?php echo e(__('admin::app.sales.refunds.date')); ?></th>
                                    <th><?php echo e(__('admin::app.sales.refunds.order-id')); ?></th>
                                    <th><?php echo e(__('admin::app.sales.refunds.customer-name')); ?></th>
                                    <th><?php echo e(__('admin::app.sales.refunds.status')); ?></th>
                                    <th><?php echo e(__('admin::app.sales.refunds.refunded')); ?></th>
                                    <th><?php echo e(__('admin::app.sales.refunds.action')); ?></th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php $__currentLoopData = $order->refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>#<?php echo e($refund->id); ?></td>
                                        <td><?php echo e($refund->created_at); ?></td>
                                        <td>#<?php echo e($refund->order->increment_id); ?></td>
                                        <td><?php echo e($refund->order->customer_full_name); ?></td>
                                        <td><?php echo e(__('admin::app.sales.refunds.refunded')); ?></td>
                                        <td><?php echo e(core()->formatBasePrice($refund->base_grand_total)); ?></td>
                                        <td class="action">
                                            <a href="<?php echo e(route('admin.sales.refunds.view', $refund->id)); ?>">
                                                <i class="icon eye-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if(! $order->refunds->count()): ?>
                                    <tr>
                                        <td class="empty" colspan="7"><?php echo e(__('admin::app.common.no-result-found')); ?></td>
                                    <tr>
                                <?php endif; ?>
                        </table>
                    </div>

                </tab>

                <?php echo view_render_event('sales.order.tabs.after', ['order' => $order]); ?>

            </tabs>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/resources/views/vendor/admin/sales/orders/view.blade.php ENDPATH**/ ?>