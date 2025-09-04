<?php $__env->startSection('content'); ?>
<div style="display: flex;">

    <!-- Sidebar Categories -->
    <div style="width: 200px; background:#f9f9f9; padding:20px;">
        <h3>Categories</h3>
        <ul style="list-style:none; padding:0;">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('shop.category',$category->id)); ?>">
                        <?php echo e($category->name); ?>

                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

    <!-- Products -->
    <div style="flex:1; padding:20px; display:grid; grid-template-columns:repeat(auto-fill, minmax(200px,1fr)); gap:20px;">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="background:white; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.1); padding:15px; text-align:center;">
                <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" style="width:150px; height:150px; object-fit:cover;">
                <h4><?php echo e($product->name); ?></h4>
                <p>$<?php echo e($product->price); ?></p>
                <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" style="background:#2a5bd7;color:white;padding:10px 20px;border:none;border-radius:5px;">Add to Cart</button>
                </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>









<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/laravel_PetPal/resources/views/shop/index.blade.php ENDPATH**/ ?>