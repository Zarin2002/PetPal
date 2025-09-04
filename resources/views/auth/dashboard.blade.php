<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PetConnect Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            /* Light shiny blue gradient background */
            background: linear-gradient(135deg, #e0f8ff, #c0eaff);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
            color: #333;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Top Navigation */
        .topbar {
            background-color: #1f3a93;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
            box-shadow: 0 0 15px rgba(0,180,255,0.6); /* Neon glow */
        }
        .topbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: 500;
            transition: 0.3s;
        }
        .topbar a:hover { text-decoration: underline; }

        /* Hero Section */
        .hero {
            background: url('https://images.unsplash.com/photo-1558788353-f76d92427f16?auto=format&fit=crop&w=1950&q=80') center/cover no-repeat;
            color: white;
            text-align: center;
            position: relative;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            box-shadow: 0 0 20px rgba(0,180,255,0.3);
        }
        .hero::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(31,58,147,0.6);
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }
        .hero-content { position: relative; z-index: 1; }
        .hero-content h1 { font-size: 38px; margin-bottom: 10px; font-weight: 700; }
        .hero-content p { font-size: 18px; }

        /* Section Titles */
        .section-title {
            padding: 30px 40px 10px;
            font-size: 24px;
            font-weight: bold;
            color: #1f3a93;
            text-shadow: 0 0 5px rgba(0,180,255,0.7);
        }

        /* Pet Stories Section */
        .pet-stories-wrapper {
            padding: 40px 0;
            background: #eef1f6;
        }
        .stories-carousel-container {
            position: relative;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 0 60px;
        }
        .stories-carousel-container::-webkit-scrollbar {
          display: none;
        }  
        .stories-carousel-track {
            display: flex;
            gap: 20px;
            transition: transform 0.5s ease;
        }
        .story-card {
            min-width: 320px;
            height: 220px;
            border-radius: 20px;
            background-size: cover;
            background-position: center;
            flex-shrink: 0;
            position: relative;
            /* Neon blue glow */
            box-shadow: 0 4px 15px rgba(0,150,255,0.5);
            transition: box-shadow 0.3s ease;
        }
        .story-card:hover { 
            box-shadow: 0 6px 25px rgba(0,180,255,0.7); 
        }
        .story-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(31,58,147,0.85);
            color: white;
            padding: 15px;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 0 8px rgba(0,180,255,0.4);
        }
        .story-overlay h4 { margin: 0 0 5px; font-size: 18px; }
        .story-overlay p { font-size: 14px; margin: 0; }
        .stories-carousel-container .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 28px;
            background: rgba(31,58,147,0.7);
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            z-index: 10;
            transition: 0.3s;
        }
        .stories-carousel-container .arrow.left { left: 10px; }
        .stories-carousel-container .arrow.right { right: 10px; }
        .stories-carousel-container .arrow:hover { background: rgba(31,58,147,0.9); }

        /* Feature Section */
        .features {
            padding: 0 40px 40px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }
        .card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
            padding: 25px 15px;
            transition: 0.3s;
            box-shadow: 0 0 10px rgba(0,150,255,0.3);
        }
        .card:hover { transform: translateY(-7px); box-shadow: 0 8px 20px rgba(0,180,255,0.5); }
        .card img { width: 80px; height: 80px; margin-bottom: 15px; }
        .card h3 { margin: 10px 0; font-size: 18px; color: #1f3a93; }
        .card p { font-size: 14px; color: #555; }

        /* News Carousel Section */
        .news-carousel-wrapper { position: relative; padding: 20px 40px 40px; }
        .news-carousel {
            display: flex;
            overflow-x: auto;
            gap: 20px;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
        }
        .news-item {
            min-width: 350px;
            height: 250px;
            border-radius: 15px;
            background-size: cover;
            background-position: center;
            flex-shrink: 0;
            position: relative;
            scroll-snap-align: start;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .news-item:hover { transform: scale(1.05); box-shadow: 0 8px 20px rgba(0,180,255,0.5); }
        .news-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(31,58,147,0.8);
            color: white;
            border-radius: 0 0 15px 15px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,180,255,0.3);
        }
        .news-overlay h4 { margin: 0 0 10px; font-size: 20px; }
        .news-overlay p { font-size: 14px; margin-bottom: 10px; }
        .news-overlay a { color: #ffeb3b; font-weight: bold; text-decoration: none; }
        .news-overlay a:hover { text-decoration: underline; }
        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 30px;
            background: rgba(31,58,147,0.7);
            color: white;
            border: none;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            cursor: pointer;
            z-index: 10;
            transition: 0.3s;
        }
        .arrow.left { left: 10px; }
        .arrow.right { right: 10px; }
        .arrow:hover { background: rgba(31,58,147,0.9); }
        .news-carousel::-webkit-scrollbar { display: none; }
        .news-carousel { -ms-overflow-style: none; scrollbar-width: none; }

        /* Suggested Books Section */
        .book-list-container {
            max-height: 80vh; 
            overflow-y: auto;
            padding: 0 40px 40px;
        }
        .book-list { display: flex; flex-direction: column; gap: 20px; }
        .book-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 20px 25px;
            transition: 0.3s;
            display: flex;
            align-items: flex-start;
            gap: 20px;
            box-shadow: 0 0 8px rgba(0,150,255,0.3);
        }
        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,180,255,0.5);
        }
        .book-card img { width:120px; height:160px; border-radius: 10px; object-fit: cover; }
        .book-name { font-size: 22px; font-weight: bold; margin-bottom: 5px; color: #1f3a93; }
        .book-meta { font-size: 14px; color: #555; margin-bottom: 10px; }
        .book-summary { font-size: 16px; color: #333; }

        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            background: #1f3a93;
            color: white;
            margin-top: 40px;
            box-shadow: 0 0 15px rgba(0,180,255,0.6); /* Neon glow */
        }
    </style>
</head>
<body>

<!-- Keep the rest of your HTML content here exactly as before -->


</html>


    <!-- Top Navigation -->
    <div class="topbar">
        <div><strong>PetConnect</strong></div>
        <div>
            <a href="#">Home</a>
            <a href="{{ route('my-account') }}">My Account</a>
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

    <!-- Pet Stories Section -->
    <div class="pet-stories-wrapper">
        <div class="section-title">Pet Adoption Stories</div>
        <div class="stories-carousel-container">
            <div class="stories-carousel-track">
                <!-- Story Cards -->
                <div class="story-card" style="background-image: url('https://people.com/thmb/Oq4slJ0-87pMWJL0ymCxpJbRC20=/4000x0/filters:no_upscale():max_bytes(150000):strip_icc():focal(749x0:751x2):format(webp)/scout-lori-watson-082925-1-bee2e3825d164e7e9d56f3a992b717fa.jpg');">
                    <div class="story-overlay">
                        <h4>Max & Sarah</h4>
                        <p>Found Max at a local shelter. Now they are inseparable!</p>
                        <a href="https://people.com/woman-adopts-her-late-dogs-brother-who-shares-his-same-mannerisms-exclusive-11800521?utm_source=chatgpt.com">Read More</a>
                    </div>
                </div>
                <div class="story-card" style="background-image: url('https://www.operationkindness.org/wp-content/uploads/wilson-success-story-operation-kindness-no-kill-animal-shelter.jpg');">
                    <div class="story-overlay">
                        <h4>Luna & Mike</h4>
                        <p>Luna was shy at first, but now she loves playtime in the park.</p>
                        <a href="https://www.operationkindness.org/success-stories/?utm_source=chatgpt.com">Read More</a>
                    </div>
                </div>
                <div class="story-card" style="background-image: url('https://bestfriends.org/sites/default/files/styles/image_small/public/image/NWA_Riley.png?itok=hJJbeE9U');">
                    <div class="story-overlay">
                        <h4>Charlie & Emma</h4>
                        <p>Charlie came home with Emma and instantly warmed up to everyone.</p>
                    </div>
                </div>
                <div class="story-card" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/1/16/ScarlettTheCat.jpg');">
                    <div class="story-overlay">
                        <h4>Bella & Jack</h4>
                        <p>Bella is now a loyal companion for Jack and his family.</p>
                    </div>
                </div>
                <div class="story-card" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/c/cf/Cockatielmale.jpg');">
                    <div class="story-overlay">
                        <h4>Milo & Anna</h4>
                        <p>Milo has become the happiest member of Anna’s home.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feature Section -->
    <div class="section-title">Explore Features</div>
    <div class="features">
        <a href="{{ route('adopt') }}" style="text-decoration: none;">
            <div class="card">
                <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Adopt">
                <h3>Adopt a Pet</h3>
                <p>Browse adoptable pets by breed, age, and location. Connect with shelters easily.</p>
            </div>
        </a>
        <a href="{{ route('vet.finder') }}"style="text-decoration: none;">
            <div class="card">
                <img src="https://cdn-icons-png.flaticon.com/512/3062/3062634.png" alt="Vet">
                <h3>Vet Finder & Booking</h3>
                <p>Find nearby veterinarians, read reviews, and book appointments online.</p>
            </div>
        </a>
        <a href="{{ route('pet.care') }}" style="text-decoration: none;">
            <div class="card">
                <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Care">
                <h3>Pet Care</h3>
                <p>Manage pet profiles, health logs, vaccination dates, and feeding schedules.</p>
            </div>
        </a>
        <a href="{{ route('filter.search') }}" style="text-decoration: none;">
            <div class="card">
                <img src="https://cdn-icons-png.flaticon.com/512/1087/1087815.png" alt="Pet Shop">
                <h3>Pet Shop</h3>
                <p>Find pet accessories, food, and supplies easily. Browse and shop online.</p>
            </div>
        </a>
        <a href="{{ route('pet.social.wall') }}" style="text-decoration: none;">
          <div class="card">
             <img src="https://cdn-icons-png.flaticon.com/512/1828/1828490.png" alt="Social">
             <h3>Pet Social Wall</h3>
             <p>Share pet pictures and stories. Like and comment with other pet lovers.</p>
          </div>
        </a>
        <a href="{{ route('pet.food.guide') }}" style="text-decoration: none;">
            <div class="card">
                <img src="https://cdn-icons-png.flaticon.com/512/1345/1345874.png" alt="Food Guide">
                <h3>Pet Food Guide</h3>
                <p>Help users understand which foods are good or harmful.</p>
            </div>
        </a>
        <a href="{{ route('pet.services') }}" style="text-decoration: none;">
          <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/512/1375/1375106.png" alt="Service">
            <h3>Pet Services</h3>
            <p>Access grooming, training, walking, and sitting services for pets.</p>
          </div>
        </a>
    </div>

    <!-- News Carousel Section -->
    <div class="section-title">Latest Pet News</div>
    <div class="news-carousel-wrapper">
        <div class="news-carousel">
            <div class="news-item" style="background-image: url('https://firebasestorage.googleapis.com/v0/b/telavets-new.firebasestorage.app/o/blog-images%2FComplete%20Vaccine%20Guide%20for%20Every%20Dog%20%26%20Cat%20Owner.webp?alt=media&token=05f5a4f1-cbf5-4adf-a348-307434f08767');">
                <div class="news-overlay">
                    <h4>New Vaccine Released</h4>
                    <p>A new vaccine has come out! Check the info and article for more details.</p>
                    

                    <a href="https://www.telavets.com/blog/pet-vaccine-guide?srsltid=AfmBOoq63-RfCklct6CjvcLKbXCz5Man_M632pSBAEfM6XD98kO1YglL&utm_source=chatgpt.com">Read More</a>
                </div>
            </div>
            <div class="news-item" style="background-image: url(https://nypost.com/wp-content/uploads/sites/2/2025/05/happy-young-arab-man-stroking-104467184.jpg?resize=2048,1365&quality=75&strip=all);">
                <div class="news-overlay">
                    <h4>Pet Nutrition Tips</h4>
                    <p>Learn how to improve your pet's diet and keep them healthy and active.</p>
                    <a href="https://nypost.com/2025/05/14/lifestyle/dog-owners-claims-pets-health-is-just-as-important-as-their-own/?utm_source=chatgpt.com">Read More</a>
                </div>
            </div>
            <div class="news-item" style="background-image: url(https://petsmartcharities.org/sites/default/files/2025-02/LeAnneSammy_NAWevent.webp);">
                <div class="news-overlay">
                    <h4>Upcoming Pet Event</h4>
                    <p>Join local pet events and meet other pet lovers near you.</p>
                    <a href="https://petsmartcharities.org/adopt-a-pet/adoption-events?utm_source=chatgpt.com">Read More</a>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Suggested Books Section -->
    <div class="section-title">Suggested Books for Pet Care</div>
    <div class="book-list-container">
        <div class="book-list">
            <div class="book-card">
               <a href="https://static1.squarespace.com/static/612ee136efc1241e1fcc567e/t/628494567f27576f9196d082/1652855922081/Dog-Owners-Home-Veterinary-Handbook.pdf?utm_source=chatgpt.com" target="_blank" style="text-decoration: none;">
                <img src="https://toukleyvet.com.au/wp-content/uploads/sites/26/2023/05/Puppy-Book-pdf-729x1024-729x1024-1-e1751865657298.jpg" alt="Puppy Care">
                <div>
                    <div class="book-name">Caring for Your Puppy eBook</div>
                    <div class="book-meta">Author: Jane Smith | Publisher: PawPress | Year: 2021</div>
                    <div class="book-summary">A comprehensive guide to raising puppies from birth, covering nutrition, training, and socialization.</div>
                </div>
            </div>
            <div class="book-card">
               <a href="https://toukleyvet.com.au/wp-content/uploads/sites/26/2023/05/Kitten-book.pdf" target="_blank" style="text-decoration: none;">
                <img src="https://toukleyvet.com.au/wp-content/uploads/sites/26/2023/05/Kitten-book-pdf-724x1024-724x1024-1-e1751865672609.jpg" alt="Kitten Care">
                <div>
                    <div class="book-name">Kitten Care eBook</div>
                    <div class="book-meta">Author: Tom Johnson | Publisher: FelineWorld | Year: 2019</div>
                    <div class="book-summary">Detailed advice for new kitten owners, including feeding schedules, health checks, and behavioral tips.</div>
                </div>
            </div>
            <div class="book-card">
               <a href="https://toukleyvet.com.au/wp-content/uploads/sites/26/2023/05/Bird-Care.pdf" target="_blank" style="text-decoration: none;"> 
                <img src="https://toukleyvet.com.au/wp-content/uploads/sites/26/2023/05/Bird-Care-pdf-724x1024-724x1024-1-e1751865743993.jpg" alt="Pet Health">
                <div>
                    <div class="book-name">Bird Care eBook</div>
                    <div class="book-meta">Author: Lisa Brown | Publisher: PetHealth | Year: 2020</div>
                    <div class="book-summary">Focuses on maintaining pet health from birth to adulthood with diet, exercise, and preventive care.</div>
                </div>
            </div>
            <div class="book-card">
               <a href="https://toukleyvet.com.au/wp-content/uploads/sites/26/2023/05/Desexing.pdf" target="_blank" style="text-decoration: none;"> 
                <img src="https://toukleyvet.com.au/wp-content/uploads/sites/26/2023/05/Desexing-pdf-724x1024-724x1024-1-e1751865689102.jpg" alt="Dog Training">
                <div>
                    <div class="book-name">Desexing eBook</div>
                    <div class="book-meta">Author: Mark Wilson | Publisher: DogCare | Year: 2022</div>
                    <div class="book-summary">Step-by-step training techniques suitable for puppies and adult dogs to encourage positive behavior.</div>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; 2025 PetConnect. All Rights Reserved.
    </div>

<script>
const track = document.querySelector('.stories-carousel-track');
const leftArrow = document.querySelector('.stories-carousel-container .arrow.left');
const rightArrow = document.querySelector('.stories-carousel-container .arrow.right');

const card = document.querySelector('.story-card');
const cardStyle = window.getComputedStyle(card);
const gap = parseInt(cardStyle.marginRight); // gap between cards
const cardWidth = card.offsetWidth + gap;

leftArrow.addEventListener('click', () => {
    track.scrollBy({ left: -cardWidth, behavior: 'smooth' });
});

rightArrow.addEventListener('click', () => {
    track.scrollBy({ left: cardWidth, behavior: 'smooth' });
});
</script>






</body>
</html>







