<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Your Orders</h1>

        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="text-left font-bold border-b-2">
                    <th class="px-4 py-2">Products</th>
                    <th class="px-4 py-2">Product Names</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Total</th>
                    <th class="px-4 py-2">Order Date</th>
                    <th class="px-4 py-2">Quantity</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-b">
                        <td class="px-4 py-2 flex items-center">
                            <?php
                                $quantity = 0;
                            ?>
                            <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $quantity += $item->quantity
                            ?>
                                <a href="<?php echo e(route('product.details', $item->product->id)); ?>"><img
                                        src="<?php echo e(asset('storage/'.$item->product->image)); ?>" class="w-20 h-20 mr-4 rounded"></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td class="px-4 py-2">
                           <ul >
                            <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('product.details', $item->product->id)); ?>">
                                      -  <?php echo e($item->product->name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        </td>
                        <td class="px-4 py-2"><?php echo e($order->status); ?></td>
                        <td class="px-4 py-2">$<?php echo e($order->total); ?></td>
                        <td class="px-4 py-2"><?php echo e($order->created_at->format('F j, Y')); ?></td>
                        <td class="px-4 py-2"><?php echo e($quantity); ?></td>
                        <td class="px-4 py-2">
                            <a href="<?php echo e(route('invoice', $order)); ?>" class="bg-orange-500 text-white px-4 py-2 font-semibold rounded-full">
                                View Details</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($orders->links()); ?>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH D:\Workspace\Shopi\resources\views/livewire/dashboard.blade.php ENDPATH**/ ?>