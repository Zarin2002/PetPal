<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adopt a Pet</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f9f9f9; }
        .navbar { background: #2a5bd7; color: white; padding: 15px 40px; display: flex; justify-content: space-between; }
        .navbar a { color: white; text-decoration: none; margin-left: 20px; }

        .container { padding: 40px; }
        h1 { color: #2a5bd7; margin-bottom: 20px; }

        .filters { display: flex; gap: 20px; margin-bottom: 30px; }
        .filters select, .filters input {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .pets-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
        }

        .pet-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
        }
        .pet-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 8px;
        }
        .pet-card h3 { margin: 10px 0 5px; color: #333; }
        .pet-card p { font-size: 14px; color: #666; }
        .connect-btn {
            margin-top: 10px;
            display: inline-block;
            padding: 8px 14px;
            background: #2a5bd7;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div><strong>PetConnect</strong></div>
    <div>
        <a href="/dashboard">Home</a>
        <a href="#">Account</a>
        <a href="#">Logout</a>
    </div>
</div>

<div class="container">
    <h1>Adopt a Pet</h1>

    <form class="filters" method="GET" action="<?php echo e(route('adopt')); ?>">
        <select name="breed">
            <option value="">Select Breed</option>
            <option <?php echo e(request('breed') == 'Golden Retriever' ? 'selected' : ''); ?>>Golden Retriever</option>
            <option <?php echo e(request('breed') == 'Siberian Husky' ? 'selected' : ''); ?>>Siberian Husky</option>
            <option <?php echo e(request('breed') == 'Persian Cat' ? 'selected' : ''); ?>>Persian Cat</option>
        </select>

        <select name="age">
            <option value="">Select Age</option>
            <option <?php echo e(request('age') == 'Puppy/Kitten' ? 'selected' : ''); ?>>Puppy/Kitten</option>
            <option <?php echo e(request('age') == '1-3 Years' ? 'selected' : ''); ?>>1-3 Years</option>
            <option <?php echo e(request('age') == '4+ Years' ? 'selected' : ''); ?>>4+ Years</option>
        </select>

        <input type="text" name="location" placeholder="Enter Location" value="<?php echo e(request('location')); ?>">
        <button type="submit">Search</button>
    </form>

    <div class="pets-grid">
        <?php $__empty_1 = true; $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="pet-card">
                <img src="<?php echo e($pet->image_url); ?>" alt="Pet Image">
                <h3><?php echo e($pet->name); ?></h3>
                <p>Breed: <?php echo e($pet->breed); ?><br>Age: <?php echo e($pet->age_group); ?><br>Location: <?php echo e($pet->location); ?></p>
                <a href="#" class="connect-btn">Connect with Shelter</a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>No pets found matching your search.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>

<?php /**PATH /Users/mohammadkamruzzamanmiah/laravel_PetPal/resources/views/adopt.blade.php ENDPATH**/ ?>