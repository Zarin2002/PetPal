<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class AuthController extends Controller
{
   public function showLoginForm()
   {
       return view('auth.login');
   }


   public function login(Request $request)
   {
       $credentials = $request->only('email', 'password');


       if (Auth::attempt($credentials)) {
           return redirect()->intended('/dashboard');
       }


       return back()->withErrors([
           'email' => 'Invalid credentials.',
       ])->onlyInput('email');
   }


  
public function showRegisterForm()
{
   return view('auth.register');
}


public function register(Request $request)
{
   $request->validate([
       'name' => 'required',
       'email' => 'required|email|unique:users,email',
       'password' => 'required|min:6|confirmed'
   ]);


   $user = new User();
   $user->name = $request->name;
   $user->email = $request->email;
   $user->password = Hash::make($request->password);
   $user->save();


   return redirect('/login')->with('success', 'Registration successful. Please login.');
}
public function index()
{
    return view('auth.dashboard');
}





public function showAdoptPage(Request $request)
{
    $query = DB::table('pets');

    if ($request->filled('breed')) {
        $query->where('breed', $request->breed);
    }

    if ($request->filled('age')) {
        $query->where('age_group', $request->age);
    }

    if ($request->filled('location')) {
        $query->where('location', 'like', '%' . $request->location . '%');
    }

    $pets = $query->get();

    return view('adopt', compact('pets'));
}

public function showPetFoodGuide()
{
    return view('pet-food-guide'); // corresponds to resources/views/pet-food-guide.blade.php
}

public function showVetFinder()
{
    return view('auth.vet_finder');
}





}







