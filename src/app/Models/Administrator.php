<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Administrator extends Authenticatable
{
    use HasFactory;

    protected $guard = 'admin';

    protected $table = 'administrators';

    const MODEL_TYPE = 'admin';

    public function getModelType(){
        return '管理者';
    }

}
