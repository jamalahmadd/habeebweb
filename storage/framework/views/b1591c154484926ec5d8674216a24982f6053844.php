<?php
$messages = [];
if (isset($errors) && count($errors)) {
    $messages = $errors->getMessages();
}
?>

<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('shop::app.customer.account.profile.index.title')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<style>
	.profile-form-wrapper{
		margin-bottom:40px !important;
	}
	.account-sitting-wrapper input {
	padding: 2px 6px;
    background: black;
    color: white;
    font-weight: 600;
    border: 2px double;
		height:38px;
		margin-bottom:20px;
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
<?php $locations = app('App\Models\LocationsModel'); ?>
<?php echo view_render_event('bagisto.shop.customers.account.address.list.before', ['addresses' => $addresses]); ?>

<div class="ps-lost-password">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Addresses</li>
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
                        <div class="tab-content" id="myTabContent">
                            <div id="tab-setting" role="tab-panel"
                            aria-labelledby="tab-setting-link">
                            <div class="account-sitting-wrapper">
                                <div class="row">
                                      <!--  <div class="empty"><?php echo e(__('shop::app.customer.account.address.index.empty')); ?></div>-->
                                        <div class="col-lg-10 col-md-6"></div>
                                        <div class="col-lg-2 col-md-6" style="padding-bottom: 5px;" class="eg-input-group profile-form-sumbit reg-submit-input d-flex align-items-center">
                                            <form action="/customer/account/addresses/create">
                                                <input type="submit" value="Add Address">
                                            </form>
                                        </div>
                                        <?php $__currentLoopData = $locations->where('customer_id',Auth::guard('customer')->user()->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-card">
                                                    <div class="edit-icon">
                                                        <a href="<?php echo e(route('customer.address.edit', $address->id)); ?>"><i class="flaticon-edit"></i></a>
                                                    </div>
                                                    <h5 class="card-title">Billing Address</h5>
                                                    <ul class="card-list">
                                                        <li><span>Area <small>:</small></span> <?php echo e($address->area); ?></li>
                                                        <li><span>Building Type <small>:</small></span> <?php echo e($address->building_type); ?> </li>
                                                        <li><span>Street Name <small>:</small></span><?php echo e($address->street_name); ?> </li>
                                                        <li><span>Building Name <small>:</small></span><?php echo e($address->building_name); ?> </li>
                                                        <li><span>Address Name <small>:</small></span><?php echo e($address->address_name); ?> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view_render_event('bagisto.shop.customers.account.address.list.after', ['addresses' => $addresses]); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        function deleteAddress(message, addressId) {
            if (! confirm(message)) {
                return;
            }
            $(`#deleteAddressForm${addressId}`).submit();
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('shop::customers.account.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/resources/themes/magic/views/customers/account/address/index.blade.php ENDPATH**/ ?>