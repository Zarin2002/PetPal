<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adopt a Pet</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            background: #fff0f5; 
            color: #444;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar { 
            background: #ffb6c1; 
            color: white; 
            padding: 15px 40px; 
            display: flex; 
            justify-content: space-between; 
            box-shadow: 0 0 12px #ff69b4, 0 0 20px #ffb6c1;
            position: relative;
            z-index: 1;
        }
        .navbar a { 
            color: #fff; 
            text-decoration: none; 
            margin-left: 20px; 
            transition: 0.3s;
        }
        .navbar a:hover {
            color: #ff69b4;
            text-shadow: 0 0 5px #ff69b4, 0 0 10px #ffb6c1;
        }

        /* Title */
        .container { padding: 40px; position: relative; z-index: 1; }
        h1 { 
            color: #ff69b4; 
            margin-bottom: 20px; 
            text-shadow: 0 0 8px #ff69b4, 0 0 16px #ffb6c1;
        }

        /* Filters */
        .filters { display: flex; gap: 20px; margin-bottom: 30px; flex-wrap: wrap; }
        .filters select, .filters input, .filters button {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ff69b4;
            background: #fff;
            color: #444;
            box-shadow: 0 0 8px #ffb6c1;
            transition: 0.3s;
        }
        .filters button {
            cursor: pointer;
            background: #ff69b4;
            color: white;
        }
        .filters select:hover, .filters input:hover, .filters button:hover {
            box-shadow: 0 0 12px #ff69b4, 0 0 24px #ffb6c1;
        }

        /* Pets Grid */
        .pets-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
        }

        .pet-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px #ffb6c1;
            padding: 20px;
            text-align: center;
            transition: 0.4s;
        }
        .pet-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 15px #ff69b4, 0 0 30px #ffb6c1;
        }
        .pet-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 0 10px #ffb6c1;
        }
        .pet-card h3 { 
            margin: 10px 0 5px; 
            color: #ff69b4; 
            text-shadow: 0 0 5px #ff69b4, 0 0 10px #ffb6c1; 
        }
        .pet-card p { font-size: 14px; color: #666; }

        .connect-btn {
            margin-top: 10px;
            display: inline-block;
            padding: 8px 14px;
            background: #ff69b4;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            box-shadow: 0 0 8px #ffb6c1, 0 0 16px #ff69b4;
            transition: 0.3s;
            cursor: pointer;
        }
        .connect-btn:hover {
            box-shadow: 0 0 12px #ff69b4, 0 0 24px #ffb6c1;
            background: #ff85a2;
        }

        /* Floating Emojis Background */
        .floating-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; 
            pointer-events: none;
        }
        .floating-bg span {
            position: absolute;
            font-size: 26px;
            opacity: 0.5;
            animation: floatDown linear infinite;
        }
        @keyframes floatDown {
            0% { transform: translateY(-10vh) rotate(0deg); opacity: 0.8; }
            100% { transform: translateY(110vh) rotate(360deg); opacity: 0.2; }
        }

        /* Modal Styles */
        #connectModal {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
            z-index: 10;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        #connectModal.show {
            display: flex;
            opacity: 1;
        }
        #connectModal .modal-content {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 380px; /* slightly larger */
            max-width: 95%;
            position: relative;
            box-shadow: 0 0 20px #ff69b4;
            transform: scale(0.8);
            transition: transform 0.3s ease, opacity 4s ease;
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* move form slightly left */
            justify-content: center;
            text-align: left;
        }
        #connectModal.show .modal-content {
            transform: scale(1);
            opacity: 1;
        }
        #connectModal .close {
            position: absolute;
            top: 10px;
            right: 15px;
            cursor: pointer;
            font-weight: bold;
        }
        #connectModal input {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border-radius: 6px;
            border: 1px solid #ff69b4;
        }
        #connectModal button {
            width: 100%;
            padding: 10px;
            background: #ff69b4;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        #confirmationMessage {
            margin-top: 10px;
            color: #28a745;
            font-weight: bold;
            font-size: 14px;
            text-align: left;
        }
    </style>
