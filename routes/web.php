
<?php

use Illuminate\Support\Facades\Route;


 // This creates login, logout, register, password reset routes automatically



Route::get('/', function () {
   return view('welcome');
});


#For login 1


use App\Http\Controllers\AuthController;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard', function () {
   return 'Welcome to Pet Pal Dashboard!';
})->middleware('auth');

#use App\Http\Controllers\AuthController; for registration




Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);









Route::get('/dashboard', function () {
    return view('auth.dashboard');
});





Route::get('/adopt', [AuthController::class, 'showAdoptPage'])->name('adopt');



Route::get('/pet-food-guide', [AuthController::class, 'showPetFoodGuide'])->name('pet.food.guide');

Route::get('/vet_finder', [AuthController::class, 'showVetFinder'])->name('vet.finder');
use App\Http\Controllers\PetController;


Route::get('/pet_care', [PetController::class, 'index'])->name('pet.care');
Route::post('/pet_care/pets', [PetController::class, 'store'])->name('pet.store');


use App\Http\Controllers\HealthLogController;
use App\Http\Controllers\FeedingScheduleController;
use App\Http\Controllers\ReminderController;

// Health Logs
Route::get('/pet_care/health-logs', [HealthLogController::class, 'index'])->name('healthlog.index');
Route::get('/pet_care/health-logs/create', [HealthLogController::class, 'create'])->name('healthlog.create');
Route::post('/pet_care/health-logs', [HealthLogController::class, 'store'])->name('healthlog.store');

// Feeding Schedule
Route::get('/pet_care/feeding', [FeedingScheduleController::class, 'index'])->name('feeding.index');
Route::get('/pet_care/feeding/create', [FeedingScheduleController::class, 'create'])->name('feeding.create');
Route::post('/pet_care/feeding', [FeedingScheduleController::class, 'store'])->name('feeding.store');

// Reminders
Route::get('/pet_care/reminders', [ReminderController::class, 'index'])->name('reminder.index');
Route::get('/pet_care/reminders/create', [ReminderController::class, 'create'])->name('reminder.create');
Route::post('/pet_care/reminders', [ReminderController::class, 'store'])->name('reminder.store');

use App\Http\Controllers\ProductFilterController;

Route::get('/filter-search', [ProductFilterController::class, 'index'])->name('filter.search');

use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('home');
 // create this controller if not done


use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/category/{id}', [ShopController::class, 'category'])->name('shop.category');
Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');


Route::get('/pet-services', function () {
    return view('pet-services');
})->name('pet.services');


Route::get('/pet-social-wall', function () {
    return view('pet-social-wall');
})->name('pet.social.wall');

use Illuminate\Support\Facades\Auth;

Route::get('/account', function () {
    return view('account');
})->middleware('auth')->name('account');


Route::middleware(['auth'])->group(function () {
    Route::get('/my-account', [App\Http\Controllers\AccountController::class, 'index'])->name('my.account');
    Route::post('/my-account/add-pet', [App\Http\Controllers\AccountController::class, 'addPet'])->name('my.account.add.pet');
});
use App\Http\Controllers\AccountController;

Route::middleware(['auth'])->group(function () {
    Route::get('/my-account', [AccountController::class, 'index'])->name('account.index');
    Route::post('/my-account/add-pet', [AccountController::class, 'addPet'])->name('account.addPet');
});





Route::middleware(['auth'])->group(function () {
    Route::get('/my-account', [AccountController::class, 'index'])->name('account.index');
});


Route::get('/my-account', [AccountController::class, 'index'])->name('account.index');
Route::middleware(['auth'])->group(function() {
    Route::get('/my-account', [App\Http\Controllers\AccountController::class, 'index'])->name('account.index');
});
Route::get('/my-account', [App\Http\Controllers\AccountController::class, 'index'])->name('my-account');


// My Account page
Route::get('/my-account', [AccountController::class, 'index'])->name('my-account');
// Dashboard page
use App\Http\Controllers\PetCareController;

Route::get('/pet-care', [PetCareController::class, 'dashboard'])->name('pet_care');

// Store routes
Route::post('/pets', [PetCareController::class, 'storePet'])->name('pets.store');
Route::post('/health', [PetCareController::class, 'storeHealth'])->name('health.store');
Route::post('/feeding', [PetCareController::class, 'storeFeeding'])->name('feeding.store');
Route::post('/reminders', [PetCareController::class, 'storeReminder'])->name('reminders.store');

// See All routes
Route::get('/see-all/{type}', [PetCareController::class, 'seeAll'])->name('pets.index'); // You can reuse index for all


Route::get('/pet-care', [PetCareController::class, 'dashboard'])->name('pet_care');

Route::post('/pets', [PetCareController::class, 'storePet'])->name('pets.store');
Route::post('/health', [PetCareController::class, 'storeHealth'])->name('health.store');
Route::post('/feeding', [PetCareController::class, 'storeFeeding'])->name('feeding.store');
Route::post('/reminders', [PetCareController::class, 'storeReminder'])->name('reminders.store');

Route::get('/see-all/{type}', [PetCareController::class, 'seeAll'])->name('pets.index');
Route::delete('/remove/{type}/{index}', [PetCareController::class, 'remove'])->name('pets.remove');
Route::post('/store/{type}', [PetCareController::class, 'store'])->name('pets.store');


Route::get('/pet-care', [PetCareController::class, 'index'])->name('pet.care');

// Store routes
Route::post('/store/{type}', [PetCareController::class, 'store'])->name('pets.store');

// See all stored items
Route::get('/see-all/{type}', [PetCareController::class, 'seeAll'])->name('pets.index');

// Remove an item
Route::delete('/remove/{type}/{index}', [PetCareController::class, 'remove'])->name('pets.remove');
