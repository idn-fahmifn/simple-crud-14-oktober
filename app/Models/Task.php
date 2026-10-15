<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'task_title', 'desc', 'user_id', 'uuid', 'image_cover','progress'
    ];
}