</head>
<body>

<!-- Floating Emojis Background -->
<div class="floating-bg">
    <span class="paw" style="left:10%; animation-duration:14s; animation-delay:2s;">🐾</span>
    <span class="paw" style="left:40%; animation-duration:18s; animation-delay:5s;">🐾</span>
    <span class="paw" style="left:70%; animation-duration:16s; animation-delay:8s;">🐾</span>
    <span class="paw" style="left:85%; animation-duration:20s; animation-delay:3s;">🐾</span>

    <span class="heart" style="left:20%; animation-duration:15s; animation-delay:4s;">❤️</span>
    <span class="heart" style="left:50%; animation-duration:19s; animation-delay:7s;">❤️</span>
    <span class="heart" style="left:75%; animation-duration:17s; animation-delay:10s;">❤️</span>

    <span class="egg" style="left:30%; animation-duration:18s; animation-delay:2s;">🥚</span>
    <span class="egg" style="left:65%; animation-duration:20s; animation-delay:6s;">🥚</span>

    <span class="chick" style="left:25%; animation-duration:16s; animation-delay:3s;">🐣</span>
    <span class="chick" style="left:55%; animation-duration:22s; animation-delay:7s;">🐣</span>

    <span class="babychick" style="left:45%; animation-duration:19s; animation-delay:5s;">🐤</span>
    <span class="babychick" style="left:80%; animation-duration:21s; animation-delay:9s;">🐤</span>
</div>

<!-- Navbar -->
<div class="navbar">
    <div><strong>PetConnect</strong></div>
    <div>
        <a href="/dashboard">Home</a>
        <a href="#">Account</a>
        <a href="#">Logout</a>
    </div>
</div>

<!-- Main Content -->
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

<!-- Modal -->
<div id="connectModal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3 style="color:#ff69b4; text-align:center;">Provide Your Info</h3>
        <form id="connectForm">
            <input type="text" name="name" id="modalName" value="<?php echo e(auth()->user()->name); ?>" readonly>
            <input type="email" name="email" id="modalEmail" value="<?php echo e(auth()->user()->email); ?>" readonly>
            <input type="text" name="phone" id="modalPhone" placeholder="Enter Phone Number" required>
            <button type="submit">Confirm</button>
        </form>
        <p id="confirmationMessage">
            Thank you for providing your information! We are contacting the shelter as soon as possible! Wait for a call to receive from the shelter!
        </p>
    </div>
</div>

<script>
    const modal = document.getElementById('connectModal');
    const modalContent = modal.querySelector('.modal-content');
    const closeBtn = modal.querySelector('.close');
    const msg = document.getElementById('confirmationMessage');

    // Open modal
    document.querySelectorAll('.connect-btn').forEach(btn => {
        btn.addEventListener('click', function(e){
            e.preventDefault();
            modal.classList.add('show');
            modalContent.style.opacity = 1;
            msg.style.display = 'none';
        });
    });

    // Close modal
    closeBtn.addEventListener('click', function(){
        modal.classList.remove('show');
        modalContent.style.opacity = 1;
        msg.style.display = 'none';
    });

    // Form submission
    document.getElementById('connectForm').addEventListener('submit', function(e){
        e.preventDefault();
        msg.style.display = 'block';
        modalContent.style.opacity = 1;

        // Slowly fade out the whole modal box after 4 seconds
        setTimeout(() => {
            modalContent.style.transition = 'opacity 4s ease';
            modalContent.style.opacity = 0;
            setTimeout(() => {
                modal.classList.remove('show');
                msg.style.display = 'none';
                modalContent.style.transition = 'transform 0.3s ease, opacity 4s ease';
                modalContent.style.opacity = 1;
            }, 4000);
        }, 500);
    });
</script>

</body>
</html>







<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/laravel_PetPal/resources/views/adopt.blade.php ENDPATH**/ ?>