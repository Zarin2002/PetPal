<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Pet Shop - PetConnect</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
  body { 
    margin:0; font-family:'Poppins',sans-serif; background:#f0f4f8; display:flex; flex-direction:column; min-height:100vh;
  }

  /* Neon Glow Effect (Light Green) */
  .neon { 
    text-shadow: 0 0 6px #4caf50, 0 0 12px #81c784, 0 0 20px #a5d6a7; 
  }

  /* Topbar */
  .topbar { 
    background: linear-gradient(90deg, #2e7d32, #4caf50); 
    color:white; display:flex; justify-content:space-between; align-items:center; 
    padding:15px 40px; box-shadow:0 3px 15px rgba(76,175,80,0.6); position:relative;
  }
  .topbar a { color:white; text-decoration:none; margin-left:20px; font-weight:600; transition:0.3s; }
  .topbar a:hover { color:#ffeb3b; text-shadow:0 0 8px #ffeb3b; }

  /* Floating Cart Button */
  .cart-btn {
    position:absolute; right:20px; top:10px;
    background:#4caf50; color:white; border:none;
    border-radius:50%; width:45px; height:45px;
    display:flex; align-items:center; justify-content:center;
    font-size:20px; cursor:pointer; transition:0.3s;
    box-shadow:0 0 10px #4caf50,0 0 20px #81c784;
  }
  .cart-btn:hover { background:#66bb6a; transform:scale(1.1); }
  .cart-count {
    position:absolute; top:5px; right:5px;
    background:red; color:white; font-size:12px; font-weight:600;
    border-radius:50%; padding:2px 6px;
  }

  /* Layout */
  .container { flex:1; display:flex; }
  .sidebar { 
    width:260px; background:#ffffff; padding:25px; box-shadow:2px 0 15px rgba(0,0,0,0.08);
    border-right:3px solid #a5d6a7;
  }
  .main-content { flex:1; padding:30px; }

  /* Page Title */
  .page-title { font-size:36px; font-weight:700; color:#2e7d32; margin-bottom:20px; text-align:center; }
  .page-title.neon { text-shadow:0 0 8px #4caf50,0 0 15px #81c784; }

  /* Search Bar */
  .search-bar { display:flex; justify-content:center; margin-bottom:30px; }
  .search-bar input { width:100%; max-width:500px; padding:12px 20px; border-radius:30px; border:1px solid #ccc; font-size:16px; box-shadow:0 2px 8px rgba(0,0,0,0.1); transition:0.3s; }
  .search-bar input:focus { outline:none; border-color:#4caf50; box-shadow:0 4px 15px rgba(76,175,80,0.5); }

  /* Filters */
  .filters { display:flex; flex-direction:column; gap:25px; }
  .filters .filter { background:linear-gradient(145deg, #ffffff, #e8f5e9); padding:20px; border-radius:15px; box-shadow:0 4px 15px rgba(0,0,0,0.1); transition:0.3s; }
  .filters .filter:hover { box-shadow:0 6px 20px rgba(76,175,80,0.4); transform:translateY(-2px); }
  .filters .filter strong { color:#2e7d32; margin-bottom:12px; display:block; }
  .filters .filter label { display:block; margin-bottom:6px; font-size:14px; cursor:pointer; }
  .filters .filter input[type="checkbox"], .filters .filter input[type="radio"] { accent-color:#4caf50; margin-right:6px; }

  /* Results */
  .results { display:grid; grid-template-columns:repeat(auto-fill,minmax(220px,1fr)); gap:25px; }

  /* Card styles */
  .card { background:linear-gradient(145deg,#ffffff,#e8f5e9); border-radius:20px; box-shadow:0 6px 20px rgba(0,0,0,0.1); text-align:center; padding:20px; transition:0.4s; cursor:pointer; }
  .card:hover { transform:translateY(-6px); box-shadow:0 10px 25px rgba(76,175,80,0.4); }
  .card img { width:100px; margin-bottom:12px; border-radius:15px; border:2px solid #4caf50; }

  .card h3 { margin:10px 0; font-size:18px; color:#2e7d32; font-weight:700; }
  .card p { font-size:14px; color:#555; line-height:1.4; }

  /* Add to Cart Button */
  .add-cart { 
    margin-top:12px; padding:10px 18px; border:none; border-radius:25px; 
    background:#4caf50; color:white; font-weight:600; cursor:pointer; 
    transition:0.3s; box-shadow:0 0 8px rgba(76,175,80,0.5);
  }
  .add-cart:hover { 
    background:#66bb6a; 
    box-shadow:0 0 12px #4caf50,0 0 20px #81c784; 
    transform:scale(1.05); 
  }

  .no-results { text-align:center; color:#ff1744; font-size:20px; grid-column:1/-1; }

  /* Overlay for cart */
  .cart-overlay {
    position:fixed; inset:0; background:rgba(0,0,0,0.35); opacity:0; visibility:hidden;
    transition:0.3s; z-index:998;
  }
  .cart-overlay.active { opacity:1; visibility:visible; }

  /* Cart Sidebar */
  .cart-sidebar {
    position:fixed; top:0; right:-350px; width:320px; height:100vh;
    background:#ffffff; box-shadow:-4px 0 15px rgba(0,0,0,0.2);
    transition:0.4s; z-index:999; display:flex; flex-direction:column;
    border-left:3px solid #a5d6a7; box-sizing:border-box;
  }
  .cart-sidebar.active { right:0; }

  .cart-header {
    position:sticky; top:0; background:#ffffff; z-index:1;
    padding:16px 16px; border-bottom:1px solid #e0e0e0; display:flex; align-items:center; justify-content:space-between;
  }
  .cart-title { margin:0; color:#2e7d32; font-size:18px; font-weight:700; }
  .cart-close {
    background:none; border:none; font-size:22px; line-height:1; cursor:pointer; color:#2e7d32;
    text-shadow:0 0 6px #4caf50, 0 0 10px #81c784;
  }

  .cart-items {
    flex:1; overflow-y:auto; padding:12px 16px 16px; box-sizing:border-box;
  }
  .cart-item { display:flex; justify-content:space-between; align-items:center; margin-bottom:10px; font-size:14px; }
  .cart-item-name { max-width:65%; }
  .cart-item button { background:none; border:none; cursor:pointer; font-weight:bold; margin:0 3px; }

  .cart-footer {
    position:sticky; bottom:0; background:#ffffff; padding:14px 16px; border-top:1px solid #e0e0e0;
    box-shadow:0 -6px 12px rgba(0,0,0,0.06);
  }
  .cart-total { display:flex; justify-content:space-between; margin-bottom:10px; font-weight:700; color:#2e7d32; }
  .checkout-btn {
    width:100%; padding:12px; border:none; border-radius:8px;
    background:#4caf50; color:white; font-weight:600; cursor:pointer;
    box-shadow:0 0 8px rgba(76,175,80,0.5);
  }

  /* Checkout Modal */
  #checkoutModal {
    display:none; position:fixed; inset:0; background:rgba(0,0,0,0.4); z-index:1000; justify-content:center; align-items:center;
  }
  .checkout-content {
    background:#fff; padding:30px; border-radius:15px; width:400px; max-width:90%; box-shadow:0 8px 25px rgba(0,0,0,0.3); position:relative;
  }
  .checkout-content h3 { margin-top:0; color:#2e7d32; text-align:center; }
  .checkout-content label { display:block; margin-top:10px; font-weight:600; }
  .checkout-content input, .checkout-content textarea { width:100%; padding:8px 10px; margin-top:5px; border-radius:5px; border:1px solid #ccc; box-sizing:border-box; }
  .checkout-content button { margin-top:15px; width:100%; padding:12px; border:none; border-radius:8px; background:#4caf50; color:#fff; font-weight:600; cursor:pointer; }
  #checkoutSummary { margin-top:15px; font-size:14px; line-height:1.4; }
  #orderMessage { margin-top:15px; font-weight:700; color:#2e7d32; display:none; text-align:center; }

  /* Footer */
  .footer { text-align:center; padding:20px; background:#2e7d32; color:white; font-weight:500; margin-top:30px; box-shadow:0 -3px 15px rgba(76,175,80,0.6); }
</style>
</head>
<body>

<!-- Topbar -->
<div class="topbar">
  <div><strong class="neon">PetConnect</strong></div>
  <div>
    <a href="{{ route('home') }}">Home</a>
  </div>
  <!-- Floating Cart Button -->
  <button class="cart-btn" onclick="toggleCart()">🛒<span class="cart-count" id="cartCount">0</span></button>
</div>

<div class="container">
  <!-- Sidebar -->
  <div class="sidebar">
    <h2 class="neon" style="font-size:22px; margin-bottom:20px;">Filters</h2>
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
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="page-title neon">Pet Shop</div>
    <div class="search-bar">
      <input type="text" id="searchInput" placeholder="Search pet accessories...">
    </div>
    <div class="results" id="resultsContainer"></div>
  </div>
</div>

<!-- Click-to-close overlay -->
<div class="cart-overlay" id="cartOverlay" onclick="toggleCart()"></div>

<!-- Cart Sidebar -->
<div class="cart-sidebar" id="cartSidebar">
  <div class="cart-header">
    <h3 class="cart-title">Your Cart</h3>
    <button class="cart-close" aria-label="Close cart" onclick="toggleCart()">×</button>
  </div>

  <div class="cart-items" id="cartItems"></div>

  <div class="cart-footer">
    <div class="cart-total"><span>Total</span><span id="cartTotal">$0.00</span></div>
    <button class="checkout-btn">Checkout</button>
  </div>
</div>

<!-- Checkout Modal -->
<div id="checkoutModal">
  <div class="checkout-content">
    <h3>Confirm Your Order</h3>
    <label>Name</label>
    <input type="text" id="checkoutName" value="{{ auth()->user()->name }}" readonly>
    <label>Email</label>
    <input type="email" id="checkoutEmail" value="{{ auth()->user()->email }}" readonly>
    <label>Phone</label>
    <input type="text" id="checkoutPhone">
    <label>Address</label>
    <textarea id="checkoutAddress" rows="3"></textarea>
    <div id="checkoutSummary"></div>
    <button id="confirmOrderBtn">Confirm Order</button>
    <button id="closeCheckoutBtn" style="
        margin-top:10px;
        width:100%;
        padding:12px;
        border:none;
        border-radius:8px;
        background:red;
        color:white;
        font-weight:600;
        cursor:pointer;
    ">Close</button>
    <div id="orderMessage">Thank you for confirming your order! Wait for our delivery to pick it up! Enjoy!</div>
  </div>
</div>

<!-- Hidden JSON -->
<div id="productsData" data-products='@json($products)' style="display:none;"></div>

<!-- Footer -->
<div class="footer">&copy; 2025 PetConnect. All rights reserved.</div>

<script>
const products = JSON.parse(document.getElementById('productsData').dataset.products);
const resultsContainer = document.getElementById("resultsContainer");
let cart = [];

// Display products
function displayResults(items) {
  resultsContainer.innerHTML = "";
  if(items.length === 0){
    resultsContainer.innerHTML = `<div class="no-results">No products found.</div>`;
    return;
  }
  items.forEach(product => {
    resultsContainer.innerHTML += `
      <div class="card" data-id="${product.id}" data-category="${product.category}">
        <img src="${product.image_url || 'https://cdn-icons-png.flaticon.com/512/616/616408.png'}" alt="${product.name}">
        <h3>${product.name}</h3>
        <p>Category: ${product.category}<br>Price: $${product.price}<br>Stock: ${product.stock}</p>
        <button class="add-cart" id="btn-${product.id}" onclick='addToCart(${JSON.stringify(product)})'>Add to Cart</button>
      </div>
    `;
  });
  updateButtonStates();
}

// Filters
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

// Cart functions
function addToCart(product) {
  let existing = cart.find(item => item.id === product.id);
  if (existing) {
    existing.quantity += 1;
  } else {
    cart.push({ ...product, quantity: 1 });
  }
  updateCartUI();
  updateButton(product.id);
}

function increaseQuantity(id) {
  let existing = cart.find(item => item.id === id);
  if (existing) {
    existing.quantity += 1;
  }
  updateCartUI();
  updateButton(id);
}

function decreaseQuantity(id) {
  let existing = cart.find(item => item.id === id);
  if (existing) {
    existing.quantity -= 1;
    if (existing.quantity <= 0) {
      cart = cart.filter(item => item.id !== id);
    }
  }
  updateCartUI();
  updateButton(id);
}

function updateCartUI() {
  const cartItems = document.getElementById("cartItems");
  const cartCount = document.getElementById("cartCount");
  const cartTotal = document.getElementById("cartTotal");

  cartItems.innerHTML = "";
  let total = 0;
  cart.forEach(item => {
    total += item.price * item.quantity;
    cartItems.innerHTML += `
      <div class="cart-item">
        <span class="cart-item-name">${item.name} x ${item.quantity}</span>
        <div>
          <button onclick='decreaseQuantity(${item.id})'>-</button>
          <button onclick='increaseQuantity(${item.id})'>+</button>
        </div>
      </div>
    `;
  });
  cartCount.innerText = cart.reduce((sum, item) => sum + item.quantity, 0);
  cartTotal.innerText = `$${total.toFixed(2)}`;
}

// Button toggle
function updateButton(id) {
  const btn = document.getElementById(`btn-${id}`);
  const exists = cart.find(item => item.id === id);
  if(btn){
    btn.innerText = exists ? "Added!" : "Add to Cart";
  }
}

function updateButtonStates(){
  products.forEach(p => updateButton(p.id));
}

// Toggle Cart
const cartSidebar = document.getElementById("cartSidebar");
const cartOverlay = document.getElementById("cartOverlay");
function toggleCart(){
  cartSidebar.classList.toggle("active");
  cartOverlay.classList.toggle("active");
}

// Search event
document.getElementById("searchInput").addEventListener("input", applyFilters);
document.querySelectorAll(".category-filter, .price-filter, .stock-filter").forEach(e => e.addEventListener("change", applyFilters));

// Checkout
const checkoutModal = document.getElementById("checkoutModal");
document.querySelector(".checkout-btn").addEventListener("click", () => {
  if(cart.length === 0){ alert("Your cart is empty!"); return; }
  checkoutModal.style.display = "flex";
  updateCheckoutSummary();
});

function updateCheckoutSummary(){
  const summary = document.getElementById("checkoutSummary");
  let html = "<strong>Items:</strong><br>";
  cart.forEach(item => { html += `${item.name} x ${item.quantity} - $${(item.price*item.quantity).toFixed(2)}<br>`; });
  const total = cart.reduce((sum,item)=>sum+item.price*item.quantity,0);
  html += `<br><strong>Total: $${total.toFixed(2)}</strong>`;
  summary.innerHTML = html;
}

document.getElementById("confirmOrderBtn").addEventListener("click", () => {
  document.getElementById("orderMessage").style.display = "block";
  cart = [];
  updateCartUI();
  updateButtonStates();
});

// Close Checkout button
document.getElementById("closeCheckoutBtn").addEventListener("click", () => {
  checkoutModal.style.display = "none";
});

// Initial render
displayResults(products);
</script>
</body>
</html>












