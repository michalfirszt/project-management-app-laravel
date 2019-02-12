<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class Task extends Model
{
    protected $fillable = [
        'title'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function toggle()
    {
        if ($this->closed) {

            $this->closed = 0;
            $this->save();
        
        } else {

            $this->closed = 1;
            $this->save();

        }
    }
}
