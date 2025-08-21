<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedingSchedule extends Model
{
    protected $table = 'feeding_schedules';
    protected $fillable = ['pet_id', 'time', 'food'];

    public function pet() {
        return $this->belongsTo(Pet::class, 'pet_id');
    }
}
