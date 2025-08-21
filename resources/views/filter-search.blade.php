<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Filter & Search - PetConnect</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
  body { margin:0; font-family:'Poppins',sans-serif; background:#f0f4f8; }

  /* Topbar */
  .topbar { 
    background: linear-gradient(90deg, #2a5bd7, #4d7eff); 
    color:white; display:flex; justify-content:space-between; align-items:center; 
    padding:15px 40px; box-shadow:0 3px 10px rgba(0,0,0,0.1);
  }
  .topbar a { color:white; text-decoration:none; margin-left:20px; font-weight:600; transition:0.3s; }
  .topbar a:hover { color:#ffeb3b; }

  /* Page Title */
  .page-title { padding:30px 40px 20px; font-size:32px; font-weight:700; color:#2a5bd7; text-align:center; }

  /* Search Bar */
  .search-bar { display:flex; justify-content:center; padding:0 40px 30px; }
  .search-bar input { width:100%; max-width:500px; padding:12px 20px; border-radius:30px; border:1px solid #ccc; font-size:16px; box-shadow:0 2px 8px rgba(0,0,0,0.1); transition:0.3s; }
  .search-bar input:focus { outline:none; border-color:#2a5bd7; box-shadow:0 4px 12px rgba(42,91,215,0.3); }

  /* Filters */
  .filters { display:flex; gap:20px; flex-wrap:wrap; justify-content:center; padding:0 40px 30px; }
  .filters .filter { background:linear-gradient(145deg, #ffffff, #e6f0ff); padding:20px; border-radius:15px; box-shadow:0 4px 15px rgba(0,0,0,0.1); min-width:160px; transition:0.3s; }
  .filters .filter:hover { box-shadow:0 6px 20px rgba(0,0,0,0.15); transform:translateY(-2px); }
  .filters .filter strong { color:#2a5bd7; margin-bottom:12px; display:block; }
  .filters .filter label { display:block; margin-bottom:6px; font-size:14px; cursor:pointer; }
  .filters .filter input[type="checkbox"], .filters .filter input[type="radio"] { accent-color:#2a5bd7; margin-right:6px; }

  /* Results */
  .results { display:grid; grid-template-columns:repeat(auto-fill,minmax(220px,1fr)); gap:25px; padding:0 40px 40px; }

  /* Card styles with category color accents */
  .card { background:linear-gradient(145deg,#ffffff,#d9e8ff); border-radius:20px; box-shadow:0 6px 20px rgba(0,0,0,0.1); text-align:center; padding:20px; transition:0.4s; cursor:pointer; }
  .card:hover { transform:translateY(-6px); box-shadow:0 10px 25px rgba(0,0,0,0.15); }
  .card img { width:100px; margin-bottom:12px; border-radius:15px; border:2px solid #2a5bd7; }

  /* Category-based border colors */
  .card[data-category="Toys"] img { border-color:#ffeb3b; }
  .card[data-category="Food"] img { border-color:#4caf50; }
  .card[data-category="Accessories"] img { border-color:#ff5722; }
  .card[data-category="Grooming"] img { border-color:#9c27b0; }

  .card h3 { margin:10px 0; font-size:18px; color:#2a5bd7; font-weight:700; }
  .card p { font-size:14px; color:#555; line-height:1.4; }

  .no-results { text-align:center; color:#ff1744; font-size:20px; grid-column:1/-1; }

  /* Footer */
  .footer { text-align:center; padding:20px; background:#2a5bd7; color:white; font-weight:500; margin-top:30px; }
</style>
</head>
<body>

<!-- Topbar -->
<div class="topbar">
  <div><strong>PetConnect</strong></div>
  <div>
    <a href="{{ route('home') }}">Home</a>
  </div>
</div>

<!-- Page Title -->
<div class="page-title">Filter & Search</div>

<!-- Search Bar -->
<div class="search-bar">
  <input type="text" id="searchInput" placeholder="Search pet accessories...">
</div>

<!-- Filters -->
<div class="filters">
  <div class="filter">
    <strong>Category</strong>
    @php
      $categories = $products->pluck('category')->unique();
    @endphp
    @foreach($categories as $category)
      <label>
        <input type="checkbox" class="category-filter" value="{{ $category }}"> {{ $category }}
      </label>
    @endforeach
  </div>

  <div class="filter">
    <strong>Price</strong>
    <label><input type="radio" name="price" class="price-filter" value="0-20"> Below $20</label>
    <label><input type="radio" name="price" class="price-filter" value="20-50"> $20 - $50</label>
    <label><input type="radio" name="price" class="price-filter" value="50+"> Above $50</label>
    <label><input type="radio" name="price" class="price-filter" value="" checked> Any</label>
  </div>

  <div class="filter">
    <strong>Stock</strong>
    <label><input type="checkbox" class="stock-filter" value="in"> In Stock Only</label>
  </div>
</div>

<!-- Results -->
<div class="results" id="resultsContainer"></div>

<!-- Hidden JSON -->
<div id="productsData" data-products='@json($products)' style="display:none;"></div>

<!-- Footer -->
<div class="footer">&copy; 2025 PetConnect. All rights reserved.</div>

<!-- JS -->
<script>
const products = JSON.parse(document.getElementById('productsData').dataset.products);
const resultsContainer = document.getElementById("resultsContainer");

function displayResults(items) {
  resultsContainer.innerHTML = "";
  if(items.length === 0){
    resultsContainer.innerHTML = `<div class="no-results">No products found.</div>`;
    return;
  }
  items.forEach(product => {
    resultsContainer.innerHTML += `
      <div class="card" data-category="${product.category}">
        <img src="${product.image_url || 'https://cdn-icons-png.flaticon.com/512/616/616408.png'}" alt="${product.name}">
        <h3>${product.name}</h3>
        <p>Category: ${product.category}<br>Price: $${product.price}<br>Stock: ${product.stock}</p>
      </div>
    `;
  });
}

function applyFilters(){
  const searchText = document.getElementById("searchInput").value.toLowerCase();
  const selectedCategories = Array.from(document.querySelectorAll(".category-filter:checked")).map(e => e.value);
  const selectedPrice = document.querySelector(".price-filter:checked").value;
  const inStockOnly = document.querySelector(".stock-filter:checked") ? true : false;

  let filtered = products.filter(p => {
    const matchesSearch = p.name.toLowerCase().includes(searchText);
    const matchesCategory = selectedCategories.length ? selectedCategories.includes(p.category) : true;

    let matchesPrice = true;
    if(selectedPrice){
      if(selectedPrice === "0-20") matchesPrice = p.price < 20;
      else if(selectedPrice === "20-50") matchesPrice = p.price >= 20 && p.price <= 50;
      else if(selectedPrice === "50+") matchesPrice = p.price > 50;
    }

    let matchesStock = true;
    if(inStockOnly) matchesStock = p.stock > 0;

    return matchesSearch && matchesCategory && matchesPrice && matchesStock;
  });

  displayResults(filtered);
}

displayResults(products);
document.getElementById("searchInput").addEventListener("input", applyFilters);
document.querySelectorAll(".category-filter, .price-filter, .stock-filter").forEach(el => {
  el.addEventListener("change", applyFilters);
});
</script>

</body>
</html>



