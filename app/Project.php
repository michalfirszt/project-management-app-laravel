<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;
use App\User;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
