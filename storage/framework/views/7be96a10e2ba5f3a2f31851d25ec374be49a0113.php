<?php

    $tree = \Webkul\Core\Tree::create();

    foreach (config('core') as $item) {
        $tree->add($item);
    }

    $tree->items = core()->sortItems($tree->items);

    $config = $tree;

    $allLocales = core()->getAllLocales()->pluck('name', 'code');
?>
<div class="navbar-left" v-bind:class="{'open': isMenuOpen}">
    <ul class="menubar">
        <?php $__currentLoopData = $menu->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="menu-item <?php echo e($menu->getActive($menuItem)); ?>">
            <a class="menubar-anchor"  href="<?php echo e($menuItem['url']); ?>">
                <span class="icon-menu icon <?php echo e($menuItem['icon-class']); ?>"></span>

                <span class="menu-label"><?php echo e(trans($menuItem['name'])); ?></span>

                <?php if(count($menuItem['children']) || $menuItem['key'] == 'configuration' ): ?>
                    <span
                        class="icon arrow-icon <?php echo e($menu->getActive($menuItem) == 'active' ? 'rotate-arrow-icon' : ''); ?> <?php echo e(( core()->getCurrentLocale() && core()->getCurrentLocale()->direction == 'rtl' ) ? 'arrow-icon-right' :'arrow-icon-left'); ?>"
                        ></span>

                <?php endif; ?>
            </a>
            <?php if($menuItem['key'] != 'configuration'): ?>
                <?php if(count($menuItem['children'])): ?>
                    <ul class="sub-menubar">
                        <?php $__currentLoopData = $menuItem['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="sub-menu-item <?php echo e($menu->getActive($subMenuItem)); ?>">
                                <a href="<?php echo e(count($subMenuItem['children']) ? current($subMenuItem['children'])['url'] : $subMenuItem['url']); ?>">
                                    <span class="menu-label"><?php echo e(trans($subMenuItem['name'])); ?></span>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
            <?php else: ?>
                <ul class="sub-menubar">
                    <?php $__currentLoopData = $config->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="sub-menu-item <?php echo e($item['key'] == request()->route('slug') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.configuration.index', $item['key'])); ?>">
                                <span class="menu-label"> <?php echo e(isset($item['name']) ? trans($item['name']) : ''); ?></span>
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </li>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <!-- <li class="menu-item <?php if(Route::currentRouteName()=='topdeals'): ?> active <?php endif; ?>">
            <a class="menubar-anchor"  href="<?php echo e(Route('topdeals')); ?>">
                <span class="icon-menu icon top-icon"></span>

                <span class="menu-label">Collections</span>
            </a>
        </li> 
        <li class="menu-item <?php if(Route::currentRouteName()=='newsletter'): ?> active <?php endif; ?>">
            <a class="menubar-anchor"  href="<?php echo e(Route('newsletter')); ?>">
                <span class="icon-menu icon newsletter-icon"></span>

                <span class="menu-label">News Letter</span>
            </a>
        </li>
         <li class="menu-item <?php if(Route::currentRouteName()=='ShowImageBackground'): ?> active <?php endif; ?>">
            <a class="menubar-anchor"  href="<?php echo e(Route('ShowImageBackground')); ?>" style="color:#9497b8">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
				  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
				  <line x1="15" y1="8" x2="15.01" y2="8" />
				  <rect x="4" y="4" width="16" height="16" rx="3" />
				  <path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5" />
				  <path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2" />
				</svg>
                <span class="menu-label">Image & Colors</span>
            </a>
        </li>
		<li class="menu-item <?php if(Route::currentRouteName()=='banners'): ?> active <?php endif; ?>">
            <a class="menubar-anchor"  href="<?php echo e(Route('banners')); ?>">
                <span class="icon-menu icon banner-icon"></span>

                <span class="menu-label">Banners</span>
            </a>
        </li>
		<li class="menu-item <?php if(Route::currentRouteName()=='reportscustom'): ?> active <?php endif; ?>">
            <a class="menubar-anchor"  href="<?php echo e(Route('reportscustom')); ?>">
                <span class="icon-menu icon banner-icon"></span>

                <span class="menu-label">Reports</span>
            </a>
        </li> 
		<li class="menu-item <?php if(Route::currentRouteName()=='shippingmethods'): ?> active <?php endif; ?>">
            <a class="menubar-anchor"  href="<?php echo e(Route('shippingmethods')); ?>">
                <span class="icon-menu icon banner-icon"></span>

                <span class="menu-label">Shipping Methods</span>
            </a>
        </li> 
		<li class="menu-item <?php if(Route::currentRouteName()=='brands'): ?> active <?php endif; ?>">
            <a class="menubar-anchor"  href="<?php echo e(Route('brands')); ?>">
                <span class="icon-menu icon temp-icon"></span>

                <span class="menu-label">Brands</span>
            </a>
        </li> -->
    </ul>

    <nav-slide-button id="nav-expand-button" icon-class="accordian-right-icon"></nav-slide-button>
</div>

<?php $__env->startPush('scripts'); ?>

    <script>

        $(document).ready(function () {
            $(".menubar-anchor").click(function() {
                if ( $(this).parent().attr('class') == 'menu-item active' ) {
                    $(this).parent().removeClass('active');
                    $('.arrow-icon-left').removeClass('rotate-arrow-icon');
                    $('.arrow-icon-right').removeClass('rotate-arrow-icon');
                    $(".sub-menubar").hide();
                    event.preventDefault();
                }
            });
        });

    </script>

<?php $__env->stopPush(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Webkul/Admin/src/Providers/../Resources/views/layouts/nav-left.blade.php ENDPATH**/ ?>