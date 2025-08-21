
<?php

use Illuminate\Support\Facades\Route;


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


