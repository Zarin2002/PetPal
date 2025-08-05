<!DOCTYPE html>
<html>
<head>
   <title>Pet Pal Log in</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
   <div class="row justify-content-center">
       <div class="col-md-5">
           <div class="card shadow">
               <div class="card-header text-center">
                   <h4>Login to Pet Pal</h4>
               </div>
               <div class="card-body">
                   <?php if($errors->any()): ?>
                       <div class="alert alert-danger">
                           <?php echo e($errors->first()); ?>

                       </div>
                   <?php endif; ?>
                   <form method="POST" action="<?php echo e(route('login')); ?>">
                       <?php echo csrf_field(); ?>
                       <div class="mb-3">
                           <label>Email address</label>
                           <input type="email" name="email" class="form-control" required value="<?php echo e(old('email')); ?>">
                       </div>
                       <div class="mb-3">
                           <label>Password</label>
                           <input type="password" name="password" class="form-control" required>
                       </div>
                       <div class="d-grid">
                           <button class="btn btn-primary" type="submit">Login</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
</body>
</html><?php /**PATH /Users/mohammadkamruzzamanmiah/laravel_PetPal/resources/views/auth/login.blade.php ENDPATH**/ ?>