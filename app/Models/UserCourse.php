<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    use HasFactory;

    // Define the table name (optional if the convention is followed)
    protected $table = 'user_courses';

    // Define the fields that are mass assignable
    protected $fillable = [
        'user_id',
        'course_id',
    ];

    // Define the relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
