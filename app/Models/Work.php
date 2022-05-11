<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\WorkType;
use App\Models\User;

class Work extends Model
{
    use HasFactory;

    public function project(){
        return $this->belongsTo(Project::class);
    }


    public function worktype(){
        return $this->belongsTo(WorkType::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
