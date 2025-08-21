<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Pet Care - PetConnect</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;800&display=swap" rel="stylesheet">

    <style>
        body { 
            margin: 0; 
            font-family: 'Segoe UI', sans-serif; 
            background: url("https://img.freepik.com/premium-vector/seamless-pattern-with-cute-cartoon-dogs-puppies-bones-paw-prints-blue-background_579956-558.jpg") repeat;
            background-size: 250px; 
            color: #333;
        }
        .header { 
            background: linear-gradient(135deg, #2a5bd7, #4e8ef7); 
            color: white; 
            padding: 40px; 
            text-align: center; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .header h1 { margin: 0; font-size: 36px; }
        .header p { margin: 5px 0 0; font-size: 18px; opacity: 0.9; }

/* First, include the Google Font in your <head> */

/* Then update the section-title style */
        .section-title { 
          padding: 30px 20px 10px; 
          font-size: 32px; 
          font-weight: 800; 
          text-align: center; 
          color:rgb(111, 53, 35);
          font-family: 'Poppins', sans-serif;  /* New font */
          letter-spacing: 1px;
        }


        .cards { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); 
            gap: 25px; 
            padding: 20px 40px 60px; 
        }

        .card { 
            background: white; 
            border-radius: 16px; 
            box-shadow: 0 6px 14px rgba(0,0,0,0.1); 
            text-align: center; 
            padding: 25px; 
            transition: 0.3s ease-in-out; 
            position: relative;
        }
        .card:hover { transform: translateY(-6px); box-shadow: 0 10px 20px rgba(0,0,0,0.15); }

        .card img { 
            width: 90px; 
            height: 90px; 
            margin-bottom: 12px; 
            filter: drop-shadow(0 2px 3px rgba(0,0,0,0.2)); 
        }

        .card h3 { 
            margin: 10px 0; 
            font-size: 20px; 
            color: #2a5bd7; 
        }
        .card p { 
            font-size: 14px; 
            color: #666; 
            margin-bottom: 15px; 
        }

        .card input, .card textarea, .card select {
            margin: 8px 0; 
            padding: 10px; 
            width: 95%; 
            border: 1px solid #ccc; 
            border-radius: 8px; 
            font-size: 14px; 
            transition: 0.2s;
        }
        .card input:focus, .card textarea:focus {
            border-color: #2a5bd7; 
            box-shadow: 0 0 4px rgba(42,91,215,0.4); 
            outline: none;
        }

        .card button { 
            background-color: #2a5bd7; 
            color: white; 
            border: none; 
            padding: 10px 15px; 
            border-radius: 8px; 
            cursor: pointer; 
            font-size: 14px;
            transition: all 0.2s ease-in-out;
            width: 100%;
        }
        .card button:hover { background-color: #1a3cae; transform: scale(1.03); }

        .display-box { 
            text-align: left; 
            margin-top: 15px; 
            padding: 15px; 
            border-radius: 10px; 
            background: #f9faff; 
            border: 1px solid #e1e6f5;
        }
        .display-box p { margin: 8px 0; font-size: 15px; }
        .edit-btn { background-color: #ff9800 !important; }
        .edit-btn:hover { background-color: #e68900 !important; }

        .footer { 
            text-align: center; 
            padding: 25px; 
            background: linear-gradient(135deg, #2a5bd7, #4e8ef7); 
            color: white; 
            font-size: 14px; 
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>🐾 Pet Care Dashboard</h1>
        <p>Manage your pet's health, diet, and reminders beautifully.</p>
    </div>

    <div class="section-title">✨ Pet Care Features</div>
    <div class="cards">
        <!-- Pet Profile -->
        <div class="card" id="pet-card">
            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Profile">
            <h3>Pet Profiles</h3>
            <p>Add and manage all information about your pets.</p>

            <form class="form">
                <input type="text" name="name" placeholder="Pet Name" required>
                <input type="text" name="type" placeholder="Type (Dog/Cat)" required>
                <input type="number" name="age" placeholder="Age" required>
                <button type="submit">Add Profile</button>
            </form>

            <div class="display-box" style="display:none;">
                <p><strong>Name:</strong> <span class="out-name"></span></p>
                <p><strong>Type:</strong> <span class="out-type"></span></p>
                <p><strong>Age:</strong> <span class="out-age"></span></p>
                <button type="button" class="edit-btn">Edit Profile</button>
            </div>
        </div>

        <!-- Health Logs -->
        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/616/616430.png" alt="Health">
            <h3>Health Logs</h3>
            <p>Track vaccinations, medications, and vet visits.</p>

            <form class="form">
              <input type="number" name="pet_id" placeholder="Pet ID" required>
              <input type="text" name="title" placeholder="Log Title" required>
              <input type="date" name="date" required>
              <textarea name="notes" placeholder="Notes"></textarea>
              <button type="submit">Add Health Log</button>
            </form>

            <div class="display-box" style="display:none;">
                <p><strong>Pet ID:</strong> <span class="out-pet_id"></span></p>
                <p><strong>Title:</strong> <span class="out-title"></span></p>
                <p><strong>Date:</strong> <span class="out-date"></span></p>
                <p><strong>Notes:</strong> <span class="out-notes"></span></p>
                <button type="button" class="edit-btn">Edit Log</button>
            </div>
        </div>

        <!-- Feeding -->
        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Feeding">
            <h3>Feeding Schedule</h3>
            <p>Set feeding times and monitor diet plans.</p>

            <form class="form">
              <input type="number" name="pet_id" placeholder="Pet ID" required>
              <input type="time" name="feeding_time" required>
              <input type="text" name="food" placeholder="Food Details" required>
              <button type="submit">Set Feeding</button>
            </form>

            <div class="display-box" style="display:none;">
                <p><strong>Pet ID:</strong> <span class="out-pet_id"></span></p>
                <p><strong>Time:</strong> <span class="out-feeding_time"></span></p>
                <p><strong>Food:</strong> <span class="out-food"></span></p>
                <button type="button" class="edit-btn">Edit Feeding</button>
            </div>
        </div>

        <!-- Reminders -->
        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828640.png" alt="Reminders">
            <h3>Reminders</h3>
            <p>Receive alerts for vaccines, grooming, and appointments.</p>

            <form class="form">
               <input type="number" name="pet_id" placeholder="Pet ID" required>
               <input type="text" name="title" placeholder="Reminder Title" required>
               <input type="date" name="reminder_date" required>
               <textarea name="notes" placeholder="Notes"></textarea>
               <button type="submit">Add Reminder</button>
            </form>

            <div class="display-box" style="display:none;">
                <p><strong>Pet ID:</strong> <span class="out-pet_id"></span></p>
                <p><strong>Title:</strong> <span class="out-title"></span></p>
                <p><strong>Date:</strong> <span class="out-reminder_date"></span></p>
                <p><strong>Notes:</strong> <span class="out-notes"></span></p>
                <button type="button" class="edit-btn">Edit Reminder</button>
            </div>
        </div>
    </div>

    <div class="footer">
        &copy; 2025 PetConnect. All rights reserved.
    </div>

    <script>
    // Generic toggle for all cards
    document.querySelectorAll(".card").forEach(card => {
        const form = card.querySelector(".form");
        const displayBox = card.querySelector(".display-box");
        const editBtn = card.querySelector(".edit-btn");

        if(form){
            form.addEventListener("submit", function(e){
                e.preventDefault();

                // Fill display spans with input values
                form.querySelectorAll("input, textarea, select").forEach(input => {
                    let out = displayBox.querySelector(".out-" + input.name);
                    if(out) out.textContent = input.value;
                });

                form.style.display = "none";
                displayBox.style.display = "block";
            });
        }

        if(editBtn){
            editBtn.addEventListener("click", function(){
                form.style.display = "block";
                displayBox.style.display = "none";
            });
        }
    });
    </script>

</body>
</html>






<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/laravel_PetPal/resources/views/auth/pet_care.blade.php ENDPATH**/ ?>