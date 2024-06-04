<header class="header-area header-style-1 header-height-2 px-20 shadow-sm">
    <div class="header-middle d-none d-lg-block py-3">
        <div class="container">
            <div class="header-wrap flex justify-between items-center">
                <div class="logo w-[12rem]">
                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.application-logo','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('application-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                </div>
                <div class="search-style-1 flex-grow px-20">
                    <form action="<?php echo e(route('home')); ?>" class="w-100">
                        <input id="search" name="search" type="text" placeholder="Search for any product, category, brand..."/>
                    </form>
                </div>
                <div class="header-action-right">
                    <div class="header-action-2">
                        <?php if(auth()->guard()->check()): ?>
                            <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                                <nav class="">
                                    <ul class="">
                                        <li>
                                            <h1 class="text-black font-bold text-[1rem]">Hi, <?php echo e(Auth::user()->name); ?></h1>
                                        </li>
                                        <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                            <ul class="sub-menu">
                                                <?php if(Auth::user()->is_admin): ?>
                                                    <li><a href="/admin">Admin Dashboard</a></li>
                                                <?php endif; ?>
                                                <li><a href="<?php echo e(route('dashboard')); ?>">Orders Dashboard</a></li>
                                                <li><a href="<?php echo e(route('profile.edit')); ?>">Account Settings</a></li>
                                                <li>
                                                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <a href="<?php echo e(route('logout')); ?>"
                                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                                            <?php echo e(__('Log Out')); ?>

                                                        </a>
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="pr-4 text-md font-semibold ">Log
                                in</a>

                                <?php if(Route::has('register')): ?>
                                <a href="<?php echo e(route('register')); ?>" class="btn btn-sm btn-default">Register</a>
                                <?php endif; ?>
                                <?php endif; ?>
                                <div class="header-action-icon-2 ml-10">
                                    <a class="mini-cart-icon" href="<?php echo e(route('cart')); ?>">
                                        
                                        <i class="fi-rs-shopping-cart text-3xl"></i>
                                        <span class="pro-count blue"><?php echo e(Cart::count()); ?></span>
                                    </a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 border-gray-200">
                                        <ul>
                                            <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <div class="shopping-cart-img">
                                                        <a href="<?php echo e(route('product.details', $item->model->id)); ?>">
                                                            <img alt="" src="<?php echo e(asset('storage/'.$item->model->image)); ?>"></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a
                                                                href="<?php echo e(route('product.details', $item->model->id)); ?>">
                                                                <?php echo e(strlen($item->model->name) > 15 ? substr($item->model->name, 0, 15) . '...' : $item->model->name); ?>

                                                            </a>
                                                        </h4>
                                                        <h4><span><?php echo e($item->qty); ?> × </span>$<?php echo e($item->model->price); ?></h4>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <form action="<?php echo e(route('destroy.item')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <input type="hidden" name="row_id" value="<?php echo e($item->rowId); ?>">
                                                            <a onclick="event.preventDefault(); this.closest('form').submit()"><i class="fi-rs-cross-small"></i></a>
                                                        </form>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span>$<?php echo e(Cart::total()); ?></span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="<?php echo e(route('cart')); ?>" class="btn btn-sm btn-secondary">View cart</a>
                                                <a href="<?php echo e(route('checkout')); ?>" class="btn btn-sm">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH D:\Workspace\Shopi\resources\views/layouts/header.blade.php ENDPATH**/ ?>