<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PetConnect Dashboard</title>
    <style>
        body { margin: 0; font-family: 'Segoe UI', sans-serif; background-color: #f6f6f6; }

        .topbar {
            background-color: #2a5bd7;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
        }
        .topbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: 500;
        }

        .hero {
            background: url('https://images.unsplash.com/photo-1558788353-f76d92427f16?auto=format&fit=crop&w=1950&q=80') center/cover no-repeat;
            color: white;
            text-align: center;
            position: relative;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.4);
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
        .hero-content h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }
        .hero-content p {
            font-size: 18px;
        }

        .section-title {
            padding: 30px 40px 10px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .features {
            padding: 0 40px 40px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
            padding: 20px;
            transition: 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card img {
            width: 80px;
            height: 80px;
            margin-bottom: 10px;
        }
        .card h3 {
            margin: 10px 0;
            font-size: 18px;
            color: #2a5bd7;
        }
        .card p {
            font-size: 14px;
            color: #555;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background: #2a5bd7;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Top Navigation -->
    <div class="topbar">
        <div><strong>PetConnect</strong></div>
        <div>
            <a href="#">Home</a>
            <a href="#">My Account</a>
            <a href="#">Cart</a>
            <a href="#">Logout</a>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <h1>Care for Your Pet the Smart Way</h1>
            <p>All-in-one tools to adopt, care, and connect with your furry friends.</p>
        </div>
    </div>

    <!-- Feature Section -->
    <div class="section-title">Explore Features</div>
    <div class="features">

        <a href="<?php echo e(route('adopt')); ?>" style="text-decoration: none;">
          <div class="card">
           <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Adopt">
           <h3>Adopt a Pet</h3>
           <p>Browse adoptable pets by breed, age, and location. Connect with shelters easily.</p>
          </div>
        </a>

        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/3062/3062634.png" alt="Vet">
            <h3>Vet Finder & Booking</h3>
            <p>Find nearby veterinarians, read reviews, and book appointments online.</p>
        </div>

        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Care">
            <h3>Pet Care</h3>
            <p>Manage pet profiles, health logs, vaccination dates, and feeding schedules.</p>
        </div>

        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/1076/1076880.png" alt="Shop">
            <h3>Pet Shop</h3>
            <p>Shop for pet food, accessories, and grooming tools. Support subscriptions.</p>
        </div>

        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828490.png" alt="Social">
            <h3>Pet Social Wall</h3>
            <p>Share pet pictures and stories. Like and comment with other pet lovers.</p>
        </div>

        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/3318/3318703.png" alt="Blog">
            <h3>Pet Tips & Blogs</h3>
            <p>Read expert articles on pet care, training, nutrition, and emergencies.</p>
        </div>

        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/1087/1087815.png" alt="Filter">
            <h3>Filter & Search</h3>
            <p>Find pet accessories and filter items easily.</p>
        </div>

        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828753.png" alt="Dashboard">
            <h3>Dashboard</h3>
            <p>Contain all profile info and pet-related facilities.</p>
        </div>

        <a href="<?php echo e(route('pet.food.guide')); ?>" style="text-decoration: none;">
          <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/1345/1345874.png" alt="Food Guide">
            <h3>Pet Food Guide</h3>
            <p>Help users understand which foods are good or harmful.</p>
          </div>
        </a>

  
        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/1375/1375106.png" alt="Service">
            <h3>Pet Services</h3>
            <p>Access grooming, training, walking, and sitting services for pets.</p>
        </div>

    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; 2025 PetConnect. All rights reserved.
    </div>

</body>
</html>


<?php /**PATH /Users/mohammadkamruzzamanmiah/laravel_PetPal/resources/views/auth/dashboard.blade.php ENDPATH**/ ?>