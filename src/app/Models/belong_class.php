<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Belong_class extends Model
{
    use HasFactory;

    protected $table = 'belong_classes';

    protected $fillable = ['student_id', 'class_id'];
}
