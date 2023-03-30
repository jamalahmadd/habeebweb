<?php
$currentCustomer = auth()
    ->guard('customer')
    ->user();
?>



<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.address.create.page-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
		.profile-form-wrapper{
		margin-bottom:40px !important;
	}
    .small,
    small {
        font-size: .875em;
    }

    .nav-link {
        cursor: pointer;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link {
        color: #000 !important;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('account-content'); ?>

<div class="ps-lost-password">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Create Address</li>
        </ul>

        <div class="dashbord-wrapper mt-120">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="dashbord-switcher">
                            <?php echo $__env->make('shop::customers.account.partials.sidemenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        
                        <div class="profile-form-wrapper">
                            <h5><?php echo e(__('shop::app.customer.account.address.create.title')); ?></h5>
                            <?php echo view_render_event('bagisto.shop.customers.account.address.create.before'); ?>

                            <form method="POST" action="<?php echo e(route('customer.location.create')); ?>" id="profile"
                                class="mt-4 mb-4">
                                <?php echo csrf_field(); ?>
                                <?php echo view_render_event('bagisto.shop.customers.account.address.create_form_controls.before'); ?>

								<div class="row">
									<div class="col-lg-12">
										<div class="eg-input-group">
											<label
												   for="area">Area*</label>
											<input type="text"  name="area" placeholder="Tagammoa 5 - South Investors">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="eg-input-group">
											<label
												   for="area">Building Type*</label>
											<input type="text"  name="building_type" placeholder="Apartment">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="eg-input-group">
											<label
												   for="area">Street Name*</label>
											<input type="text"  name="street_name" placeholder="Street name example">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="eg-input-group">
											<label
												   for="area">Building Name*</label>
											<input type="text"  name="building_name" placeholder="Building name example">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="eg-input-group">
											<label
												   for="area">Floor Number*</label>
											<input type="text"  name="floor_number" placeholder="00">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="eg-input-group">
											<label
												   for="area">Apartment Number*</label>
											<input type="text"  name="apartment_number" placeholder="00">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="eg-input-group">
											<label
												   for="area">Landmark, group number, etc*</label>
											<input type="text"  name="landmark" placeholder="Landmark/group number">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="eg-input-group">
											<label
												   for="area">Address name*</label>
											<input type="text"  name="address_name" placeholder="Home address">
											<script>
												navigator.geolocation.getCurrentPosition(
													// Success function
													showPosition, 
													// Error function
													null, 
													// Options. See MDN for details.
													{
														enableHighAccuracy: true,
														timeout: 5000,
														maximumAge: 0
													});
												function showPosition(position) {
													document.getElementById('lat').value=position.coords.latitude;
													document.getElementById('long').value=position.coords.longitude;
												}
											</script>
											<input type="hidden"  name="long" id="long">
											<input type="hidden"  name="lat" id="lat">
										</div>
									</div>
								</div>
								<div class="row justify-content-center" align="center" style="align-items: center;">
									<div class="col-lg-6 justify-content-center" align="center">
										<div class="eg-input-group justify-content-center" align="center">
											<input type="submit" id="submite-btn" value="Save address">
										</div>
									</div>
								</div>
                                <!--<div class="row">
                                    <div class="col-lg-6">
                                        <div class="eg-input-group">
                                            <label
                                                for="fname"><?php echo e(__('shop::app.customer.account.address.create.first_name')); ?>*</label>
                                            <input type="text" value="<?php echo e(Auth::guard('customer')->user()->first_name); ?>" name="first_name"
                                                placeholder="Your First Name">
                                            <?php if(isset($messages['first_name']) && count($messages['first_name'])): ?>
                                                <?php $__currentLoopData = $messages['first_name']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="control-error lh-20 <?php echo e($loop->first ? 'pt-1' : ''); ?>">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php echo view_render_event('bagisto.shop.customers.account.address.create_form_controls.first_name.after'); ?>

                                    <div class="col-lg-6">
                                        <div class="eg-input-group">
                                            <label
                                                for="lname"><?php echo e(__('shop::app.customer.account.address.create.last_name')); ?>*</label>
                                            <input type="text" value="<?php echo e(old('last_name')); ?>" name="last_name"
                                                placeholder="Your Last Name">
                                            <?php if(isset($messages['last_name']) && count($messages['last_name'])): ?>
                                                <?php $__currentLoopData = $messages['last_name']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="control-error lh-20 <?php echo e($loop->first ? 'pt-1' : ''); ?>">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php echo view_render_event('bagisto.shop.customers.account.address.create_form_controls.last_name.after'); ?>

                                    <div class="col-lg-12">
                                        <div class="eg-input-group">
                                            <label
                                                for="text"><?php echo e(__('shop::app.customer.account.address.create.street-address')); ?>

                                                *</label>
                                            <input type="text"
                                                value="<?php echo e(isset($addresses[0]) ? $addresses[0] : ''); ?>" id="address_0"
                                                name="address1[]" placeholder="Your Address" required>
                                            <?php if(isset($messages['address1']) && count($messages['address1'])): ?>
                                                <?php $__currentLoopData = $messages['address1']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="control-error lh-20 <?php echo e($loop->first ? 'pt-1' : ''); ?>">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <?php if(core()->getConfigData('customer.settings.address.street_lines') &&
                                            core()->getConfigData('customer.settings.address.street_lines') > 1): ?>
                                            <?php for($i = 1; $i < core()->getConfigData('customer.settings.address.street_lines'); $i++): ?>
                                                <div class="control-group" style="margin-top: -25px;">
                                                    <input type="text" class="form-control"
                                                        name="address1[<?php echo e($i); ?>]"
                                                        id="address_<?php echo e($i); ?>"
                                                        value="<?php echo e($addresses[$i] ?? ''); ?>">
                                                </div>
                                            <?php endfor; ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php echo view_render_event('bagisto.shop.customers.account.address.create_form_controls.street-addres.after'); ?>

                                    <div class="col-lg-12">
                                        <div class="eg-input-group">
                                            <label
                                                for="text"><?php echo e(__('shop::app.customer.account.address.create.city')); ?>

                                                *</label>
                                            <input type="text" value="<?php echo e(old('city')); ?>" id="address_0"
                                                name="city" placeholder="Your Address" required>
                                            <?php if(isset($messages['city']) && count($messages['city'])): ?>
                                                <?php $__currentLoopData = $messages['city']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="control-error lh-20 <?php echo e($loop->first ? 'pt-1' : ''); ?>">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php echo view_render_event('bagisto.shop.customers.account.address.create_form_controls.create.after'); ?>

                                    <div class="col-lg-12">
                                        <div class="eg-input-group">
                                            <label
                                                for="text"><?php echo e(__('shop::app.customer.account.address.create.postcode')); ?>

                                                *</label>
                                            <input type="text" value="<?php echo e(old('postcode')); ?>" id=""
                                                name="postcode" placeholder="Your Postal Code" required>
                                            <?php if(isset($messages['postcode']) && count($messages['postcode'])): ?>
                                                <?php $__currentLoopData = $messages['postcode']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="control-error lh-20 <?php echo e($loop->first ? 'pt-1' : ''); ?>">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php echo view_render_event('bagisto.shop.customers.account.address.create_form_controls.postcode.after'); ?>

                                    <div class="col-lg-12">
                                        <div class="eg-input-group">
                                            <label
                                                for="text"><?php echo e(__('shop::app.customer.account.address.create.phone')); ?>

                                                *</label>
                                            <input type="text" value="<?php echo e(old('phone')); ?>" id=""
                                                name="phone" placeholder="Your Postal Code" required>
                                            <?php if(isset($messages['phone']) && count($messages['phone'])): ?>
                                                <?php $__currentLoopData = $messages['phone']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="control-error lh-20 <?php echo e($loop->first ? 'pt-1' : ''); ?>">
                                                        <?php echo e($message); ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php echo view_render_event('bagisto.shop.customers.account.address.create_form_controls.after'); ?>


                                    <div class="col-lg-12">
                                        <div class="control-group">
                                            <span
                                                class="checkbox fs16 display-inbl no-margin d-flex align-items-center">
                                                <input type="checkbox" id="default_address" class="w-auto"
                                                    name="default_address">
                                                <span class="p-1">
                                                    <?php echo e(__('shop::app.customer.account.address.default-address')); ?>

                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div
                                            class="eg-input-group profile-form-sumbit reg-submit-input d-flex align-items-center">
                                            <input type="submit" id="submite-btn" value="Save Change">
                                        </div>
                                    </div>
                                </div>
                                <?php echo view_render_event('bagisto.shop.customers.account.address.create.after'); ?>-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::customers.account.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/resources/themes/magic/views/customers/account/address/create.blade.php ENDPATH**/ ?>