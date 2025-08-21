<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'Pet'; // since your table is named 'Pet'
    protected $fillable = ['name', 'type', 'age'];

    // relationships
    public function healthLogs() {
        return $this->hasMany(HealthLog::class, 'pet_id');
    }

    public function feedingSchedules() {
        return $this->hasMany(FeedingSchedule::class, 'pet_id');
    }

    public function reminders() {
        return $this->hasMany(Reminder::class, 'pet_id');
    }
}
