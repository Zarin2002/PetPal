<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pet Services - PetConnect</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #fdfdfd;
            color: #333;
            overflow-x: hidden;
        }

        .topbar {
            background-color: #33abbdff;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
        }
        .topbar a { color: white; margin-left: 20px; text-decoration: none; font-weight: 500; }
        .topbar a:hover { text-decoration: underline; }

        .hero {
            background: url('https://images.unsplash.com/photo-1601758123927-61fc48f4e9c3?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
            color: white;
            text-align: center;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .hero::before {
            content: "";
            position: absolute;
            top:0; left:0; right:0; bottom:0;
            background: rgba(118, 207, 227, 0.7);
        }
        .hero-content { position: relative; z-index: 1; }
        .hero-content h1 { font-size: 36px; margin: 0; }
        .hero-content p { font-size: 18px; margin-top: 8px; }

        .section-title {
            padding: 30px 40px 10px;
            font-size: 24px;
            font-weight: bold;
            color: #1f3a93;
            position: relative;
            z-index: 2;
        }

        .services-section {
            background: url('https://images.yourstory.com/cs/2/a0bad530ce5d11e9a3fb4360e4b9139b/PetCover-01-1700495123028.png?mode=crop&crop=faces&ar=16%3A9&format=auto&w=1920&q=75') center/cover no-repeat;
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        .floating {
            position: absolute;
            width: 45px;
            opacity: 0.15;
            z-index: 1;
            animation: floatUp 18s linear infinite;
        }
        @keyframes floatUp {
            from { transform: translateY(100vh) rotate(0deg); }
            to { transform: translateY(-120vh) rotate(360deg); }
        }

        .cloud {
            position: absolute;
            background: #ffffffaa;
            border-radius: 50% 50% 60% 60%;
            filter: blur(6px);
            z-index: 0;
            animation: floatCloud 20s linear infinite;
        }
        @keyframes floatCloud {
            0% { transform: translateX(-200px); }
            50% { transform: translateX(200px); }
            100% { transform: translateX(-200px); }
        }

        .services-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
            position: relative;
            z-index: 2;
        }
        .service-card {
            background: linear-gradient(145deg, #fdfbfb, #f1f1f1);
            border-radius: 40px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
            text-align: center;
            padding: 30px 20px;
            transition: transform 0.4s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .service-card:hover {
            animation: wobble 0.6s ease;
        }
        @keyframes wobble {
            0% { transform: rotate(0deg); }
            25% { transform: rotate(2deg); }
            50% { transform: rotate(-2deg); }
            75% { transform: rotate(1deg); }
            100% { transform: rotate(0deg); }
        }

        .service-card img {
            width: 90px;
            height: 90px;
            margin-bottom: 20px;
            animation: floatIcon 3s ease-in-out infinite;
        }
        @keyframes floatIcon {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .service-card h3 {
            font-size: 20px;
            color: #1f3a93;
            margin-bottom: 10px;
        }
        .service-card p {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }
        .book-btn {
            background: #ff9ec7;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s;
        }
        .book-btn:hover { background: #e887b4; }

        .footer {
            text-align: center;
            padding: 20px;
            background: #1f3a93;
            color: white;
            margin-top: 40px;
        }

        /* Booking modal styles */
        #bookingModal {
            display: none;
            position: fixed;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }
        #bookingModal .modal-content {
            background:white;
            padding:40px;
            border-radius:25px;
            width:320px;
            text-align:center;
            position: relative;
        }
        #bookingModal .modal-content span.close {
            position:absolute;
            top:10px;
            right:15px;
            cursor:pointer;
            font-size:20px;
        }
        #bookingModal input, #bookingModal textarea {
            width:100%;
            padding:10px;
            margin:10px 0;
            border-radius:10px;
            border:1px solid #ccc;
        }
        #bookingModal button {
            background:#ff9ec7;
            color:white;
            border:none;
            padding:12px 20px;
            border-radius:25px;
            font-size:16px;
            cursor:pointer;
        }
        #bookingModal button:hover {
            background:#e887b4;
        }
        #bookingMessage {
            margin-top:15px;
            color:green;
            font-weight:bold;
        }
    </style>
