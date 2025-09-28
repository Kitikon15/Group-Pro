<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $fillable = [
        'name',
        'position',
        'bio',
        'email',
        'phone',
        'image_url',
        'status'
    ];
}