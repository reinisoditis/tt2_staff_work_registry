<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function user_role(){
        return $this->hasMany(User::class);
    }

    public const IS_USER = 1;
    public const IS_MANAGER = 2;
    public const IS_ADMIN = 3;
}
