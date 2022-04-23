<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    public function getSchedule($class_id){
        return Schedule::where('class_id', $class_id)
            ->orderBy('scheduledDate', 'asc')
            ->get();
    }
}
