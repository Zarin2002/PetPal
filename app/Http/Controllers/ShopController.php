<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        $categories = Category::all();
        $products = Product::all();
        return view('shop.index', compact('categories','products'));
    }

    public function category($id) {
        $categories = Category::all();
        $products = Product::where('category_id', $id)->get();
        return view('shop.index', compact('categories','products'));
    }

    public function show($id) {
        $product = Product::findOrFail($id);
        return view('shop.show', compact('product'));
    }
}

