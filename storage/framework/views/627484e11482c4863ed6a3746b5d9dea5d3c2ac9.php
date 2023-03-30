<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <title><?php echo $__env->yieldContent('page_title'); ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        <?php if($favicon = core()->getConfigData('general.design.admin_logo.favicon')): ?>
            <link rel="icon" sizes="16x16" href="<?php echo e(\Illuminate\Support\Facades\Storage::url($favicon)); ?>" />
        <?php else: ?>
            <link rel="icon" sizes="16x16" href="<?php echo e(asset('vendor/webkul/ui/assets/images/favicon.ico')); ?>" />
        <?php endif; ?>

        <link rel="stylesheet" href="<?php echo e(asset('vendor/webkul/admin/assets/css/admin.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('vendor/webkul/ui/assets/css/ui.css')); ?>">

        <style>

            .form-container .control-group .control {
                width: 100%;
            }

            h1 {
                font-size: 24px;
                font-weight: 600;
                margin-bottom: 30px;
            }


            .footer {
                margin-top: 40px;
                padding: 0 20px;
            }

            .footer p {
                font-size: 14px;
                color: #8E8E8E;
                text-align: center;
            }

            .btn.btn-primary {
                width: 100%;
            }

            .row {
    display: -ms-flexbox !important;
    display: flex;
    -ms-flex-wrap: wrap !important;
    flex-wrap: wrap !important;
    margin-right: -15px;
    margin-left: -15px;
}
            .intro-section {
  background-image: url(https://i.pinimg.com/550x/81/76/22/8176224a5dc0a00068976125cb9e8d1e.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  padding: 75px 95px;
  min-height: 100vh;
  overflow-y: hidden;
  display: -webkit-box;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
          flex-direction: column;
  color: #ffffff; }
  @media (max-width: 991px) {
    .intro-section {
      padding-left: 50px;
      padding-rigth: 50px; } }
  @media (max-width: 767px) {
    .intro-section {
      padding: 28px; } }
      @media (min-width: 768px) {
      .center-box .adjacent-center{
                margin:60px 0 60px 0;

            }
        }
  @media (max-width: 575px) {
    .row-mobile {
    flex-direction: column-reverse;
 }
.center-box{
    margin-top:40px;
}
.title-login {
    font-size: 23px !important;
}}
.container{
    max-width: 100%;
    max-height: 100%;
}
.center-box {
    display: flex;
    vertical-align: middle;
    justify-content: center;
}
.adjacent-center {
    width: 590px;
    display: inline-block;
    text-align: left;
}
.brand-logo {
    margin-bottom: 30px !important;
    text-align: center;
    width: 160px;
}
.panel .panel-content {
    padding: 26px;
}
.panel {
   box-shadow: none;
    border-radius: 5px;
     background: transparent;
}
.form-container .control-group .control {
    width: 100%;
    height: 40px;
    padding: 0 20px;
    border-radius: 5px;
    -webkit-transition: all ease 0.2s;
    transition: all ease 0.2s;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    font-size: 14px;
    box-shadow: 3px 3px 10px 3px rgb(27 39 61 / 4%);
    border: 1px solid rgba(27, 39, 61, 0.1);
    line-height: 1;
    outline: 0 !important;
    background-color: #d3d3d336 !important;
}
.title-login{
    font-size:44px;
}
.rango-eye-visible ,
.toggle-password-icon {
    margin-left: -30px;
    cursor: pointer;
    vertical-align: sub;
    position: absolute;
    right: 16px;
    top: 43px;
}
        </style>

        <?php echo $__env->yieldContent('css'); ?>

        <?php echo view_render_event('bagisto.admin.layout.head'); ?>

    </head>
    <body <?php if(core()->getCurrentLocale() && core()->getCurrentLocale()->direction == 'rtl'): ?> class="rtl" <?php endif; ?> style="scroll-behavior: smooth;">
        <div id="app">

            <flash-wrapper ref='flashes'></flash-wrapper>
<div class="container" >
    <div class="row row-mobile">
        <div class="col-md-6 col-lg-6 col-12 intro-section">

        </div>
        <div class="col-md-6 col-lg-6 col-12">
            <div class="center-box">

                <div class="adjacent-center">

                    <div class=" brand-logo">
                        <?php if(core()->getConfigData('general.design.admin_logo.logo_image', core()->getCurrentChannelCode())): ?>
                            <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url(core()->getConfigData('general.design.admin_logo.logo_image', core()->getCurrentChannelCode()))); ?>" alt="<?php echo e(config('app.name')); ?>" style="width:100%;height:100%"/>
                        <?php else: ?>
                            <img src="<?php echo e(asset('vendor/webkul/ui/assets/images/logo.png')); ?>" alt="<?php echo e(config('app.name')); ?>" style="width:100%;height:100%"/>
                        <?php endif; ?>
                    </div>
                    <h1 style="color:#00c853;" class="title title-login">Welcome to Habeeb Market </h1>
                    <?php echo view_render_event('bagisto.admin.layout.content.before'); ?>


                    <?php echo $__env->yieldContent('content'); ?>

                    <?php echo view_render_event('bagisto.admin.layout.content.after'); ?>


                    <?php if(core()->getConfigData('general.content.footer.footer_toggle')): ?>
                        <div class="footer">
                            <p style="text-align: center;">
                                <?php if(core()->getConfigData('general.content.footer.footer_content')): ?>
                                    <?php echo e(core()->getConfigData('general.content.footer.footer_content')); ?>

                                <?php else: ?>
                                    <?php echo trans('admin::app.footer.copy-right'); ?>

                                <?php endif; ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>
        </div>

        <script type="text/javascript">
            window.flashMessages = [];
            <?php if($success = session('success')): ?>
                window.flashMessages = [{'type': 'alert-success', 'message': "<?php echo e($success); ?>" }];
            <?php elseif($warning = session('warning')): ?>
                window.flashMessages = [{'type': 'alert-warning', 'message': "<?php echo e($warning); ?>" }];
            <?php elseif($error = session('error')): ?>
                window.flashMessages = [{'type': 'alert-error', 'message': "<?php echo e($error); ?>" }];
            <?php endif; ?>

            window.serverErrors = [];
            <?php if(isset($errors)): ?>
                <?php if(count($errors)): ?>
                    window.serverErrors = <?php echo json_encode($errors->getMessages(), 15, 512) ?>;
                <?php endif; ?>
            <?php endif; ?>
        </script>

        <script type="text/javascript" src="<?php echo e(asset('vendor/webkul/admin/assets/js/admin.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('vendor/webkul/ui/assets/js/ui.js')); ?>"></script>

        <?php echo $__env->yieldPushContent('javascript'); ?>

        <?php echo view_render_event('bagisto.admin.layout.body.after'); ?>


        <div class="modal-overlay"></div>
    </body>
</html>
<?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Webkul/Admin/src/Providers/../Resources/views/layouts/anonymous-master.blade.php ENDPATH**/ ?>