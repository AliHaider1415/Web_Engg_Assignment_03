<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title of the course
            $table->text('description'); // Description of the course
            $table->integer('duration'); // Duration in integer (e.g., number of hours)
            $table->string('level'); // Level of the course (e.g., beginner, intermediate, advanced)
            $table->decimal('price', 8, 2); // Price of the course (e.g., 99.99)
            $table->date('start_date'); // Start date of the course
            $table->date('end_date'); // End date of the course
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
