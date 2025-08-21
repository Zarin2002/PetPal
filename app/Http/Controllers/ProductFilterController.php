<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // make sure this exists

class ProductFilterController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all products to start
        $products = Product::all();

        return view('filter-search', compact('products'));
    }
}
