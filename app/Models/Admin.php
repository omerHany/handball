<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;
    public function players(){
        return $this->hasMany(player::class, 'admin_id', 'id');
    }
    public function manegars()
    {
        return $this->hasMany(manegar::class, 'admin_id', 'id');
    }

}
