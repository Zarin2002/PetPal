<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    public function index() {
        $pets = Pet::all(); // You can pass this to Blade later
        return view('auth.pet_care', compact('pets'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'age' => 'required|integer'
        ]);
        Pet::create($request->all());
        return redirect()->back()->with('success', 'Pet added successfully!');
    }
}


