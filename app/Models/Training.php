<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'trainer',
        'fees',
        'duration',
        'start_date',
        'end_date',
        'mode',
        'location',
        'max_participants',
    ];
}
