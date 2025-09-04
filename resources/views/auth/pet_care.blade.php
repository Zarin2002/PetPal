@extends('layouts.app')

@section('content')
<style>
html, body { background: #e6ccff; font-family: 'Segoe UI', sans-serif; }
.cards { display:grid; grid-template-columns: repeat(auto-fill,minmax(260px,1fr)); gap:25px; padding:20px 40px 60px; }
.card { background: linear-gradient(145deg,#f2e6ff,#d9b3ff); border-radius:16px; box-shadow:0 0 10px #b266ff,0 0 20px #d9b3ff inset; text-align:center; padding:25px; transition:0.3s ease-in-out, box-shadow 0.3s; }
.card:hover { transform:translateY(-4px); box-shadow:0 0 20px #b266ff,0 0 40px #d9b3ff inset; }
.card img { width:90px; height:90px; margin-bottom:12px; filter: drop-shadow(0 0 10px #b266ff); }
.card h3 { margin:10px 0; font-size:20px; color:#8a2be2; text-shadow:0 0 6px #d9b3ff,0 0 10px #b266ff; }
.card p { font-size:14px; color:#555; margin-bottom:15px; text-shadow:0 0 3px #fff; }
.card input, .card textarea { margin:8px 0; padding:10px; width:95%; border:1px solid #b266ff; border-radius:8px; font-size:14px; background:#fff; color:#333; box-shadow:0 0 5px #d9b3ff; transition:0.2s; }
.card input:focus, .card textarea:focus { border-color:#8a2be2; box-shadow:0 0 10px #b266ff; outline:none; }
.card button, .card a.btn { background-color:#a64dff; color:#fff; border:none; padding:10px; border-radius:8px; cursor:pointer; font-size:14px; width:100%; margin-top:5px; box-shadow:0 0 6px #b266ff,0 0 12px #d9b3ff inset; text-decoration:none; display:inline-block; text-align:center; }
.card button:hover, .card a.btn:hover { background-color:#8a2be2; transform:scale(1.03); box-shadow:0 0 12px #b266ff,0 0 24px #d9b3ff inset; }
.section-title { padding:30px 20px 10px; font-size:32px; font-weight:800; text-align:center; color:#a64dff; font-family:'Poppins',sans-serif; letter-spacing:1px; text-shadow:0 0 8px #d9b3ff,0 0 12px #b266ff; }
.footer { text-align:center; padding:25px; background:#d9b3ff; color:#4b0082; font-size:14px; box-shadow:0 -3px 10px #b266ff; }
</style>

<div class="section-title">✨ Pet Care Features</div>
<div class="cards">

    <!-- Pet Profiles -->
    <div class="card">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Profile">
        <h3>Pet Profiles</h3>
        <p>Add and manage your pets.</p>
        <form id="pet-form" method="POST" action="{{ route('pets.store', ['type'=>'pets']) }}">
            @csrf
            <input type="text" name="name" placeholder="Pet Name" required>
            <input type="text" name="type" placeholder="Type (Dog/Cat)" required>
            <input type="number" name="age" placeholder="Age" required>
            <button type="submit">Add Profile</button>
        </form>
        <button type="button" onclick="clearForm('pet-form')">Add Another</button>
        <a href="{{ route('pets.index', ['type' => 'pets']) }}" class="btn">See All</a>
    </div>

    <!-- Health Logs -->
    <div class="card">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616430.png" alt="Health">
        <h3>Health Logs</h3>
        <p>Track vaccinations, medications, and vet visits.</p>
        <form id="health-form" method="POST" action="{{ route('pets.store', ['type'=>'health']) }}">
            @csrf
            <input type="text" name="pet_name" placeholder="Pet Name" required>
            <input type="text" name="title" placeholder="Log Title" required>
            <input type="date" name="date" required>
            <textarea name="notes" placeholder="Notes"></textarea>
            <button type="submit">Add Health Log</button>
        </form>
        <button type="button" onclick="clearForm('health-form')">Add Another</button>
        <a href="{{ route('pets.index', ['type' => 'health']) }}" class="btn">See All</a>
    </div>

    <!-- Feeding Schedule -->
    <div class="card">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Feeding">
        <h3>Feeding Schedule</h3>
        <p>Set feeding times and monitor diet plans.</p>
        <form id="feeding-form" method="POST" action="{{ route('pets.store', ['type'=>'feeding']) }}">
            @csrf
            <input type="text" name="pet_name" placeholder="Pet Name" required>
            <input type="time" name="feeding_time" required>
            <input type="text" name="food" placeholder="Food Details" required>
            <button type="submit">Set Feeding</button>
        </form>
        <button type="button" onclick="clearForm('feeding-form')">Add Another</button>
        <a href="{{ route('pets.index', ['type' => 'feeding']) }}" class="btn">See All</a>
    </div>


</div>



<script>
function clearForm(formId){
    const form = document.getElementById(formId);
    form.reset();
    form.querySelectorAll("input, textarea").forEach(input => {
        localStorage.removeItem(formId+'-'+input.name);
    });
}

// Keep form data after submit
document.querySelectorAll("form").forEach(form => {
    const formId = form.id;
    if(!formId) return;
    const inputs = form.querySelectorAll("input, textarea");
    inputs.forEach(input => {
        const saved = localStorage.getItem(formId+'-'+input.name);
        if(saved) input.value = saved;
    });
    form.addEventListener('submit', function() {
        inputs.forEach(input => {
            localStorage.setItem(formId+'-'+input.name, input.value);
        });
    });
});
</script>
@endsection















