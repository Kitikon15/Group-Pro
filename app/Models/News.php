<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'content',
        'type',
        'publish_date',
        'status',
        'author',
        'image'
    ];
    
    protected $casts = [
        'publish_date' => 'date',
    ];
}