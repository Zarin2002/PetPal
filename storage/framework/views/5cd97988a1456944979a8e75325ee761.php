<!DOCTYPE html>
<html>
<head>
    <title>Pet Pal Register</title>
    <!-- Google Fonts for elegant cursive -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            background: #a0e7f7;
            position: relative;
            font-family: 'Segoe UI', sans-serif;
        }

        /* Background Image with 30% opacity */
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://img.freepik.com/premium-photo/cool-dog-wearing-sunglasses-hat_1022970-49060.jpg?semt=ais_hybrid&w=740&q=80') no-repeat center center;
            background-size: cover;
            opacity: 0.3;
            z-index: 1;
        }

        /* Floating Emoji */
        .floating-emoji {
            position: absolute;
            font-size: 40px;
            z-index: 2;
            pointer-events: none;
            animation-name: floatEmoji;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }

        @keyframes floatEmoji {
            0% { transform: translateX(0px) translateY(100vh) rotate(0deg); opacity: 0; }
            25% { transform: translateX(20px) translateY(75vh) rotate(15deg); opacity: 1; }
            50% { transform: translateX(-15px) translateY(50vh) rotate(-10deg); opacity: 1; }
            75% { transform: translateX(15px) translateY(25vh) rotate(10deg); opacity: 1; }
            100% { transform: translateX(0px) translateY(-100px) rotate(360deg); opacity: 0; }
        }

        /* Cute and aesthetic overlay form box */
        .overlay {
            position: relative;
            z-index: 3;
            background: linear-gradient(145deg, #ffffffcc, #d0f0fdcc); /* pastel gradient */
            padding: 40px;
            border-radius: 20px; /* soft rounded corners */
            box-shadow: 0 8px 30px rgba(0,0,0,0.2); /* gentle shadow */
            max-width: 400px;
            width: 100%;
        }

        /* Style input fields */
        .overlay input {
            border-radius: 12px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            padding: 10px 15px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .overlay input:focus {
            border-color: #33abbd;
            box-shadow: 0 0 8px rgba(51,171,189,0.5);
            outline: none;
        }

        /* Style button */
        .overlay .btn-success {
            border-radius: 12px;
            background: linear-gradient(135deg, #33abbd, #66d9ef);
            border: none;
            transition: all 0.3s ease;
        }

        .overlay .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* Elegant Cursive Title above form */
        .title {
            position: relative;
            z-index: 3;
            font-family: 'Pacifico', cursive;
            font-size: 3rem;
            color: #ffffff; /* White color */
            text-align: center;
            margin-bottom: 25px;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.8); /* Black shadow */
            opacity: 0;
            animation: slideUp 1.5s forwards;
        }

        /* Slide up animation for title */
        @keyframes slideUp {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

    <!-- Background Image -->
    <div class="background-image"></div>

    <!-- Title Above Registration -->
    <div class="title">Create Your PET PAL Account</div>

    <!-- Registration Form -->
    <div class="overlay">
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" required value="<?php echo e(old('name')); ?>">
            </div>
            <div class="mb-3">
                <label>Email address</label>
                <input type="email" name="email" class="form-control" required value="<?php echo e(old('email')); ?>">
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <div class="d-grid">
                <button class="btn btn-success" type="submit">Register</button>
            </div>
        </form>

        <div class="mt-3 text-center">
            Already have an account? <a href="<?php echo e(route('login')); ?>">Log in</a>
        </div>
    </div>

    <!-- Floating Emoji Script -->
    <script>
        const emojis = ['🐣','🐶','🐱','🐹','🐰','☁️','☁️','☁️'];
        const body = document.body;

        for(let i=0; i<25; i++){
            const span = document.createElement('div');
            span.classList.add('floating-emoji');
            span.textContent = emojis[Math.floor(Math.random()*emojis.length)];
            span.style.left = Math.random()*90 + '%';
            span.style.top = Math.random()*80 + 'vh';
            span.style.fontSize = (30 + Math.random()*40) + 'px';
            span.style.animationDuration = (8 + Math.random()*12) + 's';
            span.style.animationDelay = (Math.random()*5) + 's';
            body.appendChild(span);
        }
    </script>

</body>
</html>











<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/laravel_PetPal/resources/views/auth/register.blade.php ENDPATH**/ ?>