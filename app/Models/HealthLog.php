<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthLog extends Model
{
    protected $table = 'health_logs';
    protected $fillable = ['pet_id', 'title', 'date', 'notes'];

    public function pet() {
        return $this->belongsTo(Pet::class, 'pet_id');
    }
}

