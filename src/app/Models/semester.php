<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $table = 'semesters';

    // protected $fiilable = ['id', 'year', 'isEarlyPeriod', 'created_at'];

    public function getSemesters(){
        return $this->orderBy('year', 'desc')
            ->orderBy('isEarlyPeriod', 'asc')
            ->paginate(5);
    }

    public function getSentence(){
        if ($this->isEarlyPeriod)
            return $this->year.'年度'.' '.'前期';
        else
            return $this->year.'年度'.' '.'後期';
    }
}
