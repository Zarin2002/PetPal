@extends('layouts.app')

@section('content')
<div class="vet-container">
    <h1>🐾 Vet Finder & Booking 🐶🐱</h1>
    <p class="subtext">Find the best veterinarians near you and book an appointment instantly.</p>

    <!-- Floating Paws -->
<!-- Floating Paws: only 4 corners -->
    <div class="floating-paw paw-top-left">🐾</div>
    <div class="floating-paw paw-top-right">🐾</div>
    <div class="floating-paw paw-bottom-left">🐾</div>
    <div class="floating-paw paw-bottom-right">🐾</div>

    <div class="vet-grid">
        <!-- Example Vet Clinic 1 -->
        <div class="vet-card">
            <img src="https://media.licdn.com/dms/image/v2/D5612AQHsHZPwXfG8Ng/article-cover_image-shrink_720_1280/B56ZhVGsnCHkAI-/0/1753774476374?e=2147483647&v=beta&t=bANUCpB5I86j7okDN_rvc7SryP3i1G9O1n1Zbfz9RIE" alt="Happy Paws" class="vet-img">
            <h3>Happy Paws Veterinary Clinic 🐾</h3>
            <p>📍 123 Pet Street, Cityville</p>
            <p>⭐ 4.8 / 5 <span class="paws">🐾🐾🐾🐾🐾</span> (120 reviews)</p>
            <button class="book-btn">Book Appointment 🗓️</button>
        </div>

        <!-- Example Vet Clinic 2 -->
        <div class="vet-card">
            <img src="https://tploinfo.com/wp-content/uploads/2021/11/glen-carrie-DEOitCl9mtg-unsplash.jpg" alt="Pawfect Care" class="vet-img">
            <h3>Pawfect Care Animal Hospital 🐕🐈</h3>
            <p>📍 456 Furry Lane, Petland</p>
            <p>⭐ 4.6 / 5 <span class="paws">🐾🐾🐾🐾</span> (98 reviews)</p>
            <button class="book-btn">Book Appointment 🗓️</button>
        </div>

        <!-- Example Vet Clinic 3 -->
        <div class="vet-card">
            <img src="https://www.thedogclinic.com/wp-content/uploads/2023/06/dog-tail-meaning.jpg" alt="Healing Tails" class="vet-img">
            <h3>Healing Tails Vet Center 🐶💖</h3>
            <p>📍 789 Woof Avenue, Dogtown</p>
            <p>⭐ 4.9 / 5 <span class="paws">🐾🐾🐾🐾🐾</span> (150 reviews)</p>
            <button class="book-btn">Book Appointment 🗓️</button>
        </div>


        <div class="vet-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSviV1ZVCGtNPw8iLAIMI-l8AmZwqqUvCfUCcaaV1NNwnUdcz9ExLxEfA2LQ3pysKOglNU&usqp=CAU" alt="Bird Haven Vet" class="vet-img">
            <h3>Bird Haven Veterinary Clinic 🦜</h3>
            <p>📍 321 Feather Lane, Aviary City</p>
            <p>⭐ 4.7 / 5 <span class="paws">🦜🦜🦜🦜🦜</span> (85 reviews)</p>
            <button class="book-btn">Book Appointment 🗓️</button>
        </div>

        <div class="vet-card">
           <img src="https://iahcf.com/uploads/SiteAssets/807/images/services/exotic-pets-integrative-animal-hospital-of-central-florida.jpg" alt="Exotic Pet Care" class="vet-img">
           <h3>Exotic  Pet  Care  Center  🐢🐍🐢🐍 </h3>
           <p>📍 654 Jungle Street, Reptile Town</p>
           <p>⭐ 4.8 / 5 <span class="paws">🐢🐢🐢🐢🐢</span> (92 reviews)</p>
           <button class="book-btn">Book Appointment 🗓️</button>
        </div>

        <div class="vet-card">
           <img src="https://media.istockphoto.com/id/1297963192/photo/close-up-of-cute-baby-rabbit.jpg?s=612x612&w=0&k=20&c=TuRZKZXZ9ejOWf_IRu2uSdHPzdzqnv3eTw_N6OQ7sQ8=" alt="Small Animal Clinic" class="vet-img">
           <h3>Small Animal Clinic 🐇🐹</h3>
           <p>📍 987 Cuddly Lane, Petborough</p>
           <p>⭐ 4.9 / 5 <span class="paws">🐇🐇🐇🐇🐇</span> (110 reviews)</p>
           <button class="book-btn">Book Appointment 🗓️</button>
        </div>
    </div>
</div>

<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    overflow-x: hidden;
    /* Background image */
    background: url('https://www.southwoodanimalhospital.net/_files/images/cta-section.jpg') no-repeat center center fixed;
    background-size: cover;
    position: relative;
}

/* Optional overlay to make content readable */
body::before {
    content: '';
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-color: rgba(255, 255, 255, 0.52); /* semi-transparent white */
    z-index: -1;
}

.vet-container {
    max-width: 1100px;
    margin: auto;
    padding: 20px;
    position: relative;
    z-index: 1;
}

h1 {
    text-align: center;
    color: #2b6777;
    margin-bottom: 10px;
    font-size: 2.5rem;
}

p.subtext {
    text-align: center;
    color: #555;
    margin-bottom: 40px;
    font-size: 1.1rem;
}

.vet-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
}

.vet-card {
    background: #fffcf5; 
    border-radius: 15px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    padding: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
    text-align: center;
    position: relative;
}

.vet-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 20px rgba(0,0,0,0.2);
    background: #fff2e6; 
}

.vet-card h3 {
    margin-top: 15px;
    color: #2b6777;
}

.vet-card p {
    margin: 8px 0;
    color: #444;
    font-size: 0.95rem;
}

.vet-img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 12px;
}

.book-btn {
    background: linear-gradient(to right, #52ab98, #76c7b7);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 12px;
    cursor: pointer;
    margin-top: 12px;
    font-size: 14px;
    transition: background 0.3s ease, transform 0.2s ease;
}

.book-btn:hover {
    background: linear-gradient(to right, #3b8d80, #5ea69b);
    transform: scale(1.05);
}

.paws {
    margin-left: 5px;
}

/* Floating Paws Animation */
/* Make sure all floating paws are above content */
.floating-paw {
    position: fixed;
    font-size: 2rem;
    animation: float 6s ease-in-out infinite;
    opacity: 0.7;
    z-index: 999; /* above everything */
}

/* Corner positions with colors */
.paw-top-left { top: 15%; left: 5%; color: #ff7f50; animation-delay: 0s; }       /* coral */
.paw-top-right { top: 15%; right: 5%; color: #6a5acd; animation-delay: 1s; }     /* slate blue */
.paw-bottom-left { bottom: 5%; left: 5%; color: #20b2aa; animation-delay: 2s; } /* light sea green */
.paw-bottom-right { bottom: 5%; right: 5%; color: #ffa500; animation-delay: 3s; } /* orange */

/* Floating animation */
@keyframes float {
    0%, 100% { transform: translateY(0) translateX(0); }
    25% { transform: translateY(-15px) translateX(10px); }
    50% { transform: translateY(-30px) translateX(-10px); }
    75% { transform: translateY(-15px) translateX(10px); }
}

</style>
@endsection



