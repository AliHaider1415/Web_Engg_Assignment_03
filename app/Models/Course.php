<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Define the fields that are mass assignable
    protected $fillable = [
        'title',
        'description',
        'duration',
        'level',
        'price',
        'start_date',
        'end_date',
    ];

    // Define the many-to-many relationship with User through UserCourse
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_courses');
    }
}