</head>
<body>

    <!-- Topbar -->
    <div class="topbar">
        <div><strong>PetConnect</strong></div>
        <div>
            <a href="/">Home</a>
            <a href="<?php echo e(route('my-account')); ?>">My Account</a>
            <a href="#">Cart</a>
            <a href="#">Logout</a>
        </div>
    </div>

    <!-- Hero -->
    <div class="hero">
        <div class="hero-content">
            <h1>Pet Services</h1>
            <p>Find grooming, training, walking, and sitting services for your pets</p>
        </div>
        <div class="cloud" style="top:20%; left:5%; width:100px; height:60px; animation-delay:0s;"></div>
        <div class="cloud" style="top:35%; left:25%; width:140px; height:80px; animation-delay:3s;"></div>
        <div class="cloud" style="top:10%; left:60%; width:120px; height:70px; animation-delay:6s;"></div>
    </div>

    <!-- Services Section -->
    <div class="services-section">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" class="floating" style="left:15%; animation-delay:0s; width:35px;">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" class="floating" style="left:45%; animation-delay:6s; width:50px;">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" class="floating" style="left:75%; animation-delay:12s; width:40px;">

        <div class="section-title">Choose a Service</div>
        <div class="services-container">
            <?php
                $services = [
                    ['name'=>'Grooming','img'=>'https://cdn-icons-png.flaticon.com/512/616/616408.png','desc'=>'Bathing, nail clipping, styling, and full grooming packages to keep pets looking their best.'],
                    ['name'=>'Training','img'=>'https://cdn-icons-png.flaticon.com/512/3649/3649469.png','desc'=>'From puppy basics to advanced obedience — handled by certified trainers.'],
                    ['name'=>'Walking','img'=>'https://cdn-icons-png.flaticon.com/512/194/194279.png','desc'=>'Daily or occasional walks with GPS tracking, playtime, and care updates.'],
                    ['name'=>'Pet Sitting','img'=>'https://cdn-icons-png.flaticon.com/512/1998/1998611.png','desc'=>'Trusted sitters who provide love, feeding, and companionship while you’re away.']
                ];
            ?>

            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="service-card">
                <img src="<?php echo e($service['img']); ?>" alt="<?php echo e($service['name']); ?>">
                <h3><?php echo e($service['name']); ?></h3>
                <p><?php echo e($service['desc']); ?></p>
                <button class="book-btn" onclick="openBookingModal('<?php echo e($service['name']); ?>')">Book Now</button>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; 2025 PetConnect. All Rights Reserved.
    </div>

    <!-- Booking Modal -->
    <div id="bookingModal">
        <div class="modal-content">
            <span class="close" onclick="closeBookingModal()">&times;</span>
            <h2 id="modalServiceTitle" style="color:#1f3a93; margin-bottom:20px;">Booking</h2>
            <form id="bookingForm">
                <?php echo csrf_field(); ?>
                <div id="bookingFields">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <textarea name="notes" placeholder="Any notes..." rows="3"></textarea>
                    <input type="hidden" name="service" id="modalServiceInput">
                    <button type="submit">Confirm Booking</button>
                </div>
            </form>
            <div id="bookingMessage"></div>
        </div>
    </div>

    <script>
        function openBookingModal(serviceName) {
            document.getElementById('bookingModal').style.display = 'flex';
            document.getElementById('modalServiceTitle').innerText = serviceName + " Booking";
            document.getElementById('modalServiceInput').value = serviceName;
            document.getElementById('bookingMessage').innerText = '';
            document.getElementById('bookingFields').style.display = 'block'; // Show fields again if modal reopened
        }

        function closeBookingModal() {
            document.getElementById('bookingModal').style.display = 'none';
        }

        document.getElementById('bookingForm').addEventListener('submit', function(e){
            e.preventDefault();
            // Hide form fields
            document.getElementById('bookingFields').style.display = 'none';
            // Show thank you message
            document.getElementById('bookingMessage').innerText = "Thank you for booking us! Wait for our message.";
        });
    </script>

</body>
</html>




<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/laravel_PetPal/resources/views/pet-services.blade.php ENDPATH**/ ?>