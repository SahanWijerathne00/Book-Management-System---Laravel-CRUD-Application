<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'role',
        'is_active',
        'membership_date',
        'created_at',     
            
    ];
}
