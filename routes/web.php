
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
