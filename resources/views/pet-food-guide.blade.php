<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pet Food Guide - PetConnect</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f5f5f5;
        }

        .header {
            background: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1950&q=80') center/cover no-repeat;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.7);
        }

        .header h1 {
            font-size: 40px;
        }

        .container {
            padding: 40px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            height: 180px;
            background-size: cover;
            background-position: center;
        }

        .dog {
            background-image: url('https://cdn.pixabay.com/photo/2020/03/31/19/20/dog-4988985_640.jpg');
        }

        .cat {
            background-image: url('https://images.unsplash.com/photo-1574158622682-e40e69881006?auto=format&fit=crop&w=1000&q=80');
        }

        .rabbit {
            background-image: url('https://cdn.britannica.com/20/194520-050-DCAE62F1/New-World-Sylvilagus-cottontail-rabbits.jpg?w=400&h=225&c=crop');
        }

        .card-body {
            padding: 20px;
        }

        .card-body h2 {
            margin-top: 0;
            color: #2a5bd7;
            font-size: 22px;
        }

        .card-body h3 {
            margin-bottom: 5px;
            color: #333;
            font-size: 16px;
        }

        .card-body ul {
            padding-left: 20px;
            color: #555;
            line-height: 1.6;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background: #2a5bd7;
            color: white;
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <div class="header">
        <h1>Pet Food Guide</h1>
    </div>

    <!-- Content Section -->
    <div class="container">

        <!-- Dog Card -->
        <div class="card">
            <div class="card-header dog"></div>
            <div class="card-body">
                <h2>Dog Food Guide</h2>
                <h3>✅ Safe Foods:</h3>
                <ul>
                    <li>Cooked chicken, beef, turkey</li>
                    <li>Rice, pasta, plain potatoes</li>
                    <li>Carrots, apples (no seeds), blueberries</li>
                    <li>Peanut butter (xylitol-free)</li>
                </ul>
                <h3>❌ Harmful Foods:</h3>
                <ul>
                    <li>Chocolate, grapes, raisins</li>
                    <li>Onions, garlic</li>
                    <li>Alcohol, caffeine</li>
                    <li>Cooked bones</li>
                </ul>
                <h3>🍼 Pregnancy Nutrition:</h3>
                <ul>
                    <li>High-quality puppy food (more calories and nutrients)</li>
                    <li>Cooked eggs (protein boost)</li>
                    <li>Boiled chicken or beef mixed with rice</li>
                    <li>Omega-3 rich fish like salmon (boneless and cooked)</li>
                </ul>
            </div>
        </div>

        <!-- Cat Card -->
        <div class="card">
            <div class="card-header cat"></div>
            <div class="card-body">
                <h2>Cat Food Guide</h2>
                <h3>✅ Safe Foods:</h3>
                <ul>
                    <li>Cooked fish (salmon, tuna)</li>
                    <li>Boiled chicken (no bones)</li>
                    <li>Pumpkin (plain), carrots</li>
                    <li>Rice in small amounts</li>
                </ul>
                <h3>❌ Harmful Foods:</h3>
                <ul>
                    <li>Milk (many cats are lactose intolerant)</li>
                    <li>Onions, garlic, chives</li>
                    <li>Chocolate, caffeine</li>
                    <li>Dog food (long-term)</li>
                </ul>
                <h3>🍼 Pregnancy Nutrition:</h3>
                <ul>
                    <li>Kitten-formula wet/dry food (higher in nutrients)</li>
                    <li>Boiled egg yolks (for protein & choline)</li>
                    <li>Small portions of cooked liver (iron-rich)</li>
                    <li>Cooked salmon for omega-3 support</li>
                </ul>
            </div>
        </div>

        <!-- Rabbit Card -->
        <div class="card">
            <div class="card-header rabbit"></div>
            <div class="card-body">
                <h2>Rabbit Food Guide</h2>
                <h3>✅ Safe Foods:</h3>
                <ul>
                    <li>Fresh hay (main diet)</li>
                    <li>Leafy greens (romaine, kale)</li>
                    <li>Carrot tops, parsley, basil</li>
                    <li>Small fruit pieces (banana, apple)</li>
                </ul>
                <h3>❌ Harmful Foods:</h3>
                <ul>
                    <li>Iceberg lettuce</li>
                    <li>Bread, crackers</li>
                    <li>Chocolate, candy</li>
                    <li>Meat or dairy products</li>
                </ul>
                <h3>🍼 Pregnancy Nutrition:</h3>
                <ul>
                    <li>Unlimited high-quality alfalfa hay (extra calcium & protein)</li>
                    <li>Pellets with high fiber and protein content</li>
                    <li>Fresh dark greens (spinach, dandelion greens)</li>
                    <li>Oats in small amounts for energy</li>
                </ul>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; 2025 PetConnect. All rights reserved.
    </div>

</body>
</html>


