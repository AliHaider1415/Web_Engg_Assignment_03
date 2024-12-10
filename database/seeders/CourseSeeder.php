<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create dummy courses
        Course::create([
            'title' => 'Introduction to Laravel',
            'description' => 'Learn the basics of Laravel framework.',
            'duration' => '4 weeks',
            'level' => 'Beginner',
            'price' => 99.99,
            'start_date' => now(),
            'end_date' => now()->addWeeks(4),
        ]);

        Course::create([
            'title' => 'Advanced Laravel Techniques',
            'description' => 'Master advanced concepts in Laravel.',
            'duration' => '6 weeks',
            'level' => 'Advanced',
            'price' => 199.99,
            'start_date' => now(),
            'end_date' => now()->addWeeks(6),
        ]);
        Course::create([
            'title' => 'Advanced Laravel Techniques',
            'description' => 'Master advanced concepts in Laravel.',
            'duration' => '6 weeks',
            'level' => 'Advanced',
            'price' => 199.99,
            'start_date' => now(),
            'end_date' => now()->addWeeks(6),
        ]);
        Course::create([
            'title' => 'Advanced Laravel Techniques',
            'description' => 'Master advanced concepts in Laravel.',
            'duration' => '6 weeks',
            'level' => 'Advanced',
            'price' => 199.99,
            'start_date' => now(),
            'end_date' => now()->addWeeks(6),
        ]);
        Course::create([
            'title' => 'Advanced Laravel Techniques',
            'description' => 'Master advanced concepts in Laravel.',
            'duration' => '6 weeks',
            'level' => 'Advanced',
            'price' => 199.99,
            'start_date' => now(),
            'end_date' => now()->addWeeks(6),
        ]);
        Course::create([
            'title' => 'Advanced Laravel Techniques',
            'description' => 'Master advanced concepts in Laravel.',
            'duration' => '6 weeks',
            'level' => 'Advanced',
            'price' => 199.99,
            'start_date' => now(),
            'end_date' => now()->addWeeks(6),
        ]);
        Course::create([
            'title' => 'Advanced Laravel Techniques',
            'description' => 'Master advanced concepts in Laravel.',
            'duration' => '6 weeks',
            'level' => 'Advanced',
            'price' => 199.99,
            'start_date' => now(),
            'end_date' => now()->addWeeks(6),
        ]);
        Course::create([
            'title' => 'Advanced Laravel Techniques',
            'description' => 'Master advanced concepts in Laravel.',
            'duration' => '6 weeks',
            'level' => 'Advanced',
            'price' => 199.99,
            'start_date' => now(),
            'end_date' => now()->addWeeks(6),
        ]);
        Course::create([
            'title' => 'Advanced Laravel Techniques',
            'description' => 'Master advanced concepts in Laravel.',
            'duration' => '6 weeks',
            'level' => 'Advanced',
            'price' => 199.99,
            'start_date' => now(),
            'end_date' => now()->addWeeks(6),
        ]);
    }
}
