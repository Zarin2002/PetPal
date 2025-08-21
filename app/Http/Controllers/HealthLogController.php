<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthLog;

class HealthLogController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'title' => 'required|string',
            'date' => 'required|date',
            'notes' => 'nullable|string'
        ]);

        HealthLog::create($request->all());
        return redirect()->back()->with('success', 'Health log added successfully!');
    }
}
