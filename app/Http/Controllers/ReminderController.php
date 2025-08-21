<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reminder;

class ReminderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'title' => 'required|string',
            'reminder_date' => 'required|date',
            'notes' => 'nullable|string'
        ]);

        Reminder::create($request->all());
        return redirect()->back()->with('success', 'Reminder added successfully!');
    }
}
