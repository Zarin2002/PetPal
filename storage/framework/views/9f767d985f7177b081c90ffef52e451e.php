<?php $__env->startSection('content'); ?>
<style>
html, body { background: #e6ccff; font-family: 'Segoe UI', sans-serif; }
.cards { display:grid; grid-template-columns: repeat(auto-fill,minmax(260px,1fr)); gap:25px; padding:20px 40px 60px; }
.card { background: linear-gradient(145deg,#f2e6ff,#d9b3ff); border-radius:16px; box-shadow:0 0 10px #b266ff,0 0 20px #d9b3ff inset; text-align:center; padding:25px; transition:0.3s ease-in-out, box-shadow 0.3s; }
.card:hover { transform:translateY(-4px); box-shadow:0 0 20px #b266ff,0 0 40px #d9b3ff inset; }
.card h3 { margin:10px 0; font-size:20px; color:#8a2be2; text-shadow:0 0 6px #d9b3ff,0 0 10px #b266ff; }
.card p { font-size:14px; color:#555; margin-bottom:8px; text-shadow:0 0 3px #fff; }
.card form { margin-top:10px; }
.card button { background-color:#ff4d4d; color:#fff; border:none; padding:8px 12px; border-radius:6px; cursor:pointer; font-size:14px; width:80%; box-shadow:0 0 6px #ff9999,0 0 12px #ff4d4d inset; }
.card button:hover { background-color:#cc0000; transform:scale(1.05); box-shadow:0 0 12px #ff9999,0 0 24px #ff4d4d inset; }
.section-title { padding:30px 20px 10px; font-size:32px; font-weight:800; text-align:center; color:#a64dff; font-family:'Poppins',sans-serif; letter-spacing:1px; text-shadow:0 0 8px #d9b3ff,0 0 12px #b266ff; }
.footer { text-align:center; padding:25px; background:#d9b3ff; color:#4b0082; font-size:14px; box-shadow:0 -3px 10px #b266ff; }
a.back-btn { display:inline-block; margin-bottom:15px; padding:8px 12px; background:#a64dff; color:#fff; border-radius:6px; text-decoration:none; box-shadow:0 0 6px #b266ff,0 0 12px #d9b3ff inset; }
a.back-btn:hover { background:#8a2be2; transform:scale(1.03); }
</style>

<div class="section-title">All <?php echo e(ucfirst($type)); ?></div>
<a href="<?php echo e(route('pet.care')); ?>" class="back-btn">← Back to Dashboard</a>

<div class="cards">
    <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card">
            <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><strong><?php echo e(ucwords(str_replace('_',' ',$key))); ?>:</strong> <?php echo e($value); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <form method="POST" action="<?php echo e(route('pets.remove', ['type'=>$type, 'index'=>$index])); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit">Remove</button>
            </form>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p style="text-align:center; grid-column:1/-1; font-size:18px; color:#555;">No items found.</p>
    <?php endif; ?>
</div>


<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/laravel_PetPal/resources/views/auth/see_all.blade.php ENDPATH**/ ?>