<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'gender',
        'first_name',
        'last_name',
        'id_card',
        'birth_date',
        'address',
        'province',
        'postal_code',
        'phone',
        'email',
        'education_level',
        'school_name',
        'gpa',
        'graduation_year',
        'faculty',
        'program',
        'status', // pending, approved, rejected
        'admin_notes'
    ];
    
    protected $casts = [
        'birth_date' => 'date',
        'gpa' => 'decimal:2',
        'graduation_year' => 'integer',
    ];
}