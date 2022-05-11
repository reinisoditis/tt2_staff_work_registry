<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Work;
use App\Models\User_Project;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function works(){
        return $this->hasMany(Work::class);
    }

    public function user_project(){
        return $this->hasMany(User_Project::class);
    }
}
