<?php

namespace App\Models;

use App\Models\Announcement as ModelsAnnouncement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $table = 'announcements';

    protected $fillable = ['title', 'content', 'class_id'];

    public function getAnnouncementsLast5($class_id){
        return Announcement::where('class_id', $class_id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
    }

    public function getAnnouncements($class_id){
        return Announcement::where('class_id', $class_id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
