<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetCareController extends Controller
{
    // Show main pet care dashboard
    public function index()
    {
        return view('auth.pet_care');
    }

    // Store data for any type
    public function store(Request $request, $type)
    {
        $data = $request->all();
        unset($data['_token']);

        $items = session()->get($type, []);
        $items[] = $data;
        session()->put($type, $items);

        return redirect()->back();
    }

    // Show all stored items for a type
    public function seeAll($type)
    {
        $items = session()->get($type, []);
        return view('auth.see_all', compact('items', 'type'));
    }

    // Remove an item by index
    public function remove($type, $index)
    {
        $items = session()->get($type, []);

        if(isset($items[$index])){
            unset($items[$index]);
            $items = array_values($items); // reindex array
            session()->put($type, $items);
        }

        return redirect()->back();
    }
}



