<?php

namespace App\Models;

use App\Models\Announcement as ModelsAnnouncement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $table = 'annoucements';

    public function getAnnouncementLast5($class_id){
        return ModelsAnnouncement::where('class_id', $class_id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
    }

    public function getAnnouncement($class_id){
        return ModelsAnnouncement::where('class_id', $class_id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
