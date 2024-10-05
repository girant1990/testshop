<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';
    protected $fillable = [
        'name',
        'slug',
        'level'
    ];
}
