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
            <?php if(session()->has('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session()->get('success')); ?>

                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <?php if(Cart::count() > 0): ?>
                                <tbody>
                                    <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="product-thumbnail ">
                                                <a class="rounded-lg"
                                                    href="<?php echo e(route('product.details', $item->model->id)); ?>">
                                                    <img src="<?php echo e(asset('storage/' . $item->model->image)); ?>"
                                                        alt="<?php echo e($item->model->name); ?>"></a>
                                            </td>
                                            <td class="">
                                                <h5 class="text-lg font-medium ">
                                                    <a
                                                        href="<?php echo e(route('product.details', $item->model->id)); ?>"><?php echo e(ucfirst($item->model->name)); ?></a>
                                                </h5>
                                                <p class="font-xs">
                                                    <?php echo e($item->model->brief_description); ?>

                                                </p>
                                            </td>
                                            <td class="price" data-title="Price"><span>$<?php echo e($item->model->price); ?>

                                                </span></td>
                                            <td class="text-center" data-title="Stock">
                                                <div
                                                    class="border rounded-md px-2 py-1 flex items-center justify-between">
                                                    <span class="qty-val"><?php echo e($item->qty); ?></span>
                                                    <div>
                                                        <form action="<?php echo e(route('qty.up')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="row_id"
                                                                value="<?php echo e($item->rowId); ?>">
                                                            <a class="qty-up" href=""
                                                                onclick="event.preventDefault(); this.closest('form').submit()">
                                                                <i class="fi-rs-angle-small-up"></i></a>
                                                        </form>
                                                        <form action="<?php echo e(route('qty.down')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="row_id"
                                                                value="<?php echo e($item->rowId); ?>">
                                                            <a class="qty-down" href=""
                                                                onclick="event.preventDefault(); this.closest('form').submit()">
                                                                <i class="fi-rs-angle-small-down"></i></a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right" data-title="Cart">
                                                <span>$<?php echo e($item->subtotal); ?> </span>
                                            </td>
                                            <td class="action" data-title="Remove">
                                                <form action="<?php echo e(route('destroy.item')); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <input type="hidden" name="row_id" value="<?php echo e($item->rowId); ?>">
                                                    <a onclick="event.preventDefault(); this.closest('form').submit()"
                                                        class="text-muted"><i class="fi-rs-trash"></i></a>
                                            </td>
                                            </form>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td colspan="6" class="text-end">
                                            <form action="<?php echo e(route('destroy.cart')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <a onclick="event.preventDefault(); this.closest('form').submit()"
                                                    class="text-muted">
                                                    <i class="fi-rs-cross-small"></i>
                                                    Clear Cart</a>
                                            </form>
                                        </td>
                                    </tr>

                                </tbody>
                            <?php else: ?>
                                <h1 class="text-xl font-bold pb-20">No item in cart</h1>
                            <?php endif; ?>
                        </table>
                    </div>
                    
                    <?php if(Cart::count() > 0): ?>
                        <div class="flex justify-center mb-50">
                            <div class="w-100">
                                <div class=" rounded-xl cart-totals">
                                    <div class="mb-3">
                                        <h1 class="font-bold text-lg tracking-widest text-orange-500 mb-2 uppercase">
                                            Cart total</h1>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="cart_total_label">Cart Subtotal</td>
                                                    <td class="cart_total_amount"><span
                                                            class="font-lg fw-900 text-brand">$<?php echo e(Cart::subtotal()); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Shipping</td>
                                                    <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free
                                                        Shipping</td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Tax</td>
                                                    <td class="cart_total_amount">
                                                        <i class="ti-gift mr-5"></i>
                                                        <strong class="font-xl text-red-500">
                                                            $<?php echo e(Cart::tax()); ?>

                                                        </strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Total</td>
                                                    <td class="cart_total_amount">
                                                        <strong><span class="font-xl fw-900 text-brand">
                                                                $<?php echo e(Cart::total()); ?>

                                                            </span></strong>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="cart-action text-end">
                                        <a href="<?php echo e(route('checkout')); ?>" class="btn"> <i
                                                class="fi-rs-box-alt mr-10"></i>
                                            Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH D:\Workspace\Shopi\resources\views/livewire/cart.blade.php ENDPATH**/ ?>