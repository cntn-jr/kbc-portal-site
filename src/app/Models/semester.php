<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $table = 'semesters';

    public function getSentence(){
        if ($this->is_zenki)
            return $this->year.'年度'.' '.'前期';
        else
            return $this->year.'年度'.' '.'後期';
    }
}
