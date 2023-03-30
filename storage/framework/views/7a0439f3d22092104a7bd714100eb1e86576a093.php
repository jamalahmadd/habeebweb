<?php $__env->startComponent('shop::emails.layouts.master'); ?>
    <div style="text-align: center;">
        <a href="<?php echo e(config('app.url')); ?>">
            <?php echo $__env->make('shop::emails.layouts.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </a>
    </div>

    <?php $order = $invoice->order; ?>

    <div style="padding: 30px;">
        <div style="font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 34px;">
            <span style="font-weight: bold;">
                <?php echo e(__('shop::app.mail.invoice.heading', ['order_id' => $order->increment_id, 'invoice_id' => $invoice->increment_id ?? $invoice->id])); ?>

            </span> <br>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                <?php echo e(__('shop::app.mail.order.dear', ['customer_name' => $order->customer_full_name])); ?>,
            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                <?php echo __('shop::app.mail.order.greeting', [
                    'order_id' => '<a href="' . route('customer.orders.view', $order->id) . '" style="color: #0041FF; font-weight: bold;">#' . $order->increment_id . '</a>',
                    'created_at' => $order->created_at
                    ]); ?>

            </p>
        </div>

        <div style="font-weight: bold;font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 20px !important;">
            <?php echo e(__('shop::app.mail.invoice.summary')); ?>

        </div>

        <div
            style="display: flex;flex-direction: row;margin-top: 20px;justify-content: space-between;margin-bottom: 40px;">
            <?php if($order->shipping_address): ?>
                <div style="line-height: 25px;">
                    <div style="font-weight: bold;font-size: 16px;color: #242424;">
                        <?php echo e(__('shop::app.mail.order.shipping-address')); ?>

                    </div>

                    <div>
                        <?php echo e($order->shipping_address->company_name ?? ''); ?>

                    </div>

                    <div>
                        <?php echo e($order->shipping_address->name); ?>

                    </div>

                    <div>
                        <?php echo e($order->shipping_address->address1); ?>

                    </div>

                    <div>
                        <?php echo e($order->shipping_address->postcode . " " . $order->shipping_address->city); ?>

                    </div>

                    <div>
                        <?php echo e($order->shipping_address->state); ?>

                    </div>

                    <div>
                        <?php echo e(core()->country_name($order->shipping_address->country)); ?>

                    </div>

                    <div>---</div>

                    <div style="margin-bottom: 40px;">
                        <?php echo e(__('shop::app.mail.order.contact')); ?> : <?php echo e($order->shipping_address->phone); ?>

                    </div>

                    <div style="font-size: 16px;color: #242424;">
                        <?php echo e(__('shop::app.mail.order.shipping')); ?>

                    </div>

                    <div style="font-weight: bold;font-size: 16px;color: #242424;">
                        <?php echo e($order->shipping_title); ?>

                    </div>
                </div>
            <?php endif; ?>

            <?php if($order->billing_address): ?>
                <div style="line-height: 25px;">
                    <div style="font-weight: bold;font-size: 16px;color: #242424;">
                        <?php echo e(__('shop::app.mail.order.billing-address')); ?>

                    </div>

                    <div>
                        <?php echo e($order->billing_address->company_name ?? ''); ?>

                    </div>

                    <div>
                        <?php echo e($order->billing_address->name); ?>

                    </div>

                    <div>
                        <?php echo e($order->billing_address->address1); ?>

                    </div>

                    <div>
                        <?php echo e($order->billing_address->postcode . " " . $order->billing_address->city); ?>

                    </div>

                    <div>
                        <?php echo e($order->billing_address->state); ?>

                    </div>

                    <div>
                        <?php echo e(core()->country_name($order->billing_address->country)); ?>

                    </div>

                    <div>---</div>

                    <div style="margin-bottom: 40px;">
                        <?php echo e(__('shop::app.mail.order.contact')); ?> : <?php echo e($order->billing_address->phone); ?>

                    </div>

                    <div style="font-size: 16px; color: #242424;">
                        <?php echo e(__('shop::app.mail.order.payment')); ?>

                    </div>

                    <div style="font-weight: bold;font-size: 16px; color: #242424;">
                        <?php echo e(core()->getConfigData('sales.paymentmethods.' . $order->payment->method . '.title')); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="section-content">
            <div class="table mb-20">
                <table style="overflow-x: auto; border-collapse: collapse;
                border-spacing: 0;width: 100%">
                    <thead>
                    <tr style="background-color: #f2f2f2">
                        <th style="text-align: left;padding: 8px"><?php echo e(__('shop::app.customer.account.order.view.product-name')); ?></th>
                        <th style="text-align: left;padding: 8px"><?php echo e(__('shop::app.customer.account.order.view.price')); ?></th>
                        <th style="text-align: left;padding: 8px"><?php echo e(__('shop::app.customer.account.order.view.qty')); ?></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td data-value="<?php echo e(__('shop::app.customer.account.order.view.product-name')); ?>"
                                style="text-align: left;padding: 8px">
                                <?php echo e($item->name); ?>


                                <?php if(isset($item->additional['attributes'])): ?>
                                    <div class="item-options">

                                        <?php $__currentLoopData = $item->additional['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <b><?php echo e($attribute['attribute_name']); ?>

                                                : </b><?php echo e($attribute['option_label']); ?></br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                <?php endif; ?>
                            </td>

                            <td data-value="<?php echo e(__('shop::app.customer.account.order.view.price')); ?>"
                                style="text-align: left;padding: 8px"><?php echo e(core()->formatPrice($item->price, $order->order_currency_code)); ?>

                            </td>

                            <td data-value="<?php echo e(__('shop::app.customer.account.order.view.qty')); ?>"
                                style="text-align: left;padding: 8px"><?php echo e($item->qty); ?></td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div style="font-size: 16px;color: #242424;line-height: 30px;float: right;width: 40%;margin-top: 20px;">
            <div>
                <span><?php echo e(__('shop::app.mail.order.subtotal')); ?></span>
                <span style="float: right;">
                    <?php echo e(core()->formatPrice($invoice->sub_total, $invoice->order_currency_code)); ?>

                </span>
            </div>

            <?php if($order->shipping_address): ?>
                <div>
                    <span><?php echo e(__('shop::app.mail.order.shipping-handling')); ?></span>
                    <span style="float: right;">
                        <?php echo e(core()->formatPrice($invoice->shipping_amount, $invoice->order_currency_code)); ?>

                    </span>
                </div>
            <?php endif; ?>

            <div>
                <span><?php echo e(__('shop::app.mail.order.tax')); ?></span>
                <span id="taxamount" style="float: right;">
                    <?php echo e(core()->formatPrice($invoice->tax_amount, $order->order_currency_code)); ?>

                </span>
            </div>

            <?php if($invoice->discount_amount > 0): ?>
                <div>
                    <span><?php echo e(__('shop::app.mail.order.discount')); ?></span>
                    <span style="float: right;">
                        <?php echo e(core()->formatPrice($invoice->discount_amount, $invoice->order_currency_code)); ?>

                    </span>
                </div>
            <?php endif; ?>

            <div style="font-weight: bold">
                <span><?php echo e(__('shop::app.mail.order.grand-total')); ?></span>
                <span style="float: right;">
                    <?php echo e(core()->formatPrice($invoice->grand_total, $invoice->order_currency_code)); ?>

                </span>
            </div>
        </div>

        <div
            style="margin-top: 65px;font-size: 16px;color: #5E5E5E;line-height: 24px;display: inline-block;width: 100%">
            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                <?php echo __('shop::app.mail.order.help', [
                        'support_email' => '<a style="color:#0041FF" href="mailto:' . config('mail.from.address') . '">' . config('mail.from.address'). '</a>'
                        ]); ?>

            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                <?php echo e(__('shop::app.mail.order.thanks')); ?>

            </p>
        </div>
    </div>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Webkul/Shop/src/Providers/../Resources/views/emails/sales/new-invoice.blade.php ENDPATH**/ ?>