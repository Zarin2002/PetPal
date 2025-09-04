 

<?php $__env->startSection('content'); ?>
<div style="display:flex;">

  <!-- Sidebar -->
  <div style="width:220px; background:#2a5bd7; color:white; height:100vh; padding:20px;">
    <h2>Categories</h2>
    <a href="#" style="color:white; display:block; margin-bottom:10px;">Pet Food</a>
    <a href="#" style="color:white; display:block; margin-bottom:10px;">Toys</a>
    <a href="#" style="color:white; display:block; margin-bottom:10px;">Grooming</a>
    <a href="#" style="color:white; display:block; margin-bottom:10px;">Accessories</a>
    <a href="#" style="color:white; display:block; margin-bottom:10px;">Medicine</a>
  </div>

  <!-- Content -->
  <div style="flex:1; padding:20px;">
    <h1>Pet Shop</h1>
    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(200px,1fr)); gap:20px;">
      <div style="border:1px solid #ddd; border-radius:8px; padding:15px; text-align:center;">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" width="100" height="100">
        <h3>Dog Food</h3>
        <p>$20</p>
      </div>
      <div style="border:1px solid #ddd; border-radius:8px; padding:15px; text-align:center;">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" width="100" height="100">
        <h3>Chew Toy</h3>
        <p>$10</p>
      </div>
    </div>
  </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/laravel_PetPal/resources/views/shop.blade.php ENDPATH**/ ?>