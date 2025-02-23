<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'user_role';

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
