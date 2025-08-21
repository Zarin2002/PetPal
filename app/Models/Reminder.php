<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $table = 'reminders';
    protected $fillable = ['pet_id', 'reminder_date', 'message'];

    public function pet() {
        return $this->belongsTo(Pet::class, 'pet_id');
    }
}

