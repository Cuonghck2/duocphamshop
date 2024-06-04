<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <?php echo $__env->make('livewire.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-lg-9">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p> We found <strong class="text-brand"><?php echo e($products->total()); ?></strong> items for you!</p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span>
                                            <?php if($sort === 'latest'): ?>
                                                Latest: New Released
                                            <?php elseif($sort === 'low-to-high'): ?>
                                                Price: Low to High
                                            <?php elseif($sort === 'high-to-low'): ?>
                                                Price: High to Low
                                            <?php else: ?>
                                                Default Sorting
                                            <?php endif; ?>
                                            <i class="fi-rs-angle-small-down"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="<?php echo e($sort === 'latest' ? 'active' : ''); ?>"
                                                href="<?php echo e(url()->current()); ?>?<?php echo e(http_build_query(array_merge(request()->query(), ['sort' => 'latest']))); ?>">Latest:
                                                New Released</a></li>
                                        <li><a class="<?php echo e($sort === 'low-to-high' ? 'active' : ''); ?>"
                                                href="<?php echo e(url()->current()); ?>?<?php echo e(http_build_query(array_merge(request()->query(), ['sort' => 'low-to-high']))); ?>">Price:
                                                Low to High</a></li>
                                        <li><a class="<?php echo e($sort === 'high-to-low' ? 'active' : ''); ?>"
                                                href="<?php echo e(url()->current()); ?>?<?php echo e(http_build_query(array_merge(request()->query(), ['sort' => 'high-to-low']))); ?>">Price:
                                                High to Low</a></li>
                                        <li><a href="<?php echo e(route('home')); ?>">Default Sorting</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid-3">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-4 col-6 col-sm-6 ">
                                <div class="product-cart-wrap mb-30 border-slate-200 shadow-md">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="<?php echo e(route('product.details', $p->id)); ?>" class="">
                                                <img class="default-img" src="<?php echo e(asset('storage/'.$p->image)); ?>"
                                                    alt="<?php echo e($p->name); ?>">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category flex gap-2 mb-2">
                                            <?php $__currentLoopData = $p->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($index < 4): ?>
                                                    <a class="bg-orange-400 py-1 px-2 text-white font-semibold rounded-full"
                                                        href="/?<?php echo e(http_build_query(array_merge(request()->query(), ['category' => $cat->slug]))); ?>"
                                                        rel="tag"><?php echo e($cat->name); ?></a>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <h2>
                                            <a href="<?php echo e(route('product.details', $p->id)); ?>"
                                                class="text-xl">
                                                <?php echo e(strlen($p->name) > 20 ? substr($p->name, 0, 17) . '...': $p->name); ?>

                                            </a>
                                        </h2>
                                        <div class="flex items-center justify-between">
                                            <div class="">
                                                <p class="text-xl font-bold text-orange-500">$<?php echo e($p->price); ?></p>
                                                <p class="text-md line-through opacity-50">$<?php echo e($p->old_price); ?></p>
                                            </div>
                                            <div class="show flex justify-end mt-3">
                                                <form action="<?php echo e(route('cart.add')); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="product_id" value="<?php echo e($p->id); ?>">
                                                    <a onclick="this.closest('form').submit()" class="text-orange-500 hover:text-black duration-100">
                                                        
                                                        <i class="fi-rs-shopping-cart-add text-3xl"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!--pagination-->
                    <?php echo e($products->links('pagination::tailwind')); ?>

                </div>
            </div>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH D:\Workspace\Shopi\resources\views/livewire/home.blade.php ENDPATH**/ ?>